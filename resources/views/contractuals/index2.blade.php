@extends('layouts.layout')
@section('content')
<style>
   .bg{
   background: #00B4DB;  /* fallback for old browsers */
   background: -webkit-linear-gradient(to right, #0083B0, #00B4DB);  /* Chrome 10-25, Safari 5.1-6 */
   background: linear-gradient(to right, #0083B0, #00B4DB); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
   }
   .scrollable-container {
   max-height: 300px; /* ajusta la altura máxima según tus necesidades */
   overflow-y: auto;
   border: 1px solid #ccc; /* agrega un borde para mayor claridad */
   border-radius: 4px; /* redondea las esquinas */
   padding: 10px; /* agrega espacio interno */
   }
</style>
<div class="container-fluid pt-4 px-4">
   <div class="bg-light text-center rounded p-4">
      @if($errors->has('error'))
      <div class="alert alert-danger">
         {{ $errors->first('error') }}
      </div>
      @endif
      <div class="container mt-5 mb-5">
         <div class="card shadow">
            <div class="card-header bg-primary text-white">
               <h4 class="mb-0">Información Contractual</h4>
            </div>
            <div class="card-body">
               @foreach($contratos as $contrato)
               <div class="row mb-3">
                  <div class="col-md-6">
                     <h6 class="font-weight-bold">Nombre del Contrato</h6>
                     <span>{{$contrato->nom_proyecto}}</span>
                  </div>
                  <div class="col-md-6">
                     <h6 class="font-weight-bold">Número de Contrato</h6>
                     <span>{{$contrato->no_contrato}}</span>
                  </div>
               </div>
               <div class="row mb-3">
                  <div class="col-md-6">
                     <h6 class="font-weight-bold">Empresa contratada</h6>
                     <span>{{$contrato->empresa_cont}}</span>
                  </div>
                  <div class="col-md-6">
                     <h6 class="font-weight-bold">Consorcio</h6>
                     <span>{{$contrato->consorcio ?? 'Sin información de consorcio'}}</span>
                  </div>
               </div>
               <div class="row mb-3">
                  <div class="col-md-6">
                     <h6 class="font-weight-bold">Empresa contratante</h6>
                     <span>{{$contrato->emp_contratante}}</span>
                  </div>
                  <div class="col-md-6">
                     <h6 class="font-weight-bold">Coordinacion</h6>
                     <span>{{$contrato->coordinacion ?? 'Sin información de consorcio'}}</span>
                  </div>
               </div>
               <div class="row mb-3">
                  <div class="col-md-6">
                     <h6 class="font-weight-bold">Importe de contrato</h6>
                     <span>${{number_format($contrato->imp_contrato, 2, '.', ',')}}</span>
                  </div>
                  <div class="col-md-6">
                     <h6 class="font-weight-bold">Total días</h6>
                     <span>{{$contrato->total_dias ?? 'Sin información de consorcio'}}</span>
                  </div>
               </div>
               <div class="row mb-3">
                  <div class="col-md-6">
                     <h6 class="font-weight-bold">Fecha Inicio</h6>
                     <span>{{$contrato->fecha_inicio}}</span>
                  </div>
                  <div class="col-md-6">
                     <h6 class="font-weight-bold">Fecha Fin</h6>
                     <span>{{$contrato->fecha_fin ?? 'Sin información de consorcio'}}</span>
                  </div>
               </div>
               <div class="row mb-3">
                  <div class="col-md-12">
                     <h6 class="font-weight-bold">Descripcion</h6>
                     <span>{{$contrato->descripcion}}</span>
                  </div>
               </div>
               <!-- Repite el patrón para otras secciones -->
               @endforeach
            </div>
         </div>
      </div>
      <div class="container mt-5">
         <div class="card shadow">
            <div class="card-header bg-primary text-white">
               <div class="d-flex align-items-center justify-content-between">
                  <h4 class="mb-0">
                     Convenios
                  </h4>
                  <a class="btn btn-success" href="{{ route('convenios.insert', $id)}}"><i class="fa fa-plus"></i></a>
               </div>
            </div>
            @if(count($convenios) > 0)
            <div class="accordion accordion-flush" id="accordionFlushExample">
               @foreach($convenios as $convenio)
               <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-heading{{$convenio->id}}">
                     <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-{{$convenio->id}}" aria-expanded="false" aria-controls="flush-collapse{{$convenio->id}}">
                        <h6 class="mb-0">Convenio {{ $convenio->id }}</h6>
                     </button>
                  </h2>
                  <div id="flush-{{$convenio->id}}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{$convenio->id}}" data-bs-parent="#accordionFlushExample">
                     <div class="accordion-body">
                        <div class="table-responsive">
                           <table class="table table-borderless text-start align-middle table-hover mb-0">
                              <thead>
                                 <tr class="text-dark">
                                    <th scope="col">Fecha Inicio</th>
                                    <th scope="col">Fecha Fin</th>
                                    <th scope="col">Monto</th>
                                    <th scope="col">Días</th>
                                    <th scope="col"></th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
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
                                       ${{$convenio->monto}}
                                       @else
                                       <h6>Sin extensión de monto</h6>
                                       @endif
                                    </td>
                                    <td>{{$convenio->dias}}</td>
                                    <td>
                                       <button type="button" class="btn btn-danger btn-sm" onclick="eliminar({{ json_encode(['id' => $convenio->id, 'contractual_id' => $convenio->contractual_id, 'dias' => $convenio->dias, 'monto' => $convenio->monto]) }})">
                                       <i class="fa fa-trash"></i>
                                       </button>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
            @else
            <div class="card-body">
               <p>No hay datos disponibles.</p>
            </div>
            @endif
         </div>
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
      <div class="container mt-5">
         <div class="card shadow">
            <div class="card-header bg-primary text-white">
               <div class="d-flex align-items-center justify-content-between">
                  <h4 class="mb-0">
                     Trabajos
                  </h4>
                  <a class="btn btn-success" href="{{ route('servicios.insert', $id)}}"><i class="fa fa-plus"></i></a>
               </div>
            </div>
            @if(count($operaciones) > 0)
            <div class="accordion accordion-flush" id="accordionFlushExample">
               @foreach($operaciones as $operacion)
               <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-heading{{$operacion->id}}">
                     <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flushop-{{$operacion->id}}" aria-expanded="false" aria-controls="flushop-{{$operacion->id}}">
                        <h6 class="mb-0">{{ $operacion->nom_corto}}</h6>
                     </button>
                  </h2>
                  <div id="flushop-{{$operacion->id}}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{$operacion->id}}" data-bs-parent="#accordionFlushExample">
                     <div class="accordion-body">
                        <div class="table-responsive mt-4">
                           <table class="table text-start align-middle table-borderless table-hover mb-4">
                              <thead>
                                 <tr class="text-dark">
                                    <th scope="col">Nombre Corto</th>
                                    <th scope="col">Alcance del Servicio</th>
                                    <th scope="col">Líder</th>
                                    <th scope="col"></th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td>{{$operacion->nom_corto}}</td>
                                    <td>{{$operacion->alcance}}</td>
                                    <td>{{$operacion->lider}}</td>
                                    <td>
                                       <button type="button" class="btn btn-danger btn-sm mt-2" onclick="eliminar2({{ json_encode(['id' => $operacion->id, 'contractual_id' => $id]) }})">
                                       <i class="fa fa-trash"></i>
                                       </button>
                                       <a href="{{ route('servicios.edit', $operacion->id)}}" class="btn btn-warning btn-sm mt-2"><i class="fa fa-edit"></i></a>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="d-flex align-items-center justify-content-between mb-4">
                                 <h4>Contactos</h4>
                                 <a class="btn btn-primary" href="{{route('clientes.insert', ['service_id' => $operacion->id, 'id' => $id])}}"><i class="fa fa-plus"></i></a>
                              </div>
                              <div class="scrollable-container">
                                 <ul class="list-group list-group-flush">
                                    @foreach($operacion->customers as $contacto)
                                    <li class="list-group-item">
                                       <strong>Nombre:</strong> {{ $contacto->nom_cliente }}<br>
                                       <strong>Cargo:</strong> {{ $contacto->cargo }}<br>
                                       <strong>Empresa:</strong> {{ $contacto->empresa }}<br>
                                       <strong>Correo:</strong> {{ $contacto->email }}<br>
                                       <strong>Tel/Cel:</strong> {{ $contacto->num_tel }}<br>
                                       <button type="button" class="btn btn-danger btn-sm mt-2" onclick="eliminar3({{ json_encode(['id' => $contacto->id, 'contrato_id' => $id]) }})">
                                       <i class="fa fa-trash"></i>
                                       </button>
                                       <!-- Agrega más campos según sea necesario -->
                                    </li>
                                    @endforeach
                                 </ul>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="d-flex align-items-center justify-content-between mb-4">
                                 <h4>Comentarios</h4>
                                 <a class="btn btn-primary" href="{{route('comentarios.insert', ['service_id' => $operacion->id, 'id' => $id])}}"><i class="fa fa-plus"></i></a>
                              </div>
                              <div class="scrollable-container">
                                 <ul class="list-group list-group-flush">
                                    @foreach($operacion->comments as $comment)
                                    <li class="list-group-item">
                                       <strong>Comentario:</strong> {{ $comment->comment }}<br>
                                       <strong>Tipo:</strong> {{ $comment->tipo }}<br>
                                       <strong>Fecha:</strong> {{ $comment->created_at->format('Y-m-d') }}<br>
                                       <button type="button" class="btn btn-danger btn-sm mt-2" onclick="eliminarComment({{ json_encode(['id' => $comment->id, 'contrato_id' => $id]) }})">
                                       <i class="fa fa-trash"></i>
                                       </button>
                                       <!-- Agrega más campos según sea necesario -->
                                    </li>
                                    @endforeach
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
            @else
            <div class="card-body">
               <p>No hay datos disponibles.</p>
            </div>
            @endif
         </div>
      </div>
      <div class="container mt-5 mb-5">
         <div class="card shadow">
            <div class="card-header bg-primary text-white">
               <div class="d-flex align-items-center justify-content-between">
                  <h4 class="mb-0">
                     Avances
                  </h4>
                  <a class="btn btn-success" href="{{ route('avances.insert', $id)}}"><i class="fa fa-plus"></i></a>
               </div>
            </div>
            <div class="card-body">
               @if(count($avances) > 0)
               @foreach($avances as $avance)
               <div class="row mb-3">
                  <div class="col-md-6">
                     <h6 class="font-weight-bold">Programado Físico</h6>
                     <span>{{$avance->pro_fisico}}%</span>
                  </div>
                  <div class="col-md-6">
                     <h6 class="font-weight-bold">Real Físico</h6>
                     <span>{{$avance->real_fisico}}%</span>
                  </div>
               </div>
               <div class="row mb-3">
                  <div class="col-md-6">
                     <h6 class="font-weight-bold">Desviación Física</h6>
                     <span>{{$avance->des_fisico}}%</span>
                  </div>
                  <div class="col-md-6">
                     <h6 class="font-weight-bold">Observaciones</h6>
                     <span>{{$avance->fisico_obs}}</span>
                  </div>
               </div>
               <br>
               <br>
               <div class="row mb-3">
                  <div class="col-md-6">
                     <h6 class="font-weight-bold">Programado Financiero</h6>
                     <span>${{$avance->pro_fina}}</span>
                  </div>
                  <div class="col-md-6">
                     <h6 class="font-weight-bold">Real Financiero</h6>
                     <span>${{$avance->real_fina}}</span>
                  </div>
               </div>
               <div class="row mb-3">
                  <div class="col-md-6">
                     <h6 class="font-weight-bold">Desviación Financiera</h6>
                     <span>${{$avance->des_fina}}</span>
                  </div>
                  <div class="col-md-6">
                     <h6 class="font-weight-bold">Observaciones</h6>
                     <span>{{$avance->financiero_obs}}</span>
                  </div>
               </div>
               <div class="row mb-3">
                  <div class="col-md-6 offset-md-3">
                     <button type="button" class="btn btn-danger btn-sm" onclick="eliminarAvance({{ json_encode(['id' => $avance->id, 'contrato_id' => $id]) }})">
                     <i class="fa fa-trash"></i>
                     </button>
                     <a href="{{ route('avances.edit', $avance->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                  </div>
               </div>
               @endforeach
               @else
               <p>No hay datos disponibles.</p>
               @endif
            </div>
         </div>
      </div>
      <div class="container mt-5">
         <div class="card shadow">
            <div class="card-header bg-primary text-white">
               <div class="d-flex align-items-center justify-content-between">
                  <h4 class="mb-0">
                     Cobros
                  </h4>
                  <a class="btn btn-success" href="{{ route('cobros.insert', $id)}}"><i class="fa fa-plus"></i></a>
               </div>
            </div>
            <div class="card-body">
               @if(count($cobros) > 0)
               <div class="table-responsive">
                  <table class="table text-start align-middle table-striped table-hover table-hover mb-0">
                     <thead>
                        <tr class="text-dark">
                           <th scope="col">No.</th>
                           <th scope="col">Periodo</th>
                           <th scope="col">Total contrato</th>
                           <th scope="col">Fecha Ingreso</th>
                           <th scope="col">Programado</th>
                           <th scope="col">%</th>
                           <th scope="col">Acumulado</th>
                           <th scope="col">%</th>
                           <th scope="col">Estimado</th>
                           <th scope="col">%</th>
                           <th scope="col">Acumulado</th>
                           <th scope="col">%</th>
                           <th scope="col">Cobrado</th>
                           <th scope="col">%</th>
                           <th scope="col">Acumulado</th>
                           <th scope="col">%</th>
                           <th scope="col">Comentarios</th>
                           <th scope="col">Acciones</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($cobros as $cobro)
                        <tr>
                           <td>{{$cobro->id}}</td>
                           <td>{{$cobro->periodo}}</td>
                           <td>{{number_format($cobro->total_contrato, 2, '.', ',')}}</td>
                           <td>{{$cobro->fecha_ingreso}}</td>
                           <td>${{number_format($cobro->programado, 2, '.', ',')}}</td>
                           <td>{{$cobro->program_xcentaje}}%</td>
                           <td>${{number_format($cobro->acum_promg, 2, '.', ',')}}</td>
                           <td>{{$cobro->acumpg_xcentaje}}%</td>
                           <td>${{number_format($cobro->estimado, 2, '.', ',')}}</td>
                           <td>{{$cobro->estim_xcentaje}}%</td>
                           <td>${{number_format($cobro->acum_esti, 2, '.', ',')}}</td>
                           <td>{{$cobro->acumest_xcentaje}}%</td>
                           <td>${{number_format($cobro->cobrado, 2, '.', ',')}}</td>
                           <td>{{$cobro->cobra_xcentaje}}%</td>
                           <td>${{number_format($cobro->acum_cobra, 2, '.', ',')}}</td>
                           <td>{{$cobro->acumcobra_xcentaje}}%</td>
                           <td>{{$cobro->comentario}}</td>
                           <td>
                              <a href="{{ route('cobros.edit', $cobro->id)}}" class="btn btn-warning btn-sm mt-2"><i class="fa fa-edit"></i></a>
                              <button type="button" class="btn btn-danger btn-sm mt-2" onclick="eliminarCobro({{ json_encode(['id' => $cobro->id, 'contrato_id' => $id]) }})">
                              <i class="fa fa-trash"></i>
                              </button>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
               @else
               <p>No hay datos disponibles.</p>
               @endif
            </div>
         </div>
      </div>
      <script>
         function eliminarCobro(datos) {
             //alert(datos.id);
             //alert(datos.service_id);
             $("#staticBackdrop").modal("show");
             var deleteForm = document.querySelector('#deleteForm');
             var string = datos.id+'/contract/'+datos.contrato_id;
             deleteForm.setAttribute("action", string);
         
         }
         function eliminarAvance(datos) {
             //alert(datos.id);
             //alert(datos.service_id);
             $("#staticBackdrop").modal("show");
             var deleteForm = document.querySelector('#deleteForm');
             var string = datos.id+'/contrato/'+datos.contrato_id;
             deleteForm.setAttribute("action", string);
         
         }
         function eliminarComment(datos) {
             //alert(datos.id);
             //alert(datos.service_id);
             $("#staticBackdrop").modal("show");
             var deleteForm = document.querySelector('#deleteForm');
             var string = datos.id+'/operation/'+datos.contrato_id;
             deleteForm.setAttribute("action", string);
         
         }
         function eliminar3(datos) {
             //alert(datos.id);
             //alert(datos.service_id);
             $("#staticBackdrop").modal("show");
             var deleteForm = document.querySelector('#deleteForm');
             var string = datos.id+'/service/'+datos.contrato_id;
             deleteForm.setAttribute("action", string);
         
         }
         function eliminar2(datos) {
           $("#staticBackdrop").modal("show");
           var deleteForm = document.querySelector('#deleteForm');
           var string = datos.id+'/contractual/'+datos.contractual_id;
           deleteForm.setAttribute("action", string);
         
         }
      </script>
   </div>
</div>
@endsection