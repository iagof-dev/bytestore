<?php
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($url) {
    case '/':
        include('./View/home.php');
        break;
    case '/register':
        include('./View/register.php');
        break;
    case '/logout':
        include('./Controller/Logout.php');
        break;
    default:
        include('./error.html');
        break;
}
