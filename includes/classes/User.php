<?php 
class User
{

	private $conn;
	private $username;

	public function __construct($con,$username)
	{
		$this->conn=$con;
		$this->username=$username;
		
	}
	public function getUser()
	{
		return $this->username;
	}
	public function getFirstAndLastName()
	{
		$query=mysqli_query($this->conn,"SELECT concat(firstName,' ',lastName) as 'name' FROM users Where username='$this->username'");
		$row=mysqli_fetch_array($query);
		return $row['name'];
	}
	public function getEmail()
	{
		$query=mysqli_query($this->conn,"SELECT email  FROM users Where username='$this->username'");
		$row=mysqli_fetch_array($query);
		return $row['email'];

	}














}






 ?>