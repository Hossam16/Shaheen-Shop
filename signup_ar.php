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
if(isset($_POST['signup'])){
    $fname = mysqli_real_escape_string($conn1->datacon(),$_POST['fname']);
    $lname = mysqli_real_escape_string($conn1->datacon(),$_POST['lname']);
    $gender = mysqli_real_escape_string($conn1->datacon(),$_POST['gender']);
    $phone = mysqli_real_escape_string($conn1->datacon(),$_POST['phone']);
    $pass_word = mysqli_real_escape_string($conn1->datacon(),$_POST['pass']);
    $location = mysqli_real_escape_string($conn1->datacon(),$_POST['address']);
    $gover = mysqli_real_escape_string($conn1->datacon(),$_POST['city']);
    $mail = mysqli_real_escape_string($conn1->datacon(),$mail);
    $username = mysqli_real_escape_string($conn1->datacon(),$username);

    $customer = new User($fname,$lname,$gender,$mail,$phone,$username,$pass_word,$location,$gover);
    $customer->AddUser($customer);
    $_SESSION['username']=$username;
    $_SESSION['type']='old';
    $msg = 'true';
    $Uid= mysqli_query($conn1->datacon(),"SELECT ID FROM user WHERE username='".$username."' AND password='".$pass_word."'") or die(mysqli_error());
    while ($row = $Uid->fetch_assoc()) {
        $_SESSION['id']=$row['ID'];
    }
    $_SESSION['last_time']=time();
    echo "<script type=\"text/javascript\">
window.location = \"index.php\"
</script>";
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


<section id="form" style="direction: rtl;text-align-last: center;"><!--form-->
    <div class="container">
        <div class="row" style="text-align: -webkit-center;">
            <div class="col-sm-4" style="float: none; width: 100%;">
                <div class="signup-form"><!--sign up form-->
                    <h2 style="font-weight: 700">?????????? ???????? ????????  !</h2>
                    <form role="form" method="post">
                        <input type="text" autocomplete="off" name="fname" placeholder="?????????? ??????????" oninvalid="this.setCustomValidity('?????????? ?????????? ?????????? ?????????? ???????? ???????????? ???? ??????????')" pattern="[a-zA-Z0-9-_. \
\u0620-\u063F\u0641-\u064A\u066E-\u066F\u0671-\u06D3\u06D5\
\u06E5-\u06E6\u06EE-\u06EF\u06FA-\u06FC\u06FF\u0750-\u077F\
\u08A0\u08A2-\u08AC\uFB50-\uFBB1\uFBD3-\uFD3D\uFD50-\uFD8F\
\uFD92-\uFDC7\uFDF0-\uFDFB\uFE70-\uFE74\uFE76-\uFEFC]{3,15}" oninput="setCustomValidity('')" required/>
                        <input type="text" autocomplete="off" name="lname" placeholder="?????? ??????????????" oninvalid="this.setCustomValidity('?????????? ?????????? ?????? ?????????????? ???????? ???????????? ???? ?????????? ')" pattern="[a-zA-Z0-9-_. \
\u0620-\u063F\u0641-\u064A\u066E-\u066F\u0671-\u06D3\u06D5\
\u06E5-\u06E6\u06EE-\u06EF\u06FA-\u06FC\u06FF\u0750-\u077F\
\u08A0\u08A2-\u08AC\uFB50-\uFBB1\uFBD3-\uFD3D\uFD50-\uFD8F\
\uFD92-\uFDC7\uFDF0-\uFDFB\uFE70-\uFE74\uFE76-\uFEFC]{3,15}" oninput="setCustomValidity('')" required/>
                        <input type="text" name="uname" placeholder="?????? ????????????????" value="<?php echo $username;?>" disabled required/>
                        <input pattern="[0-9]{8,11}" oninvalid="this.setCustomValidity('?????? ???????????? ?????? ???? ???????? ???????? ???? 11 ?????? ')" oninput="setCustomValidity('')" name="phone" placeholder="?????? ????????????" required/>
                        <input type="text" name="address" placeholder="?????????????? ????????????" required/>
                        <select name="city" style="text-align-last: center;">
                        <option value='Cairo'>??????????????</option>
                        <option value='Giza'>????????????</option>
                        <option value='Alexandria'>????????????????????</option>
                        <option value='Suez'>????????????</option>
                        <option value='Port Said'>??????????????</option>
                        <option value='Ismailia'>??????????????????????</option>
                        <option value='Damietta'>??????????</option>
                        <option value='Beheira'>??????????????</option>
                        <option value='Dakahlia'>????????????????</option>
                        <option value='Gharbia'>??????????????</option>
                        <option value='Kafr El Sheikh'>????????????????</option>
                        <option value='Matruh'>??????????</option>
                        <option value='Monufia'>????????????????</option>
                        <option value='Qalyubia'>??????????????????</option>
                        <option value='Sharqia'>??????????????</option>
                        <option value='North Sinai'>???????? ??????????</option>
                        <option value='South Sinai'>???????? ??????????</option>
                        <option value='New Valley'>???????????? ????????????</option>
                        <option value='Red Sea'>?????????? ????????????</option>
                        <option value='Faiyum'>????????????</option>
                        <option value='Minya'>????????????</option>
                        <option value='Qena'>??????</option>
                        <option value='Beni Suef'>?????? ????????</option>
                        <option value='Asyut'>??????????</option>
                        <option value='Sohag'>??????????</option>
                        <option value='Luxor'>????????????</option>
                        <option value='Aswan'>??????????</option>
                        </select>
                        <input type="email" name="mail" placeholder="Email Address" value="<?php echo $mail;?>" disabled required/>
                        <input type="password" name="pass" placeholder="???????? ????????" value="<?php echo $pass;?>" id="password" required/>
                        <input type="password" placeholder="?????????? ???????? ????????" id="confirm_password" required/>
                        <label style="font-size: 20px;">??????</label>
                        <input style="height: 35px;" type="radio" name="gender" value="male">
                        <label style="font-size: 20px;">????????</label>
                        <input style="height: 35px;" type="radio" name="gender" value="female">
                        <button type="submit" class="btn btn-default" name="signup">?????????? ????????</button>
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


<div> <?php include 'brandslider_ar.php'?></div>
<?php include 'footer_ar.php'?>



</body>
