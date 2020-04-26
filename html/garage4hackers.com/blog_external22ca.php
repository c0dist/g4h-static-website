<?xml version="1.0" encoding="ISO-8859-1"?>

<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:content="http://purl.org/rss/1.0/modules/content/">
	<channel>
		<title>Garage4hackers Forum - Blogs - neo</title>
		<link>http://garage4hackers.com/blog.php?u=21</link>
		<description>Garage4Hackers(G4H) is an open security community for Information Security enthusiasts, gurus and aspirants.Members of the team dedicate time and resources towards helping other information security aspirants, sharing knowledge,spreading security awareness and promoting research.</description>
		<language>en</language>
		<lastBuildDate>Sun, 22 Mar 2020 11:10:20 GMT</lastBuildDate>
		<generator>vBulletin</generator>
		<ttl>60</ttl>
		<image>
			<url>http://garage4hackers.com/images/misc/rss.jpg</url>
			<title>Garage4hackers Forum - Blogs - neo</title>
			<link>http://garage4hackers.com/blog.php?u=21</link>
		</image>
		<item>
			<title>Software Defined Radio - RTL-SDR with SDR# Setup on Windows</title>
			<link>http://garage4hackers.com/entry.php?b=3095</link>
			<pubDate>Fri, 12 Dec 2014 09:31:35 GMT</pubDate>
			<description><![CDATA[When I was reluctant to post such basic post my friend forced me to write this article saying "people love basics articles also. Which you think...]]></description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">When I was reluctant to post such basic post my friend forced me to write this article saying &quot;people love basics articles also. Which you think would be known to all.&quot; So here goes nothing<br />
<br />
1) What is RTL-SDR<br />
<br />
If you know about RTL-SDR Skip to 3rd point directly.<br />
<br />
RTL - Realtek<br />
SDR - Software Defined Radio<br />
<br />
<br />
2) History and Discovery of RTLSDR (Source)<br />
<br />
It turns out that Antti Palosaari is perhaps not entirely responsible alone in getting credit for the discovery of Realtek 2832U tuners being used for SDR. The RTL2382U parts were always intended by design for SDR as the dongles come with closed SDR software in Windows for DAB+ and FM reception on the mini CD. I think the credit for uncovering of what the Windows software does lies with a fellow named Eric Fry originally sniffing the USB packets from the Windows application in FM and DAB mode way back in March of 2010. He had hoped to get a DAB+ or FM receiver working in Linux (he had originally been providing unofficial support for Linux and this Quad Realtek DVB tuner). Eric and I discussed this privately at length and I made some reflections about this SDR feature in 2011 on the linux-tv mailing lists and discussed SDR potential on the associated #linux-tv IRC channel. Realtek had sent me some alpha FM SDR software for Linux with a promise of DAB+ to come. Antti's infamous email followed in early 2012. Very quickly the Realtek RTL2382U Linux driver and and some independent work by Osmocom (who were making their own E4000 based SDR) collided and in RTL-SDR as we know it exploded onto the scene.<br />
<br />
So, the original 'discovery' lies with Eric. Much of the work getting the RTL2382U and it's associated tuners tamed in between then and now lies with Antti and Osmocom.<br />
<br />
3) On Windows You Say ?<br />
<br />
Yes, I know lots of people keep talking about RTL-SDR on linux and all gnu-Radio and other softwares. But wait I found some great softwares on windows also for RTL-SDR. So why not share those. I will also write something about linux setups in some later post. I had got my first RTL-SDR Dongle from dx.com (<a href="http://www.dx.com/p/mini-dvb-t-digital-tv-usb-dongle-stick-w-fm-dab-sdr-remote-control-black-245432#.VIqnQzGUe9E" target="_blank">Exact model</a>)<br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=826&amp;d=1418376221" border="0" alt="Name:  dvb-dongle-sku_245432_1.jpg
Views: 638
Size:  20.6 KB"  style="float: CONFIG" /><br />
<br />
I opened Kali and wanted it working and listen something. But at first gnu-radio gave me some trouble getting started with basic FM also. So in hurry to listen something on dongle booted a windows machine. To my surprise there were lots of program available in windows also for the SDR. Some of them supported RTL-SDR via dierect USB some supported via a TCPIP bridge for RTLSDR. The best one I would dare say would be SDR# or SDRsharp. This is very cool software for SDR written in C# by Youssef Touil which directly detects RTLSDR from USB and can use it directly without any bridge. SDR# is free software and can be downloaded from HERE<br />
  So I downloaded SDR# plugged in my RTLSDR usb dongle and I was good to go. Oh ya one glitch I forgot to tell about the RF gain. Which is simple thing but no one tells you about. My dongle didnt started reception on first go I couldnt get anything not even Local FM radio stations in my town. So digged little bit around. I went to the official IRC channel of SDR# which is #sdrsharp on freenode . There after asking questions for some time some one asked me about RF gain settings. So when you starting your first run with RTLSDR and SDR# first thing to be done use configure button near the device dropdown.  Choose NFM in band and open configure window then start with less gain and turn it higher till you start hearing FM channel at your known frequency. You can directly enter frequency on the right hand side area of the configure button....<br />
........<br />
<br />
Find Full articles and picture at my blogspot blog <a href="http://infosec-neo.blogspot.com/2014/12/rtl-sdr-with-sdr-setup.html" target="_blank">here</a></blockquote>

]]></content:encoded>
			<dc:creator>neo</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=3095</guid>
		</item>
		<item>
			<title>7 things about embedded/electronics projects that you might have mistaken</title>
			<link>http://garage4hackers.com/entry.php?b=3077</link>
			<pubDate>Wed, 13 Aug 2014 08:07:31 GMT</pubDate>
			<description>Well I have not invested lots of years into embedded electronics. I was electronic enthusiastic but never done much into microcontroller and embedded...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">Well I have not invested lots of years into embedded electronics. I was electronic enthusiastic but never done much into microcontroller and embedded stuff before 2011. By the end of 2011, I had ordered my <a href="http://www.pjrc.com/" target="_blank">Teensy </a>(atmega based circuit with built in USB programmer interface). I had ordered Teensy basically to try USB based attack vectors by programming teensy as USB keyboard and trying to create a batch file on the victim computer and run it etc. Some good tools and frameworks have been written about the use of Teensy like devices as attack vector. (E.g. <a href="https://code.google.com/p/kautilya/" target="_blank">Kautilya </a>by @nikhil_mitt) So I am not going into details of embedded device as attack vector on computers.<br />
     <br />
                 I had done some small projects using this Teensy like<a href="http://infosec-neo.blogspot.in/2011/12/control-pc-through-tv-remote-control.html" target="_blank"> Remote Controlling PC via TV Remote</a>. But I started programming of Atmega Chips (microcontroller) due to an incidence. My nephew had done some robotics class where they had taught (really?) them about atmega16 based line follower robot. Also gave each one a piece of hardware. But my nephew was given a further difficult challenge to complete on his own… To solve a maze. But neither my nephew nor other friends in class were able to complete task. They were not able to re-produce normal line following ability of robot at home. So my nephew called me expressed his problem. So, first I gave him general idea how the code should work. Then sent a partial code to help him but he couldn’t do it. So I and a friend of mine took this challenge. I was sure that it should work but we needed to get information about coding and sensor as well as prepare algorithm of the robot. So we started collecting datasheets and information about the tools and coding softwares etc. Within 8-10 days we were able to run the robot perfectly as per the requirements of the challenge. Reason telling you this story is embedded device is not that hard as you think. The person who knows any one programming language can easily use embedded device. That’s why I thought to write about 7 things you never knew were easy about Embedded Hardware devices projects.<br />
<br />
<ol class="decimal"><li style="">Embedded Hardware is not as difficult as you think!</li><li style="">You don’t need to do soldering!</li><li style="">You don’t need low level language like Assembly!</li><li style="">It’s not as expensive as you think</li><li style="">Simulators are your best friends!</li><li style="">Don’t be afraid of PCB designing!</li><li style="">Manufacturing like a pro</li></ol><br />
<br />
<font size="4">1. Embedded Hardware is not as difficult as you think!</font><br />
    I have been arranging Hardware training trying to get people involved into hardware hacking projects. But I have seen lots of people having the fear of hardware or embedded projects as if touching any microcontroller will give them -A.C. 240V electric current. Very less number of people were interested in the trainings even if some were free of cost. It is not as difficult as people think. I am telling this from my own experience. I had started programming with a line follower robot without any previous knowledge about these microcontrollers then also I had succeeded in completing the challenge of solving maze using line follower robot. If I can do it so do you can do it too isn’t it? This is not rocket science though people have created rockets using this&#61514; . Just see at some sample codes get some basic compliers or programming IDE for microcontrollers and start with simple codes. Most of the microchips would allow you to code in C or C++ language. <br />
<br />
<font size="4">2. You don’t need to do soldering!</font><br />
I have also seen people saying oh electronics you need wires you need to do soldering. I can’t user soldering gun etc. But hey you are in to new era of electronics and embedded devices. Lots of microcontroller devices come with the basic development kits readymade. Some times by the device manufacturers or sometimes by some local vendors. <br />
For Ex. Atmega8 Development kit<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=736&amp;d=1407915247" border="0" alt="Name:  atmega8_devbord_C031.jpg
Views: 972
Size:  71.1 KB"  style="float: CONFIG" /><br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=739&amp;d=1407916615" border="0" alt="Name:  6b2e1292728899034207efa3c0a5e6c8.image.446x354.jpg
Views: 604
Size:  13.2 KB"  style="float: CONFIG" /><br />
You just need to plug-in cables or ready-made wires with connectors and you can use these boards for GPIO (General Purpose Input Output). Some of these boards have basic input as switches and out puts as LED or Buzzer etc. So even if you don’t know soldering and you never have built electronics circuits… don’t be afraid.<br />
<br />
<font size="4">3. You don’t need low level language like Assembly!</font><br />
    One more reason people put forward for not doing embedded projects is they don’t know low level language like Assembly and they don’t want to take the trouble to learn assembly language. Wake up people. Almost all generally used Microcontrollers give us option to code in to higher level language such as C / C++. Most popular open-source hardware platform Ardiuno uses C++ as its base language in its IDE. Other major share or chips from Atmel use C or C++ both and also come with full visual studio based development environment.<br />
<br />
<font size="4">4. It’s not as expensive as you think</font><br />
    Normally we use most of the free software. So to start embedded project people are not ready to spend cash. But we don’t need lots of cash to start a microcontroller project. Lots of time a development kit could be brought for around 10$ to 20$ (600 to 1200 INR). So to start off you don’t need all big gadgets and don’t need to empty your pockets&#61514;. After starting some small projects you can check if you are embedded into it and want to spend more on it or not.<br />
<br />
<font size="4">5. Simulators are your best friends!</font><br />
    If you want to check circuits or microcontrollers without assembling any circuits then it is also possible. There are very good software simulators available these days which not only simulate most of the electronics circuits but lots of microcontrollers also. The normal hardware development cycle consist of following stages<br />
Schematic Design -&gt; PCB Layout –(wait for pcb)--&gt; Physical Prototype -&gt; Software development --&gt; System Testing<br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=737&amp;d=1407915559" border="0" alt="Name:  process1.png
Views: 607
Size:  9.6 KB"  style="float: CONFIG" /><br />
<br />
Instead of wasting time in more tedious development cycle system simulation can be used to do development in a rapid way.<br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=738&amp;d=1407915593" border="0" alt="Name:  process2.png
Views: 569
Size:  9.4 KB"  style="float: CONFIG" /><br />
<br />
There are free simulators like Simulator in Atmel Studio. There are some good professional quality simulators like Proteus (from <a href="http://www.labcenter.com/" target="_blank">http://www.labcenter.com/</a>).<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=740&amp;d=1407916909" border="0" alt="Name:  proteus_isis.jpg
Views: 766
Size:  95.6 KB"  style="float: CONFIG" /><br />
 Using simulator helps for quicker development of the electronics or embedded project.<br />
<br />
<font size="4">6. Don’t afraid of PCB designing!</font><br />
    In the old days the PCB designing used to be done via laborious manual processes. But PCB designing softwares have changed that a lot. There are some great PCB design software both Free (<a href="http://www.electroschematics.com/2249/pcb-design-software/" target="_blank">List of Free PCB design softwares</a>) and Commercial (Like Proteus). Eagle (<a href="http://www.cadsoftusa.com/download-eagle/freeware/" target="_blank">http://www.cadsoftusa.com/download-eagle/freeware/</a>) is also one more free software which is pretty good for designing PCBs they have their commercial version for more than 2 layered PCB. We can do circuit design and convert it to a PCB design in some professional software like Proteus.<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=741&amp;d=1407917044" border="0" alt="Name:  Proteus-PCB-Design_1.jpg
Views: 616
Size:  23.2 KB"  style="float: CONFIG" /><br />
 Some other PCB designing software are also good for quickly creating PCB designs and generating manufacturing files for PCB manufacturer.<br />
<br />
<font size="4">7. Manufacturing like pros.</font><br />
    As well as PCB designing the manufacturing of PCB has also became easy. There are lots of online services where you can design and order a PCB online. <br />
For ex. <br />
<a href="http://www.pcbpower.com/" target="_blank">http://www.pcbpower.com/</a> - Indian website with Global reach of customers<br />
<a href="http://www.pad2pad.com/" target="_blank">http://www.pad2pad.com/</a> - They have their own software using which one can design a PCB and order directly online for manufacturing.<br />
    <a href="http://www.leiton.de/en-index.html" target="_blank">http://www.leiton.de/en-index.html</a> - Cheap rates<br />
There are a lot other websites (Just google for “order PCB online”!) you can choose the one suitable for your need or a local one PCB manufacturer nearby you.<br />
For assembly of the electronic circuits also, there are lots of online services available (like screamingcircuits or 7pcbassembly) but I found that the online services for the assembly of circuit are much more costly. Better option is to check for a local vendor who is doing assembly. Local vendors I found near-by give rate of around 0.004086$ which is like a quarter of 1 INR per soldering point. So I recommend to check for some local vendor rather than wasting too much money on online services of assembling circuits.<br />
Always keep in mind that the PCB manufacturers and Assembly service providers would normally don’t give your order on time. So always keep good buffer time while giving order or bulk quantities to these vendors.<br />
<br />
<font size="4">Conclusion</font><br />
So get your feet wet in the fields of electronics (in electronic fluid) and embedded devices and you will find it good as hobby or business also.</blockquote>

]]></content:encoded>
			<dc:creator>neo</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=3077</guid>
		</item>
	</channel>
</rss>
