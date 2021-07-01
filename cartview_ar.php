<?php include 'config.php' ?>
<?php include "StartSession.php";
?>
<?php
include 'User.php';
$UData = User::GetUSerData($uid);
while ($rowud = $UData->fetch_assoc()) {
    $location = $rowud['Location'];
    $governorate = $rowud['Governorate'];
    $phone = $rowud['Phone'];
    $uname = $rowud['FName'];
}

?>
<?php
if (isset($_POST['DeletFromCart'])) {
    $PIDTODELETE = $_POST['pid'];
    include 'Cart.php';
    Cart::DeleteFromCart($PIDTODELETE);
}
if (isset($_POST['UpdateCart'])) {
    $PIDTOUpdate = $_POST['pid'];
    $NewQ = $_POST['quantity'];
    include 'Cart.php';
    Cart::UpdateCount($PIDTOUpdate, $NewQ);
}
if (isset($_POST['UpdateAll'])) {
    $PIDTOUpdate = $_POST['pid'];
    $NewQ = $_POST['quantity'];
    include 'Cart.php';
    Cart::UpdateCount($PIDTOUpdate, $NewQ);
}
if (isset($_POST['CheckOut'])) {
    $PIDTOUpdate = $_POST['pid'];
    $NewQ = $_POST['quantity'];
    include 'Cart.php';
    Cart::UpdateCount($PIDTOUpdate, $NewQ);
}
if (isset($_POST['UpdateInfo']) or isset($_POST['CheckOut'])) {
    $governorate = $_POST['city'];
    $location = $_POST['flocation'];
    $phone = $_POST['mobile'];
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
    <link href="css/fontawesome.min.ar.css" rel="stylesheet">
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

<body style="direction: rtl;">

    <?php include 'header_ar.php' ?>
    <?php include "shipping.php" ?>

    <?php
    $conn79 = new config();
    $sql79 = "SELECT products.ID,products.ArName,products.Stock,products.Price,products.BSale,products.SalePrice,products.MaxAmount,products.Photo,products.Status,products.Size,cart.id as CID,SUM(cart.Count) AS Count,cart.Date FROM products INNER JOIN cart on products.ID=cart.PID where cart.UID='$uid' GROUP BY products.ID;";
    $result79 = $conn79->datacon()->query($sql79);
    if (mysqli_num_rows($result79) == 0) {
        $Cart = 1;
    }
    ?>
    <form method="post">
        <section id="cart_items">
            <div class="container">
                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li>الرئيسية</li>
                        <li><a href="index_en.php">العربة</a></li>
                    </ol>
                </div>
                <div class="table-responsive cart_info">
                    <table class="table table-condensed" style="margin-bottom: 0px; text-align: center;">
                        <style>
                            @media only screen and (min-width: 600px) {
                                #center {
                                    text-align: center;
                                }
                            }
                        </style>
                        <thead id="center" style="text-align: center;">
                            <tr class="cart_menu">
                                <td class="image" colspan="2">القطعة</td>
                                <td class="price">السعر</td>
                                <td class="quantity">الكمية</td>
                                <td class="total">المجموع</td>
                                <td></td>
                            </tr>
                        </thead>
                        <style>
                            @media only screen and (min-width: 600px) {
                                #center {
                                    text-align: center;
                                }
                            }
                        </style>
                        <tbody id="center">
                            <?php $subtotal = 0;
                            while ($row79 = $result79->fetch_assoc()) {
                            ?>
                                <tr style="border-bottom: 1px; border-bottom-style: inset;">
                                    <td class="cart_product">
                                        <a href=""><img style="width: 110px; height: 110px;" src="images/home/<?php echo $row79['Photo'] ?>" alt=""></a>
                                    </td>
                                    <td class="cart_description" style="border: 1px; border-style: inset;">
                                        <h4><a href=""><?php echo $row79['ArName'] ?></a></h4>
                                        <p>Web ID : <?php echo $row79['ID']; ?></p>
                                    </td>
                                    <td class="cart_price" style="border: 1px; border-style: inset;">
                                        <?php if ($row79['BSale'] == 1) { ?>
                                            <p><?php echo $row79['SalePrice'] ?> جنية </p>
                                        <?php } else { ?>
                                            <p>جنية <?php echo $row79['Price'] ?> جنية </p>
                                        <?php  } ?>
                                    </td>
                                    <td class="cart_quantity" style="border: 1px; border-style: inset; width: 100px;">
                                        <div class="cart_quantity_button">

                                            <form method="post">
                                                <input type="hidden" name="pid" value="<?php echo $row79['CID'] ?>" />
                                                <input class="cart_quantity_input" type="number" min="1" name="quantity" value="<?php echo $row79['Count'] ?>" autocomplete="off" size="2" style="width: 100%;">
                                                <button type="submit" class="btn btn-default update" name="UpdateAll" style="display: none;">Update</i></button>
                                            </form>
                                        </div>
                                    </td>
                                    <td class="cart_total" style="border: 1px; border-style: inset;">
                                        <?php
                                        // $ProductID = $row79['ID'];
                                        // $sqlOfferPrice = "SELECT * FROM OffersProducts INNER JOIN Offers on Offers.ID=OffersProducts.OID WHERE Offers.EndDate>DATE_ADD(now(),interval 2 hour) AND OffersProducts.PID=$ProductID";
                                        // $resultOfferPrice = $conn79->datacon()->query($sqlOfferPrice);
                                        // if($resultOfferPrice->fetch_assoc() != null)
                                        // {
                                        //     if ($resultOfferPrice['BSale'] == 1) {
                                        //         $psubtotal = $resultOfferPrice['SalePrice'] * $row79['Count'];
                                        //     } else {
                                        //         $psubtotal = $row79['Price'] * $row79['Count'];
                                        //     }
                                        // }
                                        ?>
                                        <?php
                                        if ($row79['BSale'] == 1) {
                                            $psubtotal = $row79['SalePrice'] * $row79['Count'];
                                        } else {
                                            $psubtotal = $row79['Price'] * $row79['Count'];
                                        }
                                        ?>
                                        <p class="cart_total_price"><?php echo $psubtotal ?></p>
                                    </td>
                                    <td class="cart_delete">
                                        <form method="post">
                                            <input type="hidden" name="pid" value="<?php echo $row79['CID'] ?>" />
                                            <button style="border-radius: 10px;border: 1px;" type="submit" class="cart_quantity_delete" name="DeletFromCart"><i class="fa fa-times"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php $subtotal = $psubtotal + $subtotal;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!--/#cart_items-->

        <section id="do_action">
            <div class="container">
                <div class="heading" style="text-align: center;margin-bottom: 45px;">
                    <h3>ماذا ستفعل بعد ذلك !</h3>
                    <p>اختر ما إذا كان لديك رمز خصم أو نقاط مكافأة تريد استخدامها</p>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="chose_area" style="padding: 15px;padding-bottom: 2px;">
                            <div style="text-align-last: center;">
                                <ul class="user_info" style="padding: 0px;margin-top: 0px;text-align: center">
                                    <p style="margin-bottom: 0px;">أهلا <?php echo $uname; ?> اذا كنت تريد تغير معلومات طلبك </p>
                                </ul>
                                <ul class="user_info" style="padding: 0px;text-align: center">
                                    <style>
                                        @media only screen and (max-width: 600px) {
                                            #single_field {
                                                width: 100% !important;
                                            }
                                        }
                                    </style>
                                    <li id="single_field" class="single_field" style="width: 49%;margin:0;">
                                        <label>المحافظة :</label>
                                        <select name="city" onchange="hhhh();" style="text-align: center ;width: 100%; height:38px;">
                                            <option value="<?php echo $governorate; ?>"><?php echo $governorate; ?></option>
                                            <option value='Cairo'>القاهرة</option>
                                            <option value='Giza'>الجيزة</option>
                                            <option value='Alexandria'>الأسكندرية</option>
                                            <option value='Suez'>السويس</option>
                                            <option value='Port Said'>بورسعيد</option>
                                            <option value='Ismailia'>الإسماعيلية</option>
                                            <option value='Damietta'>دمياط</option>
                                            <option value='Beheira'>البحيرة</option>
                                            <option value='Dakahlia'>الدهقلية</option>
                                            <option value='Gharbia'>الغربية</option>
                                            <option value='Kafr El Sheikh'>كفرالشيخ</option>
                                            <option value='Matruh'>مطروح</option>
                                            <option value='Monufia'>المنوفية</option>
                                            <option value='Qalyubia'>القليوبية</option>
                                            <option value='Sharqia'>الشرقية</option>
                                            <option value='North Sinai'>شمال سيناء</option>
                                            <option value='South Sinai'>جنوب سيناء</option>
                                            <option value='New Valley'>الوادي الجديد</option>
                                            <option value='Red Sea'>البحر الاحمر</option>
                                            <option value='Faiyum'>الفيوم</option>
                                            <option value='Minya'>المنيا</option>
                                            <option value='Qena'>قنا</option>
                                            <option value='Beni Suef'>بني سويف</option>
                                            <option value='Asyut'>أسيوط</option>
                                            <option value='Sohag'>سوهاج</option>
                                            <option value='Luxor'>الأقصر</option>
                                            <option value='Aswan'>أسوان</option>
                                        </select>

                                    </li>
                                    <li id="single_field" class="single_field" style="width: 50%; margin: 0;">
                                        <label>رقم الهاتف :</label>
                                        <input style="text-align: center;width: 100%; height:38px;" type="text" name="mobile" value="<?php echo $phone; ?>">

                                    </li>
                                </ul>
                                <ul class="user_info" style="padding: 0px;text-align: center">
                                    <li class="single_field" style="width: 100%">
                                        <label>العنوان :</label>
                                        <input style="text-align: center" type="text" name="flocation" value="<?php echo $location; ?>">

                                    </li>
                                </ul>
                                <ul class="user_info" style="padding: 0px;text-align: center">
                                    <li class="single_field" style="width: 100%">
                                        <label>ملاحظة :</label>
                                        <textarea style="text-align: center" rows="4" cols="50"></textarea>
                                    </li>
                                </ul>
                                <ul class="single_field" style="padding: 0px;display:none;text-align: center">
                                    <li>
                                        <button type="submit" class="btn btn-default update" name="UpdateInfo" id="myCheck" style="margin-left: 0;">Update Iformation</i></button>
                                    </li>
                                </ul>
                            </div>
                            <div class="total_area" style="border: 0px;padding: 0px;">
                                <ul style="padding: 0px;">
                                    <li>سعر المنتجات<span><?php echo $subtotal; ?> جنية</span></li>

                                    <li>تكلفة الشحن<span><?php echo $total; ?> جنية</span></li>
                                    <li style="color: #e81f25;
    font-weight: bold;">المجموع <span><?php $ftotal = $subtotal + $total;
                                        echo ($ftotal) ?> جنية</span></li>
                                </ul>
                                <script>
                                    function payment1() {
                                        document.getElementById("button2").style.display = "unset";
                                        document.getElementById("button3").style.display = "none";
                                        document.getElementById("button4").style.display = "none";
                                    }

                                    function payment2() {
                                        document.getElementById("button3").style.display = "unset";
                                        document.getElementById("button2").style.display = "none";
                                        document.getElementById("button4").style.display = "none";
                                    }

                                    function payment3() {
                                        document.getElementById("button4").style.display = "unset";
                                        document.getElementById("button3").style.display = "none";
                                        document.getElementById("button2").style.display = "none";
                                    }
                                </script>
                                <ul style="padding-right: 0px;margin-top: 70px;">
                                    <div style="text-align: -webkit-center;">
                                        <table>
                                            <tr>
                                                <td style="width:50px;">
                                                    <input type="radio" name="payment" style="width: 15px;height:15px;" onclick="payment1()" <?php if ($Cart == 1) {
                                                                                                                                                    echo "disabled";
                                                                                                                                                } ?>>
                                                </td>
                                                <td>
                                                    <label style="font-size:19px;;">الدفع عند الأستلام</label>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="radio" name="payment" style="width: 15px;height:15px;" onclick="payment2()" <?php if ($Cart == 1) {
                                                                                                                                                    echo "disabled";
                                                                                                                                                } ?>>
                                                </td>
                                                <td>
                                                    <label style="font-size:19px;;"><img src="images/payment.png" style="width: 120px;"></label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="radio" name="payment" style="width: 15px;height:15px;" onclick="payment3()" <?php if ($Cart == 1) {
                                                                                                                                                    echo "disabled";
                                                                                                                                                } ?>>
                                                </td>
                                                <td>
                                                    <label style="font-size:19px;;"><img src="images/amanlogo.png" style="width: 70px;border:1px;border-radius:10px;"> تقسيط</label>
                                                </td>
                                            </tr>
                                        </table>

                                        <br>

                                        <br>

                                    </div>
                                </ul>
                                <div style="text-align: center;">
                                    <button id="button1" type="submit" class="btn btn-default update" name="UpdateAll" style="margin-bottom: 5px; width: 170px;" <?php if ($Cart == 1) {
                                                                                                                                                                        echo "disabled";
                                                                                                                                                                    } ?>>تحديث المعلومات</i></button>
                                    <button id="button2" type="submit" class="btn btn-default update" name="CheckOutCash" style="margin-bottom: 5px; width: 170px;display:none;">أستكمال الطلب</i></button>
                                    <button id="button3" type="submit" class="btn btn-default update" name="CheckOutVisa" style="margin-bottom: 5px; width: 170px;display:none;">أستكمال الطلب</i></button>
                                    <button id="button4" type="submit" class="btn btn-default update" name="CheckOutAman" style="margin-bottom: 5px; width: 170px;display:none;">أستكمال الطلب</i></button>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/#do_action-->
    </form>

    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


    <div style="direction: ltr;"> <?php include 'brandslider_ar.php' ?></div>
    <?php include 'footer_ar.php' ?>


    <?php
    if (isset($_POST['CheckOutCash'])) {
        $ftotal = $subtotal + $total;
        $flocation = $_POST['flocation'];
        $fcity = $_POST['city'];
        $mobile = $_POST['mobile'];
        include 'Order.php';
        $newo = new Order($uid, $flocation, $fcity, $mobile, $subtotal, $total, $ftotal, 'new');
        $newo->AddToOrder();
        echo "<script type=\"text/javascript\">
window.location = \"checkout_ar.php\"
</script>";
    }
    ?>

    <?php
    if (isset($_POST['CheckOutVisa'])) {
        $ftotal = $subtotal + $total;
        $flocation = $_POST['flocation'];
        $fcity = $_POST['city'];
        $mobile = $_POST['mobile'];
        include 'Order.php';
        $newo = new Order($uid, $flocation, $fcity, $mobile, $subtotal, $total, $ftotal, 'new');
        $orderID = $newo->AddToOrderVisa();
        echo "<script type=\"text/javascript\">
window.location = \"VisaInfo.php?orderID=$orderID\"
</script>";
    }
    if (isset($_POST['CheckOutAman'])) {
        $ftotal = $subtotal + $total;
        $flocation = $_POST['flocation'];
        $fcity = $_POST['city'];
        $mobile = $_POST['mobile'];
        include 'Order.php';
        $newo = new Order($uid, $flocation, $fcity, $mobile, $subtotal, $total, $ftotal, 'new');
        $newo->AddToOrderAman();
        echo "<script type=\"text/javascript\">
window.location = \"checkout_ar.php\"
</script>";
    }
    ?>

    <script>
        function hhhh() {
            document.getElementById("myCheck").click();
        }
    </script>



</body>

</html>