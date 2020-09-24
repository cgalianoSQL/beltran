<html>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</html>
<?php
    include_once 'apiReclamos.php';
    session_start();
    $api = new ApiReclamos();
    $error = '';
    if(isset($_POST['comentario'])){
       $Params = array(
            'id_servicio'  => $_POST['id_servicio'],
            'comentario' => $_POST['comentario'],
            'id_usuario_pertenece' => $_POST['id_usuario_pertenece']
        );
        $jsonParams = json_encode($Params);
        $result = $api->registrar($jsonParams);
            if(!$result){
            $api->error('Error al ejecutar la API');
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
        $api->error('Error al llamar a la API');
    }
    
?>