<?php
include_once 'php/api/apiReclamos.php';
session_start();
$api = new ApiReclamos();
$lista = $api->mostrarMovimientos($_GET['id']);
$result = $lista->fetchAll(PDO::FETCH_ASSOC);
$reclamo = $api->identify($_GET['id']);

include_once 'php/api/apiUser.php';
$api = new ApiUser();
$perfil = $api->perfil($_SESSION['id']);
?>
<style>
body {font-family: Arial, Helvetica, sans-serif;}

#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>
<!doctype html>
<html lang="en">
  <head>
  <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="bootstrap\css\bootstrap.min.css">
	<title>Detalle mis reclamos</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@1,500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@1,500&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montagu+Slab:wght@500&display=swap" rel="stylesheet">
	<link href="estilo/principal2.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css2?family=Montagu+Slab:wght@500&family=Signika+Negative:wght@500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Montagu+Slab:wght@500&family=Yantramanav:wght@900&display=swap" rel="stylesheet">
   
  <body> 
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

            <br>
            <div id="colorcito1" class="container" >
                <div class="row" >
                    <div class="col col-lg-3" style="margin-top: 1%;margin-left:5% ;margin-bottom: 1%">
                        <div id="tarjeta" class="card" style="width: 60rem;">
                                <br>
                                <h3>DETALLE RECLAMO #<?php ECHO json_decode(json_encode($reclamo['id_reclamos'])); ?> </h3>          
								<h5>Fecha: <?php ECHO json_decode(json_encode($reclamo['fecha'])); ?></h5>       
								<h5>Hora: <?php ECHO json_decode(json_encode($reclamo['hora'])); ?> </h5> 
								<h5>Servicio: <?php ECHO json_decode(json_encode($reclamo['servicio'])); ?> </h5>      
								<h5>Pertenece: <?php ECHO json_decode(json_encode($reclamo['pertenece'])); ?> </h5>       
								<h5>Asignado: <?php ECHO json_decode(json_encode($reclamo['asignado'])); ?></h5> 
								<h5>Estado: <?php ECHO json_decode(json_encode($reclamo['nombre_estado'])); ?></h5> 
                                <br>
                         </div>
                    </div>  
                </div> 
            </div>  

        
            <br>
            <div id="colorcito1" class="container" >
                <div class="row" >
                    <div class="col col-lg-3" style="margin-top: 1%;margin-left:5% ;margin-bottom: 1%">
                        <div id="tarjeta" class="card" style="width: 60rem;">
                        <div class="card-body" style="min-width:100%;max-width: 100%;min-height: 100%;max-height: 100%;">
                    <div class="card2">
                                <h3> MOVIMIENTOS RECLAMO #<?php ECHO json_decode(json_encode($reclamo['id_reclamos'])); ?></h3>
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
                                                                <th>Comentario</th>
                                                                <th>Realizado</th>
                                                                <th>Imagen</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>   

                                                        <?php 
                                                        $count = 1;

                                                        foreach($result as $r){
                                                        echo'<tr>';
                                                        foreach($r as $v){
                                                        
                                                            
                                                        if (preg_match("/^data/", $v)) {
                                                            
                                                          ?>
                                                        <center>
													     <td>
                                                         <form name="registro" action="/beltran/Desarrollo/frontEnd/DetallemisReclamosSoporte.php?id=<?php ECHO $_GET['id'] ?>&mostrar"  method="POST">
                                                            <input type="hidden" name="id_imagen" value="<?php ECHO  json_decode(json_encode($r['archivo']));?> ">

                                                           <button type="submit" ><img width="100" src="<?php ECHO json_decode(json_encode($r['archivo']))?> " alt="x" /></button>
                                                         </form>


                                                        </td>
                                                        </center>
                                                          <?php
                                                         
                                                        } else {
                                                          echo'<td>'.$v.'</td>';
                                                        }
                                                        
                                                        }
                                                        echo'</tr>';
                                                        }
                                                        echo'</table>';
                                                        ?>   
    
                                                        </tbody>                
                                                    </table>
                                                <?php
                                                if (json_decode(json_encode($reclamo['nombre_estado'])) != "CERRADA" && json_decode(json_encode($reclamo['asignado'])) != 'soporte'  ) {
                                                ?>
                                                    <center>
                                                        <br>
                                                        <button type="submit" class="btn btn-success" onclick="location.href='respuestaReclamoSoporte.php?id=<?php ECHO  $_GET['id'];?>'">RESPONDER</button>
                                                        <br>
                                                        <br>
                                                        <button type="submit" class="btn btn-danger" onclick="location.href='cerrarReclamoSoporte.php?id=<?php ECHO  $_GET['id'];?>'">CERRAR</button>
                                                    </center>
                                                <?php
                                                }
                                                ?>
                                                
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
<br>
        <?php 
    if (isset($_GET['mostrar'])){

?>

<img id="myImg" src="<?php ECHO $_POST['id_imagen']?>" alt="-" style="visibility: hidden; ">
<!-- The Modal -->
    <div id="myModal" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="img01">
    <div id="caption"></div>
    </div>

    <script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById("myImg");
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onload  = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() { 
    modal.style.display = "none";
    }
    </script>
<?php 
    }
?>
      
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