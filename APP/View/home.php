<?php


if (!(new user)->isLogged())
    echo ('<script> Swal.fire({
    title: "Aviso!",
    text: "O site que você está acessando é parte de um projeto escolar em desenvolvimento e não oferece produtos para compra ou venda, pois seu propósito é estritamente educacional.",
    icon: "warning",
    showCancelButton: false,
    confirmButtonColor: "#18A5E0",
    confirmButtonText: "Entendido",
  });
  </script>');


  

?>

<div>
    <div class="md:container mx-auto w-[50%]">
        <div class="w-full h-5 mx-auto">
            <div class="md:container w-full flex flex-grow justify-center">
                <div class="grid grid-rows-1 auto-rows-max z-0 grid-cols-5 gap-5 items-center justify-center ">
                    <?= (new API())->GET_CARDS(); ?>
                </div>
            </div>
        </div>
    </div>
</div>