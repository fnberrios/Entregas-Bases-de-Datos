<?php
  try {
    #Pide las variables para conectarse a la base de datos.
    require('data.php'); 
    # Se crea la instancia de PDO
    $db30 = new PDO("pgsql:dbname=$databaseName30;host=localhost;port=5432;user=$user30;password=$password30");
    $db53 = new PDO("pgsql:dbname=$databaseName53;host=localhost;port=5432;user=$user53;password=$password53");
  } catch (Exception $e) {
    echo "No se pudo conectar a la base de datos: $e";
  }
?>
