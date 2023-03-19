<?php
ob_start();
session_start();
error_reporting(E_ALL & ~E_NOTICE);

require_once('./Model/header.php');
$id = $_GET['id'];
$file_image = $_GET['file'];
$path = ("./Assets/imgs/products/". $file_image);

delete_product($id, $path);

header("Location: /admin");
?>