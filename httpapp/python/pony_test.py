import sys

print("Content-type: text/html", end="\r\n\r\n", flush=True)
print("hello")
try:
    from decimal import Decimal
    from pony.orm import *

    #mydb = mysql.connector.connect(
    #user="raumen41_wordpress",
    #password="Argos4905",     
    #host="mysql.freehostia.com",
    #host="localhost",
    
    #database="raumen41_wordpress"
    #)



    db = Database()
    print("db:" + str(db) + "<br>")
    
    db.bind(provider='mysql', user='raumen41_wordpress', password='Argos4905', host='mysql.freehostia.com', database='raumen41_wordpress')

    class Customer(db.Entity):
        id = PrimaryKey(int, auto=True)
        name = Required(str)
        email = Required(str, unique=True)
        


    sql_debug(True)
    db.generate_mapping(create_tables=True)

    @db_session
    def populate_database():
        c1 = Customer(name='John Smith', email='john@example.com')
        c2 = Customer(name='Matthew Reed', email='matthew@example.com')
        c3 = Customer(name='Chuan Qin', email='chuanqin@example.com')
        c4 = Customer(name='Rebecca Lawson', email='rebecca@example.com')
        c5 = Customer(name='Oliver Blakey', email='oliver@example.com')
        commit()
    #populate_database()  
    
    with db_session:
        c = Customer.get(email='oliver@example.com') 
        print("<br>user:" + str(c))  
except Exception as e:
    print("Exception:" + str(e) )