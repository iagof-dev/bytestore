<?php

require('./Model/header.php');

$id_user = $_GET['id'];
$verified = "";

if (empty($id_user) or !isset($id_user)) {
    header('Location: /');
}


$seller_info = get_seller_info($id_user);

if (empty($seller_info[1]) or !isset($seller_info[1])) {
    header('Location: /');
}

if ($seller_info[5] == true or $seller_info[5] == 1) {
    if ($_GET['id'] == 1) {

        $verified = ('<div class="verified"><h1 style="font-size: 25px !important;">' . $seller_info[1] . ' <i class="bi bi-patch-check-fill text-center text-warning-emphasis"></h1></i></a></div>');
    } else {

        $verified = ('<div class="verified"><h1 style="font-size: 25px !important;">' . $seller_info[1] . ' <i class="bi bi-patch-check-fill text-center text-primary"></h1></i></a></div>');
    }
} else {
    $verified = ('<h1 style="font-size: 25px !important;">' . $seller_info[1] . '</h1>');
}


$seller_products = get_all_seller_products($id_user);

?>

<link rel="stylesheet" href="../Assets/css/global.css">
<link rel="stylesheet" href="../Assets/css/main.css">
<link rel="stylesheet" href="../Assets/css/profile.css">

<body>
    <div class="container position-absolute top-50 start-50 translate-middle text-center">
        <div class="box-title position-absolute top-50 start-50 translate-middle text-center">
            <div class="row align-items-center">
                <div class="col-4">
                    <div class="d-block store-picture">
                        <img width="45%" class="profile-img d-block thumbnail rounded-5 img-fluid" src="<?php if (empty($seller_info[4])) {echo ('../Assets/imgs/ph-user.jpg');} else {echo ('../Assets/imgs/users/' . $seller_info[4]);} ?>">
                    </div>
                </div>
                <div class="col-7" style="margin-left: -8vh !important;">
                    <div class="store-name">
                        <?php echo ($verified);
                        if ($_GET['id'] == $_SESSION['user_id']) {
                            echo ('<a href="/edit_profile?id=' . $_SESSION["user_id"] . '"><button class="btn btn-primary position-absolute bt-edit translate-middle text-center"><i class="fa-solid fa-pen-to-square"></i> Editar Perfil</button></a>');
                        }
                        ?>

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

        <div class="box-products position-absolute start-50 translate-middle">
            <div class="box-products-title text-center">
                <h1>Anúncios de <?php echo ($seller_info[1]); ?></h1>
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