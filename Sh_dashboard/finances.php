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
$admin_mo13 = 'active';
$admin13 = 'menu-open';
$admin_all1355 = 'active';
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
                        <h1>Finances</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Report</li>
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
                            Report</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">


                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Date Range</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                        <form method="Post" style="width:95%;">
                                            <input type="text" class="form-control float-right" id="reservationPro" name="PeriodPro">
                                            <button type="submit" name="applyPeriodSalesPro" class="btn btn-block btn-default btn-flat" <?php if ($_SESSION['type'] == 'viewer') {
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

        <?php if (isset($_POST['applyPeriodSalesPro'])) {
            $V1 =  explode(" - ", $_POST['PeriodPro']);
            $V1[0] = str_replace("/", "-", $V1[0], $count);
            $V1[1] = str_replace("/", "-", $V1[1], $count);
            $start = explode("-", $V1[0]);
            $end = explode("-", $V1[1]);
            $startDate = $start[2] . "-" . $start[0] . "-" . $start[1];
            $endtDate = $end[2] . "-" . $end[0] . "-" . $end[1];
        ?>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Order Detail</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                                Order ID
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                                                Parent ID
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                                                Parent ID
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                Item Label
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">
                                                Quantity
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
                                                Price
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
                                                Shipping
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
                                                Total
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
                                               Status
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $conn1 = new config();
                                        $sql1 = "SELECT wordpress.wp_wc_order_stats.*,wordpress.wp_users.display_name FROM wordpress.wp_wc_order_stats LEFT JOIN wordpress.wp_wcfm_marketplace_orders on wordpress.wp_wcfm_marketplace_orders.order_id = wordpress.wp_wc_order_stats.order_id LEFT JOIN wordpress.wp_users on wordpress.wp_wcfm_marketplace_orders.vendor_id=wordpress.wp_users.ID WHERE (date_created BETWEEN '$startDate' AND '$endtDate')";
                                        $result1 = $conn1->datacon()->query($sql1);
                                        while ($row = $result1->fetch_assoc()) {
                                        ?>
                                            <tr role="row" class="odd">
                                                <td tabindex="0" class="sorting_1"><?php echo $row['order_id'] ?></td>
                                                <td><?php echo $row['parent_id']; ?></td>
                                                <td><?php echo $row['display_name']; ?></td>
                                                <td><?php echo $row['date_created'] ?></td>
                                                <td><?php echo $row['num_items_sold'] ?></td>
                                                <td><?php echo $row['net_total'] ?></td>
                                                <td><?php echo $row['shipping_total'] ?></td>
                                                <td><?php echo $row['total_sales'] ?></td>
                                                <td><?php echo $row['status'] ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div>
                    </div>
                    <button name="create_excel" id="btnExport" onclick="exportTableToExcel('download','orderDetailReport');" class="btn btn-success" <?php if ($_SESSION['type'] == 'viewer') {
                                                                                                                                                            echo 'disabled';
                                                                                                                                                        } ?>>Create Excel File</button>
                    <script>
                        function exportTableToExcel(tableID, filename = '') {
                            var downloadLink;
                            var dataType = 'application/vnd.ms-excel';
                            var tableSelect = document.getElementById(tableID);
                            var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

                            // Specify file name
                            filename = filename ? filename + '.xls' : 'excel_data.xls';

                            // Create download link element
                            downloadLink = document.createElement("a");

                            document.body.appendChild(downloadLink);

                            if (navigator.msSaveOrOpenBlob) {
                                var blob = new Blob(['\ufeff', tableHTML], {
                                    type: dataType
                                });
                                navigator.msSaveOrOpenBlob(blob, filename);
                            } else {
                                // Create a link to the file
                                downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

                                // Setting the file name
                                downloadLink.download = filename;

                                //triggering the function
                                downloadLink.click();
                            }
                        }
                    </script>
                </div>
            </div>
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
            $('#reservationPro').daterangepicker()
            //Date range picker with time picker
            $('#reservationProtime').daterangepicker({
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