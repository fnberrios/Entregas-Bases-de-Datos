<?php include('../templates/header.html');   ?>

<body>
    <?php
    #Llama a conexión, crea el objeto PDO y obtiene la variable $mb
    require("../config/conexion.php");

    #Se obtiene el valor del input del usuario
    $pais = $_POST["npais"];

    #Se construye la consulta como un string
    $query = "SELECT DISTINCT lnombre FROM Lugares
    JOIN Ciudades ON Ciudades.cid = Lugares.cid
    JOIN Obras ON Obras.lid = Lugares.lid
    JOIN Creo ON Creo.oid = Obras.oid 
    WHERE Lugares.tipo = 'museo' AND Creo.periodo = 'Renacimiento'
    AND Ciudades.cpais = '$pais';";
    

    #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
    $result = $db->prepare($query);
    $result->execute();
    $museos = $result->fetchAll();
    ?>

    <table>
        <tr>
            <th>Nombres de los museos </th>
        </tr>

        <?php
        foreach ($museos as $m) {
            echo "<tr><td>$m[0]</td></tr>";
        }
        ?>

    </table>

    <?php include('../templates/footer.html'); ?>