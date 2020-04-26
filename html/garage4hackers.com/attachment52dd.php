#!/usr/local/bin/python2.7

# The objective of this script is to generate an output file with all the URLs found on shared hosting ('DSQLiReverseLookUp.txt' by default)
# Shamelessly copied from http://hack-addict.blogspot.co.nz/2011/09/finding-domains-on-targeted-host.html.
# Thanks and credit to the author

import httplib, urllib, socket, sys
from xml.dom.minidom import parse, parseString

#reverseLookUp = 'DSQLiReverseLookUp.txt'

def generate_reverse_lookup(domainURL, filename, verbose):
	print "\t[*] Performing Reverse IP Lookup to collect all domains hosted on same server....."
	if domainURL[:7] == "http://": 
			domainURL = domainURL[7:]
	
#	print "\n inside generate_reverse_lookup function with args: ", domainURL
	AppId = '1734E2C92CA63FAA596335295B09CF1D0B5C6161'
	sites = [domainURL]
	ip = socket.gethostbyname(domainURL)
	offset = 50
	
	while offset < 300:
		uri = "/xml.aspx?AppId=%s&Query=ip:%s&Sources=Web&Version=2.0&Market=en-us&Adult=Moderate&Options=EnableHighlighting&Web.Count=50&Web.Offset=%s&Web.Options=DisableQueryAlterations"%(AppId, ip, offset)
		conn = httplib.HTTPConnection("api.bing.net")
		conn.request("GET", uri)
		res = conn.getresponse()
		data = res.read()
		conn.close()
		xmldoc = parseString(data)
		nameEls = xmldoc.getElementsByTagName('web:DisplayUrl')
	
		for el in nameEls:
			temp = el.childNodes[0].nodeValue
			temp = temp.split("/")[0]
		
			if temp.find('www.') == -1:
				if temp not in sites:
					sites.append(temp)
		offset += 50
	
	print "\n\t[-] Reverse IP Look Up successful" 
#	print "\n\t[-] Number of domain(s) found: %d\n" % len(sites)
	
	try:
		fd_reverseLookUp = open(filename, 'w+')
		for site in sites:
			fd_reverseLookUp.write(site + '\n')
			if verbose == 1:
				print "\t\t", site
		
		print "\n\t[-] Number of domain(s) found: %d\n" % len(sites)
		fd_reverseLookUp.close()
	except IOError:
		print "\n\t[!] Error - could not open|write %s file", filename
		sys.exit(1)
		