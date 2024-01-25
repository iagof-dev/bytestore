<?php
date_default_timezone_set("America/Sao_Paulo");
session_save_path(__DIR__ . '/../sessions');
ob_start();
session_start();



include_once("./Model/imports.php");
include_once("./Controller/pages.php");

?>



