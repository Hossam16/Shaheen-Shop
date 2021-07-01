

<?php include "config.php"?>
<?php




$product_m='active';
$product_mo='menu-open';
$product_all='active';
$msg = 0;
?>

<?php
if(isset($_POST['Name']))
{
  $y = $_POST['coynt'];
  $conn65 =new config();
  for ($i = 0; $i<$y; $i++) {
    $pid = $_POST['Pid'.$i];
    $price = $_POST['Pprice'.$i];
    if(isset($_POST['my-checkbox'.$i]))
    {
      $bsale = 1;
    }
    else
    {
      $bsale = 0;
    }
    $sprice = $_POST['Psaleprice'.$i];
    $stock = $_POST['Pstock'.$i];
    $sid = $_POST['Ps'.$i];
    $sql6655 = "UPDATE products SET products.Price=$price,products.BSale=$bsale,products.SalePrice=$sprice,products.Stock=$stock,products.SID=$sid WHERE products.ID=$pid;";
    mysqli_query($conn65->datacon(),$sql6655);
    $msg=1;
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
          <h1>جميع المنتجات</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">تعديل مجموعة</li>
          </ol>
        </div>
        <div class="col-sm-6">
          <form method="post">
            <input type="text" class="form-control is-valid" id="inputSuccess" placeholder="YYYY-MM-DD" name="firstdate">
            <input type="text" class="form-control is-valid" id="inputSuccess" placeholder="YYYY-MM-DD" name="seconddate">
            <input type="submit" name="Search">
          </form>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <?php if ($msg==1) {?>
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h5><i class="icon fas fa-check"></i> تم بنجاح!</h5>
      تعديل المنتجات المطلوبه
    </div>
  <?php }?>
  <?php
  if(isset($_POST['Search']))
  {
    ?>
    <!-- Main content -->
    <section class="content" style="direction: rtl;">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">تعديل مجموعة</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form method="post">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>تاريخ</th>
                    <th>اسم العميل</th>
                    <th>رقم الموبيل</th>
                    <th>المحافظه</th>
                    <th>العنوان</th>
                    <th>اسم المنتج</th>
                    <th>كود الصوره</th>
                    <th>العدد</th>
                    <th>سعر القطعه</th>
                    <th>المجموع</th>
                    <th>الشحن</th>
                    <th>تكلفة الاوردر</th>
                    <th>الحالة</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $FirstDate=$_POST['firstdate'];
                  $SecondDate=$_POST['seconddate'];
                  $conn652 =new config();
                  $sql652= "select orders.ID, orders.Date,concat(user.FName,' ',user.LName)as usname,orders.Phone,orders.Governorate,orders.Location,products.ArName,products.Photo,orderdata.Count,orderdata.PPrice,orders.SubTotal,orders.Shipping,orders.TotalPrice,orders.Status FROM orders 
                            INNER JOIN orderdata on orders.ID=orderdata.OID INNER JOIN products on orderdata.PID=products.ID INNER JOIN user on orders.UID=user.ID 
                             where Date BETWEEN '$FirstDate 00:00:00' AND '$SecondDate 23:59:59' ORDER BY orders.ID";

                  $result652 = $conn652->datacon()->query($sql652);
                  $gg =0;
                  while ($row652 = $result652->fetch_assoc()){
                    ?>
                    <tr>
                      <td><?php echo $row652['ID']?></td>
                      <td><?php echo $row652['Date']?></td>
                      <td><?php echo $row652['usname'] ?></td>
                      <td><?php echo $row652['Phone'] ?></td>
                      <td><?php echo $row652['Governorate'] ?></td>
                      <td><?php echo $row652['Location'] ?></td>
                      <td><?php echo $row652['ArName'] ?></td>
                      <td><?php echo $row652['Photo'] ?></td>
                      <td><?php echo $row652['Count'] ?></td>
                      <td><?php echo $row652['PPrice'] ?></td>
                      <td><?php echo $row652['SubTotal'] ?></td>
                      <td><?php echo $row652['Shipping'] ?></td>
                      <td><?php echo $row652['TotalPrice'] ?></td>
                      <td><?php echo $row652['Status'] ?></td>
                    </tr>
                    <?php $gg++;}?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>تاريخ</th>
                    <th>اسم العميل</th>
                    <th>رقم الموبيل</th>
                    <th>المحافظه</th>
                    <th>العنوان</th>
                    <th>اسم المنتج</th>
                    <th>كود الصوره</th>
                    <th>العدد</th>
                    <th>سعر القطعه</th>
                    <th>المجموع</th>
                    <th>الشحن</th>
                    <th>تكلفة الاوردر</th>
                    <th>الحالة</th>
                  </tr>
                  </tfoot>
                </table>
                <input type="hidden" name="coynt" value="<?php echo $gg;?>">
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  <?php }?>
</div>



<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

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
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

</body>
</html>

