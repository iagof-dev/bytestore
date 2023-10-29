function confirmarAcaoFormulario(formulario, mensagem, confirmarTexto, cancelarTexto, acaoConfirmada, acaoCancelada) {
  $(formulario).one('submit', function (e) {
      e.preventDefault();

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
  });
}

// Exemplo de uso
confirmarAcaoFormulario('form', "Deseja salvar as alterações?", "Confirmar", "Cancelar", function () {
  // Lógica personalizada a ser executada quando o usuário confirma a ação
  console.log("Ação confirmada! Enviando formulário...");
  $('form').submit();
}, function () {
  // Lógica personalizada a ser executada quando o usuário cancela a ação
  console.log("Ação cancelada! Nenhuma ação foi feita.");
});


//
//    onclick="Confirmation(this, 'warning', 'Deseja salvar as alterações?', 'Essa ação é irreversível.', true);"
//

//https://stackoverflow.com/questions/14375144/jquery-prevent-default-then-continue-default
