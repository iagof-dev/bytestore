<?php
ob_start();
session_start();
error_reporting(0);

require_once('./DAO/database.php');

$error = $_GET["error"];

$user_email = $_GET['txt_email'];
$user_name = $_GET['txt_name'];
$user_pass = $_GET['txt_pass'];
$user_role = $_GET['accounttype'];


if (isset($user_email) or isset($user_name) or isset($user_pass)) {
  if (strpos($user_email, '@') == false or strpos($user_email, '@') == "false" ) {
    header('Location: /register?error=true');
  }

  $conexao = new mysql();
  $mysqli = $conexao->getConexao();

  $user_name = mysqli_real_escape_string($mysqli, $user_name);
  $user_pass = mysqli_real_escape_string($mysqli, $user_pass);
  $user_email = mysqli_real_escape_string($mysqli, $user_email);


  $md5_pass = md5($user_pass);

  $resultado = create_user($user_name, $user_email, $md5_pass, $user_role);

  if (!$resultado) {header('Location: /register?error=true');} else {header('Location: /register?error=false');}
}

?>

<link rel="stylesheet" href="../Assets/css/main.css">
<link rel="stylesheet" href="../Assets/css/admin.css">
<script src="../Assets/js/login.js"></script>

<body>
  <div class="container">
    <div data-aos="fade-in" data-aos-duration="500" class="containerlogin">
      <div class="titulo bordinha">
        <div class="titulo center">
          <h1 style="font-size: 23px !important;">Cadastro</h1><br>
        </div>
        <?php
        if ($error=="true") {echo ('<div class="error center" data-aos="flip-left" data-aos-duration="500"><br><h5 class="text-danger" style="font-size: 16px;">Usuário ou E-mail já cadastrado!</h5></div>');echo('<script>swal({title: "Erro!",text: "E-mail ou Usuário já cadastrado!",type: "error",button: {text: "Fechar",value: true,visible: true,className: "btn btn-primary"}});</script>');}
        if($error=="false"){echo ('<div class="error center" data-aos="flip-left" data-aos-duration="500"><br><h5 class="text-success" style="font-size: 16px;">Conta criada com sucesso!</h5></div>');echo('<script>swal({title: "Sucesso!",text: "Cadastrado com sucesso!",type: "success",button: {text: "Fechar",value: true,visible: true,className: "btn btn-primary"}});</script>');}
        ?>
        <div class="area1">
          <form action="/register" method="GET">
            <div class="inpt1">
                <input id="inputusername" required style="margin-bottom: -12px; background-color: #FFFFFF !important; color: #000000 !important;" class="form-control" name="txt_name" placeholder="Usuário"><br>
                <input id="inputemail" required style="margin-bottom: -12px; background-color: #FFFFFF !important; color: #000000 !important;" class="form-control" type="email" name="txt_email" placeholder="E-mail"><br>
                <input id="inputpass" name="txt_pass" required style="background-color: #FFFFFF !important;color: #000000 !important;" class="form-control" type="password" placeholder="Senha">
                <h4 style="font-size: 10px; color: grey; margin-top: 5px;">Ao realizar o cadastro, você está concordando com os <a href="/tos"> termos de uso</a>.</h4>
            <div style="display:flex; margin-bottom: 1vh;margin-left: 4vh;">
                <div class="form-check" style="margin-right: 3vh;"><input required class="form-check-input" type="radio" value="seller" name="accounttype" id="accounttype"><label class="form-check-label" for="flexRadioDefault1">Vendedor</label></div>
                <div class="form-check"><input required class="form-check-input" type="radio" name="accounttype" value="user" id="accounttype"><label class="form-check-label" for="flexRadioDefault1">Comprador</label></div>
            </div>
                <div class="center"><div class="btnslg">
                  <a href="/login"><input class="btn btn-dark bt1"style="text-align: center; line-height: 10px; height: 35px;" value="Voltar" type="button"></a>
                  <input class="btn btn-dark bt1" style="margin-right: 10px; text-align: center; line-height: 10px;" type="submit" value="Criar conta">
                </div></div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
<script>AOS.init();</script>

</html>