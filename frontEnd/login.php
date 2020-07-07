<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Pelis Retro</title>
    <link rel="stylesheet" href="css/master.css">

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
      crossorigin="anonymous">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  </head>
  <body>

    <header class="header">
          <div id="encabezado">
            <img src="img/logo2.jpg" class="avatar" alt="Avatar Image">

             PELIS RETRO
          </div>
      </header>

    <div class="footer">
      <p>Copyright 2020 © Pelis Retro</p>
    </div>

    <div class="login-box">
      <img src="img/logo1.jpg" class="avatar" alt="Avatar Image">
      <h1>Bienvenido</h1>
 
      <form name="login" id="formulario">

        <label for="username">Usuario</label>
        <input type="text" name="username" placeholder="Introducir Usuario">
        
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Introducir Password">
        <input type="submit" value="Aceptar">

        <div class="text-center">
          <a href="signup.php" >REGISTRATE AQUI</a>
        </div>

        <div class="mt-3" id="respuesta">

      </form>
    </div>


    <script src="js/loginQuery.js"></script>


  </body>
</html>
