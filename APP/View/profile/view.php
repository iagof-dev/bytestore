<?php

$id = $_GET['id'];
$api = new API();
$lorem = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Est dicta at repudiandae. Assumenda facilis obcaecati voluptates deleniti inventore, veritatis nobis sed quidem unde, repellat, dolores molestiae animi quibusdam. Ut, laboriosam!";
$perfil = $api->GET_USER_BY_ID($id);

if(empty($perfil['DATA']['0']['username']) && !isset($perfil['DATA']['0']['username'])){
    header("Location: /");
    return;
}

$verificado = '<span><img src="../Assets/imgs/icons/solid/badge-check.svg" class="w-6 align-middle" style="filter: brightness(0) saturate(100%) invert(73%) sepia(38%) saturate(6551%) hue-rotate(172deg) brightness(100%) contrast(85%);" alt="Verificado"></span>';

$pfp = "../Assets/imgs/user-ph.webp";

if($perfil['DATA']['0']['pfp'] != ' ' && $perfil['DATA']['0']['pfp'] != '' && !empty($perfil['DATA']['0']['pfp']) && $perfil['DATA']['0']['pfp'] != null && isset($perfil['DATA']['0']['pfp'])){
    $pfp = "../Assets/imgs/users_pfp/". $perfil['DATA']['0']['pfp'];
}


?>


<div class="container mx-auto grid place-content-center align-middle place-items-center auto-rows-auto">
    <!-- store info -->
    <div class="stinfo container bg-[#353535] w-[72rem] h-52 p-10 flex rounded-xl shadow-2xl">
        <div class="pfp grid w-[10 rem] ml-20 -mt-5">
            <img src="<?= $pfp; ?>" class="rounded-full w-32 h-32 grid-flow-col">
            <h1 class="ml-2 grid-flow-row auto-rows-auto w-32 flex align-middle text-end text-white"><?php echo($perfil['DATA']['0']['username']); if($perfil['DATA']['0']['verified'] != '0'){echo($verificado);} ?></h1><br>
        </div>

        <h2 class="text-white ml-12 mt-1">
            <?= wordwrap($perfil['DATA']['0']['description'], 96, "<br/>", false); ?>
        </h2>
    </div>
    <!-- store products -->
    <div class="stproducts container h-auto mt-2 rounded-xl">
        <div class="grid ml-5 grid-rows-1 auto-rows-max grid-cols-5 gap-5 items-center mb-20 justify-center">
            <?=
                $api->CREATE_CARDS_BY_OWNER($id);  
             ?>
        </div>
    </div>
</div>