<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="estilo/registro.css" rel="stylesheet" type="text/css">
          
    <!-- Bootstrap CSS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>RR Resolucion de reclamos online</title>
</head>

<body>

  <div class="section">
    <CENTER>
      <img class="imgLogo" src="img\logo.png">
      <form name="registro">
          <br>  <label for="numCuenta"><b> NÚMERO DE CUENTA </b></label>
          <br> <input type="number" name="numCuenta" required>
          <br>  <label for="email"><b> CORREO ELECTRÓNICO </b></label>
          <br> <input type="email" name="email" required>
          <br>
           <input type="submit" value="REGISTRAR CUENTA">
          <br>
          <label>
          <input type="checkbox" checked="checked" name="terminos" required> ACEPTAR - Términos de uso y Políticas de privacidad
          </label>
          <br><button type="button" onclick="location.href='login.php'"> INGRESAR CON UNA CUENTA EXISTENTE</button>
      </form>
    </CENTER> 
  </div>

</body>
</html>
