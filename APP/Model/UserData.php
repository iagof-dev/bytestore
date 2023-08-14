<?php
ob_start();
session_start();
error_reporting(0);

class user{
    public function getId(){
        return $_SESSION['user_id'];
    }

    public function getName(){
        return $_SESSION['user_name'];
    }

    public function getPfp(){
        return $_SESSION['user_pfp'];
    }

    public function getEmail(){
        return $_SESSION['user_email'];
    }

    public function getRole(){
        return $_SESSION['user_role'];
    }

    public function getDesc(){
        return $_SESSION['user_desc'];
    }

    public function setId($id){
        $_SESSION['user_id'] = $id;
    }

    public function setName($name){
        $_SESSION['user_name'] = $name;
    }

    public function setPfp($pfp){
        $_SESSION['user_pfp'] = $pfp;
    }

    public function setEmail($email){
        $_SESSION['user_email'] = $email;
    }

    public function setRole($role){
        $_SESSION['user_role'] = $role;
    }

    public function setDesc($desc){
        $_SESSION['user_desc'] = $desc;
    }

    public function Logout(){
        session_destroy();
        header("Location: /");
    }

}


?>