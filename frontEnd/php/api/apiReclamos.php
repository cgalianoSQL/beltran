<?php

include_once 'reclamos.php';
include_once 'PHPMailer-5.2-stable/PHPMailerAutoload.php';


class ApiReclamos{


    function registrar($jsonParams){
        $user = new User();

        $res = $user->registrarReclamo($jsonParams);

        $result = $res->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    function error($mensaje){
        echo '<code>' . json_encode(array('mensaje' => $mensaje)) . '</code>'; 
    }

    function exito($mensaje){
        echo '<code>' . json_encode(array('mensaje' => $mensaje)) . '</code>'; 
    }
}

?>