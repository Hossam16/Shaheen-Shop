<?php include "SimpleXLSX.php";
include "config.php";
$conn65 =new config();
echo '<h1>Tiobe Index August 2019</h1><pre>';

  if ( $xlsx = SimpleXLSX::parse('kkkkk.xlsx') ) {
    echo '<table><tbody>';
    $i = 0;

    foreach ($xlsx->rows() as $elt) {
        echo "<tr><th>" . $elt[0] . "</th><th>" . $elt[1] . "</th><th>" . $elt[2] . "</th></tr>";
        $pid = $elt[0];
        $price =$elt[1];
        $sprice = $elt[2];
        if($i>0) {
            $sql6655 = "UPDATE products SET products.Price=$price,products.SalePrice=$sprice WHERE products.Photo like '%$pid%';";
            echo $sql6655;
            mysqli_query($conn65->datacon(), $sql6655);
        }
        $i++;
    }

    echo "</tbody></table>";

  } else {
    echo SimpleXLSX::parseError();
  }
  ?>