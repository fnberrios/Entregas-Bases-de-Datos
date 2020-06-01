<?php
  session_start();
?>
<?php include('../templates/header.html');   ?>

<body>
  <?php
    #Llama a conexión, crea el objeto PDO y obtiene la variable $db
    require("../config/conexion.php");
    $users_ = NULL;

    if (isset($_SESSION['user_id'])){
      $query = "SELECT uid,username,correo,contrasena FROM usuarios WHERE uid = :uid ;";
      $result = $db -> prepare($query);
      $result->bindParam(':uid', $_SESSION['user_id']);
      $result -> execute();
      $users_ = $result -> fetchAll();

      $query1 = "SELECT reservas.fechainicio, reservas.fechatermino, hoteles.direccionhotel  FROM realiza, reservas, hoteles WHERE realiza.uid = :uid AND realiza.rid = reservas.rid AND reservas.hid = hoteles.hid;";
      $result1 = $db -> prepare($query1);
      $result1->bindParam(':uid', $_SESSION['user_id']);
      $result1 -> execute();
      $reservas = $result1 -> fetchAll();
    }

  ?>
    <h3>Mi Perfil</h3>
    </br>
    <table>
      <tr>
        <th>Uid</th>
        <th>Username</th>
        <th>Correo</th>
        <th>Contraseña</th>
      </tr>
      <?php
      foreach ($users_ as $u) {
        echo "<tr><td>$u[0]</td><td>$u[1]</td><td>$u[2]</td><td>$u[3]</td></tr>";
      }
      ?>
    </table>
    </br>
    <table>
      <tr>
        <th>Fecha de Inicio</th>
        <th>Fecha de termino</th>
        <th>Dirección Hotel</th>
      </tr>
      <?php
      foreach ($reservas as $r) {
        echo "<tr><td>$r[0]</td><td>$r[1]</td><td>$r[2]</td></tr>";
      }
      ?>
    </table>

    <a href="logout.php">Logout</a>

<?php include('../templates/footer.html'); ?>
