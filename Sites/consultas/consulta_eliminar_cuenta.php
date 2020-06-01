<?php
  session_start();
	require("../config/conexion.php");

  $_SESSION['eliminado'] = "1";

  $user = $_SESSION["user_id"];

  $query = "DELETE FROM usuarios WHERE username = '$user';";
  $result = $db53 -> prepare($query);
  $result -> execute();


  header('Location: ../consultas/consulta_logout.php');


?>
