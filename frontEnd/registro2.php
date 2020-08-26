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
				<br> <label for="nombre"><b> NOMBRE </b></label>
				<br> <input type="text" name="nombre" required>
				<br> <label for="apellido"><b> APELLIDO </b></label>
				<br> <input type="text" name="apellido" required>
				<br> <label for="tipdoc"><b> TIPO DE DOCUMENTO </b></label>
				<br> <select name="tipdoc"> 
					<option value ="dni" selected> DNI</option>
					<option value ="lc">LIBRETA CÍVICA</option>
					<option value ="le">LIBRETA DE ENROLAMIENTO</option>
					<option value ="pasaporte">PASAPORTE</option>
				</select>
				<br> <label for="numdoc"><b> NUMERO DE DOCUMENTO </b></label>
				<br> <input type="number" name="telefono" required>
				<br> <label for="nombreuser"><b> NOMBRE DE USUARIO </b></label>
				<br> <input type="text" name="telefono" required>          
				<br> <label for="password"><b> CONTRASEÑA </b></label>
				<br> <input type="password" name="password" required>
				<br> <label for="password"><b> REPETIR CONTRASEÑA </b></label>
				<br> <input type="password" name="password" required>
				<br> <input type="submit" value="FINALIZAR REGISTRO">
			</form>
		</CENTER>
	</div>

</body>
</html>
