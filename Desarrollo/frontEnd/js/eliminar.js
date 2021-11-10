var response = document.getElementById('respuesta');

jQuery(document).on('submit', '#formulario', function(event){
    event.preventDefault();

    jQuery.ajax({
        url: 'php/eliminar.php',
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        beforeSend: function(){

        }
    })
    .done(function(respuesta) {
        console.log(respuesta);
        if(respuesta === 'error'){
            response.innerHTML = `
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Error!</strong> Fallo no se pudo eliminar.
            </div>
            `
        }else{
            respuesta.innerHTML = location.href = 'peliculas.php';
        }
    })

});
