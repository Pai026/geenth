<?php 

	include("../../config.php");
	if( isset($_POST['songId']))
	{
		$songId=$_POST['songId'];
		$userId=$_POST['userId'];
		$orderIdQuery=mysqli_query($conn,"SELECT MAX(favouriteorder) +1 as favouriteOrder from favouritesongs ");
		$row = mysqli_fetch_array($orderIdQuery);
		$order=$row['favouriteOrder'];
		$userIdquery=mysqli_query($conn,"SELECT id  FROM users Where username='$userId'");
		$row=mysqli_fetch_array($userIdquery);
		$userId=$row['id'];
		$query=mysqli_query($conn,"INSERT INTO favouritesongs(songId,userId,favouriteorder) values('$songId','$userId','$order')");
	}
	else
	{
		echo "Song Id was not passed";
	}





 ?>