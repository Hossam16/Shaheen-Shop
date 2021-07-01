<?php include "config.php"?>
<?php include "Slide.php" ?>
<?php
$orders_xmstock='active';
$orders_ommStock='menu-open';
$product_alpppplDelegate='active';
?>
<?php 
    session_start();
    if(($_SESSION['AID'])>0)
{
}
else{
    header('Location: login.php');
}
?>

<?php

if(isset($_POST['Generate']))
{
    

    if(mysqli_num_rows(Order::ViewSingleOrders($_POST['CSOID'])) != 0)
    {
        $rowO = Order::ViewSingleOrders($_POST['CSOID'])->fetch_assoc();
        $rowOD = Orderdata::ViewOrderdata($rowO['ID']);
    }
    elseif(mysqli_num_rows(Order::ViewSingleOrdersweb($_POST['CSOID']))!= 0)
    {
        $rowO = Order::ViewSingleOrdersweb($_POST['CSOID'])->fetch_assoc();
        $rowOD = Orderdata::ViewOrderdataweb($rowO['ID']);
    }
    else
    {
        echo "Order Not Found";
    }
    $TotalPrice = $rowO['TotalPrice'];
    $Shipping = $rowO['Shipping']; 
    $SubTotal = $rowO['SubTotal'];
    $Governorate = $rowO['Governorate'];   
    $Location = $rowO['Location'];
    $CName= $rowO['CName']; 
    $City= $_POST['area']; 
    $Phone= $rowO['Phone'];
    $Note= $rowO['Note'];
    $OID= $rowO['ID'];
    date_default_timezone_set("Africa/Cairo");
    $CreatedDate = date("Y-m-d    h:i:s"); 
    if(isset($rowO['Phone2']))
    {
        $Phone2= $rowO['Phone2'];
    }else
    {
        $Phone2 = $rowO['Phone'];
    }
}

 ?>

<!DOCTYPE html>
<html>
<?php include"head.php";?>

<body class="hold-transition sidebar-mini layout-fixed" >

<?php include"layout.php";?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>طلبيات</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">عروض</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content" style="direction: rtl;">
    <?php if(isset($TotalPrice)){ ?>
    <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> Alert!</h5>
                  Success <?php echo $TotalPrice; ?>
                </div>
    <?php } ?>
        <div class="row">
            <div class="col-12">
                    <div class="card card-outline card-primary collapsed-card">
                        <div class="card-header">
                                <h3 class="card-title" style="float:right;">تحويل مناديب</h3>

                                <div class="card-tools" style="float: left;">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" style="display: block;display: none;">
                                <form role="form" method="post">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" style="float: right;">رقم الطلب</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" name="CSOID" placeholder="12345" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" style="float: right;">المندوب</label>
                                        <select class="form-control" name="Delegate" required>
                                        <option value="Mohmed Moustafa">Mohmed Moustafa</option>
                                        <option value="Mohmed Yousry">Mohmed Yousry</option>
                                        <option value="Hassan Sayed">Hassan Sayed</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" style="float: right;">الدفع</label>
                                        <select class="form-control" name="Payment" required>
                                        <option value="Cash">Cash</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                    <label for="exampleInputEmail1" style="float: right;">المنطقة</label>
                                        <select class="form-control" name="area" required>
                                            <option value="10Th Of Ramadan City">10Th Of Ramadan City</option>
                                            <option value="15 Of May City">15 Of May City</option>
                                            <option value="Abasya">Abasya</option>
                                            <option value="Abo Rawash">Abo Rawash</option>
                                            <option value="ABOU SOMBO">ABOU SOMBO</option>
                                            <option value="Abu Zaabal">Abu Zaabal</option>
                                            <option value="Agouza">Agouza</option>
                                            <option value="Ain Shams">Ain Shams</option>
                                            <option value="Al Arish">Al Arish</option>
                                            <option value="Al Haram">Al Haram</option>
                                            <option value="Al Mahala">Al Mahala</option>
                                            <option value="Al Marg">Al Marg</option>
                                            <option value="Al Matarya">Al Matarya</option>
                                            <option value="Al Menofiah">Al Menofiah</option>
                                            <option value="Al Monib">Al Monib</option>
                                            <option value="Al Nobariah">Al Nobariah</option>
                                            <option value="Al Obour City">Al Obour City</option>
                                            <option value="AL Qanater">AL Qanater</option>
                                            <option value="Al Tour City">Al Tour City</option>
                                            <option value="Al Wahat">Al Wahat</option>
                                            <option value="Al Waraq">Al Waraq</option>
                                            <option value="Alex Desert Rd.">Alex Desert Rd.</option>
                                            <option value="Alexandria">Alexandria</option>
                                            <option value="Assiut">Assiut</option>
                                            <option value="Aswan">Aswan</option>
                                            <option value="Atfeah">Atfeah</option>
                                            <option value="Attaba">Attaba</option>
                                            <option value="Awaied-Ras Souda">Awaied-Ras Souda</option>
                                            <option value="Badr City">Badr City</option>
                                            <option value="Badrashin">Badrashin</option>
                                            <option value="Bahtem">Bahtem</option>
                                            <option value="Bani Swif">Bani Swif</option>
                                            <option value="Bargiel">Bargiel</option>
                                            <option value="Beigam">Beigam</option>
                                            <option value="Belbis">Belbis</option>
                                            <option value="Belqas">Belqas</option>
                                            <option value="Benha">Benha</option>
                                            <option value="Berkeit Sabb">Berkeit Sabb</option>
                                            <option value="Bolak El Dakrour">Bolak El Dakrour</option>
                                            <option value="Borg Al Arab City">Borg Al Arab City</option>
                                            <option value="Cairo Suez Desert Rd">Cairo Suez Desert Rd</option>
                                            <option value="Cornish El Nile">Cornish El Nile</option>
                                            <option value="Dahab City">Dahab City</option>
                                            <option value="Dahshour">Dahshour</option>
                                            <option value="Damanhour">Damanhour</option>
                                            <option value="Dar El Salam">Dar El Salam</option>
                                            <option value="Desouk">Desouk</option>
                                            <option value="Dokki">Dokki</option>
                                            <option value="Down Town">Down Town</option>
                                            <option value="Dumiatta">Dumiatta</option>
                                            <option value="Ein Al Sukhna">Ein Al Sukhna</option>
                                            <option value="El Ayat">El Ayat</option>
                                            <option value="EL GOUNA">EL GOUNA</option>
                                            <option value="El Hawamdiahs">El Hawamdiahs</option>
                                            <option value="EL Korimat">EL Korimat</option>
                                            <option value="El Maadi">El Maadi</option>
                                            <option value="El Marg">El Marg</option>
                                            <option value="El Qantara Sharq">El Qantara Sharq</option>
                                            <option value="EL rehab">EL rehab</option>
                                            <option value="El Saf">El Saf</option>
                                            <option value="El Salam City">El Salam City</option>
                                            <option value="EL SAWAH">EL SAWAH</option>
                                            <option value="El Wadi El Gadid">El Wadi El Gadid</option>
                                            <option value="El Zeitoun">El Zeitoun</option>
                                            <option value="Fayid">Fayid</option>
                                            <option value="Fayoum">Fayoum</option>
                                            <option value="Garden City">Garden City</option>
                                            <option value="Ghamrah">Ghamrah</option>
                                            <option value="Giza">Giza</option>
                                            <option value="Hadayek El Qobah">Hadayek El Qobah</option>
                                            <option value="Heliopolis">Heliopolis</option>
                                            <option value="Helwan">Helwan</option>
                                            <option value="High Dam">High Dam</option>
                                            <option value="Hurghada">Hurghada</option>
                                            <option value="Imbaba">Imbaba</option>
                                            <option value="Inshas">Inshas</option>
                                            <option value="Ismailia">Ismailia</option>
                                            <option value="Kafr Al Sheikh">Kafr Al Sheikh</option>
                                            <option value="Kaha">Kaha</option>
                                            <option value="Kasr El Einy">Kasr El Einy</option>
                                            <option value="Katamiah">Katamiah</option>
                                            <option value="Khanka">Khanka</option>
                                            <option value="Luxour">Luxour</option>
                                            <option value="Maadi">Maadi</option>
                                            <option value="Manial El Rodah">Manial El Rodah</option>
                                            <option value="Mansheyt Naser">Mansheyt Naser</option>
                                            <option value="Mansoura">Mansoura</option>
                                            <option value="Marabella">Marabella</option>
                                            <option value="Maraqia">Maraqia</option>
                                            <option value="Marinah">Marinah</option>
                                            <option value="Marsa Alam">Marsa Alam</option>
                                            <option value="Marsa Matrouh">Marsa Matrouh</option>
                                            <option value="Meet Ghamr">Meet Ghamr</option>
                                            <option value="Menia City">Menia City</option>
                                            <option value="Mohandiseen">Mohandiseen</option>
                                            <option value="Mokattam">Mokattam</option>
                                            <option value="Moustorod">Moustorod</option>
                                            <option value="Nag Hamadi">Nag Hamadi</option>
                                            <option value="Nasr City">Nasr City</option>
                                            <option value="New Salhia">New Salhia</option>
                                            <option value="Nuwibaa">Nuwibaa</option>
                                            <option value="October City">October City</option>
                                            <option value="Omranya">Omranya</option>
                                            <option value="Port Said">Port Said</option>
                                            <option value="Qalioub">Qalioub</option>
                                            <option value="Qaliubia">Qaliubia</option>
                                            <option value="Qena">Qena</option>
                                            <option value="Quesna">Quesna</option>
                                            <option value="Rafah">Rafah</option>
                                            <option value="Ramsis">Ramsis</option>
                                            <option value="RAS GHAREB">Ramsis</option>
                                            <option value="Ras Seidr">Ras Seidr</option>
                                            <option value="Ras Shoqeir">Ras Shoqeir</option>
                                            <option value="Sadat City">Sadat City</option>
                                            <option value="Saqara">Saqara</option>
                                            <option value="Sedi Kreir">Sedi Kreir</option>
                                            <option value="Sharm El Sheikh">Sharm El Sheikh</option>
                                            <option value="Shebin El Koum">Shebin El Koum</option>
                                            <option value="Shubra">Shubra</option>
                                            <option value="Shubra El Kheima">Shubra El Kheima</option>
                                            <option value="Siwa">Siwa</option>
                                            <option value="sohag City">sohag City</option>
                                            <option value="Suez">Suez</option>
                                            <option value="Taba City">Taba City</option>
                                            <option value="Tanta">Tanta</option>
                                            <option value="Tebin">Tebin</option>
                                            <option value="Torah">Torah</option>
                                            <option value="Toshka">Toshka</option>
                                            <option value="Wadi El Natroun">Wadi El Natroun</option>
                                            <option value="Zakazik">Zakazik</option>
                                            <option value="Zamalek">Zamalek</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" name="Generate" style="float: right;"  value="تحويل" <?php if($_SESSION['type']=='viewer') {echo'disabled';}?>>
                                    </div>
                                </form>
                            </div>
                        <!-- /.card-body -->
                    </div>
            </div>
        </div>

    </section>
    <?php if(isset($TotalPrice)){ ?>
    <section class="content" ID='print'>
  <div class="container">
        <div class="row mb-2">
            <div class="col-8" style="align-self: center;">
                <img src="dist\img\Logo.jpg" style="width:250px">
            </div>
            <div class="col-4">
            <img id="barcode1"/>
		<script>JsBarcode("#barcode1", "<?php echo $OID;?>",{ height: 20});</script>
            </div>
        </div>
        <style>
        p{
            margin: 0;
        }</style>
        <div class="row mb-2">
            <div class="col-6" style="border: 5px;border-style: groove;">
                <div class="row mb-2" style="justify-content: center;border-bottom: double"> 
                        <h4 style="color: #e81f25; font-weight:bold;">Sender</h4>
                </div>
                <div class="row mb-2">
                    <div class="col-3">
                            <p>Shipper :</p>
                    </div>
                    <div class="col-6" style="font-weight: bold;">
                            <p>WWW.Shaheen.Center</p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3">
                            <p>Legal Name :</p>
                    </div>
                    <div class="col-6" style="font-weight: bold;">
                            <p>New El Shaheen.</p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3">
                            <p>Street Address :</p>
                    </div>
                    <div class="col-6" style="font-weight: bold;">
                            <p>Nazalat Al-Assi Mariouteya, Giza.</p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3">
                            <p>City :</p>
                    </div>
                    <div class="col-6" style="font-weight: bold;">
                            <p>Al Haram</p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3">
                            <p>Country :</p>
                    </div>
                    <div class="col-6" style="font-weight: bold;">
                            <p>Egypt.</p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3">
                            <p>Hotline Tel :</p>
                    </div>
                    <div class="col-6" style="font-weight: bold;">
                            <p>16291</p>
                    </div>
                </div>
            </div>
            <div class="col-6" style="border: 5px;border-style: groove;">
                <div class="row mb-2" style="justify-content: center;border-bottom: double">
                    <h4 style="color: #e81f25; font-weight:bold;">Receiver</h4>
                </div>
                <div class="row mb-2">
                    <div class="col-3">
                            <p>Type :</p>
                    </div>
                    <div class="col-6" style="font-weight: bold;">
                            <p>Customer</p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3">
                            <p>Name :</p>
                    </div>
                    <div class="col-6" style="font-weight: bold;">
                            <p><?php echo $CName; ?></p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3">
                            <p>Street Address :</p>
                    </div>
                    <div class="col-6" style="font-weight: bold;">
                            <p><?php echo $Location; ?></p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3">
                            <p>City :</p>
                    </div>
                    <div class="col-6" style="font-weight: bold;">
                            <p><?php echo $City; ?></p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3">
                            <p>Governorate :</p>
                    </div>
                    <div class="col-6" style="font-weight: bold;">
                            <p><?php echo $Governorate; ?></p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3">
                            <p>Phone1 :</p>
                    </div>
                    <div class="col-6" style="font-weight: bold;">
                            <p><?php echo $Phone; ?></p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3">
                            <p>Phone2 :</p>
                    </div>
                    <div class="col-6" style="font-weight: bold;">
                            <p><?php echo $Phone2; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-12" style="border: 5px;border-style: groove;">
                <div class="row mb-2" style="justify-content: center;border-bottom: double"> 
                        <h4 style="color: #e81f25; font-weight:bold;">Delegate Info</h4>
                </div>
                <div class="row mb-2">
                    <div class="col-1">
                    <p>Name:</p>
                    </div>
                    <div class="col-2">
                    <p style="font-weight: bold;"><?php echo $_POST['Delegate']; ?></p> 
                    </div>
                    <div class="col-1">
                    <p>Phone:</p> 
                    </div>
                    <div class="col-3">
                    <p style="font-weight: bold;">01001848528</p> 
                    </div>
                    <div class="col-2">
                    <p>received date:</p> 
                    </div>
                    <div class="col-2">
                    <p style="font-weight: bold;"><?php echo $CreatedDate; ?></p> 
                    </div>
                </div>
                <div class="row mb-2" style="text-align: center;">
                    <div class="col-6">
                    <p>:التوقيع</p>
                    </div>
                    <div class="col-6">
                    <p>:البصمة</p>
                    </div>
                    <div class="col-6">
                    <p>-----------------</p> 
                    </div>
                    <div class="col-6" style="text-align: -webkit-center;">
                    <div style="width: 80px;height: 50px;border: double;">
                        
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-12" style="border: 5px;border-style: groove;">
                <div class="row mb-2" style="justify-content: center;border-bottom: double"> 
                        <h4 style="color: #e81f25; font-weight:bold;">Bill</h4>
                </div>
                <div class="row mb-2">
                    <div class="col-12">
                        <table style="width:100%;text-align: center;">
                            <thead>
                                <th>
                                    ID
                                </th>
                                <th>
                                    Product
                                </th>
                                <th>
                                    Count
                                </th>
                                <th>
                                    Price
                                </th>
                                <th>
                                    Total
                                </th>
                            </thead>
                            <tbody>
                            <?php while($row = $rowOD->fetch_assoc()){ ?>
                                <tr>
                                    <td>
                                    <?php
                                   $PCode = Products::ViewSingleProduct($row['PID'])->fetch_assoc()['Photo'];
                                   echo substr($PCode, 0, 8);
                                     ?>
                                    </td>
                                    <td>
                                    <?php echo $row['ArName']; ?>
                                    </td>
                                    <td>
                                    <?php echo $row['Count']; ?>
                                    </td>
                                    <td>
                                    <?php if(isset($row['OPP'])){echo $row['OPP']/$row['Count'];}else{echo $row['PPrice']/$row['Count'];} ?>
                                    </td>
                                    <td>
                                   <?php if(isset($row['OPP'])){echo $row['OPP'];}else{echo $row['PPrice'];}?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row mb-2" style="border-top-style: groove;text-align: center;">
                    <div class="col-2" style="border: groove;border-right: none;border-color: black;">
                        <p>SubTotal :</p>
                    </div>
                    <div class="col-2" style="font-weight: bold;border: groove;border-left: none;border-color: black;">
                        <p><?php echo $SubTotal ?> LE</p>
                    </div>

                    <div class="col-2" style="border: groove;border-right: none;border-color: black;">
                        <p>Shipping :</p>
                    </div>
                    <div class="col-2" style="font-weight: bold;border: groove;border-left: none;border-color: black;">
                        <p><?php echo $Shipping; ?> LE</p>
                    </div>

                    <div class="col-2" style="border: groove;border-right: none;border-color: black;">
                        <p>Total :</p>
                    </div>
                    <div class="col-2" style="font-weight: bold;border: groove;border-left: none;border-color: black;">
                        <p><?php echo $TotalPrice; ?> LE</p>
                    </div>

                </div>
                <div class="row mb-2" style="text-align: center;">
                    <div class="col-12">
                    <p> Payment:</p>
                    </div>
                </div>
                <div class="row mb-2" style="text-align: center;">
                    <div class="col-3">
                    <p>Cash</p>
                    </div>
                    <div class="col-3">
                    <p>Prepaied</p>
                    </div>
                    <div class="col-3">
                    <p>Retrieval</p>
                    </div>
                    <div class="col-3">
                    <p>Replacement</p>
                    </div>
                </div>
                <div class="row mb-2" style="text-align: center;">
                    <div class="col-3">
                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" style="height:25px;width:25px;" <?php if($_POST['Payment']=='Cash'){echo "checked";}  ?>>
                    </div>
                    <div class="col-3">
                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" style="height:25px;width:25px;">
                    </div>
                    <div class="col-3">
                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" style="height:25px;width:25px;">
                    </div>
                    <div class="col-3">
                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" style="height:25px;width:25px;">
                    </div>
                </div>
                <div class="row mb-2" style="text-align: center;">
                    <div class="col-12">
                    <p>Note</p>
                    </div>
                    <div class="col-12">
                    <p> <?php echo $Note; ?> <p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-6" style="border: 5px;border-style: groove;">
                <div class="row mb-2" style="justify-content: center;border-bottom: double">
                    <h4 style="color: #e81f25; font-weight:bold;"></h4>
                </div>
                <div class="row mb-2" style="text-align: center;direction: rtl">
                    <div class="col-6">
                            <p>توقيع مدير المخزن:</p>
                    </div>
                    <div class="col-6">
                            <p>توقيع ادارة الأمن :</p>
                    </div>
                </div>
                <div class="row mb-2" style="text-align: center;direction: rtl">
                    <div class="col-6">
                            <p>----------------------</p>
                    </div>
                    <div class="col-6">
                            <p>----------------------</p>
                    </div>
                </div>
            </div>
            <div class="col-6" style="border: 5px;border-style: groove;">
                <div class="row mb-2" style="justify-content: center;border-bottom: double"> 
                        <h4 style="color: #e81f25; font-weight:bold;">إقرار استلام</h4>
                </div>
                <div class="row mb-2">
                    <div class="col-12" style="text-align: center;direction: rtl;">
                            <h5>اقر انا الموقع أدناه إستلامي للشحنة في وضع جيد و سليم و كاملة كما موضح في بوليصة الشحن.</h5>
                    </div>
                </div>
                <div class="row mb-2" style="text-align: center;direction: rtl">
                    <div class="col-6">
                            <p>توقيع العميل بالإستلام:</p>
                    </div>
                    <div class="col-6">
                            <p>التاريخ:</p>
                    </div>
                </div>
                <div class="row mb-2" style="text-align: center;direction: rtl">
                    <div class="col-6">
                            <p>----------------------</p>
                    </div>
                    <div class="col-6" style="font-weight: bold;">
                            <p>__ / __ / ____<p>
                    </div>
                </div>
            </div>
            <div class="col-12" style="border: 5px;border-style: groove;">
                <div class="row mb-2" style="justify-content: center;border-bottom: double"> 
                        <h4 style="color: #e81f25; font-weight:bold;"></h4>
                </div>
                <div class="row mb-2">
                    <div class="col-12" style="text-align: center;direction: rtl;">
                            <h5>أفضل تجربة تسوق أونلاين</h5>
                            <h5>تسوق - إختر - إستلم</h5>
                            <img src="dist\img\Logo.jpg" style="width:150px;">
                    </div>
                </div>
            </div>
        </div>
  </div>
  </section>
  <input style="padding:5px;" value="Print Document" type="button" onclick="PrintElem()" class="button"></input>
  <script>
		function PrintElem(){
			var printContents = document.getElementById("print").innerHTML;
			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;

			window.print();

			document.body.innerHTML = originalContents;

		}
	</script>
  <?php  } ?>

    <!-- /.content -->
</div>







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

    $(function () {
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
