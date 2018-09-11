import mysql.connector
import os
from mysql.connector import errorcode
from time import sleep 
filename="config.txt"
config_info=[]

'''START FUNCTION'''
def start():
	try:	
		file=open(filename,'r')
		fileStatus = 'true'
		read_config(file,fileStatus)
	except IOError:
		print("No File by the name of %s was found"%(filename))
		fileStatus = 'false'
		get_DB_connection_info(fileStatus)
		#create_config_file()
		
'''MYSQL CONNECTOR '''
def sql_db_link(line_var,fileStatus):
	try:
		cnx = mysql.connector.connect(user=str(line_var[0]), password=str(line_var[1]),
		host=str(line_var[2]),
		database=str(line_var[3]))
		print("Database connect!!!")
		if fileStatus == 'false':
			station_num = get_equipment_num(cnx)
			station_num=int(station_num)+1
			line_var.append(station_num)
			create_config_file(line_var,fileStatus)
			add_equipment_to_DB(cnx,config_info)
	except mysql.connector.Error as err:
		if err.errno == errorcode.ER_ACCESS_DENIED_ERROR:
			print("Something is wrong with your user name or password enter infromation again")
			sleep(.10)
			get_DB_connection_info(fileStatus)
			#create_config_file()
		elif err.errno == errorcode.ER_BAD_DB_ERROR:
			print("Database does not exist")
			get_DB_connection_info(fileStatus)
		else:
			print("3rd")
			print(err)
			#get_DB_connection_info(fileStatus)
			#reset_config()		
	else:
		cnx.close()	
		
'''ACCEPT CONFIG INFROMATION AND TEST THE INFORMATION BEFORE CREATING FILE'''		
def get_DB_connection_info(fileStatus):
	info = []
	line_var=["Database user","Database password","Database host","Database name","Station num","Tool_ID","Tool_Name"]
	for i in range(4):
		ans=input("Please enter the %s " %line_var[i])
		info.append(ans)
	sql_db_link(info,fileStatus)	
	
'''CREATE CONFIG FILE AFTER TESTING THE CONNECTION INFORMATION AND ACCEPTING THE ADDITIONAL INFO NEEDED'''		
def create_config_file(connect_info,fileStatus):
	file_array=["Database user","Database password","Database host","Database name","Station num","Tool_ID","Tool_Name"]
	file=open(filename,'w+')
	for i in range(len(connect_info)):
		file_array[i] =file_array[i]+":" + str(connect_info[i])
		file.write(file_array[i]+'\n')
		print(file_array[i])
		
	for i in range(5,7):
		#print(file_array[i])
		ans=input("Please enter the "+file_array[i]+":")
		file_array[i] =file_array[i]+":" + str(ans)
		file.write(file_array[i]+'\n')
	file.close()
	assign_var(file_array,fileStatus)
		
'''READ CONFIG FILE WHEN SYSTEM STARTS'''
def read_config(file,fileStatus):
	holding_list=[]
	for i in file:
		i=i.rstrip('\n')
		holding_list.append(i)
	file.close()
	assign_var(holding_list,fileStatus)
	
'''STORE INFORMATION FROM CONFIG FILE IN ARRAY. THIS FUNCTION IS CALLED BY FUNCTION ABOVE'''
def assign_var(line_var,fileStatus):
	print(fileStatus)
	for i in range(len(line_var)):
		var=line_var[i].split(":")
		config_info.append(var[1])
		#print(str(config_info[i]))
	print("End")
	if fileStatus == 'true':
		sql_db_link(config_info,fileStatus)

'''REMOVE OLD CONFIG FILES'''
def reset_config():
	os.remove(filename)
	create_config_file()
	
'''ASSIGN STATION NUMBER BASED ON THE NUMBER OF EQUIPMENT IN DATABASE USE MYSQL'''
def get_equipment_num(cnx):
	cursor = cnx.cursor()
	query = ("SELECT COUNT(DISTINCT station) FROM tools")
	
	cursor.execute(query)
	row = cursor.fetchone()
	print(row[0])
	#cursor.close()
	#cnx.close()
	return row[0]
	
'''ADD EQUIPMENT TO DATABASE'''	
def add_equipment_to_DB(cnx,config_info):
	cursor = cnx.cursor()
	try:		
		add_tool = ("INSERT INTO tools "
		"(Tool_ID, Tool_Name, station, statu) "
		"VALUES (%s, %s, %s, %s)")
		result= (config_info[5],config_info[6],config_info[4],'1')
		cursor.execute(add_tool, result)
	except mysql.connector.Error as err:
		print(err)
	cnx.commit()
	cursor.close()
	cnx.close()

'''Get mysql connectivity object'''	
def get_sql_oblect():
	cnx = mysql.connector.connect(user=str(config_info[0]), password=str(config_info[1]),
		host=str(config_info[2]),
		database=str(config_info[3]))
	print("Database connect!!!")
	return cnx	
def main():
	start()
	#get_sql_oblect()
	#create_config_file()
	#fileinfo()

if __name__ == "__main__":	
	main()