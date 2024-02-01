<?php

if ((new user())->isLogged())
  return header("Location: /");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $result = (new API())->MAKE_REGISTER_REQUEST($_POST['user_name'], $_POST['user_email'], $_POST['user_pass']);

  if (!$result) {
    echo ("<script>
        Swal.fire({
            title: 'Erro',
            text: 'Usuário ou Email já cadastrado!',
            icon: 'error',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ok'
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = '/register';
            }
          })
          </script>");
    exit(1);
  }

  echo ("<script>
    Swal.fire({
        title: 'Sucesso!',
        text: 'Suas informações foram cadastradas, faça o login para continuar',
        icon: 'success',
        showCancelButton: false,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ok'
      }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '/login';
        }
      })
      </script>");
}

?>

<div class="md:container w-screen md:mx-auto">
  <div class="w-screen text-center md:container grid items-center place-items-center">
    <div class="bg-[#FFFFFF] shadow-md rounded-lg mt-20 w-[35rem] h-80">
      <form action="/register" method="post">

        <div class="container -mb-2 ml-5 mt-2 h-5 rounded-full">
          <a href="javascript:history.go(-1)"><img title="Voltar" class="h-8" src="../Assets/imgs/icons/solid/arrow-left.svg"></a>
        </div>

        <h1 class="font-bold text-xl mt-4">Registrar-se</h1>

        <label class="font-medium text-start">Nome de Usuário:</label><br>
        <input placeholder="Digite o nome" class="border-solid border-2 rounded-md border-black focus:border-blue-500" required type="text" name="user_name"><br>

        <label class="font-medium text-start">Correio Eletrônico:</label><br>
        <input placeholder="Digite o e-mail" class="border-solid border-2 rounded-md border-black focus:border-blue-500" required type="email" name="user_email"><br>

        <label class="font-medium text-start">Senha:</label><br>
        <input placeholder="******" class="border-solid border-2 rounded-md border-black focus:border-blue-500" required type="password" name="user_pass"><br>

        <h5>Ao se registrar você concorda com os <a href="/tos" class="underline text-blue-500">Termos de Uso.</a></h5>

        <input type="submit" class="w-28 rounded h-10 m-1 ml-3 mt-1 cursor-pointer bg-gradient-to-r from-cyan-500 to-blue-500 transition-colors duration-300 ease-in-out hover:bg-[#a0d4d6] text-white font-medium hover:text-black" value="Registrar">
      </form>

    </div>
  </div>
</div>