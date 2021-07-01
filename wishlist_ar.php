<?php include 'config.php'?>
<?php include "StartSession.php" ;?>
<?php
if (isset($_POST['DeletFromWish']))
{
    $PIDTODELETE = $_POST['pid'] ;
    include 'Wish_list.php';
    Wish_list::DeleteFromWish($PIDTODELETE);
}
if (isset($_POST['AddToCart']))
{
    $conn = new config();
    include 'Cart.php';
        $pid = mysqli_real_escape_string($conn->datacon(), $_POST['PID']);
        $cart = new Cart($uid, $pid, 1);
        $cart->AddToCart();
        echo "<script type=\"text/javascript\">
window.location = \"cartview_ar.php\"
</script>";
}
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

<?php
$conn797 =new config();
$sql797= "SELECT products.*, products.id AS PID , wishlist.ID AS CID FROM products INNER JOIN wishlist on wishlist.PID = products.ID WHERE wishlist.UID='$uid'";
$result797 = $conn797->datacon()->query($sql797);
?>

    <section id="cart_items" style="direction: rtl;">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li>الرئيسية</li>
                <li class="active"><a href="#">المفضلة <i class="fas fa-star"></i></a></li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed" style="margin: 0px;">
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
                    <td class="image" colspan="2">القطعة</td>
                    <td class="price">السعر</td>
                    <td class="price">أزالة</td>
                    <td class="price">أضف الي العربه</td>
                    <td></td>
                </tr>
                </thead>
                <tbody id="center">
                <?php while($row797 = $result797->fetch_assoc())
                {
                ?>
                <tr>
                    <td class="cart_product">
                        <a href=""><img style="width: 110px; height: 110px;" src="images/home/<?php echo $row797['Photo']?>" alt=""></a>
                    </td>
                    <td class="cart_description" style="border: 0; border-left: 1px;border-right: 1px; border-style: inset;">
                        <h4><a href=""><?php echo $row797['ArName']?></a></h4>
                        <p>Web ID : <?php echo $row797['PID'] ?></p>
                    </td>
                    <td class="cart_price" style="border: 0; border-left: 1px;border-right: 1px; border-style: inset;">
                        <p><?php  echo $row797['Price']?> جنية</p>
                    </td>
                    <td class="cart_delete" style="text-align: center">
                        <form method="post">
                            <input type="hidden" name="pid" value="<?php echo $row797['CID']?>" />
                            <button style=" border: 1px; border-radius: 10px;" type="submit" class="cart_quantity_delete" name="DeletFromWish"><i class="fas fa-times"></i></button>
                        </form>
                    </td>
                    <td style="border: 0;border-right: 1px; border-style: inset; text-align:center;">
                        <form method="post">
                            <input type="hidden" name="PID" value="<?php echo $row797['ID']?>" />
                            <button style=" border: 1px; border-radius: 10px;" type="submit" class="cart_quantity_delete" name="AddToCart"><i class="fa fa-shopping-cart"></i></button>
                        </form>
                    </td>
                    
                </tr>
                <?php }?>



                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->

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