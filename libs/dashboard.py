from flask import Blueprint, render_template, url_for

dash = Blueprint('dashview', __name__)

@dash.route('/dashview')
def dashView():
    return render_template('main.html') 
