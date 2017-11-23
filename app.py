from flask import Flask, render_template, json, request
app = Flask(_name_)

@app.route('/')
def main():
    return render_template('index.html')

@app.route('/signup',methods=['POST','GET'])
def signup():
    if request.method == 'POST':
        return redirect(url_for('index'))
    return render_template('signup.html')

@app.route('/signup2',methods=['POST','GET'])
def signup2():
    if request.method == 'POST':
        return redirect(url_for('index'))
    return render_template('signin.html')

if _name_ == "_main_":
    app.run(port=5002)