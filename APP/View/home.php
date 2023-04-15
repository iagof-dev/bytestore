<?php
ob_start();
session_start();
error_reporting(E_ALL & ~E_NOTICE);
require_once('./DAO/database.php');
$_SESSION['request_sent'] = false;
?>


<link rel="stylesheet" href="../Assets/css/main.css">
<link rel="stylesheet" href="../Assets/css/aos.css">

<body>

  <div class="container-fluid text-center">
    <div style="margin-top:10px; margin-bottom: 3%;"
      style="padding-top: 5px;" class="container">
      <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./Assets/imgs/banners/1.webp" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="./Assets/imgs/banners/2.webp" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="./Assets/imgs/banners/3.webp" class="d-block w-100">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Anterior</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Proximo</span>
  </button>
</div>
    </div>
    
    <h1 style="font-size: 2vh !important; font-weight: bold; font-family: var(--fonte-montserrat) !important;">Recomendado para você:</h1>
    <div class="center">
      <div style="margin-bottom: 3%;" class="row">
        <?php $anuncios = get_5_random_products(); echo($anuncios); ?>
    </div>





  </div>
</body>

<script src="../Assets/js/aos.js"></script>
<script>
  AOS.init();
</script>

</html>