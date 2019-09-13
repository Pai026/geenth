<?php 

include("../../config.php");
if(!isset($_POST['username']))
{
	echo "ERROR: Could Not Set username";
	exit();
}
if(isset($_POST['email']) && isset($_POST['email'])!="" )
{
	$email = $_POST['email'];
	$username=$_POST['username'];
	if(!filter_var($email,FILTER_VALIDATE_EMAIL))
	{
		echo "Email is Invalid";
		exit();
	}
	$emailCheck = mysqli_query($conn,"SELECT email from users where email='$email' and username != '$username'");
	if(mysqli_num_rows($emailCheck)>0)
	{
		echo "Email is already in use";
		exit();
	}
	$query = mysqli_query($conn,"UPDATE users SET email='$email' WHERE username='$username'");
	echo "Update Successful";
}	
else
{
	echo "enter a valid email";

}





 ?>