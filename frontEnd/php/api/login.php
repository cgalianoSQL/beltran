<?php

    include_once 'apiUser.php';
    session_start();
    
    $api = new ApiUser();
    $error = '';

    if(isset($_POST['password']) && isset($_POST['username'])){

    ##    $item = array(
    ##        'nombre' => $_POST['username'],
    ##        'imagen' => $_POST['password']
    ##    );

       $permiso = $api->verificar($_POST['username'], $_POST['password']);

       switch($permiso["beltran_usuarios_verificacion"]) {
            case 'CLIENTE':
                $_SESSION['permiso'] = 'CLIENTE';
                header("Location: ../../cliente.php");
            break;
            case 'ADMINISTRADOR':
                $_SESSION['permiso'] = 'ADMINISTRADOR';
                header("Location: ../../admin.php");
            break;
            case 'SOPORTE':
                $_SESSION['permiso'] = 'SOPORTE';
                header("Location: ../../soporte.php");
            break;
            default:
                header("Location: ../../resgistro.php");
        }

    }else{
        $api->error('Error al llamar a la API');
    }
    
?>