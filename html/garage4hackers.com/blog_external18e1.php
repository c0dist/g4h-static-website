<?xml version="1.0" encoding="ISO-8859-1"?>

<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:content="http://purl.org/rss/1.0/modules/content/">
	<channel>
		<title>Garage4hackers Forum - Blogs - mayurlohite</title>
		<link>http://garage4hackers.com/blog.php?u=8326</link>
		<description>Garage4Hackers(G4H) is an open security community for Information Security enthusiasts, gurus and aspirants.Members of the team dedicate time and resources towards helping other information security aspirants, sharing knowledge,spreading security awareness and promoting research.</description>
		<language>en</language>
		<lastBuildDate>Sun, 22 Mar 2020 12:37:06 GMT</lastBuildDate>
		<generator>vBulletin</generator>
		<ttl>60</ttl>
		<image>
			<url>http://garage4hackers.com/images/misc/rss.jpg</url>
			<title>Garage4hackers Forum - Blogs - mayurlohite</title>
			<link>http://garage4hackers.com/blog.php?u=8326</link>
		</image>
		<item>
			<title>Preventing SQL Injection attack ASP.NET PART I</title>
			<link>http://garage4hackers.com/entry.php?b=3084</link>
			<pubDate>Tue, 02 Sep 2014 06:48:04 GMT</pubDate>
			<description>* 
Introduction* 
 
          Security is the most important attribute for any system.  Providing secure experience is one of the key principles in...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore"><b><br />
Introduction</b><br />
<br />
          Security is the most important attribute for any system.  Providing secure experience is one of the key principles in the process  of gaining customer confidence for a system. Now days, almost all the  websites are asking to store user’s personal information in servers to  understand the customer and serve better. It’s the responsibility of an  organization to confirm that customer’s data is safe and accessed in a  secured manner.          Security in web application is always big headache to developer  but providing secure environments is one of the key principles in the  process of gaining customer confidence for a system. In this era of web  application almost all websites are dynamic i.e. database driven and  large data will accepts from user.<br />
  SQL Injection flaws are introduced when software developers create  dynamic database queries that include user supplied input. This article  explains how SQL Injection is prevented in ASP.NET.<br />
<br />
 <b>Background</b><br />
<br />
          What is Actually SQL Injection attack?<br />
        SQL Injection is a attack used to inject unintended SQL commands  (statements) in a database by accepting malicious, unsecured,  un-validated user input. Injected SQL commands can alter SQL statement  and compromise the security of a web application. If you want to know  SQL Injection attack in detail please visit following link:<br />
 <a href="https://www.owasp.org/index.php/SQL_Injection" target="_blank">https://www.owasp.org/index.php/SQL_Injection</a><br />
<br />
 <b>Methods of exploit SQL Injection</b><br />
<br />
          Methods of exploits:<br />
        1. Input boxes<br />
        2. Query Strings [GET]     <br />
<br />
 <b>How to exploit?</b><br />
<br />
          In today’s dynamic web applications world its necessary to get  user input and process it so we have to write the various types of SQL  queries to process the data according to user input. Consider the  following query.<br />
Table – user_info, Columns – userID,name,email,password.<br />
        SELECT name,email FROM user_info WHERE userID = 1<br />
        We can devide this query into 2 parts.<br />
        PART-1: Query Part – SELECT userID,email FROM user_info<br />
        PART-2: Input Part – userID=1     <br />
          A hacker usually not interested in PART-1 , he just interested ,  how he can insert malicious query in your PART-2. Let’s take an example  how SQL injection will be exploits.     <br />
<br />
 <b>Using the code</b><br />
<br />
          1. Suppose we have table user_info with some data. Following is the Script.     <br />
 <div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:216px;">CREATE TABLE [dbo].[user_info](
    [userID] [int] IDENTITY(1,1) NOT NULL,
    [name] [nvarchar](200) NULL,
    [email] [nvarchar](200) NULL,
    [password] [nvarchar](50) NULL,
 CONSTRAINT [PK_user_info] PRIMARY KEY CLUSTERED 
(
    [userID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET IDENTITY_INSERT [dbo].[user_info] ON
INSERT [dbo].[user_info] ([userID], [name], [email], [password]) VALUES (1, N'Mayur Lohite', N'mayur@mayur.com', N'123456')
INSERT [dbo].[user_info] ([userID], [name], [email], [password]) VALUES (2, N'John Doe', N'john@john.com', N'654321')
INSERT [dbo].[user_info] ([userID], [name], [email], [password]) VALUES (3, N'Hacker', N'hack@hack.com', N'789123')
SET IDENTITY_INSERT [dbo].[user_info] OFF</pre>
</div>         2. create a new empty ASP.NET website project. Add following two pages into it. I. Default.aspx II. viewuser.aspx<br />
          3. Code for Default.aspx     <br />
 <div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:372px;">&lt;%@ page language=&quot;&quot;C#&quot;&quot; autoeventwireup=&quot;&quot;true&quot;&quot; codefile=&quot;&quot;Default.aspx.cs&quot;&quot;
    inherits=&quot;&quot;_Default&quot;&quot; %&gt;

&lt;!DOCTYPE html PUBLIC &quot;-//W3C//DTD XHTML 1.0 Transitional//EN&quot; &quot;http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd &quot;&gt;
&lt;html xmlns=&quot;http://www.w3.org/1999/xhtml&quot;&gt;
&lt;head runat=&quot;server&quot;&gt;
    &lt;title&gt;SQL Injection Demo&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;form id=&quot;form1&quot; runat=&quot;server&quot;&gt;
    &lt;div style=&quot;width: 50%; margin: 0 auto; text-align: center;&quot;&gt;
        &lt;table&gt;
            &lt;tr&gt;
                &lt;td colspan=&quot;2&quot;&gt;
                    &lt;h2&gt;
                        SQL Injection Demo&lt;/h2&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;td&gt;
                    Search by userid
                    &lt;asp:textbox id=&quot;txtUserID&quot; runat=&quot;server&quot;&gt;
                    &lt;/asp:textbox&gt;
                &lt;/td&gt;
                &lt;td&gt;
                    &lt;asp:button id=&quot;btnSubmit&quot; onclick=&quot;BtnSubmit_Click&quot; runat=&quot;server&quot; text=&quot;Search&quot; /&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;asp:gridview id=&quot;gvUserInfo&quot; width=&quot;100%&quot; runat=&quot;server&quot; datakeynames=&quot;userID&quot; autogeneratecolumns=&quot;false&quot;&gt;
                    &lt;Columns&gt;
                        &lt;asp:BoundField DataField=&quot;userID&quot; HeaderText=&quot;userID&quot; /&gt;
                        &lt;asp:BoundField DataField=&quot;name&quot; HeaderText=&quot;name&quot; /&gt;
                        &lt;asp:BoundField DataField=&quot;email&quot; HeaderText=&quot;email&quot; /&gt;
                        &lt;asp:HyperLinkField DataNavigateUrlFields=&quot;userID&quot; DataNavigateUrlFormatString=&quot;viewuser.aspx?userid={0}&quot;
                            Text=&quot;View User&quot; HeaderText=&quot;action&quot; /&gt;
                    &lt;/Columns&gt;
                &lt;/asp:gridview&gt;
            &lt;/tr&gt;
        &lt;/table&gt;
    &lt;/div&gt;
    &lt;/form&gt;
&lt;/body&gt;
&lt;/html&gt;</pre>
</div>         4. Code for Default.aspx.cs<br />
 <div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:372px;">public partial class _Default : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        if (!IsPostBack)
        {
            DataSet dset = new DataSet();
            SqlConnection conn = new SqlConnection(ConfigurationManager.ConnectionStrings[&quot;MyExpConnectionString&quot;].ToString());
            using (conn)
            {
                conn.Open();
                SqlDataAdapter adapter = new SqlDataAdapter();
                SqlCommand cmd = new SqlCommand(&quot;SELECT userID, name, email FROM user_info&quot;, conn);
                cmd.CommandType = CommandType.Text;
                adapter.SelectCommand = cmd;
                adapter.Fill(dset);
                gvUserInfo.DataSource = dset;
                gvUserInfo.DataBind();

            }
               
        }
    }

    protected void BtnSubmit_Click(object sender, EventArgs e)
    {
        DataSet dset = new DataSet();
        SqlConnection conn = new SqlConnection(ConfigurationManager.ConnectionStrings[&quot;MyExpConnectionString&quot;].ToString());
        using (conn)
        {
            conn.Open();
            SqlDataAdapter adapter = new SqlDataAdapter();
            string sqlQuery = string.Format(&quot;SELECT userID, name, email FROM user_info WHERE userID={0}&quot;, txtUserID.Text);
            SqlCommand cmd = new SqlCommand(sqlQuery, conn);
            cmd.CommandType = CommandType.Text;
            adapter.SelectCommand = cmd;
            adapter.Fill(dset);
            gvUserInfo.DataSource = dset;
            gvUserInfo.DataBind();

        }
       
    }
}</pre>
</div>         Default page screen shot     <br />
     <a href="http://garage4hackers.com/attachment.php?attachmentid=783&amp;d=1409648720" id="attachment783" rel="Lightbox_3084" ><img src="http://garage4hackers.com/attachment.php?attachmentid=783&amp;d=1409639618" border="0" alt="Click image for larger version.&nbsp;

Name:	default.jpg&nbsp;
Views:	975&nbsp;
Size:	32.3 KB&nbsp;
ID:	783" class="size_large" /></a><br />
          5. Code for viewuser.aspx     <br />
 <div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:372px;">&lt;%@ Page Language=&quot;C#&quot; AutoEventWireup=&quot;true&quot; CodeFile=&quot;viewuser.aspx.cs&quot; Inherits=&quot;viewuser&quot; %&gt;

&lt;!DOCTYPE html PUBLIC &quot;-//W3C//DTD XHTML 1.0 Transitional//EN&quot; &quot;http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd&quot;&gt;
&lt;html xmlns=&quot;http://www.w3.org/1999/xhtml&quot;&gt;
&lt;head runat=&quot;server&quot;&gt;
    &lt;title&gt;SQL Injection Demo&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;form id=&quot;form1&quot; runat=&quot;server&quot;&gt;
    &lt;div style=&quot;width: 50%; margin: 0 auto; text-align: center;&quot;&gt;
        &lt;table&gt;
            &lt;tr&gt;
                &lt;td colspan=&quot;2&quot;&gt;
                    &lt;h2&gt;
                        SQL Injection Demo&lt;/h2&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;td&gt;
                    &lt;h3&gt;
                        Welcome
                        &lt;asp:Label ID=&quot;lblDetails&quot; runat=&quot;server&quot;&gt;&lt;/asp:Label&gt;
                    &lt;/h3&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
        &lt;/table&gt;
    &lt;/div&gt;
    &lt;/form&gt;
&lt;/body&gt;
&lt;/html&gt;</pre>
</div>         6. Code for viewuser.aspx.cs     <br />
 <div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:336px;">public partial class viewuser : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Request.QueryString[&quot;userid&quot;] != null)
        {
            DataSet dset = new DataSet();
            SqlConnection conn = new SqlConnection(ConfigurationManager.ConnectionStrings[&quot;MyExpConnectionString&quot;].ToString());
            using (conn)
            {
                conn.Open();
                SqlDataAdapter adapter = new SqlDataAdapter();
                string sqlQuery = string.Format(&quot;SELECT name FROM user_info WHERE userID={0}&quot;, Request.QueryString[&quot;userid&quot;]);
                SqlCommand cmd = new SqlCommand(sqlQuery, conn);
                cmd.CommandType = CommandType.Text;
                adapter.SelectCommand = cmd;
                adapter.Fill(dset);
                if (dset.Tables[0].Rows.Count &gt; 0)
                {
                    lblDetails.Text = dset.Tables[0].Rows[0][&quot;name&quot;].ToString(); ;
                }
                
            }
        }
    }
}</pre>
</div>         viewuser page screen shot     <br />
     <a href="http://garage4hackers.com/attachment.php?attachmentid=782&amp;d=1409648720" id="attachment782" rel="Lightbox_3084" ><img src="http://garage4hackers.com/attachment.php?attachmentid=782&amp;d=1409639704" border="0" alt="Click image for larger version.&nbsp;

Name:	viewuser.jpg&nbsp;
Views:	855&nbsp;
Size:	11.2 KB&nbsp;
ID:	782" class="size_large" /></a><br />
 <b>Exploitation</b><br />
<br />
          <b>Approach 1: By Input Boxes.</b><br />
<br />
          A-1. First Consider the Default Page, we have One TextBox, One  Button and One GridView. On form load all data will be displayed on grid  view. We have functionality to search user by their ID. Suppose I enter  1 to textbox and press button it will display the record associated  with userID = 1.<br />
          A-2. Now if we take look at above code in Default.aspx.cs there is button click event i.e.<br />
         <div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">protected void BtnSubmit_Click(object sender, EventArgs e)</pre>
</div>                  The query is written as a string and user input is concatenated with it.     <br />
         <div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">string sqlQuery = string.Format(&quot;SELECT userID, name, email FROM user_info WHERE userID={0}&quot;, txtUserID.Text);</pre>
</div>                  A-3.suppose , the user input is not validate properly then  hacker or attacker can concatenate any malicious query with it. In this  scenario I am concatenating another SELECT statement with help of UNION  to txtUserID.Text     <br />
          A-4. I have entered the following text on textbox (txtUserID)  without quotes “1 UNION SELECT userID,email,password FROM user_info”<br />
          A-5. Now complete query becomes:     <br />
             <div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">string sqlQuery = SELECT userID, name, email FROM user_info WHERE userID=1 UNION SELECT userID,email,password FROM user_info</pre>
</div>                  A-6. If I hit click on button the gridview display combination  of both SELECT QUERY and the user password is revealed. If the query  used with user input concatenation without any input validations then  code is always vulnerable for SQL Injection Attack.<br />
          Note: I have increased the size of textbox to understand the query better.<br />
     <a href="http://garage4hackers.com/attachment.php?attachmentid=781&amp;d=1409648720" id="attachment781" rel="Lightbox_3084" ><img src="http://garage4hackers.com/attachment.php?attachmentid=781&amp;d=1409639765" border="0" alt="Click image for larger version.&nbsp;

Name:	defaultsqli.jpg&nbsp;
Views:	1053&nbsp;
Size:	61.3 KB&nbsp;
ID:	781" class="size_large" /></a><br />
          <b>Approach 2: Query Strings [GET]</b>     <br />
<br />
          B-1. Now please go to default.aspx and click on viewuser link on  GridView. The page will redirect to viewuser.aspx with userid query  string parameter.<br />
          B-2. The page welcomes the user by their name. The name will founded by userid from query string value.<br />
          B-3. Now if we take look at above code in viewuser.aspx.cs Form_Load event      <br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">protected void Page_Load(object sender, EventArgs e)</pre>
</div>                  The query is written as a string and the query string is concatenated with it.     <br />
         <div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;">string sqlQuery = string.Format(&quot;SELECT name FROM user_info WHERE userID={0}&quot;, Request.QueryString[&quot;userid&quot;]);</pre>
</div>                  B-4. Now Suppose I append the malicious Select query to  Request.QueryString[&quot;userid&quot;] as same as the above approach the URL  becomes<br />
         <div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:36px;"><a href="http://mayurlohite.com/viewsuer.aspx?userid=1" target="_blank">http://mayurlohite.com/viewsuer.aspx?userid=1</a> UNION SELECT password FROM user_info WHERE userID = 1</pre>
</div>                   B-5. If I hit enter then the label will display the password associated with userID = 1<br />
<br />
     <a href="http://garage4hackers.com/attachment.php?attachmentid=780&amp;d=1409648691" id="attachment780" rel="Lightbox_3084" ><img src="http://garage4hackers.com/attachment.php?attachmentid=780&amp;d=1409639807" border="0" alt="Click image for larger version.&nbsp;

Name:	viewusersqli.jpg&nbsp;
Views:	873&nbsp;
Size:	25.4 KB&nbsp;
ID:	780" class="size_large" /></a><br />
 <b><br />
Why this happens?</b><br />
<br />
          In above both approaches the query is concatenated with user  input and the user input is not validating properly. So the attacker  take advantage of it and concatenate the malicious query with it and  Attacker can get the passwords , install the backdoor. Attacker can  manipulate the whole database from sysobject.     <br />
<br />
 <b>How to prevent</b><br />
<br />
          1. Validate the user input properly<br />
        2. Use parameterized SQL queries (sqlParameter) with stored procedures.     <br />
<br />
          <b>1. Validate user input:</b><br />
        If your input take only ids or integers add some validations for accept only numbers.<br />
        If inputs are complicated then use the regex patterns to identify the correct inputs.     <br />
<br />
          <b>2. Parametrized SQL query &amp; Stored Procedure:</b><br />
Parametrized queries do proper substitution of arguments prior  to running the SQL query. It completely removes the possibility of  “dirty” input changing the meaning of your query, with parametrized  queries, in addition to general injection, you get all the data types  handled, numbers (int and float), strings (with embedded quotes), dates  and times (no formatting problems or localization issues when  .ToString() is not called with the invariant culture and your client  moves to a machine with and unexpected date format).     <br />
<br />
          <b>I have rewritten the above code safe from SQL Inection. Please take a look at it.</b><br />
<br />
          1. Code for ConnectionManager.cs Class<br />
 <div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:144px;">public class ConnectionManager
{
    public static SqlConnection GetDatabaseConnection()
    {
        SqlConnection connection = new SqlConnection(Convert.ToString(ConfigurationManager.ConnectionStrings[&quot;MyExpConnectionString&quot;]));
        connection.Open();

        return connection;
    }
}</pre>
</div>2. Code for DataAccessLayer.cs Class<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:372px;"> public class DataAccessLayer
{
    public static DataSet DisplayAllUsers()
    {
        DataSet dSet = new DataSet();
        using (SqlConnection connection = ConnectionManager.GetDatabaseConnection())
        {
            try
            {
                SqlCommand command = new SqlCommand(&quot;spDisplayUserAll&quot;, connection);
                command.CommandType = CommandType.StoredProcedure;
                SqlDataAdapter adapter = new SqlDataAdapter();
                adapter.SelectCommand = command;
                adapter.Fill(dSet);
            }
            catch (Exception ex)
            {
                throw;
            }
            return dSet;
        }
    }

    public static DataSet DisplayUserByID(int userID)
    {
        DataSet dSet = new DataSet();
        using (SqlConnection connection = ConnectionManager.GetDatabaseConnection())
        {
            try
            {
                SqlCommand command = new SqlCommand(&quot;spDisplayUserByID&quot;, connection);
                command.CommandType = CommandType.StoredProcedure;
                command.Parameters.Add(&quot;@userID&quot;, SqlDbType.Int).Value = userID;
                SqlDataAdapter adapter = new SqlDataAdapter();
                adapter.SelectCommand = command;
                adapter.Fill(dSet);
            }
            catch (Exception ex)
            {
                throw;
            }
            return dSet;
        }
    }
}</pre>
</div>         3. Code for Default.aspx<br />
 <div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:372px;">&lt;%@ Page Language=&quot;C#&quot; AutoEventWireup=&quot;true&quot; CodeFile=&quot;Default.aspx.cs&quot; Inherits=&quot;_Default&quot; %&gt;

&lt;!DOCTYPE html PUBLIC &quot;-//W3C//DTD XHTML 1.0 Transitional//EN&quot; &quot;http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd&quot;&gt;
&lt;html xmlns=&quot;http://www.w3.org/1999/xhtml&quot;&gt;
&lt;head runat=&quot;server&quot;&gt;
    &lt;title&gt;SQL Injection Demo&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;form id=&quot;form1&quot; runat=&quot;server&quot;&gt;
    &lt;div style=&quot;width: 50%; margin: 0 auto; text-align: center;&quot;&gt;
        &lt;table&gt;
            &lt;tr&gt;
                &lt;td colspan=&quot;2&quot;&gt;
                    &lt;h2&gt;
                        SQL Injection Demo&lt;/h2&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;td&gt;
                    Search by userid
                    &lt;asp:TextBox ID=&quot;txtUserID&quot; runat=&quot;server&quot;&gt;
                    &lt;/asp:TextBox&gt;
                    &lt;&lt;asp:RequiredFieldValidator ID=&quot;rfvUserID&quot; ControlToValidate=&quot;txtUserID&quot; Display=&quot;Dynamic&quot;
                        runat=&quot;server&quot; ErrorMessage=&quot;Required&quot;&gt;&lt;/asp:RequiredFieldValidator&gt;
                    &lt;asp:RegularExpressionValidator ID=&quot;revUserID&quot; runat=&quot;server&quot; ErrorMessage=&quot;Numbers Only&quot;
                        ValidationExpression=&quot;[0-9]+&quot; ControlToValidate=&quot;txtUserID&quot; Display=&quot;Dynamic&quot;&gt;&lt;/asp:RegularExpressionValidator&gt;
                &lt;/td&gt;
                &lt;td&gt;
                    &lt;asp:Button ID=&quot;btnSubmit&quot; OnClick=&quot;BtnSubmit_Click&quot; runat=&quot;server&quot; Text=&quot;Search&quot; /&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;asp:GridView ID=&quot;gvUserInfo&quot; Width=&quot;100%&quot; runat=&quot;server&quot; DataKeyNames=&quot;userID&quot; AutoGenerateColumns=&quot;false&quot;&gt;
                    &lt;Columns&gt;
                        &lt;asp:BoundField DataField=&quot;userID&quot; HeaderText=&quot;userID&quot; /&gt;
                        &lt;asp:BoundField DataField=&quot;name&quot; HeaderText=&quot;name&quot; /&gt;
                        &lt;asp:BoundField DataField=&quot;email&quot; HeaderText=&quot;email&quot; /&gt;
                        &lt;asp:HyperLinkField DataNavigateUrlFields=&quot;userID&quot; DataNavigateUrlFormatString=&quot;viewuser.aspx?userid={0}&quot;
                            Text=&quot;View User&quot; HeaderText=&quot;action&quot; /&gt;
                    &lt;/Columns&gt;
                &lt;/asp:GridView&gt;
            &lt;/tr&gt;
        &lt;/table&gt;
    &lt;/div&gt;
    &lt;/form&gt;
&lt;/body&gt;
&lt;/html&gt;</pre>
</div>         4. Code for Default.aspx.cs<br />
 <div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:360px;">public partial class _Default : System.Web.UI.Page
{

    protected void Page_Load(object sender, EventArgs e)
    {
        if (!IsPostBack)
        {
            DataSet dset = DataAccessLayer.DisplayAllUsers();
            if (dset.Tables[0].Rows.Count &gt; 0)
            {
                gvUserInfo.DataSource = dset;
                gvUserInfo.DataBind();
            }
            
        }
    }

    protected void BtnSubmit_Click(object sender, EventArgs e)
    {
        int userID = Convert.ToInt32(txtUserID.Text);
        DataSet dSet = DataAccessLayer.DisplayUserByID(userID);
        if (dSet.Tables[0].Rows.Count &gt; 0)
        {
            gvUserInfo.DataSource = dSet;
            gvUserInfo.DataBind();
        }
    }
}</pre>
</div>         5. Code for viewuser.aspx<br />
 <div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:372px;">&lt;%@ Page Language=&quot;C#&quot; AutoEventWireup=&quot;true&quot; CodeFile=&quot;viewuser.aspx.cs&quot; Inherits=&quot;viewuser&quot; %&gt;

&lt;!DOCTYPE html PUBLIC &quot;-//W3C//DTD XHTML 1.0 Transitional//EN&quot; &quot;http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd&quot;&gt;
&lt;html xmlns=&quot;http://www.w3.org/1999/xhtml&quot;&gt;
&lt;head runat=&quot;server&quot;&gt;
    &lt;title&gt;SQL Injection Demo&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;form id=&quot;form1&quot; runat=&quot;server&quot;&gt;
    &lt;div style=&quot;width: 50%; margin: 0 auto; text-align: center;&quot;&gt;
        &lt;table&gt;
            &lt;tr&gt;
                &lt;td colspan=&quot;2&quot;&gt;
                    &lt;h2&gt;
                        SQL Injection Demo&lt;/h2&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;td&gt;
                    &lt;h3&gt;
                        Welcome
                        &lt;asp:Label ID=&quot;lblDetails&quot; runat=&quot;server&quot;&gt;&lt;/asp:Label&gt;
                    &lt;/h3&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
        &lt;/table&gt;
    &lt;/div&gt;
    &lt;/form&gt;
&lt;/body&gt;
&lt;/html&gt;</pre>
</div>         6. Code for viewuser.aspx.cs<br />
 <div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:204px;">public partial class viewuser : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Request.QueryString[&quot;userid&quot;] != null)
        {
            int userID = Convert.ToInt32(Request.QueryString[&quot;userID&quot;]);
            DataSet dSet = DataAccessLayer.DisplayUserByID(userID);
            if (dSet.Tables[0].Rows.Count &gt; 0)
            {
                lblDetails.Text = Convert.ToString(dSet.Tables[0].Rows[0][&quot;name&quot;]);
            }
        }
    }
}</pre>
</div>         7. Stored Procedure: spDisplayUserAll     <br />
 <div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:108px;">CREATE PROCEDURE spDisplayUserAll
AS
BEGIN
    SET NOCOUNT ON;
    SELECT userID, name, email 
    FROM user_info
END</pre>
</div>         8. Stored Procedure: spDisplayUserByID     <br />
 <div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:132px;">CREATE PROCEDURE spDisplayUserByID 
    @userID int = 0
AS
BEGIN
    SET NOCOUNT ON;
    SELECT userID, name, email 
    FROM user_info
    WHERE userID = @userID
END</pre>
</div><b>Points of Interest</b><br />
<br />
          The SQL Injection is most common security vulnerability known in  web applications. The dynamic webpages without handling validations and  improper handling of code may lead to SQLI but by knowing proper code  standred and tricks we will successfully prevent it.     <br />
<br />
<b>Article<br />
</b><a href="http://mayurlohite.com/preventing-sql-injection-attack-asp-net-part-i/" target="_blank">http://mayurlohite.com/preventing-sq...sp-net-part-i/</a><br />
<a href="http://codeproject.com/Articles/813965/Preventing-SQL-Injection-Attack-ASP-NET-Part-I" target="_blank">http://codeproject.com/Articles/8139...ASP-NET-Part-I</a><br />
<br />
<b>Download Source Code</b><br />
<br />
<ul><li style=""><a href="http://www.codeproject.com/Articles/813965/code/vulnerable_code.zip" target="_blank">Download SQLI Vulnerable code - 6.1 KB </a></li><li style=""><a href="http://www.codeproject.com/Articles/813965/code/safe_code.zip" target="_blank">Download SQLI Safe code - 8.2 KB</a></li><li style=""><a href="http://www.codeproject.com/Articles/813965/code/database_script.zip" target="_blank">Download database script - 1.8 KB</a><a href="http://www.codeproject.com/Articles/813965/code/database_script.zip" target="_blank"><br />
</a> </li></ul></blockquote>

]]></content:encoded>
			<dc:creator>mayurlohite</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=3084</guid>
		</item>
	</channel>
</rss>
