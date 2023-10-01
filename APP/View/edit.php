<?php

$user = new user();

if (!$user->isLogged())
    return header("Location: /login");

require_once(__DIR__ . "/../api/routes.php");
$api = new API();


$id = '';
$title = '';
$desc = '';
$value = '';
$category = '';
$image = '';


if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $id = $_GET['id'];
    $title = $_GET['title'];
    $desc = $_GET['desc'];
    $value = $_GET['price'];
    $category = $_GET['category'];
    $image = "../Assets/imgs/products/" . $_GET['img'];
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $title = $_POST['UP_TITLE'];
    $desc = $_POST['UP_DESC'];
    $value = $_POST['UP_PRICE'];
    $category = $_POST['UP_CATEGORY'];
    $image = $_FILES['UP_IMAGE'];

    $api->MAKE_UPDATE_POST_REQUEST($title, $desc, $value, $category, $image);
}

?>

<div class="container md:mx-auto ">

    <div class="container grid items-center place-items-center mt-5">
        <div class="flex">
            <img class="rounded-xl w-80 h-64 border-dotted border-2 border-black mr-16 min-w-80 max-w-64 min-h-16" id="imgpreview" src="<?= $image ?>" alt="Produto Imagem Preview" title="Produto Imagem Preview">

            <form action="/editar?id=<?= $id ?>" method="post" enctype="multipart/form-data">

                <label class="font-medium pt-1">Titulo:</label><br>
                <input type="text" class="w-96 h-8 border-solid border-2 rounded-md border-black focus:border-blue-500" name="UP_TITLE" placeholder="<?= $title ?>"><br>

                <label class="font-medium pt-1">Descrição:</label><br>
                <textarea placeholder="<?= $desc ?>" class="resize-none border-solid border-2 rounded-md border-black focus:border-blue-500" name="UP_DESC" cols="50" rows="5"></textarea><br>

                <label class="font-medium pt-1">Valor:</label><br>
                <input class="w-96" type="text" name="UP_PRICE" id="currency-field" pattern="^\$\d{1,3}(.\d{3})*(\,\d+)?$" data-type="currency" placeholder="R$<?= $value ?>"><br>

                <label class="font-medium pt-1">Imagem:</label><br>
                <input class="rounded-lg" onchange="PreviewImage(this);" type="file" name="post_image" accept="image/png, image/gif, image/jpeg"><br>

                <input id="btnEdit" class=" w-96 h-8 mt-3 cursor-pointer bg-gradient-to-r from-cyan-500 to-blue-500 transition-colors duration-300 ease-in-out hover:bg-[#a0d4d6] rounded-md text-white font-medium hover:text-black" type="submit" value="Editar anúncio">
            </form>
        </div>
    </div>
</div>




<script src="../Assets/js/money-format.js"></script>
<script src="../Assets/js/image-preview.js"></script>
<script src="../Assets/js/edit.js"></script>
