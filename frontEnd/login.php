<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="estilo/estilo.css" rel="stylesheet" type="text/css">
          
    <!-- Bootstrap CSS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>



    <title>Resolucion de reclamos online</title>
</head>

<body>

    <div id="id01" class="modal">
      
      <form class="modal-content animate" id="formulario">
          <div class="imgcontainer">
              <img src="img/avatar.png" alt="Avatar" class="avatar">
          </div>

          <div class="container">
            <center> 
              <label for="username"><b>USUARIO</b></label>
              <input type="text" placeholder="Ingresar Usuario" name="username" required>
              <label for="password"><b>CONTRASEÑA</b></label>
              <input type="password" placeholder="Ingresa tu Contraseña" name="password" required> 
              <input type="submit" value="Aceptar">
              <label>
                <input type="checkbox" checked="checked" name="remember"> Recordar Usuario
              </label>
            </center>
          </div>

          <div class="mt-3" id="respuesta">

          <div class="container" style="background-color:#f1f1f1">
               <button type="button" onclick="location.href='registrar.html'">REGISTRARSE</button>
               <!-- <span class="psw">OLVIDE <a href="#"> MI CONTRASEÑA</a></span> Pendiente armar recupero de pass -->
          </div>
       </form>
    </div>

  <script src="js/loginQuery.js"></script>
</body>
</html>
