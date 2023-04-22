<?php

require_once('./Model/header.php');
require_once('./DAO/database.php');

//pegando id do usuário
$modify_id = $_GET['id'];
$logged_id = $_SESSION['user_id'];


// verificação se o id do usuário logado é o mesmo do usuário que está sendo modificado
if ($logged_id != $modify_id) {
    header('Location: /');
}
// Informações que foram alteradas
$old_img = $_GET['img'];
$new_pfp = $_POST['animg'];
$new_name = $_POST['name'];
$new_desc = $_POST['description'];
$ch_new_pfp = false;
$ch_new_name = false;
$ch_new_email = false;
$ch_new_description = false;

// Comando que será executado no banco de dados
$comando = 'UPDATE users SET ';

//nova imagem
if (isset($_FILES['animg']) && $_FILES['animg']['size'] > 0 && $_FILES['animg']['error'] == 0) {
    $_SESSION['request_sent'] = true;
    $ch_new_pfp = true;

    $dir = './Assets/imgs/users_pfp/';
    $delete_dir = $dir . $old_img;

    //deletar antiga pfp
    if($old_img != 'ph-user.jpg'){
        unlink($delete_dir);
        // echo('<script>alert("img diferente");</script>');
    }

    $ext_img = pathinfo($_FILES['animg']['name'], PATHINFO_EXTENSION);
    $ext_img = strtolower($ext_img);
    if ($ext_img == "gif" or $ext_img == "bmp" or $ext_img == "tiff" or $ext_img == "raw" or $ext_img == "wav" or $ext_img == "avi" or $ext_img == "psd" or $ext_img == "ai" or $ext_img == "docx" or $ext_img == "mov") {
      $_SESSION['request_sent'] = false;
      echo ('<script>swal({title: "Imagem inválida!",text: "Escolha outro arquivo...",type: "error",button: {text: "Fechar",value: true,visible: true,className: "btn btn-primary"}});setTimeout(function(){window.location.href = "/create";}, 1500);</script>');
      exit;
    }
    $uniq_name = uniqid("pfp_") . "." . $ext_img;
    $folder_and_file = $dir . $uniq_name;
    if (move_uploaded_file($_FILES['animg']["tmp_name"], $folder_and_file)) {
      debug_to_console("Arquivo enviado!");
    }
    $comando .= "pfp='". $uniq_name. "'";
}

if(!empty($new_name)){
    $ch_new_name = true;
    if($ch_new_pfp == true){
        $comando .= ", username='". $new_name. "'";
    }
    else{
        $comando .= "username='". $new_name. "'";
    }
}


if(!empty($new_desc)){
    $ch_new_description = true;
    if($ch_new_pfp == true or $ch_new_name == true){
        $comando .= ", description='". $new_desc . "'";
    }
    else{
        $comando .= "description='". $new_desc . "'";
    }
}




//atualizar no banco de dados
if($ch_new_pfp == true or $ch_new_name == true or $ch_new_description == true or $ch_new_email == true){
    $comando .= ' where id='. $logged_id .';';
    //echo($comando);
    $resultado = enviar_comando($comando);
    if ($resultado == false){
        echo ('<script>swal({title: "Erro!",text: "Nome de usuário já existente",type: "error",button: {text: "Fechar",value: true,visible: true,className: "btn btn-primary"}});</script>');
    }
    else{
        if($ch_new_name == true){
            $_SESSION['user_name'] = $new_name;
        }
        echo ('<script>swal({title: "Sucesso!",text: "Informações alteradas foi salva com sucesso...",type: "success",button: {text: "Fechar",value: true,visible: true,className: "btn btn-primary"}});setTimeout(function(){window.location.href = "/profile/?id='. $logged_id .'";}, 2000);</script>');
    }
}


?>

<link rel="stylesheet" href="../Assets/css/edit_profile.css">

<body>
    <div class="container center text-center">

        <div class="col">
            <div class="row">
                <div class="titulo-container">
                    <h1>Edit profile</h1>
                </div>
            </div>
            <div class="row center">
                <div class="box-container">
                    <div class="box text-start">
                        <div class="col bruh">
                            <form enctype="multipart/form-data" action="#" method="POST" action="#">
                                <div class="row">
                                    <span id="imgpreview" class="imgpreview img-fluid"></span>
                                    <label>Profile Picture:</label>
                                    <input id="animg" name="animg" accept="image/*" type="file" class="form-control" placeholder="Imagem">
                                </div>
                                <div class="row">
                                    <label>Editar nome:</label>
                                    <input type="text" name="name" placeholder="<?php echo($_SESSION['user_name']); ?>" class="form-control">
                                </div>
                                <div class="row">
                                    <label>Email:</label>
                                    <input type="email" name="email" class="form-control" placeholder="<?php echo($_SESSION['user_email']); ?>">
                                </div>
                                <div class="row">
                                    <label>Descrição:</label>
                                    <textarea style="resize: none;" type="text" name="description" placeholder="<?php echo($_SESSION['user_desc']); ?>"  class="form-control"></textarea>
                                </div>
                                <div class="row center margin">
                                    <input id="enviar_mudancas" type="submit" class="btn btn-primary" value="💾 Salvar alterações">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="../Assets/js/file_preview.js"></script>
<script src="../Assets/js/confirmation.js"></script>

</html>
