<html>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</html>
<?php
    include_once 'apiServicio.php';
    session_start();
    $api = new ApiServicio();
    $error = '';
    if(isset($_POST['nomServ'])){


       $Params = array(
            'nombre'  => $_POST['nomServ'],
            'descripcion' => $_POST['comentario']
        );


        $jsonParams = json_encode($Params);

        $result = $api->crear($jsonParams);
        if(!$result){
                ?>

                <script>
                swal({
                    title: "ERROR!",
                    text: "Es probable que el servicio haya sido creado anteriormente. Verifíquelo en la sección “Lista De Servicios”",
                    

                    icon: "error",
                    button: "OK",
                  }).then(function() {
                    window.location = "../../listaDeServiciosAdmin.php";
                    });
                  </script>
                  <?php   
        } else {
        ?>

        <script>
        swal({
            title: "SERVICIO CREADO CON ÉXITO",
            text: "Puede ver el mismo en la sección 'Lista De Servicios'",
            icon: "success",
            button: "OK",
          }).then(function() {
            window.location = "../../listaDeServiciosAdmin.php";
            });
          </script>
          <?php         
    }

    }else{
        ?>

        <script>
        swal({
            title: "ERROR DE API",
            text: "Verifique los campos ingresados no son validos",
            icon: "error",
            button: "OK",
          }).then(function() {
            window.location = "../../crearServicioAdmin.php";
            });
          </script>
          <?php   
    }
    
?>