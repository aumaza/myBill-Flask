from flask import render_template, Blueprint, request, redirect, session, url_for, flash
import sqlite3

forms = Blueprint('forms', __name__)
database = 'static/core/connection/myBills.sqlite'

@forms.route('/login')
def formLogin():
    return render_template('login.html')

@forms.route('/login', methods=['POST'])
def userLogin():
    
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
                return redirect(url_for('forms.formLogin'))
            else:
                print('El usuario existe')
                return redirect(url_for('dashview.dashView'))
                
            
        else:
            print('Connection Error')

        if error is None:
            session.clear()
            #session['user_id'] = user['id']
            return redirect(url_for('forms.formLogin'))
    
    return redirect(url_for('index_view.home'))
 
    
