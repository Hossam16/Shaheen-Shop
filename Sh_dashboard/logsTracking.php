<?php include "config.php" ?>
<?php include "Slide.php" ?>
<?php
$product_m = 'active';
$admin = 'menu-open';
$product_allkks12333 = 'active';
?>
<?php
session_start();
if (($_SESSION['AID']) > 0) {
} else {
    header('Location: login.php');
}
?>

<?php
if (isset($_POST['Search'])) {
    $conn = new config();
    $Code = $_POST['Code'];
    $SQL = "SELECT ShipmentLog.*,products.Photo AS Code,admin.username AS AgentName FROM `ShipmentLog` INNER JOIN products on products.ID=ShipmentLog.PID INNER JOIN admin on admin.ID=ShipmentLog.AID WHERE products.Photo LIKE '%$Code%' ORDER BY ShipmentLog.CreatedDate DESC";
    $result =  $conn->datacon()->query($SQL);
}
?>

<!DOCTYPE html>
<html>
<?php include "head.php"; ?>

<body class="hold-transition sidebar-mini layout-fixed">

    <?php include "layout.php"; ?>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>تتبع السجلات</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">تتبع النظام</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-info">
                            <div class="card-header">
                                <h3 class="card-title">تتبع سجلات المنتج</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="post">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="Code">كود المنتج Product (SKU)</label>
                                        <input type="text" class="form-control" id="Code" name="Code" placeholder="00000000">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" name="Search" class="btn btn-info">بحث</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (isset($result)) { ?>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-info">
                                <div class="card-header">
                                    <h3 class="card-title">التحديثات التي عثر عليها</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped" style="text-align: center;">
                                        <thead>
                                            <tr>
                                                <th>كود المنتج</th>
                                                <th colspan="2">السعر</th>
                                                <th colspan="2">سعر العرض</th>
                                                <th colspan="2">الشحن</th>
                                                <th>الموظف</th>
                                                <th>التوقيت</th>
                                            </tr>
                                            <tr>
                                                <th>&nbsp;</th>
                                                <th>من</th>
                                                <th>الى</th>
                                                <th>من</th>
                                                <th>الى</th>
                                                <th>من</th>
                                                <th>الى</th>
                                                <th>&nbsp;</th>
                                                <th>&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($row = $result->fetch_assoc()) { ?>
                                                <tr>
                                                    <td><?php echo explode('.', $row['Code'])[0] ?></td>
                                                    <?php if ($row['PriceFrom'] == $row['PriceTo']) { ?>
                                                        <td><?php echo $row['PriceFrom'] ?></td>
                                                        <td><?php echo $row['PriceTo'] ?></td>
                                                    <?php } else { ?>
                                                        <td style="border: dashed;border-color: blue;"><?php echo $row['PriceFrom'] ?></td>
                                                        <td style="border: dashed;border-color: red;"><?php echo $row['PriceTo'] ?></td>
                                                    <?php } ?>
                                                    <?php if ($row['SalePrdiceFrom'] == $row['SalePrdiceTo']) { ?>
                                                        <td><?php echo $row['SalePrdiceFrom'] ?></td>
                                                        <td><?php echo $row['SalePrdiceTo'] ?></td>
                                                    <?php } else { ?>
                                                        <td style="border: dashed;border-color: blue;"><?php echo $row['SalePrdiceFrom'] ?></td>
                                                        <td style="border: dashed;border-color: red;"><?php echo $row['SalePrdiceTo'] ?></td>
                                                    <?php } ?>
                                                    <?php if ($row['From'] == $row['To']) { ?>
                                                        <td><?php echo $row['From'] ?></td>
                                                        <td><?php echo $row['To'] ?></td>
                                                    <?php } else { ?>
                                                        <td style="border: dashed;border-color: blue;"><?php echo $row['From'] ?></td>
                                                        <td style="border: dashed;border-color: red;"><?php echo $row['To'] ?></td>
                                                    <?php } ?>
                                                    <td><?php echo $row['AgentName'] ?></td>
                                                    <td><?php echo $row['CreatedDate'] ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
    </div>




    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "ordering": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": true,
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