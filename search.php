<?php
	include("includes/includedFiles.php");

if(isset($_GET['term']))
{
	$term=urldecode($_GET['term']);
}
else
{
	$term="";
}
?>

<div class="searchContainer">

	<h4>
		Search For an Artist Album or Song
	</h4>
	<input type="text" class="searchInput" value="<?php echo $term; ?>"placeholder="Start Typing..." onfocus="this.value = this.value">

	
</div>
<script>
	$(".searchInput").focus();
	$(function(){
		
		$(".searchInput").keyup(function(){
				clearTimeout(timer);
				timer=setTimeout(function(){
					var val=$(".searchInput").val();
					openPage("search.php?term="+val);
				},2000);


		});



	});


</script>
<?php if($term == "") exit();?>
<div class="tracklistContainer borderBottom">
	<h2>Songs</h2>
	<ul class="tracklist">
		<?php 
		$songQuery = mysqli_query($conn,"SELECT * FROM songs WHERE title like '$term%'LIMIT 10");
		if(mysqli_num_rows($songQuery)==0)
		{
			echo "<span class='noResult'>No Songs Found</span>";
		}
			$songIdArray=array();
			$i=1;
			while($row=mysqli_fetch_array($songQuery))
			{
				if($i>15){break;}
				array_push($songIdArray, $row['id']);
				$albumSong=new Song($conn,$row['id']);
				$albumArtist=$albumSong->getArtist();
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

<div class="artistContainer borderBottom">
	<h2>Artists</h2>
	<?php 
		$artistQuery=mysqli_query($conn,"SELECT id from artists where name like '$term%' LIMIT 10");
		if(mysqli_num_rows($artistQuery)==0)
		{
			echo "<span class='noResult'>No Artist Found</span>";
		}
		while($row=mysqli_fetch_array($artistQuery))
		{
			$artistFound=new Artist($conn,$row['id']);
			echo "<div class='searchResultRow'>
			<div class='artistName'>  
			<span role='link' tabindex='0' onclick='openPage(\"artist.php?id=". $artistFound->getID() ."\")'> 
				". $artistFound->getName(). "
			</span>
			</div>
			</div>";
		}
	 ?>
</div>
<div class="gridViewContainer">
<h2>Albums</h2>
	<?php
		$albumQuery = mysqli_query($conn,"SELECT * FROM albums where title like '$term%' LIMIT 10");
		if(mysqli_num_rows($albumQuery)==0)
		{
			echo "<span class='noResult'>No Album Found</span>";
		}
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

<nav class="optionsMenu">
	<input type="hidden" class="songId">
	<?php echo Playlist::getPlaylistDropdown($conn,$userLoggedIn->getUser()); ?>
		<div class="item">
			Goto Artist
		</div>
		<div class="item">
			Share
		</div>



	
</nav>