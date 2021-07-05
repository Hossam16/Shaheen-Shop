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
$admin_mo21 = 'active';
$admin13 = 'menu-open';
$admin_all21 = 'active';
$msg = 0;
?>


<!DOCTYPE html>
<html>
<?php include "head.php"; ?>

<body class="hold-transition sidebar-mini layout-fixed">
  <?php include "layout.php"; ?>

  <!-- Main content -->

  <!-- right column -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Web Orders On Range</h1>
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

    <section class="content">
      <div class="container-fluid">
        <!-- general form elements disabled -->
        <div class="card card-secondary">
          <div class="card-header">
            <h3 class="card-title">
              أحصائيات</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">


            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label>تاكيدات</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <form method="Post" style="width: 95%;">
                      <input type="text" class="form-control float-right" id="reservation320" name="Periood5">
                      <button type="submit" name="applyPeriodSaless100" class="btn btn-block btn-default btn-flat" <?php if ($_SESSION['type'] == 'viewer') {
                                                                                                                      echo 'disabled';
                                                                                                                    } ?>>تطبيق</button>
                    </form>
                  </div>
                  <!-- /.input group -->
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>


    <?php if (isset($_POST['applyPeriodSaless100'])) {
      $V1 =  explode(" - ", $_POST['Periood5']);
      $V1[0] = str_replace("/", "-", $V1[0], $count);
      $V1[1] = str_replace("/", "-", $V1[1], $count);
      $start = explode("-", $V1[0]);
      $end = explode("-", $V1[1]);
      $startDate = $start[2] . "-" . $start[0] . "-" . $start[1];
      $endtDate = $end[2] . "-" . $end[0] . "-" . $end[1];

      $starter = strtotime($startDate);
      $ender = strtotime($endtDate);

      $result = Order::Confirmed($startDate, $endtDate);
      $result = $result->fetch_assoc();
    ?>
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small card -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?php echo $result['COUNT(Date)']; ?></h3>

              <p>عدد الطلبيات</p>
            </div>
            <div class="icon">
              <i class="fas fa-shopping-cart"></i>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <!-- small card -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?php echo $result['SUM(SubTotal)']; ?><sup style="font-size: 20px"></sup></h3>

              <p>اجمالي القيمة</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <!-- small card -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?php echo $result['SUM(Shipping)']; ?><sup style="font-size: 20px"></sup></h3>

              <p>اجمالي الشحن</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
          </div>
        </div>

      </div>

      <div class="row">
        <div class="col-lg-12 col-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"></h3>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                <thead>
                  <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                      رقم الطلب
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                      اسم العميل
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                      التاريخ
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                      قيمة الطلب
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                      المنتجات
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                      قيمة الشحن
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                      نسبة الشحن من الطلب
                    </th>



                  </tr>
                </thead>
                <tbody>
                  <?php

                  $result = Order::ConfirmedByDetails($startDate, $endtDate, $_POST['AAID']);
                  while ($row = $result->fetch_assoc()) {
                  ?>
                    <tr role="row" class="odd">
                      <td tabindex="0" class="sorting_1"><?php echo $row['id'] ?></td>
                      <td><?php echo $row['Name'] ?></td>
                      <td><?php echo $row['Date'] ?></td>
                      <td>
                        <?php if ($row['id'] > 2000000000) { ?>
                          <table>
                            <tbody>
                              <?php $orderDatas = Orderdata::ViewOrderdata($row['id']);
                              $iiii = 0;
                              while ($orderData = $orderDatas->fetch_assoc()) {
                              ?>
                                <tr>
                                  <td>
                                    <?php echo $orderData['ArName'];
                                    $iiii++; ?>
                                  </td>
                                  <td>
                                    <?php echo explode(".", $orderData['Code'])[0]; ?>
                                  </td>
                                  <td>
                                    <?php echo $orderData['OPP'] . ' LE'; ?>
                                  </td>
                                </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                        <?php } else { ?>
                          <table>
                            <tbody>
                              <?php $orderDatas = Orderdata::ViewOrderdataweb($row['id']);
                              $iiii = 0;
                              while ($orderData = $orderDatas->fetch_assoc()) {
                              ?>
                                <tr>
                                  <td>
                                    <?php echo $orderData['ArName'];
                                    $iiii++; ?>
                                  </td>
                                  <td>
                                    <?php echo explode(".", $orderData['Code'])[0]; ?>
                                  </td>
                                  <td>
                                    <?php echo $orderData['PPrice'] . ' LE'; ?>
                                  </td>
                                </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                        <?php } ?>
                      </td>
                      <td><?php echo $row['SubTotal'] ?></td>
                      <td><?php echo $row['Shipping'] ?></td>
                      <td><?php echo number_format(($row['Shipping'] / $row['SubTotal'] * 100), 2) . '%'; ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <table id="download" style="display:none;">
        <thead>
          <tr role="row">
            <th>
              رقم الطلب
            </th>
            <th>
              اسم العميل
            </th>
            <th>
              التاريخ
            </th>
            <th>
              المنتجات
            </th>
            <th>
              قيمة الطلب
            </th>
            <th>
              قيمة الشحن
            </th>
            <th>
              نسبة الشحن من الطلب
            </th>


          </tr>
        </thead>
        <tbody>
          <?php

          $result = Order::ConfirmedByDetails($startDate, $endtDate, $_POST['AAID']);
          while ($row = $result->fetch_assoc()) {
          ?>
            <tr role="row">
              <td><?php echo $row['id'] ?></td>
              <td><?php echo $row['Name'] ?></td>
              <td><?php echo $row['Date'] ?></td>
              <td>
                <?php if ($row['id'] > 2000000000) { ?>
                  <table>
                    <tbody>
                      <?php $orderDatas = Orderdata::ViewOrderdata($row['id']);
                      $iiii = 0;
                      while ($orderData = $orderDatas->fetch_assoc()) {
                      ?>
                        <tr>
                          <td>
                            <?php echo $orderData['ArName'];
                            $iiii++; ?>
                          </td>
                          <td>
                            <?php echo explode(".", $orderData['Code'])[0]; ?>
                          </td>
                          <td>
                            <?php echo $orderData['OPP']; ?>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                <?php } else { ?>
                  <table>
                    <tbody>
                      <?php $orderDatas = Orderdata::ViewOrderdataweb($row['id']);
                      $iiii = 0;
                      while ($orderData = $orderDatas->fetch_assoc()) {
                      ?>
                        <tr>
                          <td>
                            <?php echo $orderData['ArName'];
                            $iiii++; ?>
                          </td>
                          <td>
                            <?php echo explode(".", $orderData['Code'])[0]; ?>
                          </td>
                          <td>
                            <?php echo $orderData['PPrice']; ?>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                <?php } ?>
              </td>
              <td><?php echo $row['SubTotal'] ?></td>
              <td><?php echo $row['Shipping'] ?></td>
              <td><?php echo number_format(($row['Shipping'] / $row['SubTotal'] * 100), 2) . '%'; ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
      <div>
        <button name="create_excel" id="btnExport" onclick="fnExcelReport();" class="btn btn-success">Create Excel File</button>
      </div>
      <script>
        function fnExcelReport() {
          var tab_text = "<head><meta charset='UTF-8'></head><table border='2px'><tr style='color: white;background: #2a57a5'>";
          var textRange;
          var j = 0;
          tab = document.getElementById('download'); // id of table

          for (j = 0; j < tab.rows.length; j++) {
            tab_text = tab_text + tab.rows[j].innerHTML + "</tr>";
            //tab_text=tab_text+"</tr>";
          }

          tab_text = tab_text + "</table>";
          tab_text = tab_text.replace(/<A[^>]*>|<\/A>/g, ""); //remove if u want links in your table
          tab_text = tab_text.replace(/<img[^>]*>/gi, ""); // remove if u want images in your table
          tab_text = tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

          var ua = window.navigator.userAgent;
          var msie = ua.indexOf("MSIE ");

          if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) // If Internet Explorer
          {
            txtArea1.document.open("txt/html", "replace");
            txtArea1.document.write(tab_text);
            txtArea1.document.close();
            txtArea1.focus();
            sa = txtArea1.document.execCommand("SaveAs", true, "Say Thanks to Sumit.xls");
          } else //other browser not tested on IE 11
            sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));

          return (sa);
        }
      </script>
    <?php } ?>




  </div>
  </div>

  <!-- /.card -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  <script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
      // The type of chart we want to create
      type: 'bar',

      // The data for our dataset
      data: {
        labels: [<?php echo $date[0]; ?>],
        datasets: [{
          label: 'My First dataset',
          backgroundColor: 'rgb(255, 99, 132)',
          borderColor: 'rgb(255, 99, 132)',
          data: [<?php echo $date[1]; ?>]
        }]
      },

      // Configuration options go here
      options: {}
    });
  </script>

  <script>
    var ctx = document.getElementById('myChart5').getContext('2d');
    var chart = new Chart(ctx, {
      // The type of chart we want to create
      type: 'bar',

      // The data for our dataset
      data: {
        labels: [<?php echo $date[0]; ?>],
        datasets: [{
          label: 'My First dataset',
          backgroundColor: 'rgb(255, 99, 132)',
          borderColor: 'rgb(255, 99, 132)',
          data: [<?php echo $date[1]; ?>]
        }]
      },

      // Configuration options go here
      options: {}
    });
  </script>

  <script>
    var ctx = document.getElementById('myChart2').getContext('2d');
    var chart = new Chart(ctx, {
      // The type of chart we want to create
      type: 'line',

      // The data for our dataset
      data: {
        labels: [<?php echo $date[0]; ?>],
        datasets: [{
          label: 'My First dataset',
          borderColor: 'rgb(255, 99, 132)',
          data: [<?php echo $date[1]; ?>]
        }]
      },

      // Configuration options go here
      options: {}
    });
  </script>
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
      $('#reservation320').daterangepicker()
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
</body>

</html>