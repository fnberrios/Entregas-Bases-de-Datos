<?php
   session_start();
?>

<?php include('../templates/header.html');   ?>
<?php include('../config/call_api.php');   ?>

<body>
    <?php
    #Llama a conexión, crea el objeto PDO y obtiene la variable $db
    require("../config/conexion.php");

    #Tenemos el id del usuario 
    $user = $_SESSION['user_id'];
    ?>

    <h3> Que mensajes deseas ingresar
    <form action="consulta_cuatro_api_2.php" method="post">
    Buscar: <input type="text" name="messages_f">
    </br>
    <input type = "submit" value = "Buacar">
    </form>

<?php include('../templates/footer.html'); ?>
