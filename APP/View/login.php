<?php

$user = new user();

$id = $user->getId();
if (isset($id)) {
    header('Location: /');
}

?>

<div class="md:container w-screen md:mx-auto">
    <div class="w-screen text-center md:container grid items-center place-items-center">
        <div class="bg-[#FFFFFF] shadow-md rounded-lg mt-20 w-[30rem] h-52">
            <form action="../Controller/login.php" method="post">
                <h1 class="font-bold text-xl">Logar-se</h1>
                <?php
                if (isset($_GET['error'])) {
                    echo "<p class='text-red-500'>Seu e-mail e/ou senha estão incorretas, tente novamente</p>";
                }
                ?>
                <label class="font-medium text-start">Correio Eletrônico:</label><br>
                <input class="border-solid border-2 rounded-md border-black focus:border-blue-500" type="email" required class="rounded" placeholder="Digite o e-mail" name="user_email"><br>
                <label class="font-medium text-start">Senha:</label><br>
                <input type="password" required class="border-solid border-2 rounded-md border-black focus:border-blue-500" name="user_pass" placeholder="*********" id=""><br>
                <h5>Não possui cadastro? <a href="/register" class="underline text-blue-500">Registre-se</a></h5>
                <input type="submit" class="w-28 rounded h-10 m-1 bg-red-500 cursor-pointer ml-3 mt-1 transition-colors duration-500 ease-in-out hover:bg-red-600 text-white" value="Entrar">
            </form>
        </div>
    </div>
</div>