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
mensajes = db.messages

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
app.config['JSONIFY_PRETTYPRINT_REGULAR'] = True


@app.route("/")
def home():
    '''
    Página de inicio
    '''
    return "<h1>¡Hola!</h1>"

# -------------------------- RUTAS TIPO GET --------------------------

@app.route("/messages/<id1>")
def messages_intercambiados(id1):
    print(f'id: {id1} y id2. ')
    resultados = list(mensajes.find({'sender': int(id1)}, {'_id': 0}))
    return json.jsonify(resultados)


@app.route("/users")
def users():
    '''
    Obtiene todos los usuarios
    '''
    resultados = list(usuarios.find({},{'_id': 0}))
    return json.jsonify(resultados)

@app.route("/users/<id>")
def users_id(id):
    print(f'El id recibido es: {type(id)} {id}')
    user = list(usuarios.find({'uid': int(id)}, {'_id': 0}))
    mensajes_enviados = list(mensajes.find({'sender': int(id)}, {'_id': 0, 'message': 1}))
    todos_los_mensajes = []
    for enviado in mensajes_enviados:
        el_msn_es = enviado['message']
        todos_los_mensajes.append(el_msn_es)
    user[0]['mensajes_enviados'] = todos_los_mensajes

    return json.jsonify(user)




# -------------------------- RUTAS TIPO POST --------------------------



# -------------------------- RUTAS TIPO DELETE --------------------------




if __name__ == "__main__":
    app.run()
    # app.run(debug=True) # Para debuggear!
# ¡Mucho ánimo y éxito! ¡Saludos! :D
