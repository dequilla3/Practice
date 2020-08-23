<!DOCTYPE html>
<html>
<head>
	<title>Mitty Blog</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="app.js" type="text/javascript"></script>
</head>
<body>

	<header>
		<nav>
			<a href="index.php">
			<img class="img-logo" src="img/blogger.png">
			<label class="label-logo">Mitty Blog</label>
			</a>
			

			<ul>
				<li><a class="home" href="index.php">Home</a></li>
				<li><a class="other" href="blogs.php">Blogs</a></li>
				<li><a class="other" href="#">Services</a></li>
				<li><a class="other" href="#">Contact</a></li>
				<li><a class="other" href="#">Feedback</a></li> 
				

				<?php
				if(isset($_SESSION['userID'])) {
					
					echo '<li><a class="logout-btn" href="includes/logout-inc.php" name="logout-submit">'.$_SESSION['user_email'].'</a></li>';
				}
				else{
					echo '<li><a class="login-btn" href="loginform.php" name="login-submit">Sign-in</a></li>
							<li><a class="signup-btn" href="signup-form.php" name="signup-submit">Sign-up</a></li>';
				}
				?>
			</ul>

		</nav>
	</header>
	
</body>
</html>