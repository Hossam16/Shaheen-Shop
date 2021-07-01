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
$daily_orderss='active';
$msg = 0;
?>
<?php
if(isset($_POST['submit']))
{
	$newdashorder = new Order($_SESSION['AID'],$_POST['CName'],$_POST['address'],$_POST['Governorate'],$_POST['CPhone1'],$_POST['CPhone2'],0,0,0,'New');
	$OID = $newdashorder->AddOrder();
	$d = $_POST['dual'];
	$subtotall=0;
	$i=0;
	foreach($d as $PID)
	{
		$res = Products::ViewSingleProduct($PID);
		$row= $res->fetch_assoc();
		if($row['BSale']==1)
		{
			$Price= $row['SalePrice'];
		}else
		{
			$Price= $row['Price'];
		}
		
		$subtotall=$Price+$subtotall;
		$count[$i]=1;
		$neworderdata = new Orderdata($OID,$PID,$count[$i],$Price);
		$i++;
		$neworderdata->AddOrderdata();
	}
	$governorate=$_POST['Governorate'];
	include('shipping.php');
	Order::Update($subtotall,$total,$total+$subtotall,$OID,$governorate);
}
if(isset($_POST['update']))
{
	$OID = $_POST['OID'];
	$d = $_POST['dual'];
	$c = $_POST['productCount'];
	$subtotall=0;
	$i=0;
	foreach($d as $PID)
	{
		$res = Products::ViewSingleProduct($PID);
		$row= $res->fetch_assoc();
		$count[$i]=$c[$i];
		if($row['BSale']==1)
		{
			$Price= $row['SalePrice']*$count[$i];
		}else
		{
			$Price= $row['Price']*$count[$i];
		}
		Orderdata::Update($OID,$count[$i],$Price,$PID);
		$i++;
		$subtotall=$Price+$subtotall;
	}
	$governorate=$_POST['Governorate'];
	include('shipping.php');
	Order::Update($subtotall,$total,$total+$subtotall,$OID,$governorate);
}

if(isset($_POST['makeorderss']))
{
	$OID = $_POST['OID'];
	$d = $_POST['dual'];
	$c = $_POST['productCount'];
	$subtotall=0;
	$i=0;
	foreach($d as $PID)
	{
		$res = Products::ViewSingleProduct($PID);
		$row= $res->fetch_assoc();
		$count[$i]=$c[$i];
		if($row['BSale']==1)
		{
			$Price= $row['SalePrice']*$count[$i];
		}else
		{
			$Price= $row['Price']*$count[$i];
		}
		Orderdata::Update($OID,$count[$i],$Price,$PID);
		$i++;
		$subtotall=$Price+$subtotall;
	}
	$governorate=$_POST['Governorate'];
	include('shipping.php');
	Order::Update($subtotall,$total,$total+$subtotall,$OID,$governorate);
	
	
	echo "<script type=\"text/javascript\">
							window.location = \"creatorder.php\"
							</script>";
}

?>


<!DOCTYPE html>
<html>
<?php include"head.php";?>
<body class="hold-transition sidebar-mini layout-fixed" >
<?php include"layout.php";?>
	
	 <!-- Main content -->
	
   <!-- right column -->
          <div class="col-md-10" style="margin-left: 250px;">
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Order Make </h3>
				  <h3 class="card-title"> ID: <?php echo($OID)?></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
				  
                <form role="form" method="post">
					
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                        <input type="hidden" class="form-control" placeholder="Enter ..." name="OID" value="<?php echo($OID) ?>">
                      <div class="form-group">
                        <label>Client Name</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="CName" value="<?php echo($_POST['CName']) ?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Phone 1</label>
                        <input type="number" class="form-control" placeholder="+02" name="CPhone1" value="<?php echo($_POST['CPhone1']) ?>">
                      </div>
                    </div>
					   <div class="col-sm-6">
                      <div class="form-group">
                        <label>Phone 2 (optional)</label>
                        <input type="number" class="form-control" placeholder="+02" name="CPhone2" value="<?php echo($_POST['CPhone2']) ?>">
                      </div>
                    </div>
					   <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Select</label>
                        <select class="form-control" name="Governorate">
                          <option value="<?php echo($_POST['Governorate']) ?>"><?php echo($_POST['Governorate']) ?></option>
                          <option value="Cairo">Cairo</option>
                            <option value="Giza">Giza</option>
                            <option value="Port Said">Port Said</option>
                            <option value="Ismailia">Ismailia</option>
                            <option value="Suez">Suez</option>
                            <option value="Ain Sokhna">Ain Sokhna</option>
                            <option value="Dakahlia">Dakahlia</option>
                            <option value="Alexandria">Alexandria</option>
                            <option value="Beheira">Beheira</option>
                            <option value="Kafr El-Sheikh">Kafr El-Sheikh</option>
                            <option value="Qaliubiya">Qaliubiya</option>
                            <option value="Algharbia">Algharbia</option>
                            <option value="Menoufia">Menoufia</option>
                            <option value="Alsharqia">Alsharqia</option>
                            <option value="Damanhur">Damanhur</option>
                            <option value="Mansoura">Mansoura</option>
                            <option value="Fayoum">Fayoum</option>
                            <option value="Bani Sweif">Bani Sweif</option>
                            <option value="Minya">Minya</option>
                            <option value="Asyut">Asyut</option>
                            <option value="Sohag">Sohag</option>
                            <option value="Qena">Qena</option>
                            <option value="Alaqsir">Alaqsir</option>
                            <option value="Aswan">Aswan</option>
                        </select>
                      </div>
                    </div>
					  <div class="col-sm-12">
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="address" value="<?php echo($_POST['address']) ?>">
                      </div>
                    </div>
                  </div>
           
	
					<div class="row">
						<?php $i=0;foreach($d as $sdsd)
	{
			$res = Products::ViewSingleProduct($sdsd);
	$row=$res->fetch_assoc();
						?>
						 <div class="col-sm-3">
                      <div class="form-group">
                        <label>ID</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="dual[]" value="<?php echo($row['ID']) ?>">
                      </div>
                    </div>
						 <div class="col-sm-3">
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="productName" value="<?php echo($row['ArName'])?>" >
                      </div>
                    </div>
						 <div class="col-sm-3">
                      <div class="form-group">
                        <label>Count</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="productCount[]" value="<?php echo($count[$i]); ?>" >
                      </div>
                    </div>
						 <div class="col-sm-3">
                      <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="productPrice" value="<?php echo($row['Price']*$count[$i]) ?>" >
                      </div>
                    </div>
<?php $i++;} ?>
						<div class="col-sm-12">
						<div class="form-group">
                         <button type="submit" class="btn btn-block btn-info btn-lg" name="update">Update</button>
                      </div>
						</div>	
						
						<div class="col-sm-4">
						<div class="form-group">
                        <label>Sub Total</label>
                        <input type="text" class="form-control" placeholder="Enter ..." value="<?php echo($subtotall) ?>" disabled>
                      </div>
						</div>	
						
							<div class="col-sm-4">
						<div class="form-group">
                        <label>Shipping</label>
                        <input type="text" class="form-control" placeholder="Enter ..." value="<?php echo($total) ?>" disabled>
                      </div>
								</div>
						<div class="col-sm-4">
						<div class="form-group">
                        <label>Order Total</label>
                        <input type="text" class="form-control" placeholder="Enter ..." value="<?php echo($total+$subtotall) ?>" disabled>
                      </div>
					</div>
						<div class="col-sm-12">
						<div class="form-group">
                         <button type="submit" class="btn btn-block btn-success btn-lg" name="makeorderss">Make Order</button>
                      </div>
						</div>	
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
		
		



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