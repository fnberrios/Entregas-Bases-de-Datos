<?php include('../templates/header.html');   ?>

<body>

  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db

  $name = $_POST["name"];
  $user_ = $_POST["username"];
  $contrasena = $_POST["contrasena"];
  $correo = $_POST["correo"];
  $direccion = $_POST["direccion"];

  $query = "SELECT username FROM usuarios WHERE username = '$user_';";
  $result = $db53 -> prepare($query);
  $result -> execute();
  $dataCollected = $result -> fetchAll();
  $fila = count($dataCollected);#Obtiene todos los resultados de la consulta en forma de un arreglo

  if ($fila >= 1) {
    echo "Lo siento. Este nombre de usuario ya fue registrado. Intente con otro.";
  }
  else {
  	require("../config/conexion.php");
  	$uid = "SELECT MAX(uid)+1 FROM usuarios;";
    $result1 = $db53 -> prepare($uid);
    $result1 -> execute();
    $dataCollected1 = $result1 -> fetchAll();

    foreach ($dataCollected1 as $d) {
      $uid_actual = $d[0];
  }

    $sql = "INSERT INTO usuarios (uid,nombreusuario,username,correo,direccionusuario,contrasena) VALUES ('$uid_actual','$name','$user_','$correo','$direccion','$contrasena')";
    $result2 = $db53 -> prepare($sql);
    $result2 -> execute();
    $dataCollected2 = $result2 -> fetchAll();


  	echo "Su usuario a sido registrado.";
  }
  ?>

<?php include('../templates/footer.html'); ?>
