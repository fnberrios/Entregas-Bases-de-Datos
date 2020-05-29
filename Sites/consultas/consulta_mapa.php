<?php include('../templates/header.html');   ?>

<body>
    <?php
    #Llama a conexión, crea el objeto PDO y obtiene la variable $mb
    require("../config/conexion.php");

    #Se obtiene el valor del input del usuario
    $nom = $_GET["pais"];

    #Se construye la consulta como un string
    $query = "SELECT Lugares.lnombre, Obras.onombre FROM
    Lugares INNER JOIN LugaresIglesia ON
    Lugares.lid = LugaresIglesia.lid
    INNER JOIN Obras ON Obras.lid = Lugares.lid
    INNER JOIN Ciudades ON Ciudades.cid = Lugares.cid
    WHERE upper(Ciudades.cnombre) LIKE upper('%$city%')
    AND LugaresIglesia.hora_apertura <= '$open' AND
    LugaresIglesia.hora_cierre
    >= '$cierre' AND Obras.tipo = 'fresco';";


    #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
    $result = $db->prepare($query);
    $result->execute();
    $valores = $result->fetchAll();
    ?>

    <table>
        <tr>
            <th>Nombres de las iglesias </th>
            <th>Nombres de los frescos </th>
        </tr>

        <?php
        foreach ($valores as $v) {
            echo "<tr><td>$v[0]</td><td>$v[1]</td></tr>";
        }
        ?>

    </table>

    <?php include('../templates/footer.html'); ?>
