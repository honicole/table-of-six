#!/usr/bin/env python
# Load packages
import json, requests


response = []
response1 = []
final_list = []
x = []

data = json.load(open('C:/xampp/htdocs/restaurantdata.json'))
for i in data:
	add = i['address']
	response.append(add)
for j in data:
	na = j['name']
	response1.append(na)

for each in range(0, len(response)):
	final_list.append(response1[each] + " - " + response[each])

y = json.dumps(response1)
print y