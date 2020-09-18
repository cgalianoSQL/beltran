<?php

    include_once 'apiUser.php';
    session_start();
    
    $api = new ApiUser();
    $error = '';

    if(isset($_POST['password']) && isset($_POST['new_password']) && isset($_POST['id']) && $_POST['password'] == $_POST['new_password']){

        $result = $api->cambiarPassword($_POST['password'], $_POST['id']);

        if(!$result){
            echo '<script language="javascript">alert("Fallo de query");window.location.href="../../login.php"</script>';
        } else {
           
            echo '<script language="javascript">alert("Contraseña cambiada con exito");window.location.href="../../login.php"</script>';         
        }

    }else{
        echo '<script language="javascript">alert("Error contraseña no identicas");window.location.href="../../login.php"</script>';
    }
    
?>