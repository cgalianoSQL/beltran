<?php

include_once 'servicio.php';

class ApiServicio{


    function misServios($id){
        $user = new Servicio();

        $res = $user->misServios($id);

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