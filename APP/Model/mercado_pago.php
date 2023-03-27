<?php
ob_start();
session_start();
error_reporting(E_ALL & ~E_NOTICE);

require_once './vendor/autoload.php';
require_once('./Model/header.php');
require_once('./DAO/database.php');
MercadoPago\SDK::setAccessToken($mercado_pago_key);

function mp_create_link($titulo, $preco, $descricao,$costumer_id, $seller_id, $product_id){
    $payment = new MercadoPago\Preference();
  
    $item = new MercadoPago\Item();
    $item->title = $titulo;
    $item->quantity = 1;
    $item->unit_price = $preco;
    $item->description = $descricao;
    $payment->items = array($item);

    $payment->auto_return = "approved";

    $payment->back_urls = array(
        "success"=> 'https://n3rdydesigner.xyz/payment?costumer_id='.$costumer_id.'&seller_id='.$seller_id.'&product_id='.$product_id,
        "pending"=> 'https://n3rdydesigner.xyz/payment?costumer_id='.$costumer_id.'&seller_id='.$seller_id.'&product_id='.$product_id,
        "failure"=> 'https://n3rdydesigner.xyz/payment?costumer_id='.$costumer_id.'&seller_id='.$seller_id.'&product_id='.$product_id
    );


    $payment->notification_url = 'https://n3rdydesigner.xyz/payment';

    $payment->external_reference = "";
    
    $payment->save();


    $payment_id = ($payment->id);
    $payment_link = ($payment->init_point);


    return $payment_link;

// $preference = new MercadoPago\Preference();

// $item = new MercadoPago\Item();
// $item->title = $titulo;
// $item->quantity = $quantidade;
// $item->unit_price = $preco;
// $preference->items = array($item);

// $preference->external_reference = 'EXTERNAL_REFERENCE';

// $preference->payment_methods = array(
//     "excluded_payment_types" => array(
//         array("id" => "ticket"),
//         array("id" => "atm"),
//         array("id" => "debit_card"),
//     ),
// );

// $preference->back_urls = array(
//     "success"=> 'https://localhost/sucesso',
//     "failure"=> 'https://localhost/falho',
//     "pending"=> 'https://localhost/pendente'
// );

// $preference->notification_url = 'https://localhost/notificacao';
// $preference->save();

// return $preference->init_point;
}




?>


