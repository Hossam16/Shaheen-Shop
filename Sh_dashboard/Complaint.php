<?php
class Complaint
{
    protected $AID;
    protected $CName;
    protected $Date;
    protected $Phone;
    protected $Phone2;
    protected $Governorate;
    protected $Address;
    protected $Text;
    protected $Replay;
    protected $Stutes;
    protected $Type;
	
	
    public function __construct($AID,$CName,$Date,$Phone,$Phone2,$Governorate,$Address,$Text,$Replay,$Stutes,$Type)
    {
        $this->AID=$AID;
        $this->CName=$CName;
        $this->Date=$Date;
        $this->Phone=$Phone;
        $this->Phone2=$Phone2;
        $this->Governorate=$Governorate;
        $this->Address=$Address;
        $this->Text=$Text;
        $this->Replay=$Replay;
        $this->Stutes=$Stutes;
        $this->Type=$Type;
    }

    public function addComplaint()
    {
        $conn=new config();
        $this->CName=mysqli_real_escape_string($conn->datacon(),$this->CName);
        $this->Address=mysqli_real_escape_string($conn->datacon(),$this->Address);
        $this->Text=mysqli_real_escape_string($conn->datacon(),$this->Text);
        $this->Replay=mysqli_real_escape_string($conn->datacon(),$this->Replay);
        $sql = "INSERT INTO `Complaint`(`AID`, `CName`, `Date`, `Phone`, `Phone2`, `Governorate`, `Address`, `Text`, `Replay`, `Stutes`, `Type`) VALUES ($this->AID,'$this->CName','$this->Date','$this->Phone','$this->Phone2','$this->Governorate','$this->Address','$this->Text','$this->Replay','$this->Stutes','$this->Type')";
        if ($conn->datacon()->query($sql)) {
            $sql2 = "SELECT `ID` FROM `Complaint` WHERE Complaint.Date='$this->Date';";
            if ($conn->datacon()->query($sql2)) {
                return($conn->datacon()->query($sql2)->fetch_assoc()['ID']);
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }
    public static function listComplaint()
    {
        $conn=new config();
        $sql = "SELECT * FROM `Complaint` ORDER BY id DESC";
        if ($conn->datacon()->query($sql)) {
            $result = $conn->datacon()->query($sql);
            return $result;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }

    public static function updateComplaint($ID,$Replay,$Stutes)
    {
        $conn=new config();
        $sql = "UPDATE `Complaint` SET Complaint.Stutes='$Stutes' , Complaint.Replay='$Replay' WHERE Complaint.ID=$ID";
        if ($conn->datacon()->query($sql)) {
            return "SUCCESS";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }
	
}
?>