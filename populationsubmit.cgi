import cgi, cgitb

form = cgi.FieldStorage()

service1 = form.getvalue('exampleFormControlTextarea1')
service1wda = form.getvalue('exampleFormControlTextarea2')
service1tc = form.getvalue('exampleFormControlTextarea3')
service1i = form.getvalue('exampleFormControlTextarea4')
service1p = form.getvalue('exampleFormControlTextarea5')

db = MYSQLdb.connect("localhost","whaleye1","C1pjop02nps4","whaleye1_db")

cursor = db.cursor

sql = "INSERT INTO population VALUES ('%s');" %(service1i)

try:
    cursor.execute(sql)
    db.commit()
except:
    db.rollback

db.close

print "Content-type:text/html\r\n\r\n"
print "<html>"
print "<head>"
print "<title> Report Output</title>"
print "</head>"
print "<body>"
print "<h2>%s</h2>" % (service1i)
print "</body>"
print "</html>"