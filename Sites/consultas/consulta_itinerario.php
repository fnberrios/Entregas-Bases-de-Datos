<?php include('../templates/header.html');   ?>

<body>
  <?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");
  if (isset($_POST["artistas"]))
    $lista_artistas_2 = $_POST["artistas"];
    $lista_artistas=ARRAY();
    foreach ($lista_artistas_2 as $artista){
      $nom = str_replace('-', ' ', $artista);
      array_push($lista_artistas, $nom);
    }
  echo $lista_artistas[0];
  echo $lista_artistas[1];
  echo $lista_artistas;
  $fecha_inicio = $_POST["fecha-inicio"];
  $c_origen = $_POST["nciudad"];
  print_r ($lista_artistas);
  echo gettype($lista_artistas);
  echo gettype($lista_artistas[0]);
  echo gettype($c_origen);
  # $lista_artistas_sql = '{' + implode(",", $lista_artistas) + '}';
  $query = "SELECT * FROM itinerario_dos_ciudades({$lista_artistas_sql}, '$c_origen');";
  $result = $db30->prepare($query);
  $result->execute();
  $itinerario_dos_ciudades = $result->fetchAll();
  ?>
  <table>
    <tr>
      <th>Listado de Ciudades</th>
      <th>Artistas que puedes ver</th>
    </tr>
    <?php
    foreach ($itinerario_dos_ciudades as $p) {
      echo "<tr> <td>$p[0]</td> <td>$p[1]</td></tr>";
    }
    ?>
  </table>



  <?php
  $query = "SELECT * FROM itinerario_tres_ciudades('$lista_artistas', '$ciudad_origen');";
  $result = $db30->prepare($query);
  $result->execute();
  $itinerario_tres_ciudades = $result->fetchAll();
  ?>
  <table>
    <tr>
      <th>Listado de Ciudades</th>
      <th>Artistas que puedes ver</th>
    </tr>
    <?php
    foreach ($itinerario_tres_ciudades as $p) {
      echo "<tr> <td>$p[0]</td> <td>$p[1]</td></tr>";
    }
    ?>
  </table>



  <?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  $query = "SELECT * FROM itinerario_cuatro_ciudades('$lista_artistas', '$ciudad_origen');";
  $result = $db30->prepare($query);
  $result->execute();
  $itinerario_cuatro_ciudades = $result->fetchAll();
  ?>
  <table>
    <tr>
      <th>Listado de Ciudades</th>
      <th>Artistas que puedes ver</th>
    </tr>
    <?php
    foreach ($itinerario_cuatro_ciudades as $p) {
      echo "<tr> <td>$p[0]</td> <td>$p[1]</td></tr>";
    }
    ?>
  </table>



  <?php include('../templates/footer.html'); ?>
