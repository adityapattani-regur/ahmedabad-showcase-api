#Imports
import datetime
import time
import json
import requests

print("Initializing the script")

#API endpoints
OUR_API_URL = "http://106.201.233.254:8080/events"
ALLEVENTS_API_URL = "https://api.allevents.in/events/list"
ALLEVENTS_API_KEY = "d27383ed3c54413195fe8a5904d033e8"

# The headers for both the post requests
HEADER_ALLEVENTS = {"Ocp-Apim-Subscription-Key" : ALLEVENTS_API_KEY}
HEADER_OUR_API = {"Content-Type" : "application/ld+json"}

#Query Parameters
CITY_NAME = "Ahmedabad"
STATE_CODE = "GJ"
COUNTRY = "India"

#Dates for the day the API is called and the next day
DATE_TODAY = datetime.date.today()
DATE_TOMORROW = DATE_TODAY + datetime.timedelta(days = 15)       #Specify the number of days in future

DATE_TODAY = str(DATE_TODAY)[2:]
DATE_TOMORROW = str(DATE_TOMORROW)[2:]

#Building the API Endpoint URL for Allevents.in API
EVENTS_CALL_API_ENDPOINT = ALLEVENTS_API_URL + "/?city=" + CITY_NAME + "&state=" + STATE_CODE + "&country=" + COUNTRY + "&sdate=" + DATE_TODAY + "&edate=" + DATE_TOMORROW + ""

startTime = time.time()
print("Getting data from Allevents.in")

req = requests.post(url=EVENTS_CALL_API_ENDPOINT, data={}, headers=HEADER_ALLEVENTS)
jsonResponseAllEvents = json.loads(req.text)

print("Sending data to the AhmedabadShowcase server")

count = 0
for event in jsonResponseAllEvents['data']:
    dataToSend = {}

    dataToSend['name'] = event['eventname']
    dataToSend['address'] = event['location']
    dataToSend['latitude'] = event['venue']['latitude']
    dataToSend['longitude'] = event['venue']['longitude']
    dataToSend['eventDate'] = str(datetime.datetime.fromtimestamp(event['start_time'])).split()[0]
    dataToSend['eventTime'] = str(datetime.datetime.fromtimestamp(event['start_time'])).split()[1]
    dataToSend['city'] = "/cities/1"

    jsonDataToSend = (json.dumps(dataToSend))
    count += 1

    postToOurAPI = requests.post(url=OUR_API_URL, data=jsonDataToSend, headers=HEADER_OUR_API)
    if(postToOurAPI.status_code != 201):
        print("Resource with title: " + dataToSend['name'] + " could not be sent!")
        break

endTime = time.time()

print("The job took: " + str(endTime - startTime).split(".")[0] + " seconds to complete")
print("Inserted " + str(count) + " events")
