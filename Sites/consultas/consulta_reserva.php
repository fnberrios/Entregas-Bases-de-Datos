<?php
  session_start();
?>
<?php include('../templates/header.html');   ?>
<?php include('../templates/navbar.html'); ?>
<body>
<?php
   require("../config/conexion.php");
   $fechainicio = $_POST["fi"];
   $fechatermino= $_POST["ft"];
   $hotel = $_SESSION['reserva'];
?>
<h3 align="center">Ingrese el periodo de reserva</h3>

<form align="center" action="consultas/consulta_6.php" method="post">
  Fecha inicio:
  <input type="text" name="fi">
  <br/><br/>
  Fecha termino:
  <input type='text' name='ft'>
  <br>
  <input type="submit" value="Buscar">
</form>


<?php include('../templates/footer.html'); ?>
