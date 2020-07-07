<?php

session_start();

require 'database.php';

$records = $conn->prepare('SELECT * FROM movies');
$records->execute();
$results = $records;


foreach ($result as $row){
  echo ($row['link_de_imagen']);

}

