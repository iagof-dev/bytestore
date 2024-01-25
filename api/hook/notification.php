<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include_once(__DIR__ . "/../classes/mercado_pago.php");
include_once(__DIR__ . "/../classes/db.php");

$database_cl = new DB();
$db = $database_cl->connect("bytestore");
$com = "";
$mp = new MercadoPago();
$id = 0;

$json_data = file_get_contents('php://input');
$data = json_decode($json_data, true);
if ($data !== null) {
  $id = $data['data']['id'];
}

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.mercadopago.com/v1/payments/'.$id,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization: Bearer '. $mp->secret_token
  ),
));

$response = curl_exec($curl);
curl_close($curl);


$values = json_decode($response, true);

if(!isset($values['status'])){
  echo(json_encode(['status' => 'error', 'message' => 'Status não encontrado.']));
  exit();
}
if(!isset($values['external_reference'])){
  echo(json_encode(['status' => 'error', 'message' => 'external_reference não encontrado.']));
  exit();
}


//echo(var_dump($values));

$com = "update bytestore.gateways set status='". $values['status'] ."' where id='". $values['external_reference'] ."';";
//echo($com);



try {
  $rs = $db->prepare($com);
  $rs->execute();
  $numRowsAffected = $rs->rowCount();
  if ($numRowsAffected > 0) {
    if ($message != "") {
      echo $message;
      exit();
    }
    echo json_encode(["status" => "success", "message" => $rs->fetchAll(PDO::FETCH_ASSOC)]);
  } else {
    echo json_encode(["status" => "error", "message" => "Nenhuma alteração foi feita"]);
  }
} catch (Exception $ex) {
  echo json_encode(["status" => "error", "message" => $ex]);
}
