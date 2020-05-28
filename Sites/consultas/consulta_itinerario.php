<?php include('../templates/header.html');   ?>

<body>
  <?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");
  if(isset($_POST["artistas"]))
    foreach ($_POST["artistas"] as $artista) {
      echo $artista;
    }
    $fecha_inicio = $_POST["fecha-inicio"];
    echo $fecha_inicio;
    $ciudad = $_POST["nciudad"];
    echo $ciudad;
  ?>

  <?php include('../templates/footer.html'); ?>
