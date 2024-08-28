import sys
import pip
import importlib

print("Content-type: text/html", end="\r\n\r\n", flush=True)
#help('modules')

def install_and_import(package):
    
    try:
        print("try to import:" + package)
        importlib.import_module(package)
    except ImportError:
        print("<br> not found installing <br>")
        
        pip.main(['install', package])
    finally:
        globals()[package] = importlib.import_module(package)

try:
    #install_and_import('pony')
    #from pip import _internal
    #_internal.main(['list'])
    #print("pip.__version__:" + str(pip.__version__) )
    #_internal.main(['install', 'pony'])
    #from pony.orm import *
    from pkgutil import iter_modules
    for p in iter_modules():
    	print(str(p) )  
    	print("<br/>")  
    print("end...")
except Exception as e:
	print("error:" + str(e) );