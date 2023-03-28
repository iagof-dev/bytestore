<?php

$id_user = $_GET['id'];

?>

<body>
    <h1>Perfil</h1>
    <?php echo($id_user); ?>

    <?php
    
    if($_SESSION['user_id'] == $id_user){
        echo('
        <a href="/edit_profile"><button class="btn btn-primary">Editar perfil</button></a>
        ');
    }

    ?>
</body>
</html>