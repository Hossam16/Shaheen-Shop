<?php
include '../config.php';

// Takes raw data from the request
$json = file_get_contents('php://input');
$data = json_decode($json);
$UserID = $data->UID;
$Products = $data->products;
date_default_timezone_set("Africa/Cairo");
$date = date("Y-m-d H:i:s");
$connection = new config();
foreach ($Products as $Product) {
    $sql1 = "SELECT * FROM cart WHERE UID=$UserID AND PID=$Product->PID";
    if ($connection->datacon()->query($sql1)) {
        if ($connection->datacon()->query($sql1)->fetch_assoc()['ID'] != '') {
            $sql = "UPDATE cart SET Count=$Count WHERE UID=$UserID AND PID=$Product->PID ";
            if ($connection->datacon()->query($sql)) {
                echo Json_encode('Data Add Successfully1');
            } else {
                echo Json_encode('Failed to Add');
            }
        } else {
            $sql = "INSERT INTO cart(UID, PID, Count,Date) values ($UserID,$Product->PID,$Product->QTY,'$date')";
            if ($connection->datacon()->query($sql)) {
                echo Json_encode('Data Add Successfully2');
            } else {
                echo Json_encode('Failed to Add');
            }
        }
    } else {
        echo Json_encode('Failed to Add');
    }
}
