<html>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</html>
<?php
    include_once 'apiReclamos.php';
    session_start();
    $api = new ApiReclamos();
    $error = '';
    if(isset($_POST['comentario'])){

      $tipoArchivo = $_FILES['archivo']['type'];
      $nombreArchivo = $_FILES['archivo']['name'];
      $tamanoArchivo = $_FILES['archivo']['size'];
      $imagenSubida = fopen($_FILES['archivo']['tmp_name'], 'r');
      $binariosImagen = fread($imagenSubida, $tamanoArchivo);
      $base64 = 'data:image/' . $tipoArchivo . ';base64,' . base64_encode($binariosImagen);

       $Params = array(
            'id_servicio'  => $_POST['id_servicio'],
            'comentario' => $_POST['comentario'],
            'archivo' =>  $base64,
            'id_usuario_pertenece' => $_POST['id_usuario_pertenece']
        );


        $jsonParams = json_encode($Params);

        $result = $api->registrar($jsonParams);
        if(!$result){
                ?>

                <script>
                swal({
                    title: "ERROR CON QUERY",
                    text: "Puede ver el mismo en la sección 'Mis Reclamos'",
                    icon: "success",
                    button: "OK",
                  }).then(function() {
                    window.location = "../../misReclamos.php";
                    });
                  </script>
                  <?php   
        } else {
        ?>

        <script>
        swal({
            title: "RECLAMO CREADO CON ÉXITO",
            text: "Puede ver el mismo en la sección 'Mis Reclamos'",
            icon: "success",
            button: "OK",
          }).then(function() {
            window.location = "../../misReclamos.php";
            });
          </script>
          <?php         
    }

    }else{
        ?>

        <script>
        swal({
            title: "ERROR DE API",
            text: "Puede ver el mismo en la sección 'Mis Reclamos'",
            icon: "error",
            button: "OK",
          }).then(function() {
            window.location = "../../misReclamos.php";
            });
          </script>
          <?php   
    }
    
?>