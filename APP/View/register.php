<?php

// if (isset($_GET['error'])) {
//     if ($_GET['error'] == "true") {
//         echo ("Erro ao registrar");
//         echo ("<script>Swal.fire({title: 'Erro!',text: 'Esta conta de e-mail ou usuário já está sendo utilizada.',icon: 'error',confirmButtonText: 'Ok'});</script>");
//     } else {
//         echo ("Registrado com sucesso");
//         echo ("<script>Swal.fire({title: 'Sucesso!',text: 'Registrado com sucesso!',icon: 'success',confirmButtonText: 'Ok'});</script>");
//     }
// }


?>

<!-- <form action="../Controller/UserRegister.php" method="post">
    <input type="text" required name="user_name" id="name" placeholder="João"><br>
    <input type="email" required name="user_email" id="email" placeholder="joaoarroz@gmail.com"><br>
    <input type="password" required name="user_pass" id="pass" placeholder="**********"><br>
    <input type="submit" value="registrar">
</form> -->


<link rel="stylesheet" href="../Assets/css/cadastro.css">
<meta name="viewport" content="width=device-width, initial-scale=1">

<div class="container">

    <div class="col animate__animated animate__fadeInUp">
        <div class="container registercontainer position-fixed pt-5">
            <div class="container registerbox text-start">
                <div class="row">
                    <img title="btLogo" class="btlogo-reg center img-fluid pt-1" src="../Assets/icons/logo/64.webp" alt="logo">
                </div>
                <form action="../Controller/UserRegister.php" method="post">
                    <div class="row form-info-label">
                        <label class="form-label" style="color: white;">Usuário:</label>
                    </div>
                    <div class="row">
                        <input type="text" class="form-control rounded" required name="user_name" id="name" placeholder="João"><br>
                    </div>
                    <div class="row">
                        <label class="form-label form-info-label" style="color: white;">E-mail:</label>
                    </div>
                    <div class="row">

                        <input class="form-control rounded" required placeholder="Correio Eletrônico" type="email" name="user_email"><br>
                    </div>
                    <div class="row">
                        <label class="form-label form-info-label" style="color: white;">Senha:</label>
                    </div>
                    <div class="row">
                        <input class="form-control rounded" required placeholder="**********" type="password" name="user_pass"><br>
                    </div>
                    <div class="row">
                        <input class="btn btn-primary rounded mx-auto" required type="submit" value="Registrar">
                    </div>
                </form>
                <label class="register ps-3 fs-10">Já possui conta? <a title="Redirecionar para logar" class="link-underline-primary" href="/?login ">Faça o login</a></label>
            </div>
        </div>
    </div>
</div>
</div>