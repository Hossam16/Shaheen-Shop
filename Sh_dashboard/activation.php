<?php include "config.php"?>
<?php include "Slide.php" ?>
<?php
$product_m='active';
$admin='menu-open';
$product_allkks='active';
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

if(isset($_POST['99offers']))
{
  if($_POST['99offers'] == 1)
  {
  Offer_99Active();
  }elseif($_POST['99offers'] == 0)
  {
    Offer_99DisActive();
  }
}
if(isset($_POST['summeroffers']))
{
  if($_POST['summeroffers'] == 1)
  {
    summerOfferActive();
  }elseif($_POST['summeroffers'] == 0)
  {
    summerOfferDisActive();
  }
}
if(isset($_POST['strongestoffers']))
{
  if($_POST['strongestoffers'] == 1)
  {
    heroOfferActive();
  }elseif($_POST['strongestoffers'] == 0)
  {
    heroOfferDisActive();
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
                    <h1>جميع العروض</h1>
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
                        <h3 class="card-title">تفعيل عروض </h3>
                    </div>

                   
                    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">عروض الـ99</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post">
                <div class="card-body">
                <div class="row">
                <div class="col-4"> 
                <button type="submit" class="btn btn-block bg-gradient-info" name="99offers" value="1" <?php if($_SESSION['type']=='viewer') {echo'disabled';}?>>تفعيل عروض الـ 99</button>
                </div>
                <div class="col-4"> 
                <button type="submit" class="btn btn-block bg-gradient-info" name="summeroffers" value="1" <?php if($_SESSION['type']=='viewer') {echo'disabled';}?>>تفعيل عروض الصيف</button>
                </div>
                <div class="col-4"> 
                <button type="submit" class="btn btn-block bg-gradient-info" name="strongestoffers" value="1" <?php if($_SESSION['type']=='viewer') {echo'disabled';}?>>تفعيل عروض البطل</button>
                </div>
                </div>
                <br>
                <div class="row">
                <div class="col-4"> 
                <button type="submit" class="btn btn-block bg-gradient-danger" name="99offers" value="0" <?php if($_SESSION['type']=='viewer') {echo'disabled';}?>>تعطيل عروض الـ 99</button>
                </div>
                <div class="col-4"> 
                <button type="submit" class="btn btn-block bg-gradient-danger" name="summeroffers" value="0" <?php if($_SESSION['type']=='viewer') {echo'disabled';}?>>تعطيل عروض الصيف</button>
                </div>
                <div class="col-4"> 
                <button type="submit" class="btn btn-block bg-gradient-danger" name="strongestoffers" value="0" <?php if($_SESSION['type']=='viewer') {echo'disabled';}?>>تعطيل عروض البطل</button>
                </div>
                </div>
                <div class="form-group">
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




<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>

    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "ordering": false,
            "autoWidth": false,
            "info": true,
        })
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
</body>
</html>
