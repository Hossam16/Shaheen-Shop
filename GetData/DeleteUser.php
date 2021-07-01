<?php
include '../config.php';

$UID=$_GET['UID'];

$connection=new config();
$sql="delete from user WHERE ID='$UID'";
if ($connection->datacon()->query($sql)) {
    echo Json_encode('Data Deleted Successfully');
} else {
    echo Json_encode('Failed to Delete');
}