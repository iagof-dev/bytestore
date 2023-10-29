// btnEdit.addEventListener('click', function(e) {
$("form").one("submit", function (e) {
  e.preventDefault();

  Swal.fire({
    title: "Confirmar as alterações?",
    text: "Essa ação é irreversível.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#18A5E0",
    confirmButtonText: "Confirmar",
    cancelButtonText: `Cancelar`,
  }).then((result) => {
    if (result.isConfirmed) {
      $(this).submit();
    } else if (result.isDismissed) {
      Swal.fire("Cancelado", "Nenhuma ação foi feita.", "error");
    }
  });
});

//https://stackoverflow.com/questions/14375144/jquery-prevent-default-then-continue-default
