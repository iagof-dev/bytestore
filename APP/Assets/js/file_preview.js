


const file_preview = document.getElementById('imgpreview');
const input_file = document.getElementById('animg');

file_preview.innerHTML="Nenhuma imagem selecionada...";

input_file.addEventListener('change', function(e){
  // document.getElementById('imgpreview').setAttribute('width', '450px');
  // document.getElementById('imgpreview').setAttribute('height', '265px');
  const inputTarget = e.target;
  const file = inputTarget.files[0];

  if (file){
    const reader = new FileReader();

    reader.addEventListener('load', function(e){
      const readerTarget = e.target;

      const img = document.createElement('img');
      img.src = readerTarget.result;
      img.classList.add('image_preview');
      file_preview.innerHTML= '';
      file_preview.appendChild(img);
    });
    reader.readAsDataURL(file);
  }
  else{
    file_preview.innerHTML="Nenhuma imagem selecionada...";

  }
});


