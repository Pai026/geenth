<?php 
	include("includes/includedFiles.php");

 ?>
 <div class="playlistContainer">

 	<div class="gridViewContainer">

 		<h2>
 			Playlists

 		</h2>
 		<div class="buttonItems">
 			
 			<button class="button blue" onclick="createPlaylist()">
 					New Playlist
 			</button>
		</div>
		<?php
			$username = $userLoggedIn->getUser();
			$playlistQuery = mysqli_query($conn,"SELECT * FROM playlist where owner='$username' ");
			if(mysqli_num_rows($playlistQuery)==0)
			{
				echo "<span class='noResult'>No Playlists Found</span>";
			}
			while($row=mysqli_fetch_array($playlistQuery))
			{
				$playlist=new Playlist($conn,$row);


				echo "<div class='gridViewItem' role='link' tabindex='0' onclick='openPage(\"playlist.php?id=" .$playlist->getId() ."\")'>
					<div class='playlistImage'>
					<img src='assets/images/icons/playlist.png'>
					</div>



							<div class='gridViewInfo'>"
	 						. $playlist->getName().
	 				"</div>
				</div>";
			}
	?>



 		
 	</div>
 	


 
 </div>
  <div class="playlistContainer">

 	<div class="gridViewContainer">

 		<h2>
 			Favourites

 		</h2>
		<?php
			$username = $userLoggedIn->getId();
			$playlistQuery = mysqli_query($conn,"SELECT * FROM favouritesongs where userId='$username' ");
			if(mysqli_num_rows($playlistQuery)==0)
			{
				echo "<span class='noResult'>No FavouritesFound Found</span>";
			}
		else{
			while($row=mysqli_fetch_array($playlistQuery))
			{
				
				$favourite=new Favourite($conn,$row['userId']);
			}

				echo "<div class='gridViewItem' role='link' tabindex='0' onclick='openPage(\"favourites.php\")'>
					<div class='playlistImage'>
					<img src='assets/images/icons/playlist.png'>
					</div>



							<div class='gridViewInfo'>
	 						Favourite Songs
	 				</div>
				</div>";
		}
	?>



 		
 	</div>
 	

 </div>

