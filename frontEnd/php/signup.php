<?php

session_start();

require 'database.php';


if (($_POST['password']) != ($_POST['repassword'])) {
  echo json_encode('error');
  
} else {

  $sql = "INSERT INTO users 
    (username, password)
  VALUES 
    (:username, :password)";

  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':username', $_POST['username']);
  $stmt->bindParam(':password', $_POST['password']);

  if ($stmt->execute()) {
    echo json_encode('Correcto');
  } else {
    echo json_encode('falla');
  }
}
