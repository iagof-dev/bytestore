<?php
  require_once(__DIR__ . "/../api/routes.php");
  require_once(__DIR__ . "/../Model/usuario.php");

  $api = new api();
  $getProductInfo = $api->GET_PRODUCT_BY_ID($_GET['id']);

  if((new user())->getId() != $getProductInfo['DATA']['0']['owner']){
    header("Location: /admin");
    return;
  }

  
  try{
    $response = $api->DELETE_PRODUCT($_GET['id']);
    unlink(__DIR__ . "/../Assets/imgs/products/" . $_GET['img']);
  }
  catch(Exception $e){
    echo('<script>console.warn("Erro! '. $e->getMessage() .'");</script>');
  }

  if($response != true){
    header("Location: /admin?status=error");
    exit();
  }

  header("Location: /admin?status=success");
?>