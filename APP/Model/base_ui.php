<?php

$logged = "";

if ($_SESSION['user_logged'] == "false" or $_SESSION['user_logged'] == false) {
    $logged = "<a class='nav-link' href='/login'><i class='fa-sharp fa-solid fa-door-closed'></i> Login</a>";
} else {
    switch ($_SESSION['user_role']) {
        case 'admin':
            $logged = '<li class="nav-item dropdown"><button class="btn btn-dark dropdown-toggle nav-link" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: transparent !important; border: none;"><i class="fa-solid fa-user"></i> Teste</button><ul class="dropdown-menu dropdown-menu-dark"><li><a class="dropdown-item" href="/profile/?id=1"><i class="fa-solid fa-user"></i> Perfil</a></li><li><a class="dropdown-item" href="/purchases"><i class="fa-solid fa-cart-shopping"></i> Minhas Compras</a></li><li><a class="dropdown-item" href="/admin"><i class="fa-solid fa-gear"></i> Meus Anúncios</a></li><li><a class="dropdown-item" href="/logout"><i class="fa-solid fa-door-open"></i> Sair</a></li></ul></li>';
            break;
        case 'seller':
            $logged = '<li class="nav-item dropdown"><button class="btn btn-dark dropdown-toggle nav-link" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: transparent !important; border: none;"><i class="fa-solid fa-user"></i> Teste</button><ul class="dropdown-menu dropdown-menu-dark"><li><a class="dropdown-item" href="/profile/?id=1"><i class="fa-solid fa-user"></i> Perfil</a></li><li><a class="dropdown-item" href="/purchases"><i class="fa-solid fa-cart-shopping"></i> Minhas Compras</a></li><li><a class="dropdown-item" href="/admin"><i class="fa-solid fa-gear"></i> Meus Anúncios</a></li><li><a class="dropdown-item" href="/logout"><i class="fa-solid fa-door-open"></i> Sair</a></li></ul></li>';
            break;
        case 'user':
            $logged = '<li class="nav-item dropdown">  <button class="btn btn-dark dropdown-toggle nav-link" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: transparent !important; border: none;"><i class="fa-solid fa-user"></i> Teste</button>  <ul class="dropdown-menu dropdown-menu-dark">  <li><a class="dropdown-item" href="/profile/?id=1"><i class="fa-solid fa-user"></i> Perfil</a></li>  <li><a class="dropdown-item" href="/purchases"><i class="fa-solid fa-cart-shopping"></i> Minhas Compras</a></li>  <li><a class="dropdown-item" href="/logout"><i class="fa-solid fa-door-open"></i> Sair</a></li>  </ul>  </li>';
            break;
        default:
            break;
    }
}


?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">
<!-- NECESSARY -->

<head>
    <title>ByteStore</title>
    <link rel="shortcut icon" href="./Assets/imgs/logo.webp" type="image/x-icon">
    <link rel="stylesheet" href="../Assets/css/global.css">
    <link rel="stylesheet" href="../Assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Assets/css/sweetalert.min.css">
    <script src="../Assets/js/FA-icons.js"></script>
    <script src="../Assets/js/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js">
    <script src="../Assets/js/jquery-3.6.4.min.js"></script>
    <script src="../Assets/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../Assets/css/aos.css" />
    <script src="../Assets/js/aos.js"></script>
    <script src="../Assets/js/global.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
<!-- NECESSARY -->

<!-- NAVBAR -->
<nav class='navbar bg-body-tertiary'>
    <div class='container'><a class='navbar-brand' href='/'>
            <div class='junto' style='display: flex;'><i style='width: 32px;' class='fa-solid fa-microchip'></i>
                <h1 style='height: 5px !important; font-size: 17px !important;'>Byte Store</h1>
            </div>
        </a>
        <div class="nav">
            <a class='nav-link' href="/cart"><i class="fa-solid fa-cart-shopping"></i></a>

            <?php echo ($logged); ?>



        </div>
    </div>
</nav>
<!-- NAVBAR -->


<!-- FLOATING FOOTER -->
<nav class='navbar fixed-bottom navbar-expand-lg  footer-cor'>
    <div class='container-fluid'>
        <div class='center-text footer-text'>
            <h1 style="font-family: 'Verdana' sans-serif !important; font-weight: bold !important;"><i class='fa-solid fa-bolt'></i> Feito por <a style='text-decoration: none;' href='/credits'>@N3rdyDzn</a> - 2023</h1>
        </div>
    </div>
</nav>