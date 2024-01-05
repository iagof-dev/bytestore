<?php
$api = new api();
$produto = $api->GET_PRODUCT_BY_ID($_GET['id']);
$user_id = $produto['DATA']['0']['owner'];
$owner = $api->GET_USER_BY_ID($user_id);
$user = new user();

$userAccessID = $user->getID();

echo("<script>console.debug('ID ACESSADO: ". $userAccessID ."');</script>");


if (empty($produto['DATA']['0'])) {
    echo("<script>console.log('deu ruim');</script>");
    return header("Location: /");
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if($user_id == $user->getId()){
        echo("<script>
        Swal.fire({
            title: 'Erro',
            text: 'Você não pode comprar seu próprio anúncio.',
            icon: 'error',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ok'
          }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/anuncio?id=".$_GET['id']."';
            }
          })
        </script>");
        return;
    }

    // if($user->getID() == "" || $user->getID() == " "){
    //     header("Location: /login");
    //     return;
    // }


    $id_created = $api->CREATE_GATEWAY_PAYMENT($_GET['id'], $produto['DATA']['0']['owner'], $userAccessID, $user->getEmail());
    //$link = $api->CREATE_PAYMENT_LINK($_GET['id'], $produto['DATA']['0']['title'], $produto['DATA']['0']['description'], $produto['DATA']['0']['price'], $produto['DATA']['0']['owner'], $user->getId(), $user->getEmail(), $produto['DATA']['0']['id_category'], 1);
    header("Location: /buy?id=". $id_created);
    //echo("<script>console.log('ID: ". $id_created ."');</script>");

}

?>


<div class="md:container grid place-items-center align-middle items-center mx-auto">

    <div class="mt-3 w-[70rem] max-h-full min-h-[37rem] h-auto rounded-lg bg-gradient-to-r from-[#303030] to-[#404040] md:mx-auto justify-center shadow-xl">
        <div class="mt-10 grid items-center place-items-center">

            <div class="container w-10 -ml-[65rem] -mt-5 -mb-3 rounded-full">
                <a href="javascript:history.go(-1)"><img title="Voltar" src="../Assets/imgs/icons/solid/arrow-left.svg" class="invert h-8"></a>
            </div>

            <div class="flex">
                <div class="col-auto mr-44">
                    <img src="../Assets/imgs/products/<?= $produto['DATA']['0']['image']; ?>" class="rounded-md shadow-xl border-black border-2" width="350rem" height="350rem">
                </div>
                <div class="col-auto ml-2 mt-8">
                    <div class="row-auto ">
                        <h1 class="text-gray-100 font-semibold text-md"><?= wordwrap($produto['DATA']['0']['title'], 50, "<br />\n"); ?></h1>
                    </div>
                    <div class="row-auto flex mt-1">
                        <div class="stars flex align-middle mt-[0.15rem]">
                            <img src="../Assets/imgs/icons/solid/star.svg" class="h-5 icon-star">
                            <img src="../Assets/imgs/icons/solid/star.svg" class="h-5 icon-star">
                            <img src="../Assets/imgs/icons/solid/star.svg" class="h-5 icon-star">
                            <img src="../Assets/imgs/icons/solid/star.svg" class="h-5 icon-star">
                            <img src="../Assets/imgs/icons/solid/star.svg" class="h-5 icon-star">
                        </div>
                        <span class="text-gray-50 align-middle ">(0 avaliações)</span>
                    </div>
                    <div class="row-auto ">
                        <h1 class="text-gray-100">Vendido por: <a href="/profile?id=<?= $user_id ?>"><span class="text-blue-400 underline font-medium text-lg"><?= $owner['DATA']['0']['username'] ?></span></a></h1>
                    </div>
                    <div class="row-auto">
                        <span class="font-medium text-green-600 text-xl">R$ <?= $produto['DATA']['0']['price']; ?></span>
                    </div>

                    <div class="row-auto">
                        <form action="" method="post">
                            <a href="&buy=1"><input type="submit" class="text-ml w-32 rounded h-8 mt-1 cursor-pointer bg-gradient-to-r shadow-xl from-cyan-500 to-blue-500 transition-colors duration-300 ease-in-out hover:bg-[#a0d4d6] text-white font-medium hover:text-black" value="Comprar" /></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <hr class="mt-5 -mb-2 border-[#252525]">
        <div class="container mx-auto grid place-content-center place-items-center mb-12">
            <div class="row-auto mt-5 text-start">
                <span class="text-white text-xl font-medium">Descrição</span>
            </div>
            <div class="row-auto  w-10/12 mt-5 text-start ">
                <span class="font-normal text-gray-100"><?= wordwrap($produto['DATA']['0']['description'], 500, "<br>"); ?></span>
            </div>
        </div>
    </div>

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