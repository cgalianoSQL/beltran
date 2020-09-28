<?php

include_once 'database.php';

class Servicio extends DB{
    
    function misServios($id){
        $query = $this->connect()->prepare('select id_servicio, nombre from beltran.mis_servicios_vw where id_usuario = :id_session');
        $query->execute(['id_session' => $id]);
        return ($query);
    }    


}

?>