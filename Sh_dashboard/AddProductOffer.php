<?php

use phpDocumentor\Reflection\Types\Null_;

include "config.php" ?>
<?php
$product_m = 'active';
$product_mo = 'menu-open';
$product_group45 = 'active';
$msg = 0;
?>
<?php

session_start();
if (($_SESSION['AID']) > 0) {
} else {
    header('Location: login.php');
}
?>

<?php
if (isset($_POST['update'])) {
    $y = $_POST['coynt'];
    $conn65 = new config();
    for ($i = 0; $i < $y; $i++) {
        $SI = $_POST['offer' . $i];
        if ($SI != Null) {
            $pid = $_POST['Pid' . $i];
            $price = $_POST['Pprice' . $i];
            if (isset($_POST['my-checkbox' . $i])) {
                $bsale = 1;
            } else {
                $bsale = 0;
            }
            if (isset($_POST['active' . $i])) {
                $active = 1;
            } else {
                $active = 0;
            }
            if (isset($_POST['new' . $i])) {
                $newaa = 1;
            } else {
                $newaa = 0;
            }
            $sprice = $_POST['Psaleprice' . $i];
            // $InsertOffer = "INSERT INTO `OffersProducts`(`PID`, `OID`, `BSale`,`SalePrice`) VALUES ($pid,$SI,$bsale,$sprice)";
            // mysqli_query($conn65->datacon(), $InsertOffer);
            $getSizeSql = "SELECT products.Size,products.Price,products.SalePrice FROM `products` WHERE products.ID=$pid;";
            $resultSize = mysqli_query($conn65->datacon(), $getSizeSql)->fetch_assoc()['Size'];
            $resultPrice = mysqli_query($conn65->datacon(), $getSizeSql)->fetch_assoc()['Price'];
            $resultSalePrice = mysqli_query($conn65->datacon(), $getSizeSql)->fetch_assoc()['SalePrice'];
            $AID = $_SESSION['AID'];
            $date = date('Y-m-d H:i:s');
            
            $insertSizeUpdate = "INSERT INTO `ShipmentLog`(`AID`, `PID`, `From`, `To`, `PriceFrom`, `PriceTo`,`SalePrdiceFrom`, `SalePrdiceTo`, `CreatedDate`) VALUES ($AID,$pid,'$resultSize','$resultSize','$resultPrice','$price','$resultSalePrice','$sprice','$date')";
            mysqli_query($conn65->datacon(), $insertSizeUpdate);

            $sql6655 = "UPDATE products SET products.Price=$price,products.BSale=$bsale,products.SalePrice=$sprice,products.Status=$active,products.Schedule=$SI WHERE products.ID=$pid;";
            mysqli_query($conn65->datacon(), $sql6655);

            $msg = 1;
        } else {
        }
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
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>أضافة منتجات الي عرض</h3>
                    </div>
                    <div class="col-md-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-edit"></i>
                                    تصنيف المنتجات حسب
                                </h3>
                            </div>
                            <div class="card-body pad table-responsive">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">الاكواد</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" onchange="relaceSpace()">
                                </div>
                                <div class="form-group">
                                    <label style="display: none;" id="labletext">تصحيح</label>
                                    <form method="post">
                                        <textarea type="text" data-role="tagsinput" class="form-control is-valid" id="inputSuccess" placeholder="00000001,00000002,..." name="SearchGroup" class="form-control" rows="3" placeholder="Enter ..." style="display: none;" readonly></textarea>
                                        <br>
                                        <button type="submit" style="display: none;" id="submit" class="btn btn-block btn-info">Submit</button>
                                    </form>
                                </div>
                                <script>
                                    function relaceSpace() {
                                        var x = document.getElementById("exampleInputEmail1").value;
                                        x = x.replace(/[ ,]+/g, ",");
                                        document.getElementById("inputSuccess").value = x;
                                        document.getElementById("inputSuccess").style.display = 'block';
                                        document.getElementById("labletext").style.display = 'block';
                                        document.getElementById("submit").style.display = 'block';

                                    }
                                </script>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- ./row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
        <?php if ($msg == 1) { ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> تم بنجاح!</h5>
                تعديل المنتجات المطلوبه
            </div>
        <?php } ?>
        <!-- Main content -->
        <section class="content" style="direction: rtl;">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">أضافة منتجات الي عرض</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="post">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Select All<br><input type="checkbox" style="width: 30px;height: 30px;" value="0" onclick="$(this).attr('value', this.checked ? 1 : 0);selected(this.checked ? 1 : 0)"></th>
                                            <th>ID</th>
                                            <th>كود</th>
                                            <th>الاسم</th>
                                            <th>سعر قبل</th>
                                            <th><label>Sale</label><br><input type="checkbox" style="width: 50px;height: 50px;" value="0" onclick="$(this).attr('value', this.checked ? 1 : 0);SelectALL(this.checked ? 1 : 0)"></th>
                                            <th>سعر بعدالخصم</th>
                                            <th>Active
                                                <br><input type="checkbox" style="width: 50px;height: 50px;" value="0" onclick="$(this).attr('value', this.checked ? 1 : 0);SelectALLActive(this.checked ? 1 : 0)">
                                            </th>
                                            <th>العرض
                                                <select class="form-control" onchange="SelectALLSize(this.value)">
                                                    <option></option>
                                                    <?php
                                                    $conn6545 = new config();
                                                    $sql6555 = "SELECT * FROM `Offers`";
                                                    $result6555 = $conn6545->datacon()->query($sql6555);
                                                    ?>
                                                    <?php while ($row655 = $result6555->fetch_assoc()) { ?>
                                                        <option value="<?php echo $row655['ID'] ?>"><?php echo $row655['OfferNameAR'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </th>
                                            <th>وصل حديثاً
                                                <br><input type="checkbox" style="width: 50px;height: 50px;" value="0" onclick="$(this).attr('value', this.checked ? 1 : 0);SelectALLActivenew(this.checked ? 1 : 0)">
                                            </th>
                                        </tr>
                                    </thead>
                                    <script>
                                        function selected(id) {
                                            i = 0;
                                            while (true) {
                                                var checkbox = document.getElementById('selected' + i);
                                                if (!checkbox) {
                                                    break;
                                                }
                                                checkbox.value = id;
                                                checkbox.checked = id;
                                                i++;
                                            }
                                        }

                                        function SelectALL(id) {
                                            i = 0;
                                            while (true) {
                                                var checkbox = document.getElementById('my-checkbox' + i);
                                                if (!checkbox) {
                                                    break;
                                                }
                                                if (document.getElementById('selected' + i).value == 1) {
                                                    checkbox.value = id;
                                                    checkbox.checked = id;
                                                }
                                                i++;
                                            }
                                        }

                                        function SelectALLSize(value) {
                                            i = 0;
                                            while (true) {
                                                var SizeSelect = document.getElementById('SI' + i);
                                                if (!SizeSelect) {
                                                    break;
                                                }
                                                if (document.getElementById('selected' + i).value == 1) {
                                                    SizeSelect.value = value;
                                                }
                                                i++;
                                            }
                                        }

                                        function SelectALLCate(value) {
                                            i = 0;
                                            while (true) {
                                                var SizeSelect = document.getElementById('Ps' + i);
                                                if (!SizeSelect) {
                                                    break;
                                                }
                                                if (document.getElementById('selected' + i).value == 1) {
                                                    SizeSelect.value = value;
                                                }
                                                i++;
                                            }
                                        }

                                        function SelectALLStock(value) {
                                            i = 0;
                                            while (true) {
                                                var SizeSelect = document.getElementById('Pstock' + i);
                                                if (!SizeSelect) {
                                                    break;
                                                }
                                                if (document.getElementById('selected' + i).value == 1) {
                                                    SizeSelect.value = value;
                                                }
                                                i++;
                                            }
                                        }

                                        function SelectALLActive(id) {
                                            i = 0;
                                            while (true) {
                                                var checkbox = document.getElementById('active' + i);
                                                if (!checkbox) {
                                                    break;
                                                }
                                                if (document.getElementById('selected' + i).value == 1) {
                                                    checkbox.value = id;
                                                    checkbox.checked = id;
                                                }
                                                i++;
                                            }
                                        }

                                        function SelectALLActivenew(id) {
                                            i = 0;
                                            while (true) {
                                                var checkbox = document.getElementById('new' + i);
                                                if (!checkbox) {
                                                    break;
                                                }
                                                if (document.getElementById('selected' + i).value == 1) {
                                                    checkbox.value = id;
                                                    checkbox.checked = id;
                                                }
                                                i++;
                                            }
                                        }
                                    </script>
                                    <tbody>
                                        <?php
                                        if (isset($_POST['SearchGroup'])) {
                                        ?>
                                            <?php
                                            $pieces = explode(",", $_POST['SearchGroup']);

                                            $count = 0;
                                            $strt = "";
                                            foreach ($pieces as $value) {

                                                if ($count == 0) {
                                                    $str1 = "products.Photo LIKE '%$value%'";
                                                    $strt .= " " . $str1;
                                                } else {

                                                    $str1 = "products.Photo LIKE '%$value%'";
                                                    $strt .= " " . "OR" . " " . $str1;
                                                }
                                                $count++;
                                            }
                                            $conn65 = new config();
                                            $sql65 = "SELECT products.* FROM products WHERE $strt;";
                                            $result65 = $conn65->datacon()->query($sql65);
                                            $gg = 0;
                                            while ($row65 = $result65->fetch_assoc()) {
                                            ?>
                                                <tr>
                                                    <td><input type="checkbox" value="0" style="width: 30px;height: 30px;" id="selected<?php echo $gg ?>" onclick="$(this).attr('value', this.checked ? 1 : 0)"></td>
                                                    <td><a href="https://shaheen.center/Sh_dashboard/edit_product.php?ID=<?php echo $row65['ID'] ?>"><?php echo $row65['ID'] ?> <input type="hidden" name="Pid<?php echo $gg ?>" value="<?php echo $row65['ID'] ?>"></a></td>
                                                    <td><?php echo $row65['Photo'] ?></td>
                                                    <td><?php echo $row65['ArName'] ?></td>
                                                    <td><input type="number" class="form-control" name="Pprice<?php echo $gg ?>" value="<?php echo $row65['Price'] ?>"></td>
                                                    <td>

                                                        <?php if ($row65['BSale'] == 1) { ?>
                                                            <input type="checkbox" style="width: 50px;height: 50px;" id="my-checkbox<?php echo $gg ?>" name="my-checkbox<?php echo $gg ?>" value="1" onclick="$(this).attr('value', this.checked ? 1 : 0)" checked>
                                                        <?php } else { ?>
                                                            <input type="checkbox" style="width: 50px;height: 50px;" id="my-checkbox<?php echo $gg ?>" name="my-checkbox<?php echo $gg ?>" value="0" onclick="$(this).attr('value', this.checked ? 1 : 0)">
                                                        <?php } ?>
                                                    </td>
                                                    <td><input type="number" class="form-control" name="Psaleprice<?php echo $gg ?>" value="<?php echo $row65['SalePrice'] ?>"></td>
                                                    <td>

                                                        <?php if ($row65['Status'] == 1) { ?>
                                                            <input type="checkbox" style="width: 50px;height: 50px;" id="active<?php echo $gg ?>" name="active<?php echo $gg ?>" value="1" onclick="$(this).attr('value', this.checked ? 1 : 0)" checked>
                                                        <?php } else { ?>
                                                            <input type="checkbox" style="width: 50px;height: 50px;" id="active<?php echo $gg ?>" name="active<?php echo $gg ?>" value="0" onclick="$(this).attr('value', this.checked ? 1 : 0)">
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <select class="form-control" id="SI<?php echo $gg ?>" name="offer<?php echo $gg ?>">
                                                            <option></option>
                                                            <?php
                                                            $conn6545 = new config();
                                                            $sql6555 = "SELECT * FROM `Offers`";
                                                            $result6555 = $conn6545->datacon()->query($sql6555);
                                                            ?>
                                                            <?php while ($row655 = $result6555->fetch_assoc()) { ?>
                                                                <option value="<?php echo $row655['ID'] ?>"><?php echo $row655['OfferNameAR'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </td>
                                                    <td>

                                                        <?php if ($row65['Schedule'] == 1) { ?>
                                                            <input type="checkbox" style="width: 50px;height: 50px;" id="new<?php echo $gg ?>" name="new<?php echo $gg ?>" value="1" onclick="$(this).attr('value', this.checked ? 1 : 0)" checked>
                                                        <?php } else { ?>
                                                            <input type="checkbox" style="width: 50px;height: 50px;" id="new<?php echo $gg ?>" name="new<?php echo $gg ?>" value="0" onclick="$(this).attr('value', this.checked ? 1 : 0)">
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                            <?php $gg++;
                                            } ?>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th>Browser</th>
                                            <th>Platform(s)</th>
                                            <th>Engine version</th>
                                            <th>CSS grade</th>
                                            <th>CSS grade</th>
                                            <th><input type="submit" name="update" <?php if ($_SESSION['type'] == 'viewer') {
                                                                                        echo 'disabled';
                                                                                    } ?>></th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <input type="hidden" name="coynt" value="<?php echo $gg; ?>">
                            </form>
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

            //Date picker
            $('#reservationdate').datetimepicker({
                format: 'L'
            });

            //Date and time picker
            $('#reservationdatetime').datetimepicker({
                icons: {
                    time: 'far fa-clock'
                }
            });

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
            })

            $("input[data-bootstrap-switch]").each(function() {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            })

        })
    </script>

</body>

</html>