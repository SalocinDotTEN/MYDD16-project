#!/usr/bin/python
# coding=utf-8
import urllib
import urllib2
import csv
import json
import time
import requests
import random
from random import random
import numpy as np 

activities = ['sitting_A1', 'standing_A2', 'lyingonback_A3', 'onrightside_A4', 'ascending_A5', 'descendingstairs_A6', 'standing_in_an_elevator_still_A7', 'moving_around_in_an_elevator_A8', 'walking_in_a_parking_lot_A9', 'treadmill_with_a_speed_4_A10', 'deg_inclined_positions_A11', 'treadmill_with_a_speed_8_A12', 'exercising_on_a_stepper_A13', 'cross_trainer_A14', 'bike_in_horizontal_A15', 'vertical_positions_A16', 'rowing_A17', 'jumping_A18', 'playing_basketball_A19']



while True:
  a = str(np.random.choice(activities))
  b = int(random()*100)
  c ='{"%s":["%s"]}'%(a,b)
  #out = row
  #out = son.dump(b,a)
  #python_obj = json.loads(out)
  
  url = 'http://smartapp.jios.org/actio/Api/store'
  payload = c
  print payload
#print out

  r = requests.post(url, params=payload)
#r = requests.post(url, data=json.dumps(payload))
  time.sleep(4)
  print r.text
  print r.status_code



