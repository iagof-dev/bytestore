<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$user = new user();

if (!$user->isLogged())
    return header("Location: /login");


$api = new API();


$id = '';
$title = '';
$desc = '';
$value = '';
$image = '';


if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $id = $_GET['id'];
    $title = $_GET['title'];
    $desc = $_GET['desc'];
    $value = $_GET['price'];
    $image = "../Assets/imgs/products/" . $_GET['img'];
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_GET['id'];
    $title = $_POST['UP_TITLE'];
    $desc = $_POST['UP_DESC'];
    $value = $_POST['UP_PRICE'];
    $converted_price = str_replace(",", ".", str_replace(".", "", $value));
    $converted_price = (float)str_replace("R$", "", $converted_price);
    $image = null;
    $old_image = null;
    require_once(__DIR__ . "/../../Model/usuario.php");
    $user_info = new user();
    $og_product = $api->GET_PRODUCT_BY_ID($_GET['id']);
    if($og_product['DATA']['0']['owner'] != $user_info->getId()){

        echo("<script>
        Swal.fire({
            title: 'Erro',
            text: 'Houve um erro interno, tente novamente mais tarde.',
            icon: 'error',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ok'
          }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/admin';
            }
          })
        
        </script>");

        return false;
    }



    if (isset($_FILES['post_image'])) {
        $old_image = $og_product['DATA']['0']['image'];
        $DIRECTORY_IMAGE =  __DIR__ . "/../../Assets/imgs/products/";
        if (!is_dir($DIRECTORY_IMAGE))
            throw new Exception("Diretorio não existe");
        if (is_executable($_FILES['post_image']['tmp_name']))
            throw new Exception("Arquivo é executável");
        $ext_file = pathinfo($_FILES['post_image']['name'], PATHINFO_EXTENSION);
        $unique_name = uniqid("product_") . "." . $ext_file;
        $FILE_NAME_IMAGE = $DIRECTORY_IMAGE . $unique_name;
        if (move_uploaded_file($_FILES['post_image']['tmp_name'], $FILE_NAME_IMAGE)) {
            $image = $unique_name;
            unlink($DIRECTORY_IMAGE. $old_image);
        }
    }


    $result = $api->MAKE_UPDATE_POST_REQUEST($id, $title, $desc, $converted_price, $image);

    if($result != true){
        echo("<script>
        Swal.fire({
            title: 'Erro',
            text: 'Houve um erro interno, tente novamente mais tarde.',
            icon: 'error',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ok'
          }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/admin';
            }
          })
          setTimeout(function() {
            window.location.href = '/admin';
        }, 1200);
        
        </script>");
    }
    else{
        echo("<script>
        Swal.fire({
            title: 'Sucesso!',
            text: 'Anúncio modificado com sucesso!.',
            icon: 'success',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ok'
          }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/admin';
            }})
            setTimeout(function() {
                window.location.href = '/admin';
            }, 2500);
        </script>");
    }

}

?>



<div class="container flex mx-auto h-auto pt-5">

<?php include_once(__DIR__ . "/../../etc/menu/user_menu.php");?>


    <div class="container grid items-center place-items-center w-auto ml-32 mt-16">
        <div class="flex">
            <img class="rounded-xl w-92 max-w-[100rem] h-64 border-dotted border-2 border-black mr-16 min-w-80 max-w-64 min-h-16" id="imgpreview" src="<?= $image ?>" alt="Produto Imagem Preview" title="Produto Imagem Preview">

            <form action="/editar?id=<?= $id ?>" method="post" enctype="multipart/form-data">

                <label class="font-medium pt-1">Titulo:</label><br>
                <input type="text" class="w-96 h-8 border-solid border-2 rounded-md border-black focus:border-blue-500" name="UP_TITLE" value="<?= $title ?>"><br>

                <label class="font-medium pt-1">Descrição:</label><br>
                <textarea class="resize-none border-solid border-2 rounded-md border-black focus:border-blue-500" name="UP_DESC" cols="50" rows="5"><?= $desc ?></textarea><br>

                <label class="font-medium pt-1">Valor:</label><br>
                <input class="w-96" type="text" name="UP_PRICE" id="currency-field" pattern="^\$\d{1,3}(.\d{3})*(\,\d+)?$" data-type="currency" value="R$<?= $value ?>"><br>

                <label class="font-medium pt-1">Imagem:</label><br>
                <input class="rounded-lg" onchange="PreviewImage(this);" type="file" name="post_image" accept="image/png, image/jpeg, image/webp"><br>

                <input id="btnEdit" class=" w-96 h-8 mt-3 cursor-pointer bg-gradient-to-r from-cyan-500 to-blue-500 transition-colors duration-300 ease-in-out hover:bg-[#a0d4d6] rounded-md text-white font-medium hover:text-black" type="submit" value="Editar anúncio">
            </form>
        </div>
    </div>
</div>




<script src="../Assets/js/money-format.js"></script>
<script src="../Assets/js/image-preview.js"></script>
<script src="../Assets/js/edit.js"></script>