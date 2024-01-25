






























<?php

echo(phpinfo());

// $usuario = new user();

// $img = "../Assets/imgs/user-ph.webp";

// $verify = $usuario->getPFP();

// if (isset($verify) || !empty($verify))
//     $img = "../Assets/imgs/users_pfp/" . $usuario->getPFP();

?>
<!-- 
<div class="h-screen flex -mt-5">
  <div class="md:w-96 w-full bg-white border-r border-gray-300">
    <div class="px-6 py-4 justify-center flex">
      <img src="<?= $img ?>" alt="User Profile" class="object-cover h-24 w-24 rounded-full"/>
    </div>
    <p class="text-center text-lg text-gray-800 font-medium"><?= $usuario->getName(); ?></p>
    <hr class="my-3"/>
    <div class="px-4 flex flex-col space-y-1">
      <a href="#" class="px-4 py-2 text-gray-700 text-sm font-semibold flex hover:bg-gray-100 rounded">Inicio <span class="font-bold underline italic ml-1">(WIP)</span></a>
      <a href="/profile/edit" class="px-4 py-2 text-gray-700 text-sm font-semibold flex hover:bg-gray-100 rounded">Minha Conta</a>
      <a href="/purchases" class="px-4 py-2 text-gray-700 text-sm font-semibold flex hover:bg-gray-100 rounded">Minhas Compras</a>
      <a href="/campaigns" class="px-4 py-2 text-gray-700 text-sm font-semibold flex hover:bg-gray-100 rounded">Meus Anúncios</a>
      <a href="#" class="px-4 py-2 text-gray-700 text-sm font-semibold flex hover:bg-gray-100 rounded">Vendas <span class="font-bold underline italic ml-1">(WIP)</span></a>
      <?php
      if((new user())->getRole() != "user"){
        echo('<a href="#" class="px-4 py-2 text-gray-700 text-sm font-semibold flex hover:bg-gray-100 rounded">Painel Admin <span class="font-bold underline italic ml-1">(WIP)</span></a>');
      }
    ?>
      
      
      <a href="/logout" class="px-4 py-2 text-gray-700 text-sm font-semibold flex hover:bg-gray-100 rounded">Sair</a>
    </div>
  </div>
  <div class="w-full p-8">
  </div>
</div>  -->