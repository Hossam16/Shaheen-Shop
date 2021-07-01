<?php
include '../config.php';
$OrderID=$_POST['OID'];


$connection=new config();
$Sql="SELECT products.Photo,products.Name,products.ArName,orderdata.PPrice,orderdata.Count FROM products INNER JOIN orderdata ON orderdata.PID=products.ID INNER JOIN orders on orderdata.OID=orders.ID WHERE orders.ID=$OrderID";
$Queryresult=$connection->datacon()->query($Sql);
$Result=array();

while ($FetchData=$Queryresult->fetch_assoc()){
    $Result[]=$FetchData;
}

echo Json_encode($Result);

