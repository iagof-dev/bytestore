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
<link rel="stylesheet" href="../Assets/css/global.css">
<link rel="stylesheet" href="../Assets/css/bootstrap.min.css">
<link rel="stylesheet" href="../Assets/css/sweetalert.min.css">
<script src="../Assets/js/FA-icons.js"></script>
<script src="../Assets/js/jquery-3.6.4.min.js"></script>
<script src="../Assets/js/sweetalert.min.js"></script>
<script src="../Assets/js/create.js"></script>
<script src="../Assets/js/bootstrap.bundle.min.js"></script>


<body>
  <nav class="navbar bg-body-tertiary">
    <div class="container">
      <a class="navbar-brand" href="#">
        <div class="junto" style="display: flex;">
          <i style="width: 32px;" class="fa-solid fa-microchip"></i>
          <h1 style="height: 5px !important; font-size: 17px;">Byte Store</h1>
        </div>
      </a>
      <div class="nav">
        <a class="nav-link active" href="/"><i class="fa-solid fa-house"></i> Inicio</a>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><i
              class="fa-solid fa-computer"></i> Computadores</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-laptop"></i> Uso Pessoal</a></li>
            <li><a class="dropdown-item" href="#"><i class="fa-sharp fa-solid fa-gamepad"></i> Gamer</a></li>
            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-briefcase"></i> Workstation</a></li>
            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-server"></i> Servidor</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><i
              class="fa-solid fa-gear"></i> Componentes</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#"><i class="fa-duotone fa-desktop"></i> Gabinete</a></li>
            <li><a class="dropdown-item" href="#"><i class="fa-sharp fa-solid fa-gamepad"></i> Placa de Video (VGA)</a>
            </li>
            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-microchip"></i> Processador</a></li>
            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-memory"></i> Memoria Ram</a></li>
            <li><a class="dropdown-item" href="#"><i class="fa-duotone fa-desktop"></i> Placa Mãe</a></li>
            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-database"></i> Armazenamento</a></li>
            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-fan"></i> Cooler Box</a></li>
            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-fan"></i> Air Cooler</a></li>
            <li><a class="dropdown-item" href="#"><i class="fa-sharp fa-solid fa-droplet"></i> Water Cooler</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><i
              class="fa-solid fa-headset"></i> Periféricos</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-cube"></i> KIT Gamer</a></li>
            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-keyboard"></i> Teclado Gamer</a></li>
            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-computer-mouse"></i> Mouse Gamer</a></li>
            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-desktop"></i> Monitor</a></li>
            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-headset"></i> Headset Gamer</a></li>
            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-fan"></i> Veintoinha Gamer</a></li>
            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-volume-high"></i> Caixa de Som</a></li>
            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-pen"></i> Mesa Digitalizadora</a></li>
            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-print"></i> Impressora</a></li>
            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-screwdriver"></i> Pendrive</a></li>
          </ul>
        </li>
        <a class="nav-link" href="#"><i class="fa-solid fa-phone"></i> Contato</a>
        <?php if (@$_SESSION['user_logged'] != false) {
          echo ('<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><i class="fa-solid fa-user"></i> ' . $_SESSION['user_name'] . '</a><ul class="dropdown-menu"><li><a class="dropdown-item" href="/admin"><i class="fa-solid fa-gear"></i> Meus Anúncios</a></li><li><a class="dropdown-item" href="/logout"><i class="fa-solid fa-door-open"></i> Sair</a></li></ul></li>');
        } else {
          echo ('<a class="nav-link" href="/login"><i class="fa-sharp fa-solid fa-door-closed"></i> Login</a>');
        } ?>
      </div>
    </div>
  </nav>
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