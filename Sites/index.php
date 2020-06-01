<?php include('templates/header.html');   ?>


<a href="google.com"><img alt="" src="https://lh3.googleusercontent.com/-IhVc_Wxy6dY/AAAAAAAAAAI/AAAAAAAAAAA/fl45Fty4PEI/photo.jpg" style="width: 154px; height: 47px;" /></a>

<img src="w3schools.jpg" alt="W3Schools.com" width="104" height="142">


<body>
  <h1 align="center">AAAgencia de Viajes Splinter S.A.</h1>
  <p style="text-align:center;">¡Aquí podrás encontrar información sobre obras de arte!</p>

  <br>

  <!-------------- INGRESAR E3 ---------------->
  <h3 align="center"> Ingresa a tu cuenta</h3>
  <form align="center" action="consultas/consulta_form_ingresar.php" method="post">
    <input type="submit" value="Ingresar">
  </form>

  <br>
  <!-------------- REGISTRARSE E3 ---------------->
  <h3 align="center"> Regístrate como usuario:</h3>
  <form align="center" action="consultas/registrar.php" method="post">
    <input type="submit" value="Registrarme">
  </form>

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
  </head>


  <!-------------- Artistas ---------------->

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


  <h2 align="center">¿Quieres conocer obras que se encuentran en algun pais?</h2>
  <h3 align="center">¡Cliquea algún país en el mapa!</h3>
  <img src="img/mapa.jpeg" usemap="#mapa">
  <map name="mapa">
  <area shape="circle" coords="136,287,70" href="consultas/consulta_mapa.php?pais='Francia'">
  <area shape="circle" coords="75,125,50" href="consultas/consulta_mapa.php?pais='Inglaterra'">
  <area shape="circle" coords="266,161,60" href="consultas/consulta_mapa.php?pais='Alemania'">
  <area shape="circle" coords="307,371,50" href="consultas/consulta_mapa.php?pais='Italia'">
  <area shape="circle" coords="170,181,20" href="consultas/consulta_mapa.php?pais='Belgica'">



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
  <!-------------- CONSULTA 1 ---------------->


  <h3 align="center">¿Quieres saber todos los nombres distintos de las obras?</h3>

  <form align="center" action="consultas/consulta_uno.php" method="post">
    <input type="submit" value="Buscar">
  </form>

  <br>
  <br>
  <br>

  <!-------------- CONSULTA 2 ---------------->

  <h3 align="center"> ¿Quieres saber todos los nombres de las plazas que contengan
    al menos una escultura de “Gian Lorenzo Bernini"? </h3>

  <form align="center" action="consultas/consulta_dos.php" method="post">
    <!-- Id:
    <input type="text" name="id_elegido">
    <br /><br /> -->
    <input type="submit" value="Buscar">
  </form>

  <br>
  <br>
  <br>


  <!-------------- CONSULTA 3 ---------------->

    <h3 align="center"> ¿Quieres conocer el nombre de todos
      los museos de un país que tengan obras del renacimiento?</h3>

    <form align="center" action="consultas/consulta_tres.php" method="post">
      País:
      <input type="text" name="npais">
      <br /><br />
      <input type="submit" value="Buscar">
    </form>
    <br>
    <br>
    <br>


  <!-------------- CONSULTA 4 ---------------->

  <h3 align="center"> ¿Quieres saber, para cada artista, su nombre
    y el número de obras en las que ha participado? </h3>

  <form align="center" action="consultas/consulta_cuatro.php" method="post">
    <input type="submit" value="Buscar">
  </form>
  <br>
  <br>
  <br>


  <!-------------- CONSULTA 5 ---------------->

  <h3 align="center"> ¿Quieres conocer los nombres de las iglesias
    ubicadas en una ciudad,</h3>
  <h3 align="center"> abiertas entre algunas horas(inclusive), junto a
    todos los nombres de los frescos que se encuentra en cada una de ellas?
  </h3>

  <form align="center" action="consultas/consulta_cinco.php" method="post">
    Hora de Apertura (Formato XX:XX:XX):
    <input type="text" name="hora_apertura">
    <br /><br />
    Hora de Cierre (Formato XX:XX:XX):
    <input type="text" name="hora_cierre">
    <br /><br />
    Ciudad:
    <input type="text" name="ciudad">
    <br /><br />
    <input type="submit" value="Buscar">
  </form>
  <br>
  <br>
  <br>

  <!-------------- CONSULTA 6 ---------------->

  <h3 align="center">¿Quieres saber el nombre de cada museo, plaza o
    iglesia que tenga obras de todos los periodos del arte que existan
    en la base de datos?</h3>

  <form align="center" action="consultas/consulta_seis.php" method="post">
    <br /><br />
    <input type="submit" value="Buscar">
  </form>
  <br>
  <br>
  <br>

  <br>
</body>

</html>
