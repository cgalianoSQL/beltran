var response = document.getElementById('respuesta');

jQuery(document).on('submit', '#formulario', function(event){
    event.preventDefault();

    jQuery.ajax({
        url: 'php/signup.php',
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
                <strong>Error!</strong> Contraseña no iguales.
            </div>
            `
        } else if (respuesta === 'falla') {
            response.innerHTML = `
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Error!</strong> Reintente pruebe con otro nombre de usuario.
            </div>
            `
        }else{
            respuesta.innerHTML = location.href = 'login.php';
        }
    })

});