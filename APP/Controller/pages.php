<?php
ob_start();
session_start();
error_reporting(0);

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($url) {
    case '/':
        include('./View/home.php');
        break;
    case '/product':
        include('./View/product.php');
        break;
    case '/login':
        include('./View/login.php');
        break;
    case '/register':
        include('./View/register.php');
        break;

    case '/profile/':
        include('./View/profile.php');
        break;

    case '/teste':
        include('./View/teste.php');
        break;

    case '/credits':
        include('./View/credits.html');
        break;
    case '/tos':
        include('./View/tos.html');
        break;
    case '/verify':
        include('./Model/header.php');
        break;
    case '/admin':
        include('./View/admin.php');
        break;
    case '/modify':
        include('./View/edit_product.php');
        break;

    case '/payment':
        include('./Model/payment.php');
        break;    

    case '/purchases':
        include('./View/purchase.php');
        break;
    
    case '/success':
        include('./View/success.php');
        break;

    case '/details':
        include('./View/details.php');
        break;

    case '/create':
        include('./View/create.php');
        break;
    case '/delete':
        include('./Controller/delete.php');
        break;
    case '/logout':
        include('./Controller/logout.php');
        break;
    case '/edit':
        include('./View/edit_profile.php');
        break;
    default:
        include('./error.html');
        break;
}



?>