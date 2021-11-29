<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="bootstrap\css\bootstrap.min.css">
	<title>Registro2</title>
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
</head>
<body>

	<div class="section">
		<CENTER>
			<br>
			<img class="imgLogo2" src="img\logo2.png">
			<form name="registro" action="php/api/registrarClient.php" method="POST">
				<input type="hidden" name="email" value="<?php ECHO  $_GET['email'];?>" >
				<br>  <label for="nombre"><h5>NOMBRE</h5>  </label>
				<br> <input type="text" name="nombre" required>
				<br> <label for="apellido"><h5>APELLIDO</h5></label>
				<br> <input type="text" name="apellido" required>
				<br> <label for="tipdoc"><h5>TIPO DE DOCUMENTO</h5></label>
				<br> <select id="opciondoc" name="id_tipo_documento"> 
					<option value ="1" selected>DNI</option>
					<option value ="2">PASAPORTE</option>
					<option value ="3">EXTRANJERO</option>
				</select>
				<br> <label for="numdoc"><h5>NUMERO DE DOCUMENTO</h5></label>
				<br> <input type="text" name="nro_documento" required>
				<br> <label for="nombreuser"><h5>NOMBRE DE USUARIO</h5></label>
				<br> <input type="text" name="usuario" required>          
				<br> <label for="password"><h5>CONTRASEÑA</h5></label>
				<br> <input type="password" name="password" required>
				<br> <label for="password"><h5>REPETIR CONTRASEÑA</h5></label>
				<br> <input type="password" name="passwordVerificacion" required>
				<br>
				<br><button type="submit" class="btn btn-success">FINALIZAR REGISTRO</button>
				<br><br>
			</form>
		</CENTER>
	</div>

</body>
</html>
