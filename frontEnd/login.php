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
	<title>CLIENTE</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@500&display=swap" rel="stylesheet">
	<link href="estilo/principal.css" rel="stylesheet" type="text/css">
	<link href="estilo/login.css" rel="stylesheet" type="text/css">
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
					<button type="submit" class="btn btn-success">ACEPTAR</button>

					<br>
					<label>
						<input type="checkbox" checked="checked" name="remember"> Recordar Usuario
					</label>
					<br>
					<label>
						<span class="psw">OLVIDE <a href="#"> MI CONTRASEÑA <br></a></span>
					</label>
					<br>
					<button type="button" class="btn btn-primary" onclick="location.href='registro.php'">REGISTRARSE</button>
					<br>
					
				</center>
			</div>
		</form>
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
