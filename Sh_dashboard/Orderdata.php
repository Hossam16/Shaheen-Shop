<?php
class Orderdata
{
    protected $ID;
    protected $OID;
    protected $PID;
    protected $Count;
    protected $Price;
	
	
	
	
	public function __construct($OID,$PID,$Count,$Price){
		$this->OID=$OID;
		$this->PID=$PID;
		$this->Count=$Count;
		$this->Price=$Price;
    }
	
	public function AddOrderdata()
	{
		$conn=new config();
        $sql = "INSERT INTO `dashorderdata`(`OID`, `PID`, `Count`, `Price`) VALUES ($this->OID,$this->PID,$this->Count,$this->Price)";
        if ($conn->datacon()->query($sql)) {
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }
    public function AddOrderdataWeb()
	{
		$conn=new config();
        $sql = "INSERT INTO `orderdata`(`OID`, `PID`, `Count`, `PPrice`) VALUES ($this->OID,$this->PID,$this->Count,$this->Price)";
        if ($conn->datacon()->query($sql)) {
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
	}
	
	public function Update($OID,$Count,$Price,$PID)
	{
		$conn=new config();
        $sql = "UPDATE `dashorderdata` SET `Count`=$Count,`Price`=$Price WHERE OID=$OID AND PID=$PID;";
        if ($conn->datacon()->query($sql)) {
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
	}
	public function Updateweb($OID,$Count,$Price,$PID)
	{
		$conn=new config();
        $sql = "UPDATE `orderdata` SET `Count`=$Count,`PPrice`=$Price WHERE OID=$OID AND PID=$PID;";
        if ($conn->datacon()->query($sql)) {
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
	}
	
	
	public function ViewOrderdata($OID)
	{
		$conn=new config();
        $sql = "SELECT dashorderdata.*,dashorderdata.Price AS OPP,products.ArName,products.BSale,products.SalePrice,products.Photo AS Code,products.Price FROM `dashorderdata` INNER JOIN products on dashorderdata.PID=products.ID WHERE OID=$OID";
        if ($conn->datacon()->query($sql)) {
			return($conn->datacon()->query($sql));
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
	}
	
	static public function ViewOrderdataweb($OID)
	{
		$conn=new config();
        $sql = "SELECT orderdata.id AS ODID,products.BSale,products.Photo,Alternative,products.SalePrice,products.ID AS PID,products.Photo AS Code,orderdata.Count,orderdata.ID,orderdata.PPrice,orderdata.Availability,products.ArName,products.Price FROM `orderdata` INNER JOIN products on orderdata.PID=products.ID WHERE OID=$OID";
        if ($conn->datacon()->query($sql)) {
			return($conn->datacon()->query($sql));
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
	}
	public function Delete($ID)
	{
		$conn=new config();
        $sql = "DELETE FROM `dashorderdata` WHERE ID=$ID";
        if ($conn->datacon()->query($sql)) {
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
	}
	public function Deleteweb($ID)
	{
		$conn=new config();
        $sql = "DELETE FROM `orderdata` WHERE ID=$ID";
        if ($conn->datacon()->query($sql)) {
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
    }
public function changeAvailability($availability,$NewAlternative,$ID)
	{
		$conn=new config();
        $sql = "UPDATE `dashorderdata` SET `Availability`='$availability',`Alternative`='$NewAlternative' WHERE dashorderdata.ID='$ID'";
        if ($conn->datacon()->query($sql)) {
          return("تم التغير بنجاح");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
	}
  public function changeWebAvailability($availability,$Alternative,$ID)
	{
		$conn=new config();
        $sql = "UPDATE orderdata SET `Availability`='$availability',`Alternative`='$Alternative' WHERE orderdata.ID='$ID'";
        if ($conn->datacon()->query($sql)) {
          return("تم التغير بنجاح");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
	}
  


  // Json functions ...

  public function EditPPInOD($NewPPrice,$itemID,$OID,$total,$ODC)
	{
    $conn=new config();
    $sql = "UPDATE `dashorderdata` SET `Price`=$NewPPrice ,`Count`=$ODC WHERE dashorderdata.ID=$itemID;";
    if ($conn->datacon()->query($sql)) {
      $reesssd = Orderdata::ViewOrderdata($OID);
      $subtotall=0;
      while($rrood = $reesssd->fetch_assoc())
      {
           $subtotall=$rrood['OPP']+$subtotall;
      }
      $rdd = Order::ViewSingleOrders($OID);
      $rodd = $rdd->fetch_assoc();
      $governorate = $rodd['Governorate'];
      Order::Update($subtotall,$total,$total+$subtotall,$OID,$governorate,$rodd['Note']);
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
  }

  // Json functions ...

  public function changeWebODP($NewPPrice,$PCount,$itemID,$OID,$total)
	{
		$conn=new config();
    $sql = "UPDATE `orderdata` SET `PPrice`=$NewPPrice,`Count`=$PCount WHERE orderdata.ID=$itemID;";
    if ($conn->datacon()->query($sql)) {
      $reesssd = Orderdata::ViewOrderdataweb($OID);
      $subtotall=0;
      while($rrood = $reesssd->fetch_assoc())
      {
           $subtotall=$rrood['PPrice']+$subtotall;
      }
      $rdd = Order::ViewSingleOrdersweb($OID);
      $rodd = $rdd->fetch_assoc();
      $governorate = $rodd['Governorate'];
      Order::Updateweb($subtotall,$total,$total+$subtotall,$OID,$governorate,$rodd['Note']);
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
  }
	
	
	
}
?>
