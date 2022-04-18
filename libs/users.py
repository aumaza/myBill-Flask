import sqlite3
from flask import Flask, render_template, Blueprint

users = Blueprint('users', __name__)
database = 'static/core/connection/myBills.sqlite'

@users.route('/users', methods=['GET'])
def getUsers():
    conn = sqlite3.connect(database)
    conn.row_factory = sqlite3.Row
   
    cur = conn.cursor()
    cur.execute("select * from usuarios")
   
    rows = cur.fetchall(); 
    return render_template('list.html',rows = rows) 
