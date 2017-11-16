<?php

  $dsn = 'mysql:host=localhost;dbname=bjdejon2_MVC';
  $username = 'bjdejon2_user1';
  $password = 'xJ7MPtHFW3I$4mx';
  
  try{
  $db = new PDO($dsn, $username, $password);
  }
  
  catch (PDOException $e) {
    $error_message = 'An error occured while connecting to the database.';
    include ('views/error.php');
    exit();
    }
?>