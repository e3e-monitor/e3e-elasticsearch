import requests
import time
import random
import json

SLEEP_TIME = 1

while True:
  rand_lat = random.uniform(46.0, 46.2)
  rand_lon = random.uniform(6.0, 6.2)
  rand_size = int(random.uniform(1, 100))
  rand_confidence = int(random.uniform(50, 100))
  rand_elevation = int(random.uniform(1, 500))

  data = {'timestamp': str(int(time.time())),
      'location': {"lat": rand_lat, "lon": rand_lon},
      "elevation": rand_elevation, "confidence": rand_confidence,
      "size": rand_size }
  print data
  r = requests.post("http://localhost:5000/event", json=json.dumps(data))
  time.sleep(SLEEP_TIME)

