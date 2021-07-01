<html>
<head>
    <meta charset="utf-8">
</head>
<body>
<?php
if(isset($_GET['date']))
{
    $Date = $_GET['date'];
}
include('config.php');
$Conn=new Config();
$sql = "select orders.ID, orders.Date,user.FName,user.LName,orders.Phone,orders.Governorate,orders.Location,products.ArName,products.Photo,orderdata.Count,orderdata.PPrice,orders.SubTotal,orders.Shipping,orders.TotalPrice,orders.Status FROM orders INNER JOIN orderdata on orders.ID=orderdata.OID INNER JOIN products on orderdata.PID=products.ID INNER JOIN user on orders.UID=user.ID where Date like '%$Date%' AND orders.Visa=1";
//select database
//@mysqli_query($sql,$Conn->datacon()) or die("Couldn't execute query:<br>" . mysqli_error($Conn->datacon()));
//execute query
$result = $Conn->datacon()->query($sql);
//header info for browser
?>
<table>
    <thead>
    <tr>
        <th>

            <?php
            echo('رقم الطلب');
            ?>
        </th><th>
            <?php
            echo('التاريخ');
            ?>
        </th><th>
            <?php
            echo('اسم المستخدم');
            ?>
        </th><th>
            <?php
            echo('التليفون');
            ?>
        </th><th>
            <?php
            echo('المحافظة');
            ?>
        </th><th>
            <?php
            echo('العنوان');
            ?>
        </th><th>
            <?php
            echo('اسم المنتج');
            ?>
        </th><th>
            <?php
            echo('كود الصورة');
            ?>
        </th><th>
            <?php
            echo('العدد');
            ?>
        </th><th>
            <?php
            echo('سعر المنتج الواحد');
            ?>
        </th><th>
            <?php
            echo('المجموع');
            ?>
        </th><th>
            <?php
            echo('تكلفة شحن');
            ?>
        </th><th>
            <?php
            echo('تكلفة الطلب');
            ?>
        </th><th>
            <?php
            echo('حالة الطلب');
            ?>
        </th></tr>
    </thead>
    <tbody>
    <?php

    while($row = $result->fetch_assoc())
    {
    ?>
    <tr>
        <td>
            <?php
            echo $row['ID'];
            ?>
        </td><td>
            <?php
            echo $row['Date'];
            ?>
        </td><td>
            <?php
            echo $row['FName'];
            echo(' ');
            echo $row['LName'];
            ?>
        </td><td>
            <?php
            echo $row['Phone'];
            ?>
        </td><td>
            <?php
            echo $row['Governorate'];
            ?>
        </td><td>
            <?php
            echo $row['Location'];
            ?>
        </td><td>
            <?php
            echo $row['ArName'];
            ?>
        </td><td>
            <?php
            echo $row['Photo'];
            ?>
        </td><td>
            <?php
            echo $row['Count'];
            ?>
        </td><td>
            <?php
            echo $row['PPrice'];
            ?>
        </td><td>
            <?php
            echo $row['SubTotal'];
            ?>
        </td><td>
            <?php
            echo $row['Shipping'];
            ?>
        </td><td>
            <?php
            echo $row['TotalPrice'];
            ?>
        </td><td>
            <?php
            echo $row['Status'];
            ?>
        </td>
        <?php
        }

        ?>
    </tr>
    </tbody>
</table>
</body>
</html>