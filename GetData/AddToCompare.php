<?php
include '../config.php';

$UserID=$_GET['UID'];
$ProductId=$_GET['PID'];
date_default_timezone_set("Africa/Cairo");
$date = date("Y-m-d H:i:s");
$connection = new config();
$sql = "INSERT INTO compare(UID, PID,Date) values ($UserID,$ProductId,'$date')";
if ($connection->datacon()->query($sql)) {
    echo Json_encode('Data Add Successfully');
} else {
    echo Json_encode('Failed to Add');
}




