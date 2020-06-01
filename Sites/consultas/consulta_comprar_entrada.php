<?php
  session_start();
?>
<?php include('../templates/header.html');   ?>

<body>
    <?php
    #Llama a conexión, crea el objeto PDO y obtiene la variable $db
    require("../config/conexion.php");

    $lugar = $_GET["lugar"];
    $date = date('Y-m-d');
    echo "$date";
    ?>


<?php include('../templates/footer.html'); ?>
