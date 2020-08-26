<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link href="estilo/registro.css" rel="stylesheet" type="text/css">
	
	<!-- Bootstrap CSS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<title>RR Resolucion de reclamos online</title>
</head>

<body>

	<div class="section">
		<CENTER>
			<img class="imgLogo" src="img\logo.png">
			<form name="registro" action="php/api/registrarClient.php" method="POST">
				<input type="hidden" name="nro_cliente" value="<?php ECHO  $_GET['cliente'];?>" >
				<br> <label for="nombre"><b> NOMBRE </b></label>
				<br> <input type="text" name="nombre" required>
				<br> <label for="apellido"><b> APELLIDO </b></label>
				<br> <input type="text" name="apellido" required>
				<br> <label for="tipdoc"><b> TIPO DE DOCUMENTO </b></label>
				<br> <select name="id_tipo_documento"> 
					<option value ="1" selected> DNI</option>
					<option value ="2">LIBRETA CÍVICA</option>
					<option value ="3">LIBRETA DE ENROLAMIENTO</option>
					<option value ="4">PASAPORTE</option>
				</select>
				<br> <label for="numdoc"><b> NUMERO DE DOCUMENTO </b></label>
				<br> <input type="text" name="nro_documento" required>
				<br> <label for="nombreuser"><b> NOMBRE DE USUARIO </b></label>
				<br> <input type="text" name="usuario" required>          
				<br> <label for="password"><b> CONTRASEÑA </b></label>
				<br> <input type="password" name="password" required>
				<br> <label for="password"><b> REPETIR CONTRASEÑA </b></label>
				<br> <input type="password" name="passwordVerificacion" required>
				<br> <input type="submit" value="FINALIZAR REGISTRO">
			</form>
		</CENTER>
	</div>

</body>
</html>
