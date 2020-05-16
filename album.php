<?php 	include("includes/includedFiles.php"); 

if(isset($_GET['id']))
{
	$albumId= $_GET['id'];
}
else
{
	header("Location:index.php");
}

$album = new Album($conn,$albumId);
$artist= $album->getArtist();



?>
<script>
	





</script>
<div class="entityInfo">
	<div class="left">
		<img src="<?php
					echo $album->getArtworkPath();
					?>">
	</div>
	<div class="right">
		<h2><?php echo $album->getTitle(); ?></h2>
			<p>By <?php echo $artist->getName();?></p>
			<p><?php echo $album->getNumberOfSongs();?> songs</p>
	</div>


</div>
<div class="tracklistContainer">
	<ul class="tracklist">
		<?php 
			$songIdArray=$album->getSongId();
			$i=1;
			foreach($songIdArray as $songId)
			{

				$albumSong=new Song($conn,$songId);
				$albumArtist=$albumSong->getArtist();
				$fav=new Favourite($conn,$songId);
				echo "<li class='tracklistRow'>
						<div class='trackCount'> 
						<img class='play' src='assets/images/icons/play_white.png' onclick='setTrack(\"" . $albumSong->getId(). "\",tempPlaylist,true)'> 
						<span class='trackNumber'>$i
						</span>

						</div>
						<div class='trackInfo'>
						<span class='trackName'>".$albumSong->getTitle()."</span>
						<span class='artistName'>".$albumArtist->getName()."</span>

						</div>
						<div class='trackOptions'>
						<input type='hidden' class='songId' value='".$albumSong->getId()."'>
						<img class='optionsButton star' src='assets/images/icons/".$fav->getStar()."' onclick='setFavourite(this,".$albumId.")'>
						</div>
						<div class='trackOptions'>
						<input type='hidden' class='songId' value='".$albumSong->getId()."'>
						<img class='optionsButton' src='assets/images/icons/more.png' onclick='showOptionsMenu(this)'>
						</div>
						<div class='trackDuration'>
						<span class='duration'>
						".$albumSong->getDuration()."
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
	<script>var artistId='<?php echo $albumArtist->getID();?>';</script>
		<div class="item" onclick="gotoArtist(artistId)">
			Goto Artist
		</div>
		<div class="item">
			Share
		</div>



	
</nav>