<?php

class Order
{
protected $ID;
protected $UserID;
protected $Location;
protected $Governorate;
protected $Phone;
protected $SubTotal;
protected $Shipping;
protected $TotalPrice;
protected $Status;

    public function __construct($UserID,$Location,$Governorate,$Phone,$SubTotal,$Shipping,$TotalPrice,$Status)
    {
        $this->UserID=$UserID;
        $this->Location=$Location;
        $this->Governorate=$Governorate;
        $this->Phone=$Phone;
        $this->SubTotal=$SubTotal;
        $this->Shipping=$Shipping;
        $this->TotalPrice=$TotalPrice;
        $this->Status=$Status;

    }

    public function AddToOrder(){
        $connection=new config();
        date_default_timezone_set("Africa/Cairo");
        $date = date("Y-m-d H:i:s");
        $sql = "INSERT INTO orders(UID, Location, Governorate,Phone,SubTotal,Shipping,TotalPrice,Status,Date) values ($this->UserID,'$this->Location','$this->Governorate','$this->Phone',$this->SubTotal,$this->Shipping,$this->TotalPrice,'$this->Status','$date')";
        if ($connection->datacon()->query($sql)) {
        } else {
            echo "Error: " . $sql . "<br>" . $connection->datacon()->error;
        }
        $sqlout1 = "SELECT ID from orders WHERE UID=$this->UserID";
        $reout1 = $connection->datacon()->query($sqlout1);
        while ($rowout1=$reout1->fetch_assoc())
        {
            $orderID = $rowout1['ID'];
        }

        $sqlout = "SELECT cart.*,products.BSale,products.SalePrice,products.Price from cart INNER JOIN products ON cart.PID = products.ID WHERE UID= $this->UserID";
        $reout = $connection->datacon()->query($sqlout);
        while ($rowout =  $reout->fetch_assoc())
        {
            $productID= $rowout['PID'];
            $productCount= $rowout['Count'];
            if($rowout['BSale'] ==1)
            {
                $pprice = $rowout['SalePrice'];
            }
            else
            {
                $pprice = $rowout['Price'];
            }
           $insertout = "INSERT INTO `orderdata` (`OID`,`PID`, `Count`, `PPrice`) VALUES ($orderID,$productID,$productCount,$pprice)";
            mysqli_query($connection->datacon(),$insertout) or die(mysqli_error($connection->datacon()));
        }
            $checkout = "DELETE FROM `cart` WHERE `UID`='$this->UserID'";
            mysqli_query($connection->datacon(),$checkout) or die(mysqli_error($connection->datacon()));
    }

    public function AddToOrderAman(){
        $connection=new config();
        date_default_timezone_set("Africa/Cairo");
        $date = date("Y-m-d H:i:s");
        $sql = "INSERT INTO orders(UID, Location, Governorate,Phone,SubTotal,Shipping,TotalPrice,Status,Date,Aman) values ($this->UserID,'$this->Location','$this->Governorate','$this->Phone',$this->SubTotal,$this->Shipping,$this->TotalPrice,'$this->Status','$date',1)";
        if ($connection->datacon()->query($sql)) {
        } else {
            echo "Error: " . $sql . "<br>" . $connection->datacon()->error;
        }
        $sqlout1 = "SELECT ID from orders WHERE UID=$this->UserID";
        $reout1 = $connection->datacon()->query($sqlout1);
        while ($rowout1=$reout1->fetch_assoc())
        {
            $orderID = $rowout1['ID'];
        }

        $sqlout = "SELECT cart.*,products.BSale,products.SalePrice,products.Price from cart INNER JOIN products ON cart.PID = products.ID WHERE UID= $this->UserID";
        $reout = $connection->datacon()->query($sqlout);
        while ($rowout =  $reout->fetch_assoc())
        {
            $productID= $rowout['PID'];
            $productCount= $rowout['Count'];
            if($rowout['BSale'] ==1)
            {
                $pprice = $rowout['SalePrice'];
            }
            else
            {
                $pprice = $rowout['Price'];
            }
           $insertout = "INSERT INTO `orderdata` (`OID`,`PID`, `Count`, `PPrice`) VALUES ($orderID,$productID,$productCount,$pprice)";
            mysqli_query($connection->datacon(),$insertout) or die(mysqli_error($connection->datacon()));
        }
            $checkout = "DELETE FROM `cart` WHERE `UID`='$this->UserID'";
            mysqli_query($connection->datacon(),$checkout) or die(mysqli_error($connection->datacon()));
    }


    public function AddToOrderVisa(){
        $connection=new config();
        date_default_timezone_set("Africa/Cairo");
        $date = date("Y-m-d H:i:s");
        $sql = "INSERT INTO orders(UID, Location, Governorate,Phone,SubTotal,Shipping,TotalPrice,Status,Date,Visa) values ($this->UserID,'$this->Location','$this->Governorate','$this->Phone',$this->SubTotal,$this->Shipping,$this->TotalPrice,'$this->Status','$date',1)";
        if ($connection->datacon()->query($sql)) {
        } else {
            echo "Error: " . $sql . "<br>" . $connection->datacon()->error;
        }
        $sqlout1 = "SELECT ID from orders WHERE UID=$this->UserID";
        $reout1 = $connection->datacon()->query($sqlout1);
        while ($rowout1=$reout1->fetch_assoc())
        {
            $orderID = $rowout1['ID'];
        }

        $sqlout = "SELECT cart.*,products.BSale,products.SalePrice,products.Price from cart INNER JOIN products ON cart.PID = products.ID WHERE UID= $this->UserID";
        $reout = $connection->datacon()->query($sqlout);
        while ($rowout =  $reout->fetch_assoc())
        {
            $productID= $rowout['PID'];
            $productCount= $rowout['Count'];
            if($rowout['BSale'] ==1)
            {
                $pprice = $rowout['SalePrice'];
            }
            else
            {
                $pprice = $rowout['Price'];
            }
           $insertout = "INSERT INTO `orderdata` (`OID`,`PID`, `Count`, `PPrice`) VALUES ($orderID,$productID,$productCount,$pprice)";
            mysqli_query($connection->datacon(),$insertout) or die(mysqli_error($connection->datacon()));
        }
            $checkout = "DELETE FROM `cart` WHERE `UID`='$this->UserID'";
            mysqli_query($connection->datacon(),$checkout) or die(mysqli_error($connection->datacon()));

            return $orderID;

    }
    
    public function Cancel($ID) 
    {
        $conn = new config();
        $sql = "UPDATE orders SET Status='Canceled' WHERE ID ='$ID'";
        mysqli_query($conn->datacon(),$sql);
    }

    

}



?>