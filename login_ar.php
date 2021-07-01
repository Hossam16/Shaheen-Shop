<?php
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if (strpos($actual_link, 'center')) {
    $actual_link = str_replace("center", "shop", $actual_link);
    header("Location:  $actual_link");
}
if (isset($_SESSION['username']) AND isset($_SESSION['username'])!= 'SGest') {
    $user = $_SESSION['username'];
} else {
    $user = 'Guest';
    $msg = 'true';
}
?>
<?php
//DB connection
include 'config.php';
$conn =new config();
//------------------//
if(isset($_POST['signup']))
{
    $username = mysqli_real_escape_string($conn->datacon(),$_POST['username']); // Set variable for the username
    $password = mysqli_real_escape_string($conn->datacon(),$_POST['pass']); // Set variable for the password and convert it to an MD5 hash.
    $mail = mysqli_real_escape_string($conn->datacon(),$_POST['mail']); // Set variable for the mail

    $search = mysqli_query($conn->datacon(),"SELECT username, Mail FROM user WHERE username='".$username."'") or die(mysqli_error());
    $match  = mysqli_num_rows($search);
if($match > 0) {
    $name = $username;
    $mai = $mail;
    $pass = $password;
    $msg = 'false2';

}else{
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    $_SESSION['mail'] = $mail;
    $_SESSION['type'] = 'new';
    echo "<script type=\"text/javascript\">
window.location = \"signup_ar.php\"
</script>";
}

}
if(isset($_POST['login'])){
// Both fields are being posted and there not empty
$username = mysqli_real_escape_string($conn->datacon(),$_POST['username']); // Set variable for the username
$password = mysqli_real_escape_string($conn->datacon(),$_POST['password']); // Set variable for the password and convert it to an MD5 hash.
$search = mysqli_query($conn->datacon(),"SELECT username, password FROM user WHERE username='".$username."' AND password='".$password."'") or die(mysqli_error());
$match  = mysqli_num_rows($search);
if($match > 0){
session_start();
$_SESSION['username']=$username;
$_SESSION['type']='old';
$_SESSION['last_time']=time();
$Uid= mysqli_query($conn->datacon(),"SELECT ID FROM user WHERE username='".$username."' AND password='".$password."'") or die(mysqli_error());
while ($row = $Uid->fetch_assoc()) {
    $_SESSION['id']=$row['ID'];
}
$msg = 'true';
echo "<script type=\"text/javascript\">
window.location = \"index.php\"
</script>";

}else{
$name = $username;
$msg = 'false';
}}
// Set cookie / Start Session / Start Download etc...
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
<section id="form" style="direction: rtl; text-align-last: center;"><!--form-->
    <div class="container" style="text-align: -webkit-center;">
        <div class="row">
			<div>
				<style>
				@media only screen and (min-width: 600px) {
    #perc40
    {
        width: 40%;
    }
	 #perc20
	{
		width: 20%;				
	}

}
			</style>
            <div class="col-sm-4 col-sm-offset-1" id="perc40" style="margin-left: 0px;">
                <div class="login-form"><!--login form-->
                    <h2>تسجيل الدخول</h2>
                    <form role="form" method="post">
                        <?php if($msg== 'false'){ ?>
                        <input type="text" name="username" placeholder="أسم المستخدم" value="<?php echo $name;?>" oninvalid="this.setCustomValidity('من فضلك أدخل اسم المستخدم بدون اي مسافات')" oninput="setCustomValidity('')" pattern="[^' ']+" required/>
                        <?php }else{?>
                        <input type="text" name="username" placeholder="أسم المستخدم" oninvalid="this.setCustomValidity('من فضلك أدخل اسم المستخدم بدون اي مسافات')" oninput="setCustomValidity('')" pattern="[^' ']+" required/>
                        <?php }?>
                        <input type="password" name="password" placeholder="كلمة السر" required/>
						<div style="display: inline-block">
                        <span>
							
								<input style="float: right;margin-left:5px;" type="checkbox" class="checkbox" >
							<label style="float: right">تذكرني</label>
							</span>
							</div>
                        <button type="submit" class="btn btn-default" name="login">تسجيل الدخول</button>
                    </form>
                    <?php if($msg=='false'){ ?>
                    <h5 style="color: red;">أسم المستخدم أو كلمة السر غير صحيحه!</h5>
                    <?php } ?>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1" id="perc20">
                <h2 class="or">أو</h2>
            </div>
            <div class="col-sm-4" id="perc40">
                <div class="signup-form"><!--sign up form-->
                    <h2>أنشاء حساب جديد !</h2>
                    <form role="form" method="post" >
                        <?php if ($msg =='false2'){?>
                            <input type="text" placeholder="أسم المستخدم" name="username" value="<?php echo $name;?>" oninvalid="this.setCustomValidity('من فضلك أدخل اسم المستخدم بدون اي مسافات')" oninput="setCustomValidity('')" pattern="[^' ']+"  required/>
                            <input type="email" placeholder="البريد الاليكتروني" name="mail" value="<?php echo $mai; ?>" required/>
                            <input type="password" placeholder="كلمة السر" name="pass" value="<?php echo $pass;?>" required>
                        <?php }else{ ?>
                        <input type="text" placeholder="أسم المستخدم" name="username" oninvalid="this.setCustomValidity('من فضلك أدخل اسم المستخدم بدون اي مسافات')" oninput="setCustomValidity('')" pattern="[^' ']+" required/>
                        <input type="email" placeholder="البريد الاليكتروني" name="mail" required/>
                        <input style="margin-bottom: 20px;" type="password" placeholder="كلمة السر" name="pass" required/>
                        <?php } ?>
                        <button type="submit" class="btn btn-default" name="signup" style="margin-bottom: 4px;">أنشاء حساب</button>
                    </form>
                    <?php if($msg=='false2'){ ?>
                        <h5 style="color: red;">هذا الاسم مستخدم من قبل.</h5>
                    <?php } ?>
                </div><!--/sign up form-->
            </div>
				</div>
        </div>
    </div>
</section><!--/form-->


<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/price-range.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/main.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<?php include 'brandslider_ar.php'?>
<?php include 'footer_ar.php'?>



</body>
</html>