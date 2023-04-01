<?php

require('./Model/header.php');

$id_user = $_GET['id'];


if (empty($id_user) or !isset($id_user)) {
    header('Location: /');
}


$seller_info = get_seller_info($id_user);

if (empty($seller_info[1]) or !isset($seller_info[1])) {
    header('Location: /');
}

$seller_products = get_all_seller_products($id_user);

// if ($_GET['id'] == "1") {
//     echo ('<span class="badge rounded-pill text-bg-primary"><i class="fa-solid fa-check"></i></span>');
// }

// if ($_SESSION['user_id'] == $id_user) {
//echo ('
// <a href="/edit_profile"><button class="btn btn-primary">Editar perfil</button></a>
// ');
// }

?>


<link rel="stylesheet" href="../Assets/css/main.css">
<link rel="stylesheet" href="../Assets/css/profile.css">

<body>
    <div class="container-fluid center">
        <div class="center">
            <div class="container text-center">
                <div class="box-title">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <div class="store-picture">
                                <img class="profile-img" src="<?php if (empty($seller_info[4])) {
                                    echo ('../Assets/imgs/ph-user.jpg');
                                } else {
                                    echo ("https://cdn.discordapp.com/attachments/852640897505427466/1091292069047312415/Screenshot_20230331-062122_Nubank.jpg");
                                } ?>">
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="store-name">
                                <?php if ($seller_info[5] == true or $seller_info[5] == 1) {
                                    echo ('<div class="verified"><h1>' . $seller_info[1] . ' <a href="#" data-bs-toggle="tooltip" data-bs-title="Tooltip on right" data-bs-placement="right"><i class="bi bi-patch-check-fill text-center"></h1></i></a></div>');
                                } else {
                                    echo ('<h1>' . $seller_info[1] . '</h1>');
                                } ?>
                                </h1>
                            </div>
                            <div class="store-desc">
                                <p>
                                    <?php if (!isset($seller_info[6]) or empty($seller_info[6])) {
                                        echo ('Ops! A descrição da loja ainda não foi definida pelo vendedor. Volte em breve para conferir as novidades.');
                                    } else {
                                        echo ($seller_info[6]);
                                    } ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <br>

                <div class="box-products">
                    <div class="box-products-title text-center">
                        <h1>Anúncios de
                            <?php echo ($seller_info[1]); ?>
                        </h1>
                    </div>

                    <div class="list-products">
                        <div class="container text-center">

                            <?php echo ($seller_products); ?>

                            <!-- <div class="row align-items-center">
                                <div class="col"> <div class="mdcard"> <a href="/product?id=162" style="text-decoration: none;"> <div class="card" style="width: 17rem;height: 18rem;"> <img   src="../Assets/imgs/products/product_642228319512c.jpg"   class="card-img-top cardimg"> <div class="card-body">   <h5 class="card-title text-start card-titulo">Computador Gamer</h5>   <h6 class="text-start card-preco">R$8530</h6> </div> </div> </a></div> </div>
                                <div class="col"> <div class="mdcard"> <a href="/product?id=162" style="text-decoration: none;"> <div class="card" style="width: 17rem;height: 18rem;"> <img   src="../Assets/imgs/products/product_642228319512c.jpg"   class="card-img-top cardimg"> <div class="card-body">   <h5 class="card-title text-start card-titulo">Computador Gamer</h5>   <h6 class="text-start card-preco">R$8530</h6> </div> </div> </a></div> </div>
                                <div class="col"> <div class="mdcard"> <a href="/product?id=162" style="text-decoration: none;"> <div class="card" style="width: 17rem;height: 18rem;"> <img   src="../Assets/imgs/products/product_642228319512c.jpg"   class="card-img-top cardimg"> <div class="card-body">   <h5 class="card-title text-start card-titulo">Computador Gamer</h5>   <h6 class="text-start card-preco">R$8530</h6> </div> </div> </a></div> </div>
                                <div class="col"> <div class="mdcard"> <a href="/product?id=162" style="text-decoration: none;"> <div class="card" style="width: 17rem;height: 18rem;"> <img   src="../Assets/imgs/products/product_642228319512c.jpg"   class="card-img-top cardimg"> <div class="card-body">   <h5 class="card-title text-start card-titulo">Computador Gamer</h5>   <h6 class="text-start card-preco">R$8530</h6> </div> </div> </a></div> </div>
                            </div> -->
                        </div>
                    </div>
                </div>


            </div>


        </div>
    </div>
    </div>
</body>

</html>