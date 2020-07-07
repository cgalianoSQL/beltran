var response = document.getElementById('respuesta');

jQuery(document).on('submit', '#formulario', function(event){
    event.preventDefault();

    response.innerHTML = location.href = 'peliculas.php';

});
