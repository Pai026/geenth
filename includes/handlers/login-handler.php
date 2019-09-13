<?php
if(isset($_POST['loginButton'])){

	$username=$_POST['loginUser'];
	$password=$_POST['loginPassword'];
	$result=$account->login($username,$password);
	if($result)
	{
		$_SESSION['userLoggedIn']=$username;
		header("Location:index.php");
	}
}
?>