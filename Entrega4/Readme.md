# Entrega 4: grupo 30 y grupo 53

## Rutas tipo GET
### ruta **localhost:5000** (home)
Esta ruta nos presenta un saludo inical.

### ruta **localhost:5000/messages**
Esta ruta posee dos comportamientos:
1. Presenta todos los mensajes almacenados con **localhost:5000/messages**
2. Imprime los mensajes compartidos entre dos usuarios con **localhost:5000/messages?id1=57&id2=35**. De no existir mensajes entre los usuarios imprime un aviso y si algun id ingresado no existe dira que el usuario no existe.


### ruta **localhost:5000//messages/<int:id>**
Ruta que entrega el mensaje con el mid=<id>. En caso contrario imprime que no existe dicho mensaje.

### ruta **localhost:5000/user**
Ruta que obtiene a todos los usuarios

### ruta **localhost:5000/users/<int:id>**
Ruta que entrega todos los mensajes que ha enviado el usuario con uid=<id>. En caso contrario imprime que no existe dicho usuario.

### ruta **localhost:5000/text-search**
Ruta que entrega todos los mensajes filtrados según los parametros entregados por medio de un diccionario json de la siguiente manera:

{
    "desired": ["mal"],
    "required": ["origami", "pingüino"],
    "forbbiden": ["buena"],
    "userId": 13
}

Lo que se le entrega a esta ruta por medio de postman puede variar entre diversos casos los que pasare a nombrar a continuación:
- **No se le entrega nada o se le entrega un diccionario vacio**: La ruta en este caso imprime todos los mensajes.
- **Se le entrega solo el parametro userId**: La ruta imprime todos los mensajes enviados por este usuario o si es que no lo encuentra como sender imprime un mensaje que notifica esto.
- **Caso en el que se le entrega el parametro forbidden y el userId**: La ruta revisa que el usuario aparesta como sender si no aparece arroja un mensaje de lo contrario busca todos los mensajes que no tienen palabras prohibidas y fueron enviados por "userId" y los muestra en la pantalla de Postman.
- **Caso en el que solo se le entrega el parametro forbidden**: La ruta imprime todos los mensajes que no contiene palabras prohibidas.
- **Caso en el que se le entrega una combinación de parametros**: La ruta construye un string que maneja cada uno de estos datos para luego realizar la consulta a utilizando MongoDB. En especifico este caso cubre cuando se le entregan las siguientes combinaciones: (desired, required), (desired, forbidden), (required con forbidden), (desired) y (required) para luego pasar a revisar si se le ha entregado un userId y si este efectivamente existe o no.

## Ruta tipo POST
### ruta **localhost:5000/messages**
Con esta ruta intentamos guardar un nuevo mensaje, pero primero corroboramos si el mensaje continen todos atributos solicitados. Luego,se crea un id unico para dicho mensaje. Si el formato del mensjae es errono se imprime un aviso.

## Ruta tipo DELETE
### ruta **localhost:5000/messages/<int:mid>**
Con esta ruta eliminamos un mensaje con el mid=<mid> siempre y cuando exista. De no ser asi, se avisa que no es posible eliminar dicho mensaje ya que no existe.


Para la corrección de tareas y actividades en clase tomaremos **el último commit presente en la branch `master` antes del plazo de entrega en GitHub.** Por esto, es importante que cada vez que quieras entregar un trabajo te asegures de que este se muestre en tu repositorio.

## Markdown

Este documento está escrito en Markdown. Es un **lenguaje de marcación**, como *LaTeX*. Como notarás, es bastante simple y GitHub sabe interpretarlo. Markdown es utilizado tanto en **Issues** como **Wikis**, por lo que siempre que estés en GitHub puedes contar con que puedes usarlo. Puedes utilizar [esta guía de referencia](https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet) para aprender a utilizar Markdown. También existen editores online como [dillinger.io](http://dillinger.io/) o [stackedit.io](https://stackedit.io).
