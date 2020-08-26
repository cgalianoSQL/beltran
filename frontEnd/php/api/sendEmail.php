<?php

    include_once 'apiUser.php';
    session_start();
    
    $api = new ApiUser();
    $error = '';

    if(isset($_POST['numCuenta']) && isset($_POST['email'])){

       try {
            $api->sendEmail($_POST['email'], $_POST['numCuenta']);
            header("Location: ../../login.php");

        } catch (Exception $e) {
            $api->error('Error al ejecutar la API');
        }

    }else{
        $api->error('Error al llamar a la API');
    }
    
?>