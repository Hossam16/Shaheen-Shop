<?php
include '../config.php';

$UID = $_POST['UID'];

$connection = new config();
$sql = "DELETE FROM `cart` WHERE UID=$UID";
if ($connection->datacon()->query($sql)) {
    echo Json_encode('Cart Cleared Successfully');
} else {
    echo Json_encode('Failed Clear Cart');
}
