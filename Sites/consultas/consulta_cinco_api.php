<?php
  session_start();
?>
<?php 
include('../templates/header.html');
include('../config/call_api.php');   
?>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
crossorigin=""/>

<body>
  <?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $fecha_inicio = $_POST["fecha-inicio"];
  $fecha_final =  $_POST["fecha-final"];
  $user =  $_SESSION["user_id"];
  # $data = array('id'=> $user);
  $query =  CallApi($GET, 'https://e5db.herokuapp.com/messages');
  #echo $query;
  #echo $query;
  #echo gettype($query);
  #echo '---';
  $response = json_decode($query, true); //because of true, it's in an array
  #echo gettype($response);
  #echo $response;

  foreach ($response as $resp){
    if (($resp['sender'] == $user) and ($resp['date'] < $fecha_final) 
                  and ($resp['date'] > $fecha_inicio)) {
      print_r($resp);
      $lat = $resp["lat"];
      $long = $resp["long"];
    }
    else{
      unset($resp);
    }
  }


  foreach ($response as $resp){
    print_r($resp);
  }
  ?>

<div id="mapid" style="height: 300px"></div>


<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
   integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
   crossorigin=""></script>
<script>
    var map = L.map('mapid').setView([<?php echo $lat ?>, <?php echo $long ?>], 10);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    <?php foreach($response as $resp) {
        echo 
        'L.marker([' . $resp["lat"] . ',' . $resp["long"] . ']).addTo(map);';
    } ?>
</script>

  <?php include('../templates/footer.html'); ?>
