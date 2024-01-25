<?php



if ($api == 'pedidos' && $method == 'GET') {
    //echo json_encode(["status" => "error", "message" => "Apenas método post permitido."]);
    include_once("get.php");
    //return;
}

if ($api == 'pedidos' && $method == 'POST') {
    include_once("post.php");
}


