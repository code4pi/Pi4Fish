#Import the library
import sys
import MySQLdb
import time as wait
import RPi.GPIO as GPIO
import dbconnection

GPIO.setwarnings(False)

dbhost = dbconnection.dbhost()
dbuser = dbconnection.dbuser()
dbpasswd = dbconnection.dbpasswd()
dbname = dbconnection.dbname()
db = MySQLdb.connect (host = dbhost, user= dbuser, passwd=dbpasswd,db = dbname)
curs = db.cursor()


curs.execute ('SELECT * FROM codes WHERE code = "relaypolarity"')
results = curs.fetchall()
for row in results:
        polarity=row[2]
	polarity=int(polarity)

print "polarity:" ,polarity
if polarity == 1:
 truestate=1
 falsestate=0
 print "Relay in Active HIGH Mode"
else:
 truestate=0
 falsestate=1
 print "Relay in Active LOW Mode"

print truestate
print falsestate

GPIO.setwarnings(falsestate)
GPIO.setmode(GPIO.BOARD)

curs.execute ('SELECT * FROM relay where relay = "1"')
results = curs.fetchall()
for row in results:
	relay1gpio=row[2]
	print relay1gpio

curs.execute ('SELECT * FROM relay where relay = "2"')
results = curs.fetchall()
for row in results:
	relay2gpio=row[2]
	print relay2gpio

curs.execute ('SELECT * FROM relay where relay = "3"')
results = curs.fetchall()
for row in results:
	relay3gpio=row[2]
	print relay3gpio

curs.execute ('SELECT * FROM relay where relay = "4"')
results = curs.fetchall()
for row in results:
	relay4gpio=row[2]
	print relay4gpio

curs.execute ('SELECT * FROM relay where relay = "5"')
results = curs.fetchall()
for row in results:
	relay5gpio=row[2]
	print relay5gpio

curs.execute ('SELECT * FROM relay where relay = "6"')
results = curs.fetchall()
for row in results:
	relay6gpio=row[2]
	print relay6gpio

curs.execute ('SELECT * FROM relay where relay = "7"')
results = curs.fetchall()
for row in results:
	relay7gpio=row[2]
	print relay7gpio

curs.execute ('SELECT * FROM relay where relay = "8"')
results = curs.fetchall()
for row in results:
	relay8gpio=row[2]
	print relay8gpio

# --------------- GIO PIN SETUP - PIN SETUP IGNORED IF FIELD BLANK
print "------------------------------------"
if relay1gpio == '':
	print "GPIO ON RELAY 1 NOT SETUP DUE TO NO PIN CONFIGURED"
else:
	# print "gpio %s" % (relay1gpio) 
	GPIO.setup(int(relay1gpio), GPIO.OUT)
	print "RELAY 1 SETUP ON GPIO %s" % (relay1gpio)

if relay2gpio == '':
	print "GPIO ON RELAY 2 NOT SETUP DUE TO NO PIN CONFIGURED"
else:
	# print "gpio %s" % (relay1gpio) 
	GPIO.setup(int(relay2gpio), GPIO.OUT)

if relay3gpio == '':
	print "GPIO ON RELAY 3 NOT SETUP DUE TO NO PIN CONFIGURED"
else:
	# print "gpio %s" % (relay1gpio) 
	GPIO.setup(int(relay3gpio), GPIO.OUT)

if relay4gpio == '':
	print "GPIO ON RELAY 4 NOT SETUP DUE TO NO PIN CONFIGURED"
else:
	# print "gpio %s" % (relay1gpio) 
	GPIO.setup(int(relay4gpio), GPIO.OUT)

if relay5gpio == '':
	print "GPIO ON RELAY 5 NOT SETUP DUE TO NO PIN CONFIGURED"
else:
	# print "gpio %s" % (relay1gpio) 
	GPIO.setup(int(relay5gpio), GPIO.OUT)

if relay6gpio == '':
	print "GPIO ON RELAY 6 NOT SETUP DUE TO NO PIN CONFIGURED"
else:
	# print "gpio %s" % (relay1gpio) 
	GPIO.setup(int(relay6gpio), GPIO.OUT)

if relay7gpio == '':
	print "GPIO ON RELAY 7 NOT SETUP DUE TO NO PIN CONFIGURED"
else:
	# print "gpio %s" % (relay1gpio) 
	GPIO.setup(int(relay7gpio), GPIO.OUT)

if relay8gpio == '':
	print "GPIO ON RELAY 8 NOT SETUP DUE TO NO PIN CONFIGURED"
else:
	# print "gpio %s" % (relay1gpio) 
	GPIO.setup(int(relay8gpio), GPIO.OUT)
print "------------------------------------"

# --------------- GIO PIN SETUP - PIN SETUP IGNORED IF FIELD BLANK

def relaycheck(x):
	print x
	curs.execute ('SELECT * FROM relayphase WHERE description="%s"' % (x))
	results = curs.fetchall()
	for row in results:
		relay1=row[2]
		relay2=row[3]
		relay3=row[4]
		relay4=row[5]
		relay5=row[6]
		relay6=row[7]
		relay7=row[8]
		relay8=row[9]

	# relay 8 temp check
	print 'xxxxxxxxxxxxxx Relay 8 Overheating Action Check xxxxxxxxxxxxxxx'
	#SELECT * FROM `therm` ORDER BY ID DESC LIMIT 1;
	curs.execute ('SELECT * FROM therm ORDER BY ID DESC LIMIT 1')
	results = curs.fetchall()
	for row in results:
		therm=row[1]

	curs.execute ('SELECT * FROM codes WHERE code="threshold"')
	results = curs.fetchall()
	for row in results:
		threshold=row[2]

	print therm
	print threshold
	
	if int(threshold) == 0:
		print '*** Relay8 Therm Feature Disabled ***'
	else:
		print 'The schedule says relay 8 is ' + relay8

	
		if relay8=='on':
			print 'Already On'
		else:
			if int(threshold) < int(therm):
				print 'its hot'
				relay8='on'
	
			if int(threshold) > int(therm):
				print 'its cool'
				relay8='off'
	
	
	

	print 'The relay 8 has been set to  ' + relay8

	print 'xxxxxxxxxxxxxx'
	# relay 8 temp check

	if relay1gpio != "":
		if relay1=='manual':
			curs.execute ('SELECT * FROM relay where relay = "1"')
			results = curs.fetchall()
			for row in results:
				if row[4]=="on":
					# CODE IN HERE - change relayTBL status=on checkbox=checked mode=manual
					curs.execute ('UPDATE relay SET status="on", checkbox="checked", mode="manual" WHERE relay="1"')
					db.commit()
					print ("GPIO relay 1 ON")
					GPIO.output(int(relay1gpio), truestate)
				else:
					# CODE IN HERE - change relayTBL status=off checkbox=UNchecked mode=manual
					curs.execute ('UPDATE relay SET status="off", checkbox="", mode="manual" WHERE relay="1"')
					db.commit()
					print ("GPIO relay 1 OFF")
					GPIO.output(int(relay1gpio), falsestate)

		elif relay1=='on':
			# CODE IN HERE - change relayTBL status=on checkbox=checked mode=auto
			print ("AUTO RELAY 1 GPIO %s ON") % (relay1gpio)
			GPIO.output(int(relay1gpio), truestate)
			curs.execute ('UPDATE relay SET status="on", checkbox="checked", mode="auto" WHERE relay="1"')
			db.commit()
		else:
			# CODE IN HERE - change relayTBL status=off checkbox=UNchecked mode=auto
			print ("AUTO RELAY 1 GPIO %s OFF") % (relay1gpio)
			GPIO.output(int(relay1gpio), falsestate)
			curs.execute ('UPDATE relay SET status="off", checkbox="", mode="auto" WHERE relay="1"')
			db.commit()
	else:
		print "RELAY 1 GPIO NOT SET"
# --------------------------------------RELAY 1
# --------------------------------------RELAY 2
	
	if relay2gpio != "":
		if relay2=='manual':
			curs.execute ('SELECT * FROM relay where relay = "2"')
			results = curs.fetchall()
			for row in results:
				if row[4]=="on":
					curs.execute ('UPDATE relay SET status="on", checkbox="checked", mode="manual" WHERE relay="2"')
					db.commit()
					print ("GPIO relay 2 ON")
					GPIO.output(int(relay2gpio), truestate)
				else:
					curs.execute ('UPDATE relay SET status="off", checkbox="", mode="manual" WHERE relay="2"')
					db.commit()
					GPIO.output(int(relay2gpio), falsestate)
			
		elif relay2=='on':
			print ("AUTO RELAY %s ON") % (relay2gpio)
			GPIO.output(int(relay2gpio), truestate)
			curs.execute ('UPDATE relay SET status="on", checkbox="checked", mode="auto" WHERE relay="2"')
			db.commit()
		else:
			GPIO.output(int(relay2gpio), falsestate)
			curs.execute ('UPDATE relay SET status="off", checkbox="", mode="auto" WHERE relay="2"')
			db.commit()
			print ("AUTO RELAY %s OFF") % (relay2gpio)
	else:
		print "RELAY 2 GPIO NOT SET"
# --------------------------------------RELAY 3

	if relay3gpio != "":
		if relay3=='manual':
			curs.execute ('SELECT * FROM relay where relay = "3"')
			results = curs.fetchall()
			for row in results:
				if row[4]=="on":
					curs.execute ('UPDATE relay SET status="on", checkbox="checked", mode="manual" WHERE relay="3"')
					db.commit()
					print ("GPIO relay 3 ON")
					GPIO.output(int(relay3gpio), truestate)
				else:
					curs.execute ('UPDATE relay SET status="off", checkbox="", mode="manual" WHERE relay="3"')
					db.commit()
					print ("GPIO relay 3 OFF")
					GPIO.output(int(relay3gpio), falsestate)
			
		elif relay3=='on':
			print ("AUTO RELAY %s ON") % (relay3gpio)
			GPIO.output(int(relay3gpio), truestate)
			curs.execute ('UPDATE relay SET status="on", checkbox="checked", mode="auto" WHERE relay="3"')
			db.commit()
		else:
			GPIO.output(int(relay3gpio), falsestate)
			curs.execute ('UPDATE relay SET status="off", checkbox="", mode="auto" WHERE relay="3"')
			db.commit()
			print ("AUTO RELAY %s OFF") % (relay3gpio)
	else:
		print "RELAY 3 GPIO NOT SET"

	if relay4gpio != "":	
		if relay4=='manual':
			curs.execute ('SELECT * FROM relay where relay = "4"')
			results = curs.fetchall()
			for row in results:
				if row[4]=="on":
					curs.execute ('UPDATE relay SET status="on", checkbox="checked", mode="manual" WHERE relay="4"')
					db.commit()
					print ("GPIO relay 4 ON")
					GPIO.output(int(relay4gpio), truestate)
				else:
					curs.execute ('UPDATE relay SET status="off", checkbox="", mode="manual" WHERE relay="4"')
					db.commit()
					print ("GPIO relay 4 OFF")
					GPIO.output(int(relay4gpio), falsestate)
			
		elif relay4=='on':
			print ("AUTO RELAY %s ON") % (relay4gpio)
			GPIO.output(int(relay4gpio), truestate)
			curs.execute ('UPDATE relay SET status="on", checkbox="checked", mode="auto" WHERE relay="4"')
			db.commit()
		else:
			GPIO.output(int(relay4gpio), falsestate)
			curs.execute ('UPDATE relay SET status="off", checkbox="", mode="auto" WHERE relay="4"')
			db.commit()
			print ("AUTO RELAY %s ON") % (relay4gpio)
	else:
		print "RELAY 4 GPIO NOT SET"


	if relay5gpio != "":
		if relay5=='manual':
			curs.execute ('SELECT * FROM relay where relay = "5"')
			results = curs.fetchall()
			for row in results:
				if row[4]=="on":
					curs.execute ('UPDATE relay SET status="on", checkbox="checked", mode="manual" WHERE relay="5"')
					db.commit()
					print ("GPIO relay 5 ON")
					GPIO.output(int(relay5gpio), truestate)
				else:
					curs.execute ('UPDATE relay SET status="off", checkbox="", mode="manual" WHERE relay="5"')
					db.commit()
					print ("GPIO relay 5 OFF")
					GPIO.output(int(relay5gpio), falsestate)
			
		elif relay5=='on':
			print ("AUTO RELAY %s ON") % (relay5gpio)
			GPIO.output(int(relay5gpio), truestate)
			curs.execute ('UPDATE relay SET status="on", checkbox="checked", mode="auto" WHERE relay="5"')
			db.commit()
		else:
			curs.execute ('UPDATE relay SET status="off", checkbox="", mode="auto" WHERE relay="5"')
			db.commit()
			print ("AUTO RELAY %s ON") % (relay5gpio)
			GPIO.output(int(relay5gpio), falsestate)
	else:
		print "RELAY 5 GPIO NOT SET"


	if relay6gpio != "":
		if relay6=='manual':
			curs.execute ('SELECT * FROM relay where relay = "6"')
			results = curs.fetchall()
			for row in results:
				if row[4]=="on":
					curs.execute ('UPDATE relay SET status="on", checkbox="checked", mode="manual" WHERE relay="6"')
					db.commit()
					print ("GPIO relay 6 ON")
					GPIO.output(int(relay6gpio), truestate)
				else:
					curs.execute ('UPDATE relay SET status="off", checkbox="", mode="manual" WHERE relay="6"')
					db.commit()
					print ("GPIO relay 6 OFF")
					GPIO.output(int(relay6gpio), falsestate)
			
		elif relay6=='on':
			print ("AUTO RELAY %s ON") % (relay6gpio)
			GPIO.output(int(relay6gpio), truestate)
			curs.execute ('UPDATE relay SET status="on", checkbox="checked", mode="auto" WHERE relay="6"')
			db.commit()
		else:
			curs.execute ('UPDATE relay SET status="off", checkbox="", mode="auto" WHERE relay="6"')
			db.commit()
			print ("AUTO RELAY %s ON") % (relay6gpio)
			GPIO.output(int(relay6gpio), falsestate)
	else:
		print "RELAY 6 GPIO NOT SET"


	if relay7gpio != "":
		if relay7=='manual':
			curs.execute ('SELECT * FROM relay where relay = "7"')
			results = curs.fetchall()
			for row in results:
				if row[4]=="on":
					curs.execute ('UPDATE relay SET status="on", checkbox="checked", mode="manual" WHERE relay="7"')
					db.commit()
					print ("GPIO relay 7 ON")
					GPIO.output(int(relay7gpio), truestate)
				else:
					curs.execute ('UPDATE relay SET status="off", checkbox="", mode="manual" WHERE relay="7"')
					db.commit()
					print ("GPIO relay 7 OFF")
					GPIO.output(int(relay7gpio), falsestate)
			
		elif relay7=='on':
			print ("AUTO RELAY %s ON") % (relay7gpio)
			GPIO.output(int(relay7gpio), truestate)
			curs.execute ('UPDATE relay SET status="on", checkbox="checked", mode="auto" WHERE relay="7"')
			db.commit()
		else:
			curs.execute ('UPDATE relay SET status="off", checkbox="", mode="auto" WHERE relay="7"')
			db.commit()
			print ("AUTO RELAY %s ON") % (relay7gpio)
			GPIO.output(int(relay7gpio), falsestate)
	else:
		print "RELAY 7 GPIO NOT SET"



	if relay8gpio != "":
		if relay8=='manual':
			curs.execute ('SELECT * FROM relay where relay = "8"')
			results = curs.fetchall()
			for row in results:
				if row[4]=="on":
					curs.execute ('UPDATE relay SET status="on", checkbox="checked", mode="manual" WHERE relay="8"')
					db.commit()
					print ("GPIO relay 8 ON")
					GPIO.output(int(relay8gpio), truestate)
				else:
					curs.execute ('UPDATE relay SET status="off", checkbox="", mode="manual" WHERE relay="8"')
					db.commit()
					print ("GPIO relay 8 OFF")
					GPIO.output(int(relay8gpio), falsestate)
			
		elif relay8=='on':
			print ("AUTO RELAY %s ON") % (relay8gpio)
			GPIO.output(int(relay8gpio), truestate)
			curs.execute ('UPDATE relay SET status="on", checkbox="checked", mode="auto" WHERE relay="8"')
			db.commit()
		else:
			curs.execute ('UPDATE relay SET status="off", checkbox="", mode="auto" WHERE relay="8"')
			db.commit()
			print ("AUTO RELAY %s ON") % (relay8gpio)
			GPIO.output(int(relay8gpio), falsestate)
	else:
		print "RELAY 8 GPIO NOT SET"




def maintenance_check():
	print ("maintenance mode on")
	curs.execute ('SELECT * FROM relay WHERE relay="1"')
	results = curs.fetchall()
	for rowz in results:
		if rowz[2] == "":
			print "DO NOTHING FOR RELAY 1"
		elif rowz[4] == "on":
			print "RELAY 1 ON"
			GPIO.output(int(relay1gpio), truestate)
		else:
			print "RELAY 1 OFF"
			GPIO.output(int(relay1gpio), falsestate)

	curs.execute ('SELECT * FROM relay WHERE relay="2"')
	results = curs.fetchall()
	for rowz in results:
		if rowz[2] == "":
			print "DO NOTHING FOR RELAY 2"
		elif rowz[4] == "on":
			print "RELAY 2 ON"
			GPIO.output(int(relay2gpio), truestate)
		else:
			print "RELAY 2 OFF"
			GPIO.output(int(relay2gpio), falsestate)

	curs.execute ('SELECT * FROM relay WHERE relay="3"')
	results = curs.fetchall()
	for rowz in results:
		if rowz[2] == "":
			print "DO NOTHING FOR RELAY 3"
		elif rowz[4] == "on":
			print "RELAY 3 ON"
			GPIO.output(int(relay3gpio), truestate)
		else:
			print "RELAY 3 OFF"
			GPIO.output(int(relay3gpio), falsestate)

	curs.execute ('SELECT * FROM relay WHERE relay="4"')
	results = curs.fetchall()
	for rowz in results:
		if rowz[2] == "":
			print "DO NOTHING FOR RELAY 4"
		elif rowz[4] == "on":
			print "RELAY 4 ON"
			GPIO.output(int(relay4gpio), truestate)
		else:
			print "RELAY 4 OFF"
			GPIO.output(int(relay4gpio), falsestate)

	curs.execute ('SELECT * FROM relay WHERE relay="5"')
	results = curs.fetchall()
	for rowz in results:
		if rowz[2] == "":
			print "DO NOTHING FOR RELAY 5"
		elif rowz[4] == "on":
			print "RELAY 5 ON"
			GPIO.output(int(relay5gpio), truestate)
		else:
			print "RELAY 5 OFF"
			GPIO.output(int(relay5gpio), falsestate)

	curs.execute ('SELECT * FROM relay WHERE relay="6"')
	results = curs.fetchall()
	for rowz in results:
		if rowz[2] == "":
			print "DO NOTHING FOR RELAY 6"
		elif rowz[4] == "on":
			print "RELAY 6 ON"
			GPIO.output(int(relay6gpio), truestate)
		else:
			print "RELAY 6 OFF"
			GPIO.output(int(relay6gpio), falsestate)

	curs.execute ('SELECT * FROM relay WHERE relay="7"')
	results = curs.fetchall()
	for rowz in results:
		if rowz[2] == "":
			print "DO NOTHING FOR RELAY 7"
		elif rowz[4] == "on":
			print "RELAY 7 ON"
			GPIO.output(int(relay7gpio), truestate)
		else:
			print "RELAY 7 OFF"
			GPIO.output(int(relay7gpio), falsestate)

	curs.execute ('SELECT * FROM relay WHERE relay="8"')
	results = curs.fetchall()
	for rowz in results:
		if rowz[2] == "":
			print "DO NOTHING FOR RELAY 8"
		elif rowz[4] == "on":
			print "RELAY 8 ON"
			GPIO.output(int(relay8gpio), truestate)
		else:
			print "RELAY 8 OFF"
			GPIO.output(int(relay8gpio), falsestate)

# relaycheck("night")

curs.execute ('SELECT * FROM codes where code = "maintenance"')
results = curs.fetchall()
for row in results:
	maintenance=row[2]
	if maintenance=="on":
		maintenance_check()
	else:
		try:
			relaycheck(sys.argv[1])
		except:
			print "NO TIME SLOT OFFERED"

db.close()

