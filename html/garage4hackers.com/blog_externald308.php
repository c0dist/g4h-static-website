<?xml version="1.0" encoding="ISO-8859-1"?>

<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:content="http://purl.org/rss/1.0/modules/content/">
	<channel>
		<title>Garage4hackers Forum - Blogs - sebas_phoenix</title>
		<link>http://garage4hackers.com/blog.php?u=174</link>
		<description>Garage4Hackers(G4H) is an open security community for Information Security enthusiasts, gurus and aspirants.Members of the team dedicate time and resources towards helping other information security aspirants, sharing knowledge,spreading security awareness and promoting research.</description>
		<language>en</language>
		<lastBuildDate>Sun, 22 Mar 2020 10:26:34 GMT</lastBuildDate>
		<generator>vBulletin</generator>
		<ttl>60</ttl>
		<image>
			<url>http://garage4hackers.com/images/misc/rss.jpg</url>
			<title>Garage4hackers Forum - Blogs - sebas_phoenix</title>
			<link>http://garage4hackers.com/blog.php?u=174</link>
		</image>
		<item>
			<title>Understanding Padding Oracle Attack - Attack on Encryption in CBC mode</title>
			<link>http://garage4hackers.com/entry.php?b=503</link>
			<pubDate>Tue, 09 Oct 2012 19:27:51 GMT</pubDate>
			<description>Before we begin , a few terminologies that we should be familiar with. An Oracle is just a theoritical black box in Cryptography which responds to...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">Before we begin , a few terminologies that we should be familiar with. An Oracle is just a theoritical black box in Cryptography which responds to queries that an Adversary sends. For Example , a random Oracle would select and send a truly random value from  a uniform distribution for each query that the Adversary sends to it.  Propery implemented Crypto primitives behave like random Oracles ie even though the attacker intercepts any number of ciphertexts, he wont be able to derive any information whatsoever about the plain text.  CBC (Cipher Block Chaining) is a mode that is secure against a adversary that can launch a chosen plaintext attack. CPA(Chosen Plaintext Attack) is where you can query the oracle with plaintexts(two at a time) of your choice and the Oracle will return the ciphertexts of either one and still the attacker wont be able to predict as to which plaintext the ciphertext belongs to. <br />
<br />
Take a look at the following image(thanks to Wikipedia):<br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=528&amp;d=1349861361" border="0" alt="Name:  Cbc_encryption.jpg
Views: 1477
Size:  16.8 KB"  style="float: CONFIG" /><br />
<br />
Basically what it means is that, at first a IV also called the Initialization Vector is chosen from a random distribution and xor'ed with the Plain Text and then subject to the Encryption function 'E' and the resulting CipherText is used as the IV for the next PlainText block.<br />
<br />
Writing it as equation,<br />
<br />
Co=E(k,m^IV)  where '^' refers to the xor operation. Now we can see xor a lot in cryptographic primitives, the reason for that is , when we xor a value from any distribution with another value from a uniform random distribution, then the resulting distribution is also a uniform random distribution. From above, message does not belong to a uniform distribution whereas an IV belongs a uniform distribution but the resulting &quot;m ^ IV&quot; belongs to a uniform distribution. <br />
<br />
Take a look at the following image(thanks again to Wikipedia) for the decryption:<br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=529&amp;d=1349861414" border="0" alt="Name:  Cbc_decryption.jpg
Views: 1473
Size:  15.9 KB"  style="float: CONFIG" /><br />
<br />
Writing it again as equation,<br />
<br />
As we know, Co=E(k,m^IV)<br />
Applying decryption wrt 'k' on both sides,we have<br />
<br />
D(k,Co)=m^IV<br />
<br />
xor with IV on both sides (note that &quot;A&quot; ^ &quot;A&quot; == 0), so we have<br />
<br />
m=D(k,Co) ^ IV<br />
<br />
One of the caveats to remember here is that, if we modify IV as IV' such that IV'=IV ^ G, then the resulting plaintext message 'm' also gets xor'ed by G. Keep this mind as we proceed. <br />
Now let's discuss about the padding in CBC assuming we use AES for encryption. Note that AES block size is 16 bytes. So if we have  a block that is not a multiple of block size, say &quot;abcdefghij&quot; which is of size 10 bytes, we need to pad it to 16 bytes. The padding scheme that is generally used is to pad all the remaining bytes with the number of bytes missing. so it will be &quot;abcdefhjij&quot; + 0x6 0x6 0x6 0x6 0x6 0x6 (Notice that 0x6 is different from '6' tats why i made it this way). On decryption, we will look at the last byte , in this case it is 0x6, remove 6 bytes starting from the last byte to get out original message without the pad. Naturally, if we have a block that is  a multiple of blocksize, we need to add a dummy padding block  ' 0x16' repeated 16 times. See the image below to understand the padding scheme.(thanks to GDS Blog) Notice that they are using 3-DES for the encryption so block size is 8 bytes.<br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=520&amp;d=1349806901" border="0" alt="Name:  po_fig1_sm.jpg
Views: 1564
Size:  21.5 KB"  style="float: CONFIG" /><br />
<br />
 <br />
So what is padding oracle ? <br />
The vulnerability occurs because of the types of error that previous implementations of SSL/TLS returned to the user, one is if the pad is invalid, it returned a Invalid Pad Error, if the pad is valid but the CT is not valid then it returns a Invalid Message Error. The attacker can query the pad and completely decrypt the Plain text. The following images from GDS blog  does a great job of explaining it.Thanks guys!<br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=521&amp;d=1349807276" border="0" alt="Name:  po_fig5_sm.jpg
Views: 1467
Size:  21.8 KB"  style="float: CONFIG" /><br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=522&amp;d=1349807321" border="0" alt="Name:  po_fig6_sm.jpg
Views: 1467
Size:  21.2 KB"  style="float: CONFIG" /><br />
<br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=523&amp;d=1349807333" border="0" alt="Name:  po_fig7_sm.jpg
Views: 1515
Size:  20.9 KB"  style="float: CONFIG" /><br />
<br />
What we need to do is , take the last byte of the IV, xor it with a value (G ^ 0x1),then it means that the message also will get xored by (G ^ 0x1) [remember the caveat i told you to keep in mind] , so if the PT's last byte too happens to be 'G' which can take any value from 0-255(a byte's possible values) , then we get a valid pad, since 0x1 is a valid 1-byte pad. To get the previous byte of the plaintext, we take the correct value of the last byte of the plaintext (lets call it 'P') and xor it with 0x2, and xor the last but previous byte of the IV with 'G' xor 0x2 because a valid 2-byte padding is '0x2 0x2' ie we fix the last byte and bruteforce the last but before byte till we get a valid pad. <br />
<br />
There is a programming assignment @ Coursera's crypto class which deals with Padding Oracles,<a href="http://crypto-class.appspot.com/po?er=f20bdba6ff29eed7b046d1df9fb7000058b1ffb4210a580f748b4ac714c001bd4a61044426fb515dad3f21f18aa577c0bdf302936266926ff37dbf7035d5eeb4" target="_blank">http://crypto-class.appspot.com/po?e...7dbf7035d5eeb4</a>  . Our goal is to decrypt the ciphertext, the first 16 bytes are the IV (no need to decrypt them ofcourse). Below is a program I wrote in Python (I am kinda new to python so excuse the sloppiness) that decrypts the first 16 bytes of the message, the rest you can do if you  are interested. Basically, if the pad is valid then the server responds with a 404 HTTP Error, else it responds with a 403 HTTP Error<br />
<br />
This is the following link to the code : <a href="http://pastebin.com/kcN5i4Ze" target="_blank">http://pastebin.com/kcN5i4Ze</a>   Not able to post the code here . am getting a .htaccess error for some reason! Mods can you look up the issue.<br />
<br />
[UPDATE] Fixed the attachment image! Sorry for the inconvenience<br />
<br />
Comments are Welcome.<br />
<br />
Best Regards and Peace</blockquote>

]]></content:encoded>
			<dc:creator>sebas_phoenix</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=503</guid>
		</item>
	</channel>
</rss>
