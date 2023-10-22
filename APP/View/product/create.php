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
        echo ("<script>
        Swal.fire({
            title: 'Erro',
            text: 'Preencha todos os campos.',
            icon: 'error',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ok'
          }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/create';
            }
          })
        
        </script>");
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

            if(!$result){
                echo ("<script>
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
                        window.location.href = '/create';
                    }
                  })
                
                </script>");
                exit();
            }

            echo ("<script>
            Swal.fire({
                title: 'Sucesso!',
                text: 'Anúncio criado com sucesso...',
                icon: 'success',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ok'
              }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/';
                }
              })
            
            </script>");

            //echo($unique_name);
        }
    } catch (Exception $ex) {
        echo ($ex->getMessage());
    }

    


    exit();
}




?>


<div class="container md:mx-auto">
    <div class="container grid items-center place-items-center">
        <div class="flex">
            <img class="rounded-xl w-80 h-64 border-dotted border-2 border-black mr-16 min-w-80 max-w-64 min-h-16" id="imgpreview" src="../Assets/imgs/placeholder.webp" alt="Produto Imagem Preview" title="Produto Imagem Preview">

            <form action="/create" method="post" enctype="multipart/form-data">

                <label class="font-medium">Titulo:</label><br>
                <input type="text" class="w-96 h-8 border-solid border-2 rounded-md border-black focus:border-blue-500" required name="post_title" placeholder="Digite o titulo do anúncio"><br>

                <label class="font-medium">Descrição:</label><br>
                <textarea placeholder="Forneça detalhes sobre o seu produto, garantindo que os espectadores do seu anúncio possam fazer escolhas informadas sem qualquer hesitação." class="resize-none border-solid border-2 rounded-md border-black focus:border-blue-500" required name="post_description" cols="50" rows="5"></textarea><br>

                <label class="font-medium">Valor:</label><br>
                <input required class="w-96" type="text" name="post_value" id="currency-field" pattern="^\$\d{1,3}(.\d{3})*(\,\d+)?$" data-type="currency" placeholder="R$0,00"><br>

                <label class="font-medium">Categoria:</label><br>
                <select required class="w-96 rounded-md" name="post_category">
                    <?php
                    echo ((new API())->GET_LIST_CATEGORY());

                    ?>
                </select><br>


                <label class="font-medium">Imagem:</label><br>
                <input class="rounded-lg" onchange="PreviewImage(this);" required type="file" name="post_image" accept="image/png, image/gif, image/jpeg, image/webp"><br>

                <input class=" w-96 h-8 mt-3 cursor-pointer bg-gradient-to-r from-cyan-500 to-blue-500 transition-colors duration-300 ease-in-out hover:bg-[#a0d4d6] rounded-md text-white font-medium hover:text-black" required type="submit" value="Criar anúncio">
            </form>
        </div>
    </div>
</div>


<script src="../Assets/js/money-format.js"></script>
<script src="../Assets/js/image-preview.js"></script>