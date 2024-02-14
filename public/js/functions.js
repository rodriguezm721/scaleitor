let contadorFilas = 1;

function agregarFila() {
    const filasContainer = document.getElementById('filas-container');
    filasContainer.style ='';

    const nuevaFila = document.createElement('div');
    nuevaFila.classList.add('row', 'g-3', 'fila');

    nuevaFila.innerHTML = `
        <div class="col-md-12 mb-3">
            <h5>Contacto ${contadorFilas}</h5>
        </div>
        <div class="col-md-4">
            <div class="form-floating mb-3">
                <input name="datos[${contadorFilas}][campo1]" type="text" class="form-control" placeholder="Nombre de cliente">
                <label for="floatingPassword">Nombre de contacto</label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-floating mb-3">
                <input name="datos[${contadorFilas}][campo2]" type="text" class="form-control" placeholder="Cargo">
                <label for="floatingPassword">Cargo</label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-floating mb-3">
                <input name="datos[${contadorFilas}][campo3]" type="text" class="form-control" placeholder="Empresa">
                <label for="floatingPassword">Empresa</label>
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-floating mb-3">
                <input name="datos[${contadorFilas}][campo4]" type="email" class="form-control" placeholder="Correo">
                <label for="floatingPassword">Correo</label>
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-floating mb-3">
                <input name="datos[${contadorFilas}][campo5]" type="number" class="form-control" placeholder="Tel/Cel">
                <label for="floatingPassword">Tel/Cel</label>
            </div>
        </div>
        <div class="col-md-2 text-center">
            <button type="button" class="btn btn-danger mt-2 mb-2" onclick="eliminarFila(this)">Eliminar</button>
        </div>
    `;

    filasContainer.appendChild(nuevaFila);

    // Agrega una línea horizontal con estilos notorios después de cada fila
    const lineaHorizontal = document.createElement('hr');
    lineaHorizontal.style.borderTop = '1px solid #d9534f';  // Cambia el color y grosor según tus preferencias
    filasContainer.appendChild(lineaHorizontal);

    contadorFilas++;
}

function eliminarFila(botonEliminar) {
    const fila = botonEliminar.parentNode.parentNode;
    const linea = fila.nextElementSibling; // Obtiene la línea horizontal después de la fila
    fila.parentNode.removeChild(fila);
    if (linea) {
        linea.parentNode.removeChild(linea);
    }
}


$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtipl',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        "language": {
                "search": "Buscar...",
                "lengthMenu": "Mostrando _MENU_ por página",
                "zeroRecords": "No se encontro información",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtración total de _MAX_ registros)",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
            }
    } );
} );