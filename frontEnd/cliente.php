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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="estilo/cliente2.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap\css\bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Aclonica&display=swap" rel="stylesheet">
    <title>CLIENTE</title>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">CLIENTE</a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
      <a class="nav-link" href="#">INICIO</a>
      </li>

      <li class="nav-item">
      <a class="nav-link" href="#">MI CUENTA</a>
      </li>

      <li class="nav-item">
      <a class="nav-link" href="#">CERRAR SESION</a>
      </li>

    </ul>
</nav>

</body>
</html>
