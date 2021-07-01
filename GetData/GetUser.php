<?php
include '../config.php';

$UserID=$_POST['UID'];

$connection=new config();
$Sql="Select * from user where ID='$UserID'";
$Queryresult=$connection->datacon()->query($Sql);
$Result=array();

while ($FetchData=$Queryresult->fetch_assoc()){
    $Result[]=$FetchData;
}

echo Json_encode($Result);

