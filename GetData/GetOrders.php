<?php
include '../config.php';
$UserID=$_POST['UID'];


$connection=new config();
$Sql="SELECT orders.* FROM `orderdata` INNER JOIN orders on orderdata.OID=orders.ID WHERE orders.UID=$UserID GROUP BY orderdata.OID";
$Queryresult=$connection->datacon()->query($Sql);
$Result=array();

while ($FetchData=$Queryresult->fetch_assoc()){
    $Result[]=$FetchData;
}

echo Json_encode($Result);

