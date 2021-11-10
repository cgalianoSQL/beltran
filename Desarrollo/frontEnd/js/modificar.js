var response = document.getElementById('respuesta');

jQuery(document).on('submit', '#formulario', function(event){
    event.preventDefault();

    jQuery.ajax({
        url: 'php/modificar.php',
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        beforeSend: function(){

        }
    })
    .done(function(respuesta) {
        console.log(respuesta);
        if(respuesta === 'Error'){
            response.innerHTML = `
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Error!</strong> Fallo en la modificarcion.
            </div>
            `
        }else{
            respuesta.innerHTML = location.href = 'peliculas.php';
        }
    })

});