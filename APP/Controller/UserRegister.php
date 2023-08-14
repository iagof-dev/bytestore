<?php

include_once("../Model/Request.php");

if(!isset($_POST['user_name']) && !isset($_POST['user_email']) && !isset($_POST['user_pass'])){
    header("Location: /register?error=true");
    exit();
}

$name = $_POST['user_name'];
$email = $_POST['user_email'];
$pass = md5($_POST['user_pass']);
$fields = [
    'username' => $name,
    'email' => $email,
    'pass' => $pass,
    'role' => 'seller'
    
];

$request = new Request();
$valor = $request->MakePostRequest("register", $fields);

//echo(var_dump($valor));

if($valor->status == "error"){
    header("Location: /register?error=true");
    exit();
}
else{
    header("Location: /register?error=false");
    exit();
}

?>