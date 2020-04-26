

'''
  __author__ = b0nd
  ver 0.1, 31st Dec, 2012
 
  This script is meant to SSH to 3rd party server and dump directories from there to local directory
  It copies files unattended over SSH using a search pattern. Password login is attempted for SSH
  Other way to login could be - private key froma private key file or provided by an SSH agent (but I am not using that)
 
  Dependent Modules:
    paramiko - easy_install paramiko
    scheduler - pip install apscheduler
 
'''

import os, sys, datetime, time
import paramiko, md5
from apscheduler.scheduler import Scheduler
import smtplib
import fnmatch

os.system('clear')

hostIP = '10.91.1.132'                                 ## remote hostname where SSH server is running
port = 22
userName = 'b0nd'
passWord = 'I_will_have_to_kill_you_if_you_know_it'
schedulerMinutesCycle = 10                            ## Time in minutes for scheduler to cycle

dirLocal='/home/template/Desktop/research/Collector/iDownloads/'        ## Local directory to dump remote data into
dirRemoteUploads = "/var/www/imalsub/app/webroot/files/"            ## Remote directory to traverse to dump data from
dirRemoteProcessing = "/var/www/imalsub/app/webroot/iProcessing/"        ## Remote directory to
dirRemoteDistorted = "/var/www/imalsub/app/webroot/iDistorted"            ##

paramiko.util.log_to_file('/home/template/Desktop/research/Collector/iParamiko.log')


def callExit():
  #print "\n\tProbably script has confronted some issue"
  print "\n\t[+] Check logs; exiting at %s ..........\n" % datetime.datetime.now()
  sys.exit(1)
 
 
def sendErrorNotification(msg):
  sender = 'xyzDirDumper@some.com'
  receivers = ['me@gmail.com']
 
  message = """From: Collector Project <xyzDirDumper@some.com>
To: me <me@gmail.com>
MIME-Version: 1.0
Content-type: text/html
Subject: Master, Directory Dumper script confronted an issue
"""
  message += "Error Message:\n%s" % msg
 
  try:
    smtpObj = smtplib.SMTP('192.168.7.51', '2500')
    smtpObj.sendmail(sender, receivers, message)
    print "\n\t[+] Error Notification Mail Sent Successfully"
  except smtplib.SMTPException:
    print "\n\t[!] Error: unable to send error notification mail"

## sshClient.close()
## sftp = ssh.open_sftp(); sftp.chdir('path')


## Function to sftp directories from remote machine to local machine
def dumpDirectories(dirList):
 
  files_copied = 0
 
  try:
    print '\n\t[+] dumpDirectories - Re-establishing SSH connection to:', hostIP, port, '... to sftp directories'
    t = paramiko.Transport((hostIP, port))
    t.connect(username=userName, password=passWord)
    sftp = paramiko.SFTPClient.from_transport(t)

    tarDirList = []
    tarDirList.extend(dirList)                                ## copying dirList
    
    tarDirList[:] = [fname + '.tar' + '.gz' for fname in tarDirList]            ## appending .tar.gz to each entry in list
    #print "tarDirList: ", tarDirList
        
    for fname in tarDirList:
      localFile = os.path.join(dirLocal, fname)
      remoteFile = dirRemoteProcessing + fname
      
      #print '\n\t[+] Copying', remoteFile, 'to ', localFile
      print "\t\t[+] Copying remote file: %s" % fname
      sftp.get(remoteFile, localFile)
      files_copied += 1
           
    t.close()

  except Exception, e:
    print '*** Caught exception: %s: %s' % (e.__class__, e)
    try:
        t.close()
    except:
        pass
  print
  print '=' * 60
  print 'Total files copied:',files_copied
  print 'All operations complete!'
  print '=' * 60
  ## Add code here to delete files from remote directory once copy has been done successfully


## Function to SSH remote machine, tar dirList directories and move them under processing directory
def tarDirectories(dirList, sshClient):
  print "\n\t[+] Attempting to tar remote directories"
  stdin, stdout, stderr = sshClient.exec_command("mkdir -p %s" % dirRemoteProcessing)
  print "STDOUT tarDirectories: ", stdout.readlines()
  print "STDERR tarDirectories: ", stderr.readlines()
 
  dirListtar = []
 
  try:
    for dirName in dirList:
      ## tar each directory
      stdin, stdout, stderr = sshClient.exec_command("tar -zcf %s.tar.gz %s" % (dirRemoteUploads+dirName, dirRemoteUploads+dirName))
      ## move tar'ed directory under iProcessing directory    
      stdin, stdout, stderr = sshClient.exec_command("mv %s.tar.gz %s" % (dirRemoteUploads+dirName, dirRemoteProcessing))       
  except Exception, e:
    print "\n\t\t[!] Error tarDirectories: %s: %s" % (e.__class__, e)
    callExit()
    
  print"\t\t[+] Taring done"
 
 
## Function to SSH remote machine and perform following tasks:
  ## 1. Find those directories which are ready to be picked up (status=done in data.txt file in such directories signals readyness of directory)
def getDirList():
  print "\n" + '=' * 30 + " Inside dumpDir function " + '=' * 30
 
  try:
    print "\n\t[+] getDirList - Attempting to establish SSH connection to remote server", hostIP, port, '...'
    sshClient = paramiko.SSHClient()
    sshClient.load_system_host_keys()
    ##Use following to auto accept unknown keys - though security threat but paramiko doesn't support ECDSA yet. Check while deploying, if RSA is needed, remove following line
    sshClient.set_missing_host_key_policy(paramiko.AutoAddPolicy())            
    sshClient.connect(hostIP, username = userName, password = passWord)
    print "\t\t[+] SSH connection established"
   
  except paramiko.SSHException, e:
    print "\n\t\t[!] Error getDirList attempt to ssh - %s\n" % e
    callExit()
    
  print "\n\t[+] Obtaining list of new directories to be picked from remote server"
 
  try:
    stdin, stdout, stderr = sshClient.exec_command("grep -rl \"'status':'done'\" %s | awk 'BEGIN {FS=\"/\"} {print $(NF-1)}'" % dirRemoteUploads)
    ## -rl : recursively in sub-directories, find absolute file name.
    ## O/P: STDOUT:  ['/var/www/imalsub/app/webroot/files/50daa6ce-f9a4-4d5e-b7b7-07e4b3a286a0.1357138528/data.txt\n', '/var/www/imalsub/app/webroot/files/50e53ca8-ed5c-4e35-a2db-28fa0a5b0184.1357215419/data.txt\n']
    ## FS = / , $(NF-1) - pick second last entry. That makes outcome as - 50daa6ce-f9a4-4d5e-b7b7-07e4b3a286a0.1357138528 - and it's the directory name we wish to pick
  except Exception, e:
    print "\n\t\t[!] Error getDirList finding done directories: %s: %s" % (e.__class__, e)
    sshClient.close()
    callExit()
    
  dirListTemp = stdout.readlines()
      
  if dirListTemp == []:
    print "\t\t[+] Info - No new directory found, returning back to scheduler\n"
    print "STDERR: ", stderr.readlines()
    return
  else:
    print "\t\t[+] Info - Following new directories found\n"
    dirList = []
    for dirName in dirListTemp:                            ## striping newlines
      dirList.append(dirName.rstrip())
    
    for fname in dirList:
      print "\t\t\t", fname
    
    
  tarDirectories(dirList, sshClient)
  sshClient.close()
  dumpDirectories(dirList)
     
  print "done: "
    
 
def main():
  sched = Scheduler()
  sched.start()
 
  try:
    print "iAPT Directory Dumper scheduler running %s minutes cycle - executing at %s" % (schedulerMinutesCycle, datetime.datetime.now())
    sched.add_interval_job(getDirList, minutes=schedulerMinutesCycle)        ## hours, minutes, seconds, days
  except KeyboardInterrupt:
    callExit()
 
  #getDirList()
  #dirList =  ['50daa6ce-f9a4-4d5e-b7b7-07e4b3a286a0.1357138528', '50e53ca8-ed5c-4e35-a2db-28fa0a5b0184.1357215419']
  #dumpDirectories(dirList)
  while 1:
    time.sleep(1000)


if __name__ == '__main__':
  try: sys.exit(main())
  except KeyboardInterrupt:callExit()
     
