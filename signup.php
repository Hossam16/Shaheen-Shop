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
// if(isset($_POST['signup'])){
//     $fname = mysqli_real_escape_string($conn1->datacon(),$_POST['fname']);
//     $lname = mysqli_real_escape_string($conn1->datacon(),$_POST['lname']);
//     $gender = mysqli_real_escape_string($conn1->datacon(),$_POST['gender']);
//     $phone = mysqli_real_escape_string($conn1->datacon(),$_POST['phone']);
//     $pass_word = mysqli_real_escape_string($conn1->datacon(),$_POST['pass']);
//     $location = mysqli_real_escape_string($conn1->datacon(),$_POST['address']);
//     $gover = mysqli_real_escape_string($conn1->datacon(),$_POST['city']);

//     $customer = new User($fname,$lname,$gender,$mail,$phone,$username,$pass_word,$location,$gover);
//     $customer->AddUser($customer);
//     $_SESSION['username']=$username;
//     $_SESSION['type']='old';
//     $msg = 'true';
//     $Uid= mysqli_query($conn1->datacon(),"SELECT ID FROM user WHERE username='".$username."' AND password='".$pass_word."'") or die(mysqli_error());
//     while ($row = $Uid->fetch_assoc()) {
//         $_SESSION['id']=$row['ID'];
//     }
//     $_SESSION['last_time']=time();
//     echo "<script type=\"text/javascript\">
// window.location = \"index_en.php\"
// </script>";
// }


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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="icon" href="images/home/tab.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
<?php include 'header.php'?>


<section id="form" style="text-align-last: center;"><!--form-->
    <div class="container">
        <div class="row" style="text-align: -webkit-center;">
            <div class="col-sm-4" style="float: none; width: 100%;">
                <div class="signup-form"><!--sign up form-->
                    <h2 style="font-weight: 700;">New User Signup!</h2>
                    <form role="form" method="post">
                        <input type="text" autocomplete="off" name="fname" placeholder="First Name" oninvalid="this.setCustomValidity('Please Enter a Valid Name Without any Number')" pattern="[A-Za-z]{3,50}" oninput="setCustomValidity('')" required/>
                        <input type="text" autocomplete="off" name="lname" placeholder="Last Name" oninvalid="this.setCustomValidity('Please Enter a Valid Name Without any Number')" pattern="[A-Za-z]{3,50}" oninput="setCustomValidity('')" required/>
                        <input type="text" name="uname" placeholder="UserName" value="<?php echo $username;?>" disabled required/>
                        <input pattern="[0-9]{8,11}" oninvalid="this.setCustomValidity('Mobile must be 11 number')" oninput="setCustomValidity('')" name="phone" placeholder="Phone Number" required/>
                        <input type="text" name="address" placeholder="Address" required/>
                        <select name="city" style="text-align-last: center;">
                        <option value='Cairo'>Cairo</option>
                        <option value='Alexandria'>Alexandria</option>
                        <option value='Aswan'>Aswan</option>
                        <option value='Asyut'>Asyut</option>
                        <option value='Beheira'>Beheira</option>
                        <option value='Beni Suef'>Beni Suef</option>
                        <option value='Dakahlia'>Dakahlia</option>
                        <option value='Damietta'>Damietta</option>
                        <option value='Faiyum'>Faiyum</option>
                        <option value='Gharbia'>Gharbia</option>
                        <option value='Giza'>Giza</option>
                        <option value='Ismailia'>Ismailia</option>
                        <option value='Kafr El Sheikh'>Kafr El Sheikh</option>
                        <option value='Luxor'>Luxor</option>
                        <option value='Matruh'>Matruh</option>
                        <option value='Minya'>Minya</option>
                        <option value='Monufia'>Monufia</option>
                        <option value='New Valley'>New Valley</option>
                        <option value='North Sinai'>North Sinai</option>
                        <option value='Qalyubia'>Qalyubia</option>
                        <option value='Qena'>Qena</option>
                        <option value='Red Sea'>Red Sea</option>
                        <option value='Sharqia'>Sharqia</option>
                        <option value='Sohag'>Sohag</option>
                        <option value='South Sinai'>South Sinai</option>
                        <option value='Suez'>Suez</option>
                        </select>
                        <input type="email" name="mail" placeholder="Email Address" value="<?php echo $mail;?>" disabled required/>
                        <input type="password" name="pass" placeholder="Password" value="<?php echo $pass;?>" id="password" required/>
                        <input type="password" placeholder="Confirm Password" id="confirm_password" required/>
                        <label>Male</label>
                        <input style="height: 25px;" type="radio" name="gender" value="male">
                        <label>Female</label>
                        <input style="height: 25px;" type="radio" name="gender" value="female">
                        <div class="g-recaptcha" data-sitekey="6Ld7F70ZAAAAAI4T-2CRY75ETZc9ClvII2QFAYQM" style="margin-bottom: 10px;"></div>
                        <button type="submit" class="btn btn-default" name="signup">Signup</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->


<?php

if(isset($_POST['g-recaptcha-response']))
{
	$response = $_POST["g-recaptcha-response"];

	$url = 'https://www.google.com/recaptcha/api/siteverify';
	$data = array(
		'secret' => '6Ld7F70ZAAAAABJy-I6vkWR0ALDwwbfCk-xu1uvR',
		'response' => $_POST["g-recaptcha-response"]
	);
	$options = array(
		'http' => array (
			'method' => 'POST',
			'content' => http_build_query($data)
		)
	);
	$context  = stream_context_create($options);
	$verify = file_get_contents($url, false, $context);
    $captcha_success=json_decode($verify);
    echo $captcha_success;

	if ($captcha_success->success==false) {
		echo "<p>You are a bot! Go away!</p>";
	} else if ($captcha_success->success==true) {
		echo "<p>You are not not a bot!</p>";
	}
}
 ?>


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
<?php include 'footer.php'?>



</body>
