<?php

require_once(__DIR__ . "/../etc/admin/product_list.php");

$list = new ADMIN_PRODUCTS_LIST();

if (isset($_GET['id']) && isset($_GET['action']) && isset($_GET['confirmed']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    echo ('<script> Swal.fire({
      title: "Deseja excluir o anúncio?",
      text: "Essa ação é irreversível.",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#18A5E0",
      cancelButtonColor: "#d33",
      confirmButtonText: "Confirmar",
      cancelButtonText: `Cancelar`,
    }).then((result) => {
      if (result.isConfirmed) {
          window.location.assign("/deletar?id=' . $_GET['id'] . '");
      } else if (result.isDismissed) {
        Swal.fire("Cancelado", "Nenhuma ação foi feita.", "error");
        window.location.assign("/admin");
      }
    });
    </script>');
}

if (isset($_GET['status']) && $_GET['status'] == "success") {
    echo ('<script> Swal.fire({
        title: "Sucesso!",
        text: "Decidindo.",
        icon: "success",
        showCancelButton: false,
        confirmButtonColor: "#18A5E0",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ok",
        cancelButtonText: `Cancelar`,
      });
      </script>');
}


?>


<div class="container flex mx-auto h-auto pt-5">
    
    <?php include_once(__DIR__ . "/../etc/menu/user_menu.php");?>

    <div class="ml-16">
        <div class="grid items-center place-items-center w-full">
            <h1 class="font-medium text-2xl items-center w-full place-items-center align-middle">Anúncios Ativos:</h1>
            <?= $list->GET() ?>
        </div>
    </div>
</div>