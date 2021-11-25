<?php
include_once 'php/api/apiReclamos.php';
session_start();
$api = new ApiReclamos();
$lista = $api->mostrar($_SESSION['id']);
$result = $lista->fetchAll(PDO::FETCH_ASSOC);
include_once 'php/api/apiUser.php';
$api = new ApiUser();
$perfil = $api->perfil($_SESSION['id']);
?>

<!doctype html>
<html lang="en">
  <head>
  <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="bootstrap\css\bootstrap.min.css">
	<title>Mis Reclamos</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@1,500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@1,500&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montagu+Slab:wght@500&display=swap" rel="stylesheet">
	<link href="estilo/principal3.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css2?family=Montagu+Slab:wght@500&family=Signika+Negative:wght@500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Montagu+Slab:wght@500&family=Yantramanav:wght@900&display=swap" rel="stylesheet">
   
  <body> 
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="cliente.php"><h3>CLIENTE - <?php ECHO $perfil['nombre_completo']?></h3></a>	
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

        <div id="content">
				<div id="center">
            <div class="row" >
                <div class="col col-lg-3" style="margin-top: 1%;margin-left:1% ;margin-bottom: 1%">
                   <div id="tarjeta" class="card" style="width: 68rem;">
                        <div class="card-body" style="min-width:100%;max-width: 100%;min-height: 100%;max-height: 100%;">
                            <div class="alert alert-info" role="alert">
                                <h3>MIS RECLAMOS</h3>
                                <br>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="table-responsive">        
                                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                            
                                                                <th>Fecha</th>
                                                                <th>Hora</th>
                                                                <th>Servicio</th>
                                                                <th>Pertenece</th>
                                                                <th>Asignado</th>
                                                                <th>Estado</th> 
																<th>Movimientos</th>
															    </tr>
                                                        </thead>
														<tbody >     

                                                        <?php 
                                                        foreach($result as $r){
                                                        echo'<tr>';


                                                        echo'<td>'. json_decode(json_encode($r['fecha'])) .'</td>';
                                                        echo'<td>'. json_decode(json_encode($r['hora'])) .'</td>';
														echo'<td>'. json_decode(json_encode($r['servicio'])) .'</td>';
														echo'<td>'. json_decode(json_encode($r['pertenece'])) .'</td>';
														echo'<td>'. json_decode(json_encode($r['asignado'])) .'</td>';
														echo'<td>'. json_decode(json_encode($r['nombre_estado'])) .'</td>';

														
                                                        ?>
                                                        <center>
														<td>
                                                        <button type="submit" class="btn btn-primary"onclick="location.href='DetallesmisReclamos.php?id=<?php echo json_encode($r['id_reclamos']); ?>'" >Ver</button>
                                                        </td>
                                                        </center>
													
														<form action="php/api/tomarReclamo.php" method="POST">
															<input type="hidden" name="id_asignado" value="<?php ECHO  $_SESSION['id'];?>" >
															<input type="hidden" name="id_reclamo" value="<?php ECHO  json_encode($r['id_reclamos']); ?>" >											
														</form>
														</td>
														<?php

														echo'</tr>';
                                                        }
														echo'</table>'
                                                        ?>   
                                                        </tbody>                
                                                    </table>             
                                                </div>
                                            </div>
                                        </div>  
                                    </div>    
                                </div>
                            </div>
                    </div>  
                </div> 
            </div>  
        </div>   
      
        <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="popper/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="datatables/datatables.min.js"></script>    
    <script type="text/javascript" src="js/main.js"></script>  
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
</body>
</html>

