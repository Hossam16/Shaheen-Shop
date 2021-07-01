<?php
include '../config.php';

$UserID=$_GET['UID'];

$connection=new config();
$Sql="SELECT * FROM `compare` WHERE UID='$UserID'";
$Queryresult=$connection->datacon()->query($Sql);
$Result=array();

while ($FetchData=$Queryresult->fetch_assoc()){
    $Result[]=$FetchData;
}

echo Json_encode($Result);

