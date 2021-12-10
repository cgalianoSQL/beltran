<?php
session_start();
if (isset($_SESSION['permiso']))
{
  switch($_SESSION['permiso']) {
    case 'CLIENTE':
        header("Location: cliente.php");
    break;
    case 'ADMINISTRADOR':
        header("Location: admin.php");
    break;
    case 'SOPORTE':
        header("Location: soporte.php");
  }
}

?>

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
	<title>LOGIN</title>
</head>
<body>
	<br>
	<div class="container">
			<form class="modal-content animate" id="formulario" action="php/api/login.php" method="POST">
					<div class="imgcontainer">
						<img src="img/avatar.png" alt="Avatar" class="avatar">
					</div>
					<label for="username"><h4>USUARIO</h4></label>
					<input type="text" placeholder="Ingresar Usuario" name="username" required>
					<br>
					<label for="password"><h4>CONTRASEÑA</h4></label>
					<input type="password" placeholder="Ingresar Contraseña" name="password" required> 
					<br>
					<button type="submit" class="btn btn-success">ACEPTAR</button>
					<br>
					<label>
						<input type="checkbox" checked="checked" name="remember"> Recordar Usuario
					</label>
					<label>
						<span class="psw">OLVIDE <a href="recuperar.php"> MI CONTRASEÑA <br></a></span>
						<span class="psw">OLVIDE <a href="recuperarUsuario.php"> MI USUARIO <br></a></span>
					</label>
					<br>
					<button type="button" class="btn btn-primary" onclick="location.href='registro.php'">REGISTRARSE</button>
					<br>
		</form>
	</div>

		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
