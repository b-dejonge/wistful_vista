<?php

if (isset($_POST['closeRequest-submit'])){
  include_once 'database.php';

  $maintenanceID = $_POST['closeRequest-submit'];
  $sql = "UPDATE maintenance SET status = '1' WHERE maintenanceID = $maintenanceID";
  mysqli_query($conn, $sql);
  header("Location: ../index.php?action=maintenance");
}

?>
