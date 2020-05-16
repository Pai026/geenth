<?php 	include("includes/includedFiles.php"); 

$owner= new User($conn,$userLoggedIn->getUser());
$favourite=new Favourite($conn,$owner->getId());
?>

<div class="entityInfo">
	<div class="left">
		<div class="playlistImage">
		<img src="assets/images/icons/playlist.png">
	</div>
	</div>
	<div class="right">
		<h2>Favourites</h2>
			<p><?php echo $favourite->getNumberOfSongs();?> songs</p>
	</div>


</div>
<div class="tracklistContainer">
	<ul class="tracklist">
		<?php 
			$songIdArray=$favourite->getSongId();
			$i=1;
			foreach($songIdArray as $songId)
			{

				$favouriteSong=new Song($conn,$songId);
				$songArtist=$favouriteSong->getArtist();
				echo "<li class='tracklistRow'>
						<div class='trackCount'> 
						<img class='play' src='assets/images/icons/play_white.png' onclick='setTrack(\"" . $favouriteSong->getId(). "\",tempfavourite,true)'> 
						<span class='trackNumber'>$i
						</span>

						</div>
						<div class='trackInfo'>
						<span class='trackName'>".$favouriteSong->getTitle()."</span>
						<span class='artistName'>".$songArtist->getName()."</span>

						</div>
						<div class='trackOptions'>
						<input type='hidden' class='songId' value='".$favouriteSong->getId()."'>
						<img class='optionsButton' src='assets/images/icons/more.png' onclick='showOptionsMenu(this)'>
						</div>
						<div class='trackDuration'>
						<span class='duration'>
						".$favouriteSong->getDuration()."
						</span>
						</li>";
						$i++;



			}
		 ?>
		<script>
				var tempSongId = '<?php echo json_encode($songIdArray);?>';
				tempPlaylist  = JSON.parse(tempSongId);


		</script>
	</ul>
</div>

<nav class="optionsMenu">
	<input type="hidden" class="songId">
	<?php echo Playlist::getPlaylistDropdown($conn,$userLoggedIn->getUser()); ?>
		<div class="item">
			Goto Artist
		</div>
		<div class="item" onclick="removeFromPlaylist(this,'<?php echo $playlistId; ?>')">
			Remove From Playlist
		</div>



	
</nav>