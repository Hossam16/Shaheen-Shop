<?php
include '../config.php';

$code=$_GET['code'];

$connection=new config();
$sql ="SELECT percentage FROM promocode WHERE promocode.text='$code'";
if ($connection->datacon()->query($sql)) {
    echo $connection->datacon()->query($sql)->fetch_assoc()['percentage']; 
   return $connection->datacon()->query($sql)->fetch_assoc()['percentage']; 
} else {
    echo Json_encode('Failed to Selected');
}