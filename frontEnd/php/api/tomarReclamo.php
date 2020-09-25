<html>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</html>
<?php
    include_once 'apiReclamos.php';
    session_start();
    $api = new ApiReclamos();
    $error = '';
    if(isset($_POST['id_reclamo']) && isset($_POST['id_asignado'])){

       $Params = array(
            'id_reclamo'  => $_POST[''],
            'id_asignado' => $_POST['']
        );
        $jsonParams = json_encode($Params);
        $result = $api->tomar($jsonParams);
            if(!$result){
            $api->error('Error al ejecutar la API');
        } else {
        ?>

        <script>
        swal({
            title: "RECLAMO TOMADO CON ÉXITO",
            text: "Puede ver el mismo en la sección 'Mis Reclamos'",
            icon: "success",
            button: "OK",
          }).then(function() {
            window.location = "../../listaReclamosSoporte.php";
            });
          </script>
          <?php         
    }

    }else{
        $api->error('Error al llamar a la API');
    }
    
?>