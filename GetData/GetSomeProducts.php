<?php
include '../config.php';


$connection=new config();
$Sql="SELECT pro.*FROM products pro INNER JOIN nsub s on pro.SID=s.ID INNER JOIN ncat h on s.catid=h.ID INNER JOIN nheader on h.headerid=nheader.ID where nheader.ID='4' OR nheader.ID='3' ORDER BY RAND() LIMIT 10;";
$Queryresult=$connection->datacon()->query($Sql);
$Result=array();

while ($FetchData=$Queryresult->fetch_assoc()){
    $Result[]=$FetchData;
}

echo Json_encode($Result);

