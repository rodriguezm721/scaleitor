@extends('layouts.layout')
@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Show
            </h6>
            <a class="btn btn-primary" href="{{route('cobros.create')}}">Nuevo Registro</a>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0" id="example">
                <thead>
                    <tr class="text-dark">
                        <th scope="col">ID</th>
                        <th scope="col">Estatus</th>
                        <th scope="col">Ajuste</th>
                        <th scope="col">Act Indirectos</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cobros as $cobro)
                    <tr>
                        <td>{{$cobro->id}}</td>
                        <td>{{$cobro->estatus_est}}</td>
                        <td>{{$cobro->ajuste_costos}}</td>
                        <td>{{$cobro->act_indirectos}}</td>
                        <td>
                            <a href="{{ route('cobros.edit', $cobro->id) }}" class="btn btn-warning btn-sm">Actualizar</a>
                            <button type="button" class="btn btn-danger btn-sm mt-2" onclick="eliminar({{$cobro->id}})">
                            Eliminar
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!---<div class="d-flex align-items-center justify-content-center mb-4 mt-4">
            {{-- $cobros->render('cobros/paginate') --}}
        </div>--->
    </div>
    <div class="modal fade" id="staticBackdrop">
        <div class="modal-dialog modal-sm">
           <div class="modal-content">
              <div class="modal-header">
                 <h5 class="modal-title" id="staticBackdropLabel">¿Esta seguro de eliminar?</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-footer justify-content-center">
                 <form action="" method="post" id="deleteForm">
                    @method('delete')
                    @csrf
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger btn-sm">Confirmar
                    </button>
                 </form>
              </div>
           </div>
        </div>
     </div>
     <script>
        function eliminar(este) {
          $("#staticBackdrop").modal("show");
          var deleteForm = document.querySelector('#deleteForm');
          var string = 'cobros/'+este;
          deleteForm.setAttribute("action", string);

        }
     </script>

    <div class="modal" id="modalEliminar">
        <div class="modal-contenido">
          <span class="cerrar-modal" id="cerrarModal">&times;</span>
          <h2>¿Estás seguro de que quieres eliminar este registro?</h2>
          <p>Esta acción no se puede deshacer.</p>
          <div class="botones">
            <button class="btn-eliminar" id="confirmarEliminar">Eliminar</button>
            <button class="btn-cancelar" id="cancelarEliminar">Cancelar</button>
          </div>
        </div>
    </div>
    <script>
        function delete(elemento) {
        var dato = elemento.getAttribute('data-dato');
        // Ahora 'dato' contiene el valor que pasaste desde la vista Blade
        console.log('El dato es:', elemento);
        // Puedes hacer lo que necesites con 'dato', como enviarlo a tu backend o realizar alguna operación
        }
    </script>
    <!--<script>
        // Obtener elementos del DOM
        const btnAbrirModal = document.getElementById('eliminarRegistro');
        const modal = document.getElementById('modalEliminar');
        const btnCerrarModal = document.getElementById('cerrarModal');
        const btnCancelarEliminar = document.getElementById('cancelarEliminar');
        const btnConfirmarEliminar = document.getElementById('confirmarEliminar');

        // Abrir modal al hacer clic en el botón
        btnAbrirModal.addEventListener('click', () => {
        modal.style.display = 'flex';
        });

        // Cerrar modal al hacer clic en la "X"
        btnCerrarModal.addEventListener('click', () => {
        modal.style.display = 'none';
        });

        // Cerrar modal al hacer clic en Cancelar
        btnCancelarEliminar.addEventListener('click', () => {
        modal.style.display = 'none';
        });

        // Aquí debes agregar la lógica para eliminar el registro al confirmar
        btnConfirmarEliminar.addEventListener('click', () => {
        // Agrega tu lógica de eliminación aquí
        // Por ejemplo, puedes usar AJAX para enviar una solicitud de eliminación al servidor
        // Una vez eliminado, cierra el modal:
        modal.style.display = 'none';
        });

    </script>---->
</div>
@endsection
