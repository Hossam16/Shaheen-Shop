<?php include "config.php";
?>

<?php 

	session_start();
	if(($_SESSION['AID'])>0)
{
}
else

{
	header('Location: login.php');
}
?>


<?php
$orders_omm='active';
$orders_xm='menu-open';
$daily_orderssss='active';
$msg = 0;
?>


<?php if(isset($_POST['Cancel']))
{
	Order::Cancel($_POST['Cancel']);
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
                    <h1>Edit Order</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Web orders</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

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
                        <table id="example1" class="table table-bordered table-striped" style="text-align: center;display: none;table-layout: fixed;" >
                            <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Client Name</th>
                                <th>Location</th>
                                <th>Governorate</th>
                                <th>Phone</th>
								<th>Products</th>
                                <th>SubTotal</th>
								<th>Shipping</th>
								<th>TotalPrice</th>
								<th>Status</th>
								<th>Date</th>
								<th>Edit</th>
								<th>Cancel</th>
                            </tr>
                            </thead>
                            <tbody>
								<?php  
								$res = Order::ViewAllOrdersWeb();
								while($roww = $res->fetch_assoc())
								{		
								?>
                            <tr>
                                <td><?php echo($roww['ID']); ?></td>
                                <td><?php echo($roww['CName']); ?></td>
                                <td><?php echo($roww['Location']); ?></td>
                                <td><?php echo($roww['Governorate']); ?></td>
                                <td><?php echo($roww['Phone']); ?></td>
								<td><table style="width: 100%;">
									<tr>
                                <th>Name</th>
								<th>Product Price</th>
								<th>Count</th>
                                <th>Price</th>
                            </tr>
									<?php 
									$ress = Orderdata::ViewOrderdataweb($roww['ID']);
									while($roow = $ress->fetch_assoc())
									{
									?>
									<tr>
                                <td><?php echo($roow['ArName']); ?></td>
								<td><?php echo($roow['Price']); ?></td>
                                <td><?php echo($roow['Count']); ?></td>
                                <td><?php echo($roow['PPrice'])?></td>
                            </tr>
									<?php } ?>
									</table></td>
								<td><?php echo($roww['SubTotal']); ?></td>
								<td><?php echo($roww['Shipping']); ?></td>
								<td><?php echo($roww['TotalPrice']); ?></td>
								<td><?php echo($roww['Status']); ?></td>
								<td><?php echo($roww['Date']); ?></td>
                                <td>
                                    <a href="editorderdataweb.php?OID=<?php echo($roww['ID']); ?>"><button type="button" class="btn btn-block btn-primary">Edit</button></a>
                                </td>
								<td>
									<form method="post">
                                    <button type="submit" class="btn btn-block btn-danger btn-sm" value="<?php echo($roww['ID']); ?>" name="Cancel">Cancel</button>
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
	<script type="text/javascript">
      setTimeout(showAlert, 20);
		 function showAlert() {
       document.getElementById("example1").style.display = "block";
    }
 </script> 

</body>
</html>