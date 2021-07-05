<?php
include '../config.php';

$CatID=$_POST['CatID'];
if($CatID==0)
{
    $connection=new config();
    $Sql="SELECT products.*,nsub.sub FROM products INNER JOIN nsub on products.SID=nsub.ID WHERE products.BSale=1 AND products.SID!=74 AND products.SID!=76";
    $Queryresult=$connection->datacon()->query($Sql);
    $Result=array();

    while ($FetchData=$Queryresult->fetch_assoc()){
        $FetchData['Size']='Big';
        $Result[]=$FetchData;
    }
    
    echo Json_encode($Result);
}
else
{

    $connection=new config();
    $Sql="SELECT products.*, nsub.sub FROM products INNER JOIN nsub on products.SID=nsub.ID where nsub.ID='$CatID' AND products.Stock!=0";
    $Queryresult=$connection->datacon()->query($Sql);
    $Result=array();

    while ($FetchData=$Queryresult->fetch_assoc()){
        $FetchData['Size']='Big';
        $Result[]=$FetchData;
    }

    echo Json_encode($Result);

}
    

