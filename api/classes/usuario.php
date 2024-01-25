<?php
error_reporting(-1);

include_once("db.php");

class cliente
{

    public function login()
    {
        $db_cl = new DB();
        $db = $db_cl->connect("n3rdyapi");

        $md5pass = md5($_POST['apipass']);

        $com = "select * from usuarios where usuario='" . $_POST['apiuser'] . "' and senha='" . $md5pass . "';";

        $rs = $db->prepare($com);
        $rs->execute();
        $obj = $rs->fetchAll(PDO::FETCH_ASSOC);
        $numRowsAffected = $rs->rowCount();
        if ($numRowsAffected > 0) {
            unset($_POST['apiuser']);
            unset($_POST['apipass']);
            return true;
        } else {
            echo (json_encode(["status" => "error", "message" => "Usuário ou senha incorretos!"]));
            exit();
        }
    }
}
