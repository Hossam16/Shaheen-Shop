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
$orders_omm='active';
$orders_xm='menu-open';
$daily_orderss='active';
$msg = 0;
?>
<?php
if(isset($_POST['submit']))
{
	$newdashorder = new Order($_SESSION['AID'],$_POST['CName'],$_POST['address'],$_POST['Governorate'],$_POST['City'],$_POST['CPhone1'],$_POST['CPhone2'],0,0,0,'New',$_POST['note']);
	$OID = $newdashorder->AddOrder();
  $d = $_POST['dual'];
  $note = $_POST['note'];
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
	Order::Update($subtotall,$total,$total+$subtotall,$OID,$governorate,$note);
}
if(isset($_POST['update']))
{
	$OID = $_POST['OID'];
	$d = $_POST['dual'];
  $c = $_POST['productCount'];
  $note = $_POST['note'];
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
	Order::Update($subtotall,$total,$total+$subtotall,$OID,$governorate,$note);
}

if(isset($_POST['makeorderss']))
{
	$OID = $_POST['OID'];
	$d = $_POST['dual'];
  $c = $_POST['productCount'];
  $note = $_POST['note'];
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
  
  if($_POST['shipping'])
  {
    $total = $_POST['shipping'];
  }
  else
  {
    include('shipping.php');
  }
	Order::Update($subtotall,$total,$total+$subtotall,$OID,$governorate,$note);
	
	
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
                        <select class="form-control select2bs4" name="Governorate" style="width: 100%;border: 2px solid #000000 !important;" required>
                          <option value="<?php echo($_POST['Governorate']) ?>"><?php echo($_POST['Governorate']) ?></option>
                          <option value='Cairo'>??????????????</option>
                        <option value='Giza'>????????????</option>
                        <option value='Alexandria'>????????????????????</option>
                        <option value='Suez'>????????????</option>
                        <option value='Port Said'>??????????????</option>
                        <option value='Ismailia'>??????????????????????</option>
                        <option value='Damietta'>??????????</option>
                        <option value='Beheira'>??????????????</option>
                        <option value='Dakahlia'>????????????????</option>
                        <option value='Gharbia'>??????????????</option>
                        <option value='Kafr El Sheikh'>????????????????</option>
                        <option value='Matruh'>??????????</option>
                        <option value='Monufia'>????????????????</option>
                        <option value='Qalyubia'>??????????????????</option>
                        <option value='Sharqia'>??????????????</option>
                        <option value='North Sinai'>???????? ??????????</option>
                        <option value='South Sinai'>???????? ??????????</option>
                        <option value='New Valley'>???????????? ????????????</option>
                        <option value='Red Sea'>?????????? ????????????</option>
                        <option value='Faiyum'>????????????</option>
                        <option value='Minya'>????????????</option>
                        <option value='Qena'>??????</option>
                        <option value='Beni Suef'>?????? ????????</option>
                        <option value='Asyut'>??????????</option>
                        <option value='Sohag'>??????????</option>
                        <option value='Luxor'>????????????</option>
                        <option value='Aswan'>??????????</option>
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
                        <label>????????????</label>
                        <img src="../images/home/<?php echo($row['Photo'])?>" style="width:100px">
                      </div>
                    </div>
						 <div class="col-sm-2">
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
						 <div class="col-sm-2">
                      <div class="form-group">
                        <label>Count</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="productCount[]" value="<?php echo($count[$i]); ?>" >
                      </div>
                    </div>
						 <div class="col-sm-2">
                      <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="productPrice" value="<?php 
                        if($row['BSale']==1)
                        {
                          echo($row['SalePrice']*$count[$i]);
                        }else
                        echo($row['Price']*$count[$i]);
                        ?>" >
                      </div>
                    </div>
<?php $i++;} ?>


<div class="col-sm-12">
                      <div class="form-group">
                        <label>Note</label>
                        <textarea type="text" class="form-control" placeholder="Enter ..." name="note" ><?php echo($_POST['note']) ?></textarea>
                      </div>
                    </div>

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
                        <input type="text" class="form-control" name="shipping" placeholder="Enter ..." value="<?php echo($total) ?>" >
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
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
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