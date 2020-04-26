<?xml version="1.0" encoding="ISO-8859-1"?>

<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:content="http://purl.org/rss/1.0/modules/content/">
	<channel>
		<title>Garage4hackers Forum - Blogs - rishabhd</title>
		<link>http://garage4hackers.com/blog.php?u=315</link>
		<description>Garage4Hackers(G4H) is an open security community for Information Security enthusiasts, gurus and aspirants.Members of the team dedicate time and resources towards helping other information security aspirants, sharing knowledge,spreading security awareness and promoting research.</description>
		<language>en</language>
		<lastBuildDate>Sun, 22 Mar 2020 12:07:03 GMT</lastBuildDate>
		<generator>vBulletin</generator>
		<ttl>60</ttl>
		<image>
			<url>http://garage4hackers.com/images/misc/rss.jpg</url>
			<title>Garage4hackers Forum - Blogs - rishabhd</title>
			<link>http://garage4hackers.com/blog.php?u=315</link>
		</image>
		<item>
			<title>BSNL router hacking and possibility of running custom code over it</title>
			<link>http://garage4hackers.com/entry.php?b=223</link>
			<pubDate>Mon, 15 Aug 2011 08:22:17 GMT</pubDate>
			<description><![CDATA[On a lonely weekend on my android, I was actually bored courtesy of BSNL, a connection that seldom connects, translates to AT&T of India, bad...]]></description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">On a lonely weekend on my android, I was actually bored courtesy of BSNL, a connection that seldom connects, translates to AT&amp;T of India, bad service, no customer support at 1957 and flapping issues in links. Nevertheless I decided to mess a bit with BSNL ADSL router.<br />
<br />
BSNL router on closer inspection is manufactured by SEMIndia and distributed by ITI. It follows the ****** of using firmware of different routers (Broadcom to be specific, BCM96338 stands for Broadcom router firmware version 96338, deployed in US robotics ones and some other popular routers). mine is DNA-A211-1 , one of most popular ones in India.<br />
<br />
What I did : <br />
<br />
<ul><li style="">Accessed router</li><li style="">Found it ran busybox,</li><li style="">Explored it, getting access to passwords (CVS/router/admin).</li><li style="">Found which directories were writable</li><li style="">Wrote a file at writable area</li><li style="">Discussed the possibility of running code over it.</li><li style="">HTML pages that might be vulnerable to XSS/CSRF</li></ul><br />
<br />
Observations - <br />
<br />
<ul><li style="">Observation 1 #  - code can be run over the router , but files must be copied using echo (-ne with append option)  or tftp.  Since busybox is there, we can easily insert a kernel module to be run.</li><li style="">Observation 2# -  the webs directory has a lot of html files, maybe manipulated for xss attacks (i didnt covered it as its not my domain, some better guys can do it)</li><li style="">Observation 3# - private CVS credentials of Siemindia pserver. insider attack ? :D kidding. pserver is already much insecure, but since i have seen a lot of organisations using stock/easily guessable passwords for their outer router/firewalls/vpn servers, its not a tough nut to crack.</li><li style="">Observation 4# (most important) - BSNL SUCKS !</li></ul><br />
<br />
original thread - <a href="http://www.theprohack.com/2011/08/bsnl-router-hacking-and-possibility-of.html" target="_blank">Prohack</a><br />
<br />
best regards</blockquote>

]]></content:encoded>
			<dc:creator>rishabhd</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=223</guid>
		</item>
	</channel>
</rss>
