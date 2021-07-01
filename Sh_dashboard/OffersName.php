<?php include "config.php" ?>
<?php include "Slide.php" ?>
<?php
$product_m = 'active';
$admin = 'menu-open';
$product_allkks1233 = 'active';
?>
<?php
session_start();
if (($_SESSION['AID']) > 0) {
} else {
    header('Location: login.php');
}
?>
<?php

$conn = new config();
$SQL = "SELECT * FROM `nsub` WHERE nsub.id=74 OR nsub.id=76 OR nsub.ID=78";
$result =  $conn->datacon()->query($SQL);

$SQLL = "SELECT * FROM `nheader` WHERE nheader.ID=7";
$resultt =  $conn->datacon()->query($SQLL)->fetch_assoc();

if (isset($_POST['Main'])) {
    $nameAr = $_POST['ArTitle'];
    $name = $_POST['EnTitle'];
    $SQLLL = "UPDATE `nheader` SET `header`='$name',`headerar`='$nameAr' WHERE ID=7";
    if ($conn->datacon()->query($SQLLL)) {
    } else {
        echo "ERROR" . $SQLLL;
    }
} elseif (isset($_POST['Remove'])) {
    $SQLLL = "UPDATE `products` SET BSale=0 WHERE BSale=1 AND (products.SID !=74 OR products.SID!=76 OR products.SID!=78)";
    if ($conn->datacon()->query($SQLLL)) {
    } else {
        echo "ERROR" . $SQLLL;
    }
} elseif (isset($_POST['Update'])) {
    $ID = $_POST['Update'];
    $nameAr = $_POST['ArTitle'];
    $name = $_POST['EnTitle'];
    $status = $_POST['Active'];
    $SQLLL = "UPDATE `nsub` SET `sub`='$name',`subar`='$nameAr',`StatusSub`='$status' WHERE ID=$ID";
    if ($conn->datacon()->query($SQLLL)) {
    } else {
        echo "ERROR" . $SQLLL;
    }
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
                        <h1>جميع البنارات</h1>
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
                        <h3 class="card-title">Slider</h3>
                    </div>


                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">العرض الاساسي</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="post">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <label>الاسم العربي</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" value="<?php echo $resultt['headerar']; ?>" name="ArTitle" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label>English Name</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" value="<?php echo $resultt['header']; ?>" name="EnTitle" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <button class="btn btn-block btn-default" name="Main" value="">Update</button>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <button class="btn btn-block btn-default" name="Remove" value="">Remove</button>
                                    </div>
                                </div>
                            </div>
                            <br>
                    </div>
                    <!-- /.card-body -->
                    </form>

                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><?php echo $row['subar'] ?></h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="post">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <label>الاسم العربي</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" value="<?php echo $row['subar'] ?>" name="ArTitle" required>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label>English Name</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" value="<?php echo $row['sub']; ?>" name="EnTitle" required>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>التفعيل</label>
                                                <div class="form-group" style="text-align-last:center;">
                                                    <label>مفعل</label>
                                                    <input type="radio" class="form-control" placeholder="Enter ..." name="Active" value="1" required <?php if ($row['StatusSub'] == '1') {
                                                                                                                                                            echo 'checked';
                                                                                                                                                        } ?>>
                                                    <br>
                                                    <label>غير مفعل</label>
                                                    <input type="radio" class="form-control" placeholder="Enter ..." name="Active" value="0" required <?php if ($row['StatusSub'] == '0') {
                                                                                                                                                            echo 'checked';
                                                                                                                                                        } ?>>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <button class="btn btn-block btn-default" name="Update" value="<?php echo $row['ID']; ?>">Update</button>
                                        </div>
                                    </div>
                                </div>
                                <br>
                        </div>
                        <!-- /.card-body -->
                        </form>

                    <?php } ?>

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
        $(function() {
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