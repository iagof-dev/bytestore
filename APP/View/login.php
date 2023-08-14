<?php

if ($_GET['error'] == "true") {
    echo ("<script>Swal.fire({title: 'Erro!',text: 'Verifique email ou senha informado.',icon: 'error',confirmButtonText: 'Ok'});</script>");
}
?>
<link rel="stylesheet" href="../Assets/css/cadastro.css">
<meta name="viewport" content="width=device-width, initial-scale=1">

<div class="container">

    <div class="col animate__animated animate__fadeInUp">
        <div class="container logincontainer position-fixed pt-5">
            <div class="container loginbox text-start">
                <div class="row">
                    <img title="btLogo" class="btlogo-log img-fluid pt-1" src="../Assets/icons/logo/64.webp" alt="logo">
                </div>
                <form action="../Controller/UserLogin.php" method="post">
                    <div class="row form-info-label">
                        <label class="form-label" style="color: white;">E-mail:</label>
                    </div>
                    <div class="row">
                        <input class="form-control rounded" required placeholder="Correio Eletrônico" type="email" name="email"><br>
                    </div>
                    <div class="row form-info-label">
                        <label class="form-label" style="color: white;">Senha:</label>
                    </div>
                    <div class="row">
                        <input class="form-control rounded" required placeholder="**********" type="password" name="pass"><br>
                    </div>
                    <div class="row">
                        <input class="btn btn-primary rounded mx-auto" required type="submit" value="Entrar">
                    </div>
                </form>
                <label class="login ps-3 pt-2 fs-10">Não tem conta? <a title="Redirecionamento para criar uma conta" class="link-underline-primary" href="/?register ">Registre-se!</a></label>
            </div>
        </div>
    </div>
</div>
</div>