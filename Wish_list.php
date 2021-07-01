<?php
include 'ProductList.php';

class Wish_list extends ProductList
{



    public function __construct($UserID, $ProductID)
    {
        $this->UserID=$UserID;
        $this->ProductID=$ProductID;
    }

    public function AddToWish(){
        $connection=new config();
        date_default_timezone_set("Africa/Cairo");
        $date = date("Y-m-d H:i:s");
        $sql = "INSERT INTO wishlist(UID, PID,Date) values ($this->UserID,$this->ProductID,'$date')";
        if ($connection->datacon()->query($sql)) {
        } else {
            echo "Error: " . $sql . "<br>" . $connection->datacon()->error;
        }

    }

    public function DeleteFromWish($ID){
        $connection=new config();
        $delete = "DELETE FROM `wishlist` WHERE `ID`='$ID'";
        mysqli_query($connection->datacon(),$delete) or die(mysqli_error());

    }
    public function CheckoutCart($UID){
        $connection=new config();
        $delete = "DELETE FROM `cart` WHERE `UID`='$UID'";
        mysqli_query($connection->datacon(),$delete) or die(mysqli_error());

    }

    public function UpdateCount($ID,$NewCount){
        $connection=new config();
        $update="UPDATE `cart` SET Count=$NewCount where ID='$ID'";
        mysqli_query($connection->datacon(),$update) or die(mysqli_error());

    }




}

?>