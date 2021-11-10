<?php

include_once 'servicio.php';

class ApiServicio{


    function misServios($id){
        $servicio = new Servicio();

        $res = $servicio->misServios($id);

        $result = $res->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    function reporte(){
        $servicio = new Servicio();

        $res = $servicio->reporte();

        $result = $res->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }


    function listaServios(){
        $servicio = new Servicio();

        $res = $servicio->lista();

        $result = $res->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }


    function crear($jsonParams){
        $servicio = new Servicio();

        $res = $servicio->crearServicio($jsonParams);

        $result = $res->fetch(PDO::FETCH_ASSOC);

        return $result;
    }


    function setHabilitado($id){
        $servicio = new Servicio();

        $res = $servicio->setHabilitado($id);

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