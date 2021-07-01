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

    <section id="do_action" style="direction: rtl;">
        <div class="container">
            <div class="heading" style="text-align: center;">
                <h1 style="margin-top: 0px;"> <i class="fa fa-user"></i></h1>
                <h3 style="margin-top: 5px;">أهلا <?php echo $user;?></h3>
                <p>تستطيع تغير معلوماتك الشخصية اسفل هنا !</p>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="chose_area" style="text-align-last: center;padding-right: 25px;">
                        <ul class="user_info" style="margin-top: 0px;padding-right: 0px;">
                            <p style="font-size: 19px; font-weight: 700">المعلومات الشخصية:</p>
                        </ul>
                        <form method="post">
                        <ul class="user_info" style="padding-right: 0px;">
                            <li class="single_field" style="width: 100%">
                                <label>الأسم الأول:</label>
                                <input type="text" name="fname" oninvalid="this.setCustomValidity('Please Enter a Valid Name Without any Number')" pattern="[a-zA-Z0-9-_. \
\u0620-\u063F\u0641-\u064A\u066E-\u066F\u0671-\u06D3\u06D5\
\u06E5-\u06E6\u06EE-\u06EF\u06FA-\u06FC\u06FF\u0750-\u077F\
\u08A0\u08A2-\u08AC\uFB50-\uFBB1\uFBD3-\uFD3D\uFD50-\uFD8F\
\uFD92-\uFDC7\uFDF0-\uFDFB\uFE70-\uFE74\uFE76-\uFEFC]{3,50}" oninput="setCustomValidity('')" value="<?php echo $fname;?>" required>

                            </li>
                            <li class="single_field" style="width: 100%">
                                <label>الأسم الاخير:</label>
                                <input type="text" name="lname" oninvalid="this.setCustomValidity('Please Enter a Valid Name Without any Number')" pattern="[a-zA-Z0-9-_. \
\u0620-\u063F\u0641-\u064A\u066E-\u066F\u0671-\u06D3\u06D5\
\u06E5-\u06E6\u06EE-\u06EF\u06FA-\u06FC\u06FF\u0750-\u077F\
\u08A0\u08A2-\u08AC\uFB50-\uFBB1\uFBD3-\uFD3D\uFD50-\uFD8F\
\uFD92-\uFDC7\uFDF0-\uFDFB\uFE70-\uFE74\uFE76-\uFEFC]{3,50}" oninput="setCustomValidity('')" value="<?php echo $lname;?>" required>

                            </li>
                        </ul>
                        <ul class="user_info" style="padding-right: 0px;">
                            <li class="single_field" style="width: 100%">
                                <label>أسم المستخدم:</label>
                                <input type="text" value="<?php echo $username;?>" disabled>

                            </li>
                        </ul>
                        <ul class="user_info" style="padding-right: 0px;">
                            <li class="single_field" style="width: 100%">
                                <label>بريد اليكتروني:</label>
                                <input type="text" name="mail" value="<?php echo $mail;?>" disabled>

                            </li>
                        </ul>
                        <ul class="user_info" style="padding-right: 0px;">
                            <li class="single_field" style="width: 100%;">
                                <label>العنوان:</label>
                                <input type="text" name="location" value="<?php echo $location;?>">

                            </li>
                        </ul>
                        <ul class="user_info" style="padding-right: 0px;">
                            <li class="single_field" style="width: 100%;">
                                <label>المحافظة:</label>
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
                                    <label>تليفون:</label>
                                    <input pattern="[0-9]{8,11}" oninvalid="this.setCustomValidity('Mobile must be 11 number')" oninput="setCustomValidity('')" name="phone" placeholder="+2" required/>
                                </li>
                            </ul>
                        <ul class="user_info" style="padding-right: 0px;">
                            <li class="single_field" style="width: 100%;">
                                <label>كلمة السر الحالية:</label>
                                <input type="password" name="oldpassword" required>

                            </li>
                        </ul>
                            <ul class="user_info"style="padding-right: 0px;">
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
                        <ul class="single_field" style="    text-align: -webkit-center;padding-right: 0px;">
                            <li style="text-align: -webkit-center; width: 50%">
                                <button type="submit" class="btn btn-default btn-block update" style="margin: 0px; width: 100%" name="UpdateInfo" id="myCheck">تحديث</i></button>
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


<div> <?php include 'brandslider_ar.php'?></div>
<?php include 'footer_ar.php'?>



</body>
</html>