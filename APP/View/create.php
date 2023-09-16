<?php

$user = new user();

if(!$user->isLogged())
    return header("Location: /login");

?>


<div class="container md:mx-auto">

    <form action="" method="post">

        <label>Titulo:</label>
        <input type="text" required name="post_title" placeholder="Escreva o titulo do anúncio.">
        <br>

        <label>Descrição:</label>
        <br>
        <textarea required name="post_description" cols="30" rows="5"></textarea>

        <br>
        <label>Valor:</label>
        <input required type="text" name="post_value"  id="currency-field" pattern="^\$\d{1,3}(.\d{3})*(\,\d+)?$" data-type="currency" placeholder="R$0,00">

        <br>
        <label>Titulo:</label>
        <input required type="text" name="">
        <br>
        <label>Imagem:</label>
        <input required type="file" name="post_image" accept="image/png, image/gif, image/jpeg">

        <br>
        <input required type="submit" value="Criar anúncio">
    </form>
</div>


<script src="https://releases.jquery.com/git/jquery-git.min.js"></script>
<script src="../Assets/js/money-format.js"></script>