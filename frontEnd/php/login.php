<?php

session_start();

require 'database.php';

if (!empty($_POST['username']) && !empty($_POST['password'])) {
  $records = $conn->prepare('SELECT id, username, password FROM users WHERE username = :username');
  $records->bindParam(':username', $_POST['username']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  if (count($results) > 0 && ($_POST['password'] === $results['password'])) {
    $_SESSION['user_id'] = $results['id'];
        echo json_encode('Correcto');
  } else {
        echo json_encode('error');
  }
}
