<?xml version="1.0" encoding="ISO-8859-1"?>

<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:content="http://purl.org/rss/1.0/modules/content/">
	<channel>
		<title>Garage4hackers Forum - Blogs - the_empty</title>
		<link>http://garage4hackers.com/blog.php?u=22</link>
		<description>Garage4Hackers(G4H) is an open security community for Information Security enthusiasts, gurus and aspirants.Members of the team dedicate time and resources towards helping other information security aspirants, sharing knowledge,spreading security awareness and promoting research.</description>
		<language>en</language>
		<lastBuildDate>Sun, 22 Mar 2020 10:45:44 GMT</lastBuildDate>
		<generator>vBulletin</generator>
		<ttl>60</ttl>
		<image>
			<url>http://garage4hackers.com/images/misc/rss.jpg</url>
			<title>Garage4hackers Forum - Blogs - the_empty</title>
			<link>http://garage4hackers.com/blog.php?u=22</link>
		</image>
		<item>
			<title>Top 7 “Things” Every Penetration Tester Should Use</title>
			<link>http://garage4hackers.com/entry.php?b=3079</link>
			<pubDate>Sun, 17 Aug 2014 10:33:33 GMT</pubDate>
			<description>After a long time pinning something down. Disclaimer: Views are mine, based on my experience and knowledge, suggestions to improvise would be...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">After a long time pinning something down. Disclaimer: Views are mine, based on my experience and knowledge, suggestions to improvise would be appreciated. <br />
<br />
So, Penetration testing, with information security getting closer to become the center of the world, pentesting has become integral part of our lives. The life of security folks. No matter how many times you secure the network, it manages to get back in jeopardy. Sometimes we just want it to stay secure. So the pentest to the rescue - <br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=747&amp;d=1408269304" border="0" alt="Name:  One.jpg
Views: 974
Size:  19.5 KB"  style="float: CONFIG" /><br />
<br />
This write up is about top 7 “things” a pentester should use (in my opinion)… And why 7….. Because it’s the most magical number... Dint workout for Voldy but still it is.<br />
<br />
1.	<b>PenTesting / exploiting Frameworks</b> - Pentesting frameworks are tools designed to help you perform almost all of the pentesting related stuff from one console. Yes you could do host discovery as efficiently as firing up an exploit to penetrate and post exploitation as well. While the free/community editions for state-of-the-art frameworks like Metasploit are available, spending some money will get you all latest updates with proprietary exploits and all. Some of the good ones are Metasploit and core impact.<br />
<br />
<br />
2.	<b>Web App Scanners</b> –When pentesting, the best thing to attack is the web apps. Web apps will get you hell more chances of penetration than anything else. So have some web scanners in your arsenal. These scanners will scan the target applications for web related vulnerabilities. There are many good scanners available out there like Netsparker, ZAP, Acunetix, SQLmap, SQLninja, Arachni, Burp Scanner, IronWASP. The list will go on and on but the best part is, many of them are just free.<br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=748&amp;d=1408269400" border="0" alt="Name:  netsparker-50x50.jpg
Views: 958
Size:  1.5 KB"  style="float: CONFIG" /> <img src="http://garage4hackers.com/attachment.php?attachmentid=749&amp;d=1408269547" border="0" alt="Name:  portswigger-logo.gif
Views: 944
Size:  4.7 KB"  style="float: CONFIG" /><br />
<br />
3.	<b>Vulnerability Scanners</b> – As the name suggests, vulnerability scanners scan targets for known vulnerabilities. Well… they are a little boring cause they take out the fun of hunting. However, timesavers for pentesters. Scanners may not give you direct access to anything but will help you find most of the known weaknesses that you can target or at least gain useful information to define plan of attack. Scanners like OpenVAS are awesome because they are absolutely free. While Nessus, Nexpose and Retina provide more stable and regular updates, community editions have some limitations we may not like. Again spending some money will give you benefits which shall help not only in scanning part but in the reporting part as well. Yes a pentester has to report.<br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=745&amp;d=1408268167" border="0" alt="Name:  04_old8.png
Views: 1094
Size:  12.6 KB"  style="float: CONFIG" /> <img src="http://garage4hackers.com/attachment.php?attachmentid=750&amp;d=1408269693" border="0" alt="Name:  Nessus.jpeg
Views: 966
Size:  4.8 KB"  style="float: CONFIG" /><br />
<br />
<br />
4.	<b>Pentesting Distro</b> - For now backtrack / Kali Linux  are the only two names that come to my mind because those are the ones I have ever used. These distros are compilation of almost everything you will need while doing any security testing related work. Ranging from everyday vulnerability scanning to wireless cracking to password cracking to radio testing to hardware programming to exploitation to reverse engineering to social engineering to the end of the road. And these are not the only two out there. There is Knoppix STD, Blackbuntu, NodeZeore and many more. The reason they are all Linux is for one… well it’s undeniably awesome and second it gives you flexibility to do whatever you want with it. For beginners, these distros could help saving time of gathering, compiling and installing tools. But again where is fun in using something ready made. Having said that<br />
<br />
<br />
<br />
5.	<b>Google / Shodan</b> – I could have said search engines but that would be unfair. These two are like the clock of “visibility”. What can I say about Google. Google dorks lets you search for vulnerable targets and so does Shodan. With correct use of Google you may skip many steps of pentesting ranging from port scanning, vulnerability scanning to exploitation itself. I have seen cases of hackers/testers gaining access to critical machines by using information they discovered from Google alone. Austin and FB1H2S must have something to add here. So yes… Google is one of the Top things in my opinion that will help you perform PT every single time.<br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=751&amp;d=1408269967" border="0" alt="Name:  hackEr_google.jpg
Views: 972
Size:  22.7 KB"  style="float: CONFIG" /><br />
<br />
6.	<b>Nmap and Netcat</b> – I can bet that Batman has these two in his utility belt and Tony Stark has integrated these in Jarvis. Nmap… the best port scanner out there. Helps you do port scanning, banner grabbing, checking for some vulnerability signatures and lot more. The mighty of this king can be understood by the fact that there are entire video courses dedicated to teach usage of this one single tool. And netcat… while I see a smile on B0nd’s face, I would like to tell you all,, this tool... in time has proven to be the most power fool tool for hackers. The limits to its usage depend upon the creativity of user’s brain. There must be a reason why its called the Swiss knife of soldiers. Though it just allows connecting to a remote port and reading from / writing data to it, it has lot more capabilities. Read this if you don’t trust me – “<a href="http://www.exploit-db.com/wp-content/themes/exploit/docs/290.pdf" target="_blank">From Boot to Remote Root</a>”<br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=752&amp;d=1408270200" border="0" alt="Name:  nmap.jpg
Views: 944
Size:  64.5 KB"  style="float: CONFIG" /><br />
<br />
<br />
7.	<b><font color="#FF0000">Brain</font></b> – Yes you have to use it. Brainy has always been the new sexy. The reason why I had to put it in this list is because through my experience I have seen pentesters becoming slaves of tools. Running tools, getting results, firing exploits if available and done. Hacking is not just computes or science. It is art and hackers are artists.  What makes them different is their way of thinking and thirst for learning. Unless you can think out of the box and keep learning, you cannot perform a pentest that “simulates” real life hack. So, do whatever you want, use whatever tool you want, make sure you are putting your thought in it. Everything is an attack vector so treat it like that. With your brain and probably nmap and netcat alone, one can hack into targets. There are hell lot of examples for this claim. But to be able to do so, learn, learn and keep learning. <br />
<br />
I  don't feel like putting any image for brain.. so here is a squirrel of Randall's from XKCD <img src="http://garage4hackers.com/attachment.php?attachmentid=753&amp;d=1408270766" border="0" alt="Name:  squirrel_2.png
Views: 934
Size:  5.1 KB"  style="float: CONFIG" /><br />
<br />
One important thing, top stuff never completes the pyramid. So when you are performing a pentest, there will be hundred more things to look for and every tools and technique that’s not mentioned here may prove important at one or other time. So, as keep learning and keep sharing. And note that nmap and netcat are like infinity gems with infinite powers and so can be your power of thinking ....<br />
<br />
<br />
Over and out<br />
<br />
Regards,<br />
<br />
The_Empty_Parenthesis( )</blockquote>


<!-- attachments -->
	<div class="blogattachments">
		
		
			<fieldset class="blogcontent">
				<legend>Attached Images</legend>
				
			</fieldset>
		
		
		

	</div>
<!-- / attachments -->
]]></content:encoded>
			<dc:creator>the_empty</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=3079</guid>
		</item>
		<item>
			<title>Story of a PoC - F5 BIG-IP Cookie Information Disclosure</title>
			<link>http://garage4hackers.com/entry.php?b=29</link>
			<pubDate>Thu, 26 Aug 2010 13:38:06 GMT</pubDate>
			<description>---Quote (Originally by the_empty)--- 
Curiosity is the biggest virtue of a hacker’s mindset. Only because curiosity people like me loose focus of...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore"><div class="bbcode_container">
	<div class="bbcode_quote">
		<div class="quote_container">
			<div class="bbcode_quote_container"></div>
			
				<div class="bbcode_postedby">
					<img src="images/misc/quote_icon.png" alt="Quote" /> Originally Posted by <strong>the_empty</strong>
					<a href="showthread.php?p=712#post712" rel="nofollow"><img class="inlineimg" src="images/buttons/viewpost-right.png" alt="View Post" /></a>
				</div>
				<div class="message"><span style="font-family: Verdana">Curiosity is the biggest virtue of a hacker’s mindset. Only because curiosity people like me loose focus of the actual target and run behind the OTHER things. (Anyways, they are more interesting)<br />
<br />
Similar thing happened while I was Pen testing some Web servers which were running behind a load balancer. Nessus was showing some vulnerability associated with load balancer through which it was able to figure out the internal IP of the target server. I read about the vulnerability but was not able to manually test it. Now instead of completing the project in given time, I kept going deeper into the finding and had to stay in office up-to 2 AM just to complete the work. I want to share what ever I learnt, hope you find it useful and interesting.<br />
<br />
Little Bit of LOAD BALANCING<br />
<br />
Load balancing is a technique to distribute workload across number of servers, network links and other hardware resources in order to achieve optimal resource utilization and maximum throughput. It also serves the cause to avoid any overload and service outage.<br />
<br />
Server farms achieve high scalability and high availability through server load balancing, a technique that makes the server farm appear to clients as a single server. In general, server load balancing architectures are of two main types:<br />
<br />
1. Transport-level load balancing such as the DNS-based approach or TCP/IP-level load balancing which acts independently of the application payload.<br />
<br />
2. Application-level load balancing which uses the application payload to make load balancing decisions.<br />
<br />
Load balancing can further be classified into two types namely software-based and hardware based load balancers. Hardware based load balancers are used in transport level load balancing as they are faster than software based ones. On the other hands software based load balancers run on standard operating systems and hardware components (PCs).<br />
<br />
In this case we will look into a vulnerability associated with an application level load balancer named F5 Big IP. For balancing the load between the servers this load balancer uses a technique called &quot;Load Balancing using Cookie injection&quot;. The load balancer checks if the request contains a specific load balancing cookie. If the cookie is not found, a server is selected using a distribution algorithm such as round-robin. A load balancing session cookie is added to the response before the response is sent. When the browser receives the session cookie, the cookie is stored in temporary memory and is not retained after the browser is closed. The browser adds the cookie to all subsequent requests in that session, which are sent to the load balancer. By storing the server slot as cookie value, the load balancer can determine the server that is responsible for this request (in this browser session).<br />
<br />
Now to talk about F5 Big IP Load balancer, to maintain the session between the client and allotted server it encodes the internal IP and the port being used for the session, stores it into the cookie and injects that into the client browser.<br />
<br />
When scanned, Nessus reports the vulnerability with name &quot;F5 BIG-IP Cookie Information Disclosure&quot; and also gives the Internal IP and port that was used while Nessus ran its script. When I read bout the vulnerability, I was eager to verify it manually. So I connected to the target server and in response I received the cookie from the Big IP load balancer. Cookies contents were something like<br />
<br />
	Name: BIGipServerpool_reservations_80<br />
	Content : 940968458.20480.0000<br />
	Host : x.x.x.62<br />
	Path : /<br />
<br />
When I read it, first thought that came to my mind was Nessus gave away a false positive. But then I observed that Nessus was not only detecting the vulnerability but also was able to find out the Internal IP which it was displaying in the result section.<br />
<br />
So, to go into little deeper I thought capturing the traffic at wire level while scanning might help somehow. So I started Wireshark and realized that running scan on an IP and analyzing the capture file for the needed result is like moving a mountain. Only option left for me was to run the .nasl script for this plugin and capture the traffic of it. So finally I meet the requirement to run a nasl script individually. I did searched on Google and found out how to do it on BT.<br />
<br />
For this we need to move to the directory where Nessus plugins are located which in case of Linux is<br />
<br />
opt/nessus/lib/nessus/plugins/<br />
<br />
From here we need to run the particular script which in this case is bigip_cookie.nasl<br />
<br />
I used the following command to run the script while being in the above mentioned directory<br />
<br />
/opt/nessus/bin/nasl -t x.x.x.62<br />
<br />
In result the script only displayed “successful”, nothing else. So I changed my focus to the data captured by wireshark. Through all the streams I was able to see nothing but similar data that I saw in the cookie. No Internal IP, no port and nothing. This was the time when I started getting annoyed, anxious and curious at the same time. (And also when my boss realised that the project will be delayed :P)<br />
<br />
So with all my frustration and curiosity I now opened the nasl script in editor and read the script. I observed that the script was trying to initiate a connection with the target and was capturing the cookie recieved in the response. Then the script parsed the cookie to find the string “BIGipServerpool” in order to confirm that cookie belongs to Big IP. From the contents of the cookie it was reading the encoded number format (940968458.20480.0000) which was supposed to be the IP. With some weird mathematics the script was able to decode the number and find out the Internal IP.<br />
<br />
I tried several techniques to decode the IP manually. I even tried using code part from the .nasl script but zero was all that I got in return.<br />
<br />
Now to understand what that script was doing exactly I read little bit about .nasl scripting. (Vijay Mukhi has written a small but very useful guide to start with nasl scripting). I kept putting a printing statement for every variable the script was using after every calculation. Then after I figured out (It took me nearly 3 hours) that from three partitions of the encoded string only first was containing entire IP and second was showing the encoded port number. For Example<br />
<br />
940968458	20480	0000<br />
(Encoded IP)   	(Port)<br />
<br />
It was very relaxing when I saw the output and understood how exactly it all was happening. But all that relaxation vanished when I realized that its nearly five o clock and I will now have to stay in office till midnight or even more to finish the remaining work of mine.<br />
<br />
After all of this I realised one more thing that till now I don’t have anything in hand which I can give as PoC of manual testing to the client. Here was when my boss also got actively intrested in this stuff. I explained him what all I have done so far and then he came up with an idea. He just took the code from nasl script which was doing the decoding stuff. Then he made a ruby script to do same stuff. Take the IP and port as input, connect, capture and parse the cookie and decode the IP and port from it. Only difference being that the script was giving output which shows us the Internal IP and the port being used.<br />
<br />
I ran that script in konsole and took the screenshot of output and made a PoC of that. That’s it. I am giving below the small script<br />
<br />
-----------------------------------------------------------------------------------------------------------------------------<br />
require 'net/http'<br />
require 'net/https'<br />
<br />
#~ puts &quot;\n###############################################  #\n&quot;  <br />
#~ puts &quot;F5 Big-IP Cookie information Disclosure\n&quot;<br />
#~ puts &quot;################################################\  n\n&quot;<br />
#~ puts &quot;\n&quot;<br />
#~ puts &quot;Usage: bigip_cookie &lt;IP Address&gt; &lt;port&gt;\n&quot;<br />
<br />
rrr = ARGV[0]<br />
ppp = ARGV[1]<br />
#~ puts rrr<br />
#~ puts ppp<br />
http = Net::HTTP.new(&quot;#{ARGV[0]}&quot;, ARGV[1])<br />
http.use_ssl = true<br />
path = '/'<br />
resp, data = http.get(path, nil)<br />
cookie = resp.response['set-cookie']<br />
IP_port = /BIGipServer([^=]+)=([0-9]+)\.([0-9]+)\.[0-9]+/<br />
m = IP_port.match(cookie)<br />
puts m[2]<br />
<br />
oct1 = (m[2].to_i &amp; 0x000000ff)<br />
<br />
oct2 = (m[2].to_i &amp; 0x0000ffff) &gt;&gt; 8<br />
<br />
oct3 = (m[2].to_i &amp; 0x00ffffff) &gt;&gt; 16<br />
oct4 = m[2].to_i &gt;&gt; 24<br />
port = (m[3].to_i &amp; 0x00ff) * 256 + (m[3].to_i &gt;&gt; 8)<br />
puts &quot;Cookie:  #{cookie}&quot;<br />
puts &quot;Internal IP is:  #{oct1}.#{oct2}.#{oct3}.#{oct4}&quot;<br />
puts &quot;Port is:  #{port}&quot;<br />
<br />
-----------------------------------------------------------------------------------------------------------------------------<br />
<br />
As soon as I got the PoC one more thought caught my mind. As the load balancer depends upon the cookie for maintaining the session, what will happen if we change the value of port in the cookie? Will the load balancer try to connect to the new port that we have given? Is it possible to do an internal port scan on the target IP with this idea? <br />
<br />
As I had to finish the project in given time, I kept this thought aside and finished the project nearly at midnight.<br />
<br />
Now to try all those things I will first have to find the Big IP load balancer running in this blue nowhere. Till then this question will keep haunting my mind.<br />
<br />
</span></div>
			
		</div>
	</div>
</div></blockquote>

]]></content:encoded>
			<dc:creator>the_empty</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=29</guid>
		</item>
	</channel>
</rss>
