<?php
class Account
{
	private $conn;
	private $errorArray;

	public function __construct($con)
	{
		$this->conn=$con;
		$this->errorArray=array();
	}
	public function login($un,$pw)
	{
		$pw=md5($pw);
		$query=mysqli_query($this->conn,"SELECT * from users where username='$un' and password='$pw'");
		if(mysqli_num_rows($query)==1)
		{
			return true;
		}
		else
		{
			array_push($this->errorArray,Constants::$loginFailed);
			return false;
		}

	}
	public function register($un,$fn,$ln,$em,$em2,$pw,$pw2) 
	{
			$this->validateUsername($un);
			$this->validateFirstName($fn);
			$this->validateLastName($ln);
			$this->validateEmails($em,$em2);
			$this->validatePasswords($pw,$pw2);
			if(empty($this->errorArray))
			{
			
				return $this->insertUserDetails($un,$fn,$ln,$em,$pw);
			}
			else
			{
				return false;
			}
	}

	public function getError($er)
	{
		if(!in_array($er,$this->errorArray))
		{
			$er = "";
		}
		return "<span class='errorMessage'>$er</span>";
	}
	private function insertUserDetails($un,$fn,$ln,$em,$pw)
	{
		$encryptedPw = md5($pw);
		$profilePic="assets/images/profile-pics/head_emarald.png";
		$date=date("Y-m-d");
		$result=mysqli_query($this->conn,"INSERT INTO users VALUES('','$un','$fn','$ln','$em','$encryptedPw','$date','$profilePic')");
		return $result;
	}
	private function validateUsername($un)
	{
			if(strlen($un)>25||strlen($un)<5)
			{
				array_push($this->errorArray,Constants::$userNameCharacters);
				return;
			}
			$checkUsernameQuery=mysqli_query($this->conn,"SELECT username From users where username='$un'");
			if(mysqli_num_rows($checkUsernameQuery)!=0)
			{
				array_push($this->errorArray, Constants::$usernameTaken);
				return;
			}
	}	
	private function validateFirstName($fn)
	{
			if(strlen($fn)>25||strlen($fn)<2)
			{
				array_push($this->errorArray,Constants::$firstNameCharacters);
				return;
			}
	}
	private function validateLastName($ln)
	{
			if(strlen($ln)>25||strlen($ln)<2)
			{
				array_push($this->errorArray,Constants::$lastNameCharacters);
				return;
			}
	}	
	private function validateEmails($em,$em2)
	{
			if($em != $em2)
			{
				array_push($this->errorArray,Constants::$emailDoNotMatch );
				return;
			}
			if(!filter_var($em, FILTER_VALIDATE_EMAIL))
			{
				array_push($this->errorArray,Constants::$emailInvalid  );
				return;
			}
			$checkemailQuery=mysqli_query($this->conn,"SELECT email From users where email='$em'");
			if(mysqli_num_rows($checkemailQuery)!=0)
			{
				array_push($this->errorArray, Constants::$emailTaken);
				return;
			}
	}
	private function validatePasswords($pw,$pw2)
	{
		if($pw!=$pw2)
		{
			array_push($this->errorArray,Constants::$passwordDoNotMatch);
			return;
		}
		if(preg_match('/[^A-Za-z0-9]/',$pw))
		{
			array_push($this->errorArray,Constants::$passwordNotAlphanumeric);
			return;
		}
		if(strlen($pw)>30 || strlen($pw2)<5)
		{
			array_push($this->errorArray,Constants::$passwordCharacters);
			return;
		}
	}	

}
?>