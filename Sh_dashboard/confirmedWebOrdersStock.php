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
$daily_orderssstock='active';
$msg = 0;
?>


<?php if(isset($_POST['Cancel']))
{
	Order::Cancel($_POST['Cancel']);
}
?>

<?php if(isset($_POST['CahngeStatu']))
{
    Order::CahngeStatusWeb($_POST['CahngeStatu'],$_POST['Status'],NULL);
}
?>

<!DOCTYPE html>
<html>
<?php include "head.php";?>
<body class="hold-transition sidebar-mini layout-fixed" >
<?php include "layout.php";?>
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>تاكيد مخزون طلبيات ويب</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">تاكيد مخزون طلبيات ويب</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content" >
        <div class="row">
            <div class="col-12">
                <div class="card">
                <div class="card-header">
                        <h3 class="card-title">Web Orders</h3>
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
                        <h3 class="card-title">تاكيد مخزون طلبيات ويب</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="direction: rtl;">
                        <table id="example1" class="table table-bordered table-striped" style="text-align: center;" >
                            <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>اسم العميل</th>
                                <th>العنوان</th>
                                <th>المحافظة</th>
                                <th>Ph-1</th>
								<th>المنتجات</th>
                                <th>الفاتورة</th>
                                <th>ملاحظة</th>
                                <th>حالة الطلب</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(isset($_POST['select'])){ ?>
								<?php  
								$res = Order::ViewAllConfirmedWebOrders($_POST['date']);
								while($roww = $res->fetch_assoc())
								{		
								?>
                            <tr>
                            <td> <a href="editorderdata.php?OID=<?php echo($roww['ID']); ?>"><?php echo($roww['ID']); ?></a></td>
                                <td><?php echo($roww['CName']); ?></td>
                                <td><?php echo($roww['Location']); ?></td>
                                <td><?php echo($roww['Governorate']); ?></td>
                                <td><?php echo($roww['Phone']); ?></td>
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
									$ress = Orderdata::ViewOrderdataweb($roww['ID']);
									while($roow = $ress->fetch_assoc())
									{
									?>
									<tr>
                                <td><?php $roow['Photo']=explode(".",$roow['Photo']); echo($roow['Photo'][0]); ?></td>
                                <td><?php echo($roow['ArName']); ?></td>
								<td><?php echo($roow['Price']); ?></td>
                                <td><?php echo($roow['Count']); ?></td>
                                <td><?php echo($roow['PPrice'])?></td>
                                <td>
                                <select ID="orderDataStatus<?php echo $roow['ID']?>" name="Availability" <?php if($roow['Availability']=='Available'){echo 'disabled';} ?>>
                                        <option value="<?php echo($roow['Availability'])?>"><?php echo($roow['Availability'])?></option>
                                        <option value="Available" >Available </option>
                                        <option value="Not Available" >Not Available </option>
                                        <option value="Some Available">Some Available</option>
                                    </select>
                                    <textarea ID="Alternative<?php echo $roow['ID']?>"> <?php echo($roow['Alternative'])?> </textarea>
                                    <button type="submit" class="btn btn-block btn-info btn-sm" onclick="editODS(<?php echo($roow['ID']); ?>)" value="<?php echo $roow['ID'] ?>" name="Cahnge" <?php if($_SESSION['type']=='viewer') {echo'disabled';}?>>Cahnge</button>
                           </td>
                            </tr>
									<?php } ?>
									</table></td>
                                    <td> <p style=" border-bottom: double; ">قبل الشحن: <span style="font-weight: bold;"><?php echo($roww['SubTotal']); ?> LE</span></p> <br><p style=" border-bottom: double; ">الشحن: <span style="font-weight: bold;"> <?php echo($roww['Shipping']); ?> LE </span></p><br><p style=" border-bottom: double; ">بعد الشحن: <span style="font-weight: bold;"> <?php echo($roww['TotalPrice']); ?> LE </span> </p></td>
                                <td><?php echo($roww['Note']); ?></td>
                                <td>
                                <form  method="post">
                                <select name="Status" id="orderStatus<?php echo($roww['ID']); ?>">
                                        <option value="<?php echo($roww['Status']);?>"><?php echo($roww['Status']);?></option>
                                        <option value="Stock Ready" >Stock Ready</option>
                                    </select>
                                    <button type="button" class="btn btn-block btn-info btn-sm" onclick="editOS(<?php echo($roww['ID']); ?>)" <?php if($_SESSION['type']=='viewer') {echo'disabled';}?>>Cahnge</button>
                            </form>
                                </td>
                            </tr>
								<?php }} ?>
                            </tbody>
    
                        </table>
                    </div>
                    <script>
                        function editODS(OrderDataID) {
                          var orderDataStatus= '';
                          orderDataStatus= orderDataStatus.concat('orderDataStatus',OrderDataID);
                          var NewStatus= document.getElementById(orderDataStatus).value;

                          var Alternative= '';
                          Alternative= Alternative.concat('Alternative',OrderDataID);
                          var NewAlternative= document.getElementById(Alternative).value;
                          jQuery.ajax({
                                          type: "POST",
                                          url: 'webJson/orderEdits.php',
                                          dataType: 'json',
                                          data: {functionname: 'UpdateOrderDataWebStatus', arguments: [NewStatus,NewAlternative,OrderDataID]},

                                          success: function (obj, textstatus) {
                                                        if( !('error' in obj) ) {
                                                            yourVariable = obj.result;
                                                            alert(yourVariable);
                                                        }
                                                        else {
                                                            console.log(obj.error);
                                                        }
                                                  }
                                      });
                        }  
                        </script>
                        <script>
                        function editOS(OrderID) {
                            var orderStatus= '';
                            orderStatus= orderStatus.concat('orderStatus',OrderID);
                            var NewStatus= document.getElementById(orderStatus).value;
                            jQuery.ajax({
                                          type: "POST",
                                          url: 'webJson/orderEdits.php',
                                          dataType: 'json',
                                          data: {functionname: 'UpdateOrderCallStatusWeb', arguments: [NewStatus,OrderID]},

                                          success: function (obj, textstatus) {
                                                        if( !('error' in obj) ) {
                                                            yourVariable = obj.result;
                                                            alert(yourVariable);
                                                        }
                                                        else {
                                                            console.log(obj.error);
                                                        }
                                                  }
                                      });
                        }  
                        </script>
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
