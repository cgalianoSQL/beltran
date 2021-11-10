<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="bootstrap\css\bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital@1&display=swap" rel="stylesheet">
	<link href="estilo/login.css" rel="stylesheet" type="text/css">
	<title>REGISTRO</title>
</head>
<body>

		<div class="container">
		<center>
			<br>
			<img class="imgLogo" src="img\logo.png">
			<form name="registro" action="php/api/sendEmail.php" method="POST">
				<br> <label for="email"><h5>CORREO ELECTRÓNICO</h5></label>
				<br> <input type="email" name="email" required>
				<br> <button type="submit" class="btn btn-success">REGISTRAR CUENTA</button>
				<br>
				<!--<label>
					<input type="checkbox" checked="checked" name="terminos" required> ACEPTAR - Términos de uso y Políticas de privacidad
				</label> 
				<br> -->
				<button type="button" class="btn btn-primary" onclick="location.href='login.php'"> INGRESAR CON UNA CUENTA EXISTENTE</button>
			</form>
			</div>
		</center>


</body>
</html>
