<?php include('templates/header.html');   ?>

<body>
  <h1 align="center">Obras de Arte</h1>
  <p style="text-align:center;">Aquí podrás encontrar información sobre obras de arte.</p>

  <br>

  <h3 align="center"> Todos los Nombres Distintos de las Obras de Arte</h3>

  <form align="center" action="consultas/consulta_obras.php" method="post">
    <input type="submit" value="Buscar">
  </form>

  <br>
  <br>
  <br>

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

  <h3 align="center"> Ingrese el nombre de un país. Muestre el nombre de todos 
    los museos de ese pa ́ıs que tengan obras del renacimiento.</h3>

  <form align="center" action="consultas/consulta_altura.php" method="post">
    Altura Mínima:
    <input type="text" name="pais">
    <br /><br />
    <input type="submit" value="Buscar">
  </form>
  <br>
  <br>
  <br>

  <h3 align="center">¿Quieres buscar todos los pokemones por tipo?</h3>

  <?php
  #Primero obtenemos todos los tipos de pokemones
  require("config/conexion.php");
  $result = $db->prepare("SELECT DISTINCT tipo FROM ejercicio_ayudantia;");
  $result->execute();
  $dataCollected = $result->fetchAll();
  ?>

  <form align="center" action="consultas/consulta_tipo.php" method="post">
    Seleccinar un tipo:
    <select name="tipo">
      <?php
      #Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
      foreach ($dataCollected as $d) {
        echo "<option value=$d[0]>$d[0]</option>";
      }
      ?>
    </select>
    <br><br>
    <input type="submit" value="Buscar por tipo">
  </form>

  <br>
  <br>
  <br>
  <br>
</body>

</html>