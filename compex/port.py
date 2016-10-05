import serial
import time
import binascii	
import json
import io

ser = serial.Serial('COM7', 9600, timeout=0)

uid = ""
path = []
data = ""
gather = 0
data_string = 0

def save2file(x):
	print('saving...')
	for node in path:
		x += node + ","
	print("dumping to file: ")
	print(x)
	try:
		with open('data.txt', 'r+') as outfile:
			outfile.write(x)
	except:
		print("cant open data file")
	return;


def clearFile():
	print("clearing file...")
	try:
		open('data.txt', 'w').close()
	except:
		print("cant open data file")
	return;


print("scanning...")
while 1: 	
	try:
		line = ser.readline()
		line = line.decode("utf-8")

		if line.find("Customer UID") != -1:
			match = line.strip()
			match = match.replace("Customer UID:", "")
			if match != uid:
				uid = match
				print("new ID")
				data_string = uid + ":"
				path = []
				clearFile()

		if line.find("|data|") != -1:
			gather = 1
		elif line.find('|end|') != -1:
			gather = 2
			
		if gather == 1:
			data += line.strip()
		if gather == 2:
			data = data.replace("|data|", "")
			data = binascii.unhexlify(data)
			data = data.decode()
			data = data.split('\0',1)[0]

			print("UID: ")
			print(uid)
			print("data: ")
			print(data)

			gather = 0
			path.append(data)
			data = ""
			save2file(data_string)
		time.sleep(0.1)
	except:
  		time.sleep(0.1)	