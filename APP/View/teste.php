<div class="md:container grid place-items-center align-middle items-center mx-auto">

<?php

$product_img = "https://cdn.discordapp.com/attachments/1103826262906110043/1190386597766647889/Imagem_do_produto_aqui_1.png";

$id_gateway = $_GET['id'];
$api = new api();
$user = new user();

//fixed
$userAccess_id = $user->getID();

$information = $api->GET_GATEWAY_BY_ID($id_gateway);
$product_info = $api->GET_PRODUCT_BY_ID($information['0']['seller_product_id']);

if($userAccess_id != $information['0']['customer_id'] || $userAccess_id == $information['0']['seller_id']){
    echo("<script>console.info('%c[ALERTA] Você não deveria estar aqui. SAIA!', 'color: red;font-size: 20px');</script>");
}

echo("
<script>
console.group('Gateway Info');
console.log('ID: ". $information['0']['id']."');
console.log('Customer ID: ". $information['0']['customer_id']."');
console.log('Seller ID: ". $information['0']['seller_id']."');
console.log('Product ID: ". $information['0']['seller_product_id']."');
console.log('Customer E-MAIL: ". $information['0']['customer_email']."');
console.log('Created: ". $information['0']['date']."');
console.groupEnd();
</script>
");


echo("<script>
console.group('Product Info');
console.log('ID: ". $product_info['DATA']['0']['id']."');
console.log('Nome: ". $product_info['DATA']['0']['title']."');
console.log('Valor: ". $product_info['DATA']['0']['price']."');
console.log('Image: ". $product_info['DATA']['0']['image']."');
console.log('Categoria: ". $product_info['DATA']['0']['id_category']."');
console.log('ID Owner: ". $product_info['DATA']['0']['owner']."');
console.log('Created: ". $product_info['DATA']['0']['created']."');
console.groupEnd();
</script>");

//echo("<script>console.debug('". $product_info['DATA']['0']['title'] ."');</script>");

$product_img = "/../Assets/imgs/products/" . $product_info['DATA']['0']['image'];


echo("
<h1 class='font-bold'>Escolha uma forma de pagamento:</h1>

<img src='". $product_img ."' class='h-64 rounded-lg border-black border-2'>
<h1 class='font-semibold'>". $product_info['DATA']['0']['title']. "</h1>
<h2 class='font-semibold'>R$". $product_info['DATA']['0']['price']."</h2>
");


if(isset($_GET['metodo'])){

    switch($_GET['metodo']){

        case "pix":
            echo("<script>console.debug('metodo escolhido foi o pix');</script>");
            $result = $api->CREATE_PIX_PAYMENT($id_gateway, $product_info['DATA']['0']['title'], $user->getEmail(), $product_info['DATA']['0']['price']);
            echo('<a href="'. $result['values']['url'] .'"><img src="data:image/jpeg;base64, '. $result['values']['qr_code'].'" class="w-52"></a>');
            echo('<textarea readonly id="copiecola" class="w-1/2">'. $result['values']['copia_e_cola'] .'</textarea>');
            break;
    }

    echo("
    <div class='flex'>
<a href='./teste?id=". $_GET['id'] ."'>
<button class='w-32 mt-5 font-semibold mr-2 h-8 text-center leading-tight align-middle rounded-lg text-white bg-gradient-to-r from-cyan-500 to-blue-500 transition-colors duration-300 ease-in-out hover:bg-[#a0d4d6]'>Trocar Metodo</button>
</a>");
}
else{

    echo('<div class="md:container">
    <div class="bg-red-400 w-32">
    <a href="?id='. $_GET["id"] .'&metodo=pix">
    <img src="https://transfeera.com/wp-content/uploads/2020/05/transfeera-blog-pix.jpg" class="w-40">
    <span>PIX</span>
    </a>
    </div>
    </div>');
}






?>







<a href="./purchases">
<button class="w-24 mt-5 font-semibold mr-2 h-8 text-center leading-tight align-middle rounded-lg text-white bg-gradient-to-r from-cyan-500 to-blue-500 transition-colors duration-300 ease-in-out hover:bg-[#a0d4d6]">Voltar</button>
</a>
</div>

</div>