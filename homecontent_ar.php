<?php
$conn =new config();
$conn2 =new config();
$sql= 'SELECT ID,catar FROM ncat';
$result = $conn->datacon()->query($sql);
?>
<?php
if(isset($_POST['AddToCart']))
{
    if($user=='Guest')
    {
        echo "<script type=\"text/javascript\">
window.location = \"login_ar.php\"
</script>";
    }
    else {
        include 'Cart.php';
        $pid = mysqli_real_escape_string($conn->datacon(), $_POST['pid']);
        $cart = new Cart($uid, $pid, 1);
        $cart->AddToCart();
        echo "<script type=\"text/javascript\">
window.location = \"index.php\"
</script>";
    }
}
if(isset($_POST['Addwish']))
{
    if($user=='Guest')
    {
        echo "<script type=\"text/javascript\">
window.location = \"login_ar.php\"
</script>";
    }
    else {
        include 'Wish_list.php';
        $pid = mysqli_real_escape_string($conn->datacon(), $_POST['pid']);
        $wish = new Wish_list($uid, $pid);
        $wish->AddToWish();
        echo "<script type=\"text/javascript\">
window.location = \"wishlist_ar.php\"
</script>";
    }
}
?>
<?php
if(isset($_POST['seecat']))
{
    $cid = mysqli_real_escape_string($conn->datacon(),$_POST['cid']);
    echo "<script type=\"text/javascript\">
window.location = \"shop_ar.php?ID=\" + $cid
</script>";
}
?>



<style>

    @media only screen and (min-width: 600px) {
        .shipping
        {
            margin-top: 200px;
        }
        .gif
        {
            margin-top:450px !important;
        }

    }
</style>
<section style="direction: rtl;">
    <div class="container">
        <div class="row">
			<style>

   
</style>
            <div class="col-sm-3" style=" @media only screen and (max-width: 600px) {
            width: 50%;
    }">
                <div class="left-sidebar">
                    <h2>الأقسام الفرعية</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->

                        <?php
                        while($row = $result->fetch_assoc()) {
                            $CID = $row['ID'];
                            $sql2= "SELECT subar,ID FROM nsub where catid=$CID AND StatusSub=1";
                            $result2 = $conn2->datacon()->query($sql2);
                            ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordian" href="#<?php echo $row['ID'];?>">
                                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                            <?php
                                            echo $row['catar'];
                                            ?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="<?php echo $row['ID'];?>" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul>
                                            <?php while($row2 = $result2->fetch_assoc()) {
                                                ?>
                                                <li><a href="shop_ar.php?SID=<?php echo $row2['ID'];?>"> - <?php echo $row2['subar'];?> </a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </div><!--/category-products-->
                    <div class="shipping text-center"><!--shipping-->
                        <img src="images/home/55.jpg<?php echo  "?" . time(); ?>" style="border: 1px;border-radius: 10px" alt="" />
                    </div><!--/shipping-->
					<style>

    @media only screen and (max-width: 600px) {
        #displayphone
        {
            display: none;
        }
						}
</style>
                    <div class="shipping text-center"><!--shipping-->
                        <img src="https://shaheen.center/images/home/shipping.jpg<?php echo  "?" . time(); ?>" style="border: 1px;border-radius: 10px"/>
                    </div><!--/shipping-->
					
                    <div class="shipping text-center"  id="displayphone"><!--shipping-->
                        <img src="images/home/56.jpg<?php echo  "?" . time(); ?>" style="border: 1px;border-radius: 10px" alt="" />
                    </div><!--/shipping-->

                    <a href="shop_ar.php?Offers=1"><div class="shipping text-center gif"><!--shipping-->
                            <video style="border: 1px;border-radius: 10px" playsinline autoplay muted loop src="images/home/mp.mp4"></video>
                        </div><!--/shipping--></a>

                </div>
            </div>

            <div class="col-sm-9 padding-right" style="padding-left: 0px;">
                <?php
                $conn7 =new config();
                $conn8 =new config();
                $sql7= 'SELECT ID,catar FROM ncat';
                $sql8= 'SELECT ID,catar FROM ncat';
                $result7 = $conn7->datacon()->query($sql7);
                $result8 = $conn8->datacon()->query($sql8);
                $count1=1;
                ?>
                <div class="category-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <?php while($row7= $result7->fetch_assoc()) {
                                if ($count1==1)
                                {
                                    ?>
                                    <li class="active"><a href="#s<?php echo $row7['ID']?>" data-toggle="tab"><?php echo $row7['catar']?></a></li>
                                <?php }
                                else{
                                    ?>
                                    <li class=""><a href="#s<?php echo $row7['ID']?>" data-toggle="tab"><?php echo $row7['catar']?></a></li>
                                <?php } $count1++;} ?>
                        </ul>
                    </div>
                    <div class="tab-content">

                        <?php $count1=1;while($row8= $result8->fetch_assoc()) { ?>
                            <?php if($count1==1){ ?>

                                <div class="tab-pane fade active in" id="s<?php echo $row8['ID']?>" >

                                    <?php $hhh = $row8['ID'];
                                    $conn11 = new config();
                                    $sql11 = "SELECT pro.*FROM products pro INNER JOIN nsub s on pro.SID=s.ID INNER JOIN ncat h on s.catid=h.ID where pro.Stock!=0 AND pro.Status=1 AND s.catid='$hhh'ORDER BY RAND() LIMIT 8";
                                    $result11 = $conn11->datacon()->query($sql11);
                                    while($row11 = $result11->fetch_assoc()) {

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

                                        <div class="col-sm-3" id="phone2">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <a href="single_ar.php?ID=<?php echo $row11['ID'];?>"><img src="images/home/<?php echo $row11['Photo'];?>" title="<?php echo $row11['ArName'];?>" alt="" />
                                                            <p style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"><?php echo $row11['ArName'];?></p>
                                                            <?PHP if($row11['BSale']==1){ ?>
                                                                <h2 ><?php echo $row11['SalePrice'];?> جنية</h2>
                                                                <p><strike><?php echo $row11['Price'];?> جنية </strike></p>
                                                            <?php }else{?>
                                                                <h2><?php echo $row11['Price'];?> جنية</h2>
                                                                <p style="opacity: .0;">"</p>
                                                            <?php }?>
                                                        </a>
                                                        <form method="post">
                                                            <input type="hidden" name="pid" value="<?php echo $row11['ID']?>" />
                                                            <button type="submit" class="btn btn-default add-to-cart" name="AddToCart"><i class="fa fa-shopping-cart"></i> أضف الي العربة </button>
                                                        </form>
                                                    </div>
                                                    <?php if($row11['BSale']==1){ ?>
                                                        <img src="images/home/salebig.png<?php echo  "?" . time(); ?>" class="new" alt="" />
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>

                                    <?php }$count1++;
                                    ?>

                                    <div class="col-sm-3" id="phone2" style="width: 100%">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <a href="shop_ar.php?ID=<?php echo $row8['ID'];?>"><img src="images/home/<?php echo  "?" . time(); ?>" alt="" />
                                                        <h2 style="margin-top: 0px;"><?php echo $row8['catar'];?></h2>
                                                        <p style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">تسوق المزيد</p></a>
                                                    <form method="post">
                                                        <input type="hidden" name="cid" value="<?php echo $row8['ID']?>" />
                                                        <button type="submit" class="btn btn-default add-to-cart" name="seecat"><i class="fas fa-plus"></i> تسوق المزيد </button>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            <?php }else{ ?>
                                <div class="tab-pane fade" id="s<?php echo $row8['ID']?>" >

                                    <?php $hhh = $row8['ID'];
                                    $conn11 = new config();
                                    $sql11 = "SELECT pro.*FROM products pro INNER JOIN nsub s on pro.SID=s.ID INNER JOIN ncat h on s.catid=h.ID where pro.Stock != 0 AND pro.Status=1 AND s.catid='$hhh'ORDER BY RAND() LIMIT 8";
                                    $result11 = $conn11->datacon()->query($sql11);
                                    while($row11 = $result11->fetch_assoc()) {
                                        ?>
                                        <div class="col-sm-3" id="phone2">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <a href="single_ar.php?ID=<?php echo $row11['ID'];?>"><img src="images/home/<?php echo $row11['Photo'];?>" title="<?php echo $row11['ArName'];?>" alt="" />
                                                            <p style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"><?php echo $row11['ArName'];?></p>
                                                            <?PHP if($row11['BSale']==1){ ?>
                                                                <h2 ><?php echo $row11['SalePrice'];?> جنية</h2>
                                                                <p><strike><?php echo $row11['Price'];?> جنية </strike></p>
                                                            <?php }else{?>
                                                                <h2><?php echo $row11['Price'];?> جنية</h2>
                                                                <p style="opacity: .0;">"</p>
                                                            <?php }?>
                                                        </a>
                                                        <form method="post">
                                                            <input type="hidden" name="pid" value="<?php echo $row11['ID']?>" />
                                                            <button type="submit" class="btn btn-default add-to-cart" name="AddToCart"><i class="fa fa-shopping-cart"></i> أضف الي العربه </button>
                                                        </form>
                                                    </div>
                                                    <?php if($row11['BSale']==1){ ?>
                                                        <img src="images/home/salebig.png<?php echo  "?" . time(); ?>" class="new" alt="" />
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>

                                    <?php }$count1++;
                                    ?>
                                    <div class="col-sm-3" id="phone2" style="width: 100%">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <a href="shop_ar.php?ID=<?php echo $row8['ID'];?>="><img src="images/home/<?php echo  "?" . time(); ?>" alt="" />
                                                        <h2><?php echo $row8['catar'];?></h2>
                                                        <p style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">تسوق المزيد</p></a>
                                                    <form method="post">
                                                        <input type="hidden" name="cid" value="<?php echo $row8['ID']?>" />
                                                        <button type="submit" class="btn btn-default add-to-cart" name="seecat"><i class="fas fa-plus"></i> تسوق المزيد </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                            <?php }?>




                        <?php } ?>


                    </div>
                </div><!--/category-tab-->






                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">أصناف متنوعة</h2>
                    <?php
                    $conn4 =new config();
                    $sql4= 'SELECT * FROM products WHERE products.Stock!=0  AND products.Status=1 ORDER BY RAND() LIMIT 12';
                    $result4 = $conn4->datacon()->query($sql4);
                    while($row4 = $result4->fetch_assoc()) {
                        ?>
                        <div class="col-sm-4" id="phone2" >
                            <?php
                        if ($row4['Size']=='Free') {
                         ?>
                            <a href="shop_ar.php?Free=1"><div style="text-align: center"><img src="images/home/free.png<?php echo  "?" . time(); ?>" style="width: 100%;" alt="" /></div></a>
                    <?php }else{ ?>
                        <a href="shop_ar.php?Free=1"><div style="text-align: center"><img src="images/home/freee.png<?php echo  "?" . time(); ?>" style="width: 100%;" alt="" /></div></a>
                    <?php } ?>
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <a href="single_ar.php?ID=<?php echo $row4['ID'];?>"><img src="images/home/<?php echo $row4['Photo'];?><?php echo  "?" . time(); ?>" alt="<?php echo $row4['ArName'];?>" />
                                            <p style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"><?php echo $row4['ArName'];?></p>
                                            <?PHP if($row4['BSale']==1){ ?>
                                                <h2 ><?php echo $row4['SalePrice'];?> جنية</h2>
                                                <p><strike><?php echo $row4['Price'];?> جنية </strike></p>
                                            <?php }else{?>
                                                <h2><?php echo $row4['Price'];?> جنية</h2>
                                                <p style="opacity: .0;">"</p>
                                            <?php }?>
                                        </a>
                                        <form method="post">
                                            <input type="hidden" name="pid" value="<?php echo $row4['ID']?>" />
                                            <button type="submit" class="btn btn-default add-to-cart" name="AddToCart"><i class="fa fa-shopping-cart"></i> أضف الي العربة </button>
                                        </form>
                                    </div>
                                    <?php if($row4['BSale']==1){ ?>
                                        <img src="images/home/salebig.png<?php echo  "?" . time(); ?>" class="new" alt="" />
                                    <?php } ?>
                                </div>
								
								<style>

    @media only screen and (max-width: 600px) {
        #llil
        {
			margin: 0px;
			float: left;
			width: 50%;
        }
		 #llir
        {
			margin: 0px;
			float: right;
			width: 50%;
        }
    

    }
</style>
								
                                <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li id="llir"> <form method="post" style="text-align: center;">
                                        <input type="hidden" name="pid" value="<?php echo $row4['ID']?>" />
                                        <button type="submit" name="Addwish"><i class="fas fa-heart"></i></button>
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

                </div><!--features_items-->




                <?php
                $conn66 =new config();
                $sql66= 'SELECT products.* FROM products INNER JOIN nsub on products.SID=nsub.ID INNER JOIN ncat on nsub.catid=ncat.ID INNER JOIN nheader ON ncat.headerid=nheader.ID where (BSale=1 AND (nheader.ID=1 OR nheader.ID=2)) AND products.Status=1 ORDER BY RAND() LIMIT 8';
                $result66 = $conn66->datacon()->query($sql66);
                ?>

                <?php
                $conn00 =new config();
                $sql00= 'SELECT * FROM nheader where ID=7';
                $result00 = $conn00->datacon()->query($sql00);
                while ($row00 = $result00->fetch_assoc())
                    $offer= $row00['headerar'];
                ?>
                <div class="recommended_items" style="direction: ltr;"><!--recommended_items-->
                    <a href="shop_ar.php?Offers=1"><h2 class="title text-center"><?php echo $offer?></h2></a>
                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active" style="direction: rtl;">
                                <?php while ($row66=$result66->fetch_assoc())
                                {
                                    ?>
                                    <div class="col-sm-3" id="phone2">
                                        <div style="text-align-last: center;"><img src="images/home/sale.png<?php echo  "?" . time(); ?>" style="width: 100%;" alt="" /></div>
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <a href="single_ar.php?ID=<?php echo $row66['ID'];?>"><img src="images/home/<?php echo $row66['Photo'];?><?php echo  "?" . time(); ?>" title="<?php echo $row66['ArName'];?>" alt="" />
                                                        <p style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"><?php echo $row66['ArName'];?></p>
                                                        <h2 ><?php echo $row66['SalePrice'];?> جنية</h2>
                                                        <p><strike><?php echo $row66['Price'];?> جنية </strike></p>
                                                    </a>
                                                    <form method="post">
                                                        <input type="hidden" name="pid" value="<?php echo $row66['ID']?>" />
                                                        <button type="submit" class="btn btn-default add-to-cart" name="AddToCart"><i class="fa fa-shopping-cart"></i>أضف الي   العربة </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                            </div>
                            <?php
                            $conn66 =new config();
                            $sql66= 'SELECT products.* FROM products INNER JOIN nsub on products.SID=nsub.ID INNER JOIN ncat on nsub.catid=ncat.ID INNER JOIN nheader ON ncat.headerid=nheader.ID where (BSale=1 AND (nheader.ID=3))  AND products.Status=1 ORDER BY RAND() LIMIT 8';
                            $result66 = $conn66->datacon()->query($sql66);
                            ?>
                            <div class="item" style="direction: rtl;">
                                <?php while ($row66=$result66->fetch_assoc())
                                {
                                    ?>
                                    <div class="col-sm-3" id="phone2">
                                        <div style="text-align-last: center;"><img src="images/home/sale.png" style="width: 100%;" alt="" /></div>
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <a href="single_ar.php?ID=<?php echo $row66['ID'];?>"><img src="images/home/<?php echo $row66['Photo'];?><?php echo  "?" . time(); ?>" title="<?php echo $row66['ArName'];?>" alt="" />
                                                        <p style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"><?php echo $row66['ArName'];?></p>
                                                        <h2><?php echo $row66['SalePrice'];?> جنية</h2>
                                                        <p><strike><?php echo $row66['Price'];?> جنية </strike></p>
                                                    </a>
                                                    <form method="post">
                                                        <input type="hidden" name="pid" value="<?php echo $row66['ID']?>" />
                                                        <button type="submit" class="btn btn-default add-to-cart" name="AddToCart"><i class="fa fa-shopping-cart"></i>أضف الي   العربة </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                            </div>

                            <?php
                            $conn66 =new config();
                            $sql66= 'SELECT products.* FROM products INNER JOIN nsub on products.SID=nsub.ID INNER JOIN ncat on nsub.catid=ncat.ID INNER JOIN nheader ON ncat.headerid=nheader.ID where (BSale=1 AND (nheader.ID=4))  AND products.Status=1 ORDER BY RAND() LIMIT 8';
                            $result66 = $conn66->datacon()->query($sql66);
                            ?>
                            <div class="item" style="direction: rtl;">
                                <?php while ($row66=$result66->fetch_assoc())
                                {
                                    ?>
                                    <div class="col-sm-3" id="phone2">
                                        <div style="text-align-last: center;"><img src="images/home/sale.png<?php echo  "?" . time(); ?>" style="width: 100%" alt="" /></div>
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <a href="single_ar.php?ID=<?php echo $row66['ID'];?>"><img src="images/home/<?php echo $row66['Photo'];?><?php echo  "?" . time(); ?>" title="<?php echo $row66['ArName'];?>" alt="" />
                                                        <p style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"><?php echo $row66['ArName'];?></p>
                                                        <h2><?php echo $row66['SalePrice'];?> جنية</h2>
                                                        <p><strike><?php echo $row66['Price'];?> جنية </strike></p>
                                                    </a>
                                                    <form method="post">
                                                        <input type="hidden" name="pid" value="<?php echo $row66['ID']?>" />
                                                        <button type="submit" class="btn btn-default add-to-cart" name="AddToCart"><i class="fa fa-shopping-cart"></i>  أضف الي 
														العربة  </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                            </div>
                    
                        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev" style="left: 0;">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                        
                    </div>
                </div><!--/recommended_items-->

            </div>
        </div>
    </div>
</section>
