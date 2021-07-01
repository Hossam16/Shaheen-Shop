<?php
include '../config.php';

$UserID=$_POST['UID'];

$connection=new config();
$Sql="SELECT products.*,wishlist.*
FROM products INNER JOIN wishlist on wishlist.PID=products.ID INNER JOIN user on wishlist.UID=user.ID WHERE UID='$UserID'";
$Queryresult=$connection->datacon()->query($Sql);
$Result=array();

while ($FetchData=$Queryresult->fetch_assoc()){
    $Result[]=$FetchData;
}

echo Json_encode($Result);

