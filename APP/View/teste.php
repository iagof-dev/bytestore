<?php

require_once('./DAO/database.php');

$user_email = $_GET['email'];
$user_name = $_GET['name'];
$user_pass = $_GET['pass'];
$user_role = $_GET['tipo'];


$resultado;

if (!isset($user_email) or !isset($user_name) or !isset($user_pass)) {
    //sem informações
}
else{
    //com informações
    $conexao = new mysql();
    $mysqli = $conexao->getConexao();

    $md5_pass = md5($user_pass);
    $com = "insert into ". $conexao::$db_table_users. " values (default, '". $user_name ."', '". $user_email ."', '". $md5_pass ."', '". $user_role ."', null, null, null);";

    $resultado = mysqli_query($mysqli, $com);
    if(!$resultado){
        echo('<h1 class="text-danger"> Erro! Usuário já cadastrado</h1>');
    }
    else{
        echo('<h1 class="text-success">Sucesso!</h1>');
    }
}



?>


<html>
<body>

    <!-- <div class="error-container">
        <div class="textos">
            <div class="error-title">
                <div class="spinner-border" role="status" style="margin-right: 15px;"></div>
                <h1> | Ocorreu um Erro!</h1>
                <h2 style="margin-left: 10px; color: grey;">(Error 500)</h2>
            </div>
            <br>
            <div class="error">
                <p>Por favor, tente novamente mais tarde. Se o problema persistir, entre em contato conosco para que possamos ajudá-lo a resolver o problema.</p>
            </div>
        </div>
    </div> -->


    <form method="get" action="/teste">
        <input type="text" name="name" placeholder="nome">
        <input type="text" name="email" placeholder="email">
        <input type="password" name="pass" placeholder="pass">
        <input type="radio" name="tipo" value="user">Comprador</input>
        <input type="radio" name="tipo" value="seller">Vendedor</input>
        <input type="submit" value="Registrar">
    </form>

</body>

</html>