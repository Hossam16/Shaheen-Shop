<?php
class Products
{
    protected $ID;
    protected $Name;
    protected $NameAr;
    protected $Desc;
    protected $DescAr;
    protected $Price;
    protected $SalePrice;
    protected $BSale;
    protected $Stock;
    protected $SID;
    protected $MaxAmount;
    protected $Photo;
    protected $Status;
    protected $ViewNum;
    protected $Rate;
    protected $CompanyID;
    protected $Size;
	
	
	public function ViewAllProducts(){
        $conn=new config();
        $sql = "SELECT * FROM `products` ORDER BY `products`.`Price` ASC";
        if ($conn->datacon()->query($sql)) {
			return($conn->datacon()->query($sql));
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }

    }
	
	public function ViewSingleProduct($PID){
        $conn=new config();
        $sql = "SELECT * FROM `products` WHERE products.id=$PID";
        if ($conn->datacon()->query($sql)) {
			return($conn->datacon()->query($sql));
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }

    }
	
	
	
}
?>