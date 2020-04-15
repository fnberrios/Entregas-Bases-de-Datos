<?php include('templates/header.html');   ?>

<body>
  <h1 align="center">Agencia de Viajes Tía Ale</h1>
  <p style="text-align:center;">¡Aquí podrás encontrar información sobre obras de arte!</p>

  <br>

  <!-------------- CONSULTA 1 ---------------->


  <h3 align="center"> Todos los Nombres Distintos de las Obras de Arte</h3>

  <form align="center" action="consultas/consulta_uno.php" method="post">
    <input type="submit" value="Buscar">
  </form>

  <br>
  <br>
  <br>

  <!-------------- CONSULTA 2 ---------------->

  <h3 align="center"> Muestre todos los nombres de las plazas que contengan
    al menos una escultura de “Gian Lorenzo Bernini" </h3>

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

  <h3 align="center"> Ingrese el nombre de un país. Muestre el nombre de todos
    los museos de ese país que tengan obras del renacimiento.</h3>

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

  <h3 align="center"> Para cada artista, entregue su nombre
    y el número de obras en las que ha participado. </h3>

  <form align="center" action="consultas/consulta_cuatro.php" method="post">
    <input type="submit" value="Buscar">
  </form>
  <br>
  <br>
  <br>


  <!-------------- CONSULTA 5 ---------------->

  <h3 align="center"> Ingrese una hora de apertura en formatohh:mm:ss,
    una hora de cierre y una ciudad. Muestre los nombres de las iglesias
    ubicadas en esa ciudad, abiertas entre esas horas(inclusive) junto a
    todos los nombres de los frescos que encuentra en cada una de ellas.
    Una fila por cada tupla.</h3>

  <form align="center" action="consultas/consulta_cinco.php" method="post">
    Hora de Apertura:
    <input type="text" name="hora_apertura">
    <br /><br />
    Hora de Cierre:
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

  <h3 align="center">Encuentre el nombre de cada museo, plaza o
    iglesia que tenga obras de todos los periodos del arte que existan
    en la base de datos.</h3>

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
