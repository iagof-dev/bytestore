<?php
ob_start();
error_reporting(0);

class user
{
    public function getID()
    {
        return $_SESSION['user_id'];
    }
    public function setId($id)
    {
        $_SESSION['user_id'] = $id;
    }

    public function getName()
    {
        return $_SESSION['user_name'];
    }

    public function setName($name)
    {
        $_SESSION['user_name'] = $name;
    }

    public function getEmail()
    {
        return $_SESSION['user_email'];
    }

    public function setEmail($email)
    {
        $_SESSION['user_email'] = $email;
    }

    public function getPFP()
    {
        return $_SESSION['user_pfp'];
    }

    public function setPFP($pfp)
    {
        $_SESSION['user_pfp'] = $pfp;
    }

    public function getDesc()
    {
        return $_SESSION['user_desc'];
    }

    public function setDesc($desc)
    {
        $_SESSION['user_desc'] = $desc;
    }

    public function getRole()
    {
        return $_SESSION['user_role'];
    }

    public function setRole($role)
    {
        $_SESSION['user_role'] = $role;
    }

    public function isLogged()
    {
        if(isset($_SESSION['user_id']) || !empty($_SESSION['user_id']) || $_SESSION['user_id'] != null)
            return true;

        return false;
    }
}
