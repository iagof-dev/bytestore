function confirmarAcaoFormulario(formulario, mensagem, confirmarTexto, cancelarTexto, acaoConfirmada, acaoCancelada) {
    let confirmacaoRealizada = false;
  
    $(formulario).one('submit', function (e) {
      e.preventDefault();
  
      if (!confirmacaoRealizada) {
        Swal.fire({
          title: mensagem,
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#d33",
          cancelButtonColor: "#18A5E0",
          confirmButtonText: confirmarTexto,
          cancelButtonText: cancelarTexto,
        }).then((result) => {
          if (result.isConfirmed) {
            confirmacaoRealizada = true; // Evita a chamada duplicada
            if (acaoConfirmada && typeof acaoConfirmada === 'function') {
              acaoConfirmada();
            } else {
              $(formulario).submit();
            }
          } else if (result.isDismissed) {
            if (acaoCancelada && typeof acaoCancelada === 'function') {
              acaoCancelada();
            } else {
              Swal.fire("Cancelado", "Nenhuma ação foi feita.", "error");
            }
          }
        });
      }
    });
  }
  
  confirmarAcaoFormulario('form', "Deseja salvar as alterações?", "Confirmar", "Cancelar", function () {
    console.log("Ação confirmada! Enviando formulário...");
    $('form').submit();
  }, function () {
    console.log("Ação cancelada! Nenhuma ação foi feita.");
  });
  


//
//    onclick="Confirmation(this, 'warning', 'Deseja salvar as alterações?', 'Essa ação é irreversível.', true);"
//

//https://stackoverflow.com/questions/14375144/jquery-prevent-default-then-continue-default
