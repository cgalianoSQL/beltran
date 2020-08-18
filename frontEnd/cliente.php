<?php

session_start();

if (!isset($_SESSION['permiso']) || $_SESSION['permiso'] != 'CLIENTE')
{
  header("Location: login.php");
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CLIENTE</title>
    <link href="estilo/cliente.css" rel="stylesheet" type="text/css">

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="bootstrap/js/bootstrap.min.js"></script>
      <script src="https://kit.fontawesome.com/325b4f7989.js" crossorigin="anonymous"></script>

  </head>
  <body>




  </body>
</html>
