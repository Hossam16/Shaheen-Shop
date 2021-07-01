<?php
include '../config.php';

$CID=$_GET['CID'];

$connection=new config();
$sql="delete from compare WHERE ID='$CID'";
if ($connection->datacon()->query($sql)) {
    echo Json_encode('Data Deleted Successfully');
} else {
    echo Json_encode('Failed to Delete');
}