from flask import Flask, redirect, url_for
from sqlalchemy_utils import database_exists, create_database
from config import Configuration
from flask import render_template
from flask import request
from flask_sqlalchemy import SQLAlchemy
from datetime import datetime
import time


app = Flask(__name__, template_folder='template')

if not database_exists('mysql+mysqlconnector://root:root@172.17.0.1/test1'):
	create_database('mysql+mysqlconnector://root:root@172.17.0.1/test1')

app.config.from_object(Configuration)
db = SQLAlchemy(app)

class User(db.Model):
    key = db.Column(db.Integer, primary_key=True)
    ip = db.Column(db.String(16))
    ua = db.Column(db.String(1000))
    ref = db.Column(db.String(50))
    id = db.Column(db.String(20))
    url = db.Column(db.String(100))
    created = db.Column(db.DateTime, default=datetime.now())

    
    def __init__(self, *args, **kwargs):
        super(User, self).__init__(*args, **kwargs) 


db.create_all()
db.session.commit()

@app.route('/') 
def index():
    ip = request.remote_addr                     #  request.environ['REMOTE_ADDR']
    ua =  request.headers.get('User-Agent')       #  request.user_agent       request.headers.get('User-Agent')
    ref = request.referrer or None
    id = request.args.get('id')
    url = request.url
    
    guest = User(ip = ip,ua = ua, ref = ref,id=id, url=url)
    db.session.add(guest)
    db.session.commit()
    
    return render_template('index.html', ip=ip, ua=ua, ref = ref, id=id, url=url)

    # time.sleep(2)
    # return redirect("https://vk.com/")


if (__name__ == "__main__"):
    app.run(debug=True, host='0.0.0.0', port=5001)
