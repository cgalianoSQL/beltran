<?php

include_once 'database.php';

class Servicio extends DB{
    
    function misServios($id){
        $query = $this->connect()->prepare('select id_servicio, nombre from beltran.servicios');
        $query->execute();
        return ($query);
    }

    function reporte(){
        $query = $this->connect()->prepare('select * from beltran.servicios_reporte');
        $query->execute();
        return ($query);
    }
    
    function lista(){
        $query = $this->connect()->prepare('select * from beltran.servicios');
        $query->execute();
        return ($query);
    }    

    function crearServicio($json){
        $query = $this->connect()->prepare('call webapi.beltran_servicios_creacion_procedimiento(:json, false)');
        $query->execute(['json' => $json]);
        return ($query);
    }    

    function setHabilitado($id){
        $query = $this->connect()->prepare('call webapi.beltran_servicios_set_habilitado_procedimiento(:id, false)');
        $query->execute(['id' => $id]);
        return ($query);
    }    

}

?>