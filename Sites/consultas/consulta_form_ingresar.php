<?php include('../templates/header.html');   ?>

<body>
  <h3>Ingresar</h3>
  <form align="center" action="verificar_datos.php" method="post">
    username:
    <input type="text" name="username_"  style="width : 250px; heigth : 1px" placeholder="Ingrese su username">
    <br/><br/>
    contraseña:
    <input type="password" name="contrasena_"  style="width : 250px; heigth : 1px" placeholder="Ingrese su contraseña">
    <br/><br/>

    <input type="submit" value="Enviar">
  </form>
</body>

<?php include('../templates/footer.html'); ?>
