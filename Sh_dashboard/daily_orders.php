<?php include "config.php"?>

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
$orders_ma='active';
$orders_m='menu-open';
$daily_orders='active';
$msg = 0;
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
                    <h1> تحديد تاريخ الطلبيات </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">تعديل مجموعة</li>
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
                        <form action="DownLoad.php">
                        <label>Date:</label>
                        <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                </div>
                <input type="text" name="date" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask>
            </div>
            <br>
            <button type="submit" name="submitdate" class="btn btn-primary">Submit</button>
                        </form>

                        <?php if(isset($_POST['select'])) {?>
                    <!-- /.card-header -->
                    <div class="card-body" style="direction:rtl">
                        <table id="example1" class="table table-bordered table-striped" style="text-align: center;" >
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
                                <th>Note</th>
                                <th>تعليق داخلي</th>
								<th>تاريخ</th>
								<th>تحويل</th>
                            </tr>
                            </thead>
                            <tbody>
								<?php  
								$res = Order::ViewAllOrdersTA($_POST['date']);
								while($roww = $res->fetch_assoc())
								{		
								?>
                            <tr>
                            <td><a href="editorderdata.php?OID=<?php echo($roww['ID']); ?>"><?php echo($roww['ID']); ?></a></td>
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
                                <th>منتج</th>
								<th>سعر ق</th>
								<th>عدد</th>
                                <th>سعر</th>
                                <th>رد المخزن</th>
                            </tr>
									<?php 
									$ress = Orderdata::ViewOrderdata($roww['ID']);
									while($roow = $ress->fetch_assoc())
									{
										$reess = Products:: ViewSingleProduct($roow['PID']);
										$rosw = $reess->fetch_assoc();
									?>
									<tr>
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
                                <td><?php echo($roow['Availability'])?></td>
                            </tr>
									<?php } ?>
									</table></td>
                  <td><p>قبل الشحن: <?php echo($roww['SubTotal']); ?> LE</p><br><p>الشحن: <?php echo($roww['Shipping']); ?> LE</p><br><p>بعد الشحن: <?php echo($roww['TotalPrice']); ?> LE</p></td>
                                <td><?php echo($roww['Note']); ?></td>
                                <td>
                                <select name="Status" ID="CanceledNote<?php echo($roww['ID']); ?>" disabled>
                                        <option value="<?php echo($roww['innerNote']);?>" selected><?php echo($roww['innerNote']); ?></option>
                                        <option value="إلغاء بسبب مصاريف الشحن">إلغاء بسبب مصاريف الشحن</option>
                                        <option value="إلغاء بسبب تأخير مدة التوصيل" >إلغاء بسبب تأخير مدة التوصيل</option>
                                        <option value="إلغاء بسبب النواقص" >إلغاء بسبب النواقص</option>
                                        <option value="ظروف شخصية" >ظروف شخصية</option>
                                        <option value="عدم الجدية من طرف العميل" >عدم الجدية من طرف العميل</option> 
                                        <option value="تم شرائها من الفرع" >تم شرائها من الفرع</option> 
                                        </select>
                                </td>
								<td><?php echo($roww['Date']); ?></td>
								<td>
									<form method="post">
                  <select name="Status" ID="SelectValue<?php echo($roww['ID']); ?>" onchange="CaneledNoteChange(<?php echo($roww['ID']);?>)">
                  <?php if($roww['Status']=='New'){ ?>
                                        <option value="New" selected>جديد</option>
                                        <option value="Confirmed" >تم التاكيد</option>
                                        <option value="Missed3" >3 مكالمات فائته</option>
                                        <option value="Canceled" >تم الالغاء</option>
                  <?php }elseif($roww['Status']=='Missed3'){ ?>
                                        <option value="New">جديد</option>
                                        <option value="Confirmed" >تم التاكيد</option>
                                        <option value="Missed3" selected>3 مكالمات فائته</option>
                                        <option value="Canceled" >تم الالغاء</option>
                                        <?php }elseif($roww['Status']=='Finished') {?>
                    <option value="New">جديد</option>
                                        <option value="Confirmed" >تم التاكيد</option>
                                        <option value="Missed3">3 مكالمات فائته</option>
                                        <option value="Canceled" >تم الالغاء</option>
                                        <option value="Finished" selected>تم التسليم</option>
                                        <?php }elseif($roww['Status']=='Canceled') {?>
                    <option value="New">جديد</option>
                                        <option value="Confirmed" >تم التاكيد</option>
                                        <option value="Missed3">3 مكالمات فائته</option>
                                        <option value="Canceled" selected>تم الالغاء</option>
                                        <option value="Finished" >تم التسليم</option>
                  <?php } ?>
                                    </select>
                                    <button type="button" class="btn btn-block btn-info btn-sm" ID="OrderID" onclick="EditPPInOD(<?php echo($roww['ID']); ?>)" value="<?php echo($roww['ID']); ?>" name="Update" <?php if($_SESSION['type']=='viewer') {echo'disabled';}?>>Update</button>
										</form>
                                </td>
                            </tr>
								<?php } ?>
                <script>
                        function EditPPInOD(OrderID) {
                          var SelectValue= '';
                          SelectValue= SelectValue.concat('SelectValue',OrderID);
                          var NewStatus= document.getElementById(SelectValue).value;
                          var CanceledNote= '';
                          CanceledNote= CanceledNote.concat('CanceledNote',OrderID);
                          var CancelNote = document.getElementById(CanceledNote).value;
                          jQuery.ajax({
                                          type: "POST",
                                          url: 'webJson/orderEdits.php',
                                          dataType: 'json',
                                          data: {functionname: 'UpdateStatus', arguments: [NewStatus,OrderID,CancelNote]},

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

function CaneledNoteChange(OrderIDd) {
  var SelectValue= '';
  SelectValue= SelectValue.concat('SelectValue',OrderIDd);
  var x = document.getElementById(SelectValue).value;
  var CanceledNote= '';
  CanceledNote= CanceledNote.concat('CanceledNote',OrderIDd);
  if(x=='Canceled')
  {
  document.getElementById(CanceledNote).disabled = false;
  }else
  {
    document.getElementById(CanceledNote).disabled = true;
  }
}
        </script>
                            </tbody>
    
                        </table>
                    </div>
                      <?php } ?>
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