<?php
ob_start();
session_start();
error_reporting(0);


require_once("./Model/UserData.php");
$user = new user();

$user->Logout();