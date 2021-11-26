<?php
session_start();
if (!isset($_SESSION['permiso']) || $_SESSION['permiso'] != 'SOPORTE')
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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="bootstrap\css\bootstrap.min.css">
	<title>SOPORTE - Reclamos</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@1,500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@1,500&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montagu+Slab:wght@500&display=swap" rel="stylesheet">
	<link href="estilo/principal4.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css2?family=Montagu+Slab:wght@500&family=Signika+Negative:wght@500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Montagu+Slab:wght@500&family=Yantramanav:wght@900&display=swap" rel="stylesheet">
</head>
<body >
<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="soporte.php"><h3>PERSONAL DE SOPORTE - <?php ECHO $perfil['nombre_completo']?></h3></a>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<button class="btn btn-secondary" type="button" onclick="location.href='soporte.php'" style="border-color: white">
				    INICIO
				  </button>
				</li>
				<li class="nav-item">
					<button class="btn btn-secondary" type="button" onclick="location.href='miCuentaSoporte.php'" style="border-color: white">
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
					<br>
				<div id="object1" onclick="location.href='listaReclamosSoporte.php'" >
									<div class="card">
									<h3>LISTA<br> DE RECLAMOS</h3>
									</div>
									<br>
					</div>
				<div id="object2" onclick="location.href='misReclamosSoporte.php'" >
									<div class="card">
									<h3>MIS<br>RECLAMOS</h3>
									</div>
									<br>
					</div>

				</div>
				</div>

		<div id="colorcito1" class="container" >
			<div class="row" >
				<div class="col col-lg-3" onclick="location.href='listaReclamosSoporte.php'" style="margin-top: 3%;margin-left: 21%;margin-bottom: 3%">
					<div class="card" style="width: 18rem;">
						<div class="card-body" style="min-width:286px;max-width: 286px;min-height:330px;max-height: 330px;">
							
							<div class="alert alert-primary" role="alert">
						  <h3>LISTA<br> DE RECLAMOS</h3>
						</div>
					
						</div>
					</div>
				</div>
				<div class="col col-lg-3" onclick="location.href='misReclamosSoporte.php'" style="margin-top: 3%;margin-left: 5%;margin-bottom: 3%">
					<div class="card" style="width: 18rem;">
						<div class="card-body"  style="min-width:286px;max-width: 286px;min-height: 330px;max-height: 330px;">
						
							<div class="alert alert-warning" role="alert">
							  	<h3>MIS<br>RECLAMOS</h3>
							</div>
							
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