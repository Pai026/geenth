<?php 
class Favourite
{
	private $conn;
	private $id;
	public function __construct($con,$id)
	{
		$this->conn=$con;
		$this->id=$id;
	}
	public function getStar()
	{
		$query=mysqli_query($this->conn,"SELECT id from favouritesongs where songId='$this->id'");
		if(mysqli_num_rows($query)!=1)
		{
			return "star-inactive.png";
		}
		else
		{
			return "star-active.png";
		}
	}
	public function getNumberOfSongs()
	{
		$query=mysqli_query($this->conn,"SELECT songId FROM favouritesongs WHERE userId='$this->id'");
		return mysqli_num_rows($query);
	}

	public function getSongId()
	{
		$query=mysqli_query($this->conn,"SELECT songId from favouritesongs where userId='$this->id' order by favouriteorder ASC");
		$array= array();
		while($row = mysqli_fetch_array($query))
		{
			array_push($array, $row['songId']);
		}
		return $array;
	}

}