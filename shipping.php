<?php
$connection = new config();
$UID =$uid;
$area =$governorate;
$sql555="SELECT products.Size,SUM(cart.Count) AS PCount FROM products INNER JOIN cart on products.ID=cart.PID WHERE cart.UID= '$UID' GROUP BY products.Size;";
$result555 = $connection->datacon()->query($sql555);
$SmallCost =0;
$BigCost =0;
$Med60Cost = 0;
$Med100Cost = 0;





while ($row555 = $result555->fetch_assoc())
{




    if($row555['Size']=='Big' AND ($area == 'Cairo' OR $area =='Giza'))
    {
        $size= $row555['Size'];
        $sql666 = "SELECT Cost,Cost_ FROM shippingcost WHERE shippingcost.Type='Big' AND shippingcost.AreaID Like '%$area%' AND shippingcost.Count=1";
        $result666 = $connection->datacon()->query($sql666);
        while ($row666 = $result666->fetch_assoc())
        {
            $BigCost = ($row666['Cost']*($row555['PCount']-1))+($row666['Cost_']);
        }

    }
    elseif($row555['Size']=='Big' AND ($area != 'Cairo' AND $area !='Giza'))
    {
        $size= $row555['Size'];
        $sql666 = "SELECT Cost FROM shippingcost WHERE shippingcost.Type='Big' AND shippingcost.AreaID Like '%$area%' AND shippingcost.Count=1";
        $result666 = $connection->datacon()->query($sql666);
        while ($row666 = $result666->fetch_assoc())
        {
            $BigCost = $row666['Cost']*$row555['PCount'];
        }

    }


    if($row555['Size']=='Small' AND ($area == 'Cairo' OR $area =='Giza'))
    {
        $size= $row555['Size'];
        $sql666 = "SELECT Cost,Cost_ FROM shippingcost WHERE shippingcost.Type='Small' AND shippingcost.AreaID Like '%$area%' AND shippingcost.Count=1";
        $result666 = $connection->datacon()->query($sql666);
        while ($row666 = $result666->fetch_assoc())
        {
            $SmallCost = ($row666['Cost']*($row555['PCount']-1))+($row666['Cost_']);
        }

    }
    elseif($row555['Size']=='Small' AND ($area != 'Cairo' AND $area !='Giza'))
    {
        $size= $row555['Size'];
        $sql666 = "SELECT Cost FROM shippingcost WHERE shippingcost.Type='Small' AND shippingcost.AreaID Like '%$area%' AND shippingcost.Count=1";
        $result666 = $connection->datacon()->query($sql666);
        while ($row666 = $result666->fetch_assoc())
        {
            $SmallCost = $row666['Cost']*$row555['PCount'];
        }

    }



    
    // if($row555['Size']=='Med60' AND ($area == 'Cairo' OR $area =='Giza'))
    // {
    //     $size= $row555['Size'];
    //     $sql666 = "SELECT Cost FROM shippingcost WHERE shippingcost.Type='Med60' AND shippingcost.AreaID Like '%$area%' AND shippingcost.Count=1";
    //     $result666 = $connection->datacon()->query($sql666);
    //     while ($row666 = $result666->fetch_assoc())
    //     {
    //         $Med60Cost = $row666['Cost']*$row555['PCount'];
    //     }

    // }

    // if($row555['Size']=='Med60' AND ($area != 'Cairo' AND $area !='Giza'))
    // {
    //     $size= $row555['Size'];
    //     $sql666 = "SELECT Cost FROM shippingcost WHERE shippingcost.Type='Med60' AND shippingcost.AreaID Like '%$area%' AND shippingcost.Count=1";
    //     $result666 = $connection->datacon()->query($sql666);
    //     while ($row666 = $result666->fetch_assoc())
    //     {
    //         $Med60Cost = $row666['Cost']*$row555['PCount'];
    //     }

    // }


    // if($row555['Size']=='Med100' AND ($area == 'Cairo' OR $area =='Giza'))
    // {
    //     $size= $row555['Size'];
    //     $sql666 = "SELECT Cost FROM shippingcost WHERE shippingcost.Type='Med100' AND shippingcost.AreaID Like '%$area%' AND shippingcost.Count=1";
    //     $result666 = $connection->datacon()->query($sql666);
    //     while ($row666 = $result666->fetch_assoc())
    //     {
    //         $Med100Cost = $row666['Cost']*$row555['PCount'];
    //     }

    // }






    // if(($row555['Size']=='Small' OR $row555['Size']=='Med100') AND ($area != 'Cairo' AND $area !='Giza'))
    // {
    //     $size= $row555['Size'];
    //     $SCount = $row555['PCount'];
    //     if($SCount >= 10)
    //     {
    //         $P=(int)($SCount/10);
    //         $sql666 = "SELECT Cost FROM shippingcost WHERE shippingcost.Type='Small' AND shippingcost.AreaID Like '%$area%' AND shippingcost.Count LIKE '%9'";
    //         $result666 = $connection->datacon()->query($sql666);
    //         while ($row666 = $result666->fetch_assoc())
    //         {
    //             $SmallCost =$row666['Cost']*$P;
    //         }

    //         $SCount = $SCount%10;
    //     }





        
    //     if($SCount !=0) {
    //         $sql666 = "SELECT Cost FROM shippingcost WHERE shippingcost.Type='Small' AND shippingcost.AreaID Like '%$area%' AND shippingcost.Count like '%$SCount%'";
    //         $result666 = $connection->datacon()->query($sql666);
    //         while ($row666 = $result666->fetch_assoc()) {
    //             $SmallCost = $SmallCost + $row666['Cost'];
    //         }
    //     }

    // }elseif($row555['Size']=='Small')
    // {
    //     $size= $row555['Size'];
    //     $SCount = $row555['PCount'];
    //     if($SCount >= 10)
    //     {
    //         $P=(int)($SCount/10);
    //         $sql666 = "SELECT Cost FROM shippingcost WHERE shippingcost.Type='Small' AND shippingcost.AreaID Like '%$area%' AND shippingcost.Count LIKE '%9'";
    //         $result666 = $connection->datacon()->query($sql666);
    //         while ($row666 = $result666->fetch_assoc())
    //         {
    //             $SmallCost =$row666['Cost']*$P;
    //         }

    //         $SCount = $SCount%10;
    //     }





        
    //     if($SCount !=0) {
    //         $sql666 = "SELECT Cost FROM shippingcost WHERE shippingcost.Type='Small' AND shippingcost.AreaID Like '%$area%' AND shippingcost.Count like '%$SCount%'";
    //         $result666 = $connection->datacon()->query($sql666);
    //         while ($row666 = $result666->fetch_assoc()) {
    //             $SmallCost = $SmallCost + $row666['Cost'];
    //         }
    //     }


    // }

    // if(($row555['Size']=='Small' OR $row555['Size']=='Med100') AND ($area != 'Cairo' AND $area !='Giza'))
    // {
    //     $size= $row555['Size'];
    //     $SCount = $row555['PCount'];
    //     $sql666 = "SELECT Cost FROM shippingcost WHERE shippingcost.Type='Small' AND shippingcost.AreaID Like '%$area%' AND shippingcost.Count LIKE '%1%'";
    //     $result666 = $connection->datacon()->query($sql666);
    //     while ($row666 = $result666->fetch_assoc())
    //         {
    //             $SmallCost =$row666['Cost']*$SCount;
    //         }
    // }
    // elseif($row555['Size']=='Small')
    // {
    //     $size= $row555['Size'];
    //     $SCount = $row555['PCount'];
    //     $sql666 = "SELECT Cost FROM shippingcost WHERE shippingcost.Type='Small' AND shippingcost.AreaID Like '%$area%' AND shippingcost.Count LIKE '%1%'";
    //     $result666 = $connection->datacon()->query($sql666);
    //     while ($row666 = $result666->fetch_assoc())
    //         {
    //             $SmallCost =$row666['Cost']*$SCount;
    //         }
    // }

}
$total = $Med100Cost + $Med60Cost + $SmallCost + $BigCost;
?>