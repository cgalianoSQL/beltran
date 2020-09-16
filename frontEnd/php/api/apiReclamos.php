<?php

include_once 'reclamos.php';
include_once 'PHPMailer-5.2-stable/PHPMailerAutoload.php';


class ApiReclamos{


    function registrar($jsonParams){
        $reclamos = new Reclamos();

        $res = $reclamos->registrarReclamo($jsonParams);

        $result = $res->fetch(PDO::FETCH_ASSOC);

        return $result;
    }


    function mostrar(){
        $reclamos = new Reclamos();

        $res = $reclamos->mostrarApi();

        return $res;
    }

    function error($mensaje){
        echo '<code>' . json_encode(array('mensaje' => $mensaje)) . '</code>'; 
    }

    function exito($mensaje){
        echo '<code>' . json_encode(array('mensaje' => $mensaje)) . '</code>'; 
    }
}

?>