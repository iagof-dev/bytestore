<?php

require_once('./Model/header.php');
require_once('./DAO/database.php');

$modify_id = $_GET['id'];
$logged_id = $_SESSION['user_id'];

$same_user = false;

if ($logged_id != $modify_id) {
    header('Location: /');
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
                                    <input type="text" name="name" placeholder="Nome" class="form-control">
                                </div>
                                <div class="row">
                                    <label>Email:</label>
                                    <input type="email" name="email" placeholder="Email" class="form-control">
                                </div>
                                <div class="row">
                                    <label>Descrição:</label>
                                    <textarea type="text" name="description" placeholder="Descrição da loja" class="form-control"></textarea>
                                </div>
                                <div class="row center margin">
                                    <input type="submit" class="btn btn-primary" value="💾 Salvar alterações">
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