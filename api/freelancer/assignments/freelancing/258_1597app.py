from flask import Flask,render_template,request,redirect
# from flask_cors import CORS,cross_origin
import pickle
import pandas as pd
import numpy as np

app=Flask(__name__)
model1=pickle.load(open('LRModel.pkl','rb'))
model2=pickle.load(open('small models/DTModel.pkl','rb'))
model3=pickle.load(open('small models/RFModel.pkl','rb'))
model4=pickle.load(open('small models/ADRModel.pkl','rb'))
model5=pickle.load(open('small models/BRModel.pkl','rb'))
model6=pickle.load(open('small models/KNRModel.pkl','rb'))
model7=pickle.load(open('small models/VRModel.pkl','rb'))
# model8=pickle.load(open('small models/BGRModel.pkl','rb'))

crop=pd.read_csv('crop_production.csv')



@app.route('/',methods=['GET','POST'])

def Home():
    return render_template('index.html')
def index():
    State_Names=sorted(crop['State_Name'].unique())
    District_Names=sorted(crop['District_Name'].unique())
    Crop_Years=sorted(crop['Crop_Year'].unique(),reverse=True)
    Seasons=crop['Season'].unique()
    Crops=crop['Crop'].unique()
    

    # companies.insert(0,'Select Company')
    return render_template('index.html',State_Names=State_Names, District_Names=District_Names, Crop_Years=Crop_Years,Seasons=Seasons,Crops=Crops)


@app.route('/predict',methods=['POST'])
# @cross_origin()
def predict():

    State_Name=request.form.get('State_Name')
    District_Name=request.form.get('District_Name')
    Crop_Year=request.form.get('Crop_Year')
    Season=request.form.get('Season')
    Crop=request.form.get('Crop')
    Area=request.form.get('Area')

    selected = str(request.form.get('model_select'))

    if selected == 'LR':

        prediction=model1.predict(pd.DataFrame(columns=['State_Name', 'District_Name', 'Crop_Year', 'Season', 'Crop','Area'],data=np.array([State_Name,District_Name,Crop_Year,Season,Crop,Area]).reshape(1, 6)))
        print(prediction)

    elif selected == "DT":
        prediction=model2.predict(pd.DataFrame(columns=['State_Name', 'District_Name', 'Crop_Year', 'Season', 'Crop','Area'],data=np.array([State_Name,District_Name,Crop_Year,Season,Crop,Area]).reshape(1, 6)))
        print(prediction)

    elif selected == "RF":
        prediction=model3.predict(pd.DataFrame(columns=['State_Name', 'District_Name', 'Crop_Year', 'Season', 'Crop','Area'],data=np.array([State_Name,District_Name,Crop_Year,Season,Crop,Area]).reshape(1, 6)))
        print(prediction)  

    elif selected == "ADR":
        prediction=model4.predict(pd.DataFrame(columns=['State_Name', 'District_Name', 'Crop_Year', 'Season', 'Crop','Area'],data=np.array([State_Name,District_Name,Crop_Year,Season,Crop,Area]).reshape(1, 6)))
        print(prediction)  

    elif selected == "BR":
        prediction=model5.predict(pd.DataFrame(columns=['State_Name', 'District_Name', 'Crop_Year', 'Season', 'Crop','Area'],data=np.array([State_Name,District_Name,Crop_Year,Season,Crop,Area]).reshape(1, 6)))
        print(prediction)

    elif selected == "KNR":
        prediction=model6.predict(pd.DataFrame(columns=['State_Name', 'District_Name', 'Crop_Year', 'Season', 'Crop','Area'],data=np.array([State_Name,District_Name,Crop_Year,Season,Crop,Area]).reshape(1, 6)))
        print(prediction)

    elif selected == "VR":
        prediction=model7.predict(pd.DataFrame(columns=['State_Name', 'District_Name', 'Crop_Year', 'Season', 'Crop','Area'],data=np.array([State_Name,District_Name,Crop_Year,Season,Crop,Area]).reshape(1, 6)))
        print(prediction)

    else:
        prediction=model8.predict(pd.DataFrame(columns=['State_Name', 'District_Name', 'Crop_Year', 'Season', 'Crop','Area'],data=np.array([State_Name,District_Name,Crop_Year,Season,Crop,Area]).reshape(1, 6)))
        print(prediction)


    return str(np.round(prediction[0],2))




if __name__=='__main__':
    app.run()