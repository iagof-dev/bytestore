<?php

$usuario = new user();

$img = "../Assets/imgs/user-ph.webp";

$verify = $usuario->getPFP();

if (isset($verify) || !empty($verify))
    $img = "../Assets/imgs/users_pfp/" . $usuario->getPFP();

?>


<div class="h-[34rem] flex ml-36">
  <div class="md:w-96 w-full bg-[#FAF9F6] shadow-md rounded-lg border-r border-gray-300">
    <div class="px-6 py-4 justify-center flex">
      <img src="<?= $img ?>" alt="User Profile" class="object-cover h-32 w-32 border-2 border-black rounded-full"/>
    </div>
    <p class="text-center text-lg text-gray-800 font-medium"><?= $usuario->getName();?></p>
    <hr class="my-3"/>
    <div class="px-4 flex flex-col space-y-1">
      <a href="#" class="px-4 py-2 text-gray-700 text-base font-semibold flex hover:bg-gray-100 rounded">📊 Inicio <span class="font-bold underline italic ml-1">(WIP)</span></a>
      <a href="/profile/edit" class="px-4 py-2 text-gray-700 text-base font-semibold flex hover:bg-gray-100 rounded">👤 Minha Conta</a>
      <a href="/purchases" class="px-4 py-2 text-gray-700 text-base font-semibold flex hover:bg-gray-100 rounded">🛒 Minhas Compras</a>
      <a href="/campaigns" class="px-4 py-2 text-gray-700 text-base font-semibold flex hover:bg-gray-100 rounded">📢 Meus Anúncios</a>
      <a href="#" class="px-4 py-2 text-gray-700 text-base font-semibold flex hover:bg-gray-100 rounded">💰 Vendas <span class="font-bold underline italic ml-1">(WIP)</span></a>
      <?php
      if((new user())->getRole() != "user"){
        echo('<a href="#" class="px-4 py-2 text-gray-700 text-base font-semibold flex hover:bg-gray-100 rounded">🕵️ Painel Admin <span class="font-bold underline italic ml-1">(WIP)</span></a>');
      }
    ?>
      
      
      <a href="/logout" class="px-4 py-2 text-gray-700 text-base font-semibold flex hover:bg-gray-100 rounded">🚪 Sair</a>
    </div>
  </div>
  <div class="w-full -mt-5">
    <!-- Content of the page goes here -->


<!-- <div class="grid bg-[#353535] ml-24 -mr-5 rounded-lg w-64 h-1/2 place-items-center shadow-lg text-center">

    <img src="<?= $img ?>" class="rounded-[100%] mt-2 w-32 h-32 align-middle shadow-md items-center place-items-center">
    <h1 class="text-white mt-1"><span><?= $usuario->getName(); ?></span></h1>

    <hr class="border-gray-400 m-2 border-1 w-full">
    <div class="w-full hover:bg-gradient-to-r from-cyan-500 to-blue-500 transition-colors duration-300 ease-in-out m-1 font-medium text-white">
        <a href="/profile/edit"><span>📊 Inicio (WIP)</span></a>
    </div>

    <div class="w-full hover:bg-gradient-to-r from-cyan-500 to-blue-500 transition-colors duration-300 ease-in-out m-1 font-medium text-white">
        <a href="/profile/edit"><span>👤 Minha Conta</span></a>
    </div>

    <div class="w-full font-medium m-1 hover:bg-gradient-to-r from-cyan-500 to-blue-500 transition-colors duration-300 ease-in-out text-white">
        <a href="/purchases"><span>🛒 Minhas Compras</span></a>
    </div>

    <div class="w-full hover:bg-gradient-to-r from-cyan-500 to-blue-500 transition-colors duration-300 ease-in-out hover:bg-[#a0d4d6] font-medium m-1  text-white">
        <a href="/campaigns" class="h-3"><span>📢 Meus Anúncios</span></a>
    </div>

    <div class="w-full hover:bg-gradient-to-r from-cyan-500 to-blue-500 transition-colors duration-300 ease-in-out  font-medium text-white m-1">
        <a href="/"><span class="shadow-sm">💰 Vendas (WIP)</span></a>
    </div>

    <?php

    if((new user())->getRole() != "user"){
        echo('<div class="w-full hover:bg-gradient-to-r from-cyan-500 to-blue-500 transition-colors duration-300 ease-in-out  font-medium text-white m-1">
        <a href="/"><span class="shadow-sm">🕵️ Admin Panel</span></a>
    </div>');
    }

    ?>
    <div class="w-full hover:bg-gradient-to-r from-cyan-500 to-blue-500 transition-colors duration-300 ease-in-out  font-medium text-white m-1 mb-3">
        <a href="/logout"><span>🚪 Sair</span></a>
    </div>
</div> -->