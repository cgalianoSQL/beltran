<?php

include_once 'user.php';
include_once 'PHPMailer-5.2-stable/PHPMailerAutoload.php';


class ApiUser{


    function verificar($username, $password){
        $user = new User();

        $res = $user->verificarUser($username, md5($password));

        $result = $res->fetch(PDO::FETCH_ASSOC);

        return $result;
    }


    function obtenerId($username, $password){
        $user = new User();

        $res = $user->obtenerIdPorUsuario($username, md5($password));

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

        $res = $user->cambiarPassword(md5($password), $id);

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
        <head>
            <title></title>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <style type="text/css">
                @media screen {
                    @font-face {
                        font-family: "Lato";
                        font-style: normal;
                        font-weight: 400;
                        src: local("Lato Regular"), local("Lato-Regular"), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format("woff");
                    }

                    @font-face {
                        font-family: "Lato";
                        font-style: normal;
                        font-weight: 700;
                        src: local("Lato Bold"), local("Lato-Bold"), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format("woff");
                    }

                    @font-face {
                        font-family: "Lato";
                        font-style: italic;
                        font-weight: 400;
                        src: local("Lato Italic"), local("Lato-Italic"), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format("woff");
                    }

                    @font-face {
                        font-family: "Lato";
                        font-style: italic;
                        font-weight: 700;
                        src: local("Lato Bold Italic"), local("Lato-BoldItalic"), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format("woff");
                    }
                }

                /* CLIENT-SPECIFIC STYLES */
                body,
                table,
                td,
                a {
                    -webkit-text-size-adjust: 100%;
                    -ms-text-size-adjust: 100%;
                }

                table,
                td {
                    mso-table-lspace: 0pt;
                    mso-table-rspace: 0pt;
                }

                img {
                    -ms-interpolation-mode: bicubic;
                }

                /* RESET STYLES */
                img {
                    border: 0;
                    height: auto;
                    line-height: 100%;
                    outline: none;
                    text-decoration: none;
                }

                table {
                    border-collapse: collapse !important;
                }

                body {
                    height: 100% !important;
                    margin: 0 !important;
                    padding: 0 !important;
                    width: 100% !important;
                }

                /* iOS BLUE LINKS */
                a[x-apple-data-detectors] {
                    color: inherit !important;
                    text-decoration: none !important;
                    font-size: inherit !important;
                    font-family: inherit !important;
                    font-weight: inherit !important;
                    line-height: inherit !important;
                }

                /* MOBILE STYLES */
                @media screen and (max-width:600px) {
                    h1 {
                        font-size: 32px !important;
                        line-height: 32px !important;
                    }
                }

                /* ANDROID CENTER FIX */
                div[style*="margin: 16px 0;"] {
                    margin: 0 !important;
                }
            </style>
        </head>

        <body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">
            <!-- HIDDEN PREHEADER TEXT -->
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <!-- LOGO -->
                <tr>
                    <td bgcolor="#251d53" align="center">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                            <tr>
                                <td align="center" valign="top" style="padding: 40px 10px 40px 10px;"> </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#251d53" align="center" style="padding: 0px 10px 0px 10px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                            <tr>
                                <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                                    <h1 style="font-size: 48px; font-weight: 400; margin: 2;">RR-ONLINE!</h1> <img src=" https://img.icons8.com/clouds/100/000000/handshake.png" width="125" height="120" style="display: block; border: 0px;" />
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#251d53" align="center" style="padding: 0px 10px 0px 10px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                            <tr>
                                <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 40px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                                    <p style="margin: 0;">Le da la bienvenida</p>
                                </td>
                            </tr>
                            <tr>
                                <td bgcolor="#ffffff" align="left">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 60px 30px;">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td align="center" style="border-radius: 3px;" bgcolor="#251d53"><a href=http://localhost/beltran/Desarrollo/frontEnd/registro2.php?email='.$email.'" target="_blank" style="font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #251d53; display: inline-block;">Termine su registro</a></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr> <!-- COPY -->
                            <tr>
                                <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 0px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                                    <p style="margin: 0;">Si el boton no funciona aprete el link:</p>
                                </td>
                            </tr> <!-- COPY -->
                            <tr>
                                <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 20px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                                    <p style="margin: 0;"><a href=http://localhost/beltran/Desarrollo/frontEnd/registro2.php?email='.$email.'" target="_blank" style="color: #251d53;">Terminar registro</a></p>
                                </td>
                            </tr>
                            <tr>
                                <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 20px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                                    <p style="margin: 0;"></p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#251d53" align="center" style="padding: 0px 10px 0px 10px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                            <tr>
                                <td bgcolor="#251d53" align="left" style="padding: 0px 30px 30px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;"> <br>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
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