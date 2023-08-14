<?php

require_once("../Model/UserData.php");
include_once("../Model/Request.php");

$email = $_POST['email'];
$pass = md5($_POST['pass']);
$fields = [
    'email' => $email,
    'pass' => $pass
];
$request = new Request();
$value = $request->MakePostRequest("login", $fields);
//echo(var_dump($value));

if ($value->status == "error" || $value == null) {
    header("Location: /?login&error=true");
    exit();
}

$client = new user();
$client->setId($value->message[0]->id);
$client->setName($value->message[0]->username);
$client->setEmail($value->message[0]->email);
$client->setPfp($value->message[0]->pfp);
$client->setRole($value->message[0]->role);
$client->setDesc($value->message[0]->description);

header("Location: /");
?>