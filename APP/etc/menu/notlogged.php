<header class="pb-20">
<div class="container grid mb-32 text-center z-[1000] mx-auto fixed bg-[#353535] min-w-full w-full max-w-full h-16">


<div class="sm:container mx-auto flex p-2">

<div id="logo" class="w-12">
<a href="/"><img src="../../Assets/imgs/logo/128.webp" alt="Logo ByteStore"></a>
</div>


<div class="place-items-center w-[45rem] align-middle mx-auto bg-pink content-center">
<form action="/">
<div class="flex w-full mx-10 rounded bg-[#404040]">
<input required class="text-sm w-full border-none bg-transparent poppins-light px-4 py-1 text-gray-200 outline-none focus:outline-none" type="search" name="search" <?php if(isset($_GET['search'])) echo('value="'. $_GET['search']. '"') ?>placeholder="Busque um produto..." />
<button type="submit" class="m-2 rounded bg-gradient-to-r from-cyan-500 to-blue-500 transition-colors duration-300 ease-in-out hover:bg-[#a0d4d6] px-4 py-2 text-white">
<svg class="fill-current h-4 w-5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
<path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
</svg>
</button>
</div>
</form>
</div>

<div class="place-items-end align-middle text-center items-center mt-3.5 shadow-2xl">
<!-- AÇÃO -->
<a href="/login"><img title="Entrar" alt="ByteStore door login icon" src="../../Assets/imgs/icons/closed_door.svg" class="h-5 shadow-md align-middle bt-icon cursor-pointer"></a>
</div>

</div>

</div>

</header>
<style>

.bt-icon{
    filter: brightness(0) saturate(100%) invert(100%) sepia(0%) saturate(7500%) hue-rotate(264deg) brightness(101%) contrast(102%);
}

.bt-icon:hover{
    filter: brightness(0) saturate(100%)
}
</style>