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
<link rel="stylesheet" href="../Assets/css/global.css">
<link rel="stylesheet" href="../Assets/css/bootstrap.min.css">
<link rel="stylesheet" href="../Assets/css/sweetalert.min.css">
<script src="../Assets/js/FA-icons.js"></script>
<script src="../Assets/js/jquery-3.6.4.min.js"></script>
<script src="../Assets/js/sweetalert.min.js"></script>
<script src="../Assets/js/create.js"></script>
<script src="../Assets/js/bootstrap.bundle.min.js"></script>


<script>
  function load(){
    document.getElementById('imgpreview').setAttribute('width', '450px');
    document.getElementById('imgpreview').setAttribute('height', 'auto');
  }
    
</script>


<body onload="load();">
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
        <?php if(@$_SESSION['user_logged'] != false){echo('<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><i class="fa-solid fa-user"></i> '.$_SESSION['user_name']. '</a><ul class="dropdown-menu"><li><a class="dropdown-item" href="../View/admin.php"><i class="fa-solid fa-gear"></i> Meus Anúncios</a></li><li><a class="dropdown-item" href="../Controller/logout.php"><i class="fa-solid fa-door-open"></i> Sair</a></li></ul></li>');} 
            else{echo('<a class="nav-link" href="../View/login.html"><i class="fa-sharp fa-solid fa-door-closed"></i> Login</a>');} ?>
      </div>
    </div>
  </nav>
    <div class="container">
    <div class="grid1-create-container center" >
          <form action="../Controller/edit.php" method="post" style="width: 450px !important;">

          <div class="grid1-create-antitle">
            <?php
            require_once('../Model/header.php');

            $product = get_prod_specif($_GET['id']);

            
            echo('<img id="imgpreview" style="border: solid; border-style: dotted; border-radius: 10px;display: flex; margin-top: 10px;" width="450px" src="'. $product[4] .'" />');
            
            echo('<input name="anunciotitle" style="margin-top: 10px;" type="text" required class="form-control" placeholder="'. $product[1].'" aria-describedby="basic-addon1">');
            ?>
            </div>
          <div class="grid1-create-andesc">
            <?php
            echo('<textarea name="anunciodesc" rows="5" type="text" required class="form-control" placeholder="'. $product[2] .'" aria-describedby="inputGroup-sizing-lg"></textarea>');
            ?>
          </div>
          

          <div class="grid1-create-anprice">
            <?php
            echo('<input name="anuncioprice" id="anvalue" type="number" required class="form-control" min="1" max="10000" placeholder="'. $product[3]. '" aria-describedby="basic-addon1">');
            ?>
          </div>

          <div class="grid1-create-animage">
            <!--<input id="imginput" name="anuncioimg" onchange="update_preview(event);" type="file" required class="form-control" placeholder="Imagem" aria-describedby="basic-addon1"><-->
            <?php
            echo('<input id="animg" type="text" name="animg" onchange="update_preview(e);" required class="form-control" placeholder="'. $product[4] .'" aria-describedby="basic-addon1">');
            ?>
          </div>

          <div class="grid1-create-angateway" style="padding-bottom: 50px;">
            <?php
            echo('<input type="text" name="gateway" style="margin-bottom: 5% !important;" required class="form-control" placeholder="'. $product[5].'" aria-describedby="basic-addon1">');
            ?>
            <input type="submit" value="✔️ Salvar" required class="form-control" aria-describedby="basic-addon1">
            <?php
            echo('<a style="text-decoration: none; " href="../Controller/delete.php?id='. $_GET['id'] .'"><input  type="button" value="❌ Excluir Anúncio" required class="form-control" style="margin-top 10px !important;" aria-describedby="basic-addon1"></a>');
            ?>
          </div>
          </form>
  </div>

   </div>
 </body>

<script src="../Assets/js/create.js"></script>

</html>