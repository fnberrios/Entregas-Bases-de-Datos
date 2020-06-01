<?php
  session_start();
?>
<?php include('../templates/header.html');   ?>
<?php
  if (isset($_SESSION['eliminado'])):?>
    	<h3>Su cuenta a sido eliminada exitosamente.</h3>

<?php
  endif;?>

<?php
  session_unset();
  session_destroy();
  echo "Termineee";
  // header('Location: ../index.php ');
?>
<form align="center" action="../index.php" method="post">
  <input type="submit" value="Ir al Inicio">
</form>
