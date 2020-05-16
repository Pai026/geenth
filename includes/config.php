<?php
	ob_start();
	session_start();
	$timezone = date_default_timezone_set("Asia/Kolkata");
	$Database=getenv('DATABASENAME');
	$Username=getenv('USERNAME');
	$Password=getenv('PASSWORD');
	$Server = getenv('SERVER');
	$conn = mysqli_connect($Server,$Username,$Password,$Database);
	if(mysqli_connect_errno())
	{
		echo "Failed to connect: " . mysqli_connect_errno();
	}
?>
