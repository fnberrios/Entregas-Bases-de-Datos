<?php 
include('../templates/header.html');
include('../config/call_api.php');   
?>

<?php
  session_start();
?>

<body>
  <?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $fecha_inicio = $_POST["fecha-inicio"];
  $fecha_final =  $_POST["fecha-final"];
  $user =  $_SESSION["user_id"];
  $query =  CallApi($GET, 'https://e5db.herokuapp.com/messages/$user');
  # CONSULTAS A LA API

  ?>

  <?php include('../templates/footer.html'); ?>
