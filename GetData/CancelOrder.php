<?php
include '../config.php';

$OrderID=$_POST['OID'];

$connection = new config();
$sql = "UPDATE orders SET Status='Canceled' WHERE ID=$OrderID";
if ($connection->datacon()->query($sql)) {
    echo Json_encode('Data Updated Successfully');
} else {
    echo Json_encode('Failed to Update');
}




