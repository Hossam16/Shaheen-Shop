<?php
include '../config.php';

$UID = $_GET['userId'];

$connection=new config();
$Sql="SELECT user.Gender FROM user WHERE user.ID='$UID'";
$Queryresult=$connection->datacon()->query($Sql);

$gender = $Queryresult->fetch_assoc()['Gender'];
echo Json_encode($gender);
return $gender;