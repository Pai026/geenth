<?php 
class Playlist
{
	private $conn;
	private $id;
	private $name;
	private $owner;

	public function __construct($con,$data)
	{
		if(!is_array($data))
		{

			$query=mysqli_query($con,"SELECT * FROM playlist WHERE id='$data'");
			$data=mysqli_fetch_array($query);

		}
		$this->conn=$con;
		$this->id=$data['id'];
		$this->name=$data['name'];
		$this->owner=$data['owner'];
		


	}
	public function getid()
	{
		return $this->id;
	}
	public function getName()
	{
		return $this->name;
	}
	public function getOwner()
	{
		return $this->owner;
	}
	public function getNumberOfSongs()
	{
		$query=mysqli_query($this->conn,"SELECT songId FROM playlistsongs WHERE playlistId='$this->id'");
		return mysqli_num_rows($query);
	}
	public function getSongId()
	{
		$query=mysqli_query($this->conn,"SELECT songId from playlistsongs where playlistId='$this->id' order by playlistOrder ASC");
		$array= array();
		while($row = mysqli_fetch_array($query))
		{
			array_push($array, $row['songId']);
		}
		return $array;
	}
	public static function getPlaylistDropdown($conn,$username)
	{
		$dropdown='<select class="item playlist">
			<option value="">
				Add to Playlist
			</option>';
		$query=mysqli_query($conn,"SELECT id,name FROM playlist where owner='$username'" );
		while($row=mysqli_fetch_array($query))
		{	
			$id=$row['id'];
			$name = $row['name'];
			$dropdown = $dropdown . "<option value='$id'>$name</option>";
		}

			
			return $dropdown."</select>";
	}
}
 ?>