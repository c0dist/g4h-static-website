<?xml version="1.0" encoding="ISO-8859-1"?>

<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:content="http://purl.org/rss/1.0/modules/content/">
	<channel>
		<title>Garage4hackers Forum - Blogs - 41.w4r10r</title>
		<link>http://garage4hackers.com/blog.php?u=16</link>
		<description>Garage4Hackers(G4H) is an open security community for Information Security enthusiasts, gurus and aspirants.Members of the team dedicate time and resources towards helping other information security aspirants, sharing knowledge,spreading security awareness and promoting research.</description>
		<language>en</language>
		<lastBuildDate>Sun, 22 Mar 2020 10:25:29 GMT</lastBuildDate>
		<generator>vBulletin</generator>
		<ttl>60</ttl>
		<image>
			<url>http://garage4hackers.com/images/misc/rss.jpg</url>
			<title>Garage4hackers Forum - Blogs - 41.w4r10r</title>
			<link>http://garage4hackers.com/blog.php?u=16</link>
		</image>
		<item>
			<title>ZeroAccess new variant(Self Debugging) Unpacker</title>
			<link>http://garage4hackers.com/entry.php?b=1096</link>
			<pubDate>Wed, 04 Dec 2013 10:34:44 GMT</pubDate>
			<description>On Behalf of Arunpreet Singh 
 
ZeroAccess new variant (crypter) is in the news from past   few days. It is different from traditional crypters which...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">On Behalf of Arunpreet Singh<br />
<br />
ZeroAccess new variant (crypter) is in the news from past   few days. It is different from traditional crypters which either uses RunPE or overwrite  the   original image with decrypted Image.It is already covered in avast blog post ,so i  will just summarize it in shorter steps.It Basically uses Self debugging concept (it’s not a  new thing)<br />
<br />
1)Launch its own  instance  in debug mode (child process)<br />
2)Parents Process Enter into debug loop ,and  listen for events from debugee and handle them<br />
3)It decrypts the Embedded PE when it Receives  SINGLE_STEP  Exception<br />
<br />
After Decrypting the Image we have following  Function<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:372px;">.text:004013DA ZeroAccess_PE_Load proc near ; CODE XREF: sub_4014A7+42p
.text:004013DA
.text:004013DA Local_SizeofImage= dword ptr -14h
.text:004013DA var_10 = dword ptr -10h
.text:004013DA var_C = dword ptr -0Ch
.text:004013DA Section_Handle = dword ptr -8
.text:004013DA Section_Base_Address= dword ptr -4
.text:004013DA Decompress_Binary= dword ptr 8
.text:004013DA Size = dword ptr 0Ch
.text:004013DA
.text:004013DA push ebp
.text:004013DB mov ebp, esp
.text:004013DD sub esp, 14h
.text:004013E0 push ebx
.text:004013E1 push esi
.text:004013E2 push edi
.text:004013E3 push [ebp+Decompress_Binary]
.text:004013E6 call ds:RtlImageNtHeader
.text:004013EC mov ebx, eax
.text:004013EE xor esi, esi
.text:004013F0 cmp ebx, esi ; Check if Valid NT Header
.text:004013F2 jz Invalid_Nt_Header_Return_0
.text:004013F8 mov eax, [ebx+IMAGE_NT_HEADERS32.OptionalHeader.SizeOfImage]
.text:004013FB push esi
.text:004013FC mov [ebp+Local_SizeofImage], eax
.text:004013FF push SEC_COMMIT
.text:00401404 xor eax, eax
.text:00401406 push PAGE_EXECUTE_READWRITE
.text:00401408 lea edi, [ebp+var_10]
.text:0040140B stosd
.text:0040140C lea eax, [ebp+Local_SizeofImage]
.text:0040140F push eax
.text:00401410 push esi
.text:00401411 push SECTION_ALL_ACCESS
.text:00401416 lea eax, [ebp+Section_Handle]
.text:00401419 push eax
.text:0040141A call ds:ZwCreateSection
.text:00401420 test eax, eax
.text:00401422 jl short Invalid_Nt_Header_Return_0
.text:00401424 push 4
.text:00401426 push esi
.text:00401427 push 2
.text:00401429 lea eax, [ebp+var_C]
.text:0040142C push eax
.text:0040142D push esi
.text:0040142E push esi
.text:0040142F push esi
.text:00401430 lea eax, [ebp+Section_Base_Address]
.text:00401433 push eax
.text:00401434 push 0FFFFFFFFh
.text:00401436 push [ebp+Section_Handle]
.text:00401439 mov [ebp+Section_Base_Address], esi
.text:0040143C mov [ebp+var_C], esi
.text:0040143F call ds:ZwMapViewOfSection
.text:00401445 test eax, eax
.text:00401447 jl short Close_Handle
.text:00401449 mov edi, [ebp+Section_Base_Address]
.text:0040144C mov esi, [ebp+Decompress_Binary]
.text:0040144F mov ecx, [ebx+IMAGE_NT_HEADERS32.OptionalHeader.SizeOfHeaders]
.text:00401452 rep movsb
.text:00401454 movzx edx, [ebx+IMAGE_NT_HEADERS32.FileHeader.NumberOfSections]
.text:00401458 movzx eax, [ebx+IMAGE_NT_HEADERS32.FileHeader.SizeOfOptionalHeader]
.text:0040145C lea eax, [eax+ebx+IMAGE_NT_HEADERS32.OptionalHeader]
.text:00401460 test edx, edx
.text:00401462 jz short If_Zero_Section
.text:00401464 add eax, 14h ; PImage_Section_Header-&gt;PointertoRawData
.text:00401467
.text:00401467 Copy_Sections: ; CODE XREF: ZeroAccess_PE_Load+A1j
.text:00401467 mov esi, [eax] ; ESI=Pointer to Raw Data
.text:00401469 mov edi, [eax-8] ; EDI=Virtual_Address
.text:0040146C add esi, [ebp+Decompress_Binary] ; PointerToRawData_Binary_ImageBase
.text:0040146F add edi, [ebp+Section_Base_Address]
.text:00401472 mov ecx, [eax-4] ; SizeOfRawData
.text:00401475 add eax, 28h ;Point to Next Section Headerr
.text:00401478 dec edx ;decrement no_of_section
.text:00401479 rep movsb
.text:0040147B jnz short Copy_Sections ; ESI=Pointer to Raw Data
.text:0040147D
.text:0040147D If_Zero_Section: ; CODE XREF: ZeroAccess_PE_Load+88j
.text:0040147D push [ebp+Section_Base_Address]
.text:00401480 push 0FFFFFFFFh
.text:00401482 call ds:ZwUnmapViewOfSection
.text:00401488 mov eax, [ebp+Section_Handle]
.text:0040148B mov ecx, [ebp+Size]
.text:0040148E mov [ecx], eax
.text:00401490 xor eax, eax
.text:00401492 inc eax
.text:00401493 jmp short Return
.text:00401495 ; ---------------------------------------------------------------------------
.text:00401495
.text:00401495 Close_Handle: ; CODE XREF: ZeroAccess_PE_Load+6Dj
.text:00401495 push [ebp+Section_Handle]
.text:00401498 call ds:ZwClose
.text:0040149E
.text:0040149E Invalid_Nt_Header_Return_0: ; CODE XREF: ZeroAccess_PE_Load+18j
.text:0040149E ; ZeroAccess_PE_Load+48j
.text:0040149E xor eax, eax
.text:004014A0
.text:004014A0 Return: ; CODE XREF: ZeroAccess_PE_Load+B9j
.text:004014A0 pop edi
.text:004014A1 pop esi
.text:004014A2 pop ebx
.text:004014A3 leave
.text:004014A4 retn 8hg
.text:004014A4 ZeroAccess_PE_Load endp</pre>
</div>This  routine act as a PE Loader ,it reads PE Header and Load PE Decrypted Image Accordingly<br />
<br />
So where we can possibly dump it ??<br />
<br />
A really good candidate is RtlImageNtHeader !!!<br />
<br />
Prototype from ReactOs<br />
<br />
PIMAGE_NT_HEADERS NTAPI RtlImageNtHeader(IN PVOID ModuleAddress );<br />
<br />
It takes Raw Binary as Input and Give Back Pointer to IMAGE_NT_HEADERS,So idea is to Hook the RtlImageNtHeader and Dump the Memory Block,As we are dumping to binary in raw state so we do not have to realign the binary .<br />
<br />
RtlImageNtHeader can be called by other windows dll internally  ,so to  get  the correct call  just check if it is  called<br />
from  main executable (ImageBase  to ImageBase+SizeofImage) by checking return address.<br />
<br />
ZeroAccess Unpacker Download Link<br />
<br />
<a href="https://www.dropbox.com/s/iq5eh95fwsks5sy/ZeroAcsessUnpacker.rar" target="_blank">https://www.dropbox.com/s/iq5eh95fws...ssUnpacker.rar</a><br />
<br />
Components<br />
1)Inject.exe =&gt;Start executable in suspended mode and Inject dll(using CreateRemoteThread),after sleeping for 400ms resume<br />
main thread<br />
2)ZeroAcccess_Unpack.dll=&gt; dll that install hooks  and dump unpacked file<br />
<br />
Note :This did not  include any check if sample is ZeroAccess,if you provide  non ZeroAccess sample it will produce<br />
unexpected results<br />
<br />
Usage :<br />
inject.exe sample.exe</blockquote>

]]></content:encoded>
			<dc:creator>41.w4r10r</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=1096</guid>
		</item>
	</channel>
</rss>
