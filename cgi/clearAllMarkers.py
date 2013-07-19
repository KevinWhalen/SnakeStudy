#!/usr/bin/python
# -*- coding: UTF-8 -*-

import cgi
import os.path

print "Content-Type: text/plain;charset=utf-8"
print # A blank line ends the header.

filename = "../html/snakestudy/markers.json"

def clearAllMarkers():
  if os.path.isfile(filename) and os.path.getsize(filename) > 0:
    try:
      with open(filename, 'w') as f:
        f.write('')
    except IOError:
      return 1
  return 0

# If no errors, return 0
print clearAllMarkers()
