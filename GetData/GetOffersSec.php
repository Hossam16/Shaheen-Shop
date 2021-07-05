<?php
include '../config.php';


$connection=new config();
$Sql="SELECT products.*,nsub.id AS SSID,ncat.ID CATID,nheader.id AS HEADID from products INNER JOIN nsub on nsub.ID=products.SID INNER JOIN ncat on ncat.ID=nsub.catid INNER JOIN nheader on nheader.id = ncat.headerid WHERE products.Stock!=0 AND BSale=1 AND products.SID!=74 AND products.SID!=76 ORDER BY HEADID,CATID,SSID";
$Queryresult=$connection->datacon()->query($Sql);
$Result=array();

while ($FetchData=$Queryresult->fetch_assoc()){
    if($FetchData['CompanyID'] < 5) {
        $FetchData['Size']='Big';
        $Result[] = $FetchData;
    }
    else
    {
    }
}

echo Json_encode($Result);

