<?php
$user = new user();
?>
<div class="w-full flex mt-[-5px] bg-[#353535] h-50">
    <div class="md:container m-0 mt-1 flex xl:mx-auto rounded-md items-stretch"> <a href="/"><img src="../Assets/imgs/logo/128.png" title="ByteStore Logo" class="md:w-16 grid-cols-1" /></a>
        <div class="md:container w-full  flex flex-grow justify-end">
            <div class="grid grid-rows-1 grid-cols-2 items-center justify-end">
                <div class="grid-cols-1 m-1"><a href="#"><button class="w-32 h-8 text-center leading-tight align-middle rounded-lg text-white bg-red-500 hover:bg-blue-600">
                            <div class="ml-3"> <img src="../Assets/imgs/icons/solid/menu.svg" class="bt-icon h-4 fill-white align-middle mb-[-1.1rem]" />Categorias </div>
                        </button></a></div>
                <div class="grid-cols-1 m-1">
                    <a href="/logout"><h1 class="text-white cursor-pointer">Olá <?=$user->getName() ?>▾</h1></a>
                </div>
            </div>
        </div>
    </div>
</div>