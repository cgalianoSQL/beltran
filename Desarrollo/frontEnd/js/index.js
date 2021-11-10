var response = document.getElementById('respuesta');

jQuery(document).ready(function(){
    
    jQuery.ajax({
        url: 'php/index.php',
        type: 'GET',
        dataType: 'json',
        data: $(this).serialize(),
        beforeSend: function(){

        }
    })
    .done(function(respuesta) {
        console.log(respuesta);

    })

});