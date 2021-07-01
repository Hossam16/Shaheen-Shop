<?php
include '../config.php';
$Name=$_POST['Name'];



$connection=new config();

$Sql="select * from products WHERE Name like '%$Name%'  or ArName like '%$Name%' AND Stock != 0";
$Queryresult=$connection->datacon()->query($Sql);
$Result=array();

while ($FetchData=$Queryresult->fetch_assoc()){
    $Result[]=$FetchData;
}

echo Json_encode($Result);

