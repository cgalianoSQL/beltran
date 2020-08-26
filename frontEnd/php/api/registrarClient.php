<?php

    include_once 'apiUser.php';
    session_start();
    
    $api = new ApiUser();
    $error = '';

    if(isset($_POST['password']) && isset($_POST['username'])){

        $jsonParams = array(
            'usuario'  => $_POST['usuario'],
            'password' => $_POST['password'],
            'nombre' => $_POST['nombre'],
            'apellido' => $_POST['apellido'],
            'nro_cliente' => $_GET['nro'],
            'nro_documento' => $_POST['nro_documento'],
            'id_tipo_documento' => $_POST['id_tipo_documento'],
            'id_tipo_permiso' => 1
        );

       try {
            $api->registrar($jsonParams);
            header("Location: ../../resgistro.php");

        } catch (Exception $e) {
            $api->error('Error al ejecutar la API');
        }

    }else{
        $api->error('Error al llamar a la API');
    }
    
?>