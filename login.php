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
window.location = \"signup.php\"
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
window.location = \"index_en.php\"
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
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>
<body>


<?php include 'header.php'?>
<section id="form" style="text-align-last: center;"><!--form-->
    <div class="container" style="text-align: -webkit-center;">
        <div class="row">
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
            <div class="col-sm-4 col-sm-offset-1" id="perc40" style="margin: 0px;">
                <div class="login-form"><!--login form-->
                    <h2>Login to your account</h2>
                    <form role="form" method="post">
                        <?php if($msg== 'false'){ ?>
                        <input type="text" name="username" placeholder="UserName" value="<?php echo $name;?>" oninvalid="this.setCustomValidity('Please Enter a Valid Name Without any Space')" oninput="setCustomValidity('')" pattern="[^' ']+" required/>
                        <?php }else{?>
                        <input type="text" name="username" placeholder="UserName" oninvalid="this.setCustomValidity('Please Enter a Valid Name Without any Space')" oninput="setCustomValidity('')" pattern="[^' ']+" required/>
                        <?php }?>
                        <input type="password" name="password" placeholder="Password" required/>
                        <span>
								<input type="checkbox" class="checkbox">
								Keep me signed in
							</span>
                        <button type="submit" class="btn btn-default" name="login">Login</button>
                    </form>
                    <?php if($msg=='false'){ ?>
                    <h5 style="color: red;">Username OR Password is Wrong Please Try Again.</h5>
                    <?php } ?>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1" id="perc20">
                <h2 class="or">OR</h2>
            </div>
            <div class="col-sm-4" id="perc40">
                <div class="signup-form"><!--sign up form-->
                    <h2>New User Signup!</h2>
                    <form role="form" method="post" >
                        <?php if ($msg =='false2'){?>
                            <input type="text" placeholder="Name" name="username" value="<?php echo $name;?>" oninvalid="this.setCustomValidity('Please Enter a Valid Name Without any Space')" oninput="setCustomValidity('')" pattern="[^' ']+"  required/>
                            <input type="email" placeholder="Email Address" name="mail" value="<?php echo $mai; ?>" required/>
                            <input type="password" placeholder="Password" name="pass" value="<?php echo $pass;?>" required>
                        <?php }else{ ?>
                        <input type="text" placeholder="Name" name="username" oninvalid="this.setCustomValidity('Please Enter a Valid Name Without any Space')" oninput="setCustomValidity('')" pattern="[^' ']+" required/>
                        <input type="email" placeholder="Email Address" name="mail" required/>
                        <input type="password" placeholder="Password" name="pass" required/>
                        <?php } ?>
                        <button type="submit" class="btn btn-default" name="signup">Signup</button>
                    </form>
                    <?php if($msg=='false2'){ ?>
                        <h5 style="color: red;">This Username Already Used Try Something else.</h5>
                    <?php } ?>
                </div><!--/sign up form-->
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


<?php include 'footer.php'?>



</body>
</html>