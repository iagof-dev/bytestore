<?php


class card
{


    function CREATE_CARD($id, $title, $price, $discount, $img, $owner)
    {
        $actual_price = $price - $discount;
        $parcel = $actual_price / 96;
        $discount_text = "";
        $parcel = number_format((float)$parcel, 2, '.', '');
        $parcel = str_replace(".", ",", str_replace(",", ".", $parcel));

        if($discount != 0){
            $discount_text = '<h3 class="text-gray-500 text-[0.8rem] pt-5 mb-[-0.4rem]"><span class="line-through">de: R$' . $price . '</span> por:</h3>';
        }
        else{
            $discount_text = '<h3 class="opacity-0 text-gray-500 text-[0.8rem] pt-5 mb-[-0.4rem]"><span class="line-through">de: R$' . $price . '</span> por:</h3>';

        }

        return ('
<div class="rounded-md drop-shadow-lg w-[11rem] bg-[#FDFDFD]">
    <a href="/anuncio/' . $id . '">
        <img src="../Assets/imgs/products/' . $img . '" alt="aaaaaa" class="w-full h-44 rounded-t-md" title="aaaaa" />
        <div class="p-2 h-32">
            <h1 class="text-[0.80rem] font-medium">' . $title . '</h1>
            <div class="container">'. $discount_text.'
                <h2><span class="text-[#42A000] pb-[-2rem] font-bold">R$' . $actual_price . ' <span class="text-xs align-middle">à vista</span></span></h2>
                <h4 class="text-gray-600 text-[0.8rem] mt-[-0.5rem]">96x de R$' . $parcel . ' sem juros</h4>
            </div>
        </div>
        <a href="/anuncio/' . $id . '"><button class="bg-[#00A000] text-sm rounded-sm font-medium text-white w-full h-10 rounded-b-md transition-colors duration-300 ease-in-out hover:bg-[#00B000] hover:text-[#101010]"> Adicionar ao carrinho</button></a>
    </a>
</div>
');
    }
}
