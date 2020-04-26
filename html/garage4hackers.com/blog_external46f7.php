<?xml version="1.0" encoding="ISO-8859-1"?>

<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:content="http://purl.org/rss/1.0/modules/content/">
	<channel>
		<title>Garage4hackers Forum - Blogs - krokite</title>
		<link>http://garage4hackers.com/blog.php?u=2186</link>
		<description>Garage4Hackers(G4H) is an open security community for Information Security enthusiasts, gurus and aspirants.Members of the team dedicate time and resources towards helping other information security aspirants, sharing knowledge,spreading security awareness and promoting research.</description>
		<language>en</language>
		<lastBuildDate>Sun, 22 Mar 2020 12:39:50 GMT</lastBuildDate>
		<generator>vBulletin</generator>
		<ttl>60</ttl>
		<image>
			<url>http://garage4hackers.com/images/misc/rss.jpg</url>
			<title>Garage4hackers Forum - Blogs - krokite</title>
			<link>http://garage4hackers.com/blog.php?u=2186</link>
		</image>
		<item>
			<title>Basic Idea of Creating Password Bruteforce tool</title>
			<link>http://garage4hackers.com/entry.php?b=935</link>
			<pubDate>Sun, 09 Jun 2013 19:58:41 GMT</pubDate>
			<description><![CDATA[Includes 2 Basic Program :- 
 
1. Basic "C++" program. 
2. BruteForce Script in Python. 
 
 
 
Here is Sample Code of CPP Program, that will need...]]></description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">Includes 2 Basic Program :-<br />
<ol class="decimal"><li style="">Basic &quot;C++&quot; program.</li><li style="">BruteForce Script in Python.</li></ol><br />
<br />
Here is Sample Code of CPP Program, that will need Password :-<br />
<br />
Save Below Code with blackbuntu.cpp name.<br />
<div class="bbcode_container">
	<div class="bbcode_description">PHP Code:</div>
	<div class="bbcode_code"style="height:372px;"><code><code><span style="color: #000000">
<span style="color: #0000BB"></span><span style="color: #FF8000">/*<br />Author:&nbsp;KroKite<br />Description:&nbsp;Basic&nbsp;Bruteforcing&nbsp;Tools<br />URI:&nbsp;http://www.fb.me/r0ckysharma<br />*/<br /><br />#include&nbsp;&lt;iostream&gt;<br />#include&lt;cstdlib&gt;<br />#include&lt;cstring&gt;<br /></span><span style="color: #0000BB">using&nbsp;</span><span style="color: #007700">namespace&nbsp;</span><span style="color: #0000BB">std</span><span style="color: #007700">;<br /><br /></span><span style="color: #FF8000">//&nbsp;When&nbsp;passing&nbsp;char&nbsp;arrays&nbsp;as&nbsp;parameters&nbsp;they&nbsp;must&nbsp;be&nbsp;pointers<br /></span><span style="color: #0000BB">int&nbsp;main</span><span style="color: #007700">(</span><span style="color: #0000BB">int&nbsp;argc</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">char</span><span style="color: #007700">**&nbsp;</span><span style="color: #0000BB">argv</span><span style="color: #007700">)&nbsp;{<br />&nbsp;&nbsp;&nbsp;&nbsp;if&nbsp;(</span><span style="color: #0000BB">argc&nbsp;</span><span style="color: #007700">&lt;&nbsp;</span><span style="color: #0000BB">4</span><span style="color: #007700">)&nbsp;{&nbsp;</span><span style="color: #FF8000">//&nbsp;Check&nbsp;the&nbsp;value&nbsp;of&nbsp;argc.&nbsp;If&nbsp;not&nbsp;enough&nbsp;parameters&nbsp;than,&nbsp;inform&nbsp;user&nbsp;and&nbsp;exit.<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">cout&nbsp;</span><span style="color: #007700">&lt;&lt;&nbsp;</span><span style="color: #DD0000">"Usage&nbsp;is&nbsp;-f&nbsp;&lt;input&nbsp;filename&gt;&nbsp;-p&nbsp;password\n"</span><span style="color: #007700">;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;exit(</span><span style="color: #0000BB">0</span><span style="color: #007700">);<br />&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;else&nbsp;{&nbsp;</span><span style="color: #FF8000">//&nbsp;if&nbsp;we&nbsp;got&nbsp;enough&nbsp;parameters..<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">int&nbsp;i</span><span style="color: #007700">=</span><span style="color: #0000BB">1</span><span style="color: #007700">;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;while(</span><span style="color: #0000BB">i</span><span style="color: #007700">&lt;=</span><span style="color: #0000BB">argc</span><span style="color: #007700">)&nbsp;{<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if&nbsp;(</span><span style="color: #0000BB">strcmp</span><span style="color: #007700">(</span><span style="color: #0000BB">argv</span><span style="color: #007700">&#91;</span><span style="color: #0000BB">i</span><span style="color: #007700">&#93;,</span><span style="color: #DD0000">"-f"</span><span style="color: #007700">)&nbsp;==&nbsp;</span><span style="color: #0000BB">0</span><span style="color: #007700">)&nbsp;{<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">cout&nbsp;</span><span style="color: #007700">&lt;&lt;&nbsp;</span><span style="color: #DD0000">"File&nbsp;to&nbsp;Open:&nbsp;"&nbsp;</span><span style="color: #007700">&lt;&lt;&nbsp;</span><span style="color: #0000BB">argv</span><span style="color: #007700">&#91;</span><span style="color: #0000BB">i&nbsp;</span><span style="color: #007700">+&nbsp;</span><span style="color: #0000BB">1</span><span style="color: #007700">&#93;&nbsp;&lt;&lt;&nbsp;</span><span style="color: #0000BB">endl</span><span style="color: #007700">;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if&nbsp;(</span><span style="color: #0000BB">strcmp</span><span style="color: #007700">(</span><span style="color: #0000BB">argv</span><span style="color: #007700">&#91;</span><span style="color: #0000BB">i</span><span style="color: #007700">&#93;,</span><span style="color: #DD0000">"-p"</span><span style="color: #007700">)&nbsp;==&nbsp;</span><span style="color: #0000BB">0</span><span style="color: #007700">)&nbsp;{<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">cout&nbsp;</span><span style="color: #007700">&lt;&lt;</span><span style="color: #DD0000">"Password&nbsp;is&nbsp;:&nbsp;"&nbsp;</span><span style="color: #007700">&lt;&lt;&nbsp;</span><span style="color: #0000BB">argv</span><span style="color: #007700">&#91;</span><span style="color: #0000BB">i&nbsp;</span><span style="color: #007700">+&nbsp;</span><span style="color: #0000BB">1</span><span style="color: #007700">&#93;&nbsp;&lt;&lt;&nbsp;</span><span style="color: #0000BB">endl</span><span style="color: #007700">;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if(</span><span style="color: #0000BB">strcmp</span><span style="color: #007700">(</span><span style="color: #0000BB">argv</span><span style="color: #007700">&#91;</span><span style="color: #0000BB">i</span><span style="color: #007700">+</span><span style="color: #0000BB">1</span><span style="color: #007700">&#93;,&nbsp;</span><span style="color: #DD0000">"KroKite"</span><span style="color: #007700">)&nbsp;==&nbsp;</span><span style="color: #0000BB">0</span><span style="color: #007700">)&nbsp;{<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">cout&nbsp;</span><span style="color: #007700">&lt;&lt;&nbsp;</span><span style="color: #DD0000">"File&nbsp;Opening&nbsp;SuccessFul"</span><span style="color: #007700">&lt;&lt;&nbsp;</span><span style="color: #0000BB">endl</span><span style="color: #007700">;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;else&nbsp;{<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">cout&nbsp;</span><span style="color: #007700">&lt;&lt;&nbsp;</span><span style="color: #DD0000">"Wrong&nbsp;Password"</span><span style="color: #007700">&lt;&lt;&nbsp;</span><span style="color: #0000BB">endl</span><span style="color: #007700">;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">i</span><span style="color: #007700">++;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br />&nbsp;&nbsp;&nbsp;&nbsp;}<br />&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;</span><span style="color: #0000BB">0</span><span style="color: #007700">;<br />}&nbsp;<br /></span><span style="color: #0000BB"></span>
</span>
</code></code></div>
</div>Compile above program with g++ <br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">root@blackbuntu# g++ blackbuntu.cpp -o blackbuntu</pre>
</div>and now run program to understand what it will do, <br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:48px;">root@blackbuntu# ./blackbuntu 
Usage is -f &lt;input filename&gt; -p password</pre>
</div>So, Run with Arguments, and it takes password with '-p' arguments :-<br />
<br />
Giving Wrong Password as &quot;blackbuntu&quot;<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:72px;">root@blackbuntu# ./blackbuntu -f blackbuntu.txt -p blackbuntu
File to Open:  blackbuntu.txt
Password is : blackbuntu
Wrong Password</pre>
</div>Now Running with Correct Password :-<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:72px;">root@blackbuntu# ./blackbuntu -f blackbuntu.txt -p KroKite
File to Open:  blackbuntu.txt
Password is : KroKite
File Opening SuccessFul</pre>
</div>But, Now what if you don't know the password of program, and you need to open it, how would you do that, here is basic python code that will help you do that :-<br />
<br />
Save below file with name &quot;bruteforce.py&quot;<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">PHP Code:</div>
	<div class="bbcode_code"style="height:228px;"><code><code><span style="color: #000000">
<span style="color: #0000BB"></span><span style="color: #FF8000">#!/usr/bin/python<br />#&nbsp;Author&nbsp;:&nbsp;KroKite<br />#&nbsp;Description:&nbsp;Basic&nbsp;Password&nbsp;Bruteforcing&nbsp;Tool<br />#&nbsp;URL:&nbsp;http://www.fb.me/r0ckysharma<br /><br /></span><span style="color: #0000BB">import&nbsp;subprocess<br />import&nbsp;re<br /><br />fo&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">open</span><span style="color: #007700">(</span><span style="color: #DD0000">"password.txt"</span><span style="color: #007700">,&nbsp;</span><span style="color: #DD0000">'r'</span><span style="color: #007700">);<br />for&nbsp;</span><span style="color: #0000BB">lines&nbsp;in&nbsp;fo</span><span style="color: #007700">:<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">password&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">lines</span><span style="color: #007700">.</span><span style="color: #0000BB">split</span><span style="color: #007700">(</span><span style="color: #DD0000">'\n'</span><span style="color: #007700">)<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">brute&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">subprocess</span><span style="color: #007700">.</span><span style="color: #0000BB">Popen</span><span style="color: #007700">(&#91;</span><span style="color: #DD0000">"./blackbuntu"</span><span style="color: #007700">,&nbsp;</span><span style="color: #DD0000">"-f"</span><span style="color: #007700">,&nbsp;</span><span style="color: #DD0000">"foo.txt"</span><span style="color: #007700">,&nbsp;</span><span style="color: #DD0000">"-p"</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">password</span><span style="color: #007700">&#91;</span><span style="color: #0000BB">0</span><span style="color: #007700">&#93;&#93;,&nbsp;</span><span style="color: #0000BB">stdout</span><span style="color: #007700">=</span><span style="color: #0000BB">subprocess</span><span style="color: #007700">.</span><span style="color: #0000BB">PIPE</span><span style="color: #007700">)<br />&nbsp;&nbsp;&nbsp;&nbsp;if(</span><span style="color: #0000BB">re</span><span style="color: #007700">.</span><span style="color: #0000BB">search</span><span style="color: #007700">(</span><span style="color: #DD0000">"Success"</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">brute</span><span style="color: #007700">.</span><span style="color: #0000BB">communicate</span><span style="color: #007700">()&#91;</span><span style="color: #0000BB">0</span><span style="color: #007700">&#93;)):<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;print&nbsp;</span><span style="color: #DD0000">"Password&nbsp;Cracked&nbsp;and&nbsp;your&nbsp;Password&nbsp;is&nbsp;"</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">password</span><span style="color: #007700">&#91;</span><span style="color: #0000BB">0</span><span style="color: #007700">&#93;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;exit()<br />&nbsp;&nbsp;&nbsp;&nbsp;else:<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;print&nbsp;</span><span style="color: #0000BB">password</span><span style="color: #007700">&#91;</span><span style="color: #0000BB">0</span><span style="color: #007700">&#93;,&nbsp;</span><span style="color: #DD0000">"&nbsp;is&nbsp;not&nbsp;Password"&nbsp;<br /></span><span style="color: #0000BB"></span>
</span>
</code></code></div>
</div>Now make another file which has list of password, Write 1 password in 1 line.<br />
<br />
password.txt file :-<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:180px;">abcdef
123456
hacker
bullshit
wtf
blackbuntu
facebook
twitter
metallica
KroKite
shit
password
pass</pre>
</div>And now Run your python program :-<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:156px;">root@blackbuntu# python bruteforce.py 
abcdef  is not Password
123456  is not Password
hacker  is not Password
bullshit  is not Password
wtf  is not Password
blackbuntu  is not Password
facebook  is not Password
twitter  is not Password
metallica  is not Password
Password Cracked and your Password is  KroKite</pre>
</div><font color="#FF0000">Note:</font> <font color="#00BFFF">Please Remember this is just basic idea and does not account exactly to your program, you might have to do more homework for your application with above bruteforce.py tool. With Few Changes above <font color="#FF4500">bruteforce.py</font> tool may work with mysql [not tested]</font><br />
<br />
<font color="#FF4500">bruteforce.py</font> file reads 1 password at a time and than run your program with fetched password and checks the success of password, if it does, than it simply prints password and exit, so the very last line will be your password if it has successfully cracked it.<br />
<br />
<font color="#FF4500">Also , all above Code is completely written by me, if you share it or modify it further, do include my credit. Thanks</font><br />
<br />
Got Question ? Ask them below, and i believe this simple demo will clear doubts.</blockquote>

]]></content:encoded>
			<dc:creator>krokite</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=935</guid>
		</item>
	</channel>
</rss>
