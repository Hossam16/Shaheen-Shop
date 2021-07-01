<?php include "../config.php";?>
<?php
    header('Content-Type: application/json');

    $aResult = array();

    if( !isset($_POST['functionname']) ) { $aResult['error'] = 'No function name!'; }

    if( !isset($_POST['arguments']) ) { $aResult['error'] = 'No function arguments!'; }

    if( !isset($aResult['error']) ) {

        switch($_POST['functionname']) {
            case 'add':
               if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 4) ) {
                   $aResult['error'] = 'Error in arguments!';
               }
               else {
                   $aResult['result'] = add(floatval($_POST['arguments'][0]), floatval($_POST['arguments'][1]),floatval($_POST['arguments'][2]),floatval($_POST['arguments'][3]),floatval($_POST['arguments'][4]));
               }
               break;
               case 'changeWebODP':
                if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 4) ) {
                    $aResult['error'] = 'Error in arguments!';
                }
                else {
                    $aResult['result'] = changeWebODP(floatval($_POST['arguments'][0]),floatval($_POST['arguments'][1]) ,floatval($_POST['arguments'][2]),floatval($_POST['arguments'][3]),floatval($_POST['arguments'][4]));
                }
                break;
               case 'UpdateStatus':
                if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 2) ) {
                    $aResult['error'] = 'Error in arguments!';
                }
                else {
                    $aResult['result'] = UpdateStatus(($_POST['arguments'][0]), floatval($_POST['arguments'][1]),($_POST['arguments'][2]));
                }
                break;
               case 'UpdateStatusWeb':
                if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 2) ) {
                    $aResult['error'] = 'Error in arguments!';
                }
                else {
                    $aResult['result'] = UpdateStatusWeb(($_POST['arguments'][0]), floatval($_POST['arguments'][1]),($_POST['arguments'][2]));
                }
                break;
               case 'UpdateOrderDataCallStatus':
                if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 2) ) {
                    $aResult['error'] = 'Error in arguments!';
                }
                else {
                    $aResult['result'] = UpdateOrderDataCallStatus(($_POST['arguments'][0]),($_POST['arguments'][1]),floatval($_POST['arguments'][2]));
                }
                break;
                case 'UpdateOrderCallStatus':
                    if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 2) ) {
                        $aResult['error'] = 'Error in arguments!';
                    }
                    else {
                        $aResult['result'] = UpdateOrderCallStatus(($_POST['arguments'][0]),floatval($_POST['arguments'][1]));
                    }
                    break;
                    case 'UpdateOrderCallStatusWeb':
                        if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 2) ) {
                            $aResult['error'] = 'Error in arguments!';
                        }
                        else {
                            $aResult['result'] = UpdateOrderCallStatusWeb(($_POST['arguments'][0]),floatval($_POST['arguments'][1]));
                        }
                        break;
                case 'UpdateOrderDataWebStatus':
                    if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 2) ) {
                        $aResult['error'] = 'Error in arguments!';
                    }
                    else {
                        $aResult['result'] = UpdateOrderDataWebStatus(($_POST['arguments'][0]),($_POST['arguments'][1]),floatval($_POST['arguments'][2]));
                    }
                    break;

            default:
               $aResult['error'] = 'Not found function '.$_POST['functionname'].'!';
               break;
        }

    }

    function changeWebODP($NewPPrice,$PCount,$itemID,$OID,$shipping)
    {
     return(Orderdata::changeWebODP($NewPPrice,$PCount,$itemID,$OID,$shipping));
    }
    function add($NewPPrice,$itemID,$OID,$shipping,$ODC)
    {
     return(Orderdata::EditPPInOD($NewPPrice,$itemID,$OID,$shipping,$ODC));
    }
function UpdateStatus($NewStatus,$OrderID,$CancelNote)
    {
     return(Order::CahngeStatus($OrderID,$NewStatus,$CancelNote));
    }
function UpdateStatusWeb($NewStatus,$OrderID,$CancelNote)
    {
     return(Order::CahngeStatusWeb($OrderID,$NewStatus,$CancelNote));
    }
function UpdateOrderDataCallStatus($orderDataStatus,$NewAlternative,$OrderDataID)
    {
     return(OrderData::changeAvailability($orderDataStatus,$NewAlternative,$OrderDataID));
    }
    function UpdateOrderCallStatus($orderDataStatus,$OrderID)
    {
     return(Order::CahngeStatus($OrderID,$orderDataStatus,NULL));
    }
    function UpdateOrderCallStatusWeb($orderDataStatus,$OrderID)
    {
     return(Order::CahngeStatusWeb($OrderID,$orderDataStatus,NULL));
    }
function UpdateOrderDataWebStatus($orderDataStatus,$Alternative,$OrderDataID)
    {
     return(OrderData::changeWebAvailability($orderDataStatus,$Alternative,$OrderDataID));
    }

    echo json_encode($aResult);

?>
