<?php
ob_start();
session_start();
error_reporting(E_ALL & ~E_NOTICE);

require_once('./header.php');





?>

 <!DOCTYPE html>
 <html lang="pt-br" data-bs-theme="dark">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 </head>

<link rel="stylesheet" href="./Assets/css/create.css">
<link rel="stylesheet" href="./Assets/css/global.css">
<link rel="stylesheet" href="./Assets/css/bootstrap.min.css">
<link rel="stylesheet" href="https://kit.fontawesome.com/3fc58490c0.css" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/3fc58490c0.js" crossorigin="anonymous"></script>
<script src="./Assets/js/bootstrap.bundle.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
 <body>
 <nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <div class="junto" style="display: flex;">
          <i style="width: 32px;" class="fa-solid fa-microchip"></i>
          <h1 style="height: 5px !important; font-size: 17px;">Byte Store</h1>
        </div>
      </a>
      <div class="nav">
        <a class="nav-link active" href="./"><i class="fa-solid fa-house"></i> Inicio</a>
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
        <?php if(@$_SESSION['user_logged'] != false){echo('<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><i class="fa-solid fa-user"></i> '.$_SESSION['user_name']. '</a><ul class="dropdown-menu"><li><a class="dropdown-item" href="./admin.php"><i class="fa-solid fa-gear"></i> Meus Anúncios</a></li><li><a class="dropdown-item" href="./logout.php"><i class="fa-solid fa-door-open"></i> Sair</a></li></ul></li>');} 
            else{echo('<a class="nav-link" href="./login.html"><i class="fa-sharp fa-solid fa-door-closed"></i> Login</a>');} ?>
      </div>
    </div>
  </nav>
    <div class="container">
    <div class="grid1-create-container center" >
          <form  method="post" onsubmit="showSwal('success-message')" style="width: 450px !important;">

          <div class="grid1-create-antitle">
            <img id="imgpreview" style="border-radius: 10px;display: none; margin-top: 10px;" width="450px" src="./Assets/imgs/placeholder.webp" />
            <input id="imgadjust" style="margin-top: 265px;" type="text" required class="form-control" placeholder="Titulo do Anúncio" aria-describedby="basic-addon1">
          </div>
          <div class="grid1-create-andesc">
            <textarea rows="5" type="text" required class="form-control" placeholder="Descrição do Anúncio" aria-describedby="inputGroup-sizing-lg"></textarea>
          </div>

          <div class="grid1-create-anprice">
            <input id="anvalue" type="number" required class="form-control" min="1" max="1000" placeholder="0,00" aria-describedby="basic-addon1">
          </div>

          <div class="grid1-create-animage">
            <input id="imginput" onchange="update_preview(event);" type="file" required class="form-control" placeholder="Imagem" aria-describedby="basic-addon1">
          </div>

          <div class="grid1-create-angateway" style="padding-bottom: 50px;">
            <input type="text" style="margin-bottom: 5% !important;" required class="form-control" placeholder="Gateway" aria-describedby="basic-addon1">
            <input type="submit" value="Enviar" required class="form-control" placeholder="Gateway" aria-describedby="basic-addon1">
          </div>


          </form>
  </div>

   </div>
 </body>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script src="./Assets/js/create.js"></script>

</html>