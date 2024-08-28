import sys
import pip_install

print("Content-type: text/html", end="\r\n\r\n", flush=True)


try:
    pip_install.install_and_import('flask')
    print("end...")
except Exception as e:
	print("error:" + str(e) );