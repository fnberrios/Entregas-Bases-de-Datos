<?php
  session_start();
?>
<?php
include('../templates/header.html');
include('../config/call_api.php');
include('../templates/navbar.html'); ?>

<body>
	<?php
	require("../config/conexion.php");
	$user = $_SESSION['user_id'];
  $destinatario = $_POST["receptant_"];
  $mensaje = $_POST["message_"];
	?>

	<h3> Mensajería </h3>
  <?php
  echo $destinatario;
  echo $mensaje;
	?>

<?php include('../templates/footer.html'); ?>
