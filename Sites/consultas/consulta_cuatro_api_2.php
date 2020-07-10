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
    $user = $_GET['user_id'];
    echo gettype($d);

    $data = array(
      'desired'     => [$d],
      'required'    => [$r],
      'forbidden'   => [$f],
      'userId' => $user,
    );
    print_r($data);

    $options = array(
      'http' => array(
      'method'  => 'GET',
      'content' => json_encode( $data ),
      'header'=>  "Content-Type: application/json\r\n" .
                  "Accept: application/json\r\n"
                )
    );
    $url = 'https://e5db.herokuapp.com/text-search';
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $response = json_decode($result);
    // echo json_encode($result);
    echo $response;

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
    $prueba = json_encode($result);
    ?>

    <table>
      <tr>
        <th>Date</th>
        <th>Message</th>
        <th>Receptant</th>
        <th>Sender</th>
      </tr>
      <?php
      foreach ($prueba as $message) {
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
