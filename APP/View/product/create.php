<?php


if (!(new user())->isLogged())
    return header("Location: /login");


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $img = $_FILES['post_image'];
    $title = $_POST['post_title'];
    $description = $_POST['post_description'];
    $value = $_POST['post_value'];
    $category = $_POST['post_category'];


    if (!isset($img) || !isset($title) || !isset($description) || !isset($value) || !isset($category) || empty($description) || empty($img) || empty($title) || empty($value) || empty($category)) {
        echo ("<script> Swal.fire({ title: 'Erro', text: 'Preencha todos os campos.', icon: 'error', showCancelButton: false, confirmButtonColor: '#3085d6', cancelButtonColor: '#d33', confirmButtonText: 'Ok' }).then((result) => { if (result.isConfirmed) { window.location.href = '/create'; } }) </script>");
        exit();
    }
    try {
        $converted_price = str_replace(",", ".", str_replace(".", "", $value));
        $converted_price = str_replace("R$", "", $converted_price);

        $DIRECTORY_IMAGE =  __DIR__ . "/../../Assets/imgs/products/";

        if (!is_dir($DIRECTORY_IMAGE))
            throw new Exception("Diretorio não existe");

        if (is_executable($_FILES['post_image']['tmp_name']))
            throw new Exception("Arquivo é executável");

        $ext_file = pathinfo($_FILES['post_image']['name'], PATHINFO_EXTENSION);

        $unique_name = uniqid("product_") . "." . $ext_file;

        $NAME_SAVE_FILE = $DIRECTORY_IMAGE . $unique_name;

        if (move_uploaded_file($_FILES['post_image']['tmp_name'], $NAME_SAVE_FILE)) {

            $result = (new API())->CREATE_PRODUCT($title, $description, $converted_price, $category, $unique_name, (new user())->getId());

            if (!$result) {
                echo ("<script> Swal.fire({ title: 'Erro', text: 'Houve um erro interno, tente novamente mais tarde.', icon: 'error', showCancelButton: false, confirmButtonColor: '#3085d6', cancelButtonColor: '#d33', confirmButtonText: 'Ok' }).then((result) => { if (result.isConfirmed) { window.location.href = '/create'; } }) </script>");
                die();
            }

            echo ("<script> Swal.fire({ title: 'Sucesso!', text: 'Anúncio criado com sucesso...', icon: 'success', showCancelButton: false, confirmButtonColor: '#3085d6', cancelButtonColor: '#d33', confirmButtonText: 'Ok' }).then((result) => { if (result.isConfirmed) { window.location.href = '/'; } }) </script>");
        }
    } catch (Exception $ex) {
        echo ($ex->getMessage());
    }
    die();
}
?>




<div class="container grid place-items-center align-middle items-center mx-auto">
    <div class="bg-white pt-6 pb-12 w-[76rem] max-h-full min-h-[37rem] h-auto rounded shadow-2xl text-gray-900 font-sans">
        <div class="mx-auto max-w-6xl">

            <div>
                <a href="javascript:window.history.back();"><img src="../../Assets/imgs/icons/solid/arrow-left.svg" alt="Voltar" title="Voltar"></a>
            </div>

            <div class="items-center justify-center pb-3 flex">
                <p class="font-bold text-3xl">Criar anúncio</p>
            </div>
            <div class="items-start py-8 flex">
                <div class="ml-[3rem] h-[20rem] w-[30rem] rounded-t-md pr-3">
                    <img id="imgpreview" src="../Assets/imgs/placeholder.webp" alt="Produto Imagem Preview" title="Pré Visualização da imagem do produto" class="rounded w-full h-full rounded-t-md shadow-lg" />
                </div>
                <form class="w-1/2 pl-3 flex flex-col space-y-5" action="/create" method="post" enctype="multipart/form-data">
                    <div class="flex flex-col">
                        <label for="titulo" class="text-sm text-gray-600 mb-1">Titulo</label>
                        <input type="text" required id="titulo" name="post_title" class="focus:border-indigo-700 focus:outline-none
            focus:shadow-outline flex-grow transition duration-200 appearance-none p-2 border-2 border-gray-300
            text-black bg-gray-100 font-normal w-full h-12 text-xs rounded-md shadow-sm" />
                    </div>
                    <div class="flex flex-col">
                        <label for="descricao" class="text-sm text-gray-600 mb-1">Descrição</label>
                        <textarea id="descricao" name="post_description" required class="text-black bg-gray-100 font-normal w-full h-32 text-xs
            rounded-md shadow-sm focus:border-indigo-700 focus:outline-none focus:shadow-outline flex-grow transition
            duration-200 appearance-none p-2 border-2 border-gray-300 resize-none"></textarea>
                    </div>
                    <div class="flex flex-col">
                        <label for="valor" class="text-sm text-gray-600 mb-1">Valor</label>
                        <input type="text" required name="post_value" id="currency-field" pattern="^\$\d{1,3}(.\d{3})*(\,\d+)?$" data-type="currency" placeholder="R$0,00" class="focus:border-indigo-700 focus:outline-none
            focus:shadow-outline flex-grow transition duration-200 appearance-none p-2 border-2 border-gray-300
            text-black bg-gray-100 font-normal w-full h-12 text-xs rounded-md shadow-sm" />
                    </div>
                    <div class="flex flex-col">
                        <label for="categoria" class="text-sm text-gray-600 mb-1">Categoria</label>
                        <select name="post_category" required fontfamily="Arial" type="select-one" class="focus:border-indigo-700 focus:outline-none
            focus:shadow-outline flex-grow transition duration-200 appearance-none p-2 border-2 border-gray-300
            text-black bg-gray-100 font-normal w-full h-12 text-xs rounded-md shadow-sm">
                            <?= ((new API())->GET_LIST_CATEGORY()); ?>
                        </select>
                    </div>
                    <div class="flex flex-col">
                        <label for="imagem" class="text-sm text-gray-600 mb-1">Clique aqui para enviar uma imagem.</label>
                        <label class="items-center justify-between w-full flex space-x-2">
                            <span class="text-xs text-gray-500">Selecione uma imagem</span>
                            <input required class="hidden" onchange="PreviewImage(this);" required type="file" name="post_image" accept="image/png, image/gif, image/jpeg, image/webp" />
                        </label>
                    </div>
                    <input fontfamily="Arial" type="submit" class="inline-flex border focus:outline-none cursor-pointer
            justify-center rounded-md py-2 px-4 bg-gradient-to-r from-cyan-500 to-blue-500 transition-colors duration-300 ease-in-out hover:bg-[#a0d4d6] text-white hover:border-2 hover:border-[#0074FF]
            text-sm font-medium shadow-sm" value="Criar anúncio"></input>
                </form>

            </div>
        </div>
    </div>
</div>




<script src="../Assets/js/money-format.js"></script>
<script src="../Assets/js/image-preview.js"></script>