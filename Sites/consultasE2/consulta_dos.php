<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");


 	$query = "SELECT Lugares.lnombre FROM Artistas
    JOIN Creo ON Artistas.aid = Creo.aid 
    JOIN Obras ON Obras.oid = Creo.oid
    JOIN Lugares ON Obras.lid = Lugares.lid 
    WHERE Lugares.tipo = 'plaza' AND
    Artistas.anombre = 'Gian Lorenzo Bernini' AND Obras.tipo = 'escultura';";
	$result = $db -> prepare($query);
	$result -> execute();
	$lnombres = $result -> fetchAll();
  ?>

	<table>
    <tr>
      <th>Nombres de los lugares</th>
    </tr>
  <?php
	foreach ($lnombres as $ln) {
  		echo "<tr><td>$ln[0]</td></tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>
