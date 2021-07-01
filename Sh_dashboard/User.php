<?php
class User
{
    protected $FName;
    protected $LName;
    protected $Birth;
    protected $Mail;
    protected $Phone;
    protected $Governorate;
    protected $Location;
    protected $Gender;
    protected $UserName;
    protected $Password;
	
	

    public function __construct($FName,$LName,$Birth,$Mail,$Phone,$Governorate,$Location,$Gender,$UserName,$Password)
    {
        $this->FName=$FName;
        $this->LName=$LName;
		$this->Birth=$Birth;
		$this->Mail=$Mail;
		$this->Phone=$Phone;
		$this->Governorate=$Governorate;
		$this->Location=$Location;
		$this->Gender=$Gender;
		$this->UserName=$UserName;
		$this->Password=$Password;
    }
	
	public function SignUp(User $user){
        $conn=new config();
		$this->FName=mysqli_real_escape_string($conn->datacon(),$this->FName);
		$this->LName=mysqli_real_escape_string($conn->datacon(),$this->LName);
		$this->Gender=mysqli_real_escape_string($conn->datacon(),$this->Gender);
		$this->Mail=mysqli_real_escape_string($conn->datacon(),$this->Mail);
		$this->Phone=mysqli_real_escape_string($conn->datacon(),$this->Phone);
		$this->UserName=mysqli_real_escape_string($conn->datacon(),$this->UserName);
		$this->Password=mysqli_real_escape_string($conn->datacon(),$this->Password);
		$this->Governorate=mysqli_real_escape_string($conn->datacon(),$this->Governorate);
		$this->Birth=mysqli_real_escape_string($conn->datacon(),$this->Birth);
		$this->Location=mysqli_real_escape_string($conn->datacon(),$this->Location);
        $sql = "INSERT INTO user(FName,LName,Gender,Mail,Phone,UserName,Password,Governorate,Birth,Location) 
        VALUES('$this->FName','$this->LName','$this->Gender','$this->Mail','$this->Phone','$this->UserName','$this->Password','$this->Governorate','$this->Birth','$this->Location')";
        if ($conn->datacon()->query($sql)) {
			$result=$this->Login($this->UserName,$this->Password);
			if($result != 'error')
				{
					echo "<script type=\"text/javascript\">
							window.location = \"index.php\"
							</script>";
				}
				else
				{
					$ms = "Username Or Password Incorrect";
				}
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
		

    }
	
	
	public function CheckUnique(User $user)
	{
		$conn=new config();
        $sql = "SELECT * FROM user WHERE user.Mail='$this->Mail'";
		$sql1 = "SELECT * FROM user WHERE user.UserName='$this->UserName'";
		$flag = 0;
        if ($conn->datacon()->query($sql)) {
			if((mysqli_num_rows ($conn->datacon()->query($sql))) > 0)
			{
				$flag =1;
				return($flag);
			}else 
			{
				if((mysqli_num_rows ($conn->datacon()->query($sql1))) > 0)
			{
				$flag =2;
				return($flag);
			}else 
			{
				return(0);
			}
			}
			
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
	}
	
	
	
	public function GetUser($ID)
	{
		$conn=new config();
        $sql = "SELECT * FROM user WHERE ID=$ID";
        if ($conn->datacon()->query($sql)) {
			$row = ($conn->datacon()->query($sql))->fetch_assoc();
			return($row);
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
	}
	
	public function Login($username,$password){
		// Both fields are being posted and there not empty
		$conn=new config();
		// $username = mysqli_real_escape_string($conn->datacon(),$username); // Set variable for the username
		// $password = mysqli_real_escape_string($conn->datacon(),$password); // Set variable for the password and convert it to an MD5 hash.
		$sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
		if (($conn->datacon()->query($sql))) {
			if((mysqli_num_rows ($conn->datacon()->query($sql))) > 0)
			{
				$row = $conn->datacon()->query($sql)->fetch_assoc();
				session_start();
				$_SESSION['AID']=$row['ID'];
				$_SESSION['type']=$row['type'];
				$_SESSION['name']=$row['username'];
				$_SESSION['Gender']=$row['Gender'];
				echo "<script type=\"text/javascript\">
							window.location = \"index.php\"
							</script>";
			}else 
			{
				echo("error");
			}
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
		
		
	}
	
	public function selsectname($AID)
	{
				$conn=new config();
        $sql = "SELECT * FROM admin WHERE ID=$AID";
        if ($conn->datacon()->query($sql)) {
			$row = ($conn->datacon()->query($sql))->fetch_assoc();
			return($row);
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
  }


  public function displayAllAgents()
	{
				$conn=new config();
        $sql = "SELECT admin.ID,admin.username FROM `admin` WHERE admin.type='callcenter' OR admin.type='joker';";
        if ($conn->datacon()->query($sql)) {
			return($conn->datacon()->query($sql));
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
  }
  

  
	
	
}
?>
