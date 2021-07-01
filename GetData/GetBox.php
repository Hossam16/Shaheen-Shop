<?php
include '../config.php';


$connection=new config();
$Sql="SELECT *, (100-((products.SalePrice / products.Price)*100)) AS Per FROM products WHERE SalePrice!=0 AND BSale=1 ORDER BY Per Desc";
$Queryresult=$connection->datacon()->query($Sql);
$Result=array();

while ($FetchData=$Queryresult->fetch_assoc()){
    $Result[]=$FetchData;
}

echo Json_encode($Result);

