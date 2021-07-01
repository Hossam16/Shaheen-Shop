<?php include "config.php" ?>

<?php

session_start();
if (($_SESSION['AID']) > 0) {
} else {
  header('Location: login.php');
}
?>
<?php
if (isset($_POST['neawProduct'])) {
  $Name =   $_POST['Name'];
  $NameAr = $_POST['NameAr'];
  $Desc = $_POST['Desc'];
  $DescAr = $_POST['DescAr'];
  $Price = $_POST['Price'];
  $SalePrice = $_POST['SalePrice'];
  $BSale = $_POST['BSale'];
  $Stock = $_POST['Stock'];
  $SID = $_POST['SID'];
  $MaxAmount = $_POST['MaxAmount'];
  $Photo = $_POST['Photo'] . '.jpg';
  $Status = $_POST['PStatus'];
  $ViewNum = 0;
  $Rate = 5;
  $CompanyID = 1;
  $Size = $_POST['Size'];

  if (Products::ViewSingleProductByCode($Photo) == '') {
    $nawProducts = new Products($Name, $NameAr, $Desc, $DescAr, $Price, $SalePrice, $BSale, $Stock, $SID, $MaxAmount, $Photo, $Status, $ViewNum, $Rate, $CompanyID, $Size);
    $nawProducts->SetCreatedUser($_SESSION['AID']);
    $msssg = $nawProducts->addProduct();
  } else {
    $msssg = 'Duplicate';
  }
}
?>


<?php
$product_m = 'active';
$product_mo = 'menu-open';
$product_allk = 'active';
?>
<!DOCTYPE html>
<html>
<?php include "head.php"; ?>

<body class="hold-transition sidebar-mini layout-fixed">

  <?php include "layout.php"; ?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>منتج جديد</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Web orders</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="container-fluid">
          <div class="col-12">
            <div class="card">
              <!-- general form elements -->
              <div class="card card-<?php if (isset($msssg) && $msssg == 'Success') {
                                      echo 'success';
                                    }elseif(isset($msssg) && $msssg == 'Duplicate'){
                                      echo 'danger';
                                    }
                                    else {
                                      echo 'primary';
                                    } ?>">
                <div class="card-header">
                  <h3 class="card-title"><?php if (isset($msssg) && $msssg == 'Success') {
                                            echo 'تم أضافة المنتج بنجاح';
                                          }elseif(isset($msssg) && $msssg == 'Duplicate'){
                                            echo 'المنتج موجود بالفعل';
                                          } else {
                                            echo 'أضافة منتج جديد';
                                          } ?></h3>
                </div>
                <!-- /.card-header -->

                <!-- form start -->
                <form role="form" method="Post">
                  <div class="card-body">
                    <!-- <div class="form-group">
                    <label for="photo">الصوره</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="Photo" required>
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div> -->
                    <div class="row" style="justify-content: center;">
                      <div class="col-2">
                        <div class="form-group">
                          <label for="arname">كود المنتج</label>
                          <input type="text" style="border: 2px solid #000000 !important;" maxlength="8" minlength="8" class="form-control" id="arname" name="Photo" placeholder="00000000" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <label for="arname">اسم المنتج عربى</label>
                          <textarea type="text" style="border: 2px solid #000000 !important; direction:rtl;" class="form-control" id="arname" name="NameAr" placeholder="اسم المنتج عربى" required></textarea>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label for="name">Product Name</label>
                          <textarea type="text" class="form-control" style="border: 2px solid #000000 !important;" id="name" name="Name" placeholder="Product Name" required></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <?php
                          $nsub = new Nsub();
                          $nsubs = $nsub->Viewallnsub();
                          ?>
                          <label for="SID">قسم</label>
                          <select name="SID" class="form-control select2bs4" style="width: 100%;border: 2px solid #000000 !important;" required>
                            <?php foreach ($nsubs as $nsub) { ?>
                              <option value="<?php echo $nsub['ID']; ?>"> <?php echo $nsub['subar']; ?> </option>
                            <?php  } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label for="Size">الشحن</label>
                          <select name="Size" class="form-control" placeholder='الشحن' required>
                            <option value="Small">Small</option>
                            <option value="Big">Big</option>
                            <option value="Free">Free</option>
                            <option value="Med60">Med60</option>
                            <option value="Med100">Med100</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <label for="inputName">يباع</label>
                          <select class="form-control custom-select" name="PStatus">
                            <option value="1" selected>Yes</option>
                            <option value="0">NO</option>
                          </select>
                        </div>
                      </div>
                      <!-- /btn-group -->
                      <div class="col-6">
                        <div class="form-group">
                          <label for=" stock">Stock</label>
                          <input type="number" class="form-control" id="stock" name="Stock" placeholder="Stock" value="50" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-4">
                        <div class="form-group">
                          <label for="price">السعر</label>
                          <input type="number" style="border: 2px solid #000000 !important;" class="form-control" id="price" name="Price" placeholder="سعر" required>
                        </div>
                      </div>
                      <div class="col-4" style="text-align: center;">
                        <div class="form-group">
                          <label for="price">عرض</label>
                          <br>
                          <label for="price" style="width: 25px; height:25px;">Yes</label>
                          <input type="radio" value="1" name="BSale" style="width: 25px; height:25px;">
                          <label for="price" style="width: 25px; height:25px;">NO</label>
                          <input type="radio" value="0" name="BSale" style="width: 25px;height:25px;">
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                          <label for="price">السعر بعد العرض</label>
                          <input type="number" style="border: 2px solid #000000 !important;" class="form-control" id="Sprice" name='SalePrice' placeholder="سعر العرض" required>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="MaxAmount" style="display: none;">Max Amount</label>
                      <input type="hidden" style="border: 2px solid #000000 !important;" class="form-control" id="MaxAmount" name="MaxAmount" placeholder="Max Amount" value="50" required>
                    </div>
                    <div class="form-group">
                      <label for="status" style="display: none;">الحاله</label>
                      <input type="hidden" style="border: 2px solid #000000 !important;" class="form-control" id="status" name="Status" placeholder="الحاله" value="1" required>
                    </div>
                    <div class="form-group">
                      <label for="arDesc">المواصفات عربى</label>
                      <textarea type="text" rows="8" style="border: 2px solid #000000 !important; direction:rtl;" class="form-control" id="arDesc" name="DescAr" placeholder="المواصفات عربى" required></textarea>
                      <button type="button" onclick="replace()">•</button>
                      <script>
                        function replace() {
                          var a = document.getElementById('arDesc');
                          a.value = "• " + (a.value.split("\n").filter(Boolean).join("\n• "));
                        }
                      </script>
                    </div>
                    <div class="form-group">
                      <label for="Desc">Product Descraption</label>
                      <textarea type="text" style="border: 2px solid #000000 !important;" rows="8" class="form-control" id="Desc" name="Desc" placeholder="Product Descraption" required></textarea>
                      <button type="button" onclick="replaceDesc()">•</button>
                      <script>
                        function replaceDesc() {
                          var a = document.getElementById('Desc');
                          a.value = "• " + (a.value.split("\n").filter(Boolean).join("\n• "));
                        }
                      </script>
                    </div>
                    <!-- /btn-group -->

                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-block btn-primary" name="neawProduct" <?php if ($_SESSION['type'] == 'viewer') {
                                                                                                    echo 'disabled';
                                                                                                  } ?>>Submit</button>
                    </div>
                </form>
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>




  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <!-- Select2 -->
  <script src="plugins/select2/js/select2.full.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- page script -->
  <script>
    $(function() {
      //Initialize Select2 Elements
      $('.select2').select2()

      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })

      //Datemask dd/mm/yyyy
      $('#datemask').inputmask('dd/mm/yyyy', {
        'placeholder': 'dd/mm/yyyy'
      })
      //Datemask2 mm/dd/yyyy
      $('#datemask2').inputmask('mm/dd/yyyy', {
        'placeholder': 'mm/dd/yyyy'
      })
      //Money Euro
      $('[data-mask]').inputmask()

      //Date range picker
      $('#reservation').daterangepicker()
      //Date range picker with time picker
      $('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
          format: 'MM/DD/YYYY hh:mm A'
        }
      })
      //Date range as a button
      $('#daterange-btn').daterangepicker({
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function(start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        }
      )

      //Timepicker
      $('#timepicker').datetimepicker({
        format: 'LT'
      })

      //Bootstrap Duallistbox
      $('.duallistbox').bootstrapDualListbox()

      //Colorpicker
      $('.my-colorpicker1').colorpicker()
      //color picker with addon
      $('.my-colorpicker2').colorpicker()

      $('.my-colorpicker2').on('colorpickerChange', function(event) {
        $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
      });

      $("input[data-bootstrap-switch]").each(function() {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
      });

    })
  </script>
  <script>
    $(function() {
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