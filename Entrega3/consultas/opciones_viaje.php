<?php include('../templates/header.html'); ?>
<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");
  
  $ciudad_o = $_POST["ciudad_origen"];
  $ciudad_d = $_POST["ciudad_destino"];
  $fecha = $_POST["fecha_viaje"];

  $query = "SELECT destinos.hora_salida, destinos.duracion,destinos.medio,destinos.precio FROM destinos,ciudades,viaje WHERE destinos.did = viaje.did AND ciudades.cid=viaje.cid AND destinos.ciudad_origen = '$ciudad_o' AND ciudades.nombreciudad = '$ciudad_d';";

  $result = $db -> prepare($query);
  $result -> execute();
  $opciones = $result -> fetchAll(); 
  $total = count($opciones);
  ?>

  <table>
    <tr>
      <th>opciones</th>
      <th>Hora de salida</th>
      <th>Duracion</th>
      <th>Medio</th>
      <th>Precio</th>
    </tr>
  </table>
  <br>
  <table>
    <?php
    if ('$ciudad_o' == '$ciudad_d'){
      echo "Debes elegir una ciudad distinta."; 
    }

    else {
      ?>
      <form align="center" action="finalizar_compra.php" method="post">
        <?php
        foreach ($total as $t) {
        echo "<tr><td>$o[0]</td><td>$o[1]</td><td>$t[2]</td><td>$t[3]</td><td>$t[4]</td></tr>";
        ?>>
      <input tupy="submit" name="Enviar">
      </form>
      <br>
      <br>
      <form action="../index.php" method="post">
        <input type="submit" name="Ir al inicio">
      </form>
      }}
    </table>
</body>
