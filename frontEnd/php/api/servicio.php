<?php

include_once 'database.php';

class Servicio extends DB{
    
    function misServios($id){
        $query = $this->connect()->prepare('select id_servicio, nombre from beltran.mis_servicios_vw where id_usuario = :id_session');
        $query->execute(['id_session' => $id]);
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

    function setHabilitado($id, $boolean){
        $query = $this->connect()->prepare('call webapi.beltran_servicios_set_habilitado_procedimiento(:id, :boolean, false)');
        $query->execute(['id' => $id, 'boolean' => $boolean]);
        return ($query);
    }    

}

?>