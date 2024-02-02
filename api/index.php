<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');
date_default_timezone_set("America/Sao_Paulo");
if (isset($_GET['path'])) {
    $path = explode("/", $_GET['path']);
} else {
    echo json_encode(["status" => "Sem parâmetros!"]);
    exit();
}
if (isset($path[0])) {
    $api = $path[0];
}
if (isset($path[1])) {
    $action = $path[1];
}
if (isset($path[2])) {
    $param = $path[2];
}
if(isset($path[4])){
    $param2 = $path[4];
}
if ($api == '') {
    echo json_encode(["data" => "Especifique a função"]);
}

//                $api  $action $param $param2
//    localhost/usuario/localizar/add/1

$method = $_SERVER['REQUEST_METHOD'];


#Classes
include_once("classes/db.php");
include_once("classes/secret.php");
include_once("classes/usuario.php");


///
///     Autenticação
///
if($method != 'GET') $AccessToken = (new cliente())->login();

$db = (new DB())->connect("bytestore");

#API
include_once("./api/usuario/usuario.php");
include_once("./api/produtos/produto.php");
include_once("./api/categoria/categoria.php");
include_once("./api/pagamentos/pagamentos.php");
include_once("./api/pedidos/pedidos.php");

?>