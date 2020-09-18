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
       $id = $api->obtenerId($_POST['username'], $_POST['password']);

       switch($permiso["beltran_usuarios_verificacion"]) {
            case 'CLIENTE':
                $_SESSION['permiso'] = 'CLIENTE';
                $_SESSION['id'] = $id["beltran_usuarios_get_id"];
                header("Location: ../../cliente.php");
            break;
            case 'ADMINISTRADOR':
                $_SESSION['permiso'] = 'ADMINISTRADOR';
                $_SESSION['id'] = $id["beltran_usuarios_get_id"];
                header("Location: ../../admin.php");
            break;
            case 'SOPORTE':
                $_SESSION['permiso'] = 'SOPORTE';
                $_SESSION['id'] = $id["beltran_usuarios_get_id"];
                header("Location: ../../soporte.php");
            break;
            default:
            
                echo '<script language="javascript">alert("Error al ingresar credenciales");window.location.href="../../login.php"</script>';
              
            
               // header("Location: ../../resgistro.php");
        }

    }
    
    //else{
      //  $api->error('Error al llamar a la API');
    //}
    
?>