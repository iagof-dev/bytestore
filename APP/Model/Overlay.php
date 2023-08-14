<?php

include_once("./Model/UserData.php");

$login_error = false;
$register_error = false;

$user = new user();


if (isset($_GET['login']) && isset($_GET['error']) == 'true') {
    $login_error = true;
} elseif (isset($_GET['login'])) {
    if (!empty($user->getId())) {
        header("Location: /");
    } else {
        include("./View/login.php");
    }
}

if (isset($_GET['register']) && isset($_GET['error']) == 'true') {
    $register_error = true;
} elseif (isset($_GET['register'])) {
    if (!empty($user->getId())) {
        header("Location: /");
    } else {
        include("./View/register.php");
    }
}


if ($login_error == true) {
    echo ("<script>Swal.fire({title: 'Erro!',text: 'Verifique email ou senha informado.',icon: 'error',confirmButtonText: 'Ok'});</script>");
}
if ($register_error == true) {
    echo ("<script>Swal.fire({title: 'Erro!',text: 'Verifique email ou senha informado.',icon: 'error',confirmButtonText: 'Ok'});</script>");
}
