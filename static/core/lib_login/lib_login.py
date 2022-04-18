import flask from Flask, flask_mysqldb

@app.route('/', methods=['POST'])
def appLogin(user,password):
    return 'bienvenido...'
    
