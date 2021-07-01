<?php
include '../config.php';

$headerID = $_GET['catId'];

$connection=new config();
$Sql="SELECT nsub.* FROM nsub INNER JOIN ncat on ncat.id=nsub.catid INNER JOIN nheader on nheader.ID=ncat.headerid WHERE nheader.ID=$headerID;";
$Queryresult=$connection->datacon()->query($Sql);
$Result=array();

while ($FetchData=$Queryresult->fetch_assoc()){
    $Result[]=$FetchData;
}

echo Json_encode($Result);