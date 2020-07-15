<?php

session_start();

require 'database.php';


$str1 = pg_escape_string($_POST['username']);
$str2 = pg_escape_string($_POST['password']);
$result = pg_query($conn, "SELECT webapi.beltran_usuarios_verificacion('{$str1}', '{$str2}')");
$devolver = pg_fetch_object( $result, 0 );

 
echo json_encode($devolver);