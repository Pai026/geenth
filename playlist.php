<?php 	include("includes/includedFiles.php"); 

if(isset($_GET['id']))
{
	$playlistId= $_GET['id'];
}
else
{
	header("Location:index.php");
}


$playlist = new Playlist($conn,$playlistId);
$owner= new User($conn,$playlist->getOwner());

?>

<div class="entityInfo">
	<div class="left">
		<div class="playlistImage">
		<img src="assets/images/icons/playlist.png">
	</div>
	</div>
	<div class="right">
		<h2><?php echo $playlist->getName(); ?></h2>
			<p>By <?php echo $playlist->getOwner();?></p>
			<p><?php echo $playlist->getNumberOfSongs();?> songs</p>
			<button class="button" onclick="deletePlaylist('<?php echo $playlistId; ?>')">
				Delete Playlist
				
			</button>
	</div>


</div>
<div class="tracklistContainer">
	<ul class="tracklist">
		<?php 
			$songIdArray=$playlist->getSongId();
			$i=1;
			foreach($songIdArray as $songId)
			{

				$playlistSong=new Song($conn,$songId);
				$songArtist=$playlistSong->getArtist();
				echo "<li class='tracklistRow'>
						<div class='trackCount'> 
						<img class='play' src='assets/images/icons/play_white.png' onclick='setTrack(\"" . $playlistSong->getId(). "\",tempPlaylist,true)'> 
						<span class='trackNumber'>$i
						</span>

						</div>
						<div class='trackInfo'>
						<span class='trackName'>".$playlistSong->getTitle()."</span>
						<span class='artistName'>".$songArtist->getName()."</span>

						</div>
						<div class='trackOptions'>
						<input type='hidden' class='songId' value='".$playlistSong->getId()."'>
						<img class='optionsButton' src='assets/images/icons/more.png' onclick='showOptionsMenu(this)'>
						</div>
						<div class='trackDuration'>
						<span class='duration'>
						".$playlistSong->getDuration()."
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