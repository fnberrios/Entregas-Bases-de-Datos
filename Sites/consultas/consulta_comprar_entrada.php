<?php
  session_start();


require("../config/conexion.php");

$lugar = $_GET["lugar"];
$date = date('Y-m-d');
$query1 = "INSERT INTO entradas (uid, lid, fecha_actual) VALUES (:uid,'$lugar','$fecha_actual')";
$result1 = $db30 -> prepare($query1);
$result1->bindParam(':uid', $_SESSION['user_id']); #se relacionan
$result1 -> execute();

?>
<?php include('../templates/header.html');   ?>

<p> Su compra se ha realizado con exito </p>

<?php include('../templates/footer.html'); ?>
