<?php

session_start();

require 'database.php';

$sql = "INSERT INTO  contactos 
  (nombre, email, mensaje)
VALUES 
  (:nombre,:email, :mensaje)";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':nombre', $_POST['nombre']);
$stmt->bindParam(':email', $_POST['email']);
$stmt->bindParam(':mensaje', $_POST['mensaje']);

if ($stmt->execute()) {
  echo json_encode('Correcto');
} else {
  echo json_encode('Error');
}

