<?php
include '../config.php';

$header=$_POST['header'];

$connection=new config();
$Sql="SELECT * FROM `sliders` WHERE header='$header';";
$Queryresult=$connection->datacon()->query($Sql);
$Result=array();

while ($FetchData=$Queryresult->fetch_assoc()){
    $Result[]=$FetchData;
}

echo Json_encode($Result);

