#Import the library
import MySQLdb
import time as wait
import RPi.GPIO as GPIO
import subprocess
import dbconnection

GPIO.setwarnings(False)

dbhost = dbconnection.dbhost()
dbuser = dbconnection.dbuser()
dbpasswd = dbconnection.dbpasswd()
dbname = dbconnection.dbname()
db = MySQLdb.connect (host = dbhost, user= dbuser, passwd=dbpasswd,db = dbname)

def run_sched():
	
	#START
	# db = MySQLdb.connect (host = "192.168.1.61", user="root", passwd="8900428Mjvdh",db = "jayfish")
	#Define the writing cursor point
	curs = db.cursor()
	curs.execute ('SELECT * FROM sched')
	results = curs.fetchall()
	for row in results:
		sunrise_start=row[1]
		sunrise_end=row[2]
		morning_start=row[3]
		morning_end=row[4]
		daytime_start=row[5]
		daytime_end=row[6]
		sunset_start=row[7]
		sunset_end=row[8]
		night_start=row[9]
		night_end=row[10]
		nolight_start=row[11]
		nolight_end=row[12]

		print sunrise_start
		print sunrise_end
		print morning_start
		print morning_end
		print daytime_start
		print daytime_end
		print sunset_start
		print sunset_end
		print night_start
		print night_end
		print nolight_start
		print nolight_end

		a=sunrise_start.split(":")
		sunrise_start_hour=a[0]
		sunrise_start_min=a[1]

		b=sunrise_end.split(":")
		sunrise_end_hour=b[0]
		sunrise_end_min=b[1]
		
		c=morning_start.split(":")
		morning_start_hour=c[0]
		morning_start_min=c[1]

		d=morning_end.split(":")
		morning_end_hour=d[0]
		morning_end_min=d[1]

		e=daytime_start.split(":")
		daytime_start_hour=e[0]
		daytime_start_min=e[1]

		f=daytime_end.split(":")
		daytime_end_hour=f[0]
		daytime_end_min=f[1]

		g=sunset_start.split(":")
		sunset_start_hour=g[0]
		sunset_start_min=g[1]

		h=sunset_end.split(":")
		sunset_end_hour=h[0]
		sunset_end_min=h[1]

		i=night_start.split(":")
		night_start_hour=i[0]
		night_start_min=i[1]

		j=night_end.split(":")
		night_end_hour=j[0]
		night_end_min=j[1]

		k=nolight_start.split(":")
		nolight_start_hour=k[0]
		nolight_start_min=k[1]

		l=nolight_end.split(":")
		nolight_end_hour=l[0]
		nolight_end_min=l[1]

	
	#END

	from datetime import datetime, time,date
	now = datetime.now()
	now_time = now.time()
	
	if now_time >= time(int(sunrise_start_hour),int(sunrise_start_min)) and now_time <= time(int(sunrise_end_hour),int(sunrise_end_min)):
	 print ("Sunrise")
	 curs.execute ('UPDATE sched SET phase="Sunrise" WHERE id="0"')
	 curs.execute ('UPDATE sched SET lastupdate=CURRENT_TIMESTAMP WHERE id="0"')
	 db.commit()
	 subprocess.call("sudo python /var/www/pycode/relayphase_check.py sunrise", shell=True)

	if now_time >= time(int(morning_start_hour),int(morning_start_min)) and now_time <= time(int(morning_end_hour),int(morning_end_min)):
	 print ("Morning")
	 curs.execute ('UPDATE sched SET phase="Morning" WHERE id="0"')
	 curs.execute ('UPDATE sched SET lastupdate=CURRENT_TIMESTAMP WHERE id="0"')
	 db.commit()
	 subprocess.call("sudo python /var/www/pycode/relayphase_check.py morning", shell=True)	

	if now_time >= time(int(daytime_start_hour),int(daytime_start_min)) and now_time <= time(int(daytime_end_hour),int(daytime_end_min)):
	 print ("Daytime")
	 curs.execute ('UPDATE sched SET phase="Daytime" WHERE id="0"')
	 curs.execute ('UPDATE sched SET lastupdate=CURRENT_TIMESTAMP WHERE id="0"')
	 db.commit()
	 subprocess.call("sudo python /var/www/pycode/relayphase_check.py daytime", shell=True)

	if now_time >= time(int(sunset_start_hour),int(sunset_start_min)) and now_time <= time(int(sunset_end_hour),int(sunset_end_min)):
	 print ("Sunset")
	 curs.execute ('UPDATE sched SET phase="Sunset" WHERE id="0"')
	 curs.execute ('UPDATE sched SET lastupdate=CURRENT_TIMESTAMP WHERE id="0"')
	 db.commit()
	 subprocess.call("sudo python /var/www/pycode/relayphase_check.py sunset", shell=True)	

	if now_time >= time(int(night_start_hour),int(night_start_min)) and now_time <= time(int(night_end_hour),int(night_end_min)):
	 print ("Night")
	 curs.execute ('UPDATE sched SET phase="Night" WHERE id="0"')
	 curs.execute ('UPDATE sched SET lastupdate=CURRENT_TIMESTAMP WHERE id="0"')
	 db.commit()
	 subprocess.call("sudo python /var/www/pycode/relayphase_check.py night", shell=True)
	
	if now_time >= time(int(nolight_start_hour),int(nolight_start_min)) and now_time <= time(int(nolight_end_hour),int(nolight_end_min)):
	 print ("No Light")
	 curs.execute ('UPDATE sched SET phase="NoLight" WHERE id="0"')
	 curs.execute ('UPDATE sched SET lastupdate=CURRENT_TIMESTAMP WHERE id="0"')
	 db.commit()
	 subprocess.call("sudo python /var/www/pycode/relayphase_check.py nolight", shell=True)
	
	curs.close()
	del curs

run_sched()
