# this code is connect to MySQL database information
# about database name, root member, root password...

import MySQLdb

db = MySQLdb.connect("localhost","root","123","sonicwall")
#cur = db.cursor()
#cur.execute("SELECT * FROM test")
#for row in cur.fetchall():
#	print row[0]
#db.close()
