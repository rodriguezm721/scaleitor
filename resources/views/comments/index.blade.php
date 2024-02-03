@extends('layouts.layout')
@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
      @if($errors->has('error'))
      <div class="alert alert-danger">
          {{ $errors->first('error') }}
      </div>
      @endif
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">
                <h3>
                    Información de Comentarios
                </h3>
            </h6>
            <a class="btn btn-primary" href="{{route('comentarios.insert', $id)}}">Nuevo Comentario</a>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col">Comentario</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($comentarios as $comentario)
                    <tr>
                        <td>{{$comentario->comment}}</td>
                        <td>{{$comentario->tipo}}</td>
                        <td>
                            <a href="" class="btn btn-warning btn-sm mt-2" style="display: none">Actualizar</a>
                            <button type="button" class="btn btn-danger btn-sm mt-2" onclick="eliminar({{ json_encode(['id' => $comentario->id, 'service_id' => $id]) }})">
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
            //alert(datos.id);
            //alert(datos.service_id);
            $("#staticBackdrop").modal("show");
            var deleteForm = document.querySelector('#deleteForm');
            var string = datos.id+'/service/'+datos.service_id;
            deleteForm.setAttribute("action", string);

        }
     </script>
</div>
@endsection
