<?php include "StartSession_ar.php" ;
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if (strpos($actual_link, 'center')) {
    $actual_link = str_replace("center", "shop", $actual_link);
    header("Location:  $actual_link");
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
<body >

<?php include 'config.php'?>
<?php include 'header_ar.php'?>





<div id="contact-page" class="container" style="direction: rtl;">
    <div class="bg">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="title text-center">تواصل <strong>معنا</strong></h2>
                <div id="gmap" class="contact-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3455.330663422818!2d31.156687414578776!3d29.998660381899!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145845c4d78d589f%3A0x2087371094c026ff!2z2LPZhtiq2LEg2LTYp9mH2YrZhiDZgdmK2LXZhA!5e0!3m2!1sen!2seg!4v1557705678817!5m2!1sen!2seg" height="400" frameborder="0" style="border:0; width: 100%;" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="contact-form">
                    <h2 class="title text-center">كن على اتصال</h2>
                    <div class="status alert alert-success" style="display: none"></div>
                    <form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control" required="required" placeholder="الأسم">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" name="email" class="form-control" required="required" placeholder="البريد الاليكتروني">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" name="subject" class="form-control" required="required" placeholder="العنوان">
                        </div>
                        <div class="form-group col-md-12">
                            <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="رسالتك"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <input type="submit" name="submit" class="btn btn-primary pull-right" value="أرسال">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="contact-info">
                    <h2 class="title text-center">معلومات الاتصال</h2>
                    <address>
                        <p>سنتر شاهين</p>
                        <p>شارع الملك فيصل ، محطة الطوابق ، بجوار مدرسة فضل .</p>
                        <p>الجيزة</p>
                        <p>الخط الساخن: 16291</p>
                        <p>البريد الاليكتروني: info@shaheen.shop</p>
                    </address>
                    <div class="social-networks">
                        <h2 class="title text-center">مواقع التواصل الاجتماعي</h2>
                        <ul>
                            <li>
                                <a href="https://www.facebook.com/elshaheen.center/"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="https://twitter.com/shaheen_center"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/channel/UC6jOI4UZkhSn5oij0KcHJnA?view_as=subscriber"><i class="fa fa-youtube"></i></a>
                            </li>
                            <li>
                                <a href="https://www.linkedin.com/company/shaheen-center"><i class="fa fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/shaheencenter/"><i class="fa fa-instagram"></i></a>
                            </li>
                            <li>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--/#contact-page-->


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