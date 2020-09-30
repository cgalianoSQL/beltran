<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="bootstrap\css\bootstrap.min.css">
	<title>CLIENTE</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@500&display=swap" rel="stylesheet">
	<link href="estilo/principal.css" rel="stylesheet" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link href="estilo/registro.css" rel="stylesheet" type="text/css">
	<title>RR Resolucion de reclamos online</title>
</head>
<body>
	<div class="section">
		<CENTER>
			<img class="imgLogo" src="img\logo.png">
			<form name="registro" action="php/api/sendEmail.php" method="POST">
				<br>  <label for="numCuenta"><b> NÚMERO DE CUENTA </b></label>
				<br> <input type="number" name="numCuenta" required>
				<br>  <label for="email"><b> CORREO ELECTRÓNICO </b></label>
				<br> <input type="email" name="email" required>
				<br>
				<button type="submit" class="btn btn-success">REGISTRAR CUENTA</button>
				<br>
				<label>
					<input type="checkbox" checked="checked" name="terminos" required> ACEPTAR - Términos de uso y Políticas de privacidad
				</label>
				<br>
				<button type="button" class="btn btn-primary" onclick="location.href='login.php'"> INGRESAR CON UNA CUENTA EXISTENTE</button>
			</form>
		</CENTER> 
	</div>

</body>
</html>
