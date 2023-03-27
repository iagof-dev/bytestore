
<style>
body{overflow-y: hidden;}
</style>
<body>
    <iframe src="/create" scrolling="no" height="100vh" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" style="margin-top: -50px;width: 100%; height:100vh; overflow: none;">
    </iframe>
</body>
</html>



<?php
ob_start();
session_start();
error_reporting(E_ALL & ~E_NOTICE);

require_once('./Model/header.php');

$anuncio = array($_POST["anunciotitle"], $_POST["anunciodesc"] ,$_POST["anuncioprice"], $_POST["ancategory"]);



$valido = true;

if($anuncio[0] == "" || $anuncio[1] == "" || $anuncio[2] == ""){
  echo('<script>swal({title: "Erro!",text: "Anúncio inválido.",type: "error",button: {text: "Fechar",value: true,visible: true,className: "btn btn-primary"}});setTimeout(function(){window.location.href = "/create";}, 2000);</script>');
  $valido = false;
  exit();
}


$certo = 0;

for($i = 0; $i < count($anuncio); $i++){
  if (preg_match('|^[a-zA-Z0-9 ]*$|', $anuncio[$i])){
    $certo += 1;
  }
}

if ($certo >= 2 and $valido == true){

  $diretorio = "./Assets/imgs/products/";
 
  $ext_img = pathinfo($_FILES['animg']['name'], PATHINFO_EXTENSION);
  
  $uniq_name = uniqid("product_") . ".". $ext_img;

  $folder_and_file = $diretorio . $uniq_name;

  debug_to_console($uniq_name);

  if (move_uploaded_file($_FILES['animg']["tmp_name"], $folder_and_file)){
     debug_to_console("Arquivo enviado!");
  }

  require_once('./Model/mercado_pago.php');



  $cat_id = get_specif_category($_POST["ancategory"]);
  debug_to_console("Retorno: ". $cat_id[0]);

  create_product($anuncio[0], $anuncio[1], $anuncio[2], $uniq_name, $cat_id[0]);
  debug_to_console("Anúncio criado!");
  echo('<script>swal({title: "Sucesso!",text: "Seu anúncio foi criado com sucesso!",type: "success",button: {text: "Fechar",value: true,visible: true,className: "btn btn-primary"}});setTimeout(function(){window.location.href = "/admin";}, 2000);</script>');

}
else{
  echo('<script>swal({title: "Erro!",text: "Seu anúncio contém caracteres invalidos",type: "error",button: {text: "Fechar",value: true,visible: true,className: "btn btn-primary"}});setTimeout(function(){window.location.href = "/create";}, 2000);</script>');
}


?>

