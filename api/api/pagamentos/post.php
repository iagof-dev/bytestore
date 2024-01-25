<?php
// if (empty($_POST)) {
//     echo (json_encode(["status" => "error", "message" => "Nenhum argumento foi passado"]));
//     exit(0);
// }

include_once(__DIR__. "/../../classes/mercado_pago.php");
$com = "";
$message = "";
$mp = new MercadoPago();


switch ($action) {
    case "criar":

        $id_gateway;
        $product_title;
        $customer_email;
        $value;


        foreach ($_POST as $key => $value) {
            if($key == 'id_gateway')
                $id_gateway = $value;
            if($key == 'product_title')
                $product_title = $value;
            if($key == 'customer_email')
                $customer_email = $value;
            if($key == 'value')
                $value = $value;
            //echo($key . "=". $value. "\n");
        }
      
        $result = $mp->CreatePix($id_gateway, $product_title, $customer_email, $value);

        echo(json_encode(["status" => "success", "message" => $result['message'], "values" => ["url" => $result['point_of_interaction']['transaction_data']['ticket_url'], "copia_e_cola" => $result['point_of_interaction']['transaction_data']['qr_code'],"qr_code" => $result['point_of_interaction']['transaction_data']['qr_code_base64']]]));
        return;
        break;

}


// try {
//     $rs = $db->prepare($com);
//     $rs->execute();
//     $numRowsAffected = $rs->rowCount();
//     if ($numRowsAffected > 0) {
//         if($message != ""){
//             echo json_encode(["status" => "success", "message" => $message]);
//             exit();
//         }
//         echo json_encode(["status" => "success", "message" => $rs->fetchAll(PDO::FETCH_ASSOC)]);
//     } else {
//         echo json_encode(["status" => "error", "message" => "Nenhuma alteração foi feita"]);
//     }
// } catch (Exception $ex) {
//     echo json_encode(["status" => "error", "message" => $ex]);
// }
