<?php

session_start();

if (isset($_GET['action']))
    $action = $_GET['action'];

  else if (isset($_POST['action']))
    $action = $_POST['action'];

  else
    $action = 'homepage';

  if($action == 'homepage'){
    include ('views/homepage.php');
  }

  else if($action == 'login'){
    include ('views/signin.php');
  }

  else if($action == 'dashboard'){
    if (isset($_SESSION['firstName'])) {
      include ('views/dashboard.php');
    } else {
      header('Location: index.php?action=login');
    }
  }

  else if($action == 'messages'){
    include ('views/messages.php');
  }

  else if ($action == 'create') {
    include ('views/create.php');
  }

  else if($action == 'payments'){
    include ('views/payments.php');
  }

  else if($action == 'maintenance'){
    include ('views/maintenance.php');
  }

  else if($action == 'contact'){
    include ('views/contact.php');
  }

  else if($action == 'apartments'){
    include ('views/apartments.php');
  }

  else
  echo 'error';

?>
