<?php
ob_start();
session_start();
error_reporting(0);

require_once('./vendor/autoload.php');
require_once('./Model/header.php');
require_once('./Model/mercado_pago.php');
require_once('./DAO/Database.php');

$mp_key = $mercado_pago_key;


$id = $_GET['id'];
$image = $_GET['img'];
$product_id = $_GET['product_id'];

if (!isset($id)) {
    //não tem id ou não possui permissão para ver os detalhes de compra
    //pois não é o mesmo id de quem comprou
    header('Location: /');
}

//
//REMOVER COMENTÁRIO APÓS CRIAR O UI ↓
//



$information = mp_get_info_payment($id, $mp_key);

//  if (!isset($information[0]) or !isset($information[1]) or !isset($information[2]) or !isset($information[3]) or !isset($information[4]) or !isset($information[5]) or !isset($information[6]) or !isset($information[7]) or !isset($information[8]) or !isset($information[9])) {
//      echo ("Não foi possivel encontrar o pagamento");
//  } else {

//      echo('<img width="10%" src="../Assets/imgs/products/'. $image .'">');
//      echo ('<h5>titulo: ' . $information[0] . '</h5><br>');
//      echo ('<h5>Descrição: ' . $information[1] . '</h5><br>');
//      echo ('<h5>Valor: R$' . $information[2] . '</h5><br>');
//      
//      switch($information[4]){
//         case 'accredited':
//             echo ('<h5 class="text-success">Status: Aprovado </h5><br>');
//             break;
//         case 'approved':
//             echo ('<h5 class="text-success">Status: Aprovado </h5><br>');
//             break;
//         case 'in_process':
//             echo ('<h5 class="text-warning">Status: Em processamento </h5><br>');
//             break;
//         case 'rejected':
//             echo ('<h5 class="text-danger">Status: Recusado </h5><br>');
//             break;

//      }
//      echo ('<h5>Nome inserido no pagamento: ' . $information[5] . '</h5><br>');
//      echo ('<h5>Expiração do Cartão: ' . $information[6] . '/'. $information[7] .'</h5><br>');
//      echo ('<h5>Ultimos digitos do cartão: ' . $information[8] . '</h5><br>');
//      echo ('<h5>CPF inserido no pagamento: ' . $information[9] . '</h5><br>');
//      echo ('<h5>Data e hora: ' . $information[10] . ' '. $information[11] .'</h5><br>');
//    echo('<a href="/product?id='. $product_id .'"><button class="btn btn-primary">Anúncio</button></a>');
//  }


?>


<link rel="stylesheet" href="../Assets/css/details.css">

<body>
    <div class="title center">
        <h1>Detalhes da compra</h1>
    </div>
    <div class="container text-center center">

        <div class="another-container"> 
            <div class="col center">
                <div class="box text-center">
                    <?php
                    echo('<h5>Nome inserido no pagamento: ' . $information[5] . '</h5>');
                    echo ('<h5>Metodo: ' . $information[3] . '</h5>');
                    switch ($information[4]) {
                            case 'accredited':
                                echo ('<h5 class="text-success">Status: Aprovado </h5>');
                                break;
                            case 'approved':
                                echo ('<h5 class="text-success">Status: Aprovado </h5>');
                                break;
                            case 'in_process':
                                echo ('<h5 class="text-warning">Status: Em processamento </h5>');
                                break;
                            case 'rejected':
                                echo ('<h5 class="text-danger">Status: Recusado </h5>');
                                break;

                         }
                         echo ('<h5>Ultimos digitos do cartão: **** **** **** ' . $information[8] . '</h5>');
                         echo ('<h5>Data e hora: ' . $information[10] . ' '. $information[11] .'</h5>');
                         echo ('<h5>CPF inserido no pagamento: ' . $information[9] . '</h5>');
                    ?>
                </div>
            </div>
            <div class="col">
                <div class="box2">
                        <div class="info text-start">
                            <?php echo ('<img src="../Assets/imgs/products/' . $image . '"></img>'); ?>
                            <h1 style="font-size: 12px !important;"><?php echo ($information[0]); ?></h1>
                    </div>
                </div>
                <br>
                <div class="col">
                    <div class="box3">
                        <h1>gasiofias</h1>
                    </div>
                </div>

            </div>
        </div>
    </div>


    </div>

</body>