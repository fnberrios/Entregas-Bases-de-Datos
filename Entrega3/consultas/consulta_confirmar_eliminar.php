<?php
  session_start();
?>
<?php include('../templates/header.html');   ?>
<?php include('../templates/navbar.html'); ?>
<body>
<?php
   require("../config/conexion.php");
?>
  <form align="center" action="consulta_eliminar_cuenta.php" method="post">
  	<p>¿Seguro quieres eliminar tu cuenta?</p>
  	<p>
    <input type="submit" name="Respuesta" value="Si">
    <input type="submit" name="Respuesta" value="No">
    </p>
  </form>


<?php include('../templates/footer.html'); ?>
