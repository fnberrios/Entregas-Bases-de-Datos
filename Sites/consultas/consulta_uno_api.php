<?php
  session_start();
?>
<?php include('../templates/header.html');   ?>
<?php include('../config/call_api.php');   ?>
<?php include('../templates/navbar.html'); ?>
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
        echo "
        <tr>
        <td>'".$message['date']."'</td>
        <td>'".$message['lat']."'</td>
        <td>'".$message['long']."'</td>
        <td>'".$message['message']."'</td>
        <td>'".$message['mid']."'</td>
        <td>'".$message['receptant']."'</td>
        <td>'".$message['sender']."'</td>
        </tr>
        ";
      }
    }
  ?>

    </table>

    <?php include('../templates/footer.html'); ?>
