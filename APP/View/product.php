<?php
ob_start();
session_start();
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);

require('./Model/header.php');
require('./Model/mercado_pago.php');

$product_info = get_product_page($_GET['id']);

$link = mp_create_link($product_info[1], $product_info[3] ,$product_info[2], $_SESSION['user_id'], $product_info[6], $_GET['id']);

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
                                    <h1 text-start><?php echo($product_info[1]); ?></h1>
                                    <h2 text-start>R$<?php echo($product_info[3]); ?></h2>
                                    <h2>Vendedor: <a href="/perfil?id=<?php echo($product_info[6]); ?>"><?php echo($product_info[7]); ?></a></h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="row">
                                    <?php
                                        echo('<a href="'. $link .'"><button class="btn btn-primary text-center position-absolute top-100 start-50 translate-middle"><i class="fa-solid fa-cart-shopping"></i> Comprar</button></a>');
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