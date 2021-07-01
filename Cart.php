<?php
include 'ProductList.php';

class Cart extends ProductList
{

    private $Count;

    public function __construct($UserID, $ProductID,$Count)
    {
        $this->UserID=$UserID;
        $this->ProductID=$ProductID;
        $this->Count=$Count;
    }

    public function AddToCart(){
        $connection=new config();
        date_default_timezone_set("Africa/Cairo");
        $date = date("Y-m-d H:i:s");
        $sql = "INSERT INTO cart(UID, PID, Count,Date) values ($this->UserID,$this->ProductID,$this->Count,'$date')";
        if ($connection->datacon()->query($sql)) {
        } else {
            echo "Error: " . $sql . "<br>" . $connection->datacon()->error;
        }

    }

    public static function DeleteFromCart($ID){
        $connection=new config();
        $ID = mysqli_real_escape_string($connection->datacon(),$ID);
        $delete = "DELETE FROM `cart` WHERE `ID`='$ID'";
        mysqli_query($connection->datacon(),$delete) or die(mysqli_error());

    }
    public static function CheckoutCart($UID){
        $connection=new config();
        $UID = mysqli_real_escape_string($connection->datacon(),$UID);
        $delete = "DELETE FROM `cart` WHERE `UID`='$UID'";
        mysqli_query($connection->datacon(),$delete) or die(mysqli_error());

    }

    public static function UpdateCount($ID,$NewCount){
        $connection=new config();
        $ID = mysqli_real_escape_string($connection->datacon(),$ID);
        $NewCount = mysqli_real_escape_string($connection->datacon(),$NewCount);
        $update="UPDATE `cart` SET Count=$NewCount where ID='$ID'";
        mysqli_query($connection->datacon(),$update) or die(mysqli_error());

    }




}

?>