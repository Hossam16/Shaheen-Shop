<?php
include '../config.php';

$ID = $_POST['ID'];
$FName = $_POST['Fname'];
$LName = $_POST['Lname'];
$Gender = $_POST['Gender'];
$Mail = $_POST['Mail'];
$Phone = $_POST['Phone'];
$Location = $_POST['Location'];
$Governorate = $_POST['Governorate'];

$connection = new config();
$sql = "UPDATE `user` SET
                `FName`='$FName',
                `LName`='$LName',
                `Gender`='$Gender',
                `Phone`='$Phone',
                `Mail`='$Mail',
                `Governorate`='$Governorate',
                `Location`='$Location'
                    WHERE `ID`='$ID'";
if ($connection->datacon()->query($sql)) {
    $Sql1 = "SELECT * FROM `user` WHERE `ID`='$ID' ";
    $Queryresult = $connection->datacon()->query($Sql1);
    $Result = array();
    while ($FetchData = $Queryresult->fetch_assoc()) {
        $Result[] = $FetchData;
    }
    echo Json_encode($Result);
} else {
    echo Json_encode('Failed to Update');
}
