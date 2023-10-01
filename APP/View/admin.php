<?php

require_once(__DIR__ . "/../etc/admin/product_list.php");

$list = new ADMIN_PRODUCTS_LIST();

?>


<div class="container flex mx-auto h-auto pt-5">
    <div class="grid bg-slate-400 w-64 h-[50rem] text-center">
        <div class="h-5">
            <a href="1"><span>Minha Conta</span></a>
        </div>

        <div class="h-5">
            <a href="2"><span>Minhas Compras</span></a>
        </div>

        <div class="h-5">
            <a href="3" class="h-3"><span>Meus Anúncios</span></a>
        </div>

        <div class="h-5">
            <a href="4"><span>Configurações</span></a>

        </div>

        <div class="h-5 bg-blue-800">
            <a href="5" class=" bg-blue-200"><span>Sair</span></a>
        </div>
    </div>


    <div class="ml-16">
        <div class="grid items-center place-items-center">
            <h1 class="font-medium text-2xl items-center place-items-center align-middle">Anúncios Ativos:</h1>
            <?= $list->GET() ?>
        </div>
    </div>
</div>