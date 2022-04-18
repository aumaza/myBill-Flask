import sqlite3
from flask import Flask, render_template, Blueprint

empresas = Blueprint('empresas', __name__)
database = 'static/core/connection/myBills.sqlite'

@empresas.route('/companies', methods=['GET'])
def getCompanies():
    
    conn = sqlite3.connect(database)
    conn.row_factory = sqlite3.Row
   
    cur = conn.cursor()
    cur.execute("select * from empresas")
   
    rows = cur.fetchall(); 
    return render_template("listCompanies.html",rows = rows) 

