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

    <h3> Que mensajes deseas buscar:
    <form action="consulta_cuatro_api_2.php" method="get">
        </br>
        Deseado: <input type="text" name="desired">
        </br>
        Requerido: <input type="text" name="required">
        </br>
        Prohibido: <input type="text" name="forbidden">
    </br>
    </br>
    <input type = "submit" value = "Buscar">
    </form>

<?php include('../templates/footer.html'); ?>
