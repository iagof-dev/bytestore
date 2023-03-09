
const input_email = document.getElementById('inputemail');

input_email.addEventListener('onkeyup', function(){ 
  var charac = /[g-zG-Z;:,.|_]/;
  var result = charac.test($(this).val());
  if(result == true){
    alert('You can only enter either 0-9 or A-F. Please try again.');
}

});


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