<?php

require_once(__DIR__ . "/../../etc/admin/product_list.php");


if (isset($_GET['id']) && isset($_GET['action']) && isset($_GET['confirmed']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    echo ('<script> Swal.fire({
      title: "Deseja excluir o anúncio?",
      text: "Esta ação é irreversível.",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#18A5E0",
      confirmButtonText: "Confirmar",
      cancelButtonText: `Cancelar`,
    }).then((result) => {
      if (result.isConfirmed) {
          window.location.assign("/deletar?id=' . $_GET['id'] . '&img='. $_GET['img'] .'");
      } else if (result.isDismissed) {
        Swal.fire("Cancelado", "Nenhuma ação foi feita.", "error");
        window.location.assign("/admin");
      }
    });
    </script>');
}

if (isset($_GET['status']) && $_GET['status'] == "success") {
    echo ('<script> Swal.fire({
        title: "Deletado!",
        text: "Seu anúncio foi removido e já não está mais visível.",
        icon: "success",
        showCancelButton: false,
        confirmButtonColor: "#18A5E0",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ok",
        cancelButtonText: `Cancelar`,
      });
      </script>');
}

include_once(__DIR__ . "/../../etc/menu/user_menu.php");
?>

<div class="container flex mx-auto h-auto pt-5">
    <div class="ml-16">
        <div class="grid items-center place-items-center w-full">
            <h1 class="font-medium text-2xl items-center w-full place-items-center align-middle">Anúncios Ativos:</h1>
            <?= (new ADMIN_PRODUCTS_LIST())->GET() ?>
        </div>
    </div>
</div>