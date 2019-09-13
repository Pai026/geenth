<?php 
	include("../../config.php");
	if(isset($_POST['name'])&&isset($_POST['user']))
	{
		$name=$_POST['name'];
		$user=$_POST['user'];
		$date = date("Y-m-d");

		$query = mysqli_query($conn,"INSERT INTO playlist values('','$name','$user','$date')");

	}
	else
	{
		echo "Name or username parameters not passed into file";
	}



 ?>