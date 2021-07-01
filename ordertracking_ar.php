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
                <h2 class="title text-center"> تتبع <strong>  الطلب  </strong></h2>
                <h2>شاهين.شوب ... تجربة فريدة للتسوق عبر الإنترنت!</h2>
                <p>هناك بعض الخطوات البسيطة التي يجب عليك اتباعها لطلب المنتج الذي ترغب في شرائه، وهي كما يلي:
                    <br>1.	انقر على زر "اطلب  الآن"
                    <br>2.	سيطلب منك تسجيل الدخول إلى حسابك عن طريق إدخال البريد الإلكتروني وكلمة المرور الخاصة بك
                    <br>3.	أدخل بيانات الشحن /  وطريقة الدفع - باستخدام الموقع الإلكتروني أو التطبيق
                    <br>4.	سيتم عرض طلبك في خانة تتبع الطلب ، تحت مسمى "جديد"
                    <br>5.	سيقوم فريق خدمة العملاء بالاتصال بك لتأكيد الطلب ومعرفة بيانات الشحن وطريقة الدفع.
                    <br>6.	بمجرد تأكيد طلبك، سيتم تغيير حالته إلى "استمرار"
                    <br>7.	وفي خلال 24 ساعة فقط سيتم تغيير حالة الطلب إلى "قيد الشحن"
                    <br>8.	إذا اضطررت إلى إلغاء طلبك - لأي سبب من الأسباب، سيتم تغيير حالته إلى "فقد"
                    <br>9.	وفي خلال 24 ساعة سيتم تغيير حالة الطلب إلى "تم الإلغاء"<br>
                    10.عنداستلام طلبك، سيتم تغيير حالته إلى "تم التسليم"<br>
                    *يرجى العلم أنه دائمًا ما يقوم فريق خدمة العملاء بالاتصال بك لتأكيد الطلب وللحصول على مزيد من البيانات حول طلبك وعنوان التسليم، وطريقة الدفع، وكذلك أفضل وقت لاستلام الطلب.
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