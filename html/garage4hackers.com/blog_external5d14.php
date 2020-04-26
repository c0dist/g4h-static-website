<?xml version="1.0" encoding="ISO-8859-1"?>

<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:content="http://purl.org/rss/1.0/modules/content/">
	<channel>
		<title>Garage4hackers Forum - Blogs - c0d3inj3cT</title>
		<link>http://garage4hackers.com/blog.php?u=311</link>
		<description>Garage4Hackers(G4H) is an open security community for Information Security enthusiasts, gurus and aspirants.Members of the team dedicate time and resources towards helping other information security aspirants, sharing knowledge,spreading security awareness and promoting research.</description>
		<language>en</language>
		<lastBuildDate>Sun, 22 Mar 2020 10:45:01 GMT</lastBuildDate>
		<generator>vBulletin</generator>
		<ttl>60</ttl>
		<image>
			<url>http://garage4hackers.com/images/misc/rss.jpg</url>
			<title>Garage4hackers Forum - Blogs - c0d3inj3cT</title>
			<link>http://garage4hackers.com/blog.php?u=311</link>
		</image>
		<item>
			<title>Breaking The Crypt - Advanced Hash Cracking</title>
			<link>http://garage4hackers.com/entry.php?b=285</link>
			<pubDate>Mon, 09 Jan 2012 14:38:32 GMT</pubDate>
			<description>*Advanced Hash Cracking Techniques* 
 
This is a series of articles where I will cover the following topics: 
 
 
* GPU based Cracking using Open CL...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore"><b>Advanced Hash Cracking Techniques</b><br />
<br />
This is a series of articles where I will cover the following topics:<br />
<br />
<ul><li style="">GPU based Cracking using Open CL hashcat.</li><li style="">Amazon EC2 Cloud Computing for Cracking Hashes.</li><li style="">Pushing the envelope with JTR</li></ul><br />
<br />
The intended readers for this article are users who are familiar and well versed with the process of hash cracking using tools like JTR/Hashcat/Passwords Pro.<br />
<br />
This article is not going to cover the basics of hash cracking and how you go about it.<br />
<br />
Please note that most of the passwords I use as an example in this article are modified versions of the word, defcon. However, this concept can be extended to just about any dictionary word since I have covered most of the mangling rules.<br />
<br />
Hash cracking tools like JTR have existed since a long time. As the hardware speeds have scaled up over the years, so have the hash cracking speeds. It provides us better opportunities to crack more hashes than we could have on the old Pentium Processors.<br />
<br />
<b>Cracking Hashes on GPU:</b> <font color="#008000">Nvidia's CUDA</font> and <font color="#FF0000">ATI's OpenCL</font> gave developers a chance to port the hash cracking algorithms to GPUs. GPU's have a high parallel processing power and this is a big advantage over CPU's which do serial processing instead.<br />
<br />
CPU's are good at performing complex instructions quickly and GPU on the other hand can perform many easy instructions quickly.<br />
<br />
To discuss more in depth, I'll start with using oclhashcat as an example. Oclhashcat is developed by atom (hashcat team) and it's compatible with both Nvidia's CUDA based GPU's and ATI's Open CL GPUs.<br />
<br />
You can get more details here:<br />
<br />
<a href="http://hashcat.net/oclhashcat-plus/" target="_blank">oclHashcat-plus - advanced password recovery</a><br />
<br />
Here, I present a few ways in which we can use this tool more effectively to get better success rates at cracking hashes.<br />
<br />
Starting with the basic forms of attack:<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">./oclhashcat64.exe -m 0 -n 160 --remove -o foundMD5.txt md5.txt dict1.txt dict2.txt</pre>
</div>m - specifies the type of hash we are attacking. Just type in, oclhashcat --help and scroll down to see all the hash types.<br />
<br />
<b>-m 0</b> is for Raw MD5 hashes.<br />
<br />
<b>-n 160 -</b> This is for workload tuning of GPU and you might have to tweak it depending on your GPU. The higher the load on your GPU, the higher will be the operating temperature as well, something that you will have to keep in mind.<br />
<br />
<b>--remove -</b> This option is quite useful. Oclhashcat will remove the hashes it has cracked from the hashlist so that it doesn't attempt to crack them again during another session.<br />
<br />
<b>-o</b> by default, oclhashcat will display the cracked hashes on the console. But, since we want to save our results, it's a good idea to use this option and redirect the output to a text file. In this case, foundMD5.txt<br />
<br />
<b>md5.txt -</b> the hash file. At present, oclhashcat expects the hash list to have only hashes in it and no usernames. Unlike the format which JTR accepts, here we need filter out any usernames from the list.<br />
<br />
<b>dict1.txt and dict2.txt -</b> oclhashcat works on the concept of the left mask and right mask. It breaks every word into a left and right part and allows us to define how these parts are controlled.<br />
<br />
This option is really useful, as we will see further in this article, how efficiently we can use this option.<br />
<br />
It's compulsory to provide both a left mask and a right mask. You cannot give one and omit the other. In this case, dict1.txt is the left mask and dict2.txt is the right mask.<br />
<br />
Ok, so that was just the basic. Let's get to more effective methods.<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">oclhashcat -m 0 -n 160 --remove -o foundMD5.txt md5.txt dict1.txt ?d?d?d?d</pre>
</div>here the left mask is a dictionary however the right mask is a predefined charset.<br />
<br />
These charsets are predefined by oclhashcat for digits, lowercase, uppercase and special chars.<br />
<br />
Later we will see there are many more charsets defined as well for the more obscure passwords using characters from Unicode Charset.<br />
<br />
This form of attack works good against passwords where a user has padded a sequence of chars at the end.<br />
<br />
The above command will try all 4 digits padded to the password. But to have a higher success rate and to save our time, we have the option --increment<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">oclhashcat -m 0 -n 160 --remove -o foundMD5.txt md5.txt dict1.txt ?d?d?d?d --increment</pre>
</div>This is a time saving option. It tries the following 4 right masks.<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:72px;">?d
?d?d
?d?d?d
?d?d?d?d</pre>
</div>Makes life much easier.<br />
<br />
We have been padding only digits at the end of our passwords. How do we attack patterns like, defcon@123. The good thing about masks is they give you complete control over every character position.<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">oclhashcat -m 0 -n 160 --remove -o foundMD5.txt md5.txt dict1.txt ?s?d?d?d</pre>
</div>The above command will pad patterns like: @123, #276, $125 to the end of every word in the dictionary, dict1.txt.<br />
<br />
But, there could be many more combinations of special chars and digits as well. For instance, defcon@1!2#<br />
<br />
We can make our attacks more dynamic by binding the predefined charsets to masks.<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">oclhashcat -m 0 -n 160 --remove -o foundMD5.txt -1 ?d?s md5.txt dict1.txt ?1?1?1?1</pre>
</div>The above command will bind the two predefined charsets, ?d and ?s to mask custom charset, ?1.<br />
<br />
So, our right mask now becomes, ?1?1?1?1 providing us a better flexibility.<br />
<br />
But what about the following patterns?<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:72px;">defcon@34
defcon#$!
defcon()
return();</pre>
</div>We can use the --increment option combining it with the custom charset mask<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">oclhashcat -m 0 -n 160 --remove -o foundMD5.txt -1 ?d?s md5.txt dict1.txt ?1?1?1?1 --increment</pre>
</div>So, far I have covered only passwords which have padded a sequence of characters to them. But, we have not touched our left mask, which is the dictionary at all.<br />
<br />
Time to apply some modification rules to it as well.<br />
<br />
in oclhashcat, the left mask and right mask can be controlled using -j and -k options.<br />
<br />
-j allows the control over left mask and -k over right mask.<br />
<br />
The correspondence between -j and -k to left and right mask respectively can be remembered easily by looking at the position of characters j and k on the keyboard. The left one corresponds to left mask and right one to right mask. It's not a big deal to remember, but just in case, it might help someone.<br />
<br />
This time, we will attack following pattern:<br />
<br />
Defcon@$a5<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">oclhashcat -m 0 -n 160 --remove -o foundMD5.txt -1 ?l?d?s -j U md5.txt dict1.txt ?1?1?1?1 --increment</pre>
</div>The new option here is, -j U<br />
<br />
U will convert the first char of left mask to uppercase for every word in the dictionary. And since in the padding we have, @$a5, I have binded the charsets, ?l?d?s to -1<br />
<br />
More complex password patterns could remove a few chars from the dictionary and do padding instead.<br />
<br />
For instance, defc@3$d<br />
<br />
Here the letters, o and n are stripped off from the end of &quot;defcon&quot; and padded with @3$d instead. To attack such a pattern, we will do the same with our dictionary. This time, we will strip off the last 2 chars from every word of dictionary in the left mask and upper case the first one followed by the password padding.<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">oclhashcat -m 0 -n 160 --remove -o foundMD5.txt -1 ?l?d?s -j ]] dict1.txt ?1?1?1?1 --increment</pre>
</div>-j ]] is the new option. The left square bracket, ']', will strip off one char from the end of the left mask and then apply the other masks as mentioned above.<br />
<br />
So, far we have been using dictionary as one of our masks. If we are targeting a fast hashing algorithm like, raw md5 or raw sha1, we can try a pure bruteforce attack as well.<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">oclhashcat -m 0 -n 160 --remove -o foundMD5.txt -1 ?l?d?s ?1?1?1?1 ?1?1?1?1 --increment</pre>
</div>In this case, the left mask remains constant at ?1?1?1?1 and right mask is incremented from ?1 to ?1?1?1?1.<br />
<br />
It's important to understand that, the load on GPU depends on the amount of different combinations in the mask.<br />
<br />
for instance, if you are running an attack with the right mask set to ?1?1 and getting a lower hashing speed. That doesn't mean the performance of your hardware is down.<br />
<br />
It just means, you are not utilizing the full power of your GPU. The essence of this is, you need to keep the GPU busy with as many combinations as possible to get the best out of it.<br />
<br />
I have covered different ways of using the left mask and right mask. Most of the techniques apply the same to both left and right mask with a few exceptions as listed below:<br />
<br />
-k instead of -j. As mentioned above, to control the words in the right mask, we need to use -k instead of -j.<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">oclhashcat -m 0 -n 160 --remove -o foundMD5.txt md5.txt -1 ?l?d?s -k ]]]] ?1?1?1?1 dict1.txt</pre>
</div>This will strip the last 4 characters from the second dictionary and use pad them to the left mask.<br />
<br />
<b>--increment option -</b> While we can use the --increment option with the right mask to save time. The same option cannot be used with the left mask.<br />
<br />
so, the following command won't work.<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">oclhashcat -m 0 -n 160 --remove -o foundMD5.txt md5.txt -1 ?d?u?l?s ?1?1?1?1 --increment dict1.txt</pre>
</div><b>Date Pattern:</b><br />
<br />
An interesting example. Some people use their passwords in the form of dates and believe me, these are hard to bruteforce. Since, they have special characters in between digits and it's not possible to find a word like this in dictionary.<br />
<br />
Patterns such as:<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:60px;">08/10/83
10-04-12
03.07.09</pre>
</div>Masks to the rescue!<br />
<br />
Once again, masks can make this task really easy.<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">oclhashcat -m 0 -n 160 --remove -o foundMD5.txt md5.txt ?d?d?s?d ?d?s?d?d</pre>
</div>This covers a few advanced techniques of using oclhashcat. Please note that this list is not exhaustive and you are not limited to only the above combinations.<br />
<br />
From an advanced decrypting standpoint, we have only scratched the surface. There's a lot more to it.<br />
<br />
c0d3inj3cT</blockquote>

]]></content:encoded>
			<dc:creator>c0d3inj3cT</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=285</guid>
		</item>
		<item>
			<title>John The Ripper (JTR) - Tweak That Attack!</title>
			<link>http://garage4hackers.com/entry.php?b=284</link>
			<pubDate>Sun, 08 Jan 2012 15:32:32 GMT</pubDate>
			<description>I decided to blog about an overview of few methods and concepts I used for cracking hashes during DEFCON 2011, Crack Me If You Can. It felt good to...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">I decided to blog about an overview of few methods and concepts I used for cracking hashes during DEFCON 2011, Crack Me If You Can. It felt good to win the contest and as a takeaway, there is a need to push the envelope of cracking hashes.<br />
<br />
In this post, I will talk about JTR.<br />
<br />
You are all familiar with JTR if you've been cracking hashes for quite sometime. I wanted to draw attention to certain features of JTR which will help you gain a better grasp at how it works and how it can be used more efficiently.<br />
<br />
<b>Important Files:</b><br />
<br />
There are several important files which must be kept secure:<br />
<br />
<b>john.pot -&gt;</b> The well known pot file of jtr. Every time, jtr cracks a hash, it records the result in hash:pass format in a file called john.pot. It helps JTR to skip these hashes in future cracking processes should they reappear in the hash list.<br />
<br />
We all know this much about john.pot. There are ways in which john.pot can be used to customize our cracking process. It can be parsed to do character frequency analysis of already cracked hashes and prepare custom charsets. More on that later.<br />
<br />
<b>john.rec -&gt;</b> This is the default session file of jtr. When you run jtr without explicitly specifying a session name, it creates a file called john.rec for the current session. This file has the extension &quot;.rec&quot;. So, any file in your $john/run directory with extension &quot;.rec&quot; is the session file. They hold the command line parameters which we passed to JTR in that session. It helps JTR in resuming the cracking process the next time.<br />
<br />
The name of this file is the same as the name given to the session at command line.<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">./john -w:wordlist.txt --format=raw-MD5 --session=cracking1 hashes.txt</pre>
</div>Once we run this command, 2 new files called cracking1.rec and cracking1.log are created in JTR's home directory.<br />
<br />
It's also a good reference for us. For instance, if we have 10 different sessions created called &quot;cracking1&quot; to &quot;cracking10&quot;. Now if after 3 days, you resume any of these cracking sessions, you'll most likely not remember what these sessions do. So, quickly open the .rec file corresponding to your cracking session and read the CLI parameters.<br />
<br />
<b>john.log</b> -&gt; This file holds the cracking process details, the sequence of chars JTR has already tried, are stored in this file. It's size depends on the duration for which the cracking process was run. Again, this is another file which needs to be kept secure.<br />
<br />
You can have multiple .rec and .log files, since they are specific to the session. Their names are used by JTR to correlate them.<br />
<br />
<b>charset files</b> -&gt; What makes JTR so efficient is it's ability to perform character frequency analysis on a list of words based on the frequency of occurrence of characters in a specific position. Based on this, JTR can generate words and increase the probability of cracking hashes. The list of words used by JTR to perform character frequency analysis has to be provided by us and is usually the hashes cracked so far during a session.<br />
<br />
Charset files have &quot;.chr&quot; extension. By default, JTR provides us several charset files like all.chr, digits.chr, alnum.chr, lanman.chr. You cannot read the contents of these files by opening them with a text editor. They are used by JTR. However, we are given the option to create our own custom charset files.<br />
<br />
How does it create this custom charset file?<br />
<br />
By default, JTR parses the john.pot file and looks up all the passwords. It then performs character frequency calculation on these passwords and generates the custom charset file.<br />
<br />
However, we would like to use our own file of cracked hashes. Here's a quick way of doing this.<br />
<br />
Let's say we are cracking the hashfile, hashes.txt which contains a list of MD5 hashes. After cracking around 100 hashes, I decide to speed up the cracking process by fingerprinting the passwords already cracked so far.<br />
<br />
So, I list down the cracked hashes in the console.<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">./john -show --format=raw-MD5 hashes.txt</pre>
</div>It gives a list of all the cracked hashes in user:pass format.<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">./john -show --format=raw-MD5 hashes.txt &gt; parseMe.txt</pre>
</div>This will redirect the above output to parseMe.txt<br />
<br />
Now, we need to filter out all the usernames and keep only the passwords in the format, :pass as opposed to user:pass.<br />
<br />
It can be done quickly using Perl,<br />
<br />
A sample script:<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:312px;">#!/usr/bin/perl

use strict;
use warnings;

$input=$ARGV[0];
$output=$ARGV[1];

chomp $output;

my ($user,$pass);

open(INPUT,\&quot;&lt;$input\&quot;) or die (\&quot;Couldn't open the file with error $!\n\&quot;);
open(OUTPUT,\&quot;&gt;$output\&quot;);

while(&lt;INPUT&gt;)
{
   chomp $_;
   ($user,$pass)=split /:/,$_;
   print OUTPUT \&quot;:\&quot;.$pass.\&quot;\n\&quot;;
}

close(INPUT):
close(OUTPUT);</pre>
</div>It will read each entry from the passfile in user:pass format and convert it to :pass format storing the result in an output file.<br />
<br />
First thing, take a backup of the john.pot file somewhere outside the JTR's directory and delete it from inside run folder. Reason being, we are going to have a new john.pot file after this perl script is run and this will be used to prepare our custom charset.<br />
<br />
Let's say, this script is called, Charset.pl. You need to call this script now as:<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">perl charset.pl parseMe.txt john.pot</pre>
</div>Now, we have our specific patterns in john.pot file.<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">./john --make-charset=specific.chr</pre>
</div>JTR will quickly parse the john.pot file to prepare our specific.chr file. We need to add an entry for this custom charset file inside john.conf which will enable JTR to use it.<br />
<br />
Create a new section in JTR's john.conf as follows:<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:84px;">[Incremental:Specific]
FILE=$JOHN/specific.chr
MinLen= 1
MaxLen= 8
CharCount=</pre>
</div>Min and Max lengths are of course going to depend on your requirements.<br />
<br />
Now, to use our custom charset file, specific.chr in our next cracking session:<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">./john -i:Specific --format=raw-MD5 --session=cracking2 hashes.txt</pre>
</div>Notice, the name &quot;Specific&quot; which I passed on the command line. This needs to be the same as what was defined in the john.conf file's incremental section.<br />
<br />
<b>john.conf</b> -&gt; Among all the files, this will be the most often visited file during the cracking process. All the tweaks need to be made in this file to increase the efficiency of our cracking process. A good understanding of the john.conf file helps in having a better command on JTR.<br />
<br />
<b>Sections</b><br />
<br />
The JTR configuration file organizes information into separate sections. Each section has a unique function. Section Names are enclosed within Square Brackets.<br />
<br />
There are different types of sections.<br />
<br />
<b>Rules sections:</b> Any rule section name must have &quot;List.Rules:&quot; prefixed to it. The default rules section available in JTR are:<br />
<br />
<b>[List.Rules:Single]</b> - This consists of all the rules which are applied to words during a single mode crack.<br />
<br />
<b>[List.Rules:Wordlist]</b> - This consists of all the rules applied to a wordlist or dictionary when we pass the --rules parameter on command line.<br />
<br />
<b>[Incremental:Attack_Name]</b> - Incremental sections are specific to the Incremental or Blind Bruteforce attacks performed in JTR. These are usually the last resort to hit those hard-to-find combinations of characters. Once we have exhausted other forms of attack, we go for this one. They run, until JTR has cracked all the hashes in the list or has finished trying all combinations generated from the charset files.<br />
<br />
Here Attack_Name represents the name of the type of Incremental attack we are performing. It could be anything we want. What is important is the values under each Incremental Section. By default, JTR comes with 4 different sections of Incremental attack, All, Digits, Alpha, LanMan.<br />
<br />
Each section requires following parameters:<br />
<br />
FILE= Path to the charset file used by JTR to generate the words. This path is relative to JTR's home directory, $JOHN.<br />
MinLen = Min length of the word generated by JTR using the charset<br />
MaxLen = Maximum Length of the words generated by JTR with above charset<br />
Charcount = The length of keyspace JTR uses to generate the characters. If we are targetting all the digits, lowercase and upper case characters of ASCII then, it will be 9+26+26 = 61.<br />
<br />
There are other interesting sections as well like for external mode which we will cover in other series.<br />
<br />
What combinations is JTR generating?<br />
<br />
Once you have tweaked your cracking session by creating custom charset files, or by creating new rules inside john.conf file, it would be a good if could check what words JTR is generating using them. This will help us in confirming whether we got the desired results from our tweaking or not.<br />
<br />
Let's say, I create a new rule in john.conf which will append 3 digits to the end of every word. Now, I want to run JTR such that it generates all these words by applying my custom rules and display them on the console.<br />
<br />
This can be done easily using the --stdout option.<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">./john -w:wordlist.txt --rules=Add3Num --stdout</pre>
</div>JTR will quickly populate the console with the list of generated word combinations.<br />
<br />
Another nice way to use --stdout option is to pipe the output of JTR into another hash cracking application like oclhashcat-plus. This can be really useful as we are combining the processing power of both CPU and GPU.<br />
<br />
CPU will generate the word combinations by applying word mangling rules and pass them to oclhashcat which will use the parallel processing power of GPU to crack the hashes.<br />
<br />
<b>Keyspace:</b> Ever tried to crack those passwords with non ASCII Characters? If a password has characters that do not belong to the ASCII Charset, JTR will not be able to crack them. Reason being, JTR understands and generates characters which only belong to the ASCII Charset.<br />
<br />
Each character can be represented as 8 bits or 1 byte. JTR uses only 7 bits for each character while generating words during a hash cracking process. Maximum combinations possible are: 2**7 = 128. You can use asciitable.com as a reference to verify that any ASCII Character will have a value between 0 and 127.<br />
<br />
Some characters like accents, umlauts and Cyrillic characters which belong to languages such as Spanish, French, Russian, German are left out since they belong to the Unicode Charset. To enable recognition of these chars in JTR, you need to edit the configuration files of JTR and recompile it.<br />
<br />
If you are on Windows, you usually run the executable the way it was provided. However, for our changes to be reflected, JTR needs to be recompiled.<br />
<br />
In future series, I will cover:<br />
<br />
How to crack passwords with Unicode Charset characters in them.<br />
How to crack passwords of length greater than 8 using JTR.<br />
<br />
There's a lot more to how we can tweak JTR and have more focused attacks which will be discussed in other series.</blockquote>

]]></content:encoded>
			<dc:creator>c0d3inj3cT</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=284</guid>
		</item>
	</channel>
</rss>
