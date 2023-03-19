<?php
ob_start();
session_start();
error_reporting(E_ALL & ~E_NOTICE);


$user_id = $_SESSION['user_id'];
$user_role = $_SESSION['user_role'];
$user_name = $_SESSION['user_name'];
$user_email = $_SESSION['user_email'];
$user_logged = $_SESSION['user_logged'];


require_once('./Controller/pages.php');
require_once('./Model/header.php');


debug_to_console("ID: " . $user_id);
debug_to_console("Username: " . $user_name);
debug_to_console("Email: " . $user_email);
debug_to_console("Role: " . $user_role);
debug_to_console("Logged: " . $user_logged);


if ($user_logged != "true") {
  header("Location: ../View/login.html");
}
?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>


<link rel="stylesheet" href="../Assets/css/admin.css">


<body>

  <div class="container">
    <div class="grid1">
      <div class="grid1-criaranuncios">
        <a href="/create"><button class="btn btn-primary"><i class="fa-solid fa-plus"></i> Criar anúncio</button></a>
      </div>
      <div class="grid1-anuncios">
        <div class="center">
          <h1 style="font-size: 32px !important;">Anúncios:</h1>
        </div><br>
        <div class="pageanuncios">
        <div class="block">

          <!--<div class="prods">
        <div class="prod">
             <div class="prod-img">
              <img width="120px" src="XXXXXXXXXX">
            </div>
            <div class="prod-info">
              <div class="prod-title">
                  <h1>Anuncio Top</h1>
              </div>
              <div class="prod-desc">
                  <p>Descrição do anuncio</p>
              </div>
            </div>
            <div class="prod-value">
              <div class="prod-price">
                <h2>R$0.00</h2>
              </div>
              <div class="prod-bt-edit">
                <button href="#" class="btn btn-primary">Editar</button>
              </div>
            </div>
        </div>
        </div> -->

            <?php

            require_once('./Model/header.php');

            echo (user_get_products());

            ?>
          </div>

        </div>
      </div>

      <div class="grid1-list-paginas">
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">Próximo</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</body>


</html>