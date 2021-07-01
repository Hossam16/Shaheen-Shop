<?php include "config.php";
?>
<?php 

session_start();
if(isset($_SESSION['AID']))
{
}
else

{
header('Location: login.php');
}
?>


<?php
$orders_xmstock='active';
$orders_ommStock='menu-open';
$daily_orderssstockcal4l='active';
$msg = 0;
?>


<?php if(isset($_POST['Cancel']))
{
	Order::Cancel($_POST['Cancel']);
}
?>

<?php if(isset($_POST['CahngeStatu']))
{
    Order::CahngeStatus($_POST['CahngeStatu'],$_POST['Status'],Null);
}
?>

<!DOCTYPE html>
<html>
<?php include"head.php";?>
<body class="hold-transition sidebar-mini layout-fixed" >
<?php include"layout.php";?>
	
	
	
	
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> سحب طلبيات خدمة عملاء</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">تاكيد مخزون طلبيات خدمة عملاء</li>
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
                <div class="card-header">
                        <h3 class="card-title">CS Orders</h3>
                    </div>
                <div class="card-header">
                        <form method="post">
                        <label>Date:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                </div>
                <input type="text" name="date" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask>
                <button type="submit" name="select">تحديد</button>
            </div>
                        </form>
                    </div> 
                    <div class="card-header">
                        <h3 class="card-title"> سحب طلبيات خدمة عملاء</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="direction: rtl;">
                        <table id="example1" class="table table-bordered table-striped" style="text-align: center;" >
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
                                <th>ملاحظة</th>
                                <th>حالة الاوردر</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(isset($_POST['select'])){ ?> 
								<?php  
								$res = Order::ViewAllConfirmedOrdersfinal($_POST['date']);
								while($roww = $res->fetch_assoc())
								{		
								?>
                            <tr>
                            <td> <a href="editorderdata.php?OID=<?php echo($roww['ID']); ?>"><?php echo($roww['ID']); ?></a></td>
                                <td><?php
									$rowsss = User::selsectname($roww['AID']);
									echo($rowsss['username']);
									?></td>
                                <td><?php echo($roww['CName']); ?></td>
                                <td><?php echo($roww['Location']); ?></td>
                                <td><?php echo($roww['Governorate']); ?></td>
                                <td><?php echo($roww['Phone']); ?></td>
                                <td><?php echo($roww['Phone2']); ?></td>
								<td><table style="width: 100%;">
									<tr>
                                <th>Code</th>
                                <th>Name</th>
								<th>Product Price</th>
								<th>Count</th>
                                <th>Price</th>
                                <th>availability</th>
                            </tr>
									<?php 
									$ress = Orderdata::ViewOrderdata($roww['ID']);
									while($roow = $ress->fetch_assoc())
									{
										$reess = Products:: ViewSingleProduct($roow['PID']);
										$rosw = $reess->fetch_assoc();
									?>
									<tr>
                  <td><?php $rosw['Photo']=explode(".",$rosw['Photo']); echo($rosw['Photo'][0]); ?></td>
                                <td><?php echo($rosw['ArName']); ?></td>
                                <td><?php 
                                if($rosw['BSale']==1)
                                {
                                    echo($rosw['SalePrice']);  
                                }else
                                {
                                echo($rosw['Price']); 
                                }
                                ?></td>
                                <td><?php echo($roow['Count']); ?></td>
                                <td><?php echo($roow['Price'])?></td>
                                <td>
                                        <?php echo($roow['Availability'])?>
                                </td>
                            </tr>
									<?php } ?>
									</table></td>
                                    <td> <p style=" border-bottom: double; ">قبل الشحن: <span style="font-weight: bold;"><?php echo($roww['SubTotal']); ?> LE</span></p> <br><p style=" border-bottom: double; ">الشحن: <span style="font-weight: bold;"> <?php echo($roww['Shipping']); ?> LE </span></p><br><p style=" border-bottom: double; ">بعد الشحن: <span style="font-weight: bold;"> <?php echo($roww['TotalPrice']); ?> LE </span> </p></td>
                                <td><?php echo($roww['Note']); ?></td>
                                <td>
                              <?php echo($roww['Status']);?>
                                       </td>
                            </tr>
								<?php }} ?>
                            </tbody>
                        </table>

                        <table id="download" style="display: none;">
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
                                <th>سعر المنتجات</th>
                                <th>الشحن</th>
                                <th>الاجمالي</th>
                                <th>ملاحظة</th>
                                <th>حالة الاوردر</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(isset($_POST['select'])){ ?> 
								<?php  
								$res = Order::ViewAllConfirmedOrdersfinal($_POST['date']);
								while($roww = $res->fetch_assoc())
								{		
								?>
                            <tr>
                            <td> <?php echo($roww['ID']); ?></td>
                                <td><?php
									$rowsss = User::selsectname($roww['AID']);
									echo($rowsss['username']);
									?></td>
                                <td><?php echo($roww['CName']); ?></td>
                                <td><?php echo($roww['Location']); ?></td>
                                <td><?php echo($roww['Governorate']); ?></td>
                                <td><?php echo($roww['Phone']); ?></td>
                                <td><?php echo($roww['Phone2']); ?></td>
								<td><table>
									<tr>
                                <th>Code</th>
                                <th>Name</th>
								<th>Product Price</th>
								<th>Count</th>
                                <th>Price</th>
                                <th>availability</th>
                            </tr>
									<?php 
									$ress = Orderdata::ViewOrderdata($roww['ID']);
									while($roow = $ress->fetch_assoc())
									{
										$reess = Products:: ViewSingleProduct($roow['PID']);
										$rosw = $reess->fetch_assoc();
									?>
									<tr>
                  <td><?php $rosw['Photo']=explode(".",$rosw['Photo']); echo($rosw['Photo'][0]); ?></td>
                                <td><?php echo($rosw['ArName']); ?></td>
                                <td><?php 
                                if($rosw['BSale']==1)
                                {
                                    echo($rosw['SalePrice']);  
                                }else
                                {
                                echo($rosw['Price']); 
                                }
                                ?></td>
                                <td><?php echo($roow['Count']); ?></td>
                                <td><?php echo($roow['Price'])?></td>
                                <td>
                                        <?php echo($roow['Availability'])?>
                                </td>
                            </tr>
									<?php } ?>
									</table></td>
                                    <td><?php echo($roww['SubTotal']); ?></td>
                                    <td><?php echo($roww['Shipping']); ?></td>
                                    <td><?php echo($roww['TotalPrice']); ?></td>
                                <td><?php echo($roww['Note']); ?></td>
                                <td>
                              <?php echo($roww['Status']);?>
                                       </td>
                            </tr>
								<?php }} ?>
                            </tbody>
                        </table>
                        <div>
                     <button name="create_excel" id="btnExport" onclick="fnExcelReport();" class="btn btn-success">Create Excel File</button>  
                </div>

                            <script>  function fnExcelReport()
{
    var tab_text="<head><meta charset='UTF-8'></head><table border='2px'><tr style='color: white;background: #2a57a5'>";
    var textRange; var j=0;
    tab = document.getElementById('download'); // id of table

    for(j = 0 ; j < tab.rows.length ; j++) 
    {     
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text=tab_text+"</table>";
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
        txtArea1.document.open("txt/html","replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus(); 
        sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
    }  
    else                 //other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

    return (sa);
}
 </script>

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
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd-mm-yyyy', { 'placeholder': 'dd-mm-yyyy' })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
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
        $('#daterange-btn').daterangepicker(
            {
                ranges   : {
                    'Today'       : [moment(), moment()],
                    'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                    'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate  : moment()
            },
            function (start, end) {
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

        $("input[data-bootstrap-switch]").each(function(){
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });

    })
</script>
<script>
    $(function () {
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
