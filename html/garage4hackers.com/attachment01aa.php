

===========================================================================
                       "Few of my cracking notes"
                         by enlil from Nippur
						    at 06/02/2017
===========================================================================

This document was created as a 'quick notes' related to my 'cracking adven-
tures' (if we can call it like this). In that case, below you will find 
some (basic) ideas related to 'solving crackmes'. 

("Yes, I know that you should make keygens for some of these. However for 
now I wanted to focus solely on improving my RE skills and going the 
fastest way possible." ;) )

Because 'the (so called) law' in my country is currently changing, AFAIK,
now it's illegal to publish anything related to cracking/hacking. That's 
why I decide to not-publish it on the blog. Maybe I'll do it in the future,
when the current status of the situation will be more stable than now. 
We'll see. :)

===========================================================================

  Summery:

  00 . E-hursaggalama
  
      #00.00 - C-Crack.exe
	  #00.01 - 5min.exe 
  	  #00.02 - aboome2.exe
	  #00.03 - creakme.exe
	  #00.04 - AD_CM#1.EXE
	  #00.05 - AD_CM#2.exe 
	  #00.06 - AC1D.Materie.exe
	  #00.07 - Crackme1.exe
	  #00.08 - CrackMe2.exe
	  #00.09 - Crackme.exe
	  #00.0a - Cm3.exe

  01. E-sagdil 
	  
	  #01.00 - Unpacking EZIP
	  #01.01 - Unpacking MEW 1.1
	  #01.02 - Unpacking NsPack 3.5
	  #01.03 - Noname UnpackMe
	  #01.04 - Unpacking EXE32Pack 1.4
	  #01.05 - keyfileme.exe 
	  #01.06 - Unpacking NFOReader.exe

    02. E-kur 
	
	  #02.00 - DaXXoR2.ExE
	  #02.01 -   due-cm1.exe
	  
	  
  03. Man-In-The-Middle
  
  04. Conclusion
	
===========================================================================

  "Let's get to work." 
  
===========================================================================  

To cut the crap ;) we will go directly to the first case... but first of 
all I would like to thank all the people involved in creating crackmes.de 
(where I found all the crackmes described here). Because now the page is 
closed - as far as I know - all repository/"backup" can be found at 
tuts4you's webpage (big thanks too!).

I assumed that you already got it ("the backup") so we can go to the 
mentioned 'first case'.


===========================================================================

  00 . E-hursaggalama

---------------------------------------------------------------------------  
      #00.00 - C-Crack.exe
---------------------------------------------------------------------------

Checking this one we will start here:
"Oright get that brain working this is easy  ;) ! ( By Cominox )
What is the serial :"

After you will find those strings (in strings), it will be easy
to spot them in the code, see below:

004013FB  |. F3:A4          REP MOVS BYTE PTR ES:[EDI],BYTE PTR DS:[>; |
004013FD  |. C74424 4C 0100>MOV DWORD PTR SS:[ESP+4C],1              ; |
00401405  |. C70424 6430400>MOV DWORD PTR SS:[ESP],C-Crack.00403064  ; |ASCII "Oright get that brain working this is easy  ;) ! ( By Cominox ) "
0040140C  |. E8 DB070000    CALL <JMP.&msvcrt.puts>                  ; \puts
00401411  |. EB 63          JMP SHORT C-Crack.00401476
00401413  |> C70424 A530400>/MOV DWORD PTR SS:[ESP],C-Crack.004030A5 ; ||ASCII "What is the serial : "
0040141A  |. E8 D5070000    |CALL <JMP.&msvcrt.printf>               ; |\printf
0040141F  |. 8D4424 11      |LEA EAX,DWORD PTR SS:[ESP+11]           ; |

I decided to set a breakpoint in the instruction located
at the address 00401405 - MOV - and hit F9 to run to bp.

Step (F8) and read the code. We will find scanf() inside
the code, so now we can go for it and type our serial:

"What is the serial : ekur"

After the 'enter' (F7) we will be here:
00401433  |. 8D4424 43      |LEA EAX,DWORD PTR SS:[ESP+43]

Now we can see what will happen here: if we will type
wrong serial, we will JuMP directly to the 'badboy':

00401447  |. 83F8 01        |CMP EAX,1                               ; |
0040144A  |. 75 16          |JNZ SHORT C-Crack.00401462              ; |
(...)
00401462  |> 8D4424 11      |LEA EAX,DWORD PTR SS:[ESP+11]           ; |
00401466  |. 894424 04      |MOV DWORD PTR SS:[ESP+4],EAX            ; |
0040146A  |. C70424 D430400>|MOV DWORD PTR SS:[ESP],C-Crack.004030D4 ; |ASCII "serial %s not valide ! try again n00b"
00401471  |. E8 7E070000    |CALL <JMP.&msvcrt.printf>               ; \printf
00401476  |> 837C24 4C 01    CMP DWORD PTR SS:[ESP+4C],1

We don't want to do that. So that's why we will change
JNZ to JZ. Let's see what will happen now:

"Jump is NOT taken
00401462=C-Crack.00401462"

Cool, F9:
"serial ekur valide !"

By the way, validation routing you will find here:

004013A0  |. EB 1A          JMP SHORT C-Crack.004013BC
004013A2  |> 8B45 FC        /MOV EAX,DWORD PTR SS:[EBP-4]
004013A5  |. 0345 08        |ADD EAX,DWORD PTR SS:[EBP+8]
004013A8  |. 8A10           |MOV DL,BYTE PTR DS:[EAX]
004013AA  |. 8B45 FC        |MOV EAX,DWORD PTR SS:[EBP-4]
004013AD  |. 0345 0C        |ADD EAX,DWORD PTR SS:[EBP+C]
004013B0  |. 8A00           |MOV AL,BYTE PTR DS:[EAX]
004013B2  |. 38C2           |CMP DL,AL
004013B4  |. 75 03          |JNZ SHORT C-Crack.004013B9
004013B6  |. FF45 F8        |INC DWORD PTR SS:[EBP-8]
004013B9  |> FF45 FC        |INC DWORD PTR SS:[EBP-4]
004013BC  |> 837D FC 08      CMP DWORD PTR SS:[EBP-4],8
004013C0  |.^7E E0          \JLE SHORT C-Crack.004013A2

If you will set a breakpoint here:
004013B0  |. 8A00           |MOV AL,BYTE PTR DS:[EAX]

and play a little bit with F9, you will see the correct serial
(if you don't want to find it when searching for a strings of course;)).  
  
Next.

---------------------------------------------------------------------------
  	  #00.01 - 5min.exe 
---------------------------------------------------------------------------
CPU Disasm
Address   Hex dump          Command                                  Comments
00401184  |.  A1 9C304000   MOV EAX,DWORD PTR DS:[40309C]
00401189  |.  83C8 00       OR EAX,00000000
0040118C      74 2C         JNZ SHORT 004011BA
0040118E  |.  EB 15         JMP SHORT 004011A5
00401190  |>  6A 30         PUSH 30                                  ; /Type = MB_OK|MB_ICONEXCLAMATION|MB_DEFBUTTON1|MB_APPLMODAL, default case of switch 5min.401127
00401192  |.  68 01304000   PUSH OFFSET 00403001                     ; |Caption = "eSn-mIn"
00401197  |.  68 6A304000   PUSH OFFSET 0040306A                     ; |Text = "El nombre debe tener entre 8 y 12 caracteres"
0040119C  |.  6A 00         PUSH 0                                   ; |hOwner = NULL
0040119E  |.  E8 57000000   CALL <JMP.&USER32.MessageBoxA>           ; \USER32.MessageBoxA
004011A3  |.  EB 34         JMP SHORT 004011D9
004011A5  |>  6A 40         PUSH 40                                  ; /Type = MB_OK|MB_ICONASTERISK|MB_DEFBUTTON1|MB_APPLMODAL
004011A7  |.  68 01304000   PUSH OFFSET 00403001                     ; |Caption = "eSn-mIn"
004011AC  |.  68 50304000   PUSH OFFSET 00403050                     ; |Text = "UEEE, lo has conseguido!"
004011B1  |.  6A 00         PUSH 0                                   ; |hOwner = NULL


So here we have a JNZ instruction at 0040118C. To solve the crackme, we
need to change JNZ instruction (if not zero - goto badboy) to JZ.

Now we will compare values and if there is a 0 as a result of comparison
then we will go to the 'goodboy' message:

"UEEE, lo has conseguido!"

Next.


---------------------------------------------------------------------------
  	  #00.02 - aboome2.exe
---------------------------------------------------------------------------

This one will be cracked by changing only one instruction:

CPU Disasm
Address   Hex dump          Command                                  Comments
004048BC  |.  8985 14FFFFFF MOV DWORD PTR SS:[EBP-0EC],EAX
004048C2  |.  83BD 14FFFFFF CMP DWORD PTR SS:[EBP-0EC],0
004048C9      75 14         JNE SHORT 004048DF
004048CB  |.  68 E4AC4100   PUSH OFFSET 0041ACE4                     ; Text = "Good Work! now make a keygen!      "
004048D0  |.  68 ED030000   PUSH 3ED                                 ; ControlID = 1005.
004048D5  |.  8B45 08       MOV EAX,DWORD PTR SS:[EBP+8]
004048D8  |.  50            PUSH EAX                                 ; hDialog

JNE we will change to JE, so if wrong-input is typed
it will take us to the good-boy:

CPU Disasm
Address   Hex dump          Command                                  Comments
004048BC  |.  8985 14FFFFFF MOV DWORD PTR SS:[EBP-0EC],EAX
004048C2  |.  83BD 14FFFFFF CMP DWORD PTR SS:[EBP-0EC],0
004048C9      75 14         JE SHORT 004048DF
004048CB  |.  68 E4AC4100   PUSH OFFSET 0041ACE4                     ; Text = "Good Work! now make a keygen!      "
004048D0  |.  68 ED030000   PUSH 3ED                                 ; ControlID = 1005.
004048D5  |.  8B45 08       MOV EAX,DWORD PTR SS:[EBP+8]
004048D8  |.  50            PUSH EAX                                 ; hDialog


Again, after we changed the jump-condition, we are able to run code
prepared for a 'good boy'. 

Next.


---------------------------------------------------------------------------	  
	  #00.03 - creakme.exe
---------------------------------------------------------------------------

We will start here:

CPU Disasm
Address   Hex dump          Command                                  Comments
00401155  |.  3B05 25304000 CMP EAX,DWORD PTR DS:[403025]
0040115B  |.  58            POP EAX
0040115C  |.  75 18         JNE SHORT 00401176
0040115E  |.  6A 00         PUSH 0                                   ; /Type = MB_OK|MB_DEFBUTTON1|MB_APPLMODAL
00401160  |.  68 5F204000   PUSH OFFSET 0040205F                     ; |Caption = ".:: DiS[IP] Programer ::."
00401165  |.  68 4A204000   PUSH OFFSET 0040204A                     ; |Text = "Register complite!!!"
0040116A  |.  FF35 00304000 PUSH DWORD PTR DS:[403000]               ; |hOwner = 00130202, class = #32770, text = .:: Created by DiS[IP] ::.
00401170  |.  E8 33000000   CALL <JMP.&user32.MessageBoxA>           ; \USER32.MessageBoxA
00401175  |.  C3            RETN
00401176  |>  58            POP EAX
00401177  |.  6A 00         PUSH 0                                   ; /Type = MB_OK|MB_DEFBUTTON1|MB_APPLMODAL
00401179  |.  68 5F204000   PUSH OFFSET 0040205F                     ; |Caption = ".:: DiS[IP] Programer ::."
0040117E  |.  68 30204000   PUSH OFFSET 00402030                     ; |Text = "Name or Password is BAD!!"
00401183  |.  FF35 00304000 PUSH DWORD PTR DS:[403000]               ; |hOwner = 00130202, class = #32770, text = .:: Created by DiS[IP] ::.
00401189  |.  E8 1A000000   CALL <JMP.&user32.MessageBoxA>           ; \USER32.MessageBoxA
0040118E  \.  C3            RETN
0040118F      CC            INT3
00401190   $- FF25 14204000 JMP DWORD PTR DS:[<&user32.DialogBoxPara
00401196   $- FF25 24204000 JMP DWORD PTR DS:[<&user32.EndDialog>]


So it looks like we need to change a jump-condition again:

CPU Disasm
Address   Hex dump          Command                                  Comments
00401138  |.  40            |INC EAX
00401139  |.  50            |PUSH EAX
0040113A  |.  66:3BD9       |CMP BX,CX
0040113D  |.  75 37         |JNE SHORT 00401176                      ; yep
0040113F  |.  8305 39304000 |ADD DWORD PTR DS:[403039],1
00401146  |.  58            |POP EAX


From JNE to JE: 

CPU Disasm
Address   Hex dump          Command                                  Comments
00401139  |.  50            PUSH EAX
0040113A  |.  66:3BD9       CMP BX,CX
0040113D      74 37         JE SHORT 00401176
0040113F  |.  8305 39304000 ADD DWORD PTR DS:[403039],1
00401146  |.  58            POP EAX
00401147  |.  3B05 25304000 CMP EAX,DWORD PTR DS:[403025]
0040114D  |.^ 75 BA         JNE SHORT 00401109
0040114F  |.  50            PUSH EAX
00401150  |.  A1 39304000   MOV EAX,DWORD PTR DS:[403039]
00401155  |.  3B05 25304000 CMP EAX,DWORD PTR DS:[403025]
0040115B  |.  58            POP EAX
0040115C  |.  75 18         JNE SHORT 00401176
0040115E  |.  6A 00         PUSH 0                                   ; /Type = MB_OK|MB_DEFBUTTON1|MB_APPLMODAL
00401160  |.  68 5F204000   PUSH OFFSET 0040205F                     ; |Caption = ".:: DiS[IP] Programer ::."
00401165  |.  68 4A204000   PUSH OFFSET 0040204A                     ; |Text = "Register complite!!!"
0040116A  |.  FF35 00304000 PUSH DWORD PTR DS:[403000]               ; |hOwner = 00130202, class = #32770, text = .:: Created by DiS[IP] ::.
00401170  |.  E8 33000000   CALL <JMP.&user32.MessageBoxA>           ; \USER32.MessageBoxA
00401175  |.  C3            RETN
00401176  |>  58            POP EAX
00401177  |.  6A 00         PUSH 0                                   ; /Type = MB_OK|MB_DEFBUTTON1|MB_APPLMODAL
00401179  |.  68 5F204000   PUSH OFFSET 0040205F                     ; |Caption = ".:: DiS[IP] Programer ::."
0040117E  |.  68 30204000   PUSH OFFSET 00402030                     ; |Text = "Name or Password is BAD!!"
00401183  |.  FF35 00304000 PUSH DWORD PTR DS:[403000]               ; |hOwner = 00130202, class = #32770, text = .:: Created by DiS[IP] ::.
00401189  |.  E8 1A000000   CALL <JMP.&user32.MessageBoxA>           ; \USER32.MessageBoxA
0040118E  \.  C3            RETN
0040118F      CC            INT3
00401190   $- FF25 14204000 JMP DWORD PTR DS:[<&user32.DialogBoxPara
00401196   $- FF25 24204000 JMP DWORD PTR DS:[<&user32.EndDialog>]
0040119C   $- FF25 20204000 JMP DWORD PTR DS:[<&user32.GetDlgItemTex
 

ressults:
".::DiS[IP] Programmer ::.
 
Register complite!!!"

As you can probably see now, there is also another way to solve this one,
but I will leave it for you as an exercise.

Next one.


---------------------------------------------------------------------------
	  #00.04 - AD_CM#1.EXE

---------------------------------------------------------------------------

From my perspective, very interesting case for new-asm-readers. ;)
So, enjoy:


CPU Disasm
Address   Hex dump          Command                                  Comments
004010A5  |.  66:3D B90B    CMP AX,0BB9
004010A9  |.  75 43         JNE SHORT 004010EE
004010AB  |.  6A 07         PUSH 7                                   ; /MaxCount = 7
004010AD  |.  68 5C304000   PUSH OFFSET 0040305C                     ; |String
004010B2  |.  68 B80B0000   PUSH 0BB8                                ; |ItemID = 3000.
004010B7  |.  FF75 08       PUSH DWORD PTR SS:[ARG.1]                ; |hDialog => [ARG.1]
004010BA  |.  E8 6F000000   CALL <JMP.&USER32.GetDlgItemTextA>       ; \USER32.GetDlgItemTextA
004010BF  |.  B8 5C304000   MOV EAX,OFFSET 0040305C
004010C4  |.  BB 1E304000   MOV EBX,OFFSET 0040301E                  ; ASCII "qWeRtZ"
004010C9  |.  B9 07000000   MOV ECX,7
004010CE  |>  8A13          /MOV DL,BYTE PTR DS:[EBX]
004010D0  |.  3810          |CMP BYTE PTR DS:[EAX],DL
004010D2  |.  75 18         |JNE SHORT 004010EC
004010D4  |.  40            |INC EAX
004010D5  |.  43            |INC EBX
004010D6  |.^ E2 F6         \LOOP SHORT 004010CE
004010D8  |.  6A 40         PUSH 40                                  ; /Type = MB_OK|MB_ICONASTERISK|MB_DEFBUTTON1|MB_APPLMODAL
004010DA  |.  68 09304000   PUSH OFFSET 00403009                     ; |Caption = "ArturDents CrackMe#1"
004010DF  |.  68 36304000   PUSH OFFSET 00403036                     ; |Text = "Yeah, you did it!"
004010E4  |.  FF75 08       PUSH DWORD PTR SS:[ARG.1]                ; |hOwner => [ARG.1]
004010E7  |.  E8 48000000   CALL <JMP.&USER32.MessageBoxA>           ; \USER32.MessageBoxA
004010EC  |>  EB 1A         JMP SHORT 00401108
004010EE  |>  66:3D BA0B    CMP AX,0BBA
004010F2      75 14         JNE SHORT 00401108
004010F4  |.  6A 00         PUSH 0                                   ; lParam = NULL
004010F6  |.  68 027D0000   PUSH 7D02                                ; wParam = NotifyCode = MENU/BN_CLICKED..., ID = 32002.
004010FB  |.  68 11010000   PUSH 111                                 ; Msg = WM_COMMAND
00401100  |.  FF75 08       PUSH DWORD PTR SS:[ARG.1]                ; hWnd => [ARG.1]
00401103  |.  E8 32000000   CALL <JMP.&USER32.SendMessageA>          ; Jump to USER32.SendMessageA
00401108  |>  EB 09         JMP SHORT 00401113
0040110A  |>  B8 00000000   MOV EAX,0
0040110F  |.  C9            LEAVE
00401110  |.  C2 1000       RETN 10
00401113  |>  B8 01000000   MOV EAX,1



Well, it looks for me like the string from EAX is compared with EBX.
Serial-key is in EBX and then it's compared char-by-char with value(s)
from DL (users-input serial key).
 
DL compared, loop, next char-value... compared, loop... and so on, until we will
find a 'pair' which is equal. :)

In that case - 'password is hardcoded' so we can find it during reading the ASM.


---------------------------------------------------------------------------
	  #00.05 - AD_CM#2.exe 

---------------------------------------------------------------------------

This is 2nd crackme in this series. Below you will find some kind of a routine 
prepared to compare your input with the value in DL register (so, case similar
to the one we solved before).


CPU Disasm
Address   Hex dump          Command                                  Comments
00401117  |.  83FE 05       CMP ESI,5
0040111A  |.  7D 18         JGE SHORT 00401134
0040111C  |.  6A 40         PUSH 40                                  ; /Type = MB_OK|MB_ICONASTERISK|MB_DEFBUTTON1|MB_APPLMODAL
0040111E  |.  68 12304000   PUSH OFFSET 00403012                     ; |Caption = "ArturDents CrackMe#2"
00401123  |.  68 44304000   PUSH OFFSET 00403044                     ; |Text = "Your name must be at least five characters long!"
00401128  |.  FF75 08       PUSH DWORD PTR SS:[ARG.1]                ; |hOwner => [ARG.1]
0040112B  |.  E8 60000000   CALL <JMP.&USER32.MessageBoxA>           ; \USER32.MessageBoxA
00401130  |.  33C0          XOR EAX,EAX
00401132  |.  EB 40         JMP SHORT 00401174
00401134  |>  6A 14         PUSH 14                                  ; /MaxCount = 20.
00401136  |.  68 80324000   PUSH OFFSET 00403280                     ; |String
0040113B  |.  68 B90B0000   PUSH 0BB9                                ; |ItemID = 3001.
00401140  |.  FF75 08       PUSH DWORD PTR SS:[ARG.1]                ; |hDialog => [ARG.1]
00401143  |.  E8 42000000   CALL <JMP.&USER32.GetDlgItemTextA>       ; \USER32.GetDlgItemTextA
00401148  |.  B8 80304000   MOV EAX,OFFSET 00403080
0040114D  |.  BB 80324000   MOV EBX,OFFSET 00403280
00401152  |.  8BCE          MOV ECX,ESI
00401154  |>  8A10          MOV DL,BYTE PTR DS:[EAX]
00401156  |.  2AD1          SUB DL,CL
00401158      3813          CMP BYTE PTR DS:[EBX],DL
0040115A  |.  75 18         JNE SHORT 00401174
0040115C  |.  40            INC EAX
0040115D  |.  43            INC EBX
0040115E  |.^ E2 F4         LOOP SHORT 00401154
00401160  |.  6A 40         PUSH 40                                  ; /Type = MB_OK|MB_ICONASTERISK|MB_DEFBUTTON1|MB_APPLMODAL
00401162  |.  68 12304000   PUSH OFFSET 00403012                     ; |Caption = "ArturDents CrackMe#2"
00401167  |.  68 27304000   PUSH OFFSET 00403027                     ; |Text = "Yeah, you did it!"
0040116C  |.  FF75 08       PUSH DWORD PTR SS:[ARG.1]                ; |hOwner => [ARG.1]
0040116F  |.  E8 1C000000   CALL <JMP.&USER32.MessageBoxA>           ; \USER32.MessageBoxA
00401174  |>  C9            LEAVE
00401175  \.  C2 0400       RETN 4
00401178   $- FF25 20204000 JMP DWORD PTR DS:[<&USER32.DialogBoxPara
0040117E   $- FF25 18204000 JMP DWORD PTR DS:[<&USER32.EndDialog>]

So we need to change CMP instruction to more 'useful' one:

CPU Disasm
Address   Hex dump          Command                                  Comments
00401156  |.  2AD1          SUB DL,CL
00401158      3813          CMP BYTE PTR DS:[EBX],DL                ; here: change ptr to dl-register or ebx
0040115A  |.  75 18         JNE SHORT 00401174

New one will look like this:

CPU Disasm
Address   Hex dump          Command                                  Comments
00401156  |.  2AD1          SUB DL,CL
00401158      38D2          CMP DL,DL                               ; here: changed to compare dl-dl
0040115A  |.  75 18         JNE SHORT 00401174

Type anything (more than 5 characters in name; see asm) and hit 'check' button
to see your results.

Next.


---------------------------------------------------------------------------
	  #00.06 - AC1D.Materie.exe
---------------------------------------------------------------------------

Quick overview: running the app, we will see a welcome-message:


############################
#____[ AC1D Materie#1 ]____#
#__[ by #ParadoxX[AC1D] ]__#
############################

First Serial: asd

Second Serial:
Checking...
(...)

Ok, checking the code from ASM perspective (OllyDbg used again):

CPU Disasm
Address   Hex dump          Command                                  Comments
004014A7  |.  83EC 04       SUB ESP,4
004014AA  |.  8B45 F0       MOV EAX,DWORD PTR SS:[LOCAL.4]
004014AD      3B45 EC       CMP EAX,DWORD PTR SS:[EBP-14]
004014B0  |.  74 22         JE SHORT 004014D4
004014B2  |.  C74424 04 A90 MOV DWORD PTR SS:[LOCAL.13],OFFSET 00440
004014BA  |.  C70424 C03344 MOV DWORD PTR SS:[LOCAL.14],OFFSET 00443
004014C1  |.  E8 4AAA0300   CALL 0043BF10
004014C6  |.  C70424 B90044 MOV DWORD PTR SS:[LOCAL.14],OFFSET 00440 ; /command => "pause"
004014CD  |.  E8 66F20000   CALL <JMP.&msvcrt.system>                ; \MSVCRT.system
004014D2  |.  EB 34         JMP SHORT 00401508
004014D4  |>  C74424 04 C00 MOV DWORD PTR SS:[LOCAL.13],OFFSET 00440 ; ASCII "Solved! Show me your resolution at Crackmes.de + KeyGen!"
004014DC  |.  C70424 C03344 MOV DWORD PTR SS:[LOCAL.14],OFFSET 00443
004014E3  |.  E8 28AA0300   CALL 0043BF10
004014E8  |.  C74424 04 FC0 MOV DWORD PTR SS:[LOCAL.13],OFFSET 00440 ; ASCII "Powered by #ParadoxX[AC1D] and Crackmes.de"
004014F0  |.  C70424 C03344 MOV DWORD PTR SS:[LOCAL.14],OFFSET 00443


To solve this I decided to change one byte only at location: 004014AD.
After the change, we will compare EAX to EAX (so always 'good'):

CPU Disasm
Address   Hex dump          Command                                  Comments
004014AA  |.  8B45 F0       MOV EAX,DWORD PTR SS:[LOCAL.4]
004014AD      39C0          CMP EAX,EAX                              ; here we will compare
004014AF      90            NOP
004014B0  |.  74 22         JE SHORT 004014D4
004014B2  |.  C74424 04 A90 MOV DWORD PTR SS:[LOCAL.13],OFFSET 00440
004014BA  |.  C70424 C03344 MOV DWORD PTR SS:[LOCAL.14],OFFSET 00443
004014C1  |.  E8 4AAA0300   CALL 0043BF10
004014C6  |.  C70424 B90044 MOV DWORD PTR SS:[LOCAL.14],OFFSET 00440 ; /command => "pause"
004014CD  |.  E8 66F20000   CALL <JMP.&msvcrt.system>                ; \MSVCRT.system
004014D2  |.  EB 34         JMP SHORT 00401508
004014D4  |>  C74424 04 C00 MOV DWORD PTR SS:[LOCAL.13],OFFSET 00440 ; ASCII "Solved! Show me your resolution at Crackmes.de + KeyGen!"
004014DC  |.  C70424 C03344 MOV DWORD PTR SS:[LOCAL.14],OFFSET 00443
004014E3  |.  E8 28AA0300   CALL 0043BF10
004014E8  |.  C74424 04 FC0 MOV DWORD PTR SS:[LOCAL.13],OFFSET 00440 ; ASCII "Powered by #ParadoxX[AC1D] and Crackmes.de"


CMP is changed, so now we will see:

############################
#____[ AC1D Materie#1 ]____#
#__[ by #ParadoxX[AC1D] ]__#
############################

First Serial: asd

Second Serial:
Checking...
Solved! Show me your resolution at Crackmes.de + KeyGen!
Powered by #ParadoxX[AC1D] and Crackmes.de

Next.

---------------------------------------------------------------------------
	  #00.07 - Crackme1.exe
---------------------------------------------------------------------------

Landed here:

CPU Disasm
Address   Hex dump          Command                                  Comments
00402B63  |.  33ED          XOR EBP,EBP
00402B65  |.  83C4 0C       ADD ESP,0C
00402B68  |.  3BC5          CMP EAX,EBP
00402B6A  |.  75 16         JNE SHORT 00402B82
00402B6C  |.  3BF7          CMP ESI,EDI
00402B6E  |.  72 12         JB SHORT 00402B82
00402B70  |.  33C0          XOR EAX,EAX
00402B72  |.  3BF7          CMP ESI,EDI
00402B74  |.  0F95C0        SETNE AL
00402B77  |.  3BC5          CMP EAX,EBP
00402B79  |.  75 07         JNE SHORT 00402B82
00402B7B  |.  68 C8414100   PUSH OFFSET 004141C8                     ; ASCII "Right"
00402B80  |.  EB 05         JMP SHORT 00402B87
00402B82  |>  68 D0414100   PUSH OFFSET 004141D0                     ; ASCII "Noo0O0oo!"
00402B87  |>  68 90A54100   PUSH OFFSET 0041A590
00402B8C  |.  E8 1FFAFFFF   CALL 004025B0
00402B91  |.  83C4 08       ADD ESP,8
00402B94  |.  8D4424 10     LEA EAX,[LOCAL.21]
00402B98  |.  50            PUSH EAX                                 ; /Arg2 => OFFSET LOCAL.21
00402B99  |.  68 F4A44100   PUSH OFFSET 0041A4F4                     ; |Arg1 = Crackme1.41A4F4
00402B9E  |.  E8 0DFCFFFF   CALL 004027B0                            ; \Crackme1.004027B0
00402BA3  |.  83C4 08       ADD ESP,8
00402BA6  |.  395C24 44     CMP DWORD PTR SS:[LOCAL.8],EBX


So now we have few CMP instrcutions. I created a breakpoint on all of them.
Re-run (ctrl+f2) and step-in (ctrl+f7, we're still in OllyDbg) to analyze it.

I've changed all 3 values of CMP instructions. Now ASM looks like this:


CPU Disasm
Address   Hex dump          Command                                  Comments
00402B63  |.  33ED          XOR EBP,EBP
00402B65  |.  83C4 0C       ADD ESP,0C
00402B68      39C0          CMP EAX,EAX
00402B6A  |.  75 16         JNE SHORT 00402B82
00402B6C      39F6          CMP ESI,ESI
00402B6E  |.  72 12         JB SHORT 00402B82
00402B70  |.  33C0          XOR EAX,EAX
00402B72  |.  3BF7          CMP ESI,EDI
00402B74  |.  0F95C0        SETNE AL
00402B77      39C0          CMP EAX,EAX
00402B79  |.  75 07         JNE SHORT 00402B82
00402B7B  |.  68 C8414100   PUSH OFFSET 004141C8                     ; ASCII "Right"
00402B80  |.  EB 05         JMP SHORT 00402B87
00402B82  |>  68 D0414100   PUSH OFFSET 004141D0                     ; ASCII "Noo0O0oo!"
00402B87  |>  68 90A54100   PUSH OFFSET 0041A590

So now, you're able to pass the condition and print 'goodboy' message.

Next.

---------------------------------------------------------------------------
	  #00.08 - CrackMe2.exe
---------------------------------------------------------------------------

This time I decided to switch to something else than just finding (in)correct way
for setting up few bytes in the application. And that's how I found CrackMe2.exe.

I checked it in PEiD, and the found signature was:
"UPX 0.89.6 - 1.02 / 1.05 - 2.90 -> Markus & Laszlo". I thought it will be a cool
exercise for me to solve "a little bit harder" crackme than few ones before...

After opening the file/app in OllyDbg, you will notice that the program will land 
somewhere here:

0041AB60 > $ 60             PUSHAD  <--- 
0041AB61   . BE 00C04000    MOV ESI,CrackMe2.0040C000
0041AB66   . 8DBE 0050FFFF  LEA EDI,DWORD PTR DS:[ESI+FFFF5000]

F7 to move one step (and change ESP value). Right-click to new ESP and 'Follow 
in Dump'. Now mark 4 first bytes and set them as a hardware bp on access (word/dword).

...and run F9 to go:

0041ACB8   .-E9 44B1FEFF    JMP CrackMe2.00405E01

We are in some JuMP. Let's jump there (F7):

00405E01   6A 60            PUSH 60 <--- 
00405E03   68 88C64000      PUSH CrackMe2.0040C688
00405E08   E8 33020000      CALL CrackMe2.00406040
00405E0D   BF 94000000      MOV EDI,94
00405E12   8BC7             MOV EAX,EDI
00405E14   E8 47FFFFFF      CALL CrackMe2.00405D60
00405E19   8965 E8          MOV DWORD PTR SS:[EBP-18],ESP

And it should be our 'original entry point'. Now the app is ready to dump it
(to "unpacked" version). To do that I used OllyDump.dll plugin (prepared for 
version 1 of Olly (1.10, 32bit)).

New dumped executable, now "verified" by PEiD looks like this:
"Microsoft Visual C++ 7.0"

So better. After all, I still couldn't run the program. After I read about
the possible reason(s) I opened the binary in Olly again, but this time 
I also started ImpRec tool. After finding OEP (before in debugger) I was 
able to use 'IAT Autosearch' as well as 'GetImports' and finally 'FixDump'.

Now new app is (almost) ready to crack. ;]
Maybe we will back to it later.

Next.

---------------------------------------------------------------------------
	  #00.09 - Crackme.exe
---------------------------------------------------------------------------

As you can see:

00402DD2   . 894D C4        MOV DWORD PTR SS:[EBP-3C],ECX
00402DD5   . 8945 BC        MOV DWORD PTR SS:[EBP-44],EAX
00402DD8     74 50          JE SHORT Crackme.00402E2A
00402DDA   . 8D95 7CFFFFFF  LEA EDX,DWORD PTR SS:[EBP-84]
00402DE0   . 8D4D CC        LEA ECX,DWORD PTR SS:[EBP-34]
00402DE3   . C745 84 842140>MOV DWORD PTR SS:[EBP-7C],Crackme.004021>;  UNICODE "I can't believe you cracked this, how long did it take?"
00402DEA   . C785 7CFFFFFF >MOV DWORD PTR SS:[EBP-84],8
00402DF4   . FF15 FC104000  CALL DWORD PTR DS:[<&MSVBVM60.__vbaVarDu>;  MSVBVM60.__vbaVarDup
00402DFA   . 8D45 9C        LEA EAX,DWORD PTR SS:[EBP-64]
00402DFD   . 8D4D AC        LEA ECX,DWORD PTR SS:[EBP-54]
00402E00   . 50             PUSH EAX
00402E01   . 8D55 BC        LEA EDX,DWORD PTR SS:[EBP-44]
00402E04   . 51             PUSH ECX
00402E05   . 52             PUSH EDX


if the Jump-if-Equal is true (there is an equality), we will
go to the badboy. Let's change JE to JNE and hit F9 again with
"Check" button:

00402DD5   . 8945 BC        MOV DWORD PTR SS:[EBP-44],EAX
00402DD8     75 50          JNZ SHORT Crackme.00402E2A
00402DDA   . 8D95 7CFFFFFF  LEA EDX,DWORD PTR SS:[EBP-84]
00402DE0   . 8D4D CC        LEA ECX,DWORD PTR SS:[EBP-34]

Now we should be here:
00402DE3   . C745 84 842140>MOV DWORD PTR SS:[EBP-7C],Crackme.004021>;  UNICODE "I can't believe you cracked this, how long did it take?"


Next. 

---------------------------------------------------------------------------
	  #00.0a - Cm3.exe
---------------------------------------------------------------------------

We landed somewhere here:

00401330   . 83C2 15        ADD EDX,15
00401333   . 3D F1000000    CMP EAX,0F1
00401338   . 75 25          JNZ SHORT Cm3.0040135F
0040133A   . 6A 00          PUSH 0                                   ; /Style = MB_OK|MB_APPLMODAL
0040133C   . 68 C2304000    PUSH Cm3.004030C2                        ; |Title = "Registered"
00401341   . 68 CD304000    PUSH Cm3.004030CD                        ; |Text = "Yeah you have solved this CM!!"
00401346   . 6A 00          PUSH 0                                   ; |hOwner = NULL
00401348   . E8 79000000    CALL <JMP.&USER32.MessageBoxA>           ; \MessageBoxA
0040134D   . 68 C2304000    PUSH Cm3.004030C2                        ; /Text = "Registered"
00401352   . FF35 08314000  PUSH DWORD PTR DS:[403108]               ; |hWnd = 00270380 (class='Edit',parent=004C02EC)
00401358   . E8 87000000    CALL <JMP.&USER32.SetWindowTextA>        ; \SetWindowTextA
0040135D   . EB 13          JMP SHORT Cm3.00401372
0040135F   > 6A 00          PUSH 0                                   ; /Style = MB_OK|MB_APPLMODAL
00401361   . 68 5E304000    PUSH Cm3.0040305E                        ; |Title = "Error!!!!"
00401366   . 68 68304000    PUSH Cm3.00403068                        ; |Text = "Check the field and try again!"
0040136B   . 6A 00          PUSH 0                                   ; |hOwner = NULL
0040136D   . E8 54000000    CALL <JMP.&USER32.MessageBoxA>           ; \MessageBoxA
00401372   > EB 15          JMP SHORT Cm3.00401389
00401374   > FF75 14        PUSH DWORD PTR SS:[EBP+14]               ; /lParam

As you can see, normaly we will end up in the badboy message.
We need something else. 

Because we can see (strings) in the OllyDbg, we can find an address
of a goodboy message:

0040133A   . 6A 00          PUSH 0                                   ; /Style = MB_OK|MB_APPLMODAL
0040133C   . 68 C2304000    PUSH Cm3.004030C2                        ; |Title = "Registered"
00401341   . 68 CD304000    PUSH Cm3.004030CD                        ; |Text = "Yeah you have solved this CM!!"
00401346   . 6A 00          PUSH 0                                   ; |hOwner = NULL
00401348   . E8 79000000    CALL <JMP.&USER32.MessageBoxA>           ; \MessageBoxA
0040134D   . 68 C2304000    PUSH Cm3.004030C2                        ; /Text = "Registered"
00401352   . FF35 08314000  PUSH DWORD PTR DS:[403108]               ; |hWnd = 005A0330 (class='Edit',parent=00490392)
00401358   . E8 87000000    CALL <JMP.&USER32.SetWindowTextA>        ; \SetWindowTextA

So to solve this, we will change last JNZ here:
00401265     83F8 10        CMP EAX,10
00401268     0F85 DF000000  JNZ Cm3.0040135F


To jump to somewhere else - more precisely, to the goodboy:

00401265     83F8 10        CMP EAX,10
00401268     0F85 DF000000  JNZ Cm3.0040134D

Now the app will show 'Registered' message.

Next.  
  
===========================================================================  
  01. E-sagdil 
  

---------------------------------------------------------------------------
  	  #01.00 - Unpacking EZIP
---------------------------------------------------------------------------

During some search on web I was able to find so called "REA UnPacKing Ebook"
(available at tuts4you.com while writting this file). Inside the book
I found described steps to manual unpacking EZIP packer.

In the middle of reading that book I decided to practice it on one of the Lena's
cracking tutorial examples (UnPackMe_EZIP1.0.exe).

Let's get to work:

First overview from PEiD: indeed we can see the packers name:
"EZIP 1.0 -> Jonathan Clark [Overlay]"

After the REA-book: after first load/view from OllyDbg, we should 
see a lot of JuMP's. In our example it looks like this:


004650BE > $ E9 19320000    JMP UnPackMe.004682DC
004650C3   . E9 7C2A0000    JMP UnPackMe.00467B44
004650C8   $ E9 19240000    JMP UnPackMe.004674E6
004650CD   $ E9 FF230000    JMP UnPackMe.004674D1
004650D2   . E9 1E2E0000    JMP UnPackMe.00467EF5
004650D7   $ E9 882E0000    JMP UnPackMe.00467F64
004650DC   $ E9 2C250000    JMP UnPackMe.0046760D
004650E1   $ E9 AE150000    JMP UnPackMe.00466694
004650E6   $ E9 772B0000    JMP UnPackMe.00467C62
004650EB   $ E9 87020000    JMP UnPackMe.00465377
004650F0   $ E9 702E0000    JMP UnPackMe.00467F65
004650F5     CC             INT3
004650F6     CC             INT3
004650F7     CC             INT3

REA said to use OllyDump plugin to find Original Entry Point ("Trace Over").
We landed here:

004271B0   55               PUSH EBP
004271B1   8BEC             MOV EBP,ESP
004271B3   6A FF            PUSH -1
004271B5   68 600E4500      PUSH UnPackMe.00450E60
004271BA   68 C8924200      PUSH UnPackMe.004292C8
004271BF   64:A1 00000000   MOV EAX,DWORD PTR FS:[0]
004271C5   50               PUSH EAX
004271C6   64:8925 00000000 MOV DWORD PTR FS:[0],ESP
004271CD   83C4 A8          ADD ESP,-58
004271D0   53               PUSH EBX
004271D1   56               PUSH ESI
004271D2   57               PUSH EDI
004271D3   8965 E8          MOV DWORD PTR SS:[EBP-18],ESP
004271D6   FF15 DC0A4600    CALL DWORD PTR DS:[460ADC]               ; kernel32.GetVersion
004271DC   33D2             XOR EDX,EDX
004271DE   8AD4             MOV DL,AH

As far as I remember, now we can (right-)click on instruction-windows in OllyDbg
and click 'Dump debugged process' to save unpacked EXE to new-file.

Verified by PEiD now looks like this:
"Microsoft Visual C++ 5.0"

(Yes, yes, we have an 'imports case' here as well, but we will back to it later.)

Ok, so I rebuilded imports by using tool called ImpRec (like it was described before).

After I rebuilder the app, I opened it in ImmunityDebugger to see what's going on
inside that program.

I found that the nag-screen presented on the beginning, is located here:

0040E508  |. 50             PUSH EAX
0040E509  |. 8D4D EC        LEA ECX,DWORD PTR SS:[EBP-14]
0040E50C  |. E8 C473FFFF    CALL UnPackMe.004058D5
0040E511  |. 50             PUSH EAX                                 ; |Text = "EZIP 1.0 UnPackMe 
                                                                        If you unpack it write a tutorial... :)"
0040E512  |. FF75 08        PUSH DWORD PTR SS:[EBP+8]                ; |hOwner
0040E515  |. FF15 E80D4600  CALL DWORD PTR DS:[<&USER32.MessageBoxA>>; \MessageBoxA
0040E51B  |. 8B8F 10080000  MOV ECX,DWORD PTR DS:[EDI+810]
0040E521  |. 8B49 44        MOV ECX,DWORD PTR DS:[ECX+44]
0040E524  |. 8901           MOV DWORD PTR DS:[ECX],EAX

I also found some other messages and info, for example:
"0012FCB0   009F1A20   �.  ASCII "Coded by Teddy Rogers / SnD Team 2005"


I decided to change the default nag for the message from the address 0012FCB0.
You need to change PUSH EAX before the CALL, to PUSH our new address 
of the new message ("Coded by Teddy Rogers / SnD Team 2005").

Yep, let's switch to something else ;)


---------------------------------------------------------------------------
	  #01.01 - Unpacking MEW 1.1
---------------------------------------------------------------------------

Ok, so after Lena's tutorial: I found here an app packed with MEW1.1.
Quick overview from PEiD looks like this:
"MEW 11 1.2 -> NorthFox/HCC"

The case is to unpack the app, so let's do it :)

Opening app in OllyDbg will bring us here:

0049B339 >-E9 164EF6FF      JMP UnPackMe.00400154

Checking memory map, we can see that this address is located (not in the code
section) here:

Memory map, item 15
 Address=0046D000
 Size=0003D000 (249856.)
 Owner=UnPackMe 00400000
 Section=�uۊ��
 Contains=SFX,imports,resources
 Type=Imag 01001002
 Access=R
 Initial access=RWE


So I was sure that hitting f7 will be a good idea :)

Now we're here:

00400154   BE 1CD04600      MOV ESI,UnPackMe.0046D01C      ; <-- 
00400159   8BDE             MOV EBX,ESI
0040015B   AD               LODS DWORD PTR DS:[ESI]
(...)
004001F3   50               PUSH EAX
004001F4   55               PUSH EBP
004001F5   FF53 F4          CALL DWORD PTR DS:[EBX-C]
004001F8   AB               STOS DWORD PTR ES:[EDI]
004001F9   85C0             TEST EAX,EAX
004001FB  ^75 E5            JNZ SHORT UnPackMe.004001E2
004001FD   C3               RETN   ; <-- 
004001FE   0000             ADD BYTE PTR DS:[EAX],AL
00400200   0000             ADD BYTE PTR DS:[EAX],AL


As you will see during reading the code, we landed in some 'long function'.
Let's set a breakpoint at the end of the function (RETN at 01FD; Olly will
tell us that this is weird but click 'yes' to confirm anyway).

Run f9 to pass the code and land in bp. When we're in RETN instruction,
hit f7 one more time and we should land here:

004271B0     55             DB 55                                    ;  CHAR 'U'
004271B1     8B             DB 8B
004271B2     EC             DB EC
004271B3     6A             DB 6A                                    ;  CHAR 'j'
004271B4     FF             DB FF
004271B5     68             DB 68                                    ;  CHAR 'h'
004271B6     60             DB 60                                    ;  CHAR '`'
004271B7     0E             DB 0E
004271B8     45             DB 45                                    ;  CHAR 'E'
004271B9     00             DB 00
004271BA     68             DB 68                                    ;  CHAR 'h'


As you can see Olly has not have a chance to analyze the code yet, so let's 
do it now (righ-click -> analyze...):

004271B0   . 55             PUSH EBP
004271B1   . 8BEC           MOV EBP,ESP
004271B3   . 6A FF          PUSH -1
004271B5   . 68 600E4500    PUSH UnPackMe.00450E60
004271BA   . 68 C8924200    PUSH UnPackMe.004292C8                   ;  SE handler installation
004271BF   . 64:A1 00000000 MOV EAX,DWORD PTR FS:[0]
004271C5   . 50             PUSH EAX
004271C6   . 64:8925 000000>MOV DWORD PTR FS:[0],ESP
004271CD   . 83C4 A8        ADD ESP,-58

Now it looks better. So now our "base address" is:
004271B0   . 55             PUSH EBP

Checking memory map again shows us that we should be in a good place:
Memory map, item 22
 Address=00401000 
 Size=0006C000 (442368.)
 Owner=UnPackMe 00400000
 Section=MEW
 Contains=code
 Type=Imag 01001002
 Access=R
 Initial access=RWE


Right-click again and let's dump the code to new exec.

This time I read that we should leave 'rebuilding imports' here.

Let's verify it again with PEiD (see the size of those exec's too):
"Microsoft Visual C++ 5.0"

Better now.

Next.

---------------------------------------------------------------------------
	  #01.02 - Unpacking NsPack 3.5
---------------------------------------------------------------------------

PEiD shows us:
"NsPacK V3.4-V3.5 -> LiuXingPing *"

To solve this one, we will need the following steps:
- open the app in ollydbg
- we are in PUSHAD 
- F8 to step and change ESP
- follow in dump
- set bp on 1st 4 bytes of dumped memory location
- F9 to hit the bp
- OEP is hardcoded in NSPACK (so we will land in another JuMP)
- F8 to step (we are in PUSH EBP, so the original entry point is achieved)
- right-click to dump debugged process 
- leave 'rebuild' as is

Now PEiD should look like this:
"Microsoft Visual C++ 5.0" 

Next.

---------------------------------------------------------------------------
	  #01.03 - Noname UnpackMe
---------------------------------------------------------------------------

PEiD looks like this:
"ASPack 1.02b or 1.08.03 *"

To solve this one, we will need the following steps:
- open the app in olly, we landed in PUSHAD (before the CALL)
- F8 to explore...
- find RETN address and set bp there
- F9 to hit bp (if hitted, we are going to the good direction)
- continue with F8 until we will find CALL to IsDebuggerPresent
- during next instructions: find OR to verify where the ZERO-flag is set.
  If it's not set, we will go to the IsDebuggerPresent function. When we will
  change it, JuMP will take us to the (goodboy's) location we need.
- next idea is to set bp on code-section now (.text): goto memory map location,
  and set bp on (first) .text section you will find (F2 - break on access or
  just set memory on access breakpoint)
- F9
- we should now be in the OEP
- dump the binary (and you can delete .ptr section added by the packer
  while rebuilding the imports)

Now PEiD looks like this:
"Microsoft Visual C++ 5.0"


Next.

---------------------------------------------------------------------------
	  #01.04 - Unpacking EXE32Pack 1.4
---------------------------------------------------------------------------

PEiD looks like: 
"EXE32Pack 1.3x -> SteelBytes"

Let's go:
- open the app.exe in olly
- remove the (default) analysis! 
- now we should be somewhere beteen the CMP and JE instructions
- F8 to step (and to change ESP value; hit it 2 or 3 times afaik)
- follow in dump with changed ESP
- set mem bp on access (dword)
- F9
- we should land in CMP instruction
- F8 to use JMP instruction
- we should land in JMP EAX (where EAX is our OEP)
- F8 to achieve OEP
- dump debugged process
- uncheck 'Rebuild Imports' when dumping

The app should be unpacked now.

Next.

---------------------------------------------------------------------------
	  #01.05 - keyfileme.exe 
---------------------------------------------------------------------------

This one was found in archive named [TDC.Crackme9]KeyFileME.

I decided to wait for a while with wnother packed code and that's how
I found keyfileme.exe app. I tried to open it in OllyDbg but there was 
a little surprise - nag and crash prepared when Olly was detected.

I switched to IdaPro to look for other possible function(s) inside the 
app. After quick review I opened it again, this time in ImmunityDbg.

TL;DR:

- breakpoint here:
0040111F  |. E8 83000000    CALL keyfilem.004011A7
00401124  |. E8 D7000000    CALL <JMP.&check_kf.CheckKey>
00401129  |. 83F8 01        CMP EAX,1
0040112C  |. 74 17          JE SHORT keyfilem.00401145
0040112E  |. 83F8 02        CMP EAX,2
00401131  |. 74 24          JE SHORT keyfilem.00401157

As you can see, there is a CoMPare instruction. If comparsion
result is equal, code will jump to new location. We will change
JE to JNE like this:

00401124  |. E8 D7000000    CALL <JMP.&check_kf.CheckKey>
00401129  |. 83F8 01        CMP EAX,1
0040112C     75 17          JNZ SHORT keyfilem.00401145
0040112E  |. 83F8 02        CMP EAX,2
00401131  |. 74 24          JE SHORT keyfilem.00401157

Hit F8 to step, and we will land here:
00401145  |> 68 C5304000    PUSH keyfilem.004030C5                   ; /Text = "=-=- Level (1 - Easy) is cracked now :-) =-=-"
0040114A  |. FF35 BC314000  PUSH DWORD PTR DS:[4031BC]               ; |hWnd = 00020360 (class='Static',parent=00580166)
00401150  |. E8 9F000000    CALL <JMP.&user32.SetWindowTextA>        ; \SetWindowTextA
00401155  |. EB 27          JMP SHORT keyfilem.0040117E
00401157  |> 6A 40          PUSH 40                                  ; /Style = MB_OK|MB_ICONASTERISK|MB_APPLMODAL


Seems to be good, but as you can see, below you will find another 
message (with info about "level2") as well as few other interesting
CALLs. Check it out:

00401155  |. EB 27          JMP SHORT keyfilem.0040117E
00401157  |> 6A 40          PUSH 40                                  ; /Style = MB_OK|MB_ICONASTERISK|MB_APPLMODAL
00401159  |. 68 23314000    PUSH keyfilem.00403123                   ; |Title = "Yeah!"
0040115E  |. 68 29314000    PUSH keyfilem.00403129                   ; |Text = "CrackME solved. Good! Did it without patching?
Nice! Now the next crackme! Greetz.. TDC from REM http://reversemasters.gtp-community.com/"
00401163  |. FF35 C0314000  PUSH DWORD PTR DS:[4031C0]               ; |hOwner = 00580166 ('TDC KeyFileME, CrackME #9',class='#32770')
00401169  |. E8 7A000000    CALL <JMP.&user32.MessageBoxA>           ; \MessageBoxA
0040116E  |. 68 F3304000    PUSH keyfilem.004030F3                   ; /Text = "=-=- Level (2 - Harder) is cracked now :-) =-=-"
00401173  |. FF35 BC314000  PUSH DWORD PTR DS:[4031BC]               ; |hWnd = 00020360 (class='Static',parent=00580166)
00401179  |. E8 76000000    CALL <JMP.&user32.SetWindowTextA>        ; \SetWindowTextA
0040117E  |> 68 C5304000    PUSH keyfilem.004030C5                   ;  ASCII "=-=- Level (1 - Easy) is cracked now :-) =-=-"
00401183  |. E8 1F000000    CALL keyfilem.004011A7
00401188  |. 68 F3304000    PUSH keyfilem.004030F3                   ;  ASCII "=-=- Level (2 - Harder) is cracked now :-) =-=-"
0040118D  |. E8 15000000    CALL keyfilem.004011A7
00401192  |. 68 29314000    PUSH keyfilem.00403129                   ;  ASCII "CrackME solved. Good! Did it without patching?
Nice! Now the next crackme! Greetz.. TDC from REM http://reversemasters.gtp-community.com/"
00401197  |. E8 0B000000    CALL keyfilem.004011A7
0040119C  |. 68 23314000    PUSH keyfilem.00403123                   ;  ASCII "Yeah!"
004011A1  |. E8 01000000    CALL keyfilem.004011A7
004011A6  \. C3             RETN

Cool. Few F8's and you will land here:
0040117E  |> 68 C5304000    PUSH keyfilem.004030C5                   ;  ASCII "=-=- Level (1 - Easy) is cracked now :-) =-=-"

In my opinion it's an indication of a goodboy message.
Probably 1st one, but we will see it later. Step forward.

Next CALL will bring us here:
004011A7  /$ 55             PUSH EBP
004011A8  |. 8BEC           MOV EBP,ESP
004011AA  |. 51             PUSH ECX
004011AB  |. 52             PUSH EDX
004011AC  |. 8B55 08        MOV EDX,DWORD PTR SS:[EBP+8]
004011AF  |> 8A0A           /MOV CL,BYTE PTR DS:[EDX]
004011B1  |. 84C9           |TEST CL,CL
004011B3  |. 74 08          |JE SHORT keyfilem.004011BD
004011B5  |. 80F1 30        |XOR CL,30
004011B8  |. 880A           |MOV BYTE PTR DS:[EDX],CL
004011BA  |. 42             |INC EDX
004011BB  |.^EB F2          \JMP SHORT keyfilem.004011AF
004011BD  |> 5A             POP EDX
004011BE  |. 59             POP ECX
004011BF  |. C9             LEAVE
004011C0  \. C2 0400        RETN 4


As you can see there is a loop. It seems that the loop
will only present a message we already found before.

Step forward again and we're here now:
7E37414F   FF15 FC113C7E    CALL DWORD PTR DS:[7E3C11FC]             ; uxtheme.5B1EB447

(Yeah, you should find it (and why;)) and prepare a breakpoint.
Now hit F9 and you will see a window from the app informing us 
that the level1 is already cracked. Cool. Next.)


There is still level2 perpared by the author, so we need to 
take a look of it too:

I decided to set bp on checking function, see the code below:

0040112E  |. 83F8 02        CMP EAX,2
00401131  |. 74 24          JE SHORT keyfilem.00401157
00401133  |. 68 B5304000    PUSH keyfilem.004030B5                   ; /Text = "Not yet cracked"
00401138  |. FF35 BC314000  PUSH DWORD PTR DS:[4031BC]               ; |hWnd = 000400BE (class='Static',parent=000B00D6)
0040113E  |. E8 B1000000    CALL <JMP.&user32.SetWindowTextA>        ; \SetWindowTextA
00401143  |. EB 39          JMP SHORT keyfilem.0040117E
00401145  |> 68 C5304000    PUSH keyfilem.004030C5                   ; /Text = "=-=- Level (1 - Easy) is cracked now :-) =-=-"
0040114A  |. FF35 BC314000  PUSH DWORD PTR DS:[4031BC]               ; |hWnd = 000400BE (class='Static',parent=000B00D6)
00401150  |. E8 9F000000    CALL <JMP.&user32.SetWindowTextA>        ; \SetWindowTextA
00401155  |. EB 27          JMP SHORT keyfilem.0040117E
00401157  |> 6A 40          PUSH 40                                  ; /Style = MB_OK|MB_ICONASTERISK|MB_APPLMODAL
00401159  |. 68 23314000    PUSH keyfilem.00403123                   ; |Title = "Yeah!"
0040115E  |. 68 29314000    PUSH keyfilem.00403129                   ; |Text = "CrackME solved. Good! Did it without patching?
Nice! Now the next crackme! Greetz.. TDC from REM http://reversemasters.gtp-community.com/"
00401163  |. FF35 C0314000  PUSH DWORD PTR DS:[4031C0]               ; |hOwner = 000B00D6 ('TDC KeyFileME, CrackME #9',class='#32770')
00401169  |. E8 7A000000    CALL <JMP.&user32.MessageBoxA>           ; \MessageBoxA


Ok. Now, there are of course few different ways to solve this. 
I decided to change JE located at 
00401131  |. 74 24          JE SHORT keyfilem.00401157

to JNE of course. To see the results hit F9:
(by the way, changed code should look like this one below)

0040112E  |. 83F8 02        CMP EAX,2
00401131     75 24          JNZ SHORT keyfilem.00401157

Goodboy message achieved again. 
 
Next.


---------------------------------------------------------------------------
	  #01.06 - Unpacking NFOReader.exe
---------------------------------------------------------------------------

Checking the app with PEiD, we'll find signature:
"UPX 0.89.6 - 1.02 / 1.05 - 2.90 -> Markus & Laszlo"

Let's open it in OllyDbg. We are here:

00410400 > 60               PUSHAD
00410401   BE 00904000      MOV ESI,NFOReade.00409000

We will use a trick with finding changed ESP. Let's hit F7.
ESP is changed, right-click to follow in dump. Now let's set
a breakpoint like we did it before (for 1st 4 bytes) and hit F9:

We landed here:
0041054F  -E9 AC0AFFFF      JMP NFOReade.00401000

F7 again to JuMP and we are here:
00401000   6A 00            PUSH 0
00401002   E8 A7050000      CALL NFOReade.004015AE                   ; JMP to kernel32.GetModuleHandleA
00401007   A3 00304000      MOV DWORD PTR DS:[403000],EAX
0040100C   E8 40000000      CALL NFOReade.00401051


I assumed that we already unpacked the binary, so we can dump it
like before (right-click, dump debugged process). Leave
'rebuilding imports'. Now during our small verification with 
PEiD, you should see:
"MASM32 / TASM32"

App is working fine, so I think the job is done here.,

Next.


  
===========================================================================  
  02. E-kur 

---------------------------------------------------------------------------
      #02.00 - DaXXoR2.ExE
---------------------------------------------------------------------------

Open the app in PEiD to get some signatures:
"ASPack 2.12 -> Alexey Solodovnikov"

Ok, cool. Now (after some "manual unpacking ASPack 2.12" 
tutorials found on net), we landed here:

004C5001 > 60               PUSHAD
004C5002   E8 03000000      CALL DaXXoR2.004C500A
004C5007  -E9 EB045D45      JMP 45A954F7

The difference for me here, was that we are looking (not
for the change in ESP this time but) for ECX register
and the value holded there: right-click and follow in dump:

We should see something like "0012FFB0  9C DC 90 7C". Let's set
a breakpoint for those 1st 4bytes and hit F9.

We landed here:
004C53B0   75 08            JNZ SHORT DaXXoR2.004C53BA
004C53B2   B8 01000000      MOV EAX,1

Hit F7 (3 times) and you will find yourself here:
0040136C   EB 10            JMP SHORT DaXXoR2.0040137E
0040136E   66:623A          BOUND DI,DWORD PTR DS:[EDX]
00401371   43               INC EBX
00401372   2B2B             SUB EBP,DWORD PTR DS:[EBX]

"Dump debugged process" (with all imports rebuilded this time),
and open dumped.exe in PEiD again:
"Borland C++ 1999"

Let's analyze the new app now. Open dumped file in Olly again.
We landed here:

0040136C > $ EB 10          JMP SHORT DaXXoR2-.0040137E
0040136E     66             DB 66                                    ;  CHAR 'f'
0040136F     62             DB 62                                    ;  CHAR 'b'
00401370     3A             DB 3A                                    ;  CHAR ':'
00401371     43             DB 43                                    ;  CHAR 'C'
00401372     2B             DB 2B                                    ;  CHAR '+'
00401373     2B             DB 2B                                    ;  CHAR '+'
00401374     48             DB 48                                    ;  CHAR 'H'
00401375     4F             DB 4F                                    ;  CHAR 'O'
00401376     4F             DB 4F                                    ;  CHAR 'O'
00401377     4B             DB 4B                                    ;  CHAR 'K'
00401378     90             NOP
00401379     E9             DB E9
0040137A   . 98             CWDE
0040137B   . D047 00        ROL BYTE PTR DS:[EDI],1
0040137E   > A1 8BD04700    MOV EAX,DWORD PTR DS:[47D08B]


As you can see Olly did not analyzed the code yet, so 
let's do it right now (right-click, analyze):

0040136C > $ EB 10          JMP SHORT DaXXoR2-.0040137E
0040136E   . 66:623A        BOUND DI,DWORD PTR DS:[EDX]
00401371   . 43             INC EBX
00401372   . 2B2B           SUB EBP,DWORD PTR DS:[EBX]
00401374   . 48             DEC EAX
00401375   . 4F             DEC EDI
00401376   > 4F             DEC EDI
00401377   . 4B             DEC EBX
00401378   . 90             NOP
00401379   .-E9 98D04700    JMP 0087E416
0040137E   > A1 8BD04700    MOV EAX,DWORD PTR DS:[47D08B]
00401383   . C1E0 02        SHL EAX,2
00401386   . A3 8FD04700    MOV DWORD PTR DS:[47D08F],EAX
0040138B   . 52             PUSH EDX


Better.

We can run the app now (to analyze it on the fly) or we can (for example)
search for some strings possible to locate in the app. I decided to try 
solution "number 2" and that's how I found few strings like 'thanks',
'registered' and so on. Now it should be easier to verify where 
we need to make an update ;] 

Original code looks like this:
00401D8D  |. E8 66A00700    CALL DaXXoR2-.0047BDF8
00401D92  |. 84C0           TEST AL,AL
00401D94  |. 74 4C          JE SHORT DaXXoR2-.00401DE2
00401D96  |. A1 406D4800    MOV EAX,DWORD PTR DS:[486D40]
00401D9B  |. 6A 40          PUSH 40
00401D9D  |. B9 0FD24700    MOV ECX,DaXXoR2-.0047D20F                ;  ASCII "Thank you"
00401DA2  |. BA 05D24700    MOV EDX,DaXXoR2-.0047D205                ;  ASCII "Activated"
00401DA7  |. 8B00           MOV EAX,DWORD PTR DS:[EAX]
00401DA9  |. E8 829F0700    CALL DaXXoR2-.0047BD30
00401DAE  |. 66:C745 B8 800>MOV WORD PTR SS:[EBP-48],80
00401DB4  |. BA 19D24700    MOV EDX,DaXXoR2-.0047D219                ;  ASCII "KeygenMe (Registered)"
00401DB9  |. 8D45 CC        LEA EAX,DWORD PTR SS:[EBP-34]
00401DBC  |. E8 7F9F0700    CALL DaXXoR2-.0047BD40
00401DC1  |. FF45 C4        INC DWORD PTR SS:[EBP-3C]
00401DC4  |. 8B10           MOV EDX,DWORD PTR DS:[EAX]
00401DC6  |. A1 006F4800    MOV EAX,DWORD PTR DS:[_Form1]
00401DCB  |. E8 D0260600    CALL DaXXoR2-.004644A0
00401DD0  |. FF4D C4        DEC DWORD PTR SS:[EBP-3C]
00401DD3  |. 8D45 CC        LEA EAX,DWORD PTR SS:[EBP-34]
00401DD6  |. BA 02000000    MOV EDX,2
00401DDB  |. E8 D49F0700    CALL DaXXoR2-.0047BDB4
00401DE0  |. EB 2E          JMP SHORT DaXXoR2-.00401E10
00401DE2  |> 66:C745 B8 140>MOV WORD PTR SS:[EBP-48],14
00401DE8  |. EB 0E          JMP SHORT DaXXoR2-.00401DF8
00401DEA  |> 66:C745 B8 140>MOV WORD PTR SS:[EBP-48],14
00401DF0  |. EB 06          JMP SHORT DaXXoR2-.00401DF8
00401DF2  |> 66:C745 B8 140>MOV WORD PTR SS:[EBP-48],14
00401DF8  |> A1 406D4800    MOV EAX,DWORD PTR DS:[486D40]
00401DFD  |. 6A 10          PUSH 10
00401DFF  |. B9 48D24700    MOV ECX,DaXXoR2-.0047D248                ;  ASCII "Wrong Serial!"
00401E04  |. BA 2FD24700    MOV EDX,DaXXoR2-.0047D22F                ;  ASCII "Well now you've done it!"
00401E09  |. 8B00           MOV EAX,DWORD PTR DS:[EAX]
00401E0B  |. E8 209F0700    CALL DaXXoR2-.0047BD30
00401E10  |> FF4D C4        DEC DWORD PTR SS:[EBP-3C]

My first idea was to bp the address:
00401D92  |. 84C0           TEST AL,AL

Let's try it. After bp was set I started the app (F9).
New window was created, I clicked 'Go' to check the serial.

Here we will find a cool loop (waiting for our serial and check):

0045D1FD   > 33C0           XOR EAX,EAX
0045D1FF   . 55             PUSH EBP
0045D200   . 68 1DD24500    PUSH DaXXoR2-.0045D21D
0045D205   . 64:FF30        PUSH DWORD PTR FS:[EAX]
0045D208   . 64:8920        MOV DWORD PTR FS:[EAX],ESP
0045D20B   . 8B45 FC        MOV EAX,DWORD PTR SS:[EBP-4]
0045D20E   . E8 D1FDFFFF    CALL DaXXoR2-.0045CFE4
0045D213   . 33C0           XOR EAX,EAX
0045D215   . 5A             POP EDX
0045D216   . 59             POP ECX
0045D217   . 59             POP ECX
0045D218   . 64:8910        MOV DWORD PTR FS:[EAX],EDX
0045D21B   . EB 15          JMP SHORT DaXXoR2-.0045D232
0045D21D   .^E9 7E65FDFF    JMP DaXXoR2-.004337A0
0045D222   . 8B55 FC        MOV EDX,DWORD PTR SS:[EBP-4]
0045D225   . 8B45 FC        MOV EAX,DWORD PTR SS:[EBP-4]
0045D228   . E8 4B000000    CALL DaXXoR2-.0045D278
0045D22D   . E8 D668FDFF    CALL DaXXoR2-.00433B08
0045D232   > 8B45 FC        MOV EAX,DWORD PTR SS:[EBP-4]
0045D235   . 80B8 9C000000 >CMP BYTE PTR DS:[EAX+9C],0
0045D23C   .^74 BF          JE SHORT DaXXoR2-.0045D1FD

After a while it looks like we need to change one thing here:

0045CF5F     E8 CEF70100    CALL <JMP.&USER32.PeekMessageA>
0045CF64  |. 85C0           TEST EAX,EAX
0045CF66     75 75          JNZ SHORT DaXXoR2-.0045CFDD
0045CF68  |. B3 01          MOV BL,1
0045CF6A  |. 837F 04 12     CMP DWORD PTR DS:[EDI+4],12

From JZ we will move to JNZ. Now the goodboy message should appear.
Hm. no. :) So let's change it (in still opened Olly-windows) back
to JZ (what will appear as JE in my case): logically we are back 
'to the same' but after you will now click for the crackme-window,
message is different:

"DaXXoR #11"

Seems that we're on the good way now.


---------------------------------------------------------------------------
      #02.01 -   due-cm1.exe
---------------------------------------------------------------------------

Ok, we're here now. Inside the opened due-cm1.exe in OllyDbg.

After a while, we can spot the place when the program will compare
our input with the 'valid input' (so proper serial/key).

Below you will find it:

00401115   . 74 18          JE SHORT due-cm1.0040112F                           ;  it is not equal, pass
00401117   . 80B0 F7204000 >XOR BYTE PTR DS:[EAX+4020F7],43                     ;  xor i,43 
0040111E   . 80B0 F7204000 >XOR BYTE PTR DS:[EAX+4020F7],1E                     ;  ...
00401125   . 80B0 F7204000 >XOR BYTE PTR DS:[EAX+4020F7],55                     ;  ...
0040112C   . 40             INC EAX
0040112D   .^E2 DF          LOOPD SHORT due-cm1.0040110E                        ;  loop is taken until we will xor all chars in serial

My cool comments are also here (from one of the debugging sessions,
maybe you will find it useful too).

If you do not understand those lines of ASM I would really recommend you
to stop here, and read (again?) Lena's Tutorial, as well as some information
about the XOR instruction (and it's purpose).

Let's say, int pseudo-code it will look like this:
- (our) string (key/serial) is copied to memory
- for each character in the string, do: 
-    xor char,43 => char2
-    xor char2, 1e => char3
-    xor char3, 55 => char4
- try next char until the end.

What I've done to understand the algoritm:
- create a python script to XOR char-by-char
- verify results (of xoring characters) with comparsion done by the program

While running the app, we will see this:

0040114C   > 6A 24          PUSH 24                                             ; /jumped here after the xor-loop;means: now our serialinput is xored. xored values must be equal afaik
0040114E   . 68 D3204000    PUSH due-cm1.004020D3                               ; |xored valid serial
00401153   . 68 F7204000    PUSH due-cm1.004020F7                               ; |xored our serial
00401158   . E8 64000000    CALL due-cm1.004011C1                               ; \here should have been cmp

So at 0040114E is probably the XORed valid serial, and at
00401153 we will find our (XORed too) serial.

Next, here we will find our "comparsion" loop:
004011C1  /$ C8 000000      ENTER 0,0                                           ;  our tricky loop; create a stack frame
004011C5  |. B8 01000000    MOV EAX,1                                           ;  EAX=1
004011CA  |. 8B7D 08        MOV EDI,DWORD PTR SS:[EBP+8]                        ;  send our xored-serial to edi
004011CD  |. 8B75 0C        MOV ESI,DWORD PTR SS:[EBP+C]
004011D0  |. 8B4D 10        MOV ECX,DWORD PTR SS:[EBP+10]
004011D3  |. F3:A6          REPE CMPS BYTE PTR ES:[EDI],BYTE PTR DS:[ESI]
004011D5  |. 67:E3 05       JCXZ SHORT due-cm1.004011DD                         ;  Jump if eCX is Zero
004011D8  |. B8 00000000    MOV EAX,0
004011DD  |> C9             LEAVE                                               ;  destroy stack frame
004011DE  \. C2 0C00        RETN 0C

Now, we can see that there is a hint in:
004011D3  |. F3:A6          REPE CMPS BYTE PTR ES:[EDI],BYTE PTR DS:[ESI]

ECX=00000024 (decimal 36.)
DS:[ESI]=[004020D3]=7B ('{') 
ES:[EDI]=[004020F7]=79 ('y')

Our serial-key was qqqqqqqq (8x q character). XORed (3 times) is now equal 
to something else.

F7 and next instruction is:
004011D5  |. 67:E3 05       JCXZ SHORT due-cm1.004011DD                         ;  Jump if eCX is Zero

JCXZ is Jump if ECX is not ZERO. In our case (after F7),
ECX = 00000023 so we will jump directly to LEAVE. Now
(F7) we will MOVe 0 to EAX. After few more steps we
will return to 115D:
0040115D   . 83F8 00        CMP EAX,0

If the comparsion will be equal, we will land in another JUMP:
00401160   . 74 1B          JE SHORT due-cm1.0040117D

which is:
0040117D   > 68 00200000    PUSH 2000                                           ; /Style = MB_OK|MB_TASKMODAL
00401182   . 68 01204000    PUSH due-cm1.00402001                               ; |Title = "Duelist's Crackme #1"
00401187   . 68 63204000    PUSH due-cm1.00402063                               ; |Text = "You've entered an invalid unlock code. Please try again!"
0040118C   . 6A 00          PUSH 0                                              ; |hOwner = NULL
0040118E   . E8 5C010000    CALL <JMP.&USER32.MessageBoxA>                      ; \MessageBoxA

So 'badboy'.

Pseudo-code again:
- if the first character will not be equal, go to exit
- else: go to next character to compare.

So as far as I understand this, now I need to create a code to XOR (3 times)
each 'letter' in my serial/key and compare results to 'base' (original char).

We can do that, as well as the other thing: we can try to reverse the algorithm
and use it backwards. I mean that if we already know what is the XORed key-char,
we can try to reverse it. I tried to do that below.

Example code to check 1st character:
---<code>---
#!/usr/bin/env python

# step: 3-> # 00401117   . 80B0 F7204000 >XOR BYTE PTR DS:[EAX+4020F7],43                     ;  xor i,43 ?
# step: 2-> # 0040111E   . 80B0 F7204000 >XOR BYTE PTR DS:[EAX+4020F7],1E                     ;  ...
# step: 1-> # 00401125   . 80B0 F7204000 >XOR BYTE PTR DS:[EAX+4020F7],55                     ;  ...

a = '79' # xored c -- q, results xored3times as 71
key1 = '55' # key 3: 55 # 43
xor_result = int(a, 16) ^ int(key1, 16)

print '[1] character: ', a
c = xor_result
print '    input: %s --> XOR by %s --> XORed to : %x' % (a, key1, xor_result)

# xor b:
input2 = xor_result
key2 = '1E'
xor_result2 = int(input2) ^ int(key2, 16)
print '    input: %x --> XOR by %s --> XORed to : %x' % (input2, key2, xor_result2)


# xor a:
input3 = xor_result2
key3 = '43'
xor_result3 = int(input3) ^ int(key3, 16)
print '    input: %x --> XOR by %s --> XORed to : %x' % (input3, key3, xor_result3)
---</code>---

After you'll run it, results should be similar to those below:

---<code>---
 C:\Python27>python.exe keygen2.py
[1] character:  79
    input: 79 --> XOR by 55 --> XORed to : 2c
    input: 2c --> XOR by 1E --> XORed to : 32
    input: 32 --> XOR by 43 --> XORed to : 71

C:\Python27>

---</code>---

So far so good. Let's try to reverse it now, but this time
our 'i'-value will be the one from CoMPare from the asm-code.
To find correct value I will start here:

DS:[ESI]=[004020D3]=7B ('{') 
ES:[EDI]=[004020F7]=79 ('y')

So it seems that our serial-input (8x 'q') will be
compared as (each letter) 79 during the (XORed) comparsion.

Well, the goal will be to find character which xored 3 times
will produce 7B as an output. Let's do it:

After a while you will be able to create a list with 
the whole range of xored codes:

---<code>---
#!/usr/bin/env python

# step: 3-> # 00401117   . 80B0 F7204000 >XOR BYTE PTR DS:[EAX+4020F7],43                     ;  xor i,43 ?
# step: 2-> # 0040111E   . 80B0 F7204000 >XOR BYTE PTR DS:[EAX+4020F7],1E                     ;  ...
# step: 1-> # 00401125   . 80B0 F7204000 >XOR BYTE PTR DS:[EAX+4020F7],55                     ;  ...

i=0
while i != 255:
  a = i # xored c -- q, results xored3times as 71

  bb = str(a)
  
  key1 = '55' # key 3: 55 # 43
  xor_result = int(bb, 16) ^ int(key1, 16)
  
  print '[1] character: ', a
  c = xor_result
  print '    input: %s --> XOR by %s --> XORed to : %x' % (a, key1, xor_result)
  
  # xor b:
  input2 = xor_result
  key2 = '1E'
  xor_result2 = int(input2) ^ int(key2, 16)
  print '    input: %x --> XOR by %s --> XORed to : %x' % (input2, key2, xor_result2)
  
  # xor a:
  input3 = xor_result2
  key3 = '43'
  xor_result3 = int(input3) ^ int(key3, 16)
  print '    input: %x --> XOR by %s --> XORed to : %x' % (input3, key3, xor_result3)

  # next character...
  i+=1
---</code>---
...and so on.

So assuming it's all right, to get 7B we need 73:
1] character:  73
    input: 73 --> XOR by 55 --> XORed to : 26
    input: 26 --> XOR by 1E --> XORed to : 38
    input: 38 --> XOR by 43 --> XORed to : 7b
	
Let's try it:

C:\Python27>python
Python 2.7.1 (r271:86832, Nov 27 2010, 18:30:46) [MSC v.1500 32 bit (Intel)] on
win32
Type "help", "copyright", "credits" or "license" for more information.
>>> i = '7b'
>>> i.decode('hex')
'{'
>>>

Indeed, seems that this is the case. Let's analyze the other values
from the XOR-algorythm, maybe we will find the rest of the key.

After re-running the crackme, now I used the key:
{AAAAAAA

Let's check it:
  1:7b compare to 73
    ECX=00000024 (decimal 36.)
    DS:[ESI]=[004020D3]=7B ('{')
    ES:[EDI]=[004020F7]=73 ('s')

F7 and we are in badboy... again:
ECX=00000024 (decimal 36.)
DS:[ESI]=[004020D3]=7B ('{')
ES:[EDI]=[004020F7]=7B ('{')

F7 to:	
  2-char:
ECX=00000023 (decimal 35.)
DS:[ESI]=[004020D4]=61 ('a')
ES:[EDI]=[004020F8]=49 ('I')
  
You should see it now. :)

F7, and again: (now we'll use this key:sIAAAAAA):  
  3-char:
ECX=00000023 (decimal 35.)
DS:[ESI]=[004020D4]=61 ('a')
ES:[EDI]=[004020F8]=41 ('A')

...means 'again'. ;) Key:siAAAAAA and we're here:
ECX=00000023 (decimal 35.)
DS:[ESI]=[004020D4]=61 ('a')
ES:[EDI]=[004020F8]=61 ('a')
  
  4-char:
ECX=00000022 (decimal 34.)
DS:[ESI]=[004020D5]=65 ('e')
ES:[EDI]=[004020F9]=59 ('Y')

Again, key: sieAAAAA:
ECX=00000022 (decimal 34.)
DS:[ESI]=[004020D5]=65 ('e') -- app key (compared to)
ES:[EDI]=[004020F9]=6D ('m') -- our key

Again. Key this time will be: simAAAAA. Now we're here:

  5-char:
ECX=00000021 (decimal 33.)
DS:[ESI]=[004020D6]=78 ('x')
ES:[EDI]=[004020FA]=49 ('I')

Damn... let's modify keygen2.py again. Now it will present:

C:\Python27>python.exe keygen2.py
[1] character:  78
    input: 78 --> XOR by 55 --> XORed to : 2d
    input: 2d --> XOR by 1E --> XORed to : 33
    input: 33 --> XOR by 43 --> XORed to : 70

C:\Python27>

unhex(70) and you will find 'p' value. New key to try: simpAAAA

  6-char:  
ECX=00000020 (decimal 32.)
DS:[ESI]=[004020D7]=64 ('d')
ES:[EDI]=[004020FB]=49 ('I')

Good, another character to dexor. Verifying:

C:\Python27>python.exe keygen2.py
[1] character:  64
    input: 64 --> XOR by 55 --> XORed to : 31
    input: 31 --> XOR by 1E --> XORed to : 2f
    input: 2f --> XOR by 43 --> XORed to : 6c

C:\Python27>

6c stands for 'l', let's find out (current key is: simplAAA):
ECX=0000001F (decimal 31.)
DS:[ESI]=[004020D8]=6D ('m')
ES:[EDI]=[004020FC]=49 ('I')

Looks like there is another character in the serial. Checking...

C:\Python27>python.exe keygen2.py
[1] character:  6d
    input: 6d --> XOR by 55 --> XORed to : 38
    input: 38 --> XOR by 1E --> XORed to : 26
    input: 26 --> XOR by 43 --> XORed to : 65

65 will be 'e'. Verifying (with the current key: simpleAA):

ECX=0000001E (decimal 30.)
DS:[ESI]=[004020D9]=26 ('&')
ES:[EDI]=[004020FD]=49 ('I')

Another character, cool. Checking with current key: simple.:

ECX=0000001D (decimal 29.)
DS:[ESI]=[004020DA]=6B ('k')
ES:[EDI]=[004020FE]=00

Now checking with the key: simple.c. New letter again:
ECX=0000001C (decimal 28.)
DS:[ESI]=[004020DB]=7A ('z')
ES:[EDI]=[004020FF]=00

Key now:simple.crXXXXX, results:
ECX=0000001B (decimal 27.)
DS:[ESI]=[004020DC]=69 ('i')
ES:[EDI]=[00402100]=50 ('P')

New letter :) I think at this stage you should probably be ready 
to guess the password/serial/key but we will finish it like before,
so... again, new key is: simple.craXXXX, verifying:

ECX=0000001A (decimal 26.)
DS:[ESI]=[004020DD]=6B ('k')
ES:[EDI]=[00402101]=50 ('P')

New key: simple.cracXXX. Checking:
ECX=00000019 (decimal 25.)
DS:[ESI]=[004020DE]=63 ('c')
ES:[EDI]=[00402102]=50 ('P')

Key: simple.crackXX, checking:

ECX=00000018 (decimal 24.)
DS:[ESI]=[004020DF]=65 ('e')
ES:[EDI]=[00402103]=50 ('P')

So again... new letter for us is: m, new key: simple.crackmX.
Checking:

ECX=00000017 (decimal 23.)
DS:[ESI]=[004020E0]=6D ('m')
ES:[EDI]=[00402104]=50 ('P')

New letter:e, checking with the key: simple.crackme:

ECX=00000016 (decimal 22.)
DS:[ESI]=[004020E1]=26 ('&')
ES:[EDI]=[00402105]=00

One more: '.', checking with the new key: simple.crackme.:
ECX=00000015 (decimal 21.)
DS:[ESI]=[004020E2]=3C ('<')
ES:[EDI]=[00402106]=00

New char: 4, checking: simple.crackme.4:
ECX=00000014 (decimal 20.)
DS:[ESI]=[004020E3]=26 ('&')
ES:[EDI]=[00402107]=00

(Similar to the one before, so it will be a dot again, we will skip it
and move to another letter with the) key now: simple.crackme.4.:

ECX=00000013 (decimal 19.)
DS:[ESI]=[004020E4]=66 ('f')
ES:[EDI]=[00402108]=00

Key now: simple.crackme.4.n, checking:
ECX=00000012 (decimal 18.)
DS:[ESI]=[004020E5]=6D ('m')
ES:[EDI]=[00402109]=00

Key now: simple.crackme.4.ne, checking... and after a while
we are here with the working serial key: simple.crackme.4.newbies.,
so let's find out if there is something more used as the key...

ECX=0000000B (decimal 11.)
DS:[ESI]=[004020EC]=6A ('j')
ES:[EDI]=[00402110]=00


It'll be 'b', so: simple.crackme.4.newbies.b. Checking for new char:
ECX=0000000A (decimal 10.)
DS:[ESI]=[004020ED]=71 ('q')
ES:[EDI]=[00402111]=00

'y' - simple.crackme.4.newbies.by, next char:
Now: simple.crackme.4.newbies.by.

Next char:
ECX=00000008 (decimal 8.)
DS:[ESI]=[004020EF]=6C ('l')
ES:[EDI]=[00402113]=00

'd', so now the key looks like:
simple.crackme.4.newbies.by.d

Checking next letter:
ECX=00000007 (decimal 7.)
DS:[ESI]=[004020F0]=7D ('}')
ES:[EDI]=[00402114]=00

'u':simple.crackme.4.newbies.by.du.
Checking:
ECX=00000006 (decimal 6.)
DS:[ESI]=[004020F1]=6D ('m')
ES:[EDI]=[00402115]=00

'e':simple.crackme.4.newbies.by.due

Checking:
ECX=00000005 (decimal 5.)
DS:[ESI]=[004020F2]=64 ('d')
ES:[EDI]=[00402116]=00

'l':simple.crackme.4.newbies.by.duel

Checking:
ECX=00000004 (decimal 4.)
DS:[ESI]=[004020F3]=61 ('a')
ES:[EDI]=[00402117]=00

'i':simple.crackme.4.newbies.by.dueli

Checking:
ECX=00000003 (decimal 3.)
DS:[ESI]=[004020F4]=7B ('{')
ES:[EDI]=[00402118]=00

's':simple.crackme.4.newbies.by.duelis

Checking:
ECX=00000002 (decimal 2.)
DS:[ESI]=[004020F5]=7C ('|')
ES:[EDI]=[00402119]=00

't':simple.crackme.4.newbies.by.duelist

Checking, and now we're here:
00401160   . 74 1B          JE SHORT due-cm1.0040117D

F7 to step in...

00401160   . 74 1B          JE SHORT due-cm1.0040117D
00401162   . 68 00200000    PUSH 2000                                           ; /Style = MB_OK|MB_TASKMODAL
00401167   . 68 01204000    PUSH due-cm1.00402001                               ; |Title = "Duelist's Crackme #1"
0040116C   . 68 17204000    PUSH due-cm1.00402017                               ; |Text = "Congratulations! Please send your name/email/solution to duelist@beer.com!"
00401171   . 6A 00          PUSH 0                                              ; |hOwner = NULL
00401173   . E8 77010000    CALL <JMP.&USER32.MessageBoxA>                      ; \MessageBoxA

Yes, congratulations. I think now you are able to check some other crackmes.
Links to some (IMO) cool resources you will find in the next section below.

    Enjoy.
  
===========================================================================	  
  03. What's next
  
   [1] - www.google.com
   [2] - Fravia / +OCR / +HCU
   [3] - code610.blogspot.com
   [4] - tuts4you.com
   [5] - RTFM
   
===========================================================================
  04. Conclusion
  
"I awoke only to find that the rest of the world was still asleep."


===========================================================================
by enlil from Nippur (nippurteam gmail com) 06/06/17
===========================================================================
