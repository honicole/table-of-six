<<<<<<< HEAD
from flask import Flask, render_template, request, jsonify
import json
=======
from flask import Flask, render_template
>>>>>>> origin/master
#function takes a template filename and a variable list of template arguments and returns the rendered template, with all the arguments replaced

app = Flask(__name__)

<<<<<<< HEAD

@app.route('/')
def main():
    return render_template('signup.html')


@app.route('/calendar')
def cal():
    return render_template('calendar.html')
    
@app.route('/data')
def return_data():
	title = request.args.get('title', '')
	start_date = request.args.get('start', '')
	end_date = request.args.get('end', '')
	with open("static/events.json", "r") as input_data:
		return input_data.read()
=======
@app.route('/')
def main():
    return render_template('index.html')
>>>>>>> origin/master

if __name__ == '__main__':
    app.run(debug=True)