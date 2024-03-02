# Importing essential libraries
from flask import Flask, render_template, request
import pickle
import numpy as np

# Load the Random Forest CLassifier model

classifier1 = pickle.load(open('LRModel.pkl', 'rb'))
classifier2 = pickle.load(open('DTModel2.pkl', 'rb'))
classifier3 = pickle.load(open('RFModel.pkl', 'rb'))
#classifier4 = pickle.load(open('ADRModel.pkl', 'rb'))
#classifier5 = pickle.load(open('BRModel.pkl', 'rb'))
#classifier6 = pickle.load(open('KNRModel.pkl', 'rb'))
#classifier7 = pickle.load(open('VRModel.pkl', 'rb'))
#classifier8 = pickle.load(open('GBRModel.pkl', 'rb'))
#classifier9 = pickle.load(open('SVRModel.pkl', 'rb'))

app = Flask(__name__)

@app.route('/')
def home():
	return render_template('index.html')

@app.route('/predict', methods=['POST'])
def predict():
    if request.method == 'POST':
        preg = int(request.form['pregnancies'])
        glucose = int(request.form['glucose'])
        bp = int(request.form['bloodpressure'])
        st = int(request.form['skinthickness'])
        insulin = int(request.form['insulin'])
        bmi = float(request.form['bmi'])
        dpf = float(request.form['dpf'])
        age = int(request.form['age'])
        
        data = np.array([[preg, glucose, bp, st, insulin, bmi, dpf, age]])




    selected = str(request.form.get('model_select'))
    if selected == 'LogisticRegression':

        prediction=classifier1.predict(data)
        print(prediction)

    elif selected == "DecisionTrees":
        prediction=classifier2.predict(data)
        print(prediction)

    else:
        prediction=classifier3.predict(data)
        print(prediction)

        # my_prediction = classifier.predict(data)
        
        return render_template('result.html', prediction=prediction)

if __name__ == '__main__':
	app.run(debug=True)
