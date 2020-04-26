<?xml version="1.0" encoding="ISO-8859-1"?>

<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:content="http://purl.org/rss/1.0/modules/content/">
	<channel>
		<title>Garage4hackers Forum - Blogs - garage4hackers</title>
		<link>http://garage4hackers.com/blog.php?u=21436</link>
		<description>Garage4Hackers(G4H) is an open security community for Information Security enthusiasts, gurus and aspirants.Members of the team dedicate time and resources towards helping other information security aspirants, sharing knowledge,spreading security awareness and promoting research.</description>
		<language>en</language>
		<lastBuildDate>Sun, 22 Mar 2020 10:24:55 GMT</lastBuildDate>
		<generator>vBulletin</generator>
		<ttl>60</ttl>
		<image>
			<url>http://garage4hackers.com/images/misc/rss.jpg</url>
			<title>Garage4hackers Forum - Blogs - garage4hackers</title>
			<link>http://garage4hackers.com/blog.php?u=21436</link>
		</image>
		<item>
			<title><![CDATA[Reversing Tinba: World's smallest trojan-banker DGA Code]]></title>
			<link>http://garage4hackers.com/entry.php?b=3086</link>
			<pubDate>Sun, 21 Sep 2014 12:07:07 GMT</pubDate>
			<description>Introduction: 
 
CSIS Security Group A/S has uncovered a new trojan-banker family which we have named Tinba (Tiny Banker) alias “Zusy”.  
Attachment...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">Introduction:<br />
<br />
CSIS Security Group A/S has uncovered a new trojan-banker family which we have named Tinba (Tiny Banker) alias “Zusy”. <br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=790&amp;d=1411301221" border="0" alt="Name:  1719074795.jpg
Views: 4474
Size:  18.3 KB"  style="float: CONFIG" /><br />
<br />
Tinba is a small data stealing trojan-banker. It hooks into browsers and steals login data and sniffs on network traffic. As several sophisticated banker-trojan it also uses Man in The Browser (MiTB) tricks and webinjects in order to change the look and feel of certain webpages with the purpose of circumventing Two factor Authentification (2FA) or tricking the infected user to give away additional sensitive data such as credit card data or TANs. <br />
<br />
Tinba is the smallest trojan-banker we have ever encountered and it belongs to a complete new family of malware which we expect to be battling in upcoming months. <br />
source:<a href="https://www.csis.dk/en/csis/news/3566/" target="_blank">https://www.csis.dk/en/csis/news/3566/</a><br />
<br />
<u><b>Start:<br />
</b></u><br />
<br />
TinBa DGA: Tiny Banker's DGA unleashed<br />
<br />
This time we are investigating the tiny banker's DGA. We are again only interested in the code that is dealing<br />
with the domain name generation.<br />
Execute the sample and let it terminate itself. It will inject its code into Explorer.exe process.<br />
Attach debugger to explorer.exe.<br />
<br />
Now where should we start in vast pool of explorer.exe address space?<br />
The answer is again the place where we can find teh simptoms of DGA. Let us set breakpoint at<br />
&quot;gethostbyname&quot;.<br />
The code will break at gethostbyname, let it finish its work and you'l land in DGA code from its return address.<br />
The following code belongs to the DGA :<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:372px;">02252739   55               PUSH EBP
0225273A   89E5             MOV EBP,ESP
0225273C   81EC 0C020000    SUB ESP,20C
02252742   57               PUSH EDI
02252743   6A 20            PUSH 20
02252745   8D93 605E4000    LEA EDX,DWORD PTR DS:[EBX+405E60]
0225274B   52               PUSH EDX
0225274C   8D95 F8FEFFFF    LEA EDX,DWORD PTR SS:[EBP-108]
02252752   52               PUSH EDX
02252753   E8 040B0000      CALL 0225325C
02252758   0FB783 C25E4000  MOVZX EAX,WORD PTR DS:[EBX+405EC2]
0225275F   8945 FC          MOV DWORD PTR SS:[EBP-4],EAX
02252762   EB 6C            JMP SHORT 022527D0
02252764   837D FC 00       CMP DWORD PTR SS:[EBP-4],0
02252768   75 21            JNZ SHORT 0225278B
0225276A   6A 20            PUSH 20
0225276C   8D95 F8FEFFFF    LEA EDX,DWORD PTR SS:[EBP-108]
02252772   52               PUSH EDX
02252773   8D93 605E4000    LEA EDX,DWORD PTR DS:[EBX+405E60]
02252779   52               PUSH EDX
0225277A   E8 DD0A0000      CALL 0225325C
0225277F   0FB783 C25E4000  MOVZX EAX,WORD PTR DS:[EBX+405EC2]
02252786   8945 FC          MOV DWORD PTR SS:[EBP-4],EAX
02252789   EB 45            JMP SHORT 022527D0
0225278B   FF4D FC          DEC DWORD PTR SS:[EBP-4]
0225278E   8DB3 A05E4000    LEA ESI,DWORD PTR DS:[EBX+405EA0] ; &quot;oGkS3w3sGGOGG7oc&quot;
02252794   B9 10000000      MOV ECX,10
02252799   31C0             XOR EAX,EAX
0225279B   31D2             XOR EDX,EDX
0225279D   AC               LODS BYTE PTR DS:[ESI]
0225279E   01C2             ADD EDX,EAX
022527A0  ^E2 FB            LOOPD SHORT 0225279D
022527A2   8DBB 605E4000    LEA EDI,DWORD PTR DS:[EBX+405E60] ; &quot;ssrgwnrmgrxe.com&quot;
022527A8   B9 0C000000      MOV ECX,0C
022527AD   0207             ADD AL,BYTE PTR DS:[EDI]
022527AF   30D0             XOR AL,DL
022527B1   0247 01          ADD AL,BYTE PTR DS:[EDI+1]
022527B4   3C 61            CMP AL,61
022527B6   76 04            JBE SHORT 022527BC
022527B8   3C 7A            CMP AL,7A
022527BA   72 04            JB SHORT 022527C0
022527BC   FEC2             INC DL
022527BE  ^EB ED            JMP SHORT 022527AD
022527C0   AA               STOS BYTE PTR ES:[EDI]
022527C1  ^E2 EA            LOOPD SHORT 022527AD
022527C3   B0 2E            MOV AL,2E ; &quot;.&quot;
022527C5   AA               STOS BYTE PTR ES:[EDI]
022527C6   8B83 B85E4000    MOV EAX,DWORD PTR DS:[EBX+405EB8] ; &quot;com&quot;
022527CC   AB               STOS DWORD PTR ES:[EDI]
022527CD   31C0             XOR EAX,EAX
022527CF   AA               STOS BYTE PTR ES:[EDI]
022527D0   8D93 605E4000    LEA EDX,DWORD PTR DS:[EBX+405E60]
022527D6   52               PUSH EDX
022527D7   FF93 4D354000    CALL DWORD PTR DS:[EBX+40354D]
022527DD   85C0             TEST EAX,EAX
022527DF   79 1C            JNS SHORT 022527FD
022527E1   8D93 605E4000    LEA EDX,DWORD PTR DS:[EBX+405E60]
022527E7   52               PUSH EDX
022527E8   FF93 5F354000    CALL DWORD PTR DS:[EBX+40355F]  ; call to gethostbyname
022527EE   85C0             TEST EAX,EAX
022527F0  ^0F84 6EFFFFFF    JE 02252764
022527F6   8B40 0C          MOV EAX,DWORD PTR DS:[EAX+C]
022527F9   8B00             MOV EAX,DWORD PTR DS:[EAX]
022527FB   8B00             MOV EAX,DWORD PTR DS:[EAX]
022527FD   8B55 08          MOV EDX,DWORD PTR SS:[EBP+8]
02252800   8942 04          MOV DWORD PTR DS:[EDX+4],EAX
02252803   66:8B83 7E5E4000 MOV AX,WORD PTR DS:[EBX+405E7E]
0225280A   66:8942 02       MOV WORD PTR DS:[EDX+2],AX
0225280E   66:C702 0200     MOV WORD PTR DS:[EDX],2
02252813   C642 08 00       MOV BYTE PTR DS:[EDX+8],0
02252817   C642 0C 00       MOV BYTE PTR DS:[EDX+C],0
0225281B   8DBD F4FDFFFF    LEA EDI,DWORD PTR SS:[EBP-20C]
02252821   6A 20            PUSH 20
02252823   8D93 605E4000    LEA EDX,DWORD PTR DS:[EBX+405E60]
02252829   52               PUSH EDX
0225282A   57               PUSH EDI
0225282B   E8 2C0A0000      CALL 0225325C
02252830   83C7 20          ADD EDI,20
02252833   B9 18000000      MOV ECX,18
02252838   60               PUSHAD
02252839   6A 01            PUSH 1
0225283B   FF93 93104000    CALL DWORD PTR DS:[EBX+401093]
02252841   61               POPAD
02252842   0F31             RDTSC
02252844   AB               STOS DWORD PTR ES:[EDI]
02252845   49               DEC ECX
02252846  ^75 F0            JNZ SHORT 02252838
02252848   8B7D 0C          MOV EDI,DWORD PTR SS:[EBP+C]
0225284B   31C0             XOR EAX,EAX
0225284D   AA               STOS BYTE PTR ES:[EDI]
0225284E   B8 80000000      MOV EAX,80
02252853   AB               STOS DWORD PTR ES:[EDI]
02252854   68 80000000      PUSH 80
02252859   8D95 F4FDFFFF    LEA EDX,DWORD PTR SS:[EBP-20C]
0225285F   52               PUSH EDX
02252860   57               PUSH EDI
02252861   E8 F6090000      CALL 0225325C
02252866   83EF 04          SUB EDI,4
02252869   57               PUSH EDI
0225286A   E8 57F9FFFF      CALL 022521C6
0225286F   4F               DEC EDI
02252870   68 85000000      PUSH 85
02252875   57               PUSH EDI
02252876   FF75 08          PUSH DWORD PTR SS:[EBP+8]
02252879   E8 8F010000      CALL 02252A0D
0225287E   89C6             MOV ESI,EAX
02252880   29F8             SUB EAX,EDI
02252882   6A 04            PUSH 4
02252884   E8 05000000      CALL 0225288E
02252889   0D 0A0D0A00      OR EAX,0A0D0A
0225288E   50               PUSH EAX
0225288F   57               PUSH EDI
02252890   E8 F30A0000      CALL 02253388
02252895   85C0             TEST EAX,EAX
02252897  ^0F84 C7FEFFFF    JE 02252764
0225289D   8D78 04          LEA EDI,DWORD PTR DS:[EAX+4]
022528A0   39F7             CMP EDI,ESI
022528A2  ^0F84 BCFEFFFF    JE 02252764
022528A8   87FE             XCHG ESI,EDI
022528AA   AD               LODS DWORD PTR DS:[ESI]
022528AB   3B83 573D4000    CMP EAX,DWORD PTR DS:[EBX+403D57]
022528B1  ^0F85 ADFEFFFF    JNZ 02252764
022528B7   AC               LODS BYTE PTR DS:[ESI]
022528B8   84C0             TEST AL,AL
022528BA  ^0F85 A4FEFFFF    JNZ 02252764
022528C0   AD               LODS DWORD PTR DS:[ESI]
022528C1   3D 80000000      CMP EAX,80
022528C6   74 12            JE SHORT 022528DA
022528C8   3D 00010000      CMP EAX,100
022528CD   74 0B            JE SHORT 022528DA
022528CF   3D 00020000      CMP EAX,200
022528D4  ^0F85 8AFEFFFF    JNZ 02252764
022528DA   50               PUSH EAX
022528DB   56               PUSH ESI
022528DC   8D95 F4FDFFFF    LEA EDX,DWORD PTR SS:[EBP-20C]
022528E2   52               PUSH EDX
022528E3   E8 0D000000      CALL 022528F5
022528E8   85C0             TEST EAX,EAX
022528EA  ^0F84 74FEFFFF    JE 02252764
022528F0   5F               POP EDI
022528F1   C9               LEAVE
022528F2   C2 0800          RETN 8</pre>
</div>If gethostbyname returns empty hand, it then loops through the code to generate another domain :<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:60px;">022527E8   FF93 5F354000    CALL DWORD PTR DS:[EBX+40355F]  ; call to gethostbyname
022527EE   85C0             TEST EAX,EAX
022527F0  ^0F84 6EFFFFFF    JE 02252764</pre>
</div>Above code snippet will loop through the code starting at 0x02252764. So this address is where the DGA starts,<br />
We should check the stack and all register's conditions when we'll land on address 0x02252764.<br />
Remember these conditions are needed as arguments while reversing any subroutine :<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:372px;">02252764   837D FC 00       CMP DWORD PTR SS:[EBP-4],0 ; Starts with 0x03E8 ; 1000 Number of domains
02252768   75 21            JNZ SHORT 0225278B
0225276A   6A 20            PUSH 20
0225276C   8D95 F8FEFFFF    LEA EDX,DWORD PTR SS:[EBP-108]
02252772   52               PUSH EDX
02252773   8D93 605E4000    LEA EDX,DWORD PTR DS:[EBX+405E60]
02252779   52               PUSH EDX
0225277A   E8 DD0A0000      CALL 0225325C
0225277F   0FB783 C25E4000  MOVZX EAX,WORD PTR DS:[EBX+405EC2]
02252786   8945 FC          MOV DWORD PTR SS:[EBP-4],EAX
02252789   EB 45            JMP SHORT 022527D0

0225278B   FF4D FC          DEC DWORD PTR SS:[EBP-4]
0225278E   8DB3 A05E4000    LEA ESI,DWORD PTR DS:[EBX+405EA0] ; &quot;oGkS3w3sGGOGG7oc&quot;
02252794   B9 10000000      MOV ECX,10
02252799   31C0             XOR EAX,EAX
0225279B   31D2             XOR EDX,EDX
0225279D   AC               LODS BYTE PTR DS:[ESI]
0225279E   01C2             ADD EDX,EAX
022527A0  ^E2 FB            LOOPD SHORT 0225279D
022527A2   8DBB 605E4000    LEA EDI,DWORD PTR DS:[EBX+405E60] ; &quot;ssrgwnrmgrxe.com&quot;
022527A8   B9 0C000000      MOV ECX,0C
022527AD   0207             ADD AL,BYTE PTR DS:[EDI]
022527AF   30D0             XOR AL,DL
022527B1   0247 01          ADD AL,BYTE PTR DS:[EDI+1]
022527B4   3C 61            CMP AL,61
022527B6   76 04            JBE SHORT 022527BC
022527B8   3C 7A            CMP AL,7A
022527BA   72 04            JB SHORT 022527C0
022527BC   FEC2             INC DL
022527BE  ^EB ED            JMP SHORT 022527AD
022527C0   AA               STOS BYTE PTR ES:[EDI]
022527C1  ^E2 EA            LOOPD SHORT 022527AD
022527C3   B0 2E            MOV AL,2E ; &quot;.&quot;
022527C5   AA               STOS BYTE PTR ES:[EDI]
022527C6   8B83 B85E4000    MOV EAX,DWORD PTR DS:[EBX+405EB8] ; &quot;com&quot;
022527CC   AB               STOS DWORD PTR ES:[EDI]
022527CD   31C0             XOR EAX,EAX
022527CF   AA               STOS BYTE PTR ES:[EDI]
022527D0   8D93 605E4000    LEA EDX,DWORD PTR DS:[EBX+405E60]
022527D6   52               PUSH EDX</pre>
</div>A decision is made at 0x02252764 for comparison of value at address [EBP-4] which is<br />
0x03E8 in teh begining that is 0x3E8 and then decreses along the looping through the successive loops.<br />
This is the maximum number of domains to be generated. If this value is greater than 0 then a jump is made to<br />
address 0x0225278B. Let us check what is at this address:<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:372px;">0225278B   FF4D FC          DEC DWORD PTR SS:[EBP-4]
0225278E   8DB3 A05E4000    LEA ESI,DWORD PTR DS:[EBX+405EA0] ; &quot;oGkS3w3sGGOGG7oc&quot;
02252794   B9 10000000      MOV ECX,10
02252799   31C0             XOR EAX,EAX
0225279B   31D2             XOR EDX,EDX
0225279D   AC               LODS BYTE PTR DS:[ESI]
0225279E   01C2             ADD EDX,EAX
022527A0  ^E2 FB            LOOPD SHORT 0225279D
022527A2   8DBB 605E4000    LEA EDI,DWORD PTR DS:[EBX+405E60] ; &quot;ssrgwnrmgrxe.com&quot;
022527A8   B9 0C000000      MOV ECX,0C
022527AD   0207             ADD AL,BYTE PTR DS:[EDI]
022527AF   30D0             XOR AL,DL
022527B1   0247 01          ADD AL,BYTE PTR DS:[EDI+1]
022527B4   3C 61            CMP AL,61
022527B6   76 04            JBE SHORT 022527BC
022527B8   3C 7A            CMP AL,7A
022527BA   72 04            JB SHORT 022527C0
022527BC   FEC2             INC DL
022527BE  ^EB ED            JMP SHORT 022527AD
022527C0   AA               STOS BYTE PTR ES:[EDI]
022527C1  ^E2 EA            LOOPD SHORT 022527AD
022527C3   B0 2E            MOV AL,2E ; &quot;.&quot;
022527C5   AA               STOS BYTE PTR ES:[EDI]
022527C6   8B83 B85E4000    MOV EAX,DWORD PTR DS:[EBX+405EB8] ; &quot;com&quot;
022527CC   AB               STOS DWORD PTR ES:[EDI]
022527CD   31C0             XOR EAX,EAX
022527CF   AA               STOS BYTE PTR ES:[EDI]
022527D0   8D93 605E4000    LEA EDX,DWORD PTR DS:[EBX+405E60]
022527D6   52               PUSH EDX</pre>
</div>The above code snippet is the DGA itself. It utilizes one hardcoded domain name as seed and another string as salt.<br />
Every new generated domain name gets consumed in generating next domain name. The difference in this DGA is<br />
that it it doesnt use date/time for domain generation, rather uses the domain name as seed for generating next domain.<br />
<br />
The reversed python code for TinBa's DGA is :<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:372px;">'''
   Filename  : TinBaDGA.py
   Developer : Garage4Hackers
   Greets    : b0nd, FB1H2S, &quot;vinnu&quot;, l0rdDeathStorm, nightrover and all g4h team

'''

import os, time

utility = &quot;TinBaDGA&quot;

def tinbaDGA(idomain, seed):
    print &quot;[+] &quot;+utility+&quot; : Initiated&quot;
    suffix = &quot;.com&quot;
    domains = []

    count = 0x03E8
    eax = 0
    edx = 0
    for i in range(count) :
        buf = ''
        esi = seed
        ecx = 0x10
        eax = 0
        edx = 0
        for s in range(len(seed)) :
            eax = ord(seed[s])
            edx += eax
        edi = idomain
        ecx = 0x0C
        d = 0
        while ( ecx &gt; 0 ):
            al = eax &amp; 0xFF
            dl = edx &amp; 0xFF
            #print &quot;0 eax : %x edx : %x ecx : %x&quot; % (eax, edx, ecx)
            #print &quot;0 al : %x dl : %x&quot; % (al, dl)
            al = al + ord(idomain[d])
            al = al ^ dl
            #print &quot;1 al : %x dl : %x&quot; % (al, dl)
            al += ord(idomain[d+1])
            al = al &amp; 0xFF
            #print &quot;2 al : %x dl : %x&quot; % (al, dl)
            eax = (eax &amp; 0xFFFFFF00)+al
            edx = (edx &amp; 0xFFFFFF00)+dl
            if al &gt; 0x61 :
                if al &lt; 0x7A :
                    #al = ord(idomain[d])
                    eax = (eax &amp; 0xFFFFFF00) +al
                    buf += chr(al)
                    d += 1
                    ecx -= 1
                    #print &quot;\tal : %x ecx : %x&quot; % (al, ecx)
                    continue
            #time.sleep(4)
            dl += 1
            dl = dl &amp; 0xFF
            edx = (edx &amp; 0xFFFFFF00)+dl
            
        domain = buf+suffix
        print &quot;[%d] %s&quot; %(i, domain)
        domains.append(domain)
        idomain = domain
    return domains        
                

def init():
    harddomain = &quot;ssrgwnrmgrxe.com&quot;
    seed = &quot;oGkS3w3sGGOGG7oc&quot;
    domains = tinbaDGA(harddomain, seed)
    index = 0
    fp = open(utility+&quot;.log&quot;, &quot;wb&quot;)
    for domain in domains :
        index += 1
        line = &quot;[%d] %s&quot; % (index, domain)
        fp.write(line+'\n')
        print line
    fp.close()
init()</pre>
</div>SHA256 hash of Sample under investigation : 856e486f338cbd8daed51932698f9cdc9c60f4558d22d963f5  6da7240490e465<br />
<br />
------------XXX-------------</blockquote>

]]></content:encoded>
			<dc:creator>garage4hackers</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=3086</guid>
		</item>
		<item>
			<title><![CDATA[Is NetTraveler APT managed by PLA Military Camp in Lanzhou [China] ???.]]></title>
			<link>http://garage4hackers.com/entry.php?b=3082</link>
			<pubDate>Sat, 30 Aug 2014 07:01:11 GMT</pubDate>
			<description>Here we are providing a detail Analysis about Netravelr APT team based on the data we collected over the past 1 year. 
Attachment 774...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">Here we are providing a detail Analysis about Netravelr APT team based on the data we collected over the past 1 year.<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=774&amp;d=1409382669" border="0" alt="Name:  Screen Shot 2014-08-30 at 12.22.00 pm.jpg
Views: 2931
Size:  26.4 KB"  style="float: CONFIG" /><br />
<br />
In 2014 the actors behind global cyber espionage campaign “Operation NetTraveler” celebrate ten years of activity.  NetTraveler has targeted more than 350 high-profile victims in 40 countries.  So it is high time we make our research public . This is not an individual research, instead this was part of efforts of various Garage4hackers members.  <br />
<br />
<a href="http://www.kaspersky.com/about/news/virus/2014/NetTraveler-Gets-Makeover-for-Tenth-Anniversary" target="_blank">Source</a>: <br />
<br />
Nettravler Group is big and have spent huge amount for malware infrastructure. They have<br />
24/7 Working hours . We were able to attribute Netravler to PLA[People liberation Army] military camp in Lanzhou.  Below is a list of countries that are infected by Netravler based on kaspersky report.<br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=775&amp;d=1409462409" border="0" alt="Name:  Screen Shot 2014-08-31 at 10.36.20 am.jpg
Views: 439
Size:  17.9 KB"  style="float: CONFIG" /><br />
<br />
We provide our analysis in the form of a PPT slide. <br />
<br />
<b><u>Slides here:<br />
</u></b><br />
<a href="http://www.slideshare.net/RahulSasi2/netravler-apt-attributionplachina" target="_blank">http://www.slideshare.net/RahulSasi2...butionplachina</a></blockquote>

]]></content:encoded>
			<dc:creator>garage4hackers</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=3082</guid>
		</item>
		<item>
			<title>Tutorial: Reverse Engineering GameoverZeus DGA code</title>
			<link>http://garage4hackers.com/entry.php?b=3081</link>
			<pubDate>Fri, 29 Aug 2014 12:53:55 GMT</pubDate>
			<description>_*DGA : Is it Game Over for GameoverZeus DGA 
*_ 
Attachment 773 (http://garage4hackers.com/attachment.php?attachmentid=773) 
GameoverZeus was...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore"><u><b>DGA : Is it Game Over for GameoverZeus DGA<br />
</b></u><br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=773&amp;d=1409316819" border="0" alt="Name:  Screen Shot 2014-08-29 at 6.12.14 pm.jpg
Views: 3290
Size:  21.3 KB"  style="float: CONFIG" /><br />
GameoverZeus was brought down and it reincarnated again. The Gameover Zeus is a very authentic contender in our DGA series. So let us analyse it and try to reverse its DGA just like we did in case of PushDO in last article.<br />
<a href="http://www.garage4hackers.com/entry.php?b=3080" target="_blank">http://www.garage4hackers.com/entry.php?b=3080</a><br />
<br />
We got lot of request whether we could have a tutorial on reverse engineering DGA codes. So in this series we would have a tutorial on how to Analyze an Gameover Zeus and its DGA code.<br />
<br />
Several researchers have already dedicated their precious efforts in documenting its anti-debug/VM behaviour.<br />
<br />
<br />
<u><b>Reverse Engineering GameoverZeus DGA code Tutorial. <br />
</b></u><br />
<u><b>Step 1:<br />
</b></u><br />
Put the sample in %temp%\anyname\filename.exe . Now kill the vmtoolsd.exe and double click the filename.exe.<br />
The file.exe will start another child process in my case it is muolax.exe. attach debugger to it.<br />
<br />
Now From where should we start? The obvious answers are two points:<br />
1. Where DGA starts<br />
2. Where DGA domains are used up<br />
<br />
The DGA mostly starts with any api returning time and DGA returns its final product to network/socket handling<br />
apis which resolve the domain names mostly gethostbyname, getaddrinfo etc.<br />
<br />
A search for intermodular api references renders us with 3 calls to &quot;GetSystemTime&quot;. The call at :<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">00430A9D   FF15 C4C24300    CALL DWORD PTR DS:[43C2C4]               ; kernel32.GetSystemTime</pre>
</div>Looks promising as some arithmatic is going on with 0x3E8. <br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:372px;">00430A77  ^72 CE            JB SHORT muolax.00430A47
00430A79   FF15 04C34300    CALL DWORD PTR DS:[43C304]               ; kernel32.GetTickCount
00430A7F   8BF8             MOV EDI,EAX
00430A81   85F6             TEST ESI,ESI
00430A83   74 14            JE SHORT muolax.00430A99
00430A85   B8 E8030000      MOV EAX,3E8
00430A8A   50               PUSH EAX
00430A8B   56               PUSH ESI
00430A8C   FF15 BCC24300    CALL DWORD PTR DS:[43C2BC]               ; kernel32.WaitForSingleObject
00430A92   3D 02010000      CMP EAX,102
00430A97   75 40            JNZ SHORT muolax.00430AD9
00430A99   8D45 F0          LEA EAX,DWORD PTR SS:[EBP-10]
00430A9C   50               PUSH EAX
; this is what we were finding:
00430A9D   FF15 C4C24300    CALL DWORD PTR DS:[43C2C4]               ; kernel32.GetSystemTime
00430AA3   33D2             XOR EDX,EDX
00430AA5   B9 E8030000      MOV ECX,3E8
00430AAA   8BC7             MOV EAX,EDI
00430AAC   F7F1             DIV ECX
00430AAE   8D4D C8          LEA ECX,DWORD PTR SS:[EBP-38]
00430AB1   52               PUSH EDX
00430AB2   8D55 F0          LEA EDX,DWORD PTR SS:[EBP-10]
00430AB5   E8 D3E5FFFF      CALL muolax.0042F08D
00430ABA   47               INC EDI
00430ABB   84C0             TEST AL,AL
00430ABD   74 11            JE SHORT muolax.00430AD0
00430ABF   56               PUSH ESI
00430AC0   FF75 08          PUSH DWORD PTR SS:[EBP+8]
00430AC3   8D45 C8          LEA EAX,DWORD PTR SS:[EBP-38]
00430AC6   50               PUSH EAX
00430AC7   E8 26FEFFFF      CALL muolax.004308F2
00430ACC   84C0             TEST AL,AL
00430ACE   75 0D            JNZ SHORT muolax.00430ADD
00430AD0   43               INC EBX
00430AD1   81FB F4010000    CMP EBX,1F4
00430AD7  ^72 A8            JB SHORT muolax.00430A81
00430AD9   32C0             XOR AL,AL
00430ADB   EB 13            JMP SHORT muolax.00430AF0
00430ADD   8D4D C8          LEA ECX,DWORD PTR SS:[EBP-38]
00430AE0   EB 07            JMP SHORT muolax.00430AE9
00430AE2   8B0CBD A8614000  MOV ECX,DWORD PTR DS:[EDI*4+4061A8]
00430AE9   E8 1F05FFFF      CALL muolax.0042100D
00430AEE   B0 01            MOV AL,1
00430AF0   5F               POP EDI
00430AF1   5E               POP ESI
00430AF2   5B               POP EBX
00430AF3   8BE5             MOV ESP,EBP
00430AF5   5D               POP EBP
00430AF6   C2 0800          RETN 8</pre>
</div>After call to GetSystemTime we have a call to 0042F08D.<br />
The interesting thing about this call is that if we search for words &quot;com&quot;, &quot;org&quot; &amp; &quot;biz&quot; in memory,<br />
debugger will end up inside this subroutine's code, it confirms that we are on right track.<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:372px;">0042F08D   55               PUSH EBP
0042F08E   8BEC             MOV EBP,ESP
0042F090   83EC 30          SUB ESP,30
0042F093   53               PUSH EBX
0042F094   56               PUSH ESI
0042F095   57               PUSH EDI
0042F096   8BF1             MOV ESI,ECX
0042F098   8BFA             MOV EDI,EDX
0042F09A   6A 00            PUSH 0
0042F09C   8D4D E4          LEA ECX,DWORD PTR SS:[EBP-1C]
0042F09F   E8 1F0D0000      CALL muolax.0042FDC3
0042F0A4   6A 04            PUSH 4
0042F0A6   5B               POP EBX
0042F0A7   53               PUSH EBX
0042F0A8   8D45 08          LEA EAX,DWORD PTR SS:[EBP+8]
0042F0AB   C745 F4 01051935 MOV DWORD PTR SS:[EBP-C],35190501
0042F0B2   50               PUSH EAX
0042F0B3   8D4D E4          LEA ECX,DWORD PTR SS:[EBP-1C]
0042F0B6   E8 820D0000      CALL muolax.0042FE3D
0042F0BB   84C0             TEST AL,AL
0042F0BD   0F84 05010000    JE muolax.0042F1C8
0042F0C3   6A 02            PUSH 2
0042F0C5   57               PUSH EDI
0042F0C6   8D4D E4          LEA ECX,DWORD PTR SS:[EBP-1C]
0042F0C9   E8 6F0D0000      CALL muolax.0042FE3D
0042F0CE   84C0             TEST AL,AL
0042F0D0   0F84 F2000000    JE muolax.0042F1C8
0042F0D6   53               PUSH EBX
0042F0D7   8D45 F4          LEA EAX,DWORD PTR SS:[EBP-C]
0042F0DA   50               PUSH EAX
0042F0DB   8D4D E4          LEA ECX,DWORD PTR SS:[EBP-1C]
0042F0DE   E8 5A0D0000      CALL muolax.0042FE3D
0042F0E3   84C0             TEST AL,AL
0042F0E5   0F84 DD000000    JE muolax.0042F1C8
0042F0EB   6A 02            PUSH 2
0042F0ED   8D47 02          LEA EAX,DWORD PTR DS:[EDI+2]
0042F0F0   50               PUSH EAX
0042F0F1   8D4D E4          LEA ECX,DWORD PTR SS:[EBP-1C]
0042F0F4   E8 440D0000      CALL muolax.0042FE3D
0042F0F9   84C0             TEST AL,AL
0042F0FB   0F84 C7000000    JE muolax.0042F1C8
0042F101   53               PUSH EBX
0042F102   8D45 F4          LEA EAX,DWORD PTR SS:[EBP-C]
0042F105   50               PUSH EAX
0042F106   8D4D E4          LEA ECX,DWORD PTR SS:[EBP-1C]
0042F109   E8 2F0D0000      CALL muolax.0042FE3D
0042F10E   84C0             TEST AL,AL
0042F110   0F84 B2000000    JE muolax.0042F1C8
0042F116   6A 02            PUSH 2
0042F118   8D47 06          LEA EAX,DWORD PTR DS:[EDI+6]
0042F11B   50               PUSH EAX
0042F11C   8D4D E4          LEA ECX,DWORD PTR SS:[EBP-1C]
0042F11F   E8 190D0000      CALL muolax.0042FE3D
0042F124   84C0             TEST AL,AL
0042F126   0F84 9C000000    JE muolax.0042F1C8
0042F12C   53               PUSH EBX
0042F12D   8D45 F4          LEA EAX,DWORD PTR SS:[EBP-C]
0042F130   50               PUSH EAX
0042F131   8D4D E4          LEA ECX,DWORD PTR SS:[EBP-1C]
0042F134   E8 040D0000      CALL muolax.0042FE3D
0042F139   84C0             TEST AL,AL
0042F13B   0F84 87000000    JE muolax.0042F1C8
0042F141   51               PUSH ECX
0042F142   8D45 D4          LEA EAX,DWORD PTR SS:[EBP-2C]
0042F145   50               PUSH EAX
0042F146   8D4D E4          LEA ECX,DWORD PTR SS:[EBP-1C]
0042F149   E8 960D0000      CALL muolax.0042FEE4
0042F14E   84C0             TEST AL,AL
0042F150   74 76            JE SHORT muolax.0042F1C8
0042F152   33DB             XOR EBX,EBX
0042F154   32C0             XOR AL,AL
0042F156   8845 FB          MOV BYTE PTR SS:[EBP-5],AL
0042F159   0FB6C0           MOVZX EAX,AL
0042F15C   8D1433           LEA EDX,DWORD PTR DS:[EBX+ESI]
0042F15F   6A 08            PUSH 8
0042F161   8B4C05 D4        MOV ECX,DWORD PTR SS:[EBP+EAX-2C]
0042F165   E8 73000000      CALL muolax.0042F1DD
0042F16A   85C0             TEST EAX,EAX
0042F16C   78 5A            JS SHORT muolax.0042F1C8
0042F16E   03D8             ADD EBX,EAX
0042F170   8A45 FB          MOV AL,BYTE PTR SS:[EBP-5]
0042F173   04 04            ADD AL,4
0042F175   8845 FB          MOV BYTE PTR SS:[EBP-5],AL
0042F178   3C 10            CMP AL,10
0042F17A  ^72 DD            JB SHORT muolax.0042F159
0042F17C   C60433 2E        MOV BYTE PTR DS:[EBX+ESI],2E
0042F180   43               INC EBX
0042F181   F645 08 03       TEST BYTE PTR SS:[EBP+8],3
0042F185   75 0C            JNZ SHORT muolax.0042F193
0042F187   C70433 636F6D00  MOV DWORD PTR DS:[EBX+ESI],6D6F63
0042F18E   83C3 03          ADD EBX,3
0042F191   EB 2F            JMP SHORT muolax.0042F1C2
0042F193   8B45 08          MOV EAX,DWORD PTR SS:[EBP+8]
0042F196   33D2             XOR EDX,EDX
0042F198   6A 03            PUSH 3
0042F19A   59               POP ECX
0042F19B   F7F1             DIV ECX
0042F19D   85D2             TEST EDX,EDX
0042F19F   75 09            JNZ SHORT muolax.0042F1AA
0042F1A1   C70433 6F726700  MOV DWORD PTR DS:[EBX+ESI],67726F
0042F1A8   EB 16            JMP SHORT muolax.0042F1C0
0042F1AA   F645 08 01       TEST BYTE PTR SS:[EBP+8],1
0042F1AE   75 09            JNZ SHORT muolax.0042F1B9
0042F1B0   C70433 62697A00  MOV DWORD PTR DS:[EBX+ESI],7A6962
0042F1B7   EB 07            JMP SHORT muolax.0042F1C0
0042F1B9   C70433 6E657400  MOV DWORD PTR DS:[EBX+ESI],74656E
0042F1C0   03D9             ADD EBX,ECX
0042F1C2   C60433 00        MOV BYTE PTR DS:[EBX+ESI],0
0042F1C6   EB 02            JMP SHORT muolax.0042F1CA
0042F1C8   32DB             XOR BL,BL
0042F1CA   8D4D E4          LEA ECX,DWORD PTR SS:[EBP-1C]
0042F1CD   E8 3A0C0000      CALL muolax.0042FE0C
0042F1D2   5F               POP EDI
0042F1D3   5E               POP ESI
0042F1D4   8AC3             MOV AL,BL
0042F1D6   5B               POP EBX
0042F1D7   8BE5             MOV ESP,EBP
0042F1D9   5D               POP EBP
0042F1DA   C2 0400          RETN 4</pre>
</div>The there are several calls to 0042FE3D. This is hashing routine. The subsequent calls to this subroutine<br />
adds year, month, day, 35190501 (salt), and the nonce(generated from 0x3E8 and subsequent iterations)<br />
The correct sequence is :<br />
1. Nonce : <br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:144px;">00430A9D   FF15 C4C24300    CALL DWORD PTR DS:[43C2C4]               ; kernel32.GetSystemTime
00430AA3   33D2             XOR EDX,EDX
00430AA5   B9 E8030000      MOV ECX,3E8
00430AAA   8BC7             MOV EAX,EDI ; EDI is teh counter/iterator
00430AAC   F7F1             DIV ECX
00430AAE   8D4D C8          LEA ECX,DWORD PTR SS:[EBP-38]
00430AB1   52               PUSH EDX	; EDX has nonce
00430AB2   8D55 F0          LEA EDX,DWORD PTR SS:[EBP-10]
00430AB5   E8 D3E5FFFF      CALL muolax.0042F08D
00430ABA   47               INC EDI ; counter increment : Nonce will be incremented</pre>
</div>The EDX has nonce/salt. It is added to MD5 hash object.<br />
2. Year is added to MD5 hash object<br />
3. 35190501 (salt)<br />
4. Month<br />
5. 35190501 (Salt)<br />
6. Day<br />
7. 35190501 (Salt)<br />
Generate MD5 hash. After generating MD5 hash a call to 0042F1DD is made at<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">0042F165   E8 73000000      CALL muolax.0042F1DD</pre>
</div>The subroutine 0042F1DD do arithmatic+logical operations on 8 byte stringlets of MD5 has in 4 separate iterations :<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:372px;">0042F1DD   53               PUSH EBX
0042F1DE   55               PUSH EBP
0042F1DF   8B6C24 0C        MOV EBP,DWORD PTR SS:[ESP+C]
0042F1E3   56               PUSH ESI
0042F1E4   57               PUSH EDI
0042F1E5   8BFA             MOV EDI,EDX
0042F1E7   4D               DEC EBP
0042F1E8   03EF             ADD EBP,EDI
0042F1EA   8BF7             MOV ESI,EDI
0042F1EC   3BF5             CMP ESI,EBP
0042F1EE   73 41            JNB SHORT muolax.0042F231
0042F1F0   8BC1             MOV EAX,ECX
0042F1F2   33D2             XOR EDX,EDX
0042F1F4   6A 24            PUSH 24
0042F1F6   59               POP ECX
0042F1F7   F7F1             DIV ECX
0042F1F9   894424 14        MOV DWORD PTR SS:[ESP+14],EAX
0042F1FD   80FA 09          CMP DL,9
0042F200   8D42 30          LEA EAX,DWORD PTR DS:[EDX+30]
0042F203   8D5A 57          LEA EBX,DWORD PTR DS:[EDX+57]
0042F206   0FB6C8           MOVZX ECX,AL
0042F209   0FB6C3           MOVZX EAX,BL
0042F20C   0F47C8           CMOVA ECX,EAX
0042F20F   880E             MOV BYTE PTR DS:[ESI],CL
0042F211   46               INC ESI
0042F212   8B4C24 14        MOV ECX,DWORD PTR SS:[ESP+14]
0042F216   85C9             TEST ECX,ECX
0042F218  ^75 D2            JNZ SHORT muolax.0042F1EC
0042F21A   8BC6             MOV EAX,ESI
0042F21C   880E             MOV BYTE PTR DS:[ESI],CL
0042F21E   2BC7             SUB EAX,EDI
0042F220   4E               DEC ESI
0042F221   8A0F             MOV CL,BYTE PTR DS:[EDI]
0042F223   8A16             MOV DL,BYTE PTR DS:[ESI]
0042F225   880E             MOV BYTE PTR DS:[ESI],CL
0042F227   4E               DEC ESI
0042F228   8817             MOV BYTE PTR DS:[EDI],DL
0042F22A   47               INC EDI
0042F22B   3BFE             CMP EDI,ESI
0042F22D  ^72 F2            JB SHORT muolax.0042F221
0042F22F   EB 02            JMP SHORT muolax.0042F233
0042F231   33C0             XOR EAX,EAX
0042F233   5F               POP EDI
0042F234   5E               POP ESI
0042F235   5D               POP EBP
0042F236   5B               POP EBX
0042F237   C2 0400          RETN 4</pre>
</div>Finally after creation of domain names, the TLD is attached as in<br />
following code of subroutine 0042F08D :<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:288px;">MOV DWORD PTR DS:[EBX+ESI],67726F
0042F17C   C60433 2E        MOV BYTE PTR DS:[EBX+ESI],2E ; &quot;.&quot;
0042F180   43               INC EBX
0042F181   F645 08 03       TEST BYTE PTR SS:[EBP+8],3
0042F185   75 0C            JNZ SHORT muolax.0042F193
0042F187   C70433 636F6D00  MOV DWORD PTR DS:[EBX+ESI],6D6F63 ; &quot;com&quot;
0042F18E   83C3 03          ADD EBX,3
0042F191   EB 2F            JMP SHORT muolax.0042F1C2
0042F193   8B45 08          MOV EAX,DWORD PTR SS:[EBP+8]
0042F196   33D2             XOR EDX,EDX
0042F198   6A 03            PUSH 3
0042F19A   59               POP ECX
0042F19B   F7F1             DIV ECX
0042F19D   85D2             TEST EDX,EDX
0042F19F   75 09            JNZ SHORT muolax.0042F1AA
0042F1A1   C70433 6F726700  MOV DWORD PTR DS:[EBX+ESI],67726F ; &quot;org&quot;
0042F1A8   EB 16            JMP SHORT muolax.0042F1C0
0042F1AA   F645 08 01       TEST BYTE PTR SS:[EBP+8],1
0042F1AE   75 09            JNZ SHORT muolax.0042F1B9
0042F1B0   C70433 62697A00  MOV DWORD PTR DS:[EBX+ESI],7A6962 ; &quot;biz&quot;
0042F1B7   EB 07            JMP SHORT muolax.0042F1C0
0042F1B9   C70433 6E657400  MOV DWORD PTR DS:[EBX+ESI],74656E ; &quot;net&quot;</pre>
</div>The TLD are com, org, biz and net.<br />
The following is the python code for GameoverZeus DGA :<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:372px;">'''
   Developer : Garage4Hackers
   Greets : b0nd, FB1H2S, vinnu, l0rdDeathStorm, nightrover and all g4h team
'''
import os, datetime, time, hashlib, socket

family = &quot;GameoverZeus&quot;
utility = family+&quot;-DGA&quot;
os.system(&quot;title &quot;+utility)

def hasher(data, algorithm=&quot;md5&quot;):
    h = hashlib.new(algorithm)
    h.update(data)
    return h.hexdigest()

def getDate():
    dt = str(datetime.datetime.now()).split(' ')[0]
    dstash = dt.split('-')
    dd = dstash[2]
    mm = dstash[1]
    yyyy = dstash[0]
    return int(dd),int(mm),int(yyyy)

def seeder(index, salt):
    ############
    edi = salt+index
    edx = 0
    ecx = 0x03E8
    eax = edi
    edx = eax % ecx
    eax = eax / ecx
    print &quot;eax : %x edx : %x salt : %x&quot; % (eax, edx, salt)
    day, month, year = getDate()
    h = hashlib.new(&quot;md5&quot;)
    dx = (&quot;%08x&quot;%socket.htonl(edx)).decode(&quot;hex&quot;)
    print &quot;\tedx : &quot;+dx.encode(&quot;hex&quot;)
    h.update(dx)
    y = (&quot;%x&quot;%socket.htons(year)).decode(&quot;hex&quot;)
    print &quot;\tyear : &quot;+y.encode(&quot;hex&quot;)
    h.update(y)
    s = (&quot;%08x&quot;%socket.htonl(salt)).decode(&quot;hex&quot;)
    print &quot;\tsalt : &quot;+s.encode(&quot;hex&quot;)
    h.update(s)
    m = (&quot;%04x&quot;%socket.htons(month)).decode(&quot;hex&quot;)
    print &quot;\tmonth : &quot;+m.encode(&quot;hex&quot;)
    h.update(m)
    print &quot;\tsalt : &quot;+s.encode(&quot;hex&quot;)
    h.update(s)
    d = (&quot;%x&quot;%socket.htons(day)).decode(&quot;hex&quot;)
    print &quot;\tday : &quot;+d.encode(&quot;hex&quot;)
    h.update(d)
    print &quot;\tsalt : &quot;+s.encode(&quot;hex&quot;)
    h.update(s)
    seed = h.hexdigest()
    return seed, edx

def generateDomain(hashlet):
    print &quot;Generating domain&quot;
    result = []
    print &quot;Hashlet : %x&quot; % hashlet
    #0042fef6:
    ##########
    ecx = hashlet
    ##########
    cl = 0
    dl = 0
    bl = 0
    eax = 0
    ebx = 0
    edx = 0
    esi = len(result)
    edi = 0
        
    while (ecx &amp; 0xFFFFFFFF) :
        eax = ecx
        edx = 0
        ecx = 0x24
        edx = eax % ecx
        eax = eax/ecx
        esp14 = eax
        dl = edx &amp; 0xFF
        #print &quot;eax: %x ecx : %x edx : %x ebx : %x dl : %x&quot; % (eax,ecx,edx,ebx, dl)
        eax = edx+0x30
        ebx = edx+0x57
        al = eax &amp; 0xFF
        bl = ebx &amp; 0xFF
        ecx = al
        eax = bl
        if dl &gt; 9 :
            ecx = eax
        cl = ecx &amp; 0xFF
        result.append(chr(cl))
        ecx = esp14
        #time.sleep(1)
    
    esi = len(result)
    eax = esi
    print &quot;result : %s, esi : %x cl %x&quot; %( ''.join(result), esi, cl)
    result[esi-1]= chr(cl)
    eax = eax-edi
    esi -= 1
    while edi &lt; esi :
        cl = result[edi]
        dl = result[esi]
        print &quot;\tesi: %x edi : %x cl : %s dl : %s result  :%s&quot; % (esi,edi,cl, dl, ''.join(result))
        result[esi] = cl
        esi -= 1
        result[edi] = dl
        edi +=1
        #print &quot;\t1esi: %x edi : %x cl : %s dl : %s result  :%s&quot; % (esi,edi,cl, dl, ''.join(result))
        #time.sleep(1)
    
    return ''.join(result)


def engine(salt = 0x35190501, maxiter = 1000):
    domains = []
    #salt = 0x35190501
    #maxiter = 1000
    for i in range(maxiter) :
        hashit, edx = seeder(i, salt)
        print &quot;hashit : &quot;+hashit
        hashstash = [int(hashit[:8],16), int(hashit[8:16],16),int(hashit[16:24],16),int(hashit[24:],16)]
        domain = ''
        if True :
        #while len(domain) &lt; 0x10 :
            index = 0
            for hashlet in hashstash:
                print &quot;Hashlet : %x&quot;% hashlet
                domain += generateDomain(socket.htonl(hashlet) &amp; 0xFFFFFFFF)
                print &quot;\t[%d] Domain : %s&quot; % (index, domain)
                index += 1
        print &quot;[%d] Domain : %s\n&quot; % (i, domain)
        #########################
        if (edx &amp; 3 == 0) :
            domain += &quot;.\x63\x6F\x6D&quot;
        elif (edx % 3 != 0 ) :
            if (edx &amp; 1 != 0) :
                domain += &quot;.\x6E\x65\x74&quot;
            else :
                domain += &quot;.\x62\x69\x7A&quot;
        else :
            domain += &quot;.\x6F\x72\x67&quot;
        #########################
        domains.append(domain)
    return domains

index = 0
dt = str(datetime.datetime.now()).split(' ')[0]
domains = engine()
fp = open(&quot;gzdga_domains_&quot;+dt+&quot;.txt&quot;,&quot;w&quot;)
for domain in domains:
    a = dt+&quot; | %d | %s\n&quot; % (index, domain)
    fp.write(a)
    print a
    index += 1
fp.close()</pre>
</div>Sample hash for practicing : 3ff49706e78067613aa1dcf0174968963b17f15e9a6bc54396  a9f233d382d0e6<br />
<a href="https://www.virustotal.com/en/file/3ff49706e78067613aa1dcf0174968963b17f15e9a6bc54396a9f233d382d0e6/analysis/" target="_blank">https://www.virustotal.com/en/file/3...d0e6/analysis/</a><br />
---------------XXX-------------<br />
<br />
Happy Reversing : Stay turned on our social media page for more update:<br />
<br />
<a href="https://www.facebook.com/Garage4Hackers" target="_blank">https://www.facebook.com/Garage4Hackers</a><br />
<a href="https://twitter.com/garage4hackers" target="_blank">https://twitter.com/garage4hackers</a><br />
<br />
Regards,<br />
<br />
Garage4Hackers<img src="http://garage4hackers.com/attachment.php?attachmentid=773&amp;d=1409316819" border="0" alt="Name:  Screen Shot 2014-08-29 at 6.12.14 pm.jpg
Views: 3290
Size:  21.3 KB"  style="float: CONFIG" /></blockquote>

]]></content:encoded>
			<dc:creator>garage4hackers</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=3081</guid>
		</item>
		<item>
			<title>Reverse Engineering : Domain generation for PushDo Malware algorithm released.</title>
			<link>http://garage4hackers.com/entry.php?b=3080</link>
			<pubDate>Mon, 25 Aug 2014 20:06:51 GMT</pubDate>
			<description>DGA : The domain generation for PushDo unleashed 
Attachment 756 (http://garage4hackers.com/attachment.php?attachmentid=756) 
 
*_About pushdo: 
_*...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">DGA : The domain generation for PushDo unleashed<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=756&amp;d=1408997056" border="0" alt="Name:  Screen Shot 2014-08-26 at 1.22.56 am.jpg
Views: 3885
Size:  21.3 KB"  style="float: CONFIG" /><br />
<br />
<b><u>About pushdo:<br />
</u></b><br />
Four times since 2008, authorities and technology companies have taken the prolific PushDo malware and Cutwail spam botnet offline. Yet much like the Energizer Bunny, it keeps coming back for more.<br />
<br />
In early March, researchers at Damballa discovered a new version of the malware that had adopted a domain generation algorithm (DGA) in order to not only help it avoid detection by security researchers, but to add resiliency.<br />
<a href="http://threatpost.com/pushdo-malware-resurfaces-with-dga-capabilities" target="_blank">http://threatpost.com/pushdo-malware-resurfaces-with-dga-capabilities<br />
</a><br />
<br />
In this blog post I would explain the  DGA algorithm used behind Pushdo malware . Based on bitdefender figures Indian PCs have been most affected by the outbreak of pushdo, but systems in the UK, France and the US have also been hit.<br />
<a href="http://labs.bitdefender.com/2014/07/pushdo-sinkholing-continues-size-of-problem-now-apparent/#more-2002" target="_blank">http://labs.bitdefender.com/2014/07/...ent/#more-2002</a><br />
<br />
<b><u>[Analysis]<br />
</u></b><br />
The unpacked artefacts clearly shows a glimpse of DGA :<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:120px;">04006598  50 36 34 00 57 69 6E 58 50 00 00 00 57 69 6E 32  P64.WinXP...Win2
040065A8  4B 00 00 00 7A 78 74 73 72 71 70 6E 6D 6C 6B 67  K...zxtsrqpnmlkg
040065B8  66 64 63 62 00 00 00 00 61 69 6F 75 00 00 00 00  fdcb....aiou....
040065C8  61 65 69 6F 75 79 00 00 62 63 64 66 67 68 6A 6B  aeiouy..bcdfghjk
040065D8  6C 6D 6E 70 71 72 73 74 76 77 78 7A 00 00 00 00  lmnpqrstvwxz....
040065E8  2E 6B 7A 00 73 6D 74 70 2E 63 6F 6D 70 75 73 65  .kz.smtp.compuse
040065F8  72 76 65 2E 63 6F 6D 00 6D 61 69 6C 2E 61 69 72  rve.com.mail.air
04006608  6D 61 69 6C 2E 6E 65 74 00 00 00 00 73 6D 74 70  mail.net....smtp</pre>
</div>The presence of groups of vowels and consonents, anyone can seta breakpoint on them<br />
and it the debugger will pop directly in DGA code, when they'll be processed.<br />
<br />
The PushDo is known to generate &quot;.kz&quot; suffix domains, the presence of &quot;.kz&quot; at 040065E8<br />
is of immense help in discovery of DGA, we can cross check the reference to &quot;.kz&quot; in decompressed<br />
code right after packer finishes its own job. Just set breakpoint at &quot;VirtualProtect&quot; and let it go for 2 times, then<br />
break the execution at any point.<br />
<br />
Check the reference to &quot;.kz&quot; string :<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">0400523F PUSH 40065E8 ; &quot;.kz&quot;</pre>
</div>There we land in DGA. Let us check the dissembled code from prologue :<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:372px;">0400519B   55               PUSH EBP
0400519C   8D6C24 94        LEA EBP,DWORD PTR SS:[ESP-6C]
040051A0   81EC 98000000    SUB ESP,98
040051A6   53               PUSH EBX
040051A7   56               PUSH ESI
040051A8   8B75 74          MOV ESI,DWORD PTR SS:[EBP+74]
040051AB   33DB             XOR EBX,EBX
040051AD   895D 68          MOV DWORD PTR SS:[EBP+68],EBX
040051B0   3BF3             CMP ESI,EBX
040051B2   0F84 A2000000    JE 0400525A
040051B8   57               PUSH EDI
040051B9   8B7D 78          MOV EDI,DWORD PTR SS:[EBP+78]
040051BC   3BFB             CMP EDI,EBX
040051BE   0F84 95000000    JE 04005259
040051C4   8D45 54          LEA EAX,DWORD PTR SS:[EBP+54]
040051C7   50               PUSH EAX
040051C8   FF15 00610004    CALL DWORD PTR DS:[4006100]                             ; kernel32.GetLocalTime
040051CE   0FB745 5A        MOVZX EAX,WORD PTR SS:[EBP+5A]
040051D2   50               PUSH EAX
040051D3   0FB745 56        MOVZX EAX,WORD PTR SS:[EBP+56]
040051D7   50               PUSH EAX
040051D8   0FB745 54        MOVZX EAX,WORD PTR SS:[EBP+54]
040051DC   50               PUSH EAX
040051DD   E8 B1000000      CALL 04005293 : GenerateSeed(day, month, year)
040051E2   0345 7C          ADD EAX,DWORD PTR SS:[EBP+7C]
040051E5   83C4 0C          ADD ESP,0C
040051E8   3BFB             CMP EDI,EBX
040051EA   8945 74          MOV DWORD PTR SS:[EBP+74],EAX
040051ED   7E 6A            JLE SHORT 04005259
040051EF   897D 64          MOV DWORD PTR SS:[EBP+64],EDI
040051F2   897D 68          MOV DWORD PTR SS:[EBP+68],EDI
040051F5   BF 80000000      MOV EDI,80
040051FA   57               PUSH EDI
040051FB   8D45 D4          LEA EAX,DWORD PTR SS:[EBP-2C]
040051FE   6A 00            PUSH 0
04005200   50               PUSH EAX
04005201   E8 53F0FFFF      CALL 04004259 ; clears memory (memset)
04005206   57               PUSH EDI
04005207   8D45 D4          LEA EAX,DWORD PTR SS:[EBP-2C]
0400520A   50               PUSH EAX
0400520B   8D45 74          LEA EAX,DWORD PTR SS:[EBP+74]
0400520E   6A 04            PUSH 4
04005210   50               PUSH EAX
04005211   E8 C5F4FFFF      CALL 040046DB : GenerateMDHash()
04005216   83C4 1C          ADD ESP,1C
04005219   85C0             TEST EAX,EAX
0400521B   7E 05            JLE SHORT 04005222
0400521D   8B4D D4          MOV ECX,DWORD PTR SS:[EBP-2C]
04005220   EB 05            JMP SHORT 04005227
04005222   8B4D 74          MOV ECX,DWORD PTR SS:[EBP+74]
04005225   03CB             ADD ECX,EBX
04005227   894D 74          MOV DWORD PTR SS:[EBP+74],ECX
0400522A   83E1 03          AND ECX,3
0400522D   83C1 09          ADD ECX,9
04005230   51               PUSH ECX
04005231   56               PUSH ESI
04005232   50               PUSH EAX
04005233   8D45 D4          LEA EAX,DWORD PTR SS:[EBP-2C]
04005236   50               PUSH EAX
04005237   E8 D8FEFFFF      CALL 04005114 ; Generates domain
0400523C   83C4 10          ADD ESP,10
0400523F   68 E8650004      PUSH 40065E8                                            ; ASCII &quot;.kz&quot;
04005244   56               PUSH ESI
04005245   FF15 E0600004    CALL DWORD PTR DS:[40060E0]                             ; kernel32.lstrcatA
0400524B   FF45 74          INC DWORD PTR SS:[EBP+74]
0400524E   83C3 07          ADD EBX,7
04005251   83C6 28          ADD ESI,28
04005254   FF4D 64          DEC DWORD PTR SS:[EBP+64]
04005257  ^75 A1            JNZ SHORT 040051FA
04005259   5F               POP EDI
0400525A   8B45 68          MOV EAX,DWORD PTR SS:[EBP+68]
0400525D   5ESI
0400525E   5B               POP EBX
0400525F   83C5 6C          ADD EBP,6C
04005262   C9               LEAVE
04005263   C3               RETN</pre>
</div>The above shown code snippet is the DGA itself. The code starts with a call to GetLocalTime as:<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">040051C8   FF15 00610004    CALL DWORD PTR DS:[4006100]                             ; kernel32.GetLocalTime</pre>
</div>The very next call after GetLocalTime call takes year, month and day returned by returned by GetLocalTime as :<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:108px;">040051CE   0FB745 5A        MOVZX EAX,WORD PTR SS:[EBP+5A]
040051D2   50               PUSH EAX
040051D3   0FB745 56        MOVZX EAX,WORD PTR SS:[EBP+56]
040051D7   50               PUSH EAX
040051D8   0FB745 54        MOVZX EAX,WORD PTR SS:[EBP+54]
040051DC   50               PUSH EAX
040051DD   E8 B1000000      CALL 04005293</pre>
</div>The code at 04005293 returns a number and that number is then added to one of arguments of DGA itself.<br />
as in following line :<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">040051E2   0345 7C          ADD EAX,DWORD PTR SS:[EBP+7C]</pre>
</div>Initially this argument at [EBP+7C] is 0. call instruction at<br />
<br />
[code]<br />
04005201   E8 53F0FFFF      CALL 04004259<br />
[code]<br />
<br />
Is setting up memory for action, so its a memset call.<br />
The interesting calls occurs at:<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">04005211   E8 C5F4FFFF      CALL 040046DB</pre>
</div>This call generates MD5 hash of number returned and processed by 04005293 as in following code:<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:48px;">040051DD   E8 B1000000      CALL 04005293 : GenerateSeed(day, month, year)
040051E2   0345 7C          ADD EAX,DWORD PTR SS:[EBP+7C]</pre>
</div>MD5 is generated of seed + no. at [EBP+7C]. Now the only call left before strcat of &quot;.kz&quot; is<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">04005237   E8 D8FEFFFF      CALL 04005114</pre>
</div>It looks like this is the domain name generator based on the MD5 hash generated by the seed.<br />
Let us check the code<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:372px;">04005114   55               PUSH EBP
04005115   8BEC             MOV EBP,ESP
04005117   83EC 0C          SUB ESP,0C
0400511A   57               PUSH EDI
0400511B   33FF             XOR EDI,EDI
0400511D   33C0             XOR EAX,EAX
0400511F   397D 08          CMP DWORD PTR SS:[EBP+8],EDI
04005122   74 74            JE SHORT 04005198
04005124   397D 0C          CMP DWORD PTR SS:[EBP+C],EDI
04005127   74 6F            JE SHORT 04005198
04005129   53               PUSH EBX
0400512A   8B5D 10          MOV EBX,DWORD PTR SS:[EBP+10]
0400512D   3BDF             CMP EBX,EDI
0400512F   74 66            JE SHORT 04005197
04005131   397D 14          CMP DWORD PTR SS:[EBP+14],EDI
04005134   74 61            JE SHORT 04005197
04005136   56               PUSH ESI
04005137   8B35 90600004    MOV ESI,DWORD PTR DS:[4006090]                          ; kernel32.lstrlenA
0400513D   53               PUSH EBX
0400513E   FFD6             CALL ESI
04005140   397D 0C          CMP DWORD PTR SS:[EBP+C],EDI
04005143   7E 40            JLE SHORT 04005185
04005145   3B45 14          CMP EAX,DWORD PTR SS:[EBP+14]
04005148   7D 3B            JGE SHORT 04005185
0400514A   8B45 08          MOV EAX,DWORD PTR SS:[EBP+8]
0400514D   8A0407           MOV AL,BYTE PTR DS:[EDI+EAX]
04005150   6A 08            PUSH 8
04005152   8845 FC          MOV BYTE PTR SS:[EBP-4],AL
04005155   8D45 F4          LEA EAX,DWORD PTR SS:[EBP-C]
04005158   6A 00            PUSH 0
0400515A   50               PUSH EAX
0400515B   E8 F9F0FFFF      CALL 04004259 ; Memset
04005160   6A 07            PUSH 7
04005162   8D45 F4          LEA EAX,DWORD PTR SS:[EBP-C]
04005165   50               PUSH EAX
04005166   FF75 FC          PUSH DWORD PTR SS:[EBP-4]
04005169   E8 26FFFFFF      CALL 04005094 ; Generates domain stringlets (parts of domain name in sequential order)
0400516E   83C4 18          ADD ESP,18
04005171   8D45 F4          LEA EAX,DWORD PTR SS:[EBP-C]
04005174   50               PUSH EAX
04005175   53               PUSH EBX
04005176   FF15 E0600004    CALL DWORD PTR DS:[40060E0]                             ; kernel32.lstrcatA
0400517C   53               PUSH EBX
0400517D   FFD6             CALL ESI
0400517F   47               INC EDI
04005180   3B7D 0C          CMP EDI,DWORD PTR SS:[EBP+C]
04005183  ^7C C0            JL SHORT 04005145
04005185   53               PUSH EBX
04005186   FFD6             CALL ESI
04005188   8B4D 14          MOV ECX,DWORD PTR SS:[EBP+14]
0400518B   3BC1             CMP EAX,ECX
0400518D   7E 04            JLE SHORT 04005193
0400518F   C6040B 00        MOV BYTE PTR DS:[EBX+ECX],0
04005193   53               PUSH EBX
04005194   FFD6             CALL ESI
04005196   5E               POP ESI
04005197   5B               POP EBX
04005198   5F               POP EDI
04005199   C9               LEAVE</pre>
</div>The only important call in above code snippet is<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">04005169   E8 26FFFFFF      CALL 04005094</pre>
</div>Before this call string length is being checked and the returned string from this call<br />
is being strcat to earlier produced string from same call. So this loop is the domain name generator,<br />
in which the subroutine at 04005094 is responsible for generating the stringlets for domain name.<br />
Lets check code at 04005094<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:372px;"> 04005094   8B4C24 08        MOV ECX,DWORD PTR SS:[ESP+8]
04005098   33C0             XOR EAX,EAX
0400509A   85C9             TEST ECX,ECX
0400509C   74 75            JE SHORT 04005113
0400509E   837C24 0C 03     CMP DWORD PTR SS:[ESP+C],3
040050A3   7E 6E            JLE SHORT 04005113
040050A5   53               PUSH EBX
040050A6   8A5C24 08        MOV BL,BYTE PTR SS:[ESP+8]
040050AA   57               PUSH EDI
040050AB   6A 13            PUSH 13
040050AD   33D2             XOR EDX,EDX
040050AF   0FB6C3           MOVZX EAX,BL
040050B2   5F               POP EDI
040050B3   F7F7             DIV EDI
040050B5   FEC3             INC BL
040050B7   6A 05            PUSH 5
040050B9   5F               POP EDI
040050BA   6A 02            PUSH 2
040050BC   8A82 D0650004    MOV AL,BYTE PTR DS:[EDX+40065D0] 
040050C2   8801             MOV BYTE PTR DS:[ECX],AL
040050C4   0FB6C3           MOVZX EAX,BL
040050C7   33D2             XOR EDX,EDX
040050C9   F7F7             DIV EDI
040050CB   FEC3             INC BL
040050CD   8A82 C8650004    MOV AL,BYTE PTR DS:[EDX+40065C8]
040050D3   8841 01          MOV BYTE PTR DS:[ECX+1],AL
040050D6   8079 01 65       CMP BYTE PTR DS:[ECX+1],65
040050DA   58               POP EAX
040050DB   75 17            JNZ SHORT 040050F4
040050DD   F6C3 07          TEST BL,7
040050E0   74 12            JE SHORT 040050F4
040050E2   0FB6C3           MOVZX EAX,BL
040050E5   6A 03            PUSH 3
040050E7   33D2             XOR EDX,EDX
040050E9   5F               POP EDI
040050EA   F7F7             DIV EDI
040050EC   8A82 C0650004    MOV AL,BYTE PTR DS:[EDX+40065C0]
040050F2   EB 17            JMP SHORT 0400510B
040050F4   F6C3 01          TEST BL,1
040050F7   74 18            JE SHORT 04005111
040050F9   FEC3             INC BL
040050FB   0FB6C3           MOVZX EAX,BL
040050FE   6A 0F            PUSH 0F
04005100   33D2             XOR EDX,EDX
04005102   5F               POP EDI
04005103   F7F7             DIV EDI
04005105   8A82 AC650004    MOV AL,BYTE PTR DS:[EDX+40065AC]
0400510B   6A 03            PUSH 3
0400510D   8841 02          MOV BYTE PTR DS:[ECX+2],AL
04005110   58               POP EAX
04005111   5F               POP EDI
04005112   5B               POP EBX
04005113   C3               RETN</pre>
</div>This call processes the above generated MD5 hash and produces stringlets,<br />
whereas 04005114 subroutine generates domain name from these stringlets.<br />
For next domain name,<br />
the first DWORD of processed MD5 (first 8 bytes in hex) + 1<br />
are taken as seed to generate next md5hash.<br />
<br />
The decoded python version of this DGA is :<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:372px;">'''
   Developer : Garage4Hackers
   Greets : b0nd, FB1H2S, &quot;vinnu&quot;, l0rdDeathStorm, nightrover and all g4h team
'''
import os, time, datetime, hashlib

print &quot;PushDO-DGA&quot;

def rc4crypt(data, key):
    x = 0
    box = range(256)
    for i in range(256):
        x = (x + box[i] + ord(key[i % len(key)])) % 256
        box[i], box[x] = box[x], box[i]
    x = 0
    y = 0
    out = []
    for char in data:
        x = (x + 1) % 256
        y = (y + box[x]) % 256
        box[x], box[y] = box[y], box[x]
        out.append(chr(ord(char) ^ box[(box[x] + box[y]) % 256]))
    
    return ''.join(out)

def hasher(data, algorithm=&quot;md5&quot;):
    h = hashlib.new(algorithm)
    h.update(data)
    return h.hexdigest()

def getDate():
    dt = str(datetime.datetime.now()).split(' ')[0]
    dstash = dt.split('-')
    dd = dstash[2]
    mm = dstash[1]
    yyyy = dstash[0]
    return int(dd),int(mm),int(yyyy)

def generateSeed(a1, a2, a3) :
  result = ''
  v4 = ''
  v5 = 0
  v6 = 0
  v7 = 0
  v8 = &quot;1F1C1F1E1F1E1F1F1E1F1E1F&quot;
  v8 = v8.decode(&quot;hex&quot;)
  result = 0
  if ( a1 &gt; 0 ) :
    if ( (a2 - 1) &lt;= 0xB ) :
      if ((a3 - 1) &lt;= 0x1E ) :
        v4 = (a1 &amp; 0x80000003) == 0
        if ( (a1 &amp; 0x80000003) &lt; 0 ) :
          v4 = (((a1 &amp; 0x80000003) - 1) | 0xFFFFFFFC) == -1
          print &quot;v4 : %x&quot;%v4
        if ( v4 ) :
          v8[11] = chr(0x1D)
        v5 = 0
        if ( a2 &gt; 1 ) :
          v7 = v8 #&amp;v8
          v6 = a2 - 1
	  i7 = 0
          while (v6) :
            v5 += ord(v7[i7]) #*v7
            i7 += 1
            v6 -= 1
            print &quot;\tv5 : %x v6 : %x v7 : %x&quot;%(v5, v6,ord(v7[i7]))
        ecx = 365 * (a1 - (a1 / 4))
        eax = 366 * (a1 / 4)
        print &quot;ecx : %x eax : %x&quot;%(ecx, eax)
        result = a3 + v5 + ecx + eax

  return result

def generateString(salt, seed):
    buf = ''
    tmp = &quot;%08x&quot; % seed
    tmp = tmp.decode(&quot;hex&quot;)
    for i in range(4) :
        buf = tmp[i]+buf
    return buf

def generateDomain(mdhash, length):
    buf = ''
    for c in mdhash:
        if len(buf) &gt; length :
            return buf
	bl = ord(c)
	v1 = &quot;aiou&quot;
	v2 = &quot;aeiouy&quot;
    	c1 = &quot;bcdfghjklmnpqrstvwxz&quot;
    	c2 = &quot;zxtsrqpnmlkgfdcb&quot;
	edx = 0
    	eax = bl
	edi = 0x13
    	edx = eax%edi
    	bl += 1
	edi = 5
    	al = c1[edx]
    	print &quot;edx : %x al : %s bl : %x&quot; % (edx, al, bl)
	buf += al
    	eax = bl
	edx = 0
    	edx = eax%edi
	bl += 1
    	al = v2[edx]
    	print &quot;edx : %x al : %s bl : %x&quot; % (edx, al, bl)
	buf += al
	eax = 2
	
	if ord(al) == 0x65 :
        
            if bl &amp; 0x07 :
                eax = bl
                edi = 3
                edx = 0
                edx = eax%edi
                al = v1[edx]
                print &quot;\t[1]edx : %x al : %s bl : %x&quot; % (edx, al, bl)
                buf += al
            '''
            else :
                if bl != 1 :
                    bl += 1
                    eax = bl
                    edi = 0x0F
                    edx = 0
                    edx = eax%edi
                    al = c2[edx]
                    print &quot;\t[2]edx : %x al : %s bl : %x&quot; % (edx, al, bl)
                    buf += al
            '''
        else :
            if (bl &amp; 1) :
                bl += 1
                eax = bl
                edi = 0x0F
                edx = 0
                edx = eax%edi
                al = c2[edx]
                print &quot;\t[0]edx : %x al : %s bl : %x&quot; % (edx, al, bl)
                buf += al
        bl += 1
                    
    return buf

def initDGA(salt):
    domains = []
    print &quot;[+] &quot;+utility+&quot; : Initiated&quot;
    day,month,year = getDate()
    print &quot;day : &quot;+str(day)
    seed = generateSeed(year, month, day)
    seed = generateString(salt, seed)#.decode(&quot;hex&quot;)
    print &quot;tmp : &quot;+seed.encode(&quot;hex&quot;)
    for i in range(0x1E):
        print &quot;Seed : %s&quot; %seed.encode(&quot;hex&quot;)
        hashit = hasher(seed)
        print &quot;hash : &quot;+hashit
        domain = generateDomain(hashit.decode(&quot;hex&quot;), 0x0A)
        print &quot;Domain : &quot;+domain
        seed = (&quot;%08x&quot; % (int(hashit[:8],16)+0x01000000)).decode(&quot;hex&quot;)
        domains.append(domain)
        #time.sleep(1)
    return domains

domains = initDGA(0)
index = 0
for domain in domains :
    print &quot;[&quot;+str(index)+&quot;] &quot;+domain[:8]+&quot;.kz&quot;
    index += 1</pre>
</div>A total of 0x1E domains are generated for 1 day. The PushDo is known to generate domains<br />
in the range of 30 previous days plus 15 next days totalling 46 days generating 1380 domains<br />
to contact in a day. Above python code for DGA generates domains for current day only,<br />
but it can be modified to generate all 1380 domains easily.<br />
<br />
Sample SHA256 : 42b62189ab294872fd8c587d80823cbc8aab0e256dc3a7fa35  5a28482a58e8a2<br />
------------------------XXX------------------------</blockquote>

]]></content:encoded>
			<dc:creator>garage4hackers</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=3080</guid>
		</item>
	</channel>
</rss>
