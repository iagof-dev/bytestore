<?php
ob_start();
session_start();
error_reporting(E_ALL & ~E_NOTICE);

echo("<title>ByteStore</title>");
echo("<link rel='shortcut icon' href='./Assets/imgs/logo.png' type='image/x-icon'>");

require('./Controller/pages.php')

?>