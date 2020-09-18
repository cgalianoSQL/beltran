<?php

include_once 'database.php';

class Reclamos extends DB{
    
    function registrarReclamo($jsonParams){
        $query = $this->connect()->prepare('CALL webapi.beltran_reclamos_creacion_procedimiento(:jsonParams, false)');
        $query->execute(['jsonParams' => $jsonParams]);
        return ($query);
    }    


    function mostrarApi($id){
        $query = $this->connect()->prepare('SELECT * FROM beltran.reclamos_vw where id_usuario_pertenece = :id');
        $query->execute(['id' => $id]);
        return ($query);
    }    



}

?>