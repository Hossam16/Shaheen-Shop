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
$daily_ordersss = 'active';
$msg = 0;
?>


<?php if (isset($_POST['Cancel'])) {
    Order::Cancel($_POST['Cancel']);
}
?>
<!DOCTYPE html>
<html>
<?php include "head.php"; ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <?php include "layout.php"; ?>


    <?php
    if (isset($_POST['submitdate'])) {
        $date = $_POST['date'];
        $ID = $_POST['ID'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        if (isset($_POST['myorders'])) {
            $AID = $_POST['myorders'];
            $res = Order::ViewAllOrdersDashFillter($date, $ID, $name, $phone, $AID);
        } else {
            $res = Order::ViewAllOrdersDashFillter($date, $ID, $name, $phone, NULL);
        }
    }
    ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>طلبيات خدمة عملاء</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">CS orders</li>
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
                            <div class="card-header">
                                <h3 class="card-title">CS Orders</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <form method="POST">
                                        <label>Date:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                            </div>
                                            <input type="text" name="date" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask>
                                        </div>

                                        <label>CODE:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class=""></i></span>
                                            </div>
                                            <input type="text" name="ID" class="form-control">
                                        </div>

                                        <label>Client Name:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class=""></i></span>
                                            </div>
                                            <input type="text" name="name" class="form-control">
                                        </div>

                                        <label>Phone:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class=""></i></span>
                                            </div>
                                            <input type="text" name="phone" class="form-control">
                                        </div>
                                        <label class="form-check-label">My orders</label>
                                        <div class="form-check" style="width:60px;height:60px;">
                                            <input class="form-check-input" type="checkbox" name="myorders" value="<?php echo $_SESSION['AID']; ?>" style="width:50px;height:50px;">
                                        </div>
                                        <br>
                                        <button type="submit" name="submitdate" class="btn btn-primary">Submit</button>
                                    </form>
                                    <!-- /.input group -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- /.content -->

        <!-- Content Header (Page header) -->
        <?php if (isset($res)) { ?>
            <!-- Main content -->
            <section class="content" style="direction: rtl;">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Web Orders</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped" style="text-align: center;display: none;table-layout: fixed;">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>الموظف</th>
                                            <th>اسم العميل</th>
                                            <th>العنوان</th>
                                            <th>المحافظة</th>
                                            <th>Ph-1</th>
                                            <th>Ph-2</th>
                                            <th>المنتجات</th>
                                            <th>الفاتورة</th>
                                            <th>حالة الطلب</th>
                                            <th>سبب الرفض</th>
                                            <th>التاريخ</th>
                                            <th>Cancel</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($roww = $res->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td> <a href="editorderdata.php?OID=<?php echo ($roww['ID']); ?>"><?php echo ($roww['ID']); ?></a></td>
                                                <td><?php echo ($roww['Agent']); ?></td>
                                                <td><?php echo ($roww['CName']); ?></td>
                                                <td><?php echo ($roww['Location']); ?></td>
                                                <td><?php echo ($roww['Governorate']); ?></td>
                                                <td><?php echo ($roww['Phone']); ?></td>
                                                <td><?php echo ($roww['Phone2']); ?></td>
                                                <td>
                                                    <table style="width: 100%;">
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Product Price</th>
                                                            <th>Count</th>
                                                            <th>Price</th>
                                                        </tr>
                                                        <?php
                                                        $ress = Orderdata::ViewOrderdata($roww['ID']);
                                                        while ($roow = $ress->fetch_assoc()) {
                                                        ?>
                                                            <tr>
                                                                <td><?php echo ($roow['ArName']); ?></td>
                                                                <td><?php echo ($roow['OPP'] / $roow['Count']); ?></td>
                                                                <td><?php echo ($roow['Count']); ?></td>
                                                                <td><?php echo ($roow['OPP']) ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                    </table>
                                                </td>
                                                <td>
                                                    <p style=" border-bottom: double; ">قبل الشحن: <span style="font-weight: bold;"><?php echo ($roww['SubTotal']); ?> LE</span></p> <br>
                                                    <p style=" border-bottom: double; ">الشحن: <span style="font-weight: bold;"> <?php echo ($roww['Shipping']); ?> LE </span></p><br>
                                                    <p style=" border-bottom: double; ">بعد الشحن: <span style="font-weight: bold;"> <?php echo ($roww['TotalPrice']); ?> LE </span> </p>
                                                </td>
                                                <td><?php echo ($roww['Status']); ?></td>
                                                <td><?php echo ($roww['innerNote']); ?></td>
                                                <td><?php echo ($roww['Date']); ?></td>
                                                <td>
                                                    <form method="post">
                                                        <button type="submit" class="btn btn-block btn-danger btn-sm" value="<?php echo ($roww['ID']); ?>" name="Cancel" <?php if ($_SESSION['type'] == 'viewer') {
                                                                                                                                                                            echo 'disabled';
                                                                                                                                                                        } ?>>Cancel</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>

                                </table>
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
        <?php } ?>
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
    <script type="text/javascript">
        setTimeout(showAlert, 20);

        function showAlert() {
            document.getElementById("example1").style.display = "block";
        }
    </script>

</body>

</html>