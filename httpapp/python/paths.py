#!/usr/local/python-3.5/bin/virtualenv/python
import sys

print("Content-type: text/html", end="\r\n\r\n", flush=True)
print("paths:")
for p in sys.path:
    print(p)
    print("<br/>")