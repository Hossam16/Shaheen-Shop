<?php
include '../config.php';


$connection = new config();
$Sql = "SELECT Offers.* FROM Offers WHERE Offers.EndDate>DATE_ADD(now(),interval 2 hour)";
$Queryresult = $connection->datacon()->query($Sql);
$Result = array();
$i = 0;
$object = new stdClass();
while ($FetchData = $Queryresult->fetch_object()) {
    $object->result[] = $FetchData;
    $SqlGetProducts = "SELECT products.* FROM `OffersProducts` INNER JOIN products on products.ID=OffersProducts.PID INNER JOIN Offers on Offers.id=OffersProducts.OID WHERE Offers.id=$FetchData->ID";
    $QueryresultProducts = $connection->datacon()->query($SqlGetProducts);
    $object->result[$i]->products[]='';
    while ($FetchDataProducts = $QueryresultProducts->fetch_object()) {
        $object->result[$i]->products[] = $FetchDataProducts;
    }
    $i++;
}

echo Json_encode($object);
