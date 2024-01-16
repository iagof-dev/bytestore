<?php

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($url) {

    case "/":
        return require(__DIR__ . "/../View/home.php");

    case "/login":
        return require(__DIR__ . "/../View/login.php");

    case "/campaigns":
        return require(__DIR__ . "/../View/panel/campaign.php");

    case "/logout":
        return require(__DIR__ . "/../Controller/logout.php");

    case "/editar":
        return require(__DIR__ . "/../View/product/edit.php");

    case "/deletar":
        return require(__DIR__ . "/../Controller/delete.php");

    case "/create":
        return require(__DIR__ . "/../View/product/create.php");

    case "/buy":
        return require(__DIR__ . "/../View/product/buy.php");

    case "/anuncio":
        return require(__DIR__ . "/../View/product/view.php");

    case "/purchases":
        return require(__DIR__ . "/../View/panel/purchases.php");

    case "/teste":
        return require(__DIR__ . "/../View/teste.php");

    case "/register":
        return require(__DIR__ . "/../View/register.php");

    case "/profile":
        return require(__DIR__ . "/../View/profile/view.php");

    case "/profile/edit":
        return require(__DIR__ . "/../View/profile/edit.php");

    case "/tos":
        return require(__DIR__ . "/../View/tos.html");

    default:
        return require(__DIR__ . "/../View/404.php");
}
