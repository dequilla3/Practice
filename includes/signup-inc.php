<?php

if (isset($_POST['signup-btn'])) {
	include 'dbh-inc.php';

	$username = $_POST['signup-username'];
	$email = $_POST['signup-email'];
	$password = $_POST['signup-password'];
	$repeat_password = $_POST['signup-repeat-password'];

	if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$", $username) ) {

		header("Location: ../signup-form.php?error=invalidmailandusername");
		exit();
	}
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

		header("Location: ../signup-form.php?error=invalidmail&signup-username=".$username);
		exit();
	}
	else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {

		header("Location: ../signup-form.php?error=invalidusername&signup-email=".$email);
		exit();
	}
	else if($password !== $repeat_password){
		header("Location: ../signup-form.php?error=passwordcheck&signup-email=".$email."$signup-username".$username);
		exit();
	}else{
		$sql = "SELECT username FROM users where username=?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			 header("Location: ../signup-form.php?error=sqlerror");
			 exit();
		}
		else{
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);

			if ($resultCheck > 0) {
				header("Location: ../signup-form.php?error=usernamealreadytaken&signup-email=".$email);
			}
			else{
				$sql = "INSERT INTO users (username, user_email, userpassword) VALUES (?, ?, ?)";
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					 header("Location: ../signup-form.php?error=sqlerror");
					 exit();
				}
				else{

					$hashedPwd = password_hash($password, PASSWORD_DEFAULT);

					mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
					mysqli_stmt_execute($stmt);
					header("Location: ../signup-form.php?signup=success");
					exit();
				}

			}
		}
	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}
else{
	header("Location: ../signup-form.php");
		exit();
}