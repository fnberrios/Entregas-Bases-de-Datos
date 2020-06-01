<?php
  session_start();

  require("../config/conexion.php");
  $fechainicio = $_POST["fi"];
  $fechatermino= $_POST["ft"];
  $hotel = $_SESSION['reserva'];
  $usuario_actual = $_SESSION['user_id'];
  echo "$fechainicio";
  echo "$fechatermino";
  echo "$hotel";
  echo "$usuario_actual";


  $rid = "SELECT MAX(rid)+1 FROM reservas;";
  $result1 = $db53 -> prepare($rid);
  $result1 -> execute();
  $dataCollected1 = $result1 -> fetchAll();

  foreach ($dataCollected1 as $r) {
    $rid_actual = $r[0];
  echo "$rid_actual";

  $sql1 = "INSERT INTO reservas (rid, hid, fechainicio, fechatermino) VALUES ('$rid_actual','$hotel','$fechainicio','$fechatermino')";
  $result2 = $db53 -> prepare($sql1);
  $result2 -> execute();
  $dataCollected2 = $result2 -> fetchAll();

  $sql2 = "INSERT INTO realiza (rid, uid) VALUES ('$rid_actual', '$usuario_actual')";
  $result3 = $db53 -> prepare($sql2);
  $result3 -> execute();
  $dataCollected3 = $result3 -> fetchAll();

  header('Location: consulta_hoteles.php');
?>
