<?php

session_start();

require 'php/database.php';

$record = $conn->prepare('SELECT * FROM movies limit 5');
$record->execute();
$total = $record->rowCount();
$result = $record->fetchAll();


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Pelis Retro</title>
    <link rel="stylesheet" href="css/index.css">

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="bootstrap/js/bootstrap.min.js"></script>
      <script src="https://kit.fontawesome.com/325b4f7989.js" crossorigin="anonymous"></script>

  </head>
  <body>

    <header class="header">
        <div id="encabezado">
          <img src="img/logo2.jpg" class="avatar" alt="Avatar Image">

            PELIS RETRO
            <div id="menu">
            <ul>
              <li><a href="/practico/index.php" class="active_now"><span class="fas fa-home"></span> INICIO</a></li>
              <li><a href="/practico/peliculas.php" class="active"><span class="	fas fa-video"></span> PELICULAS</a></li>
              <li><a href="/practico/contactos.php" class="active">
              <span class="fas fa-comment-dots"></span> CONTACTO</a></li>
            </ul>
          </div>
        </div>
    </header>



    <div class="footer">
      <p>Copyright 2020 © Pelis Retro</p>
    </div>


 
   <div class="container" style="  margin-top: 10px;">
    <div class="container" style="background: #b11c1cc7;"s>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
        <?php for($i=0;$i<$total;$i++){ $active="active";?>
          <li style="background:black" data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i;?>" class="<? echo $active;?>"></li>
        <?php
            $active="";
        }
        ?>
        </ol>
        <div class="carousel-inner">
        <?php $active="active";
            foreach ($result as $r) {
        ?>
          <div align="center" class="carousel-item <?php echo $active;?>">
            <img src="<?php echo $r['link_de_imagen'];?>" style="width:70%;height:500px">
          </div>
        <?php 
         $active="";
        }
        ?>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span style="color:black" class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">SIGUIENTE</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </div>


  </body>
</html>
