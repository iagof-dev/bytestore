<?php
ob_start();
session_start();
error_reporting(E_ALL & ~E_NOTICE);
require ('./vendor/autoload.php');
require('./DAO/database.php');

MercadoPago\SDK::setAccessToken($mercado_pago_key);


$status = $_GET['collection_status'];
$collection_id = $_GET['collection_id'];
$costumer_id = $_GET['costumer_id'];
$seller_id = $_GET['seller_id'];
$product_id = $_GET['product_id'];



echo($collection_id);

// $seller_id = 0;
// $costumer_id = 0;
//$collection_id = "56180805168";

$url = 'https://api.mercadopago.com/v1/payments/'.$collection_id;
$authorization_header = 'Authorization: Bearer '. $mercado_pago_key;
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_HTTPHEADER, array($authorization_header)); // Define o cabeçalho de autorização
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Retorna o resultado em vez de exibir na tela
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // Desabilita a verificação SSL
$response = curl_exec($curl);

if(curl_errno($curl)) {
    echo 'Erro ao enviar a solicitação: ' . curl_error($curl);
}

curl_close($curl);


$result = json_decode($response, true);

// echo('Payment ID: '. $result['id']. '<br>');
// echo('Value Paid: '.$result['additional_info']['items']['0']['unit_price'].'<br>');
// echo('Payment Status: '.$result['status_detail'].'<br>');
// echo('Payment Method: '.$result['payment_method_id'].'<br>');
// echo('Costumer ID: '.$costumer_id.'<br>');
// echo('Costumer Bank: '.$result['point_of_interaction']['transaction_data']['bank_info']['payer']['long_name'].'<br>');
// echo('Seller ID: '.$seller_id.'<br>');
// echo('Costumer Identification: '.$result['payer']['identification']['number'].'<br>');
// echo('Costumer ID Type: '.$result['payer']['identification']['type'].'<br>');
// echo('Payment Approved Date: '.$result['date_approved'].'<br>');



$coco = MercadoPago\Payment::find_by_id($collection_id);

try{

    //enviar_comando("insert into payments values(default, '0', '". $collection_id ."', '". $coco->payment_method_id ."', '". $coco->total_paid_amount ."', '". $coco->status ."', null, '". $_GET["costumer_id"] ."', '" .  . "', '0', '0', '0');");
    enviar_comando("insert into payments values (default, '". $product_id ."' ,'". $collection_id ."', '". $result['payment_method_id'] ."', '". $result['transaction_details']['total_paid_amount'] ."',  '". $result['status_detail'] ."', null, '". $costumer_id ."' , '". $result['payer']['identification']['number'] ."', '". $result['point_of_interaction']['transaction_data']['bank_info']['payer']['long_name'] ."', '". $result['payer']['email'] ."', '". $seller_id ."')");

}
catch(Exception $e){
    echo($e);
}

//enviar_comando("insert into payments values (default, '". $product_id ."' ,'". $collection_id ."', '". $result['payment_method_id'] ."', '". $result['transaction_details']['total_paid_amount'] ."',  '". $result['status_detail'] ."', null, '". $costumer_id ."' , '". $result['payer']['identification']['number'] ."', '". $result['point_of_interaction']['transaction_data']['bank_info']['payer']['long_name'] ."', '". $result['payer']['email'] ."', '". $seller_id ."')");


// $caminho = "./Model/";
// $nome_arquivo = "payment_log.n3rdy";

// $texto = ('PAYMENT: '. $collection_id .' | '. $response);
// $caminho_completo = $caminho . $nome_arquivo;
// $arquivo = fopen($caminho_completo, "w");
// fwrite($arquivo, $texto);
// fclose($arquivo);


?>

<script>
window.location.href = "/admin";
</script>

<body>

</body>

</html>
