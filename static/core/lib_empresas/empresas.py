import sqlite3
from flask import Flask, render_template
import sys
sys.path.insert(0, 'main')

app = Flask(__name__)


@app.route('/companies', methods=['GET'])
def getCompanies(database):
    
    conn = sqlite3.connect(database)
    conn.row_factory = sqlite3.Row
   
    cur = conn.cursor()
    cur.execute("select * from empresas")
   
    rows = cur.fetchall(); 
    return render_template("listCompanies.html",rows = rows) 

