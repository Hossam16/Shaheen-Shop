<?php include "SimpleXLSX.php";
include "config.php";
$conn65 =new config();
echo '<h1>Tiobe Index August 2019</h1><pre>';

  if ( $xlsx = SimpleXLSX::parse('all.xlsx') ) {
    echo '<table><tbody>';

    foreach ($xlsx->rows() as $elt) {   
      
      $elt[2] =mysqli_real_escape_string($conn65->datacon(),$elt[2]);
      $elt[1] =mysqli_real_escape_string($conn65->datacon(),$elt[1]);
      $elt[0] =mysqli_real_escape_string($conn65->datacon(),$elt[0]);
      $sql = "UPDATE products SET products.BSale=1 , products.SalePrice=$elt[2] , products.Price=$elt[1] Where products.Photo LIKE '%$elt[0]%'";
      if(mysqli_query($conn65->datacon(), $sql))
      {
        echo "DONE";
      }
      else
      {
        echo "Not";
      }
        echo "<tr><th>" . $elt[0] . "</th><th>" . $elt[1] . "</th><th>" . $elt[2] . "</th><th>" . $sql . "</th></tr>";
    }
    echo "</tbody></table>";

  } else {
    echo SimpleXLSX::parseError();
  }
  ?>