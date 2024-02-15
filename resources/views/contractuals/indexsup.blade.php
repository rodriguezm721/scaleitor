@extends('layouts.layout')
@section('content')

<div class="container-fluid pt-4 px-4">
  <div class="row g-4">
      <div class="col-sm-6 col-xl-3">
          <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
              <i class="fa fa-chart-line fa-3x text-primary"></i>
              <div class="ms-3">
                  <p class="mb-2">Proyectos</p>
                  <h6 class="mb-0">{{ $proyectos }}</h6>
              </div>
          </div>
      </div>
      <div class="col-sm-6 col-xl-3">
          <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
              <i class="fa fa-tree fa-3x text-primary"></i>
              <div class="ms-3">
                  <p class="mb-2">Ambiental</p>
                  <h6 class="mb-0">{{ $ambiental }}</h6>
              </div>
          </div>
      </div>
      <div class="col-sm-6 col-xl-3">
          <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
              <i class="fa fa-user fa-3x text-primary"></i>
              <div class="ms-3">
                  <p class="mb-2">Supervisión</p>
                  <h6 class="mb-0">{{ $supervision }}</h6>
              </div>
          </div>
      </div>
      <div class="col-sm-6 col-xl-3">
          <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
              <i class="fa fa-hammer fa-3x text-primary"></i>
              <div class="ms-3">
                  <p class="mb-2">Construcción</p>
                  <h6 class="mb-0">{{ $construccion }}</h6>
              </div>
          </div>
      </div>
  </div>
</div>

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
                    INFORMACIÓN CONTRACTUAL SUPERVISIÓN
                </h3>
            </h6>
            <a class="btn btn-primary" href="{{route('contratos.create')}}">Nuevo Contrato</a>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0" id="example">
                <thead>
                    <tr class="text-dark">
                        <th scope="col">Nombre corto</th>
                        <th scope="col" style="display: none">No. contrato</th>
                        <th scope="col">Empresa contratada</th>
                        <th scope="col" style="display: none">Consorcio</th>
                        <th scope="col">Empresa contratante</th>
                        <th scope="col">Importe contrato</th>
                        <th scope="col" style="display: none">Descripcion</th>
                        <th scope="col">Fecha Inicio</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contratos as $contrato)
                    <tr>
                        <td>{{$contrato->nom_proyecto}}</td>
                        <td style="display: none">{{$contrato->no_contrato}}</td>
                        <td>{{$contrato->empresa_cont}}</td>
                        <td style="display: none">{{$contrato->consorcio}}</td>
                        <td>{{$contrato->emp_contratante}}</td>
                        <td>${{number_format($contrato->imp_contrato, 2, '.', ',')}}</td>
                        <td style="display: none">{{$contrato->descripcion}}</td>
                        <td>{{$contrato->fecha_inicio}}</td>
                        <td>
                          <a href="{{ route('contratos.edit', $contrato->id)}}" class="btn btn-warning btn-sm mt-2"><i class="fa fa-edit"></i></a>
                              <button type="button" class="btn btn-danger btn-sm mt-2" onclick="eliminar({{$contrato->id}})">
                                <i class="fa fa-trash"></i>
                              </button>
                              <a href="{{ route('contratos.show', $contrato->id)}}" class="btn btn-info btn-sm mt-2"><i class="fa fa-eye"></i></a>
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
          var string = 'contratos/'+este;
          deleteForm.setAttribute("action", string);

        }
     </script>
</div>
@endsection
