<?php

require('./Model/header.php');


$product_info = get_product_page($_GET['id']);


?>

<style>
    img {
        margin-top: 10%;
        width: 85% !important;
        height: auto !important;
    }
</style>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<link rel="stylesheet" href="./Assets/css/product.css">

<body>
    <div class="container-fluid">
        <div class="product-info center ">

            <div class="container-prod">

                <div class="prod-img"><img class="product_img"
                        src="../Assets/imgs/products/<?php echo ($product_info[4]); ?>"></div>
                <div class="prod-text">
                    <div class="prod-title">
                        <h1>
                            <?php echo ($product_info[1]); ?>
                        </h1>
                    </div>
                    <div class="prod-price-btn">
                        <h2>R$<?php echo ($product_info[3]); ?></h2>
                        <a href="<?php echo ($product_info[5]); ?>"><button class="btn btn-primary">Comprar</button></a>
                    </div>
                </div>
                <div class="prod-desc">
                    <div class="prod-desc-title">
                        <h3>Descrição:</h3>
                    <div class="prod-desc-text">
                        <p>
                            <?php echo ($product_info[2]); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>


    </div>
</body>

</html>