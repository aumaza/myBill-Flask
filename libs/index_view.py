from flask import Blueprint, render_template, url_for

index_view = Blueprint('index_view', __name__)

@index_view.route('/')
def home():
    return render_template('index.html')
