<?php include('../templates/header.html');   ?>

<body>
    <?php
    #Llama a conexión, crea el objeto PDO y obtiene la variable $mb
    require("../config/conexion.php");

    #Se obtiene el valor del input del usuario
    $pais = $_GET["pais"];
    echo $pais;

    #Se construye la consulta como un string
    $query = "SELECT anombre, onombre, lnombre, cnombre FROM Artistas
     JOIN Creo ON Artistas.aid=Creo.aid
     JOIN Obras ON Obras.oid=Creo.oid
     JOIN Lugares ON Lugares.lid=Obras.lid
     JOIN Ciudades ON Ciudades.cid=Lugares.cid
     WHERE Ciudades.cpais=$pais;";


    #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
    $result = $db30->prepare($query);
    $result->execute();
    $valores = $result->fetchAll();
    ?>

    <table>
        <tr>
            <th>Nombres de Artista </th>
            <th>Nombres de Obra </th>
            <th>Lugar donde se encuentra</th>
            <th>Ciudad donde se encuentra</th>
        </tr>

        <?php
        foreach ($valores as $v) {
            echo "<tr><td>$v[0]</td><td>$v[1]</td><td>$v[2]</td><td>$v[3]</td></tr>";
        }
        ?>

    </table>

    <?php include('../templates/footer.html'); ?>
