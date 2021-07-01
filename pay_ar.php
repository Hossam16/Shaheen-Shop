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
    <link rel="shortcut icon" href="images/ico/favicon.ico">
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
                <h2 class="title text-center"> طرق <strong>  الدفع </strong></h2>
                <h2>تجربة جديدة لشراء الأجهزة الإلكترونية والكهربائية والمفروشات المنزلية وكل ما يخص الأسرة المصرية</h2>
                <h2>تسوق ... اختار ... اطلب</h2>
                <h2>وسيصلك طلبك حتى باب بيتك في غضون 3 أيام فقط!</h2>
                <p>يقدم شاهين.شوب أفضل تجربة تسوق اون لاين للأجهزة الكهربائية و المفروشات المنزلية والأجهزة الإلكترونية في مصر ... تسوق بأمان والدفع عند الاستلام!
                    تمتع بالتسوق من أي مكان وأدفع فقط عند استلام المنتج والتأكد منه.
                    * يمكنك تأكيد طريقة الدفع من خلال الخطوة الأخيرة من طلب المنتج.
                    * يرجى التواصل مع فريق خدمة العملاء على الرقم 16291 لمزيد من المعلومات والتفاصيل الخاصة بالشحن وطرق الدفع والتوصيل.
                </p>

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