import sys

print("Content-type: text/html", end="\r\n\r\n", flush=True)
#help('modules')

for k in sys.modules.keys(): 
    print(k + "</br>")