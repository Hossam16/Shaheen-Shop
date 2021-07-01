<?php include "config.php"?>
<?php include "Slide.php" ?>
<?php
$product_m='active';
$admin='menu-open';
$product_allkks1s23='active';
?>
<?php 
    session_start();
    if(($_SESSION['AID'])>0)
{
}
else

{
    header('Location: login.php');
}
?>

<?php
if(isset($_POST['submit'])){
    // Count total files
    $countfiles = count($_FILES['file']['name']);
    
    // Looping all files
    $successmeso = "";
    $faildmeso   = "";
    for($i=0;$i<$countfiles;$i++){
   $filename = $_POST['submit'];
   
   //Check the Dimensions of the Image
   $image_info = getimagesize($_FILES['file']['tmp_name'][$i]);
   $image_width = $image_info[0];
   $image_height = $image_info[1];
   
   if($image_width==260 && $image_height==329)
   {
       //Check if the Image extension is jpg or not
      if(explode(".",$filename)[1]=='jpg')
      {
             // Upload file
             if(unlink('../images/home/'.$filename))
             {
               if(move_uploaded_file($_FILES['file']['tmp_name'][$i],'../images/home/'.$filename))
               {
                 $successmeso = $successmeso . $filename . " " ."DONE" . "<br>";
               }else
               {
                 $faildmeso = $faildmeso . $filename . " " ."Server Error" . "<br>";
               }
            }else
            {
             if(move_uploaded_file($_FILES['file']['tmp_name'][$i],'../images/home/'.$filename))
               {
                 $successmeso = $successmeso . $filename . " " ."DONE" . "<br>";
               }else
               {
                 $faildmeso = $faildmeso . $filename . " " ."Server Error" . "<br>";
               }
            }
      }else
      {
       $faildmeso = $faildmeso . $filename . " " ."Not Right Extension (jpg)" . "<br>";
      }
   }else
   {
     $faildmeso = $faildmeso . $filename . " " ."Not Right Dimensions" . "<br>";;
   }
       
    }
   }


   if(isset($_POST['submitWCM'])){
    // Count total files
    $countfiles = count($_FILES['file']['name']);
    
    // Looping all files
    $successmeso = "";
    $faildmeso   = "";
    for($i=0;$i<$countfiles;$i++){
   $filename = $_POST['submitWCM'];
   
   //Check the Dimensions of the Image
   $image_info = getimagesize($_FILES['file']['tmp_name'][$i]);
   $image_width = $image_info[0];
   $image_height = $image_info[1];
   
   if($image_width==188 && $image_height==118)
   {
       //Check if the Image extension is jpg or not
      if(explode(".",$filename)[1]=='jpg')
      {
             // Upload file
             if(unlink('../images/home/'.$filename))
             {
               if(move_uploaded_file($_FILES['file']['tmp_name'][$i],'../images/home/'.$filename))
               {
                 $successmeso = $successmeso . $filename . " " ."DONE" . "<br>";
               }else
               {
                 $faildmeso = $faildmeso . $filename . " " ."Server Error" . "<br>";
               }
            }else
            {
             if(move_uploaded_file($_FILES['file']['tmp_name'][$i],'../images/home/'.$filename))
               {
                 $successmeso = $successmeso . $filename . " " ."DONE" . "<br>";
               }else
               {
                 $faildmeso = $faildmeso . $filename . " " ."Server Error" . "<br>";
               }
            }
      }else
      {
       $faildmeso = $faildmeso . $filename . " " ."Not Right Extension (jpg)" . "<br>";
      }
   }else
   {
     $faildmeso = $faildmeso . $filename . " " ."Not Right Dimensions" . "<br>";;
   }
       
    }
   }
?>

<!DOCTYPE html>
<html>
<?php include"head.php";?>

<body class="hold-transition sidebar-mini layout-fixed" >

<?php include"layout.php";?>

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
                <?php if(isset($successmeso)){ ?>
                <div class="col-md-12">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Success</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php echo $successmeso; ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
                <?php } ?>
                </div>

                <div class="row">
                <?php if(isset($faildmeso)){ ?>
                <div class="col-md-12">
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Faild</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php echo $faildmeso; ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
                <?php } ?>
                </div>
                
        <div class="row">
            <div class="col-12">
                    <div class="card-header">
                        <h3 class="card-title">Slider</h3>
                    </div>


                    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">البانر الجانبي</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                
                <div class="row">
                <div class="col-12">
                <img src="https://shaheen.center/images/home/shipping.jpg<?php echo  "?" . time(); ?>">
                </div>
                </div>

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
                
                <div class="col-12">
                <div class="form-group">
                <button type="submit" class="btn btn-block btn-default" name='submit' value="shipping.jpg">Update</button>
                </div>
                </div>
                </div>
                <!-- /.card-body -->
              </form>

            </div>



            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">البانر الجانبي</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                
                <div class="row">
                <div class="col-12">
                <img src="https://shaheen.center/images/home/WCM.jpg<?php echo  "?" . time(); ?>">
                </div>
                </div>

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
                <div class="col-12">
                <div class="form-group">
                <button type="submit" class="btn btn-block btn-default" name='submitWCM' value="WCM.jpg">Update</button>
                </div>
                </div>
                </div>
                <!-- /.card-body -->
              </form>

            </div>


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
