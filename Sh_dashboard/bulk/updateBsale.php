<?php include "SimpleXLSX.php";
include "config.php";
$conn65 =new config();
echo '<h1>Tiobe Index August 2019</h1><pre>';

  if ( $xlsx = SimpleXLSX::parse('All.xlsx') ) {
    echo '<table><tbody>';
    $i = 0;

    foreach ($xlsx->rows() as $elt) {
        echo "<tr><th>" . $elt[0] . "</th><th>" . $elt[1] . "</th><th>";
        $pid = $elt[0];
        $price = $elt[1];
        if($i>0) {
            $sql6655 = "UPDATE products SET products.Price=$price WHERE products.Photo like '%$pid%'";
            if(mysqli_query($conn65->datacon(), $sql6655))
            {
              echo "Done";
            }else
            {
              echo "Faild";
            }
        }
        $i++;
    }

    echo "</tbody></table>";

  } else {
    echo SimpleXLSX::parseError();
  }
  ?>