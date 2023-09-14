<?php


require_once("../api/routes.php");


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $api = new API();
    $api->login($_POST['user_email'],$_POST['user_pass']);
}


?>