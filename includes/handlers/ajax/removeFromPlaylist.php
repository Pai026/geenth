<?php 
	include("../../config.php");
	if(isset($_POST['playlistId']) && isset($_POST['songId']))
	{
		$playlistId=$_POST['playlistId'];
		$songId=$_POST['songId'];
		//$playlistQuery=mysqli_query($conn,"DELETE FROM playlists WHERE id='$playlistId'");
		$songsQuery=mysqli_query($conn,"DELETE FROM playlistsongs WHERE playlistId='$playlistId' and songId='$songId'");
	}
	else
	{
		echo "Playlist Id or Song Id was not passed";
	}





 ?>