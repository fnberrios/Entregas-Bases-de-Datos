<?php include('../templates/header.html');   ?>

<body>
    <?php
    require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db

    $query = "SELECT * FROM usuarios;";
    $result = $db53 -> prepare($query);
    $result -> execute();
    $dataCollected = $result -> fetchAll();
    foreach ($dataCollected as $p) {
        echo "<tr> <td>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> <td>$p[3]</td>
        <td>$p[4]</td> <td>$p[5]</td> <td>$p[6]</td>
        <td>$p[7]</td> <td>$p[8]</td>
        <td>$p[9]</td></tr>";
    }
    ?>
    <?php include('../templates/footer.html'); ?>
