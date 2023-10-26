<?php

$pfp = $user->getPfp();

if (empty($pfp) || !isset($pfp)) {
    $pfp = "../../Assets/imgs/user-ph.webp";
}


?>
<div class="container flex mx-auto h-auto pt-5">

    <?php include_once(__DIR__ . "/../../etc/menu/user_menu.php"); ?>

    <div class="ml-16">
        <div class="grid items-center place-items-center w-full">
            <h1 class="font-medium text-2xl items-center w-full place-items-center align-middle">Alterar cadastro:</h1>
            <div class="grid items-center place-items-center mt-5">
                <form method="post" enctype="multipart/form-data">
                    <div class="pfp">
                        <label for="file_pfp">
                            <img id="imgpreview" src="<?= $pfp ?>" alt="Profile Picture" class="rounded-full w-32 h-32">
                        </label>
                        <input  onchange="PreviewImage(this);" required type="file" accept="image/png, image/gif, image/jpeg, image/webp" class="hidden" id="file_pfp" name="file_pfp">
                    </div>

                    <div class="info">
                        <label>Nome de Exibição:</label>
                        <input type="text" name="name_store" placeholder="nome da loja"><br>
                        <label>Descrição da loja:</label>
                        <textarea type="text" rows="5" maxlength="350" cols="40" name="desc_store"  placeholder="Descrição da Loja" class="resize-none"></textarea>

                    </div>


                </form>
            </div>
        </div>
    </div>
</div>


<script src="../../Assets/js/image-preview.js"></script>