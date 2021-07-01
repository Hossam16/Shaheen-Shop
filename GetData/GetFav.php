<?php
include '../config.php';
$UID=$_POST['UID'];
$PID=$_POST['PID'];




$connection=new config();

$Sql="SELECT ID FROM `wishlist` WHERE UID=$UID AND PID=$PID ";
$Queryresult=$connection->datacon()->query($Sql);
$Result=array();

while ($FetchData=$Queryresult->fetch_assoc()){
    $Result[]=$FetchData;
}

echo Json_encode($Result);

