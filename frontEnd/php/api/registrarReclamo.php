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
        
        echo 
        '<script>     
        swal({
            title: "RECLAMO CREADO CON ÉXITO",
            text: "Puede ver el mismo en su lista de reclamos",
            icon: "success",
            button: "OK",
          });
          </script>';
         
          // echo '<script> window.location.href="../../misReclamos.php"</script>';          
    }

    }else{
        $api->error('Error al llamar a la API');
    }
    
?>