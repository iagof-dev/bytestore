
var img_adjust = document.getElementById('imgadjust');




function update_preview(e){
    var file = (e.target.files[0]);
    var filereader = new FileReader();

    filereader.onload = () =>{
        document.getElementById('imgpreview').setAttribute('width', '450px');
        document.getElementById('imgpreview').setAttribute('height', '257px');
        document.getElementById('imgpreview').setAttribute('src', filereader.result);
        document.getElementById('imgadjust').style.marginTop = '0px';
        document.getElementById('imgpreview').style.display = 'flex';
        
    }
    filereader.readAsDataURL(file);
}


(function($) {
    showSwal = function(type) {
      'use strict';
       if (type === 'success-message') {
        swal({
          title: 'Sucesso!',
          text: 'Anúncio criado com sucesso!',
          type: 'success',
          button: {
            text: "Fechar",
            value: true,
            visible: true,
            className: "btn btn-primary"
          }
        })
  
      }else{
          swal("Error occured !");
      } 
    }
  
  })(jQuery);