<?php
include '../config.php';

$FName = $_POST['Fname'];
$LName = $_POST['Lname'];
$Gender = $_POST['Gender'];
$Mail = $_POST['Mail'];
$Phone = $_POST['Phone'];
$UserName = $_POST['UserName'];
$Password = $_POST['Password'];
$Location = $_POST['Location'];
$Governorate = $_POST['Governorate'];

$connection = new config();
$sql = "INSERT INTO user(`FName`, `LName`, `Gender`, `Phone`, `Mail`, `UserName`, `Password`, `Location`, `Governorate`) 
VALUES ('$FName','$LName','$Gender','$Phone','$Mail','$UserName','$Password','$Location','$Governorate')";
if ($connection->datacon()->query($sql)) {
    $Sql1 = "SELECT * FROM `user` WHERE UserName='$UserName' and Password='$Password' ";
    $Queryresult = $connection->datacon()->query($Sql1);
    $Result = array();
    while ($FetchData = $Queryresult->fetch_assoc()) {
        $Result[] = $FetchData;
    }
    echo Json_encode($Result);
} else {
    echo Json_encode('Failed to Add');
}
