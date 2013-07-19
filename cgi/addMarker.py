#!/usr/bin/python
# -*- coding: UTF-8 -*-

#import tornado.httpserver
#import tornado.ioloop
#import tornado.options

#import tornado.web

#from tornado.options import define, options

#import os
#import string

#from time import sleep
#from datetime import datetime
#import hashlib
#import json

# http://stackoverflow.com/questions/7754936/post-to-tornado-server

# or 
import cgi
import os.path

#print "Content-Type: text/json;charset=utf-8"
print "Content-Type: text/plain;charset=utf-8"
print # A blank line ends the header.

#for i in form:
  #print i
  #print form[i].value

filename = "../html/snakestudy/markers.json"
#filename = "markers.json"

def addMarker(POST):
  if POST.getfirst("latitude") is None and POST.getfirst("longitude") is None:
    return 1
  else:
    if os.path.isfile(filename) and os.path.getsize(filename) > 0:
      try:
        with open(filename, 'r+') as f:
          f.seek(-2, 2) # current: 0, begining: 1, end: 2
          f.write(', \n{"latitude": "' + str(POST['latitude'].value) + '", "longitude": "' + str(POST['longitude'].value) + '"}]\n')
      except IOError:
        return 2
    elif not os.path.isfile(filename) or os.path.getsize(filename) == 0:
      try:
        with open(filename, 'w+') as f:
          f.write('[{"latitude": "' + str(POST['latitude'].value) + '", "longitude": "' + str(POST['longitude'].value) + '"}]\n')
      except IOError:
        return 3
    return 0

# If no errors, return 0
print addMarker(cgi.FieldStorage())
