from flask import Flask, render_template, request, jsonify
import json
#function takes a template filename and a variable list of template arguments and returns the rendered template, with all the arguments replaced

app = Flask(__name__)


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

if __name__ == '__main__':
    app.run(debug=True)