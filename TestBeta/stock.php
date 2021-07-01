<?php 


// include "config.php";
// $conn =new config();
// $sql= " LOAD DATA INFILE 'onhand.csv' INTO TABLE Get_Stock FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 1 ROWS; ";

// if($conn->datacon()->query($sql))
// {
//     echo "Done";
// }
// else
// {
//     echo "Error" . "$conn->datacon()->query($sql";
// }

// $sql = array(); 
// foreach( $data as $row ) {
//     $sql[] = '("'.mysql_real_escape_string($row['text']).'", '.$row['category_id'].')';
// }
// mysql_query('INSERT INTO table (text, category) VALUES '.implode(',', $sql));

?>



<?php  
// $connect = mysqli_connect("localhost", "root", "z.8<%o?SVROIopQ.", "shaheen_shaheen");
// if(isset($_POST["submit"]))
// {
//  if($_FILES['file']['name'])
//  {
//   $filename = explode(".", $_FILES['file']['name']);
//   if($filename[1] == 'csv')
//   {
//    $handle = fopen($_FILES['file']['tmp_name'], "r");
//    while($data = fgetcsv($handle))
//    {
//     $item1 = mysqli_real_escape_string($connect, $data[0]);  
//     $item2 = mysqli_real_escape_string($connect, $data[1]);
//     $item2 = mysqli_real_escape_string($connect, $data[2]);
//     $query = "INSERT into `Get_Stock`(`Item-code`, `Stock`, `Date_time`) values('$item1','$item2')";
//     mysqli_query($connect, $query);
//    }
//    fclose($handle);
//    echo "<script>alert('Import done');</script>";
//   }
//  }
// }
?>  
<!-- <!DOCTYPE html>  
<html>  
 <head>  
  <title>Webslesson Tutorial</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
 </head>  
 <body>  
  <h3>How to Import Data from CSV File to Mysql using PHP</h3><br />
  <form method="post" enctype="multipart/form-data">
   <div>  
    <label>Select CSV File:</label>
    <input type="file" name="file" />
    <br />
    <input type="submit" name="submit" value="Import" class="btn btn-info" />
   </div>
  </form>
 </body>  
</html> -->



<?php include "SimpleXLSX.php";
include "config.php";
$conn65 =new config();
echo '<h1>Tiobe Index August 2019</h1><pre>';

  if ( $xlsx = SimpleXLSX::parse('onhand.xlsx') ) {
    echo '<table><tbody>';
    $i = 0;

    foreach ($xlsx->rows() as $elt) {
        echo "<tr><th>" . $elt[0] . "</th><th>" . $elt[1] . "</th><th>" . $elt[2] . "</th></tr>";
        $code = $elt[0];
        $stock = $elt[1];
        $date = $elt[2];
            $sql6655 = "INSERT INTO `Get_Stock`(`Item-code`, `Stock`, `Date`) VALUES ('$code',$stock,'$date')";
            if($conn65->datacon()->query($sql6655));
            {
                echo "</th><th>" .$sql6655. "</th></tr>";
            }
        $i++;
    }

    echo "</tbody></table>";

  } else {
    echo SimpleXLSX::parseError();
  }
  ?>    