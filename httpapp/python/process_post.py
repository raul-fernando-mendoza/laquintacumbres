import sys

print("Content-type: text/html", end="\r\n\r\n", flush=True)
print("receiving post arguments")
POST={}
args=sys.stdin.read().split('&')

for arg in args: 
    print("arg:" + str(arg) + "\n")
    t=arg.split('=')
    print("t:" + str(arg) + "\n" )
    if len(t)>1: k, v=arg.split('='); POST[k]=v; print("k:" + str(k) + "=" + str(v) + "\n" )