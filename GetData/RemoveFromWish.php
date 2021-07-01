<?php
include '../config.php';

$PID=$_POST['PID'];
$UID=$_POST['UID'];

$connection=new config();
$sql="delete from wishlist WHERE PID='$PID' AND UID='$UID'";
if ($connection->datacon()->query($sql)) {
    echo Json_encode('Data Deleted Successfully');
} else {
    echo Json_encode('Failed to Delete');
}