<?php
session_start();
if (!isset($_SESSION['permiso']) || $_SESSION['permiso'] != 'CLIENTE')
{
  header("Location: login.php");
}
include_once 'php/api/apiServicio.php';
$api = new ApiServicio();
$servicios = $api->misServios($_SESSION['id']);

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
	<title>Reabrir Reclamo</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Assistant:wght@600&family=Noto+Sans+JP:wght@500&display=swap" rel="stylesheet">
	<link href="estilo/principal.css" rel="stylesheet" type="text/css">
</head>
<body >
<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="cliente.php"><h4>CLIENTE - <?php ECHO $perfil['nombre_completo']?></h4></a>	
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<button class="btn btn-secondary" type="button" onclick="location.href='cliente.php'" style="border-color: white">
				    INICIO
				  </button>
				</li>
				<li class="nav-item">
					<button class="btn btn-secondary" type="button" onclick="location.href='miCuentaCliente.php'" style="border-color: white">
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
		<div id="colorcito1" class="container" >
			<div class="row" >
				<div class="col col-lg-3" style="margin-top: 3%;margin-left:15% ;margin-bottom: 3%">
					<div id="tarjeta" class="card" style="width: 50rem;">
						<div class="card-body" style="min-width:100%;max-width: 286px;min-height:330px;max-height: 400px;">
					<div class="alert alert-warning" role="alert">
					  	<h3>REABRIR RECLAMO</h3>
						  <center>
						  	    <form action="php/api/reabiertoReclamo.php" method="POST" enctype="multipart/form-data">
								<input type="hidden" name="id_usuario_asignado" value="<?php ECHO  $_SESSION['id'];?>" >
								<input type="hidden" name="id_reclamo" value="<?php ECHO  $_GET['id'];?>" >
									<div class="form-group">
									</div>	
									<div class="form-group">
										<label for="formGroupExampleInput" >Agregar motivo:</label>
										<textarea rows="3" cols="88" name="comentario"> </textarea>
										<input type="file" name="archivo" accept="image/*,.pdf" />
										<!--<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Agregue un detalle de su problema" name="comentario" required>-->
									</div>
									<button type="submit" class="btn btn-info">REABRIR</button>
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