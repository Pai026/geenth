<?php 	
	include("includes/includedFiles.php");
 ?>
<head><link rel="icon" 
      type="image/png" 
	    href="assets/images/geenth.png"></head>
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
				

		
