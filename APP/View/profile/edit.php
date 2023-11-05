<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$pfp = "../../Assets/imgs/user-ph.webp";

$user_pfp = (new user())->getPFP();

if (isset($user_pfp)) {
    $pfp = "/../../Assets/imgs/users_pfp/" . $user->getPfp();
}

function debug($x)
{
    echo ('<script>console.log("' . $x . '");</script>');
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {

        $id = (new user())->getId();
        $pfp = 0;
        $name = "a";
        $desc = 0;
        if ($_FILES['file_pfp']['error'] != 4 || ($_FILES['file_pfp']['size'] != 0 && $_FILES['file_pfp']['error'] != 0)) {
            $DIRECTORY_IMAGE =  __DIR__ . "/../../Assets/imgs/users_pfp/";

            if (!is_dir($DIRECTORY_IMAGE))
                throw new Exception("Diretorio não existe");

            if (is_executable($_FILES['file_pfp']['tmp_name']))
                throw new Exception("Arquivo é executável");

            $ext_file = pathinfo($_FILES['file_pfp']['name'], PATHINFO_EXTENSION);

            $unique_name = uniqid("user_") . "." . $ext_file;

            $NAME_SAVE_FILE = $DIRECTORY_IMAGE . $unique_name;

            if (move_uploaded_file($_FILES['file_pfp']['tmp_name'], $NAME_SAVE_FILE)) {
                if ($pfp != "../../Assets/imgs/user-ph.webp") {
                    unlink($pfp);
                }
                $pfp = $unique_name;
            }
        }
        if (isset($_POST['name_store'])) {
            $name = $_POST['name_store'];
           
        }
        if (isset($_POST['desc_store'])) {
            $desc = $_POST['desc_store'];
        }


        $result = (new API())->UPDATE_USER($id, $_POST['name_store'], $desc, $pfp);

        if ($result == true) {
            header("Location: /profile?id=" . $id);
        }
    } 
    catch(Exception $e){
        echo($e->getMessage());
    }
    //echo('<script>console.log("'. var_dump($result). '");</script>');


}


?>
<div class="container flex mx-auto h-auto pt-5">

    <?php include_once(__DIR__ . "/../../etc/menu/user_menu.php"); ?>

    <div class="ml-16">
        <div class="grid items-center place-items-center w-full">
            <h1 class="font-medium text-2xl items-center w-full place-items-center align-middle">Alterar cadastro:</h1>
            <div class="grid items-center place-items-center mt-5">
                <form action="/profile/edit" method="post" enctype="multipart/form-data">
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
<script src="../../Assets/js/confirmation.js"></script>