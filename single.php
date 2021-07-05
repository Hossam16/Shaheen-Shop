<?php include "StartSession.php" ;
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if (strpos($actual_link, 'center')) {
    $actual_link = str_replace("center", "shop", $actual_link);
    header("Location:  $actual_link");
}
?>
<?php
if(isset($_GET['ID']))
{
    $pid= $_GET['ID'];
}
?>
<!DOCTYPE html>
<html>
<head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-KHXFQ65');</script>
    <!-- End Google Tag Manager -->
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

<?php include 'config.php'?>
<?php
$conn97 =new config();
$pid = mysqli_real_escape_string($conn97->datacon(),$pid);
$sql97= "SELECT * FROM products where ID='$pid'";
$result97 = $conn97->datacon()->query($sql97);
while($row97 = $result97->fetch_assoc())
{
    $photo= $row97['Photo'];
    $name = $row97['Name'];
    $price= $row97['Price'];
    $bsale= $row97['BSale'];
    $saleprice= $row97['SalePrice'];
    $stock= $row97['Stock'];
    $desc = $row97['Desc'];
    $sid  = $row97['SID'];
    $free  = $row97['Size'];
}
?>
<?php
$conn99 =new config();
$sid = mysqli_real_escape_string($conn99->datacon(),$sid);
$sql99= "SELECT products.*, nsub.sub FROM products INNER JOIN nsub on products.SID=nsub.ID where nsub.ID='$sid' LIMIT 12;";
$result99 = $conn99->datacon()->query($sql99);
?>
<?php
$conn55 =new config();
$conn22 =new config();
$sql55= 'SELECT ID,cat FROM ncat';
$result55 = $conn55->datacon()->query($sql55);
?>
<?php
if(isset($_POST['AddToCart']))
{
    if($user=='Guest')
    {
        echo "<script type=\"text/javascript\">
window.location = \"login.php\"
</script>";
    }
    else
    {
        include 'Cart.php';
        $quantity =1;
        $pid = mysqli_real_escape_string($conn55->datacon(),$_POST['pid']);
        if(isset($_POST['quantity']))
        {
            $quantity = mysqli_real_escape_string($conn55->datacon(),$_POST['quantity']);
        }
        $cart = new Cart($uid,$pid,$quantity);
        $cart->AddToCart();
        echo "<script type=\"text/javascript\">
window.location = \"cartview.php\"
</script>";
    }
}
?>
<?php include 'header.php'?>



<section>
    <div class="container">
        <div class="row">
			<style>

    @media only screen and (max-width: 600px) {
        #adss
        {
            display: none;
        }

    }
</style>
            <div class="col-sm-3" id="adss">
                <div class="left-sidebar">
                    <h2>Categories</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->

                        <?php
                        while($row55 = $result55->fetch_assoc()) {
                            $CID = $row55['ID'];
                            $sql22= "SELECT sub FROM nsub where catid=$CID AND StatusSub=1";
                            $result22 = $conn22->datacon()->query($sql22);
                            ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordian" href="#<?php echo $row55['ID'];?>">
                                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                            <?php echo $row55['cat'];?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="<?php echo $row55['ID'];?>" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul>
                                            <?php while($row22 = $result22->fetch_assoc()) {
                                                ?>
                                                <li><a href="#"> - <?php echo $row22['sub'];?> </a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </div><!--/category-products-->
<style>

    @media only screen and (max-width: 600px) {
        .shipping
        {
            display: none;
        }

    }
</style>
                    <div class="shipping text-center"><!--shipping-->
                        <img src="images/home/55.png<?php echo  "?" . time(); ?>" alt="" />
                    </div><!--/shipping-->
                    <div class="shipping text-center"><!--shipping-->
                        <img src="images/home/shipping.jpg<?php echo  "?" . time(); ?>" alt="" />
                    </div><!--/shipping-->
                    <div class="shipping text-center"><!--shipping-->
                        <img src="images/home/56.jpg<?php echo  "?" . time(); ?>" alt="" />
                    </div><!--/shipping-->

                </div>
            </div>

            <div class="col-sm-9 padding-right" style="padding-left: 0;">
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product" style="text-align: center;">
                            <img src="images/product-details/<?php echo $photo;?><?php echo  "?" . time(); ?>" alt="" />
<!--                            <h3>ZOOM</h3>-->
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->
                            <img src="images/product-details/0022.png<?php echo  "?" . time(); ?>" class="newarrival" style="width: 50px" alt="" />
                            <h2><?php echo $name;?></h2>
                            <p>Web ID: <?php echo explode("." , $photo)[0];?></p>
                            <img src="images/product-details/rating.png<?php echo  "?" . time(); ?>" alt="" />
							<style>

    @media only screen and (max-width: 600px) {
        #addToCartButtonn
        {
            position: fixed;
			bottom: 0;
			left: 0px;
			bottom: 0px;
			padding: 5px;
			background: rgba(255,255,255,1.00);
			width: 100%;
			padding-right: 3%;
			margin: 0;
			z-index: 1;
			display:block !important;
			border: 1px;
    		border-top-left-radius: 10px;
    		border-top-right-radius: 10px;
    		box-shadow: -1px -2px 8px 0 rgba(0,0,0,0.2);
        }

    }
</style>
							<div style="text-align: center;">
                            <form method="post">
                                <span>
									<?php if($bsale==1){ ?>
                                        <span>LE <?php echo $saleprice;?></span>
									<h3><strike>LE <?php echo $price;?></strike></h3>
                                    <?php }else{ ?>
                                        <span>LE <?php echo $price;?></span>
                                    <?php }?>
									<label>Quantity :</label>
									<input type="number" min="1" name="quantity" value="1" />
                                    <input type="hidden" name="pid" value="<?php echo $pid;?>" />
									<div>
									<button type="submit" class="btn btn-fefault cart" name="AddToCart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
										</div>
									<div id="addToCartButtonn" style="display: none;">
										<div>
										<button type="submit" class="btn btn-fefault cart" name="AddToCart" style="width: 70%; float: left; height: 43px; margin: 0; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
											</div>
										<div>
										<a id="scrollUppp" href="tel:16291" style="width:25% ; float: right	; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);"	><i class="fas fa-phone-volume"></i></a>
											</div>
									</div>
									
								</span>
                            </form>
								</div>
                            <p><b>Availability :</b> <?php if($stock > 0)
                                {
                                    echo "In Stock";
                                }
                                else
                                {
                                    echo "Out of Stock";
                                }
                                ?></p>
                            <p><b>Condition :</b> New</p>
                            <p><b>Brand :</b> Shaheen</p>
                            <?php
                        // if ($free=='Free') {
                         ?>
                        <!-- <a href="shop.php?Free=1"><div><img src="images/home/free.png -->
                        <?php
                        //  echo  "?" . time(); 
                        ?>
                        <!-- " alt="" /></div></a> -->
                    <?php 
                // }
                 ?>
                           
                           
                        </div><!--/product-information-->
                    </div>
                </div><!--/product-details-->

                <div class="category-tab shop-details-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#details" data-toggle="tab">Details</a></li>
                            <li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
                            <!--<li><a href="#tag" data-toggle="tab">Tag</a></li>-->
                            <li><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="details" >
                            <div class="col-sm-12">
                            <h2 style="font-weight: bold; text-decoration:underline;">Specifications</h2>
                            <br>
                                <p style="font-size: 20px;"><?php echo nl2br ($desc);?></p>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="companyprofile" >
                            <?php  while($row99 = $result99->fetch_assoc())
                            {
                            ?>
							<style>

    @media only screen and (max-width: 600px) {
        #phone2
        {
            width: 50%;
			float: left;
        }
    

    }
</style>
                            <div class="col-sm-4" id="phone2">
                                <?php
                        if ($row99['Size']=='Free') {
                         ?>
                            <a href="shop_ar.php?Free=1"><div><img src="images/home/free.png<?php echo  "?" . time(); ?>" alt="" /></div></a>
                    <?php }else{ ?>
                        <div><img src="images/home/freee.png<?php echo  "?" . time(); ?>" alt="" /></div>
                    <?php } ?>

                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <a href="single.php?ID=<?php echo $row99['ID'];?>"><img src="images/home/<?php echo $row99['Photo']?><?php echo  "?" . time(); ?>" alt="" />
                                            <h2><?php echo $row99['Price']?></h2>
                                            <p><?php echo $row99['Name']?></p>
                                            </a>
                                            
                                            <form method="post">
                                                            <input type="hidden" name="pid" value="<?php echo $row99['ID']?>" />
                                                            <button type="submit" class="btn btn-default add-to-cart" name="AddToCart"><i class="fa fa-shopping-cart"></i>Add To Cart</button>
                                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                        </div>

                        <!--<div class="tab-pane fade" id="tag" >
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="images/home/gallery1.jpg" alt="" />
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <div class="tab-pane fade" id="reviews" >
                            <div class="col-sm-12">
                                <ul>
                                    <li><a href=""><i class="fa fa-user"></i></a></li>
                                    <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                                    <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                                </ul>
                                <p></b></p>

                                <form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<br>
											<input type="email" placeholder="Email Address"/>
										</span>
                                    <textarea name="" ></textarea>
                                    <b>Rating: </b> <img src="images/product-details/rating.png<?php echo  "?" . time(); ?>" alt="" />
                                    <button type="button" class="btn btn-default pull-right">
                                        Submit
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div><!--/category-tab-->

               <!-- <div class="recommended_items">recommended_items
                    <h2 class="title text-center">recommended items</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/recommend1.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/recommend2.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/recommend3.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/recommend1.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/recommend2.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/recommend3.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>recommended_items-->

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


<div> <?php include 'brandslider.php'?></div>
<style>
    @media only screen and (max-width: 600px) {
        #scrollUp
        {
            display: none !important;
        }

    }
 
</style>
<?php include 'footer.php'?>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5fda3922df060f156a8db882/1epm6uchk';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

</body>
</html>