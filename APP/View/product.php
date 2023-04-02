<?php
ob_start();
session_start();
error_reporting(0);

require_once('./Model/header.php');
require_once('./Model/mercado_pago.php');


$product_info = get_product_page($_GET['id']);

if(!isset($_GET['id']) or !isset($product_info[0])){
    header('Location: /');
}

if($_SESSION['user_id'] != $product_info[6]){
    $link = mp_create_link($product_info[1], $product_info[3] ,$product_info[2], $_SESSION['user_id'], $product_info[6], $_GET['id']);
}

?>

<link rel="stylesheet" href="./Assets/css/product.css">

<body>
    <div class="container-fluid text-center">
        <div class="row">
            <div class="col">
                <div class="box1 position-absolute top-50 start-50 translate-middle">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <img class="img-fluid" src="./Assets/imgs/products/<?php echo($product_info[4]); ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="anuncio_desc">
                                <h1 class="text-start">Descrição do anúncio:</h1>
                                <hr>
                                <p class="text-start"><?php echo($product_info[2]); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="box2 position-absolute">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="infos text-start">
                                    <h1 text-start><?php echo($product_info[1]); if($product_info[6] == $_SESSION['user_id']){echo(' <span class="badge rounded-pill text-bg-primary">Proprietário</span>');};?></h1>
                                    <h2 text-start>R$<?php echo($product_info[3]); ?></h2>
                                    <h2>Vendedor: <a href="/profile/?id=<?php echo($product_info[6]); ?>"><?php echo($product_info[7]); ?></a> <?php if($product_info[8] == true or $product_info[8] == 1){echo('<i class="bi bi-patch-check-fill"></i>');} ?></h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="row">
                                    <?php
                                        if($product_info[6] == $_SESSION['user_id']){
                                            echo('<a href="#"><button type="button" style="text-decoration: line-through;" class="btn btn-warning text-center position-absolute top-100 start-50 translate-middle" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Tooltip on right"><i class="fa-solid fa-cart-shopping"></i> Comprar</button></a>');
                                        }
                                        else{
                                            echo('<a href="'. $link .'"><button class="btn btn-primary text-center position-absolute top-100 start-50 translate-middle"><i class="fa-solid fa-cart-shopping"></i> Comprar</button></a>');
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>