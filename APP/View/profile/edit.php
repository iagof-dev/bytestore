<?php

$pfp = $user->getPfp();

if (empty($pfp) || !isset($pfp)) {
    $pfp = "../../Assets/imgs/user-ph.webp";
}

if ($_GET['confirmed'] == 'false') {
    echo ('<script>alert("NÃO CONFIRMADO");</script>');
}
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      
    }
?>
<div class="container flex mx-auto h-auto pt-5">

    <?php include_once(__DIR__ . "/../../etc/menu/user_menu.php"); ?>

    <div class="ml-16">
        <div class="grid items-center place-items-center w-full">
            <h1 class="font-medium text-2xl items-center w-full place-items-center align-middle">Alterar cadastro:</h1>
            <div class="grid items-center place-items-center mt-5">
                <form action="/profile/edit?confirmed=false" method="post" enctype="multipart/form-data">
                    <div class="pfp">
                        <label for="file_pfp">
                            <img id="imgpreview" src="<?= $pfp ?>" alt="Profile Picture" class="rounded-full w-32 h-32">
                        </label>
                        <input onchange="PreviewImage(this);" type="file" accept="image/png, image/gif, image/jpeg, image/webp" class="hidden" id="file_pfp" name="file_pfp">
                    </div>

                    <div class="info">
                        <label>Nome de Exibição:</label><br>
                        <input class="rounded w-full" type="text" name="name_store" placeholder="<?= (new user())->getName(); ?>"><br>
                        <label>Descrição da loja:</label><br>
                        <textarea class="rounded resize-none" type="text" rows="5" maxlength="350" cols="50" name="desc_store"><?= (new user())->getDesc(); ?></textarea>
                        <br>
                        <input type="submit" class="w-96 h-8 mt-3 cursor-pointer bg-gradient-to-r from-cyan-500 to-blue-500 transition-colors duration-300 ease-in-out hover:bg-[#a0d4d6] rounded-md text-white font-medium hover:text-black" value="Salvar Alterações">

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="../../Assets/js/image-preview.js"></script>
