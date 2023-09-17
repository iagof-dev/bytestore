<?php

$user = new user();

if (!$user->isLogged())
    return header("Location: /login");

require_once(__DIR__ . "/../api/routes.php");
$api = new API();

?>


<div class="container md:mx-auto ">

    <div class="container grid items-center place-items-center mt-5">
        <div class="flex">
            <img class="rounded-xl w-80 h-64 border-dotted border-2 border-black mr-16 min-w-80 max-w-64 min-h-16" id="imgpreview" src="../Assets/imgs/placeholder.webp" alt="Produto Imagem Preview" title="Produto Imagem Preview">

            <form action="" method="post">

                <label class="font-medium">Titulo:</label><br>
                <input type="text" class="w-96 border-solid border-2 rounded-md border-black focus:border-blue-500" required name="post_title" placeholder="Digite o titulo do anúncio"><br>

                <label class="font-medium">Descrição:</label><br>
                <textarea class="resize-none border-solid border-2 rounded-md border-black focus:border-blue-500" required name="post_description" cols="50" rows="5"></textarea><br>

                <label class="font-medium">Valor:</label><br>
                <input required class="w-96" type="text" name="post_value" id="currency-field" pattern="^\$\d{1,3}(.\d{3})*(\,\d+)?$" data-type="currency" placeholder="R$0,00"><br>

                <label class="font-medium">Categoria:</label><br>
                <select required class="w-96" name="post_category">
                    <option value="0"></option>
                    <?php
                    echo ($api->GET_LIST_CATEGORY());

                    ?>
                </select><br>


                <label class="font-medium">Imagem:</label><br>
                <input onchange="PreviewImage(this);" required type="file" name="post_image" accept="image/png, image/gif, image/jpeg"><br>

                <input class=" w-96 h-8 mt-3 cursor-pointer bg-gradient-to-r from-cyan-500 to-blue-500 transition-colors duration-300 ease-in-out hover:bg-[#a0d4d6] rounded-md text-white font-medium hover:text-black" required type="submit" value="Criar anúncio">
            </form>
        </div>
    </div>
</div>


<script src="https://releases.jquery.com/git/jquery-git.min.js"></script>
<script src="../Assets/js/money-format.js"></script>
<script src="../Assets/js/image-preview.js"></script>