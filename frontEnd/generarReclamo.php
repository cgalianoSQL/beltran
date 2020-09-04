<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="bootstrap\css\bootstrap.min.css">
	<title>Generar reclamo</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@500&display=swap" rel="stylesheet">
	<link href="estilo/registroReclamo.css" rel="stylesheet" type="text/css">
</head>
<body >
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#"><h4>CLIENTE</h4></a>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="cliente.php">INICIO</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="#">MI CUENTA</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="logout.php">CERRAR SESIÓN</a>
				</li>

			</ul>
		</nav>
		<div id="colorcito1" class="container" >
			<div class="row" >
				<div class="col col-lg-3" style="margin-top: 3%;margin-left:15% ;margin-bottom: 3%">
					<div id="tarjeta" class="card" style="width: 50rem;">
						<div class="card-body" style="min-width:100%;max-width: 286px;min-height:330px;max-height: 400px;">
					<div class="alert alert-primary" role="alert">
					  	<h3>Nuevo Reclamo</h3>
					</div>

					<form>
					  <div class="form-group">
					  	Servicio
					    <select class="custom-select" required>
					      <option value="">Seleccione un servicio</option>
					      <option value="1">Servicio 1</option>
					      <option value="2">Servicio 2</option>
					      <option value="3">Servicio 3</option>
					    </select>
					  </div>

					    <div class="form-group">
					    	Problema
					    <select class="custom-select" required>
					      <option value="">Seleccione un problema</option>
					      <option value="1">Problema 1</option>
					      <option value="2">Problema 2</option>
					      <option value="3">Problema 3</option>
					    </select>
					  </div>
						
					  <div class="form-group">
					    <label for="formGroupExampleInput">Detalle</label>
					    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Agregue un detalle de su problema">
					  </div>
					</form>

						</div>
						<button type="button" class="btn btn-" id="boton1">
							GENERAR 
						</button>
					</div>
				</div>
			</div>
		</div>


		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
	</html>