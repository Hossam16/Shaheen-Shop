<?php
include '../config.php';

$featured_category_id = $_POST['featured_category_id'];
$connection = new config();
$Sql = "SELECT products.* FROM `OffersProducts` INNER JOIN products on products.ID=OffersProducts.PID INNER JOIN Offers on Offers.id=OffersProducts.OID WHERE Offers.id=$featured_category_id AND products.Stock>0 AND products.Status=1;";
$Queryresult = $connection->datacon()->query($Sql);
$Result = array();
$i = 0;
$object = new stdClass();
while ($FetchData = $Queryresult->fetch_object()) {
    $object->result[] = $FetchData;
}
echo Json_encode($object);
