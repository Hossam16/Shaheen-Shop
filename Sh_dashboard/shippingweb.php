<?php
$connection = new config();
$area =$governorate;
$sql555="SELECT products.Size,SUM(orderdata.Count) AS PCount FROM products INNER JOIN orderdata on products.ID=orderdata.PID INNER JOIN orders on orders.ID=orderdata.OID WHERE orders.ID=$OID GROUP BY products.Size;";
$result555 = $connection->datacon()->query($sql555);
$SmallCost =0;
$BigCost =0;
while ($row555 = $result555->fetch_assoc())
{
    if($row555['Size']=='Big')
    {
        $size= $row555['Size'];
        $sql666 = "SELECT Cost FROM shippingcost WHERE shippingcost.Type='Big' AND shippingcost.AreaID Like '%$area%' AND shippingcost.Count=1";
        $result666 = $connection->datacon()->query($sql666);
        while ($row666 = $result666->fetch_assoc())
        {
            $BigCost = $row666['Cost']*$row555['PCount'];
        }

    }
    if($row555['Size']=='Small')
    {
        $size= $row555['Size'];
        $SCount = $row555['PCount'];
        if($SCount >= 10)
        {
            $P=(int)($SCount/10);
            $sql666 = "SELECT Cost FROM shippingcost WHERE shippingcost.Type='Small' AND shippingcost.AreaID Like '%$area%' AND shippingcost.Count LIKE '%9'";
            $result666 = $connection->datacon()->query($sql666);
            while ($row666 = $result666->fetch_assoc())
            {
                $SmallCost =$row666['Cost']*$P;
            }

            $SCount = $SCount%10;
        }
        if($SCount !=0) {
            $sql666 = "SELECT Cost FROM shippingcost WHERE shippingcost.Type='Small' AND shippingcost.AreaID Like '%$area%' AND shippingcost.Count like '%$SCount%'";
            $result666 = $connection->datacon()->query($sql666);
            while ($row666 = $result666->fetch_assoc()) {
                $SmallCost = $SmallCost + $row666['Cost'];
            }
        }
    }

}
$total = $SmallCost + $BigCost;
?>