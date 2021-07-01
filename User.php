
<?php

include 'Person.php';
//include 'dbcon.php';
class User extends Person
{
	// Properties
    Protected $Location;
    Protected $Governorate;
	//end of Properties

	//setter and getter
	public function SetLocation($Location) {
    	$this->Location = $Location;
  }
  	public function GetLocation() {
    	return $this->Location;
  }

  	public function SetGovernorate($Governorate) {
    	$this->Governorate = $Governorate;
  }
  	public function GetGovernorate() {
    	return $this->Governorate;
  }
  //end of setter and getter


  //constract
  public function __construct($FName,$LName,$Gender,$Mail,$Phone,$UserName,$Password,$Location,$Governorate)
    {

      $this->FName = $FName;

      $this->LName = $LName;

      $this->Gender = $Gender;

      $this->Mail = $Mail;

      $this->Phone = $Phone;

      $this->UserName = $UserName;

      $this->Password = $Password;

      $this->Location = $Location;

      $this->Governorate = $Governorate;
    }
    //end of constract

    //functions 
    public function AddUser(User $user)
    {
      $connection = new config();
       $sql = "INSERT INTO user(FName,LName,Gender,Mail,Phone,UserName,Password,Location,Governorate) 
        VALUES('$user->FName','$user->LName','$user->Gender','$user->Mail','$user->Phone','$user->UserName','$user->Password','$user->Location','$user->Governorate')";
    mysqli_query($connection->datacon(),$sql) or die(mysqli_error());

    }

    public function DeleteUser(User $user)
    {

    $connection = new config();
    $delete = "DELETE FROM `users` WHERE `ID`='$user->ID'";
    mysqli_query($connection->datacon(),$delete) or die(mysqli_error());
    }

    public function UpdateUser(User $user,$ID)
    {
    $connection = new config();
    $update="UPDATE user SET FName='$this->FName',
LName='$this->LName',
Location='$this->Location',
Governorate='$this->Governorate',
Phone='$this->Phone'
WHERE ID='$ID';";
    mysqli_query($connection->datacon(),$update)or die(mysqli_error());
    }
    public static function GetUSerData($ID)
    {
        $connection = new config();
        $data ="SELECT * from user WHERE ID =$ID";
        $resultdata = $connection->datacon()->query($data);
        return $resultdata;
    }
}

?>