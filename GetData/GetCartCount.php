<?php
include '../config.php';

$UserID=$_GET['UID'];

$connection=new config();
$Sql="SELECT SUM(cart.Count) AS count FROM cart WHERE UID='$UserID'";
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







