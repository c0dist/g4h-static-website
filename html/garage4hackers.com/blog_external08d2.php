<?xml version="1.0" encoding="ISO-8859-1"?>

<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:content="http://purl.org/rss/1.0/modules/content/">
	<channel>
		<title>Garage4hackers Forum - Blogs - 7h3rAm</title>
		<link>http://garage4hackers.com/blog.php?u=425</link>
		<description>Garage4Hackers(G4H) is an open security community for Information Security enthusiasts, gurus and aspirants.Members of the team dedicate time and resources towards helping other information security aspirants, sharing knowledge,spreading security awareness and promoting research.</description>
		<language>en</language>
		<lastBuildDate>Sun, 22 Mar 2020 10:46:28 GMT</lastBuildDate>
		<generator>vBulletin</generator>
		<ttl>60</ttl>
		<image>
			<url>http://garage4hackers.com/images/misc/rss.jpg</url>
			<title>Garage4hackers Forum - Blogs - 7h3rAm</title>
			<link>http://garage4hackers.com/blog.php?u=425</link>
		</image>
		<item>
			<title>An ARP Cache Poisoning prevention PoC tool</title>
			<link>http://garage4hackers.com/entry.php?b=104</link>
			<pubDate>Tue, 01 Mar 2011 15:59:03 GMT</pubDate>
			<description>I have been working on this application for some time now.  The idea is very much similar to what Vivek Ramachandran and Sukumar Nandi mentioned in...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore"><span style="font-family: Courier New">I have been working on this application for some time now.  The idea is very much similar to what Vivek Ramachandran and Sukumar Nandi mentioned in their patent-pending <a href="http://www.vivekramachandran.com/docs/arp-spoofing.pdf" target="_blank">Detecting ARP Spoofing: An Active Technique</a> paper.<br />
<br />
The application, &quot;arp-secur&quot;, uses some basic scanning techniques to conclude the authenticity of a MAC-IP pair.  It has been developed on an IA64 based Fedora 14 installation. It requires root privileges so as to be able to sniff and inject datalink frames.  Current solution uses a standalone architecture where you need to initiate the application manually (or via initrc scripts) at system boot.  However, it can also be implemented as a kernel module to automate this step.<br />
<br />
Linux kernel has a built-in mechanism to verify the authenticity of IP-MAC pairs it adds in the ARP cache.  But the technique used is not foolproof.  Below, I have described the reason why the technique is not foolproof and I also provide a short description about how the arp-secur application provides a viable solution:<br />
<br />
SCENARIO:<br />
Victim host: V, IP: 3.3 and MAC: 33:33<br />
Attacker's host: A, IP: 6.6 and MAC: 66:66<br />
Network gateway: G, IP: 1.1 and MAC: 11:11<br />
<br />
1.  The attacker injects some malicious unicast ARP requests impersonating as network gateway, to the victim.  These request frames will have following field values:<br />
<br />
SMAC: 66:66 and DMAC: 33:33 (Ethernet header)<br />
SHA: 66:66, SPA: 1.1, THA: 00:00 and TPA: 3.3 (ARP header)<br />
<br />
This request already has a MAC address resolved (3.3 - 33:33).  That is intentional because the attacker already knows the IP and MAC.  He is not interested in resolving them but in poisoning the destination ARP cache.<br />
<br />
2.  On receiving this request, the victim host will be blindly updating its ARP cache to add the following entry:<br />
<br />
    IP  - MAC   - TYPE<br />
    1.1 - 66:66 - DYNAMIC<br />
<br />
Entries in ARP cache are sorted on the IP addresses.  If an entry for 1.1 is already available, it will be overwritten with the new MAC address or else a new entry will be created for the IP 1.1.  This is an expected behavior as per <a href="http://tools.ietf.org/html/rfc826" target="_blank">RFC 826</a>.<br />
<br />
3.  The attacker has now successfully mapped his MAC address for the network gateway's IP address on the vulnerable system with just one poisonous ARP request.  (Although it's a dynamic entry which will be removed after some time - usually 30 seconds - tested on Linux kernel v2.6.37.  Hence the attacker needs to update the cache with poisonous replies before the entry times out)<br />
<br />
4.  Linux kernel will forward an ARP request for this IP-MAC pair after about 5 seconds of receiving the request.  The attacker just needs to listen for an incoming request for each of the poisoned request he injected.  He needs to send a crafted reply back to make the kernel believe that the IP-MAC pair is indeed valid.<br />
<br />
5.  arp-secur provides defense against such malicious cache modifications.  It should be running on network devices as a daemon with root privileges.<br />
<br />
6.  arp-secur listens on a local ethernet interface for incoming ARP packets.  As soon as one is sniffed, it extracts the interesting fields out of it and performs some static analysis on them.  This phase is very important and it helps to identify obvious packet crafting attempts.<br />
    Eg: An ARP packet with different SMAC and SHA values.<br />
<br />
7.  If the static tests are applied to example ARP packet we discussed about earlier (SMAC: 66:66 ...), it will easily pass all of them and will be considered safe.  However, that is not the case.  We know that the fields are spoofed here.  Nevertheless, the above tests help to reduce some load on the application, but as described above, its static analysis and hence not foolproof.<br />
<br />
8.  arp-secur now proceeds to the dynamic analysis phase.  Here it creates a &quot;probe packet&quot; for the suspicious IP-MAC address pair and injects it.  Replies will only be received if the IP and MAC are both valid and they belong to the same system.<br />
<br />
9.  Probe packets can be one of the following types: TCP / UDP / ICMP (ECHO and TIMESTAMP).  These probe packets will be discarded at the Network layer if the IP address of the system is different than the one in our suspicious IP-MAC pair.<br />
    Eg: A probe packet for suspicious IP-MAC pair 1.1-66:66 will be discarded at host 66:66's network layer because the system has a different IP (6.6 in our example)<br />
<br />
10.  TCP / UDP probes will generate a reply only if the IP-MAC addresses are valid irrespective of the state of the port to which it was sent.  For ICMP probes, it again should iniate a reply if the addresses are valid.<br />
    Eg: Probes sent to valid IP-MAC pairs like 4.4-44:44 will not be discarded because the IP and MAC addresses belong to the same system.<br />
<br />
11.  However, just to be on a safer side, we can group multiple probes types while scanning.  This is useful in situations where there are some filtering mechanisms which discard our probes to reach the appropriate network proces.   we may have a host-based firewall which unfortunately filters some of our probes.  Since we are inside a network, chances of encountering such uber-restrictive firewalls is minimum because of the trust people have on internal network devices.<br />
<br />
12.  Once arp-secur detects an invalid IP-MAC pair, it can automatically delete the poisonous entry from system cache if permitted to do so (cmdline switch) or else it will just make a syslog entry and continue sniffing for incoming ARP traffic.<br />
<br />
The application is still very much alpha and I am trying to play around with it.  Would appreciate if anyone has to make any comments about the application.</span></blockquote>

]]></content:encoded>
			<dc:creator>7h3rAm</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=104</guid>
		</item>
	</channel>
</rss>
