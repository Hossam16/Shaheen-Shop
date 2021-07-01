<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-KHXFQ65');</script>
<!-- End Google Tag Manager -->


<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KHXFQ65"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php $actual_link = "$_SERVER[REQUEST_URI]";
    if($actual_link == "/index_en.php")
    {
        $address = "/index.php";
    } else 
    {
        $addr = strstr($actual_link, '.',true);
        $ress = strstr($actual_link, '?');
        $ggg = "_ar.php";
        $address = "$addr$ggg$ress";
    }
?>
<?php
$conn4 =new config();
$sql= 'SELECT header,ID FROM nheader';
$result = $conn4->datacon()->query($sql);
?>
<?php
if(isset($_POST['search']))
{
    $search = $_POST['search'];
    echo "<script type=\"text/javascript\">
window.location = \"shop.php?search=\" + '$search' 
</script>";
}
?>
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                       <ul class="nav nav-pills" style="padding-right: 0px;">
                            <li style="margin-left: 0px;"><a href="contact_ar.php" style="padding-right: 0px;"> <i class="fa fa-phone" ></i>16291 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </a></li>
                            <li style="margin-left: 0px;"><a href="contact_ar.php" style="padding-right: 0px;"> <i class="fa fa-envelope" ></i> info@shaheen.shop </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="https://www.facebook.com/elshaheen.center/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://www.youtube.com/channel/UC6jOI4UZkhSn5oij0KcHJnA?view_as=subscriber" target="_blank"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="https://www.instagram.com/shaheencenter/" target="_blank"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="https://twitter.com/shaheen_center" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://www.linkedin.com/company/shaheen-center" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="<?php echo $address; ?>"><i class="fas fa-language"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->
    <?php
    if(isset($uid)) {
        $conncart = new config();
        $sqlcart = "SELECT SUM(Count) As Count FROM cart WHERE cart.UID=$uid ORDER BY cart.Count;";
        $resultcart = $conncart->datacon()->query($sqlcart);
    }
    if(isset($uid)) {
        $connwish = new config();
        $sqlwish = "SELECT COUNT(*) As Count FROM wishlist WHERE wishlist.UID=$uid;";
        $resultwish = $connwish->datacon()->query($sqlwish);
    }
?>
    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-md-4 clearfix">
                    <div class="logo pull-left">
                        <a href="index_en.php"><img src="images/home/1.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-md-8 clearfix">
                    <div class="shop-menu clearfix pull-right">
                        <ul class="nav navbar-nav" style="margin-right: 0px;">
                            <?php if ($user=='Guest' OR $user=='SGuest'){}else{?>
                            <li><a href="Profile.php" style="text-transform: capitalize;"><i class="fa fa-user"></i> <?php echo $user; ?> </a></li>
                            <li><a href="orders.php"><i class="fa fa-crosshairs"></i> Orders </a></li>
                            <li><a href="cartview.php">
                                    <?php while ($rowcart = $resultcart->fetch_assoc()){ ?>
                                    <span style="color: #e81f25;"><?php echo $rowcart['Count']?></span>
                                    <?php }?>

                                    <i class="fa fa-shopping-cart"></i> Cart </a></li>
							   <li><a href="wishlist.php">
                                    <?php while ($rowwish = $resultwish->fetch_assoc()){ ?>
                                        <span style="color: #e81f25;"><?php echo $rowwish['Count']?></span>
                                    <?php }?>
                                    <i class="fa fa-star"></i> Wishlist</a></li>
                            <?php }?>
                            <?php if($user=='Guest' OR $user=='SGuest'){ ?>
                            <li><a href="login.php"><i class="fa fa-shopping-cart"></i> Cart </a></li>
							
                            <li><a href="login.php"><i class="fa fa-lock"></i> Login / Signup </a></li>
							
                            <?php }else{ ?>
							
                            <li><a href="logout.php"><i class="fas fa-door-open"></i> LogOut </a></li>
                            <?php } ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button id="displaynav" type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse        ">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div id="navvv" class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li style="border: 1px;border-top-left-radius: 10px;border-top-right-radius: 10px;"><a href="index_en.php" class="active">Home</a></li>
                            <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <?php
                                    while($row = $result->fetch_assoc()) {
                                        if($row['ID']==7){
                                            ?>
                                            <li><a href="shop.php?Offers=1"><?php echo $row['header']?></a></li>
                                        <?php }elseif ($row['ID']==6){?>
                                        <?php }else{?>
                                            <li><a href="shop.php?HID=<?php echo $row['ID'];?>"><?php echo $row['header']?></a></li>
                                        <?php }} ?>

                                        <!-- <li><a href="shop.php?SID=74">Summer Offers</a></li> -->
                                        <!-- <li><a href="shop.php?SID=76">99 Offers</a></li> -->

                                </ul>
                            </li>
                            <li style="border: 1px;border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;"><a href="shop.php?Free=1">Free Shipping <i class="fas fa-shipping-fast"></i></a></li>
                            <li><a href="contact.php">Contact <i class="fas fa-headset"></i></a></li>
                           
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
					<style>

    @media only screen and (max-width: 600px) {
        .search_box input:focus
        {
            width: 250px;
    background-position: 230px;
    border: 1px;
    border-radius: 5px;
    color: #1a1a1a;
        }

    }
</style>
                    <div class="search_box pull-right">
                        <form method="post">
                            <input type="text" placeholder="Search !" name="search"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->