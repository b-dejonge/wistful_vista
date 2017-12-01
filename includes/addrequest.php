<?php

if (isset($_POST['addrequest-submit'])){
  session_start();
  include_once 'database.php';

  $urgency = mysqli_real_escape_string($conn, $_POST['urgency']);
  $description = mysqli_real_escape_string($conn, $_POST['description']);
  $renterID = $_SESSION['renterID'];

  $sql = "INSERT INTO maintenance (renterID, urgency, description)
          VALUES ('$renterID','$urgency','$description');";
  mysqli_query($conn, $sql);
  header("Location: ../index.php?action=dashboard");
}

?>
