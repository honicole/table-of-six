#!/usr/bin/env python
# Load packages
import requests
#resto 1 O.Noir
url = 'https://maps.googleapis.com/maps/api/geocode/json'
params = {'sensor': 'false', 'address': '124 Rue Prince Arthur East, Montreal, QC'}
r = requests.get(url, params=params)
results = r.json()['results']
location = results[0]['geometry']['location']
latti = location['lat']
lotte = location['lng']

#resto2 Lola Rosa
params2 = {'sensor': 'false', 'address': '4581 Park Ave, Montreal, QC H2V 4E4'}
r2 = requests.get(url, params=params2)
results2 = r2.json()['results']
location2 = results2[0]['geometry']['location']
latti2 = location2['lat']
lotte2 = location2['lng']

#resto3 Europea
params3 = {'sensor': 'false', 'address': '1227 Mountain St, Montreal, QC H3G 1Z2'}
r3 = requests.get(url, params=params3)
results3 = r3.json()['results']
location3 = results3[0]['geometry']['location']
latti3 = location3['lat']
lotte3 = location3['lng']

#resto4 Bonaparte
params4 = {'sensor': 'false', 'address': '447 St Francois Xavier St, Montreal, QC'}
r4 = requests.get(url, params=params4)
results4 = r4.json()['results']
location4 = results4[0]['geometry']['location']
latti4 = location4['lat']
lotte4 = location4['lng']

print(latti, lotte, latti2, lotte2, latti3, lotte3, latti4, lotte4)