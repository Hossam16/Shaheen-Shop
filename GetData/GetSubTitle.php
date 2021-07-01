<?php
include '../config.php';

$CatId=$_POST['CatID'];

$connection=new config();
$Sql="SELECT * from nsub where catid='$CatId' AND nsub.StatusSub=1";
$Queryresult=$connection->datacon()->query($Sql);
$Result=array();

while ($FetchData=$Queryresult->fetch_assoc()){
    $Result[]=$FetchData;
}

echo Json_encode($Result);

