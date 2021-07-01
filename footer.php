<style>
    @media only screen and (max-width: 600px) {
        .phh
        {
            margin-left: 70px !important;
            padding-right: 0 !important;
        }

    }
    media only screen and (min-width: 600px) {

    .phh
    {
        padding-right: 30px !important;
    }

    }
</style>
<footer id="footer" style="background-color:  #2a57a5"><!--Footer-->
    <div class="footer-top">
        <div class="container">
            <div class="row" style="text-align: -webkit-center;">
                <div class="col-sm-2" style="width: 75%;">
                    <div class="companyinfo">
                        <h2 style="text-transform: none;">Sahaheen.Shop</h2>
                        <p>Shaheen Center is one of the leading shareholding companies in Egypt. Since our inception in1979, Shaheen Center has come a long way of achievements and successful milestones to become one of the main retailers in Egypt. We are specialized in trading and distributing home appliances and quality electronics products</p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="address">
                        <img src="images/home/map.png" style="opacity: .6;" alt="" />
                        <p class="phh">Delivery all over Egypt <br>
                            From Aswan to Alexandria.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	
	<div class="footer-widget" style="margin-bottom: 0px; direction: ltr;">
        <div class="container">
            <div class="row" id="dsd">
                <div class="col-sm-2" style="padding-right: 0px;padding-left: 30px;">
                    <div class="single-widget">
                        <h2>Quock Shop</h2>
                        <?php
                        $connfo =new config();
                        $sqlfo= 'SELECT header,ID FROM nheader';
                        $resultfo = $connfo->datacon()->query($sqlfo);
                        ?>
                        <ul class="nav nav-pills nav-stacked">
                            <?php while ($rowfo = $resultfo->fetch_assoc()){ ?>
                                <?php if($rowfo['ID']==7){ ?>
                                    <li><a href="shop_ar.php?Offers=1" style="color: #c3c3c3; font: bold;"><?php echo $rowfo['header']?></a></li>
                                <?php }elseif ($rowfo['ID']==6){ ?>
                                    <li><a href="shop_ar.php?Free=1" style="color: #c3c3c3; font: bold;"><?php echo $rowfo['header']?></a></li>
                                <?php }else{ ?>
                                    <li><a href="shop_ar.php?HID=<?php echo $rowfo['ID']?>" style="color: #c3c3c3; font: bold;"><?php echo $rowfo['header']?></a></li>
                                <?php }}?>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2" style="padding-right: 0px;padding-left: 30px;">
                    <div class="single-widget">
                        <h2>Policies</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="pay_ar.php"> Payment Methods</a></li>
                            <li><a href="shipment_ar.php"> Shipping Policy</a></li>
                            <li><a href="shippingandreturns_ar.php"> Refund Policy</a></li>
                            <li><a href="ordertracking_ar.php"> Order Tracking</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2" style="padding-right: 0px;padding-left: 30px;">
                    <div class="single-widget">
                        <h2 style="text-transform: none;">About Shaheen Center</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="aboutus_ar.php"> About Shaheen Center</a></li>
                            <li><a href="career_ar.php">Careers</a></li>
                            <li><a href="customerservice_ar.php">Customer Service</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	<div class="footer-widget">
        <div class="container">
            <div class="row" id="dsd" style="text-align: -webkit-center">
				 <div class="col-sm-3 col-sm-offset-1">
                    <div class="single-widget">
                        <h2 style="text-transform: none;">About Shaheen Center</h2>
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