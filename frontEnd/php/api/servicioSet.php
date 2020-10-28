<html>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</html>
<?php
    include_once 'apiServicio.php';
    session_start();
    $api = new ApiServicio();
    $error = '';
    if(isset($_POST['id'])){


        $result = $api->setHabilitado($_POST['id']);
        if(!$result){
                ?>

                <script>
                swal({
                    title: "ERROR CON QUERY",
                    text: "Algo inesperado sucedió",
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
            title: "ESTADO MODIFICADO",
            text: "Ha modifico el estado del servicio con éxito",
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
            text: "Verifique los campos ingresados",
            icon: "error",
            button: "OK",
          }).then(function() {
            window.location = "../../crearServicioAdmin.php";
            });
          </script>
          <?php   
    }
    
?>