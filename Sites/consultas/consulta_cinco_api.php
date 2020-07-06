<?php 
include('../templates/header.html');
include('../config/call_api.php');   
?>

<body>
  <?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $fecha_inicio = $_POST["fecha-inicio"];
  $fecha_final =  $_POST["fecha-final"];
  $data = array('id'=>1)
  $query =  CallApi($POST, 'https://e5db.herokuapp.com/messages/', $data);
  # CONSULTAS A LA API





  ?>

  <?php include('../templates/footer.html'); ?>
