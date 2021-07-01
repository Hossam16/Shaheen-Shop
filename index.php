<?php
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: -1'); 
include "StartSession.php";
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if (strpos($actual_link, 'center')) {
  $actual_link = str_replace("center", "shop", $actual_link);
  header("Location:  $actual_link");
}
?>
<!DOCTYPE html>
<html>

<head>
  <!-- Google Tag Manager -->
  <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-KHXFQ65');
  </script>
  <!-- End Google Tag Manager -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Shaheen.Shop</title>
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
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
  <meta http-equiv="Pragma" content="no-cache" />
  <meta http-equiv="Expires" content="0" />

</head>

<body>
  <?php include 'config.php' ?>
  <?php
  $connPopUp = new config();
  $sqlPopUp = 'SELECT * FROM `popuphotoffer` WHERE popuphotoffer.Stutes=1 ORDER BY RAND() LIMIT 2;';
  $resultPopUp = $connPopUp->datacon()->query($sqlPopUp);
  if (mysqli_num_rows($resultPopUp) == 2) {
    $io = 1;
    while ($rowPopUp = $resultPopUp->fetch_assoc()) {
      if ($io == 1) {
        $pop01 = $rowPopUp['PID'];
        $popPhoto01 = $rowPopUp['PhotoAd'];
        $io++;
      } else {
        $pop02 = $rowPopUp['PID'];
        $popPhoto02 = $rowPopUp['PhotoAd'];
      }
    }
  ?>
    <style>
      body {
        font-family: Arial, Helvetica, sans-serif;
      }

      /* The Modal (background) */
      .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        padding-top: 100px;
        /* Location of the box */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
      }

      /* Modal Content */
      .modal-content {
        position: relative;
        background-color: #fefefe;
        margin: auto;
        padding: 0;
        width: 80%;
        -webkit-animation-name: animatetop;
        -webkit-animation-duration: 0.4s;
        animation-name: animatetop;
        animation-duration: 0.4s;
        background-color: rgba(0, 0, 0, 0);
        border: 0;
        box-shadow: none;
      }

      /* Add Animation */
      @-webkit-keyframes animatetop {
        from {
          top: -300px;
          opacity: 0
        }

        to {
          top: 0;
          opacity: 1
        }
      }

      @keyframes animatetop {
        from {
          top: -300px;
          opacity: 0
        }

        to {
          top: 0;
          opacity: 1
        }
      }

      /* The Close Button */
      .close {
        color: white;
        float: right;
        font-size: 28px;
        font-weight: bold;
      }

      .close:hover,
      .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
      }

      .modal-header {
        padding: 2px 16px;
        background-color: #5cb85c;
        color: white;
      }

      .modal-body {
        padding: 0px 0px;
      }

      .modal-footer {
        padding: 2px 16px;
        background-color: #5cb85c;
        color: white;
      }
    </style>
    <!-- The Modal -->
    <div id="myModal" onclick="closedisplay()" class="modal" style="z-index: 16;">

      <!-- Modal content -->
      <div class="modal-content">
        <div class="modal-body" style="text-align-last: center;">
          <button type="button" class="close" data-dismiss="modal" style="opacity: 1;">×</button>
          <div>
            <a href="single_ar.php?ID=<?php echo $pop01 ?>"> <img src="images\popup\<?php echo $popPhoto01 ?>" style="max-width: -webkit-fill-available; 
  border-radius: 25px; width:500px;"> </a>
          </div>
        </div>


      </div>
    </div>

    <!-- The Modal -->
    <div id="myModal02" onclick="closedisplay02()" class="modal" style="z-index: 16;">

      <!-- Modal content -->
      <div class="modal-content">
        <div class="modal-body" style="text-align-last: center;">
          <button type="button" class="close" data-dismiss="modal" style="opacity: 1;">×</button>
          <div>
            <a href="single_ar.php?ID=<?php echo $pop02 ?>"> <img src="images\popup\<?php echo $popPhoto02 ?>" style="max-width: -webkit-fill-available; 
  border-radius: 25px;width:500px;"> </a>
          </div>
        </div>


      </div>
    </div>



    <script>
      // Get the modal
      var modal = document.getElementById("myModal");
      var modal02 = document.getElementById("myModal02");
      // Get the button that opens the modal
      var btn = document.getElementById("myBtn");

      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];

      setTimeout(function() {
        modal.style.display = "block";
      }, 5000);

      setTimeout(function() {
        modal02.style.display = "block";
      }, 120000);

      function closedisplay() {
        modal.style.display = "none";
      }

      function closedisplay02() {
        modal02.style.display = "none";
      }
      // When the user clicks the button, open the modal 
      btn.onclick = function() {
        modal.style.display = "block";
      }

      // When the user clicks on <span> (x), close the modal
      span.onclick = function() {
        modal.style.display = "none";
      }

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
      }
    </script>
  <?php } ?>
  <?php include 'header_ar.php' ?>
  <?php include 'slider_ar.php' ?>
  <?php include 'homecat_ar.php' ?>
  <?php include 'homecontent_ar.php' ?>

  <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>

  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.scrollUp.min.js"></script>
  <script src="js/price-range.js"></script>
  <script src="js/jquery.prettyPhoto.js"></script>
  <script src="js/main.js"></script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


  <div> <?php include 'brandslider_ar.php' ?></div>
  <style>
    @media only screen and (max-width: 600px) {
      #scrollUpp {
        display: block !important;
      }

    }
  </style>
  <?php include 'footer_ar.php' ?>





  <!--Start of Tawk.to Script-->
  <script type="text/javascript">
    var Tawk_API = Tawk_API || {},
      Tawk_LoadStart = new Date();
    (function() {
      var s1 = document.createElement("script"),
        s0 = document.getElementsByTagName("script")[0];
      s1.async = true;
      s1.src = 'https://embed.tawk.to/5fda3922df060f156a8db882/1epm6uchk';
      s1.charset = 'UTF-8';
      s1.setAttribute('crossorigin', '*');
      s0.parentNode.insertBefore(s1, s0);
    })();
  </script>
  <!--End of Tawk.to Script-->

</body>

</html>