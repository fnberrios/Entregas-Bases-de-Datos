<?php
  session_start();
?>
<?php include('../templates/header.html');   ?>
<?php include('../templates/navbar.html'); ?>
<body>
    <?php
    #Llama a conexión, crea el objeto PDO y obtiene la variable $db
    require("../config/conexion.php");

    $query = "SELECT hoteles.nombrehotel, ciudades.nombreciudad, paises.nombrepais, hoteles.direccionhotel, hoteles.telefono, hoteles.precio, hoteles.hid FROM ciudades, paises, hoteles WHERE hoteles.cid = ciudades.cid AND ciudades.pid = paises.pid;";
    $result = $db53->prepare($query);
    $result->execute();
    $dataCollected = $result->fetchAll();
    ?>

    <table>
        <tr>
            <th>Hotel</th>
            <th>Ciudad</th>
            <th>Pais</th>
            <th>Dirección</th>
            <th>Telefono</th>
            <th>Precio</th>
            <th>Reserva</th>

        </tr>
        <?php
        foreach ($dataCollected as $h) {
            echo "<tr> <td>$h[0]</td> <td>$h[1]</td> <td>$h[2]</td> <td>$h[3]</td>
            <td>$h[4]</td> <td>$h[5]</td> <td><a href='consulta_realizar_reserva.php?hotel=$h[6]'>reservar</a></td> </tr>";
        }
        ?>
    </table>


    <?php include('../templates/footer.html'); ?>
