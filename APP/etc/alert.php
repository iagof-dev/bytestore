<?php

class AlertBox{
    function CriarAlerta($titulo, $description, $icon, $confirm_button, $show_cancel = false, $cancel_button, $redirect_link){
        echo("<script>
        Swal.fire({
            title: '". $titulo ."',
            text: '". $description ."',
            icon: '". $icon ."',
            showCancelButton: ". $show_cancel .",
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '". $confirm_button ."'
          }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '". $redirect_link ."';
            }
          })
          setTimeout(function() {
            window.location.href = '". $redirect_link ."';
        }, 1200);
        
        </script>");
    }
}