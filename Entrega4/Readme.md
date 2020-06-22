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

### ruta **localhost:5000/messages**

### ruta **localhost:5000/messages**

## Ruta tipo POST
### ruta **localhost:5000/messages**
COn esta ruta intentamos guardar un nuevo mensaje, pero primero corroboramos si el mensaje continen todos atributos solicitados. Luego,se crea un id unico para dicho mensaje. Si el formato del mensjae es errono se imprime un aviso.

## Ruta tipo DELETE
### ruta **localhost:5000/messages/<int:mid>**
Con esta ruta eliminamos un mensaje con el mid=<mid> siempre y cuando exista. De no ser asi, se avisa que no es posible eliminar dicho mensaje ya que no existe.


Para la corrección de tareas y actividades en clase tomaremos **el último commit presente en la branch `master` antes del plazo de entrega en GitHub.** Por esto, es importante que cada vez que quieras entregar un trabajo te asegures de que este se muestre en tu repositorio.

## Markdown

Este documento está escrito en Markdown. Es un **lenguaje de marcación**, como *LaTeX*. Como notarás, es bastante simple y GitHub sabe interpretarlo. Markdown es utilizado tanto en **Issues** como **Wikis**, por lo que siempre que estés en GitHub puedes contar con que puedes usarlo. Puedes utilizar [esta guía de referencia](https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet) para aprender a utilizar Markdown. También existen editores online como [dillinger.io](http://dillinger.io/) o [stackedit.io](https://stackedit.io).
