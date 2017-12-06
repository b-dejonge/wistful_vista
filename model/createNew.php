<?php

if (isset($_POST['newPayment-submit'])){
  session_start();
  include_once 'database.php';

  $apt = $_POST['renterSelect'];
  $amount = $_POST['amount'];
  $paymentDate = $_POST['paymentDate'];

  $sql = "SELECT renterID FROM renter WHERE $apt = apt";
  $result = mysqli_query($conn, $sql);
  if ($row = mysqli_fetch_assoc($result)) {
    $renterID = $row['renterID'];
  }

  $sql = "INSERT INTO payment (renterID, paymentAmount, paymentDate)
          VALUES ('$renterID','$amount','$paymentDate');";
  mysqli_query($conn, $sql);
  header("Location: ../index.php?action=dashboard");
}


if (isset($_POST['newMessage-submit'])){
  session_start();
  include_once 'database.php';

  $from = $_POST['from'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  $sql = "INSERT INTO message (messageFrom, subject, message)
          VALUES ('$from','$subject','$message');";
  mysqli_query($conn, $sql);
  header("Location: ../index.php?action=dashboard");
}

?>
