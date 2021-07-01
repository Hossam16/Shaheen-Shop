<?php include 'config.php'?>
<?php include "StartSession.php" ;
?>
<?php
if(isset($_POST['Cancell']))
{
    $conn = new config();
    $ID=$_POST['OID'];
    $sql = "UPDATE orders SET Status='Canceled' WHERE ID ='$ID'";
    mysqli_query($conn->datacon(),$sql);
} 
?>
<?php
include 'User.php';
$UData = User::GetUSerData($uid);
while ($rowud = $UData->fetch_assoc())
{
    $fname = $rowud['FName'];
    $lname = $rowud['LName'];
    $mobile = $rowud['Phone'];
    $mail = $rowud['Mail'];
    $governorate = $rowud['Governorate'];
    $location = $rowud['Location'];
    $username = $rowud['UserName'];
    $oldpassword = $rowud['Password'];
    $usernamee = $rowud['UserName'];
    $gender = $rowud['Gender'];
}
?>

<?php
$connorder =new config();
$sqlorder= "SELECT ID,Status FROM orders WHERE UID=$uid order BY ID DESC;";
$resultorder = $connorder->datacon()->query($sqlorder);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Shaheen Center</title>
    <link href="css/all.css" rel="stylesheet">
    <link href="css/fontawesome.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.ar.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main_ar.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="icon" href="images/home/tab.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>
<body>
<?php include 'header_ar.php'?>

<?php while ($roworder = $resultorder->fetch_assoc() ){
    $oid = $roworder['ID'];
    $sqlorderd= "SELECT products.* ,sum(orderdata.Count) AS Count, orderdata.PPrice FROM orderdata INNER JOIN products on orderdata.PID = products.ID WHERE OID =$oid GROUP by products.ID";
    $resultorderd = $connorder->datacon()->query($sqlorderd);
    ?>
<section id="cart_items" style="direction: rtl;">
    <div class="container">
        <div class="table-responsive cart_info">
            <table class="table table-condensed" style="text-align: center;">
                <thead>
			
					<tr class="cart_menu" style="background-color: #2a57a5">
                    <td class="image" colspan="2">رقم الطلب: <?php echo $roworder['ID']?></td>
                    <td class="price" colspan="2">الحالة : <?php
                        if ( strtolower($roworder['Status']) =='new')
                        {
                            echo "جديد";
                        }
                        elseif($roworder['Status']=='In Prograss')
                        {
                            echo "تحت التجهيز";
                        }
                        elseif($roworder['Status']=='In Delivery')
                        {
                            echo "جاري التوصيل";
                        }
                         elseif($roworder['Status']=='Canceled')
                        {
                            echo "تم الألغاء";
                        }
                        else
                        {
                            echo "تم التوصيل";
                        }
                        ?></td>
                    <td class="quantity">
						<?php if($roworder['Status']=='Canceled' or $roworder['Status']=='In Prograss' or $roworder['Status']=='In Delivery'){} else {
  ?>
                    <form method="post">
                        <input hidden="true" value="<?php echo $roworder['ID']; ?>" name="OID">
                    <button type="submit"  style="float: left; width: 100%;background: none; border: 0; color: white; font-weight: bold;" name="Cancell"><i class="far fa-window-close"></i> الغاء الطلب</button>
                    </form>
                    <?php }?>
						</td>
                </tr>
                <tr class="cart_menu" style="text-align: center">
                    <td class="image" colspan="2">القطعة</td>
                    <td class="price">السعر</td>
                    <td class="quantity">الكمية</td>
                    <td class="total">المجموع</td>
                </tr>

                </thead>

                <tbody>
                <?php while ($roworderd = $resultorderd->fetch_assoc()){ ?>
                <tr>
                    <td class="cart_product">
                        <a href=""><img style="width: 110px;height: 110px" src="images/home/<?php echo $roworderd['Photo'];?>" alt=""></a>
                    </td>
                    <td class="cart_description">
                        <h4><a href=""><?php echo $roworderd['ArName'];?></a></h4>
                        <p>Web ID: <?php echo $roworderd['ID'];?></p>
                    </td>
                    <td class="cart_price">
                        <p><?php echo $roworderd['PPrice'];?></p>
                    </td>
                    <td class="cart_quantity">
                        <div class="cart_quantity_button">
                            <input class="cart_quantity_input" type="text" name="quantity" value="<?php echo $roworderd['Count']?>" autocomplete="off" size="2" disabled="">
                        </div>
                    </td>
                    <td class="cart_total">
                        <p class="cart_total_price"><?php echo ($roworderd['PPrice']*$roworderd['Count'])?></p>
                    </td>
                </tr>
                <?php } ?>
                </tbody>

            </table>
        </div>
    </div>
</section> <!--/#cart_items-->
<?php }?>


<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/price-range.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/main.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


<div> <?php include 'brandslider_ar.php'?></div>
<?php include 'footer_ar.php'?>



</body>
</html>