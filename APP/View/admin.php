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

?>


<link rel="stylesheet" href="../Assets/css/admin.css">

<body>
  <div class="container text-center">
    <div class="col">
      <div class="row">
        <div style="padding-top: 3vh !important;" class="text-end btn_create position-relative ">
          <a href="/create"><button class="btn btn-primary"><i class="fa-solid fa-plus"></i> Criar anúncio</button></a>
        </div>
        <h1>Anúncios:</h1>
        <div class="anuncios-box position-absolute top-50 start-50 translate-middle">
          <?php echo (user_get_products()); ?>

        </div>
      </div>
    </div>
</body>


</html>