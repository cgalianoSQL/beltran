<?php

$server = 'localhost';
$port = 5432;
$username = 'dba_php';
$password = 'dba';
$database = 'pruebas';

try {
  $conn =pg_connect("host=$server port=$port dbname=$database user=$username password=$password");
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}

?>