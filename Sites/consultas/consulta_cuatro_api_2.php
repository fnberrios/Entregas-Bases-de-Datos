<?php
  session_start();
?>
<?php include('../templates/header.html');   ?>
<?php include('../config/call_api.php');   ?>

<body>
    <?php
    #Llama a conexión, crea el objeto PDO y obtiene la variable $db
    require("../config/conexion.php");

    #Tomar los mensajes que se quiere buscar
    $d = $_GET["desired"];
    $r = $_GET["required"];
    $f = $_GET["forbidden"];
    $user = $_SESSION['user_id'];
    
    #Se obtiene todos los datos de los mensajes
    $query = CallAPI($GET, 'https://e5db.herokuapp.com/messages');
    $data = json_decode($query, true);

    $filtro = {}

    foreach ($data as $d) {
        #Si me dan las 3 claves
        if $d != NULL and $r != NULL and $f != NULL{
            if ($data['sender'] == $user) or ($data['receptant'] == $user) {
                }
        #Si ne dan solo 2 claves
        elseif ($d != NULL) or ($f != NULL){
            
        }        

        #si me dan 
    }
    ?>

    <table>
      <tr>
        <th>Date</th>
        <th>Message</th>
        <th>Receptant</th>
        <th>Sender</th>
      </tr>
      <?php

      ?>
    </table>

    
