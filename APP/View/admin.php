<?php

require_once(__DIR__ . "/../etc/admin/product_list.php");

$list = new ADMIN_PRODUCTS_LIST();

if(isset($_GET['id']) && isset($_GET['action']) && isset($_GET['confirmed']) && $_GET['action'] == 'delete' && isset($_GET['id'])){
  echo('<script> Swal.fire({
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
          window.location.assign("/deletar?id='.$_GET['id'] .'");
      } else if (result.isDismissed) {
        Swal.fire("Cancelado", "Nenhuma ação foi feita.", "error");
        window.location.assign("/admin");
      }
    });
    </script>');
}

if(isset($_GET['status']) && $_GET['status'] == "success"){
    echo('<script> Swal.fire({
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
    <div class="grid bg-slate-400 w-64 h-[50rem] text-center">
        <div class="h-5">
            <a href="1"><span>Minha Conta</span></a>
        </div>

        <div class="h-5">
            <a href="2"><span>Minhas Compras</span></a>
        </div>

        <div class="h-5">
            <a href="3" class="h-3"><span>Meus Anúncios</span></a>
        </div>

        <div class="h-5">
            <a href="4"><span>Configurações</span></a>

        </div>

        <div class="h-5 bg-blue-800">
            <a href="5" class=" bg-blue-200"><span>Sair</span></a>
        </div>
    </div>


    <div class="ml-16">
        <div class="grid items-center place-items-center">
            <h1 class="font-medium text-2xl items-center place-items-center align-middle">Anúncios Ativos:</h1>
            <?= $list->GET() ?>
        </div>
    </div>
</div>