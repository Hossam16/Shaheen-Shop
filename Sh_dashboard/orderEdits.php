<?php include "../config.php"; ?>
<?php
header('Content-Type: application/json');

$aResult = array();

if (!isset($_POST['functionname'])) {
    $aResult['error'] = 'No function name!';
}

if (!isset($_POST['arguments'])) {
    $aResult['error'] = 'No function arguments!';
}

if (!isset($aResult['error'])) {

    switch ($_POST['functionname']) {
        case 'add':
            if (!is_array($_POST['arguments']) || (count($_POST['arguments']) < 2)) {
                $aResult['error'] = 'Error in arguments!';
            } else {
                $aResult['result'] = add(floatval($_POST['arguments'][0]), floatval($_POST['arguments'][1]), floatval($_POST['arguments'][2]));
            }
            break;
        case 'UpdateStatus':
            if (!is_array($_POST['arguments']) || (count($_POST['arguments']) < 2)) {
                $aResult['error'] = 'Error in arguments!';
            } else {
                $aResult['result'] = UpdateStatus(($_POST['arguments'][0]), floatval($_POST['arguments'][1]), ($_POST['arguments'][2]));
            }
            break;
        case 'UpdateStatusWeb':
            if (!is_array($_POST['arguments']) || (count($_POST['arguments']) < 3)) {
                $aResult['error'] = 'Error in arguments!';
            } else {
                $aResult['result'] = UpdateStatusWeb(($_POST['arguments'][0]), floatval($_POST['arguments'][1]), ($_POST['arguments'][2]),floatval($_POST['arguments'][3]));
            }
            break;

        default:
            $aResult['error'] = 'Not found function ' . $_POST['functionname'] . '!';
            break;
    }
}

function add($NewPPrice, $itemID, $OID)
{
    // return (Orderdata::EditPPInOD($NewPPrice, $itemID, $OID));
}
function UpdateStatus($NewStatus, $OrderID, $CancelNote)
{
    return (Order::CahngeStatus($OrderID, $NewStatus, $CancelNote));
}
function UpdateStatusWeb($NewStatus, $OrderID, $CancelNote, $Admin)
{
    return (Order::CahngeStatusWeb($OrderID, $NewStatus, $CancelNote,$Admin));
}

echo json_encode($aResult);

?>
