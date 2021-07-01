<?php include "config.php"?>
<?php
$product_m='active';
$product_mo='menu-open';
$product_all='active';
?>
<!DOCTYPE html>
<html>
<?php include"head.php";?>
<body class="hold-transition sidebar-mini layout-fixed" >

<?php include"layout.php";?>

<div class="content-wrapper">
    <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">اسم المنتج انجليزى</label>
                    <input type="text" class="form-control" id="name" placeholder="اسم المنتج انجليزى">
                  </div>
                  <div class="form-group">
                    <label for="arname">اسم المنتج عربى</label>
                    <input type="text" class="form-control" id="arname" placeholder="اسم المنتج عربى">
                  </div>
					<div class="form-group">
                    <label for=" stock">العدد</label>
                    <input type="text" class="form-control" id="stock" placeholder="العدد">
                  </div>
					<div class="form-group">
                    <label for="price">السعر</label>
                    <input type="number" class="form-control" id="price" placeholder="سعر">
                  </div>
					<div class="input-group input-group-lg mb-3">
                  <div class="input-group-prepend">
                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                      قسم فرعى
                    </button>
                    <ul class="dropdown-menu">
                      <li class="dropdown-item"><a href="#">Action</a></li>
                      <li class="dropdown-item"><a href="#">Another action</a></li>
                      <li class="dropdown-item"><a href="#">Something else here</a></li>
                      <li class="dropdown-divider"></li>
                      <li class="dropdown-item"><a href="#">Separated link</a></li>
                    </ul>
                  </div>
                  <!-- /btn-group -->
                  <input type="text" class="form-control">
                </div>
					<div class="input-group input-group-lg mb-3">
                  <div class="input-group-prepend">
                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                      عرض
                    </button>
                    <ul class="dropdown-menu">
                      <li class="dropdown-item"><a href="#">عرض</a></li>
                      <li class="dropdown-item"><a href="#">بدون عرض</a></li>
                    </ul>
                  </div>
                  <!-- /btn-group -->
                  <input type="text" class="form-control">
                </div>
					<div class="form-group">
                    <label for="price">السعر بعد العرض</label>
                    <input type="number" class="form-control" id="Sprice" placeholder="سعر العرض">
                  </div>
					<div class="form-group">
                    <label for="MaxAmount">العدد</label>
                    <input type="number" class="form-control" id="MaxAmount" placeholder="العدد">
                  </div>
					<div class="form-group">
                    <label for="Desc">المواصفات انجليزى</label>
                    <input type="text" class="form-control" id="Desc" placeholder="المواصفات">
                  </div>
					<div class="form-group">
                    <label for="arDesc">المواصفات عربى</label>
                    <input type="text" class="form-control" id="arDesc" placeholder="المواصفات عربى">
                  </div>
					<div class="form-group">
                    <label for="status">الحاله</label>
                    <input type="number" class="form-control" id="status" placeholder="الحاله">
                  </div>
					<div class="input-group input-group-lg mb-3">
                  <div class="input-group-prepend">
                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                      الشحن
                    </button>
                    <ul class="dropdown-menu">
					  <li class="dropdown-item"><a href="#">مجانى</a></li>
					  <li class="dropdown-item"><a href="#">صغير</a></li>
					  <li class="dropdown-item"><a href="#">كبير</a></li>
                    </ul>
                  </div>
                  <!-- /btn-group -->
                  <input type="text" class="form-control">
                </div>
                  <div class="form-group">
                    <label for="photo">الصوره</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
              
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="--primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
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