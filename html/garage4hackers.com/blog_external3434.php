<?xml version="1.0" encoding="ISO-8859-1"?>

<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:content="http://purl.org/rss/1.0/modules/content/">
	<channel>
		<title>Garage4hackers Forum - Blogs - yinsain</title>
		<link>http://garage4hackers.com/blog.php?u=2248</link>
		<description>Garage4Hackers(G4H) is an open security community for Information Security enthusiasts, gurus and aspirants.Members of the team dedicate time and resources towards helping other information security aspirants, sharing knowledge,spreading security awareness and promoting research.</description>
		<language>en</language>
		<lastBuildDate>Sun, 22 Mar 2020 11:54:57 GMT</lastBuildDate>
		<generator>vBulletin</generator>
		<ttl>60</ttl>
		<image>
			<url>http://garage4hackers.com/images/misc/rss.jpg</url>
			<title>Garage4hackers Forum - Blogs - yinsain</title>
			<link>http://garage4hackers.com/blog.php?u=2248</link>
		</image>
		<item>
			<title>How safe is your Android device</title>
			<link>http://garage4hackers.com/entry.php?b=341</link>
			<pubDate>Thu, 14 Jun 2012 19:25:52 GMT</pubDate>
			<description>Hi guys this is yash aka yinsain again with a duly awaited post. 
 
THIS IS FOR EDUCATIONAL PURPOSES, I STAND NO INVOLVEMENT IN WHAT YOU DO WITH THE...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">Hi guys this is yash aka yinsain again with a duly awaited post.<br />
<br />
THIS IS FOR EDUCATIONAL PURPOSES, I STAND NO INVOLVEMENT IN WHAT YOU DO WITH THE INFORMATION PROVIDED.<br />
<br />
Nowdays most of the people around us are in favour of using an android device in the name of a smartphone well after all its a smart choice too.<br />
<br />
First thing that people think of while using a smart phone is staying online and updated.<br />
But how safe is it, people are scribbling down their credentials on this tiny device to stay in contact but till date nothing has changed, every app or even a system requires a lookup file to authenticate whether the true user is thr or not.<br />
<br />
passwords still are the strongest and the weakest security link in whole infosec thing.<br />
<br />
Whenever even a kid even hears about hacking first thing that comes to his/her heart is password of an email-id, well here i will show you how to get in one without using a password.<br />
<br />
So we will focus our this post on the same and then we will blend into other security aspects of what can be risky and what cant.<br />
<br />
Two possible scenarios are there<br />
--&gt; either you have a brand new phone or a phone that you use as a casual guy nothing hardcore or test-head and by mistake you install a malicious apk that roots your phone for gainig priviledges, this is how most of these things are working.<br />
the infamous GINGERBREAK exploit that created a chaos because of it being used in other malicious apk.<br />
<br />
--&gt; or you might be having a rooted phone like me, that you rooted down for your experiments,,<br />
<br />
but how aware are you, of all possible dangerous factors.<br />
<br />
So lets start with a rooted phone because in both of the cases above end point is this only.<br />
<br />
I will be using my real phone only, no emulator to show this, so in this post,<br />
my details will be visible.<br />
<br />
Lets plug this phone in debugging mode and spawn the shell.<br />
<br />
<div style="text-align: center;"><img src="http://garage4hackers.com/attachment.php?attachmentid=412&amp;d=1339701086" border="0" alt="Name:  Screenshot from 2012-06-14 23:24:01.jpg
Views: 377
Size:  19.2 KB"  style="float: CONFIG" /></div><br />
<br />
 layout is pretty standard.<br />
<br />
now lets move towards the attractive folder data and again in data inside the previous one. <br />
<div style="text-align: center;"><br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=413&amp;d=1339701133" border="0" alt="Name:  Screenshot from 2012-06-14 23:27:59.jpg
Views: 365
Size:  18.8 KB"  style="float: CONFIG" /></div><br />
now issue ls command it will show you a long list of installed apk's data folders.<br />
<br />
<div style="text-align: center;"><img src="http://garage4hackers.com/attachment.php?attachmentid=414&amp;d=1339701160" border="0" alt="Name:  Screenshot from 2012-06-14 23:29:28.jpg
Views: 770
Size:  19.3 KB"  style="float: CONFIG" /></div><br />
now we can easily navigate to our folder of our desired app.<br />
<br />
Our grapes reside inside the  com.google.android.gm folder so go into that and then into databases again issue ls command.<br />
<br />
<div style="text-align: center;"><img src="http://garage4hackers.com/attachment.php?attachmentid=416&amp;d=1339701554" border="0" alt="Name:  Screenshot from 2012-06-14 23:34:13.jpg
Views: 376
Size:  19.5 KB"  style="float: CONFIG" /></div><br />
As you can see my email id is thr in a folder name.<br />
<br />
but the useful db file is downloads.db for android 2.1 and for my specific cyanogemod7rc2 its <a href="mailto:mailstore.ydeep18@gmail.com.db">mailstore.ydeep18@gmail.com.db</a>, we will copy that out to sdcard for further inspection.<br />
<br />
cp  <a href="mailto:mailstore.ydeep18@gmail.com.db">mailstore.ydeep18@gmail.com.db</a> /sdcard<br />
<br />
<div style="text-align: center;"><img src="http://garage4hackers.com/attachment.php?attachmentid=415&amp;d=1339701219" border="0" alt="Name:  Screenshot from 2012-06-15 00:10:30.jpg
Views: 373
Size:  19.3 KB"  style="float: CONFIG" /></div><br />
as this phone is rooted so acces denied problem will be there just like it wont cause a problem for any attacker who has gained root shell on your device.<br />
<br />
<br />
now we have our db file, now how to open it, well i did this while is was in kota in a hostel so i had no pc around me for an year, so i downloaded an app on my phone only to perform this.<br />
APP :: aSQLiteManager<br />
<br />
<br />
Lets start first with the phone<br />
so open up your aSQLiteManager<br />
<br />
<div style="text-align: center;"><img src="http://garage4hackers.com/attachment.php?attachmentid=417&amp;d=1339701608" border="0" alt="Name:  screenshot-1339698390324.jpg
Views: 354
Size:  17.0 KB"  style="float: CONFIG" /><br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=418&amp;d=1339701618" border="0" alt="Name:  screenshot-1339698402804.png
Views: 359
Size:  19.3 KB"  style="float: CONFIG" /><br />
<br />
open db file, the mailstore one.<br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=419&amp;d=1339701628" border="0" alt="Name:  screenshot-1339699527311.jpg
Views: 369
Size:  16.7 KB"  style="float: CONFIG" /></div><br />
select whichever you wanna view, but i kno the juicy one is messages. so lets open that<br />
<div style="text-align: center;"><br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=420&amp;d=1339701641" border="0" alt="Name:  screenshot-1339699534807.png
Views: 363
Size:  17.8 KB"  style="float: CONFIG" /></div><br />
and with all your guts click on data to kno the truth....<br />
<br />
<div style="text-align: center;"><img src="http://garage4hackers.com/attachment.php?attachmentid=421&amp;d=1339701692" border="0" alt="Name:  screenshot-1339699547951.jpg
Views: 369
Size:  13.4 KB"  style="float: CONFIG" /></div><br />
and there it is all your synchronised email, now say who needs a password.<br />
and continously scrolling sideways<br />
<br />
<div style="text-align: center;"><img src="http://garage4hackers.com/attachment.php?attachmentid=422&amp;d=1339701800" border="0" alt="Name:  screenshot-1339699578545.jpg
Views: 350
Size:  14.5 KB"  style="float: CONFIG" /><br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=423&amp;d=1339701810" border="0" alt="Name:  screenshot-1339699586596.jpg
Views: 360
Size:  12.8 KB"  style="float: CONFIG" /><br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=424&amp;d=1339701820" border="0" alt="Name:  screenshot-1339699593698.png
Views: 357
Size:  16.8 KB"  style="float: CONFIG" /><br />
<br />
<img src="http://garage4hackers.com/attachment.php?attachmentid=425&amp;d=1339701830" border="0" alt="Name:  screenshot-1339699599504.jpg
Views: 370
Size:  11.0 KB"  style="float: CONFIG" /><br />
</div>As you can see, how lethal this can be.<br />
<br />
PREVENTIONS<br />
:: please check permissions needed by your application before installing<br />
:: never leave your unattented. This works 90% of the time.<br />
<br />
THanks for reading<br />
B-)</blockquote>

]]></content:encoded>
			<dc:creator>yinsain</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=341</guid>
		</item>
	</channel>
</rss>
