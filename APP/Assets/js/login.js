



(function($) {
    showSwal = function(type) {
      'use strict';
       if (type === 'success-message') {
        swal({
          title: 'Sucesso!',
          text: 'Logado com sucesso!',
          type: 'success',
          button: {
            text: "Fechar",
            value: true,
            visible: true,
            className: "btn btn-primary"
          }
        })
  
      }else{
          swal("Erro!");
      } 
    }
  
  })(jQuery);