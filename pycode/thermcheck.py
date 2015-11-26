import datetime
import MySQLdb
import os
import dbconnection

dbhost = dbconnection.dbhost()
dbuser = dbconnection.dbuser()
dbpasswd = dbconnection.dbpasswd()
dbname = dbconnection.dbname()
db = MySQLdb.connect (host = dbhost, user= dbuser, passwd=dbpasswd,db = dbname)


# This is where my temperature probe is being read, your serial number will be different.
# If your modules are set according to my article in PiMag and you have setup your probe as per Adafruit
# you should just have to change the serial number to yours


def read():
 print datetime.datetime.now()
 curs = db.cursor()
 curs.execute ("SELECT value FROM admin WHERE setting='therm'")
 thermvalue = curs.fetchone()[0]
 curs.execute ("SELECT value FROM admin WHERE setting='thermii'")
 thermvalueii = curs.fetchone()[0]
 
 print "-----FROM DB---"
 print thermvalue
 print thermvalueii
 print "---------------"
 
 # Modify the 28-00000513325d and change it to your temp module found in /sys/bus/w1/devices
 try:
  tfile = open("/sys/bus/w1/devices/%s/w1_slave" % (thermvalue)) 
  text = tfile.read()
  tfile.close()
  secondline = text.split("\n")[1]
  thermdata = secondline.split(" ")[9]
  therm = float(thermdata[2:])
  therm = therm / 1000
 except:
  therm = 0
  print "Fail To Read tfile - Temperature Sensor 1"

# Modify the 28-00000513325d and change it to your temp module found in /sys/bus/w1/devices
 try:
  tiifile = open("/sys/bus/w1/devices/%s/w1_slave" % (thermvalueii))
  textii = tiifile.read()
  tiifile.close()
  secondlineii = textii.split("\n")[1]
  thermdataii = secondlineii.split(" ")[9]
  thermii = float(thermdataii[2:])
  thermii = thermii / 1000
 except:
  thermii = 0
  print "Failed to ready tiifile - Temperature Sensor 2"
 
 # -- cpu temp
 try:
  cputemp = os.popen("/opt/vc/bin/vcgencmd measure_temp").read()
  f = cputemp
  result = f
  v = result.replace("\n","")
  w = v.replace("temp=","")
  cputemp = w.replace("'C","")
  thermiii = cputemp
 except:
  print "Cpu Temperature Failed to Read"
 # -- cpu temp end
 
 print thermiii
 print thermii
 print therm

 
#Define the writing cursor point
 curs = db.cursor()
 #curs.execute ("UPDATE status SET therm='%s', thermii='%s' WHERE id='0';" % (therm,thermii))
 curs.execute ("INSERT therm SET therm='%s', thermii='%s', thermiii='%s', dateset=CURRENT_DATE(), timeset=CURRENT_TIME();" % (therm,thermii,thermiii))
 db.commit()

read()

curs = db.cursor()
curs.execute ("DELETE FROM therm WHERE  therm='0.00';")
curs.execute ("DELETE FROM therm WHERE  thermii='0.00';")
curs.execute ("DELETE FROM therm WHERE  thermiii='0.00';")
db.commit()
db.close

