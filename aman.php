<?php
include 'config.php';
$conn1 =new config();
include 'User.php';
session_start();
if (isset($_SESSION['username'])) {
    $user ='SGuest';
} else {
    $user = 'Guest';
}
    $username = $_SESSION['username'];
    $pass = $_SESSION['password'];
    $mail = $_SESSION['mail'];
?>

<?php
	if(isset($_POST['signup']))
	{
		$conn = new config();
		$name = mysqli_real_escape_string($conn->datacon(),$_POST['name']);
		$IDNum = mysqli_real_escape_string($conn->datacon(),$_POST['IDNum']);
		$address = mysqli_real_escape_string($conn->datacon(),$_POST['address']);
		$exactaddress = mysqli_real_escape_string($conn->datacon(),$_POST['exactaddress']);
		$phone = mysqli_real_escape_string($conn->datacon(),$_POST['phone']);
		$city = mysqli_real_escape_string($conn->datacon(),$_POST['city']);
		$jop = mysqli_real_escape_string($conn->datacon(),$_POST['jop']);
		$sql = "INSERT INTO `aman`(`IDNum`,`Name`, `Address`, `ExactAddress`, `Phone`, `City`, `Job`) VALUES ('$IDNum','$name','$address','$exactaddress','$phone','$city','$jop')";
		if ($conn->datacon()->query($sql)) {
        } else {
            echo "Error: " . $sql . "<br>" . $conn->datacon()->error;
        }
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
<body>
<?php include 'header_ar.php'?>
<section id="advertisement">
        <div class="container">
            <img src="images/home/aman.jpg" alt=""/>
        </div>
    </section>
<section id="form" style="direction: rtl;"><!--form-->
    <div class="container">
        <div class="row" style="text-align: -webkit-center;">
            <div class="col-sm-4" style="float: none; width: 70%;">
                <div class="signup-form"><!--sign up form-->
                    <h2>طلب تقسيط من أمان</h2>
                    <form role="form" method="post">
						<label>الأسم</label>
                        <input type="text" autocomplete="off" name="name" placeholder="الأسم الرباعي كما وارد في بطاقة الرقم القومي" style="font-size: 14px;" required/>
						<label>الرقم القومي</label> 
                        <input pattern="\d{14}" oninvalid="this.setCustomValidity('Mobile must be 11 number')" oninput="setCustomValidity('')" autocomplete="off" name="IDNum" placeholder="الرقم القومي" style="font-size: 14px;" required/>
						<label>العنوان</label>
                        <input type="text" autocomplete="off" name="address" placeholder="العنوان كما وارد في بطاقة الرقم القومي" style="font-size: 14px;" required/>
						<label>عنوان السكن الفعلي</label>
                        <input type="text" autocomplete="off" name="exactaddress" placeholder="العنوان الفعلي" style="font-size: 14px;" required/>
						<label>رقم التليفون</label>
                        <input pattern="[0-9]{8,11}" oninvalid="this.setCustomValidity('Mobile must be 11 number')" oninput="setCustomValidity('')" name="phone" placeholder="+2" required/>
						 <label>المحافظة</label>
                        <select name="city" style="text-align-last: center;">
                            <option value="Cairo">القاهرة</option>
                            <option value="Giza">جيزة</option>
                            <option value="Port Said">بور سعيد</option>
                            <option value="Ismailia">الأسماعلية</option>
                            <option value="Suez">السويس</option>
                            <option value="Ain Sokhna">العين السخنة</option>
                            <option value="Dakahlia">الدقهلية</option>
                            <option value="Alexandria">الأسكندرية</option>
                            <option value="Beheira">بحيرة</option>
                            <option value="Kafr El-Sheikh">كفر الشيخ</option>
                            <option value="Qaliubiya">القليوبية</option>
                            <option value="Algharbia">الغربية</option>
                            <option value="Menoufia">المنوفية</option>
                            <option value="Alsharqia">الشرقية</option>
                            <option value="Damanhur">دمنهور</option>
                            <option value="Mansoura">المنصورة</option>
                            <option value="Fayoum">الفيوم</option>
                            <option value="Bani Sweif">بني سويف</option>
                            <option value="Minya">المنيا</option>
                            <option value="Asyut">اسيوط</option>
                            <option value="Sohag">سوهاج</option>
                            <option value="Qena">قنا</option>
                            <option value="Alaqsir">الاقصر</option>
                            <option value="Aswan">اسوان</option>
                        </select>
						<label>الوظيفة</label>
                        <input type="text" autocomplete="off" name="jop" placeholder="الوظيفة مع توضيح جهة العمل" style="font-size: 14px;" required/>
                        <button type="submit" class="btn btn-default" name="signup">تقديم الطلب</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->

<script>
    var password = document.getElementById("password")
        , confirm_password = document.getElementById("confirm_password");

    function validatePassword(){
        if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
        } else {
            confirm_password.setCustomValidity('');
        }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
</script>
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
<?php include 'footer_ar.php'?>



</body>
