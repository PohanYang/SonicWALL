from sys import stdin
import MySQLdb
lpacket = "NULL"
appname = ""
appcat = ""
packet_info = list()
while 1:
	i = 7
	userinput = stdin.readline()
	packet = userinput.split(' ')
	while "n=" not in packet[i]:
		i+=1
	packet_info.insert(0,packet[8]+" "+packet[9]+" "+packet[i])
	if lpacket in packet_info[0]:
		continue
	############################################################
	#insert data to database
	############################################################
	j=7
	while "Alert:" not in packet[j]:
		j+=1
	k=j+1
	while "--" not in packet[k]:
		appname = appname+packet[k]+" "
		k+=1
	#print appname
	k+=1
	protocol = packet[k]
	#print protocol
	i=7
	while "appcat=" not in packet[i]:
		i+=1
	appcat = packet[i][7:]
	#print appcat
	i=7
	while "src=" not in packet[i]:
		i+=1
	src = packet[i][4:]
	#print src
	i=7
	while "dst=" not in packet[i]:
		i+=1
	dst = packet[i][4:]
	#print dst
	
	conn = MySQLdb.connect(host='localhost',user='root',passwd='123',db='sonicwall')
	cur = conn.cursor()
	sql_data = [appname, appcat, protocol, src, dst]
	cur.execute('insert into package(appname, appcat, protocol, src, dst) values(%s,%s,%s,%s,%s)',sql_data)
	#cursor.executemany('insert into package(appname, appcat, protocol, src, dst) values(%s,%s,%s,%s,%s)', appname, appcat, protocol, src, dst)
	conn.commit()
	cur.close()
	conn.close()
	appname = ""
	############################################################
	#print packet_info[0]
	lpacket = packet_info[0]
	del packet_info[0:(len(packet_info))]
	
	
