<?xml version="1.0" encoding="ISO-8859-1"?>

<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:content="http://purl.org/rss/1.0/modules/content/">
	<channel>
		<title>Garage4hackers Forum - Blogs - amolnaik4</title>
		<link>http://garage4hackers.com/blog.php?u=847</link>
		<description>Garage4Hackers(G4H) is an open security community for Information Security enthusiasts, gurus and aspirants.Members of the team dedicate time and resources towards helping other information security aspirants, sharing knowledge,spreading security awareness and promoting research.</description>
		<language>en</language>
		<lastBuildDate>Sun, 22 Mar 2020 10:47:23 GMT</lastBuildDate>
		<generator>vBulletin</generator>
		<ttl>60</ttl>
		<image>
			<url>http://garage4hackers.com/images/misc/rss.jpg</url>
			<title>Garage4hackers Forum - Blogs - amolnaik4</title>
			<link>http://garage4hackers.com/blog.php?u=847</link>
		</image>
		<item>
			<title>7 Reasons Why You Should Invest in Browser Fuzzing</title>
			<link>http://garage4hackers.com/entry.php?b=3076</link>
			<pubDate>Wed, 13 Aug 2014 05:01:10 GMT</pubDate>
			<description>Attachment 735 (http://garage4hackers.com/attachment.php?attachmentid=735) 
 
Fuzzing is the process to provide invalid, unexpected input to the...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore"><img src="http://garage4hackers.com/attachment.php?attachmentid=735&amp;d=1407905925" border="0" alt="Name:  fuzz.jpg
Views: 2668
Size:  17.5 KB"  style="float: CONFIG" /><br />
<br />
Fuzzing is the process to provide invalid, unexpected input to the application and monitors for crashes. The process can be automated or semi-automated. Fuzzing reveals security bugs which might missed during code audits.<br />
<br />
Fuzzing is the black-box approach which do not need any source code. After identifying input methods, one can send invalid, random inputs and look for a testcase which crashes application. <br />
<br />
I was involved in fuzzing browsers for some time and here are my reasons why you should start fuzzing:<br />
<br />
<b>1. Sense of Security</b><br />
	Fuzzing discovers security bugs. In case of browser fuzzing, the bugs found are Use-After-Free, heap Overflow, etc. Some of these bugs are capable of executing arbitrary code and can compromise victim's machine. Discovering these kind of bugs &amp; disclosure to the vendor to create patch ensures security of the application.<br />
	<br />
<b>2. Who wants Money</b><br />
	Bugs in browsers have huge value in the security world simply due to the fact that the one bug can own many victim as browsers are the most widely used application. There are compititions like Pwn2Own which focuses on Browser exploitation and have USD 100,000 as prize. Vendors like Google &amp; Firefox has their own bounty program for disclosing bugs to them. There are other vendors like ZDI, iDefense which pays you based ont the criticallity of the bug. Look at the price money for full exploits. Chrome &amp; Internet Explorer exploits can pay off from USD 80,000 till USD 200,000.<br />
(<a href="http://www.forbes.com/sites/andygreenberg/2012/03/23/shopping-for-zero-days-an-price-list-for-hackers-secret-software-exploits/" target="_blank">http://www.forbes.com/sites/andygree...ware-exploits/</a>)<br />
	<br />
<b>3. Can you code Javascript</b><br />
	Javascript is one of the main component in the browser. If you know javascript, it's easy to code a fuzzer for use-after-free &amp; heap overflow bugs. These fuzzers will generate testcases which can crash browsers. Using Javascript API, one can code a program to create elements, assign attributes to them, perform some operations like defining DOM ranges, exeuting execCommands, etc. The best part is you just need browser to code the stuff.<br />
	<br />
<b>4. Debugging - The new learning</b><br />
	Once you have a testcase which crashes browser, then comes the analysis part. Debuggers like windbg, Immunity Debugger helps you to understand the cause of the bug and to find the exploitibily. Knowledge of the assembly language is essential for this. Things like LFH, heap spray will help you to take control of dangling pointer in case of UAF vulnerbality. This is all new path of new learning and exploring things in low-level language. If you think you done with the things you working on for long time and like to take challenges, learning assembly, debugging techniques gives you completely new learning stage.<br />
	<br />
<b>5. Is the product Robust</b><br />
	Robustness can be defined as an ability to tolerate exceptional inputs &amp; stressful environmental conditions. Software is not robust if it fails when<br />
facing such circumstances. Attackers can take advantage of robustness problems<br />
and compromise the system running the software. Fuzzing can be useful as robustness tesing using negative testing with random or semi-random inputs.<br />
<br />
<b>6. eip = 41414141 [The Goal - Calculator]</b><br />
	These sort of memmory corruption would lead in code executions and that is a lot of money and fame :). When the attacker controls the program flow, the ultimate target is to launch new program using shellcode. For proof-of-control, the researchers always use calc.exe. Poping up calculator from brower just by visiting a webpage. This is like dream come true and the ultimate Goal. <br />
	<br />
<b>7. Bypass the Sandbox</b><br />
	Now a days, most of the browsers comes with sandbox. Browser sandbox builds a contained envirnment which restrict access to other computer resources from the exploit. This means even if you have an exploit for browser, without bypassing sandbox, it's not going to do anything to victim's computer. Bypass the sandbox and win USD 200,000.<br />
	<br />
If you dream of doing things like these, Fuzzing is where you need to start.<br />
	<br />
I'm planning to talk about my experience, process I used &amp; bugs I discovered in upcoming security conferences. Hope to see you there.<br />
	<br />
AMol NAik</blockquote>

]]></content:encoded>
			<dc:creator>amolnaik4</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=3076</guid>
		</item>
		<item>
			<title>SQL Injection Via XSS</title>
			<link>http://garage4hackers.com/entry.php?b=287</link>
			<pubDate>Mon, 06 Feb 2012 19:49:40 GMT</pubDate>
			<description>One of the G4H member mandi from Garage4hackers Forums - Home (http://www.garage4hackers.com) (my second home) asked few days before about xsssqli...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">One of the G4H member mandi from <a href="http://www.garage4hackers.com" target="_blank">Garage4hackers Forums - Home</a> (my second home) asked few days before about xsssqli attack. He had a scenario where the main site is having a cross-site scripting vulnerability and the admin panel has SQL Injection. The page having sql injection in admin panel is only accessible to admin. The question was is it possible to use xss on main site to exploit sql injection on admin panel to get admin account pwned?<br />
<br />
Here is my answer with following scenario:<br />
<br />
There is a main site which is vulnerable to xss flaw (reflected/stored). The same site has a admin panel which is only accessible to admin users and one of the authenticated pages is vulnerable to sql injection. the admin panel can be a separate package like cpanel and the sql injection vulnerability will be already published (exploit-db FTW!!!).<br />
<br />
This is how we can pwn admin account using sql injection via xss.<br />
1. Attacker crafts a xss payload which is using AJAX to make a request with sql injection payload.<br />
2. He sends the payload to admin user.<br />
3. When admin user is logged in into admin panel and clicks the payload link from attacker, the sql injection in admin page is exploited and returns the username &amp; password hashes from admin table.<br />
4. Attacker then submit the returned data to his site using Ajax and will crack password hashes offline.<br />
<br />
Video Demonstration:<br />

<iframe class="restrain" title="YouTube video player" width="640" height="390" src="//www.youtube.com/embed/2b0VD4_rg8Q?wmode=opaque" frameborder="0"></iframe>
<br />
<br />
Any suggestions, comments are welcome.<br />
<br />
<b>Update:</b><br />
As rightly pointed by <a href="http://twitter.com/antisnatchor" target="_blank">@antisnatchor</a> on twitter, the issue having xss in main site and sql injeciton in admin panel can be exploited with BeEF Tunneling proxy technique. In tunneling proxy, BeEF will use hooked browser (in this case browser used by Admin) as proxy to access the authenticated sessions (in this case the admin panel). Check BeEF Tunneling Proxy in action:<br />
<a href="http://www.youtube.com/user/TheBeefproject#p/a/u/1/Z4cHyC3lowk" target="_blank">TheBeefproject's Channel - YouTube</a><br />
<br />
AMol NAik</blockquote>

]]></content:encoded>
			<dc:creator>amolnaik4</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=287</guid>
		</item>
		<item>
			<title>SQL Injection in INSERT Query</title>
			<link>http://garage4hackers.com/entry.php?b=286</link>
			<pubDate>Fri, 03 Feb 2012 05:23:06 GMT</pubDate>
			<description>SQL injection is being one of the mostly exploited issues in web application security and has found a place in OWASP Top 10 since 2004. There are...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">SQL injection is being one of the mostly exploited issues in web application security and has found a place in OWASP Top 10 since 2004. There are many blog posts, papers available on SELECT query injection exploiting WHERE or HAVING clauses. Today I&#8217;m going to discuss SQL injection in INSERT query.<br />
<br />
Here is PDF of the same.<br />
<a href="http://garage4hackers.com/attachment.php?attachmentid=187&amp;d=1328246331"  title="Name:  SQL Injection in INSERT Query.pdf
Views: 4119
Size:  556.9 KB">SQL Injection in INSERT Query.pdf</a><br />
<br />
Any suggestions, comments are welcome.<br />
<br />
Cheers,<br />
AMol NAik</blockquote>

]]></content:encoded>
			<dc:creator>amolnaik4</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=286</guid>
		</item>
		<item>
			<title>ClubHack 2011 preCON CTF walkthrough</title>
			<link>http://garage4hackers.com/entry.php?b=282</link>
			<pubDate>Wed, 21 Dec 2011 06:32:35 GMT</pubDate>
			<description>This paper is based on the steps I executed to win ClubHack 2011 preCON CTF challenge. 
 
Hope you will like it. 
 
ClubHack 2011, India’s Hacker...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">This paper is based on the steps I executed to win ClubHack 2011 preCON CTF challenge.<br />
<br />
Hope you will like it.<br />
<br />
ClubHack 2011, India’s Hacker conference, was held on 3-4 Feb 2011 at Pune, India. They had a pre-conference hacking competition, called as WEBWAR, whose winners can win a free entry to the clubhack event. The winners also qualified to play Treasure Hunt, a physical CTF at clubhack conference.<br />
<br />
This post is a walk through for this preCON CTF challenge. After registration for the event, ClubHack provided the link to CTF server. It has a website.</blockquote>


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
			<dc:creator>amolnaik4</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=282</guid>
		</item>
	</channel>
</rss>
