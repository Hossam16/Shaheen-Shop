<?php include "config.php";
?>
<?php

session_start();
if (($_SESSION['AID']) > 0) {
} else {
  header('Location: login.php');
}
?>
<?php
$orders_omm = 'active';
$orders_xm = 'menu-open';
$daily_ordersoss = 'active';
$msg = 0;
?>

<?php
if (isset($_POST['makeComplaint'])) {
  $Date = date('Y-m-d H:i:s');
  $complaint = new Complaint($_SESSION['AID'], $_POST['CName'], $Date, $_POST['CPhone1'], $_POST['CPhone2'], $_POST['Governorate'], $_POST['address'], $_POST['text'], "", "New",$_POST['type']);
  $result = $complaint->addComplaint();
  echo $result;
}
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
            <h1>شكوى جديدة</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">شكوى جديدة</li>
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
              <!-- right column -->
              <form role="form" method="post">
                <!-- general form elements disabled -->
                <div class="card card-danger">
                  <div class="card-header">
                    <h3 class="card-title">الشكوى</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <?php if (isset($result)) { ?>

                      <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-check"></i> SUCCESS! <?php echo $result; ?></h5>
                        Success The Complaint ID is <?php echo $result; ?>
                      </div>
                    <?php } ?>
                    <div class="row">
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label>أسم العميل</label>
                          <input type="text" class="form-control" placeholder="الأسم ..." name="CName" style="direction:rtl;" required>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label>رقم التليفون</label>
                          <input type="number" class="form-control" placeholder="+02" name="CPhone1" required>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label>رقم تليفون اخر (أختياري)</label>
                          <input type="number" class="form-control" placeholder="+02" name="CPhone2">
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <!-- select -->
                        <div class="form-group">
                          <label>المحافظة</label>
                          <select class="form-control" name="Governorate" style="direction:rtl;" required>
                            <option></option>
                            <option value="Cairo">القاهرة</option>
                            <option value="Giza">الجيزة</option>
                            <option value="Port Said">بور سعيد</option>
                            <option value="Ismailia">الأسماعليه</option>
                            <option value="Suez">السويس</option>
                            <option value="Ain Sokhna">العين السخنة</option>
                            <option value="Dakahlia">الدفهلية</option>
                            <option value="Alexandria">الاسكندرية</option>
                            <option value="Beheira">البحيرة</option>
                            <option value="Kafr El-Sheikh">كفر الشيخ</option>
                            <option value="Qaliubiya">القليوبية</option>
                            <option value="Algharbia">الغربية</option>
                            <option value="Menoufia">المنوفية</option>
                            <option value="Alsharqia">الشرقية</option>
                            <option value="Damanhur">دمنهور</option>
                            <option value="Mansoura">المنصورة</option>
                            <option value="Fayoum">الفيوم</option>
                            <option value="Bani Sweif">بني سويف</option>
                            <option value="Minya">المنيا</option>
                            <option value="Asyut">أسيوط</option>
                            <option value="Sohag">سوهاج</option>
                            <option value="Qena">قنا</option>
                            <option value="Alaqsir">الشرقية</option>
                            <option value="Aswan">أسوان</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>العنوان</label>
                          <input type="text" class="form-control" placeholder="العنوان" name="address" style="direction:rtl;" required>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <!-- select -->
                        <div class="form-group">
                          <label>نوع الشكوى</label>
                          <select class="form-control" name="type" style="direction:rtl;" required>
                            <option></option>
                            <option value="تاخير طلب">تاخير طلب</option>
                            <option value="استرجاع">استرجاع</option>
                            <option value="استبدال">استبدال</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div>
                      <div class="row">
                        <div class="col-sm-12">
                          <!-- textarea -->
                          <div class="form-group">
                            <label>تفاصيل الشكوى</label>
                            <textarea class="form-control" rows="3" name="text" placeholder="أكتب ..." style="direction:rtl;" required></textarea>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <button type="submit" class="btn btn-block btn-success btn-lg" name="makeComplaint" <?php if ($_SESSION['type'] == 'viewer') {
                                                                                                                echo 'disabled';
                                                                                                              } ?>>Update</button>
                        </div>
                      </div>
                    </div>

                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </form>
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
    $(function() {
      //Initialize Select2 Elements
      $('.select2').select2()

      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })

      //Datemask dd/mm/yyyy
      $('#datemask').inputmask('dd-mm-yyyy', {
        'placeholder': 'dd-mm-yyyy'
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