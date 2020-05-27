<?php include('../templates/header.html');   ?>

<body>
  <?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");
  if(isset($_POST["artistas"]))
      echo $_POST["artistas"][0];
  ?>

  <?php include('../templates/footer.html'); ?>
