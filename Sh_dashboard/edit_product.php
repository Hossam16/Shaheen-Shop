<?php include "config.php" ?>
<?php
$product_m = 'active';
$product_mo = 'menu-open';
$product_all = 'active';
?>
<?php
session_start();
if (($_SESSION['AID']) > 0) {
} else {
    header('Location: login.php');
}
?>
<?php
if (isset($_GET['ID'])) {
    $PID = $_GET['ID'];
    $MES = 1;
    $conn1 = new config();
    $sql1 = "SELECT products.* FROM products WHERE products.ID=$PID";
    $result1 = $conn1->datacon()->query($sql1);
} else {
    $MES = 0;
}
?>
<?php
if (isset($_POST['Save'])) {
    $conn = new config();
    $PID = $_POST['PID'];
    $PAName = $_POST['PARName'];
    $PAName = mysqli_real_escape_string($conn->datacon(), $PAName);
    $PEName = $_POST['PEName'];
    $PEName = mysqli_real_escape_string($conn->datacon(), $PEName);
    $PARDesc = $_POST['PARDesc'];
    $PARDesc = mysqli_real_escape_string($conn->datacon(), $PARDesc);
    $PEDesc = $_POST['PEDesc'];
    $PEDesc = mysqli_real_escape_string($conn->datacon(), $PEDesc);
    $PStock = $_POST['PStock'];
    $PPrice = $_POST['PPrice'];
    $PSalePrice = $_POST['PSalePrice'];
    $PBSale = $_POST['PBSale'];
    $PMA = $_POST['PMA'];
    $PPhoto = $_POST['PPhoto'] . '.jpg';
    $PStatus = $_POST['PStatus'];
    $PSize = $_POST['PSize'];
    $PSID = $_POST['PSID'];
    $conn12 = new config();

    $getSizeSql = "SELECT products.Size,products.Price,products.SalePrice FROM `products` WHERE products.ID=$PID;";
    $resultSize = mysqli_query($conn12->datacon(), $getSizeSql)->fetch_assoc()['Size'];
    $resultPrice = mysqli_query($conn12->datacon(), $getSizeSql)->fetch_assoc()['Price'];
    $resultSalePrice = mysqli_query($conn12->datacon(), $getSizeSql)->fetch_assoc()['SalePrice'];
    $AID = $_SESSION['AID'];
    $date = date('Y-m-d H:i:s');
    $insertSizeUpdate = "INSERT INTO `ShipmentLog`(`AID`, `PID`, `From`, `To`, `PriceFrom`, `PriceTo`,`SalePrdiceFrom`, `SalePrdiceTo`, `CreatedDate`) VALUES ($AID,$PID,'$resultSize','$PSize','$resultPrice','$PPrice','$resultSalePrice','$PSalePrice','$date')";
    mysqli_query($conn12->datacon(), $insertSizeUpdate);

    $sql12 = "UPDATE products SET 
    products.ArName = '$PAName',
    products.Name = '$PEName',
    products.ArDesc = '$PARDesc',
    products.Desc = '$PEDesc',
    products.Stock = '$PStock',
    products.Price = '$PPrice',
    products.SalePrice = '$PSalePrice',
    products.BSale = '$PBSale',
    products.MaxAmount = '$PMA',
    products.Photo = '$PPhoto',
    products.Status = '$PStatus',
    products.Size = '$PSize',
    products.SID = '$PSID' 
    WHERE products.ID='$PID';";
    if (mysqli_query($conn12->datacon(), $sql12)) {
        header("Location: https://shaheen.center/Sh_dashboard/edit_product.php?ID=$PID&Success=1");
    } else {
        header("Location: https://shaheen.center/Sh_dashboard/edit_product.php?ID=$PID&Success=0");
    }
    exit;
}
?>
<!DOCTYPE html>
<html>
<?php include "head.php"; ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <?php include "layout.php"; ?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Product Edit</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">تعديل منتج</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form method="post">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-<?php if (isset($_GET['Success'])) {
                                                    if ($_GET['Success'] == 1) {
                                                        echo 'success';
                                                    } else {
                                                        echo 'danger';
                                                    }
                                                } else {
                                                    echo 'primary';
                                                } ?>">
                            <?php while ($row1 = $result1->fetch_assoc()) { ?>
                                <div class="card-header">
                                    <h3 class="card-title"><?php if (isset($_GET['Success'])) {
                                                                if ($_GET['Success'] == 1) {
                                                                    echo 'تم تعديل المنتج بنجاح';
                                                                } else {
                                                                    echo 'يوجد خطاء لم يتم تعديل المنتج';
                                                                }
                                                            } else {
                                                                echo 'تعديل منتج';
                                                            } ?>
                                        <?php echo $row1['ID']; ?></h3>
                                    <input type="hidden" name="PID" value="<?php echo $row1['ID']; ?>">
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputName">الأسم عربي</label>
                                        <input type="text" id="inputName" class="form-control" name="PARName" value="<?php echo $row1['ArName'] ?>" style="direction: rtl;">
                                        <label for="inputName">English Name</label>
                                        <input type="text" id="inputName" class="form-control" name="PEName" value="<?php echo $row1['Name'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription">وصف عربي</label>
                                        <textarea id="inputDescription" class="form-control" rows="4" style="direction: rtl;" name="PARDesc"><?php echo $row1['ArDesc'] ?> </textarea>
                                        <button type="button" onclick="replace()">•</button>
                                        <script>
                                            function replace() {
                                                var a = document.getElementById('inputDescription');
                                                a.value = "• " + (a.value.split("\n").filter(Boolean).join("\n• "));
                                            }
                                        </script>
                                        <label for="inputDescription">English DESC</label>
                                        <textarea id="inputDescriptionEn" class="form-control" rows="4" name="PEDesc"><?php echo $row1['Desc'] ?></textarea>
                                        <button type="button" onclick="replacedd()">•</button>
                                        <script>
                                            function replacedd() {
                                                var a = document.getElementById('inputDescriptionEn');
                                                a.value = "• " + (a.value.split("\n").filter(Boolean).join("\n• "));
                                            }
                                        </script>
                                        <label for="inputName">Stock</label>
                                        <input type="number" id="inputName" class="form-control" name="PStock" value="<?php echo $row1['Stock'] ?>">
                                        <label for="inputName">سعر قبل</label>
                                        <input type="number" id="inputName" class="form-control" name="PPrice" value="<?php echo $row1['Price'] ?>">
                                        <label for="inputName">سعر بعد</label>
                                        <input type="number" id="inputName" class="form-control" name="PSalePrice" value="<?php echo $row1['SalePrice'] ?>">
                                        <?php if ($row1['BSale'] == 1) {
                                        ?>
                                            <label for="inputName">موجود في العرض حاليا!</label>
                                            <select class="form-control custom-select" name="PBSale">
                                                <option value="1" selected>Yes</option>
                                                <option value="0">NO</option>
                                            </select>
                                        <?php } else { ?>
                                            <label for="inputName">موجود في العرض حاليا!</label>
                                            <select class="form-control custom-select" name="PBSale">
                                                <option value="0" selected>NO</option>
                                                <option value="1">Yse</option>
                                            </select>
                                        <?php } ?>
                                        <label for="inputName">Max Amount</label>
                                        <input type="number" id="inputName" class="form-control" value="<?php echo $row1['MaxAmount'] ?>" name="PMA">
                                        <label for="inputName">Photo / Product Code</label>
                                        <input type="text" id="inputName" class="form-control" maxlength="8" minlength="8" value="<?php echo explode('.',$row1['Photo'])[0]; ?>" name="PPhoto">
                                        <?php if ($row1['Status'] == 1) { ?>
                                            <label for="inputName">يباع</label>
                                            <select class="form-control custom-select" name="PStatus">
                                                <option value="1">Yes</option>
                                                <option value="0">NO</option>
                                            </select>
                                        <?php } else { ?>
                                            <label for="inputName">يباع</label>
                                            <select class="form-control custom-select" name="PStatus">
                                                <option value="0" <?php if ($row1['Status'] == 0) {
                                                                        echo 'Selected';
                                                                    } ?>>No</option>
                                                <option value="1" <?php if ($row1['Status'] == 1) {
                                                                        echo 'Selected';
                                                                    } ?>>Yes</option>
                                            </select>
                                        <?php } ?>
                                        <?php if ($row1['Size'] == 'Small') { ?>
                                            <label for="inputName">Size</label>
                                            <select class="form-control custom-select" name="PSize">
                                                <option value="Small" selected>Small</option>
                                                <option value="Big">Big</option>
                                                <option value="Free">Free</option>
                                                <option value="Med60">Med60</option>
                                                <option value="Med100">Med100</option>
                                            </select>
                                        <?php } elseif ($row1['Size'] == 'Big') { ?>
                                            <label for="inputName">Size</label>
                                            <select class="form-control custom-select" name="PSize">
                                                <option value="Small">Small</option>
                                                <option value="Big" selected>Big</option>
                                                <option value="Free">Free</option>
                                                <option value="Med60">Med60</option>
                                                <option value="Med100">Med100</option>
                                            </select>
                                        <?php } elseif ($row1['Size'] == 'Med60') { ?>
                                            <label for="inputName">Size</label>
                                            <select class="form-control custom-select" name="PSize">
                                                <option value="Small">Small</option>
                                                <option value="Big">Big</option>
                                                <option value="Free">Free</option>
                                                <option value="Med60" selected>Med60</option>
                                                <option value="Med100">Med100</option>
                                            </select>
                                        <?php } elseif ($row1['Size'] == 'Med100') { ?>
                                            <label for="inputName">Size</label>
                                            <select class="form-control custom-select" name="PSize">
                                                <option value="Small">Small</option>
                                                <option value="Big">Big</option>
                                                <option value="Free">Free</option>
                                                <option value="Med60">Med60</option>
                                                <option value="Med100" selected>Med100</option>
                                            </select>
                                        <?php } else { ?>
                                            <label for="inputName">Size</label>
                                            <select class="form-control custom-select" name="PSize">
                                                <option value="Small">Small</option>
                                                <option value="Big">Big</option>
                                                <option value="Free" selected>Free</option>
                                                <option value="Med60">Med60</option>
                                                <option value="Med100">Med100</option>
                                            </select>
                                        <?php } ?>
                                        <?php
                                        $conn77 = new config();
                                        $SID = $row1['SID'];
                                        if (isset($SID)) {
                                        } else {
                                            $SID = 0;
                                        }
                                        $sql77 = "SELECT nsub.ID,nsub.subar FROM nsub WHERE nsub.ID !=$SID";
                                        $result77 = $conn77->datacon()->query($sql77);
                                        ?>
                                        <label for="inputName">قسم فرعي</label>
                                        <select class="form-control custom-select" name="PSID">
                                            <?php if ($SID == 0) { ?>
                                                <option value="<?php echo $row1['SID'] ?>"><?php echo $SID ?></option>
                                            <?php } else {
                                                $sql777 = "SELECT nsub.ID,nsub.subar FROM nsub WHERE nsub.ID =$SID";
                                                $result777 = $conn77->datacon()->query($sql777);
                                                $sabar = $result777->fetch_assoc()['subar'];
                                            ?>
                                                <option value="<?php echo $row1['SID'] ?>"><?php echo $sabar ?></option>
                                            <?php } ?>
                                            <?php while ($row77 = $result77->fetch_assoc()) { ?>
                                                <option value="<?php echo $row77['ID']; ?>"><?php echo $row77['subar']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            <?php } ?>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="#" class="btn btn-secondary">Cancel</a>
                        <input type="submit" value="Save" name="Save" class="btn btn-success float-right" <?php if ($_SESSION['type'] == 'viewer') {
                                                                                                                echo 'disabled';
                                                                                                            } ?>>
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->


    </div>
    <!-- /.content-wrapper -->






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