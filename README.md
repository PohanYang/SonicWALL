# SonicWALL project about network flow and database  
  
  
In this project, we use a hardware classifier for network application detection.  
We use SonicWALL hardware firewall to classify application first. It is for our model in training data.  
This part we introduction how we do about save a steaming flow in database.  
  
  
###Ready for sonicWALL  
We follow the whitepaper like this:  
![img1](https://github.com/PohanYang/SonicWALL/blob/master/img/sonicwall_connect.jpg)  
  
Then we use syslog let flow throw it form sonicWALL.  
![img2](https://github.com/PohanYang/SonicWALL/blob/master/img/sys.png)  
  
In this time, we can use wireshark to check flow throw from syslog in our machine(there we use vmware virtual machine)  
![img3](https://github.com/PohanYang/SonicWALL/blob/master/img/003.PNG)  
there we can see the protocol is syslog, it means work.  
  
Now we went to capture the flow information.  
1. application name  
2. flow's five tuple(protocol, source address, source port, destination addres, destination port).  
In our machine we can type at output file dirt(/var/log/sonicwall)  
> $tail -f sonicwall  
  
we can see something information detail, that extract using python 
In first, we build a database and table like this:  
![img4](https://github.com/PohanYang/SonicWALL/blob/master/img/db.PNG)  
![img5](https://github.com/PohanYang/SonicWALL/blob/master/img/dbc.PNG)  
  
then we can use python code to insert data follow this(full code can check in /sonicwall_code/buffer.py):  
> conn = MySQLdb.connect(host='localhost',user='root',passwd='123',db='sonicwall')  
> cur = conn.cursor()  
>	sql_data = [appname, appcat, protocol, src, dst]  
>	cur.execute('insert into package(appname, appcat, protocol, src, dst) values(%s,%s,%s,%s,%s)',sql_data)  
>	#cursor.executemany('insert into package(appname, appcat, protocol, src, dst) values(%s,%s,%s,%s,%s)', appname, appcat, protocol, src, dst)  
>	conn.commit()  
>	cur.close()  
>	conn.close()  
>	appname = ""  
  
Now we have 1.A steaming record with sonicWALL classifier, 2.A python code for extract records and save it in database.  
We use a shell file let machine can automation. When we have new network flow, python can save it information in real-time.  
we save a shell data like this:  
> tail -f /var/log/sonicwall|grep "Alert" | python buffer.py  
It can automation grep "Alert" from "tail -f /var/log/sonicall" file, and be a input drop into python code.  
That's it, we create a sonicWALL firewall database caputure.  
When we have database we can extract in for data mining show on website.  
If you interest it you can check some website application from SonicWALL/html/, it is use php, html, javascript builded.  
