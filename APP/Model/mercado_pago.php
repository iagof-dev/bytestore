<?php
ob_start();
session_start();
error_reporting(E_ALL & ~E_NOTICE);

require_once './vendor/autoload.php';
require_once('./Model/header.php');
MercadoPago\SDK::setAccessToken($mercado_pago_key);

function mp_create_link($titulo, $quantidade, $preco){

$preference = new MercadoPago\Preference();

$item = new MercadoPago\Item();
$item->title = $titulo;
$item->quantity = $quantidade;
$item->unit_price = $preco;
$preference->items = array($item);

$preference->external_reference = 'EXTERNAL_REFERENCE';

$preference->payment_methods = array(
    "excluded_payment_types" => array(
        array("id" => "ticket"),
        array("id" => "atm"),
        array("id" => "debit_card"),
    ),
);

$preference->back_urls = array(
    "success"=> 'https://localhost/sucesso',
    "failure"=> 'https://localhost/falho',
    "pending"=> 'https://localhost/pendente'
);

$preference->notification_url = 'https://localhost/notificacao';
$preference->save();

return $preference->init_point;
}


?>

