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

    #Tomar los mensajes que se quiere buscar
    $d = $_POST["desired"];
    $r = $_POST["required"];
    $f = $_POST["forbidden"];
    $user = $_POST["userId"];

    // Casos cuando no me entregan el userId----------------------------------------------------------
    if (empty($_POST["userId"])){
      if(!empty($_POST["desired"]) and !empty($_POST["required"]) and !empty($_POST["forbidden"])){
        $data = array(
          'desired'     => [$d],
          'required'    => [$r],
          'forbidden'   => [$f],
        );
      }
      elseif(empty($_POST["desired"]) and !empty($_POST["required"]) and !empty($_POST["forbidden"])){
        $data = array(
          'required'    => [$r],
          'forbidden'   => [$f],
        );
      }
      elseif(!empty($_POST["desired"]) and empty($_POST["required"]) and !empty($_POST["forbidden"])){
        $data = array(
          'desired'     => [$d],
          'forbidden'   => [$f],
        );
      }
      elseif(!empty($_POST["desired"]) and !empty($_POST["required"]) and empty($_POST["forbidden"])){
        $data = array(
          'desired'     => [$d],
          'required'    => [$r],
        );
      }
      elseif(empty($_POST["desired"]) and empty($_POST["required"]) and !empty($_POST["forbidden"])){
        $data = array(
          'forbidden'   => [$f],
        );
      }
      elseif(!empty($_POST["desired"]) and empty($_POST["required"]) and empty($_POST["forbidden"])){
        $data = array(
          'desired'     => [$d],
        );
      }
      elseif(empty($_POST["desired"]) and !empty($_POST["required"]) and empty($_POST["forbidden"])){
        $data = array(
          'required'     => [$r],
        );
      }
      elseif(empty($_POST["desired"]) and empty($_POST["required"]) and empty($_POST["forbidden"])){
        $data = array(
        );
      }
    }
    // Casos cuando me entregan el userId------------------------------------------------------------------------------------
    elseif (!empty($_POST["userId"])){
      $users = (int)$user;
      if(!empty($_POST["desired"]) and !empty($_POST["required"]) and !empty($_POST["forbidden"])){
        $data = array(
          'desired'     => [$d],
          'required'    => [$r],
          'forbidden'   => [$f],
          'userId' => $users,
        );
      }
      elseif(empty($_POST["desired"]) and !empty($_POST["required"]) and !empty($_POST["forbidden"])){
        $data = array(
          'required'    => [$r],
          'forbidden'   => [$f],
          'userId' => $users,
        );
      }
      elseif(!empty($_POST["desired"]) and empty($_POST["required"]) and !empty($_POST["forbidden"])){
        $data = array(
          'desired'     => [$d],
          'forbidden'   => [$f],
          'userId' => $users,
        );
      }
      elseif(!empty($_POST["desired"]) and !empty($_POST["required"]) and empty($_POST["forbidden"])){
        $data = array(
          'desired'     => [$d],
          'required'    => [$r],
          'userId' => $users,
        );
      }
      elseif(empty($_POST["desired"]) and empty($_POST["required"]) and !empty($_POST["forbidden"])){
        $data = array(
          'forbidden'   => [$f],
          'userId' => $users,
        );
      }
      elseif(!empty($_POST["desired"]) and empty($_POST["required"]) and empty($_POST["forbidden"])){
        $data = array(
          'desired' => [$d],
          'userId' => $users,
        );
      }
      elseif(empty($_POST["desired"]) and !empty($_POST["required"]) and empty($_POST["forbidden"])){
        $data = array(
          'required' => [$r],
          'userId' => $users,
        );
      }
      elseif(empty($_POST["desired"]) and empty($_POST["required"]) and empty($_POST["forbidden"])){
        $data = array(
          'userId' => $users,
        );
      }
    }

    // echo $user;
    // echo gettype($user);
    // print_r($data);
    // echo json_encode($data);

    $options = array(
      'http' => array(
      'method'  => 'GET',
      'content' => json_encode($data),
      'header'=>  "Content-Type: application/json\r\n" .
                  "Accept: application/json\r\n"
                )
    );
    $url = 'https://e5db.herokuapp.com/text-search';
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $response = json_decode($result);

    $array = json_decode(json_encode($response), true);

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
      foreach ($array as $message) {
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
      ?>
    </table>
<?php include('../templates/footer.html'); ?>