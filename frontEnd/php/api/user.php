<?php

include_once 'database.php';

class User extends DB{
    
    function verificarUser($user, $password){
        $query = $this->connect()->prepare('SELECT webapi.beltran_usuarios_verificacion(:user , :pass)');
        $query->execute(['user' => $user, 'pass' => $password]);
        return ($query);
    }    

    function registrar($jsonParams){
        $query = $this->connect()->prepare('CALL webapi.beltran_usuarios_creacion_procedimiento(:jsonParams, false)');
        $query->execute(['jsonParams' => $jsonParams]);
        return ($query);
    }    


}

?>