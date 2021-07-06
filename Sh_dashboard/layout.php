<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark navbar-gray" style="background:#e81f25;font-weight: bold;">
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
    <ul class="navbar-nav mrl-auto">
        <!-- Messages Dropdown Menu -->
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: #2a57a5;">
    <!-- Brand Logo -->
    <a href="index.phpl" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light" style="font-weight: bold !important;color: white;">Shaheen Dashboard</span>
    </a>

    <!-- Sidebar -->
    <style>
        /* Hide scrollbar for Chrome, Safari and Opera */
        .sidebar::-webkit-scrollbar {
            display: none;
        }

        /* Hide scrollbar for IE, Edge and Firefox */
        .sidebar {
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }
    </style>
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <?php if ($_SESSION['Gender'] == 'F') { ?>
                    <img src="dist/img/F.png" class="img-circle elevation-2" alt="User Image">
                <?php } else { ?>
                    <img src="dist/img/user.jpg" class="img-circle elevation-2" alt="User Image">
                <?php } ?>
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo ($_SESSION['name']) ?></a>
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
                    <a href="index.php" class="nav-link <?php echo $index; ?>">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
                <?php if ($_SESSION['type'] == 'developer' or $_SESSION['type'] == 'viewer') { ?>
                    <li class="nav-item has-treeview <?php echo $admin13; ?>">
                        <a href="#" class="nav-link <?php echo $admin13; ?>" style="background-color: #e81f25;border:1px;border-radius:5px;">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p style="color: white;font-weight: bold;">
                                تقارير
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-header" style=" background-color: #00000087; border-radius: 10px;">الطلبيات</li>
                            <li class="nav-item">
                                <a href="orderDetailReport.php" class="nav-link <?php echo $admin_all1355; ?>">
                                    <i class="fas fa-cart-arrow-down"></i>
                                    <p>تقرير مفصل للطلبات</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="OrdersOnRange.php" class="nav-link <?php echo $admin_all14; ?>">
                                    <i class="fas fa-chart-line"></i>
                                    <p>معدل الطلب</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="WebOrdersOnRange.php" class="nav-link <?php echo $admin_all18; ?>">
                                    <i class="fas fa-shopping-cart"></i>
                                    <p>معدل طلب العملاء</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="ConfirmedOrders.php" class="nav-link <?php echo $admin_all21; ?>">
                                    <i class="far fa-check-circle"></i>
                                    <p>تأكيدات</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="CanceledOrders.php" class="nav-link <?php echo $admin_all20; ?>">
                                    <i class="fas fa-ban"></i>
                                    <p>إلغاءات</p>
                                </a>
                            </li>
                        </ul>

                        <ul class="nav nav-treeview">
                            <li class="nav-header" style=" background-color: #00000087; border-radius: 10px;">متلقين الطلبيات</li>
                            <li class="nav-item">
                                <a href="AgentsOnRange.php" class="nav-link <?php echo $admin_all16; ?>">
                                    <i class="fas fa-sort"></i>
                                    <p>ترتيب متلقين الطلبيات</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="AgentRate.php" class="nav-link <?php echo $admin_all17; ?>">
                                    <i class="fas fa-chart-area"></i>
                                    <p>أداء متلقين الطلبيات</p>
                                </a>
                            </li>
                        </ul>

                        <ul class="nav nav-treeview">
                            <li class="nav-header" style=" background-color: #00000087; border-radius: 10px;">المنتجات</li>
                            <li class="nav-item">
                                <a href="Top100Products.php" class="nav-link <?php echo $admin_all13; ?>">
                                    <i class="fas fa-arrow-up"></i>
                                    <p>أكثر المنتجات طلباً</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="ProductOrderedHistory.php" class="nav-link <?php echo $admin_all1355789; ?>">
                                    <i class="fas fa-history"></i>
                                    <p>تاريخ طلب المنتج</p>
                                </a>
                            </li>
                        </ul>

                        <ul class="nav nav-treeview">
                            <li class="nav-header" style=" background-color: #00000087; border-radius: 10px;">جغرافياً</li>
                            <li class="nav-item">
                                <a href="TopGovernotrateOnRange.php" class="nav-link <?php echo $admin_all15; ?>">
                                    <i class="fas fa-atlas"></i>
                                    <p>ترتيب المحافظات</p>
                                </a>
                            </li>
                        </ul>


                        <ul class="nav nav-treeview">
                            <li class="nav-header" style=" background-color: #00000087; border-radius: 10px;">المستخدمين</li>
                            <li class="nav-item">
                                <a href="Top20UsersOrdered.php" class="nav-link <?php echo $admin_all19; ?>">
                                    <i class="fas fa-sort-amount-down"></i>
                                    <p>أكثر 20 مستخدم طلباً</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>

                <?php if ($_SESSION['type'] == 'developer' or $_SESSION['type'] == 'viewer' or $_SESSION['type'] == 'DataManger' or $_SESSION['type'] == 'supervisorDataManger') { ?>
                    <li class="nav-item has-treeview <?php echo $admin; ?>">
                        <a href="#" class="nav-link <?php echo $admin; ?>" style="background-color: #e81f25;border:1px;border-radius:5px;">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p style="color: white;font-weight: bold;">
                                مدير المحتوى
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item" style="display: none;">
                                <a href="adminStats.php" class="nav-link <?php echo $admin_all; ?>">
                                    <i class="fas fa-shopping-cart"></i>
                                    <p>Stats</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-header" style=" background-color: #00000087; border-radius: 10px;">العروض</li>
                            <li class="nav-item">
                                <a href="./OffersName.php" class="nav-link <?php echo $product_allkks1233 ?>">
                                    <i class="fas fa-gifts"></i>
                                    <p>جميع العروض</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="./AddOffer.php" class="nav-link <?php echo $product_allkks12343 ?>">
                                    <i class="fas fa-gift"></i>
                                    <p>أضافة عرض</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-header" style=" background-color: #00000087; border-radius: 10px;">البنارات</li>
                            <li class="nav-item">
                                <a href="./Sliders.php" class="nav-link <?php echo $product_allkks12 ?>">
                                    <i class="far fa-images"></i>
                                    <p>قائمة البنارات </p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="./ShopBanner.php" class="nav-link <?php echo $product_allkks123 ?>">
                                    <i class="far fa-images"></i>
                                    <p> قائمة البنارات الداخلية</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="./SubBanner.php" class="nav-link <?php echo $product_allkks1s23 ?>">
                                    <i class="far fa-images"></i>
                                    <p> البانر الجانبي و الفرعي</p>
                                </a>
                            </li>
                        </ul>
                        <?php if ($_SESSION['type'] == 'supervisorDataManger' or $_SESSION['type'] == 'developer') { ?>
                            <ul class="nav nav-treeview">
                                <li class="nav-header" style=" background-color: #00000087; border-radius: 10px;">تتبع النظام</li>
                                <li class="nav-item">
                                    <a href="./logsTracking.php" class="nav-link <?php echo $product_allkks12333 ?>">
                                        <i class="fas fa-clipboard-list"></i>
                                        <p>تتبع سجلات المنتجات</p>
                                    </a>
                                </li>
                            </ul>
                        <?php } ?>
                    </li>
                <?php } ?>
                <?php if ($_SESSION['type'] == 'marketing') { ?>
                    <li class="nav-item has-treeview <?php echo $product_mo; ?>">
                        <a href="#" class="nav-link <?php echo $product_m; ?>" style="background-color: #e81f25;border:1px;border-radius:5px;">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p style="color: white;font-weight: bold;">
                                مدير المنتجات
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="./photosEdit.php" class="nav-link <?php echo $product_allkkout ?>">
                                    <i class="far fa-images"></i>
                                    <p>رفع و تعديل صور</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>

                <?php if ($_SESSION['type'] == 'developer' or $_SESSION['type'] == 'DataManger' or $_SESSION['type'] == 'viewer' or $_SESSION['type'] == 'supervisorDataManger') { ?>
                    <li class="nav-item has-treeview <?php echo $product_mo; ?>">
                        <a href="#" class="nav-link <?php echo $product_m; ?>" style="background-color: #e81f25;border:1px;border-radius:5px;">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p style="color: white;font-weight: bold;">
                                مدير المنتجات
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-header" style=" background-color: #00000087; border-radius: 10px;">رفع باتش اكسيل</li>
                            <li class="nav-item">
                                <a href="InsertProducts.php" class="nav-link <?php echo $product_allkkouPrii; ?>">
                                    <i class="fas fa-cubes"></i>
                                    <p>أضافة مجموعة منتجات</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="ProductsUpdate.php" class="nav-link <?php echo $product_allkkouPro; ?>">
                                    <i class="far fa-edit"></i>
                                    <p>تعديل مجموعة منتجات</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="UpdatePrice.php" class="nav-link <?php echo $product_allkkouPri; ?>">
                                    <i class="fas fa-tags"></i>
                                    <p>تعديل مجموعة أسعار</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="UpdateStock.php" class="nav-link <?php echo $product_allkkoutop; ?>">
                                    <i class="fas fa-warehouse"></i>
                                    <p>تعديل مخزون مجموعة</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-header" style=" background-color: #00000087; border-radius: 10px;">المنتجات</li>
                            <li class="nav-item">
                                <a href="./addProduct.php" class="nav-link <?php echo $product_allk ?>">
                                    <i class="fas fa-plus"></i>
                                    <p>أضافة منتج </p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="all_products.php" class="nav-link <?php echo $product_all; ?>">
                                    <i class="fas fa-list-ul"></i>
                                    <p>جميع المنتجات </p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="edit_group.php" class="nav-link <?php echo $product_group ?>">
                                    <i class="fas fa-layer-group"></i>
                                    <p>تعديل مجموعة </p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="AddProductOffer.php" class="nav-link <?php echo $product_group45 ?>">
                                    <i class="fas fa-layer-group"></i>
                                    <p>أضافة منتجات الي عرض</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="./photosEdit.php" class="nav-link <?php echo $product_allkkout ?>">
                                    <i class="far fa-images"></i>
                                    <p>رفع و تعديل صور</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-header" style=" background-color: #00000087; border-radius: 10px;">تقارير</li>
                            <li class="nav-item">
                                <a href="Commodity_division.php" class="nav-link <?php echo $Commodity_division ?>">
                                    <i class="fas fa-chart-pie"></i>
                                    <p>تقرير التقسيم السلعي</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>

                <?php if ($_SESSION['type'] == 'developer' or $_SESSION['type'] == 'viewer' or $_SESSION['type'] == 'ordertaker' or $_SESSION['type'] == 'joker' or $_SESSION['type'] == 'stockAdmin') { ?>
                    <li class="nav-item has-treeview <?php echo $orders_m; ?>">
                        <a href="#" class="nav-link <?php echo $orders_ma; ?>" style="background-color: #e81f25;border:1px;border-radius:5px;">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p style="color: white;font-weight: bold;">
                                مدير الطلبات
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="visaOrdes.php" class="nav-link <?php echo $daily_ordersVisa; ?>">
                                    <i class="fas fa-shopping-cart"></i>
                                    <p> طلبيات الدفع بالفيزا </p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-header" style=" background-color: #00000087; border-radius: 10px;">الطلبيات الحديثة</li>
                            <li class="nav-item">
                                <a href="newCallOrders.php" class="nav-link <?php echo $callcenter_ordersNewCall; ?>">
                                    <i class="fas fa-phone"></i>
                                    <p>خدمة العملاء</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="newWebOrders.php" class="nav-link <?php echo $callcenter_ordersNew; ?>">
                                    <i class="fas fa-globe"></i>
                                    <p>موقع & تطبيق هاتف</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-header" style=" background-color: #00000087; border-radius: 10px;">تأكيدات المخزن</li>
                            <li class="nav-item">
                                <a href="stockReternCall.php" class="nav-link <?php echo $callcenter_ordersRstock; ?>">
                                    <i class="fas fa-phone"></i>
                                    <p>خدمة العملاء</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="stockReternWeb.php" class="nav-link <?php echo $callcenter_ordersRstockWeb; ?>">
                                    <i class="fas fa-globe"></i>
                                    <p>موقع & تطبيق هاتف</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>
                <?php if ($_SESSION['type'] == 'developer' or $_SESSION['type'] == 'viewer' or $_SESSION['type'] == 'callcenter' or $_SESSION['type'] == 'joker' or $_SESSION['type'] == 'stockAdmin') { ?>
                    <li class="nav-item has-treeview <?php echo $orders_xm; ?>">
                        <a href="#" class="nav-link <?php echo $orders_omm; ?>" style="background-color: #e81f25;border:1px;border-radius:5px;">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p style="color: white;font-weight: bold;">
                                خدمة العملاء
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="creatorder.php" class="nav-link <?php echo $daily_orderss; ?>">
                                    <i class="fas fa-shopping-cart"></i>
                                    <p>طلب جديد</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="searchForProduct.php" class="nav-link <?php echo $product_allkks123338; ?>">
                                    <i class="fas fa-shopping-cart"></i>
                                    <p>بحث عن منتج</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="filterOrderCall.php" class="nav-link <?php echo $daily_ordersss; ?>">
                                    <i class="fas fa-shopping-cart"></i>
                                    <p>طلبيات خدمة العملاء</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="filterOrder.php" class="nav-link <?php echo $daily_orderssss; ?>">
                                    <i class="fas fa-shopping-cart"></i>
                                    <p>طلبيات الويب </p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="makeComplaint.php" class="nav-link <?php echo $daily_ordersoss; ?>">
                                    <i class="fas fa-shopping-cart"></i>
                                    <p>شكوى جديدة</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="listCompliant.php" class="nav-link <?php echo $daily_orderssscom; ?>">
                                    <i class="fas fa-shopping-cart"></i>
                                    <p>قائمة الشكاوي</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="aramexOrderList.php" class="nav-link <?php echo $daily_orderssssAramexList; ?>">
                                    <i class="fas fa-shopping-cart"></i>
                                    <p>قائمة طلبيات ارامكس</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>
                <?php if ($_SESSION['type'] == 'stock' or $_SESSION['type'] == 'developer' or $_SESSION['type'] == 'viewer' or $_SESSION['type'] == 'stockAdmin') { ?>
                    <li class="nav-item has-treeview <?php echo $orders_ommStock; ?>">
                        <a href="#" class="nav-link <?php echo $orders_xmstock; ?>" style="background-color: #e81f25;border:1px;border-radius:5px;">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p style="color: white;font-weight: bold;">
                                المخزن
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="confirmedOrdersStock.php" class="nav-link <?php echo $daily_orderssstockcall; ?>">
                                    <i class="fas fa-shopping-cart"></i>
                                    <p>تاكيد طلبيات خدمة عملاء</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="CallOrderSheet.php" class="nav-link <?php echo $daily_orderssstockcal4l; ?>">
                                    <i class="fas fa-shopping-cart"></i>
                                    <p>سحب طلبات خدمة العملاء</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="confirmedWebOrdersStock.php" class="nav-link <?php echo $daily_orderssstock; ?>">
                                    <i class="fas fa-shopping-cart"></i>
                                    <p>تاكيد طلبيات الويب</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="WebOrderSheet.php" class="nav-link <?php echo $daily_orderssstockcal45l; ?>">
                                    <i class="fas fa-shopping-cart"></i>
                                    <p>سحب طلبات الويب</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="AramexIntegrated.php" class="nav-link <?php echo $product_alppppl; ?>">
                                    <i class="fas fa-shopping-cart"></i>
                                    <p>جميع تحويلات اراميكس</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="VisaAramex.php" class="nav-link <?php echo $daily_ordersoooss; ?>">
                                    <i class="fas fa-shopping-cart"></i>
                                    <p>تحويل طلبيات فيزا لاراميكس</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link <?php echo $ShippingCompany; ?>">
                                    <i class="fas fa-shopping-cart"></i>
                                    <p>تسليمات شركات الشحن</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="Delegate.php" class="nav-link <?php echo $product_alpppplDelegate; ?>">
                                    <i class="fas fa-shopping-cart"></i>
                                    <p>تحويلات مناديب داخلي</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>
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