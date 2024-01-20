let contadorFilas = 1;
function agregarFila() {
    const filasContainer = document.getElementById('filas-container');
    filasContainer.style ='';

    const nuevaFila = document.createElement('div');
    nuevaFila.classList.add('row', 'g-3', 'fila');

    nuevaFila.innerHTML = `
    <div class="col-md-5">
    <div class="form-floating mb-3">
    <input name="datos[${contadorFilas}][campo1]" type="date" class="form-control" id="floatingPassword"
    placeholder="Ajuste Costos">
    <label for="floatingPassword">Fecha de Inicio</label>
    </div>
    </div>
    <div class="col-md-5">
    <div class="form-floating mb-3">
    <input name="datos[${contadorFilas}][campo2]" type="date" class="form-control" id="floatingPassword"
    placeholder="Ajuste Costos">
    <label for="floatingPassword">Fecha de Fin</label>
    </div>
    </div>
    <div class="col-md-2 text-center">
    <button type="button" class="btn btn-danger mt-2 mb-2" onclick="eliminarFila(this)">Eliminar</button>
    </div>
    `;
    filasContainer.appendChild(nuevaFila);
    contadorFilas++;
}
function eliminarFila(botonEliminar) {
    const fila = botonEliminar.parentNode.parentNode;
    fila.parentNode.removeChild(fila);
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