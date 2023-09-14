<?php
$user = new user();
?>
<div class="menu w-full flex mt-[-5px] bg-[#353535] h-50">
    <div class="md:container m-0 mt-1 flex xl:mx-auto rounded-md items-stretch"> <a href="/"><img src="../Assets/imgs/logo/128.webp" title="ByteStore Logo" class="md:w-16 grid-cols-1" /></a>
        <div class="md:container w-full  flex flex-grow justify-end">
            <div class="grid grid-rows-1 grid-cols-2 items-center justify-end">
                <div class="grid-cols-1 m-1"><a href="#"><button class="w-32 h-8 text-center leading-tight align-middle rounded-lg text-white bg-red-500 hover:bg-blue-600">
                            <div class="ml-3"> <img src="../Assets/imgs/icons/solid/menu.svg" class="bt-icon h-4 fill-white align-middle mb-[-1.1rem]" />Anunciar </div>
                        </button></a></div>
                <div class="grid-cols-1 m-1">
                    <h1 id="dropdown-menu" class="text-white text-end cursor-pointer select-none hover:text-gray-200 transition-colors duration-500 ease-in-out"><span class="flex"><img src="../../Assets/imgs/icons/user.svg" class="w-5 mr-1"><?= $user->getName() ?><span id="dropdown-icon" class="ml-1">▾</span></span></h1>

                    <!-- dropdown menu context -->

                    <div id="dropdown-menu-context" class="hidden absolute bg-[#FFFFFF] shadow-lg grid-rows-4 mt-1 rounded">
                        <div class="m-1 hover:bg-green-400">
                            <a href="/profile/x/products"><span class="text-black"><span class="flex"><img src="../../Assets/imgs/icons/solid/speakerphone.svg" class="w-5 mr-1"> Meus anúncios</span></span></a>
                        </div>
                        <div class="m-1 hover:bg-green-400">
                            <a href="#"><span class="text-black align-middle"><span class="flex "><img src="../../Assets/imgs/icons/solid/shopping-cart.svg" class="w-5 mr-1"> Minhas Compras</span></span></a>
                        </div>
                        <div class="m-1 hover:bg-green-400">
                            <a href="/profile/x"><span class="text-black mx-auto"><span class="flex"><img src="../../Assets/imgs/icons/solid/user.svg" class="w-5 mr-1"> Minha Conta</span></span></a>
                        </div>
                        <div class="m-1 hover:bg-green-400">
                            <a href="/logout"><span class="text-black"><span class="flex"><img src="../../Assets/imgs/icons/closed_door.svg"  class="w-5 mr-1"> Sair</span></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../../Assets/js/dropdown.js"></script>