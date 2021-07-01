<?php
include '../config.php';

$connection=new config();
$Sql="SELECT * FROM `BrandName` WHERE 1";
$Queryresult=$connection->datacon()->query($Sql);
$Result=array();
while ($FetchData=$Queryresult->fetch_assoc()){
    $Result[]=$FetchData['BrandName'];
}

echo Json_encode($Result);

