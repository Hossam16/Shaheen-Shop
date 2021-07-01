
<!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="index.php" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <!-- <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-comments"></i>
                    <span class="badge badge-danger navbar-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="#" class="dropdown-item"> -->
                        <!-- Message Start -->
                        <!-- <div class="media">
                            <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Brad Diesel
                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">Call me whenever you can...</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div> -->
                        <!-- Message End -->
                    <!-- </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item"> -->
                        <!-- Message Start -->
                        <!-- <div class="media">
                            <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    John Pierce
                                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">I got your message bro</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div> -->
                        <!-- Message End -->
                    <!-- </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item"> -->
                        <!-- Message Start -->
                        <!-- <div class="media">
                            <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Nora Silvester
                                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">The subject goes here</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div> -->
                        <!-- Message End -->
                    <!-- </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
            </li> -->
            <!-- Notifications Dropdown Menu
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">15 Notifications</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> 4 new messages
                        <span class="float-right text-muted text-sm">3 mins</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> 8 friend requests
                        <span class="float-right text-muted text-sm">12 hours</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> 3 new reports
                        <span class="float-right text-muted text-sm">2 days</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index.phpl" class="brand-link">
            <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">Shaheen Dashboard</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="dist/img/AdminLTELogo.png" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block"><?php echo($_SESSION['name']) ?></a>
                </div>
            </div>
			 <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                    <a href="logout.php" class="d-block">Log out</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="index.php" class="nav-link <?php echo $index;?>">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Home
                            </p>
                        </a>
                    </li>
                    <?php if($_SESSION['type']=='developer' OR $_SESSION['type']=='DataManger' ){ ?>
                        
                        <li class="nav-item has-treeview <?php echo $admin_mo;?>">
                        <a href="#" class="nav-link <?php echo $admin;?>" style="background-color:#001f3f;border:1px;border-radius:5px;">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Admin 
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="adminStats.php" class="nav-link <?php echo $admin_all;?>">
                                    <i class="fas fa-shopping-cart"></i>
                                    <p>Stats</p>
                                </a>
                            </li> 
                        </ul>
                    </li>

                    <li class="nav-item has-treeview <?php echo $product_mo;?>" >
                        <a href="#" class="nav-link <?php echo $product_m;?>" style="background-color:#dc3545;border:1px;border-radius:5px;">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                مدير المنتجات
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="all_products.php" class="nav-link <?php echo $product_all;?>">
                                    <i class="fas fa-shopping-cart"></i>
                                    <p>جميع المنتجات </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="edit_group.php" class="nav-link <?php echo $product_group?>">
                                    <i class="fas fa-layer-group"></i>
                                    <p>تعديل مجموعة  </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./addProduct.php" class="nav-link <?php echo$product_allk?>">
                                    <i class="far fa-plus-square"></i>
                                    <p>أضافة منتج </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./photosEdit.php" class="nav-link <?php echo $product_allkk?>">
                                <i class="far fa-images"></i>
                                    <p>الصور</p>
                                </a>
                            </li>
                            
                        </ul>
                    </li>
					<?php }?>
					<?php if($_SESSION['type']=='developer' or $_SESSION['type']=='ordertaker' or $_SESSION['type']=='joker' ){ ?>
                    <li class="nav-item has-treeview <?php echo $orders_m;?>">
                        <a href="#" class="nav-link <?php echo $orders_ma;?>" style="background-color:#3c8dbc;border:1px;border-radius:5px;">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                مدير الطلبات
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="daily_orders.php" class="nav-link <?php echo $daily_orders;?>">
                                    <i class="fas fa-shopping-cart"></i>
                                    <p> طلبيات اليوم </p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="visaOrdes.php" class="nav-link <?php echo $daily_ordersVisa;?>">
                                    <i class="fas fa-shopping-cart"></i>
                                    <p> طلبيات الدفع بالفيزا </p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="callcenterOrders.php" class="nav-link <?php echo $callcenter_orders;?>">
                                    <i class="fas fa-shopping-cart"></i>
                                    <p>طلبيات كول سنتر</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php }?>
                    <?php if($_SESSION['type']=='developer' or $_SESSION['type']=='callcenter' or $_SESSION['type']=='joker' ){ ?>
					<li class="nav-item has-treeview <?php echo $orders_xm;?>">
                        <a href="#" class="nav-link <?php echo $orders_omm;?>" style="background-color:#28a745;border:1px;border-radius:5px;">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Call Center
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="creatorder.php" class="nav-link <?php echo $daily_orderss;?>">
                                    <i class="fas fa-shopping-cart"></i>
                                    <p>Make Order</p>
                                </a>
                            </li>
                        </ul>
						<ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="editordercall.php" class="nav-link <?php echo $daily_ordersss;?>">
                                    <i class="fas fa-shopping-cart"></i>
                                    <p>Edit Order Call Center</p>
                                </a>
                            </li>
                        </ul>
						<ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="filterOrder.php" class="nav-link <?php echo $daily_orderssss;?>">
                                    <i class="fas fa-shopping-cart"></i>
                                    <p>Edit Order</p>
                                </a>
                            </li>
                        </ul>
						<ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="makeComplaint.php" class="nav-link <?php echo $daily_ordersoss;?>">
                                    <i class="fas fa-shopping-cart"></i>
                                    <p>Make a Complaint</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="makeComplaint.php" class="nav-link <?php echo $daily_ordersoss;?>">
                                    <i class="fas fa-shopping-cart"></i>
                                    <p>List Complaint</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php }?>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->