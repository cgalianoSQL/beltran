<?php

include_once 'database.php';

class User extends DB{
    
    function verificarUser($user, $password){
        $query = $this->connect()->prepare('SELECT webapi.beltran_usuarios_verificacion(:user , :pass)');
        $query->execute(['user' => $user, 'pass' => $password]);
        return ($query);
    }    

    function obtenerIdPorUsuario($user, $password){
        $query = $this->connect()->prepare('SELECT webapi.beltran_usuarios_get_id(:user , :pass)');
        $query->execute(['user' => $user, 'pass' => $password]);
        return ($query);
    }    


    function registrar($jsonParams){
        $query = $this->connect()->prepare('call webapi.beltran_usuarios_creacion_procedimiento(:jsonParams, false)');
        $query->execute(['jsonParams' => $jsonParams]);
        return ($query);
    }    


    function cambiarPassword($password, $id){
        $query = $this->connect()->prepare('call webapi.beltran_usuarios_set_password(:id, :password ,false);');
        $query->execute(['id' => $id, 'password' => $password]);
        return ($query);
    }    


    function perfil($id){
        $query = $this->connect()->prepare('select id_usuario , usuario, nombre_completo, nro_cliente, documento from beltran.usuarios_vw where id_usuario = :id_session');
        $query->execute(['id_session' => $id]);
        return ($query);
    }    


    function listaSoporte(){
        $query = $this->connect()->prepare('select id_usuario , usuario, nombre_completo, documento, estado from beltran.usuarios_vw where id_tipo_permiso = :id_permiso');
        $query->execute(['id_permiso' => 2]);
        return ($query);
    }    

    function listaCliente(){
        $query = $this->connect()->prepare('select id_usuario , usuario, nombre_completo, documento, nro_cliente, estado  from beltran.usuarios_vw where id_tipo_permiso = :id_permiso');
        $query->execute(['id_permiso' => 3]);
        return ($query);
    }    


}

?>