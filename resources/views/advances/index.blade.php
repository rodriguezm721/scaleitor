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
                    Información de Operaciones
                </h3>
            </h6>
            <a class="btn btn-primary" href="{{route('servicios.create')}}">Nueva Operación</a>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0" id="example">
                <thead>
                    <tr class="text-dark">
                        <th scope="col">ID</th>
                        <th scope="col">Nombre Operación</th>
                        <th scope="col">Alcance</th>
                        <th scope="col">Lider</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($operaciones as $operacion)
                    <tr>
                        <td>{{$operacion->id}}</td>
                        <td>{{$operacion->nom_corto}}</td>
                        <td>{{$operacion->alcance}}</td>
                        <td>{{$operacion->lider}}</td>
                        <td>
                            <a href="{{ route('servicios.edit', $operacion->id)}}" class="btn btn-warning btn-sm mt-2">Actualizar</a>
                            <button type="button" class="btn btn-danger btn-sm mt-2" onclick="eliminar({{ json_encode(['id' => $operacion->id, 'contractual_id' => $id]) }})">
                            Eliminar
                            </button>
                            <a href="{{ route('clientes.show', $operacion->id)}}" class="btn btn-success btn-sm mt-2">Contactos</a>
                            <a href="{{ route('comentarios.show', $operacion->id)}}" class="btn btn-info btn-sm mt-2">Comentarios</a>
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
          var string = datos.id+'/contractual/'+datos.contractual_id;
          deleteForm.setAttribute("action", string);

        }
     </script>
</div>
@endsection
