<?php

$usuario = new user();

$img = "../Assets/imgs/user-ph.webp";

$verify = $usuario->getPFP();

if (isset($verify) || !empty($verify))
    $img = "../Assets/imgs/users/" . $usuario->getPFP();

?>


<div class="grid bg-[#353535] ml-24 -mr-5 rounded-lg w-64 h-1/2 place-items-center shadow-lg text-center">

    <img src="<?= $img ?>" class="rounded-[100%] mt-2 w-32 h-32 align-middle shadow-md items-center place-items-center">
    <h1 class="text-white mt-1"><span><?= $usuario->getName(); ?></span></h1>

    <hr class="border-gray-400 m-2 border-1 w-full">
    <div class="w-full hover:bg-gradient-to-r from-cyan-500 to-blue-500 transition-colors duration-300 ease-in-out m-1 font-medium text-white">
        <a href="/profile/edit"><span>Minha Conta</span></a>
    </div>

    <div class="w-full font-medium m-1 hover:bg-gradient-to-r from-cyan-500 to-blue-500 transition-colors duration-300 ease-in-out text-white">
        <a href="/purchases"><span>Minhas Compras</span></a>
    </div>

    <div class="w-full hover:bg-gradient-to-r from-cyan-500 to-blue-500 transition-colors duration-300 ease-in-out hover:bg-[#a0d4d6] font-medium m-1  text-white">
        <a href="/admin" class="h-3"><span> Meus Anúncios</span></a>
    </div>

    <div class="w-full hover:bg-gradient-to-r from-cyan-500 to-blue-500 transition-colors duration-300 ease-in-out  font-medium text-white m-1">
        <a href="/"><span class="shadow-sm">Configurações</span></a>
    </div>

    <div class="w-full hover:bg-gradient-to-r from-cyan-500 to-blue-500 transition-colors duration-300 ease-in-out  font-medium text-white m-1 mb-3">
        <a href="/logout"><span>Sair</span></a>
    </div>
</div>