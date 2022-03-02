# -*- coding: utf-8 -*-
"""
Created on Fri Nov 19 15:34:27 2021

@author: Kurni
"""

import pickle
from sklearn.naive_bayes import GaussianNB as NB
import sys
import json
import pandas  as pd
import base64

jsonData=json.loads(base64.b64decode(sys.argv[1]))

kota=str(jsonData.pop("kota"));
lenKota=len(kota)
newDataFrame={}
nameFile=str(lenKota)+kota;

allKeys=jsonData.keys()
for key in allKeys:
    newDataFrame[key]=[int(jsonData[key])]
    nameFile=nameFile+str(key)

nameFile=nameFile+str(".pkl")
nameFile=str(nameFile)

dfbaru=pd.DataFrame(newDataFrame)

modelToday= pickle.load(open("../PredictionLogic/modelTrain/Today/"+nameFile, 'rb'))
hasilPrediksiToday=modelToday.predict(dfbaru)

modelTomorrow= pickle.load(open("../PredictionLogic/modelTrain/Tomorrow/"+nameFile, 'rb'))
hasilPrediksiTomorrow=modelTomorrow.predict(dfbaru)

print(str(hasilPrediksiToday[0])+"-"+str(hasilPrediksiTomorrow[0]))


