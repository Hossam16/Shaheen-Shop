<?php include "config.php"?>
<?php
$product_m='active';
$product_mo='menu-open';
$product_allkkouPro='active';
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
if(isset($_POST['submitin']))
 {
    // Count total files
    $countfiles = count($_FILES['file']['name']);
        
    // Looping all files
    $successmes = "";
    $faildmes   = "";
    for($i=0;$i<$countfiles;$i++){
    $filename = $_FILES['file']['name'][$i];
    //Check the Dimensions of the Image
    $image_info = getimagesize($_FILES['file']['tmp_name'][$i]);
    $image_width = $image_info[0];
    $image_height = $image_info[1];


   
    //Check if the Image extension is jpg or not
    if(explode(".",$filename)[1]=='xlsx')
    {
                //Check if the image has the right name
                if(explode(".",$filename)[0]=="ProductsUpdate")
                {
                        // Upload file
                        if(unlink("ProductsUpdate.xlsx"))
                    {
                            if(move_uploaded_file($_FILES['file']['tmp_name'][$i],'ProductsUpdate.xlsx'))
                            {
                                date_default_timezone_set('Africa/Cairo');
                                copy("ProductsUpdate.xlsx", "./bulk/update/" . date("Y-m-d H-i-s") . ".xlsx"); 
                                $successmes = $successmes . $filename . " " ."DONE" . "<br>";
                            }else
                            {
                                $faildmes = $faildmes . $filename . " " ."Server Error" . "<br>";
                            }
                    }else
                    {
                        if(move_uploaded_file($_FILES['file']['tmp_name'][$i],'ProductsUpdate.xlsx'))
                            {
                                date_default_timezone_set('Africa/Cairo');
                                copy("ProductsUpdate.xlsx", "./bulk/update/" . date("Y-m-d H-i-s") . ".xlsx");
                                $successmes = $successmes . $filename . " " ."DONE" . "<br>";
                            }else
                            {
                                $faildmes = $faildmes . $filename . " " ."Server Error" . "<br>";
                            }
                    }   
                }else
                {
                $faildmes = $faildmes . $filename . " " ."Not Right Name (ProductsUpdate.xlsx)" . "<br>";
                }
    }else
    {
        $faildmes = $faildmes . $filename . " " ."Not Right Extension (xlsx)" . "<br>"; 
    }
    
    
    }
}
?>

<!DOCTYPE html>
    <html>
<?php include"head.php";?>
<body class="hold-transition sidebar-mini layout-fixed" >
<?php include"layout.php";?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Bulk Update</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">تعديل منتج</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="row">
        <div class="col-sm-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Products Update</h3>
                <br>
                <button name="create_excel" id="btnExport" onclick="exportTableToExcel('downloadsample','StockUpdate');" class="btn btn-success" <?php if($_SESSION['type']=='viewer') {echo'disabled';}?> disabled>Template</button>
                <script> 
                function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}
 </script>
                <table id="downloadsample" style="display: none;">
                    <thead>
                        <th>
                            Code 8 D
                        </th>
                        <th>
                            Stock
                        </th>
                    </thead>
                    <tbody>
                        <td>
                            "00000000"
                        </td>
                        <td>
                            100
                        </td>
                    </tbody>
                </table>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="file[]" multiple required>
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <style>
                th{
                    border: solid;
                }
                </style>

                        

                <?php if(isset($successmes)){ ?>
                <div class="col-md-12">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Success</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php echo $successmes; ?>
                <?php
                include "bulk/SimpleXLSX.php";
                $conn65 =new config();
                echo '<h1>Bulk Update</h1><pre>';

                if ( $xlsx = SimpleXLSX::parse('ProductsUpdate.xlsx') ) {
                    echo '<table id="download"><tbody>';
                    $i = 0;
                    foreach ($xlsx->rows() as $elt) {
                        if($i==0)
                        {
                            echo "<tr><th>" . $elt[0] . "</th><th>" . $elt[1] . "</th><th>". $elt[2] . "</th><th>". $elt[3] . "</th><th>". $elt[4] . "</th><th>". $elt[5] . "</th><th>". $elt[6] . "</th><th>". $elt[7] . "</th><th>". $elt[8] . "</th><th>". $elt[9] . "</th><th>". $elt[10] . "</th><th>". $elt[11] . "</th><th>". "Affected Rows" . "</th>";
                        }else
                        {
                        echo "<tr><th>" . $elt[0] . "</th><th>" . $elt[1] . "</th><th>". $elt[2] . "</th><th>". $elt[3] . "</th><th>". $elt[4] . "</th><th>". $elt[5] . "</th><th>". $elt[6] . "</th><th>". $elt[7] . "</th><th>". $elt[8] . "</th><th>". $elt[9] . "</th><th>". $elt[10] . "</th><th>". $elt[11] . "</th><th>";
                        }
                        $PID = $elt[0];
                        $Artitle = $elt[1];
                        $ArDesc = $elt[2];
                        $Entitle = $elt[3];
                        $EnDesc = $elt[4];
                        $SID = $elt[5];
                        $Price = $elt[6];
                        $Bsale = $elt[7];
                        $SalePrice = $elt[8];
                        $Stock = $elt[9];
                        $Status = $elt[10];
                        if($Status == 0)
                        {
                            $Stock=0;
                        }
                        if($i>0 AND $elt[0]!='') {
                            $sql6655 = "UPDATE products SET products.ArName='$Artitle',products.ArDesc='$ArDesc',products.Name='$Entitle',products.Desc='$EnDesc',products.SID='$SID',products.Price='$Price',products.BSale='$Bsale',products.SalePrice='$SalePrice',products.Stock='$Stock' WHERE products.Photo like '%$PID%'";
                            if(mysqli_query($conn65->datacon(), $sql6655))
                            {
                            echo "Done ";
                            echo $conn65->GetLink()->affected_rows;
                            }else
                            {
                            echo "Faild";
                            }
                        }
                        $i++;
                    }
                    unlink("ProductsUpdate.xlsx");
                    $connDoo =new config();
                    $sqlDoo = "UPDATE `products` SET products.Stock=0 WHERE (products.Price=0 AND products.BSale=0) OR (products.SalePrice=0 AND products.BSale=1)";
                    if(mysqli_query($connDoo->datacon(), $sqlDoo))
                        {
                            echo "Done ";
                            echo $connDoo->GetLink()->affected_rows;
                        }
                        else
                        {
                            echo "Faild";
                        }

                    echo "</tbody></table>";

                } else {
                    echo SimpleXLSX::parseError();
                }
                 ?>
              </div>
              <button name="create_excel" id="btnExport" onclick="exportTableToExcel('download','orderDetailReport');" class="btn btn-success" <?php if($_SESSION['type']=='viewer') {echo'disabled';}?>>Create Excel File</button>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <script> 
                function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}
 </script> 
                <?php } ?>


                <?php if(isset($faildmes)){ ?>
                <div class="col-md-12">
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Faild</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php echo $faildmes; ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
                <?php } ?>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name='submitin'  value='Upload' <?php if($_SESSION['type']=='viewer') {echo'disabled';}?>>Submit</button>
                </div>
              </form>

              
            </div>
          </div>
            </div>
        </div>


        



        
    </section>
    <!-- Main content -->


</div>
<!-- /.content-wrapper -->






<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            bsCustomFileInput.init();
        });
    </script>
</body>
</html>
