<?php include('../templates/header.html'); ?>

<body>
	<form align="center" action="opciones_viaje.php" method="post">
	  <p>Ciudad de origen</p>
	  <select name = "ciudad_origen"> 
	  	<option>Roma</option>
	  	<option>Florencia</option>
	  	<option>Paris</option>
	  	<option>Chantilly</option>
	  	<option>Nancy</option>
	  	<option>Bruselas</option>
	  	<option>Antwerp</option>
	  	<option>Dresde</option>
	  	<option>Westminster</option>
	  	<option>Milan</option>
	  </select>
	  <br>
	  <br>
	  <p>Ciudad de destino</p>
	  <select name = "ciudad_destino"> 
	  	<option>Roma</option>
	  	<option>Florencia</option>
	  	<option>Paris</option>
	  	<option>Chantilly</option>
	  	<option>Nancy</option>
	  	<option>Bruselas</option>
	  	<option>Antwerp</option>
	  	<option>Dresde</option>
	  	<option>Westminster</option>
	  	<option>Milan</option>
	  </select>

	  <p>Fecha del viaje</p>
	  <input type="date" id="start" name="fecha_viaje" value="2020-05-28"
         min="2020-05-28" max="2999-12-31">
      <br>
	  <br>
      <input type="submit" value="Enviar">
    </form>
    <form action="../index.php" method="post">
    	<input type="submit" value="Ir al inicio">
    </form>



