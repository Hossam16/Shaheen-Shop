<?php
include '../config.php';

$UserID=$_POST['UID'];

$connection=new config();
$Sql="SELECT SUM(IF(products.BSale=0,products.Price*cart.Count,products.SalePrice*cart.Count)) as total
FROM products INNER JOIN cart on cart.PID=products.ID INNER JOIN user on cart.UID=user.ID WHERE UID='$UserID'";
$Queryresult=$connection->datacon()->query($Sql);
$Result=array();

while ($FetchData=$Queryresult->fetch_assoc()){
        $Result[] = $FetchData;
        if($Result[0]['total'] == null)
        {
            $Result[0]['total']="0";
        }
}

echo Json_encode($Result);







