<?php include 'config.php'?>
<?php include "StartSession.php" ;
?>
<?php
$connO =new config();
$sqlO = "SELECT * FROM orders WHERE UID=$uid";
$resultO = $connO->datacon()->query($sqlO);
while ($rowO = $resultO->fetch_assoc())
{
    $oid = $rowO['ID'];
    $location = $rowO['Location'];
    $governorate = $rowO['Governorate'];
    $phone = $rowO['Phone'];
    $subtotal = $rowO['SubTotal'];
    $totalo = $rowO['Shipping'];
    $totalprice = $rowO['TotalPrice'];
    $date = $rowO['Date'];
    $edate = strtotime($date.' + 3 days');
    $edate = date('Y-F-d',$edate );
}
?>
<?php
$connOD =new config();
$oid = mysqli_real_escape_string($connO->datacon(),$oid);
$sqlOD = "SELECT products.*,orderdata.PPrice, SUM(orderdata.Count) As Count FROM products INNER JOIN orderdata on products.ID=orderdata.PID WHERE orderdata.OID ='$oid' GROUP BY ID;";
$resultOD = $connOD->datacon()->query($sqlOD);
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

    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
				
                <ol class="breadcrumb">
                    <li>Home</li>
                    <li class="active"><a href="index_en.php">Order Summary</a></li>
                </ol>
            </div>
			    <div class="heading" style="text-align: center;margin-bottom: 20px">
                <h3>Thanks for your trust in Shaheen Center. <i class="fas fa-hands-helping"></i></h3>
                <p><i class="far fa-calendar-alt"></i>   Your Order Date is: <?php echo $date;?></p>
                <p><i class="fas fa-truck-loading"></i> Expected Delivery Date: <?php echo $edate;?></p>
                <p><i class="fas fa-barcode"></i> Your Order ID is: <?php echo $oid;?></p>
                <p>You Will Receive an Order Confirmation Call Within 24 hours.</p>
            </div>	
            <div class="table-responsive cart_info">
                <table class="table table-condensed" style="margin-bottom: 0px;">
					<style>
							 @media only screen and (min-width: 600px) {
								#center
								 {
									 text-align: center;
								 }
							}
						</style>
                    <thead id="center" style="text-align: center;">
                    <tr class="cart_menu">
                        <td class="image" colspan="2">Item</td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody id="center">
                    <?php while ($rowOD = $resultOD->fetch_assoc())
                    {
                    ?>

                        <tr>
                            <td class="cart_product">
                                <a href=""><img style="width: 110px; height: 110px;" src="images/home/<?php echo $rowOD['Photo'];?>" alt=""></a>
                            </td>
                            <td class="cart_description"  style="border: 0; border-left: 1px;border-right: 1px; border-style: inset;">
                                <h4><a href=""></a><?php echo $rowOD['Name'];?></h4>
                                <p>Web ID :<?php echo $rowOD['ID'];?> </p>
                            </td>
                            <td class="cart_price"  style="border: 0; border-left: 1px;border-right: 1px; border-style: inset;">
                                <p><?php echo $rowOD['PPrice'];?> LE</p>
                            </td>
                            <td class="cart_quantity"  style="border: 0; border-left: 1px;border-right: 1px; border-style: inset;">
                                <div class="cart_quantity_button">
                                        <input style="width: 100%;" class="cart_quantity_input" type="text" name="quantity" value="<?php echo $rowOD['Count'];?>" autocomplete="off" size="2" disabled>
                                </div>
                            </td>
                            <td class="cart_total">

                                <p class="cart_total_price"><?php echo ($rowOD['PPrice']*$rowOD['Count']);?></p>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->

    <section id="do_action">
        <div class="container">
            <div class="row">
<div class="col-sm-12">
    <div class="total_area">
        <ul>
            <li>Cart Sub Total <span><?php echo $subtotal;?> LE</span></li>
            <li>Shipping Cost <span><?php echo $totalo;?> LE</span></li>
            <li style="color: #e81f25; font-weight: bold;">Total To Be collect<span style="color: #e81f25; font-weight: bold;"><?php echo $totalprice;?> LE</span></li>
        </ul>
    </div>
</div>
</div>
</div>
</section><!--/#do_action-->


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