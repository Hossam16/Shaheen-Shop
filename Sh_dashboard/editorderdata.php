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
$daily_ordersss='active';
$msg = 0;
?>
<?php
if(isset($_GET['OID']))
{
	$OID = $_GET['OID'];
	$rdd = Order::ViewSingleOrders($OID);
	$rodd = $rdd->fetch_assoc();
}

if(isset($_POST['makeorderss']))
{
	$OID = $_POST['OID'];
	$d = $_POST['dual'];
  $c = $_POST['productCount'];
  $note= $_POST['note'];
  $phone2=$_POST['CPhone2'];
  $phone1=$_POST['CPhone1'];
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
    $total= $_POST['shipping'];
  }
  else
  {
    include('shipping.php');
  }
  $location=$_POST['address'];
  Order::UpdateOrderCallPH2($phone2,$phone1,$OID);
  Order::UpdateOrderLocation($location,$OID);
	Order::Update($subtotall,$total,$total+$subtotall,$OID,$governorate,$note);
	echo "<script type=\"text/javascript\">
							window.location = \"http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]\"
							</script>";
}





if(isset($_POST['DeletProduct']))
   {
     Orderdata::Delete($_POST['DeletProduct']);
     $deleted = $_POST['DeletProduct'];
	   $OID = $_POST['OID'];
	   $d = $_POST['dual'];
     $c = $_POST['productCount'];
	   $subtotall=0;
     $i=0;
     $reesssd = Orderdata::ViewOrderdata($OID);
     while($rrood = $reesssd->fetch_assoc())
     {
     $repd = Products:: ViewSingleProduct($rrood['PID']);
       $rowd = $repd->fetch_assoc();
          if($rowd['BSale']==1)
          {
            $Price= $rowd['SalePrice']* $rrood['Count'];
          }else
          {
            $Price= $rowd['Price']* $rrood['Count'];
          }
          $subtotall=$Price+$subtotall;
     }
  $governorate=$_POST['Governorate'];
  include('shipping.php');
  if(isset($_POST['note']))
  {
    $Note =  $_POST['note'];
  }else
  {
    $Note='';
  }
  
  Order::Update($subtotall,$total,$total+$subtotall,$OID,$governorate,$Note);
  
  echo "<script type=\"text/javascript\">
							window.location = \"editorderdata.php?OID=$OID\"
  						</script>";
  
   }






//  Add product to the order <--------
   if(isset($_POST['submit']))
{
  $subtotall=$rodd['SubTotal'];
  $d = $_POST['duall'];
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
  $governorate=$rodd['Governorate'];
  include('shipping.php');
  Order::Update($subtotall,$total,$total+$subtotall,$OID,$governorate,$note);
  echo "<script type=\"text/javascript\">
							window.location = \"editorderdata.php?OID=$OID\"
							</script>";
}
// End of add product ---------------->

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
                        <input type="text" class="form-control" placeholder="Enter ..." name="CName" value="<?php echo($rodd['CName']); ?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Phone 1</label>
                        <input type="number" class="form-control" placeholder="+02" name="CPhone1" value="<?php echo($rodd['Phone']);?>">
                      </div>
                    </div>
  </div>
  <div class="row">
					   <div class="col-sm-6">
                      <div class="form-group">
                        <label>Phone 2 (optional)</label>
                        <input type="number" class="form-control" placeholder="+02" name="CPhone2" value="<?php echo($rodd['Phone2']) ?>">
                      </div>
                    </div>
					   <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Select</label>
                        <select class="form-control" name="Governorate">
                          <option value="<?php echo($rodd['Governorate']) ?>"><?php echo($rodd['Governorate']) ?></option>
                          < <option value='Cairo'>القاهرة</option>
                        <option value='Giza'>الجيزة</option>
                        <option value='Alexandria'>الأسكندرية</option>
                        <option value='Suez'>السويس</option>
                        <option value='Port Said'>بورسعيد</option>
                        <option value='Ismailia'>الإسماعيلية</option>
                        <option value='Damietta'>دمياط</option>
                        <option value='Beheira'>البحيرة</option>
                        <option value='Dakahlia'>الدهقلية</option>
                        <option value='Gharbia'>الغربية</option>
                        <option value='Kafr El Sheikh'>كفرالشيخ</option>
                        <option value='Matruh'>مطروح</option>
                        <option value='Monufia'>المنوفية</option>
                        <option value='Qalyubia'>القليوبية</option>
                        <option value='Sharqia'>الشرقية</option>
                        <option value='North Sinai'>شمال سيناء</option>
                        <option value='South Sinai'>جنوب سيناء</option>
                        <option value='New Valley'>الوادي الجديد</option>
                        <option value='Red Sea'>البحر الاحمر</option>
                        <option value='Faiyum'>الفيوم</option>
                        <option value='Minya'>المنيا</option>
                        <option value='Qena'>قنا</option>
                        <option value='Beni Suef'>بني سويف</option>
                        <option value='Asyut'>أسيوط</option>
                        <option value='Sohag'>سوهاج</option>
                        <option value='Luxor'>الأقصر</option>
                        <option value='Aswan'>أسوان</option>
                        </select>
                      </div>
                    </div>
  </div>
					  <div class="col-sm-12">
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="address" value="<?php echo($rodd['Location']) ?>">
                      </div>
                    </div>

					<div class="row" style="
    border: solid;">
						<?php
							
							$reesss = Orderdata::ViewOrderdata($OID);
							while($rroo = $reesss->fetch_assoc())
							{
							$rep = Products:: ViewSingleProduct($rroo['PID']);
								$row = $rep->fetch_assoc();
						?>
             <div class="col-sm-1">
                      <div class="form-group">
                        <label>المنتج</label>
                        <img src="../images/home/<?php echo($row['Photo'])?>" style="width:100px">
                      </div>
                    </div>
						 <div class="col-sm-1" style="display:none;">
                      <div class="form-group">
                        <label>ID</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="dual[]" value="<?php echo($row['ID']) ?>">
                      </div>
                    </div>
						 <div class="col-sm-2">
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="productName" value="<?php echo($row['ArName'])?>" >
                      </div>
                    </div>
						 <div class="col-sm-1">
                      <div class="form-group">
                        <label>Count</label>
                        <input type="text" class="form-control" id="ODC<?php echo($rroo['ID']); ?>" placeholder="Enter ..." name="productCount[]" value="<?php echo($rroo['Count']) ?>" >
                      </div>
                    </div>
						 <div class="col-sm-2">
                      <div class="form-group">
                        <label>Taked Price</label>
                        <input type="text" ID="PPrice<?php echo($rroo['ID']); ?>" class="form-control" placeholder="Enter ..." name="TakedPrice" value="<?php echo $rroo['OPP'];?>" >
                      </div>
                    </div>
                    <div class="col-sm-1">
                      <div class="form-group">
                        <label>Current Price</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="productPrice" value="<?php if($rroo['BSale']==1){
							echo($rroo['SalePrice']);
						}else
						{
							echo($rroo['Price']);
						}?>" disabled>
                      </div>
                    </div>
                    <div class="col-sm-1">
                      <div class="form-group">
                        <label>Last Price</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="productPrice" value="<?php if($rroo['BSale']==1){
							echo ($rroo['Price']);
						}else
						{
							echo($rroo['SalePrice']);
						}?>" disabled>
                      </div>
                    </div>
						<div class="col-sm-2">
                      <div class="form-group">
                        <label>Delete</label>
                        <button type="submit" class="btn btn-block bg-gradient-danger" value="<?php echo($rroo['ID']); ?>" name="DeletProduct" <?php if($_SESSION['type']=='viewer') {echo'disabled';}?>>Delete</button>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label>UpDate</label>
                        <button type="button" class="btn btn-block bg-gradient-info" onclick="EditPPInOD(<?php echo($rroo['ID']); ?>)" value="<?php echo($rroo['ID']); ?>" name="DeletProduct" <?php if($_SESSION['type']=='viewer') {echo'disabled';}?>>UpDate</button>
                      </div>
                    </div>
<?php  } ?>
</div>

<script>
                        function EditPPInOD(itemID) {
                          var shipping = document.getElementById('shippingprice').value;
                          var countInputID= '';
                          countInputID= countInputID.concat('ODC',itemID);
                          var ODC = document.getElementById(countInputID).value;
                          alert (ODC);
                          var inputID= '';
                          inputID= inputID.concat('PPrice',itemID);
                          var NewPPrice = document.getElementById(inputID).value;
                          jQuery.ajax({
                                          type: "POST",
                                          url: 'webJson/orderEdits.php',
                                          dataType: 'json',
                                          data: {functionname: 'add', arguments: [NewPPrice, itemID,<?php echo $OID; ?>,shipping,ODC]},

                                          success: function (obj, textstatus) {
                                                        if( !('error' in obj) ) {
                                                            yourVariable = obj.result;
                                                            window.location = "editorderdata.php?OID=<?php echo $OID; ?>";
                                                        }
                                                        else {
                                                            console.log(obj.error);
                                                        }
                                                  }
                                      });
                        }  
                        </script>

<div class="row">
						<div class="col-sm-4">
						<div class="form-group">
                        <label>Sub Total</label>
                        <input type="text" class="form-control" placeholder="Enter ..." value="<?php echo($rodd['SubTotal']) ?>" disabled>
                      </div>
						</div>
						
							<div class="col-sm-4">
						<div class="form-group">
                        <label>Shipping</label>
                        <input type="number" class="form-control" name="shipping" id="shippingprice" placeholder="Enter ..." value="<?php echo($rodd['Shipping'])?>">
                      </div>
								</div>
						<div class="col-sm-4">
						<div class="form-group">
                        <label>Order Total</label>
                        <input type="text" class="form-control" placeholder="Enter ..." value="<?php echo($rodd['TotalPrice']) ?>" disabled>
                      </div>
          </div>
    </div>
    <div class="row">
          <div class="col-sm-12">
						<div class="form-group">
                        <label>Note</label>
                        <textarea type="text" class="form-control" placeholder="Enter ..." name="note"><?php echo($rodd['Note']);?></textarea>
                      </div>
          </div>
   </div>
   <div class="row">
						<div class="col-sm-12">
						<div class="form-group">
                         <button type="submit" class="btn btn-block btn-success btn-lg" name="makeorderss" <?php if($_SESSION['type']=='viewer') {echo'disabled';}?>>Refresh</button>
                      </div>
						</div>	
                  </div>

                </form>

                  <form role="form" method="post">
                  <style>
              .box1,.box2
              {
                min-width: -webkit-fill-available;
              }
              .moveall,
              .removeall 
              {
                border: 50px solid #ccc !important;
                display: none !important; 
              }
            </style>
                   <div class="col-sm-12">
    <select class="duallistbox" multiple="multiple" size="10" name="duall[]" required>
		<?php $res = Products::ViewAllProducts();
		while($row = $res->fetch_assoc())
		{
      $id =  substr($row['Photo'], 0, 8);
      // $connGetStock = new config();
      // $getStockSQL = "SELECT SUM(Get_Stock.Stock) As stock FROM `Get_Stock` WHERE `Item-code` LIKE '%$id%'";
      // $stock =  $connGetStock->datacon()->query($getStockSQL)->fetch_assoc()['stock']

    ?>
    <option value="<?php echo($row['ID'])?>" style="background-image: url(https://cdn.jotfor.ms/assets/img/v4/logo-orange.png?2)"> <?php echo($row['ArName']);?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Price: /<?php echo($row['Price']); ?>/LE &nbsp; <?php if($row['BSale']==1){?>OFFER: s/<?php echo($row['SalePrice'])."/";}?> &nbsp;<?php echo( $id) ?>  </option>
    
		
		<?php }?>
		
		
		
		

		
		
    </select>
    <br>
    <button type="submit" class="btn btn-block btn-secondary btn-lg" name="submit" <?php if($_SESSION['type']=='viewer') {echo'disabled';}?>>Submit data</button>
  
  <script>
            var demo1 = $('select[name="duall[]"]').bootstrapDualListbox({
                nonselectedlistlabel: 'Non-selected',
                selectedlistlabel: 'Selected',
                preserveselectiononmove: 'moved',
                moveonselect: false,
                bootstrap2compatible : true,
				filterPlaceHolder	: 'Search',
				selectedListLabel: 'all',
				nonSelectedListLabel: 'All Products'
            });
    $("#demoform").submit(function() {
      alert($('[name="duallistbox_demo1[]"]').val());
      return false;
    });
  </script>
						</div>
                  </form>
                    
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
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
