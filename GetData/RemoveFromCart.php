<?php
include '../config.php';

$CartID=$_POST['CID'];

$connection=new config();
$sql="delete from cart WHERE ID='$CartID'";
if ($connection->datacon()->query($sql)) {
    echo Json_encode('Data Deleted Successfully');
} else {
    echo Json_encode('Failed to Delete');
}