<?php
include '../config.php';

$UserID=$_POST['UID'];

$connection=new config();
$Sql="SELECT products.Photo,products.CompanyID,products.Price,products.Name,products.ArName ,products.BSale,products.SalePrice,products.size,nheader.ID AS CID,products.Desc,products.ArDesc,cart.*
FROM products INNER JOIN nsub on nsub.id=products.SID INNER JOIN ncat on ncat.ID=nsub.catid INNER JOIN nheader on nheader.ID=ncat.headerid INNER JOIN cart on cart.PID=products.ID INNER JOIN user on cart.UID=user.ID WHERE UID='$UserID'";
$Queryresult=$connection->datacon()->query($Sql);
$Result=array();

while ($FetchData=$Queryresult->fetch_assoc()){
    if($FetchData['CompanyID'] < 5) {
        $Result[] = $FetchData;
    }
    else
    {
    }
}

echo Json_encode($Result);

