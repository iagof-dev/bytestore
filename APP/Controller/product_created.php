
<style>
body{overflow-y: hidden;}
</style>


<link rel="stylesheet" href="../Assets/css/global.css">
<link rel="stylesheet" href="../Assets/css/bootstrap.min.css">
<link rel="stylesheet" href="../Assets/css/sweetalert.min.css">
<script src="../Assets/js/FA-icons.js"></script>
<script src="../Assets/js/jquery-3.6.4.min.js"></script>
<script src="../Assets/js/sweetalert.min.js"></script>
<script src="../Assets/js/create.js"></script>
<script src="../Assets/js/bootstrap.bundle.min.js"></script>
<body>
    <iframe src="/create" scrolling="no" height="100vh" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" style="width: 100%; height:100vh; overflow: none;">
    </iframe>
</body>
</html>



<?php
ob_start();
session_start();
error_reporting(E_ALL & ~E_NOTICE);

require_once('./Model/header.php');

$anuncio = array($_POST["anunciotitle"], $_POST["anunciodesc"] ,$_POST["anuncioprice"], $_POST["gateway"]);

$valido = true;

if($anuncio[0] == "" || $anuncio[1] == "" || $anuncio[2] == "" || $anuncio[3] == ""){
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

if ($certo == 4 and $valido == true){
  //$texto = substr(sha1(mt_rand()),17, 12);

  $diretorio = "./Assets/imgs/products/";
 
  $ext_img = pathinfo($_FILES['animg']['name'], PATHINFO_EXTENSION);
  
  $uniq_name = uniqid("product_") . ".". $ext_img;

  $folder_and_file = $diretorio . $uniq_name;

  debug_to_console($diretorio);
  debug_to_console($ext_img);
  debug_to_console($uniq_name);
  debug_to_console($folder_and_file);

  if (move_uploaded_file($_FILES['animg']["tmp_name"], $folder_and_file)){
    debug_to_console("Arquivo enviado!");
  }

  create_product($anuncio[0], $anuncio[1], $anuncio[2], $uniq_name, $anuncio[3]);
  echo('<script>swal({title: "Sucesso!",text: "Seu anúncio foi criado com sucesso!",type: "success",button: {text: "Fechar",value: true,visible: true,className: "btn btn-primary"}});setTimeout(function(){window.location.href = "/admin";}, 2000);</script>');

}
else{
  echo('<script>swal({title: "Erro!",text: "Seu anúncio contém caracteres invalidos",type: "error",button: {text: "Fechar",value: true,visible: true,className: "btn btn-primary"}});setTimeout(function(){window.location.href = "/create";}, 2000);</script>');
}


?>

