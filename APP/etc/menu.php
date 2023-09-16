<?php
ob_start();

require_once("./Model/usuario.php");
$user = new user();
if($user->getId() == null)
    return require_once("menu/notlogged.php");

return require_once("menu/logged.php");