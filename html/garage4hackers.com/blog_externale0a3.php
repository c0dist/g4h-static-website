<?xml version="1.0" encoding="ISO-8859-1"?>

<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:content="http://purl.org/rss/1.0/modules/content/">
	<channel>
		<title>Garage4hackers Forum - Blogs - spidey</title>
		<link>http://garage4hackers.com/blog.php?u=8180</link>
		<description>Garage4Hackers(G4H) is an open security community for Information Security enthusiasts, gurus and aspirants.Members of the team dedicate time and resources towards helping other information security aspirants, sharing knowledge,spreading security awareness and promoting research.</description>
		<language>en</language>
		<lastBuildDate>Sun, 22 Mar 2020 12:06:01 GMT</lastBuildDate>
		<generator>vBulletin</generator>
		<ttl>60</ttl>
		<image>
			<url>http://garage4hackers.com/images/misc/rss.jpg</url>
			<title>Garage4hackers Forum - Blogs - spidey</title>
			<link>http://garage4hackers.com/blog.php?u=8180</link>
		</image>
		<item>
			<title>Analysis of a Android RAT</title>
			<link>http://garage4hackers.com/entry.php?b=3072</link>
			<pubDate>Wed, 23 Jul 2014 23:35:06 GMT</pubDate>
			<description>Dendroid is a Android RAT tool and has been discussed over various security portals since last few months. This RAT is capable of...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">Dendroid is a Android RAT tool and has been discussed over various security portals since last few months. This RAT is capable of proxying/intercepting SMS,  calls, stealing passwords, dumping screenshots and accessing camera and mic. <br />
<br />
<img src="http://i61.tinypic.com/2mff33a.png" border="0" alt="" /><br />
<br />
I used <a href="http://www.decompileandroid.com/" target="_blank">Android APK Decompiler</a>, an online service to decompile the APK to its sourcecode. It was really helpful. <br />
<br />
<img src="http://i61.tinypic.com/2rgmf6u.png" border="0" alt="" /><br />
<br />
Configs in AndroidManifest.xml file:<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:372px;">&lt;?xml version=&quot;1.0&quot; encoding=&quot;utf-8&quot;?&gt;
&lt;manifest android:versionCode=&quot;2&quot; =&quot;2.0&quot; package=&quot;com.adobe.flash13&quot;
  xmlns:android=&quot;http://schemas.android.com/apk/res/android&quot;&gt;
    &lt;uses-permission =&quot;android.permission.RECEIVE_BOOT_COMPLETED&quot; /&gt;
    &lt;supports-screens =&quot;true&quot; =&quot;true&quot; =&quot;true&quot; /&gt;
    &lt;application =&quot;@style/Invisible&quot; =&quot;@string/app_name&quot; =&quot;@drawable/launcher&quot;&gt;
        &lt;activity =&quot;com.connect.Dendroid&quot; =&quot;true&quot;&gt;
            &lt;intent-filter&gt;
                &lt;action android:name=&quot;android.intent.action.MAIN&quot; /&gt;
                &lt;category android:name=&quot;android.intent.category.LAUNCHER&quot; /&gt;
            &lt;/intent-filter&gt;
        &lt;/activity&gt;
        &lt;activity =&quot;o.If$&#5159;&quot; =&quot;true&quot; /&gt;
        &lt;activity =&quot;com.connect.CaptureCameraImage&quot; =&quot;true&quot; /&gt;
        &lt;activity =&quot;o.&#65381;$&#717;&quot; =&quot;true&quot; /&gt;
        &lt;activity =&quot;o.Aux&quot; =&quot;true&quot; /&gt;
        &lt;service =&quot;com.connect.MyService&quot; =&quot;true&quot; =&quot;true&quot; /&gt;
        &lt;service =&quot;o.aux$&#697;&quot; /&gt;
        &lt;receiver =&quot;com.connect.ServiceReceiver&quot; =&quot;true&quot; =&quot;true&quot;&gt;
            &lt;intent-filter =&quot;1000&quot;&gt;
                &lt;action android:name=&quot;android.intent.action.BOOT_COMPLETED&quot; /&gt;
                &lt;action android:name=&quot;android.provider.Telephony.SMS_RECEIVED&quot; /&gt;
                &lt;action android:name=&quot;android.intent.action.PHONE_STATE&quot; /&gt;
                &lt;action android:name=&quot;android.intent.action.ACTION_EXTERNAL_APPLICATIONS_AVAILABLE&quot; /&gt;
                &lt;action android:name=&quot;android.intent.action.QUICKBOOT_POWERON&quot; /&gt;
            &lt;/intent-filter&gt;
        &lt;/receiver&gt;
    &lt;/application&gt;
    &lt;uses-permission =&quot;android.permission.QUICKBOOT_POWERON&quot; =&quot;false&quot; /&gt;
    &lt;uses-permission =&quot;android.permission.INTERNET&quot; =&quot;true&quot; /&gt;
    &lt;uses-permission =&quot;android.permission.READ_SMS&quot; =&quot;true&quot; /&gt;
    &lt;uses-permission =&quot;android.permission.WRITE_SMS&quot; =&quot;true&quot; /&gt;
    &lt;uses-permission =&quot;android.permission.GET_ACCOUNTS&quot; =&quot;true&quot; /&gt;
    &lt;uses-permission =&quot;com.android.browser.permission.READ_HISTORY_BOOKMARKS&quot; /&gt;
    &lt;uses-permission =&quot;android.permission.ACCESS_NETWORK_STATE&quot; =&quot;true&quot; /&gt;
    &lt;uses-permission =&quot;android.permission.READ_CONTACTS&quot; =&quot;true&quot; /&gt;
    &lt;uses-permission =&quot;android.permission.ACCESS_FINE_LOCATION&quot; =&quot;true&quot; /&gt;
    &lt;uses-permission =&quot;android.permission.GET_TASKS&quot; =&quot;true&quot; /&gt;
    &lt;uses-permission =&quot;android.permission.WAKE_LOCK&quot; =&quot;false&quot; /&gt;
    &lt;uses-permission =&quot;android.permission.CALL_PHONE&quot; =&quot;true&quot; /&gt;
    &lt;uses-permission =&quot;android.permission.SEND_SMS&quot; =&quot;true&quot; /&gt;
    &lt;uses-permission =&quot;android.permission.WRITE_SETTINGS&quot; =&quot;false&quot; /&gt;
    &lt;uses-permission =&quot;android.permission.READ_PHONE_STATE&quot; =&quot;false&quot; /&gt;
    &lt;uses-permission =&quot;android.permission.WRITE_EXTERNAL_STORAGE&quot; =&quot;true&quot; /&gt;
    &lt;uses-permission =&quot;android.permission.CAMERA&quot; =&quot;true&quot; /&gt;
    &lt;uses-permission =&quot;android.permission.RECORD_AUDIO&quot; =&quot;false&quot; /&gt;
    &lt;uses-permission =&quot;android.permission.PROCESS_OUTGOING_CALLS&quot; =&quot;true&quot; /&gt;
    &lt;uses-permission =&quot;android.permission.RECEIVE_SMS&quot; =&quot;true&quot; /&gt;
    &lt;uses-feature =&quot;android.hardware.camera&quot; =&quot;false&quot; /&gt;
    &lt;uses-feature =&quot;android.hardware.camera.front&quot; =&quot;false&quot; /&gt;
    &lt;uses-feature =&quot;android.hardware.camera.autofocus&quot; =&quot;false&quot; /&gt;
    &lt;uses-feature =&quot;android.hardware.microphone&quot; =&quot;false&quot; /&gt;
&lt;/manifest&gt;</pre>
</div>In the above config the <i>uses-permission =&quot;android.permission.RECEIVE_BOOT_COMPLETED&quot;</i> and <i>receiver =&quot;com.connect.ServiceReceiver&quot;</i> allows the app to <a href="http://androidrocksonmobility.blogspot.in/2012/01/how-to-create-auto-start-android.html" target="_blank">start on boot</a> and intercept SMS recieved. Further, the other uses-permission tags allows the malware to get privileges for the other RAT activities.  The config <i>application =&quot;@style/Invisible&quot; =&quot;@string/app_name&quot; =&quot;@drawable/launcher&quot;</i>  makes the <a href="http://derekknox.com/daklab/2012/04/18/tutorial-how-to-create-invisible-apps-in-android/" target="_blank">malware invisible when active</a>.<br />
<br />
One of the files had the C2 configs as Base64 encoded strings. The malware uses a hard-coded key, which is sent in plain-text to authenticate itself with the server. Its not the admin's credential.<br />
<img src="http://i57.tinypic.com/2vcuwlw.jpg" border="0" alt="" /><br />
<br />
<br />
The bot owner in this case was targeting Russian users and was eavesdropping in their personal life. The motive is unknown.<br />
<br />
<font size="5"><b>Sneak Peak:<br />
</b></font><br />
<b><u>Login:</u></b><br />
<img src="http://i58.tinypic.com/20f3gh0.png" border="0" alt="" /><br />
<br />
<b><u>Settings:</u></b><br />
<img src="http://i62.tinypic.com/1z65su0.png" border="0" alt="" /><br />
<br />
<b><u>DB:</u></b><br />
<img src="http://i62.tinypic.com/34fjl3q.png" border="0" alt="" /><br />
<br />
The panel also contained various screen caps, stolen images from Camera and Gallery and intercepted text messages.<br />
<br />
The C2 panel's code is a mess and the browser gets heavy. I guess, this will kill the RAT itself. C2 seems dead as of today.<br />
<br />
Have a nice day :)<br />
-<br />
Spidey<br />
<a href="https://twitter.com/5pld3y" target="_blank">https://twitter.com/5pld3y</a></blockquote>

]]></content:encoded>
			<dc:creator>spidey</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=3072</guid>
		</item>
		<item>
			<title>ip2map - A tool to mark your IPs on a map.</title>
			<link>http://garage4hackers.com/entry.php?b=3071</link>
			<pubDate>Tue, 22 Jul 2014 18:32:02 GMT</pubDate>
			<description><![CDATA[Hi Guys, 
 
This my first blog. So, i must begin with ;)  
 
 
Code: 
--------- 
echo "H3llo H4ck3r5!" 
--------- 
Well, i had  been searching a...]]></description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">Hi Guys,<br />
<br />
This my first blog. So, i must begin with ;) <br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">echo &quot;H3llo H4ck3r5!&quot;</pre>
</div>Well, i had  been searching a tool, last year, that took IPs and plotted them on a map but, i couldn't find any opensource one. <a href="https://github.com/fw42/honeymap" target="_blank">Honeymap</a> was the best closest map that i was able to find. It takes live feeds over websocks/<a href="https://github.com/rep/hpfeeds" target="_blank">hpfeeds</a> and requires one to embed the GPS coordinates in the data  being fed.  I did a bit of JS editing in this project and it was simple to create small IP to Map tool. This worked but, i was not happy, and lost my code the next day, as my HDD crashed in a power-failure.  LOL.:D. <br />
<br />
Recently, fb1h2s pinged me to checkout if i still had that script for one of his recent <a href="http://www.garage4hackers.com/entry.php?b=3069" target="_blank">research</a>, but unfortunately the script was gone. <br />
<br />
Fortunately, my present research involved working on <a href="http://www.elasticsearch.org/" target="_blank">ElasticSearch</a> and its when i encountered <a href="http://www.elasticsearch.org/overview/kibana/" target="_blank">Kibana</a>. Well, for those who are less/not aware about ElasticSearch &amp; Kibana, ElasticSearch is a sweet indexing engine, where you can store/index JSON data of any schema and have it looked up easily and very very quicky. Its useful for making your own personal search engine ;). <br />
<br />
Kibana is a an addon tool by ElasticSearch guys, its  supercool. :cool: . It  gives you an awesome interface with plenty of plugins to customize your search interface for ElasticSearch and give stats of the indexed data as per our requirement.  <br />
<br />
One of the awesome plugin  in Kibana is &quot;<a href="http://www.elasticsearch.org/guide/en/kibana/current/_bettermap.html" target="_blank">bettermap</a>&quot; and it really goes by its name. You need to index your data with a column, that has longitude and latitude in a JSON list format string. i.e. [long, lat] e.g.  [12.3, 34.2] and configure the plugin to map the geo coordinate field.<br />
<br />
So, this gave me an idea to make a script that reads CSV files that has bulk data with one of the columns having IP address, and use Kibana and ElasticSearch to plot the IPs on a map. What best came out was that, you can search for a specific keyword and the map gets regenerated as per your search query. <br />
<br />
The script is available  for  download from my GIT repo : <a href="https://github.com/5pld3y/ip2map" target="_blank">ip2map</a>.  I have tested it on Debian &amp; Mint. If you have your repos correctly set, it will setup most of the dependencies and install this tool at <b>/opt/ip2map</b> folder.<br />
<br />
<font size="5"><b>Setup Instructions</b></font><br />
To Setup on Debian versions:<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:60px;"># wget https://raw.githubusercontent.com/5pld3y/ip2map/master/install.sh
# chmod a+x install.sh
# ./install.sh</pre>
</div>For other versions, you need to fulfill the following dependencies:<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:108px;">build-essential 
xterm 
python-setuptools 
python-dev gzip 
openjdk-7-jre 
curl 
libcurl4-openssl-dev</pre>
</div>Once setup, the tool will invoke the ElasticSearch in a Xterm, its needed to put and fetch info. When you are done with your work you can close it. Please be careful with ElasticSearch <a href="http://bouk.co/blog/elasticsearch-rce/" target="_blank">vulnerabilities</a> and make sure to patch it if you plan to keep the ElasticSearch service running. ElasticSearch is located within <b>/opt/ip2map/elasticsearch</b><br />
<br />
<br />
<font size="5"><b>Usage:</b></font><br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;"># ip2map your-data-file.csv</pre>
</div>A sample  CSV file for testing is attached for testing. <a href="http://garage4hackers.com/attachment.php?attachmentid=714"  title="Name:  
Views: 
Size:  ">Attachment 714</a><br />
<br />
The tool will ask you a set of inputs that you need to specify:<br />
1) <b>Index type name</b> : <i>This is like Database name, if you add a CSV to an old index, the data will get appended. Duplicate row is updated. The rowid is the MD5 of the row</i><br />
<br />
2) <b>Page Title</b>: <i> The HTML Page Title</i><br />
<br />
3) <b>Map Title</b>: <i> The caption for the bettermap plugin where your map is plotted</i><br />
<br />
4) <b>Tooltip column name</b>: <i> The column name from your CSV file that you want to get flashed on mouse hover over the Map markers. If you have one column i.e. IP only, Specify the values as IP </i><br />
<br />
<b><i>Few important things: </i></b><br />
<br />
<ol class="decimal"><li style="">The CSV file requires the first row as the column titles. Its case sensetive.</li><li style="">The column with IPs should be named as IP</li><li style="">The CSV file should have one column i.e. IP atleast.</li></ol><br />
<br />
<font size="5"><b>Screenshots of the tool in action below:</b></font><br />
<br />
<b><u>ElasticSearch poping up in Xterm:</u></b><br />
<img src="http://i61.tinypic.com/29fs0o1.jpg" border="0" alt="" /><br />
<br />
<b><u>ip2map terminal Usage:<br />
</u></b><img src="http://i61.tinypic.com/331dnnt.jpg" border="0" alt="" /><br />
<br />
<u><b>Basic MAP Output without search Filter:<br />
</b></u><img src="http://i60.tinypic.com/2iqy8t5.png" border="0" alt="" /><br />
<br />
<b><u>Map with filtered query looking for exploit kits -  TYPE:exploit*</u><br />
</b><img src="http://i59.tinypic.com/2agjn0p.png" border="0" alt="" /><br />
<img src="http://i62.tinypic.com/1qfonp.png" border="0" alt="" /><br />
<br />
<b><u>Map with filtered query  looking for Backdoors - TYPE:*backdoor*<br />
</u></b><img src="http://i58.tinypic.com/zxo6qx.png" border="0" alt="" /><br />
<br />
<br />
My ip2map script is just a PoC to comfort my research work. You can modify Kibana's dashboard by reading more of its Doc. If you find any bugs or fixes, please report at the project's GIT repo:<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">https://github.com/5pld3y/ip2map</pre>
</div>Well, this is my first blog so, please spare me for typos, grammar and boring paras. <br />
<br />
Have a nice day. :)<br />
<br />
<a href="https://twitter.com/5pld3y" target="_blank">https://twitter.com/5pld3y</a></blockquote>


<!-- attachments -->
	<div class="blogattachments">
		
		
		
		
			<fieldset class="blogcontent">
				<legend>Attached Files</legend>
				<ul>
					
				</ul>
			</fieldset>
		

	</div>
<!-- / attachments -->
]]></content:encoded>
			<dc:creator>spidey</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=3071</guid>
		</item>
	</channel>
</rss>
