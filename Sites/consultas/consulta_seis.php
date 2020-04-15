<?php include('../templates/header.html');   ?>

<body>
    <?php
    #Llama a conexión, crea el objeto PDO y obtiene la variable $mb
    require("../config/conexion.php");


    #Se construye la consulta como un string
    $query = " SELECT Lugares.lnombre FROM Lugares
 INNER JOIN Obras ON Obras.lid=Lugares.lid
 INNER JOIN Creo ON Creo.oid=Obras.oid
 GROUP BY Lugares.lnombre 
 HAVING COUNT(DISTINCT Creo.periodo) = 
(SELECT COUNT(DISTINCT Creo.periodo) FROM Creo);";


    #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
    $result = $db->prepare($query);
    $result->execute();
    $valores = $result->fetchAll();
    ?>

    <table>
        <tr>
            <th>Nombres de los lugares que posee obras de todos
                los periodos </th>
        </tr>

        <?php
        foreach ($valores as $v) {
            echo "<tr><td>$v[0]</td></tr>";
        }
        ?>

    </table>

    <?php include('../templates/footer.html'); ?>