var response = document.getElementById('respuesta');

jQuery(document).on('submit', '#formulario', function(event){
    event.preventDefault();

    jQuery.ajax({
        url: 'php/login.php',
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        beforeSend: function(){

        }
    })
    .done(function(respuesta) {   
        console.log(respuesta["beltran_usuarios_verificacion"]);

        switch(respuesta["beltran_usuarios_verificacion"]) {
            case 'CLIENTE':
                respuesta.innerHTML = location.href = 'cliente.php';
              break;
            case 'ADMINISTRADOR':
                respuesta.innerHTML = location.href = 'admin.php';
              break;
            case 'SOPORTE':
                respuesta.innerHTML = location.href = 'soporte.php';
            break;
            default:
                response.innerHTML = `
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Error!</strong> usuario o contraseña es incorrecto.
                </div>
                `
        }
    })

});