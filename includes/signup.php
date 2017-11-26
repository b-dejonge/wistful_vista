<?php

if (isset($_POST['register-submit'])){
  include_once 'database.php';

  $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
  $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
  // $address = mysqli_real_escape_string($conn, $_POST['address']);
  // $city = mysqli_real_escape_string($conn, $_POST['city']);
  // $state = mysqli_real_escape_string($conn, $_POST['state']);
  // $zip = mysqli_real_escape_string($conn, $_POST['zip']);
  $apt = mysqli_real_escape_string($conn, $_POST['apt']);
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  //Error handlers
  //Check for empty fields
  if (empty($firstName) || empty($lastName) || empty($username) || empty($password)) {
    header("Location: ../index.php?action=login?signup=empty");
    exit();
  } else {
    //Check if input characters are valid
    if (!preg_match("/^[a-zA-Z]*$/", $firstName) || !preg_match("/^[a-zA-Z]*$/", $lastName)) {
      header("Location: ../index.php?action=login?signup=invalidname");
      exit();
      } else {
        $sql = "SELECT * FROM renter WHERE username='$username'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0) {
          header("Location: ../index.php?action=login?signup=invalidusername");
          exit();
        } else {
          //Hashing the password
          $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
          //Insert the user into the database
          $sql = "INSERT INTO renter (firstName, lastName, apt, username, password)
                  VALUES ('$firstName','$lastName','$apt','$username','$hashedPassword');";
          mysqli_query($conn, $sql);
          $sql = "SELECT * FROM renter WHERE username='$username'";
      		$result = mysqli_query($conn, $sql);
      		$resultCheck = mysqli_num_rows($result);
      		if ($resultCheck < 1) {
      			header("Location: ../index.php?action=login?error=usernametaken");
      			exit();
      		} else {
      			if ($row = mysqli_fetch_assoc($result)) {
      					//Log in the user here
                session_start();
      					$_SESSION['renterID'] = $row['renterID'];
      					$_SESSION['firstName'] = $row['firstName'];
      					$_SESSION['lastName'] = $row['lastName'];
                $_SESSION['apt'] = $row['apt'];
      					$_SESSION['username'] = $row['username'];
      					header("Location: ../index.php?action=dashboard");
      					exit();
      				}
      			}
          }
        }
      }
} else {
  header("Location: ../index.php?action=login");
  exit();
}

?>
