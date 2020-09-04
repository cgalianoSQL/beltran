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
            'nro_cliente' => $_POST['nro_cliente'],
            'nro_documento' => $_POST['nro_documento'],
            'id_tipo_documento' => (int)$_POST['id_tipo_documento'],
            'id_tipo_permiso' => 3
        );

        $jsonParams = json_encode($Params);


        $result = $api->registrar($jsonParams);

        if(!$result){
            $api->error('Error al ejecutar la API');
        } else {
           
        header("Location: ../../login.php");           
        }

    }else{
        $api->error('Error al llamar a la API');
    }
    
?>