from flask import Flask, render_template, request, abort, json
from pymongo import MongoClient
import pandas as pd
import matplotlib.pyplot as plt
import os

# Para este ejemplo pediremos la id
# y no la generaremos automáticamente
USER_KEYS = ['uid','name', 'age', 'description']
MSG_KEYS = ['mid', 'message', 'sender','receptant','lat','long','date']

USER = "grupo30"
PASS = "grupo30"
DATABASE = "grupo30"

''' COMO CONECTARSE A NUESTRO SERVIDOR SEGUN AYUDANTÍA
uri = "mongodb://grupoXX:grupoXX@gray.ing.puc.cl/grupoXX"
# La uri 'estándar' es "mongodb://user:password@ip/database"
client = MongoClient(uri)
db = client.get_database()

'''
# El cliente se levanta en la URL de la wiki
# URL = "mongodb://grupoXX:grupoXX@gray.ing.puc.cl/grupoXX"
URL = f"mongodb://{USER}:{PASS}@gray.ing.puc.cl/{DATABASE}"
client = MongoClient(URL)
# Utilizamos la base de datos del grupo
db = client["grupo30"]
# Seleccionamos la collección de usuarios
usuarios = db.users

'''
Usuarios:
  "uid": <id del usuario>,
  "name": <nombre>,
  "last_name": <apellido>,
  "age": <edad>,
  "occupation": <a qué se dedica>,
  "follows": [<arreglo con una lista de ids de usuarios>]
'''

# Iniciamos la aplicación de flask
app = Flask(__name__)

@app.route("/")
def home():
    '''
    Página de inicio
    '''
    return "<h1>¡Hola!</h1>"

# -------------------------- RUTAS TIPO GET --------------------------

@app.route("/messages")
def messages():
    pass


@app.route("/messages/")
def messages_id():
    pass

@app.route("/users")
def users():
    '''
    Obtiene todos los usuarios
    '''
    # Omitir el _id porque no es json serializable
    resultados = list(usuarios.find({}, {"_id": 0}))
    return json.jsonify(resultados)

@app.route("/usasdfa")
def users_id():
    pass




# -------------------------- RUTAS TIPO POST --------------------------



# -------------------------- RUTAS TIPO DELETE --------------------------




if __name__ == "__main__":
    app.run()
    # app.run(debug=True) # Para debuggear!
# ¡Mucho ánimo y éxito! ¡Saludos! :D
