<html>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</html>
<?php

    include_once 'apiUser.php';
    session_start();
    
    $api = new ApiUser();
    $error = '';

    if(isset($_POST['email'])){


            try {
                    $api->sendEmail($_POST['email']);
                    ?>

                        <script>
                        swal({
                            title: "Hemos enviado un correo a su casilla",
                            text: "Si no encuentra el mismo por favor revise “Correo no deseado” o “Spam” ",
                            icon: "success",
                            button: "OK",
                        }).then(function() {
                            window.location = "../../login.php";
                            });
                    </script>
                    <?php   

                } catch (Exception $e) {
                    ?>

                        <script>
                        swal({
                            title: "Error revise los datos ingresados",
                            text: "",
                            icon: "error",
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
                title: "Error revise los datos ingresados",
                text: "",
                icon: "success",
                button: "error",
            }).then(function() {
                window.location = "../../login.php";
                });
        </script>
        <?php   
    }
    
?>