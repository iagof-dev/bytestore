<?php


require_once("./Model/UserData.php");
$user = new user();
?>

<style>

.debug{
    border: 5px double black;
    width: 30%;
}
    </style>




<?php
if ($user->getName() != null){
    echo('<div class="debug borrar-cadastro"> <h2>Api info:</h2> <hr> <h5>Nome:'. $user->getName() .'</h5> <h5>ID: '. $user->getId().'</h5> <h5>Email: '. $user->getEmail(). '</h5> <h5>Pfp: '. $user->getPfp() .'</h5> <h5>Role: '. $user->getRole() .'</h5> <h5>Desc: '. $user->getDesc(). '</h5> </div>');
}
    ?>


