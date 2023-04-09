<?php
ob_start();
session_start();
error_reporting(0);




require_once('./Model/header.php');
$user_role = $_SESSION['user_role'];
switch ($user_role) {
  case "user":
    header("Location: /purchases");
    break;
  default:
    break;
}

$anuncio = array($_POST["anunciotitle"], $_POST["anunciodesc"], $_POST["anuncioprice"], $_POST["ancategory"]);

if (isset($anuncio[0]) and isset($anuncio[1]) and isset($anuncio[2]) and isset($anuncio[3])) {
  if ($_SESSION['request_sent'] == true or $_SESSION['request_sent'] == "true") {
    // Redirect the user to a page that informs them they have already sent a request
    header("Location: /admin");
    exit;
  }
  $_SESSION['request_sent'] = true;


  //contem informações do anúncio
  $conexao = new mysql();
  $mysqli = $conexao->getConexao();
  $anuncio_fix = array(mysqli_real_escape_string($mysqli, $anuncio[0]), mysqli_real_escape_string($mysqli, $anuncio[1]), mysqli_real_escape_string($mysqli, $anuncio[2]), mysqli_real_escape_string($mysqli, $anuncio[3]));
  //Imagem do produto
  $diretorio = "./Assets/imgs/products/";
  $ext_img = pathinfo($_FILES['animg']['name'], PATHINFO_EXTENSION);

  $ext_img = strtolower($ext_img);
  if($ext_img == "gif" or $ext_img == "bmp" or $ext_img == "tiff" or $ext_img == "raw" or $ext_img == "wav" or $ext_img == "avi" or $ext_img == "psd" or $ext_img == "ai" or $ext_img == "docx" or $ext_img == "mov"){
    $_SESSION['request_sent'] = false;
    echo('<script>swal({title: "Imagem inválida!",text: "Escolha outro arquivo...",type: "error",button: {text: "Fechar",value: true,visible: true,className: "btn btn-primary"}});setTimeout(function(){window.location.href = "/create";}, 1500);</script>');
    exit;
  }
  $uniq_name = uniqid("product_") . "." . $ext_img;
  $folder_and_file = $diretorio . $uniq_name;
  if (move_uploaded_file($_FILES['animg']["tmp_name"], $folder_and_file)) {
    debug_to_console("Arquivo enviado!");
  }
  //Pegar id Categoria
  $cat_id = get_specif_category($_POST["ancategory"]);

  //Pegar sub id categoria
  //$subcat_id = ;

  create_product($anuncio_fix[0], $anuncio_fix[1], $anuncio_fix[2], $uniq_name, $cat_id[0]);
  debug_to_console("Anúncio criado!");
  echo ('<script>swal({title: "Sucesso!",text: "Seu anúncio foi criado com sucesso!",type: "success",button: {text: "Fechar",value: true,visible: true,className: "btn btn-primary"}});setTimeout(function(){window.location.href = "/admin";}, 2000);</script>');
}

?>

<html>
<link rel="stylesheet" href="../Assets/css/create.css">

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

<body>
  <div class="container">
    <div class="grid1-create-container center">
      <form enctype="multipart/form-data" action="#" method="POST" style="width: 450px !important;">

        <div class="grid1-create-antitle">
          <span id="imgpreview" class="image_preview bordinha">
          </span>
          <input name="anunciotitle" style="margin-top: 10px;" type="text" required class="form-control" placeholder="Titulo do Anúncio">
        </div>
        <div class="grid1-create-andesc">
          <textarea name="anunciodesc" rows="5" type="text" required class="form-control" placeholder="Descrição do Anúncio" aria-describedby="inputGroup-sizing-lg"></textarea>
        </div>

        <div class="grid1-create-anprice">
          <input name="anuncioprice" id="anvalue" type="number" required class="form-control" min="1" max="10000" placeholder="R$0,00">
        </div>

        <div class="grid1-create-animage">
          <input id="animg" name="animg" accept="image/*" type="file" required class="form-control" placeholder="Imagem">
          <select name="ancategory" style="margin-top: 15px; margin-bottom: -3px;" class="form-select" id="validationCustom04" required>
            <option selected disabled value="">Selecione uma Categoria:</option>
            <!-- <option>...</option> -->
            <?php echo (get_all_category()); ?>
          </select>
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