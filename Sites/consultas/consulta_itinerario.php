<?php include('../templates/header.html');   ?>

<body>
  <?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");
  if (isset($_POST["artistas"]))
    $lista_artistas_2 = $_POST["artistas"];
  $lista_artistas = array();
  foreach ($lista_artistas_2 as $artista) {
    $nom = str_replace('-', ' ', $artista);
    array_push($lista_artistas, $nom);
  }
  $fecha_inicio = $_POST["fecha-inicio"];
  $c_origen = $_POST["nciudad"];
  $lista_artistas_sql = implode(',', $lista_artistas);
  echo $lista_artistas_sql;
  echo $c_origen;

  $query = "SELECT * FROM info_itinerario_dos_ciudades(string_to_array('$lista_artistas_sql',','), '$c_origen');";
  $result = $db30->prepare($query);
  $result->execute();
  $medios_precios = $result->fetchAll();
  $query = "SELECT id_itinerario, SUM(precio) AS total FROM medios_precios GROUP BY id_itinerario ORDER BY total;";
  $result = $db30->prepare($query);
  $result->execute();
  $itinerario_dos_ciudades = $result->fetchAll();
  ?>
  <table>
    <tr>
      <th>ID_Itinerario</th>
      <th>Ciudad inicial</th>
      <th>Ciudad posterior</th>
      <th>Medio</th>
      <th>Precio</th>
      <th>Duracion</th>
      <th>Hora de Salida</th>
    </tr>
    <?php
    foreach ($medios_precios as $p) {
      echo "<tr> <td>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> <td>$p[3]</td> <td>$p[4]</td> <td>$p[5]</td> <td>$p[6]</td></tr>";
    }
    ?>
  </table>

  <table>
    <tr>
      <th>ID_Itinerario</th>
      <th>Precio TotalArtistas que puedes ver</th>
    </tr>
    <?php
    foreach ($itinerario_dos_ciudades as $p) {
      echo "<tr> <td>$p[0]</td> <td>$p[1]</td></tr>";
    }
    ?>
  </table>


  <?php
  $query = "SELECT * FROM info_itinerario_tres_ciudades(string_to_array('$lista_artistas_sql',','), '$c_origen');";
  $result = $db30->prepare($query);
  $result->execute();
  $correr_funcion = $result->fetchAll();
  $query = "SELECT * FROM medios_precios;";
  $result = $db30->prepare($query);
  $result->execute();
  $medios_precios = $result->fetchAll();
  $query = "SELECT id_itinerario, SUM(precio) AS total FROM medios_precios GROUP BY id_itinerario ORDER BY total;";
  $result = $db30->prepare($query);
  $result->execute();
  $itinerario_tres_ciudades = $result->fetchAll();
  ?>
  <table>
    <tr>
      <th>ID_Itinerario</th>
      <th>Ciudad inicial</th>
      <th>Ciudad posterior</th>
      <th>Medio</th>
      <th>Precio</th>
      <th>Duracion</th>
      <th>Hora de Salida</th>
    </tr>
    <?php
    foreach ($medios_precios as $p) {
      echo "<tr> <td>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> <td>$p[3]</td> <td>$p[4]</td> <td>$p[5]</td> <td>$p[6]</td></tr>";
    }
    ?>
  </table>

  <table>
    <tr>
      <th>ID_Itinerario</th>
      <th>Precio TotalArtistas que puedes ver</th>
    </tr>
    <?php
    foreach ($itinerario_tres_ciudades as $p) {
      echo "<tr> <td>$p[0]</td> <td>$p[1]</td></tr>";
    }
    ?>
  </table>

  <?php
  $query = "SELECT * FROM info_itinerario_cuatro_ciudades(string_to_array('$lista_artistas_sql',','), '$c_origen');";
  $result = $db30->prepare($query);
  $result->execute();
  $correr_funcion = $result->fetchAll();
  $query = "SELECT * FROM medios_precios;";
  $result = $db30->prepare($query);
  $result->execute();
  $medios_precios = $result->fetchAll();
  $query = "SELECT id_itinerario, SUM(precio) AS total FROM medios_precios GROUP BY id_itinerario ORDER BY total;";
  $result = $db30->prepare($query);
  $result->execute();
  $itinerario_cuatro_ciudades = $result->fetchAll();
  ?>
  <table>
    <tr>
      <th>ID_Itinerario</th>
      <th>Ciudad inicial</th>
      <th>Ciudad posterior</th>
      <th>Medio</th>
      <th>Precio</th>
      <th>Duracion</th>
      <th>Hora de Salida</th>
    </tr>
    <?php
    foreach ($medios_precios as $p) {
      echo "<tr> <td>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> <td>$p[3]</td> <td>$p[4]</td> <td>$p[5]</td> <td>$p[6]</td></tr>";
    }
    ?>
  </table>

  <table>
    <tr>
      <th>ID_Itinerario</th>
      <th>Precio TotalArtistas que puedes ver</th>
    </tr>
    <?php
    foreach ($itinerario_cuatro_ciudades as $p) {
      echo "<tr> <td>$p[0]</td> <td>$p[1]</td></tr>";
    }
    ?>
  </table>


  <?php




  <?php include('../templates/footer.html'); ?>
