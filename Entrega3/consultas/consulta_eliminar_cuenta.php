<?php
  session_start();
	require("../config/conexion.php");

  $_SESSION['eliminado'] = "1";

  $user = $_SESSION['user_id'];

  $query = "DELETE FROM usuarios WHERE uid = '$user';";
  $result = $db53->prepare($query);
  $result->execute();
  $dataCollected = $result -> fetchAll();


  header('Location: ../consultas/consulta_logout.php');

?>
