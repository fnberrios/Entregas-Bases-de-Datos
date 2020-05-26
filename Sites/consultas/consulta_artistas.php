<?php include('../templates/header.html');   ?>

<body>
  <?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $nom = $_GET["artista"];
  $query = "SELECT * FROM Artistas LEFT JOIN ArtistasFallecidos WHERE anombre ='$nom'
   AND Artistas.aid=ArtistasFallecidos.aid;";
  $result = $db->prepare($query);
  $result->execute();
  $dataCollected = $result->fetchAll();
  ?>

  <table>
    <tr>
      <th>aid</th>
      <th>Nombre del Artista</th>
      <th>Fecha de Nacimiento</th>
      <th>Descripción</th>
    </tr>
    <?php
    foreach ($dataCollected as $p) {
        echo "<tr> <td>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> <td>$p[3]</td></tr>";
    }
    ?>
  </table>

  <?php include('../templates/footer.html'); ?>
