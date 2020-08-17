<?php

include_once 'database.php';

class User extends DB{
    
    function obtenerUsers(){
        $query = $this->connect()->query('SELECT * FROM  beltran.usuarios');
        return ($query);
    }

    function verificarUser($user, $password){
        $query = $this->connect()->query('SELECT webapi.beltran_usuarios_verificacion('{$user}', '{$password}')');
        return ($query);
    }    

}

?>