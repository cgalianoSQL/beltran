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
        $query = $this->connect()->prepare('select id_usuario , usuario, nombre_completo, documento, email from beltran.usuarios_vw where id_usuario = :id_session');
        $query->execute(['id_session' => $id]);
        return ($query);
    }    

    
    function listaSoporte(){
        $query = $this->connect()->prepare('select id_usuario , usuario, nombre_completo, documento, estado from beltran.usuarios_vw where id_tipo_permiso = :id_permiso');
        $query->execute(['id_permiso' => 2]);
        return ($query);
    }    


    function listaSupervisor(){
        $query = $this->connect()->prepare('select id_usuario , usuario, nombre_completo, documento, estado from beltran.usuarios_vw where id_tipo_permiso = :id_permiso');
        $query->execute(['id_permiso' => 4]);
        return ($query);
    }    

    function listaCliente(){
        $query = $this->connect()->prepare('select id_usuario , usuario, nombre_completo, documento, estado  from beltran.usuarios_vw where id_tipo_permiso = :id_permiso');
        $query->execute(['id_permiso' => 3]);
        return ($query);
    }    

    function recuperar($usuario, $email){
        $query = $this->connect()->prepare('SELECT webapi.beltran_usuarios_recuperar_password(:usuario, :email);');
        $query->execute(['usuario' => $usuario, 'email' => $email]);
        return ($query);
    }    

    function recuperarUsuario($email){
        $query = $this->connect()->prepare('SELECT webapi.beltran_usuarios_recuperar_usuario(:email);');
        $query->execute(['email' => $email]);
        return ($query);
    }    

    function setEstado($usuario){
        $query = $this->connect()->prepare('call webapi.beltran_usuarios_set_estado_procedimiento(:usuario, false)');
        $query->execute(['usuario' => $usuario]);
        return ($query);
    }    



}

?>