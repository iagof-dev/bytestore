const img_adjust = document.getElementById('imgadjust');
const imglink = document.getElementById('animg');

imglink.addEventListener('change', update_preview);

function update_preview(){
  document.getElementById('imgpreview').setAttribute('width', '450px');
  document.getElementById('imgpreview').setAttribute('height', '257px');
  document.getElementById('imgpreview').src = imglink.value;
}



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