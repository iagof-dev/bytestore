<?php
ob_start();
session_start();
error_reporting(0);


$error = $_GET["error"];

?>

<link rel="stylesheet" href="../Assets/css/main.css">
<link rel="stylesheet" href="../Assets/css/admin.css">
<script src="../Assets/js/create.js"></script>
<script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
<script src="../Assets/js/login.js"></script>



<body>
      <div class="container">
        <div data-aos="fade-in" data-aos-duration="500" class="containerlogin" >
          <div class="titulo bordinha">
            <div class="titulo center">
                <h1 style="font-size: 23px !important;">Login</h1><br>
            </div>
                <?php 
                  if($error == "true"){
                    echo('<div class="error center"><br><h5 style="color: red; font-size: 16px;">E-mail ou senha incorretos!</h5></div>');
                  }

                ?>
            <div class="area1">
              <form action="/verify" method="post">
                <div class="inpt1"><input id="inputemail" required style="background-color: #FFFFFF !important; color: #000000 !important;" class="form-control" name="txt_email" placeholder="E-mail"><br>
                <input id="inputpass" name="txt_pass" required style="background-color: #FFFFFF !important;color: #000000 !important;" class="form-control" type="password" placeholder="Senha">
                <div class="center cf-turnstile" data-theme="dark" style="padding-top: 10px;" data-sitekey="0x4AAAAAAAC9NlfV5RvrSVwX" data-callback="javascriptCallback"></div>
                <div class="center"><input class="btn btn-dark bt1" type="submit" value="Logar-se"></div> 
              </form>
            </div>
          </div>
        </div>
      </div>
</body>
<script>AOS.init();</script>




</html>