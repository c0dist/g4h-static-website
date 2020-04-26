<?xml version="1.0" encoding="ISO-8859-1"?>

<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:content="http://purl.org/rss/1.0/modules/content/">
	<channel>
		<title>Garage4hackers Forum - Blogs - Godwin Austin</title>
		<link>http://garage4hackers.com/blog.php?u=19</link>
		<description>Garage4Hackers(G4H) is an open security community for Information Security enthusiasts, gurus and aspirants.Members of the team dedicate time and resources towards helping other information security aspirants, sharing knowledge,spreading security awareness and promoting research.</description>
		<language>en</language>
		<lastBuildDate>Sun, 22 Mar 2020 12:32:48 GMT</lastBuildDate>
		<generator>vBulletin</generator>
		<ttl>60</ttl>
		<image>
			<url>http://garage4hackers.com/images/misc/rss.jpg</url>
			<title>Garage4hackers Forum - Blogs - Godwin Austin</title>
			<link>http://garage4hackers.com/blog.php?u=19</link>
		</image>
		<item>
			<title>Collective Intelligence Framework – An awesome and pretty useful project</title>
			<link>http://garage4hackers.com/entry.php?b=3114</link>
			<pubDate>Wed, 18 Mar 2015 09:08:02 GMT</pubDate>
			<description>Hello Hackers! 
  
How are you doing? 
I am here today to shed some light on a nice and open source project called Collective Intelligence Framework...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">Hello Hackers!<br />
 <br />
How are you doing?<br />
I am here today to shed some light on a nice and open source project called Collective Intelligence Framework (CIF).<br />
<br />
About 70 % of internet traffic is …. Wait for it …. SPAM! If you don’t believe me, install a service honeypot, give it about 10 minutes and then see the magic. Or get your machine direct public interface and start TCPDump.<br />
<br />
The internet if full of crap / awesome stuff (in the eye of the beholder) like exploit kits, botnet C&amp;Cs, phishing frameworks etc. If one checks out the behavioral patterns of a specific IP address over time, one can surely identify traits of phases in malware propagation campaigns. This project simply keeps taking intelligence data from various sources and stores it into database. These sources could be public or private. With default installation there are about 15 to 17 public data sources. You can surly add your own by writing up a simple plugin.<br />
<br />
So in my current CIF instance, what sources do I have? Here is a list. All these are open source publically available sources. Planning to install a bunch of honeypots to create private feeds.<br />
<br />
<br />
<ul><li style="">Spyeye Tracker (abuse.ch)</li><li style="">Zeus Tracker (abuse.ch)</li><li style="">Feodo Tracker (abuse.ch)</li><li style="">Spamhaus</li><li style="">Shadowserver</li><li style="">Phishtank</li><li style="">OpenBL</li><li style="">BruteForceBlocker (danger.rulez.sk)</li><li style="">Threat Expert</li><li style="">Malware Blacklist</li><li style="">Malware Domains</li><li style="">Malware Domain List</li><li style="">Malc0de</li><li style="">Dragon Research Group</li><li style="">Clean MX </li></ul><br />
<br />
My instance runs downloads from some of these sources every hour and every day for rest of them. One can query the CIF database and get results. As CIF is holding historical data too, one can go back in history as back as the age of the CIF instance. <br />
<br />
So what things can we query to the CIF database? Here is a list.<br />
<br />
<br />
<ul><li style="">IP address</li><li style="">Domain Name</li><li style="">Malware Hash (MD5 / SHA1 / UUID)</li><li style="">CIDR Notation</li><li style="">URI </li></ul><br />
<br />
Alright, so in what formats do we get the output? Again, here is the list.<br />
<br />
<br />
<ul><li style="">Bind Zone</li><li style="">Bro</li><li style="">CSV</li><li style="">HTML</li><li style="">JSON</li><li style="">PcapFilter</li><li style="">Snort</li><li style="">IPTables</li><li style="">Table (Default) </li></ul><br />
<br />
Well this has been about what one as a user can inquire about. But there is more to it. One can also make the system to shell out much updated lists. For your amusement, again…. Here is a list.<br />
<br />
One can get lists of IP addresses / URLs / Domains / Email Addresses belonging to<br />
<br />
<br />
<ul><li style="">Botnets</li><li style="">Scanners</li><li style="">Phishing pages</li><li style="">Spammers</li><li style="">Spamvertisers</li><li style="">Fastflux Botnets</li><li style="">Waraz</li><li style="">Showing suspicious behavior</li><li style="">Showing malware presence </li></ul><br />
<br />
If you are interested to know more about the project, you can visit the Google Code project link <a href="https://code.google.com/p/collective-intelligence-framework/" target="_blank">here</a><br />
I thank Wes Young and team for developing this awesome project and moreover making it open source.<br />
 <br />
Ro(Ha)ck on !<br />
 <br />
--<br />
 <br />
Godwin Austin</blockquote>

]]></content:encoded>
			<dc:creator>Godwin Austin</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=3114</guid>
		</item>
		<item>
			<title>Why do we love penetration testing (And you should too!)</title>
			<link>http://garage4hackers.com/entry.php?b=3078</link>
			<pubDate>Thu, 14 Aug 2014 10:46:42 GMT</pubDate>
			<description>Aloha readers! 
  
Why do we love penetration testing? The question could be either answered in a couple of words or a book can be written on the...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">Aloha readers!<br />
 <br />
Why do we love penetration testing? The question could be either answered in a couple of words or a book can be written on the topic. But for the sake of sanity, let’s stick to a few words. For the muggles reading this post, here is the definition of penetration testing.<br />
 <br />
“A <b>penetration test</b>, or the short form pentest, is an attack on a computer system with the intention of finding security weaknesses, potentially gaining access to it, its functionality and data”<br />
                -Wikipedia<br />
 <br />
A penetration testing assignment gives you a chance to commit a wide variety of sins and still keeps your karma safe. You could break into people’s computers, cheat, lie, con and sneak your way into something juicy, play a criminal mastermind and get paid for it without risking jail time and without feeling the guilt of your deeds. (Works for people who are not bloody sociopaths!)<br />
Dealing with different penetration tests is a pretty exiting journey. It will shake your basic misconceptions, challenge your skills and intelligence, and provide a lot of elixir of life to make you want to keep going on. More importantly, and end of day, you get satisfaction of having done something good with your time.<br />
 <br />
Professionally, it’s a good and steady paying job profile with enormous opportunities ahead. You can grow to be a malware researcher, threat researcher, vulnerability researcher, a process guy and whatever else gives you an adrenaline rush.<br />
 <br />
In today’s scenario, penetration testing skills give you a legal way of making some extra bucks too. A lot of people want to get their products tested for security bugs. For that they keep open bug bounty programs. It’s a good opportunity for penetration testers to try their kung-fu, keep up with new vulnerabilities and attack techniques and make some good money while doing so.<br />
 <br />
Well, all of it cannot be goody-goody like it has been sounding till now. Of course, there are some boring parts of it. For example, writing the report of your endeavors could be boring. Explaining an exploit to your dumbass client could be really frustrating. Keeping up with your skillset and bashing your head against a hardened target could become really addictive. But overall, in the comparison, it’s better than good.<br />
 <br />
Anyways, in a nutshell, the answer for why do I like penetration testing is pretty simple and straightforward. I do it because I am a criminal mind with a good morale and conscience.<br />
 <br />
Ro(Ha)ck On !!<br />
 <br />
--<br />
 <br />
Godwin Austin</blockquote>

]]></content:encoded>
			<dc:creator>Godwin Austin</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=3078</guid>
		</item>
	</channel>
</rss>
