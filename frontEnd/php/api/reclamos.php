<?php

include_once 'database.php';

class Reclamos extends DB{
    
    function registrarReclamo($jsonParams){
        $query = $this->connect()->prepare('CALL webapi.beltran_reclamos_creacion_procedimiento(:jsonParams, false)');
        $query->execute(['jsonParams' => $jsonParams]);
        return ($query);
    }    


    function tomarReclamo($jsonParams){
        $query = $this->connect()->prepare('CALL webapi.beltran_reclamos_tomar_procedimiento(:jsonParams, false)');
        $query->execute(['jsonParams' => $jsonParams]);
        return ($query);
    }    


    function actualizarReclamo($jsonParams){
        $query = $this->connect()->prepare('CALL webapi.beltran_movimientos_reclamo_actualizacion(:jsonParams, false)');
        $query->execute(['jsonParams' => $jsonParams]);
        return ($query);
    }    


    function cerrarReclamo($jsonParams){
        $query = $this->connect()->prepare('CALL webapi.beltran_movimientos_reclamo_cerrar(:jsonParams, false)');
        $query->execute(['jsonParams' => $jsonParams]);
        return ($query);
    }    


    function mostrarApi($id){
        $query = $this->connect()->prepare('SELECT id_reclamos, creacion, servicio, pertenece, asignado,nombre_estado FROM beltran.reclamos_vw where id_usuario_pertenece = :id');
        $query->execute(['id' => $id]);
        return ($query);
    }    


    function mostrarReclamosSoporte(){
        $query = $this->connect()->prepare('SELECT id_reclamos, creacion, servicio, pertenece, asignado, nombre_estado FROM beltran.reclamos_vw WHERE asignado = :soporte AND  nombre_estado = :estado');
        $query->execute(['soporte' => 'soporte', 'estado' => 'ABIERTO']);
        return ($query);
    }    


    function mostrarMisReclamosSoporte($id){
        $query = $this->connect()->prepare('SELECT id_reclamos, creacion, servicio, pertenece, asignado, nombre_estado FROM beltran.reclamos_vw where id_asignado = :id ');
        $query->execute(['id' => $id]);
        return ($query);
    }   


    function mostrarMovimientos($id){
        $query = $this->connect()->prepare('SELECT creacion, comentario, realizado, archivo from beltran.reclamos_movimientos_vw where id_reclamos = :id ');
        $query->execute(['id' => $id]);
        return ($query);
    }   



}

?>