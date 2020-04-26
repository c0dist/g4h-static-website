<?xml version="1.0" encoding="ISO-8859-1"?>

<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:content="http://purl.org/rss/1.0/modules/content/">
	<channel>
		<title>Garage4hackers Forum - Blogs - c0dist</title>
		<link>http://garage4hackers.com/blog.php?u=3283</link>
		<description>Garage4Hackers(G4H) is an open security community for Information Security enthusiasts, gurus and aspirants.Members of the team dedicate time and resources towards helping other information security aspirants, sharing knowledge,spreading security awareness and promoting research.</description>
		<language>en</language>
		<lastBuildDate>Sun, 22 Mar 2020 10:39:41 GMT</lastBuildDate>
		<generator>vBulletin</generator>
		<ttl>60</ttl>
		<image>
			<url>http://garage4hackers.com/images/misc/rss.jpg</url>
			<title>Garage4hackers Forum - Blogs - c0dist</title>
			<link>http://garage4hackers.com/blog.php?u=3283</link>
		</image>
		<item>
			<title>(CVE-2016-8856) Foxit Reader for Linux and Mac: Local Privilege Escalation Writeup</title>
			<link>http://garage4hackers.com/entry.php?b=3145</link>
			<pubDate>Thu, 20 Oct 2016 12:34:22 GMT</pubDate>
			<description>Hi guys, 
 
Recently, I stumbled on a very simple bug in Foxit Reader for Mac and Linux (From here on, just Foxit Reader). The vulnerability was...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">Hi guys,<br />
<br />
Recently, I stumbled on a very simple bug in Foxit Reader for Mac and Linux (From here on, just Foxit Reader). The vulnerability was caused by improper file permissions granted on core Foxit Reader's files on Linux and Mac systems. An attacker with a low privilege access could've exploited this vulnerability to elevate their privileges, execute commands as a higher privileged user, or both.<br />
<br />
The version affected were:<br />
<br />
Foxit Reader for Mac 2.1.0.0804 and earlier<br />
Foxit Reader for Linux 2.1.0.0805 and earlier<br />
Fixed version has been released and security bulletin is published here - <a href="https://www.foxitsoftware.com/support/security-bulletins.php" target="_blank">https://www.foxitsoftware.com/suppor...-bulletins.php</a>.<br />
<br />
The issue has been assigned CVE-2016-8856.<br />
<br />
I have written a detailed analysis on my blog here - <a href="https://c0d.ist/cve-2016-8856-foxit-reader-local-privilege-escalation-writeup/" target="_blank">https://c0d.ist/cve-2016-8856-foxit-...ation-writeup/</a>.<br />
<br />
Cheers,<br />
c0dist</blockquote>

]]></content:encoded>
			<dc:creator>c0dist</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=3145</guid>
		</item>
	</channel>
</rss>
