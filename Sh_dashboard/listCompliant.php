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
$daily_orderssscom='active';
$msg = 0;
?>

<?php if(isset($_POST['ID']))
{
    $result = Complaint::updateComplaint($_POST['ID'],$_POST['Replay'],$_POST['Stutes']);
    echo $result;
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
                        <li class="breadcrumb-item active">قائمة الشكاوي</li>
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
                        <h3 class="card-title">قائمة الشكاوي</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped" style="text-align: center;" >
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Agent</th>
                                <th>Client Name</th>
                                <th>Date</th>
                                <th>Phone</th>
                                <th>Phone2</th>
								<th>Governorate</th>
                                <th>Address</th>
                                <th>نوع الشكوى</th>
								<th>Text</th>
								<th>Replay</th>
                                <th>Stutes</th>
                                <th>Submit</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $list = Complaint::listComplaint();
                                while($row = $list->fetch_assoc())
                                {

                             ?>
                            <tr style="background: <?php if( $row['Stutes']=='New'){echo "#ffc107";}elseif($row['Stutes']=='Solved'){echo "#28a745";}elseif($row['Stutes']=='notResponding'){echo "#17a2b8";}elseif($row['Stutes']=='Pending'){echo "#dc3545";}?>;"> 
                                <td><?php echo $row['ID'] ?></td>
                                <td><?php
                                $rowsss = User::selsectname($row['AID']);
                                echo($rowsss['username']);
                                 ?></td>
                                <td><?php echo $row['CName'] ?></td>
                                <td><?php echo $row['Date'] ?></td>
                                <td><a href="tel:<?php echo $row['Phone']?>"><?php echo $row['Phone']?></a></td>
                                <td><a href="tel:<?php echo $row['Phone2']?>"><?php echo $row['Phone2']?></a></td>
                                <td><?php echo $row['Governorate'] ?></td>
                                <td><?php echo $row['Address'] ?></td>
                                <td><?php echo $row['Type'] ?></td>
                                <td><?php echo $row['Text'] ?></td>
                                <form method="post">
                                <td><textarea name="Replay"><?php echo $row['Replay']?></textarea></td>
								<td>
                                    <select name="Stutes">
                                        <option value="<?php echo $row['Stutes']?>"><?php if($row['Stutes']=="New"){echo "جديد";}elseif($row['Stutes']=="Solved"){echo "تم الحل";}elseif($row['Stutes']=="notResponding"){echo "لا توجد استجابة";}elseif($row['Stutes']=="Pending"){echo "انتظار رد المسئول";}?></option>
                                        <option value="Solved" >تم الحل</option>
                                        <option value="notResponding">لا توجد استجابة</option>
                                        <option value="Pending">انتظار رد المسئول</option>
                                    </select>
                                </td>
                                <td> <input type="hidden" name="ID" value="<?php echo $row['ID'] ?>"> <button type="submit" class="btn btn-block btn-secondary" <?php if($_SESSION['type']=='viewer') {echo'disabled';}?>>Submit</button></td>
                                </form>
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

</body>
</html>