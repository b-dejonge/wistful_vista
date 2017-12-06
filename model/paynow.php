<?php

if (isset($_POST['paynow-submit'])) {
  include 'database.php';

  $totalAmount = $_POST['paynow-submit'];
  $sql = "UPDATE payment SET paymentPaid = '1' WHERE paymentAmount = $totalAmount";
  mysqli_query($conn, $sql);
  header("Location: ../index.php?action=payments");
}

?>
