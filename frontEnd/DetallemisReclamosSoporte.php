<?php

include_once 'php/api/apiReclamos.php';
session_start();
$api = new ApiReclamos();
$lista = $api->mostrarMovimientos($_GET['id']);
$result = $lista->fetchAll(PDO::FETCH_ASSOC);

include_once 'php/api/apiUser.php';
$api = new ApiUser();
$perfil = $api->perfil($_SESSION['id']);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">   
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">   
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>
    <link rel="stylesheet"  type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@1,500&display=swap" rel="stylesheet">
	<link href="estilo/principal.css" rel="stylesheet" type="text/css">
    <title>Detalle Reclamo</title>
   
  <body> 
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="soporte.php"><h4>PERSONAL DE SOPORTE - <?php ECHO $perfil['nombre_completo']?></h4></a>	
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

    <div style="height:50px"></div>
        <div id="colorcito1" class="container" >
            <div class="row" >
                <div class="col col-lg-3" style="margin-top: 1%;margin-left:5% ;margin-bottom: 1%">
                   <div id="tarjeta" class="card" style="width: 60rem;">
                        <div class="card-body" style="min-width:100%;max-width: 100%;min-height: 100%;max-height: 100%;">
                            <div class="alert alert-warning" role="alert">
                                <h3>MOVIMIENTOS DE RECLAMO #<?php echo $_GET['id']  ?> </h3>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="table-responsive">        
                                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Fecha</th>
                                                                <th>Detalle</th>
                                                                <th>Realizado Por </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>  
                                                        
                                                        <?php 
                                                        foreach($result as $r){
                                                        echo'<tr>';
                                                        foreach($r as $v){
                                                        echo'<td>'.$v.'</td>';
                                                        }
                                                        echo'</tr>';
                                                        }
                                                        echo'</table>';
                                                        ?>   
  
                                                        </tbody>                
                                                    </table> 
                                                    <CENTER>
                                                    <button type="submit" class="btn btn-success" onclick="location.href='respuestaReclamoSoporte.php?id=<?php ECHO  $_GET['id'];?>'">RESPONDER</button>             
                                                    <form action="php/api/cerrarReclamo.php" method="POST">
                                                       <input type="hidden" name="id_usuario_asignado" value="<?php ECHO  $_SESSION['id'];?>" >
                                                       <input type="hidden" name="id_reclamo" value="<?php ECHO  $_GET['id'];?>" >
                                                       <input type="hidden" name="comentario" value="RECLAMO FINALIZADO" >
                                                       <input type="hidden" name="archivo" value="no pose" >
                                                       <BR>
                                                       <button type="submit" class="btn btn-danger">CERRAR</button>  
                                                    </form>
                                                    </CENTER>
                                                    
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