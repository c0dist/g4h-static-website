Linux Log Eraser
================

Linux Log Eraser is a bash script which erases almost all your logs from the log files on a Linux machine.
This can be useful for an attacker to wipe out the traces before logging out of the compromised Linux machine.


Usage
=====
$0 options

OPTIONS:
	-h help				Show this message
	-i [ip_address]			Search for a particular ip_address in all log files and search for top 30 IP's logged in log files
	-d [ip_address]			Delete the ip_address from log files
	-s [spoof_ip_address]		Spoof the IP following -d with the one following -s wherever deletion is not possible
	-u [user_name]			The user name whose logs are to be erased/spoofed
	-w [web_shell_path]		The web back door (e.g. c99) shell absolute path you wish to erase from logs
	-f fuck logs files		To erase all log files completely, not recommended though
	-e "file extensions"		To find other backdoors planted on system
	-r [web_root_directory]		The web root directory to start searching backdoors from

	Ex: $0 -h
	    * To show this help message

	Ex: $0 -i 192.168.1.7
	    * To search 192.168.1.7 in all logs files. Basically finding which logs files have trace of it, and
	    * In addition to that, search all log files (/var/log/*) and show Top 20 most logged IP's in log files.
	    * They could be good choices for spoofing

	Ex: $0 -d 192.168.1.7 -s 10.1.1.7 -u "cracker"
	    * To delete lines containing 192.168.1.7 and|or user_name "cracker" from ASCII files, and
	    * To spoof 192.168.1.7 in non-ASCII files by 10.1.1.7 and user_name "cracker" by "root"

	Ex: $0 -d 192.168.1.7 -s 10.1.1.7 -u "cracker" -w "/var/www/xyz.com/uploads/c99.php"
	    * To delete lines containing 192.168.1.7 and|or user_name "cracker" and|or web_shell_path from ASCII files, and
	    * To spoof 192.168.1.7 in non-ASCII files by 10.1.1.7 and user_name "cracker" by "root"
	    
	Ex: $0 -f
	    * To erase all log files listed in log_files.sh completely (not recommended)

	Ex: $0 -e "php txt asp" -r /var/www
	    * To search for probable web backdoors planted on system. Once found, it is recommended to verify the result
	    * The current example searches for files having extensions php or txt or asp in /var/www and subdirectories
	    * Extensions and web_root_directory are customizable

   [!]	Stick to the above OPTION combinations only, else the script might not work properly
	
Author
======
b0nd, b0nd.g4h@gmail.com and www.garage4hackers.com



Customizing the script while executing for the first time on target:
====================================================================

	1. Upload both, the linux_log_eraser.sh and log_files.sh on target server
	2. Fire the linux_log_eraser script. Take care that you must be root (either UID=0 or EUID=0) to execute the script
	3. Use parameter -i, and pass the IP address you are worried about in log files:
	  ./linux_log_eraser -i 192.168.1.1
	4. The above command will scan all the log files for that particular IP and will let you know all the log files having trace of that IP
	5. Open up log_files.sh file. Cross check which log file, reported in step 4, is not in the list. Do add the log file/files
	6. Running the step 3 command would also let you know the top 20 IP's in the log files having most occurrences
	7. Choose any suitable IP from the top 20 IP's as a spoof IP.....and you are ready to  proceed with other options of script



Logic:
======

Some log files are Ascii types, hence can be read and edited easily. Rest log files are binary types and are hard to read and edit directly.

For ascii files, all the lines in various log files containing either of the following would be deleted:
	1. The IP following -d parameter
	2. User name following -u parameter (if it is other than root). Since the user 'root' has many entries, so to remain stealty it's
	   better not to delete such lines.
	3. Web shell path of your backdoor following -w parameter.

For binary files, all the entries for your IP and user name (if it is other than root) would be spoofed (not deleted)
IP would be spoofed to the Spoof IP provided and user name would be spoofed to "root"

Pass the following to script:
	1. The IP which you wish to delete/spoof in log files
	2. The spoof IP. This would be the IP to replace the IP in binary log files
	3. The user name you wish to delete/spoof in log files
	4. Absolute web shell path to erase it's entries from log files (e.g. the web back doors)

For spoofing in binary files, better analyze the files manually first and choose a good IP and user name

You can do the following for binary file analysis:
For wtmp:
	#last				(shows: username, terminal, IP)
	#strings /var/log/wtmp		(shows: username, terminal, IP)

For utmp:
	#who				(shows: username, terminal, IP)
	#strings /var/run/utmp		(shows: username, terminal, IP)

For lastlog:
	#lastlog			(shows: username, terminal, IP)
	#strings /var/log/lastlog	(shows: terminal, IP)

For btmp (if exists):
	#lastb				(shows: username)
	#strings /var/log/btmp		(shows: username)

Correct me if the logic is wrong at any place except for "/var/log/lastlog"
