<?php

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if (strpos($actual_link, 'center')) {
    $actual_link = str_replace("center", "shop", $actual_link);
    header("Location:  $actual_link");
}

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<?php include 'config.php' ?>
<?php include "StartSession.php";
$max = 50000;
$mini = 0;
?>
<?php if (isset($_POST['pp'])) {
    $pricerange = explode(",", $_POST['pp']);
    $mini = $pricerange[0];
    $max = $pricerange[1];
}
?>
<?php
$SST = 0;
if (isset($_GET['ID'])) {
    $sid = $_GET['ID'];

    $connhhh = new config();
    $sqlhhh = "SELECT nheader.ID FROM nheader INNER JOIN ncat ON ncat.headerid=nheader.ID  WHERE ncat.ID='$sid'";
    $resulthhh = $connhhh->datacon()->query($sqlhhh);
    while ($rowhhh = $resulthhh->fetch_assoc()) {
        $hid = $rowhhh['ID'];
    }

    $conn88 = new config();
    $sid = mysqli_real_escape_string($conn88->datacon(), $sid);
    $sql88 = "SELECT catar FROM ncat where ID='$sid'";
    $result88 = $conn88->datacon()->query($sql88);
    while ($row88 = $result88->fetch_assoc()) {
        $ncat = $row88['catar'];
    }
    $conn45 = new config();
    $sql45 = "SELECT pro.* FROM products pro INNER JOIN nsub s on pro.SID=s.ID INNER JOIN ncat h on s.catid=h.ID where pro.Stock!=0 AND s.catid='$sid' AND pro.Price>='$mini' AND pro.Price<='$max' AND pro.Status=1";
    $result45 = $conn45->datacon()->query($sql45);
    $SST = 1;
}

if (isset($_GET['SID'])) {
    $sid = $_GET['SID'];
    if ($sid == 74) {
        $hid = '74';
    } elseif ($sid == 76) {
        $hid = '76';
    } elseif ($sid == 78) {
        $hid = '78';
    } elseif ($sid == 79) {
        $hid = '79';
    } elseif ($sid == 55) {
        header('Location: https://shaheen.center/shop_ar.php?Free=1');
    } else {
        $connhhh = new config();
        $sid = mysqli_real_escape_string($connhhh->datacon(), $sid);
        $sqlhhh = "SELECT nheader.ID FROM nheader INNER JOIN ncat ON ncat.headerid=nheader.ID INNER JOIN nsub ON nsub.catid=ncat.id WHERE nsub.ID='$sid'";
        $resulthhh = $connhhh->datacon()->query($sqlhhh);
        while ($rowhhh = $resulthhh->fetch_assoc()) {
            $hid = $rowhhh['ID'];
        }
    }

    $conn88 = new config();
    $sid = mysqli_real_escape_string($conn88->datacon(), $sid);
    $sql88 = "SELECT subar FROM nsub where ID='$sid'";
    $result88 = $conn88->datacon()->query($sql88);
    while ($row88 = $result88->fetch_assoc()) {
        $ncat = $row88['subar'];
    }
    $conn45 = new config();
    $sql45 = "SELECT * FROM products where products.Stock!=0 AND SID='$sid' AND Price>='$mini' AND Price<='$max' AND products.Status=1";
    $result45 = $conn45->datacon()->query($sql45);
    $SST = 1;
}
if (isset($_GET['HID'])) {
    $sid = $_GET['HID'];
    $hid = $sid;
    $conn88 = new config();
    $sid = mysqli_real_escape_string($conn88->datacon(), $sid);
    $sql88 = "SELECT * FROM nheader where ID='$sid'";
    $result88 = $conn88->datacon()->query($sql88);
    while ($row88 = $result88->fetch_assoc()) {
        $ncat = $row88['headerar'];
    }
    $conn45 = new config();
    $sql45 = "SELECT pro.*FROM products pro INNER JOIN nsub s on pro.SID=s.ID INNER JOIN ncat h on s.catid=h.ID INNER JOIN nheader on h.headerid=nheader.ID where pro.Stock!=0 AND nheader.ID='$sid' AND pro.Price>='$mini' AND pro.Price<='$max' AND pro.Status=1";
    $result45 = $conn45->datacon()->query($sql45);
    $SST = 1;
}
if (isset($_GET['Free'])) {
    $ncat = 'الشحن المجاني';
    $hid = 6;
    $conn45 = new config();
    $sql45 = "SELECT * from products WHERE products.Stock!=0 AND size='Free' AND Price>='$mini' AND Price<='$max' AND products.Status=1";
    $result45 = $conn45->datacon()->query($sql45);
    $SST = 1;
}
if (isset($_GET['Offers'])) {
    if (isset($_GET['Page']) && $_GET['Page'] > 1) {
        $offset = ($_GET['Page'] - 1) * 60;
    } else {
        $offset = 0;
    }
    $conn00 = new config();
    $sql00 = 'SELECT * FROM nheader where ID=7';
    $result00 = $conn00->datacon()->query($sql00);
    while ($row00 = $result00->fetch_assoc())
        $offer = $row00['headerar'];

    $ncat = $offer;
    $hid = 7;
    $conn45 = new config();
    $sql45 = "SELECT products.*,nsub.id AS SSID,ncat.ID CATID,nheader.id AS HEADID from products INNER JOIN nsub on nsub.ID=products.SID INNER JOIN ncat on ncat.ID=nsub.catid INNER JOIN nheader on nheader.id = ncat.headerid WHERE BSale=1 AND products.Stock!=0 AND products.SID!=74 AND products.SID!=76 AND products.SID!=78 AND products.SID!=79 AND products.Status=1 ORDER BY HEADID,CATID,SSID LIMIT 60 OFFSET $offset";
    $result45 = $conn45->datacon()->query($sql45);

    $sql = "SELECT products.*,nsub.id AS SSID,ncat.ID CATID,nheader.id AS HEADID from products INNER JOIN nsub on nsub.ID=products.SID INNER JOIN ncat on ncat.ID=nsub.catid INNER JOIN nheader on nheader.id = ncat.headerid WHERE BSale=1 AND products.Stock!=0 AND products.SID!=74 AND products.SID!=76 AND products.SID!=78 AND products.SID!=79 AND products.Status=1 ORDER BY HEADID,CATID,SSID";
    $result = $conn45->datacon()->query($sql);
    $rowss = mysqli_num_rows($result);
    $SST = 1;
}
if (isset($_GET['search'])) {
    $ncat = $_GET['search'];
    $hid = 7;
    $conn45 = new config();
    $ncat = mysqli_real_escape_string($conn45->datacon(), $ncat);
    $sql45 = "SELECT * from products WHERE (products.Stock!=0) AND (products.Status=1) AND (products.photo like '%$ncat%' or products.ArName like '%$ncat%' or products.ArDesc like '%$ncat%')";
    $result45 = $conn45->datacon()->query($sql45);
    $SST = 1;
}
if (isset($_GET['Golden'])) {
    $hid = 'Golden';
    $conn45 = new config();
    $ncat = mysqli_real_escape_string($conn45->datacon(), $ncat);
    $sql45 = "SELECT * FROM `products` WHERE products.Schedule=1 AND products.Status = 1";
    $result45 = $conn45->datacon()->query($sql45);
    $SST = 1;
}
if (isset($_GET['Promo'])) {
    $ncat = 'الساعة الذهبية';
    $hid = 'Golden';
    $promo = $_GET['Promo'];
    $conn45 = new config();
    $ncat = mysqli_real_escape_string($conn45->datacon(), $ncat);
    // $sql45 = "SELECT products.*,OffersProducts.BSale,OffersProducts.SalePrice FROM products INNER JOIN OffersProducts on OffersProducts.PID=products.ID INNER JOIN Offers on Offers.ID=OffersProducts.OID WHERE products.Status=1 AND products.Stock>0 AND Offers.ID=$promo AND Offers.EndDate>DATE_ADD(now(),interval 2 hour)";
    $sql45 = "SELECT products.* FROM products INNER JOIN Offers on Offers.ID=products.Schedule WHERE products.Status=1 AND products.Stock>0 AND Offers.ID=$promo AND Offers.EndDate>DATE_ADD(now(),interval 2 hour)";
    $result45 = $conn45->datacon()->query($sql45);
    $SST = 1;
}
?>
<?php
if (isset($_POST['AddToCart'])) {
    if (isset($_POST['AddToCart'])) {
        if ($user == 'Guest') {
            echo "<script type=\"text/javascript\">
window.location = \"login_ar.php\"
</script>";
        } else {
            include 'Cart.php';
            $pid = mysqli_real_escape_string($conn45->datacon(), $_POST['pid']);
            $cart = new Cart($uid, $pid, 1);
            $cart->AddToCart();
            echo "<script type=\"text/javascript\">
window.location = \"cartview_ar.php\"
</script>";
        }
    }
}
if (isset($_POST['Addwish'])) {
    if ($user == 'Guest') {
        echo "<script type=\"text/javascript\">
window.location = \"login_ar.php\"
</script>";
    } else {
        include 'Wish_list.php';
        $pid = mysqli_real_escape_string($conn45->datacon(), $_POST['pid']);
        $wish = new Wish_list($uid, $pid);
        $wish->AddToWish();
        echo "<script type=\"text/javascript\">
window.location = \"wishlist_ar.php\"
</script>";
    }
}
?>



<!DOCTYPE HTML>
<html>

<head>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-KHXFQ65');
    </script>
    <!-- End Google Tag Manager -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Shaheen Shop</title>
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

    <style>
        img {
            border: 1px;
            border-radius: 10px;
        }
    </style>

</head>

<body>
    <?php include 'header_ar.php' ?>


    <section id="advertisement">
        <div class="container">
            <img src="https://shaheen.center/images/shop/h<?php echo $hid ?>.jpg<?php echo  "?" . time(); ?>" alt="" />
        </div>
    </section>

    <section style="direction: rtl;">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <?php
                    $conn = new config();
                    $conn2 = new config();
                    $sql = 'SELECT ID,catar FROM ncat';
                    $result = $conn->datacon()->query($sql);
                    ?>
                    <div class="left-sidebar">
                        <h2>الأقسام الفرعية</h2>
                        <div class="panel-group category-products" id="accordian">
                            <!--category-productsr-->

                            <?php
                            while ($row = $result->fetch_assoc()) {
                                $CID = $row['ID'];
                                $sql2 = "SELECT subar,ID FROM nsub where catid=$CID AND StatusSub=1";
                                $result2 = $conn2->datacon()->query($sql2);
                            ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordian" href="#<?php echo $row['ID']; ?>">
                                                <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                                <?php echo $row['catar']; ?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="<?php echo $row['ID']; ?>" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <ul>
                                                <?php while ($row2 = $result2->fetch_assoc()) {
                                                ?>
                                                    <li><a href="shop_ar.php?SID=<?php echo $row2['ID']; ?>"> - <?php echo $row2['subar']; ?> </a></li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                        <!--/category-products-->
                        <style>
                            @media only screen and (max-width: 600px) {
                                .shipping {
                                    display: none;
                                }

                            }
                        </style>


                        <div class="shipping text-center">
                            <!--shipping-->
                            <img src="images/home/55.png<?php echo  "?" . time(); ?>" alt="" />
                        </div>
                        <!--/shipping-->

                        <div class="shipping text-center">
                            <!--shipping-->
                            <img src="https://shaheen.center/images/home/shipping.jpg<?php echo  "?" . time(); ?>" alt="" />
                        </div>
                        <!--/shipping-->
                        <div class="shipping text-center">
                            <!--shipping-->
                            <img src="https://shaheen.center/images/home/shipping2.jpg<?php echo  "?" . time(); ?>" alt="" />
                        </div>
                        <!--/shipping-->

                    </div>
                </div>

                <div class="col-sm-9 padding-right" style="padding-left: 0px;">
                    <?php if ($SST == 1) { ?>
                        <div class="features_items">
                            <!--features_items-->
                            <h2 class="title text-center"> <?php echo $ncat; ?></h2>
                            <?php
                            while ($row45 = $result45->fetch_assoc()) {
                            ?>
                                <style>
                                    @media only screen and (max-width: 600px) {
                                        #phone2 {
                                            width: 50%;
                                            float: left;
                                        }


                                    }
                                </style>
                                <div class="col-sm-4" id="phone2">
                                    <?php
                                    // if ($row45['Size'] == 'Free') {
                                    ?>
                                    <!-- <div><img src="images/home/free.png
                                        <?php
                                        // echo  "?" . time(); 
                                        ?>
                                        " style="width: 100%;"></div> -->
                                    <?php
                                    // } else { 
                                    ?>
                                    <!-- <div><img src="images/home/freee.png
                                        <?php
                                        // echo  "?" . time(); 
                                        ?>" style="width: 100%;"></div> -->
                                    <?php
                                    // } 
                                    ?>
                                    <a href="single_ar.php?ID=<?php echo $row45['ID'] ?>">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="images/home/<?php echo $row45['Photo'] ?><?php echo  "?" . time(); ?>" alt="" />
                                                    <p style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"><?php echo $row45['ArName']; ?></p>
                                                    <?PHP if ($row45['BSale'] == 1) { ?>
                                                        <h2><?php echo $row45['SalePrice']; ?> جنية</h2>
                                                        <p><strike><?php echo $row45['Price']; ?> جنية </strike></p>
                                                    <?php } else { ?>
                                                        <h2><?php echo $row45['Price']; ?> جنية</h2>
                                                        <p style="opacity: .0;">"</p>
                                                    <?php } ?>
                                                    <form method="post">
                                                        <input type="hidden" name="pid" value="<?php echo $row45['ID'] ?>" />
                                                        <button type="submit" class="btn btn-default add-to-cart" name="AddToCart"><i class="fa fa-shopping-cart"></i> أضف الي العربة</button>
                                                    </form>
                                                </div>
                                    </a>
                                    <?php if ($row45['BSale'] == 1) { ?>
                                        <img src="images/home/salebig.png<?php echo  "?" . time(); ?>" class="new" alt="" />
                                    <?php } ?>
                                </div>
                                <style>
                                    @media only screen and (max-width: 600px) {
                                        #llil {
                                            margin: 0px;
                                            float: left;
                                            width: 50%;
                                        }

                                        #llir {
                                            margin: 0px;
                                            float: right;
                                            width: 50%;
                                        }


                                    }
                                </style>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified" style="padding: 0;">
                                        <li id="llir">
                                            <form method="post" style="text-align: center;">
                                                <input type="hidden" name="pid" value="<?php echo $row45['ID'] ?>" />
                                                <button type="submit" name="Addwish" style="padding: 0;padding-left: 6px;
    padding-right: 6px;"><i class="fas fa-heart"></i></button>
                                            </form>
                                        </li>
                                        <li id="llil">
                                            <form method="post" style="text-align: center;">
                                                <button href="#"><i class="fas fa-compress-arrows-alt"></i></button>
                                            </form>
                                        </li>

                                    </ul>
                                </div>
                        </div>
                </div>
            <?php } ?>
            </div>
            <!--features_items-->
        <?php } else { ?>
            <div class="features_items">
                <h2 class="title text-center">NO Items Found</h2>
            </div>
        <?php } ?>
        <ul class="pagination">
            <?php if (isset($rowss)) {
                $pages = $rowss / 60;
                for ($i = 0; $i < $pages; $i++) {
                    if (isset($_GET['Page']) && $i + 1 == $_GET['Page']) {
                        $class = "active";
                    } else {
                        $class = "";
                    }
            ?>
                    <li class="<?php echo $class; ?>"><a href="shop_ar.php?Offers=1&Page=<?php echo $i + 1; ?>"><?php echo $i + 1; ?></a></li>
            <?php }
            } ?>
            <li><a href="shop_ar.php?Offers=1&Page=
            <?php
            if(isset($_GET['Page'])){echo $_GET['Page'] + 1 + 1;}
            ?>
             ">&raquo;</a></li>
        </ul>
        </div>
        </div>
        </div>
    </section>




    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


    <div> <?php include 'brandslider_ar.php' ?></div>
    <?php include 'footer_ar.php' ?>


    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/5fda3922df060f156a8db882/1epm6uchk';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
</body>

</html>