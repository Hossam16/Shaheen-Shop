<?php include 'config.php'?>
<?php include "StartSession.php" ;
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
if(isset($_POST['Cancell']))
{
    include 'Order.php';
    $OID = $_POST['OID'];
    Order::Cancel($OID);
}
?>

<?php
$connorder =new config();
$sqlorder= "SELECT ID,Status FROM orders WHERE UID='$uid' order BY ID DESC;";
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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
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
<?php include 'header.php'?>

<?php while ($roworder = $resultorder->fetch_assoc() ){
    $oid = $roworder['ID'];
    $sqlorderd= "SELECT products.* , sum(orderdata.Count) AS Count, orderdata.PPrice AS PPrice FROM orderdata INNER JOIN products on orderdata.PID = products.ID WHERE OID ='$oid' GROUP by products.ID";
    $resultorderd = $connorder->datacon()->query($sqlorderd);
    ?>
<section id="cart_items">
    <div class="container">
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead style="text-align: center;">
					<style>
						@media only screen and (max-width: 600px) {
							#of{
								width: 806px !important;
							}
						}
					</style> 
                <div style="width: 1138px; height: 51px; background: #2a57a5; padding: 10px; padding-right:40px;color: white;" id="of">
                    <h4 style="float: left; width: 40%">Order ID: <?php echo $roworder['ID']?></h4>
                    <h4 style="float: left; width: 40%">Status : <?php echo $roworder['Status']?></h4>
                    <?php if($roworder['Status']=='Canceled' or $roworder['Status']=='In Prograss' or $roworder['Status']=='In Delivery'){} else {
  ?>
                    <form method="post">
                        <input hidden="true" value="<?php echo $roworder['ID']; ?>" name="OID">
                    <button type="submit"  style="float: right; width: 11%;background: none; border: 0; color: white; font-weight: bold;" name="Cancell"><i class="far fa-window-close"></i> Cancel Order</button>
                    </form>
                    <?php }?>
                </div>
                <tr class="cart_menu">
                    <td class="image" colspan="2">Item</td>
                    <td class="price">Price</td>
                    <td class="quantity">Quantity</td>
                    <td class="total">Total</td>
                    <td></td>
                </tr>

                </thead>

                <tbody style="text-align: center;">
                <?php while ($roworderd = $resultorderd->fetch_assoc()){ ?>
                <tr>
                    <td class="cart_product">
                        <a  href=""><img style="width: 110px;height: 110px" src="images/home/<?php echo $roworderd['Photo'];?>" alt=""></a>
                    </td>
                    <td class="cart_description">
                        <h4><a href=""><?php echo $roworderd['Name'];?></a></h4>
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


<div> <?php include 'brandslider.php'?></div>
<?php include 'footer.php'?>



</body>
</html>