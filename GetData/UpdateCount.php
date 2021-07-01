<?php
include '../config.php';

$CartID=$_GET['CID'];
$Count=$_GET['QTY'];

$connection=new config();
$sql="UPDATE cart SET `Count`='$Count' where ID='$CartID'";
if ($connection->datacon()->query($sql)) {
    echo Json_encode('Data Updated Successfully');
} else {
    echo Json_encode('Failed to Update');
}