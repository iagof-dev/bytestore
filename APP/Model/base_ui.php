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
                <h1 style='height: 5px !important; font-size: 17px;'>Byte Store</h1>
            </div>
        </a>
        <div class='nav'><a class='nav-link active' href='../'><i class='fa-solid fa-house'></i> Inicio</a>
            <li class='nav-item dropdown'><a class='nav-link dropdown-toggle' data-bs-toggle='dropdown' href='#' role='button' aria-expanded='false'><i class='fa-solid fa-computer'></i> Computadores</a>
                <ul class='dropdown-menu'>
                    <li><a class='dropdown-item' href='#'><i class='fa-solid fa-laptop'></i> Uso Pessoal</a></li>
                    <li><a class='dropdown-item' href='#'><i class='fa-sharp fa-solid fa-gamepad'></i> Gamer</a></li>
                    <li><a class='dropdown-item' href='#'><i class='fa-solid fa-briefcase'></i> Workstation</a></li>
                    <li><a class='dropdown-item' href='#'><i class='fa-solid fa-server'></i> Servidor</a></li>
                </ul>
            </li>
            <li class='nav-item dropdown'><a class='nav-link dropdown-toggle' data-bs-toggle='dropdown' href='#' role='button' aria-expanded='false'><i class='fa-solid fa-gear'></i> Componentes</a>
                <ul class='dropdown-menu'>
                    <li><a class='dropdown-item' href='#'><i class='fa-duotone fa-desktop'></i> Gabinete</a></li>
                    <li><a class='dropdown-item' href='#'><i class='fa-sharp fa-solid fa-gamepad'></i> Placa de Video (VGA)</a></li>
                    <li><a class='dropdown-item' href='#'><i class='fa-solid fa-microchip'></i> Processador</a></li>
                    <li><a class='dropdown-item' href='#'><i class='fa-solid fa-memory'></i> Memoria Ram</a></li>
                    <li><a class='dropdown-item' href='#'><i class='fa-duotone fa-desktop'></i> Placa Mãe</a></li>
                    <li><a class='dropdown-item' href='#'><i class='fa-solid fa-database'></i> Armazenamento</a></li>
                    <li><a class='dropdown-item' href='#'><i class='fa-solid fa-fan'></i> Cooler Box</a></li>
                    <li><a class='dropdown-item' href='#'><i class='fa-solid fa-fan'></i> Air Cooler</a></li>
                    <li><a class='dropdown-item' href='#'><i class='fa-sharp fa-solid fa-droplet'></i> Water Cooler</a>
                    </li>
                </ul>
            </li>
            <li class='nav-item dropdown'> <a class='nav-link dropdown-toggle' data-bs-toggle='dropdown' href='#' role='button' aria-expanded='false'><i class='fa-solid fa-headset'></i> Periféricos</a>
                <ul class='dropdown-menu'>
                    <li><a class='dropdown-item' href='#'><i class='fa-solid fa-cube'></i> KIT Gamer</a></li>
                    <li><a class='dropdown-item' href='#'><i class='fa-solid fa-keyboard'></i> Teclado Gamer</a></li>
                    <li><a class='dropdown-item' href='#'><i class='fa-solid fa-computer-mouse'></i> Mouse Gamer</a>
                    </li>
                    <li><a class='dropdown-item' href='#'><i class='fa-solid fa-desktop'></i> Monitor</a></li>
                    <li><a class='dropdown-item' href='#'><i class='fa-solid fa-headset'></i> Headset Gamer</a></li>
                    <li><a class='dropdown-item' href='#'><i class='fa-solid fa-fan'></i> Veintoinha Gamer</a></li>
                    <li><a class='dropdown-item' href='#'><i class='fa-solid fa-volume-high'></i> Caixa de Som</a></li>
                    <li><a class='dropdown-item' href='#'><i class='fa-solid fa-pen'></i> Mesa Digitalizadora</a></li>
                    <li><a class='dropdown-item' href='#'><i class='fa-solid fa-print'></i> Impressora</a></li>
                    <li><a class='dropdown-item' href='#'><i class='fa-solid fa-screwdriver'></i> Pendrive</a></li>
                </ul>
            </li><a class='nav-link' href='#'><i class='fa-solid fa-phone'></i> Contato</a>


            <?php
            if ($_SESSION['user_logged'] == "false" or $_SESSION['user_logged'] == false) {
                echo ("<a class='nav-link' href='/login'><i class='fa-sharp fa-solid fa-door-closed'></i> Login</a></div>     </div> </div></div></nav>");
            } else {
                echo (' <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false"><i class="fa-solid fa-user"></i> ' . $_SESSION['user_name'] . '</a>');
                echo ('<ul class="dropdown-menu">');
                echo ('<li><a class="dropdown-item" href="/profile/?id=' . $_SESSION['user_id'] . '"><i class="fa-solid fa-user"></i> Perfil</a></li>');
                echo ('<li><a class="dropdown-item" href="/purchases"><i class="fa-solid fa-cart-shopping"></i> Minhas Compras</a></li>');
                switch ($_SESSION['user_role']) {
                    case 'seller':
                        echo ('<li><a class="dropdown-item" href="/admin"><i class="fa-solid fa-gear"></i> Meus Anúncios</a></li>');
                        break;
                    case 'admin':
                        echo ('<li><a class="dropdown-item" href="/admin"><i class="fa-solid fa-gear"></i> Meus Anúncios</a></li>');
                        break;
                    case 'user':
                        break;
                }
                echo ('<li><a class="dropdown-item" href="/logout"><i class="fa-solid fa-door-open"></i> Sair</a></li>');
            }

            ?>

            </ul>
            </li>



        </div>
    </div>
</nav>
<!-- NAVBAR -->


<!-- FLOATING FOOTER -->
<nav class='navbar fixed-bottom navbar-expand-lg  footer-cor'>
    <div class='container-fluid'>
        <div class='center-text footer-text'>
            <h1><i class='fa-solid fa-bolt'></i> Feito por <a style='text-decoration: none;' href='/credits'>@N3rdyDzn</a> - 2023</h1>
        </div>
    </div>
</nav>