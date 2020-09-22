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


    function mostrar($id){
        $reclamos = new Reclamos();

        $res = $reclamos->mostrarApi($id);

        return $res;
    }


    function mostrarReclamosSoporte(){
        $reclamos = new Reclamos();

        $res = $reclamos->mostrarReclamosSoporte();

        $result = $res->fetchAll(PDO::FETCH_ASSOC);

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