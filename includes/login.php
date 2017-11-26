<?php

if (isset($_POST['login-submit'])) {

	include 'database.php';

	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	//Error handlers
	//Check if inputs are empty
	if (empty($username) || empty($password)) {
		header("Location: ../index.php?login=empty");
		exit();
	} else {
		$sql = "SELECT * FROM renter WHERE username='$username'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			header("Location: ../index.php?login=error1");
			exit();
		} else {
			if ($row = mysqli_fetch_assoc($result)) {
				//De-hashing the password
				$hashedPwdCheck = password_verify($password, $row['password']);
				if ($hashedPwdCheck == false) {
					header("Location: ../index.php?login=error2");
					exit();
				} elseif ($hashedPwdCheck == true) {
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
} else {
	header("Location: ../index.php?login=error0");
	exit();
}

?>
