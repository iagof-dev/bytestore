<?php
ob_start();
session_start();
error_reporting(E_ALL & ~E_NOTICE);

require_once('./Model/header.php');

?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">
<link rel="stylesheet" href="../Assets/css/create.css">



<style>
.image_preview{

  display: flex; 
  width: 450px !important;
  height: 265px !important;
  margin-top: 10px;
  justify-content: center;
  align-items: center;
  text-align: center;
}

.bordinha{
  border: solid; 
  border-style: dotted; 
  border-radius: 10px;

}

</style>

<body>
    <div class="container">
    <div class="grid1-create-container center" >
          <form enctype="multipart/form-data" action="/created" method="post" style="width: 450px !important;">

          <div class="grid1-create-antitle">
            <span id="imgpreview" class="image_preview bordinha">
            </span>
            <input name="anunciotitle" style="margin-top: 10px;" type="text" required class="form-control" placeholder="Titulo do Anúncio">
          </div>
          <div class="grid1-create-andesc">
            <textarea name="anunciodesc" rows="5" type="text" required class="form-control" placeholder="Descrição do Anúncio" aria-describedby="inputGroup-sizing-lg"></textarea>
          </div>

          <div class="grid1-create-anprice">
            <input name="anuncioprice" id="anvalue" type="number" required class="form-control" min="1" max="10000" placeholder="0,00">
          </div>

          <div class="grid1-create-animage">
            <input id="animg" name="animg" accept="image/*" type="file" required class="form-control" placeholder="Imagem">
            <!-- <input id="animg" type="text" name="animg" onchange="update_preview(event);" required class="form-control" placeholder="Link Imagem"> -->
          </div>

          <div class="grid1-create-angateway" style="padding-bottom: 50px;">
            <input type="submit" value="💾 Enviar" required class="form-control">
          </div>
          </form>
  </div>
   </div>
 </body>

 <script src="../Assets/js/create.js"></script>


</html>