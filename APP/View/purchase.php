<?php
ob_start();
session_start();
error_reporting(0);

require_once('./Model/header.php');
?>

<link rel="stylesheet" href="../Assets/css/purchase.css">
<body>

    <div class="container text-center">
        <h1 class="title">Minhas compras</h1>
        <div class="center">
            <div class="box">
                <div class="container">
                    <div class="detalhes">
                        


                    <?php $compras = get_all_purchases(); echo($compras); ?>
                    

                    <!-- <div class="compra">
                        <div class="row">
                            <div class="col justify-content-start">
                                <img width="50%" src="http://localhost/Assets/imgs/products/product_641777f16e657.jpg">
                            </div>
                            <div class="col-5 justify-content-center">
                                <h1 class="text-start">Nome do Produto</h1>
                                <h2 class="detail text-start">#09SDUYGF0 | Metódo: PIX</h2>
                            </div>
                            
                            <div class="col text-center justify-content-end">
                                <div class="infos">
                                    <div class="col text-center">
                                        <h3 class="">R$0.00</h3><br>
                                    </div>
                                    <div class="col text-center">
                                        <h2 class="text-center center text-status text-danger">Aprovado</h2>
                                    </div>
                                    <div class="col text-center">
                                        <button class="btn btn-primary "> <i class="fa-solid fa-circle-info"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->








                </div>
            </div>
        </div>



    </div>


</body>