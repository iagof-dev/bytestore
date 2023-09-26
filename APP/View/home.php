<?php

$api = new API();

?>

<div>
    <div class="md:container mx-auto w-[50%]">
        <div class="w-full h-5 mx-auto">
            <div class="md:container w-full mt-1 flex flex-grow justify-center">
                <div class="grid grid-rows-1 auto-rows-max grid-cols-5 gap-5 items-center justify-center ">
                    
                    <!-- <div class="card grid-flow-col col-auto rounded-md drop-shadow-lg w-[11rem] select-text bg-[#FDFDFD]">
                        <a title="Ver anúncio" href="/anuncio/x">
                            <img src="../Assets/imgs/placeholder.webp" alt="aaaaaa" class="rounded-t-md" title="aaaaa" />
                            <div class="p-2">
                                <h1 class="text-[0.75rem] font-medium">Processador Intel Core i7 12700KF 3.6GHz (5.0GHz Turbo), 12ª Geração, 12-Cores 20-Threads, LGA 1700</h1>
                                <div class="container">
                                    <h3 class="text-gray-500 text-[0.8rem] pt-5 mb-[-0.4rem]"><span class="line-through">de: R$1.000</span> por:</h3>
                                    <h2><span class="text-[#42A000] pb-[-2rem] font-bold">R$1.500,00 <span class="text-xs align-middle">à vista</span></span></h2>
                                    <h4 class="text-gray-600 text-[0.8rem] mt-[-0.5rem]">96x de R$15,63 sem juros</h4>
                                </div>
                            </div>
                            <a title="Ver anúncio" href="/anuncio/x"><button class="bg-[#00A000] text-sm rounded-sm font-medium text-white w-full h-10 rounded-b-md transition-colors duration-300 ease-in-out hover:bg-[#00B000] hover:text-[#101010]"> Adicionar ao carrinho</button></a>
                        </a>
                    </div> -->
                    

                    <?= $api->GET_CARDS(); ?>
                  

                </div>
            </div>
        </div>
    </div>
</div>