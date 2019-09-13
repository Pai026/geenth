<?php 
class Album
{
	private $conn;
	private $id;
	private $title;
	private $artistId;
	private $genre;
	private $artworkPath;
	public function __construct($con,$id)
	{
		$this->conn=$con;
		$this->id=$id;
		$query=mysqli_query($this->conn,"SELECT * FROM albums WHERE id='$this->id'");
		$album=mysqli_fetch_array($query);
		$this->title=$album['title'];
		$this->artistId=$album['artists'];
		$this->genre=$album['genre'];
		$this->artworkPath=$album['artworkPath'];
	}
	public function getTitle()
	{
		
		return $this->title;
	}
	public function getArtworkPath()
	{
		return $this->artworkPath;
	}
	public function getArtist()
	{
		return new Artist($this->conn,$this->artistId);
	}
	public function getGenre()
	{
		return $this->genre;
	}
	public function getNumberOfSongs()
	{
		$query=mysqli_query($this->conn,"SELECT id FROM songs where album='$this->id'");
		return mysqli_num_rows($query);
	}
	public function getSongId()
	{
		$query=mysqli_query($this->conn,"SELECT id from songs where album='$this->id' order by albumOrder ASC");
		$array= array();
		while($row = mysqli_fetch_array($query))
		{
			array_push($array, $row['id']);
		}
		return $array;
	}

}

?>