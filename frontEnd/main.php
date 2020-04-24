<?php

  require '../backEnd/database.php';


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>HOME</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  <body>
    <h1 class= "text-center">Bienvenido</h1>
    <?php
      // Realizando una consulta SQL
      $query = 'SELECT hola()';
      $result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());

      // Imprimiendo los resultados en HTML
      echo "<table>\n";
      while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
          echo "\t<tr>\n";
          foreach ($line as $col_value) {
              echo "\t\t<td>$col_value</td>\n";
          }
          echo "\t</tr>\n";
      }
      echo "</table>\n";
    ?>

  </body>
</html>