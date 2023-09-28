<?php

$api = new API();
$client = new user();
$PRODUCTS_JSON = $api->GET_PRODUCTS_BY_OWNER($client->getId());

// echo ($PRODUCTS_JSON);

?>


<div class="md:container mx-auto">

    <div class="grid items-center place-items-center mt-5">
        <div class="flex flex-grow h-24 bg-pink-300 rounded-md">
            <img src="http://localhost/Assets/imgs/placeholder.webp" class="w-32 rounded-lg" />
            <div class="grid ml-2 w-[50rem] text-start">
                <h1 class="text-sm font-medium pt-2.5">Produto Muinto legau</h1>
                <h3 class="text-green-600 mt-[-0.8rem]">R$1,99</h3>
                <h2 class="text-xs font-normal text-gray-200 mt-[-0.6rem]">Criado às 01/01/0000 12:90</h2>
                <div class="grid align-middle place-items-end text-center">
                    <div class="buttons flex w-14 h-16 mt-[-3rem] mr-5">
                        <a href="/anuncio/editar/x"><button><img src="../Assets/imgs/icons/solid/pencil.svg" /></button></a>
                        <a href="/anuncio/deletar/x"><button><img src="../Assets/imgs/icons/solid/trash.svg" /></button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="grid items-center place-items-center mt-5">
        <div class="flex flex-grow h-24 bg-pink-300 rounded-md">
            <img src="http://localhost/Assets/imgs/placeholder.webp" class="w-32 rounded-lg" />
            <div class="grid ml-2 w-[50rem] text-start">
                <h1 class="text-sm font-medium pt-2.5">Produto Muinto legau</h1>
                <h3 class="text-green-600 mt-[-0.8rem]">R$1,99</h3>
                <h2 class="text-xs font-normal text-gray-200 mt-[-0.6rem]">Criado às 01/01/0000 12:90</h2>
                <div class="grid align-middle place-items-end text-center">
                    <div class="buttons flex w-14 h-16 mt-[-3rem] mr-5">
                        <a href="/anuncio/editar/x"><button><img src="../Assets/imgs/icons/solid/pencil.svg" /></button></a>
                        <a href="/anuncio/deletar/x"><button><img src="../Assets/imgs/icons/solid/trash.svg" /></button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="grid items-center place-items-center mt-5">
        <div class="flex flex-grow h-24 bg-pink-300 rounded-md">
            <img src="http://localhost/Assets/imgs/placeholder.webp" class="w-32 rounded-lg" />
            <div class="grid ml-2 w-[50rem] text-start">
                <h1 class="text-sm font-medium pt-2.5">Produto Muinto legau</h1>
                <h3 class="text-green-600 mt-[-0.8rem]">R$1,99</h3>
                <h2 class="text-xs font-normal text-gray-200 mt-[-0.6rem]">Criado às 01/01/0000 12:90</h2>
                <div class="grid align-middle place-items-end text-center">
                    <div class="buttons flex w-14 h-16 mt-[-3rem] mr-5">
                        <a href="/anuncio/editar/x"><button><img src="../Assets/imgs/icons/solid/pencil.svg" /></button></a>
                        <a href="/anuncio/deletar/x"><button><img src="../Assets/imgs/icons/solid/trash.svg" /></button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>






</div>