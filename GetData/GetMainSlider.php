<?php
include '../config.php';

$connection=new config();
$Sql="SELECT * FROM `sliders` WHERE header='mainslider';";
$Queryresult=$connection->datacon()->query($Sql);
$Result=array();

while ($FetchData=$Queryresult->fetch_assoc()){
    $Result[]=$FetchData;
}

echo Json_encode($Result);

