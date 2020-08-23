<?php
	require "header.php";

?>

	<main class="main">
		<div class="preload">
			<img src="img/Loader/Pulse.gif">
		</div>
		<center> 
			<?php
				if(isset($_GET['error'])){
					if($_GET['error'] == "invalidmailandusername"){
						echo '<div class="p-signup-error">
								<p>Invalid email and Username!</p>
							</div>';
					}
					else if($_GET['error'] == "invalidmail"){
						echo '<div class="p-signup-error">
								<p>Invalid email!</p>
							</div>';
					}
					else if($_GET['error'] == "invalidusername"){
						echo '<div class="p-signup-error">
								<p>Invalid Username!</p>
							</div>';
					}
					else if($_GET['error'] == "passwordcheck"){
						echo '<div class="p-signup-error">
								<p>Invalid Password!</p>
							</div>';
					}
					else if($_GET['error'] == "sqlerror"){
						echo '<div class="p-signup-error">
								<p>Sql Error!</p>
							</div>';
					}
					else if($_GET['error'] == "usernamealreadytaken"){
						echo '<div class="p-signup-error">
								<p>Username Already taken!</p>
							</div>';
					}
				}else{
					if (isset($_GET['signup'])) {
						if($_GET['signup'] == "success"){
							echo '<div class="p-signup-success">
								<p>Sign up success!</p>
							</div>';
						}
					}
				}
			?>

		<div class="container-login">
			
				<div class="div-login">
					<form action="includes/signup-inc.php" class="login-input-form" method="POST">
							<p style="font-size: 20pt; margin-bottom: 15px;">Sign-up</p>
							<div><input class="login-input-style" type="text" name="signup-username" placeholder="Username" required></div>

							<div><input class="login-input-style" type="email" name="signup-email" placeholder="Email..." required></div>

							<div><input class="login-input-style" type="password" name="signup-password" placeholder="Password" required></div>

							<div><input class="login-input-style" type="password" name="signup-repeat-password" placeholder="Repeat Password" required></div>

							<div><button class="login-btn-style" type="submit" name="signup-btn">Sign-up</button></div>
					</form>		
				</div>

		</div>
	</center>
		
	</main>


<?php
	require "footer.php";
?>