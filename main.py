from flask import Flask, render_template
from libs import create_app

app = create_app()

if __name__ == '__main__':
    app.run(None, 3000, True) 
  
