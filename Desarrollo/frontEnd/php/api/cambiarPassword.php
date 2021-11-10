<html>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</html>
<?php

    include_once 'apiUser.php';
    session_start();
    
    $api = new ApiUser();
    $error = '';

    if(isset($_POST['password']) && isset($_POST['new_password']) && isset($_POST['id']) && $_POST['password'] == $_POST['new_password']){

        $result = $api->cambiarPassword($_POST['password'], $_POST['id']);

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
                title: "HA CAMBIADO SU CONTRASEÑA CON ÉXITO ",
                text: "",
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
                    title: "ERROR! LAS CONTRASEÑAS NO COINCIDEN",
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