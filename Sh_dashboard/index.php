<?php 
include "config.php";
?>
<?php $index='active';

	session_start();
	if(isset($_SESSION['AID']))
{
	$AID = $_SESSION['AID'];
}
else

{
	header('Location: login.php');
}
?>
<!DOCTYPE html>
<html>
<?php include "head.php";?>
<body class="hold-transition sidebar-mini layout-fixed" >

<div class="content-wrapper" style="min-height: 865px;">
  <section class="content">
  <div class="container-fluid">
  <div calss="row">
  <div class="col-sm-12">
  <img src="dist/img/Untitled-1.png" alt="" style="width: 94%;" >
  </div>
  </div>
  </div>
  </section>


	<?php 
		if($_SESSION['type']=='callcenter' or $_SESSION['type']=='joker'){
			$conn=new config();
			$sql = "SELECT COUNT(dashorders.ID) AS count, SUM(dashorders.TotalPrice) AS sum FROM `dashorders` WHERE AID=$AID";
			$result = $conn->datacon()->query($sql)->fetch_assoc();
			$count = $result['count'];
			$amount =number_format( $result['sum']);

			$sql = "SELECT COUNT(dashorders.ID) AS canceled FROM `dashorders` WHERE AID=$AID AND dashorders.Status='Canceled';";
			$result = $conn->datacon()->query($sql)->fetch_assoc();
			$canceled = $result['canceled'];
			

			$sql = "SELECT COUNT(dashorders.ID) AS total FROM `dashorders` WHERE 1";
			$result = $conn->datacon()->query($sql)->fetch_assoc();
			$total = $result['total'];
			$percentage =number_format( ($count/$total) * 100,2,'.','');
			
	?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $count; ?></h3>

                <p>Total Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $amount; ?><sup style="font-size: 20px"> LE</sup></h3>

                <p>Orders Amount</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
			  <h3><?php echo $percentage; ?><sup style="font-size: 20px"> %</sup></h3>


                <p>Your Order Percentage</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $canceled; ?></h3>

                <p>Canceled Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
	<!-- /.content -->


<div class="form-group">
  <form method="POST">
            <label> Date:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                </div>
                <input type="text" name="date" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask>
            </div>
  </form>
  </div>

  <?php 
}
?>

<?php 
		if($_SESSION['type']=='callcenter' or $_SESSION['type']=='joker' ){
      $today = date("Y-m-d");
      if(isset($_POST['date']))
      {
        $today = $_POST['date'];
      }
			$conn=new config();
			$sql = "SELECT COUNT(dashorders.ID) AS count, SUM(dashorders.TotalPrice) AS sum FROM `dashorders` WHERE AID=$AID AND dashorders.Date LIKE '%$today%'";
			$result = $conn->datacon()->query($sql)->fetch_assoc();
			$count = $result['count'];
			$amount =number_format( $result['sum']);

			$sql = "SELECT COUNT(dashorders.ID) AS canceled FROM `dashorders` WHERE AID=$AID AND dashorders.Status='Canceled' AND dashorders.Date LIKE '%$today%';";
			$result = $conn->datacon()->query($sql)->fetch_assoc();
			$canceled = $result['canceled'];
			

			$sql = "SELECT COUNT(dashorders.ID) AS total FROM `dashorders` WHERE dashorders.Date LIKE '%$today%'";
			$result = $conn->datacon()->query($sql)->fetch_assoc();
			$total = $result['total'];
			$percentage =number_format( ($count/$total) * 100,2,'.','');
			
	?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $count; ?></h3>

                <p>Total Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $amount; ?><sup style="font-size: 20px"> LE</sup></h3>

                <p>Orders Amount</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
			  <h3><?php echo $percentage; ?><sup style="font-size: 20px"> %</sup></h3>


                <p>Your Order Percentage</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $canceled; ?></h3>

                <p>Canceled Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
	<!-- /.content -->
	<?php 
}
?>
		
  </div>




<?php include "layout.php";?>



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

 <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5fda3922df060f156a8db882/1epm6uchk';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</body>
</html>
