<?php
include '../config.php';

$UserName=$_POST['Username'];
$Pass=$_POST['Pass'];

$connection=new config();
$Sql="SELECT * FROM `user` WHERE UserName='$UserName' and Password='$Pass' ";
$Queryresult=$connection->datacon()->query($Sql);
$Result=array();
while ($FetchData=$Queryresult->fetch_assoc()){
    $Result[]=$FetchData;
}

echo Json_encode($Result);

