<?php include('../templates/header.html');   ?>

<body>
  <?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");


  $query = "SELECT Artistas.anombre, COUNT(Creo.aid) 
  AS cantidad_de_obras FROM Artistas
  JOIN Creo ON Creo.aid = Artistas.aid GROUP BY Artistas.anombre;";
  $result = $db->prepare($query);
  $result->execute();
  $anombres = $result->fetchAll();
  ?>

  <table>
    <tr>
      <th>Nombre del Artista</th>
      <th>Cantidad de Obras</th>
    </tr>
    <?php
    foreach ($anombres as $an) {
      echo "<tr><td>$an[0]</td><td>$an[1]</td></tr>";
    }
    ?>
  </table>

  <?php include('../templates/footer.html'); ?>