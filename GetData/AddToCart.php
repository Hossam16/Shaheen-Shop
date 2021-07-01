<?php
include '../config.php';

$UserID = $_POST['UID'];
$ProductId = $_POST['PID'];
$Count = $_POST['QTY'];
date_default_timezone_set("Africa/Cairo");
$date = date("Y-m-d H:i:s");
$connection = new config();
$sql1 = "SELECT * FROM cart WHERE UID=$UserID AND PID=$ProductId";
if ($connection->datacon()->query($sql1)) {
    if ($connection->datacon()->query($sql1)->fetch_assoc()['ID'] !='') {
        $sql = "UPDATE cart SET Count=$Count WHERE UID=$UserID AND PID=$ProductId ";
        if ($connection->datacon()->query($sql)) {
            echo Json_encode('Data Add Successfully1');
        } else {
            echo Json_encode('Failed to Add');
        }
    }else
    {
        $sql = "INSERT INTO cart(UID, PID, Count,Date) values ($UserID,$ProductId,$Count,'$date')";
        if ($connection->datacon()->query($sql)) {
            echo Json_encode('Data Add Successfully2');
        } else {
            echo Json_encode('Failed to Add');
        }
    }
}else {
    echo Json_encode('Failed to Add');
}

