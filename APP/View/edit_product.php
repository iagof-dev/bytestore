<?php
ob_start();
session_start();
error_reporting(0);

require_once('./Model/header.php');

$id_product = $_GET['id'];

$old_img = $_GET['file'];

$product = get_prod_specif($id_product);

$comando = 'UPDATE products SET ';

$ch_title = false;
$ch_desc = false;
$ch_value = false;
$ch_file = false;


$new_title = $_POST['anunciotitle'];
$new_desc = $_POST['anunciodesc'];
$new_value = $_POST['anuncioprice'];
$new_file = $_POST['animg'];

if ($_SESSION['user_id'] == $product[6]) {

  if (!empty($new_title)) {
    $comando .= 'title="' . $new_title . '"';
    $ch_title = true;
  }


  if (!empty($new_desc)) {
    if ($ch_title == true) {
      $comando .= ', description="' . $new_desc . '"';
    } else {
      $comando .= 'description="' . $new_desc . '"';
    }
    $ch_desc = true;
  }



  if (!empty($new_value)) {
    if ($ch_title == true or $ch_desc == true) {
      $comando .= ', price=' . $new_value . '';
    } else {
      $comando .= 'price="' . $new_value . '"';
    }
    $ch_value = true;
  }



  if (isset($_FILES['animg']) && $_FILES['animg']['size'] > 0 && $_FILES['animg']['error'] == 0) {
    $dir = './Assets/imgs/products/';

    $delete_dir = $dir . $old_img;
    $ext_img = pathinfo($_FILES['animg']['name'], PATHINFO_EXTENSION);
    $ext_img = strtolower($ext_img);
    if ($ext_img == "gif" or $ext_img == "bmp" or $ext_img == "tiff" or $ext_img == "raw" or $ext_img == "wav" or $ext_img == "avi" or $ext_img == "psd" or $ext_img == "ai" or $ext_img == "docx" or $ext_img == "mov") {
      $_SESSION['request_sent'] = false;
      echo ('<script>swal({title: "Imagem inválida!",text: "Escolha outro arquivo...",type: "error",button: {text: "Fechar",value: true,visible: true,className: "btn btn-primary"}});setTimeout(function(){window.location.href = "/create";}, 1500);</script>');
      exit;
    }
    $diretorio = "./Assets/imgs/products/";
    $uniq_name = uniqid("product_") . "." . $ext_img;
    $folder_and_file = $diretorio . $uniq_name;
    if (move_uploaded_file($_FILES['animg']["tmp_name"], $folder_and_file)) {
      debug_to_console("Arquivo enviado!");
    }


    //================================================================================================
    if ($ch_title == true or $ch_desc == true or $ch_value == true) {
      $comando .= ', image="' . $uniq_name . '"';
    } else {

      $comando .= 'image="' . $uniq_name . '"';
    }

    unlink($delete_dir);
    $ch_file = true;
  }


  $comando .= " WHERE id=" . $id_product . ";";
  enviar_comando($comando);
}

?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<link rel="stylesheet" href="./Assets/css/create.css">
<script src="../Assets/js/create.js"></script>



<script>
  function load() {
    document.getElementById('imgpreview').setAttribute('width', '450px');
    document.getElementById('imgpreview').setAttribute('height', 'auto');
  }
</script>

<style>
  .image_preview {

    display: flex;
    width: 450px !important;
    height: 265px !important;
    margin-top: 10px;
    justify-content: center;
    align-items: center;
    text-align: center;
  }

  .bordinha {
    border: solid;
    border-style: dotted;
    border-radius: 10px;

  }
</style>


<body onload="load();">
  <div class="container">
    <div class="grid1-create-container center">
      <form enctype="multipart/form-data" action="#" method="POST" style="width: 450px !important;">

        <div class="grid1-create-antitle">
          <?php

          echo ('<img id="imgpreview" class="image_preview bordinha" src="./Assets/imgs/products/' . $product[4] . '" />');

          echo ('<input name="anunciotitle" style="margin-top: 10px;" type="text" class="form-control" placeholder="' . $product[1] . '" aria-describedby="basic-addon1">');
          ?>
        </div>
        <div class="grid1-create-andesc">
          <?php
          echo ('<textarea name="anunciodesc" rows="5" type="text" class="form-control" placeholder="' . $product[2] . '" aria-describedby="inputGroup-sizing-lg"></textarea>');
          ?>
        </div>


        <div class="grid1-create-anprice">
          <?php
          echo ('<input name="anuncioprice" id="anvalue" type="number" class="form-control" min="1" max="10000" placeholder="' . $product[3] . '" aria-describedby="basic-addon1">');
          ?>
        </div>

        <div class="grid1-create-animage">
          <input id="animg" name="animg" accept="image/*" type="file" class="form-control" placeholder="Imagem">
        </div>

        <div class="grid1-create-angateway" style="padding-bottom: 50px;">
          <input type="submit" value="✔️ Salvar" class="form-control">
          <a href="javascript:history.back()" style="text-decoration: none;"><input type="button" value="Cancelar" class="form-control text-danger" style="margin-top: 10px !important;"></a>
        </div>
      </form>
    </div>

  </div>
</body>


</html>