<html>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</html>
<?php
    include_once 'apiUser.php';
    session_start();
    $api = new ApiUser();
    $error = '';
    if(isset($_POST['usuario'])){


        $result = $api->setEstado($_POST['usuario']);
        if(!$result){
                ?>

                <script>
                swal({
                    title: "ERROR CON QUERY",
                    text: "Algo inesperado sucedió",
                    icon: "error",
                    button: "OK",
                  }).then(function() {
                    window.location = "../../listaSupervisorAdmin.php";
                    });
                  </script>
                  <?php   
        } else {
        ?>

        <script>
        swal({
            title: "ESTADO MODIFICADO",
            text: "Ha modifico el estado con éxito",
            icon: "success",
            button: "OK",
          }).then(function() {
            window.location = "../../listaSupervisorAdmin.php";
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
            window.location = "../../listaSupervisorAdmin.php";
            });
          </script>
          <?php   
    }
    
?>