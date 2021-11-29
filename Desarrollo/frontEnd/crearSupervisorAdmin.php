<?php

session_start();
if (!isset($_SESSION['permiso']) || $_SESSION['permiso'] != 'ADMINISTRADOR')
{
  header("Location: login.php");
}

include_once 'php/api/apiUser.php';
$api = new ApiUser();
$perfil = $api->perfil($_SESSION['id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="bootstrap\css\bootstrap.min.css">
	<title>ADM - Crear Supervisor</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@1,500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@1,500&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montagu+Slab:wght@500&display=swap" rel="stylesheet">
	<link href="estilo/principal2.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css2?family=Montagu+Slab:wght@500&family=Signika+Negative:wght@500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Montagu+Slab:wght@500&family=Yantramanav:wght@900&display=swap" rel="stylesheet">
</head>
<body >
<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="cliente.php"><h3>ADMINISTRADOR - <?php ECHO $perfil['nombre_completo']?></h3></a>	
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<button class="btn btn-secondary" type="button" onclick="location.href='admin.php'" style="border-color: white">
				    INICIO
				  </button>
				</li>
				<li class="nav-item">
					<button class="btn btn-secondary" type="button" onclick="location.href='miCuentaadmin.php'" style="border-color: white">
				    MI CUENTA
				  </button>
				</li>
				<li class="nav-item">
					<button class="btn btn-secondary" type="button" onclick="location.href='logout.php'" style="border-color: white">
				    CERRAR SESIÓN
				  </button>
				</li>
			</ul>
		</nav>
        <div id="content">
			<div id="center">
                <div class="row" >
                     <div class="card">
                            <br>
					  	<h3>NUEVO SUPERVISOR</h3>
				<center>
				<form name="registro" action="php/api/registrarSupervisor.php" method="POST">
					<br> <label for="nombre"><h5>NOMBRE:</h5></label><br>
					<input type="text" name="nombre" required>
					<br> <label for="apellido"><h5>APELLIDO</h5></label><br>
					<input type="text" name="apellido" required>
					<br> <label for="tipdoc"><h5>TIPO DE DOCUMENTO</h5></label><br>
					<select id="opciondoc" name="id_tipo_documento"> 
						<option value ="1" selected>DNI</option>
						<option value ="2">PASAPORTE</option>
						<option value ="3">EXTRANJERO</option>
					</select>
					<br> <label for="numdoc"><h5>NUMERO DE DOCUMENTO</h5></label><br>
					<input type="text" name="nro_documento" required>
					<br> <label for="email"><h5>E-MAIL</h5></label><br>
					<input type="email" name="email" required>
					<br> <label for="nombreuser"><h5>NOMBRE DE USUARIO</h5></label><br>
					<input type="text" name="usuario" required>          
					<br> <label for="password"><h5>CONTRASEÑA</h5></label><br>
					<input type="password" name="password" required>
					<br> <label for="password"><h5>REPETIR CONTRASEÑA</h5></label><br>
					<input type="password" name="passwordVerificacion" required>
					<br>
					<br><button type="submit" class="btn btn-success">CREAR CUENTA</button>
					<br>
					<br>
				</form>						
				</center>
				
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
	</html>