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

if(isset($_POST['active99']))
{
  Offer_99($_POST['arText'],$_POST['enText']);
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
              <div class="card-header" style="background-color:#e61414">
                <h3 class="card-title">عروض الـ99</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post">
                <div class="card-body">
                <div class="form-group">
                    <label for="Images">بانر رئيسي</label>
                    <img src="https://shaheen.center/images/home/99Offersss.jpg" alt="">
                    <label for="Images">بانر جانبي</label>
                    <img src="https://shaheen.center/images/home/shippingSideAD.jpg" alt="">
                    <label for="Images">APP</label>
                    <img src="https://shaheen.center/images/home/99offers.jpg" alt="">
                         <br>
                         <div class="col-12">
                    <label for="Images">بانر داخلي</label>
                    <img style="width:100%;" src="https://shaheen.center/images/shop/h76.jpg" alt="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">أعلان البانر الخارجي عربي</label>
                    <textarea type="email" class="form-control" id="exampleInputEmail1" name="arText" placeholder="اشتري كل اللي بيتك محتاجه من اقوي عروض الـ99 في سنتر شاهين و اكبر الماركات وبأقل الاسعار"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">أعلان البانر الخارجي انجليزي</label>
                    <textarea type="email" class="form-control" id="exampleInputEmail1" name="enText" placeholder="Buy everything you need in one of the strongest 99 offers at Shaheen Center, the biggest brands, and at the lowest prices"></textarea>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" style="background-color:#e61414" name="active99">تفعيل</button>
                </div>
              </form>
            </div>



            <div class="card card-primary">
              <div class="card-header" style="background-color:#64ccdd">
                <h3 class="card-title">عروض الصيف</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post">
                <div class="card-body">
                <div class="form-group">
                    <label for="Images">بانر رئيسي</label>
                    <img src="https://shaheen.center/images/home/summeroffersss.jpg" alt="">
                    <label for="Images">بانر جانبي</label>
                    <img src="https://shaheen.center/images/home/shippingSideAD2.jpg" alt="">
                    <label for="Images">APP</label>
                    <img src="https://shaheen.center/images/home/Summerofferss.jpg" alt="">
                         <br>
                         <div class="col-12">
                    <label for="Images">بانر داخلي</label>
                    <img style="width:100%;" src="https://shaheen.center/images/home/h74.jpg" alt="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">أعلان البانر الخارجي عربي</label>
                    <textarea  class="form-control" id="exampleInputEmail1" placeholder="اشتري كل اللي بيتك محتاجه من اقوي عروض الصيف في سنتر شاهين و اكبر الماركات وبأقل الاسعار"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">أعلان البانر الخارجي انجليزي</label>
                    <textarea  class="form-control" id="exampleInputEmail1" placeholder="Buy everything you need in one of the strongest summer offers at Shaheen Center, the biggest brands, and at the lowest prices"></textarea>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" style="background-color:#64ccdd" >تفعيل</button>
                </div>
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
