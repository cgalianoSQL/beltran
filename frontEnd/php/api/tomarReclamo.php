<html>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</html>
<?php
    include_once 'apiReclamos.php';
    session_start();
    $api = new ApiReclamos();
    $error = '';
    if(isset($_POST['id_reclamo']) && isset($_POST['id_asignado'])){

      $imagenSubida = fopen("../../img/imagen.jpg", 'r');
      $binariosImagen = fread($imagenSubida, 3000000);
      $base64 = 'data:image/jpg;base64,' . base64_encode($binariosImagen);

       $Params = array(
            'id_reclamo'  => $_POST['id_reclamo'],
            'id_asignado' => $_POST['id_asignado'],
            'archivo' =>  $base64
        );

        $jsonParams = json_encode($Params);
        $result = $api->tomar($jsonParams);
            if(!$result){
            ?>

                <script>
                swal({
                    title: "ERROR QUERY",
                    icon: "error",
                    button: "OK",
                  }).then(function() {
                    window.location = "../../misReclamosSoporte.php";
                    });
                </script>
            <?php     
        } else {
        ?>

        <script>
        swal({
            title: "RECLAMO TOMADO CON ÉXITO",
            text: "Puede ver el mismo en la sección 'Mis Reclamos'",
            icon: "success",
            button: "OK",
          }).then(function() {
            window.location = "../../misReclamosSoporte.php";
            });
          </script>
          <?php         
    }

    }else{
        ?>

        <script>
        swal({
            title: "ERROR API",
            icon: "error",
            button: "OK",
          }).then(function() {
            window.location = "../../misReclamosSoporte.php";
            });
        </script>
    <?php         
    }
    
?>