<?xml version="1.0" encoding="ISO-8859-1"?>

<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:content="http://purl.org/rss/1.0/modules/content/">
	<channel>
		<title>Garage4hackers Forum - Blogs - sohil_garg</title>
		<link>http://garage4hackers.com/blog.php?u=1118</link>
		<description>Garage4Hackers(G4H) is an open security community for Information Security enthusiasts, gurus and aspirants.Members of the team dedicate time and resources towards helping other information security aspirants, sharing knowledge,spreading security awareness and promoting research.</description>
		<language>en</language>
		<lastBuildDate>Sun, 22 Mar 2020 10:46:50 GMT</lastBuildDate>
		<generator>vBulletin</generator>
		<ttl>60</ttl>
		<image>
			<url>http://garage4hackers.com/images/misc/rss.jpg</url>
			<title>Garage4hackers Forum - Blogs - sohil_garg</title>
			<link>http://garage4hackers.com/blog.php?u=1118</link>
		</image>
		<item>
			<title>HP DataProtector - Porting exploit to metasploit.</title>
			<link>http://garage4hackers.com/entry.php?b=317</link>
			<pubDate>Tue, 10 Apr 2012 10:41:30 GMT</pubDate>
			<description>Nowadays, in almost all my penetration testing projects, HP dataprotector has been the most vulnerable software installed.  
I thought of porting the...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">Nowadays, in almost all my penetration testing projects, HP dataprotector has been the most vulnerable software installed. <br />
I thought of porting the same as a metasploit exploit module. Hence, I wrote exploit for Hp_dataprotector_cmdexec.  I will try to describe my work step by step. The input for this was a working exploit-db code (<a href="http://www.exploit-db.com/exploits/17648/" target="_blank">HP Data Protector Remote Root Shell for Linux</a>). The shell code when run normally will give a netcat shell. <br />
So here I start up:<br />
1.	Took a standard metasploit module for arbitrary port scanner.<br />
2.	I started with making the adjustments in update_info () function and initializing parameters like payload, architecture, targets etc. <br />
3.	Parallely, I figured out the ZDI’s payload which was required to trigger the vulnerability. Here, it came out to be a simple directory traversal attack. I used this traversal to execute my payload command (like ipconfig, cmd, ls etc.)<br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=329&amp;d=1334053215" border="0" alt="Name:  Untitled.jpg
Views: 585
Size:  22.3 KB"  style="float: CONFIG" /><br />
<br />
4.	I used metasploit’s payload type “CMD” to execute a command on the victim, whenever the module will run.<br />
5.	Imported Msf::Exploit::Remote::Tcp for using the predefined variables and functions in metasploit framework.<br />
6.	Then, I created a function exploit () which I used to create a socket connection with the victim machine and deliver /execute my payload. <br />
7.	Moving further, I added the support to execute payloads for multiple platforms by configuring ‘Target’ parameter.<br />
8.	Result for all this was a working exploit module which could be used against UNIX and HP-UX platform.<br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=330&amp;d=1334053261" border="0" alt="Name:  hp_dataprotector_cmdexec_pic1.jpg
Views: 907
Size:  85.9 KB"  style="float: CONFIG" /><br />
It might not be the extensive post for exploit porting. But, it was simple way to start and triggered me to write this port. Also, this approach could be particularly be useful in writing adhoc metasploit scanner and exploit modules.<br />
PS: The version for the module is available in unstable metasploit repository <a href="https://github.com/rapid7/metasploit-framework/commit/26e86e97cd65871e4020287a5897431ee04d3806" target="_blank">(<a href="https://github.com/rapid7/metasploit-framework/commit/26e86e97cd65871e4020287a5897431ee04d3806" target="_blank">https://github.com/rapid7/metasploit...97431ee04d3806</a>)</a>. I was not able to push it in stable repository due to NDA issues.</blockquote>

]]></content:encoded>
			<dc:creator>sohil_garg</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=317</guid>
		</item>
		<item>
			<title>Enumerating and Breaking VoIP</title>
			<link>http://garage4hackers.com/entry.php?b=272</link>
			<pubDate>Mon, 21 Nov 2011 08:49:37 GMT</pubDate>
			<description>*Introduction* 
 
Voice over Internet Protocol (VoIP) has seen rapid implementation over the past few years. Most of the organizations which have...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore"><b>Introduction</b><br />
<br />
Voice over Internet Protocol (VoIP) has seen rapid implementation over the past few years. Most of the organizations which have implemented VoIP are either unaware or ignore the security issues with VoIP and its implementation. Like every other network, a VoIP network is also susceptible to abuse. In this article, I would discuss about various enumeration techniques followed by demonstration of few VoIP attacks. I deliberately will not go to protocol level details as this article is aimed at Penetration Testers who want to get a taste of the basics first, though it is strongly encouraged to understand the protocols used in VoIP networks.<br />
<b>Possible attacks against VoIP</b><br />
<br />
·   Denial of Service (DoS) attacks<br />
·   Registration Manipulation and Hijacking<br />
·   Authentication attacks<br />
·   Caller ID spoofing<br />
·   Man-in-the-middle attacks<br />
·   VLAN Hopping<br />
·   Passive and Active Eavesdropping<br />
·   Spamming over Internet Telephony (SPIT)<br />
·   VoIP phishing (Vishing)<br />
<b>Lab Setup for VoIP Testing</b><br />
<br />
For this article, I have used the following lab setup to demonstrate various security issues in VoIP.<br />
·   Trixbox<a href="file:///D:/Documents and Settings/sohilg434/Desktop/voip/Enumerating and Breaking VOIPv4.docx#_edn1" target="_blank">[i]</a> (192.168.1.6) – open source IP-PBX server<br />
·   Backtrack 4 R2  (192.168.1.4) - Attacker machine<br />
·   ZoIPer<a href="file:///D:/Documents and Settings/sohilg434/Desktop/voip/Enumerating and Breaking VOIPv4.docx#_edn2" target="_blank">[ii]</a> (192.168.1.3) – Windows softphone (User A - Victim)<br />
·   Linphone<a href="file:///D:/Documents and Settings/sohilg434/Desktop/voip/Enumerating and Breaking VOIPv4.docx#_edn3" target="_blank">[iii]</a> (192.168.1.8) – Windows softphone(User B - Victim)<br />
 <br />
 <br />
 <br />
<b>Our lab setup</b><br />
<br />
<br />
Figure 1<br />
Let’s have a look at our lab setup above. It is a typical VoIP network setup in a small organization with a Router which allocates IP addresses to the devices, an IP-PBX system and users. Now, if User A wants to communicate with User B following would happen<br />
1.User A’s call will go to IP-PBX server for User A’s authentication.<br />
2.After successful authentication of User A, IP-PBX server checks the presence of the desired extension of User B. If extension exists, the call is forwarded to User B.<br />
3.Based on the response from User B (i.e. call accept, reject etc.) IP-PBX server responds back to User A.<br />
4.If everything is normal, then User A would start communicating with User B.<br />
Now we have a clear picture of the communication let’s move on to the fun part, attacking VoIP.<br />
Enumeration<br />
Enumeration is the key to every successful attack/penetration test as it provides the much needed details and overview of the setup, VoIP is not different. In VoIP network, information useful to us as an attacker is VoIP gateway/servers, IP-PBX systems, client software (softphones)/VoIP phones and user extensions. Let’s have a look at some of the widely used tools for enumeration and fingerprinting. For the sake of demonstration, let’s assume that we know the IP addresses of devices already J<br />
 <br />
·   Smap<br />
Smap<a href="file:///D:/Documents and Settings/sohilg434/Desktop/voip/Enumerating and Breaking VOIPv4.docx#_edn4" target="_blank">[iv]</a> scans a single IP or subnet of IP addresses for SIP enabled devices. Let us use smap against the IP-PBX server. Figure 2 shows that we have successfully enumerated the server and User-Agent details are available.<br />
<br />
Figure 2<br />
·   Svmap<br />
Svmap is another powerful scanner from sipvicious<a href="file:///D:/Documents and Settings/sohilg434/Desktop/voip/Enumerating and Breaking VOIPv4.docx#_edn5" target="_blank">[v]</a> suite of tools. We can set the type of request being sent while enumerating SIP devices using this tool. The default request type is OPTIONS. Let’s run the tool on a pool of 20 devices (Figure 3). As we can see, svmap is able to detect IP-addresses and their User-Agent details.<br />
<br />
Figure 3<br />
·   Swar<br />
During VoIP enumeration, extension enumeration is important to identify the live SIP extensions. Swar<a href="file:///D:/Documents and Settings/sohilg434/Desktop/voip/Enumerating and Breaking VOIPv4.docx#_edn6" target="_blank">[vi]</a> aides in scanning complete range of IP addresses. Figure 4 shows a scan for user extensions from 200 to 300. The result is user extensions which were registered with IP-PBX server.<br />
 <br />
<br />
Figure 4<br />
 <br />
So we had a look at enumerating VoIP setup and got some interesting details. Now let’s use these details to attack the setup.<br />
 <br />
 <br />
 <br />
<b>Attacking VoIP</b><br />
<br />
As already discussed, VoIP network is prone to a number of security threats and attacks. For this article, we will have a look at three critical VoIP attacks which could target the integrity and confidentiality of the VoIP infrastructure.<br />
The following attacks are demonstrated in the coming sections:<br />
1.  Attacking VoIP authentication<br />
2.  Eavesdropping via ARP spoofing<br />
3.  Caller ID impersonation<br />
 <br />
1.   Attacking VoIP authentication<br />
When a new or existing VoIP phone is connected to the network, it sends a REGISTER request to the IP-PBX server for registering the associated user ID/extension number. This register requests contains important details (like user information, authentication data etc.) which could be much of an interest of an attacker or a penetration tester. Figure 5 shows the packet capture of SIP authentication request. This packet capture contains very juicy information. Let’s use the information from the packet capture to for executing the authentication attack.<br />
<br />
Figure 5<br />
 <br />
 <br />
 <br />
 <br />
 <br />
 <br />
 <br />
 <br />
 <br />
<b>Attack demonstration</b><br />
<br />
Attack Scenario<br />
<br />
Figure 6<br />
<b>Step1:</b> For the purpose of demonstration, let us assume that we have physical access to VoIP network. Now, using the tools and techniques described in previous sections of this article we will perform the scanning and enumeration to obtain the following details:<br />
·         IP address of SIP server<br />
·         Existing user Ids/extensions<br />
Good, now we will start scanning the VoIP IP addresses to capture registration requests.<br />
<b>Step2:</b> Using wireshark<a href="file:///D:/Documents and Settings/sohilg434/Desktop/voip/Enumerating and Breaking VOIPv4.docx#_edn7" target="_blank">[vii]</a> let us capture some register requests. We will save it to a file named auth.pcap.  Figure 6 shows the wireshark capture file (auth.pcap)<br />
Figure 7<br />
<b>Step3:</b> Now we will use sipcrack suite<a href="file:///D:/Documents and Settings/sohilg434/Desktop/voip/Enumerating and Breaking VOIPv4.docx#_edn8" target="_blank">[viii]</a>. The suite of tools is available in Backtrack under <b>/pentest/VoIP</b> directory. Figure 7 shows the tools from sipcrack suite of tools.<br />
Figure 8<br />
<b>Step4: </b>Using sipdump tool, let’s dump the authentication data to a file and name it auth.txt. Figure 8 shows the wireshark capture file containing authentication data for User 200.<br />
Figure 9<br />
<b>Step5:</b> This authentication data includes user ID, SIP extension, password hash (MD5) and victim’s IP address. We will now use sipcrack tool to crack the authentication hashes using a custom word list to guess the hashes. Figure 9 shows a custom word list named as wordlist.txt which will be used for cracking the authentication hashes. We will store the results from this activity in file named auth.txt<br />
Figure 10<br />
<b>Step6:</b> Neat, we have passwords for the extensions nowJ. We can use this information by re-registering to IP-PBX server from our own SIP phone. This will allow us to perform these activities:<br />
·         Impersonate legitimate user and call other users.<br />
·         Sniff or manipulate legitimate calls, originating from and coming to the victim’s extension (User A in this case).<br />
 <br />
2. Eavesdropping via Arp spoofing<br />
All network hardware devices have a unique MAC address. Like all network devices, VoIP phones are also vulnerable to MAC/ARP spoofing attacks. For this section, we will look at sniffing active voice calls by eavesdropping and recording live VoIP conversation.<br />
<b>Attack Demonstration</b><br />
<br />
Attack Scenario Figure 11<br />
 <br />
<b>Step1:</b> For the purpose of demonstration, let’s assume that we have identified victim’s IP address using the techniques described earlier. Then, using ucsniff<a href="file:///D:/Documents and Settings/sohilg434/Desktop/voip/Enumerating and Breaking VOIPv4.docx#_edn9" target="_blank">[ix]</a> an ARP poisoning tool, we will spoof the victim’s MAC address.<br />
<b>Step2:</b> It is important to identify the MAC address of the target which is required to be poisoned. Although, above mentioned tools have the capability to identify MAC automatically, it is always a good practice to identify MAC separately too. Let’s use nmap<a href="file:///D:/Documents and Settings/sohilg434/Desktop/voip/Enumerating and Breaking VOIPv4.docx#_edn10" target="_blank">[x]</a> for that. Figure 11 shows an nmap scan against the victim’s IP address and its MAC address.<br />
Figure 12<br />
<b>Step3: </b>Now we have MAC address of the victim, let us use ucsniff to spoof victim’s MAC address. ucsniff tool has various modes for spoofing (i.e. Monitor mode, learning mode and MiTM mode). Let’s use MiTM mode by specifying victim’s IP address and SIP extension in a file named targets.txt. This mode ensures that only calls (to and fro) to victim (User A) are eavesdropped without affecting other traffic in the network. Figure 12 and figure 13 show that ucsniff has poisoned victim’s (User A) MAC address.<br />
<br />
Figure 13<br />
<br />
Figure 14<br />
<b>Step4:</b> We have successfully spoofed the Victim’s MAC address and are ready to sniff calls to and from User A’s VoIP phone.<br />
<b>Step5:</b> Now, when user B calls User A and starts their conversation and ucsniff records their conversation. When the call is finished, ucsniff stores all the recorded conversation in a wav file. Figure 14, shows ucsniff has detected a new call to extension 200 from extension 202.<br />
<br />
Figure 15<br />
<b>Step6:</b> When we are done, we would run ucnisff again with –q option to stop spoofing the MAC of the system to ensure that everything remains fine after our attack.<br />
<b>Step7:</b> The saved sound file could be played using well known audio players (like windows media player etc.)<br />
3. Caller ID spoofing<br />
This is one of the easiest attacks on VoIP networks. Caller ID spoofing creates a scenario where an unknown user may impersonate a legitimate user to call other legitimate users on VoIP network. Slight changes in INVITE request would result in this attack. There are numerous ways to craft a malformed SIP INVITE messages (e.g. scapy, SIPp etc.). For demonstration, let’s use metasploit’s<a href="file:///D:/Documents and Settings/sohilg434/Desktop/voip/Enumerating and Breaking VOIPv4.docx#_edn11" target="_blank">[xi]</a> auxiliary module named sip_invite_spoof.<br />
Attack Scenario<br />
<br />
<br />
Figure 16<br />
 <br />
<b>Step1:</b> Let’s start our metasploit and load voip/sip_invite_spoof  auxiliary module.<br />
<b>Step2: </b>Next, we will configure the option <b>MSG to User B</b>. This enables us to impersonate as User B. Also, configure the User A’s IP address in the option <b>RHOSTS</b>. After configuring the module, let’s run the auxiliary module. Figure 17 shows all the configuration setting. <br />
<br />
<br />
Figure 17<br />
<b>Step3:</b> Auxiliary module will send a spoofed invite request to the victim (User A). Victim will receive a call from my VoIP phone and answers the call with an impression that he is talking to User B.  Figure 18 shows the VoIP phone of victim (User A) who is receiving a call from User B (spoofed by me).<br />
<br />
<br />
Figure 18<br />
<b>Step4:</b> Now, User A considers it as legitimate call from User B. User A will start communicating with User B.<br />
<br />
<b><font size="4">Conclusion</font></b><br />
 Number of security threats exist related to VoIP. Using enumeration, crucial information regarding VoIP network, user Ids/extensions, phone types etc can be obtained. With use of specific tools, it is possible to attack authentication, hijack VoIP calls, eavesdrop, and call manipulation, VoIP spamming, VoIP phishing and IP-PBX server compromise.<br />
I hope that the article was enough informative to highlight the security issues in VoIP. I would request readers to note that this article does not discuss all available VoIP tools and techniques for VoIP enumeration and penetration testing.<br />
<br />
<b>References</b><br />
<br />
<hr /><a href="file:///D:/Documents and Settings/sohilg434/Desktop/voip/Enumerating and Breaking VOIPv4.docx#_ednref1" target="_blank">[i]</a> <a href="http://fonality.com/trixbox/" target="_blank">Fonality trixbox CE, an Asterisk-based PBX Phone System | trixbox</a><br />
<br />
<a href="file:///D:/Documents and Settings/sohilg434/Desktop/voip/Enumerating and Breaking VOIPv4.docx#_ednref2" target="_blank">[ii]</a><a href="http://www.zoiper.com/" target="_blank">Free Zoiper softphone for windows, mac &amp; linux, webphone and SDK</a><br />
<br />
<a href="file:///D:/Documents and Settings/sohilg434/Desktop/voip/Enumerating and Breaking VOIPv4.docx#_ednref3" target="_blank">[iii]</a> <a href="http://www.linphone.org/" target="_blank">Linphone, open-source voip software | Linphone, an open-source video sip phone</a><br />
<br />
<a href="file:///D:/Documents and Settings/sohilg434/Desktop/voip/Enumerating and Breaking VOIPv4.docx#_ednref4" target="_blank">[iv]</a> <a href="http://www.wormulon.net/files/pub/smap-blackhat.tar.gz" target="_blank">http://www.wormulon.net/files/pub/smap-blackhat.tar.gz</a><br />
<br />
<a href="file:///D:/Documents and Settings/sohilg434/Desktop/voip/Enumerating and Breaking VOIPv4.docx#_ednref5" target="_blank">[v]</a> <a href="http://code.google.com/p/sipvicious/" target="_blank">sipvicious - Tools for auditing SIP based VoIP systems - Google Project Hosting</a><br />
<br />
<a href="file:///D:/Documents and Settings/sohilg434/Desktop/voip/Enumerating and Breaking VOIPv4.docx#_ednref6" target="_blank">[vi]</a> <a href="http://code.google.com/p/sipvicious/" target="_blank">sipvicious - Tools for auditing SIP based VoIP systems - Google Project Hosting</a><br />
<br />
<a href="file:///D:/Documents and Settings/sohilg434/Desktop/voip/Enumerating and Breaking VOIPv4.docx#_ednref7" target="_blank">[vii]</a> <a href="http://www.wireshark.org/" target="_blank">Wireshark · Go deep.</a><br />
<br />
<a href="file:///D:/Documents and Settings/sohilg434/Desktop/voip/Enumerating and Breaking VOIPv4.docx#_ednref8" target="_blank">[viii]</a> You can find this tool in Backtrack 5 at /pentest/voip/sipcrack/<br />
<br />
<a href="file:///D:/Documents and Settings/sohilg434/Desktop/voip/Enumerating and Breaking VOIPv4.docx#_ednref9" target="_blank">[ix]</a> <a href="http://ucsniff.sourceforge.net/" target="_blank">UCSniff: VoIP and IP Video Security Assessment Tool</a><br />
<br />
<a href="file:///D:/Documents and Settings/sohilg434/Desktop/voip/Enumerating and Breaking VOIPv4.docx#_ednref10" target="_blank">[x]</a> <a href="http://nmap.org/download.html" target="_blank">Download the Free Nmap Security Scanner for Linux/MAC/UNIX or Windows</a><br />
<br />
<a href="file:///D:/Documents and Settings/sohilg434/Desktop/voip/Enumerating and Breaking VOIPv4.docx#_ednref11" target="_blank">[xi]</a> <a href="http://metasploit.com/download/" target="_blank">Download Metasploit | Metasploit Project</a><br />
 <br />
 <br />
------------------------End----------------------------</blockquote>


<!-- attachments -->
	<div class="blogattachments">
		
		
		
			<fieldset class="blogcontent">
				<legend>Attached Images</legend>
				<ul>
					
				</ul>
			</fieldset>
		
		

	</div>
<!-- / attachments -->
]]></content:encoded>
			<dc:creator>sohil_garg</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=272</guid>
		</item>
		<item>
			<title>Social Engineering with SET</title>
			<link>http://garage4hackers.com/entry.php?b=229</link>
			<pubDate>Thu, 01 Sep 2011 07:55:22 GMT</pubDate>
			<description>*Introduction* 
 
It is a useful social engineering tool by David (ReL1k). It can be used to perform a number of Social Engineering attacks with...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore"><b>Introduction</b><br />
<div style="margin-left:40px"><br />
It is a useful social engineering tool by David (ReL1k). It can be used to perform a number of Social Engineering attacks with minimal effort. SET can be used with Metasploit to additionally perform metasploit's powerful post exploitation. This tool can be accessed through web interface or command line.</div><b>Prominent Uses</b><br />
<div style="margin-left:40px"> <br />
<ul><li style="">Gathering credentials</li><li style="">Shell spawning by browser exploits</li><li style=""> Mass mailing of malicious payloads to spawn shells</li><li style=""> Shell using USB autorun</li><li style=""> Anti-virus evasion through Payload Encoding</li></ul></div><b>Methods for Social Engineering</b><br />
 <div style="margin-left:40px"><ul><li style="">Credential Harvest by Spoofing website's identity</li><li style=""> Browser Tab nabbing</li><li style=""> Dropping Java applet payload</li><li style=""> Metasploit payload delivery usingUSB</li><li style=""> Custom email template and payload</li><li style="">Wireless attack using Rouge Access point setup</li></ul></div>These modes can be used to perform a Social engineering attack on victim. A combination of these could make attack more authentic.<br />
<br />
<b>SET Attack Vectors</b><br />
<div style="margin-left:40px"><b>Spear-Phishing Attack Vectors</b><br />
Can be used to send single or mass emails with malicious attachments.  Malicious file can be generated using the FileFormat payloads and create custom email messages.<br />
<b>Website Attack Vectors</b><br />
Can be used through a number of web browser based attacks for compromising the victim. The vector options include:<br />
<ul><li style="">Java Applet payload execution</li><li style="">Credential harvesting by website cloning</li><li style="">Credential harvesting by tabnabbing</li><li style="">Metasploit’s browser exploits</li></ul><br />
<br />
<b>Infectious Media Generator</b><br />
Used to generate a Metasploit exploit payload with options of providing archiving (zip or rar) and specific file type (doc, xls, ppt etc.). Generated attachment can be copied to CD/DVD/USB. Once CD/DVD/USB is inserted, it will execute the exploit (if autorun is enabled).<br />
<b>Teensy USB HID Attack Vector</b><br />
This attack vector is dependent on Teensy Hardware. Teensy device is programmed to be detected as keyboard rather than USB, thus bypassing USB restrictions. After Teensy is connected on victim, custom commands can be stored on the device storage and executed.<br />
<b>SMS Spoofing Attack Vector</b><br />
SMS spoofing attack vector can be used to spoof and send SMS to one or more victims. Delivered message contains a malicious link to steal credentials or perform other attacks by coaxing user.<br />
<b>Wireless Access Point Attack Vector</b><br />
Can be used to set up a rouge wireless access point, Spoof DNS and redirect all traffic to attacker <br />
<b>Third Party Modules</b><br />
This attack vector consists of Third party module - RATTE (Remote Administration Tool Tommy Edition) which is a HTTP tunneling payload.  This can be used in the same way as website attack vectors but with an added advantage of beating security mechanisms like local Firewall and IPS.</div><br />
<b>Attack Scenario</b><br />
<div style="margin-left:40px">Attacker creates a malicious link of cloned <a href="https://gmail.com" target="_blank">https://gmail.com</a> which is stored locally on server. Victim browses the link and the replica of gmail.com is opened. This triggers the java applet payload which is delivered on the victim’s browser. Victim is asked to accept the java applet’s warning. After, victim's acceptance the payload is executed. Payload opens a connection back to attacker’s IP address and port. Attacker has set up a listener to receive the payload connection. Now attacker can remotely capture keystrokes, upload backdoor and open command shell.</div>         <br />
<b>Demo</b><br />
<div style="margin-left:40px"><b>Step 1: </b>Attacker crafts a malicious link with following specification using the following features of SET:<br />
<ul><li style="">Web site phishing attack vector</li><li style="">Java Applet method for payload execution</li><li style="">SET custom shell with reverse TCP connection</li><li style="">Gmail as cloned web site</li></ul></div> <br />
<div style="margin-left:40px"><b>Step 2</b>:	Attacker entices the victim to browse the malicious link. This link will load the cloned web site (Gmail).</div><br />
<div style="margin-left:40px"><b>Step 3:	</b>Victim browses the link. The opened website is replica of Gmail.com (but with IP address of attacker in URL). This triggers to send payload on victim's browser (in form of Java applet).</div> <br />
<div style="margin-left:40px"><b>Step 4:</b> Attacker has already started the listener on its machine to receive connection when victim browses and runs the payload.</div> <br />
<div style="margin-left:40px"><b>Step5:</b> Victim accepts and runs the payload. Payload creates a connection back to attacker's machine. Attacker is embraced with a SET custom shell. As soon as the victim enters the credentials, the site is redirected to the original web site (i.e. gmail.com). A bunch of activities can be performed on victim:<br />
<ul><li style="">Keylogging</li><li style="">Uploading backdoor</li><li style="">Download file</li><li style="">Command Shell</li><li style="">reboot</li><li style="">Kill process</li><li style="">Grab system</li><li style="">Run persistent backdoor</li></ul>)</div> <br />
<div style="margin-left:40px"><b>Step 6:</b> Attacker runs the persistence command on victim’s machine. This command will initialize and start a random service and creates a backdoor on victim’s machine. Attacker can specify the IP address and port number on which the random service (started on victim’s machine) would try to connect back.</div> <br />
<div style="margin-left:40px">Persistence feature is very useful in scenario where attacker wants to connect to victim’s machine from some different IP address. Started service (on victim’s machine) will send a connect request to the attacker’s IP address every 30 min. This way attacker will have all time access to victim’s machine.<br />
When the attacker’s activity is over, the “removepersistence” command could be used to stop and remove the started service on victim’s machine.</div><br />
<div style="margin-left:40px"><b>Step 7: </b>Additionaly, attacker can start the key logging on victim’s machine with “keyscan_start” and “keyscan_dump” commands.<br />
If during any stage of exploit, Anti-virus detects or troubles the attacker’s activity, the ‘kill” command can be used to kill the process corresponding to Anti-virus.<br />
Also, command “local admin” or “domain admin” could be used to create users on victim’s machine.</div>	<br />
<b>Extended Usage</b><br />
<div style="margin-left:40px">Functionality of SET can be enhanced further using advanced features such as:<br />
<ul><li style="">USB payload using autorun</li><li style="">Fake Access point creation and traffic redirection with Wireless attack vector</li><li style="">Using Teensy  to execute custom payloads (where USB’s are disabled)</li><li style="">Mass mailing  self created attachments with payloads</li></ul></div><br />
<b>Extended Usage</b><br />
<div style="margin-left:40px"><ul><li style="">Functionality of SET can be enhanced further using advanced features such as:</li><li style="">USB payload using autorun</li><li style="">Fake Access point creation and traffic redirection with Wireless attack vector</li><li style="">Using Teensy  to execute custom payloads (where USB’s are disabled)</li><li style="">Mass mailing  self created attachments with payloads</li></ul></div>		<br />
<b>Conclusion</b><br />
<div style="margin-left:40px">Social Engineer Toolkit is a powerful tool for a penetration tester/security enthusiast. This tool includes attack vectors for Social Engineering ranging from malicious link, email templates, custom payloads, tabnabbing, wireless etc. It supports a variety of payloads and shell (Meterpreter or SET custom shell).</div></blockquote>


<!-- attachments -->
	<div class="blogattachments">
		
		
		
			<fieldset class="blogcontent">
				<legend>Attached Images</legend>
				<ul>
					
				</ul>
			</fieldset>
		
		

	</div>
<!-- / attachments -->
]]></content:encoded>
			<dc:creator>sohil_garg</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=229</guid>
		</item>
	</channel>
</rss>
