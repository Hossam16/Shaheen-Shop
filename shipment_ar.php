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
                <h2 class="title text-center"> سياسة <strong>  الشحن </strong></h2>
                <h2>سياسة الشحن</h2>
                <h2>تمتع بأفضل تجربة تسوق أون لاين للأجهزة الكهربائية والمفروشات المنزلية والإلكترونيات في مصر</h2>
                <h2>فقط قم بطلب المنتج وسيكون بين يديك في غضون 3 أيام فقط!</h2>
                <p>شكرًا لثقتك في شاهين.شوب! ستجد في هذه الصفحة كافة المعلومات اللازمة عن سياسة الشحن والتسليم الخاصة بشاهين.شوب:
                    -	سيتم شحن طلبك في غضون 3 أيام فقط(إذا كنت من سكان كلاً من الجيزة والإسكندرية وطنطا والقاهرة) وفي غضون 7 أيام فقط (إذا كنت من سكان مدن الصعيد)
                    <br>-	يبدأ حساب وقت الشحن من اليوم الذي قمت فيه بعمل طلب الشراء وحتى اليوم الذي يقوم فيه أحد مندوبي الشحن بتسليم الطلب.
                    <br>-	سيتم الشحن حتى باب منزلك، إلا إذا اخترت مكانًا آخر لاستلام الطلب.
                    <br>-	نوفر خدمة التوصيل على جميع المنتجات المعروضة، مهما كان وزنها أو حجمها.
                    <br>-	يمكنك متابعة حالة طلبك لمعرفة موعيد التسليم خطوة بخطوة.
                    <br>-	نوفر العديد من عروض الشحن المجانية بشكل منتظم... فتابعونا باستمرار!
                    <br>-	لدينا فريق متكامل لخدمة العملاء والرد على استفسراتكم وملاحظاتكم
                    <br>-	يمكنك طلب المنتجات من خلال الهاتف؛ في حالة تعذر استخدام التطبيق أو الموقع الإلكتروني.
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