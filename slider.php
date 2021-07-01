 <?php
    $conn = new config();
    $sql = 'SELECT * FROM sliders WHERE header=\'mainslider\'';
    $result = $conn->datacon()->query($sql);
    $result1 = $conn->datacon()->query($sql);
    ?>
 <style>
     @media only screen and (max-width: 600px) {
         #slide {
             text-align: center;
             margin-bottom: 5px;
         }
     }
 </style>
 <section id="slider" style="text-align: center;">
     <!--slider-->
     <div class="container">
         <div class="row">
             <div class="col-sm-12">
                 <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                     <ol class="carousel-indicators">

                         <?php
                            $i = 0;
                            while ($row1 = $result1->fetch_assoc()) {
                                $count = $result1->num_rows;
                                if ($row1['status'] == 1) {
                                    $active = 'active';
                                } else {
                                    $active = '';
                                }
                            ?>

                             <li data-target="#slider-carousel" data-slide-to="<?php echo $i; ?>" <?php if ($row1['status'] == 1) { ?>class="active" <?php } ?>></li>
                         <?php $i = $i + 1;
                            } ?>
                     </ol>
                     <div class="carousel-inner">
                         <?php
                            while ($row = $result->fetch_assoc()) {
                                $count = $result->num_rows;
                                if ($row['status'] == 1) {
                                    $active = 'active';
                                } else {
                                    $active = '';
                                }
                            ?>
                             <div class="item <?php echo $active ?>">
                                 <div id="slide" class="col-sm-6" style="">
                                     <h1><span>Shaheen Shop</span></h1>
                                     <a href="<?php echo $row['link'] ?>">
                                         <h2><?php echo $row['name']; ?></h2>
                                         <p style="height: 88px"><?php echo $row['text']; ?></p>
                                     </a>
                                     <a href="<?php echo $row['link'] ?>"><button type="button" class="btn btn-default get">Get it now</button></a>
                                 </div>
                                 <div class="col-sm-6">
                                     <a href="<?php echo $row['link'] ?>"><img style="border: 1px; border-radius: 20px;" src="images/home/<?php echo $row['photo'] . '?' . date('yyyy-mm-dd h-m-s'); ?>" class="girl img-responsive" alt="" />
                                     </a>
                                 </div>
                             </div>
                         <?php } ?>
                     </div>
                     <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                         <i class="fa fa-angle-left"></i>
                     </a>
                     <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                         <i class="fa fa-angle-right"></i>
                     </a>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!--/slider-->