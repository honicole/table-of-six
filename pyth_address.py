#!/usr/bin/env python
# Load packages
import json, requests


response = []
response1 = []
final_list = []
data = json.load(open('C:/xampp/htdocs/six/testing/new/jtest.json'))
for i in data:
	add = i['address']
	response.append(add)
for j in data:
	na = j['name']
	response1.append(na)

for each in range(0, len(response)):
	final_list.append(response1[each] + " - " + response[each])

#print response[0]
#print response1[0]
#print final_list[0]

url = 'https://maps.googleapis.com/maps/api/geocode/json'
latti, latti2, latti3, latti4 = (0,0,0,0)
lotte, lotte2, lotte3, lotte4 = (0,0,0,0)

#resto 1 
def resto1():
	params = {'sensor': 'false', 'address': response[0]}
	r = requests.get(url, params=params)
	results = r.json()['results']
	if results:
		location = results[0]['geometry']['location']
		global latti
		global lotte
		latti = location['lat']
		lotte = location['lng']
	else: 
		resto1()

#resto2 
def resto2():
	params2 = {'sensor': 'false', 'address': response[1]}
	r2 = requests.get(url, params=params2)
	results2 = r2.json()['results']
	if results2:
		location2 = results2[0]['geometry']['location']
		global latti2
		global lotte2
		latti2 = location2['lat']
		lotte2 = location2['lng']
	else: 
		resto2()

#resto3 
def resto3():
	params3 = {'sensor': 'false', 'address': response[2]}
	r3 = requests.get(url, params=params3)
	results3 = r3.json()['results']
	if results3:
		location3 = results3[0]['geometry']['location']
		global latti3
		global lotte3
		latti3 = location3['lat']
		lotte3 = location3['lng']
	else: 
		resto3()

#resto4 
def resto4():
	params4 = {'sensor': 'false', 'address': response[3]}
	r4 = requests.get(url, params=params4)
	results4 = r4.json()['results']
	if results4: 
		location4 = results4[0]['geometry']['location']
		global latti4
		global lotte4
		latti4 = location4['lat']
		lotte4 = location4['lng']
	else:
		resto4()

resto1()
resto2()
resto3()
resto4()
print(latti, lotte, latti2, lotte2, latti3, lotte3, latti4, lotte4)

