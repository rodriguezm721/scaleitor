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
                    INFORMACIÓN CONTRACTUAL
                </h3>
            </h6>
            <a class="btn btn-primary" href="{{route('contratos.create')}}">Nuevo Contrato</a>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0" id="example">
                <thead>
                    <tr class="text-dark">
                        <th scope="col">ID</th>
                        <th scope="col">Nombre contrato</th>
                        <th scope="col" style="display: none">No. contrato</th>
                        <th scope="col">Emp contratada</th>
                        <th scope="col" style="display: none">Consorcio</th>
                        <th scope="col">Emp contratante</th>
                        <th scope="col">Imp contrato</th>
                        <th scope="col" style="display: none">Descripcion</th>
                        <th scope="col">Total Días</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contratos as $contrato)
                    <tr>
                        <td>{{$contrato->id}}</td>
                        <td>{{$contrato->nom_proyecto}}</td>
                        <td style="display: none">{{$contrato->no_contrato}}</td>
                        <td>{{$contrato->empresa_cont}}</td>
                        <td style="display: none">{{$contrato->consorcio}}</td>
                        <td>{{$contrato->emp_contratante}}</td>
                        <td>${{$contrato->imp_contrato}}</td>
                        <td style="display: none">{{$contrato->descripcion}}</td>
                        <td>{{$contrato->total_dias}}</td>
                        <td>
                            <a href="{{ route('contratos.edit', $contrato->id)}}" class="btn btn-warning btn-sm mt-2">Actualizar</a>
                            <button type="button" class="btn btn-danger btn-sm mt-2" onclick="eliminar({{$contrato->id}})">
                            Eliminar
                            </button>
                            <a href="{{ route('convenios.show', $contrato->id)}}" class="btn btn-success btn-sm mt-2">Convenios</a>
                            <a data-bs-toggle="modal" data-bs-target="#modal-{{$contrato->id}}" class="btn btn-primary btn-sm mt-2">Ver más</a>
                        </td>
                    </tr>
                    <div class="modal fade" id="modal-{{$contrato->id}}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Más información</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-6 text-center">
                                  <h6>Folio</h6>
                                  <span>{{$contrato->nom_proyecto}}</span>
                                </div>
                                <div class="col-6 text-center">
                                  <h6>Corte</h6>
                                  <span>{{$contrato->no_contrato}}</span>
                                </div>
                                <div class="col-6 text-center">
                                  <h6>Coodinación</h6>
                                  <span>{{$contrato->coordinacion}}</span>
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Cerrar
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
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
          var string = 'contratos/'+este;
          deleteForm.setAttribute("action", string);

        }
     </script>
</div>
@endsection
