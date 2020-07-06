<?php
  session_start();
?>
<?php include('../templates/header.html');   ?>
<?php include('../config/call_api.php');   ?>

<body>
    <?php
    #Llama a conexión, crea el objeto PDO y obtiene la variable $db
    require("../config/conexion.php");

    #Se obtiene el id del usuario
    $user = $_SESSION['user_id'];
    $query = "SELECT * FROM usuarios WHERE usuarios.uid=$user;";
    $result = $db53 -> prepare($query);
    $result -> execute();
    $dataCollected = $result -> fetchAll();
    foreach ($dataCollected as $p) {
        echo "<tr> <td>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> <td>$p[3]</td>
        <td>$p[4]</td> <td>$p[5]</td></tr>";
    }
    $data = CallAPI($GET, 'https://e5db.herokuapp.com/messages');
    $data = json_decode($data, true);
    $data_filtrada = array();
    foreach ($data as $message) {
      if ($message['receptant']==$user){
        $data_filtrada[] = $message;
      }
    }
  ?>
    <table>
      <tr>
        <th>Date</th>
        <th>Lat</th>
        <th>Long</th>
        <th>Message</th>
        <th>Mid</th>
        <th>Receptant</th>
        <th>Sender</th>
      </tr>

    <?php
    foreach ($data_filtrada as $message) {
      echo "<tr> <td>$message[0]</td> $message[1]<td> $message[2]</td> <td> $message[3]</td>
       <td>$message[4]</td> <td>$message[6]</td> <td>$message[7]</td></tr>";
    }

    ?>
    </table>

    <?php include('../templates/footer.html'); ?>
