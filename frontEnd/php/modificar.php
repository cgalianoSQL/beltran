<?php

session_start();

require 'database.php';

$sql = "UPDATE movies SET titulo = :titulo, year = :year, puntaje = :puntaje, duracion = :duracion, genero = :genero, descripcion = :descripcion, link_de_imagen = :link_de_imagen where id = :id";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $_POST['id']);
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
  echo json_encode('error');
}

