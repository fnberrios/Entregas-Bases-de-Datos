<?php
  session_start();
?>
<?php include('../templates/header.html');   ?>
<?php
  if (isset($_SESSION['eliminado'])):?>
    	<h3>Su cuenta a sido eliminada exitosamente.</h3>
      <?php
        session_unset();
        session_destroy();
      ?>
      <form align="center" action="../index.php" method="post">
        <input type="submit" value="Ir al Inicio">
      </form>
<?php
  else:
    session_unset();
    session_destroy();
    header('Location: ../index.php ');
?>
<?php
  endif;?>
