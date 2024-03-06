@extends('layouts.layout')
@section('content')
<div class="container-fluid pt-4 px-4">
   <div class="row g-4">
      <div class="col-sm-12 col-xl-12">
         <div class="bg-light rounded h-100 p-4">
            <h3 class="mb-4 text-center">Actualizar Contrato</h3>
            <form class="row g-3" method="POST" action="{{ route('contratos.update', $contrato) }}">
               @method('put')
               @csrf
               <!----------------------ROW 1-------------------------->
               <div class="col-md-6">
                  <div class="form-floating">
                     <textarea class="form-control" name="nom_proyecto" placeholder="Agrega comentarios aquí..."
                        id="floatingTextarea">{{ $contrato->nom_proyecto}}</textarea>
                     <label for="floatingTextarea">Contrato</label>
                  </div>
                  @error('nom_proyecto')
                     <p class="text-danger">{{ $message }}</p>
                  @enderror
               </div>
               <div class="col-md-6">
                  <div class="form-floating mb-3">
                     <input name="no_contrato" value="{{ $contrato->no_contrato}}" type="text" class="form-control" id="floatingPassword"
                        placeholder="Ajuste Costos">
                     <label for="floatingPassword">No. de contrato</label>
                  </div>
                  @error('nom_contrato')
                     <p class="text-danger">{{ $message }}</p>
                  @enderror
               </div>
               <!----------------------ROW 2-------------------------->
               <div class="col-md-4">
                  <div class="form-floating mb-3">
                     <input name="empresa_cont" value="{{ $contrato->empresa_cont}}" type="text" class="form-control" id="floatingPassword"
                        placeholder="Ajuste Costos">
                     <label for="floatingPassword">Empresa contratada</label>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-floating mb-3">
                     <input name="consorcio" value="{{ $contrato->consorcio}}" type="text" class="form-control" id="floatingPassword"
                        placeholder="Ajuste Costos">
                     <label for="floatingPassword">Participación en consorcio</label>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-floating mb-3">
                     <input name="c_costo" value="{{ $contrato->c_costo}}" type="text" class="form-control" id="floatingPassword"
                        placeholder="Ajuste Costos">
                     <label for="floatingPassword">Centro de Costos</label>
                  </div>
                  @error('c_costo')
                     <p class="text-danger">{{ $message }}</p>
                  @enderror
               </div>
               <!----------------------ROW 3-------------------------->
               <div class="col-md-4">
                  <div class="form-floating mb-3">
                     <input name="emp_contratante" value="{{ $contrato->emp_contratante}}" type="text" class="form-control" id="floatingPassword"
                        placeholder="Ajuste Costos">
                     <label for="floatingPassword">Empresa contratante</label>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-floating mb-3">
                     <input name="imp_contrato" value="{{ $contrato->imp_contrato}}" type="number" class="form-control" id="floatingPassword"
                        placeholder="Ajuste Costos">
                     <label for="floatingPassword">Importe de contrato</label>
                  </div>
                  @error('imp_contrato')
                     <p class="text-danger">{{ $message }}</p>
                  @enderror
               </div>
               <div class="col-md-4">
                  <div class="form-floating mb-3">
                     <select class="form-select" name="coordinacion" id="floatingSelect"
                        aria-label="Floating label select example">
                        @if($contrato->coordinacion == 'Proyectos')
                        <option value="Proyectos" selected>Proyectos</option>
                        <option value="Ambiental">Ambiental</option>
                        <option value="Supervision">Supervisión</option>
                        <option value="Construccion">Construcción</option>
                        @endif
                        @if($contrato->coordinacion == 'Ambiental')
                        <option value="Ambiental" selected>Ambiental</option>
                        <option value="Proyectos">Proyectos</option>
                        <option value="Supervision">Supervisión</option>
                        <option value="Construccion">Construcción</option>
                        @endif
                        @if($contrato->coordinacion == 'Supervision')
                        <option value="Supervision" selected>Supervisión</option>
                        <option value="Proyectos">Proyectos</option>
                        <option value="Ambiental">Ambiental</option>
                        <option value="Construccion">Construcción</option>
                        @endif
                        @if($contrato->coordinacion == 'Construccion')
                        <option value="Construccion" selected>Construcción</option>
                        <option value="Proyectos">Proyectos</option>
                        <option value="Ambiental">Ambiental</option>
                        <option value="Supervision">Supervisión</option>
                        @endif
                     </select>
                     <label for="floatingSelect">Coodinación</label>
                  </div>
                  @error('coordinacion')
                     <p class="text-danger">{{ $message }}</p>
                  @enderror
               </div>
               <!----------------------ROW 4-------------------------->
               <div class="col-md-12">
                  <div class="form-floating">
                     <textarea class="form-control" name="descripcion" placeholder="Agrega comentarios aquí..."
                        id="floatingTextarea" style="height: 150px;">{{ $contrato->descripcion}}</textarea>
                     <label for="floatingTextarea">Descripción</label>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-floating mb-3">
                     <input name="fecha_inicio" type="date" class="form-control" id="floatingPassword"
                        value="{{$contrato->fecha_inicio}}">
                     <label for="floatingPassword">Fecha Inicio</label>
                  </div>
                  @error('fecha_inicio')
                     <p class="text-danger">{{ $message }}</p>
                  @enderror
               </div>
               <div class="col-md-6">
                  <div class="form-floating mb-3">
                     <input name="fecha_fin" type="date" class="form-control" id="floatingPassword"
                        value="{{$contrato->fecha_fin}}">
                     <label for="floatingPassword">Fecha Fin</label>
                  </div>
                  @error('fecha_fin')
                     <p class="text-danger">{{ $message }}</p>
                  @enderror
               </div>
               <!----------------------ROW 5-------------------------->
               <!--<div class="col-md-6">
                  <div class="form-floating mb-3">
                      <input name="fecha_inicio" type="date" class="form-control" id="floatingPassword"
                          placeholder="Ajuste Costos">
                      <label for="floatingPassword">Fecha Inicio</label>
                  </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-floating mb-3">
                      <input name="fecha_fin" type="date" class="form-control" id="floatingPassword"
                          placeholder="Ajuste Costos">
                      <label for="floatingPassword">Fecha Fin</label>
                  </div>
                  </div>--->
               <!----------------------ROW 6-------------------------->
               <div class="col-6">
                  <button type="submit" class="btn btn-primary">Guardar</button>
               </div>
               <div class="col-6 text-end">
                  <a href="{{route('contratos.index')}}"><button type="button" class="btn btn-danger">Cancelar</button></a>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection