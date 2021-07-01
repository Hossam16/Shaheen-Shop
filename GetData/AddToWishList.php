<?php
include '../config.php';

$UserID=$_POST['UID'];
$ProductId=$_POST['PID'];
date_default_timezone_set("Africa/Cairo");
$date = date("Y-m-d H:i:s");
$connection = new config();
$sql = "INSERT INTO wishlist(UID, PID,Date) values ($UserID,$ProductId,'$date')";
if ($connection->datacon()->query($sql)) {
    echo Json_encode('Data Add Successfully');
} else {
    echo Json_encode('Failed to Add');
}




