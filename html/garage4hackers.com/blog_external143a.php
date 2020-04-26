<?xml version="1.0" encoding="ISO-8859-1"?>

<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:content="http://purl.org/rss/1.0/modules/content/">
	<channel>
		<title>Garage4hackers Forum - Blogs - Anant Shrivastava</title>
		<link>http://garage4hackers.com/blog.php?u=598</link>
		<description>Garage4Hackers(G4H) is an open security community for Information Security enthusiasts, gurus and aspirants.Members of the team dedicate time and resources towards helping other information security aspirants, sharing knowledge,spreading security awareness and promoting research.</description>
		<language>en</language>
		<lastBuildDate>Sun, 22 Mar 2020 10:45:08 GMT</lastBuildDate>
		<generator>vBulletin</generator>
		<ttl>60</ttl>
		<image>
			<url>http://garage4hackers.com/images/misc/rss.jpg</url>
			<title>Garage4hackers Forum - Blogs - Anant Shrivastava</title>
			<link>http://garage4hackers.com/blog.php?u=598</link>
		</image>
		<item>
			<title>Database protection Techniques : a different prespective</title>
			<link>http://garage4hackers.com/entry.php?b=141</link>
			<pubDate>Tue, 28 Jun 2011 12:29:22 GMT</pubDate>
			<description>Tips for Db Security 
 
 
 Disclaimer : This post keeps in mind the web frontends and web applications based attacks on DB Servers in mind. 
  
 
1. ...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore"><div style="text-align: center;">Tips for Db Security<br />
<br />
</div> Disclaimer : This post keeps in mind the web frontends and web applications based attacks on DB Servers in mind.<br />
 <br />
<ol class="decimal"><li style=""> Any  Userid used for web     application connectivity should be clipped to  specific ip addresses     that could be localhost in case of same server  usage for Db and App     server. If two separate servers are used then clip  the user id (s)     with the application server ip address / hostname.  Keep a strick log of who access the id and when.</li><li style=""> 1st entry in user     /password data base should be a dummy entry with zero privilege and     could be used to act as honeypot too.</li><li style=""> Default accounts to be removed /     blocked.</li><li style=""> User Input validation should be a     3 step process.<br />
<ol class="decimal"><li style=""> Web Page / Client Side validation         : Jscript.</li><li style=""> Server (Application) : OWASP         ESAPI or custom functions ocould be used.</li><li style=""> DB: use PL/SQL functions to strip         input data.</li></ol><br /></li><li style=""> Another  good utility to keep in mind is DBA_USERS_WITH_DEFPWD : contains     list  of users with default passwords, and with 11g all default accounts are  locked.</li><li style=""> Web application developers should     be provided with 3 different user level access to be used inside web     application.<br />
<ol class="decimal"><li style=""> Read Access : user with access to         select query only.</li><li style=""> Write access: User with select         update and delete access</li><li style="">App_mod : access to write access         plus drop and trunk.</li></ol><br />
Developers need to make sure the proper user access is used as and when required.</li><li style="">Note  : I know a large number of developers might start crying on this that  this will increase their headache but then in long run this could turn  out to be a life saver.</li></ol><br />
Please post comments and suggestions on my main blog here <br />
<a href="http://blog.anantshri.info/database-protection-techniques-a-different-prespective/" target="_blank">http://blog.anantshri.info/database-...t-prespective/</a></blockquote>

]]></content:encoded>
			<dc:creator>Anant Shrivastava</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=141</guid>
		</item>
	</channel>
</rss>
