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
	?>

	<h3>
	<form action="consulta_tres_api_1.php" method="post">
        </br>
        Mensaje: <input type="text" size="15" maxlength="30" value="mensaje..." name="message_">
        <br/><br/>
        <input type="text" name="receptant_">
        <br/><br/>
        <input type="text" name="forbidden">
    </br>
    </br>
    <input type = "submit" value = "Enviar">
    </form>

<?php include('../templates/footer.html'); ?>
