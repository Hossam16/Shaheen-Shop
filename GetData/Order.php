<?php

include '../config.php';

$connection=new config();
 $UserID=$_POST['UID'];
 $Location=$_POST['Location'];
 $Governorate=$_POST['Governorate'];
 $Phone=$_POST['Phone'];
 $SubTotal=$_POST['SubTotal'];
 $Shipping=$_POST['Shipping'];
 $TotalPrice=$_POST['TotalPrice'];
 $Status=$_POST['Status'];
 if(isset($_POST['payment_method']))
 {
     $Visa = $_POST['payment_method'];
 }else
 {
     $Visa = 0;
 }
 if(isset($_POST['os']))
 {
     $os = $_POST['os'];
 }else
 {
     $os = 'android';
 }




    date_default_timezone_set("Africa/Cairo");
    $date = date("Y-m-d H:i:s");
    $sql = "INSERT INTO orders(UID, Location, Governorate,Phone,SubTotal,Shipping,TotalPrice,Visa,Status,Date) values ($UserID,'$Location','$Governorate','$Phone',$SubTotal,$Shipping,$TotalPrice,$Visa,'$Status','$date')";
    if ($connection->datacon()->query($sql)) {
    } else {
        echo "Error: " . $sql . "<br>" . $connection->datacon()->error;
    }
    $sqlout1 = "SELECT ID from orders WHERE UID=$UserID";
    $reout1 = $connection->datacon()->query($sqlout1);
    while ($rowout1 =  $reout1->fetch_assoc())
    {
        $orderID = $rowout1['ID'];
    }

    $sqlout = "SELECT cart.*,products.BSale,products.SalePrice,products.Price from cart INNER JOIN products ON cart.PID = products.ID WHERE UID= $UserID";
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
        $checkout = "DELETE FROM `cart` WHERE `UID`='$UserID'";
        if($connection->datacon()->query($checkout))
        {
           echo $orderID;
        }else
        {
            Echo 'Error';
        }
