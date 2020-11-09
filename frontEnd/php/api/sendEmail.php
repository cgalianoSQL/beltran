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