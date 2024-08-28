import sys

print("Content-type: text/html", end="\r\n\r\n", flush=True)
print("hello")
try:
    import logging
    logging.basicConfig(filename='/home/www/laquintacumbres.com/python/logging_test.log',  level=logging.DEBUG)
    logging.debug('logger has started')
    logging.debug('test has started')
except Exception as e:
	print("Exception:" + str(e)); 
print("end")