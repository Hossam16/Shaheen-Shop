<!--<style>-->
<!--    @media only screen and (max-width: 600px) {-->
<!--        .row{-->
<!--            text-align: -webkit-center !important;-->
<!--        }-->
<!--        .phh-->
<!--        {-->
<!--            margin-left: 70px !important;-->
<!--        }-->
<!---->
<!--    }-->
<!--</style>-->
<footer id="footer" style="background-color:  #2a57a5; direction: rtl;"><!--Footer-->
	<div class="footer-top">
        <div class="container">
            <div class="row" style="text-align: -webkit-center;">
                <div class="col-sm-2" style="width: 75%;">
                    <div class="companyinfo">
                        <h2>مؤسسة سنتر شاهين</h2>
                        <p>سنتر شاهين... من أكبر الشركات الرائدة داخل مصر والشرق والأوسط. فمنذ إنشائها عام 1979، استطاعت شركة سنتر شاهين تحقيق العديد من النجاحات والإنجازات الفارقة في مجال تجارة وتوزيع الأجهزة الإلكترونية والمنتجات المنزلية و المفروشات. حيث تخصصت في توزيع وبيع كل ما يخص المنزل ويهم الأسرة العربية بأفضل الأسعار وأجود الخامات</p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="address">
                        <img src="images/home/map.png" style="width: 295px; height: 154px" alt="" />
                        <p class="phh" style="right: 0px;left: 0px;">خدمة التوصيل شاملة جميع المحافظات <br>
                            من الاسكندرية الي اسوان</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	
	<div class="footer-widget" style="direction: rtl">
        <div class="container">
            <div class="row" id="dsd1">
                <div class="col-sm-2" style="padding-right: 15px;">
                    <div class="single-widget">
                        <h2>التسوق السريع</h2>
                        <?php
                        $connfo =new config();
                        $sqlfo= 'SELECT headerar,ID FROM nheader';
                        $resultfo = $connfo->datacon()->query($sqlfo);
                        ?>
                        <ul class="nav nav-pills nav-stacked" style="padding-right: 0px;">
                            <?php while ($rowfo = $resultfo->fetch_assoc()){ ?>
                                <?php if($rowfo['ID']==7){ ?>
                                    <li><a href="shop_ar.php?Offers=1" style="color: #c3c3c3;"><?php echo $rowfo['headerar']?></a></li>
                                    <?php }elseif ($rowfo['ID']==6){ ?>
                            <li><a href="shop_ar.php?Free=1" style="color: #c3c3c3;"><?php echo $rowfo['headerar']?></a></li>
                                    <?php }else{ ?>
                            <li><a href="shop_ar.php?HID=<?php echo $rowfo['ID']?>" style="color: #c3c3c3; font: bold;"><?php echo $rowfo['headerar']?></a></li>
                            <?php }}?>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>السياسات</h2>
                        <ul class="nav nav-pills nav-stacked" style="padding-right: 0px;">
                            <li><a href="pay_ar.php" style="color: #c3c3c3; font: bold;">طرق الدفع</a></li>
                            <li><a href="shipment_ar.php" style="color: #c3c3c3; font: bold;">سياسة الشحن</a></li>
                            <li><a href="shippingandreturns_ar.php" style="color: #c3c3c3; font: bold;">سياسة الاسترجاع</a></li>
                            <li><a href="ordertracking_ar.php" style="color: #c3c3c3; font: bold;">تتبع الطلب</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>شاهين سنتر</h2>
                        <ul class="nav nav-pills nav-stacked" style="padding-right: 0px;">
                            <li><a href="aboutus_ar.php" style="color: #c3c3c3; font: bold;">عن شاهين سنتر</a></li>
                            <li><a href="career_ar.php" style="color: #c3c3c3; font: bold;">وظائف</a></li>
                            <li><a href="customerservice_ar.php" style="color: #c3c3c3; font: bold;" >خدمة العملاء</a></li>
                        </ul>
                    </div>
                </div>
				</div>
        </div>
    </div>
	
	
	<div class="footer-widget">
        <div class="container">
            <div class="row" id="dsd" style="text-align: center;">
				<div class="col-sm-3 col-sm-offset-1">
                    <div class="single-widget">
                        <h2>Shaheen.Shop</h2>
                        <form action="#" class="searchform">
                            <input type="text" placeholder="Your email address" />
                            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                            <p>Get the most recent updates from <br />our site and be updated your self...</p>
                        </form>
                    </div>
                </div>
                </div>
                </div>
                </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2020 Shaheen Development Team All rights reserved.</p>
                <p class="pull-right" style="opacity: 0;"><a href="http://webic-solution.com/">WEBIC</a></p>
            </div>
        </div>
    </div>

</footer><!--/Footer-->





<!--Start of Tawk.to Script
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5e45291ca89cda5a1885c069/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
End of Tawk.to Script-->


<a id="scrollUpp" href="tel:16291" style="position: fixed; z-index: 2147483647; display:none;"><i class="fas fa-phone-volume"></i></a>