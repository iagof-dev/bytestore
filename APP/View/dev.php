<?php 
ob_start();
session_start();
error_reporting(E_ALL & ~E_NOTICE);

require_once ('./vendor/autoload.php');
require_once('./Model/header.php');
require_once('./DAO/database.php');

MercadoPago\SDK::setAccessToken($mercado_pago_key);

//$payment_id = "56174212270";

    
$payment_id = "1313596589";
$payment = MercadoPago\Payment::find_by_id($payment_id);

echo("Payment Status: ". $payment->status.'<br>'.
'Payment ID: '. $payment->id. '<br>'.
'Payment Method: '. $payment->payment_method_id. '<br>'.
'Date of Payment: '. $payment->date_approved. '<br>');
debug_to_console("ta aq");
?>
