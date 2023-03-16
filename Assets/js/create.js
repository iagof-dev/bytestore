
var img_adjust = document.getElementById('imgadjust');

const imglink = document.getElementById('animg');

imglink.addEventListener('change', update_preview);



function update_preview(){
    // var file = (e.target.files[0]);
    // var filereader = new FileReader();

    // filereader.onload = () =>{
    //     document.getElementById('imgpreview').setAttribute('width', '450px');
    //     document.getElementById('imgpreview').setAttribute('height', '257px');
    //     document.getElementById('imgpreview').setAttribute('src', filereader.result);
    //     document.getElementById('imgadjust').style.marginTop = '0px';
    //     document.getElementById('imgpreview').style.display = 'flex';
    // }
    // filereader.readAsDataURL(file);
    // console.log(file);
    // console.log(filereader.result);

    document.getElementById('imgpreview').setAttribute('width', '450px');
    document.getElementById('imgpreview').setAttribute('height', '257px');
    document.getElementById('imgpreview').src = imglink.value;

}


(function($) {
    
  
  })(jQuery);


  function verify(){
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
  }