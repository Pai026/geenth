<?php 	
	include("includes/includedFiles.php");
 ?>
<head><link rel="icon" 
      type="image/png" 
	    href="https://www.google.com/imgres?imgurl=https%3A%2F%2Flibrary.kissclipart.com%2F20200103%2Fuyw%2Fkissclipart-music-jazz-musical-instrument-musician-saxophone-c8addd107cf45336.png&imgrefurl=https%3A%2F%2Fwww.kissclipart.com%2Fmusic-jazz-musical-instrument-musician-saxophone-z0dgay%2F&tbnid=WK1As5N7iLcC0M&vet=12ahUKEwjhvsWvz7fpAhWTCLcAHRbADMEQMyg1egQIARB-..i&docid=nRIjeg511khnVM&w=900&h=900&q=favicon%20for%20music&hl=en&ved=2ahUKEwjhvsWvz7fpAhWTCLcAHRbADMEQMyg1egQIARB-"></head>
<h1 class="pageHeadingBig">You Might Also Like</h1>
<div class="gridViewContainer">

	<?php
		$albumQuery = mysqli_query($conn,"SELECT * FROM albums ORDER BY RAND() LIMIT 10");
		while($row=mysqli_fetch_array($albumQuery))
		{
			


			echo "<div class='gridViewItem'>
				<span role='link'tabindex='0' onclick='openPage(\"album.php?id=". $row['id'] ."\")'>
				<img src='". $row['artworkPath'] ."'>
 				<div class='gridViewInfo'>"
 					. $row['title'].
 				"</div>
 				</span>
			</div>";
		}
	?>
	
</div>
				

		
