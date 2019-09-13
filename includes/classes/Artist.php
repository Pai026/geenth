<?php 
class Artist
{
	private $conn;
	private $id;
	public function __construct($con,$id)
	{
		$this->conn=$con;
		$this->id=$id;
	}
	public function getName()
	{
		$artistQuery=mysqli_query($this->conn,"SELECT name FROM artists WHERE id='$this->id'");
		$artist=mysqli_fetch_array($artistQuery);
		return $artist['name'];
	}
	public function getSongId()
	{
		$query=mysqli_query($this->conn,"SELECT id from songs where artist='$this->id' order by plays DESC");
		$array= array();
		while($row = mysqli_fetch_array($query))
		{
			array_push($array, $row['id']);
		}
		return $array;
	}
	public function getID()
	{
		return $this->id;
	}

}

?>