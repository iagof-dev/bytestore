<?php
ob_start();
session_start();
error_reporting(E_ALL & ~E_NOTICE);


require_once("./header.php");
$id = $_GET['id'];

echo($id);

delete_product($id);

header("Location: ./admin.php");
?>