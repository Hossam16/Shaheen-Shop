<?php
include 'config.php';
include "StartSession.php";

// Order Data
$orderID = $_GET['orderID'];
$orderAmount = "0.00";
$orderCurrency = "EGP";
$orderData = "";

$connO = new config();
$sqlO = "SELECT orders.TotalPrice, products.ArName, products.ID AS PID,products.Photo AS Code, orders.Location FROM orders INNER JOIN orderdata on orderdata.OID=orders.ID INNER JOIN products on products.ID=orderdata.PID WHERE orders.id=$orderID";
$resultO = $connO->datacon()->query($sqlO);
while ($rowO = $resultO->fetch_assoc()) {
    $orderAmount = $rowO['TotalPrice'];
    $orderData = $orderData . $rowO['Code'];
    $address = $rowO['Location'];
}




// Merchant Data
$merchantName = "Shaheen Center";
$merchantID = "SHAHENCENTER";
$apiUsername = "merchant.$merchantID";
$apiPassword = "2dd3e299ea7bf5fd58e75a273924b270";
$url = "https://nbe.gateway.mastercard.com";
$returnUrl = "http://localhost/shaheenlocal/bank/final.php";


$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://nbe.gateway.mastercard.com/api/rest/version/56/merchant/SHAHENCENTER/session',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_HTTPHEADER => array(
        'Authorization: Basic bWVyY2hhbnQuU0hBSEVOQ0VOVEVSOjJkZDNlMjk5ZWE3YmY1ZmQ1OGU3NWEyNzM5MjRiMjcw'
    ),
));
$response = curl_exec($curl);
curl_close($curl);
$response = json_decode($response);
$SESSIONIDO = $response->session->id;

?>


<html>

<head>
    <script src="<?php echo $url; ?>/checkout/version/56/checkout.js" data-error="errorCallback" data-cancel="cancelCallback" data-complete="https://shaheen.center">
    </script>

    <script type="text/javascript">
        function errorCallback(error) {
            console.log(JSON.stringify(error));
        }

        function cancelCallback() {
            console.log('Payment cancelled');
        }

        Checkout.configure({
            merchant: '<?php echo $merchantID; ?>',
            order: {
                amount: function() {
                    //Dynamic calculation of amount
                    return <?php echo $orderAmount ?>;
                },
                currency: 'EGP',
                description: 'أدوات منزلية و كهربائية و مفروشات',
                id: '<?php echo $orderID; ?>'
            },
            session: {
                id: '<?php echo $SESSIONIDO ?>'
            },
            interaction: {
                operation: 'PURCHASE', // set this field to 'PURCHASE' for Hosted Checkout to perform a Pay Operation.
                merchant: {
                    name: 'Shaheen Center',
                    address: {
                        line1: '<?php echo $address; ?>',
                        line2: ''
                    }
                }
            }
        });
    </script>
    <script>
        Checkout.showLightbox();
    </script>
</head>

<body>
</body>

</html>