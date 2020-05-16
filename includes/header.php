<?php
		include("includes/config.php");
		include("includes/classes/User.php");
		include("includes/classes/Artist.php");
		include("includes/classes/Album.php");
		include("includes/classes/Song.php");
		include("includes/classes/Playlist.php");
//session_destroy();
if(isset($_SESSION['userLoggedIn']))
{
	$userLoggedIn = new User($conn,$_SESSION['userLoggedIn']);
	$username=$userLoggedIn->getUser();
	echo "<script>userLoggedIn='$username';</script>";
}
else
{
	header("Location: register.php");
}

?>
<html>
<head>
	<title>Welcome to Geenth!</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="icon" 
      type="image/png" 
      href="https://www.google.com/imgres?imgurl=https%3A%2F%2Flibrary.kissclipart.com%2F20200103%2Fuyw%2Fkissclipart-music-jazz-musical-instrument-musician-saxophone-c8addd107cf45336.png&imgrefurl=https%3A%2F%2Fwww.kissclipart.com%2Fmusic-jazz-musical-instrument-musician-saxophone-z0dgay%2F&tbnid=WK1As5N7iLcC0M&vet=12ahUKEwjhvsWvz7fpAhWTCLcAHRbADMEQMyg1egQIARB-..i&docid=nRIjeg511khnVM&w=900&h=900&q=favicon%20for%20music&hl=en&ved=2ahUKEwjhvsWvz7fpAhWTCLcAHRbADMEQMyg1egQIARB-">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>></script>
	<script src='assets/script/script.js'></script>
</head>
<body>



	<div id="mainContainer">
		<div id="topContainer">
			<?php
				include("includes/containers/navBarContainer.php");
			?>
			<div id="mainViewContainer">
				
			
			<div id="mainContent">
