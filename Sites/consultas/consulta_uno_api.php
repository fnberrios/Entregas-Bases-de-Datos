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
    $data = CallAPI($GET, 'https://e5db.herokuapp.com/messages');
    $data = json_decode($data, true);
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

    foreach ($data as $message) {
      if ($message['receptant']==$user){
        print_r($message);
        $msn = array_values($message);
        print_r($msn);
        "<tr><td>$msn[0]</td> <td>$msn[1]</td> <td>$msn[2]</td> <td>$msn[3]</td> <td>$msn[4]</td> <td>$msn[5]</td></tr>";
      }
    }
  ?>

    </table>

    <?php include('../templates/footer.html'); ?>
