<?php

session_start();


?>
<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<link rel="stylesheet" href="../Assets/css/main.css">
<link rel="stylesheet" href="../Assets/css/aos.css" />
<link rel="stylesheet" href="../Assets/css/global.css">
<link rel="stylesheet" href="../Assets/css/bootstrap.min.css">
<link rel="stylesheet" href="../Assets/css/sweetalert.min.css">
<script src="../Assets/js/FA-icons.js"></script>
<script src="../Assets/js/jquery-3.6.4.min.js"></script>
<script src="../Assets/js/sweetalert.min.js"></script>
<script src="../Assets/js/create.js"></script>
<script src="../Assets/js/bootstrap.bundle.min.js"></script>

<body>  
<nav class="navbar fixed-bottom navbar-expand-lg footer-cor">
  <div class="container-fluid">
    <div class="center-text footer-text">
      <h1><i class="fa-solid fa-bolt"></i> Feito por <a style="text-decoration: none;" href="https://github.com/iagof-dev/">@N3rdyDzn</a> - 2023</h1>
    </div>
  </div>
</nav>
  <nav class="navbar bg-body-tertiary">
    <div class="container">
      <a class="navbar-brand" href="#">
        <div class="junto" style="display: flex;">
          <i style="width: 32px;" class="fa-solid fa-microchip"></i>
          <h1 style="height: 5px !important; font-size: 17px;">Byte Store</h1>
        </div>
      </a>
      <div class="nav">
        <a class="nav-link active" href="../"><i class="fa-solid fa-house"></i> Inicio</a>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><i
              class="fa-solid fa-computer"></i> Computadores</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="laptop"><i class="fa-solid fa-laptop"></i> Uso Pessoal</a></li>
            <li><a class="dropdown-item" href="gamer"><i class="fa-sharp fa-solid fa-gamepad"></i> Gamer</a></li>
            <li><a class="dropdown-item" href="workstation"><i class="fa-solid fa-briefcase"></i> Workstation</a></li>
            <li><a class="dropdown-item" href="Servidor"><i class="fa-solid fa-server"></i> Servidor</a></li>
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

  <div class="container-fluid">
    <div data-aos="zoom-in" data-aos-duration="500" style="padding-top: 5px;" class="container">
      <div id="carouselExample" data-bs-theme="dark" class="carousel carousel-dark slide">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <a href="#"><img src="./Assets/imgs/Banners/1.png" class="d-block w-100"></a>
          </div>
          <div class="carousel-item">
            <a><img src="./Assets/imgs/Banners/2.png" class="d-block w-100"></a>
          </div>
          <div class="carousel-item">
            <a><img src="./Assets/imgs/Banners/3.png" class="d-block w-100"></a>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>


    <div class="container-fluid">

      <div class="container-card">
        <div class="cards">
          <div class="card-1">
            <div data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" class="card"
              style="width: 18rem;">
              <img
                src="https://i0.wp.com/scholarculture.com/wp-content/uploads/2017/07/placeholder-1280x720-whitebg.png"
                class="card-img-top">
              <div class="card-body">
                <h5 class="card-title">Máquina de Café Expresso</h5>
                <p class="card-text">Se você é um amante de café e quer desfrutar de um sabor intenso e autêntico em sua
                  própria casa, a nossa Máquina de Café Expresso é o produto perfeito para você. Com ela, você pode
                  preparar cafés expressos, cappuccinos, lattes e muito mais, com apenas alguns toques.</p>
                <a href="https://google.com" class=" btn btn-primary"><i class="fa-solid fa-cart-shopping"> Comprar</i></a>
              </div>
            </div>
          </div>
          <div class="card-2">
            <div data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" class="card" style="width: 18rem;">
              <img
                src="https://i0.wp.com/scholarculture.com/wp-content/uploads/2017/07/placeholder-1280x720-whitebg.png"
                class="card-img-top">
              <div class="card-body">
                <h5 class="card-title">Máquina de Café Expresso</h5>
                <p class="card-text">Se você é um amante de café e quer desfrutar de um sabor intenso e autêntico em sua
                  própria casa, a nossa Máquina de Café Expresso é o produto perfeito para você. Com ela, você pode
                  preparar cafés expressos, cappuccinos, lattes e muito mais, com apenas alguns toques.</p>
                <a href="#" class="center btn btn-primary"><i class="fa-solid fa-cart-shopping"> Comprar</i></a>
              </div>
            </div>
          </div>
          <div class="card-3">
            <div data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" class="card" style="width: 18rem;">
              <img
                src="https://i0.wp.com/scholarculture.com/wp-content/uploads/2017/07/placeholder-1280x720-whitebg.png"
                class="card-img-top">
              <div class="card-body">
                <h5 class="card-title">Máquina de Café Expresso</h5>
                <p class="card-text">Se você é um amante de café e quer desfrutar de um sabor intenso e autêntico em sua
                  própria casa, a nossa Máquina de Café Expresso é o produto perfeito para você. Com ela, você pode
                  preparar cafés expressos, cappuccinos, lattes e muito mais, com apenas alguns toques.</p>
                <a href="#" class="center btn btn-primary"><i class="fa-solid fa-cart-shopping"> Comprar</i></a>
              </div>
            </div>
          </div>
          <div class="card-4">
            <div data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" class="card" style="width: 18rem;">
              <img
                src="https://i0.wp.com/scholarculture.com/wp-content/uploads/2017/07/placeholder-1280x720-whitebg.png"
                class="card-img-top">
              <div class="card-body">
                <h5 class="card-title">Máquina de Café Expresso</h5>
                <p class="card-text">Se você é um amante de café e quer desfrutar de um sabor intenso e autêntico em sua
                  própria casa, a nossa Máquina de Café Expresso é o produto perfeito para você. Com ela, você pode
                  preparar cafés expressos, cappuccinos, lattes e muito mais, com apenas alguns toques.</p>
                <a href="#" class="center btn btn-primary"><i class="fa-solid fa-cart-shopping"> Comprar</i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


</body>


<script src="../Assets/js/aos.js"></script>
<script>
  AOS.init();
</script>

</html>