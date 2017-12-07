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

#resto 1 
url = 'https://maps.googleapis.com/maps/api/geocode/json'
params = {'sensor': 'false', 'address': response[0]}
r = requests.get(url, params=params)
results = r.json()['results']
location = results[0]['geometry']['location']
latti = location['lat']
lotte = location['lng']

#resto2 
params2 = {'sensor': 'false', 'address': response[1]}
r2 = requests.get(url, params=params2)
results2 = r2.json()['results']
location2 = results2[0]['geometry']['location']
latti2 = location2['lat']
lotte2 = location2['lng']

#resto3 
params3 = {'sensor': 'false', 'address': response[2]}
r3 = requests.get(url, params=params3)
results3 = r3.json()['results']
location3 = results3[0]['geometry']['location']
latti3 = location3['lat']
lotte3 = location3['lng']

#resto4 
params4 = {'sensor': 'false', 'address': response[3]}
r4 = requests.get(url, params=params4)
results4 = r4.json()['results']
location4 = results4[0]['geometry']['location']
latti4 = location4['lat']
lotte4 = location4['lng']

print(latti, lotte, latti2, lotte2, latti3, lotte3, latti4, lotte4)

