<?php include "config.php" ?>
<?php
$product_m = 'active';
$product_mo = 'menu-open';
$product_all = 'active';
?>
<?php
session_start();
if (($_SESSION['AID']) > 0) {
} else {
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html>
<?php include "head.php"; ?>

<body class="hold-transition sidebar-mini layout-fixed">

    <?php include "layout.php"; ?>



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
                                            <th onclick="showsub('sub1')">الأجهزة الكهربائية</th>
                                            <th onclick="showsub('sub2')">الأدوات الكهربائيةالخفيفة</th>
                                            <th onclick="showsub('sub3')">الأدوات المنزلية</th>
                                            <th onclick="showsub('sub4')">المفروشات</th>
                                            <th onclick="showsub('sub5')">عروض</th>
                                        </tr>
                                        <tr>
                                            <form method="Post">
                                                <td>
                                                    <button type="submit" value="All" name="All" class="btn btn-block bg-gradient-primary btn-lg">All</button>
                                                </td>
                                                <td>
                                                    <button type="submit" value="1" name="getCate" class="btn btn-block bg-gradient-primary btn-lg">الأجهزة الكهربائية</button>
                                                </td>
                                                <td>
                                                    <button type="submit" value="2" name="getCate" class="btn btn-block bg-gradient-primary btn-lg">الأدوات الكهربائيةالخفيفة</button>
                                                </td>
                                                <td>
                                                    <button type="submit" value="3" name="getCate" class="btn btn-block bg-gradient-primary btn-lg">الأدوات المنزلية</button>
                                                </td>
                                                <td>
                                                    <button type="submit" value="4" name="getCate" class="btn btn-block bg-gradient-primary btn-lg">المفروشات</button>
                                                </td>
                                                <td>
                                                    <button type="submit" value="Offers" name="Offers" class="btn btn-block bg-gradient-primary btn-lg">Offers</button>
                                                </td>
                                            </form>
                                        </tr>
                                        <tr>
                                            <form method="Post">
                                                <td>
                                                    <button type="submit" value="All" name="All" class="btn btn-block bg-gradient-primary btn-lg" style="display: none;">All</button>
                                                </td>
                                                <td>
                                                    <div id="sub1" style="display: none;">
                                                        <?php $conn1 = new config();
                                                        $sql1 = "SELECT nsub.* FROM `nsub` INNER JOIN ncat on nsub.catid=ncat.ID INNER JOIN nheader on ncat.headerid=nheader.ID WHERE nheader.id=1";
                                                        $result1 = $conn1->datacon()->query($sql1);
                                                        while ($row1 = $result1->fetch_assoc()) {
                                                        ?>
                                                            <button type="submit" value="<?php echo $row1['ID'] ?>" name="sub" class="btn btn-block btn-default"><?php echo $row1['subar']; ?></button>

                                                        <?php } ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div id="sub2" style="display: none;">
                                                        <?php $conn1 = new config();
                                                        $sql1 = "SELECT nsub.* FROM `nsub` INNER JOIN ncat on nsub.catid=ncat.ID INNER JOIN nheader on ncat.headerid=nheader.ID WHERE nheader.id=2";
                                                        $result1 = $conn1->datacon()->query($sql1);
                                                        while ($row1 = $result1->fetch_assoc()) {
                                                        ?>
                                                            <button type="submit" value="<?php echo $row1['ID'] ?>" name="sub" class="btn btn-block btn-default"><?php echo $row1['subar']; ?></button>
                                                        <?php } ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div id="sub3" style="display: none;">
                                                        <?php $conn1 = new config();
                                                        $sql1 = "SELECT nsub.* FROM `nsub` INNER JOIN ncat on nsub.catid=ncat.ID INNER JOIN nheader on ncat.headerid=nheader.ID WHERE nheader.id=3";
                                                        $result1 = $conn1->datacon()->query($sql1);
                                                        while ($row1 = $result1->fetch_assoc()) {
                                                        ?>
                                                            <button type="submit" value="<?php echo $row1['ID'] ?>" name="sub" class="btn btn-block btn-default"><?php echo $row1['subar']; ?></button>
                                                        <?php } ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div id="sub4" style="display: none;">
                                                        <?php $conn1 = new config();
                                                        $sql1 = "SELECT nsub.* FROM `nsub` INNER JOIN ncat on nsub.catid=ncat.ID INNER JOIN nheader on ncat.headerid=nheader.ID WHERE nheader.id=4";
                                                        $result1 = $conn1->datacon()->query($sql1);
                                                        while ($row1 = $result1->fetch_assoc()) {
                                                        ?>
                                                            <button type="submit" value="<?php echo $row1['ID'] ?>" name="sub" class="btn btn-block btn-default"><?php echo $row1['subar']; ?></button>
                                                        <?php } ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div id="sub5" style="display: none;">
                                                        <?php $conn1 = new config();
                                                        $sql1 = "SELECT nsub.* FROM `nsub` INNER JOIN ncat on nsub.catid=ncat.ID INNER JOIN nheader on ncat.headerid=nheader.ID WHERE nheader.id=6";
                                                        $result1 = $conn1->datacon()->query($sql1);
                                                        while ($row1 = $result1->fetch_assoc()) {
                                                        ?>
                                                            <button type="submit" value="<?php echo $row1['ID'] ?>" name="sub" class="btn btn-block btn-default"><?php echo $row1['subar']; ?></button>
                                                        <?php } ?>
                                                    </div>
                                                </td>
                                                <script>
                                                    function showsub(sub) {
                                                        if (document.getElementById(sub).style.display === "none") {
                                                            document.getElementById(sub).style.display = "block";
                                                        } else {
                                                            document.getElementById(sub).style.display = "none";
                                                        }
                                                    }
                                                </script>
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
                                    if (isset($_POST['All'])) {
                                        echo "جميع المنتجات";
                                    } elseif (isset($_POST['getCate']) && $_POST['getCate'] == 1) {
                                        echo "الأجهزة الكهربائية";
                                    } elseif (isset($_POST['getCate']) && $_POST['getCate'] == 2) {
                                        echo "الأدوات الكهربائيةالخفيفة";
                                    } elseif (isset($_POST['getCate']) && $_POST['getCate'] == 3) {
                                        echo "الأدوات المنزلية";
                                    } elseif (isset($_POST['getCate']) && $_POST['getCate'] == 4) {
                                        echo "المفروشات";
                                    } elseif (isset($_POST['Offers'])) {
                                        echo "Offers";
                                    } elseif (isset($_POST['sub'])) {
                                        echo $_POST['sub'];
                                    } else {
                                        echo "لم يتم تحديد اي منتجات";
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
                                            <th>Sale</th>
                                            <th>سعر بعدالخصم</th>
                                            <th>نسبة الخصم</th>
                                            <th>Stock</th>
                                            <th>Size</th>
                                            <th>قسم</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (isset($_POST['All'])) { ?>
                                            <?php $conn1 = new config();
                                            $sql1 = "SELECT products.*,nsub.subar FROM products INNER JOIN nsub on products.SID=nsub.ID INNER JOIN ncat  on nsub.catid=ncat.ID INNER JOIN nheader on ncat.headerid=nheader.ID where products.BSale = 1 ORDER BY FIELD(products.SID,'1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31','32','33','34','35','36','37','38','58','56','47','48','49','50','51','52','53','54','39','40','41','42','57','43','44','45','46','55')";
                                            $result1 = $conn1->datacon()->query($sql1);
                                            $co = 0;
                                            while ($row1 = $result1->fetch_assoc()) {
                                                $co++; ?>
                                                <tr>
                                                    <td><a href="edit_product.php?ID=<?php echo $row1['ID']; ?>"><?php
                                                                                                                $pieces = explode(".", $row1['Photo']);
                                                                                                                echo $pieces[0];
                                                                                                                ?></a>
                                                        <img style="width: 70px;" src="../images/home/<?php echo $row1['Photo'] ?>?1222259157.415">
                                                        <img style="width: 70px;" src="../images/product-details/<?php echo $row1['Photo'] ?>?1222259157.415">
                                                    </td>
                                                    <td><?php echo $row1['ArName'] ?></td>
                                                    <td><?php echo $row1['Price'] ?></td>
                                                    <td>
                                                        <?php
                                                        if ($row1['BSale'] == '0') {
                                                            echo 'NO';
                                                        } else {
                                                            echo 'YES';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?php echo $row1['SalePrice'] ?></td>
                                                    <td style="color: red;font-weight: bold;"><?php
                                                                                                if ($row55['BSale'] == '0') {
                                                                                                    echo '0';
                                                                                                } else {
                                                                                                    echo round((100 - (($row1['SalePrice'] / $row1['Price']) * 100))) . "%";
                                                                                                }
                                                                                                ?>
                                                    </td>
                                                    <td><?php echo $row1['Stock'] ?></td>
                                                    <td><?php echo $row1['Size'] ?></td>
                                                    <td><?php echo $row1['subar'] ?></td>

                                                </tr>
                                            <?php } ?>

                                            <?php $conn55 = new config();
                                            $sql55 = "SELECT products.*,nsub.subar FROM products INNER JOIN nsub on products.SID=nsub.ID INNER JOIN ncat  on nsub.catid=ncat.ID INNER JOIN nheader on ncat.headerid=nheader.ID where products.BSale = 0 ORDER BY FIELD(products.SID,'1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31','32','33','34','35','36','37','38','58','56','47','48','49','50','51','52','53','54','39','40','41','42','57','43','44','45','46','55')";
                                            $result55 = $conn1->datacon()->query($sql55);
                                            while ($row55 = $result55->fetch_assoc()) {
                                                $co++; ?>
                                                <tr>
                                                    <td><a href="edit_product.php?ID=<?php echo $row55['ID']; ?>"><?php
                                                                                                                    $pieces = explode(".", $row55['Photo']);
                                                                                                                    echo $pieces[0];
                                                                                                                    ?></a>
                                                        <img style="width: 70px;" src="../images/home/<?php echo $row55['Photo'] ?>?1222259157.415">
                                                        <img style="width: 70px;" src="../images/product-details/<?php echo $row55['Photo'] ?>?1222259157.415">
                                                    </td>
                                                    <td><?php echo $row55['ArName'] ?></td>
                                                    <td><?php echo $row55['Price'] ?></td>
                                                    <td>
                                                        <?php
                                                        if ($row55['BSale'] == '0') {
                                                            echo 'NO';
                                                        } else {
                                                            echo 'YES';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?php echo $row55['SalePrice'] ?></td>
                                                    <td style="color: red;font-weight: bold;"><?php
                                                                                                if ($row55['BSale'] == '0') {
                                                                                                    echo '0';
                                                                                                } else {
                                                                                                    echo round((100 - (($row1['SalePrice'] / $row1['Price']) * 100))) . "%";
                                                                                                }
                                                                                                ?>
                                                    </td>
                                                    <td><?php echo $row55['Stock'] ?></td>
                                                    <td><?php echo $row55['Size'] ?></td>
                                                    <td><?php echo $row55['subar'] ?></td>
                                                </tr>
                                        <?php }
                                        } ?>


                                        <?php if (isset($_POST['getCate'])) { ?>
                                            <?php $conn1 = new config();
                                            $hID = $_POST['getCate'];
                                            $sql1 = "SELECT products.*,nsub.subar FROM products  INNER JOIN nsub on products.SID=nsub.ID INNER JOIN ncat  on nsub.catid=ncat.ID INNER JOIN nheader on ncat.headerid=nheader.ID where products.BSale = 1 AND nheader.ID=$hID ORDER BY FIELD(products.SID,'1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31','32','33','34','35','36','37','38','58','56','47','48','49','50','51','52','53','54','39','40','41','42','57','43','44','45','46','55')";
                                            $result1 = $conn1->datacon()->query($sql1);
                                            $co = 0;
                                            while ($row1 = $result1->fetch_assoc()) {
                                                $co++; ?>
                                                <tr>
                                                    <td><a href="edit_product.php?ID=<?php echo $row1['ID']; ?>"><?php
                                                                                                                $pieces = explode(".", $row1['Photo']);
                                                                                                                echo $pieces[0];
                                                                                                                ?></a>
                                                        <img style="width: 70px;" src="../images/home/<?php echo $row1['Photo'] ?>?1222259157.415">
                                                        <img style="width: 70px;" src="../images/product-details/<?php echo $row1['Photo'] ?>?1222259157.415">
                                                    </td>
                                                    <td><?php echo $row1['ArName'] ?></td>
                                                    <td><?php echo $row1['Price'] ?></td>
                                                    <td>
                                                        <?php
                                                        if ($row1['BSale'] == '0') {
                                                            echo 'NO';
                                                        } else {
                                                            echo 'YES';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?php echo $row1['SalePrice'] ?></td>
                                                    <td style="color: red;font-weight: bold;"><?php
                                                                                                if ($row55['BSale'] == '0') {
                                                                                                    echo '0';
                                                                                                } else {
                                                                                                    echo round((100 - (($row1['SalePrice'] / $row1['Price']) * 100))) . "%";
                                                                                                }
                                                                                                ?>
                                                    </td>
                                                    <td><?php echo $row1['Stock'] ?></td>
                                                    <td><?php echo $row1['Size'] ?></td>
                                                    <td><?php echo $row1['subar'] ?></td>

                                                </tr>
                                            <?php } ?>

                                            <?php $conn55 = new config();
                                            $sql55 = "SELECT products.*,nsub.subar FROM products INNER JOIN nsub on products.SID=nsub.ID INNER JOIN ncat  on nsub.catid=ncat.ID INNER JOIN nheader on ncat.headerid=nheader.ID where products.BSale = 0 AND nheader.ID=$hID ORDER BY FIELD(products.SID,'1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31','32','33','34','35','36','37','38','58','56','47','48','49','50','51','52','53','54','39','40','41','42','57','43','44','45','46','55')";
                                            $result55 = $conn1->datacon()->query($sql55);
                                            while ($row55 = $result55->fetch_assoc()) {
                                                $co++; ?>
                                                <tr>
                                                    <td><a href="edit_product.php?ID=<?php echo $row55['ID']; ?>"><?php
                                                                                                                    $pieces = explode(".", $row55['Photo']);
                                                                                                                    echo $pieces[0];
                                                                                                                    ?></a>
                                                        <img style="width: 70px;" src="../images/home/<?php echo $row55['Photo'] ?>?1222259157.415">
                                                        <img style="width: 70px;" src="../images/product-details/<?php echo $row55['Photo'] ?>?1222259157.415">
                                                    </td>
                                                    <td><?php echo $row55['ArName'] ?></td>
                                                    <td><?php echo $row55['Price'] ?></td>
                                                    <td>
                                                        <?php
                                                        if ($row55['BSale'] == '0') {
                                                            echo 'NO';
                                                        } else {
                                                            echo 'YES';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?php echo $row55['SalePrice'] ?></td>
                                                    <td style="color: red;font-weight: bold;"><?php
                                                                                                if ($row55['BSale'] == '0') {
                                                                                                    echo '0';
                                                                                                } else {
                                                                                                    echo round((100 - (($row1['SalePrice'] / $row1['Price']) * 100))) . "%";
                                                                                                }
                                                                                                ?>
                                                    </td>
                                                    <td><?php echo $row55['Stock'] ?></td>
                                                    <td><?php echo $row55['Size'] ?></td>
                                                    <td><?php echo $row55['subar'] ?></td>
                                                </tr>
                                        <?php }
                                        } ?>


                                        <?php if (isset($_POST['Offers'])) { ?>
                                            <?php $conn1 = new config();
                                            $sql1 = "SELECT products.*,nsub.subar FROM products  INNER JOIN nsub on products.SID=nsub.ID INNER JOIN ncat  on nsub.catid=ncat.ID INNER JOIN nheader on ncat.headerid=nheader.ID where products.BSale = 1 AND nheader.ID!=6 ORDER BY FIELD(products.SID,'1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31','32','33','34','35','36','37','38','58','56','47','48','49','50','51','52','53','54','39','40','41','42','57','43','44','45','46','55')";
                                            $result1 = $conn1->datacon()->query($sql1);
                                            $co = 0;
                                            while ($row1 = $result1->fetch_assoc()) {
                                                $co++; ?>
                                                <tr>
                                                    <td><a href="edit_product.php?ID=<?php echo $row1['ID']; ?>"><?php
                                                                                                                $pieces = explode(".", $row1['Photo']);
                                                                                                                echo $pieces[0];
                                                                                                                ?></a>
                                                        <img style="width: 70px;" src="../images/home/<?php echo $row1['Photo'] ?>?1222259157.415">
                                                        <img style="width: 70px;" src="../images/product-details/<?php echo $row1['Photo'] ?>?1222259157.415">
                                                    </td>
                                                    <td><?php echo $row1['ArName'] ?></td>
                                                    <td><?php echo $row1['Price'] ?></td>
                                                    <td>
                                                        <?php
                                                        if ($row1['BSale'] == '0') {
                                                            echo 'NO';
                                                        } else {
                                                            echo 'YES';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?php echo $row1['SalePrice'] ?></td>
                                                    <td style="color: red;font-weight: bold;"><?php
                                                                                                if ($row55['BSale'] == '0') {
                                                                                                    echo '0';
                                                                                                } else {
                                                                                                    echo round((100 - (($row1['SalePrice'] / $row1['Price']) * 100))) . "%";
                                                                                                }
                                                                                                ?>
                                                    </td>
                                                    <td><?php echo $row1['Stock'] ?></td>
                                                    <td><?php echo $row1['Size'] ?></td>
                                                    <td><?php echo $row1['subar'] ?></td>
                                                </tr>
                                            <?php } ?>

                                            <?php $conn55 = new config();
                                            $sql55 = "SELECT products.*,nsub.subar FROM products INNER JOIN nsub on products.SID=nsub.ID INNER JOIN ncat  on nsub.catid=ncat.ID INNER JOIN nheader on ncat.headerid=nheader.ID where products.BSale = 1 AND nheader.ID=6 ORDER BY FIELD(products.SID,'1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31','32','33','34','35','36','37','38','58','56','47','48','49','50','51','52','53','54','39','40','41','42','57','43','44','45','46','55')";
                                            $result55 = $conn1->datacon()->query($sql55);
                                            while ($row55 = $result55->fetch_assoc()) {
                                                $co++; ?>
                                                <tr>
                                                    <td><a href="edit_product.php?ID=<?php echo $row55['ID']; ?>"><?php
                                                                                                                    $pieces = explode(".", $row55['Photo']);
                                                                                                                    echo $pieces[0];
                                                                                                                    ?></a>
                                                        <img style="width: 70px;" src="../images/home/<?php echo $row55['Photo'] ?>?1222259157.415">
                                                        <img style="width: 70px;" src="../images/product-details/<?php echo $row55['Photo'] ?>?1222259157.415">
                                                    </td>
                                                    <td><?php echo $row55['ArName'] ?></td>
                                                    <td><?php echo $row55['Price'] ?></td>
                                                    <td>
                                                        <?php
                                                        if ($row55['BSale'] == '0') {
                                                            echo 'NO';
                                                        } else {
                                                            echo 'YES';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?php echo $row55['SalePrice'] ?></td>
                                                    <td style="color: red;font-weight: bold;"><?php
                                                                                                if ($row55['BSale'] == '0') {
                                                                                                    echo '0';
                                                                                                } else {
                                                                                                    echo round((100 - (($row1['SalePrice'] / $row1['Price']) * 100))) . "%";
                                                                                                }
                                                                                                ?>
                                                    </td>
                                                    <td><?php echo $row55['Stock'] ?></td>
                                                    <td><?php echo $row55['Size'] ?></td>
                                                    <td><?php echo $row55['subar'] ?></td>
                                                </tr>
                                        <?php }
                                        } ?>



                                        <?php if (isset($_POST['sub'])) { ?>
                                            <?php $conn1 = new config();
                                            $SID = $_POST['sub'];
                                            $sql1 = "SELECT products.*,nsub.subar FROM products  INNER JOIN nsub on products.SID=nsub.ID where products.BSale = 1 AND products.SID=$SID";
                                            $result1 = $conn1->datacon()->query($sql1);
                                            $co = 0;
                                            while ($row1 = $result1->fetch_assoc()) {
                                                $co++; ?>
                                                <tr>
                                                    <td><a href="edit_product.php?ID=<?php echo $row1['ID']; ?>"><?php
                                                                                                                $pieces = explode(".", $row1['Photo']);
                                                                                                                echo $pieces[0];
                                                                                                                ?></a>
                                                        <img style="width: 70px;" src="../images/home/<?php echo $row1['Photo'] ?>?1222259157.415">
                                                        <img style="width: 70px;" src="../images/product-details/<?php echo $row1['Photo'] ?>?1222259157.415">
                                                    </td>
                                                    <td><?php echo $row1['ArName'] ?></td>
                                                    <td><?php echo $row1['Price'] ?></td>
                                                    <td>
                                                        <?php
                                                        if ($row1['BSale'] == '0') {
                                                            echo 'NO';
                                                        } else {
                                                            echo 'YES';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?php echo $row1['SalePrice'] ?></td>
                                                    <td style="color: red;font-weight: bold;"><?php
                                                                                                if ($row55['BSale'] == '0') {
                                                                                                    echo '0';
                                                                                                } else {
                                                                                                    echo round((100 - (($row1['SalePrice'] / $row1['Price']) * 100))) . "%";
                                                                                                }
                                                                                                ?>
                                                    </td>
                                                    <td><?php echo $row1['Stock'] ?></td>
                                                    <td><?php echo $row1['Size'] ?></td>
                                                    <td><?php echo $row1['subar'] ?></td>
                                                </tr>
                                            <?php } ?>

                                            <?php $conn55 = new config();
                                            $sql55 = "SELECT products.*,nsub.subar FROM products  INNER JOIN nsub on products.SID=nsub.ID where products.BSale = 0 AND products.SID=$SID";
                                            $result55 = $conn1->datacon()->query($sql55);
                                            while ($row55 = $result55->fetch_assoc()) {
                                                $co++; ?>
                                                <tr>
                                                    <td><a href="edit_product.php?ID=<?php echo $row55['ID']; ?>"><?php
                                                                                                                    $pieces = explode(".", $row55['Photo']);
                                                                                                                    echo $pieces[0];
                                                                                                                    ?></a>
                                                        <img style="width: 70px;" src="../images/home/<?php echo $row55['Photo'] ?>?1222259157.415">
                                                        <img style="width: 70px;" src="../images/product-details/<?php echo $row55['Photo'] ?>?1222259157.415">
                                                    </td>
                                                    <td><?php echo $row55['ArName'] ?></td>
                                                    <td><?php echo $row55['Price'] ?></td>
                                                    <td>
                                                        <?php
                                                        if ($row55['BSale'] == '0') {
                                                            echo 'NO';
                                                        } else {
                                                            echo 'YES';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?php echo $row55['SalePrice'] ?></td>
                                                    <td style="color: red;font-weight: bold;"><?php
                                                                                                if ($row55['BSale'] == '0') {
                                                                                                    echo '0';
                                                                                                } else {
                                                                                                    echo round((100 - (($row1['SalePrice'] / $row1['Price']) * 100))) . "%";
                                                                                                }
                                                                                                ?>
                                                    </td>
                                                    <td><?php echo $row55['Stock'] ?></td>
                                                    <td><?php echo $row55['Size'] ?></td>
                                                    <td><?php echo $row55['subar'] ?></td>
                                                </tr>
                                        <?php }
                                        } ?>




                                    </tbody>
                                </table>


                                <table id="Downloadpp" style="display: none;">
                                    <thead>
                                        <tr>
                                            <th>كود</th>
                                            <th>الاسم</th>
                                            <th>سعر قبل</th>
                                            <th>Sale</th>
                                            <th>سعر بعدالخصم</th>
                                            <th>Stock</th>
                                            <th>Size</th>
                                            <th>قسم</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $conn1 = new config();
                                        $sql1 = "SELECT products.*,nsub.subar FROM products INNER JOIN nsub on products.SID=nsub.ID INNER JOIN ncat on nsub.catid=ncat.ID INNER JOIN nheader on ncat.headerid=nheader.ID ORDER BY nheader.ID, ncat.ID,nsub.ID";
                                        $result1 = $conn1->datacon()->query($sql1);
                                        while ($row1 = $result1->fetch_assoc()) { ?>
                                            <tr>
                                                <td style='mso-number-format:"\@";'><?php
                                                    $pieces = explode(".", $row1['Photo']);
                                                    echo $pieces[0];
                                                    ?>
                                                </td>
                                                <td><?php echo $row1['ArName'] ?></td>
                                                <td><?php echo $row1['Price'] ?></td>
                                                <td>
                                                    <?php
                                                    if ($row1['BSale'] == '0') {
                                                        echo 'NO';
                                                    } else {
                                                        echo 'YES';
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php echo $row1['SalePrice'] ?></td>
                                                <td><?php echo $row1['Stock'] ?></td>
                                                <td><?php echo $row1['Size'] ?></td>
                                                <td><?php echo $row1['subar'] ?></td>

                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <button type="button" onclick="exportTableToExcel('Downloadpp','Products');" <?php if ($_SESSION['type'] == 'viewer') {
                                                                                                                    echo 'disabled';
                                                                                                                } ?>>Create Excel File</button>
                                <script>
                                    function exportTableToExcel(tableID, filename = '') {
                                        var downloadLink;
                                        var dataType = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
                                        var tableSelect = document.getElementById(tableID);
                                        var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

                                        // Specify file name
                                        filename = filename ? filename + '.xls' : 'excel_data.xls';

                                        // Create download link element
                                        downloadLink = document.createElement("a");

                                        document.body.appendChild(downloadLink);

                                        if (navigator.msSaveOrOpenBlob) {
                                            var blob = new Blob(['\ufeff', tableHTML], {
                                                type: dataType
                                            });
                                            navigator.msSaveOrOpenBlob(blob, filename);
                                        } else {
                                            // Create a link to the file
                                            downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

                                            // Setting the file name
                                            downloadLink.download = filename;

                                            //triggering the function
                                            downloadLink.click();
                                        }
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
        $(function() {
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