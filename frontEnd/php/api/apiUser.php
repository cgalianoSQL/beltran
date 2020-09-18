<?php

include_once 'user.php';
include_once 'PHPMailer-5.2-stable/PHPMailerAutoload.php';


class ApiUser{


    function verificar($username, $password){
        $user = new User();

        $res = $user->verificarUser($username, $password);

        $result = $res->fetch(PDO::FETCH_ASSOC);

        return $result;
    }


    function obtenerId($username, $password){
        $user = new User();

        $res = $user->obtenerIdPorUsuario($username, $password);

        $result = $res->fetch(PDO::FETCH_ASSOC);

        return $result;
    }


    function registrar($jsonParams){
        $user = new User();

        $res = $user->registrar($jsonParams);

        $result = $res->fetch(PDO::FETCH_ASSOC);

        return $result;
    }


    function cambiarPassword($password, $id){
        $user = new User();

        $res = $user->cambiarPassword($password, $id);

        $result = $res->fetch(PDO::FETCH_ASSOC);

        return $result;
    }


    function sendEmail($email, $nroCuenta){
        
        $mail = new PHPMailer();
        $mail -> isSMTP();
        $mail -> SMTPAuth = true; //variable booleanea
        $mail -> SMTPSecure = 'ssl';
        $mail -> Host = 'smtp.gmail.com';//servidor smtp de Gmail gratuito
        $mail -> Port = '465'; //puerto
        $mail -> isHTML();
        $mail -> Username = 'tester2020.cwg@gmail.com'; //
        $mail -> Password = '13245tester'; //
        $mail -> SetFrom('no-reply@hoecode.org');
        $mail -> Subject = 'Nueva Consulta De Su Pagina';
        $mail -> Body = 'http://localhost/beltran/frontEnd/registro2.php?cliente='. $nroCuenta;
        $mail -> AddAddress($email); //A quien se enviara el mail
        $mail -> Send();
    }


    function error($mensaje){
        echo '<code>' . json_encode(array('mensaje' => $mensaje)) . '</code>'; 
    }

    function exito($mensaje){
        echo '<code>' . json_encode(array('mensaje' => $mensaje)) . '</code>'; 
    }
}

?>