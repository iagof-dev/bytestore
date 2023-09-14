<?php

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($url) {

    case "/":
        //pagina inicial
        require("./View/home.php");
        break;

    case "/login":
        require("./View/login.php");
        break;
    case "/teste":
        require("./View/loading.php");
        break;

    case "/logout":
        require("./Controller/logout.php");
        header("Location /");
        break;
    default:
        require("./View/404.php");
        break;
}
