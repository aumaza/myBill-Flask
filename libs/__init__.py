from flask import Flask

def create_app():
    app = Flask(__name__,template_folder='../templates',static_folder='../static')
    app.config['SECRET_KEY'] = 'my_bills'
        
    from libs.empresas import empresas
    from libs.users import users
    from libs.index_view import index_view
    from libs.auth import auth
    from libs.dashboard import dash
    from libs.formularios import forms
    
    app.register_blueprint(empresas, url_prefix = '/')
    app.register_blueprint(users, url_prefix = '/')
    app.register_blueprint(index_view, url_prefix = '/')
    app.register_blueprint(auth, url_prefix = '/')
    app.register_blueprint(dash, url_prefix = '/')
    app.register_blueprint(forms, url_prefix = '/')
    
    return app
