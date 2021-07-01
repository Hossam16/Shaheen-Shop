<?php
include '../config.php';

$UserName=$_POST['UserName'];

$connection=new config();
$Sql="SELECT * FROM `user` WHERE UserName='$UserName'";
$Queryresult=$connection->datacon()->query($Sql);
$Result=array();
while ($FetchData=$Queryresult->fetch_assoc()){
    $Result[]=$FetchData;
}

echo Json_encode($Result);

