<?php
include '../config.php';


$connection=new config();
$Sql="SELECT * FROM products WHERE Size='Free78' AND Stock!=0 AND SID!=2 ORDER BY RAND() LIMIT 10";
$Queryresult=$connection->datacon()->query($Sql);
$Result=array();

while ($FetchData=$Queryresult->fetch_assoc()){
    $FetchData['Size'] = 'Big';
    $Result[]=$FetchData;
}

echo Json_encode($Result);

