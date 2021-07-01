<?php include "config.php" ?>
<?php include "Slide.php" ?>
<?php
$orders_omm = 'active';
$orders_xm = 'menu-open';
$product_allkks123338 = 'active';
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
    $SQL = "SELECT * FROM `products` WHERE products.Photo LIKE '%$Code%'";
    $results =  $conn->datacon()->query($SQL);
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
                        <h1>بحث عن منتج</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">بحث عن منتج</li>
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
                                <h3 class="card-title">بحث عن منتج</h3>
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
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <?php if (isset($results)) {
                        while ($result = $results->fetch_assoc()) { ?>
                            <div class="card card-solid" style="direction: rtl;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <h3 class="my-3"><?php echo $result['ArName']; ?></h3>
                                            <p style="direction: rtl;"><?php echo nl2br($result['ArDesc']); ?></p>

                                            <hr>
                                            <div class="bg-gray py-2 px-3 mt-4">
                                                <h2 class="mb-0">
                                                    <?php if ($result['BSale'] == 1) { ?>
                                                        <span><?php echo $result['SalePrice']; ?> جنية</span>
                                                        <h3><strike><?php echo $result['Price']; ?> جنية</strike></h3>
                                                    <?php } else { ?>
                                                        <span><?php echo $result['Price']; ?> جنية</span>
                                                    <?php } ?>
                                                </h2>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <h3 class="d-inline-block d-sm-none"><?php echo $result['ArName']; ?></h3>
                                            <div class="col-12">
                                                <img src="../images/product-details/<?php echo $result['Photo'] ?>?1623932967" class="product-image" alt="Product Image">
                                            </div>
                                            <!-- <div class="col-12 product-image-thumbs">
                                                <div class="product-image-thumb active"><img src="../../dist/img/prod-1.jpg" alt="Product Image"></div>
                                                <div class="product-image-thumb"><img src="../../dist/img/prod-2.jpg" alt="Product Image"></div>
                                                <div class="product-image-thumb"><img src="../../dist/img/prod-3.jpg" alt="Product Image"></div>
                                                <div class="product-image-thumb"><img src="../../dist/img/prod-4.jpg" alt="Product Image"></div>
                                                <div class="product-image-thumb"><img src="../../dist/img/prod-5.jpg" alt="Product Image"></div>
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <nav class="w-100">
                                            <div class="nav nav-tabs" id="product-tab" role="tablist">
                                                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                                            </div>
                                        </nav>
                                        <div class="tab-content p-3" id="nav-tabContent">
                                            <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"><?php echo nl2br($result['ArDesc']); ?></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                    <?php }
                    } ?>
                    <!-- /.card -->
                </div>
            </div>
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