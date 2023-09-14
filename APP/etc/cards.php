<?php

function cards($id, $title, $price, $discount, $img){
    
    $parcel = $discount / 96;

echo('
<div class="rounded-md drop-shadow-lg w-[11rem] bg-[#FDFDFD]">
    <a href="/anuncio/x">
        <img src="../Assets/imgs/placeholder.png" alt="aaaaaa" class="rounded-t-md" title="aaaaa" />
        <div class="p-2">
            <h1 class="text-[0.75rem] font-medium">'. $title .'</h1>
            <div class="container">
                <h3 class="text-gray-500 text-[0.8rem] pt-5 mb-[-0.4rem]"><span class="line-through">de: R$'. $price .'</span> por:</h3>
                <h2><span class="text-[#42A000] pb-[-2rem] font-bold">R$'. $discount .' <span class="text-xs align-middle">à vista</span></span></h2>
                <h4 class="text-gray-600 text-[0.8rem] mt-[-0.5rem]">96x de R$'. $parcel .' sem juros</h4>
            </div>
        </div>
        <a href="/anuncio/'. $id .'"><button class="bg-[#00A000] text-sm rounded-sm font-medium text-white w-full h-10 rounded-b-md transition-colors duration-300 ease-in-out hover:bg-[#00B000] hover:text-[#101010]"> Adicionar ao carrinho</button></a>
    </a>
</div>
');



}

?>


<div class="card rounded-md drop-shadow-lg w-[11rem] select-text bg-[#FDFDFD]">
    <a href="/anuncio/x">
        <img src="../Assets/imgs/placeholder.webp" alt="aaaaaa" class="rounded-t-md" title="aaaaa" />
        <div class="p-2">
            <h1 class="text-[0.75rem] font-medium">Processador Intel Core i7 12700KF 3.6GHz (5.0GHz Turbo), 12ª Geração, 12-Cores 20-Threads, LGA 1700</h1>
            <div class="container">
                <h3 class="text-gray-500 text-[0.8rem] pt-5 mb-[-0.4rem]"><span class="line-through">de: R$1.000</span> por:</h3>
                <h2><span class="text-[#42A000] pb-[-2rem] font-bold">R$1.500,00 <span class="text-xs align-middle">à vista</span></span></h2>
                <h4 class="text-gray-600 text-[0.8rem] mt-[-0.5rem]">96x de R$15,63 sem juros</h4>
            </div>
        </div>
        <a href="/anuncio/x"><button class="bg-[#00A000] text-sm rounded-sm font-medium text-white w-full h-10 rounded-b-md transition-colors duration-300 ease-in-out hover:bg-[#00B000] hover:text-[#101010]"> Adicionar ao carrinho</button></a>
    </a>
</div>


<div class="card rounded-md drop-shadow-lg w-[11rem] select-text bg-[#FDFDFD]">
    <a href="/anuncio/x">
        <img src="../Assets/imgs/placeholder.webp" alt="aaaaaa" class="rounded-t-md" title="aaaaa" />
        <div class="p-2">
            <h1 class="text-[0.75rem] font-medium">Processador Intel Core i7 12700KF 3.6GHz (5.0GHz Turbo), 12ª Geração, 12-Cores 20-Threads, LGA 1700</h1>
            <div class="container">
                <h3 class="text-gray-500 text-[0.8rem] pt-5 mb-[-0.4rem]"><span class="line-through">de: R$1.000</span> por:</h3>
                <h2><span class="text-[#42A000] pb-[-2rem] font-bold">R$1.500,00 <span class="text-xs align-middle">à vista</span></span></h2>
                <h4 class="text-gray-600 text-[0.8rem] mt-[-0.5rem]">96x de R$15,63 sem juros</h4>
            </div>
        </div>
        <a href="/anuncio/x"><button class="bg-[#00A000] text-sm rounded-sm font-medium text-white w-full h-10 rounded-b-md transition-colors duration-300 ease-in-out hover:bg-[#00B000] hover:text-[#101010]"> Adicionar ao carrinho</button></a>
    </a>
</div>

