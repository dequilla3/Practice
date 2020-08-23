<?php
	session_start();
	require "header.php";

?>

	<main class="main">
		<div class="preload">
			<img src="img/Loader/Pulse.gif">
		</div>
		<center>
			<?php
			if (isset($_GET['error'])) {
				if($_GET['error'] == "wrongpwd"){

					echo '<div class="p-signup-error">
								<p>Wrong Password!</p>
							</div>';
				}
				else if($_GET['error'] == "nouser"){
					echo '<div class="p-signup-error">
								<p>No User!</p>
							</div>';
				}
				else if($_GET['error'] == "nouser"){
					echo '<div class="p-signup-error">
								<p>No User!</p>
							</div>';
				}
			}

			?>

			
		<div class="container-login">
				<div class="div-login">
				<form action="includes/login-inc.php" class="login-input-form" method="POST">
					<div><img class="img-login" src="img/login-rounded-right.png"></div>
					<div><input class="login-input-style" type="text" name="username-login" placeholder="Username" required></div>
					<div style="margin-bottom: 10px;"><input class="login-input-style" type="password" name="password-login" placeholder="Password" required></div>
					<div><button class="login-btn-style" type="submit" name="login-submit">Sign-in</button></div>
				</form>	
				</div>
		</div>
		
		</center>
		
	</main>


<?php
	require "footer.php";
?>