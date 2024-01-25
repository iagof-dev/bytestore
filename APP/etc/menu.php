<?php

require_once("./Model/usuario.php");
$user = new user();
if(empty($user->getId()))
    return require_once("menu/notlogged.php");

return require_once("menu/logged.php");