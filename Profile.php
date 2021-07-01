<?php include 'config.php'?>
<?php include "StartSession.php" ;
?>
<?php
    include 'User.php';
    $UData = User::GetUSerData($uid);
    while ($rowud = $UData->fetch_assoc())
    {
        $fname = $rowud['FName'];
        $lname = $rowud['LName'];
        $mobile = $rowud['Phone'];
        $mail = $rowud['Mail'];
        $governorate = $rowud['Governorate'];
        $location = $rowud['Location'];
        $username = $rowud['UserName'];
        $oldpassword = $rowud['Password'];
        $usernamee = $rowud['UserName'];
        $gender = $rowud['Gender'];
    }
?>
<?php
        if(isset($_POST['UpdateInfo'])) {
            $conn =new config();
            $passwordd = mysqli_real_escape_string($conn->datacon(),$_POST['oldpassword']);
            $usernamee = mysqli_real_escape_string($conn->datacon(),$usernamee); // Set variable for the password and convert it to an MD5 hash.
            $search = mysqli_query($conn->datacon(),"SELECT username,password FROM user WHERE username='".$usernamee."' AND password='".$passwordd."'") or die(mysqli_error());
            $match  = mysqli_num_rows($search);
                if($match > 0)
                {
                    $fname = $_POST['fname'];
                    $lname = $_POST['lname'];
                    $location = $_POST['location'];
                    $governorate = $_POST['city'];
                    $mobile = $_POST['phone'];

                    $fname = mysqli_real_escape_string($conn->datacon(),$fname);
                    $lname = mysqli_real_escape_string($conn->datacon(),$lname);
                    $gender = mysqli_real_escape_string($conn->datacon(),$gender);
                    $mail = mysqli_real_escape_string($conn->datacon(),$mail);
                    $mobile = mysqli_real_escape_string($conn->datacon(),$mobile);
                    $username = mysqli_real_escape_string($conn->datacon(),$username);
                    $passwordd = mysqli_real_escape_string($conn->datacon(),$passwordd);
                    $location = mysqli_real_escape_string($conn->datacon(),$location);
                    $governorate = mysqli_real_escape_string($conn->datacon(),$governorate);

                    $updateuser = new User($fname,$lname,$gender,$mail,$mobile,$username,$passwordd,$location,$governorate);
                    $updateuser->UpdateUser($updateuser,$uid);
                }
                else
                {
                    $errormsg = "Please Enter The Right PassWord Or";
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
</head>
<body>
<?php include 'header.php'?>

    <section id="do_action">
        <div class="container">
            <div class="heading" style="text-align: center;">
                <h1> <i class="fa fa-user"></i></h1>
                <h3>Hi <?php echo $user;?></h3>
                <p>You can Change Personal Data Down Here!</p>
            </div>
            <div class="row">
                <div class="col-sm-13">
                    <div class="chose_area" style="text-align-last: center;">
                        <ul class="user_info" style="padding-right: 0px;">
                            <p>Personal Data:</p>
                        </ul>
                        <form method="post">
                        <ul class="user_info" style="padding-right: 0px;">
                            <li class="single_field" style="width: 100%">
                                <label>First Name:</label>
                                <input type="text" name="fname" oninvalid="this.setCustomValidity('Please Enter a Valid Name Without any Number')" pattern="[A-Za-z]{3,50}" oninput="setCustomValidity('')" value="<?php echo $fname;?>" required>

                            </li>
                            <li class="single_field" style="width: 100%">
                                <label>Last Name:</label>
                                <input type="text" name="lname" oninvalid="this.setCustomValidity('Please Enter a Valid Name Without any Number')" pattern="[A-Za-z]{3,50}" oninput="setCustomValidity('')" value="<?php echo $lname;?>" required>

                            </li>
                        </ul>
                        <ul class="user_info" style="padding-right: 0px;">
                            <li class="single_field" style="width: 100%">
                                <label>UserName:</label>
                                <input type="text" value="<?php echo $username;?>" disabled>

                            </li>
                        </ul>
                        <ul class="user_info" style="padding-right: 0px;">
                            <li class="single_field" style="width: 100%">
                                <label>Mail:</label>
                                <input type="text" name="mail" value="<?php echo $mail;?>" disabled>

                            </li>
                        </ul>
                        <ul class="user_info" style="padding-right: 0px;">
                            <li class="single_field" style="width: 100%;">
                                <label>Address:</label>
                                <input type="text" name="location" value="<?php echo $location;?>">

                            </li>
                        </ul>
                        <ul class="user_info" style="padding-right: 0px;">
                            <li class="single_field" style="width: 100%;">
                                <label>Governorate:</label>
                                <select name="city" style="text-align-last: center;">
                                    <option  value="<?php echo $governorate;?>"><?php echo $governorate;?></option>
                                    <option value="Cairo">Cairo</option>
                                    <option value="Giza">Giza</option>
                                    <option value="Port Said">Port Said</option>
                                    <option value="Ismailia">Ismailia</option>
                                    <option value="Suez">Suez</option>
                                    <option value="Ain Sokhna">Ain Sokhna</option>
                                    <option value="Dakahlia">Dakahlia</option>
                                    <option value="Alexandria">Alexandria</option>
                                    <option value="Beheira">Beheira</option>
                                    <option value="Kafr El-Sheikh">Kafr El-Sheikh</option>
                                    <option value="Qaliubiya">Qaliubiya</option>
                                    <option value="Algharbia">Algharbia</option>
                                    <option value="Menoufia">Menoufia</option>
                                    <option value="Alsharqia">Alsharqia</option>
                                    <option value="Damanhur">Damanhur</option>
                                    <option value="Mansoura">Mansoura</option>
                                    <option value="Fayoum">Fayoum</option>
                                    <option value="Bani Sweif">Bani Sweif</option>
                                    <option value="Minya">Minya</option>
                                    <option value="Asyut">Asyut</option>
                                    <option value="Sohag">Sohag</option>
                                    <option value="Qena">Qena</option>
                                    <option value="Alaqsir">Alaqsir</option>
                                    <option value="Aswan">Aswan</option>
                                </select>
                            </li>
                        </ul>
                            </ul>
                            <ul class="user_info" style="padding-right: 0px;">
                                <li class="single_field" style="width: 100%;">
                                    <label>Phone:</label>
                                    <input pattern="[0-9]{8,11}" oninvalid="this.setCustomValidity('Mobile must be 11 number')" oninput="setCustomValidity('')" name="phone" placeholder="+2" required/>
                                </li>
                            </ul>
                        <ul class="user_info" style="padding-right: 0px;">
                            <li class="single_field" style="width: 100%;">
                                <label>Old Password:</label>
                                <input type="password" name="oldpassword" required>

                            </li>
                        </ul>
                            <ul class="user_info" style="padding-right: 0px;">
                            <li class="single_field">
                                <h5 style="color: red;">
                                    <?php
                                    if (isset($errormsg)) {
                                        echo $errormsg;

                                        ?> <a href="contact.php">Contact Us</a>
                                        <?php
                                    }
                                    ?>
                                </h5>
                            </li>
                            </ul>
                        <ul class="single_field" style="    text-align: -webkit-center;">
                            <li style="text-align: -webkit-center; width: 50%">
                                <button type="submit" class="btn btn-default btn-block update" style="margin: 0px; width: 100%" name="UpdateInfo" id="myCheck">Update</i></button>
                            </li>
                        </ul>
                        </form>



                    </div>
                </div>
            </div>
        </div>
    </section><!--/#do_action-->

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
</html>