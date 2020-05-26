<?php include('../templates/header.html');   ?>

<body>
  <?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $nom = $_GET["obra"];
  $query = "SELECT Artistas.anombre, Obras.onombre, Creo.fecha_inicio, Creo.fecha_termino,
  Creo.periodo, Obras.tipo, ObrasPintura.tecnica, ObrasEscultura.material, Lugares.lnombre,
  Ciudades.cnombre, Ciudades.cpais, Lugares.lid FROM Obras
  INNER JOIN Creo ON Creo.oid=Obras.oid
  INNER JOIN Lugares ON Obras.lid=Lugares.lid
  INNER JOIN Ciudades ON Ciudades.cid=Lugares.cid
  INNER JOIN Artistas ON Artistas.aid=Creo.aid
  LEFT JOIN ObrasPintura ON Creo.oid=ObrasPintura.oid
  LEFT JOIN ObrasEscultura ON Creo.oid=ObrasEscultura.oid
  Where Obras.oid='$nom';";
  $result = $db->prepare($query);
  $result->execute();
  $dataCollected = $result->fetchAll();
  ?>

  <table>
    <tr>
      <th>Nombre del Artista</th>
      <th>Nombre de la Obra</th>
      <th>Fecha Inicio</th>
      <th>Fecha Termino</th>
      <th>Periodo</th>
      <th>Tipo</th>
      <th>Tecnica</th>
      <th>Material</th>
      <th>Nombre Lugar</th>
      <th>Nombre Ciudad</th>
      <th>Nombre Pais</th>
    </tr>
    <?php
    foreach ($dataCollected as $p) {
        echo "<tr> <td>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> <td>$p[3]</td>
         <td>$p[4]</td> <td>$p[5]</td> <td>$p[6]</td> <td>$p[7]</td>
         <td><a href='consulta_lugares.php?lugar=$p[11]' >$p[8]</td>
          <td>$p[9]</td> <td>$p[10]</td></tr>";
    }
    ?>
  </table>
  <?php include('../templates/footer.html'); ?>
