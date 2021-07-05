<?php
include '../config.php';


$connection=new config();
$Sql="SELECT * FROM products WHERE BSale=1 ORDER BY RAND() LIMIT 10";
$Queryresult=$connection->datacon()->query($Sql);
$Result=array();

while ($FetchData=$Queryresult->fetch_assoc()){
    if($FetchData['CompanyID'] < 5) {
        $FetchData['Size'] = 'Big';
        $Result[] = $FetchData;
    }
    else
    {
    }
}

echo Json_encode($Result);

