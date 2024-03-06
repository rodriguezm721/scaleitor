@extends('layouts.layout')
@section('content')
<div class="container-fluid pt-4 px-4">
   <div class="bg-light text-center rounded p-4">
      <div class="d-flex align-items-center justify-content-between mb-4">
         <h6 class="mb-0">
            <h3>
               TABLA DE CONVENIOS
            </h3>
         </h6>
         <a class="btn btn-primary" href="{{ route('convenios.insert', $id)}}">Nuevo Convenio</a>
      </div>
      <div class="table-responsive">
         <table class="table text-start align-middle table-bordered table-hover mb-0" id="example">
            <thead>
               <tr class="text-dark">
                  <th scope="col">ID</th>
                  <th scope="col">Fecha Inicio</th>
                  <th scope="col">Fecha Fin</th>
                  <th scope="col">Monto</th>
                  <th scope="col">Dias</th>
                  <th scope="col">Opciones</th>
               </tr>
            </thead>
            <tbody>
               @foreach($convenios as $convenio)
               <tr>
                  <td>{{$convenio->id}}</td>
                  <td>
                     @if(isset($convenio->fecha_inicio))
                     {{$convenio->fecha_inicio}}
                     @else
                     <h6>Sin extensión de tiempo</h6>
                     @endif
                  </td>
                  <td>
                     @if(isset($convenio->fecha_fin))
                     {{$convenio->fecha_fin}}
                     @else
                     <h6>Sin extensión de tiempo</h6>
                     @endif
                  </td>
                  <td>
                     @if(isset($convenio->monto))
                     {{$convenio->monto}}
                     @else
                     <h6>Sin extensión de monto</h6>
                     @endif
                  </td>
                  <td>{{$convenio->dias}}</td>
                  <td>
                     <!--<a href="" class="btn btn-warning btn-sm mt-2">Actualizar</a>--->
                     <button type="button" class="btn btn-danger btn-sm mt-2" onclick="eliminar({{ json_encode(['id' => $convenio->id, 'contractual_id' => $convenio->contractual_id, 'dias' => $convenio->dias, 'monto' => $convenio->monto]) }})">
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
      function eliminar(datos) {
        $("#staticBackdrop").modal("show");
        var deleteForm = document.querySelector('#deleteForm');
        var string = datos.id+'/contractual/'+datos.contractual_id+'/dias/'+datos.dias+'/monto/'+datos.monto;
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
</div>
@endsection