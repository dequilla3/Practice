<?php
	
if (isset($_POST['login-submit'])) {
	include 'dbh-inc.php';
	
	$username = $_POST['username-login'];
	$password = $_POST['password-login'];
	
	if (empty($username) || empty($password)) {
		header("Location: ../index.php?error=emptyfields");
		exit();
	}
	else{

		$sql = "SELECT * FROM users WHERE username=?;";
		$stmt = mysqli_stmt_init($conn);

		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: ../loginform.php?error=sqlerror");
			exit();
		}
		else{
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			$resultCheck = mysqli_stmt_get_result($stmt);

			if ($row = mysqli_fetch_assoc($resultCheck)) {
				$pwdCheck = password_verify($password, $row['userpassword']);
				if($pwdCheck == false){
					header("Location: ../loginform.php?error=wrongpwd");
					exit();
				}
				else if($pwdCheck == true){
					session_start();
					$_SESSION['userID'] = $row['userid'];
					$_SESSION['username'] = $row['username'];
					$_SESSION['user_email'] = $row['user_email'];
					setcookie("name", $row['userid'], time() - 86400);
					header("Location: ../index.php?success=login-success");
					exit();
				}
				else{
					header("Location: ../loginform.php?error=wrongpwd");
					exit();
				}
			}else{
				header("Location: ../loginform.php?error=nouser");
					exit();
			}
			
		}
	}

}
 else{
	header("Location: ../index.php");
	exit();
}