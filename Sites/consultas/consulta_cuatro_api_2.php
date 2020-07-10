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
    $d = $_POST["desired"];
    $r = $_POST["required"];
    $f = $_POST["forbidden"];
    $user = $_POST["userId"];
    if (empty($_POST["userId"])){
      $data = array(
        'desired'     => [$d],
        'required'    => [$r],
        'forbidden'   => [$f],
        'userId' => $user,
      );
    }
    else{
      $user = (int)$user;
      $data = array(
        'desired'     => [$d],
        'required'    => [$r],
        'forbidden'   => [$f],
        'userId' => $user,
      );

    }

    echo $user;
    echo gettype($user);

    // $data = array(
    //   'desired'     => [$d],
    //   'required'    => [$r],
    //   'forbidden'   => [$f],
    //   'userId' => $user,
    // );
    print_r($data);
    echo json_encode($data);

    $options = array(
      'http' => array(
      'method'  => 'GET',
      'content' => json_encode($data),
      'header'=>  "Content-Type: application/json\r\n" .
                  "Accept: application/json\r\n"
                )
    );
    $url = 'https://e5db.herokuapp.com/text-search/';
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $response = json_decode($result);

    // echo $result;
    echo $context;
    print_r($context);
    echo json_encode($context);

    // echo json_encode($result);


    // echo print_r($response);
    // $array = json_decode(json_encode($response), true);

    // echo var_dump($data);



    #Se obtiene todos los datos de los mensajes
    // $query = CallAPI($GET, 'https://e5db.herokuapp.com/messages');
    // $data = json_decode($query, true);
    //
    // $filtro = {}
    //
    // foreach ($data as $d) {
    //     #Si me dan las 3 claves
    //     if $d != NULL and $r != NULL and $f != NULL{
    //         if ($data['sender'] == $user) or ($data['receptant'] == $user) {
    //             }
    //     #Si ne dan solo 2 claves
    //     elseif ($d != NULL) or ($f != NULL){
    //
    //     }
    //
    //     #si me dan
    // }

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
