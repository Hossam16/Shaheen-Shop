<?php include "config.php"?>
<?php include "Slide.php" ?>
<?php
$orders_xmstock='active';
$orders_ommStock='menu-open';
$product_alppppl='active';
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
if(isset($_POST['generate']))
{
  $area = $_POST['area'];
  $rowO = Order::ViewSingleOrders($_POST['OID']);
  $rowO = $rowO->fetch_assoc();
  $rowOD = Orderdata::ViewOrderdata($rowO['ID']);
  $productss='';
  $count = 0;
  while($row = $rowOD->fetch_assoc())
  {
    $count = $row['Count'] + $count;

    $pro = Products::ViewSingleProduct($row['PID']);
    $ArName = $pro->fetch_assoc()['ArName'];
    $productss =$productss . '(' . $row['Count']. ')' . $ArName . '........';
  }

  error_reporting(E_ALL);
  ini_set('display_errors', '1');
  
	$soapClient = new SoapClient('Shipping.wsdl');



	$params = array(
			'Shipments' => array(
				'Shipment' => array(
						'Shipper'	=> array(
										'Reference1' 	=> 'Ref 111111',
										'Reference2' 	=> 'Ref 222222',
										'AccountNumber' => '60508148',
										'PartyAddress'	=> array(
											'Line1'					=> 'Nazalat Al-Assi Mariouteya, Giza',
											'Line2' 				=> '',
											'Line3' 				=> '',
											'City'					=> 'Al Haram',
											'StateOrProvinceCode'	=> '',
											'PostCode'				=> '',
											'CountryCode'			=> 'EG'
										),
										'Contact'		=> array(
											'Department'			=> '',
											'PersonName'			=> 'New El Shaheen',
											'Title'					=> '',
											'CompanyName'			=> 'Shaheen',
											'PhoneNumber1'			=> '19291',
											'PhoneNumber1Ext'		=> '125',
											'PhoneNumber2'			=> '',
											'PhoneNumber2Ext'		=> '',
											'FaxNumber'				=> '',
											'CellPhone'				=> '07777777',
											'EmailAddress'			=> 'michael@aramex.com',
											'Type'					=> ''
										),
						),
												
						'Consignee'	=> array(
                            'Reference1'	=> 'Ref 333333',
                            'Reference2'	=> 'Ref 444444',
                            'AccountNumber' => '',
                            'PartyAddress'	=> array(
                                'Line1'					=> $rowO['Location'],
                                'Line2'					=> '',
                                'Line3'					=> '',
                                'City'					=> $area,
                                'StateOrProvinceCode'	=> '',
                                'PostCode'				=> '',
                                'CountryCode'			=> 'EG'
                            ),
                            
                            'Contact'		=> array(
                                'Department'			=> '',
                                'PersonName'			=> $rowO['CName'],
                                'Title'					=> '',
                                'CompanyName'			=> 'Customer',
                                'PhoneNumber1'			=> $rowO['Phone'],
                                'PhoneNumber1Ext'		=> '',
                                'PhoneNumber2'			=> '',
                                'PhoneNumber2Ext'		=> '',
                                'FaxNumber'				=> '',
                                'CellPhone'				=> $rowO['Phone'],
                                'EmailAddress'			=> 'CallCenter@shaheen.center',
                                'Type'					=> ''
                            ),
            ),
						
						'ThirdParty' => array(
										'Reference1' 	=> '',
										'Reference2' 	=> '',
										'AccountNumber' => '',
										'PartyAddress'	=> array(
											'Line1'					=> '',
											'Line2'					=> '',
											'Line3'					=> '',
											'City'					=> '',
											'StateOrProvinceCode'	=> '',
											'PostCode'				=> '',
											'CountryCode'			=> ''
										),
										'Contact'		=> array(
											'Department'			=> '',
											'PersonName'			=> '',
											'Title'					=> '',
											'CompanyName'			=> '',
											'PhoneNumber1'			=> '',
											'PhoneNumber1Ext'		=> '',
											'PhoneNumber2'			=> '',
											'PhoneNumber2Ext'		=> '',
											'FaxNumber'				=> '',
											'CellPhone'				=> '',
											'EmailAddress'			=> '',
											'Type'					=> ''							
										),
						),
						
						'Reference1' 				=> 'Shpt 0001',
						'Reference2' 				=> '',
						'Reference3' 				=> '',
						'ForeignHAWB'				=> 'Shaheen-' . $rowO['ID'],
						'TransportType'				=> 0,
						'ShippingDateTime' 			=> time(),
						'DueDate'					=> time(),
						'PickupLocation'			=> 'Reception',
						'PickupGUID'				=> '',
						'Comments'					=> 'Shpt 0001',
						'AccountingInstrcutions' 	=> '',
						'OperationsInstructions'	=> '',
						
						'Details' => array(
										'Dimensions' => array(
											'Length'				=> 10,
											'Width'					=> 10,
											'Height'				=> 10,
											'Unit'					=> 'cm',
											
										),
										
										'ActualWeight' => array(
											'Value'					=> 0.5,
											'Unit'					=> 'Kg'
										),
										
										'ProductGroup' 			=> 'DOM',
										'ProductType'			=> 'FTL',
										'PaymentType'			=> 'P',
										'PaymentOptions' 		=> '',
										'Services'				=> '',
										'NumberOfPieces'		=> 1,
										'DescriptionOfGoods' 	=> $productss,
										'GoodsOriginCountry' 	=> 'EG',
										
										'CashOnDeliveryAmount' 	=> array(
											'Value'					=> 0,
											'CurrencyCode'			=> ''
										),
										
										'InsuranceAmount'		=> array(
											'Value'					=> 0,
											'CurrencyCode'			=> ''
										),
										
										'CollectAmount'			=> array(
											'Value'					=> 0,
											'CurrencyCode'			=> ''
										),
										
										'CashAdditionalAmount'	=> array(
											'Value'					=> 0,
											'CurrencyCode'			=> ''							
										),
										
										'CashAdditionalAmountDescription' => '',
										
										'CustomsValueAmount' => array(
											'Value'					=> $rowO['TotalPrice'],
											'CurrencyCode'			=> 'EGP'								
										),
										
										'Items' 				=> array()
						),
				),
		),
		
			'ClientInfo'  			=> array(
										'UserName'=> 'mo.elwany@elshaheencenter.com',
										'Password'=> 'Sh@heenCenter753',
										'Version'=> '1.0',
										'AccountNumber'=> '60508148',
										'AccountPin'=> '165165',
										'AccountEntity'=> 'AMC',
										'AccountCountryCode'=> 'EG',
									),

			'Transaction' 			=> array(
										'Reference1'=> '001',
										'Reference2'=> '', 
										'Reference3'=> '', 
										'Reference4'=> '', 
										'Reference5'=> '',									
									),
			'LabelInfo'				=> array(
										'ReportID' 				=> 9201,
										'ReportType'			=> 'URL',
			),
	);
	
	$params['Shipments']['Shipment']['Details']['Items'][] = array(
		'PackageType' 	=> 'Box',
		'Quantity'		=> 1,
		'Weight'		=> array(
				'Value'		=> 0.5,
				'Unit'		=> 'Kg',		
		),
		'Comments'		=> 'Docs',
		'Reference'		=> ''
	);
	// print_r($params['ClientInfo']);
	try {
    $auth_call = $soapClient->CreateShipments($params);
    $P_No = ($auth_call->Shipments->ProcessedShipment->ID); 
	} catch (SoapFault $fault) {
		die('Error : ' . $fault->faultstring);
  }

$conno=new config();
$OID=$rowO['ID']; 
$sqlll = "INSERT INTO `Aramex`(`OID`, `PNO`) VALUES ('Call$OID',$P_No)";
if ($conno->datacon()->query($sqlll)) {
    } else {
        echo "Error: " . $sqlll . "<br>" . $conno->datacon()->error;
    }	
}
?>




<!DOCTYPE html>
<html>
<?php include"head.php";?>

<body class="hold-transition sidebar-mini layout-fixed" >

<?php include"layout.php";?>

<div class="content-wrapper">

<?php if(isset($P_No)){ ?>
    <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> Alert!</h5>
                  Success <?php echo $P_No; ?>
                </div>
    <?php } ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>طلبيات كول ارامكس</h1>
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
        <div class="row">
            <div class="col-12">
        <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">تحويلات ارامكس</h3>
                    </div>

                   
                    <div class="card-body card-primary">
              <div class="card-header">
                <h3 class="card-title">Aramex</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post">
                <div class="card-body">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">رقم الطلب المراد تحويله</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="OID" placeholder="12345">
                  </div>

                  
                  <label>Minimal</label>
                  <select class="form-control" name="area">
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
                </div>
                <div class="form-group">
                <input type="submit" class="btn btn-primary" name="generate" <?php if($_SESSION['type']=='viewer') {echo'disabled';}?>>
                </div>
              </form>
            </div>

                </div>
                </div>
                <!-- /.card -->
    </section>
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
