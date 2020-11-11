<html>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</html>
<?php

    include_once 'apiUser.php';
    session_start();
    
    $api = new ApiUser();
    $error = '';

    if(isset($_POST['password'])){

        $Params = array(
            'usuario'  => $_POST['usuario'],
            'password' => $_POST['password'],
            'nombre' => $_POST['nombre'],
            'apellido' => $_POST['apellido'],
            'nro_documento' => $_POST['nro_documento'],
            'id_tipo_documento' => (int)$_POST['id_tipo_documento'],
            'id_tipo_permiso' => 4,
            'email' => $_POST['email']
        );

        $jsonParams = json_encode($Params);


        $result = $api->registrar($jsonParams);

        if(!$result){
            ?>
                 
                <script>     
                swal({
                    title: "ERROR!",
                    text: "Error al ejecutar la QUERY",
                    icon: "error",
                    confirmButtonText: 'OK',
                }).then(function() {
                    window.location = "../../crearSupervisorAdmin.php";
                    });
                </script>
            <?php
        } else {
           
            ?>
                 
            <script>     
            swal({
                title: "SUPERVISOR CREADO CON ÉXITO",
                text: "Puede visualizar el mismo en la sección 'Lista de Supervisores'",
                icon: "success",
                confirmButtonText: 'OK',
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
            title: "ERROR!",
            text: "Error al ejecutar la API",
            icon: "error",
            confirmButtonText: 'OK',
        }).then(function() {
            window.location = "../../crearSupervisorAdmin.php";
            });
        </script>
    <?php
    }
    
?>