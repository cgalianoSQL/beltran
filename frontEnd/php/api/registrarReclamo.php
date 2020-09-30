<html>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</html>
<?php
    include_once 'apiReclamos.php';
    session_start();
    $api = new ApiReclamos();
    $error = '';
    if(isset($_POST['comentario'])){

        ECHO file_get_contents($_POST['archivo']);

       $Params = array(
            'id_servicio'  => $_POST['id_servicio'],
            'comentario' => $_POST['comentario'],
            'archivo' => base64_encode($_POST['archivo']),
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