#!/usr/bin/python
# -*- coding: UTF-8 -*-

import cgi
import os.path
import json

print "Content-Type: text/plain;charset=utf-8"
print # A blank line ends the header.

#for i in form:
  #print i
  #print form[i].value

filename = "../html/snakestudy/markers.json"
#filename = "markers.json"

def removeMarker(POST):
  if POST.getfirst("latitude") is None and POST.getfirst("longitude") is None:
    return 1
  else:
    if os.path.isfile(filename) and os.path.getsize(filename) > 0:
      try:
        markers = ""
        with open(filename, 'r+') as f:
          markers = json.loads(f.read());
          for i in markers:
            if POST['latitude'].value == i['latitude'] and POST['longitude'].value == i['longitude']:
              markers.remove(i)
        with open(filename, 'w') as f:
          f.write(json.dumps(markers) + "\n")
      except IOError:
        return 2
    elif not os.path.isfile(filename) or os.path.getsize(filename) == 0:
      return 3
    return 0

# If no errors, return 0
print removeMarker(cgi.FieldStorage())
