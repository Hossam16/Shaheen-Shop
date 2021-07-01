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
                <h2 class="title text-center"> الشحن <strong>  و الاسترجاع </strong></h2>
                <h2>الشحن وسياسة الاسترجاع</h2>
                <h3>هل أنت مستعد لتجربة تسوق أون لاين فريدة من نوعها مع شاهين.شوب؟</h3>
                <h2>شاهين.شوب... أفضل تجربة تسوق أون لاين للأجهزة الكهربائية والمفروشات المنزلية، والأجهزة الإلكترونية في مصر
                    شاهين.شوب... تسوق بأمان والدفع عند الاستلام!
                </h2>
                <p>يمكنك الآن تسوق كافة الأجهزة الإلكترونية والكهربائية، بالإضافة إلى الأجهزة المنزلية والمفروشات والديكورات وغيرهم من مستلزمات تأسيس وفرش المنزل بكل سهولة وأنت جالس في مكانك!</p>
                <h2>تمتع بالعديد من المميزات والخدمات من خلال شاهين.شوب</h2>
                <p>-	تسوق من بين أكثر من 50.000 منتج بجودة عالية وبأفضل الأسعار
                    <br>-	تسوق وأنت في مكانك وسيصلك طلبك حتى باب بيتك في غضون 3 أيام فقط!
                    <br>-	يمكنك استرجاع المنتح في خلال 30 يومًا من الاستلام- بشرط أن يكون في حالته الأصلية
                    <br>-	كما يمكنك استرداد كامل المبلغ المدفوع دون أي خصومات
                </p>
                <h2>رفض استلام الطلب عند التوصيل</h2>
                <p>يمكنك رفض استلام طلبك بعد الشحن، وفي هذه الحالة سيقوم المندوب بخصم قيمة المنتج المرتجع، وسوف تدفع فقط قيمة المنتجات المستلمة.</p>
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