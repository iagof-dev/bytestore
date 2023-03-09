<?php 
ob_start();
session_start();
$_SESSION['user_logged'] = "false";
session_destroy();
header("Location: ./")

?>