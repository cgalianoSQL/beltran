

<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link href="estilo/login.css" rel="stylesheet" type="text/css">
	
	<!-- Bootstrap CSS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>



	<title>Resolucion de reclamos online</title>
</head>

<body>

	<div class="modal">
		
		<form class="modal-content animate" id="formulario" action="php/api/login.php" method="POST">
			<div class="imgcontainer">
				<img src="img/avatar.png" alt="Avatar" class="avatar">
			</div>

			<div class="container">
				<center> 
					<label for="username"><b> USUARIO </b></label>
					<br>
					<input type="text" placeholder="Ingresar Usuario" name="username" required>
					<br>
					<label for="password"><b> CONTRASEÑA </b></label>
					<br>
					<input type="password" placeholder="Ingresar Contraseña" name="password" required> 
					<br>
					<input type="submit" value="ACEPTAR">
					<br>
					<label>
						<input type="checkbox" checked="checked" name="remember"> Recordar Usuario
					</label>
					<br>
					<label>
						<button type="button" onclick="location.href='registro.html'">REGISTRARSE</button>
					</label>
					<br>
					<label>
						<span class="psw">OLVIDE <a href="#"> MI CONTRASEÑA</a></span>
					</label>
					<br>
				</center>
			</div>
		</form>
	</div>

</body>
</html>
