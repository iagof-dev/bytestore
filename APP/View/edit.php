<?php
ob_start();
session_start();
error_reporting(E_ALL & ~E_NOTICE);

require_once('./Model/header.php');




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
      <form action="/" method="post" style="width: 450px !important;">

        <div class="grid1-create-antitle">
          <?php
          require_once('./Model/header.php');

          $product = get_prod_specif($_GET['id']);
          echo ('<img id="imgpreview" class="image_preview bordinha" src="./Assets/imgs/products/' . $product[4] . '" />');

          echo ('<input name="anunciotitle" style="margin-top: 10px;" type="text" required class="form-control" placeholder="' . $product[1] . '" aria-describedby="basic-addon1">');
          ?>
        </div>
        <div class="grid1-create-andesc">
          <?php
          echo ('<textarea name="anunciodesc" rows="5" type="text" required class="form-control" placeholder="' . $product[2] . '" aria-describedby="inputGroup-sizing-lg"></textarea>');
          ?>
        </div>


        <div class="grid1-create-anprice">
          <?php
          echo ('<input name="anuncioprice" id="anvalue" type="number" required class="form-control" min="1" max="10000" placeholder="' . $product[3] . '" aria-describedby="basic-addon1">');
          ?>
        </div>

        <div class="grid1-create-animage">
          <input id="animg" name="animg" accept="image/*" type="file" required class="form-control" placeholder="Imagem">
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