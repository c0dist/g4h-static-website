<?xml version="1.0" encoding="ISO-8859-1"?>

<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:content="http://purl.org/rss/1.0/modules/content/">
	<channel>
		<title>Garage4hackers Forum - Blogs - Pranav venkat</title>
		<link>http://garage4hackers.com/blog.php?u=25548</link>
		<description>Garage4Hackers(G4H) is an open security community for Information Security enthusiasts, gurus and aspirants.Members of the team dedicate time and resources towards helping other information security aspirants, sharing knowledge,spreading security awareness and promoting research.</description>
		<language>en</language>
		<lastBuildDate>Sun, 22 Mar 2020 10:39:49 GMT</lastBuildDate>
		<generator>vBulletin</generator>
		<ttl>60</ttl>
		<image>
			<url>http://garage4hackers.com/images/misc/rss.jpg</url>
			<title>Garage4hackers Forum - Blogs - Pranav venkat</title>
			<link>http://garage4hackers.com/blog.php?u=25548</link>
		</image>
		<item>
			<title>Command Injection in #Google for which I got 6000$</title>
			<link>http://garage4hackers.com/entry.php?b=3139</link>
			<pubDate>Wed, 16 Mar 2016 08:34:00 GMT</pubDate>
			<description><![CDATA[Hey all , 
 
Few months back I found a command injection bug in Google Cloud shell  
 
Since the title goes by the name "command injection" , you all...]]></description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">Hey all ,<br />
<br />
Few months back I found a command injection bug in Google Cloud shell <br />
<br />
Since the title goes by the name &quot;command injection&quot; , you all might be thinking it as &quot;normal Command injection which affects servers&quot;  but this vulnerability is quite different.<br />
We can put this in different way as &quot;Client Side command injection&quot;.<br />
<br />
Lets get into the finding<br />
<br />
While I was testing &quot;console.cloud.google.com&quot; , There was one url with this pattern<br />
<br />
https://console.cloud.google.com/home/dashboard?project=&quot;name of the project&quot; <br />
<br />
Ok thats cool :v , <br />
<br />
Tested for IDOR ,<br />
<br />
Crafted the url as<br />
https://console.cloud.google.com/home/dashboard?project=&quot;Random project name&quot;<br />
<br />
Eg:<br />
<a href="https://console.cloud.google.com/home/dashboard?project=project-1" target="_blank">https://console.cloud.google.com/hom...ject=project-1</a>  (not vulnerable to IDOR)<br />
<br />
But reflected the name of project in Cloud shell.<br />
<br />
<br />
So Tested for XSS ,<br />
<br />
Crafted the url as <br />
https://console.cloud.google.com/home/dashboard?project=&quot;XSS vector&quot; (not vulnerable to XSS)<br />
<br />
On activating cloud shell &quot;there was some syntax error&quot;<br />
<br />
Now the creepy mind of  mine came with idea :P to use delimiter ,<br />
<br />
Crafted the url as ,<br />
<a href="https://console.cloud.google.com/home/dashboard?project=;" target="_blank">https://console.cloud.google.com/hom...oard?project=;</a><br />
<br />
There was no syntax error , and  cloudshell created successfully!<br />
<br />
In linux we can chain commands using semi colon operator , <br />
<br />
To make this as exploitable issue , I came with these ideas,,<br />
<br />
Crashing Victim vm :<br />
<br />
<a href="https://console.cloud.google.com/home/dashboard?project=;sudo" target="_blank">https://console.cloud.google.com/hom...?project=;sudo</a> cp /dev/zero /dev/mem<br />
Once victim access the above url and click &quot;Activate cloud shell&quot; , his/her vm crashes.<br />
<br />
<br />
Deleting files: (this one had much impact than previous command)<br />
<br />
<a href="https://console.cloud.google.com/home/dashboard?project=;sudo" target="_blank">https://console.cloud.google.com/hom...?project=;sudo</a> rm -rf /  <br />
This will delete victims root directory which also deletes appengine files!<br />
<br />
According to my research: Once the victim access the crafted url , Victim must click &quot;Activate cloud shell&quot; , in order to make the attack successful!<br />
<br />
For more details and poc:<br />
<br />
You can refer here-&gt;<br />
<br />
<a href="http://www.pranav-venkat.com/2016/03/command-injection-which-got-me-6000.html" target="_blank">http://www.pranav-venkat.com/2016/03...t-me-6000.html</a><br />
<br />
a</blockquote>

]]></content:encoded>
			<dc:creator>Pranav venkat</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=3139</guid>
		</item>
	</channel>
</rss>
