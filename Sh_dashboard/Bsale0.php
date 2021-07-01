<?php include "config.php"?>
<?php
$product_m='active';
$product_mo='menu-open';
$product_all='active';
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
<!DOCTYPE html>
<html>
<?php include"head.php";?>

<body class="hold-transition sidebar-mini layout-fixed" >

<?php include"layout.php";?>



<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>جميع المنتجات</h3>
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
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-edit"></i>
                 تصف المنتجات حسب
                </h3>
              </div>
              <div class="card-body pad table-responsive">
                <table class="table table-bordered text-center">
                  <tr>
                    <th>جميع المنتجات</th>
                  </tr>
                  <tr>
                    <form method="Post">
                        <td>
                            <button type="submit" value="All" name="All" class="btn btn-block bg-gradient-primary btn-lg">All</button>
                        </td>
                    </form>
                  </tr>
                  <tr>
                      <form method="Post">
                    <td >
                    <button type="submit" value="All" name="All" class="btn btn-block bg-gradient-primary btn-lg" style="display: none;">All</button>
                    </td>
                    
                    </form>
                  </tr>
                </table>
              </div>
              <!-- /.card -->
            </div>
          </div>
          <!-- /.col -->
        </div>
          <!-- ./row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- Main content -->
    <section class="content" style="direction: rtl;">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <?php 
                        if(isset($_POST['All']))
                        {
                            echo"جميع المنتجات";
                        }else
                        {
                            echo"لم يتم تحديد اي منتجات";
                        }
                         ?></h3>
                    </div>


                    <!-- <div class="card-header">
                        <form method="POST">
                        <button name="Header" value="">جميع المنتجات</button>
                            <?php
                            // $conn11 =new config();
                            // $sql11= "SELECT * FROM nheader where 1";
                            // $result11 = $conn11->datacon()->query($sql11); 
                            // while ($row11 = $result11->fetch_assoc())
                            //      {
                            ?>
                        <button name="Header" value="
                        <?php
                        //  echo $row11['ID']; 
                         ?>
                        "> <?php
                        //  echo $row11['headerar']
                         ?> </button>
                                 <?php 
                                // } 
                                ?>
                        </form>
                    </div> -->

    
                    <!-- /.card-header -->

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>صورة و كود</th>
                                <th>الاسم</th>
                                <th>سعر قبل</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php if(isset($_POST['All'])){ ?>
                            <?php $conn1 =new config();
                            $sql1= "SELECT products.Photo,products.ArName,products.Price,products.Stock FROM products INNER JOIN nsub ON nsub.ID=products.SID INNER JOIN ncat ON ncat.ID=nsub.catid INNER JOIN nheader on nheader.ID=ncat.headerid WHERE BSale=0 AND Stock != 0 ORDER BY nsub.ID,ncat.ID,nheader.ID";
                            $result1 = $conn1->datacon()->query($sql1);
                            $co = 0;
                            while ($row1 =$result1->fetch_assoc())
                                 { $co++;?>
                                <tr>
                                    <td><a href="edit_product.php?ID=<?php echo $row1['ID'];?>"><?php
                                        $pieces = explode(".", $row1['Photo']);
                                        echo $pieces[0];
                                        ?></a>
                                        <img  style="width: 70px;" src="../images/home/<?php echo $row1['Photo']?>?1222259157.415">
                                        <img style="width: 70px;" src="../images/product-details/<?php echo $row1['Photo']?>?1222259157.415">
                                    </td>
                                    <td><?php echo $row1['ArName']?></td>
                                    <td><?php echo $row1['Price']?></td>
                                </tr>
                            <?php }}?>
                            </tbody>
                        </table>  

                        <table ID="Products" style="display: none;">
                            <thead>
                                <tr>
                                    <th>صورة و كود</th>
                                    <th>الاسم</th>
                                    <th>سعر قبل</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(isset($_POST['All'])){ ?>
                            <?php $conn1 =new config();
                            $sql1= "SELECT products.Photo,products.ArName,products.Price,products.Stock FROM products INNER JOIN nsub ON nsub.ID=products.SID INNER JOIN ncat ON ncat.ID=nsub.catid INNER JOIN nheader on nheader.ID=ncat.headerid WHERE BSale=0 AND Stock != 0 ORDER BY nsub.ID,ncat.ID,nheader.ID";
                            $result1 = $conn1->datacon()->query($sql1);
                            $co = 0;
                            while ($row1 =$result1->fetch_assoc())
                                 { $co++;?>
                                <tr>
                                    <td><a href="edit_product.php?ID=<?php echo $row1['ID'];?>"><?php
                                        $pieces = explode(".", $row1['Photo']);
                                        echo $pieces[0];
                                        ?></a>
                                    </td>
                                    <td><?php echo $row1['ArName']?></td>
                                    <td><?php echo $row1['Price']?></td>
                                </tr>
                            <?php }}?>
                            </tbody>
                        </table>

                        

              <button name="create_excel" id="btnExport" onclick="fnExcelReport();" class="btn btn-success" <?php if($_SESSION['type']=='viewer') {echo'disabled';}?>>Create Excel File</button>

                        <script>  function fnExcelReport()
{
    var tab_text="<head><meta charset='UTF-8'></head><table border='2px'><tr style='color: white;background: #2a57a5'>";
    var textRange; var j=0;
    tab = document.getElementById('Products'); // id of table

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
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.3-pre
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->




<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
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
        $("#example1").DataTable({
            "responsive": true,
            "ordering": false,
            "autoWidth": false,
            "info": true,
        })
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
</body>
</html>