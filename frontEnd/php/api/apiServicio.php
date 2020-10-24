<?php

include_once 'servicio.php';

class ApiServicio{


    function misServios($id){
        $servicio = new Servicio();

        $res = $servicio->misServios($id);

        $result = $res->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }


    function crear($jsonParams){
        $servicio = new Servicio();

        $res = $servicio->crearServicio($jsonParams);

        $result = $res->fetch(PDO::FETCH_ASSOC);

        return $result;
    }


    function setHabilitado($id, $boolean){
        $servicio = new Servicio();

        $res = $servicio->setHabilitado($id, $boolean);

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