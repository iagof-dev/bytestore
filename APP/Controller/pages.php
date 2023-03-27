<?php
ob_start();
session_start();


error_reporting(E_ALL & ~E_NOTICE);
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($url) {
    case '/':
        include('./View/inicio.php');
        break;

    case '/product':
        include('./View/product.php');
        break;

    case '/login':
        include('./View/login.html');
        break;

    case '/perfil':
        include('./View/perfil.php');
        break;

    case '/verify':
        require('./Model/header.php');
        break;
    case '/admin':
        require('./View/admin.php');
        break;
    case '/edit':
        require('./View/edit.php');
        break;

    case '/payment':
        require('./Model/payment.php');
        break;    

    case '/sdk':
        require('./Model/mercado_pago.php');
        break;

    case '/create':
        require('./View/create.php');
        break;
    case '/created':
        require('./Controller/product_created.php');
        break;
    case '/delete':
        require('./Controller/delete.php');
        break;
    case '/logout':
        require('./Controller/logout.php');
        break;


    default:
        include('./erro.html');
        break;
}



?>