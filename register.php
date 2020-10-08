<?php
	include("includes/config.php");
	include ("includes/classes/Account.php");
	include ("includes/classes/Constants.php");
	$account = new Account($conn);
	
	include("includes/handlers/register-handler.php");
	include ("includes/handlers/login-handler.php");
	function getInputValue($name)
	{
		if(isset($_POST[$name]))
		{
			echo $_POST[$name];
		}
	}
?>



<html>
<head>
	<title>Welcome to Geenth!</title>
	<link rel="stylesheet" type="text/css" href="assets/css/register.css">
	<link rel="icon" 
      type="image/png" 
	    href="assets/images/geenth.png">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"
	></script>
	<script src="assets/script/register.js"></script> 
</head>
<body>
	<?php
		if(isset($_POST['signupButton']))
		{	echo '<script>
					$(document).ready(function(){
					$("#loginForm").hide();
					$("#registerForm").show();
					});
				</script>';

		}
		else
		{
			echo'<script>
					$(document).ready(function(){
					$("#loginForm").show();
					$("#registerForm").hide();
					});
				</script>';
		}
	 ?>
	<div id="background">
		<div id="loginContainer">
			<div id="inputContainer">
				<form id="loginForm" action="register.php" method="POST">
					<h2>
						Login to your account
					</h2>
					<p>
						<?php echo $account->getError(Constants::$loginFailed);?>
					<label for="loginUsername">Username</label>
					<input id="loginUsername" type="text" name="loginUser" placeholder="eg. richard" value="<?php getInputValue('loginUser')?>" required>
				</p>
				<p>
					<label for="loginPassword">Password</label>
					<input id="loginPassword "type="password" name="loginPassword" placeholder="Your Password" required>
				</p>
				<p>
					<button type="submit" name="loginButton">LOG IN</button>
				</p>
				<div class="hasAccountText">
					<a href="#"></a>
					<span id="hideLogin">Don't have an account yet? Sign Up here.</span>
				</div>
				</form>


				<form id="registerForm" action="register.php" method="POST">
					
					<h2>
						Create your account
					</h2>

					<p>
						<?php echo $account->getError(Constants::$userNameCharacters);?>
						<?php echo $account->getError(Constants::$usernameTaken);?>
					<label for="Username">Username</label>
					<input id="Username" type="text" name="Username" placeholder="eg. richard" value="<?php getInputValue('Username')?>" required>
				</p>

				<p>
					<?php echo $account->getError(Constants::$firstNameCharacters);?>
					<label for="firstname">First Name</label>
					<input id="firstname" type="text" name="first" placeholder="eg. richard" value="<?php getInputValue('first')?>" required>
				</p>

				<p>
					<?php echo $account->getError(Constants::$lastNameCharacters);?>
					<label for="lastname">Last Name</label>
					<input id="lastname" type="text" name="last" placeholder="eg. richard" value="<?php getInputValue('last')?>" required>
				</p>

				<p>
					<?php echo $account->getError(Constants::$emailDoNotMatch);?>
					<?php echo $account->getError(Constants::$emailInvalid);?>
					<?php echo $account->getError(Constants::$emailTaken);?>
					<label for="email">Email</label>
					<input id="email" type="email" name="email" placeholder="eg. richard@abc.com" value="<?php getInputValue('email')?>" required>
				</p>

				<p>
					<label for="email2">Confirm Email</label>
					<input id="email2" type="email" name="email2" placeholder="eg. richard@abc.com" value="<?php getInputValue('email2')?>" required>
				</p>

				<p>
					<?php echo $account->getError(Constants::$passwordDoNotMatch);?>
					<?php echo $account->getError(Constants::$passwordNotAlphanumeric);?>
					<?php echo $account->getError(Constants::$passwordCharacters);?>
					<label for="password">Password</label>
					<input id="password" type="password" name="password" placeholder="Your Password" required>
				</p>

				<p>
					<label for="password2">Confirm Password</label>
					<input id="password2" type="password" name="password2" placeholder="Your Password" required>
				</p>
				
				<p>
					<button type="submit" name="signupButton">SIGN UP</button>
				</p>
								<div class="hasAccountText">
					<a href="#"></a>
					<span id="hideRegister">Already have an account? Log In here.</span>
				</div>
				</form>
			</div>
			<div id="loginText">
				<h1>Welcome to the World of Music..</h1>
				<h2>
					Listen to loads of songs for free..
				</h2>
				<ul> 
				<li>
					Discover new music.
				</li>
				<li>
					Create playlist with your favourite music.
				</li>
				<li>
					Follow your most loved artists.
				</li>
				<ul>
			</div>
		</div>
</div>
</body>
</html>
