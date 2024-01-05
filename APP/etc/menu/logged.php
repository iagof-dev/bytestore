<header class="pb-16">
<div class="menu w-full flex mt-[-5px] z-[1000] fixed bg-[#353535] h-50">
<div class="md:container m-0 mt-1 flex xl:mx-auto rounded-md items-stretch pl-5 pr-5 "> <a title="Byte Store" href="/"><img alt="Byte Store" src="../Assets/imgs/logo/128.webp" title="ByteStore Logo" class="md:w-16 grid-cols-1" /></a>
<div class="md:container w-full  flex flex-grow justify-end ">
<div class="grid grid-rows-1 grid-cols-2 items-center gap-0 justify-end">
<div class="grid-cols-1">
<div class="ml-16">
<a title="Criar anúncio" href="/create">
<button class="w-8 font-semibold mr-2 h-8 text-center leading-tight align-middle rounded-full text-white bg-gradient-to-r from-cyan-500 to-blue-500 transition-colors duration-300 ease-in-out hover:bg-[#a0d4d6]">
<div class="ml-[0.662rem]"> <img src="../Assets/imgs/icons/solid/plus.svg" class="bt-icon h-5 fill-white align-middle" /></div>
</button></a>
</div>
</div>
<div class="grid-cols-1 w-10">


<h1 id="dropdown-menu" class="w-10 font-semibold mr-2 h-8 text-center leading-tight align-middle rounded-full text-white bg-gradient-to-r transition-colors duration-300 ease-in-out hover:bg-[#a0d4d6] cursor-pointer ml-[0.662rem] flex items-center mx-auto">
<img src="../../Assets/imgs/icons/line/menu.svg" class="w-5 h-5 bt-icon align-middle">
</h1>
<!-- dropdown menu context -->
<div id="dropdown-menu-context" class="hidden absolute bg-[#FFFFFF] shadow-lg grid-rows-4 mt-2 rounded">
<div class="m-1 hover:bg-green-400">
<a title="Produtos" href="/admin"><span class="text-black"><span class="flex "><img src="../../Assets/imgs/icons/solid/clipboard.svg" class="w-5 mr-1"> Meu Painel</span></span></a>
</div>
<div class="m-1 hover:bg-green-400">
<a title="Minhas Compras" href="/purchases"><span class="text-black align-middle"><span class="flex"><img src="../../Assets/imgs/icons/solid/shopping-cart.svg" class="w-5 mr-1"> Minhas Compras</span></span></a>
</div>
<div class="m-1 hover:bg-green-400">
<a title="Perfil" href="/profile?id=<?= (new user())->getId(); ?>"><span class="text-black mx-auto"><span class="flex"><img src="../../Assets/imgs/icons/solid/user.svg" class="w-5 mr-1"> Minha Conta</span></span></a>
</div>
<div class="m-1 hover:bg-green-400 w-full">
<a title="Sair" href="/logout"><span class="text-black"><span class="flex text-center"><img src="../../Assets/imgs/icons/closed_door.svg" class="w-5 mr-1"> Sair</span></span></a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</header>

<script src="../../Assets/js/dropdown.js"></script>

