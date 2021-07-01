<?php include "config.php"?>
<?php
$product_m='active';
$product_mo='menu-open';
$product_allkkout='active';
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
$filename = $_FILES['file']['name'][$i];

//Check the Dimensions of the Image
$image_info = getimagesize($_FILES['file']['tmp_name'][$i]);
$image_width = $image_info[0];
$image_height = $image_info[1];

if($image_width==298 && $image_height==249)
{
    //Check if the Image extension is jpg or not
   if(explode(".",$filename)[1]=='jpg')
   {
        //Check if the image has the right name
        if(strlen( explode(".",$filename)[0])==8)
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
          $faildmeso = $faildmeso . $filename . " " ."Not Right Name" . "<br>";
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




elseif(isset($_POST['submitin']))
 {
   // Count total files
   $countfiles = count($_FILES['file']['name']);
    
   // Looping all files
   $successmes = "";
   $faildmes   = "";
  for($i=0;$i<$countfiles;$i++){
   $filename = $_FILES['file']['name'][$i];
   //Check the Dimensions of the Image
$image_info = getimagesize($_FILES['file']['tmp_name'][$i]);
$image_width = $image_info[0];
$image_height = $image_info[1];


   if($image_width==266 && $image_height==381)
{
    //Check if the Image extension is jpg or not
   if(explode(".",$filename)[1]=='jpg')
   {
        //Check if the image has the right name
        if(strlen( explode(".",$filename)[0])==8)
        {
              // Upload file


              if(unlink('../images/product-details/'.$filename))
          {
            if(move_uploaded_file($_FILES['file']['tmp_name'][$i],'../images/product-details/'.$filename))
            {
              $successmes = $successmes . $filename . " " ."DONE" . "<br>";
            }else
            {
              $faildmes = $faildmes . $filename . " " ."Server Error" . "<br>";
            }
         }else
         {
          if(move_uploaded_file($_FILES['file']['tmp_name'][$i],'../images/product-details/'.$filename))
            {
              $successmes = $successmes . $filename . " " ."DONE" . "<br>";
            }else
            {
              $faildmes = $faildmes . $filename . " " ."Server Error" . "<br>";
            }
         }   
        }else
        {
          $faildmes = $faildmes . $filename . " " ."Not Right Name" . "<br>";
        }
   }else
   {
    $faildmes = $faildmes . $filename . " " ."Not Right Extension (jpg)" . "<br>"; 
   }
}else
{
    $faildmes = $faildmes . $filename . " " ."Not Right Dimensions" . "<br>";
}
   
 }
}
?>

<!DOCTYPE html>
    <html>
<?php include"head.php";?>
<body class="hold-transition sidebar-mini layout-fixed" >
<?php include"layout.php";?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>رفع و تعديل صور</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">تعديل منتج</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="row">
        <div class="col-sm-12">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">صورة خارجية 249*298</h3>
                <img style="float:right;width:35px;" src="dist\img\uploadout.jpg">
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
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
                <!-- /.card-body -->

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

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary"  name='submit'  value='Upload' <?php if($_SESSION['type']=='viewer') {echo'disabled';}?>>Submit</button>
                </div>
              </form>
            </div>


            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">صورة داخلية 381*266</h3>
                <img style="float:right;width:35px;" src="dist\img\uploadin.jpg">
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
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
                <!-- /.card-body -->
                        

                <?php if(isset($successmes)){ ?>
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
                <?php echo $successmes; ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
                <?php } ?>


                <?php if(isset($faildmes)){ ?>
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
                <?php echo $faildmes; ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
                <?php } ?>

                


                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name='submitin'  value='Upload' <?php if($_SESSION['type']=='viewer') {echo'disabled';}?>>Submit</button>
                </div>
              </form>

              
            </div>
          </div>
            </div>
        </div>


        



        
    </section>
    <!-- Main content -->


</div>
<!-- /.content-wrapper -->






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
