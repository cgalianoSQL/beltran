<?php

session_start();

require 'database.php';

$sql = "INSERT INTO movies 
  (titulo, year, puntaje, duracion, genero, descripcion, link_de_imagen)
VALUES 
  (:titulo, :year, :puntaje, :duracion, :genero, :descripcion, :link_de_imagen)";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':titulo', $_POST['titulo']);
$stmt->bindParam(':year', $_POST['year']);
$stmt->bindParam(':puntaje', $_POST['puntaje']);
$stmt->bindParam(':duracion', $_POST['duracion']);
$stmt->bindParam(':genero', $_POST['genero']);
$stmt->bindParam(':descripcion', $_POST['descripcion']);
$stmt->bindParam(':link_de_imagen', $_POST['link_de_imagen']);

if ($stmt->execute()) {
  echo json_encode('Correcto');
} else {
  echo json_encode('Error');
}

