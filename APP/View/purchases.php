<?php

require_once(__DIR__ . "/../etc/admin/purchases_list.php");


?>

<div class="container flex mx-auto h-auto pt-5">
    
    <?php include_once(__DIR__ . "/../etc/menu/user_menu.php");?>

    <div class="ml-16">
        <div class="grid items-center place-items-center w-full">
            <h1 class="font-medium text-2xl items-center w-full place-items-center align-middle">Minhas Compras:</h1>
            <?= (new ADMIN_PRODUCTS_LIST())->GET() ?>
        </div>
    </div>
</div>