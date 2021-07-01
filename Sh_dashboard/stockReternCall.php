<?php include "config.php";
?>
<?php

session_start();
if (isset($_SESSION['AID'])) {
} else {
    header('Location: login.php');
}
?>


<?php
$orders_ma = 'active';
$orders_m = 'menu-open';
$callcenter_ordersRstock = 'active';
$msg = 0;
?>


<?php if (isset($_POST['Cancel'])) {
    Order::Cancel($_POST['Cancel']);
}
?>

<?php if (isset($_POST['Transfer'])) {
    Order::Transfer();
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
                        <h1>Edit CS Orders <?php if (isset($_POST['date'])) {
                                                echo $_POST['date'];
                                            } ?></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">جميع المنتجات</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content" style="">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <form method="post">
                                <label>Date:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" name="date" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask>
                                    <select class="form-control" name="Status">
                                        <option value="Pniding">Pniding</option>
                                        <option value="Canceled">Canceled</option>
                                    </select>
                                    <button type="submit" name="select">تحديد</button>
                                </div>
                            </form>
                        </div>
                        <?php if (isset($_POST['select'])) { ?>
                            <!-- /.card-header -->
                            <div class="card-body" style="direction:rtl">
                                <div class="card-header">
                                    <button name="create_excel" id="btnExport" onclick="fnExcelReport();" class="btn btn-info" <?php if ($_SESSION['type'] == 'viewer') {
                                                                                                                                    echo 'disabled';
                                                                                                                                } ?>>Create Excel File</button>
                                </div>
                                <table id="example1" class="table table-bordered table-striped" style="text-align: center;">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>الموظف</th>
                                            <th>العميل</th>
                                            <th>العنوان</th>
                                            <th>المدينة</th>
                                            <th>Ph-1</th>
                                            <th>Ph-2</th>
                                            <th>المنتجات</th>
                                            <th>فاتورة</th>
                                            <th>ملاحظة</th>
                                            <th>تعليق داخلي</th>
                                            <th>تحويل</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $res = Order::ViewAllOrdersTA($_POST['date'], $_POST['Status']);
                                        while ($roww = $res->fetch_assoc()) {
                                            $NumberOfOrders++;
                                        ?>
                                            <tr>
                                                <td><a href="editorderdata.php?OID=<?php echo ($roww['ID']); ?>"><?php echo ($roww['ID']); ?></a></td>
                                                <td><?php
                                                    $rowsss = User::selsectname($roww['AID']);
                                                    echo ($rowsss['username']);
                                                    ?></td>
                                                <td><?php echo ($roww['CName']); ?></td>
                                                <td><?php echo ($roww['Location']); ?></td>
                                                <td><?php echo ($roww['Governorate']); ?></td>
                                                <td><?php echo ($roww['Phone']); ?></td>
                                                <td><?php echo ($roww['Phone2']); ?></td>
                                                <td>
                                                    <table style="width: 100%;">
                                                        <tr>
                                                            <th>منتج</th>
                                                            <th>سعر ق</th>
                                                            <th>عدد</th>
                                                            <th>سعر</th>
                                                            <th>رد المخزن</th>
                                                        </tr>
                                                        <?php
                                                        $ress = Orderdata::ViewOrderdata($roww['ID']);
                                                        while ($roow = $ress->fetch_assoc()) {
                                                            $reess = Products::ViewSingleProduct($roow['PID']);
                                                            $rosw = $reess->fetch_assoc();
                                                        ?>
                                                            <tr>
                                                                <td><?php echo ($rosw['ArName']); ?></td>
                                                                <td><?php
                                                                    if ($rosw['BSale'] == 1) {
                                                                        echo ($rosw['SalePrice']);
                                                                    } else {
                                                                        echo ($rosw['Price']);
                                                                    }
                                                                    ?></td>
                                                                <td><?php echo ($roow['Count']); ?></td>
                                                                <td><?php echo ($roow['OPP']) ?></td>
                                                                <td><?php echo ($roow['Availability']) ?> <br> <?php echo ($roow['Alternative']) ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                    </table>
                                                <td>
                                                    <p style=" border-bottom: double; ">قبل الشحن: <span style="font-weight: bold;"><?php $TotalAmount = $TotalAmount + $roww['SubTotal'];
                                                                                                                                    echo ($roww['SubTotal']); ?> LE</span></p> <br>
                                                    <p style=" border-bottom: double; ">الشحن: <span style="font-weight: bold;"> <?php echo ($roww['Shipping']); ?> LE </span></p><br>
                                                    <p style=" border-bottom: double; ">بعد الشحن: <span style="font-weight: bold;"> <?php echo ($roww['TotalPrice']); ?> LE </span> </p>
                                                </td>
                                                <td><?php echo ($roww['Note']); ?></td>
                                                <td>
                                                    <select name="Status" ID="CanceledNote<?php echo ($roww['ID']); ?>" disabled>
                                                        <option value="<?php echo ($roww['innerNote']); ?>" selected><?php echo ($roww['innerNote']); ?></option>
                                                        <option value="إلغاء بسبب مصاريف الشحن">إلغاء بسبب مصاريف الشحن</option>
                                                        <option value="إلغاء بسبب تأخير مدة التوصيل">إلغاء بسبب تأخير مدة التوصيل</option>
                                                        <option value="نواقص فروع">نواقص مخزن</option>
                                                        <option value="نواقص فروع">نواقص فروع</option>
                                                        <option value="ظروف شخصية">ظروف شخصية</option>
                                                        <option value="عدم الجدية من طرف العميل">عدم الجدية من طرف العميل</option>
                                                        <option value="تم شرائها من الفرع">تم شرائها من الفرع</option>
                                                        <option value="توالف منتجات صيانة">توالف منتجات صيانة</option>
                                                        <option value="تأخير تحويل الفرع">تأخير تحويل الفرع</option>
                                                        <option value="اختلاف الوان">اختلاف الوان</option>
                                                        <option value="No Note">No Note</option>
                                                        <option value="No Note">No Note</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <form method="post">
                                                        <select name="Status" ID="SelectValue<?php echo ($roww['ID']); ?>" onchange="CaneledNoteChange(<?php echo ($roww['ID']); ?>)">
                                                            <?php if ($roww['Status'] == 'New') { ?>
                                                                <option value="New" selected>جديد</option>
                                                                <option value="Confirmed">تم التاكيد</option>
                                                                <option value="Missed3">3 مكالمات فائته</option>
                                                                <option value="Canceled">تم الالغاء</option>
                                                            <?php } elseif ($roww['Status'] == 'Missed3') { ?>
                                                                <option value="New">جديد</option>
                                                                <option value="Confirmed">تم التاكيد</option>
                                                                <option value="Missed3" selected>3 مكالمات فائته</option>
                                                                <option value="Canceled">تم الالغاء</option>
                                                            <?php } elseif ($roww['Status'] == 'Finished') { ?>
                                                                <option value="New">جديد</option>
                                                                <option value="Confirmed">تم التاكيد</option>
                                                                <option value="Missed3">3 مكالمات فائته</option>
                                                                <option value="Canceled">تم الالغاء</option>
                                                                <option value="Finished" selected>تم التسليم</option>
                                                            <?php } elseif ($roww['Status'] == 'Canceled') { ?>
                                                                <option value="New">جديد</option>
                                                                <option value="Confirmed">تم التاكيد</option>
                                                                <option value="Missed3">3 مكالمات فائته</option>
                                                                <option value="Canceled" selected>تم الالغاء</option>
                                                                <option value="Finished">تم التسليم</option>
                                                            <?php } elseif ($roww['Status'] == 'Stock Ready') { ?>
                                                                <option value="Stock Ready" selected>مؤكد من المخزن</option>
                                                                <option value="Confirmed">تم التاكيد</option>
                                                                <option value="Missed3">3 مكالمات فائته</option>
                                                                <option value="Canceled">تم الالغاء</option>
                                                                <option value="Finished">تم التسليم</option>
                                                            <?php } ?>
                                                        </select>
                                                        <button type="button" class="btn btn-block btn-info btn-sm" ID="OrderID" onclick="EditPPInOD(<?php echo ($roww['ID']); ?>)" value="<?php echo ($roww['ID']); ?>" name="Update" <?php if ($_SESSION['type'] == 'viewer') {
                                                                                                                                                                                                                                            echo 'disabled';
                                                                                                                                                                                                                                        } ?>>Update</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <script>
                                            function EditPPInOD(OrderID) {
                                                var SelectValue = '';
                                                SelectValue = SelectValue.concat('SelectValue', OrderID);
                                                var NewStatus = document.getElementById(SelectValue).value;
                                                var CanceledNote = '';
                                                CanceledNote = CanceledNote.concat('CanceledNote', OrderID);
                                                var CancelNote = document.getElementById(CanceledNote).value;
                                                jQuery.ajax({
                                                    type: "POST",
                                                    url: 'webJson/orderEdits.php',
                                                    dataType: 'json',
                                                    data: {
                                                        functionname: 'UpdateStatus',
                                                        arguments: [NewStatus, OrderID, CancelNote]
                                                    },

                                                    success: function(obj, textstatus) {
                                                        if (!('error' in obj)) {
                                                            yourVariable = obj.result;
                                                            alert(yourVariable);
                                                        } else {
                                                            console.log(obj.error);
                                                        }
                                                    }
                                                });
                                            }
                                        </script>
                                        <script>
                                            function CaneledNoteChange(OrderIDd) {
                                                var SelectValue = '';
                                                SelectValue = SelectValue.concat('SelectValue', OrderIDd);
                                                var x = document.getElementById(SelectValue).value;
                                                var CanceledNote = '';
                                                CanceledNote = CanceledNote.concat('CanceledNote', OrderIDd);
                                                if (x == 'Canceled') {
                                                    document.getElementById(CanceledNote).disabled = false;
                                                } else {
                                                    document.getElementById(CanceledNote).disabled = true;
                                                }
                                            }
                                        </script>
                                    </tbody>

                                </table>
                                <div class="row">
                                    <div class="col-lg-3 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-info">
                                            <div class="inner">
                                                <h3><?php echo $NumberOfOrders ?></h3>

                                                <p>Number of Orders</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-bag"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-lg-3 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-info">
                                            <div class="inner">
                                                <h3>LE <?php echo $TotalAmount ?></h3>

                                                <p>Order Amount</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-bag"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ./col -->
                                </div>
                            </div>
                        <?php } ?>


                        <?php
                        if (isset($_POST['date'])) {
                            $Date = $_POST['date'];

                            $Conn = new Config();
                            /**EDIT LINES 3-8**/
                            /**YOU DO NOT NEED TO EDIT ANYTHING BELOW THIS LINE**/
                            //create MySQL connection
                            $sql = "SELECT dashorders.ID,admin.username,dashorders.CName,dashorders.Location,dashorders.Governorate,dashorders.Phone,dashorders.Phone2,products.ArName,products.Photo,dashorderdata.Count,dashorderdata.Price,dashorders.SubTotal,dashorders.Shipping,dashorders.TotalPrice,dashorders.Status,dashorders.Date,dashorders.Note FROM dashorders INNER JOIN dashorderdata on dashorderdata.OID=dashorders.ID INNER JOIN products on dashorderdata.PID=products.ID INNER JOIN admin on admin.ID=dashorders.AID WHERE dashorders.Date like '%$Date%' ORDER BY dashorders.ID ASC";
                            //select database
                            //@mysqli_query($sql,$Conn->datacon()) or die("Couldn't execute query:<br>" . mysqli_error($Conn->datacon()));
                            //execute query
                            $result = $Conn->datacon()->query($sql);
                            // $file_ending = "xls";
                            // //header info for browser
                            // header("Content-Type: application/xls");
                            // header("Content-Disposition: attachment; filename=$Date.xls");
                            // header("Pragma: no-cache");
                            // header("Expires: 0");


                        ?>
                            <table style="display: none;" id="download">
                                <thead>
                                    <tr>
                                        <th>

                                            <?php
                                            echo ('رقم الطلب');
                                            ?>
                                        </th>
                                        <th>
                                            <?php
                                            echo ('التاريخ');
                                            ?>
                                        </th>
                                        <th>
                                            <?php
                                            echo ('الموظف');
                                            ?>
                                        </th>
                                        <th>
                                            <?php
                                            echo ('اسم العميل');
                                            ?>
                                        </th>
                                        <th>
                                            <?php
                                            echo ('العنوان');
                                            ?>
                                        </th>
                                        <th>
                                            <?php
                                            echo ('المحافظة');
                                            ?>
                                        </th>
                                        <th>
                                            <?php
                                            echo ('رقم التليفون ');
                                            ?>
                                        </th>
                                        <th>
                                            <?php
                                            echo ('رقم التليفون الاخر');
                                            ?>
                                        </th>
                                        <th>
                                            <?php
                                            echo ('المنتج');
                                            ?>
                                        </th>
                                        <th>
                                            <?php
                                            echo ('المنتج');
                                            ?>
                                        </th>
                                        <th>
                                            <?php
                                            echo ('العدد');
                                            ?>
                                        </th>
                                        <th>
                                            <?php
                                            echo ('سعر المنتج ');
                                            ?>
                                        </th>
                                        <th>
                                            <?php
                                            echo ('المجموع');
                                            ?>
                                        </th>
                                        <th>
                                            <?php
                                            echo ('تكلفة شحن');
                                            ?>
                                        </th>
                                        <th>
                                            <?php
                                            echo ('تكلفة الطلب');
                                            ?>
                                        </th>
                                        <th>
                                            <?php
                                            echo ('حالة الطلب');
                                            ?>
                                        </th>
                                        <th>
                                            <?php
                                            echo ('الملحوظة');
                                            ?>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    while ($row = $result->fetch_assoc()) {

                                    ?>
                                        <tr>
                                            <td>
                                                <?php
                                                echo $row['ID'];
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo $row['Date'];
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo $row['username'];
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo $row['CName'];
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo $row['Location'];
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo $row['Governorate'];
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo $row['Phone'];
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo $row['Phone2'];
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo $row['ArName'];
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo $row['Photo'];
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo $row['Count'];
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo $row['Price'];
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo $row['SubTotal'];
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo $row['Shipping'];
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo $row['TotalPrice'];
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo $row['Status'];
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo $row['Note'];
                                                ?>
                                            </td>

                                        <?php
                                    }

                                        ?>
                                        </tr>
                                </tbody>
                            </table>
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