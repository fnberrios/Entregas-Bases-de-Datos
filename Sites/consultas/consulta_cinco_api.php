<?php
  session_start();
?>
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
  $user =  $_SESSION["user_id"];
  $data = arra('id'= $user);
  $query =  CallApi($GET, 'https://e5db.herokuapp.com/messages/', $data);
  echo $query;
  # CONSULTAS A LA API

  ?>

  <?php include('../templates/footer.html'); ?>