<?php 

	include("../../config.php");
	if(isset($_POST['playlistId'])&& isset($_POST['songId']))
	{
		$playlistId=$_POST['playlistId'];
		$songId=$_POST['songId'];
		$orderIdQuery=mysqli_query($conn,"SELECT MAX(playlistOrder) +1 as playlistOrder from playlistsongs where playlistId = '$playlistId'");
		$row = mysqli_fetch_array($orderIdQuery);
		$order=$row['playlistOrder'];
		$query=mysqli_query($conn,"INSERT INTO playlistsongs values('','$songId','$playlistId','$order')");
	}
	else
	{
		echo "Playlist Id or Song Id was not passed";
	}





 ?>