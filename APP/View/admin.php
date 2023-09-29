<?php

require_once(__DIR__ . "/../etc/admin/product_list.php");

$list = new ADMIN_PRODUCTS_LIST();


?>


<div class="md:container mx-auto">

<?= $list->GET() ?>

</div>