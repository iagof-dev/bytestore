<?php

$api = new API();
$client = new user();
$PRODUCTS_JSON = $api->GET_PRODUCTS_BY_OWNER($client->getId());

echo ($PRODUCTS_JSON);

?>


<div class="md:container mx-auto">

<div class="grid items-center place-items-center mt-5">
    <div class="flex flex-grow h-1">
        <div class="w-full">
            <img src="http://localhost/Assets/imgs/placeholder.webp" class="w-1/4 rounded-lg" />
            <h1 class="">Produto Muinto legau</h1>
            <h2>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum numquam officia quae, maxime in nesciunt incidunt facilis sunt debitis? Molestias iusto nemo nam, corporis dignissimos pariatur sunt excepturi et dolore.</h2>
            <h3>R$1,99</h3>
            <a href="/anuncio/editar/0"><button><img src="../Assets/imgs/icons/solid/pencil.svg" /></button></a>
        </div>
    </div>
</div>
</div>