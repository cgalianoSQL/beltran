var formulario = document.getElementById('formulario');
var respuesta = document.getElementById('respuesta');

formulario.addEventListener('submit', function(e){
    e.preventDefault();

    var datos = new FormData(formulario);

    fetch('php/contactanos.php',{
        method: 'POST',
        body: datos
    })
        .then( res => res.json())
        .then( data => {
            if(data === 'error'){
                alert("SE A PRODUCIDO UN ERROR!!");
            }else{
                document.getElementById('formulario').reset();
                alert("DATOS CARGADOS CON EXITO!!");
            }
        } )
})