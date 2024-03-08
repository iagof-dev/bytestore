<?php
$api = new api();
$produto = $api->GET_PRODUCT_BY_ID($_GET['id']);
$user_id = $produto['DATA']['0']['owner'];
$owner = $api->GET_USER_BY_ID($user_id);
$user = new user();

$userAccessID = $user->getID();

if (empty($produto['DATA']['0'])) {
    return header("Location: /");
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if($user_id == $user->getId()){
        echo("<script> Swal.fire({ title: 'Erro', text: 'Você não pode comprar seu próprio anúncio.', icon: 'error', showCancelButton: false, confirmButtonColor: '#3085d6', cancelButtonColor: '#d33', confirmButtonText: 'Ok' }).then((result) => { if (result.isConfirmed) { window.location.href = '/anuncio?id=".$_GET['id']."'; } }) </script>");
        return;
    }

    if(empty($user->getID()) || $user->getID() == "" || $user->getID() == " "){
        header("Location: /login");
        return;
    }


    $id_created = $api->CREATE_GATEWAY_PAYMENT($_GET['id'], $produto['DATA']['0']['owner'], $userAccessID, $user->getEmail());
    header("Location: /buy?id=". $id_created);

}

?>

<div class="justify-center items-center w-full h-full flex">
  
<div class="md:flex-row bg-white shadow-lg rounded-lg w-5/6 h-3/4 mx-auto flex flex-col p-5">
<a href="javascript:history.go(-1)"><img title="Voltar" src="../Assets/imgs/icons/solid/arrow-left.svg" class="h-8"></a>
    <div class="mx-auto w-1/3 mt-12">
      <img src="../Assets/imgs/products/<?= $produto['DATA']['0']['image']; ?>" alt="Pré visualização do produto" class="object-cover w-full
          h-96 rounded-md"/>
    </div>
    <div class="w-full md:w-1/2 md:pl-10">
      <p class="text-3xl text-gray-700 font-bold mb-2"><?= wordwrap($produto['DATA']['0']['title'], 30, "<br />\n"); ?></p>
      <p class="text-md">Vendido por: <a href="/profile?id=<?= $user_id ?>"><span class="font-bold text-lg underline"><?= $owner['DATA']['0']['username'] ?></span></a>
      </p>
      <div class="mt-2">
        <div class="items-center mb-2 flex">
          <span class="rounded-full text-sm font-bold text-white mr-2 inline-block">⭐⭐⭐⭐⭐</span>
          <span class="text-gray-700 text-md">0 avaliações</span>
        </div>
        <p class="text-gray-700 text-xl font-bold">R$<?= $produto['DATA']['0']['price'] ?></p>
      </div>
      <div class="mt-5">
      <form action="" method="post">
        <a href="&buy=1"><button fontfamily="Arial" class="inline-flex border bg-gradient-to-r shadow-xl from-cyan-500 to-blue-500 transition-colors duration-300 ease-in-out hover:bg-[#a0d4d6] text-white font-medium hover:text-black focus:outline-none
            focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 justify-center rounded-md py-2 px-4 bg-indigo-600
            text-md w-full">Comprar</button></a>
            </form>
      </div>
      <div class="mt-5">
        <p class="text-gray-700 text-xl font-bold">Descrição</p>
        <p class="text-gray-700 mt-2 text-md"><?= wordwrap($produto['DATA']['0']['description'], 500, "<br>"); ?></p>
      </div>
    </div>
  </div>
</div>
<div class="md:container grid place-items-center align-middle items-center mx-auto">

<h1 class="font-medium text-lg -mb-1 mt-2">Do Mesmo Vendedor:</h1>
    <br>
    <div class="grid grid-rows-1 auto-rows-max grid-cols-5 gap-5 items-center mb-20 justify-center">
        <?= $api->CREATE_CARDS_BY_OWNER($produto['DATA']['0']['owner']);  ?>
    </div>
</div>

<style>
    /* .icon-star {
        filter: brightness(0) saturate(100%) invert(77%) sepia(62%) saturate(961%) hue-rotate(359deg) brightness(99%) contrast(90%);
    } */
    .icon-star{
        filter: brightness(0) saturate(100%) invert(87%) sepia(19%) saturate(11%) hue-rotate(39deg) brightness(94%) contrast(100%);
    }
</style>
