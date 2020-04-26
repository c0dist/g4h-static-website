Linux Log Eraser
================

Linux Log Eraser is a bash script which erases almost all your logs from the log files on a Linux Server.
This can be useful for an attacker to wipe out the traces before logging out of the compromised Server.

Usage
=====
./linux_log_eraser.sh options

OPTIONS:
	-h help				Show this message
	-i info				Show basic system info
	-d <ip_address>			Delete the IP_Address from log files
	-s <spoof_ip_address>		Spoof the IP following -d with the one following -s
	-u <user_name>			The user name you are logged in as
	-w <web_shell_path>		The web back door (e.g. c99) shell absolute path you wish to erase from logs
	-f fuck logs 			To delete all log files
	

	Ex: ./linux_log_eraser.sh -h	To show above message
	Ex: ./linux_log_eraser.sh -i	To show basic system info
	Ex: ./linux_log_eraser.sh -d 192.168.1.7 -s 10.1.1.7 -u "cracker"
	Ex: ./linux_log_eraser.sh -d 192.168.1.7 -s 10.1.1.7 -w "/var/www/xyz.com/uploads/shell.php" -u "cracker"
	Ex: ./linux_log_eraser.sh -f
	
(No other combination is suggested and allowed to work)
	
Author
======
b0nd, b0nd.g4h@gmail.com and www.garage4hackers.com


Logic:

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

For spoofing in binary files, better analyze the files first manually and choose a good IP and user name

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
