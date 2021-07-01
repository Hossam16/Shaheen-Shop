<?php
include '../config.php';

$CatID=$_POST['CID'];


if($CatID == 0)
{
    $Result=array();
    $Result['photo']='mobWCM.jpg';
    echo Json_encode(array($Result));

}
else
{
    $connection=new config();
    $Sql="SELECT photo FROM `nsub` WHERE ID='$CatID';";
    $Queryresult=$connection->datacon()->query($Sql);
    $Result=array();

    while ($FetchData=$Queryresult->fetch_assoc()){
        $Result[]=$FetchData;
        }

        echo Json_encode($Result);
}



