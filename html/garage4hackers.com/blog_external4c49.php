<?xml version="1.0" encoding="ISO-8859-1"?>

<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:content="http://purl.org/rss/1.0/modules/content/">
	<channel>
		<title>Garage4hackers Forum - Blogs - vigneshkumarmr</title>
		<link>http://garage4hackers.com/blog.php?u=4192</link>
		<description>Garage4Hackers(G4H) is an open security community for Information Security enthusiasts, gurus and aspirants.Members of the team dedicate time and resources towards helping other information security aspirants, sharing knowledge,spreading security awareness and promoting research.</description>
		<language>en</language>
		<lastBuildDate>Sun, 22 Mar 2020 12:59:39 GMT</lastBuildDate>
		<generator>vBulletin</generator>
		<ttl>60</ttl>
		<image>
			<url>http://garage4hackers.com/images/misc/rss.jpg</url>
			<title>Garage4hackers Forum - Blogs - vigneshkumarmr</title>
			<link>http://garage4hackers.com/blog.php?u=4192</link>
		</image>
		<item>
			<title>Open-Redirect Vulnerability in Flipkart by SecurityPrimes</title>
			<link>http://garage4hackers.com/entry.php?b=533</link>
			<pubDate>Tue, 20 Nov 2012 06:27:36 GMT</pubDate>
			<description>Attachment 562 (http://garage4hackers.com/attachment.php?attachmentid=562) 
 
*What is Open-Redirect Vulnerability? * 
 
  An open redirect is an...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore"><img src="http://garage4hackers.com/attachment.php?attachmentid=562&amp;d=1353392611" border="0" alt="Name:  200px-Flipkart_india.png
Views: 4182
Size:  8.6 KB"  style="float: CONFIG" /><br />
<br />
<b>What is Open-Redirect Vulnerability? </b><br />
<br />
  An open redirect is an application that takes a parameter and redirects a user to the parameter value without any validation. This vulnerability is used in phishing attacks to get users to visit malicious sites without realizing it.<br />
<br />
For more info , visit : <a href="https://www.owasp.org/index.php/Open_redirect" target="_blank">https://www.owasp.org/index.php/Open_redirect</a><br />
<br />
Ok. Now to the issue, we came across a link from FlipKart which is :<br />
<br />
 <a href="http://www.flipkart.com/ol?link=http://blog.flipkart.com" target="_blank">http://www.flipkart.com/ol?link=http...g.flipkart.com</a> <br />
<br />
where the parameter actually meant to redirect the users to FlipKart's Blog (blog.flipkart.com). So we tried replacing the parameter with <a href="http://fake.com" target="_blank">FAKE LANDSCAPES - the artificial plant company</a> which then becomes:<br />
<br />
<a href="http://www.flipkart.com/ol?link=http://fake.com" target="_blank">www.flipkart.com/ol?link=http://fake.com</a><br />
<br />
But Flipkart prevented the attack by taking the victim correctly to <a href="http://flipkart.com" target="_blank">Online Shopping India - Buy Books, Mobile Phones, Digital Cameras, Laptops, Watches &amp; Other Products @ FlipKart</a>. Epic fail.!! <br />
<br />
Wait!! It's not over. We continued with changing the parameters. This time, we threw some thing that looked meaningful. Now the parameter is <a href="http://fakeflipkart.com" target="_blank">http://fakeflipkart.com</a> which then becomes:<br />
<br />
<a href="http://www.flipkart.com/ol?link=http://fakeflipkart.com" target="_blank">www.flipkart.com/ol?link=http://fakeflipkart.com</a><br />
<br />
Whoolaa.!! Bypassed the system.!! It was because of generic regular expression match functioned by Flipkart. The victim is so redirected to <a href="http://fakeflipkart.com" target="_blank">http://fakeflipkart.com</a> (Note: At the time of writing this, there was no such domain registered with that domain name. It's totally for a POC).<br />
<br />
So in real attack, the attacker could host  a fake Flipkart login page(Phishing) in his own domain and could steal user credentials. <br />
<br />
The Team Security Primes reported this issue to Flipkart on November 19, 2012 and the fix was up the very same day.<br />
<br />
Thanks to SecurityPrimes.</blockquote>

]]></content:encoded>
			<dc:creator>vigneshkumarmr</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=533</guid>
		</item>
	</channel>
</rss>
