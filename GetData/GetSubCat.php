<?php
include '../config.php';



$connection=new config();
$Sql="SELECT * FROM `nsub` WHERE  nsub.StatusSub=1";
$Queryresult=$connection->datacon()->query($Sql);
$Result=array();

while ($FetchData=$Queryresult->fetch_assoc()){
    $Result[]=$FetchData;
}

echo Json_encode($Result);

