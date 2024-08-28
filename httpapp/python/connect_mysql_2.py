import sys
import mysql.connector
from mysql.connector import errorcode

print("Content-type: text/html", end="\r\n\r\n", flush=True)

    

try:
  cnx = mysql.connector.connect(user='raumen41_wordpress',
                                password='Honda2033')
except mysql.connector.Error as err:
  if err.errno == errorcode.ER_ACCESS_DENIED_ERROR:
    print("Something is wrong with your user name or password")
  elif err.errno == errorcode.ER_BAD_DB_ERROR:
    print("Database does not exist")
  else:
    print(err)
else:
  cnx.close()

  print(cnx )