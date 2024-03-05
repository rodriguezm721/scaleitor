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
@php 
$monto_total_convenios = 0; 
$dias_totales = 0;
$monto_contrato = 0;
@endphp
@foreach($convenios as $convenio)
@php 

$monto_total_convenios += $convenio->monto; 
$dias_totales += $convenio->dias; 
$monto_contrato = $contrato->imp_contrato + $monto_total_convenios;
@endphp
@endforeach
<div class="container-fluid pt-4 px-4">
   <div class="bg-light text-center rounded p-4">
      @if($errors->has('error'))
      <div class="alert alert-danger">
         {{ $errors->first('error') }}
      </div>
      @endif
      <div class="container mt-5 mb-5">
         <div class="card shadow">
            <div class="card-header color-nav text-white">
               <h4 class="mb-0">Información Contractual</h4>
            </div>
            <div class="card-body">
               <div class="row mb-3">
                  <div class="col-md-6">
                     <h6 class="font-weight-bold">Nombre corto</h6>
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
                     <span>${{ number_format($contrato->imp_contrato + $monto_total_convenios, 2, '.', ',') }}</span>
                  </div>
                  <div class="col-md-6">
                     <h6 class="font-weight-bold">Total días</h6>
                     <span>{{$contrato->total_dias + $dias_totales ?? 'Sin información de consorcio'}}</span>
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
                  <div class="col-md-6">
                     <h6 class="font-weight-bold">Descripcion</h6>
                     <span>{{$contrato->descripcion}}</span>
                  </div>
                  <div class="col-md-6">
                     <h6 class="font-weight-bold">Centro de Costos</h6>
                     <span>{{$contrato->c_costo}}</span>
                  </div>
               </div>
               <div class="row mb-3">
                  <div class="col-md-12">
                     <h6 class="font-weight-bold">Estatus</h6>
                        @if($contrato->status == 1)
                        <a @can('create contratos') href="" data-bs-toggle="modal" data-bs-target="#modal2" @endcan>
                           <span class="badge rounded-pill bg-success">Abierto</span>
                        </a>
                        @else
                           <a @can('create contratos') href="" data-bs-toggle="modal" data-bs-target="#modal2" @endcan><span class="badge rounded-pill bg-danger">Cerrado</span></a>
                        @endif
                  </div>
               </div>
               <!-- Repite el patrón para otras secciones -->
               <div class="modal fade" id="modal2" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-sm" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                           <form class="row g-3" method="POST" action=" {{ route('contratos.status')}}">
                              @csrf
                              <div class="col-md-12">
                                 <input type="hidden" name="id" value="">
                              </div>
                              <input type="text" name="id" value="{{$contrato->id}}" style="display: none">
                              <div class="col-md-12">
                                 <label class="form-label">Contrato</label>
                                 <select class="form-select" name="status">
                                    <option selected>Elije...</option>
                                    <option value="0">Cerrado</option>
                                    <option value="1">Abierto</option>
                                 </select>
                              </div>
                              <div class="col-12 mt-4">
                                 <button type="submit" class="btn btn-primary">Guardar</button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="container mt-5">
         <div class="card shadow">
            <div class="card-header color-nav text-white">
               <div class="d-flex align-items-center justify-content-between">
                  <h4 class="mb-0">
                     Convenios
                  </h4>
                  @can('create convenios')
                  <a class="btn btn-success" href="{{ route('convenios.insert', $contrato->id)}}"><i class="fa fa-plus"></i></a>
                  @endcan
               </div>
            </div>
            @if(count($convenios) > 0)
            <div class="accordion accordion-flush" id="accordionFlushExample">
               @php $contador = 1; @endphp
               @foreach($convenios as $convenio)
               <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-heading{{$convenio->id}}">
                     <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-{{$convenio->id}}" aria-expanded="false" aria-controls="flush-collapse{{$convenio->id}}">
                        <h6 class="mb-0">Convenio {{ $contador }}</h6>
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
                                    <th scope="col">Comentarios</th>
                                    @if (Gate::check('delete convenios') || Gate::check('update convenios'))
                                       <th scope="col"></th>
                                    @endif
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
                                       ${{number_format($convenio->monto, 2, '.', ',')}}
                                       @else
                                       <h6>Sin extensión de monto</h6>
                                       @endif
                                    </td>
                                    <td>
                                       @if($convenio->dias == 0)
                                       <h6>N/A</h6>
                                       @else
                                       {{$convenio->dias}}
                                       @endif
                                    </td>
                                    <td>
                                       @if(isset($convenio->monto))
                                       {{$convenio->comentario}}
                                       @else
                                       <h6>Sin comentarios</h6>
                                       @endif
                                    </td>
                                    @if (Gate::check('delete convenios') || Gate::check('update convenios'))
                                    <td>
                                       @can('delete convenios')
                                       <button type="button" class="btn btn-danger btn-sm" onclick="eliminar({{ json_encode(['id' => $convenio->id, 'contractual_id' => $convenio->contractual_id]) }})">
                                       <i class="fa fa-trash"></i>
                                       </button>
                                       @endcan
                                       @can('update convenios')
                                       <a href="{{ route('convenios.edit', $convenio->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                       @endcan
                                    </td>
                                    @endif
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
               @php $contador++; @endphp
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
           var string = datos.id+'/contractual/'+datos.contractual_id;
           deleteForm.setAttribute("action", string);
         
         }
      </script>
      <div class="container mt-5">
         <div class="card shadow">
            <div class="card-header color-nav text-white">
               <div class="d-flex align-items-center justify-content-between">
                  <h4 class="mb-0">
                     Datos Generales
                  </h4>
                  @can('create servicios')
                  <a class="btn btn-success" href="{{ route('servicios.insert', $contrato->id)}}"><i class="fa fa-plus"></i></a>
                  @endcan
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
                                    <th scope="col">Alcance del Trabajo</th>
                                    <th scope="col">Líder</th>
                                    @if (Gate::check('delete servicios') || Gate::check('update servicios'))
                                    <th scope="col"></th>
                                    @endif
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td>{{$operacion->nom_corto}}</td>
                                    <td>{{$operacion->alcance}}</td>
                                    <td>{{$operacion->lider}}</td>
                                    @if (Gate::check('delete servicios') || Gate::check('update servicios'))
                                    <td>
                                       @can('delete servicios')
                                       <button type="button" class="btn btn-danger btn-sm mt-2" onclick="eliminar2({{ json_encode(['id' => $operacion->id, 'contractual_id' => $contrato->id]) }})">
                                       <i class="fa fa-trash"></i>
                                       </button>
                                       @endcan
                                       @can('update servicios')
                                       <a href="{{ route('servicios.edit', $operacion->id)}}" class="btn btn-warning btn-sm mt-2"><i class="fa fa-edit"></i></a>
                                       @endcan
                                    </td>
                                    @endif
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="d-flex align-items-center justify-content-between mb-4">
                                 <h4>Contactos</h4>
                                 @can('create contactos')
                                 <a class="btn btn-primary" href="{{route('clientes.insert', ['service_id' => $operacion->id, 'id' => $contrato->id])}}"><i class="fa fa-plus"></i></a>
                                 @endcan
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
                                       @if (Gate::check('delete contactos') || Gate::check('update contactos'))
                                       @can('delete contactos')
                                       <button type="button" class="btn btn-danger btn-sm" onclick="eliminar3({{ json_encode(['id' => $contacto->id, 'contrato_id' => $contrato->id]) }})">
                                       <i class="fa fa-trash"></i>
                                       </button>
                                       @endcan
                                       @can('update contactos')
                                       <a href="{{ route('clientes.edit', $contacto->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                       @endcan
                                       @endif
                                       <!-- Agrega más campos según sea necesario -->
                                    </li>
                                    @endforeach
                                 </ul>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="d-flex align-items-center justify-content-between mb-4">
                                 <h4>Comentarios</h4>
                                 @can('create comentarios')
                                 <a class="btn btn-primary" href="{{route('comentarios.insert', ['service_id' => $operacion->id, 'id' => $contrato->id])}}"><i class="fa fa-plus"></i></a>
                                 @endcan
                              </div>
                              <div class="scrollable-container">
                                 <ul class="list-group list-group-flush">
                                    @foreach($operacion->comments as $comment)
                                    <li class="list-group-item">
                                       <strong>Comentario:</strong> {{ $comment->comment }}<br>
                                       <strong>Tipo:</strong> {{ $comment->tipo }}<br>
                                       <strong>Fecha:</strong> {{ $comment->created_at->format('Y-m-d') }}<br>
                                       @can('delete comentarios')
                                       <button type="button" class="btn btn-danger btn-sm mt-2" onclick="eliminarComment({{ json_encode(['id' => $comment->id, 'contrato_id' => $contrato->id]) }})">
                                       <i class="fa fa-trash"></i>
                                       </button>
                                       @endcan
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
            <div class="card-header color-nav text-white">
               <div class="d-flex align-items-center justify-content-between">
                  <h4 class="mb-0">
                     Avance
                  </h4>
                  @if(count($avancesG) == 1)
                  @can('create avances')
                  <a class="btn btn-success"><i class="fa fa-plus"></i></a>
                  @endcan
                  @else
                  @can('create avances')
                  <a class="btn btn-success" href="{{ route('avances.insert', $contrato->id)}}"><i class="fa fa-plus"></i></a>
                  @endcan
                  @endif
               </div>
            </div>
            <div class="card-body">
               @if(count($avancesG) > 0)
               @foreach($avancesG as $avance)
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
                     <span>{{$avance->pro_fina}}%</span>
                  </div>
                  <div class="col-md-6">
                     <h6 class="font-weight-bold">Real Financiero</h6>
                     <span>{{$avance->real_fina}}%</span>
                  </div>
               </div>
               <div class="row mb-3">
                  <div class="col-md-6">
                     <h6 class="font-weight-bold">Desviación Financiera</h6>
                     <span>{{$avance->des_fina}}%</span>
                  </div>
                  <div class="col-md-6">
                     <h6 class="font-weight-bold">Observaciones</h6>
                     <span>{{$avance->financiero_obs}}</span>
                  </div>
               </div>
               <div class="row mb-3">
                  <div class="col-md-12">
                     <h6 class="font-weight-bold">Ultima actualización</h6>
                     <span>{{ \Carbon\Carbon::parse($avance->updated_at)->format('Y-m-d h:i:s A') }}</span>
                  </div>
               </div>
               <div class="row mb-3">
                  <div class="col-md-6 offset-md-3">
                     @can('delete avances')
                     <button type="button" class="btn btn-danger btn-sm" onclick="eliminarAvance({{ json_encode(['id' => $avance->id, 'contrato_id' => $contrato->id]) }})">
                     <i class="fa fa-trash"></i>
                     </button>
                     @endcan
                     @can('update avances')
                     <a href="{{ route('avances.edit', $avance->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                     @endcan
                  </div>
               </div>
               @endforeach
               @else
               <p>No hay datos disponibles.</p>
               @endif
            </div>
         </div>
      </div>
      @if($contrato->coordinacion == 'Supervision')
      <div class="container mt-5">
         <div class="card shadow">
            <div class="card-header color-nav text-white">
               <div class="d-flex align-items-center justify-content-between">
                  <h4 class="mb-0">
                     Avance Supervisión
                  </h4>
                  @can('create avances')
                  <a class="btn btn-success" href="{{ route('avances.insert', $contrato->id)}}"><i class="fa fa-plus"></i></a>
                  @endcan
               </div>
            </div>
            @if(count($avancesS) > 0)
            <div class="accordion accordion-flush" id="accordionFlushExample">
               @php $contador = 1; @endphp
               @foreach($avancesS as $avance)
               <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-heading{{$avance->id}}">
                     <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-{{$avance->id}}" aria-expanded="false" aria-controls="flush-collapse{{$avance->id}}">
                        <h6 class="mb-0">{{ \Carbon\Carbon::parse($avance->updated_at)->format('Y-m-d h:i:s A') }}</h6>
                     </button>
                  </h2>
                  <div id="flush-{{$avance->id}}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{$avance->id}}" data-bs-parent="#accordionFlushExample">
                     <div class="accordion-body">
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
                              <span>{{$avance->pro_fina}}%</span>
                           </div>
                           <div class="col-md-6">
                              <h6 class="font-weight-bold">Real Financiero</h6>
                              <span>{{$avance->real_fina}}%</span>
                           </div>
                        </div>
                        <div class="row mb-3">
                           <div class="col-md-6">
                              <h6 class="font-weight-bold">Desviación Financiera</h6>
                              <span>{{$avance->des_fina}}%</span>
                           </div>
                           <div class="col-md-6">
                              <h6 class="font-weight-bold">Observaciones</h6>
                              <span>{{$avance->financiero_obs}}</span>
                           </div>
                        </div>
                        <div class="row mb-3">
                           <div class="col-md-12">
                              <h6 class="font-weight-bold">Ultima actualización</h6>
                              <span>{{ \Carbon\Carbon::parse($avance->updated_at)->format('Y-m-d h:i:s A') }}</span>
                           </div>
                        </div>
                        <div class="row mb-3">
                           <div class="col-md-6 offset-md-3">
                              @can('delete avances')
                              <button type="button" class="btn btn-danger btn-sm" onclick="eliminarAvance({{ json_encode(['id' => $avance->id, 'contrato_id' => $contrato->id]) }})">
                              <i class="fa fa-trash"></i>
                              </button>
                              @endcan
                              @can('update avances')
                              <a href="{{ route('avances.edit', $avance->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                              @endcan
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               @php $contador++; @endphp
               @endforeach
            </div>
            @else
            <div class="card-body">
               <p>No hay datos disponibles.</p>
            </div>
            @endif
         </div>
      </div>
      @endif
      @if($contrato->coordinacion == 'Construccion')
      <div class="container mt-5">
         <div class="card shadow">
            <div class="card-header color-nav text-white">
               <div class="d-flex align-items-center justify-content-between">
                  <h4 class="mb-0">
                     Avance Constructora
                  </h4>
                  @can('create avances')
                  <a class="btn btn-success" href="{{ route('avances.insert', $contrato->id)}}"><i class="fa fa-plus"></i></a>
                  @endcan
               </div>
            </div>
            @if(count($avancesC) > 0)
            <div class="accordion accordion-flush" id="accordionFlushExample">
               @php $contador = 1; @endphp
               @foreach($avancesC as $avance)
               <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-heading{{$avance->id}}">
                     <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-{{$avance->id}}" aria-expanded="false" aria-controls="flush-collapse{{$avance->id}}">
                        <h6 class="mb-0">{{ \Carbon\Carbon::parse($avance->updated_at)->format('Y-m-d h:i:s A') }}</h6>
                     </button>
                  </h2>
                  <div id="flush-{{$avance->id}}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{$avance->id}}" data-bs-parent="#accordionFlushExample">
                     <div class="accordion-body">
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
                              <span>{{$avance->pro_fina}}%</span>
                           </div>
                           <div class="col-md-6">
                              <h6 class="font-weight-bold">Real Financiero</h6>
                              <span>{{$avance->real_fina}}%</span>
                           </div>
                        </div>
                        <div class="row mb-3">
                           <div class="col-md-6">
                              <h6 class="font-weight-bold">Desviación Financiera</h6>
                              <span>{{$avance->des_fina}}%</span>
                           </div>
                           <div class="col-md-6">
                              <h6 class="font-weight-bold">Observaciones</h6>
                              <span>{{$avance->financiero_obs}}</span>
                           </div>
                        </div>
                        <div class="row mb-3">
                           <div class="col-md-12">
                              <h6 class="font-weight-bold">Ultima actualización</h6>
                              <span>{{ \Carbon\Carbon::parse($avance->updated_at)->format('Y-m-d h:i:s A') }}</span>
                           </div>
                        </div>
                        <div class="row mb-3">
                           <div class="col-md-6 offset-md-3">
                              @can('create avances')
                              <button type="button" class="btn btn-danger btn-sm" onclick="eliminarAvance({{ json_encode(['id' => $avance->id, 'contrato_id' => $contrato->id]) }})">
                              <i class="fa fa-trash"></i>
                              </button>
                              @endcan
                              @can('update avances')
                              <a href="{{ route('avances.edit', $avance->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                              @endcan
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               @php $contador++; @endphp
               @endforeach
            </div>
            @else
            <div class="card-body">
               <p>No hay datos disponibles.</p>
            </div>
            @endif
         </div>
      </div>
      @endif
      <div class="container mt-5">
         <div class="card shadow">
            <div class="card-header color-nav text-white">
               <div class="d-flex align-items-center justify-content-between">
                  <h4 class="mb-0">
                     Cobros
                  </h4>
                  @can('create cobros')
                  <a class="btn btn-success" href="{{ route('cobros.insert', $contrato->id)}}"><i class="fa fa-plus"></i></a>
                  @endcan
               </div>
            </div>
            <div class="card-body">
               @if(count($cobros) > 0)
               <div class="table-responsive">
                  <table class="table text-start align-middle table-striped table-hover table-hover mb-0">
                     <thead>
                        <tr class="text-dark">
                           <th scope="col">Periodo</th>
                           <th scope="col"># Factura</th>
                           <th scope="col">Fecha Ingreso</th>
                           <th scope="col">Programado</th>
                           <th scope="col">%</th>
                           <th scope="col">Estimado</th>
                           <th scope="col">%</th>
                           <th scope="col">Cobrado</th>
                           <th scope="col">%</th>
                           <th scope="col">Comentarios</th>
                           @if (Gate::check('delete cobros') || Gate::check('update cobros'))
                           <th scope="col">Acciones</th>
                           @endif
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($cobros as $cobro)
                        <tr>
                           <td>{{$cobro->periodo}}</td>
                           <td>{{($cobro->num_factura)}}</td>
                           <td>{{$cobro->fecha_ingreso}}</td>
                           @if($monto_contrato == 0)
                           <td>${{number_format($cobro->programado, 2, '.', ',')}}</td>
                           <td>{{ round(($cobro->programado / $contrato->imp_contrato) * 100) }}%</td>
                           <td>${{number_format($cobro->estimado, 2, '.', ',')}}</td>
                           <td>{{ round(($cobro->estimado / $contrato->imp_contrato) * 100) }}%</td>
                           <td>${{number_format($cobro->cobrado, 2, '.', ',')}}</td>
                           <td>{{ round(($cobro->cobrado / $contrato->imp_contrato) * 100) }}%</td>
                           @else
                           <td>${{number_format($cobro->programado, 2, '.', ',')}}</td>
                           <td>{{ round(($cobro->programado / $monto_contrato) * 100) }}%</td>
                           <td>${{number_format($cobro->estimado, 2, '.', ',')}}</td>
                           <td>{{ round(($cobro->estimado / $monto_contrato) * 100) }}%</td>
                           <td>${{number_format($cobro->cobrado, 2, '.', ',')}}</td>
                           <td>{{ round(($cobro->cobrado / $monto_contrato) * 100) }}%</td>
                           @endif
                           <td>{{$cobro->comentario}}</td>
                           @if (Gate::check('delete cobros') || Gate::check('update cobros'))
                           <td>
                              @can('update cobros')
                              <a href="{{ route('cobros.edit', $cobro->id)}}" class="btn btn-warning btn-sm mt-2"><i class="fa fa-edit"></i></a>
                              @endcan
                              @can('delete cobros')
                              <button type="button" class="btn btn-danger btn-sm mt-2" onclick="eliminarCobro({{ json_encode(['id' => $cobro->id, 'contrato_id' => $contrato->id]) }})">
                              <i class="fa fa-trash"></i>
                              </button>
                              @endcan
                           </td>
                           @endif
                        </tr>
                        @endforeach
                     </tbody>
                     <tfoot>
                        <tr>
                           <td colspan="3"><strong>Total</strong></td>
                           @if($monto_contrato == 0)
                           <td>${{ number_format($cobros->sum('programado'), 2, '.', ',') }}</td>
                           <td>{{ round(($cobros->sum('programado') / $contrato->imp_contrato) * 100) }}%</td>
                           <td>${{ number_format($cobros->sum('estimado'), 2, '.', ',') }}</td>
                           <td>{{ round(($cobros->sum('estimado') / $contrato->imp_contrato) * 100) }}%</td>
                           <td>${{ number_format($cobros->sum('cobrado'), 2, '.', ',') }}</td>
                           <td>{{ round(($cobros->sum('cobrado') / $contrato->imp_contrato) * 100) }}%</td>
                           <td></td>
                           <td></td>
                           @else
                           <td>${{ number_format($cobros->sum('programado'), 2, '.', ',') }}</td>
                           <td>{{ round(($cobros->sum('programado') / $monto_contrato) * 100) }}%</td>
                           <td>${{ number_format($cobros->sum('estimado'), 2, '.', ',') }}</td>
                           <td>{{ round(($cobros->sum('estimado') / $monto_contrato) * 100) }}%</td>
                           <td>${{ number_format($cobros->sum('cobrado'), 2, '.', ',') }}</td>
                           <td>{{ round(($cobros->sum('cobrado') / $monto_contrato) * 100) }}%</td>
                           <td></td>
                           <td></td>
                           @endif
                        </tr>
                        <tr>
                           <td colspan="11"><strong>Ultima actualización </strong> {{ \Carbon\Carbon::parse($cobro->updated_at)->format('Y-m-d h:i:s A') }} </td>
                        </tr>
                     </tfoot>
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
           var string = datos.id+'/contractuals/'+datos.contractual_id;
           deleteForm.setAttribute("action", string);
         
         }
      </script>
   </div>
</div>
@endsection