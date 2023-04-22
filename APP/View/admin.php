<?php
ob_start();
session_start();
error_reporting(0);

$user_id = $_SESSION['user_id'];
$user_role = $_SESSION['user_role'];
$user_name = $_SESSION['user_name'];
$user_email = $_SESSION['user_email'];
$user_logged = $_SESSION['user_logged'];
$_SESSION['request_sent'] = false;


require_once('./Controller/pages.php');
require_once('./Model/header.php');


debug_to_console("ID: " . $user_id);
debug_to_console("Username: " . $user_name);
debug_to_console("Email: " . $user_email);
debug_to_console("Role: " . $user_role);
debug_to_console("Logged: " . $user_logged);


if ($user_logged != "true") {
  header("Location: ../View/login.html");
}

switch ($user_role) {
  case "user":
    header("Location: /purchases");
    break;
}

$teste = user_get_products();


$box_size = 64;
// echo('Quantidade de Anúncios: '. $teste[0]. '<br>');
// echo('Tamanho para aplicar (VH): '. $box_size);

echo ('<style>   .anuncios-box {width: 90vh !important;height: ' . $box_size . 'vh !important; background-color: #30343F !important; border-radius: 15px !important;} </style>');

?>


<link rel="stylesheet" href="../Assets/css/admin.css">



<body>
  <div class="container text-center">
    <div class="col">
      <div class="row">
        <div class="text-end btn_create position-relative " style="margin-top: 1.5vh !important;">
          <a href="/create"><button class="btn btn-primary"><i class="fa-solid fa-plus"></i> Criar anúncio</button></a>
        </div>
      </div>

      <div class="row">
        <h1 style="font-size: 2.2vh !important;">Anúncios:</h1>
      </div>
      <div class="row">
        <div class="anuncios-box position-absolute top-50 start-50 translate-middle">
          <?php echo ($teste[1]); ?>
        </div>
      </div>
    </div>
</body>

<script src="../Assets/js/aos.js"></script>
<script>
  AOS.init();
</script>
</html>