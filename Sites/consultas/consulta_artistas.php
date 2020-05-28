<?php include('../templates/header.html');   ?>

<body>
  <?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $nom = $_POST["artista"];
  $query = "SELECT Artistas.anombre, Artistas.nacimiento, Artistas.descripcion,
  ArtistasFallecidos.fallecimiento FROM Artistas LEFT JOIN ArtistasFallecidos ON
  Artistas.aid=ArtistasFallecidos.aid WHERE Artistas.aid ='$nom';";
  $result = $db->prepare($query);
  $result->execute();
  $dataCollected = $result->fetchAll();
  ?>

  <table>
    <tr>
      <th>Nombre del Artista</th>
      <th>Fecha de Nacimiento</th>
      <th>Descripción</th>
      <th>Fecha de Fallecimiento</th>
    </tr>
    <?php
    foreach ($dataCollected as $p) {
        echo "<tr> <td>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> <td>$p[3]</td></tr>";
    }
    ?>
  </table>

  <?php
  #Se construye la consulta como un string
  $query = "SELECT Obras.onombre, Creo.fecha_inicio, Creo.fecha_termino, Creo.periodo,
  Obras.tipo, ObrasPintura.tecnica, ObrasEscultura.material, Obras.oid FROM Obras
  INNER JOIN Creo ON Creo.oid=Obras.oid
  INNER JOIN Artistas ON Artistas.aid=Creo.aid
  LEFT JOIN ObrasPintura ON Creo.oid=ObrasPintura.oid
  LEFT JOIN ObrasEscultura ON Creo.oid=ObrasEscultura.oid
  Where Artistas.aid='$nom';";
  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
  $result = $db->prepare($query);
  $result->execute();
  $dataCollected = $result->fetchAll();
  ?>
  <table>
    <tr>
      <th>Nombre</th>
      <th>Fecha Inicio</th>
      <th>Fecha Termino</th>
      <th>Periodo</th>
      <th>Tipo</th>
      <th>Tecnica</th>
      <th>Material</th>
    </tr>
    <?php
    foreach ($dataCollected as $p) {
        echo "<tr><td><a href='consulta_obras.php?obra=$p[7]' >$p[0]</a></td> <td>$p[1]</td> <td>$p[2]</td> <td>$p[3]</td> <td>$p[4]</td> <td>$p[5]</td> <td>$p[6]</td></tr>";
    }
    ?>
  </table>

  <?php include('../templates/footer.html'); ?>
