<?php
include "config.php";
$conn1 = new config();
$sql1 = "SELECT * FROM `products` WHERE products.Status = 1 AND products.Stock > 0";
$result1 = $conn1->datacon()->query($sql1);

while ($row = $result1->fetch_assoc()) {
?>
    <table>
        <tr>
            <td><?php if (file_exists('../images/home/' . $row['Photo'])) {
                echo 1;
                } else {
                    echo 0;
                } ?></td>
            <td><?php echo $row['Photo']; ?></td>
        </tr>

    </table>

<?php } ?>