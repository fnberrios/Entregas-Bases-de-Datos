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

	<h3> Mensajería
	<form action="consulta_tres_api_1.php" method="post">
        </br>
        Destinatario: <input type="text" name="receptant_">
        <br/><br/>
        Cuadro de texto:
        <input type="text" name="message_" size = "200"
        style= "width : 250px" placeholder="Escribe aquí...">
        <br/><br/>
        
       
        
    </br>
    </br>
    <input type = "submit" value = "Enviar">
    </form>

<?php include('../templates/footer.html'); ?>
