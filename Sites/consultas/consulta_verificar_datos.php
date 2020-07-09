<?php
  session_start();
?>
<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");
  if empty($_SESSION['user_id']){
    $username_ = $_POST["username_"];
    $contrasena_ = $_POST["contrasena_"];
  }
  else{
    $username_ = $_SESSION['username'];
    $contrasena_= $_SESSION['contrasena'];
  }

  #Se construye la consulta como un string
  $query = "SELECT uid,username,correo,contrasena FROM usuarios WHERE username = '$username_' and contrasena = '$contrasena_';";

	$result = $db53-> prepare($query);
	$result -> execute();
	$users = $result -> fetchAll();
  $filas = count($users);
  ?>
      <?php
        if ($username_ == NULL && $contrasena_ == NULL):
          echo "Usted no ha ingresado los datos. Porfavor vuelva e ingreselos";

        elseif ($username_ == NULL):
          echo "No ha ingresado su username";

        elseif ($contrasena_ == NULL):
          echo "No ha ingresado su contraseña";

        elseif ($filas == 1):
          foreach ($users as $u) {
            $uid = $u[0];
            $username = $u[2];
            $contrasena = $u[5];
        }
          $_SESSION['user_id'] = $uid;
          $_SESSION['username'] = $username;
          $_SESSION['contrasena'] = $contrasena;
          $a = $_SESSION['user_id'];
          $_SESSION['eliminado'] = NULL;
          $_SESSION['entrada'] = NULL;
          $_SESSION['reserva'] = NULL;
      ?>
          <?php include('../templates/navbar.html'); ?>
          <h3 align="center"> Has ingresado con exito a tu cuenta</h3>
          <form align="center" action="../consultas/consulta_perfil.php" method="post">
            <input type="submit" value="Ver Perfil">
          </form>
          </br>
          <form action="consulta_confirmar_eliminar.php" method="post">
            <input type="submit" value="Eliminar cuenta">
          </form>
          </br>
          <form action="../index.php" method="post">
            <input type="submit" value="Ir al Inicio">
          </form>
          </br>
          <form action="consulta_uno_api.php" method="post">
            <input type="submit" value="Mostrar todos los atributos de tus mensajes recibidos">
          </form>
          </br>
          <form action="consulta_dos_api.php" method="post">
            <input type="submit" value="Mostrar todos los atributos de tus mensajes recibidos">
          </form>
          </br>
          <form action="consulta_tres_api.php" method="post">
            <input type="submit" value="Enviar mensaje a un usuario">
          </form>
          </br>
          <form action="consulta_cuatro_api.php" method="post">
            <input type="submit" value="Buscar Mensaje">
          </form>
          </br>
          <form action="consulta_cinco_api.php" method="post">
            Buscar Ubicaciones de los mensajes enviados entre:
            </br>
            Fecha de inicio búsqueda:
            </br>
            <input type="date" id="start" name="fecha-inicio"
                    value="2020-05-28"
                    min="1500-05-28" max="2999-12-31">
             </br>
            Fecha de final de la búsqueda:
             </br>
             <input type="date" id="end" name="fecha-final"
                    value="2020-05-28"
                    min="1500-05-28" max="2999-12-31">
            <br /><br />
              <input type="submit" value="Buscar Ubicaciones">
          </form>


      <?php
        else:
          echo "La contraseña o el usuario es incorrecto";

      endif;?>
