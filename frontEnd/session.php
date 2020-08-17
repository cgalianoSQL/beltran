<?php

session_start();

if (!isset($_SESSION['permiso']))
{
  header("Location: index.php");
}

?>