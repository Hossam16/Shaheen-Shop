<?php include "config.php" ?>
<?php include "Slide.php" ?>
<?php
$product_m = 'active';
$admin = 'menu-open';
$product_allkks12 = 'active';
?>
<?php
session_start();
if (($_SESSION['AID']) > 0) {
} else {
  header('Location: login.php');
}
?>
<?php

$conn = new config();
$SQL = "SELECT * FROM `sliders` WHERE sliders.header LIKE '%mainslider%' ";
$result =  $conn->datacon()->query($SQL);

if (isset($_POST['Update'])) {
  // Count total files
  $countfiles = count($_FILES['file']['name']);

  // Looping all files
  $successmeso = "";
  $faildmeso   = "";
  for ($i = 0; $i < $countfiles; $i++) {
    $filename = $_FILES['file']['name'][$i];

    //Check the Dimensions of the Image
    $image_info = getimagesize($_FILES['file']['tmp_name'][$i]);
    $image_width = $image_info[0];
    $image_height = $image_info[1];

    if ($image_width == 448 && $image_height == 441) {
      //Check if the Image extension is jpg or not
      if (explode(".", $filename)[1] == 'jpg') {
        // Upload file
        if (unlink('../images/home/' . $filename)) {
          if (move_uploaded_file($_FILES['file']['tmp_name'][$i], '../images/home/' . $filename)) {
            $successmeso = $successmeso . $filename . " " . "DONE" . "<br>";
          } else {
            $faildmeso = $faildmeso . $filename . " " . "Server Error" . "<br>";
          }
        } else {
          if (move_uploaded_file($_FILES['file']['tmp_name'][$i], '../images/home/' . $filename)) {
            $successmeso = $successmeso . $filename . " " . "DONE" . "<br>";
          } else {
            $faildmeso = $faildmeso . $filename . " " . "Server Error" . "<br>";
          }
        }
      } else {
        $faildmeso = $faildmeso . $filename . " " . "Not Right Extension (jpg)" . "<br>";
      }
    } else {
      $faildmeso = $faildmeso . $filename . " " . "Not Right Dimensions" . "<br>";;
    }
  }

  $ID = $_POST['Update'];
  $ID = mysqli_real_escape_string($conn->datacon(), $ID);
  $photo = $filename;
  $photo = mysqli_real_escape_string($conn->datacon(), $photo);
  $ArTitle = $_POST['ArTitle'];
  $ArTitle = mysqli_real_escape_string($conn->datacon(), $ArTitle);
  $ENTitle = $_POST['ENTitle'];
  $ENTitle = mysqli_real_escape_string($conn->datacon(), $ENTitle);
  if ($_POST['Active'] == 1) {
    $header = 'mainslider';
  } elseif ($_POST['Active'] == 0) {
    $header = 'mainslider0';
  }
  $header = mysqli_real_escape_string($conn->datacon(), $header);
  $ArLink = $_POST['ArLink'];
  $ArLink = mysqli_real_escape_string($conn->datacon(), $ArLink);
  $EnLink = $_POST['EnLink'];
  $EnLink = mysqli_real_escape_string($conn->datacon(), $EnLink);
  $textar = $_POST['ArDesc'];
  $textar = mysqli_real_escape_string($conn->datacon(), $textar);
  $text = $_POST['EnDesc'];
  $text = mysqli_real_escape_string($conn->datacon(), $text);
  $SQL = "UPDATE `sliders` SET `name`='$ENTitle',`namear`='$ArTitle',`text`='$text',`textar`='$textar',`link`='$EnLink',`linkar`='$ArLink',`photo`='$photo',`header`='$header' WHERE ID=$ID";
  if ($conn->datacon()->query($SQL)) {
    echo "<script type=\"text/javascript\">
							window.location = \"Sliders.php\"
							</script>";
  } else {
    echo 'ERROR';
  }
}
?>

<?php
if (isset($_POST['UpdateBox'])) {
  $filename = $_FILES['file']['name'][$i];

  //Check the Dimensions of the Image
  $image_info = getimagesize($_FILES['fileBox']['tmp_name'][$i]);
  $image_width = $image_info[0];
  $image_height = $image_info[1];

  if ($image_width == 448 && $image_height == 441) {
    //Check if the Image extension is jpg or not
    if (explode(".", $filename)[1] == 'jpg') {
      // Upload file
      if (unlink('../images/home/' . $filename)) {
        if (move_uploaded_file($_FILES['file']['tmp_name'][$i], '../images/home/' . $filename)) {
          $successmeso = $successmeso . $filename . " " . "DONE" . "<br>";
        } else {
          $faildmeso = $faildmeso . $filename . " " . "Server Error" . "<br>";
        }
      } else {
        if (move_uploaded_file($_FILES['file']['tmp_name'][$i], '../images/home/' . $filename)) {
          $successmeso = $successmeso . $filename . " " . "DONE" . "<br>";
        } else {
          $faildmeso = $faildmeso . $filename . " " . "Server Error" . "<br>";
        }
      }
    } else {
      $faildmeso = $faildmeso . $filename . " " . "Not Right Extension (jpg)" . "<br>";
    }
  } else {
    $faildmeso = $faildmeso . $filename . " " . "Not Right Dimensions" . "<br>";;
  }
}
?>
<!DOCTYPE html>
<html>
<?php include "head.php"; ?>

<body class="hold-transition sidebar-mini layout-fixed">

  <?php include "layout.php"; ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>جميع البنارات</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">عروض</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content" style="direction: rtl;">
      <div class="row">
        <div class="col-12">
          <div class="card-header">
            <h3 class="card-title">Slider</h3>
          </div>



          <?php while ($row = $result->fetch_assoc()) { ?>

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $row['namear']; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                    <div class="col-4">
                      <img src="https://shaheen.center/images/home/<?php echo $row['photo'] ?>">
                      <br>
                      <br>
                      <div class="row" style="direction: ltr;">
                        <div class="card-body">
                          <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile" name="file[]" multiple>
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                              </div>
                              <div class="input-group-append">
                                <span class="input-group-text" id="">Upload</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-4">
                      <label>العنوان</label>
                      <div class="form-group">
                        <input type="text" class="form-control" value="<?php echo $row['namear'] ?>" name="ArTitle" required>
                      </div>
                      <label>Title</label>
                      <div class="form-group">
                        <input type="text" class="form-control" value="<?php echo $row['name'] ?>" name="ENTitle" required>
                      </div>
                      <label>التفعيل</label>
                      <div class="form-group" style="text-align-last:center;">
                        <label>مفعل</label>
                        <input type="radio" class="form-control" placeholder="Enter ..." name="Active" value="1" required <?php if ($row['header'] == 'mainslider') {
                                                                                                                            echo 'checked';
                                                                                                                          } ?>>
                        <br>
                        <label>غير مفعل</label>
                        <input type="radio" class="form-control" placeholder="Enter ..." name="Active" value="0" required <?php if ($row['header'] == 'mainslider0') {
                                                                                                                            echo 'checked';
                                                                                                                          } ?>>
                      </div>
                      <label>Ar Link</label>
                      <div class="form-group">
                        <input type="text" class="form-control" value="<?php echo $row['linkar'] ?>" name="ArLink" required>
                      </div>
                      <label>EN Link</label>
                      <div class="form-group">
                        <input type="text" class="form-control" value="<?php echo $row['link'] ?>" name="EnLink" required>
                      </div>
                    </div>
                    <div class="col-4">
                      <label>Ar Desc</label>
                      <div class="form-group">
                        <textarea class="form-control" rows="10" name="ArDesc" required><?php echo $row['textar'] ?></textarea>
                      </div>
                      <label>EN Desc</label>
                      <div class="form-group">
                        <textarea class="form-control" rows="10" name="EnDesc" required><?php echo $row['text'] ?></textarea>
                        </textarea>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <button class="btn btn-block btn-default" name="Update" value="<?php echo $row['ID'] ?>">Update</button>
                      </div>
                    </div>
                  </div>
                  <br>
                </div>
                <!-- /.card-body -->
              </form>
            </div>
          <?php } ?>


          <?php
          $conn = new config();
          $sql = 'SELECT * FROM `sliders` WHERE sliders.header="PromoBox"';
          $result = $conn->datacon()->query($sql);
          $row = $result->fetch_assoc();
          ?>
          <?php if ($row != NULL) { ?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12" style="text-align: center">
                      <img src="https://shaheen.center/images/shop/<?php echo $row['photo']; ?>">
                      <br>
                      <br>
                    </div>
                  </div>
                  <div class="row" style="direction: ltr;">
                    <div class="col-12">
                      <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile" name="fileBox[]" multiple>
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>
                          <div class="input-group-append">
                            <span class="input-group-text" id="">Upload</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row" style="direction: ltr;">
                    <div class="col-12">
                      <label>linkAR</label>
                      <div class="form-group">
                        <input class="form-control" rows="10" name="BoxArDesc" required>
                      </div>
                    </div>
                  </div>
                  <div class="row" style="direction: ltr;">
                    <div class="col-12">
                      <label>link</label>
                      <div class="form-group">
                        <input class="form-control" rows="10" name="BoxEnDesc" required>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <button class="btn btn-block btn-default" name="UpdateBox" value="">Update</button>
                    </div>
                  </div>
                </div>
            </div>
            <br>
        </div>
        <!-- /.card-body -->
        </form>
      </div>
    <?php } ?>

  </div>
  <!-- /.card -->
  </div>
  <!-- /.col -->
  </div>
  <!-- /.row -->
  </section>
  <!-- /.content -->
  </div>




  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- bs-custom-file-input -->
  <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      bsCustomFileInput.init();
    });
  </script>
</body>

</html>