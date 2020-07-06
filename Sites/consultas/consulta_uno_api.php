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
        echo $message['message'];
        echo $message['receptant'];
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
      echo "<tr> <td>$message['date']</td> $message['lat']<td> $message['long']</td> <td> $message['message']</td>
       <td>$message['mid']</td> <td>$message['receptant']</td> <td>$message['sender']</td></tr>";
    }

    ?>
    </table>

    <?php include('../templates/footer.html'); ?>
