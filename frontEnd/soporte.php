<?php

session_start();

if (!isset($_SESSION['permiso']) || $_SESSION['permiso'] != 'SOPORTE')
{
  header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap\css\bootstrap.min.css">
    <title>PERSONAL DE SOPORTE</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="estilo/principal.css" rel="stylesheet" type="text/css">
</head>
<body >
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">PERSONAL DE SOPORTE</a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
      <a class="nav-link" href="#">INICIO</a>
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
            <div  class="col col-lg-3" style="margin-top: 5%;margin-left: 5%;margin-bottom: 2%">
                <!--Noticia 1-->
                <div  class="card" style="width: 18rem;">
                    <!--286x294 body -->
                    <!-- 286x286 img-->
                    <div class="card-body" style="min-width:286px;max-width: 286px;min-height: 420px;max-height: 420px;">
                      <h3 class="card-text">Reclamos</h3>
                    </div>
                    
                    <!-- Button trigger modal -->
                    <button id="boton1" type="button" class="btn btn-">
                      Click Aquí 
                    </button>
                    
                 
                                    </div>
                                </div>

                <div  class="col col-lg-3" style="margin-top: 5%;margin-left: 5%;margin-bottom: 2%">
                <!--Noticia 1-->
                <div  class="card" style="width: 18rem;">
                    <!--286x294 body -->
                    <!-- 286x286 img-->
                    <div class="card-body" style="min-width:286px;max-width: 286px;min-height: 420px;max-height: 420px;">
                      <h3 class="card-text">Estadísticas de Reclamos</h3>
                    </div>
                    
                    <!-- Button trigger modal -->
                    <button id="boton1" type="button" class="btn btn-">
                      Click Aquí 
                    </button>
                    
                 
                                    </div>
                                </div>

                                <!--Noticia 2 -->
                                <div class="col col-lg-3" style="margin-top: 5%;margin-left: 5%;margin-bottom: 2%">
                                    
                                    <div class="card" style="width: 18rem;">
                                        <div class="card-body" style="min-width:286px;max-width: 286px;min-height:420px;max-height: 420px;">
                                          <h3 class="card-text">Estadísticas de Servicios</h3>
                                         
                                        </div>
                                       
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-" id="boton1">
                                            Click Aquí 
                                        </button>
                                        
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