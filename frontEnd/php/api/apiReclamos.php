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


    function tomar($jsonParams){
        $reclamos = new Reclamos();

        $res = $reclamos->tomarReclamo($jsonParams);

        $result = $res->fetch(PDO::FETCH_ASSOC);

        return $result;
    }


    function actualizar($jsonParams){
        $reclamos = new Reclamos();

        $res = $reclamos->actualizarReclamo($jsonParams);

        $result = $res->fetch(PDO::FETCH_ASSOC);

        return $result;
    }


    function cerrar($jsonParams){
        $reclamos = new Reclamos();

        $res = $reclamos->cerrarReclamo($jsonParams);

        $result = $res->fetch(PDO::FETCH_ASSOC);

        return $result;
    }


    function reabrir($jsonParams){
        $reclamos = new Reclamos();

        $res = $reclamos->reabrirReclamo($jsonParams);

        $result = $res->fetch(PDO::FETCH_ASSOC);

        return $result;
    }


    function mostrar($id){
        $reclamos = new Reclamos();

        $res = $reclamos->mostrarApi($id);

        return $res;
    }


    function identify($id){
        $reclamos = new Reclamos();

        $res = $reclamos->identify($id);

        $result = $res->fetch(PDO::FETCH_ASSOC);
        
        return $result;
    }


    function misReclamosInfo($id, $pertenece){
        $reclamos = new Reclamos();

        $res = $reclamos->misReclamosInfo($id, $pertenece);

        $result = $res->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    function mostrarMovimientos($id){
        $reclamos = new Reclamos();

        $res = $reclamos->mostrarMovimientos($id);

        return $res;
    }


    function mostrarReclamosSoporte(){
        $reclamos = new Reclamos();

        $res = $reclamos->mostrarReclamosSoporte();

        $result = $res->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }


    function reporte(){
        $reclamos = new Reclamos();

        $res = $reclamos->reporte();

        $result = $res->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }


    function mostrarMisReclamosSoporte($id){
        $reclamos = new Reclamos();

        $res = $reclamos->mostrarMisReclamosSoporte($id);

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