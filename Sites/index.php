<?php
  session_start();
  $user = NULL;
  if (isset($_SESSION['user_id'])){
    $user = $_SESSION['user_id'];
  }
?>
<?php include('templates/header.html');   ?>


<body>
  <h1 align="center">AAAgencia de Viajes Splinter S.A.</h1>
  <p style="text-align:center;">¡Aquí podrás encontrar información sobre obras de arte!</p>

  <br>

  <?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $mb
  require("config/conexion.php");
  #Se construye la consulta como un string
  $query = " SELECT * FROM usuarios;";
  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
  $result = $db53->prepare($query);
  $result->execute();
  $valores = $result->fetchAll();
  ?>
  <?php
  foreach ($valores as $v) {
    echo "<option value=$v[1]>$v[0]</option>";
  }
  ?>
  <!-------------- CONSULTA POR ARTISTAS E3 ---------------->

  <head>
    <style>
      h1 {
        color: blueviolet;
        font-family: verdana;
        font-size: 300%;
      }

      p {
        color: red;
        font-family: courier;
        font-size: 160%;
      }
    </style>
    <link rel="stylesheet" href="styles/barra_vertical.css">
    <link rel="stylesheet" href="styles/navbar.css">
  </head>
  <br>

  <?php
  if (!empty($user)):?>
    <nav>
      <ul class= "nav_links">
        <li><a href="index.php" class="link">Inicio</a></li>
        <li><a href="consultas/consulta_perfil.php" class="link">Perfil</a></li>
        <li><a href="consultas/consulta_hoteles.php" class="link">Hoteles</a></li>
        <li><a href="consultas/consulta_logout.php" class="link">Salir</a></li>

      </ul>
    </nav>


    <!-------------- ARTISTAS E3 ---------------->
    <?php
    #Llama a conexión, crea el objeto PDO y obtiene la variable $mb
    require("config/conexion.php");
    #Se construye la consulta como un string
    $query = " SELECT anombre, aid FROM Artistas;";
    #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
    $result = $db30->prepare($query);
    $result->execute();
    $valores = $result->fetchAll();
    ?>

    <h2 align="center">¡Conoce más sobre tus artistas favoritos!</h2>
    <h3 align="center">Selecciona un artista:</h3>
    <form align="center" action="consultas/consulta_artistas.php" method="post">
      <div style="text-align: left; margin: 1em auto; width: 10%;">
        <select name = "artista">
          <?php
          foreach ($valores as $v) {
            echo "<option value=$v[1]>$v[0]</option>";
          }
          ?>
        </select>
      </div>
      <input type="submit" value="Enviar">
    </form>

  <?php
  else:?>

    <!-------------- INGRESAR E3 ---------------->
    <h2 align="center"> Ingresa a tu cuenta</h2>
    <form align="center" action="consultas/consulta_form_ingresar.php" method="post">
      <input type="submit" value="Ingresar">
    </form>

    <br>
    <!-------------- REGISTRARSE E3 ---------------->
    <h2 align="center"> Regístrate como usuario:</h2>
    <form align="center" action="consultas/consulta_registrar.php" method="post">
      <input type="submit" value="Registrarme">
    </form>
  <?php endif;?>


    <!-------------- FUNCIONALIDAD EXTRA E3 ---------------->
  <h2 align="center">¿Quieres conocer obras que se encuentran en algun pais?</h2>
  <h3 align="center">¡Cliquea algún país en el mapa!</h3>
  <img src="img/mapa.jpeg" usemap="#mapa">
  <map name="mapa">
  <area shape="circle" coords="136,287,70" href="consultas/consulta_mapa.php?pais='Francia'">
  <area shape="circle" coords="75,125,50" href="consultas/consulta_mapa.php?pais='Inglaterra'">
  <area shape="circle" coords="266,161,60" href="consultas/consulta_mapa.php?pais='Alemania'">
  <area shape="circle" coords="307,371,50" href="consultas/consulta_mapa.php?pais='Italia'">
  <area shape="circle" coords="170,181,20" href="consultas/consulta_mapa.php?pais='Belgica'">


    <!-------------- ITINERARIOS E3 ---------------->
  <?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $mb
  require("config/conexion.php");
  #Se construye la consulta como un string
  $query = " SELECT DISTINCT ciudad_origen FROM Destinos;";
  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
  $result = $db53->prepare($query);
  $result->execute();
  $ciudades = $result->fetchAll();
  ?>
  <?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $mb
  require("config/conexion.php");
  #Se construye la consulta como un string
  $query = " SELECT anombre, aid FROM Artistas;";
  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
  $result = $db30->prepare($query);
  $result->execute();
  $valores = $result->fetchAll();
  ?>

  <h2 align="center">¡Crea tu itinerario para visitar las obras de tus artistas favoritos!</h2>
  <h3 align="center"> Selecciona los artistas: </h3>
  <form align="center" action="consultas/consulta_itinerario.php" method="post">
  <div style="text-align: left; margin: 1em auto; width: 18%;">
  <?php
  foreach ($valores as $v) {
    $nom = str_replace(' ', '-', $v[0]);
    echo "<input type= 'checkbox' name='artistas[]' value=$nom>$v[0]<br/>";
  }
  ?>
  </div>
  Ciudad de origen:
  <select name = "nciudad">
  <?php
  foreach ($ciudades as $v) {
    echo "<option value=$v[0]>$v[0]</option>";
  }
  ?>
  </select>
  <br /><br />
  Fecha de inicio:
  <input type="date" id="start" name="fecha-inicio"
         value="2020-05-28"
         min="2020-05-28" max="2999-12-31">
  <br /><br />
    <input type="submit" value="Enviar">
  </form>

  <br>
</body>

</html>

    <!-------------- COMPRAR TICKETS E3 ---------------->
  <h3 align="center"> Comprar un ticket:</h3>
  <form align="center" action="consultas/comprar_ticket.php" method="post">
    <input type="submit" value="Comprar">
  </form>
  <br>
  <br>
  <br>
