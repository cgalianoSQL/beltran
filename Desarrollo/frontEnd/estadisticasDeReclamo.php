<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="bootstrap\css\bootstrap.min.css">
	<title>Estadisticas de reclamo</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@1,500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@1,500&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montagu+Slab:wght@500&display=swap" rel="stylesheet">
	<link href="estilo/principal.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css2?family=Montagu+Slab:wght@500&family=Signika+Negative:wght@500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Montagu+Slab:wght@500&family=Yantramanav:wght@900&display=swap" rel="stylesheet">
</head>
<body >
<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="cliente.php"><h3>PERSONAL DE SOPORTE</h3></a>	
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<button class="btn btn-secondary" type="button" onclick="location.href='cliente.php'" style="border-color: white">
				    INICIO
				  </button>
				</li>
				<li class="nav-item">
				<div class="dropdown">
				  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-color: white">
				    MI CUENTA
				  </button>
				  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				    <a class="dropdown-item" href="cambiarContrasenaSoporte.php">Cambiar mi contraseña</a>
				    <a class="dropdown-item" href="clientedatos.php">Mis Datos</a>
				  </div>
				</div>
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
						<div class="card-body" style="min-width:100%;max-width: 286px;min-height:330px;max-height: 330px;">
							<div class="alert alert-warning" role="alert">
								<h3>Estadísticas de Reclamos</h3>
							</div>
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