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

    function perfil($id){
        $user = new User();

        $res = $user->perfil($id);

        $result = $res->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    function listaSoporte(){
        $user = new User();

        $res = $user->listaSoporte();

        $result = $res->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    
    function listaSupervisor(){
        $user = new User();

        $res = $user->listaSupervisor();

        $result = $res->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }



    function listaCliente(){
        $user = new User();

        $res = $user->listaCliente();

        $result = $res->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }


    function recuperar($usuario, $email){
        $user = new User();

        $res = $user->recuperar($usuario, $email);

        $result = $res->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    function setEstado($usuario){
        $user = new User();

        $res = $user->setEstado($usuario);

        $result = $res->fetch(PDO::FETCH_ASSOC);

        return $result;
    }




    function sendEmail($email){
        
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
        $mail -> Body = '
        

                <html>
                <body>

                    <td align="center" bgcolor="#70bbd9" style="padding: 40px 0 30px 0;">
                        <h1>RR-ONLINE</h1>
                        <h3>Le da la bienvenida</h3>
                        <img src="https://www.socialchef.es/wp-content/uploads/atencion_cliente_social-media.jpg" alt="Magic" width="300" height="190" style="display: block;" />
                        <br>
                        <a href="http://localhost/beltran/frontEnd/registro2.php?email='.$email.'" style="background: white;  outline: none;
                        text-decoration: none;
                        display: inline-block;
                        text-align: center;
                        font-family: Times New Roman;
                        border: none;
                        outline: none;
                        background: #1f8b40;
                        color: #fff;
                        font-size: 18px;
                        border-radius: 15px;
                        margin-top: 5px;
                        "> Terminar Registro </a>
                        <br>
                        <p>En caso de que el boton no funcione copie el siguiente link en su navegador:</p>
                        http://localhost/beltran/frontEnd/registro2.php?email='.$email.'
                        
                    </td>    
        
            </body>
        </html>
        
        ';
        $mail -> AddAddress($email); //A quien se enviara el mail
        $mail -> Send();
    }


    function sendEmailRecuperar($email, $password){
        
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
        $mail -> Body = '
        

                <html>
                <body>

                    <td align="center" bgcolor="#70bbd9" style="padding: 40px 0 30px 0;">
                        <h1>RR-ONLINE</h1>
                        <h2>Recuperacion de contraseña</h2>
                        <img src="https://www.socialchef.es/wp-content/uploads/atencion_cliente_social-media.jpg" alt="Magic" width="300" height="190" style="display: block;" />
                        <p>Su contraseña es : '.$password.' </p>
                        <p>Se recomienda cambiarla. </p>
                        
                    </td>    
        
            </body>
        </html>
        
        ';
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