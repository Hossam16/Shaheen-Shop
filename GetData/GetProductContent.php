<?php
include '../config.php';

$PID=$_POST['PID'];
$connection=new config();
$Sql="SELECT * FROM `products` WHERE ID='$PID'";
$Queryresult=$connection->datacon()->query($Sql);
$Result=array();

while ($FetchData=$Queryresult->fetch_assoc()){
    $Result[]=$FetchData;
}

echo Json_encode($Result);

