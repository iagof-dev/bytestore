<?php
$user = new user();
?>
<div class="menu w-full flex mt-[-5px] bg-[#353535] h-50">
    <div class="md:container m-0 mt-1 flex xl:mx-auto rounded-md items-stretch"> <a title="Byte Store" href="/"><img alt="Byte Store" src="../Assets/imgs/logo/128.webp" title="ByteStore Logo" class="md:w-16 grid-cols-1" /></a>
        <div class="md:container w-full  flex flex-grow justify-end">
            <div class="grid grid-rows-1 grid-cols-2 items-center gap-0 justify-end">
                <div class="grid-cols-1">
                    <div class="ml-16">
                        <a title="Criar anúncio" href="/create">
                            <button class="w-10 font-semibold mr-2 h-8 text-center leading-tight align-middle rounded-lg text-white bg-gradient-to-r from-cyan-500 to-blue-500 transition-colors duration-300 ease-in-out hover:bg-[#a0d4d6]">
                                <div class="ml-[0.662rem]"> <img src="../Assets/imgs/icons/solid/plus.svg" class="bt-icon h-5 fill-white align-middle" /></div>
                            </button></a>
                    </div>
                </div>
                <div class="grid-cols-1 w-10">
                    <h1 id="dropdown-menu" class="text-white text-end cursor-pointer select-none hover:text-gray-200 transition-colors duration-500 ease-in-out"><span class="flex hover:underline transition-transform ease-in-out duration-200"><img src="../../Assets/imgs/icons/user.svg" class="w-5 bt-icon mr-1"><?= $user->getName() ?><span id="dropdown-icon" class="ml-1">▾</span></span></h1>

                    <!-- dropdown menu context -->

                    <div id="dropdown-menu-context" class="hidden absolute bg-[#FFFFFF] shadow-lg grid-rows-4 mt-2 rounded">
                        <div class="m-1 hover:bg-green-400">
                            <a title="Produtos" href="/profile/x/products"><span class="text-black"><span class="flex"><img src="../../Assets/imgs/icons/solid/speakerphone.svg" class="w-5 mr-1"> Meus anúncios</span></span></a>
                        </div>
                        <div class="m-1 hover:bg-green-400">
                            <a title="Minhas Compras" href="#"><span class="text-black align-middle"><span class="flex "><img src="../../Assets/imgs/icons/solid/shopping-cart.svg" class="w-5 mr-1"> Minhas Compras</span></span></a>
                        </div>
                        <div class="m-1 hover:bg-green-400">
                            <a title="Perfil" href="/profile/x"><span class="text-black mx-auto"><span class="flex"><img src="../../Assets/imgs/icons/solid/user.svg" class="w-5 mr-1"> Minha Conta</span></span></a>
                        </div>
                        <div class="m-1 hover:bg-green-400">
                            <a title="Sair" href="/logout"><span class="text-black"><span class="flex"><img src="../../Assets/imgs/icons/closed_door.svg" class="w-5 mr-1"> Sair</span></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../../Assets/js/dropdown.js"></script>