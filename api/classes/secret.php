<?php

class config{
  private $informations = [
    "mp_secret_token" => "",
    "db_ip" => "mysql",
    "db_port" => "3306",
    "db_user" => "n3rdy",
    "db_pass" => "N3rdygamerbr@123",
    "Notication_URL" => "SEU DOMINIO.com/hook/notification.php"
  ];

  function get(){
    return $this->informations;
  }
}
