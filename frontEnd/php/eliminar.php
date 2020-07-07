<?php

session_start();

require 'database.php';

$sql = "DELETE FROM movies WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $_POST['id']);


if ($stmt->execute()) {
  echo json_encode('Correcto');
} else {
  echo json_encode('error');
}

