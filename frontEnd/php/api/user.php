<?php

include_once 'database.php';

class User extends DB{
    
    function obtenerUsers(){
        $query = $this->connect()->query('SELECT * FROM  beltran.usuarios');
        return ($query);
    }

    function verificarUser($user, $password){
        $query = $this->connect()->prepare('SELECT webapi.beltran_usuarios_verificacion(:user , :pass)');
        $query->execute(['user' => $user, 'pass' => $password]);
        return ($query);
    }    

}

?>