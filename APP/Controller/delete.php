<?php
  require_once(__DIR__ . "/../api/routes.php");
  require_once(__DIR__ . "/../Model/usuario.php");

  $lgUSER = new user();
  $api = new api();
  $getProductInfo = $api->GET_PRODUCT_BY_ID($_GET['id']);

  if($lgUSER->getId() != $getProductInfo['DATA']['0']['owner']){
    //erro
    header("Location: /admin");
    return;
  }


  $response = $api->DELETE_PRODUCT($_GET['id']);

  if($response != true){
    header("Location: /admin?status=error");
    exit();
  }

  header("Location: /admin?status=success");
?>