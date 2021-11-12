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
            'password' => md5($_POST['password']),
            'nombre' => $_POST['nombre'],
            'apellido' => $_POST['apellido'],
            'nro_documento' => $_POST['nro_documento'],
            'id_tipo_documento' => (int)$_POST['id_tipo_documento'],
            'id_tipo_permiso' => 3,
            'email' => $_POST['email']
        );

        $jsonParams = json_encode($Params);


        $result = $api->registrar($jsonParams);

        if(!$result){
            ?>
                <script>
                    swal({
                        title: "Error de Query",
                        text: "",
                        icon: "error",
                        button: "OK",
                    }).then(function() {
                        window.location = "../../login.php";
                        });
                </script>
            <?php  
        } else {
           
        ?>
            <script>
                swal({
                    title: "SE HA REGISTRADO CON ÉXITO",
                    text: "Ya puede comenzar a utilizar RR-ONLINE ",
                    icon: "success",
                    button: "OK",
                }).then(function() {
                    window.location = "../../login.php";
                    });
            </script>
        <?php          
        }

    }else{
        ?>
            <script>
                swal({
                    title: "Error de Api",
                    text: "",
                    icon: "error",
                    button: "OK",
                }).then(function() {
                    window.location = "../../login.php";
                    });
            </script>
        <?php  
    }
    
?>