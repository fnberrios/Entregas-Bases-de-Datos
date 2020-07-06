<?php include('../templates/header.html');   ?>


<body>
  <h3>Registro nuevo usuario</h3>
  <form align="center" action="consulta_verificar_usuario.php" method="post">
    nombre:
    <input type="text" name="name"  style="width : 250px; heigth : 1px">
    <br/><br/>
    username:
    <input type="text" name="username"  style="width : 250px; heigth : 1px">
    <br/><br/>
    contraseña:
    <input type="text" name="contrasena"  style="width : 250px; heigth : 1px">
    <br/><br/>
    correo:
    <input type="text" name="correo"  style="width : 250px; heigth : 1px">
    <br/><br/>
    dirección:
    <input type="text" name="direccion"  style="width : 250px; heigth : 1px">
    <br/><br/>

    <input type="submit" value="Enviar">
  </form>
</body>

<?php include('../templates/footer.html'); ?>
