<?php
  session_start();
?>
<?php
include('../templates/header.html');
include('../config/call_api.php');
include('../templates/navbar.html'); ?>

<body>
	<?php
	require("../config/conexion.php");

  //Datos otorgados por el usuario
	$user = $_SESSION['user_id'];
  $destinatario = $_POST["receptant_"];
  $mensaje = $_POST["message_"];

  // Datos obtenidos de la api
  $data_api = CallAPI($GET, 'https://e5db.herokuapp.com/messages');
  $data_api = json_decode($data_api, true);

  //Obteniendo el id del usuario destinatario
  $query = "SELECT uid,username,correo,contrasena FROM usuarios WHERE username = '$destinatario';";

	$result = $db53-> prepare($query);
	$result -> execute();
	$users = $result -> fetchAll();
  $filas = count($users);

  if ($destinatario == NULL && $mensaje == NUL){
    echo "Usted no ha ingresado los datos. Porfavor vuelva e ingreselos";
  }
  elseif ($destinatario == NULL){
    echo "No ha ingresado el username del destinatario";
  }
  elseif ($mensaje == NULL){
    echo "No ha ingresado el mensaje";
  }

  elseif ($filas == 1){
    foreach ($users as $u) {
      $uid = $u[0];
      $username = $u[1];
      $contrasena = $u[3];
  }
  }



  // if(!empty($_POST["receptant_"]) and !empty($_POST["message_"])){
  //   $data = array(
  //     'date' => "2020-07-11",
  //     'lat' => -46.059365,
  //     'long' => -72.201691,
  //     'message' => $mensaje,
  //     'mid'=> 215,
  //     'receptant' => 41,
  //     'sender' => $user
  //   );
  // }
  //
  // $options = array(
  //   'http' => array(
  //   'method'  => 'POST',
  //   'content' => json_encode($data),
  //   'header'=>  "Content-Type: application/json\r\n" .
  //               "Accept: application/json\r\n"
  //             )
  // );
  // $url = 'https://e5db.herokuapp.com/messages';
  // $context  = stream_context_create($options);
  // $result = file_get_contents($url, false, $context);
  // $response = json_decode($result);
  //
  // $array = json_decode(json_encode($response), true);
	?>

	<h3> Mensajería </h3>
  <?php
  echo $destinatario;
  echo $mensaje;
  echo $uid;
	?>


    <?php
    foreach ($array as $message) {
      echo $message;
    }
    ?>


<?php include('../templates/footer.html'); ?>
