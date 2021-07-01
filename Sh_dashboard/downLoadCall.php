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
/**EDIT LINES 3-8**/
/**YOU DO NOT NEED TO EDIT ANYTHING BELOW THIS LINE**/
//create MySQL connection
$sql = "SELECT dashorders.ID,admin.username,dashorders.CName,dashorders.Location,dashorders.Governorate,dashorders.Phone,dashorders.Phone2,products.ArName,products.Photo,dashorderdata.Count,dashorderdata.Price,dashorders.SubTotal,dashorders.Shipping,dashorders.TotalPrice,dashorders.Status,dashorders.Date,dashorders.Note FROM dashorders INNER JOIN dashorderdata on dashorderdata.OID=dashorders.ID INNER JOIN products on dashorderdata.PID=products.ID INNER JOIN admin on admin.ID=dashorders.AID WHERE dashorders.Date like '%$Date%'";
//select database
//@mysqli_query($sql,$Conn->datacon()) or die("Couldn't execute query:<br>" . mysqli_error($Conn->datacon()));
//execute query
$result = $Conn->datacon()->query($sql);
// $file_ending = "xls";
// //header info for browser
// header("Content-Type: application/xls");
// header("Content-Disposition: attachment; filename=$Date.xls");
// header("Pragma: no-cache");
// header("Expires: 0");


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
            echo('الموظف');
            ?>
        </th><th>
            <?php
            echo('اسم العميل');
            ?>
        </th><th>
            <?php
            echo('العنوان');
            ?>
        </th><th>
            <?php
            echo('المحافظة');
            ?>
        </th><th>
            <?php
            echo('رقم التليفون ');
            ?>
        </th><th>
            <?php
            echo('رقم التليفون الاخر');
            ?>
        </th><th>
            <?php
            echo('المنتج');
            ?>
        </th><th>
            <?php
            echo('المنتج');
            ?>
        </th><th>
            <?php
            echo('العدد');
            ?>
        </th><th>
            <?php
            echo('سعر المنتج ');
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
        </th><th>
            <?php
            echo('الملحوظة');
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
            echo $row['username'];
            ?>
        </td><td>
            <?php
            echo $row['CName'];
            ?>
        </td><td>
            <?php
            echo $row['Location'];
            ?>
        </td><td>
            <?php
            echo $row['Governorate'];
            ?>
        </td><td>
            <?php
            echo $row['Phone'];
            ?>
        </td><td>
            <?php
            echo $row['Phone2'];
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
            echo $row['Price'];
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
        </td><td>
            <?php
            echo $row['Note'];
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