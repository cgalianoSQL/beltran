<html>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</html>
<?php

    include_once 'apiUser.php';
    session_start();
    
    $api = new ApiUser();
    $error = '';

    if(isset($_POST['numCuenta']) && isset($_POST['email'])){

        $result = $api->validarCliente($_POST['numCuenta']);

        if(!$result){

            ?>
                <script>
                    swal({
                        title: "Numero de cliente no valido",
                        text: "",
                        icon: "error",
                        button: "OK",
                    }).then(function() {
                        window.location = "../../registro.php";
                        });
                </script>
            <?php   

        } else 
        {

            try {
                    $api->sendEmail($_POST['email'], $_POST['numCuenta']);
                    ?>

                        <script>
                        swal({
                            title: "Revise su Email",
                            text: "",
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
                            title: "Error revise los datos",
                            text: "",
                            icon: "error",
                            button: "OK",
                        }).then(function() {
                            window.location = "../../login.php";
                            });
                    </script>
                    <?php   
                }
            }

    }else{
        ?>

            <script>
            swal({
                title: "ERROR: Revise los datos enviados",
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