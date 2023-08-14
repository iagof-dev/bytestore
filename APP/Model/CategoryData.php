<?php
ob_start();
session_start();
error_reporting(0);


class category{

    public function setCategory(){
        $_SESSION['category'];
    }

    public function getCategory(){
        return $_SESSION['category'];
    }


}