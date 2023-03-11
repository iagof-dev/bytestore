<?php
ob_start();
session_start();
error_reporting(E_ALL & ~E_NOTICE);

require_once('./header.php');

// $img = ($_FILES["anuncioimg"]);

// $file_handle = fopen($_FILES["anuncioimg"]["tmp_name"], "rb");
// $file_contents = fread($file_handle, $_FILES["anuncioimg"]["size"]);
// fclose($file_handle);

// $img = base64_encode($file_contents);


create_product($_POST["anunciotitle"], $_POST["anunciodesc"], $_POST["anuncioprice"], $_POST["animg"], $_POST["gateway"]);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<style>

iframe{
    
}
body{
    overflow-y: hidden;
}

</style>

<link rel="stylesheet" href="./Assets/css/global.css">
<link rel="stylesheet" href="./Assets/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://kit.fontawesome.com/3fc58490c0.js" crossorigin="anonymous"></script>
<body onload="verify();">
    <iframe src="./create.php" scrolling="no" sandbox="block-forms allow-scripts" height="100vh" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" style="width: 100%; height:100vh; overflow: none;">
    </iframe>

</body>

<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script src="./Assets/js/create.js"></script>

</html>

<?php
sleep(5);
header("Location: ./admin.php");
?>