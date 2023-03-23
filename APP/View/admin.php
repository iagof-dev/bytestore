<?php
ob_start();
session_start();
error_reporting(E_ALL & ~E_NOTICE);


$user_id = $_SESSION['user_id'];
$user_role = $_SESSION['user_role'];
$user_name = $_SESSION['user_name'];
$user_email = $_SESSION['user_email'];
$user_logged = $_SESSION['user_logged'];


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
?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>


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


          <!-- <div class="row" class="position-relative" style="padding-top: 1% !important;">
            <div class="col">
              <img width="70%" height="auto"
                src="https://cdn.discordapp.com/attachments/890342346649112677/1088550982503378954/product_641777f16e657.jpg">
            </div>
            <div class="col-5 text-start">
              <h1>Mouse Gamer de alta performance</h1>
              <p>Tenha a vantagem necessÃ¡ria para vencer todos os seus adversÃ¡rios com o nosso Mouse Gamer de alta
                performance. Com...</p>
            </div>

            <div class="col">
              <div style="margin-top: -10%;" class="text-center position-relative top-50 start-50 translate-middle">
                <h2>R$1,99</h2>
              </div>
            </div>

            <div class="col">
              <div style="margin-top: 20%;" class="infos position-relative text-center">
                  <div class="dropdown"> <button class="btn btn-primary dropdown-toggle" type="button"
                      data-bs-toggle="dropdown" aria-expanded="false"> <i class="fa-solid fa-pen"
                        style="height: 5px;"></i> Modificar </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="/product?id="><i class="fa-solid fa-eye"></i> Ver anúncio</a>
                      </li>
                      <li><a class="dropdown-item" href="/edit?="><i class=" fa-solid fa-pen-to-square"></i> Editar</a>
                      </li>
                      <li><a class="dropdown-item" href="/delete?id="><i class="fa-solid fa-trash-can"></i> Deletar</a>
                      </li>
                    </ul>
                </div>
              </div>
            </div>
          </div> -->
          <?php echo(user_get_products()); ?>



        </div>
      </div>
    </div>

  </div>


  </div>
  </div>
  </div>
  </div>


</body>


</html>