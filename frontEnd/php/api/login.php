<html>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</html>
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
            
                echo 
                '<script>     
                swal({
                    title: "ERROR!",
                    text: "Ha ingresado mal sus credenciales",
                    icon: "error",
                    button: "OK",
                  });
                  </script>';
                
                //("../../login.php");
               // header("Location: ../../resgistro.php");
        }

    }
    
    //else{
      //  $api->error('Error al llamar a la API');
    //}
    
?>