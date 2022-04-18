from flask import Flask
app = Flask(__name__)

import sys
sys.path.append('../../main')
import main
 
