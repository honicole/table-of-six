from flask import Flask, render_template
#function takes a template filename and a variable list of template arguments and returns the rendered template, with all the arguments replaced

app = Flask(__name__)

@app.route('/')
def main():
    return render_template('index.html')

if __name__ == '__main__':
    app.run(debug=True)