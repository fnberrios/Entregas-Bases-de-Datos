<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");


  #Se construye la consulta como un string
 	$query = "SELECT DISTINCT onombre FROM Obras;";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result = $db -> prepare($query);
	$result -> execute();
	$obras = $result -> fetchAll();
  ?>

  <table>
    <tr>
      <th>Nombre</th>
    </tr>

      <?php
        foreach ($obras as $o) {
          echo "<tr><td>$o[0]</td></tr>";
      }
      ?>

  </table>

<?php include('../templates/footer.html'); ?>
