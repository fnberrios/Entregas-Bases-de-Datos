<?php
  session_start();
?>
<?php include('../templates/header.html');   ?>
<body>
  <?php
  require("../config/conexion.php");
  $lugar_ = $_SESSION['entrada'];
  $user__ = $_SESSION['user_id'];
  echo "$lugar_";

  $date = date('Y-m-d');
  echo "$date";
  $query1 = "INSERT INTO entradas (uid, lid, fecha_actual) VALUES ($user__,'$lugar_','$date');";
  $result1 = $db30 -> prepare($query1);
  // $result1 -> bindParam(':uid', $_SESSION['user_id']); #se relacionan
  $result1 -> execute();

  ?>


<p> Su compra se ha realizado con exito </p>

<?php include('../templates/footer.html'); ?>
