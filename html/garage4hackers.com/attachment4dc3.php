'''
	Created in April, 2016
	@author: b0nd
	Garage4hackers
'''
import os
import time
import sys
from pysphere import VIServer
from pysphere import VIException, VIApiException, FaultTypes
import argparse
from apscheduler.scheduler import Scheduler
import datetime

class bcolors:
    HEADER = '\033[95m'
    OKBLUE = '\033[94m'
    OKGREEN = '\033[92m'
    WARNING = '\033[93m'
    FAIL = '\033[91m'
    ENDC = '\033[0m'
    BOLD = '\033[1m'
    UNDERLINE = '\033[4m'
    
current_module = sys.modules[__name__]

## some global variables
schedulerHourCycle = 1
task = ''
status = ''
machine = ''
timer = 5
fuzzTimer = 60

listOfMachines = [
	'M2',
	'M3',
	'M4',
	'M5',
	]

## Profile of Machines & VMs hosted
M2 = {
	'Name':'Machine2',
	'ip':'192.168.1.60',
	'usernameESXi':'root',
	'passwordESXi':'esxi_host_password',
	'pathOfNodes':[
		"[datastore1] M2-N1/M2-N1.vmx",
		"[datastore1] M2-N2/M2-N2.vmx",
		"[datastore1] M2-N3/M2-N3.vmx",
		"[datastore1] M2-N4/M2-N4.vmx",
		"[datastore1] M2-N5/M2-N5.vmx",
		"[datastore1] M2-N6/M2-N6.vmx",
		"[datastore1] M2-N7/M2-N7.vmx",
		"[datastore1] M2-N8/M2-N8.vmx",
		],
	'usernameVMs':'john',
	'passwordVMs':'vms_password',
}
	
M3 = {
	'Name':'Machine3',
	'ip':'192.168.1.70',
	'usernameESXi':'root',
	'passwordESXi':'esxi_host_password',
	'pathOfNodes':[
		"[datastore1] M3-N1/M3-N1.vmx",
		"[datastore1] M3-N2/M3-N2.vmx",
		"[datastore1] M3-N3/M3-N3.vmx",
		"[datastore1] M3-N4/M3-N4.vmx",
		"[datastore1] M3-N5/M3-N5.vmx",
		"[datastore1] M3-N6/M3-N6.vmx",
		"[datastore1] M3-N7/M3-N7.vmx",
		"[datastore1] M3-N8/M3-N8.vmx",
		],
	'usernameVMs':'peter',
	'passwordVMs':'vms_password',
}
	
M4 = {
	'Name':'Machine4',
	'ip':'192.168.1.80',
	'usernameESXi':'root',
	'passwordESXi':'esxi_host_password',
	'pathOfNodes':[
		"[datastore1] M4-11-N1/M4-11-N1.vmx",
		"[datastore1] M4-11-N2/M4-11-N2.vmx",
		"[datastore1] M4-11-N3/M4-11-N3.vmx",
		"[datastore1] M4-11-N4/M4-11-N4.vmx",
		"[datastore1] M4-11-N5/M4-11-N5.vmx",
		"[datastore1] M4-11-N6/M4-11-N6.vmx",
		"[datastore1] M4-11-N7/M4-11-N7.vmx",
		"[datastore1] M4-11-N8/M4-11-N8.vmx",
		],
	'usernameVMs':'peter',
	'passwordVMs':'vms_password',
}

M5 = {
	'Name':'Machine4',
	'ip':'192.168.1.80',
	'usernameESXi':'root',
	'passwordESXi':'esxi_host_password',
	'pathOfNodes':[
		"[datastore1] M4-N1/M4-N1.vmx",
		"[datastore1] M4-N2/M4-N2.vmx",
		"[datastore1] M4-N3/M4-N3.vmx",
		"[datastore1] M4-N4/M4-N4.vmx",
		"[datastore1] M4-N5/M4-N5.vmx",
		"[datastore1] M4-N6/M4-N6.vmx",
		"[datastore1] M4-N7/M4-N7.vmx",
		"[datastore1] M4-N8/M4-N8.vmx",
		],
	'usernameVMs':'peter',
	'passwordVMs':'vms_password',
}


def getStatusAllVMs():
	print "\n\n\t=============== STATUS of VMs ==============="

	for machine in listOfMachines:
		name = getattr(current_module, machine)['Name']
		ip = getattr(current_module, machine)['ip']
		usernameESXi = getattr(current_module, machine)['usernameESXi']
		passwordESXi = getattr(current_module, machine)['passwordESXi']
		nodes = getattr(current_module, machine)['pathOfNodes']
				
		server = VIServer()
		print "\n\t\t[*] %s" % name
		server.connect(ip, usernameESXi, passwordESXi)
		
		for node in nodes:
			vm = server.get_vm_by_path(node)
			print "\t\t\t[*] %s - %s" % (node.split("/")[0].split(" ")[1], vm.get_status())
		
		server.disconnect()

def getCurrentStatus(nodes, server):
	print "\n\t\t\t[*] Status After Task Completion"
	time.sleep(timer)
	for node in nodes:
		vm = server.get_vm_by_path(node)
		print "\t\t\t\t[*] %s - %s" % (node.split("/")[0].split(" ")[1], vm.get_status())

def startAllVMs():
	print "\n\t=============== Powering ON all VMs ==============="

	for machine in listOfMachines:
		name = getattr(current_module, machine)['Name']
		ip = getattr(current_module, machine)['ip']
		usernameESXi = getattr(current_module, machine)['usernameESXi']
		passwordESXi = getattr(current_module, machine)['passwordESXi']
		nodes = getattr(current_module, machine)['pathOfNodes']
				
		server = VIServer()
		print "\n\t\t[*] %s" % name
		server.connect(ip, usernameESXi, passwordESXi)
		
		for node in nodes:
			vm = server.get_vm_by_path(node)
			if vm.get_status() != 'POWERED ON':
				print "\t\t\t[*] Powering ON - %s" % (node.split("/")[0].split(" ")[1])
				vm.power_on()
				time.sleep(fuzzTimer)
			else:
				print bcolors.WARNING + "\t\t\t[*] Already ON? - %s" % (node.split("/")[0].split(" ")[1]) + bcolors.ENDC
		
		getCurrentStatus(nodes, server)
		server.disconnect()

def rebootAllVMs():
	print "\n\t=============== Rebooting all VMs ==============="

	for machine in listOfMachines:
		name = getattr(current_module, machine)['Name']
		ip = getattr(current_module, machine)['ip']
		usernameESXi = getattr(current_module, machine)['usernameESXi']
		passwordESXi = getattr(current_module, machine)['passwordESXi']
		nodes = getattr(current_module, machine)['pathOfNodes']
				
		server = VIServer()
		print "\n\t\t[*] %s" % name
		server.connect(ip, usernameESXi, passwordESXi)
		
		for node in nodes:
			vm = server.get_vm_by_path(node)
			if vm.get_status() == 'POWERED ON':
				print "\t\t\t[*] Rebooting - %s" % (node.split("/")[0].split(" ")[1])
				vm.reboot_guest()
				time.sleep(fuzzTimer)
			else:
				print bcolors.WARNING + "\t\t\t[*] %s - Not Powered On" % (node.split("/")[0].split(" ")[1]) + bcolors.ENDC

		getCurrentStatus(nodes, server)
		server.disconnect()
		
def shutdownAllVMs():
	print "\n\t=============== Shuting down all VMs ==============="

	for machine in listOfMachines:
		name = getattr(current_module, machine)['Name']
		ip = getattr(current_module, machine)['ip']
		usernameESXi = getattr(current_module, machine)['usernameESXi']
		passwordESXi = getattr(current_module, machine)['passwordESXi']
		nodes = getattr(current_module, machine)['pathOfNodes']
				
		server = VIServer()
		print "\n\t\t[*] %s" % name
		server.connect(ip, usernameESXi, passwordESXi)
		
		for node in nodes:
			vm = server.get_vm_by_path(node)
			if vm.get_status() == 'POWERED ON':
				print "\t\t\t[*] Shutting Down - %s" % (node.split("/")[0].split(" ")[1])
				vm.shutdown_guest()
				time.sleep(fuzzTimer)
			else:
				print bcolors.WARNING + "\t\t\t[*] %s - Not Powered On" % (node.split("/")[0].split(" ")[1]) + bcolors.ENDC
		
		getCurrentStatus(nodes, server)
		server.disconnect()

# Use it sprangily, takes a lot of time & space
def suspendAllVMs():
	print "\n\t=============== Standby all VMs ==============="

	for machine in listOfMachines:
		name = getattr(current_module, machine)['Name']
		ip = getattr(current_module, machine)['ip']
		usernameESXi = getattr(current_module, machine)['usernameESXi']
		passwordESXi = getattr(current_module, machine)['passwordESXi']
		nodes = getattr(current_module, machine)['pathOfNodes']
				
		server = VIServer()
		print "\n\t\t[*] %s" % name
		server.connect(ip, usernameESXi, passwordESXi)
		
		for node in nodes:
			vm = server.get_vm_by_path(node)
			if vm.get_status() == 'POWERED ON':
				print "\t\t\t[*] Standby VM - %s" % (node.split("/")[0].split(" ")[1])
				vm.standby_guest()
				time.sleep(180)
			else:
				print bcolors.WARNING + "\t\t\t[*] %s - Not Powered On" % (node.split("/")[0].split(" ")[1]) + bcolors.ENDC
		
		getCurrentStatus(nodes, server)
		server.disconnect()

def fuzzAllVMs():
	print "\n\t***** Routine Automation *****"

	for machine in listOfMachines:
		name = getattr(current_module, machine)['Name']
		ip = getattr(current_module, machine)['ip']
		usernameESXi = getattr(current_module, machine)['usernameESXi']
		passwordESXi = getattr(current_module, machine)['passwordESXi']
		nodes = getattr(current_module, machine)['pathOfNodes']
				
		server = VIServer()
		print "\n\t\t[*] %s" % name
		server.connect(ip, usernameESXi, passwordESXi)
		
		for node in nodes:
			vm = server.get_vm_by_path(node)
			if vm.get_status() == 'POWERED ON':
				print "\t\t\t[*] Rebooting - %s" % (node.split("/")[0].split(" ")[1])
				vm.reboot_guest()
				time.sleep(fuzzTimer)
			else:
				print bcolors.WARNING + "\t\t\t[*] %s - Not Powered On" % (node.split("/")[0].split(" ")[1]) + bcolors.ENDC

		getCurrentStatus(nodes, server)
		server.disconnect()

def remoteCommands():
	print "\n\t***** *****"

	for machine in listOfMachines:
		name = getattr(current_module, machine)['Name']
		ip = getattr(current_module, machine)['ip']
		usernameESXi = getattr(current_module, machine)['usernameESXi']
		passwordESXi = getattr(current_module, machine)['passwordESXi']
		nodes = getattr(current_module, machine)['pathOfNodes']
		usernameVM = getattr(current_module, machine)['usernameVMs']
		passwordVM = getattr(current_module, machine)['passwordVMs']
						
		server = VIServer()
		print "\n\t\t[*] %s" % name
		server.connect(ip, usernameESXi, passwordESXi)
		
		for node in nodes:
			vm = server.get_vm_by_path(node)
			if vm.get_status() == 'POWERED ON':
				print "\t\t\t[*] Trying to execute remote command - %s" % (node.split("/")[0].split(" ")[1])
				vm.login_in_guest(usernameVM, passwordVM)
				vm.start_process("cmd.exe", args =["/c", "taskkill /F /T /IM cmd.exe"])
				time.sleep(timer)
			else:
				print bcolors.WARNING + "\t\t\t[*] %s - Not Powered On" % (node.split("/")[0].split(" ")[1]) + bcolors.ENDC

		getCurrentStatus(nodes, server)
		server.disconnect()
	
def letsBeginTheShow():
	global task
	global status
	
	if status != None:
		getStatusAllVMs()
	
	elif task != None:
		if task == 'boot':
			startAllVMs()
			
		elif task == 'reboot':
			rebootAllVMs()
		
		elif task == 'shutdown':
			shutdownAllVMs()
			
		elif task == 'suspend':
			suspendAllVMs()
		
		elif task == 'routine':
			sched = Scheduler(standalone=True)
			print "\n\t[*] Routine Automation of Nodes(VMs) running %s hours cycle - executing at %s" % (schedulerHourCycle, datetime.datetime.now())
			sched.add_interval_job(fuzzAllVMs, hours=schedulerHourCycle)	## hours, minutes, seconds, days #removeMe
			
			try:
				sched.start()
			except Exception, e:
				print e
				callExit()
		
		if task == 'killConsole':
			remoteCommands()
				
	else:
		print "\nYou shouldn't reach here\n"
		sys.exit()


def main():	
	if sys.platform == 'linux-i386' or sys.platform == 'linux2' or sys.platform == 'darwin':
		os.system('clear')

	else:
		print "What platform is it dude?"
		sys.exit(1)	
		
	parser = argparse.ArgumentParser(description = 'tatasya - VMs Automator', epilog="I will have to kill you if you get this code | www.garage4hackers.com")
	parser.add_argument('--task', nargs='?', dest='task', help='boot | reboot | shutdown | suspend | routine | killConsole')
	parser.add_argument('--machine', nargs='?', dest='machine', help='M2 | M3 | M4 | M5')
	parser.add_argument('--status', nargs='?', dest='status', help='status')

	args = parser.parse_args()
	global task
	global status
		
	if args.task == None and args.status == None:
		print "\n\tMust pass one argument (task | status); exiting\n"
		sys.exit(1)
	
	if args.task != None and args.status != None:
		print "\n\tEither know the status; or assign some task to it\n"
		sys.exit(1)
		
	task = args.task
	status = args.status
	machine = args.machine

	if (task != None) and (task not in ['boot', 'reboot', 'shutdown', 'suspend', 'routine', 'killConsole']):
		print "\nDude, choose among - boot | reboot | shutdown | suspend | routine | killConsole"
		print "Exiting.....\n"
		sys.exit(1)
	
	if (machine != None):
		if machine not in ['M2', 'M3', 'M4', 'M5']:
			print "\nDude, choose among machines - M2 | M3 | M4, M5 or let it be default to process all"
			print "Exiting.....\n"
			sys.exit()
		else: # when particular machine is specified, empty original list & append the specified machine name to it
			listOfMachines[:] = []
			listOfMachines.append(machine)

	
	print '''
   _     _      _     _      _     _      _     _      _     _      _     _      _     _   
  (c).-.(c)    (c).-.(c)    (c).-.(c)    (c).-.(c)    (c).-.(c)    (c).-.(c)    (c).-.(c)  
   / ._. \      / ._. \      / ._. \      / ._. \      / ._. \      / ._. \      / ._. \   
 __\( Y )/__  __\( Y )/__  __\( Y )/__  __\( Y )/__  __\( Y )/__  __\( Y )/__  __\( Y )/__ 
(_.-/'-'\-._)(_.-/'-'\-._)(_.-/'-'\-._)(_.-/'-'\-._)(_.-/'-'\-._)(_.-/'-'\-._)(_.-/'-'\-._)
   || T ||      || A ||      || T ||      || A ||      || S ||      || Y ||      || A ||   
 _.' `-' '._  _.' `-' '._  _.' `-' '._  _.' `-' '._  _.' `-' '._  _.' `-' '._  _.' `-' '._ 
(.-./`-'\.-.)(.-./`-'\.-.)(.-./`-'\.-.)(.-./`-'\.-.)(.-./`-`\.-.)(.-./`-'\.-.)(.-./`-'\.-.)
 `-'     `-'  `-'     `-'  `-'     `-'  `-'     `-'  `-'     `-'  `-'     `-'  `-'     `-' 
 
	VMs Automator for XXX
	__author__ == 'b0nd'
	April, 2016
	ver 0.1
	'''
	
	letsBeginTheShow()

def callExit():
	print "\n\t\t[!] exiting at %s ..........\n" % datetime.datetime.now()
	sys.exit(1)
	
if __name__ == '__main__':
	try: sys.exit(main())
	except KeyboardInterrupt:
		callExit()
