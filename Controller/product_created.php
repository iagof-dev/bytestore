<?php
ob_start();
session_start();
error_reporting(E_ALL & ~E_NOTICE);

require_once('./Model/header.php');

create_product($_POST["anunciotitle"], $_POST["anunciodesc"], $_POST["anuncioprice"], $_POST["animg"], $_POST["gateway"]);

?>

<style>
body{overflow-y: hidden;}
</style>


<link rel="stylesheet" href="../Assets/css/global.css">
<link rel="stylesheet" href="../Assets/css/bootstrap.min.css">
<link rel="stylesheet" href="../Assets/css/sweetalert.min.css">
<script src="../Assets/js/FA-icons.js"></script>
<script src="../Assets/js/jquery-3.6.4.min.js"></script>
<script src="../Assets/js/sweetalert.min.js"></script>
<script src="../Assets/js/create.js"></script>
<script src="../Assets/js/bootstrap.bundle.min.js"></script>


<body onload="verify();">
    <iframe src="/create" scrolling="no" sandbox="block-forms allow-scripts" height="100vh" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" style="width: 100%; height:100vh; overflow: none;">
    </iframe>
</body>

<script>
    
  function verify(){
    swal({
      title: 'Sucesso!',
      text: 'Anúncio criado com sucesso!',
      type: 'success',
    });

    setTimeout(function(){
      window.location.href = "/admin";
    }, 2000);
    
    
  }
</script>

</html>

