<?php


include_once(__DIR__ . "/../Model/usuario.php");

//Se usuário tiver logado, redirecionar para a página inicial
$user = new user();
if ($user->isLogged())
    header('Location: /');



//Se o método for POST, fazer a requisição de login
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include_once(__DIR__ . "/../api/routes.php");
    $api = new API();
    $result = $api->MAKE_LOGIN_REQUEST($_POST['user_email'], $_POST['user_pass']);


    if (!$result) {
        echo ("<script>
        setTimeout(function() {
                window.location.href = '/login?error=1';
            }, 1000);
        Swal.fire({
            title: 'Erro',
            text: 'Credenciais inválidas. Verifique e tente novamente.',
            icon: 'error',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ok'
          }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/login?error=1';
            }
          })
        
        </script>");
        exit();
    }

    echo ("
    <script>
        setTimeout(function() {
            window.location.href = '/';
        }, 1000);
        Swal.fire({
            title: 'Sucesso!',
            text: 'Autenticado com êxito, redirecionando...',
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
}


?>

<div class="md:container w-screen md:mx-auto">
    <div class="w-screen text-center md:container grid items-center place-items-center">
        <div class="bg-[#FFFFFF] shadow-md rounded-lg mt-20 w-[30rem] h-64">
            <form action="/login" method="post">
                <h1 class="font-bold text-xl mt-4">Logar-se</h1>
                <?php
                if (isset($_GET['error'])) echo "<p class='text-red-500'>Seu e-mail e/ou senha estão incorretas, tente novamente</p>";
                ?>
                <label class="font-medium text-start">Correio Eletrônico:</label><br>
                <input class="border-solid border-2 rounded-md border-black focus:border-blue-500" type="email" required class="rounded" placeholder="Digite o e-mail" name="user_email"><br>
                <label class="font-medium text-start">Senha:</label><br>
                <input type="password" required class="border-solid border-2 rounded-md border-black focus:border-blue-500" name="user_pass" placeholder="*********" id=""><br>
                <h5>Não possui cadastro? <a href="/register" class="underline text-blue-500">Registre-se</a></h5>
                <input type="submit" class="w-28 rounded h-10 m-1 ml-3 mt-1 cursor-pointer bg-gradient-to-r from-cyan-500 to-blue-500 transition-colors duration-300 ease-in-out hover:bg-[#a0d4d6] text-white font-medium hover:text-black" value="Entrar">
            </form>
        </div>
    </div>
</div>