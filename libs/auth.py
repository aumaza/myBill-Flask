import sqlite3
from flask import Flask, render_template, Blueprint, request, redirect, session, url_for, flash

auth = Blueprint('auth', __name__)
database = 'static/core/connection/myBills.sqlite'


@auth.route('/', methods=('GET','POST'))
def login():
    if request.method == 'POST':
        username = request.form['user']
        password = request.form['pass']
               
        conn = sqlite3.connect(database)
        
        if conn:
            print('Connection Succesfully')
            #conn.row_factory = sqlite3.Row
            cur = conn.cursor()
            #db = database
            error = None
            cur.execute('SELECT * FROM usuarios WHERE usuario = ? and password = ? and role = 1', (username,password))
            
            user = cur.fetchone()
            
            if user is None:
                print('User or Password incorrect')
                return redirect(url_for('index_view.home'))
            else:
                print('El usuario existe')
                return redirect(url_for('dashview.dashView'))
                
            
        else:
            print('Connection Error')

        if error is None:
            session.clear()
            #session['user_id'] = user['id']
            return redirect(url_for('index_view.home'))

        flash(error)

    return redirect(url_for('dashview.dashView'))
   
    
    
