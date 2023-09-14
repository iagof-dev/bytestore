const dropdown = document.getElementById('dropdown-menu');
const icon = document.getElementById('dropdown-icon');
const dropdown_context = document.getElementById('dropdown-menu-context');
var open = false;


document.body.addEventListener('click', (e) => {
    if (!dropdown_context.contains(e.target)) {
        dropdown_context.style = 'display: none;';
        icon.innerText = "▾";
        open = false;
    }
  });

  dropdown.addEventListener('hover', function (e) {
    e.stopPropagation();
    if(open === false){
        dropdown_context.style = 'display: grid;';
        icon.innerText = "▴";
        open = true;
    }
    else{
        dropdown_context.style = 'display: none;';
        icon.innerText = "▾";
        open = false;
    }
    
});

dropdown.addEventListener('click', function (e) {
    e.stopPropagation();
    if(open === false){
        dropdown_context.style = 'display: grid;';
        icon.innerText = "▴";
        open = true;
    }
    else{
        dropdown_context.style = 'display: none;';
        icon.innerText = "▾";
        open = false;
    }
    
});